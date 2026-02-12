<?php

namespace App\Modules\Master\Models;

use CodeIgniter\Model;

class RuanganModel extends Model
{
    protected $table = 'data_ruangan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kode', 'nama', 'aktif'];
}
