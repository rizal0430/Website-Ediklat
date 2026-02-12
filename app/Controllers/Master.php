<?php

namespace App\Controllers;

class Master extends BaseController
{
    public function jenisInstansi()
    {
        return view('master/jenis_instansi', ['title' => 'Jenis Instansi']);
    }

    public function dataInstansi()
    {
        return view('master/data_instansi', ['title' => 'Data Instansi']);
    }

    public function dataFakultas()
    {
        return view('master/data_fakultas', ['title' => 'Data Fakultas']);
    }

    public function ruangan()
    {
        return view('master/ruangan', ['title' => 'Ruangan']);
    }

    public function tempatTidur()
    {
        return view('master/tempat_tidur', ['title' => 'Tempat Tidur']);
    }

    public function kegiatan()
    {
        return view('master/kegiatan', ['title' => 'Kegiatan']);
    }
}
