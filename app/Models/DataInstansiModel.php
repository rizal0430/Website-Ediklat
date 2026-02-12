<?php

namespace App\Models;

use CodeIgniter\Model;

class DataInstansiModel extends Model
{
    protected $table = 'data_instansi';
    protected $primaryKey = 'id';

    protected $allowedFields = ['kode', 'nama', 'jenis_instansi_id', 'aktif'];

    public function getWithJenis()
    {
        return $this->select('data_instansi.*, jenis_instansi.nama AS jenis_instansi')
            ->join('jenis_instansi', 'jenis_instansi.id = data_instansi.jenis_instansi_id')
            ->findAll();
    }
}
