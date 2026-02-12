<?php


namespace App\Modules\Dashboard\Controllers;


use App\Controllers\BaseController;
use App\Modules\Master\Models\PelatihanModel;


class DashboardLaporan extends BaseController
{
public function index()
{
    $model = model('App\Modules\Dashboard\Models\DashboardModel');

    $tahun = $this->request->getGet('tahun') ?? date('Y');

    $data = $model->grafikPerBulan($tahun);

    // default agar tidak undefined
    $jumlah_internal = array_fill(1, 12, 0);
    $jumlah_eksternal = array_fill(1, 12, 0);

    foreach ($data as $row) {
        if ($row['jenis'] == 'internal') {
            $jumlah_internal[(int)$row['bulan']] = (int)$row['total'];
        } else {
            $jumlah_eksternal[(int)$row['bulan']] = (int)$row['total'];
        }
    }

    return view('Dashboard/laporan', [
        'tahun' => $tahun,
        'jumlah_internal' => array_values($jumlah_internal),
        'jumlah_eksternal' => array_values($jumlah_eksternal),
    ]);
}

}