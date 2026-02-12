<?php

namespace App\Models;

use CodeIgniter\Model;


class KegiatanModel extends Model
{
    protected $table = 'kegiatan';
    protected $allowedFields = ['kode', 'nama', 'aktif'];
}
