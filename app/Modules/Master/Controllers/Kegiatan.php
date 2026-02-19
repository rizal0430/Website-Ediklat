<?php

namespace App\Modules\Master\Controllers;

use App\Controllers\BaseController;
use App\Modules\Master\Models\KegiatanModel;

class Kegiatan extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new KegiatanModel();
    }

  public function index()
{
    $q     = $this->getSearch();
    $limit = $this->getLimit();

    $query = $this->model;

    if ($q) {
        $query = $query->groupStart()
                       ->like('kode', $q)
                       ->orLike('nama', $q)
                       ->groupEnd();
    }

    $data = $query->paginate($limit, 'kegiatan');

    return view('master/kegiatan', [
        'title' => 'Data Kegiatan',
        'url'   => 'master/kegiatan',
        'data'  => $data,
        'pager' => $this->model->pager,
        'q'     => $q,
        'limit' => $limit
    ]);
}



    public function store()
    {
        $post = $this->request->getPost();

        $this->model->insert([
            'kode'  => $post['kode'],
            'nama'  => $post['nama'],
            'aktif' => $post['aktif'] ?? 0
        ]);

        return redirect()->to(base_url('master/kegiatan'));
    }

    public function update($id)
    {
        $post = $this->request->getPost();

        $this->model->update($id, [
            'kode'  => $post['kode'],
            'nama'  => $post['nama'],
            'aktif' => $post['aktif'] ?? 0
        ]);

        return redirect()->to(base_url('master/kegiatan'));
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to(base_url('master/kegiatan'));
    }
}
