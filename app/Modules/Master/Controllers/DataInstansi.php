<?php

namespace App\Modules\Master\Controllers;

use App\Controllers\BaseController;
use App\Modules\Master\Models\DataInstansiModel;
use App\Modules\Master\Models\JenisInstansiModel;

class DataInstansi extends BaseController
{
    protected $model;
    protected $jenis;

    public function __construct()
    {
        $this->model = new DataInstansiModel();
        $this->jenis = new JenisInstansiModel();
    }

   public function index()
    {
    $q     = $this->request->getGet('q');
    $limit = $this->request->getGet('limit') ?? 10;

    return view('master/datainstansi', [
        'title' => 'Data Instansi',
        'data'  => $this->model->getAll($q, $limit),
        'jenis' => $this->jenis->findAll(),
        'url'   => 'master/data-instansi',
        'q'     => $q,
        'limit'=> $limit
    ]);
    }


    public function store()
    {
    $post = $this->request->getPost();

    // ambil tipe dari tabel jenis_instansi
    $jenis = $this->jenis->find($post['jenis_instansi_id']);

    $post['tipe'] = $jenis['tipe'] ?? null;

    $this->model->insert($post);

    return redirect()->to('master/data-instansi');
    }

    public function update($id)
    {
        $post = $this->request->getPost();

        $jenis = $this->jenis->find($post['jenis_instansi_id']);
        $post['tipe'] = $jenis['tipe'] ?? null;

        $this->model->update($id, $post);

        return redirect()->to('master/data-instansi');
    }


    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('master/data-instansi');
    }
}
