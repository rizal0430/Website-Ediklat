<?php

namespace App\Modules\Diklat\Controllers;

use App\Controllers\BaseController;
use App\Modules\Diklat\Models\BiayaModel;

class DiklatBiaya extends BaseController
{
    protected $biayaModel;

    public function __construct()
    {
        $this->biayaModel = new BiayaModel();
    }

    public function index($diklat_id)
    {
        $data['biaya'] = $this->biayaModel
            ->where('diklat_id', $diklat_id)
            ->findAll();

        $data['diklat_id'] = $diklat_id;

        return view('diklat/biaya', $data);
    }

    public function store()
    {
        $this->biayaModel->insert([
            'diklat_id' => $this->request->getPost('diklat_id'),
            'tanggal'   => $this->request->getPost('tanggal'),
            'tarif'     => $this->request->getPost('tarif'),
            'satuan'    => $this->request->getPost('satuan'),
            'lama'      => $this->request->getPost('lama'),
            'orang'     => $this->request->getPost('orang'),
            'qty'       => $this->request->getPost('qty'),
            'nominal'   => $this->request->getPost('nominal'),
            'subtotal'  => $this->request->getPost('qty')
                         * $this->request->getPost('nominal'),
        ]);

        return redirect()->back()->with('success', 'Biaya ditambahkan');
    }

    public function delete($id)
    {
        $this->biayaModel->delete($id);
        return redirect()->back()->with('success', 'Biaya dihapus');
    }
}
