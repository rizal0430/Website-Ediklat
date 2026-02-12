<?php

namespace App\Controllers;

use App\Models\JenisInstansiModel;

class MasterJenisInstansi extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new JenisInstansiModel();
    }

    public function index()
    {
        return view('master/jenis_instansi/index', [
            'title' => 'Jenis Instansi',
            'data'  => $this->model->where('aktif', 1)->findAll()
        ]);
    }

    public function create()
    {
        return view('master/jenis_instansi/create', [
            'title' => 'Tambah Jenis Instansi'
        ]);
    }

    public function store()
    {
        $this->model->insert([
            'kode' => $this->request->getPost('kode'),
            'nama' => $this->request->getPost('nama'),
            'aktif' => 1
        ]);

        return redirect()->to(base_url('master/jenis-instansi'))
            ->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        return view('master/jenis_instansi/edit', [
            'title' => 'Edit Jenis Instansi',
            'row'   => $this->model->find($id)
        ]);
    }

    public function update($id)
    {
        $this->model->update($id, [
            'kode' => $this->request->getPost('kode'),
            'nama' => $this->request->getPost('nama'),
        ]);

        return redirect()->to(base_url('master/jenis-instansi'))
            ->with('success', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $this->model->update($id, ['aktif' => 0]);

        return redirect()->to(base_url('master/jenis-instansi'))
            ->with('success', 'Data berhasil dihapus');
    }
}
