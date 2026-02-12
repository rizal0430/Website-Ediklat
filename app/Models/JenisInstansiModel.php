<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisInstansiModel extends Model
{
    protected $table = 'jenis_instansi';
    protected $primaryKey = 'id';

    protected $allowedFields = ['kode', 'nama', 'aktif'];
    protected $useTimestamps = false;
}
