<?php

namespace App\Modules\Master\Models;

use CodeIgniter\Model;

class KegiatanModel extends \CodeIgniter\Model
{
    protected $table = 'kegiatan'; // HARUS 'kegiatan', bukan 'data_kegiatan'
    protected $primaryKey = 'id';
    protected $allowedFields = ['kode','nama','aktif'];
}
