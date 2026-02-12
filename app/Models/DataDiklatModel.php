<?php

namespace App\Models;

use CodeIgniter\Model;

class DataDiklatModel extends Model
{
    protected $table = 'data_diklat';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'no_diklat', 'instansi_id', 'fakultas_id', 'kegiatan_id',
        'peserta', 'ketua', 'tgl_mulai', 'tgl_akhir',
        'jumlah_minggu', 'biaya', 'status_diklat', 'status_bayar'
    ];

    public function getAllWithRelasi()
    {
        return $this->select('
                data_diklat.*,
                data_instansi.nama AS instansi,
                data_fakultas.nama AS fakultas,
                kegiatan.nama AS kegiatan
            ')
            ->join('data_instansi', 'data_instansi.id = data_diklat.instansi_id')
            ->join('data_fakultas', 'data_fakultas.id = data_diklat.fakultas_id')
            ->join('kegiatan', 'kegiatan.id = data_diklat.kegiatan_id')
            ->findAll();
    }
}
