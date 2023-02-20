<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('LoginController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'LoginController::index');
$routes->get('login/index', 'LoginController::index');
$routes->get('/template/dashboard', 'Home::halaman_dashboard');

// Routes Login
$routes->post('/login/cekUser', 'LoginController::cekUser');
$routes->get('/login/keluar', 'LoginController::keluar');

// Routes Admin
$routes->get('admin/', 'AdminController::halaman_admin');
$routes->get('/admin/halaman_admin', 'AdminController::halaman_admin');
$routes->get('/admin/data_akun', 'AdminController::data_akun');
$routes->get('/admin/input_data', 'AdminController::input_data');
$routes->get('/admin/data_jabatan', 'AdminController::data_jabatan');
$routes->get('/admin/input_jabatan', 'AdminController::input_jabatan');
$routes->post('/admin/tambah_jabatan', 'AdminController::tambah_jabatan');
$routes->post('/admin/tambah_akun', 'AdminController::tambah_akun');
$routes->post('/admin/update_akun/(:num)', 'AdminController::update_akun/$1');
$routes->post('/admin/update_jabatan/(:num)', 'AdminController::update_jabatan/$1');
$routes->delete('/admin/hapus_akun/(:num)', 'AdminController::hapus_akun/$1');
$routes->delete('/admin/hapus_jabatan/(:num)', 'AdminController::hapus_jabatan/$1');


// Routes Pegawai
$routes->get('pegawai/', 'PegawaiController::halaman_pegawai');
$routes->get('/pegawai/halaman_pegawai', 'PegawaiController::halaman_pegawai');
$routes->get('/pegawai/halaman_input_permintaan', 'PegawaiController::halaman_input_permintaan');
$routes->post('/pegawai/simpan_permintaan', 'PegawaiController::save_permintaan');
$routes->post('/pegawai/simpan_permintaanSementara', 'PegawaiController::saveSementara_permintaan');
$routes->post('/pegawai/update_permintaan/(:num)', 'PegawaiController::Update_permintaan/$1');
$routes->delete('/pegawai/delete_permintaan/(:num)', 'PegawaiController::delete_permintaan/$1');
$routes->delete('/pegawai/delete_permintaan_barang/(:num)', 'PegawaiController::delete_permintaan_barang/$1');
$routes->get('/pegawai/delete_data_barang_sementara/(:num)', 'PegawaiController::delete_permintaan_sementara/$1');
$routes->get('/pegawai/halaman_permintaan', 'PegawaiController::halaman_permintaan');
$routes->get('/pegawai/barang_permintaan/(:num)', 'PegawaiController::halaman_Barangpermintaan/$1');
$routes->get('/pegawai/halaman_stok_barang', 'PegawaiController::halaman_stok_barang');
$routes->get('/pegawai/halaman_cetak_permintaan', 'PegawaiController::halaman_cetak_permintaan');
$routes->get('/pegawai/cetak_permintaan/(:num)', 'PegawaiController::cetak_permintaan/$1');
$routes->post('/pegawai/cetak_data_permintaan', 'PegawaiController::cetak_data_permintaan');


// Routes Subkor
$routes->get('subkor/', 'SubkorController::halaman_subkor');
$routes->get('/subkor/halaman_subkor', 'SubkorController::halaman_subkor');
$routes->get('/subkor/halaman_permintaan', 'SubkorController::halaman_permintaan');
$routes->post('/subkor/update_permintaan_persetujuan/(:num)', 'SubkorController::Update_permintaan/$1');
$routes->post('/subkor/setuju_permintaan/(:num)', 'SubkorController::Setuju_permintaan/$1');
$routes->post('/subkor/tolak_permintaan/(:num)', 'SubkorController::Tolak_permintaan/$1');
$routes->get('/subkor/halaman_data_stok_barang', 'SubkorController::halaman_stok_barang');
$routes->get('/subkor/halaman_stok_barang_masuk', 'SubkorController::halaman_stok_barangMasuk');

// Routes Operator Persediaan
$routes->get('operator/', 'OperatorController::halaman_operator');
$routes->get('/operator/halaman_operator', 'OperatorController::halaman_operator');
$routes->get('/operator/halaman_laporan_stok', 'OperatorController::halaman_laporan_stok');
$routes->post('/operator/cetak_laporan', 'OperatorController::cetak_laporan');
$routes->post('/operator/reset_opname', 'OperatorController::reset_opname');
// Routes Master Data
$routes->get('/operator/halaman_master_data_barang', 'OperatorController::halaman_data_barang');
$routes->get('/operator/halaman_input_data_barang', 'OperatorController::halaman_input_barang');
$routes->post('/operator/simpan_data_barang', 'OperatorController::save_dataBarang');
$routes->post('/operator/update_data_barang/(:num)', 'OperatorController::Update_dataBarang/$1');
$routes->delete('/operator/delete_data_barang/(:num)', 'OperatorController::delete_dataBarang/$1');
// Routes Barang Masuk
$routes->get('/operator/halaman_data_barang_masuk', 'OperatorController::halaman_data_barang_masuk');
$routes->get('/operator/halaman_input_barang_masuk', 'OperatorController::halaman_input_barang_masuk');
$routes->post('/operator/simpan_data_barang_masuk', 'OperatorController::save_dataBarang_masuk');
$routes->post('/operator/update_data_barang_masuk/(:num)', 'OperatorController::Update_dataBarang_masuk/$1');
$routes->delete('/operator/delete_data_barang_masuk/(:num)', 'OperatorController::delete_dataBarang_masuk/$1');
$routes->get('/operator/halaman_cetak_barang_masuk', 'OperatorController::halaman_cetak_barang_masuk');
$routes->post('/operator/laporan_barang_masuk', 'OperatorController::laporan_barang_masuk');
//Routes Hide Import CSV
$routes->get('/operator/hide_import_CSV','OperatorController::import');
$routes->post('/operator/save_hide_import_CSV','OperatorController::import');


// Routes Kabag
$routes->get('kabag/', 'KabagController::halaman_kabag');
$routes->get('/kabag/halaman_kabag', 'KabagController::halaman_kabag');
$routes->get('/kabag/halaman_permintaan', 'KabagController::halaman_permintaan');
$routes->get('/kabag/halaman_data_stok_barang', 'KabagController::halaman_stok_barang');
$routes->get('/kabag/halaman_stok_barang_masuk', 'KabagController::halaman_stok_barangMasuk');

//Routes API
$routes->resource('api/home', ['controller' => 'Api\Home']);
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
