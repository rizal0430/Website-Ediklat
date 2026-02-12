<?php

namespace App\Modules\Master\Controllers;

use App\Controllers\BaseController;
use App\Modules\Master\Models\FakultasModel;

class Fakultas extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new FakultasModel();
    }

    public function index()
    {
    $q     = $this->request->getGet('q');
    $limit = $this->request->getGet('limit') ?? 10;

    $builder = $this->model;

    if ($q) {
        $builder = $builder
            ->groupStart()
                ->like('kode', $q)
                ->orLike('nama', $q)
            ->groupEnd();
    }

    $data = $builder->paginate($limit, 'fakultas');

    return view('master/datafakultas', [
        'title'   => 'Data Fakultas',
        'url'     => 'master/data-fakultas',
        'data'    => $data,
        'pager'   => $this->model->pager,
        'q'       => $q,
        'limit'   => $limit
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

        return redirect()->to(base_url('master/data-fakultas'));
    }

    public function update($id)
    {
        $post = $this->request->getPost();

        $this->model->update($id, [
            'kode'  => $post['kode'],
            'nama'  => $post['nama'],
            'aktif' => $post['aktif'] ?? 0
        ]);

        return redirect()->to(base_url('master/data-fakultas'));
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to(base_url('master/data-fakultas'));
    }
    
}
