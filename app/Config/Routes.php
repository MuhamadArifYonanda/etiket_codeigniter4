<?php

use CodeIgniter\Controller;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('login', 'Login::index');
$routes->post('login', 'Login::login_action');
$routes->get('logout', 'Login::logout');
$routes->get('admin/dashboard', 'Admin\Dashboard::dashboard', ['filter' => 'adminFilter']);

$routes->group('admin', function ($routes) {
    $routes->get('data_atraksi', 'Admin\Data_Atraksi::data_atraksi', ['filter' => 'adminFilter']); // Route untuk menampilkan data atraksi
    $routes->get('add_atraksi', 'Admin\Data_Atraksi::addAtraksi', ['filter' => 'adminFilter']); // Route untuk form tambah atraksi
    $routes->post('data_atraksi/save', 'Admin\Data_Atraksi::simpanAtraksi', ['filter' => 'adminFilter']); // Route untuk menyimpan data atraksi baru
    $routes->get('editAtraksi(:any)', 'Admin\Data_Atraksi::editAtraksi/$1', ['filter' => 'adminFilter']); // Route untuk form edit atraksi
    $routes->post('data_atraksi/update', 'Admin\Data_Atraksi::updateAtraksi', ['filter' => 'adminFilter']); // Route untuk update data atraksi
    $routes->get('data_atraksi/delete/(:any)', 'Admin\Data_Atraksi::deleteAtraksi/$1', ['filter' => 'adminFilter']); // Route untuk menghapus data atraksi
});

// Routes untuk Data_Deskripsi Controller
$routes->group('admin', function ($routes) {
    $routes->get('data_deskripsi', 'Admin\Data_Deskripsi::data_deskripsi', ['filter' => 'adminFilter']); // Menampilkan daftar deskripsi
    $routes->get('add_deskripsi', 'Admin\Data_Deskripsi::showAddDeskripsi', ['filter' => 'adminFilter']); // Menampilkan form tambah deskripsi
    $routes->post('data_deskripsi/save', 'Admin\Data_Deskripsi::processAddDeskripsi', ['filter' => 'adminFilter']); // Menyimpan deskripsi baru
    $routes->get('editDeskripsi(:segment)', 'Admin\Data_Deskripsi::editDeskripsi/$1', ['filter' => 'adminFilter']); // Menampilkan form edit berdasarkan kode deskripsi
    $routes->post('data_deskripsi/update', 'Admin\Data_Deskripsi::update', ['filter' => 'adminFilter']); // Mengupdate data deskripsi yang diedit
    $routes->get('data_deskripsi/delete/(:segment)', 'Admin\Data_Deskripsi::deleteDeskripsi/$1', ['filter' => 'adminFilter']); // Menghapus deskripsi berdasarkan kode
    $routes->get('data_pengunjung', 'Admin\Data_Pengunjung::data_pengunjung', ['filter' => 'adminFilter']);
    $routes->get('data_pemesanan', 'Admin\Data_Pemesanan::data_pemesanan', ['filter' => 'adminFilter']);
    $routes->get('pembayaran/(:any)', 'Admin\Data_Pembayaran::addPembayaran/$1');
    $routes->post('simpanPembayaran', 'Admin\Data_Pembayaran::simpanPembayaran');
    $routes->get('data_pembayaran', 'Admin\Data_Pembayaran::data_pembayaran', ['filter' => 'adminFilter']); // Route untuk menampilkan halaman utama data_pembayaran
    $routes->get('payment/(:any)', 'Admin\Payment::index/$1');
    $routes->post('payment/create', 'Admin\Payment::createPayment');
    $routes->get('transaksi', 'Admin\Transaksi::viewTransaksi', ['filter' => 'adminFilter']);
    $routes->post('cetak_laporan', 'Admin\DataLaporanController::cetak_laporan', ['filter' => 'adminFilter']);
    $routes->post('cetak_pdf', 'Admin\DataLaporanController::cetak_pdf', ['filter' => 'adminFilter']);
    $routes->get('laporan_filter', 'Admin\DataLaporanController::index', ['filter' => 'adminFilter']);
});


$routes->get('/', 'Pengunjung::index'); // Untuk landing page
$routes->get('readmore(:any)', 'Admin\Data_Deskripsi::readMore/$1');
$routes->get('add_pengunjung/(:any)', 'Admin\Data_Pengunjung::addPengunjung/$1'); // Untuk menampilkan halaman add_pengunjung dengan kode_tiket
$routes->get('tiket', 'TiketController::addPemesanan'); // Untuk menampilkan halaman pemesanan
$routes->post('tambah', 'TiketController::tambahTiket'); // Untuk memproses tambahTiket
$routes->post('pengunjung/add_pengunjung/save', 'Admin\Data_Pengunjung::simpanPengunjung'); // Untuk memproses tambahTiket$

$routes->post('admin/payment/process_result', 'Admin\Payment::processResult');
$routes->get('pengunjung/cetak_tiket/(:any)', 'Admin\CetakTiket::view/$1');

$routes->post('admin/payment/handleNotification', 'Admin\Payment::handleNotification');

// app/Config/Routes.php

$routes->post('/midtrans/notification', 'Admin\Payment::notificationHandler');

$routes->group('admin', function ($routes) {
$routes->get('user', 'Admin\UserController::data_user');
$routes->get('/user/create', 'Admin\UserController::create');
$routes->post('/user/store', 'Admin\UserController::store');
$routes->get('/user/edit/(:num)', 'Admin\UserController::edit/$1');
$routes->post('/user/update/(:num)', 'Admin\UserController::update/$1');
$routes->post('/user/delete/(:num)', 'Admin\UserController::delete/$1');
});


$routes->get('pemimpin', 'DashboardPemimpin::dashboard', ['filter' => 'PemimpinFilter']);
$routes->get('pemimpin/filter_laporan', 'DashboardPemimpin::laporan', ['filter' => 'PemimpinFilter']);
$routes->post('pemimpin/cetak_laporan', 'DashboardPemimpin::cetak_laporan', ['filter' => 'PemimpinFilter']);
$routes->post('pemimpin/cetak_pdf', 'DashboardPemimpin::cetak_pdf', ['filter' => 'PemimpinFilter']);
$routes->get('pemimpin/data_user', 'UserController::index', ['filter' => 'PemimpinFilter']);
$routes->get('pemimpin/tambah_user', 'UserController::create', ['filter' => 'PemimpinFilter']);
$routes->post('pemimpin/insert_user', 'UserController::store', ['filter' => 'PemimpinFilter']);
$routes->get('pemimpin/edit/(:num)', 'UserController::edit/$1', ['filter' => 'PemimpinFilter']);
$routes->post('pemimpin/updateUser', 'UserController::updateUser', ['filter' => 'PemimpinFilter']);
$routes->get('pemimpin/delete/(:num)', 'UserController::delete/$1', ['filter' => 'PemimpinFilter']);


