<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
	// Makes reading things below nicer,
	// and simpler to change out script that's used.
	public $aliases = [
		'csrf'     => \CodeIgniter\Filters\CSRF::class,
		'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
		'honeypot' => \CodeIgniter\Filters\Honeypot::class,
		'filteradmin' => \App\Filters\FilterAdmin::class,
		'filterasma' => \App\Filters\FilterAsma::class,
		'filterasmk' => \App\Filters\FilterAsmk::class,
		'filterksma' => \App\Filters\FilterKsma::class,
		'filterksmk' => \App\Filters\FilterKsmk::class,
		'filteradmprov' => \App\Filters\FilterAdmProv::class,
	];

	// Always applied before every request
	public $globals = [
		'before' => [
			'filteradmin' => ['except' => [
				'/', 'auth/*',
			]],
			'filterasma' => ['except' => [
				'/', 'auth/*',
			]],
			'filterasmk' => ['except' => [
				'/', 'auth/*',
			]],
			'filterksma' => ['except' => [
				'/', 'auth/*',
			]],
			'filterksmk' => ['except' => [
				'/', 'auth/*',
			]],
			//'honeypot'
			// 'csrf',
		],
		'after'  => [
			'filteradmin' => ['except' => [
				'home', 'home/*',
				'data-user',
				'data-user/*',
				'data-sekolah',
				'data-sekolah/*',
				'data-kabupaten',
				'data-kabupaten/*',
				'data-kecamatan',
				'data-kecamatan/*',
				'data-mapel',
				'data-mapel/*',
				'data-sarana',
				'data-sarana/*',
				'data-inventaris-barang',
				'data-inventaris-barang/*',
				'data-golongan',
				'data-golongan/*',
				'data-tahun-akademik',
				'data-tahun-akademik/*',
				'data-bidang-keahlian',
				'data-bidang-keahlian/*',
				'data-program-keahlian',
				'data-program-keahlian/*',
				'data-paket-keahlian',
				'data-paket-keahlian/*',
				'api/data-sekolah',
				'api/data-sekolah/*',
				'my-profil',
				'my-profil/*',
			]],
			'filterasma' => ['except' => [
				'home', 'home/*',
				'profil-sekolah',
				'profil-sekolah/*',
				'data-guru',
				'data-guru/*',
				'data-pegawai',
				'data-pegawai/*',
				'data-siswa',
				'data-siswa/*',
				'data-kebutuhan',
				'data-kebutuhan/*',
				'data-sarpras',
				'data-sarpras/*',
				'data-inventaris',
				'data-inventaris/*',
				'data-siswa-masuk',
				'data-siswa-masuk/*',
				'data-siswa-keluar',
				'data-siswa-keluar/*',
				'api/data-siswa',
				'api/data-siswa/*',
				'buku-induk',
				'buku-induk/*',
				'data-arsip',
				'data-arsip/*',
				'my-profil',
				'my-profil/*',
				'generate',
				'generate/*',
			]],
			'filterasmk' => ['except' => [
				'home', 'home/*',
				'profil-sekolah',
				'profil-sekolah/*',
				'data-guru',
				'data-guru/*',
				'data-pegawai',
				'data-pegawai/*',
				'data-siswa',
				'data-siswa/*',
				'data-kebutuhan',
				'data-kebutuhan/*',
				'data-sarpras',
				'data-sarpras/*',
				'data-inventaris',
				'data-inventaris/*',
				'data-siswa-masuk',
				'data-siswa-masuk/*',
				'data-siswa-keluar',
				'data-siswa-keluar/*',
				'api/data-siswa',
				'api/data-siswa/*',
				'buku-induk',
				'buku-induk/*',
				'data-arsip',
				'data-arsip/*',
				'my-profil',
				'my-profil/*',
				'generate',
				'generate/*',
			]],
			'filterksma' => ['except' => [
				'home', 'home/*',
				'my-profil',
				'my-profil/*',
				'sekolah',
				'laporan-bulanan',
				'laporan-bulanan/filter',
				'generate-laporan',
				'generate-laporan/*',
			]],
			'filterksmk' => ['except' => [
				'home', 'home/*',
				'my-profil',
				'my-profil/*',
				'sekolah',
				'laporan-bulanan',
				'laporan-bulanan/filter',
			]],
			'filteradmprov' => ['except' => [
				'home', 'home/*',
				'my-profil',
				'my-profil/*',
				'sekolah-all',
			]],
			'toolbar',
			//'honeypot'
		],
	];

	// Works on all of a particular HTTP method
	// (GET, POST, etc) as BEFORE filters only
	//     like: 'post' => ['CSRF', 'throttle'],
	public $methods = [];

	// List filter aliases and any before/after uri patterns
	// that they should run on, like:
	//    'isLoggedIn' => ['before' => ['account/*', 'profiles/*']],
	public $filters = [];
}
