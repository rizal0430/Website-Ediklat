<?php

namespace App\Modules\Auth\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama',
        'email',
        'password',
        'role'
    ];

    protected $useTimestamps = false;
}
