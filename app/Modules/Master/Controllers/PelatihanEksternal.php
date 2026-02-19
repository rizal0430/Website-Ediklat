<?php

namespace App\Modules\Master\Controllers;

use App\Controllers\BaseController;
use App\Modules\Master\Models\PelatihanModel;

class PelatihanEksternal extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new PelatihanModel();
    }

   public function index()
{
    $q     = $this->request->getGet('q');
    $limit = $this->request->getGet('limit');

    // default 10 kalau kosong
    if (!$limit || $limit === 'all') {
        $limit = 10;
    }

    $limit = (int) $limit; // WAJIB cast ke int

    $query = $this->model->where('jenis', 'eksternal');

    if ($q) {
        $query = $query->groupStart()
                       ->like('kegiatan', $q)
                       ->orLike('peserta', $q)
                       ->orLike('penyelenggara', $q)
                       ->groupEnd();
    }

    $data = $query->paginate($limit, 'eksternal');

    return view('master/pelatihan_eksternal', [
        'title' => 'Pelatihan Eksternal',
        'data'  => $data,
        'pager' => $this->model->pager,
        'q'     => $q,
        'limit' => $limit
    ]);
}

    public function store()
    {   
        $data = $this->request->getPost();
        $data['jenis'] = $this->request->getPost('jenis');

        $this->model->insert($data);

        return redirect()->to('master/pelatihan_eksternal');
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $data['jenis'] = $this->request->getPost('jenis');

        $this->model->update($id, $data);

        return redirect()->to('master/pelatihan_eksternal');
    }



   


    public function delete($id)
    {
        $this->model->delete($id);
       return redirect()->to('master/pelatihan_eksternal');

    }

    



}
