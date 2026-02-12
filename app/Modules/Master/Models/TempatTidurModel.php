<?php

namespace App\Modules\Master\Models;

use CodeIgniter\Model;

class TempatTidurModel extends Model
{
    protected $table = 'data_tempat_tidur';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kode', 'nama', 'aktif'];
}
