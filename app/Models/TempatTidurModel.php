<?php

namespace App\Models;

use CodeIgniter\Model;

class TempatTidurModel extends Model
{
    protected $table = 'tempat_tidur';
    protected $allowedFields = ['kode', 'nama', 'ruangan_id', 'aktif'];
}



