<?php

namespace App\Modules\Dashboard\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $table = 'data_diklat';

    public function totalDiklat()
    {
        return $this->db->table('data_diklat')->countAllResults();
    }


    public function totalPeserta()
    {
        return $this->db->table('data_peserta_diklat')->countAllResults();
    }

    public function diklatInternal()
    {
        return $this->db->table('data_diklat d')
            ->join('data_instansi i','i.id=d.instansi_id')
            ->where('i.tipe','internal')
            ->countAllResults();
    }

    public function diklatEksternal()
    {
        return $this->db->table('data_diklat d')
            ->join('data_instansi i','i.id=d.instansi_id')
            ->where('i.tipe','eksternal')
            ->countAllResults();
    }

    public function pesertaInternal()
    {
        return $this->db->table('data_peserta_diklat p')
            ->join('data_diklat d','d.id=p.diklat_id')
            ->join('data_instansi i','i.id=d.instansi_id')
            ->where('i.tipe','internal')
            ->countAllResults();
    }

    public function pesertaEksternal()
    {
        return $this->db->table('data_peserta_diklat p')
            ->join('data_diklat d','d.id=p.diklat_id')
            ->join('data_instansi i','i.id=d.instansi_id')
            ->where('i.tipe','eksternal')
            ->countAllResults();
    }
}
