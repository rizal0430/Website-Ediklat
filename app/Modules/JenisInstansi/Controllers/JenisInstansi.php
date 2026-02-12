<?php

namespace App\Modules\JenisInstansi\Controllers;

use App\Controllers\BaseController;
use App\Modules\JenisInstansi\Models\JenisInstansiModel;

class JenisInstansi extends BaseController
{
    public function index()
    {
        $model = new JenisInstansiModel();
        $data['jenis'] = $model->findAll();

       return view('App\Modules\JenisInstansi\Views\index', $data);


    }

    public function store()
    {
        $model = new JenisInstansiModel();

        $model->insert([
            'kode' => $this->request->getPost('kode'),
            'nama' => $this->request->getPost('nama'),
            'aktif' => 1
        ]);

        return redirect()->back();
    }

    public function delete($id)
    {
        $model = new JenisInstansiModel();
        $model->delete($id);

        return redirect()->back();
    }
}
