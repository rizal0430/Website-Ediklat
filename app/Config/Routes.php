<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ===============================
// DEFAULT
// ===============================
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

// ===============================
// ROOT
// ===============================


// ===============================
// ===============================
// DASHBOARD (MODULE)
// ===============================
$routes->get('/', '\App\Modules\Dashboard\Controllers\Dashboard::index');
$routes->get('dashboard', '\App\Modules\Dashboard\Controllers\Dashboard::index');


// ===============================
// MASTER DATA
// ===============================
$routes->group('master', ['namespace' => 'App\Modules\Master\Controllers'], function ($routes) {

    // Jenis Instansi
    $routes->get('jenis-instansi', 'JenisInstansi::index');
    $routes->get('jenis-instansi/create', 'JenisInstansi::create');
    $routes->post('jenis-instansi/store', 'JenisInstansi::store');
    $routes->get('jenis-instansi/edit/(:num)', 'JenisInstansi::edit/$1');
    $routes->post('jenis-instansi/update/(:num)', 'JenisInstansi::update/$1');
    $routes->get('jenis-instansi/delete/(:num)', 'JenisInstansi::delete/$1');

    // Data Instansi
    $routes->get('data-instansi', 'DataInstansi::index');
    $routes->add('data-instansi/create', 'DataInstansi::create');
    $routes->add('data-instansi/store', 'DataInstansi::store');
    $routes->add('data-instansi/edit/(:num)', 'DataInstansi::edit/$1');
    $routes->add('data-instansi/update/(:num)', 'DataInstansi::update/$1');
    $routes->get('data-instansi/delete/(:num)', 'DataInstansi::delete/$1');

   // Data Fakultas
    $routes->get('data-fakultas', 'Fakultas::index');
    $routes->post('data-fakultas/store', 'Fakultas::store');
    $routes->post('data-fakultas/update/(:num)', 'Fakultas::update/$1');
    $routes->get('data-fakultas/delete/(:num)', 'Fakultas::delete/$1');

    // Data Ruangan
    $routes->get('ruangan', 'Ruangan::index');
    $routes->post('ruangan/store', 'Ruangan::store');
    $routes->post('ruangan/update/(:num)', 'Ruangan::update/$1');
    $routes->get('ruangan/delete/(:num)', 'Ruangan::delete/$1');



    // Tempat Tidur
    $routes->get('tempat-tidur', 'TempatTidur::index');
    $routes->post('tempat-tidur/store', 'TempatTidur::store');
    $routes->post('tempat-tidur/update/(:num)', 'TempatTidur::update/$1');
    $routes->get('tempat-tidur/delete/(:num)', 'TempatTidur::delete/$1');


    // Kegiatan
    $routes->get('kegiatan', 'Kegiatan::index');
    $routes->post('kegiatan/store', 'Kegiatan::store');
    $routes->post('kegiatan/update/(:num)', 'Kegiatan::update/$1');
    $routes->get('kegiatan/delete/(:num)', 'Kegiatan::delete/$1');

});
$routes->group('master', ['namespace' => 'App\Modules\Master\Controllers'], function ($routes) {

    // INTERNAL
    $routes->get('pelatihan_internal', 'PelatihanInternal::index');
    $routes->post('pelatihan_internal/store', 'PelatihanInternal::store');
    $routes->post('pelatihan_internal/update/(:num)', 'PelatihanInternal::update/$1');
    $routes->get('pelatihan_internal/delete/(:num)', 'PelatihanInternal::delete/$1');

    // EKSTERNAL
    $routes->get('pelatihan_eksternal', 'PelatihanEksternal::index');
    $routes->post('pelatihan_eksternal/store', 'PelatihanEksternal::store');
    $routes->post('pelatihan_eksternal/update/(:num)', 'PelatihanEksternal::update/$1');
    $routes->get('pelatihan_eksternal/delete/(:num)', 'PelatihanEksternal::delete/$1');
});
    // ================= LAPORAN =================
$routes->group('master', ['namespace' => 'App\Modules\Master\Controllers'], function ($routes) {

    $routes->get('laporan/internal', 'Laporan::internal');
    $routes->get('laporan/eksternal', 'Laporan::eksternal');
    $routes->get('laporan/export_excel', 'Laporan::export_excel');
    $routes->get('laporan/export_internal', 'Laporan::export_internal');
    $routes->get('laporan/export_eksternal', 'Laporan::export_eksternal');
    // alias URL lama (biar tidak 404)
    $routes->get('laporan_internal', 'Laporan::internal');
    $routes->get('laporan_eksternal', 'Laporan::eksternal');

});

$routes->group('master', ['namespace' => 'App\Modules\Master\Controllers'], function ($routes) {
    $routes->get('laporan', 'Laporan::index');
    $routes->get('laporan/export_excel', 'Laporan::export_excel');
});



// $routes->group('master', ['namespace' => 'App\Modules\Master\Controllers'], function($routes){

//     // ===== LAPORAN =====
//     $routes->group('laporan', function($routes){
//         $routes->get('internal', 'Laporan::internal');
//         $routes->get('eksternal', 'Laporan::eksternal');
//         $routes->get('export_excel', 'Laporan::export_excel');
//     });

// });


// $routes->group('diklat', ['namespace' => 'App\Modules\Diklat\Controllers'], function ($routes) {
//     $routes->get('/', 'Diklat::index');

///Diklat
// ================= DIKLAT =================

$routes->group('diklat',['namespace'=>'App\Modules\Diklat\Controllers'],function($routes){

    $routes->get('/', 'Diklat::index');
    $routes->post('store', 'Diklat::store');

    $routes->get('proses/(:num)', 'Diklat::proses/$1');
    $routes->post('simpanProses/(:num)', 'Diklat::simpanProses/$1');

    $routes->get('cetak/(:num)', 'Diklat::cetak/$1');
    $routes->get('delete/(:num)', 'Diklat::delete/$1');

});








// ===============================
// DIKLAT
// ==============================
// $routes->get('/diklat', '\App\Modules\Diklat\Controllers\Diklat::index');
// $routes->get('/diklat/create', '\App\Modules\Diklat\Controllers\Diklat::create');
// $routes->post('/diklat/store', '\App\Modules\Diklat\Controllers\Diklat::store');
// $routes->get('/diklat/edit/(:num)', '\App\Modules\Diklat\Controllers\Diklat::edit/$1');
// $routes->post('/diklat/update/(:num)', '\App\Modules\Diklat\Controllers\Diklat::update/$1');
// $routes->get('/diklat/delete/(:num)', '\App\Modules\Diklat\Controllers\Diklat::delete/$1');

// ===============================
// AUTH
// ===============================
$routes->get('login', 'App\Modules\Auth\Controllers\Auth::login');
$routes->post('login', 'App\Modules\Auth\Controllers\Auth::attempt');
$routes->get('logout', 'App\Modules\Auth\Controllers\Auth::logout');
