<?php

namespace App\Controllers;

use App\Models\DataDiklatModel;

class Diklat extends BaseController
{
    public function index()
    {
        $model = new DataDiklatModel();

        return view('diklat/index', [
            'title' => 'Data Diklat',
            'diklat' => $model->getAllWithRelasi()
        ]);
    }
}
