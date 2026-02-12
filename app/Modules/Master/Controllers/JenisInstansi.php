<?php

namespace App\Modules\Master\Controllers;

use App\Controllers\BaseController;
use App\Modules\Master\Models\JenisInstansiModel;

class JenisInstansi extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new JenisInstansiModel();
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

    $data = $query->paginate($limit, 'jenis');

    return view('master/jenisinstansi', [
        'title' => 'Jenis Instansi',
        'data'  => $data,
        'pager' => $this->model->pager,
        'q'     => $q,
        'limit' => $limit,
        'url'   => 'master/jenis-instansi'
    ]);
    }


   public function create()
    {
    return view('master/form', [
        'title'  => 'Tambah Jenis Instansi',
        'action' => 'master/jenis-instansi/store',
        'url'    => 'master/jenis-instansi'
    ]);
    }


    public function store()
    {
        $this->model->insert($this->request->getPost());
        return redirect()->to(base_url('master/jenis-instansi'));
    }

    public function edit($id)
    {   
    return view('master/form', [
        'title'  => 'Edit Jenis Instansi',
        'action' => 'master/jenis-instansi/update/' . $id,
        'url'    => 'master/jenis-instansi',
        'data'   => $this->model->find($id)
    ]);
    }


    public function update($id)
    {
        $this->model->update($id, $this->request->getPost());
        return redirect()->to(base_url('master/jenis-instansi'));
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to(base_url('master/jenis-instansi'));
    }
}
