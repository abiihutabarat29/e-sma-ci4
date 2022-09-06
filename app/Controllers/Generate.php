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
use App\Models\MapelModel;
use App\Models\SaranaModel;
use App\Models\SarprasModel;
use App\Models\InventarisModel;
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
    protected $mapelModel;
    protected $saranaModel;
    protected $sarprasModel;
    protected $inventarisModel;
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
        $this->mapelModel = new MapelModel();
        $this->saranaModel = new SaranaModel();
        $this->sarprasModel = new SarprasModel();
        $this->inventarisModel = new InventarisModel();
    }
    public function index()
    {
        $data = array(
            'titlebar' => 'Generate Laporan Bulanan',
            'subtitlebar' => 'Fitur Generate Laporan Bulanan untuk meng-generate data sesuai inputan anda dalam aplikasi e-sekolah.',
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
        //Perempuan-X-IPA
        $pxipa = $this->siswaModel->join('mod_bangunan', 'mod_bangunan.id_sekolah = mod_siswa.id_sekolah', 'left')->where('mod_siswa.npsn =', $npsn)->where('kelas', 'X')->where('jurusan', 'IPA')->where('jenis_kel', 'P')->countAllResults();
        //Perempuan-XI-IPA
        $pxiipa = $this->siswaModel->join('mod_bangunan', 'mod_bangunan.id_sekolah = mod_siswa.id_sekolah', 'left')->where('mod_siswa.npsn =', $npsn)->where('kelas', 'XI')->where('jurusan', 'IPA')->where('jenis_kel', 'P')->countAllResults();
        //Perempuan-XII-IPA
        $pxiiipa = $this->siswaModel->join('mod_bangunan', 'mod_bangunan.id_sekolah = mod_siswa.id_sekolah', 'left')->where('mod_siswa.npsn =', $npsn)->where('kelas', 'XII')->where('jurusan', 'IPA')->where('jenis_kel', 'P')->countAllResults();
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
        $sheet->setCellValue('I4', $pxipa);
        $sheet->setCellValue('I5', $pxiipa);
        $sheet->setCellValue('I6', $pxiiipa);
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
        $sheet->getStyle('V:W')->applyFromArray($styleColumnCenter);
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
        // Export Data Umur siswa/i
        // Fetch Data Umur siswa/i
        $npsn = session()->get('npsn');
        //Data siswa Laki-laki-X-14
        $lx14 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'X')->where('jenis_kel', 'L')->where('umur', 14)->countAllResults();
        //Data siswa Laki-laki-XI-14
        $lxi14 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XI')->where('jenis_kel', 'L')->where('umur', 14)->countAllResults();
        //Data siswa Laki-laki-XII-14
        $lxii14 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XII')->where('jenis_kel', 'L')->where('umur', 14)->countAllResults();
        //Data siswa Perempuan-X-14
        $px14 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'X')->where('jenis_kel', 'P')->where('umur', 14)->countAllResults();
        //Data siswa Perempuan-XI-14
        $pxi14 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XI')->where('jenis_kel', 'P')->where('umur', 14)->countAllResults();
        //Data siswa Perempuan-XII-14
        $pxii14 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XII')->where('jenis_kel', 'P')->where('umur', 14)->countAllResults();
        //Data siswa Laki-laki-X-15
        $lx15 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'X')->where('jenis_kel', 'L')->where('umur', 15)->countAllResults();
        //Data siswa Laki-laki-XI-15
        $lxi15 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XI')->where('jenis_kel', 'L')->where('umur', 15)->countAllResults();
        //Data siswa Laki-laki-XII-15
        $lxii15 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XII')->where('jenis_kel', 'L')->where('umur', 15)->countAllResults();
        //Data siswa Perempuan-X-15
        $px15 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'X')->where('jenis_kel', 'P')->where('umur', 15)->countAllResults();
        //Data siswa Perempuan-XI-15
        $pxi15 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XI')->where('jenis_kel', 'P')->where('umur', 15)->countAllResults();
        //Data siswa Perempuan-XII-15
        $pxii15 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XII')->where('jenis_kel', 'P')->where('umur', 15)->countAllResults();
        //Data siswa Laki-laki-X-16
        $lx16 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'X')->where('jenis_kel', 'L')->where('umur', 16)->countAllResults();
        //Data siswa Laki-laki-XI-16
        $lxi16 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XI')->where('jenis_kel', 'L')->where('umur', 16)->countAllResults();
        //Data siswa Laki-laki-XII-16
        $lxii16 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XII')->where('jenis_kel', 'L')->where('umur', 16)->countAllResults();
        //Data siswa Perempuan-X-16
        $px16 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'X')->where('jenis_kel', 'P')->where('umur', 16)->countAllResults();
        //Data siswa Perempuan-XI-16
        $pxi16 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XI')->where('jenis_kel', 'P')->where('umur', 16)->countAllResults();
        //Data siswa Perempuan-XII-16
        $pxii16 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XII')->where('jenis_kel', 'P')->where('umur', 16)->countAllResults();
        //Data siswa Laki-laki-X-17
        $lx17 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'X')->where('jenis_kel', 'L')->where('umur', 17)->countAllResults();
        //Data siswa Laki-laki-XI-17
        $lxi17 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XI')->where('jenis_kel', 'L')->where('umur', 17)->countAllResults();
        //Data siswa Laki-laki-XII-17
        $lxii17 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XII')->where('jenis_kel', 'L')->where('umur', 17)->countAllResults();
        //Data siswa Perempuan-X-17
        $px17 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'X')->where('jenis_kel', 'P')->where('umur', 17)->countAllResults();
        //Data siswa Perempuan-XI-17
        $pxi17 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XI')->where('jenis_kel', 'P')->where('umur', 17)->countAllResults();
        //Data siswa Perempuan-XII-17
        $pxii17 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XII')->where('jenis_kel', 'P')->where('umur', 17)->countAllResults();
        //Data siswa Laki-laki-X-18
        $lx18 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'X')->where('jenis_kel', 'L')->where('umur', 18)->countAllResults();
        //Data siswa Laki-laki-XI-18
        $lxi18 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XI')->where('jenis_kel', 'L')->where('umur', 18)->countAllResults();
        //Data siswa Laki-laki-XII-18
        $lxii18 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XII')->where('jenis_kel', 'L')->where('umur', 18)->countAllResults();
        //Data siswa Perempuan-X-18
        $px18 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'X')->where('jenis_kel', 'P')->where('umur', 18)->countAllResults();
        //Data siswa Perempuan-XI-18
        $pxi18 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XI')->where('jenis_kel', 'P')->where('umur', 18)->countAllResults();
        //Data siswa Perempuan-XII-18
        $pxii18 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XII')->where('jenis_kel', 'P')->where('umur', 18)->countAllResults();
        //Data siswa Laki-laki-X-19
        $lx19 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'X')->where('jenis_kel', 'L')->where('umur', 19)->countAllResults();
        //Data siswa Laki-laki-XI-19
        $lxi19 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XI')->where('jenis_kel', 'L')->where('umur', 19)->countAllResults();
        //Data siswa Laki-laki-XII-19
        $lxii19 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XII')->where('jenis_kel', 'L')->where('umur', 19)->countAllResults();
        //Data siswa Perempuan-X-19
        $px19 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'X')->where('jenis_kel', 'P')->where('umur', 19)->countAllResults();
        //Data siswa Perempuan-XI-19
        $pxi19 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XI')->where('jenis_kel', 'P')->where('umur', 19)->countAllResults();
        //Data siswa Perempuan-XII-19
        $pxii19 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XII')->where('jenis_kel', 'P')->where('umur', 19)->countAllResults();
        //Data siswa Laki-laki-X-20
        $lx20 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'X')->where('jenis_kel', 'L')->where('umur', 20)->countAllResults();
        //Data siswa Laki-laki-XI-20
        $lxi20 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XI')->where('jenis_kel', 'L')->where('umur', 20)->countAllResults();
        //Data siswa Laki-laki-XII-20
        $lxii20 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XII')->where('jenis_kel', 'L')->where('umur', 20)->countAllResults();
        //Data siswa Perempuan-X-20
        $px20 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'X')->where('jenis_kel', 'P')->where('umur', 20)->countAllResults();
        //Data siswa Perempuan-XI-20
        $pxi20 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XI')->where('jenis_kel', 'P')->where('umur', 20)->countAllResults();
        //Data siswa Perempuan-XII-20
        $pxii20 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XII')->where('jenis_kel', 'P')->where('umur', 20)->countAllResults();
        //Data siswa Laki-laki-X-21
        $lx21 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'X')->where('jenis_kel', 'L')->where('umur', 21)->countAllResults();
        //Data siswa Laki-laki-XI-21
        $lxi21 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XI')->where('jenis_kel', 'L')->where('umur', 21)->countAllResults();
        //Data siswa Laki-laki-XII-21
        $lxii21 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XII')->where('jenis_kel', 'L')->where('umur', 21)->countAllResults();
        //Data siswa Perempuan-X-21
        $px21 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'X')->where('jenis_kel', 'P')->where('umur', 21)->countAllResults();
        //Data siswa Perempuan-XI-21
        $pxi21 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XI')->where('jenis_kel', 'P')->where('umur', 21)->countAllResults();
        //Data siswa Perempuan-XII-21
        $pxii21 = $this->siswaModel->where('npsn =', $npsn)->where('kelas', 'XII')->where('jenis_kel', 'P')->where('umur', 21)->countAllResults();
        // Design Table Data Umur siswa/i
        $spreadsheet->createSheet();
        $spreadsheet->setActiveSheetIndex(1)->setCellValue('A1', 'D. Umur Siswa / I');
        $sheet = $spreadsheet->getActiveSheet()->setTitle('D, E, F, G');
        $sheet->setCellValue('A2', 'Umur');
        $sheet->setCellValue('A5', '14 Tahun');
        $sheet->setCellValue('A6', '15 Tahun');
        $sheet->setCellValue('A7', '16 Tahun');
        $sheet->setCellValue('A8', '17 Tahun');
        $sheet->setCellValue('A9', '18 Tahun');
        $sheet->setCellValue('A10', '19 Tahun');
        $sheet->setCellValue('A11', '20 Tahun');
        $sheet->setCellValue('A12', '21 Tahun');
        $sheet->setCellValue('A13', 'Jumlah');
        $sheet->setCellValue('B2', 'Kelas');
        $sheet->setCellValue('B3', 'X');
        $sheet->setCellValue('D3', 'XI');
        $sheet->setCellValue('F3', 'XII');
        $sheet->setCellValue('H3', 'Jumlah');
        $sheet->setCellValue('J2', 'Jumlah Siswa');
        $sheet->setCellValue('B4', 'L');
        $sheet->setCellValue('C4', 'P');
        $sheet->setCellValue('D4', 'L');
        $sheet->setCellValue('E4', 'P');
        $sheet->setCellValue('F4', 'L');
        $sheet->setCellValue('G4', 'P');
        $sheet->setCellValue('H4', 'L');
        $sheet->setCellValue('I4', 'P');
        $sheet->setCellValue('B5', $lx14);
        $sheet->setCellValue('C5', $px14);
        $sheet->setCellValue('D5', $lxi14);
        $sheet->setCellValue('E5', $pxi14);
        $sheet->setCellValue('F5', $lxii14);
        $sheet->setCellValue('G5', $pxii14);
        $sheet->setCellValue('H5', '=SUM(B5+D5+F5)');
        $sheet->setCellValue('I5', '=SUM(C5+E5+G5)');
        $sheet->setCellValue('J5', '=SUM(H5:I5)');
        $sheet->setCellValue('B6', $lx15);
        $sheet->setCellValue('C6', $px15);
        $sheet->setCellValue('D6', $lxi15);
        $sheet->setCellValue('E6', $pxi15);
        $sheet->setCellValue('F6', $lxii15);
        $sheet->setCellValue('G6', $pxii15);
        $sheet->setCellValue('H6', '=SUM(B6+D6+F6)');
        $sheet->setCellValue('I6', '=SUM(C6+E6+G6)');
        $sheet->setCellValue('J6', '=SUM(H6:I6)');
        $sheet->setCellValue('B7', $lx16);
        $sheet->setCellValue('C7', $px16);
        $sheet->setCellValue('D7', $lxi16);
        $sheet->setCellValue('E7', $pxi16);
        $sheet->setCellValue('F7', $lxii16);
        $sheet->setCellValue('G7', $pxii16);
        $sheet->setCellValue('H7', '=SUM(B7+D7+F7)');
        $sheet->setCellValue('I7', '=SUM(C7+E7+G7)');
        $sheet->setCellValue('J7', '=SUM(H7:I7)');
        $sheet->setCellValue('B8', $lx17);
        $sheet->setCellValue('C8', $px17);
        $sheet->setCellValue('D8', $lxi17);
        $sheet->setCellValue('E8', $pxi17);
        $sheet->setCellValue('F8', $lxii17);
        $sheet->setCellValue('G8', $pxii17);
        $sheet->setCellValue('H8', '=SUM(B8+D8+F8)');
        $sheet->setCellValue('I8', '=SUM(C8+E8+G8)');
        $sheet->setCellValue('J8', '=SUM(H8:I8)');
        $sheet->setCellValue('B9', $lx18);
        $sheet->setCellValue('C9', $px18);
        $sheet->setCellValue('D9', $lxi18);
        $sheet->setCellValue('E9', $pxi18);
        $sheet->setCellValue('F9', $lxii18);
        $sheet->setCellValue('G9', $pxii18);
        $sheet->setCellValue('H9', '=SUM(B9+D9+F9)');
        $sheet->setCellValue('I9', '=SUM(C9+E9+G9)');
        $sheet->setCellValue('J9', '=SUM(H9:I9)');
        $sheet->setCellValue('B10', $lx19);
        $sheet->setCellValue('C10', $px19);
        $sheet->setCellValue('D10', $lxi19);
        $sheet->setCellValue('E10', $pxi19);
        $sheet->setCellValue('F10', $lxii19);
        $sheet->setCellValue('G10', $pxii19);
        $sheet->setCellValue('H10', '=SUM(B10+D10+F10)');
        $sheet->setCellValue('I10', '=SUM(C10+E10+G10)');
        $sheet->setCellValue('J10', '=SUM(H10:I10)');
        $sheet->setCellValue('B11', $lx20);
        $sheet->setCellValue('C11', $px20);
        $sheet->setCellValue('D11', $lxi20);
        $sheet->setCellValue('E11', $pxi19);
        $sheet->setCellValue('F11', $lxii20);
        $sheet->setCellValue('G11', $pxii20);
        $sheet->setCellValue('H11', '=SUM(B11+D11+F11)');
        $sheet->setCellValue('I11', '=SUM(C11+E11+G11)');
        $sheet->setCellValue('J11', '=SUM(H11:I11)');
        $sheet->setCellValue('B12', $lx21);
        $sheet->setCellValue('C12', $px21);
        $sheet->setCellValue('D12', $lxi21);
        $sheet->setCellValue('E12', $pxi21);
        $sheet->setCellValue('F12', $lxii21);
        $sheet->setCellValue('G12', $pxii21);
        $sheet->setCellValue('H12', '=SUM(B12+D12+F12)');
        $sheet->setCellValue('I12', '=SUM(C12+E12+G12)');
        $sheet->setCellValue('J12', '=SUM(H12:I12)');
        $sheet->setCellValue('B13', '=SUM(B5:B12)');
        $sheet->setCellValue('C13', '=SUM(C5:C12)');
        $sheet->setCellValue('D13', '=SUM(D5:D12)');
        $sheet->setCellValue('E13', '=SUM(E5:E12)');
        $sheet->setCellValue('F13', '=SUM(F5:F12)');
        $sheet->setCellValue('G13', '=SUM(G5:G12)');
        $sheet->setCellValue('H13', '=SUM(H5:H12)');
        $sheet->setCellValue('I13', '=SUM(I5:I12)');
        $sheet->setCellValue('J13', '=SUM(H13:I13)');
        // Style Table
        //Marge left
        $sheet->mergeCells('A1:J1');
        $sheet->mergeCells('B2:I2');
        $sheet->mergeCells('B3:C3');
        $sheet->mergeCells('D3:E3');
        $sheet->mergeCells('F3:G3');
        $sheet->mergeCells('F3:G3');
        $sheet->mergeCells('H3:I3');
        //Marge down
        $sheet->mergeCells('A2:A4');
        $sheet->mergeCells('J2:J4');
        $sheet->getStyle('A1')->getFont()->setBold(true);
        $sheet->getStyle('A13')->getFont()->setBold(true);
        $sheet->getStyle('A2:J13')->applyFromArray($styleColumnCenter);
        $sheet->getStyle('A2:J13')->applyFromArray($styleBorder);
        $sheet->getColumnDimension('B')->setWidth(25, 'pt');
        $sheet->getColumnDimension('C')->setWidth(25, 'pt');
        $sheet->getColumnDimension('D')->setWidth(25, 'pt');
        $sheet->getColumnDimension('E')->setWidth(25, 'pt');
        $sheet->getColumnDimension('F')->setWidth(25, 'pt');
        $sheet->getColumnDimension('G')->setWidth(25, 'pt');
        $sheet->getColumnDimension('H')->setWidth(25, 'pt');
        $sheet->getColumnDimension('I')->setWidth(25, 'pt');
        // Style Auto Size
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('J')->setAutoSize(true);
        // ==============================================================================================
        // Export Data Ruang Belajar, Lab & Perpustakaan
        $npsn = session()->get('npsn');
        //Fetch Data Ruang Belajar, Lab & Perpustakaan
        $sarpras = $this->sarprasModel->where('npsn =', $npsn)->findAll();
        $sheet->setCellValue('L1', 'E. Ruang Belajar, Lab & Perpustakaan');
        $sheet->setCellValue('L2', 'No');
        $sheet->setCellValue('M2', 'Jenis');
        $sheet->setCellValue('N2', 'Kondisi');
        $sheet->setCellValue('R2', 'Keterangan');
        $sheet->setCellValue('N3', 'Baik');
        $sheet->setCellValue('O3', 'Rusak Ringan');
        $sheet->setCellValue('P3', 'Rusak Berat');
        $sheet->setCellValue('Q3', 'Jumlah');
        $no =  1;
        $row = 4;
        foreach ($sarpras as $s) :
            $sheet->setCellValue('L' . $row, $no);
            $sheet->setCellValue('M' . $row, $s['prasarana']);
            $sheet->setCellValue('N' . $row, $s['baik']);
            $sheet->setCellValue('O' . $row, $s['rusak_ringan']);
            $sheet->setCellValue('P' . $row, $s['rusak_berat']);
            $sheet->setCellValue('Q' . $row, '=SUM(N' . $row . ':P' . $row . ')');
            $sheet->setCellValue('R' . $row, $s['keterangan']);
            //Style border berdasarkan foreach data
            $sheet->getStyle('L2:R' . $row)->applyFromArray($styleBorder);
            $sheet->getStyle('L2:L' . $row)->applyFromArray($styleColumnCenter);
            $sheet->getStyle('N4:Q' . $row)->applyFromArray($styleColumnCenter);
            $no++;
            $row++;
        endforeach;
        $sheet->mergeCells('L1:R1');
        $sheet->mergeCells('L2:L3');
        $sheet->mergeCells('M2:M3');
        $sheet->mergeCells('R2:R3');
        $sheet->mergeCells('N2:Q2');
        $sheet->getStyle('L1')->getFont()->setBold(true);
        $sheet->getStyle('L2:R3')->applyFromArray($styleColumnCenter);
        $sheet->getColumnDimension('L')->setAutoSize(true);
        $sheet->getColumnDimension('M')->setAutoSize(true);
        $sheet->getColumnDimension('N')->setWidth(70, 'pt');
        $sheet->getColumnDimension('O')->setWidth(70, 'pt');
        $sheet->getColumnDimension('P')->setWidth(70, 'pt');
        $sheet->getColumnDimension('Q')->setWidth(70, 'pt');
        $sheet->getColumnDimension('R')->setWidth(140, 'pt');
        // ==============================================================================================
        // ==============================================================================================
        // Export Data Inventaris
        $npsn = session()->get('npsn');
        //Fetch Data Inventaris
        $inventaris = $this->inventarisModel->where('npsn =', $npsn)->findAll();
        $sheet->setCellValue('T1', 'F. Data Inventaris (Keadaan Meja, Kursi & Peralatan Kantor)');
        $sheet->setCellValue('T2', 'No');
        $sheet->setCellValue('U2', 'Jenis');
        $sheet->setCellValue('V2', 'D');
        $sheet->setCellValue('W2', 'A');
        $sheet->setCellValue('X2', 'K');
        $sheet->setCellValue('Y2', 'L');
        $no =  1;
        $row = 4;
        foreach ($inventaris as $i) :
            $sheet->setCellValue('T' . $row, $no);
            $sheet->setCellValue('U' . $row, $i['inventaris']);
            $sheet->setCellValue('V' . $row, $i['dibutuhkan']);
            $sheet->setCellValue('W' . $row, $i['ada']);
            $sheet->setCellValue('X' . $row, $i['kurang']);
            $sheet->setCellValue('Y' . $row, $i['lebih']);
            //Style border berdasarkan foreach data
            $sheet->getStyle('T2:Y' . $row)->applyFromArray($styleBorder);
            $sheet->getStyle('V3:Y' . $row)->applyFromArray($styleColumnCenter);
            $sheet->getStyle('T2:T' . $row)->applyFromArray($styleColumnCenter);
            $no++;
            $row++;
        endforeach;
        $sheet->mergeCells('T2:T3');
        $sheet->mergeCells('U2:U3');
        $sheet->mergeCells('V2:V3');
        $sheet->mergeCells('W2:W3');
        $sheet->mergeCells('X2:X3');
        $sheet->mergeCells('Y2:Y3');
        $sheet->mergeCells('T1:Y1');
        $sheet->getStyle('T1')->getFont()->setBold(true);
        $sheet->getStyle('T2:Y2')->applyFromArray($styleColumnCenter);
        $sheet->getColumnDimension('T')->setAutoSize(true);
        $sheet->getColumnDimension('U')->setWidth(200, 'pt');
        $sheet->getColumnDimension('V')->setWidth(35, 'pt');
        $sheet->getColumnDimension('W')->setWidth(35, 'pt');
        $sheet->getColumnDimension('X')->setWidth(35, 'pt');
        $sheet->getColumnDimension('Y')->setWidth(35, 'pt');
        // ==============================================================================================
        // Export Data Bangunan
        // Fetch Data Bangunan
        $npsn = session()->get('npsn');
        $b = $this->bangunanModel->where('npsn =', $npsn)->first();
        // Design Table Keadaan Tanah dan Bangunan
        $sheet->setCellValue('AA1', 'G. Keadaan Tanah dan Bangunan');
        $sheet->setCellValue('AA2', '1.');
        $sheet->setCellValue('AA3', '2.');
        $sheet->setCellValue('AA4', '3.');
        $sheet->setCellValue('AA5', '4.');
        $sheet->setCellValue('AA6', '5.');
        $sheet->setCellValue('AB2', 'Luas Tanah Keseluruhan');
        $sheet->setCellValue('AB3', 'Luas Bangunan');
        $sheet->setCellValue('AB4', 'Luas Tanah Untuk Rencana Pembangunan');
        $sheet->setCellValue('AB5', 'Status Kepemilikan Tanah');
        $sheet->setCellValue('AB6', 'Status Kepemilikan Gedung');
        $sheet->setCellValue('AC2', ':');
        $sheet->setCellValue('AC3', ':');
        $sheet->setCellValue('AC4', ':');
        $sheet->setCellValue('AC5', ':');
        $sheet->setCellValue('AC6', ':');
        $sheet->setCellValue('AD2', "$b[luas_tanah] m2");
        $sheet->setCellValue('AD3', "$b[luas_bangunan] m2");
        $sheet->setCellValue('AD4', "$b[luas_rpembangunan] m2");
        $sheet->setCellValue('AD5', $b['status_tanah']);
        $sheet->setCellValue('AD6', $b['status_gedung']);
        // Style Table
        $sheet->mergeCells('AA1:AD1');
        $sheet->getStyle('AA1')->getFont()->setBold(true);
        $sheet->getStyle('AA2:AA6')->applyFromArray($styleColumnCenter);
        $sheet->getStyle('AD2:AD4')->applyFromArray($styleNumberLeft);
        // Style Auto Size
        $sheet->getColumnDimension('AA')->setWidth(20, 'pt');
        $sheet->getColumnDimension('AB')->setAutoSize(true);
        $sheet->getColumnDimension('AC')->setAutoSize(true);
        $sheet->getColumnDimension('AD')->setAutoSize(true);
        // // ==============================================================================================
        // Export Tabel
        $writer = new Xlsx($spreadsheet);
        $sekolah = session()->get('nama_sekolah');
        $bulan = format_bulan(date('Y-m-d'));
        $tahun = format_tahun(date('Y-m-d'));
        $waktu = date('H:i:s');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=Laporan Bulanan_' . $bulan . '_' . $tahun . '_' . $sekolah . '_' . $waktu . '.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }
}
