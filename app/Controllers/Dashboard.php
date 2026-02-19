<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        // jumlah peserta internal
        $internal = $db->table('data_peserta_diklat p')
            ->join('data_diklat d','d.id=p.diklat_id')
            ->where('d.kegiatan_id', 1) // asumsi 1 = internal
            ->countAllResults();

        // jumlah peserta eksternal
        $eksternal = $db->table('data_peserta_diklat p')
            ->join('data_diklat d','d.id=p.diklat_id')
            ->where('d.kegiatan_id', 2) // asumsi 2 = eksternal
            ->countAllResults();

        return view('dashboard', [
            'internal'  => $internal,
            'eksternal'=> $eksternal
        ]);
    }
    public function __construct()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }
    }
}
