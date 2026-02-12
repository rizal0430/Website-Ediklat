<?php

namespace App\Modules\Master\Controllers;

use App\Controllers\BaseController;
use App\Modules\Master\Models\TempatTidurModel;

class TempatTidur extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new TempatTidurModel();
    }

    public function index()
    {
    $q     = $this->request->getGet('q');
    $limit = $this->request->getGet('limit') ?? 10;

    $query = $this->model;

    if ($q) {
        $query = $query->like('kode', $q)
                       ->orLike('nama', $q);
    }

    $data = $query->paginate($limit, 'tempattidur');

    return view('master/tempattidur', [
        'title' => 'Data Tempat Tidur',
        'url'   => 'master/tempat-tidur',
        'data'  => $data,
        'pager' => $this->model->pager,
        'q'     => $q,
        'limit'=> $limit
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

        return redirect()->to(base_url('master/tempat-tidur'));
    }

    public function update($id)
    {
        $post = $this->request->getPost();

        $this->model->update($id, [
            'kode'  => $post['kode'],
            'nama'  => $post['nama'],
            'aktif' => $post['aktif'] ?? 0
        ]);

        return redirect()->to(base_url('master/tempat-tidur'));
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to(base_url('master/tempat-tidur'));
    }
}
