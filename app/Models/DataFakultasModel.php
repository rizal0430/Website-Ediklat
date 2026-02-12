<?php

namespace App\Models;

use CodeIgniter\Model;

class DataFakultasModel extends Model
{
    protected $table = 'data_fakultas';
    protected $allowedFields = ['kode', 'nama', 'aktif'];
}

