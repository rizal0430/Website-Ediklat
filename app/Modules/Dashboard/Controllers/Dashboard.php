<?php

namespace App\Modules\Dashboard\Controllers;

use App\Controllers\BaseController;
use App\Modules\Dashboard\Models\DashboardModel;

class Dashboard extends BaseController
{
   public function index()
{
    $model = new \App\Modules\Dashboard\Models\DashboardModel();

    $data = [
        'total_diklat'      => $model->totalDiklat(),
        'total_peserta'     => $model->totalPeserta(),
        'peserta_internal'  => $model->pesertaInternal(),
        'peserta_eksternal' => $model->pesertaEksternal(),
        'diklat_internal'   => $model->diklatInternal(),
        'diklat_eksternal'  => $model->diklatEksternal(),
        'internal'          => $model->pesertaInternal(),
        'eksternal'         => $model->pesertaEksternal(),
    ];

    return view('Dashboard/index', $data);
}

}
