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
        $sheet->getStyle('A1')->applyFromArray($styleColumnCenter);
        $sheet->getStyle('A2:A15')->applyFromArray($styleColumnCenter);
        $sheet->getStyle('D6:D10')->applyFromArray($styleNumberLeft);
        // $sheet->getStyle('A2:D15')->applyFromArray($styleBorder);
        // Style Auto Size
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
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
        $sheet->getStyle('A1')->applyFromArray($styleColumnCenter);
        $sheet->getStyle('A2:A6')->applyFromArray($styleColumnCenter);
        $sheet->getStyle('D2:D4')->applyFromArray($styleNumberLeft);
        // Style Auto Size
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);

        // Export Tabel
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=labul.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }
}
