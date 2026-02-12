<?php

namespace App\Modules\Diklat\Models;

use CodeIgniter\Model;

class DiklatModel extends Model
{
    
    protected $table = 'data_diklat';
    protected $primaryKey = 'id';
    protected $allowedFields = [
    'no_diklat',
    'instansi_id',
    'fakultas_id',
    'kegiatan_id',
    'tgl_mulai',
    'tgl_akhir',
    'ketua',
    'ruangan',
    'keterangan',
    'status_diklat',
    'status_bayar',
    'total_biaya',
    'no_telp',   // ← WAJIB ADA
    ];


    public function getAll()
    {
        return $this->db->table('data_diklat d')
            ->select('
                d.*,
                i.nama AS nama_instansi,
                f.nama AS nama_fakultas,
                k.nama AS nama_kegiatan,
                (SELECT COUNT(*) FROM data_peserta_diklat WHERE diklat_id=d.id) AS peserta,
                (SELECT IFNULL(SUM(subtotal),0) FROM data_biaya_diklat WHERE diklat_id=d.id) AS total_biaya
            ')
            ->join('data_instansi i','i.id = d.instansi_id','left')
            ->join('data_fakultas f','f.id = d.fakultas_id','left')
            ->join('kegiatan k','k.id = d.kegiatan_id','left')
            ->orderBy('d.id','DESC')
            ->get()->getResultArray();
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
            ->join('data_instansi i','i.id = d.instansi_id','left')
            ->join('data_fakultas f','f.id = d.fakultas_id','left')
            ->join('kegiatan k','k.id = d.kegiatan_id','left')
            ->where('d.id',$id)
            ->get()->getRowArray();
    }

    public function getFiltered($filter)
    {
    $builder = $this->db->table('data_diklat d')
        ->select('
            d.*,
            i.nama AS nama_instansi,
            f.nama AS nama_fakultas,
            k.nama AS nama_kegiatan,
            COUNT(p.id) AS peserta
        ')
        ->join('data_instansi i','i.id=d.instansi_id','left')
        ->join('data_fakultas f','f.id=d.fakultas_id','left')
        ->join('kegiatan k','k.id=d.kegiatan_id','left')
        ->join('data_peserta_diklat p','p.diklat_id=d.id','left')
        ->groupBy('d.id')
        ->orderBy('d.id','DESC');

    if (!empty($filter['instansi_id'])) {
        $builder->where('d.instansi_id', $filter['instansi_id']);
    }

    if (!empty($filter['fakultas_id'])) {
        $builder->where('d.fakultas_id', $filter['fakultas_id']);
    }

    if (!empty($filter['kegiatan_id'])) {
        $builder->where('d.kegiatan_id', $filter['kegiatan_id']);
    }

    if (!empty($filter['status_diklat']) && $filter['status_diklat'] != 'semua') {
        $builder->where('d.status_diklat', $filter['status_diklat']);
    }

    return $builder->get()->getResultArray();
    }

    }


