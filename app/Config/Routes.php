<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/home', 'Home::index');
//API
$routes->resource('/api/data-sekolah', ['controller' => 'Api\Sekolah']);
$routes->resource('/api/data-siswa', ['controller' => 'Api\Siswa']);
//Routes Data Guru
$routes->get('/data-guru', 'DataGuru::dataguru');
$routes->get('/data-guru', 'DataGuru::dataguru');
$routes->get('/data-guru/add', 'DataGuru::add');
$routes->add('/data-guru/save', 'DataGuru::save');
$routes->delete('/data-guru/(:num)', 'DataGuru::delete/$1');
$routes->get('/data-guru/edit/(:segment)', 'DataGuru::edit/$1');
$routes->add('/data-guru/update/(:segment)', 'DataGuru::update/$1');
//Routes AJAX
$routes->get('/profil-sekolah/kabupaten', 'Profil::datakab');
$routes->get('/profil-sekolah/kecamatan/(:segment)', 'Profil::datakec/$1');
// ========================================================
//Routes Profil
$routes->get('/profil-sekolah', 'Profil::profil');
$routes->get('/profil-sekolah/add', 'Profil::add');
$routes->add('/profil-sekolah/save', 'Profil::save');
$routes->get('/profil-sekolah/edit/(:segment)', 'Profil::edit/$1');
$routes->add('/profil-sekolah/update/(:segment)', 'Profil::update/$1');
$routes->get('/profil-sekolah/bangunan', 'Profil::bangunan');
$routes->get('/profil-sekolah/bangunan/add', 'Profil::addbangunan');
$routes->add('/profil-sekolah/bangunan/save', 'Profil::savebangunan');
$routes->get('/profil-sekolah/bangunan/edit/(:segment)', 'Profil::editbangunan/$1');
$routes->add('/profil-sekolah/bangunan/update/(:segment)', 'Profil::updatebangunan/$1');
//Routes Data Pegawai
$routes->get('/data-pegawai', 'DataPegawai::datapegawai');
$routes->get('/data-pegawai/add', 'DataPegawai::add');
$routes->add('/data-pegawai/save', 'DataPegawai::save');
$routes->delete('/data-pegawai/(:num)', 'DataPegawai::delete/$1');
$routes->get('/data-pegawai/edit/(:segment)', 'DataPegawai::edit/$1');
$routes->add('/data-pegawai/update/(:segment)', 'DataPegawai::update/$1');
//Routes Data Siswa
$routes->get('/data-siswa', 'DataSiswa::datasiswa');
$routes->get('/data-siswa/naik-kelas', 'DataSiswa::datasiswanaik');
$routes->add('/data-siswa/up', 'DataSiswa::naik');
$routes->get('/data-siswa/add', 'DataSiswa::add');
$routes->add('/data-siswa/save', 'DataSiswa::save');
$routes->delete('/data-siswa/(:num)', 'DataSiswa::delete/$1');
$routes->get('/data-siswa/edit/(:segment)', 'DataSiswa::edit/$1');
$routes->add('/data-siswa/update/(:segment)', 'DataSiswa::update/$1');
//Routes Data Kebutuhan Guru
$routes->get('/data-kebutuhan', 'DataKebutuhan::datakebutuhan');
$routes->get('/data-kebutuhan/add', 'DataKebutuhan::add');
$routes->add('/data-kebutuhan/save', 'DataKebutuhan::save');
$routes->delete('/data-kebutuhan/(:num)', 'DataKebutuhan::delete/$1');
$routes->get('/data-kebutuhan/edit/(:segment)', 'DataKebutuhan::edit/$1');
$routes->add('/data-kebutuhan/update/(:segment)', 'DataKebutuhan::update/$1');
//Routes Data Sarpras
$routes->get('/data-sarpras', 'DataSarpras::datasarpras');
$routes->get('/data-sarpras/add', 'DataSarpras::add');
$routes->add('/data-sarpras/save', 'DataSarpras::save');
$routes->delete('/data-sarpras/(:num)', 'DataSarpras::delete/$1');
$routes->get('/data-sarpras/edit/(:segment)', 'DataSarpras::edit/$1');
$routes->add('/data-sarpras/update/(:segment)', 'DataSarpras::update/$1');
//Routes Data Inventaris
$routes->get('/data-inventaris', 'DataInventaris::datainventaris');
$routes->get('/data-inventaris/add', 'DataInventaris::add');
$routes->add('/data-inventaris/save', 'DataInventaris::save');
$routes->delete('/data-inventaris/(:num)', 'DataInventaris::delete/$1');
$routes->get('/data-inventaris/edit/(:segment)', 'DataInventaris::edit/$1');
$routes->add('/data-inventaris/update/(:segment)', 'DataInventaris::update/$1');
//Routes User
$routes->get('data-user', 'User::user');
$routes->get('data-user/add', 'User::add');
$routes->add('data-user/save', 'User::save');
$routes->get('data-user/delete/(:num)', 'User::delete/$1');
$routes->get('data-user/edit/(:segment)', 'User::edit/$1');
$routes->add('data-user/update/(:segment)', 'User::update/$1');
//Routes Data Sekolah
$routes->get('/data-sekolah', 'DataSekolah::datasekolah');
$routes->get('/data-sekolah/add', 'DataSekolah::add');
$routes->add('/data-sekolah/save', 'DataSekolah::save');
$routes->delete('/data-sekolah/(:num)', 'DataSekolah::delete/$1');
$routes->get('/data-sekolah/edit/(:segment)', 'DataSekolah::edit/$1');
$routes->add('/data-sekolah/update/(:segment)', 'DataSekolah::update/$1');
//Routes Data Kabupaten
$routes->get('/data-kabupaten', 'DataKabupaten::datakab');
$routes->get('/data-kabupaten/add', 'DataKabupaten::add');
$routes->add('/data-kabupaten/save', 'DataKabupaten::save');
$routes->delete('/data-kabupaten/(:num)', 'DataKabupaten::delete/$1');
$routes->get('/data-kabupaten/edit/(:segment)', 'DataKabupaten::edit/$1');
$routes->add('/data-kabupaten/update/(:segment)', 'DataKabupaten::update/$1');
//Routes Data Kecamatan
$routes->get('/data-kecamatan', 'DataKecamatan::datakec');
$routes->get('/data-kecamatan/add', 'DataKecamatan::add');
$routes->add('/data-kecamatan/save', 'DataKecamatan::save');
$routes->delete('/data-kecamatan/(:num)', 'DataKecamatan::delete/$1');
$routes->get('/data-kecamatan/edit/(:segment)', 'DataKecamatan::edit/$1');
$routes->add('/data-kecamatan/update/(:segment)', 'DataKecamatan::update/$1');
//Routes Data Mata Pelajaran
$routes->get('/data-mapel', 'DataMapel::datamapel');
$routes->get('/data-mapel/add', 'DataMapel::add');
$routes->add('/data-mapel/save', 'DataMapel::save');
$routes->delete('/data-mapel/(:num)', 'DataMapel::delete/$1');
$routes->get('/data-mapel/edit/(:segment)', 'DataMapel::edit/$1');
$routes->add('/data-mapel/update/(:segment)', 'DataMapel::update/$1');
//Routes Data Siswa Masuk
$routes->get('/data-siswa-masuk', 'SiswaMasuk::datasiswam');
$routes->get('/data-siswa-masuk/add', 'SiswaMasuk::add');
$routes->add('/data-siswa-masuk/save', 'SiswaMasuk::save');
$routes->delete('/data-siswa-masuk/(:num)', 'SiswaMasuk::delete/$1');
//Routes Data Siswa Keluar
$routes->get('/data-siswa-keluar', 'SiswaKeluar::datasiswak');
$routes->get('/data-siswa-keluar/add', 'SiswaKeluar::add');
$routes->add('/data-siswa-keluar/save', 'SiswaKeluar::save');
$routes->delete('/data-siswa-keluar/(:num)', 'SiswaKeluar::delete/$1');
//Routes Data Buku Induk Siswa
$routes->get('/buku-induk', 'BukuInduk::bukuinduk');
$routes->get('/buku-induk/add', 'BukuInduk::add');
$routes->add('/buku-induk/save', 'BukuInduk::save');
$routes->delete('/buku-induk/(:num)', 'BukuInduk::delete/$1');
//Routes Data Sarana
$routes->get('/data-sarana', 'DataSarana::datasarana');
$routes->get('/data-sarana/add', 'DataSarana::add');
$routes->add('/data-sarana/save', 'DataSarana::save');
$routes->delete('/data-sarana/(:num)', 'DataSarana::delete/$1');
$routes->get('/data-sarana/edit/(:segment)', 'DataSarana::edit/$1');
$routes->add('/data-sarana/update/(:segment)', 'DataSarana::update/$1');
//Routes Data Golongan
$routes->get('/data-golongan', 'DataGolongan::datagolongan');
$routes->get('/data-golongan/add', 'DataGolongan::add');
$routes->add('/data-golongan/save', 'DataGolongan::save');
$routes->delete('/data-golongan/(:num)', 'DataGolongan::delete/$1');
$routes->get('/data-golongan/edit/(:segment)', 'DataGolongan::edit/$1');
$routes->add('/data-golongan/update/(:segment)', 'DataGolongan::update/$1');
//Routes Data Tahun Akademik
$routes->get('/data-tahun-akademik', 'DataTa::datata');
$routes->get('/data-tahun-akademik/add', 'DataTa::add');
$routes->add('/data-tahun-akademik/save', 'DataTa::save');
$routes->delete('/data-tahun-akademik/(:num)', 'DataTa::delete/$1');
$routes->get('/data-tahun-akademik/edit/(:segment)', 'DataTa::edit/$1');
$routes->add('/data-tahun-akademik/update/(:segment)', 'DataTa::update/$1');
//Routes Login
$routes->get('/', 'Auth::index');
$routes->add('/auth/verify', 'Auth::cek');
$routes->get('/auth/logout', 'Auth::logout');
/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
