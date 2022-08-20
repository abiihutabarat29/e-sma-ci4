<?php

namespace App\Controllers;

use App\Models\ProfilModel;
use App\Models\SiswaModel;
use App\Models\GuruModel;
use App\Models\PegawaiModel;
use App\Models\BukuIndukModel;

class Home extends BaseController
{
	protected $profilModel;
	protected $siswaModel;
	protected $guruModel;
	protected $pegawaiModel;
	protected $alumniModel;
	public function __construct()
	{
		$this->profilModel = new ProfilModel();
		$this->siswaModel = new SiswaModel();
		$this->guruModel = new GuruModel();
		$this->pegawaiModel = new PegawaiModel();
		$this->alumniModel = new BukuIndukModel();
	}
	public function index()
	{
		$npsn = session()->get('npsn');
		$data = array(
			'title'    => 'Home',
			'isi'      => 'home',
			'sekolah'    => $this->profilModel->countAllResults(),
			'siswa'    => $this->siswaModel->where('npsn', $npsn)->countAllResults(),
			'guru'    => $this->guruModel->where('npsn', $npsn)->countAllResults(),
			'pegawai'    => $this->pegawaiModel->where('npsn', $npsn)->countAllResults(),
			'alumni'    => $this->alumniModel->where('npsn', $npsn)->countAllResults(),
		);
		return view('layout/wrapper', $data);
	}

	// public function print($id)
	// {
	//     $data = array(
	//         'title'             => 'Lihat Laporan',
	//         'lapor'             => $this->LaporModel
	//             ->join('jenis', 'jenis.id = lapor.jenis', 'left')
	//             ->join('desa', 'desa.desa_kode = lapor.desa_user', 'left')
	//             ->join('kecamatan', 'kecamatan.kecamatan_id = lapor.kecamatan_user', 'left')
	//             ->find($id),
	//         'jenis_laporan'     => $this->JenisLaporanModel->findAll(),
	//     );

	//     $html = view('lapor/print', $data);

	//     // create new PDF document
	//     $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
	//     $pdf->setPrintHeader(false);
	//     $pdf->setPrintFooter(false);
	//     $pdf->SetTitle('Lihat Laporan');
	//     // $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);
	//     $pdf->SetMargins(15, 5, 15, 5);
	//     $pdf->AddPage();
	//     $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
	//     $this->response->setContentType('application/pdf');
	//     $pdf->Output('Laporan.pdf', 'I');
	// }

	// public function index()
	// {
	//     $id = session()->get('id');
	//     $data = array(
	//         'title'     => "Halaman Utama",
	//         'user'      => $this->UserModel->find(session()->get('id')),
	//         'me'   => $this->LaporModel
	//             ->where('id_user =', $id)
	//             ->join('users', 'users.id = lapor.id_user', 'left')
	//             ->orderBy('created', 'DESC')
	//             ->findAll(),
	//         'admin'   => $this->LaporModel
	//             ->where('status =', '0')
	//             ->join('users', 'users.id = lapor.id_user', 'left')
	//             ->orderBy('lapor_id', 'DESC')
	//             ->findAll(),
	//         'ketua'   => $this->LaporModel
	//             ->where('status =', '1')
	//             ->join('users', 'users.id = lapor.id_user', 'left')
	//             ->orderBy('lapor_id', 'DESC')
	//             ->findAll(),
	//         'komisi'   => $this->LaporModel
	//             ->where('status =', '2')
	//             ->join('users', 'users.id = lapor.id_user', 'left')
	//             ->orderBy('lapor_id', 'DESC')
	//             ->findAll(),
	//         'semualaporan'   => $this->LaporModel
	//             ->join('users', 'users.id = lapor.id_user', 'left')
	//             ->orderBy('lapor_id', 'DESC')
	//             ->findAll(),
	//         'tindaklanjut' => $this->HistoryModel
	//             ->join('users', 'users.id = history.response_id', 'left')
	//             ->findAll(),
	//         'afterverif'     => $this->LaporModel->where('status', '0')->countAllResults(),
	//         'afterdispo'     => $this->LaporModel->where('status', '1')->countAllResults(),
	//         'dispo'          => $this->LaporModel->where('status', '2')->countAllResults(),
	//         'total'          => $this->LaporModel->countAllResults(),
	//         'verif'          => $this->LaporModel->where('status', '1')->countAllResults(),
	//         'tindak'         => $this->LaporModel->orWhereIn('status', ['1', '2', '3'])->countAllResults(),
	//         'ditolak'        => $this->LaporModel->where('status', '4')->countAllResults(),
	//         'selesai'        => $this->LaporModel->where('status', '5')->countAllResults(),
	//     );
	//     echo view('dashboard', $data);
	// }
	//--------------------------------------------------------------------

}
