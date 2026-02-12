<?php

namespace App\Modules\Master\Models;

use CodeIgniter\Model;

class FakultasModel extends Model
{
    protected $table = 'data_fakultas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kode', 'nama', 'aktif'];
}
