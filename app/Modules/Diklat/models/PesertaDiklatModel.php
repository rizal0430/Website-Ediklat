<?php

namespace App\Modules\Diklat\Models;

use CodeIgniter\Model;

class PesertaDiklatModel extends Model
{
    protected $table = 'data_peserta_diklat';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'diklat_id',
        'nama',
        'identitas',
        'jk',
        'telp'
    ];
}
