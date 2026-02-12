<?php

namespace App\Modules\Diklat\Models;

use CodeIgniter\Model;

class BiayaDiklatModel extends Model
{
    protected $table = 'data_biaya_diklat';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'diklat_id',
        'tgl',
        'tarif',
        'satuan',
        'lama',
        'orang',
        'qty',
        'nominal',
        'subtotal'
    ];
}
