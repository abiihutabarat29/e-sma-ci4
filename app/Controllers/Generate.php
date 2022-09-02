<?php

namespace App\Controllers;

use App\Models\ProfilModel;
use App\Models\BangunanModel;
use App\Models\KabupatenModel;
use App\Models\KecamatanModel;
use App\Models\SiswaModel;
use App\Models\GuruModel;
use App\Models\PegawaiModel;
use App\Models\BukuIndukModel;
use App\Models\MasukModel;
use App\Models\KeluarModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\RequestInterface;

class Generate extends BaseController
{
    protected $profilModel;
    protected $bangunanlModel;
    protected $kecamatanlModel;
    protected $siswaModel;
    protected $guruModel;
    protected $pegawaiModel;
    protected $alumniModel;
    protected $masukModel;
    protected $keluarModel;
    public function __construct()
    {
        $this->profilModel = new ProfilModel();
        $this->bangunanModel = new BangunanModel();
        $this->kabupatenModel = new KabupatenModel();
        $this->kecamatanModel = new KecamatanModel();
        $this->siswaModel = new SiswaModel();
        $this->guruModel = new GuruModel();
        $this->pegawaiModel = new PegawaiModel();
        $this->alumniModel = new BukuIndukModel();
        $this->masukModel = new MasukModel();
        $this->keluarModel = new KeluarModel();
    }
    public function index()
    {
        $data = array(
            'titlebar' => 'Generate Laporan Bulanan',
            'title' => 'Syarat & Ketentuan',
            'isi' => 'master/generate/index',
        );
        return view('layout/wrapper', $data);
    }
    //Fungsi generate laporan bulanan
    public function generate()
    {
        // Export Data Profil
        // Fetch Data Profil
        $npsn = session()->get('npsn');
        $p = $this->profilModel->where('npsn =', $npsn)->first();
        //custome bebera field
        $kabupaten = $p['kabupaten'] == '1209' ? 'ASAHAN' : 'BATU BARA';
        $namayys = $p['namayys'] == '' ? 'kosong' : $p['namayys'];
        $alamatyys = $p['alamatyys'] == '' ? 'kosong' : $p['alamatyys'];
        $spreadsheet = new Spreadsheet();
        // Design Table Identitas Sekolah
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'A. Identitas Sekolah');
        $sheet = $spreadsheet->getActiveSheet()->setTitle('A, B, C');
        $sheet->setCellValue('A2', '1.');
        $sheet->setCellValue('A3', '2.');
        $sheet->setCellValue('A4', '3.');
        $sheet->setCellValue('A5', '4.');
        $sheet->setCellValue('A6', '5.');
        $sheet->setCellValue('A7', '6.');
        $sheet->setCellValue('A8', '7.');
        $sheet->setCellValue('A9', '8.');
        $sheet->setCellValue('A10', '9.');
        $sheet->setCellValue('A11', '10.');
        $sheet->setCellValue('A12', '11.');
        $sheet->setCellValue('A13', '12.');
        $sheet->setCellValue('A14', '13.');
        $sheet->setCellValue('A15', '14.');
        $sheet->setCellValue('B2', 'Nama Sekolah');
        $sheet->setCellValue('B3', 'Status');
        $sheet->setCellValue('B4', 'Alamat/Kecamatan/Kode Pos');
        $sheet->setCellValue('B5', 'Telepon/Hp/Email');
        $sheet->setCellValue('B6', 'Tahun Berdiri');
        $sheet->setCellValue('B7', 'Nomor SIOP Terakhir');
        $sheet->setCellValue('B8', 'NPSN');
        $sheet->setCellValue('B9', 'NSS');
        $sheet->setCellValue('B10', 'NDS');
        $sheet->setCellValue('B11', 'Jenjang Akreditasi/Tahun');
        $sheet->setCellValue('B12', 'Standar Sekolah Bertaraf');
        $sheet->setCellValue('B13', 'Nama Yayasan Perguruan/Pendidikan');
        $sheet->setCellValue('B14', 'Alamat Yayasan');
        $sheet->setCellValue('B15', 'Waktu Belajar');
        $sheet->setCellValue('C2', ':');
        $sheet->setCellValue('C3', ':');
        $sheet->setCellValue('C4', ':');
        $sheet->setCellValue('C5', ':');
        $sheet->setCellValue('C6', ':');
        $sheet->setCellValue('C7', ':');
        $sheet->setCellValue('C8', ':');
        $sheet->setCellValue('C9', ':');
        $sheet->setCellValue('C10', ':');
        $sheet->setCellValue('C11', ':');
        $sheet->setCellValue('C12', ':');
        $sheet->setCellValue('C13', ':');
        $sheet->setCellValue('C14', ':');
        $sheet->setCellValue('C15', ':');
        $sheet->setCellValue('D2', $p['nama_sekolah']);
        $sheet->setCellValue('D3', $p['status']);
        $sheet->setCellValue('D4', "$p[alamat], $kabupaten, $p[kecamatan], $p[kodepos]");
        $sheet->setCellValue('D5', "$p[telepon], $p[email]");
        $sheet->setCellValue('D6', $p['thnberdiri']);
        $sheet->setCellValue('D7', $p['nosiop']);
        $sheet->setCellValue('D8', $p['npsn']);
        $sheet->setCellValue('D9', $p['nss']);
        $sheet->setCellValue('D10', $p['nds']);
        $sheet->setCellValue('D11', $p['akreditas']);
        $sheet->setCellValue('D12', $p['standar']);
        $sheet->setCellValue('D13', $namayys);
        $sheet->setCellValue('D14', $alamatyys);
        $sheet->setCellValue('D15', $p['waktub']);
        // Style Table
        $styleColumnCenter = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ];
        $styleNumberLeft = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
        ];
        $styleBorder = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $sheet->mergeCells('A1:D1');
        $sheet->getStyle('A1')->getFont()->setBold(true);
        // $sheet->getStyle('A1')->applyFromArray($styleColumnCenter);
        $sheet->getStyle('A2:A15')->applyFromArray($styleColumnCenter);
        $sheet->getStyle('D6:D10')->applyFromArray($styleNumberLeft);
        // $sheet->getStyle('A2:D15')->applyFromArray($styleBorder);
        // Style Auto Size
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        // ==============================================================================================
        // Export Data Keadaan Siswa dan Agama
        // Fetch Data Keadaan Siswa dan Agama
        $npsn = session()->get('npsn');
        //Fetc Rombel X,XI,XII
        $rombel = $this->siswaModel->join('mod_bangunan', 'mod_bangunan.id_sekolah = mod_siswa.id_sekolah', 'left')->where('mod_siswa.npsn =', $npsn)->first();
        $xmipa = $rombel['jkelasx_mipa'];
        $xiis = $rombel['jkelasx_iis'];
        $xbhs = $rombel['jkelasx_bhs'];
        $ximipa = $rombel['jkelasxi_mipa'];
        $xiiis = $rombel['jkelasxi_iis'];
        $xibhs = $rombel['jkelasxi_bhs'];
        $xiimipa = $rombel['jkelasxii_mipa'];
        $xiiiis = $rombel['jkelasxii_iis'];
        $xiibhs = $rombel['jkelasxii_bhs'];
        $rombelx = $xmipa + $xiis + $xbhs;
        $rombelxi = $ximipa + $xiiis + $xibhs;
        $rombelxii = $xiimipa + $xiiiis + $xiibhs;
        //Laki-laki-X-IPA
        $lxipa = $this->siswaModel->join('mod_bangunan', 'mod_bangunan.id_sekolah = mod_siswa.id_sekolah', 'left')->where('mod_siswa.npsn =', $npsn)->where('kelas', 'X')->where('jurusan', 'IPA')->where('jenis_kel', 'L')->countAllResults();
        //Laki-laki-XI-IPA
        $lxiipa = $this->siswaModel->join('mod_bangunan', 'mod_bangunan.id_sekolah = mod_siswa.id_sekolah', 'left')->where('mod_siswa.npsn =', $npsn)->where('kelas', 'XI')->where('jurusan', 'IPA')->where('jenis_kel', 'L')->countAllResults();
        //Laki-laki-XII-IPA
        $lxiiipa = $this->siswaModel->join('mod_bangunan', 'mod_bangunan.id_sekolah = mod_siswa.id_sekolah', 'left')->where('mod_siswa.npsn =', $npsn)->where('kelas', 'XII')->where('jurusan', 'IPA')->where('jenis_kel', 'L')->countAllResults();
        //X-IPA-Islam
        $xipai = $this->siswaModel->join('mod_bangunan', 'mod_bangunan.id_sekolah = mod_siswa.id_sekolah', 'left')->where('mod_siswa.npsn =', $npsn)->where('kelas', 'X')->where('jurusan', 'IPA')->where('agama', 'Islam')->countAllResults();
        //X-IPA-Kristen Protestan
        $xipakp = $this->siswaModel->join('mod_bangunan', 'mod_bangunan.id_sekolah = mod_siswa.id_sekolah', 'left')->where('mod_siswa.npsn =', $npsn)->where('kelas', 'X')->where('jurusan', 'IPA')->where('agama', 'Kristen Protestan')->countAllResults();
        //X-IPA-Kristen Katholik
        $xipakk = $this->siswaModel->join('mod_bangunan', 'mod_bangunan.id_sekolah = mod_siswa.id_sekolah', 'left')->where('mod_siswa.npsn =', $npsn)->where('kelas', 'X')->where('jurusan', 'IPA')->where('agama', 'Kristen Katholik')->countAllResults();
        //X-IPA-Kristen Hindu
        $xipah = $this->siswaModel->join('mod_bangunan', 'mod_bangunan.id_sekolah = mod_siswa.id_sekolah', 'left')->where('mod_siswa.npsn =', $npsn)->where('kelas', 'X')->where('jurusan', 'IPA')->where('agama', 'Hindu')->countAllResults();
        //X-IPA-Kristen Budha
        $xipab = $this->siswaModel->join('mod_bangunan', 'mod_bangunan.id_sekolah = mod_siswa.id_sekolah', 'left')->where('mod_siswa.npsn =', $npsn)->where('kelas', 'X')->where('jurusan', 'IPA')->where('agama', 'Budha')->countAllResults();
        //XI-IPA-Islam
        $xiipai = $this->siswaModel->join('mod_bangunan', 'mod_bangunan.id_sekolah = mod_siswa.id_sekolah', 'left')->where('mod_siswa.npsn =', $npsn)->where('kelas', 'XI')->where('jurusan', 'IPA')->where('agama', 'Islam')->countAllResults();
        //XI-IPA-Kristen Protestan
        $xiipakp = $this->siswaModel->join('mod_bangunan', 'mod_bangunan.id_sekolah = mod_siswa.id_sekolah', 'left')->where('mod_siswa.npsn =', $npsn)->where('kelas', 'XI')->where('jurusan', 'IPA')->where('agama', 'Kristen Protestan')->countAllResults();
        //XI-IPA-Kristen Katholik
        $xiipakk = $this->siswaModel->join('mod_bangunan', 'mod_bangunan.id_sekolah = mod_siswa.id_sekolah', 'left')->where('mod_siswa.npsn =', $npsn)->where('kelas', 'XI')->where('jurusan', 'IPA')->where('agama', 'Kristen Katholik')->countAllResults();
        //XI-IPA-Kristen Hindu
        $xiipah = $this->siswaModel->join('mod_bangunan', 'mod_bangunan.id_sekolah = mod_siswa.id_sekolah', 'left')->where('mod_siswa.npsn =', $npsn)->where('kelas', 'XI')->where('jurusan', 'IPA')->where('agama', 'Hindu')->countAllResults();
        //XI-IPA-Kristen Budha
        $xiipab = $this->siswaModel->join('mod_bangunan', 'mod_bangunan.id_sekolah = mod_siswa.id_sekolah', 'left')->where('mod_siswa.npsn =', $npsn)->where('kelas', 'XI')->where('jurusan', 'IPA')->where('agama', 'Budha')->countAllResults();
        //XII-IPA-Islam
        $xiiipai = $this->siswaModel->join('mod_bangunan', 'mod_bangunan.id_sekolah = mod_siswa.id_sekolah', 'left')->where('mod_siswa.npsn =', $npsn)->where('kelas', 'XII')->where('jurusan', 'IPA')->where('agama', 'Islam')->countAllResults();
        //XII-IPA-Kristen Protestan
        $xiiipakp = $this->siswaModel->join('mod_bangunan', 'mod_bangunan.id_sekolah = mod_siswa.id_sekolah', 'left')->where('mod_siswa.npsn =', $npsn)->where('kelas', 'XII')->where('jurusan', 'IPA')->where('agama', 'Kristen Protestan')->countAllResults();
        //XII-IPA-Kristen Katholik
        $xiiipakk = $this->siswaModel->join('mod_bangunan', 'mod_bangunan.id_sekolah = mod_siswa.id_sekolah', 'left')->where('mod_siswa.npsn =', $npsn)->where('kelas', 'XII')->where('jurusan', 'IPA')->where('agama', 'Kristen Katholik')->countAllResults();
        //XII-IPA-Kristen Hindu
        $xiiipah = $this->siswaModel->join('mod_bangunan', 'mod_bangunan.id_sekolah = mod_siswa.id_sekolah', 'left')->where('mod_siswa.npsn =', $npsn)->where('kelas', 'XII')->where('jurusan', 'IPA')->where('agama', 'Hindu')->countAllResults();
        //XII-IPA-Kristen Budha
        $xiiipab = $this->siswaModel->join('mod_bangunan', 'mod_bangunan.id_sekolah = mod_siswa.id_sekolah', 'left')->where('mod_siswa.npsn =', $npsn)->where('kelas', 'XII')->where('jurusan', 'IPA')->where('agama', 'Budha')->countAllResults();
        //==============================================
        $sheet->setCellValue('F1', 'B. Data Keadaan Siswa dan Bangunan');
        $sheet->setCellValue('F2', 'No');
        $sheet->setCellValue('F4', '1.');
        $sheet->setCellValue('F5', '2.');
        $sheet->setCellValue('F6', '3.');
        $sheet->setCellValue('F7', 'JUMLAH');
        $sheet->setCellValue('G2', 'Kelas/Program');
        $sheet->setCellValue('G4', 'X-IPA');
        $sheet->setCellValue('G5', 'XI-IPA');
        $sheet->setCellValue('G6', 'XII-IPA');
        $sheet->setCellValue('H2', 'SISWA');
        $sheet->setCellValue('H3', 'L');
        $sheet->setCellValue('H4', $lxipa);
        $sheet->setCellValue('H5', $lxiipa);
        $sheet->setCellValue('H6', $lxiiipa);
        $sheet->setCellValue('H7', '=SUM(H4:H6)');
        $sheet->setCellValue('I3', 'P');
        $sheet->setCellValue('I4', $lxipa);
        $sheet->setCellValue('I5', $lxiipa);
        $sheet->setCellValue('I6', $lxiiipa);
        $sheet->setCellValue('I7', '=SUM(I4:I6)');
        $sheet->setCellValue('J2', 'Jumlah Siswa');
        $sheet->setCellValue('J4', '=H4+I4');
        $sheet->setCellValue('J5', '=H5+I5');
        $sheet->setCellValue('J6', '=H6+I6');
        $sheet->setCellValue('J7', '=SUM(J4:J6)');
        $sheet->setCellValue('K2', 'Jumlah Kelas (Rombel)');
        $sheet->setCellValue('K4', $rombelx);
        $sheet->setCellValue('K5', $rombelxi);
        $sheet->setCellValue('K6', $rombelxii);
        $sheet->setCellValue('K7', '=SUM(K4:K6)');
        $sheet->setCellValue('L2', 'Agama');
        $sheet->setCellValue('L3', 'Islam');
        $sheet->setCellValue('L4', $xipai);
        $sheet->setCellValue('L5', $xiipai);
        $sheet->setCellValue('L6', $xiiipai);
        $sheet->setCellValue('L7', '=SUM(L4:L6)');
        $sheet->setCellValue('M3', 'Kristen Protestan');
        $sheet->setCellValue('M4', $xipakp);
        $sheet->setCellValue('M5', $xiipakp);
        $sheet->setCellValue('M6', $xiipakp);
        $sheet->setCellValue('M7', '=SUM(M4:M6)');
        $sheet->setCellValue('N3', 'Kristen Katholik');
        $sheet->setCellValue('N4', $xipakk);
        $sheet->setCellValue('N5', $xiipakk);
        $sheet->setCellValue('N6', $xiiipakk);
        $sheet->setCellValue('N7', '=SUM(N4:N6)');
        $sheet->setCellValue('O3', 'Hindu');
        $sheet->setCellValue('O4', $xipah);
        $sheet->setCellValue('O5', $xiipah);
        $sheet->setCellValue('O6', $xiiipah);
        $sheet->setCellValue('O7', '=SUM(O4:O6)');
        $sheet->setCellValue('P3', 'Budha');
        $sheet->setCellValue('P4', $xipab);
        $sheet->setCellValue('P5', $xiipab);
        $sheet->setCellValue('P6', $xiiipab);
        $sheet->setCellValue('P7', '=SUM(P4:P6)');
        $sheet->setCellValue('Q3', 'Jumlah');
        $sheet->setCellValue('Q4', '=SUM(L4:P4)');
        $sheet->setCellValue('Q5', '=SUM(L5:P5)');
        $sheet->setCellValue('Q6', '=SUM(L6:P6)');
        $sheet->setCellValue('Q7', '=SUM(Q4:Q6)');
        //Marge left
        $sheet->mergeCells('F1:Q1');
        $sheet->mergeCells('F7:G7');
        $sheet->mergeCells('H2:I2');
        $sheet->mergeCells('H2:I2');
        $sheet->mergeCells('L2:Q2');
        //Marge down
        $sheet->mergeCells('G2:G3');
        $sheet->mergeCells('F2:F3');
        $sheet->mergeCells('J2:J3');
        $sheet->mergeCells('K2:K3');
        //=========================
        $sheet->getStyle('F1')->getFont()->setBold(true);
        $sheet->getStyle('F2:Q7')->applyFromArray($styleColumnCenter);
        $sheet->getStyle('F2:Q7')->applyFromArray($styleBorder);
        $sheet->getStyle('G4:G6')->applyFromArray($styleNumberLeft);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setWidth(25, 'pt');
        $sheet->getColumnDimension('I')->setWidth(25, 'pt');
        $sheet->getColumnDimension('J')->setWidth(70, 'pt');
        $sheet->getColumnDimension('K')->setWidth(110, 'pt');
        $sheet->getColumnDimension('M')->setWidth(110, 'pt');
        $sheet->getColumnDimension('N')->setWidth(110, 'pt');
        // ==============================================================================================
        // Export Data Mutasi Siswa
        $npsn = session()->get('npsn');
        //Fetch Data Mutasi Siswa
        $masuk = $this->masukModel->where('npsn =', $npsn)->where('mutasi', 'pindahan')->findAll();
        $keluar = $this->masukModel->where('npsn =', $npsn)->where('mutasi', 'keluar')->findAll();
        //Mutasi masuk
        $sheet->setCellValue('S1', 'C. Mutasi Siswa');
        $sheet->setCellValue('T2', '1. Masuk');
        $sheet->setCellValue('S3', 'No');
        $sheet->setCellValue('T3', 'NIS/NISN');
        $sheet->setCellValue('U3', 'Nama Siswa');
        $sheet->setCellValue('V3', 'L/P');
        $sheet->setCellValue('W3', 'Kelas');
        $sheet->setCellValue('X3', 'No & Tgl Surat Pindah');
        $sheet->setCellValue('Y3', 'Asal Sekolah');
        $sheet->setCellValue('Z3', 'Keterangan');
        $no =  1;
        $row = 4;
        foreach ($masuk as $m) :
            $sheet->setCellValue('S' . $row, $no);
            $sheet->setCellValue('T' . $row, $m['nisn']);
            $sheet->setCellValue('U' . $row, $m['nama']);
            $sheet->setCellValue('V' . $row, $m['jenis_kel']);
            $sheet->setCellValue('W' . $row, $m['kelas']);
            $sheet->setCellValue('X' . $row, $m['no_surat']);
            $sheet->setCellValue('Y' . $row, $m['asal_sekolah']);
            $sheet->setCellValue('Z' . $row, $m['keterangan']);
            //Style border berdasarkan foreach data
            $sheet->getStyle('S3:Z' . $row)->applyFromArray($styleBorder);
            $no++;
            $row++;
        endforeach;
        $sheet->mergeCells('S1:Z1');
        $sheet->getStyle('S1')->getFont()->setBold(true);
        $sheet->getStyle('T2')->getFont()->setBold(true);
        $sheet->getStyle('S3:Z3')->applyFromArray($styleColumnCenter);
        $sheet->getColumnDimension('S')->setAutoSize(true);
        $sheet->getColumnDimension('T')->setAutoSize(true);
        $sheet->getColumnDimension('U')->setAutoSize(true);
        $sheet->getColumnDimension('P')->setAutoSize(true);
        $sheet->getColumnDimension('W')->setAutoSize(true);
        $sheet->getColumnDimension('X')->setAutoSize(true);
        $sheet->getColumnDimension('Y')->setAutoSize(true);
        $sheet->getColumnDimension('Z')->setAutoSize(true);
        //Mutasi keluar
        $sheet->setCellValue('T12', '2. Keluar');
        $sheet->setCellValue('S13', 'No');
        $sheet->setCellValue('T13', 'NIS/NISN');
        $sheet->setCellValue('U13', 'Nama Siswa');
        $sheet->setCellValue('V13', 'L/P');
        $sheet->setCellValue('W13', 'Kelas');
        $sheet->setCellValue('X13', 'No & Tgl Surat Pindah');
        $sheet->setCellValue('Y13', 'Asal Sekolah');
        $sheet->setCellValue('Z13', 'Keterangan');
        $no =  1;
        $row = 14;
        foreach ($keluar as $k) :
            $sheet->setCellValue('S' . $row, $no);
            $sheet->setCellValue('T' . $row, $k['nisn']);
            $sheet->setCellValue('U' . $row, $k['nama']);
            $sheet->setCellValue('V' . $row, $k['jenis_kel']);
            $sheet->setCellValue('W' . $row, $k['kelas']);
            $sheet->setCellValue('X' . $row, $k['no_surat']);
            $sheet->setCellValue('Y' . $row, $k['asal_sekolah']);
            $sheet->setCellValue('Z' . $row, $k['keterangan']);
            //Style border berdasarkan foreach data
            $sheet->getStyle('S13:Z' . $row)->applyFromArray($styleBorder);
            $no++;
            $row++;
        endforeach;
        $sheet->getStyle('T12')->getFont()->setBold(true);
        $sheet->getStyle('S13:Z13')->applyFromArray($styleColumnCenter);
        // ==============================================================================================
        // Export Data Bangunan
        // Fetch Data Bangunan
        $npsn = session()->get('npsn');
        $b = $this->bangunanModel->where('npsn =', $npsn)->first();
        // Design Table Keadaan Tanah dan Bangunan
        $spreadsheet->createSheet();
        $spreadsheet->setActiveSheetIndex(1)->setCellValue('A1', 'G. Keadaan Tanah dan Bangunan');
        $sheet = $spreadsheet->getActiveSheet()->setTitle('D, E, F, G');
        $sheet->setCellValue('A2', '1.');
        $sheet->setCellValue('A3', '2.');
        $sheet->setCellValue('A4', '3.');
        $sheet->setCellValue('A5', '4.');
        $sheet->setCellValue('A6', '5.');
        $sheet->setCellValue('B2', 'Luas Tanah Keseluruhan');
        $sheet->setCellValue('B3', 'Luas Bangunan');
        $sheet->setCellValue('B4', 'Luas Tanah Untuk Rencana Pembangunan');
        $sheet->setCellValue('B5', 'Status Kepemilikan Tanah');
        $sheet->setCellValue('B6', 'Status Kepemilikan Gedung');
        $sheet->setCellValue('C2', ':');
        $sheet->setCellValue('C3', ':');
        $sheet->setCellValue('C4', ':');
        $sheet->setCellValue('C5', ':');
        $sheet->setCellValue('C6', ':');
        $sheet->setCellValue('D2', "$b[luas_tanah] m2");
        $sheet->setCellValue('D3', "$b[luas_bangunan] m2");
        $sheet->setCellValue('D4', "$b[luas_rpembangunan] m2");
        $sheet->setCellValue('D5', $b['status_tanah']);
        $sheet->setCellValue('D6', $b['status_gedung']);
        // Style Table
        $sheet->mergeCells('A1:D1');
        $sheet->getStyle('A1')->getFont()->setBold(true);
        // $sheet->getStyle('A1')->applyFromArray($styleColumnCenter);
        $sheet->getStyle('A2:A6')->applyFromArray($styleColumnCenter);
        $sheet->getStyle('D2:D4')->applyFromArray($styleNumberLeft);
        // Style Auto Size
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        // ==============================================================================================
        // Export Tabel
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=labul.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }
}
