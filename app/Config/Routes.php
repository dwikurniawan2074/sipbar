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
// $routes->setAutoRoute(false);

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
$routes->get('/admin/', 'AdminController::halaman_admin');
$routes->get('/admin/halaman_admin', 'AdminController::halaman_admin');
$routes->get('/admin/data_akun', 'AdminController::data_akun');
$routes->get('/admin/input_data', 'AdminController::input_data');
$routes->post('/admin/tambah_akun', 'AdminController::tambah_akun');


// Routes Pegawai
$routes->get('/pegawai/', 'PegawaiController::halaman_pegawai');
$routes->get('/pegawai/halaman_pegawai', 'PegawaiController::halaman_pegawai');
$routes->get('/pegawai/halaman_input_permintaan', 'PegawaiController::halaman_input_permintaan');
$routes->post('/pegawai/simpan_permintaan', 'PegawaiController::save_permintaan');
$routes->delete('/pegawai/delete_permintaan/(:num)', 'PegawaiController::delete_permintaan/$1');
$routes->get('/pegawai/halaman_permintaan', 'PegawaiController::halaman_permintaan');
$routes->get('/pegawai/halaman_stok_barang', 'PegawaiController::halaman_stok_barang');



// Routes Subkor
$routes->get('/subkor/', 'SubkorController::halaman_subkor');
$routes->get('/subkor/halaman_subkor', 'SubkorController::halaman_subkor');
$routes->get('/subkor/halaman_permintaan', 'SubkorController::halaman_permintaan');
$routes->get('/subkor/halaman_stok_barang', 'SubkorController::halaman_stok_barang');


// Routes Operator Persediaan
$routes->get('/operator/', 'OperatorController::halaman_operator');
$routes->get('/operator/halaman_operator', 'OperatorController::halaman_operator');
$routes->get('/operator/halaman_permintaan', 'OperatorController::halaman_permintaan');
$routes->get('/operator/halaman_input_barang', 'OperatorController::halaman_input_barang');
$routes->get('/operator/halaman_laporan_stok', 'OperatorController::halaman_laporan_stok');


// Routes Kabag
$routes->get('/kabag/', 'KabagController::halaman_kabag');
$routes->get('/kabag/halaman_kabag', 'KabagController::halaman_kabag');
$routes->get('/kabag/halaman_permintaan', 'KabagController::halaman_permintaan');
$routes->get('/kabag/halaman_stok_barang', 'KabagController::halaman_stok_barang');


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
