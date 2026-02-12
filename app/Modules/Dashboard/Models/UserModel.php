<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $table = 'peserta';

    public function jumlahPesertaPerJenis()
    {
        return $this->db->table('peserta p')
            ->select('d.jenis, COUNT(p.id) as jumlah')
            ->join('diklat d', 'd.id = p.diklat_id')
            ->groupBy('d.jenis')
            ->get()
            ->getResultArray();
    }
}
