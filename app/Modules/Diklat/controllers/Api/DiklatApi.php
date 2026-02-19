<?php

namespace App\Modules\Diklat\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class DiklatApi extends ResourceController
{
    protected $modelName = 'App\Modules\Diklat\Models\DiklatModel';
    protected $format    = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
        $data = $this->model->find($id);

        if (!$data) {
            return $this->failNotFound('Data tidak ditemukan');
        }

        return $this->respond($data);
    }
    public function create()
    {
        $data = $this->request->getJSON(true);

        if (!$this->model->insert($data)) {
            return $this->fail($this->model->errors());
        }

        return $this->respondCreated([
            'status' => 'success',
            'message' => 'Data berhasil ditambahkan'
        ]);
    }

}
