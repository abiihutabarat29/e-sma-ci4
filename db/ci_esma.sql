-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Sep 2022 pada 06.51
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_esma`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_bangunan`
--

CREATE TABLE `mod_bangunan` (
  `id` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `luas_tanah` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `luas_bangunan` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `luas_rpembangunan` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `luas_halaman` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `luas_lapangan` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `luas_kosong` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_tanah` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `status_gedung` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `jkelasx_mipa` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jkelasx_iis` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jkelasx_bhs` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jkelasxi_mipa` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jkelasxi_iis` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jkelasxi_bhs` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jkelasxii_mipa` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jkelasxii_iis` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jkelasxii_bhs` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `npsn` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `nama_sekolah` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `jenjang` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `userentry` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `mod_bangunan`
--

INSERT INTO `mod_bangunan` (`id`, `id_sekolah`, `luas_tanah`, `luas_bangunan`, `luas_rpembangunan`, `luas_halaman`, `luas_lapangan`, `luas_kosong`, `status_tanah`, `status_gedung`, `jkelasx_mipa`, `jkelasx_iis`, `jkelasx_bhs`, `jkelasxi_mipa`, `jkelasxi_iis`, `jkelasxi_bhs`, `jkelasxii_mipa`, `jkelasxii_iis`, `jkelasxii_bhs`, `npsn`, `nama_sekolah`, `jenjang`, `created_at`, `updated_at`, `userentry`) VALUES
(12, 1, '343', '343', '3433', NULL, NULL, NULL, 'Pemerintah', 'Pemerintah', '2', '2', '2', '2', '2', '2', '2', '2', '2', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', '2022-09-09 22:42:29', '2022-09-09 22:42:29', 'DWI AHMAD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_barang`
--

CREATE TABLE `mod_barang` (
  `id` int(11) NOT NULL,
  `inventaris` varchar(255) NOT NULL,
  `userentry` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mod_barang`
--

INSERT INTO `mod_barang` (`id`, `inventaris`, `userentry`, `created_at`, `updated_at`) VALUES
(1, 'Meja Siswa', 'Abii Hutabarat', '2022-09-06 00:46:04', '2022-09-06 04:30:11'),
(2, 'Kursi Siswa', '0', '2022-09-06 00:47:21', '2022-09-06 00:47:21'),
(3, 'Meja Guru', '0', '2022-09-06 00:47:34', '2022-09-06 00:47:34'),
(4, 'Kursi Guru', '0', '2022-09-06 00:47:40', '2022-09-06 00:47:40'),
(5, 'Meja Tamu', '0', '2022-09-06 00:47:54', '2022-09-06 00:47:54'),
(6, 'Kursi Tamu', '0', '2022-09-06 00:48:02', '2022-09-06 00:48:02'),
(7, 'Mesin TIK', '0', '2022-09-06 00:48:14', '2022-09-06 00:48:14'),
(8, 'Komputer', '0', '2022-09-06 00:48:22', '2022-09-06 00:48:22'),
(9, 'Laptop', '0', '2022-09-06 00:48:33', '2022-09-06 00:48:33'),
(10, 'Infocus', '0', '2022-09-06 00:48:41', '2022-09-06 00:48:41'),
(11, 'Mesin Cetak', '0', '2022-09-06 00:48:49', '2022-09-06 00:48:49'),
(12, 'UHF', '0', '2022-09-06 00:49:01', '2022-09-06 00:49:01'),
(13, 'PARABOLA', '0', '2022-09-06 00:49:10', '2022-09-06 00:49:10'),
(14, 'TV', '0', '2022-09-06 00:49:20', '2022-09-06 00:49:20'),
(15, 'VCD', '0', '2022-09-06 00:49:31', '2022-09-06 00:49:31'),
(16, 'CCTV', '0', '2022-09-06 00:49:37', '2022-09-06 00:49:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_bidang_keahlian`
--

CREATE TABLE `mod_bidang_keahlian` (
  `id` int(11) NOT NULL,
  `bidang` varchar(255) NOT NULL,
  `userentry` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mod_bidang_keahlian`
--

INSERT INTO `mod_bidang_keahlian` (`id`, `bidang`, `userentry`, `created_at`, `updated_at`) VALUES
(1, 'Teknologi dan Rekayasa', 'Abii Hutabarat', '2022-09-10 06:10:58', '2022-09-10 06:15:00'),
(2, 'Teknologi Informasi dan Komunikasi', 'Abii Hutabarat', '2022-09-10 06:11:32', '2022-09-10 06:11:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_buku_induk`
--

CREATE TABLE `mod_buku_induk` (
  `id` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `nisn` int(10) NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_lahir` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kel` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `agama` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kelas` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `jurusan` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pkeahlian` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nohp` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masuk` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `tamat` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `npsn` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `nama_sekolah` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jenjang` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `userentry` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `mod_buku_induk`
--

INSERT INTO `mod_buku_induk` (`id`, `id_sekolah`, `nisn`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kel`, `agama`, `alamat`, `kelas`, `jurusan`, `pkeahlian`, `status`, `nohp`, `masuk`, `tamat`, `npsn`, `nama_sekolah`, `jenjang`, `userentry`, `created_at`, `updated_at`) VALUES
(2, 1, 2147483647, 'fddg', 'fdgdfgdfgdg', '2022-08-02', 'L', 'Islam', 'dfgdfgdfgdfg', 'X', 'IPA', '', 'Non-Aktif', '08656656466', '2022/2023', '2023/2024', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'Andika Pratama', '2022-08-02 12:23:05', '2022-08-02 12:23:05'),
(3, 86, 2147483647, 'test', 'test', '2022-08-02', 'P', 'Islam', 'test', 'XII', '', 'TBSM', 'Non-Aktif', '09888344354', '2023/2024', '2024/2025', '10204029', 'SMK SWASTA TRIYADIKAYASA AEK SONGSONGAN', 'SMK', 'Putra', '2022-08-14 07:53:19', '2022-08-14 07:53:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_golongan`
--

CREATE TABLE `mod_golongan` (
  `id` int(11) NOT NULL,
  `golongan` varchar(50) NOT NULL,
  `userentry` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mod_golongan`
--

INSERT INTO `mod_golongan` (`id`, `golongan`, `userentry`, `created_at`, `updated_at`) VALUES
(1, 'I/A', 'Abii Hutabarat', '2022-08-05 03:09:44', '2022-08-05 03:09:53'),
(2, 'I/B', 'Abii Hutabarat', '2022-08-05 03:10:16', '2022-08-05 03:10:16'),
(3, 'I/C', 'Abii Hutabarat', '2022-08-05 03:10:23', '2022-08-05 03:10:23'),
(4, 'I/D', 'Abii Hutabarat', '2022-08-05 03:10:33', '2022-08-05 03:10:33'),
(5, 'II/A', 'Abii Hutabarat', '2022-08-05 03:10:48', '2022-08-05 03:10:48'),
(6, 'II/B', 'Abii Hutabarat', '2022-08-05 03:10:55', '2022-08-05 03:10:55'),
(7, 'II/C', 'Abii Hutabarat', '2022-08-05 03:11:03', '2022-08-05 03:11:03'),
(8, 'II/D', 'Abii Hutabarat', '2022-08-05 03:11:12', '2022-08-05 03:11:12'),
(9, 'III/A', 'Abii Hutabarat', '2022-08-05 03:11:29', '2022-08-05 03:11:29'),
(10, 'III/B', 'Abii Hutabarat', '2022-08-05 03:11:34', '2022-08-05 03:11:34'),
(11, 'III/C', 'Abii Hutabarat', '2022-08-05 03:11:40', '2022-08-05 03:11:40'),
(12, 'III/D', 'Abii Hutabarat', '2022-08-05 03:11:46', '2022-08-05 03:11:46'),
(13, 'IV/A', 'Abii Hutabarat', '2022-08-05 03:11:57', '2022-08-05 03:11:57'),
(14, 'IV/B', 'Abii Hutabarat', '2022-08-05 03:12:03', '2022-08-05 03:12:03'),
(15, 'IV/C', 'Abii Hutabarat', '2022-08-05 03:12:09', '2022-08-05 03:12:09'),
(16, 'IV/D', 'Abii Hutabarat', '2022-08-05 03:12:14', '2022-08-05 03:12:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_guru`
--

CREATE TABLE `mod_guru` (
  `id_guru` int(11) NOT NULL,
  `id_sekolah` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nip` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `nuptk` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `nrg` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tempat_lahir` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_lahir` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `golruang` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tingkat` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `jurusan` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `thnijazah` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `agama` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `tmtguru` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `tmtsekolah` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `thnsertifikasi` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mapel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah_jam` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `mk_thn` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mk_bln` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgs_tambah` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sts_serti` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `mapel_serti` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jabatan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_sk` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_sk` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nmdiklat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tdiklat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lmdiklat` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thndiklat` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kehadiran` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sts_vaksin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_vaksin` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lok_vaksin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `npsn` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `nama_sekolah` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jenjang` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `userentry` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `mod_guru`
--

INSERT INTO `mod_guru` (`id_guru`, `id_sekolah`, `nip`, `nik`, `nuptk`, `nrg`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kel`, `golruang`, `tingkat`, `jurusan`, `thnijazah`, `agama`, `status`, `tmtguru`, `tmtsekolah`, `thnsertifikasi`, `mapel`, `jumlah_jam`, `mk_thn`, `mk_bln`, `tgs_tambah`, `sts_serti`, `mapel_serti`, `jabatan`, `no_sk`, `tgl_sk`, `nmdiklat`, `tdiklat`, `lmdiklat`, `thndiklat`, `kehadiran`, `foto`, `sts_vaksin`, `tgl_vaksin`, `lok_vaksin`, `npsn`, `nama_sekolah`, `jenjang`, `userentry`, `created_at`, `updated_at`) VALUES
(86, '1', '3333033393333633', '3333333393333633', '454545', '3455345', 'Putra', 'dfdgf', '2022-07-06', 'L', 'III/C', 'D3', 'Guru', '2018', 'Islam', 'PNS', '2022-07-06', '2022-07-07', '2016', 'Biologi', '5', '', '', NULL, 'Sudah', NULL, NULL, NULL, NULL, '', '', '', '', '', '1658826566_15d0892e42ca7c18dd12.jpg', 'Belum', '', '', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'DWI AHMAD', '2022-07-26 00:28:31', '2022-09-07 05:13:40'),
(87, '1', '3333033393333633', '3333333393333633', '454545', '3455345', 'Putra', 'dfdgf', '2022-07-06', 'L', 'I/C', 'S1', 'Akuntansi', '2018', 'Islam', 'Non PNS', '2022-07-06', '2022-07-07', '2015', 'Mulok', '5', '', '', NULL, 'Sudah', NULL, NULL, NULL, NULL, '', '', '', '', '', '1658823844_71674ac3de534f213370.jpeg', 'Belum', '', '', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'DWI AHMAD', '2022-07-26 03:24:04', '2022-09-07 05:03:04'),
(83, '1', '3333333333333333', '3333333333333633', '234234234', '787979', 'Sari', 'Lima Puluh', '2022-07-08', 'L', 'II/A', 'S1', 'Magister', '2017', 'Islam', 'PNS', '2022-07-02', '2022-07-22', '2017', 'Matematika', '8', '', '', NULL, 'Sudah', NULL, NULL, NULL, NULL, 'Teknologi', 'Testing tempat', '24', '2019', '100', '1658826668_bf62d0cdf720b024ef05.jpg', 'Dosis II', '2022-07-15', 'lima puluh', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'DWI AHMAD', '2022-07-23 13:21:24', '2022-09-08 00:04:28'),
(92, '1', '3333033393333633', '3333333393333633', '454545', '3455345', 'Putra', 'dfdgf', '2022-07-06', 'L', 'III/D', 'S2', 'Programming Baru', '2018', 'Islam', 'PNS', '2022-07-06', '2022-07-07', '2018', 'Mulok', '5', '', '', NULL, 'Sudah', NULL, NULL, NULL, NULL, '', '', '', '', '', '1658826908_534003a81dbb6846a1d1.jpeg', 'Belum', '', '', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'DWI AHMAD', '2022-07-26 04:13:06', '2022-09-07 05:14:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_inventaris`
--

CREATE TABLE `mod_inventaris` (
  `id` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `inventaris` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dibutuhkan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ada` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `kurang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `lebih` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `npsn` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `nama_sekolah` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jenjang` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `userentry` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `mod_inventaris`
--

INSERT INTO `mod_inventaris` (`id`, `id_sekolah`, `inventaris`, `dibutuhkan`, `ada`, `kurang`, `lebih`, `npsn`, `nama_sekolah`, `jenjang`, `userentry`, `created_at`, `updated_at`) VALUES
(4, 1, 'Meja Siswa', '1', '1', '0', '6', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'Andika Pratama', '2022-07-30 23:35:15', '2022-09-06 09:32:03'),
(5, 86, 'meja', '1', '4', '1', '54', '10204029', 'SMK SWASTA TRIYADIKAYASA AEK SONGSONGAN', 'SMK', 'Putra', '2022-08-14 07:56:26', '2022-08-14 07:56:53'),
(6, 1, 'Kursi Siswa', '4', '29', '29', '0', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'Andika Pratama', '2022-09-06 00:11:14', '2022-09-06 01:02:24'),
(7, 1, 'Meja Guru', '2', '10', '10', '0', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'Andika Pratama', '2022-09-06 00:58:25', '2022-09-06 01:02:43'),
(8, 1, 'Mesin TIK', '3', '3', '3', '3', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'DWI AHMAD', '2022-09-10 00:53:38', '2022-09-10 00:53:38'),
(9, 1, 'PARABOLA', '1', '0', '1', '0', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'DWI AHMAD', '2022-09-10 00:53:59', '2022-09-10 00:53:59'),
(10, 1, 'TV', '2', '1', '2', '0', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'DWI AHMAD', '2022-09-10 00:54:19', '2022-09-10 00:54:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_jenjang`
--

CREATE TABLE `mod_jenjang` (
  `id` int(11) NOT NULL,
  `jenjang` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `mod_jenjang`
--

INSERT INTO `mod_jenjang` (`id`, `jenjang`) VALUES
(1, 'TK'),
(2, 'SD'),
(3, 'SMP'),
(4, 'MTS'),
(5, 'SMA'),
(6, 'MA'),
(7, 'SMK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_kabupaten`
--

CREATE TABLE `mod_kabupaten` (
  `id` int(11) NOT NULL,
  `kode_wilayah` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `kabupaten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `userentry` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `mod_kabupaten`
--

INSERT INTO `mod_kabupaten` (`id`, `kode_wilayah`, `kabupaten`, `userentry`, `created_at`, `updated_at`) VALUES
(1, '1209', 'ASAHAN', 'Abii Hutabarat', '2022-07-31 00:33:50', '2022-07-31 01:19:42'),
(2, '1219', 'BATU BARA', 'Abii Hutabarat', '2022-07-31 00:34:02', '2022-07-31 01:19:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_kebutuhan`
--

CREATE TABLE `mod_kebutuhan` (
  `id` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `mapel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dibutuhkan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pns` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nonpns` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `kurang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `lebih` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `npsn` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `nama_sekolah` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jenjang` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `userentry` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `mod_kebutuhan`
--

INSERT INTO `mod_kebutuhan` (`id`, `id_sekolah`, `mapel`, `dibutuhkan`, `pns`, `nonpns`, `kurang`, `lebih`, `keterangan`, `npsn`, `nama_sekolah`, `jenjang`, `userentry`, `created_at`, `updated_at`) VALUES
(14, 1, 'Pendidikan Agama Islam', '3', '0', '2', '3', '0', 'ada', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'DWI AHMAD', NULL, '2022-09-10 00:44:37'),
(13, 0, 'Islam', '3', '0', '4', '0', '1', '', '10204029', 'SMK SWASTA TRIYADIKAYASA AEK SONGSONGAN', 'SMK', 'Faisal', NULL, NULL),
(16, 1, 'Pend.Jasmani, Olahraga, dan Kesehatan', '3', '0', '2', '1', '0', 'wewrw', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'Andika Pratama', NULL, '2022-08-24 23:24:54'),
(17, 1, 'Teknik Informatika Komputer ( TIK )', '2', '0', '3', '0', '1', 'drgdgdfg', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'Andika Pratama', NULL, '2022-08-24 23:20:06'),
(25, 1, 'Seni Budaya ', '2', '1', '2', '2', '0', 'kurang ', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'DWI AHMAD', '2022-09-08 23:16:31', '2022-09-08 23:16:31'),
(24, 86, 'Kimia Industri', '1', '0', '0', '0', '0', 'asdasdd', '10204029', 'SMK SWASTA TRIYADIKAYASA AEK SONGSONGAN', 'SMK', 'Putra', '2022-08-14 07:55:30', '2022-08-14 07:55:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_kecamatan`
--

CREATE TABLE `mod_kecamatan` (
  `id` int(11) NOT NULL,
  `kode_kab` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `kode_wilayah` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `kecamatan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `userentry` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `mod_kecamatan`
--

INSERT INTO `mod_kecamatan` (`id`, `kode_kab`, `kode_wilayah`, `kecamatan`, `userentry`, `created_at`, `updated_at`) VALUES
(1, '1219', '121903', 'Air Putih', 'Abii Hutabarat', NULL, '2022-08-05 02:49:06'),
(2, '1219', '121910', 'Datuk Lima Puluh', 'Abii Hutabarat', NULL, '2022-07-31 12:04:53'),
(3, '1219', '121911', 'Datuk Tanah Datar', 'Abii Hutabarat', NULL, '2022-07-31 12:05:03'),
(4, '1219', '121908', 'Laut Tador', 'Abii Hutabarat', NULL, '2022-07-31 12:05:13'),
(5, '1219', '121904', 'Lima Puluh', 'Abii Hutabarat', NULL, '2022-07-31 12:05:23'),
(6, '1219', '121909', 'Lima Puluh Pesisir', 'Abii Hutabarat', NULL, '2022-07-31 12:05:33'),
(7, '1219', '121901', 'Medang Deras', 'Abii Hutabarat', NULL, '2022-07-31 12:05:44'),
(8, '1219', '121912', 'Nibung Hangus', 'Abii Hutabarat', NULL, '2022-07-31 12:05:54'),
(9, '1219', '121907', 'Sei Balai', 'Abii Hutabarat', NULL, '2022-07-31 12:06:03'),
(10, '1219', '121902', 'Sei Suka', 'Abii Hutabarat', NULL, '2022-07-31 12:06:12'),
(11, '1219', '121905', 'Talawi', 'Abii Hutabarat', NULL, '2022-07-31 12:06:22'),
(12, '1219', '121906', 'Tanjung Tiram', 'Abii Hutabarat', NULL, '2022-07-31 12:06:33'),
(14, '1209', '120917', 'Bandar Pasir Mandoge', 'Abii Hutabarat', '2022-07-31 01:54:09', '2022-07-31 01:54:09'),
(15, '1209', '120915', 'Bandar Pulau', 'Abii Hutabarat', '2022-07-31 01:54:27', '2022-07-31 01:54:27'),
(16, '1209', '120921', 'Aek Songsongan', 'Abii Hutabarat', '2022-07-31 01:54:43', '2022-07-31 01:54:43'),
(17, '1209', '120922', 'Rahuning', 'Abii Hutabarat', '2022-07-31 01:54:59', '2022-07-31 01:54:59'),
(18, '1209', '120914', 'Pulau Rakyat', 'Abii Hutabarat', '2022-07-31 01:55:17', '2022-07-31 01:55:17'),
(19, '1209', '120918', 'Aek Kuasan', 'Abii Hutabarat', '2022-07-31 01:55:35', '2022-07-31 01:55:35'),
(20, '1209', '120932', 'Aek Ledong', 'Abii Hutabarat', '2022-07-31 01:55:52', '2022-07-31 01:55:52'),
(21, '1209', '120911', 'Sei Kepayang', 'Abii Hutabarat', '2022-07-31 01:56:12', '2022-07-31 01:56:12'),
(22, '1209', '120924', 'Sei Kepayang Barat', 'Abii Hutabarat', '2022-07-31 01:56:27', '2022-07-31 01:56:27'),
(23, '1209', '120925', 'Sei Kepayang Timur', 'Abii Hutabarat', '2022-07-31 01:56:41', '2022-07-31 01:56:41'),
(24, '1209', '120910', 'Tanjung Balai', 'Abii Hutabarat', '2022-07-31 01:56:58', '2022-07-31 01:56:58'),
(25, '1209', '120912', 'Simpang Empat', 'Abii Hutabarat', '2022-07-31 01:57:14', '2022-07-31 01:57:14'),
(26, '1209', '120931', 'Teluk Dalam', 'Abii Hutabarat', '2022-07-31 01:57:31', '2022-07-31 01:57:31'),
(27, '1209', '120913', 'Air Batu', 'Abii Hutabarat', '2022-07-31 01:57:48', '2022-07-31 01:57:48'),
(28, '1209', '120923', 'Sei Dadap', 'Abii Hutabarat', '2022-07-31 01:58:02', '2022-07-31 01:58:02'),
(29, '1209', '120916', 'Buntu Pane', 'Abii Hutabarat', '2022-07-31 01:58:19', '2022-07-31 01:58:19'),
(30, '1209', '120926', 'Tinggi Raja', 'Abii Hutabarat', '2022-07-31 01:58:38', '2022-07-31 01:58:38'),
(31, '1209', '120927', 'Setia Janji', 'Abii Hutabarat', '2022-07-31 01:59:01', '2022-07-31 01:59:01'),
(32, '1209', '120908', 'Meranti', 'Abii Hutabarat', '2022-07-31 02:00:01', '2022-07-31 02:00:01'),
(33, '1209', '120930', 'Pulo Bandring', 'Abii Hutabarat', '2022-07-31 02:00:25', '2022-07-31 02:00:25'),
(34, '1209', '120929', 'Rawang Panca Arga', 'Abii Hutabarat', '2022-07-31 02:00:50', '2022-07-31 02:00:50'),
(35, '1209', '120909', 'Air Joman', 'Abii Hutabarat', '2022-07-31 02:01:06', '2022-07-31 02:01:06'),
(36, '1209', '120928', 'Silau Laut', 'Abii Hutabarat', '2022-07-31 02:01:21', '2022-07-31 02:01:21'),
(37, '1209', '120919', 'Kota Kisaran Barat', 'Abii Hutabarat', '2022-07-31 02:01:41', '2022-07-31 02:01:41'),
(38, '1209', '120920', 'Kota Kisaran Timur', 'Abii Hutabarat', '2022-07-31 02:01:58', '2022-08-05 02:50:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_labul`
--

CREATE TABLE `mod_labul` (
  `id` int(11) NOT NULL,
  `id_sekolah` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama_labul` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bulan` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `tahun` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `file_labul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `validfile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `npsn` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama_sekolah` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenjang` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `userentry` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `mod_labul`
--

INSERT INTO `mod_labul` (`id`, `id_sekolah`, `nama_labul`, `bulan`, `tahun`, `file_labul`, `validfile`, `npsn`, `nama_sekolah`, `jenjang`, `userentry`, `created_at`, `updated_at`) VALUES
(29, '86', 'Laporan Bulanan Agustus', 'Agustus', '2022', '1661073585_f962d09ad3047261873d.xlsx', '10204029082022', '10204029', 'SMK SWASTA TRIYADIKAYASA AEK SONGSONGAN', 'SMK', 'Putra', '2022-08-21 04:19:13', '2022-08-21 04:19:45'),
(31, '86', 'Laporan Bulan September', 'September', '2022', '1662788438_23e12683abf7c7a80d2d.xlsx', '10204029092022', '10204029', 'SMK SWASTA TRIYADIKAYASA AEK SONGSONGAN', 'SMK', 'Putra', '2022-09-10 00:40:38', '2022-09-10 00:40:38'),
(30, '1', 'Laporan Bulanan September', 'September', '2022', '1662699685_ea40641ed057be145fe0.xlsx', '10204064092022', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'DWI AHMAD', '2022-09-08 00:40:06', '2022-09-09 00:01:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_log_invalid`
--

CREATE TABLE `mod_log_invalid` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `useragent` varchar(255) NOT NULL,
  `timestamp` date NOT NULL,
  `status_log` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_log_valid`
--

CREATE TABLE `mod_log_valid` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ip` varchar(255) NOT NULL,
  `useragent` varchar(555) NOT NULL,
  `status_log` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mod_log_valid`
--

INSERT INTO `mod_log_valid` (`id`, `username`, `nama`, `foto`, `timestamp`, `ip`, `useragent`, `status_log`, `created_at`, `updated_at`) VALUES
(1, 'putra333', 'Putra', 'blank.png', '2022-09-11 16:09:07', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 1, '2022-09-11 23:09:07', '2022-09-11 23:09:07'),
(2, 'andika22', 'Abii Hutabarat', '1662534676_ba0d36cb88cbf0ec9549.jpeg', '2022-09-11 16:29:38', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 1, '2022-09-11 23:29:38', '2022-09-11 23:29:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_mapel`
--

CREATE TABLE `mod_mapel` (
  `id` int(11) NOT NULL,
  `mapel` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jenjang` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `userentry` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `mod_mapel`
--

INSERT INTO `mod_mapel` (`id`, `mapel`, `jenjang`, `userentry`, `created_at`, `updated_at`) VALUES
(1, 'Pendidikan Agama Islam', 'SMA', '', NULL, NULL),
(2, 'Pendidikan Agama Kristen Protestan', 'SMA', '', NULL, NULL),
(3, 'Pendidikan Agama Kristen Katholik', 'SMA', '', NULL, NULL),
(4, 'Pendidikan Agama Hindu', 'SMA', '', NULL, NULL),
(5, 'Pendidikan Agama Budha', 'SMA', '', NULL, NULL),
(6, 'Pendidikan Pancasila dan Kewarganegaraan', 'SMA', 'Abii Hutabarat', NULL, '2022-08-05 02:57:39'),
(7, 'Bahasa Indonesia', 'SMA', '', NULL, NULL),
(8, 'Matematika', 'SMA', '', NULL, NULL),
(9, 'Sejarah Indonesia', 'SMA', '', NULL, NULL),
(10, 'Bahasa Inggris', 'SMA', '', NULL, NULL),
(11, 'Seni Budaya ', 'SMA', '', NULL, NULL),
(12, 'Prakarya', 'SMA', '', NULL, NULL),
(13, 'Pendidikan Jasmani Olahraga dan Kesehatan', 'SMA', 'Abii Hutabarat', NULL, '2022-08-05 02:58:05'),
(14, 'Biologi', 'SMA', '', NULL, NULL),
(15, 'Fisika', 'SMA', '', NULL, NULL),
(16, 'Kimia', 'SMA', '', NULL, NULL),
(17, 'Geografi', 'SMA', '', NULL, NULL),
(18, 'Ekonomi', 'SMA', '', NULL, NULL),
(19, 'Sosiologi dan Antropologi', 'SMA', '', NULL, NULL),
(20, 'Bahasa dan Sastra Indonesia', 'SMA', '', NULL, NULL),
(21, 'Bahasa dan Sastra Inggris', 'SMA', '', NULL, NULL),
(22, 'Bahasa dan Sastra Asing lainnya', 'SMA', '', NULL, NULL),
(23, 'Teknik Informatika Komputer ( TIK )', 'SMA', '', NULL, NULL),
(24, 'Mulok', 'SMA', '', NULL, NULL),
(25, 'Pengembangan Diri', 'SMA', '', NULL, NULL),
(26, 'BP / BK', 'SMA', '', NULL, NULL),
(30, 'Pendidikan Agama Islam', 'SMK', 'Abii Hutabarat', '2022-08-12 23:02:29', '2022-08-12 23:02:29'),
(31, 'Pendidikan Agama Kristen Protestan', 'SMK', 'Abii Hutabarat', '2022-08-12 23:02:43', '2022-08-12 23:02:43'),
(32, 'Pendidikan Agama Kristen Katholik', 'SMK', 'Abii Hutabarat', '2022-08-12 23:02:53', '2022-08-12 23:02:53'),
(33, 'Pendidikan Agama Hindu', 'SMK', 'Abii Hutabarat', '2022-08-12 23:03:02', '2022-08-12 23:03:02'),
(34, 'Pendidikan Agama Budha', 'SMK', 'Abii Hutabarat', '2022-08-12 23:03:11', '2022-08-12 23:03:11'),
(35, 'PPKN', 'SMK', 'Abii Hutabarat', '2022-08-12 23:03:22', '2022-08-12 23:03:22'),
(36, 'Bahasa Indonesia', 'SMK', 'Abii Hutabarat', '2022-08-12 23:03:30', '2022-08-12 23:03:30'),
(37, 'Matematika', 'SMK', 'Abii Hutabarat', '2022-08-12 23:03:40', '2022-08-12 23:03:40'),
(38, 'Sejarah Indonesia', 'SMK', 'Abii Hutabarat', '2022-08-12 23:03:51', '2022-08-12 23:03:51'),
(39, 'Bahasa Inggris', 'SMK', 'Abii Hutabarat', '2022-08-12 23:04:03', '2022-08-12 23:04:03'),
(40, 'Seni Budaya', 'SMK', 'Abii Hutabarat', '2022-08-12 23:04:12', '2022-08-12 23:04:12'),
(41, 'Kewirausahaan', 'SMK', 'Abii Hutabarat', '2022-08-12 23:04:20', '2022-08-12 23:04:20'),
(42, 'PJOK', 'SMK', 'Abii Hutabarat', '2022-08-12 23:04:29', '2022-08-12 23:04:29'),
(43, 'Penjas Orkes', 'SMK', 'Abii Hutabarat', '2022-08-12 23:04:52', '2022-08-12 23:04:52'),
(44, 'Biologi', 'SMK', 'Abii Hutabarat', '2022-08-12 23:05:07', '2022-08-12 23:05:07'),
(45, 'Fisika', 'SMK', 'Abii Hutabarat', '2022-08-12 23:05:15', '2022-08-12 23:05:15'),
(46, 'Kimia', 'SMK', 'Abii Hutabarat', '2022-08-12 23:05:31', '2022-08-12 23:05:31'),
(47, 'Simulasi dan Komunikasi Digital', 'SMK', 'Abii Hutabarat', '2022-08-12 23:05:42', '2022-08-12 23:05:42'),
(48, 'Muatan Lokal', 'SMK', 'Abii Hutabarat', '2022-08-12 23:05:52', '2022-08-12 23:05:52'),
(49, 'BK', 'SMK', 'Abii Hutabarat', '2022-08-12 23:06:02', '2022-08-12 23:06:02'),
(50, 'TPBO', 'SMK', 'Abii Hutabarat', '2022-08-12 23:06:14', '2022-08-12 23:06:14'),
(51, 'TKRO', 'SMK', 'Abii Hutabarat', '2022-08-12 23:06:24', '2022-08-12 23:06:24'),
(52, 'TBSM', 'SMK', 'Abii Hutabarat', '2022-08-12 23:06:35', '2022-08-12 23:06:35'),
(53, 'TKJ', 'SMK', 'Abii Hutabarat', '2022-08-12 23:06:50', '2022-08-12 23:06:50'),
(54, 'RPL', 'SMK', 'Abii Hutabarat', '2022-08-12 23:07:00', '2022-08-12 23:07:00'),
(56, 'Multimedia', 'SMK', 'Abii Hutabarat', '2022-08-12 23:07:33', '2022-08-12 23:07:33'),
(57, 'Akomodasi Perhotelan', 'SMK', 'Abii Hutabarat', '2022-08-12 23:07:42', '2022-08-12 23:07:42'),
(58, 'Tata Busana', 'SMK', 'Abii Hutabarat', '2022-08-12 23:07:52', '2022-08-12 23:07:52'),
(59, 'Teknik Pemesinan', 'SMK', 'Abii Hutabarat', '2022-08-12 23:08:22', '2022-08-12 23:08:22'),
(60, 'Teknik Audio Video', 'SMK', 'Abii Hutabarat', '2022-08-12 23:08:32', '2022-08-12 23:08:32'),
(61, 'Teknik Elektenika Industri', 'SMK', 'Abii Hutabarat', '2022-08-12 23:08:45', '2022-08-12 23:08:45'),
(62, 'Agribisnis Perikanan dan Air Tawar', 'SMK', 'Abii Hutabarat', '2022-08-12 23:08:54', '2022-08-12 23:08:54'),
(63, 'Bisnis Kontruksi Properti', 'SMK', 'Abii Hutabarat', '2022-08-12 23:09:02', '2022-08-12 23:09:02'),
(64, 'Produktif Akuntansi', 'SMK', 'Abii Hutabarat', '2022-08-12 23:09:12', '2022-08-12 23:09:12'),
(65, 'Produktif Administrasi Perkantoran', 'SMK', 'Abii Hutabarat', '2022-08-12 23:09:23', '2022-08-12 23:09:23'),
(66, 'Ekonomi Bisnis', 'SMK', 'Abii Hutabarat', '2022-08-12 23:09:32', '2022-08-12 23:09:32'),
(67, 'Akuntansi Keuangan', 'SMK', 'Abii Hutabarat', '2022-08-12 23:09:42', '2022-08-12 23:09:42'),
(68, 'Administrasi Umum', 'SMK', 'Abii Hutabarat', '2022-08-12 23:09:50', '2022-08-12 23:09:50'),
(69, 'Desain Pemodelan Informasi dan Bangunan', 'SMK', 'Abii Hutabarat', '2022-08-12 23:10:13', '2022-08-12 23:10:13'),
(70, 'Kimia Industri', 'SMK', 'Abii Hutabarat', '2022-08-12 23:10:30', '2022-08-12 23:10:30'),
(71, 'Pembiakan Tanaman', 'SMK', 'Abii Hutabarat', '2022-08-12 23:10:39', '2022-08-12 23:10:39'),
(72, 'Agribisnis Tanaman Pangan', 'SMK', 'Abii Hutabarat', '2022-08-12 23:10:49', '2022-08-12 23:10:49'),
(73, 'Dasar Budidaya Tanaman', 'SMK', 'Abii Hutabarat', '2022-08-12 23:10:57', '2022-08-12 23:10:57'),
(74, 'Teknik Pengelasan', 'SMK', 'Abii Hutabarat', '2022-08-12 23:11:06', '2022-08-12 23:11:06'),
(75, 'Tata Boga', 'SMK', 'Abii Hutabarat', '2022-08-12 23:11:15', '2022-08-12 23:11:15'),
(76, 'IPA', 'SMK', 'Abii Hutabarat', '2022-08-12 23:11:23', '2022-08-12 23:11:23'),
(77, 'Otomatisasi dan Tata Kelola Perkantoran', 'SMK', 'Abii Hutabarat', '2022-08-12 23:11:31', '2022-08-12 23:11:31'),
(78, 'Bisnis dan Pemasaran', 'SMK', 'Abii Hutabarat', '2022-08-12 23:11:39', '2022-08-12 23:11:39'),
(79, 'Agribisnis Pengolahan Hasil Pertanian', 'SMK', 'Abii Hutabarat', '2022-08-12 23:11:48', '2022-08-12 23:11:48'),
(80, 'Budidaya Tanaman Sayuran', 'SMK', 'Abii Hutabarat', '2022-08-12 23:11:56', '2022-08-12 23:11:56'),
(81, 'Budidaya Tanaman Buah', 'SMK', 'Abii Hutabarat', '2022-08-12 23:12:04', '2022-08-12 23:12:04'),
(82, 'Budidaya Tanaman Hias', 'SMK', 'Abii Hutabarat', '2022-08-12 23:12:12', '2022-08-12 23:12:12'),
(83, 'Alat dan Mesin Pertanian', 'SMK', 'Abii Hutabarat', '2022-08-12 23:12:19', '2022-08-12 23:12:19'),
(84, 'Nautika Kapal Penangkap Ikan', 'SMK', 'Abii Hutabarat', '2022-08-12 23:12:27', '2022-08-12 23:12:27'),
(85, 'Teknika Kapal Penagkap Ikan', 'SMK', 'Abii Hutabarat', '2022-08-12 23:12:36', '2022-08-12 23:12:36'),
(86, 'Agribisnis Pengolahan Hasil Perikanan', 'SMK', 'Abii Hutabarat', '2022-08-12 23:12:44', '2022-08-12 23:12:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_mutasi`
--

CREATE TABLE `mod_mutasi` (
  `id` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `nisn` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `kelas` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `jurusan` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pkeahlian` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asal_sekolah` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `no_surat` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mutasi` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tahun` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `npsn` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `nama_sekolah` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jenjang` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `userentry` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `mod_mutasi`
--

INSERT INTO `mod_mutasi` (`id`, `id_sekolah`, `nisn`, `nama`, `jenis_kel`, `kelas`, `jurusan`, `pkeahlian`, `asal_sekolah`, `no_surat`, `mutasi`, `tahun`, `keterangan`, `npsn`, `nama_sekolah`, `jenjang`, `userentry`, `created_at`, `updated_at`) VALUES
(7, 1, '1212121212', 'Putra', 'L', 'X', 'IPA', NULL, '', 'fsdfsdfs', 'keluar', '2023/2024', 'dfsfsfdf', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'Andika Pratama', '2022-08-02 11:41:05', '2022-08-02 11:41:05'),
(4, 1, '4444444444', 'Fawad', 'L', 'X', 'IPA', NULL, 'TYY', '134A/122/2022', 'pindahan', '2024/2025', 'suka cabut', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'Andika Pratama', '2022-08-01 10:47:50', '2022-08-01 10:47:50'),
(10, 86, '5656565650', 'test', 'P', 'X', NULL, 'TBSM', 'SMA Negeri 2', 'dsasd/asdasdasd/2202', 'pindahan', '2023/2024', 'pindah', '10204029', 'SMK SWASTA TRIYADIKAYASA AEK SONGSONGAN', 'SMK', 'Putra', '2022-08-14 07:51:42', '2022-08-14 07:51:42'),
(11, 86, '2323343434', 'test', 'L', 'X', NULL, 'TBSM', '', 'sdfsdf/sdfsdfs/32424', 'keluar', '2024/2025', 'berjudi', '10204029', 'SMK SWASTA TRIYADIKAYASA AEK SONGSONGAN', 'SMK', 'Putra', '2022-08-14 07:52:44', '2022-08-14 07:52:44'),
(13, 1, '2344234233', 'dika', 'L', 'X', 'IPA', NULL, '', '23/fhdddfgg', 'keluar', '2022/2023', 'dfgdgdfgdg', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'Andika Pratama', '2022-09-01 23:31:12', '2022-09-01 23:31:12'),
(14, 1, '3553453535', 'sonia', 'L', 'X', 'IPA', NULL, '', '34534/fghfhfhfd', 'keluar', '2022/2023', 'hddfdgdfg', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'Andika Pratama', '2022-09-01 23:48:24', '2022-09-01 23:48:24'),
(15, 1, '3454535357', 'kita', 'L', 'X', 'IPA', NULL, 'SMA Negeri  1  Kisaran', 'sdfs/56546/fh', 'keluar', '2022/2023', 'dgsfsdfsdfsd', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'Andika Pratama', '2022-09-01 23:50:14', '2022-09-01 23:50:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_paket_keahlian`
--

CREATE TABLE `mod_paket_keahlian` (
  `id` int(11) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `paket_keahlian` varchar(255) NOT NULL,
  `userentry` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mod_paket_keahlian`
--

INSERT INTO `mod_paket_keahlian` (`id`, `kode`, `paket_keahlian`, `userentry`, `created_at`, `updated_at`) VALUES
(1, '1291', 'Teknik Kendaraan Ringan Otomotif (K13)', 'Abii Hutabarat', '2022-09-10 06:43:44', '2022-09-10 06:50:53'),
(2, '2143', 'Teknik Komputer dan Jaringan (K13)', 'Abii Hutabarat', '2022-09-10 06:44:04', '2022-09-10 06:44:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_pegawai`
--

CREATE TABLE `mod_pegawai` (
  `id` int(11) NOT NULL,
  `id_sekolah` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nip` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `nuptk` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tempat_lahir` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_lahir` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kel` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `golruang` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `tingkat` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `jurusan` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `thnijazah` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `agama` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tmtpegawai` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `tmtsekolah` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `nmdiklat` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tdiklat` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lmdiklat` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `thndiklat` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `kehadiran` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `mk_thn` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `mk_bln` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sts_vaksin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_vaksin` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lok_vaksin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `npsn` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `nama_sekolah` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jenjang` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `userentry` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `mod_pegawai`
--

INSERT INTO `mod_pegawai` (`id`, `id_sekolah`, `nip`, `nik`, `nuptk`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kel`, `golruang`, `tingkat`, `jurusan`, `thnijazah`, `agama`, `status`, `tmtpegawai`, `tmtsekolah`, `nmdiklat`, `tdiklat`, `lmdiklat`, `thndiklat`, `kehadiran`, `mk_thn`, `mk_bln`, `foto`, `sts_vaksin`, `tgl_vaksin`, `lok_vaksin`, `npsn`, `nama_sekolah`, `jenjang`, `userentry`, `created_at`, `updated_at`) VALUES
(14, '1', '2323232323232323', '9898989898989898', '3242344234', 'kadis', 'aek songsongan', '2022-07-28', 'L', 'IV/D', 'S1', 'Teknik Informatika', '2021', 'Islam', 'PNS', '2022-07-01', '2022-07-09', 'testing', 'yogya', '3', '2021', '100', '', '', '1658855266_cf7199acc5eeb3cec634.jpeg', 'Dosis I', '2022-07-20', 'puskesmas', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'Andika Pratama', '2022-07-26 12:04:35', '2022-08-12 22:28:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_profil`
--

CREATE TABLE `mod_profil` (
  `id` int(11) NOT NULL,
  `id_sekolah` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama_sekolah` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `npsn` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `nss` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `nds` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nosiop` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `akreditas` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `thnberdiri` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nosk` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tglsk` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `standar` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `waktub` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `kabupaten` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `kecamatan` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kodepos` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `telepon` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `nama_kepsek` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `jenjang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `namayys` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamatyys` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `userentry` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `profil` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `mod_profil`
--

INSERT INTO `mod_profil` (`id`, `id_sekolah`, `nama_sekolah`, `npsn`, `nss`, `nds`, `nosiop`, `akreditas`, `thnberdiri`, `nosk`, `tglsk`, `status`, `standar`, `waktub`, `kabupaten`, `kecamatan`, `alamat`, `kodepos`, `telepon`, `nama_kepsek`, `email`, `jenjang`, `website`, `namayys`, `alamatyys`, `longitude`, `latitude`, `userentry`, `profil`, `foto`, `created_at`, `updated_at`) VALUES
(6, '1', 'SMA Negeri  1  Kisaran', '10204064', '23233', '0', '4555', 'A', '2001', 'dfgdgg', '2022-08-11', 'Negeri', 'SSN', 'Pagi', '1209', 'Aek Songsongan', 'sdfsfsf.asdasd', '34535', '08224567876', 'Tommy S.Kom', 'abii@gmail.com', 'SMA', 'https://sma.com', '', '', '99.61981818096318', '2.9708987430050864', 'DWI AHMAD', '1660984541_33fa36c941a197112a09.png', '1661185340_f910ec6ad1b17dde579a.png', '2022-08-20 03:33:17', '2022-09-07 22:12:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_program_keahlian`
--

CREATE TABLE `mod_program_keahlian` (
  `id` int(11) NOT NULL,
  `program` varchar(255) NOT NULL,
  `userentry` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mod_program_keahlian`
--

INSERT INTO `mod_program_keahlian` (`id`, `program`, `userentry`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Otomotif', 'Abii Hutabarat', '2022-09-10 06:23:33', '2022-09-10 06:24:06'),
(2, 'Teknik Komputer dan Jaringan', 'Abii Hutabarat', '2022-09-10 06:23:46', '2022-09-10 06:23:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_sarana`
--

CREATE TABLE `mod_sarana` (
  `id` int(11) NOT NULL,
  `sarana` varchar(50) NOT NULL,
  `userentry` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mod_sarana`
--

INSERT INTO `mod_sarana` (`id`, `sarana`, `userentry`, `created_at`, `updated_at`) VALUES
(1, 'Ruang Kepala Sekolah', 'Abii Hutabarat', '2022-08-05 00:18:02', '2022-09-06 04:31:22'),
(2, 'Ruang Wakasek', 'Abii Hutabarat', '2022-08-05 00:18:23', '2022-08-05 00:18:23'),
(3, 'Ruang Guru', 'Abii Hutabarat', '2022-08-05 00:18:33', '2022-08-05 00:18:33'),
(4, 'Ruang Tendik', 'Abii Hutabarat', '2022-08-05 00:18:45', '2022-08-05 00:18:45'),
(5, 'Ruang Operator', 'Abii Hutabarat', '2022-08-05 00:18:54', '2022-08-05 00:18:54'),
(6, 'Ruang Kelas', 'Abii Hutabarat', '2022-08-05 00:19:12', '2022-08-05 00:19:12'),
(7, 'Ruang TU', 'Abii Hutabarat', '2022-08-05 00:19:21', '2022-08-05 00:19:21'),
(8, 'Ruang Belajar Agama Kristen', 'Abii Hutabarat', '2022-08-05 00:19:39', '2022-08-05 00:19:39'),
(9, 'Ruang BK', 'Abii Hutabarat', '2022-08-05 00:19:49', '2022-08-05 00:19:49'),
(10, 'Ruang MGMP', 'Abii Hutabarat', '2022-08-05 00:19:58', '2022-08-05 00:19:58'),
(11, 'Ruang Aula', 'Abii Hutabarat', '2022-08-05 00:20:07', '2022-08-05 00:20:07'),
(12, 'Ruang UKS', 'Abii Hutabarat', '2022-08-05 00:20:16', '2022-08-05 00:20:16'),
(13, 'Ruang OSIS', 'Abii Hutabarat', '2022-08-05 00:20:26', '2022-08-05 00:20:26'),
(14, 'Ruang Pramuka', 'Abii Hutabarat', '2022-08-05 00:20:37', '2022-08-05 00:20:37'),
(15, 'Ruang Komite', 'Abii Hutabarat', '2022-08-05 00:20:48', '2022-08-05 00:20:48'),
(16, 'Ruang Piket', 'Abii Hutabarat', '2022-08-05 00:20:56', '2022-08-05 00:20:56'),
(17, 'Gudang Sekolah', 'Abii Hutabarat', '2022-08-05 00:21:08', '2022-08-05 00:21:08'),
(18, 'Gudang Sekolah', 'Abii Hutabarat', '2022-08-05 00:21:10', '2022-08-05 00:21:10'),
(19, 'WC', 'Abii Hutabarat', '2022-08-05 00:21:18', '2022-08-05 00:21:18'),
(20, 'Kantin', 'Abii Hutabarat', '2022-08-05 00:21:25', '2022-08-05 00:21:25'),
(21, 'Parkir Guru', 'Abii Hutabarat', '2022-08-05 00:21:35', '2022-08-05 00:21:35'),
(22, 'Parkir Siswa', 'Abii Hutabarat', '2022-08-05 00:21:42', '2022-08-05 00:21:42'),
(23, 'Bank Sampah', 'Abii Hutabarat', '2022-08-05 00:21:52', '2022-08-05 00:21:52'),
(24, 'Tempat Ibadah', 'Abii Hutabarat', '2022-08-05 00:22:01', '2022-08-05 00:22:01'),
(25, 'Laboratorium Fisika', 'Abii Hutabarat', '2022-08-05 00:22:32', '2022-08-05 00:22:32'),
(26, 'Laboratorium Kimia', 'Abii Hutabarat', '2022-08-05 00:22:59', '2022-08-05 00:22:59'),
(27, 'Laboratorium Biologi', 'Abii Hutabarat', '2022-08-05 00:23:15', '2022-08-05 00:23:15'),
(28, 'Laboratorium Bahasa', 'Abii Hutabarat', '2022-08-05 00:23:35', '2022-08-05 00:23:35'),
(29, 'Laboratorium Komputer', 'Abii Hutabarat', '2022-08-05 00:23:49', '2022-08-05 00:23:49'),
(30, 'Laboratorium IPS', 'Abii Hutabarat', '2022-08-05 00:24:03', '2022-08-05 00:24:03'),
(31, 'Laboratorium Matematika', 'Abii Hutabarat', '2022-08-05 00:24:23', '2022-08-05 00:24:23'),
(32, 'Perpustakaan', 'Abii Hutabarat', '2022-08-05 00:24:33', '2022-08-05 00:24:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_sarpras`
--

CREATE TABLE `mod_sarpras` (
  `id` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `prasarana` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `baik` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `rusak_ringan` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `rusak_berat` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `npsn` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `nama_sekolah` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jenjang` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `userentry` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `mod_sarpras`
--

INSERT INTO `mod_sarpras` (`id`, `id_sekolah`, `prasarana`, `baik`, `rusak_ringan`, `rusak_berat`, `keterangan`, `npsn`, `nama_sekolah`, `jenjang`, `userentry`, `created_at`, `updated_at`) VALUES
(14, 1, 'Ruang Guru', '0', '2', '0', 'Rusak ringan', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'Andika Pratama', '2022-09-03 05:56:59', '2022-09-03 05:59:55'),
(12, 1, 'Ruang Kepala Sekolah', '1', '0', '0', 'Masih Baik', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'Andika Pratama', '2022-09-03 05:56:24', '2022-09-03 06:00:00'),
(13, 1, 'Ruang Wakasek', '2', '0', '0', 'Masih Baik', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'Andika Pratama', '2022-09-03 05:56:35', '2022-09-03 06:00:04'),
(15, 1, 'Ruang Tendik', '3', '0', '0', 'Masih Baik', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'Andika Pratama', '2022-09-03 05:57:17', '2022-09-03 06:00:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_sekolah`
--

CREATE TABLE `mod_sekolah` (
  `id` int(11) NOT NULL,
  `npsn` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `jenjang` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `sekolah` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kabupaten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status_sekolah` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `userentry` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `mod_sekolah`
--

INSERT INTO `mod_sekolah` (`id`, `npsn`, `jenjang`, `sekolah`, `kabupaten`, `status_sekolah`, `userentry`, `created_at`, `updated_at`) VALUES
(1, '10204064', 'SMA', 'SMA Negeri 1 Kisaran', 'ASAHAN', 'Negeri', '', NULL, NULL),
(2, '10204053', 'SMA', 'SMA Negeri 2 Kisaran', 'ASAHAN', 'Negeri', '', NULL, NULL),
(5, '10258512', 'SMA', 'SMA Negeri 4  Kisaran', 'ASAHAN', 'Negeri', '', NULL, NULL),
(4, '10204067', 'SMA', 'SMA Negeri 3 Kisaran', 'ASAHAN', 'Negeri', '', NULL, NULL),
(6, '10204061', 'SMA', 'SMA Negeri 1  Meranti', 'ASAHAN', 'Negeri', '', NULL, NULL),
(7, '10204059', 'SMA', 'SMA Negeri 2 Meranti', 'ASAHAN', 'Negeri', '', NULL, NULL),
(8, '10204065', 'SMA', 'SMA Negeri 1 Buntu Pane', 'ASAHAN', 'Negeri', '', NULL, NULL),
(9, '10204084', 'SMA', 'SMA Negeri 1 Bandar Pasir Mandoge', 'ASAHAN', 'Negeri', '', NULL, NULL),
(10, '10258001', 'SMA', 'SMA Negeri 1  Bandar Pulau', 'ASAHAN', 'Negeri', '', NULL, NULL),
(11, '10204066', 'SMA', 'SMA Negeri 1 Aek Songsongan', 'ASAHAN', 'Negeri', '', NULL, NULL),
(12, '10204244', 'SMA', 'SMA Negeri 1  Aek Kuasan', 'ASAHAN', 'Negeri', '', NULL, NULL),
(13, '10204060', 'SMA', 'SMA Negeri 1  Pulau Rakyat', 'ASAHAN', 'Negeri', '', NULL, NULL),
(14, '10204243', 'SMA', 'SMA Negeri 1 Air Batu', 'ASAHAN', 'Negeri', '', NULL, NULL),
(15, '10204057', 'SMA', 'SMA Negeri 1  Simpang Empat', 'ASAHAN', 'Negeri', '', NULL, NULL),
(16, '10204074', 'SMA', 'SMA Negeri 1 Sei Kepayang', 'ASAHAN', 'Negeri', '', NULL, NULL),
(17, '10204055', 'SMA', 'SMA Negeri 1   Tanjung Balai Asahan', 'ASAHAN', 'Negeri', '', NULL, NULL),
(18, '10204224', 'SMA', 'SMA Negeri 1 Air Joman', 'ASAHAN', 'Negeri', '', NULL, NULL),
(19, '10204227', 'SMA', 'SMA Swasta Diponegoro Kisaran', 'ASAHAN', 'Swasta', '', NULL, NULL),
(20, '10204256', 'SMA', 'SMA Swasta Muhamaddiya 8 Kisaran', 'ASAHAN', 'Swasta', '', NULL, NULL),
(21, '10204229', 'SMA', 'SMA Swasta Daerah Kisaran', 'ASAHAN', 'Swasta', '', NULL, NULL),
(22, '10204231', 'SMA', 'SMA Swasta Daerah Air Joman', 'ASAHAN', 'Swasta', '', NULL, NULL),
(23, '69930818', 'SMA', 'SMA IT Swasta Daarussakinah', 'ASAHAN', 'Swasta', '', NULL, NULL),
(24, '10204250', 'SMA', 'SMA Swasta Taman Siswa Kisaran', 'ASAHAN', 'Swasta', '', NULL, NULL),
(25, '10204253', 'SMA', 'SMA Swasta Panti Budaya', 'ASAHAN', 'Swasta', '', NULL, NULL),
(26, '10204241', 'SMA', 'SMA Swasta Methodis Kisaran', 'ASAHAN', 'Swasta', '', NULL, NULL),
(27, '69883509', 'SMA', 'SMA Swasta Ar-Rasyid', 'ASAHAN', 'Swasta', '', NULL, NULL),
(28, '10204249', 'SMA', 'SMA Swasta Taman Siswa Sukadamai', 'ASAHAN', 'Swasta', '', NULL, NULL),
(29, '10204237', 'SMA', 'SMA Swasta  Al- Maksum', 'ASAHAN', 'Swasta', '', NULL, NULL),
(30, '10261242', 'SMA', 'SMA Swasta  IT Daar AL Uluum Kisaran', 'ASAHAN', 'Swasta', '', NULL, NULL),
(31, '10204226', 'SMA', 'SMA Swasta Harapan Lobu Rappa', 'ASAHAN', 'Swasta', '', NULL, NULL),
(32, '10204251', 'SMA', 'SMA Swasta Swadaya Pulau Rakyat', 'ASAHAN', 'Swasta', '', NULL, NULL),
(33, '10204247', 'SMA', 'SMA Swasta Triyadikayasa A.Songsongan', 'ASAHAN', 'Swasta', '', NULL, NULL),
(34, '10257998', 'SMA', 'SMA Swasta  Saniah  Aek Songsongan', 'ASAHAN', 'Swasta', '', NULL, NULL),
(35, '10204240', 'SMA', 'SMA Swasta  Meranti', 'ASAHAN', 'Swasta', '', NULL, NULL),
(36, '10204225', 'SMA', 'SMA Swasta Kesatuan Meranti', 'ASAHAN', 'Swasta', '', NULL, NULL),
(37, '10204236', 'SMA', 'SMA Swasta Al-Washliyah 8 Meranti', 'ASAHAN', 'Swasta', '', NULL, NULL),
(38, '10258748', 'SMA', 'SMA Swasta Darma Putra ', 'ASAHAN', 'Swasta', '', NULL, NULL),
(39, '10259244', 'SMA', 'SMA Swasta Nusantara Setia Janji', 'ASAHAN', 'Swasta', '', NULL, NULL),
(40, '69786708', 'SMA', 'SMA Swasta Swadaya Tinggi Raja', 'ASAHAN', 'Swasta', '', NULL, NULL),
(41, '10204232', 'SMA', 'SMA Swasta Daerah Air Batu', 'ASAHAN', 'Swasta', '', NULL, NULL),
(42, '10204245', 'SMA', 'SMA Swasta Yapim Simpang Kawat', 'ASAHAN', 'Swasta', '', NULL, NULL),
(43, '10204246', 'SMA', 'SMA Swasta Umum Sentosa ', 'ASAHAN', 'Swasta', '', NULL, NULL),
(44, '10260915', 'SMA', 'SMA Negeri 1 Air Putih', 'BATU BARA', 'Negeri', '', NULL, NULL),
(45, '10204058', 'SMA', 'SMA Negeri 1 Sei Suka', 'BATU BARA', 'Negeri', '', NULL, NULL),
(46, '10204056', 'SMA', 'SMA Negeri 1 Talawi ', 'BATU BARA', 'Negeri', '', NULL, NULL),
(47, '10204062', 'SMA', 'SMA Negeri 1 Medang Deras', 'BATU BARA', 'Negeri', '', NULL, NULL),
(48, '10204063', 'SMA', 'SMA Negeri 1 Lima Puluh', 'BATU BARA', 'Negeri', '', NULL, NULL),
(49, '69822697', 'SMA', 'SMA Negeri 1 Sei Balai', 'BATU BARA', 'Negeri', '', NULL, NULL),
(50, '10204054', 'SMA', 'SMA Negeri 1 Tanjung Tiram', 'BATU BARA', 'Negeri', '', NULL, NULL),
(51, '10204228', 'SMA', 'SMA Swasta Daerah Sei Bejangkar', 'BATU BARA', 'Swasta', '', NULL, NULL),
(52, '10260917', 'SMA', 'SMA Swasta Citra Medang Deras', 'BATU BARA', 'Swasta', '', NULL, NULL),
(53, '10262331', 'SMA', 'SMA Swasta Al - Azhar', 'BATU BARA', 'Swasta', '', NULL, NULL),
(54, '10204255', 'SMA', 'SMA Swasta Nasional Petatal', 'BATU BARA', 'Swasta', '', NULL, NULL),
(55, '10204248', 'SMA', 'SMA Swasta Teladan Indrapura', 'BATU BARA', 'Swasta', '', NULL, NULL),
(56, '10204252', 'SMA', 'SMA Swasta Sepakat Sei Balai', 'BATU BARA', 'Swasta', '', NULL, NULL),
(57, '10260076', 'SMA', 'SMA Swasta Bina Bangsa Simpang Gambus', 'BATU BARA', 'Swasta', '', NULL, NULL),
(58, '10204230', 'SMA', 'SMA Swasta Daerah Air Putih', 'BATU BARA', 'Swasta', '', NULL, NULL),
(59, '10204242', 'SMA', 'SMA Swasta Mitra Inalum', 'BATU BARA', 'Swasta', '', NULL, NULL),
(60, '10260916', 'SMA', 'SMA Swasta  Mhd 17 Tanjung Tiram', 'BATU BARA', 'Swasta', '', NULL, NULL),
(61, '10260918', 'SMA', 'SMA Swasta YPK Kedai Sianam', 'BATU BARA', 'Swasta', '', NULL, NULL),
(62, '10204238', 'SMA', 'SMA Swasta Advent Tanjung Kasau', 'BATU BARA', 'Swasta', '', NULL, NULL),
(63, '10204254', 'SMA', 'SMA Swasta  Nusantara Labuhan Ruku', 'BATU BARA', 'Swasta', '', NULL, NULL),
(64, '10261247', 'SMA', 'SMA Swasta Taman Siswa Sidomulyo', 'BATU BARA', 'Swasta', '', NULL, NULL),
(65, '69991482', 'SMA', 'SMA Swasta IT Al Izzah', 'BATU BARA', 'Swasta', '', NULL, NULL),
(66, '71717171', 'SMA', 'SMA Swasta Daarul Ilmi', 'ASAHAN', 'Swasta', 'Abii Hutabarat', NULL, '2022-08-26 09:44:15'),
(67, '10204075', 'SMK', 'SMK NEGERI 1 KISARAN', 'ASAHAN', 'Negeri', '', NULL, NULL),
(68, '10204073', 'SMK', 'SMK NEGERI 2 KISARAN', 'ASAHAN', 'Negeri', '', NULL, NULL),
(69, '10204076', 'SMK', 'SMK NEGERI 1 SETIA JANJI', 'ASAHAN', 'Negeri', '', NULL, NULL),
(70, '10258713', 'SMK', 'SMK NEGERI 1 PULAU RAKYAT', 'ASAHAN', 'Negeri', '', NULL, NULL),
(71, '10261225', 'SMK', 'SMK NEGERI 1 MERANTI', 'ASAHAN', 'Negeri', '', NULL, NULL),
(72, '10261334', 'SMK', 'SMK SPP NEGERI ASAHAN', 'ASAHAN', 'Negeri', '', NULL, NULL),
(73, '10261611', 'SMK', 'SMK NEGERI 1 AIR BATU', 'ASAHAN', 'Negeri', '', NULL, NULL),
(74, '10260610', 'SMK', 'SMK NEGERI 1 AIR JOMAN', 'ASAHAN', 'Negeri', '', NULL, NULL),
(75, '69788116', 'SMK', 'SMK NEGERI 1 BANDAR PASIR MANDOGE', 'ASAHAN', 'Negeri', '', NULL, NULL),
(76, '69858491', 'SMK', 'SMK NEGERI 1 SEI KEPAYANG', 'ASAHAN', 'Negeri', '', NULL, NULL),
(77, '10204032', 'SMK', 'SMK SWASTA TAMAN SISWA KISARAN', 'ASAHAN', 'Swasta', '', NULL, NULL),
(78, '10204068', 'SMK', 'SMK SWASTA AL-MASHUM KISARAN', 'ASAHAN', 'Swasta', '', NULL, NULL),
(79, '10258716', 'SMK', 'SMK SWASTA ASAHAN KISARAN', 'ASAHAN', 'Swasta', '', NULL, NULL),
(80, '10258714', 'SMK', 'SMK SWASTA MUHAMMADIYAH 5 KISARAN', 'ASAHAN', 'Swasta', '', NULL, NULL),
(81, '10204078', 'SMK', 'SMK SWASTA MERANTI', 'ASAHAN', 'Swasta', '', NULL, NULL),
(82, '10204079', 'SMK', 'SMK SWASTA KESATUAN MERANTI', 'ASAHAN', 'Swasta', '', NULL, NULL),
(83, '10204031', 'SMK', 'SMK SWASTA TAMAN SISWA SUKADAMAI', 'ASAHAN', 'Swasta', '', NULL, NULL),
(84, '10258720', 'MA', 'SMK SWASTA HARAPAN SIMPANG EMPAT', 'ASAHAN', 'Swasta', '', NULL, NULL),
(85, '10204028', 'SMK', 'SMK SWASTA UMUM SENTOSA', 'ASAHAN', 'Swasta', '', NULL, NULL),
(86, '10204029', 'SMK', 'SMK SWASTA TRIYADIKAYASA AEK SONGSONGAN', 'ASAHAN', 'Swasta', '', NULL, NULL),
(87, '10204083', 'SMK', 'SMK-2 SWASTA YAPIM SIMPANG KAWAT', 'ASAHAN', 'Swasta', '', NULL, NULL),
(88, '10258722', 'SMK', 'SMK SWASTA AMAL BAKTI SEI KAMAH 2', 'ASAHAN', 'Swasta', '', NULL, NULL),
(89, '10204077', 'SMK', 'SMK SWASTA MUHAMMADIYAH 10', 'ASAHAN', 'Swasta', '', NULL, NULL),
(90, '10204070', 'SMK', 'SMK SWASTA PEMDA KISARAN', 'ASAHAN', 'Swasta', '', NULL, NULL),
(91, '10204072', 'SMK', 'SMK SWASTA NASIONAL KISARAN', 'ASAHAN', 'Swasta', '', NULL, NULL),
(92, '10204027', 'SMK', 'SMK-1 SWASTA YAPIM SIMPANG KAWAT', 'ASAHAN', 'Swasta', '', NULL, NULL),
(93, '10258721', 'SMK', 'SMK SWASTA HARAPAN DANAU SIJABUT', 'ASAHAN', 'Swasta', '', NULL, NULL),
(94, '10261243', 'SMK', 'SMK SWASTA BINA BAKTI', 'ASAHAN', 'Swasta', '', NULL, NULL),
(95, '69728734', 'SMK', 'SMKS ASSYFA KISARAN', 'ASAHAN', 'Swasta', '', NULL, NULL),
(96, '69728735', 'SMK', 'SMK SWASTA PPM SHADR EL-ISLAM ASAHAN', 'ASAHAN', 'Swasta', '', NULL, NULL),
(97, '69786453', 'SMK', 'SMK SWASTA YAPDI BANDAR PULAU', 'ASAHAN', 'Swasta', '', NULL, NULL),
(98, '69772749', 'SMK', 'SMK SWASTA AL-ASRI AIR BATU', 'ASAHAN', 'Swasta', '', NULL, NULL),
(99, '69786701', 'SMK', 'SMK SWASTA AL-AZMI SEI DADAP', 'ASAHAN', 'Swasta', '', NULL, NULL),
(100, '69895770', 'SMK', 'SMK SWASTA AN NIMAH SILAU LAUT', 'ASAHAN', 'Swasta', '', NULL, NULL),
(101, '69894393', 'SMK', 'SMK SWASTA AN NIMAH PULAU RAKYAT', 'ASAHAN', 'Swasta', '', NULL, NULL),
(102, '69893001', 'SMK', 'SMK SWASTA DARMA BAKTI SEI KEPAYANG', 'ASAHAN', 'Swasta', '', NULL, NULL),
(103, '69899800', 'SMK', 'SMK SWASTA SWADAYA PULAU RAKYAT', 'ASAHAN', 'Swasta', '', NULL, NULL),
(104, '69973539', 'SMK', 'SMK SWASTA DARUL JALAL ASAHAN', 'ASAHAN', 'Swasta', '', NULL, NULL),
(105, '69966498', 'SMK', 'SMK SWASTA HARAPAN LOBU RAPPA', 'ASAHAN', 'Swasta', '', NULL, NULL),
(106, '10260919', 'SMK', 'SMK NEGERI 1 TALAWI', 'BATU BARA', 'Negeri', '', NULL, NULL),
(107, '10261043', 'SMK', 'SMK NEGERI 1 AIR PUTIH', 'BATU BARA', 'Negeri', '', NULL, NULL),
(108, '10262114', 'SMK', 'SMK NEGERI 1 LIMA PULUH', 'BATU BARA', 'Negeri', '', NULL, NULL),
(109, '69786268', 'SMK', 'SMK NEGERI 1 TANJUNG TIRAM', 'BATU BARA', 'Negeri', '', NULL, NULL),
(110, '69948256', 'SMK', 'SMK NEGERI 2 LIMA PULUH', 'BATU BARA', 'Negeri', '', NULL, NULL),
(111, '69948250', 'SMK', 'SMK NEGERI 1 SEI SUKA ', 'BATU BARA', 'Negeri', '', NULL, NULL),
(112, '69948251', 'SMK', 'SMK NEGERI 1 MEDANG DERAS', 'BATU BARA', 'Swasta', '', NULL, NULL),
(113, '10259577', 'SMK', 'SMK 2 SWASTA DAERAH SEI BEJANGKAR', 'BATU BARA', 'Swasta', '', NULL, NULL),
(114, '10204071', 'SMK', 'SMK SWASTA NUSANTARA LABUHAN RUKU', 'BATU BARA', 'Swasta', '', NULL, NULL),
(115, '10260937', 'SMK', 'SMK SWASTA SEPAKAT SEI BALAI', 'BATU BARA', 'Swasta', '', NULL, NULL),
(116, '10204082', 'SMK', 'SMK SWASTA BUDHI DARMA INDRAPURA', 'BATU BARA', 'Swasta', '', NULL, NULL),
(117, '10204069', 'SMK', 'SMK SWASTA T. AMIR HAMZAH', 'BATU BARA', 'Swasta', '', NULL, NULL),
(118, '10204030', 'SMK', 'SMK SWASTA TELADAN INDRAPURA', 'BATU BARA', 'Swasta', '', NULL, NULL),
(119, '10261165', 'SMK', 'SMK 1 SWASTA DAERAH SEI BEJANGKAR', 'BATU BARA', 'Swasta', '', NULL, NULL),
(120, '10261569', 'SMK', 'SMK SWASTA CITRA ABDI NEGORO', 'BATU BARA', 'Swasta', '', NULL, NULL),
(121, '10263517', 'SMK', 'SMK SWASTA YAPIM INDRAPURA', 'BATU BARA', 'Swasta', '', NULL, NULL),
(122, '10264871', 'SMK', 'SMK SWASTA DAAR AL MUHSININ', 'BATU BARA', 'Swasta', '', NULL, NULL),
(123, '10264872', 'SMK', 'SMK SWASTA MUHAMMADIYAH 15 TANJUNG TIRAM', 'BATU BARA', 'Swasta', '', NULL, NULL),
(124, '69883492', 'SMK', 'SMK SWASTA DR. CIPTO MANGUN KUSUMO MANDIRI', 'BATU BARA', 'Swasta', '', NULL, NULL),
(125, '69883518', 'SMK', 'SMK SWASTA AL WASHLIYAH 17 AIR PUTIH', 'BATU BARA', 'Swasta', '', NULL, NULL),
(126, '69949666', 'SMK', 'SMK SWASTA MIFTAHUL JANNAH', 'BATU BARA', 'Swasta', '', NULL, NULL),
(127, '69953531', 'SMK', 'SMK SWASTA AL IKHLAS  SUKOREJO', 'BATU BARA', 'Swasta', '', NULL, NULL),
(128, '70002552', 'SMK', 'SMK SWASTA 2 TAMAN ILMU KEDAISIANAM', 'BATU BARA', 'Swasta', '', NULL, NULL),
(129, '70012240', 'SMK', 'SMK SWASTA AL FURQON PETATAL', 'BATU BARA', 'Swasta', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_siswa`
--

CREATE TABLE `mod_siswa` (
  `id` int(11) NOT NULL,
  `id_sekolah` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nisn` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_lahir` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `umur` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `agama` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kelas` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `pkeahlian` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jurusan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nohp` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `program_pip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tahun_msk` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `asal_sekolah` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_surat` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sts_mutasi` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keterangan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sts_vaksin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `npsn` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `nama_sekolah` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jenjang` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `userentry` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `mod_siswa`
--

INSERT INTO `mod_siswa` (`id`, `id_sekolah`, `nisn`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kel`, `umur`, `agama`, `alamat`, `kelas`, `pkeahlian`, `jurusan`, `status`, `nohp`, `program_pip`, `tahun_msk`, `asal_sekolah`, `no_surat`, `sts_mutasi`, `keterangan`, `sts_vaksin`, `npsn`, `nama_sekolah`, `jenjang`, `userentry`, `created_at`, `updated_at`) VALUES
(75, '1', '5656565656', 'Abii Hutabarat', 'Aek Songsongan', '2022-07-08', 'L', '14', 'Islam', 'Lima Puluh', 'XI', NULL, 'IPA', 'Aktif', '082274884828', NULL, '2022/2023', NULL, NULL, NULL, NULL, 'Dosis I', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'Andika Pratama', '2022-07-30 20:55:34', '2022-09-06 04:57:32'),
(77, '1', '4444444444', 'Fawad Azmi', 'aek songsongan', '2022-08-10', 'L', '15', 'Kristen Katholik', 'aek songsongan', 'XI', NULL, 'IPA', 'Aktif', '082274566778', NULL, '2024/2025', 'TYY', '134A/122/2022', 'pindahan', 'suka cabut', 'Dosis I', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'Andika Pratama', '2022-08-01 10:47:50', '2022-09-06 04:57:32'),
(105, '1', '3423423423', 'santi', 'asdasdad', '2022-09-02', 'P', '17', 'Islam', 'asdasd', 'XI', NULL, 'IPA', 'Aktif', '085675757', NULL, '2022/2023', NULL, NULL, NULL, NULL, 'Dosis I', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'Andika Pratama', '2022-09-03 01:45:09', '2022-09-06 04:57:32'),
(106, '1', '3533534538', 'fira', 'asdad', '2022-09-01', 'P', '14', 'Islam', 'asdasdasd', 'XI', NULL, 'IPA', 'Aktif', '084546646', NULL, '2022/2023', NULL, NULL, NULL, NULL, 'Dosis I', '10204064', 'SMA Negeri  1  Kisaran', 'SMA', 'Andika Pratama', '2022-09-03 01:49:05', '2022-09-06 04:57:32'),
(100, '86', '1212121234', 'test', 'test', '2022-08-13', 'L', '16', 'Islam', 'test', 'XII', 'TKRO', NULL, 'Aktif', '082274883434', 'KIP', '2022/2023', NULL, NULL, NULL, NULL, 'Dosis I', '10204029', 'SMK SWASTA TRIYADIKAYASA AEK SONGSONGAN', 'SMK', 'Putra', '2022-08-19 23:04:11', '2022-08-25 06:14:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_ta`
--

CREATE TABLE `mod_ta` (
  `id` int(11) NOT NULL,
  `tahun_akademik` varchar(255) NOT NULL,
  `userentry` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mod_ta`
--

INSERT INTO `mod_ta` (`id`, `tahun_akademik`, `userentry`, `created_at`, `updated_at`) VALUES
(1, '2022/2023', 'Abii Hutabarat', '2022-08-14 08:29:50', '2022-08-14 08:30:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_user`
--

CREATE TABLE `mod_user` (
  `id` int(11) NOT NULL,
  `id_sekolah` int(11) DEFAULT NULL,
  `npsn` varchar(10) DEFAULT NULL,
  `jenjang` varchar(10) DEFAULT NULL,
  `nama_sekolah` varchar(50) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mod_user`
--

INSERT INTO `mod_user` (`id`, `id_sekolah`, `npsn`, `jenjang`, `nama_sekolah`, `nik`, `nama`, `nohp`, `email`, `username`, `password`, `foto`, `level`, `status`, `created_at`, `updated_at`) VALUES
(1, 29, '29', 'nothing', 'Developer', '1209152911970001', 'Abii Hutabarat', '082274884828', 'abiihutabarat29@gmail.com', 'abiihtb29', '$2y$10$hXL3AvZz1zqVDhX/CJjzx.oxwxCSeH6/mQEKkvMiCzdrGkh6FhIWe', '1661421861_67c02a8dde7f163cd55e.jpeg', 29, '1', '2022-07-25 10:07:25', '2022-08-25 05:04:21'),
(2, 1, '10204064', 'SMA', 'SMA Negeri  1  Kisaran', '1209159099098932', 'Abii Hutabarat', '08232323399', 'andika@gmail.com', 'andika22', '$2y$10$nigTrK5qSW.yuM0nHdC4uu0zmVtK9vWMmbQpHY.uMdVz/rcF.uw5a', '1662534676_ba0d36cb88cbf0ec9549.jpeg', 1, '1', '2022-07-25 09:42:21', '2022-09-10 01:25:45'),
(3, 86, '10204029', 'SMK', 'SMK SWASTA TRIYADIKAYASA AEK SONGSONGAN', '1212121212121212', 'Putra', '082234343456', 'putra@gmail.com', 'putra333', '$2y$10$/.ELihkDhqmnY5h8GCjD4.nswOZeqHJ4truSAUBzGZ/bRihDnJZKG', 'blank.png', 2, '1', '2022-08-01 07:04:55', '2022-09-10 23:19:59'),
(4, 0, '0', 'SMA', 'Kasih SMA', '1223234553453344', 'Azmi', '08229892344', 'azmi@gmail.com', 'azmi2022', '$2y$10$tnEf47ho0WKxIiHJmmBT1O1ZYeD5eqAq9m1qAcsTV1naRvA8c4roG', '1661516305_f17fdd4b9fa50fba6c1d.jpeg', 3, '1', '2022-08-26 07:11:44', '2022-09-10 10:16:49'),
(5, 0, '1', 'SMK', 'Kasih SMK', '1234234335435430', 'Azhar', '082131313120', 'azhar@gmail.com', 'azhar2022', '$2y$10$V4OgCqAuOwyu2JGd5waydesxXK8pxevLAEQnuwnAJKHsk/Hv1U8sO', '1661516521_080a5021fdff00969151.jpeg', 4, '1', '2022-08-26 07:14:45', '2022-08-26 07:22:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_valid_generate`
--

CREATE TABLE `mod_valid_generate` (
  `id` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `npsn` varchar(25) NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `jenjang` varchar(25) NOT NULL,
  `userentry` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mod_bangunan`
--
ALTER TABLE `mod_bangunan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_barang`
--
ALTER TABLE `mod_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_bidang_keahlian`
--
ALTER TABLE `mod_bidang_keahlian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_buku_induk`
--
ALTER TABLE `mod_buku_induk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_golongan`
--
ALTER TABLE `mod_golongan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_guru`
--
ALTER TABLE `mod_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `mod_inventaris`
--
ALTER TABLE `mod_inventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_jenjang`
--
ALTER TABLE `mod_jenjang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_kabupaten`
--
ALTER TABLE `mod_kabupaten`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_kebutuhan`
--
ALTER TABLE `mod_kebutuhan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_kecamatan`
--
ALTER TABLE `mod_kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_labul`
--
ALTER TABLE `mod_labul`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_log_invalid`
--
ALTER TABLE `mod_log_invalid`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_log_valid`
--
ALTER TABLE `mod_log_valid`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_mapel`
--
ALTER TABLE `mod_mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_mutasi`
--
ALTER TABLE `mod_mutasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_paket_keahlian`
--
ALTER TABLE `mod_paket_keahlian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_pegawai`
--
ALTER TABLE `mod_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_profil`
--
ALTER TABLE `mod_profil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_program_keahlian`
--
ALTER TABLE `mod_program_keahlian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_sarana`
--
ALTER TABLE `mod_sarana`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_sarpras`
--
ALTER TABLE `mod_sarpras`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_sekolah`
--
ALTER TABLE `mod_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_siswa`
--
ALTER TABLE `mod_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_ta`
--
ALTER TABLE `mod_ta`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_user`
--
ALTER TABLE `mod_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_valid_generate`
--
ALTER TABLE `mod_valid_generate`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mod_bangunan`
--
ALTER TABLE `mod_bangunan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `mod_barang`
--
ALTER TABLE `mod_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `mod_bidang_keahlian`
--
ALTER TABLE `mod_bidang_keahlian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mod_buku_induk`
--
ALTER TABLE `mod_buku_induk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mod_golongan`
--
ALTER TABLE `mod_golongan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `mod_guru`
--
ALTER TABLE `mod_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `mod_inventaris`
--
ALTER TABLE `mod_inventaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `mod_jenjang`
--
ALTER TABLE `mod_jenjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `mod_kabupaten`
--
ALTER TABLE `mod_kabupaten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mod_kebutuhan`
--
ALTER TABLE `mod_kebutuhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `mod_kecamatan`
--
ALTER TABLE `mod_kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `mod_labul`
--
ALTER TABLE `mod_labul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `mod_log_invalid`
--
ALTER TABLE `mod_log_invalid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mod_log_valid`
--
ALTER TABLE `mod_log_valid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mod_mapel`
--
ALTER TABLE `mod_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `mod_mutasi`
--
ALTER TABLE `mod_mutasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `mod_paket_keahlian`
--
ALTER TABLE `mod_paket_keahlian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mod_pegawai`
--
ALTER TABLE `mod_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `mod_profil`
--
ALTER TABLE `mod_profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `mod_program_keahlian`
--
ALTER TABLE `mod_program_keahlian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mod_sarana`
--
ALTER TABLE `mod_sarana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `mod_sarpras`
--
ALTER TABLE `mod_sarpras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `mod_sekolah`
--
ALTER TABLE `mod_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT untuk tabel `mod_siswa`
--
ALTER TABLE `mod_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT untuk tabel `mod_ta`
--
ALTER TABLE `mod_ta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mod_user`
--
ALTER TABLE `mod_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mod_valid_generate`
--
ALTER TABLE `mod_valid_generate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
