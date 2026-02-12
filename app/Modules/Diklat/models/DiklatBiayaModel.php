<?php

namespace App\Modules\Diklat\Models;

use CodeIgniter\Model;

class BiayaModel extends Model
{
    protected $table = 'diklat_biaya';
    protected $allowedFields = [
        'diklat_id','tanggal','tarif','satuan',
        'lama','orang','qty','nominal','subtotal'
    ];
}

