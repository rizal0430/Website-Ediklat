<?php

namespace App\Modules\Master\Controllers;

use App\Controllers\BaseController;
use App\Modules\Master\Models\PelatihanModel;

class PelatihanInternal extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new PelatihanModel();
    }

   public function index()
    {
    $q     = $this->request->getGet('q');
    $limit = $this->request->getGet('limit') ?? 10;

    $query = $this->model->where('jenis', 'internal');

    if ($q) {
        $query = $query->groupStart()
                       ->like('kegiatan', $q)
                       ->orLike('peserta', $q)
                       ->groupEnd();
    }

    $data = $query->paginate($limit, 'internal');

    return view('master/pelatihan_internal', [
        'title' => 'Pelatihan Internal',
        'data'  => $data,
        'pager' => $this->model->pager,
        'q'     => $q,
        'limit'=> $limit
    ]);
    }



    public function store()
    {
        $data = $this->request->getPost();
        $data['jenis'] = 'internal';
        $this->model->insert($data);
        return redirect()->to('master/pelatihan_internal');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('master/pelatihan_internal');
    }
    public function update($id)
    {
    $data = $this->request->getPost();
    unset($data['jenis']); // ⬅️ PENTING

    $this->model->update($id, $data);
    return redirect()->to('master/pelatihan_internal');
    }


}
