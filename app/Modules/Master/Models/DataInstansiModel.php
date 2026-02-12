<?php

namespace App\Modules\Master\Models;

use CodeIgniter\Model;

class DataInstansiModel extends Model
{
    protected $table = 'data_instansi';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'kode',
        'nama',
        'jenis_instansi_id',
        'aktif'
    ];

   public function getAll($q = null, $limit = 10)
    {
    $builder = $this->db->table('data_instansi i')

        ->select('i.*, j.nama AS jenis_nama')
        ->join('jenis_instansi j','j.id=i.jenis_instansi_id','left');

    if ($q) {
        $builder->groupStart()
            ->like('i.kode', $q)
            ->orLike('i.nama', $q)
            ->orLike('j.nama', $q)
        ->groupEnd();
    }

    return $builder->limit($limit)->get()->getResultArray();
    }


    public function getDetail($id)
{
    return $this->db->table('data_diklat d')
        ->select('
            d.*,
            i.nama AS nama_instansi,
            f.nama AS nama_fakultas,
            k.nama AS nama_kegiatan
        ')
        ->join('data_instansi i', 'i.id = d.instansi_id')
        ->join('data_fakultas f', 'f.id = d.fakultas_id')
        ->join('kegiatan k', 'k.id = d.kegiatan_id')
        ->where('d.id', $id)
        ->get()
        ->getRowArray();
}

}
