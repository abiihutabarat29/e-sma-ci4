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
				'data-golongan',
				'data-golongan/*',
				'data-tahun-akademik',
				'data-tahun-akademik/*',
				'api/data-sekolah',
				'api/data-sekolah/*',
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
			]],
			'filterksma' => ['except' => [
				'home', 'home/*',
			]],
			'filterksmk' => ['except' => [
				'home', 'home/*',
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
