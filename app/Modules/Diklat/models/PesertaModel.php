<?php

namespace App\Modules\Diklat\Models;

use CodeIgniter\Model;

class PesertaModel extends Model
{
    protected $table = 'data_biaya_diklat';
    protected $primaryKey = 'id';
    protected $allowedFields = ['diklat_id','tgl_input','tarif','satuan','lama','orang','qty','nominal','subtotal'];
    protected $useTimestamps = false;

    public function proses($id)
{
    $row = $this->diklat->getDetail($id);

    $peserta = (new PesertaModel())->where('diklat_id',$id)->findAll();
    $biaya   = (new BiayaModel())->where('diklat_id',$id)->findAll();

    return view('diklat/proses', compact('row','peserta','biaya'));
}

}
