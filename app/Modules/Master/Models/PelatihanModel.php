<?php

namespace App\Modules\Master\Models;

use CodeIgniter\Model;

class PelatihanModel extends Model
{
    protected $table = 'pelatihan';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'jenis','kegiatan','peserta','jabatan','jumlah',
        'penyelenggara','tempat','waktu','jam_hari',
        'biaya','sumber_anggaran','aktif'
    ];
    public function getFiltered($tahun=null,$search=null)
{
    $builder = $this->db->table('pelatihan_internal');

    if($tahun){
        $builder->where('YEAR(waktu)', $tahun);
    }

    if($search){
        $builder->groupStart()
            ->like('kegiatan',$search)
            ->orLike('peserta',$search)
            ->orLike('jabatan',$search)
            ->groupEnd();
    }

    return $builder->get()->getResultArray();
}

}
