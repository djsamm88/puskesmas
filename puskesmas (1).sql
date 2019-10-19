-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 19, 2019 at 10:19 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `puskesmas`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_gizi`
--

CREATE TABLE `master_gizi` (
  `id` int(11) NOT NULL,
  `ruang_gizi` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_gizi`
--

INSERT INTO `master_gizi` (`id`, `ruang_gizi`) VALUES
(1, 'Ruang Gizi A'),
(2, 'Ruang Gizi B');

-- --------------------------------------------------------

--
-- Table structure for table `master_lab`
--

CREATE TABLE `master_lab` (
  `id_lab` int(11) NOT NULL,
  `nama_lab` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_lab`
--

INSERT INTO `master_lab` (`id_lab`, `nama_lab`) VALUES
(1, 'Lab Darah');

-- --------------------------------------------------------

--
-- Table structure for table `master_rawat_inap`
--

CREATE TABLE `master_rawat_inap` (
  `id` int(11) NOT NULL,
  `nama_kamar` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_rawat_inap`
--

INSERT INTO `master_rawat_inap` (`id`, `nama_kamar`) VALUES
(1, 'Kamar Mawar');

-- --------------------------------------------------------

--
-- Table structure for table `master_ruang_konseling`
--

CREATE TABLE `master_ruang_konseling` (
  `id` int(11) NOT NULL,
  `ruang_konseling` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_ruang_konseling`
--

INSERT INTO `master_ruang_konseling` (`id`, `ruang_konseling`) VALUES
(1, 'Konseling A'),
(2, 'Konseling b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_app`
--

CREATE TABLE `tbl_app` (
  `id_app` int(11) NOT NULL,
  `nama_app` varchar(222) NOT NULL,
  `alamat_app` text NOT NULL,
  `keterangan_app` text NOT NULL,
  `app_kec` varchar(222) NOT NULL,
  `app_kab` varchar(222) NOT NULL,
  `app_prov` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_app`
--

INSERT INTO `tbl_app` (`id_app`, `nama_app`, `alamat_app`, `keterangan_app`, `app_kec`, `app_kab`, `app_prov`) VALUES
(1, 'PUSKESMAS MATITI', 'Jl.Raya Pakkat Desa Matiti Kecamatan Dolok Sanggul', 'puskesmas_matiti@yahoo.com', 'DOLOK SANGGUL', 'HUMBANG HASUNDUTAN', 'SUMATERA UTARA  ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_desa`
--

CREATE TABLE `tbl_desa` (
  `id_desa` int(11) NOT NULL,
  `desa` varchar(222) NOT NULL,
  `id_kecamatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_desa`
--

INSERT INTO `tbl_desa` (`id_desa`, `desa`, `id_kecamatan`) VALUES
(4, 'Parsaoran', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diagnosa`
--

CREATE TABLE `tbl_diagnosa` (
  `id` int(11) NOT NULL,
  `id_kunjungan` int(11) NOT NULL,
  `code_diagnosa` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_diagnosa`
--

INSERT INTO `tbl_diagnosa` (`id`, `id_kunjungan`, `code_diagnosa`) VALUES
(1, 1, 'K02'),
(2, 2, ''),
(3, 2, 'A07.0'),
(4, 3, ''),
(5, 4, ''),
(6, 4, 'A04.0'),
(7, 5, '	0003'),
(8, 6, '	0002'),
(9, 3, '	0038'),
(10, 2, '	0027'),
(11, 7, '	0038'),
(12, 8, 'demam ti'),
(13, 9, 'K02'),
(14, 11, ''),
(15, 11, 'J10'),
(16, 10, ''),
(17, 10, 'K02'),
(18, 13, 'A05.0'),
(19, 0, ''),
(20, 0, ''),
(21, 0, '	0009'),
(22, 15, 'R10'),
(23, 16, ''),
(24, 16, ''),
(25, 16, 'K02'),
(26, 17, '	0133'),
(27, 20, '	0003'),
(28, 21, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `id` int(11) NOT NULL,
  `spesialis` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dokter`
--

INSERT INTO `tbl_dokter` (`id`, `spesialis`) VALUES
(1, 'Gigi'),
(2, 'THT'),
(3, 'Jantung'),
(4, 'Mata'),
(5, 'Penyakit Dalam'),
(6, 'Umum');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_foto`
--

CREATE TABLE `tbl_foto` (
  `id` int(11) NOT NULL,
  `id_kunjungan` int(11) NOT NULL,
  `url_foto` varchar(222) NOT NULL,
  `tgl_foto` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_foto`
--

INSERT INTO `tbl_foto` (`id`, `id_kunjungan`, `url_foto`, `tgl_foto`) VALUES
(1, 1, 'url_foto_1570682198.jpg', '2019-10-10 04:36:38'),
(2, 2, 'url_foto_1570683310.jpg', '2019-10-10 04:55:10'),
(3, 7, 'url_foto_1570760291.jpg', '2019-10-11 02:18:11'),
(4, 7, 'url_foto_1570760307.jpg', '2019-10-11 02:18:27'),
(5, 7, '', '2019-10-11 02:18:36'),
(6, 7, 'url_foto_1570760326.jpg', '2019-10-11 02:18:46'),
(7, 8, 'url_foto_1571016444.jpg', '2019-10-14 01:27:24'),
(8, 9, 'url_foto_1571103645.jpg', '2019-10-15 01:40:45'),
(9, 15, 'url_foto_1571212530.jpg', '2019-10-16 07:55:30'),
(10, 16, 'url_foto_1571213225.jpg', '2019-10-16 08:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Kepala Dinas Kesehatan'),
(2, 'Kepala Seksi Kefarmasian'),
(3, 'Kepala Puskesmas'),
(4, 'Pengelola Obat Puskesmas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kecamatan`
--

CREATE TABLE `tbl_kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `kecamatan` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kecamatan`
--

INSERT INTO `tbl_kecamatan` (`id_kecamatan`, `kecamatan`) VALUES
(1, 'Dolok Sanggul');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keluhan_umum`
--

CREATE TABLE `tbl_keluhan_umum` (
  `id` int(11) NOT NULL,
  `id_poli` int(11) NOT NULL,
  `keluhan_umum` text NOT NULL,
  `tgl_janji` datetime NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `no_pendaftaran` varchar(222) NOT NULL,
  `status_periksa` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konseling`
--

CREATE TABLE `tbl_konseling` (
  `id` int(11) NOT NULL,
  `id_kunjungan` int(11) NOT NULL,
  `id_timeline` int(11) NOT NULL,
  `masalah` text NOT NULL,
  `akar_masalah` text NOT NULL,
  `plan` text NOT NULL,
  `do` text NOT NULL,
  `hasil` text NOT NULL,
  `hambatan` text NOT NULL,
  `rencana_tinjut` text NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_konseling`
--

INSERT INTO `tbl_konseling` (`id`, `id_kunjungan`, `id_timeline`, `masalah`, `akar_masalah`, `plan`, `do`, `hasil`, `hambatan`, `rencana_tinjut`, `id_pegawai`) VALUES
(1, 4, 0, 'cerai', 'gak ada uang', 'bekerja', 'bekerja', 'rajin kerja', 'gangguan pisikis', 'suntik mati', 24),
(2, 16, 0, 'test', 'test', 'test', 'test', 'test', 'test', 'tes', 24);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kunjungan`
--

CREATE TABLE `tbl_kunjungan` (
  `id_kunjungan` int(11) NOT NULL,
  `no_pendaftaran` int(11) NOT NULL,
  `keluhan_umum` text NOT NULL,
  `tgl_janji` date NOT NULL,
  `hr` varchar(55) NOT NULL,
  `td` varchar(55) NOT NULL,
  `rr` varchar(55) NOT NULL,
  `t` varchar(22) NOT NULL,
  `berat_badan` int(3) NOT NULL,
  `tinggi_badan` int(3) NOT NULL,
  `pemeriksaan_fisik` varchar(222) NOT NULL,
  `tgl_kunjungan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rencana_terapi` text NOT NULL,
  `pemeriksaan_penunjang` varchar(222) NOT NULL,
  `kie` text NOT NULL,
  `rencana_rujukan` text NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `ku` text NOT NULL,
  `kt` text NOT NULL,
  `rpt` text NOT NULL,
  `rpo` text NOT NULL,
  `rpk` text NOT NULL,
  `lingkar_perut` varchar(222) NOT NULL,
  `lingkar_kepala` char(55) NOT NULL,
  `rambut` varchar(222) NOT NULL,
  `anamnesa` varchar(222) NOT NULL,
  `status_imunisasi` varchar(222) NOT NULL,
  `diagnosa_gizi` varchar(222) NOT NULL,
  `id_poli` int(11) NOT NULL,
  `id_ruang_gizi` int(11) NOT NULL,
  `id_lab` int(11) NOT NULL,
  `id_rawatinap` int(11) NOT NULL,
  `id_ruang_konseling` int(11) NOT NULL,
  `ket_rujukan` text NOT NULL,
  `id_timeline` int(11) NOT NULL,
  `waktu_end_absolute` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_kunjungan`
--

INSERT INTO `tbl_kunjungan` (`id_kunjungan`, `no_pendaftaran`, `keluhan_umum`, `tgl_janji`, `hr`, `td`, `rr`, `t`, `berat_badan`, `tinggi_badan`, `pemeriksaan_fisik`, `tgl_kunjungan`, `rencana_terapi`, `pemeriksaan_penunjang`, `kie`, `rencana_rujukan`, `id_dokter`, `ku`, `kt`, `rpt`, `rpo`, `rpk`, `lingkar_perut`, `lingkar_kepala`, `rambut`, `anamnesa`, `status_imunisasi`, `diagnosa_gizi`, `id_poli`, `id_ruang_gizi`, `id_lab`, `id_rawatinap`, `id_ruang_konseling`, `ket_rujukan`, `id_timeline`, `waktu_end_absolute`) VALUES
(1, 2, 'sakit gigi', '2019-10-10', '123', '123', '123', '1231', 120, 123, 'test', '2019-10-10 04:44:42', '', '7', 'Test', '7', 19, 'test', 'test', 'test', 'tset', 'test', '123', '', '', '', '', '', 1, 0, 0, 0, 0, '', 3, '0000-00-00 00:00:00'),
(2, 2, 'test', '2019-10-10', '123', '123', '123', '123', 123, 117, 'test', '2019-10-10 08:04:59', '', '7', 'test', '7', 19, 'test', 'test', 'test', 'test', 'test', '132', '12', '12', '12', '12', '12', 1, 0, 0, 0, 0, '', 26, '0000-00-00 00:00:00'),
(3, 2, 'test', '2019-10-10', '123', '12345', '123', '123', 225, 123, 'test', '2019-10-10 08:04:14', '', '7', 'test', '7', 19, 'test', 'test', 'test', 'test', 'test', '123', '12', '12', '12', '12', '12', 9, 1, 0, 0, 0, '', 24, '0000-00-00 00:00:00'),
(4, 1, 'pusing', '2019-10-10', '12', '12', '12', '12', 12, 12, 'test', '2019-10-10 05:05:45', '', '7', 'test kie ', '8', 19, 'test', 'test', 'test', 'test', 'test', '10', '123', 'test', 'test', 'test', 'test', 9, 1, 0, 0, 1, '', 13, '0000-00-00 00:00:00'),
(5, 1, 'test', '2019-10-10', '123', '123', '123', '123', 123, 123, 'test', '2019-10-10 07:38:00', '', '7', '', '10', 19, 'test', 'test', 'test', 'test', 'test', '123', '', '', '', '', '', 9, 0, 0, 0, 0, 'pasien kurang sehat', 17, '0000-00-00 00:00:00'),
(6, 1, 'test', '2019-10-10', '13', '123', '123', '123', 123, 123, 'test', '2019-10-10 07:44:18', '', '7', 'test', '10', 19, 'test', 'test', 'test', 'test', 'test', '123', '', '', '', '', '', 9, 0, 0, 0, 0, 'opname ', 20, '0000-00-00 00:00:00'),
(7, 1, 'test', '2019-10-11', '123', '123', '123', '123', 123, 23, 'test', '2019-10-11 02:21:12', '', '7', 'test', '7', 19, 'test', 'test', 'test', 'test', 'test', '123', '', '', '', '', '', 9, 0, 0, 0, 0, '', 29, '0000-00-00 00:00:00'),
(8, 1, 'test', '2019-10-14', '12', '12', '12', '12', 12, 12, 'test', '2019-10-14 01:43:23', '', '7', '', '7', 19, 'test', 'test', 'test', 'test', 'test', '12', '', '', '', '', '', 9, 0, 0, 0, 0, '', 32, '0000-00-00 00:00:00'),
(9, 3, 'sakit gigi', '2019-10-15', '123', '123', '123', '123', 123, 123, 'Demam Tinggi', '2019-10-15 07:27:11', '', '7', 'Test', '7', 19, 'test', 'test', 'test', 'test', 'test', '123', '', '', '', '', '', 9, 0, 0, 0, 0, '', 45, '0000-00-00 00:00:00'),
(10, 3, 'sakit demam', '2019-10-15', '1231231', '123', '123', '123', 123, 123, 'test', '2019-10-15 07:24:48', '', '7', 'test', '7', 29, 'test', 'test', 'test', 'test', 'test', '123', '', '', '', '', '', 1, 0, 0, 0, 0, '', 44, '0000-00-00 00:00:00'),
(11, 3, 'Demam tinggi', '2019-10-15', '80', '120/80', '24', '36.5', 80, 170, 'DBN', '2019-10-15 02:36:29', '', '7', 'makan makanan yang sehat', '7', 19, 'demam', 'sakit kepala', '-', '-', '-', '85', '', '', '', '', '', 9, 0, 1, 0, 0, '', 40, '0000-00-00 00:00:00'),
(12, 3, 'test', '2019-10-15', '', '', '', '', 0, 0, '', '2019-10-15 02:54:49', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', 7, 0, 0, 0, 0, '', 43, '0000-00-00 00:00:00'),
(13, 3, 'test', '2019-10-15', '90', '80', '90', '90', 90, 90, '90', '2019-10-15 07:37:39', '', '7', '', '7', 19, 'io', 'io', 'o', 'io', 'co', '90', '', '', '', '', '', 9, 0, 0, 0, 0, '', 48, '0000-00-00 00:00:00'),
(14, 3, 'sakit', '2019-10-16', '', '', '', '', 0, 0, '', '2019-10-16 06:59:19', '', '', '', '', 19, '', '', '', '', '', '', '', '', '', '', '', 9, 0, 0, 0, 0, '', 51, '0000-00-00 00:00:00'),
(15, 4, 'Sakit Perut, Mencret dan Muntah-muntah', '2019-10-16', '80', '120', '20', '36', 75, 168, 'Ada bercak Kotoran', '2019-10-16 07:59:24', '', '7', '-', '7', 19, 'Sakit Perut', 'Test', 'Test', 'Test', 'Test', '95', '', '', '', '', '', 9, 0, 0, 0, 0, '', 54, '0000-00-00 00:00:00'),
(16, 4, 'Pening Kepala dan Pening dompet', '2019-10-16', '80', '110', '24', '37', 80, 175, 'test', '2019-10-16 08:12:09', '', '7', 'test', '8', 29, 'Pening ', 'test', 'test', 'test', 'test', '95', '', '', '', '', '', 1, 0, 1, 0, 1, '', 60, '0000-00-00 00:00:00'),
(17, 4, 'test', '2019-10-16', '123', '123', '123', '123', 123, 123, 'test', '2019-10-16 08:22:09', '', '7', 'test', '9', 19, 'test', 'test', 'test', 'test', 'test', '123', '', '', '', '', '', 9, 0, 0, 1, 0, '', 63, '0000-00-00 00:00:00'),
(18, 4, 'sakit', '2019-10-16', '', '', '', '', 0, 0, '', '2019-10-16 08:23:47', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', 7, 0, 0, 0, 0, '', 64, '0000-00-00 00:00:00'),
(19, 4, 'test 2', '2019-10-16', '', '', '', '', 0, 0, '', '2019-10-16 08:26:57', '', '', '', '', 19, '', '', '', '', '', '', '', '', '', '', '', 7, 0, 0, 0, 0, '', 65, '0000-00-00 00:00:00'),
(20, 4, 'test', '2019-10-16', '123', '123', '123', '123', 123, 231, 'test', '2019-10-16 08:30:19', '', '7', 'test', '7', 19, 'test', 'test', 'test', 'test', 'test', '123', '', '', '', '', '', 9, 0, 0, 0, 0, '', 67, '0000-00-00 00:00:00'),
(21, 5, 'sakit', '2019-10-17', '123', '123', '123', '123', 231, 123, 'test', '2019-10-17 03:23:49', '', '7', 'test', '7', 19, 'sakit', 'test', 'test', 'test', 'test', '123', '', '', '', '', '', 9, 0, 0, 0, 0, '', 69, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lab`
--

CREATE TABLE `tbl_lab` (
  `id` int(11) NOT NULL,
  `id_kunjungan` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `no_pendaftaran` int(11) NOT NULL,
  `spesimen_jenis` varchar(222) NOT NULL,
  `spesimen_asal_bahan` varchar(222) NOT NULL,
  `tgl_pengambilan_sp` datetime NOT NULL,
  `haemoglobin` varchar(222) NOT NULL,
  `gula_darah_sewaktu` varchar(222) NOT NULL,
  `gula_darah_puasa` varchar(222) NOT NULL,
  `gula_darah_2_jam_pp` varchar(222) NOT NULL,
  `asam_urat` varchar(222) NOT NULL,
  `kolesterol` varchar(222) NOT NULL,
  `tes_kehamilan` varchar(222) NOT NULL,
  `bta_sputum` varchar(222) NOT NULL,
  `hiv` varchar(222) NOT NULL,
  `hbsag` varchar(222) NOT NULL,
  `golongan_darah` varchar(55) NOT NULL,
  `urinalisa` varchar(222) NOT NULL,
  `frambusia` varchar(222) NOT NULL,
  `mantoux_test` varchar(222) NOT NULL,
  `igg` varchar(222) NOT NULL,
  `igm` varchar(222) NOT NULL,
  `glukosa_urin` varchar(222) NOT NULL,
  `protein_urin` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lab`
--

INSERT INTO `tbl_lab` (`id`, `id_kunjungan`, `id_pegawai`, `no_pendaftaran`, `spesimen_jenis`, `spesimen_asal_bahan`, `tgl_pengambilan_sp`, `haemoglobin`, `gula_darah_sewaktu`, `gula_darah_puasa`, `gula_darah_2_jam_pp`, `asam_urat`, `kolesterol`, `tes_kehamilan`, `bta_sputum`, `hiv`, `hbsag`, `golongan_darah`, `urinalisa`, `frambusia`, `mantoux_test`, `igg`, `igm`, `glukosa_urin`, `protein_urin`) VALUES
(1, 11, 21, 3, 'darah', 'pasien', '2019-10-15 09:27:18', '12', '140 mg/dl', '-', '-', '-', '-', '--', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-'),
(2, 16, 21, 4, 'test', 'tes', '2019-10-16 15:03:19', '12', '123', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE `tbl_log` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(222) NOT NULL,
  `action` text NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_log`
--

INSERT INTO `tbl_log` (`id`, `id_pegawai`, `nama`, `action`, `tgl`) VALUES
(1, 0, '', 'Post : Field email = rootPost : Field password = AVENGED7 http://localhost/puskesmas/index.php/login/cek_login', '2019-10-19 02:59:01'),
(2, 0, '', 'Post : Field email = rootPost : Field password = AVENGED7 http://localhost/puskesmas/index.php/login/cek_login', '2019-10-19 02:59:03'),
(3, 0, '', 'Post : Field email = rootPost : Field password = AVENGED7 http://localhost/puskesmas/index.php/login/cek_login', '2019-10-19 02:59:03'),
(4, 0, '', 'Post : Field email = rootPost : Field password = AVENGED7 http://localhost/puskesmas/index.php/login/cek_login', '2019-10-19 02:59:04'),
(5, 0, '', 'Post : Field email = rootPost : Field password = AVENGED7 http://localhost/puskesmas/index.php/login/cek_login', '2019-10-19 02:59:05'),
(6, 0, '', 'Post : Field email = rootPost : Field password = AVENGED7 http://localhost/puskesmas/index.php/login/cek_login', '2019-10-19 02:59:07'),
(7, 0, '', 'Post : Field email = humbahaskab@gmail.comPost : Field password = 12345 http://localhost/puskesmas/index.php/login/cek_login', '2019-10-19 03:24:38'),
(8, 0, '', 'Post : Field email = humbahaskab@gmail.comPost : Field password = 123455 http://localhost/puskesmas/index.php/login/cek_login', '2019-10-19 03:24:42'),
(9, 0, '', 'Post : Field email = humbahaskab@gmail.comPost : Field password = 123456 http://localhost/puskesmas/index.php/login/cek_login', '2019-10-19 03:24:44'),
(10, 1, 'admin', 'Post : Field id_user = 22Post : Field nip = 19620508 198602 1 001Post : Field nama = Aber Lumban GaolPost : Field email = aber@humbanghasundutankab.go.idPost : Field pangkat = Penata Muda Tk. I, III/bPost : Field password = 123456Post : Field confirm-password = 123456 http://localhost/puskesmas/index.php/home/edit_profil/', '2019-10-19 03:45:52'),
(11, 1, 'admin', 'Post : Field id_user = 1Post : Field nip = 000Post : Field nama = adminPost : Field email = humbahaskab@gmail.comPost : Field pangkat = -Post : Field password = 123456Post : Field confirm-password = 123456 http://localhost/puskesmas/index.php/home/edit_profil/', '2019-10-19 03:46:10'),
(12, 1, 'admin', 'Post : Field email = humbahaskab@gmail.comPost : Field password = 123456 http://localhost/puskesmas/index.php/login/cek_login', '2019-10-19 03:46:50'),
(13, 1, 'admin', 'Post : Field nama = asbPost : Field email = asdkasdkasd@adsdaPost : Field pangkat = ajkdasdkasPost : Field nip = askdasklPost : Field password = 123456Post : Field confirm-password = 123456 http://localhost/puskesmas/index.php/home/go_simpan_pegawai/', '2019-10-19 03:56:34'),
(14, 0, '', 'Post : Field email = rootPost : Field password = AVENGED7 http://localhost/puskesmas/index.php/login/cek_login', '2019-10-19 04:46:25'),
(15, 0, '', 'Post : Field email = humbahaskab@gmail.comPost : Field password = AVENGED7 http://localhost/puskesmas/index.php/login/cek_login', '2019-10-19 04:46:29'),
(16, 0, '', 'Post : Field email = humbahaskab@gmail.comPost : Field password = AVENGED7X http://localhost/puskesmas/index.php/login/cek_login', '2019-10-19 04:46:32'),
(17, 0, '', 'Post : Field email = humbahaskab@gmail.comPost : Field password = AVENGED7X http://localhost/puskesmas/index.php/login/cek_login', '2019-10-19 04:46:37'),
(18, 0, '', 'Post : Field email = humbahaskab@gmail.comPost : Field password = 123456 http://localhost/puskesmas/index.php/login/cek_login', '2019-10-19 04:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_diagnosa`
--

CREATE TABLE `tbl_master_diagnosa` (
  `code` char(10) NOT NULL,
  `diagnosa` varchar(222) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_master_diagnosa`
--

INSERT INTO `tbl_master_diagnosa` (`code`, `diagnosa`, `id`) VALUES
('A00.0', 'Kolera', 1),
('A01.0', 'Demam Tifoid', 2),
('A01.4', 'Demam Paratifoid, tidak Spesifik', 3),
('A02.0', 'Infeksi Salmonela Lainnya', 4),
('A03.0', 'Shigelosis, Disentri Basiler tidak spesifik', 5),
('A04.0', 'Infeksi Usus karena bakteri lainnya tidak spesifik', 6),
('A05.0', 'Keracunan makanan karena bakteri lainnya', 7),
('A06.0', 'Amubiasis, Disentri Amuba', 8),
('A07.0', 'Penyakit infeksi usus lainnya', 9),
('A08.0', 'Infeksi Virus dan Infeksi usus tertentu lainnya', 10),
('A08.3', 'Infeksi Virus Tidak Spesifik', 11),
('A09.0', 'Diare dan Gastroenteritis', 12),
('A15.0', 'Tuberkulosa Paru BTA (+) dengan/tanpa pemeriksaan biakan', 13),
('A16.0', 'Tuberkulosis Paru klinis', 14),
('A16.2', 'Tuberkulosis Paru lainnya', 15),
('A16.3', 'Tuberkulosis alat nafas lainnya', 16),
('A17.0', 'Meningitis Tuberkulosa', 17),
('A18.0', 'Tuberkulosis Organ Lainnya', 18),
('A19.0', 'Tuberkulosis Miliaris', 19),
('A20', 'Pes/Sampar', 20),
('A22', 'Antraks', 21),
('A26', 'Parotitis', 22),
('A27', 'Leptospirosis', 23),
('A30.0', 'Kusta I/T (MB)', 24),
('A30.5', 'Kusta B/L (PB)', 25),
('A33', 'Tetanus Neonatorum', 26),
('A35.0', 'Tetanus Lainnya', 27),
('A36', 'Difteria', 28),
('A37.9', 'Pertusis/Batuk Rejan', 29),
('A39.9', 'Infeksi Meningokok', 30),
('A40.0', 'Septisemia', 31),
('A50.0', 'Sifilis Kongenital/bawaan', 32),
('A51.9', 'Sifilis Dini', 33),
('A54.9', 'Infeksi Gonokok', 34),
('A65.0', 'Penyakit Sprirokaetal Lainnya', 35),
('A66.0', 'Frambusia', 36),
('A71', 'Trakoma', 37),
('A80', 'Poliomielitis Akut', 38),
('A82', 'Rabies', 39),
('A87', 'Meningitis Karena Virus', 40),
('A90', 'Demam Dengue', 41),
('A91.0', 'Demam Berdarah Dengue', 42),
('A92.0', 'Chikungunya', 43),
('A93.0', 'Penyakit Demam Mungkin Bukan DBD', 44),
('B00', 'Infeksi Herpesvirus (herpes simplex)', 45),
('B01.9', 'Varisela/Cacar Air', 46),
('B05.9', 'Campak', 47),
('B08', 'Penyakit Campak Dengan Komplikasi Berat', 48),
('B09', 'Penyakit Campak Komplikasi Pada Mata/Mulut', 49),
('B15', 'Hepatitis A Akut (Klinis)', 50),
('B15.9', 'Hepatitis Tidak Akut', 51),
('B16', 'Hepatitis B Akut', 52),
('B17', 'Hepatitis Virus Lainnya', 53),
('B20', 'Penyakit Virus Defisiensi Imun Pada Manusia', 54),
('B24', 'Penyakit HIV/AIDS', 55),
('B25', 'Penyakit Virus Lainnya', 56),
('B26', 'Penyakit HIV/AIDS', 57),
('B35', 'Dermatophytosis (Tinea)', 58),
('B50', 'Malaria karena plasmodium Falsiparum (Malaria Tropika)', 59),
('B50.9', 'Malaria karena plasmodium Falsiparum (Malaria Tropika)', 60),
('B51', 'Malaria karena plasmodium Vivaks (Malaria Tertiana)', 61),
('B51.9', 'Malaria karena plasmodium Vivaks (Malaria Tertiana)', 62),
('B52', 'Malaria karena plasmodium malaria', 63),
('B53.0', 'Malaria karena palsmodium ovale', 64),
('B53.8', 'Malaria terbukti secara parasitologik tidak terklasifikasikan', 65),
('B54', 'Malaria Klinis', 66),
('B74', 'Filarisis', 67),
('B74.9', 'Filarisis', 68),
('B76', 'Penyakit Cacing Tambang', 69),
('B77', 'Askariasis (Penyakit Cacing Gelang)', 70),
('B79', 'Trikhuriasis (Penyakit Cacing Cambuk)', 71),
('B80', 'Enterobiasis', 72),
('B86', 'Skabies', 73),
('C00', 'Tumor ganas bibir, Rongga mulut, faring', 74),
('C15', 'Tumor ganas saluran pencernaan', 75),
('C30', 'Tumor ganas sistem pernafasan dan alat di dalam rongga dada', 76),
('C50', 'Tumor ganas payudara', 77),
('C53.9', 'Tumor ganas leher rahim', 78),
('C54.9', 'Tumor ganas korpus rahim', 79),
('C56', 'Tumor ganas indung telur', 80),
('C60', 'Tumor ganas alat kelamin pria', 81),
('C61', 'Tomor ganas prostat', 82),
('D36', 'Tumor Jinak Lainnya dan tidak spesifik tempatnya', 83),
('D48', 'Tumor Tertentu atau Tidak Diketahui Perilakunya lainnya, ?tempat dan tidak spesifik.', 84),
('D50', 'Anemia Defisiensi Besi', 85),
('D51', 'Anemia Lainnya', 86),
('D53.9', 'Anemia Defisiensi Gizi', 87),
('D63', 'Anemi Berat', 88),
('D64', 'Anemi', 89),
('E14', 'Diabetes Melitus Tidak Spesifik', 90),
('E40', 'Kwasiorkor', 91),
('E41', 'Marasmus', 92),
('E42', 'Marasmik-Kwasiorkor', 93),
('E43', 'Kurang Kalori Protein Berat Tidak Spesifik', 94),
('E44', 'Kurang Kalori Protein Sedang Tidak Spesifik', 95),
('E45', 'Gangguan pertumbuhan karena kurang kalori protein', 96),
('E46', 'Malnutrisi protein dan kalori tidak spesifik', 97),
('E50', 'Kekurangan Vitamin A', 98),
('E66', 'Obesitas', 99),
('E78', 'Hypercholesterolaemia', 100),
('E86', 'Deplesi Volume (Dehidrasi)', 101),
('F19', 'Gangguan jiwa dan perilaku yang disebabkan oleh penggunaan lebih dari satu jenis obat dan zat psikoaktif lainnya', 102),
('F20.9', 'Skisofrenia', 103),
('F23', 'Gangguan Akut dan sementara', 104),
('F25', 'Gangguan Skizoafektif', 105),
('F32', 'Episode Depresif', 106),
('F45', 'Gangguan Somatoform', 107),
('F48', 'Gangguan Emosi (Neurotik/Psisomatik) Lainnya', 108),
('F48.9', 'Gangguan Emosi', 109),
('F79', 'Retardasi Mental tidak spesifik', 110),
('G00', 'Meningitis bakterialis', 111),
('G40', 'Epilepsi', 112),
('G43', 'Migren dan sindrom nyeri kepala lainnya', 113),
('G98', 'Gangguan lain pada susunan saraf yang tidak terklasifikasikan', 114),
('H00', 'Hordeolum', 115),
('H10.9', 'Konjungtivitis', 116),
('H16.9', 'Keratitis', 117),
('H25', 'Katarak Senilis', 118),
('H25.9', 'Katarak Senilis', 119),
('H26', 'Katarak lain tidak spesifik', 120),
('H40', 'Glaukoma tidak Spesifik', 121),
('H52', 'Gangguan Refraksi dan Akomodasi', 122),
('H52.1', 'Myopia', 123),
('H52.6', 'Other disorders of refraction', 124),
('H54', 'Buta dan Rabun', 125),
('H57', 'Gangguan mata dan adneksa lainnya', 126),
('H57.9', 'Gangguan mata dan adneksa lainnya', 127),
('H60', 'Ototis Eksterna', 128),
('H65', 'Otottis Media Nonsupurativa', 129),
('H65.9', 'Otottis Media Nonsupurativa', 130),
('H66', 'Ototis Media Supurativa tidk spesifik', 131),
('H66.4', 'Ototis Media Supurativa tidk spesifik', 132),
('H70', 'Mastoiditis', 133),
('H72', 'Perforasi membran timpani', 134),
('H93', 'Gangguan telinga lain tidak spesifik', 135),
('H93.9', 'Gangguan telinga lain tidak spesifik', 136),
('I10', 'Hipertensi Primer (Esensial)', 137),
('I11', 'Hypertensive Heart Disease (HHD)', 138),
('I15', 'Hipertensi Sekunder', 139),
('I20', 'Angina Pektoris', 140),
('I21', 'Infark miokard Akut', 141),
('I23', 'Penyakit Jantung Isemik lainnya', 142),
('I26', 'Emboli paru', 143),
('I50', 'Penyakit Gagal Jantung (Decompensatio Cordis)', 144),
('I63', 'Infark Serebral', 145),
('I64', 'Stroke, tidak menyebut pendarahan atau infark', 146),
('I65', 'Penyakit pembuluh darah lain tidak infeksi', 147),
('I84', 'Hemoroid (Wasir)', 148),
('I88', 'Nonspecific Lymphadenitis', 149),
('I95', 'Hipotensi tidak spesifik', 150),
('I99', 'Penyakit pembuluh darah Lain tidak spesifik', 151),
('J00', 'Nasofaringitis Akuta (Common Cold)', 152),
('J01', 'Sinusitis Akuta', 153),
('J02', 'Faringitis Akuta', 154),
('J03', 'Tonsilitis Akuta', 155),
('J04', 'Laringitis Akuta', 156),
('J06', 'Penyakit Infeksi Saluran Pernafasan Atas Akut tidak Spesifik', 157),
('J06.0', 'Acute laryngopharyngitis', 158),
('J09', 'Suspek Avian Influenza/Flu Burung', 159),
('J10', 'Influenza', 160),
('J11.1', 'Influenza', 161),
('J18.0', 'Broncho Pneumonia Tidak Spesifik', 162),
('J18.9', 'Pneumonia', 163),
('J22', 'Infeksi Saluran Pernafasan Bawah Akut Tidak Spesifik', 164),
('J30.3', 'Alergi Rhinitis akibat kerja', 165),
('J32', 'Sinusitis Kronik', 166),
('J36', 'Penyakit Saluran Pernafasan Bagian Atas Lainnya', 167),
('J40', 'Bronchitis tidak ditemukan akut atau kronik', 168),
('J45', 'Asma', 169),
('J46', 'Status Asthmatikus', 170),
('J47', 'Bronkiektasis dan Bronkiolektasis', 171),
('J84.9', 'Penyakit Jaringan Interstitial Paru lainnya', 172),
('K00', 'Gangguan Perkembangan & Erupsi Gigi', 173),
('K00.6', 'PERSISTENSI', 174),
('K01', 'Gigi Terbenam & Gigi Impaksi', 175),
('K02', 'Karies Gigi', 176),
('K03', 'Penyakit Jaringan Keras Gigi Lainnya', 177),
('K04', 'Penyakit Pulpa dan Jaringan Periapikal', 178),
('K05', 'Gingivitis & Penyakit Periodontral', 179),
('K06', 'Penyakit gusi, jaringan periodontal dan tulang alveolar', 180),
('K07', 'Kelainan Dentofasial Termasuk Maloklusi', 181),
('K08', 'Gangguan gigi dan jaringan penunjang lainnya', 182),
('K09', 'Penyakit rongga mulut, kelenjar ludah, rahang dan lainnya', 183),
('K10', 'Penyakit Rahang Lainnya', 184),
('K11', 'Penyakit Kelenjar Liur', 185),
('K12', 'Stomatitis dan Lesi-lesi yang Berhubungan', 186),
('K13', 'Penyakit Bibir dan Mukosa Lainnya', 187),
('K14', 'Penyakit Lidah', 188),
('K25', 'Tukak Lambung', 189),
('K29.7', 'Gastritis, unspecified', 190),
('K29.9', 'Gastroduodenitesis Tidak Spesifik', 191),
('K30', 'Dispepsia', 192),
('K35', 'Apendisitis Akuta Tidak Spesifik', 193),
('K36', 'Apendisitis lainnya', 194),
('K40', 'Hernia Inguinalis', 195),
('K41', 'Hernia Femoralis', 196),
('K42', 'Hernia Umbilikalis', 197),
('K63', 'Penyakit usus halus lainnya', 198),
('K76', 'Penyakit hati lainnya', 199),
('K92', 'Penyakit sistem pencernaan tidak spesifik', 200),
('L01', 'Impetigo', 201),
('L02', 'Abses, furunkri, karbunkel kutan', 202),
('L23', 'Dermatitis kontak', 203),
('L24', 'Dermatitis kontak iritan', 204),
('L30.9', 'Dermatitis lain tidak spesifik', 205),
('L40', 'Psoriasis', 206),
('L42', 'Pytryasis Rosea', 207),
('L50', 'Urticaria', 208),
('L51', 'Drug Eruption', 209),
('L70', 'Acne Vulgaris', 210),
('L80', 'Vitiligo', 211),
('L89', 'Ulcus Decubitus', 212),
('L93', 'Sistemik Lupus Eritromatosus (SLE)', 213),
('L98', 'Gangguan lain pada kulit dan jaringan subkutan yang tidak terklasifikasikan', 214),
('L98.0', 'Pyogenic granuloma', 215),
('M10', 'Gout', 216),
('M13', 'Artritis lainnya', 217),
('M22', 'Dislokasi Patella', 218),
('M41', 'Skoliosis', 219),
('M54.5', 'Low Back Pain (nyeri punggung bawah)', 220),
('M67.4', 'Ganglion', 221),
('M79.0', 'Rematisme tidak spesifik', 222),
('M79.1', 'Myalgia', 223),
('M79.2', 'Neuralgia dan Neuritis tidak spesifik', 224),
('M80', 'Osteoporosis Dengan Fraktur Patologis', 225),
('M81', 'Osteoporosis Tanpa Fraktur Patologis', 226),
('N04', 'Sindroma Nefrotik', 227),
('N10', 'Pyelonephritis Acute', 228),
('N11', 'Pyelonephritis Cronic', 229),
('N17', 'Gagal ginjal akuta', 230),
('N18', 'Gagal Ginjal Kronik', 231),
('N20', 'Batu sistem kemih (ginjal, ureter, saluran kemih bawah)', 232),
('N23', 'Kolik ginjal tidak spesifik', 233),
('N30', 'Sistitis', 234),
('N34', 'Uretritis dan sindrom uretal', 235),
('N40', 'Gangguan prostat', 236),
('N45', 'Orchits and Epididymitis', 237),
('N50.8', 'Hydrocele', 238),
('N60', 'Dysplasia Mammae', 239),
('N61', 'Mastitis', 240),
('N62', 'Gynaecomastia', 241),
('N70', 'Salphingitis', 242),
('N72', 'Cervicitis', 243),
('N75', 'Kista Bartholin', 244),
('N76.0', 'Vaginitis Acute', 245),
('N80', 'Endometriosis', 246),
('N89.8', 'Leukorrhoea', 247),
('N92.0', 'Menorrhagia', 248),
('N92.1', 'Menometrorrhagia', 249),
('O00', 'Kehamilan ektropik (di luar kandungan)', 250),
('O03', 'Abortus spontan', 251),
('O04', 'Abortus atas indikasi medis', 252),
('O05', 'Abortus lainnya', 253),
('O10', 'Hipertensi yang sudah ada sebelum kehamilan dan menjadi penyulit pada masa kehamilan, persalinan dan nifas.', 254),
('O13', 'Pre-eklamsia Ringan', 255),
('O14.0', 'Pre-eklamsia Sedang', 256),
('O14.1', 'Pre-eklamsia berat', 257),
('O15.0', 'Eklamsia selama kehamilan', 258),
('O15.1', 'Eklamsia dalam proses melahirkan', 259),
('O15.2', 'Eklamsia pada masa nifas', 260),
('O15.3', 'Eklamsia tidak spesifik (selama kehamilan atau persalinan atau nifas)', 261),
('O16', 'Hipertensi maternal', 262),
('O21', 'Muntah berlebihan selama masa kehamilan', 263),
('O24', 'Diabetes mellitus (penyakit kencing manis) dalam kehamilan', 264),
('O25', 'Kehamilan dengan malnutrisi', 265),
('O42', 'Ketuban pecah dini', 266),
('O46', 'Pendarahan antepartum', 267),
('O63', 'Persalinan (Partus) lama', 268),
('O68', 'Persalinan Dengan Penyulit Gawat Janin', 269),
('O72', 'Perdarahan Setelah Persalinan', 270),
('O80', 'Persalinan Tunggal Spontan', 271),
('P05', 'Pertumbuhan Janin Lambat dan Malnutrisi Janin', 272),
('P07', 'Gangguan yang berhubungan dengan pendeknya masa gestasi (kehamilan) dan berat badan lahir rendah, tidak terklasifikasikan di tempat lainnya', 273),
('P21', 'Asfiksia Waktu Lahir', 274),
('P22', 'Sindrome Distres Saluran Pernafasan (RDS)', 275),
('P29', 'Gangguan Kardiovaskuler Yang Berhubungan Dengan Masa Perinatal', 276),
('P50', 'Kehilangan Darah Janin', 277),
('P55', 'Penyakit Hemolitik Pada Janin dan Bayi Baru Lahir', 278),
('P58', 'Jaundis Pada Bayi Baru Lahir disebabkan oleh Hemolisis Berlebihan', 279),
('P59', 'Jaundis Pada Bayi Baru Lahir yang disebabkan Oleh Penyebab Tidak Spesifik Lainnya', 280),
('P95', 'Lahir Mati', 281),
('Q21', 'Ventricular Septal Defect (VSD)', 282),
('Q21.1', 'Atrial Septal Defect', 283),
('Q21.3', 'Tetralogy Of Fallot', 284),
('Q35', 'Celah Palatum (Langit-langit)', 285),
('Q36', 'Celah Bibir', 286),
('Q37', 'Celah Palatum Dengan Celah Bibir', 287),
('Q38', 'Kelainan Bawaan Lain Pada Lidah, Mulut dan Faring', 288),
('R04', 'Epistaxis', 289),
('R04.2', 'Haemoptysis (Batuk Darah)', 290),
('R05', 'Batuk', 291),
('R07.4', 'Nyeri Dada Tidak Spesifik (Chest Pain Unspecified)', 292),
('R10', 'Nyeri Pinggul dan Perut', 293),
('R15', 'Inkontinensia Feses', 294),
('R33', 'Retensi Urin', 295),
('R50', 'Demam Yang Tidak diketahui Sebabnya', 296),
('R50.9', 'Fever, unspecified', 297),
('R51', 'Sakit Kepala', 298),
('R53', 'Malaise and Fatigue', 299),
('R55', 'Pingsan (Syncope)', 300),
('R56', 'Kejang Yang Tidak Terklasifikasikan ditempat Lain', 301),
('R57', 'Shock', 302),
('R68', 'Gejala dan Tanda Umum Lainnya', 303),
('R68.1', 'Acute pulmonary oedema due to chemicals, gases, fumes and vapours', 304),
('R68.8', 'Other specified general symptoms and signs', 305),
('S00', 'Cedera Pada Kepala', 306),
('S10', 'Cedera Pada Leher', 307),
('S20', 'Cedera Pada Rongga Dada (toraks)', 308),
('S30', 'Cedera Pada Perut, Punggung, Tulang Belakang, ?dan Pinggul', 309),
('S40', 'Cedera Pada Bahu, Lengan Atas, Siku, Lengan Bawah, Pergelangan dan ?Telapak Tangan', 310),
('S42', 'Fraktur Tulang Anggota Gerak', 311),
('S62', 'Fracture at Wrist and Hand Level', 312),
('S70', 'Cedera Pada Paha, Lutut, Kaki Bagian Bawah, Telapak Kaki', 313),
('S72', 'Fracture of Femur', 314),
('T00', 'Cedera Pada Daerah Multipel', 315),
('T14', 'Luka Lecet (VE)', 316),
('T14.1', 'Luka Robek (VL)', 317),
('T15', 'Corpal Pada Mata', 318),
('T16', 'Corpal Pada Telinga', 319),
('T17', 'Corpal Pada Saluran Nafas', 320),
('T18', 'Corpal pada Saluran Cerna', 321),
('T19', 'Corpal Pada Saluran Kemih & Genital', 322),
('T20', 'Luka Bakar dan Korosi', 323),
('T31', 'Luka Bakar Berdasarkan Permukaan Tubuh yg Terpapar', 324),
('T36', 'Keracunan Obat dan Preparat Biologik', 325),
('T60', 'Keracunan Pestisida', 326),
('Z30.0', 'Konseling KB', 327),
('Z30.1', 'Pemasangan IUD', 328),
('Z30.2', 'MOW/MOP', 329),
('Z30.3', 'Metode Kalender', 330),
('Z30.41', 'PIL', 331),
('Z30.5', 'Kontrol IUD dan AFF IUD', 332),
('Z32', 'Tes dan Pemeriksaan Kehamilan', 333),
('Z34.0', 'Gravida I', 334),
('Z34.8', 'Gravida II dan Seterusnya', 335),
('Z35', 'Kehamilan Dengan Riwayat Infertilitas', 336),
('Z35.4', 'Multipara', 337),
('Z35.5', 'Primi Tua', 338),
('Z35.6', 'Primi Muda', 339),
('Z39', 'Post Natal Care', 340),
('A00.0', 'Kolera', 341),
('A01.0', 'Demam Tifoid', 342),
('A01.4', 'Demam Paratifoid, tidak Spesifik', 343),
('A02.0', 'Infeksi Salmonela Lainnya', 344),
('A03.0', 'Shigelosis, Disentri Basiler tidak spesifik', 345),
('A04.0', 'Infeksi Usus karena bakteri lainnya tidak spesifik', 346),
('A05.0', 'Keracunan makanan karena bakteri lainnya', 347),
('A06.0', 'Amubiasis, Disentri Amuba', 348),
('A07.0', 'Penyakit infeksi usus lainnya', 349),
('A08.0', 'Infeksi Virus dan Infeksi usus tertentu lainnya', 350),
('A08.3', 'Infeksi Virus Tidak Spesifik', 351),
('A09.0', 'Diare dan Gastroenteritis', 352),
('A15.0', 'Tuberkulosa Paru BTA (+) dengan/tanpa pemeriksaan biakan', 353),
('A16.0', 'Tuberkulosis Paru klinis', 354),
('A16.2', 'Tuberkulosis Paru lainnya', 355),
('A16.3', 'Tuberkulosis alat nafas lainnya', 356),
('A17.0', 'Meningitis Tuberkulosa', 357),
('A18.0', 'Tuberkulosis Organ Lainnya', 358),
('A19.0', 'Tuberkulosis Miliaris', 359),
('A20', 'Pes/Sampar', 360),
('A22', 'Antraks', 361),
('A26', 'Parotitis', 362),
('A27', 'Leptospirosis', 363),
('A30.0', 'Kusta I/T (MB)', 364),
('A30.5', 'Kusta B/L (PB)', 365),
('A33', 'Tetanus Neonatorum', 366),
('A35.0', 'Tetanus Lainnya', 367),
('A36', 'Difteria', 368),
('A37.9', 'Pertusis/Batuk Rejan', 369),
('A39.9', 'Infeksi Meningokok', 370),
('A40.0', 'Septisemia', 371),
('A50.0', 'Sifilis Kongenital/bawaan', 372),
('A51.9', 'Sifilis Dini', 373),
('A54.9', 'Infeksi Gonokok', 374),
('A65.0', 'Penyakit Sprirokaetal Lainnya', 375),
('A66.0', 'Frambusia', 376),
('A71', 'Trakoma', 377),
('A80', 'Poliomielitis Akut', 378),
('A82', 'Rabies', 379),
('A87', 'Meningitis Karena Virus', 380),
('A90', 'Demam Dengue', 381),
('A91.0', 'Demam Berdarah Dengue', 382),
('A92.0', 'Chikungunya', 383),
('A93.0', 'Penyakit Demam Mungkin Bukan DBD', 384),
('B00', 'Infeksi Herpesvirus (herpes simplex)', 385),
('B01.9', 'Varisela/Cacar Air', 386),
('B05.9', 'Campak', 387),
('B08', 'Penyakit Campak Dengan Komplikasi Berat', 388),
('B09', 'Penyakit Campak Komplikasi Pada Mata/Mulut', 389),
('B15', 'Hepatitis A Akut (Klinis)', 390),
('B15.9', 'Hepatitis Tidak Akut', 391),
('B16', 'Hepatitis B Akut', 392),
('B17', 'Hepatitis Virus Lainnya', 393),
('B20', 'Penyakit Virus Defisiensi Imun Pada Manusia', 394),
('B24', 'Penyakit HIV/AIDS', 395),
('B25', 'Penyakit Virus Lainnya', 396),
('B26', 'Penyakit HIV/AIDS', 397),
('B35', 'Dermatophytosis (Tinea)', 398),
('B50', 'Malaria karena plasmodium Falsiparum (Malaria Tropika)', 399),
('B50.9', 'Malaria karena plasmodium Falsiparum (Malaria Tropika)', 400),
('B51', 'Malaria karena plasmodium Vivaks (Malaria Tertiana)', 401),
('B51.9', 'Malaria karena plasmodium Vivaks (Malaria Tertiana)', 402),
('B52', 'Malaria karena plasmodium malaria', 403),
('B53.0', 'Malaria karena palsmodium ovale', 404),
('B53.8', 'Malaria terbukti secara parasitologik tidak terklasifikasikan', 405),
('B54', 'Malaria Klinis', 406),
('B74', 'Filarisis', 407),
('B74.9', 'Filarisis', 408),
('B76', 'Penyakit Cacing Tambang', 409),
('B77', 'Askariasis (Penyakit Cacing Gelang)', 410),
('B79', 'Trikhuriasis (Penyakit Cacing Cambuk)', 411),
('B80', 'Enterobiasis', 412),
('B86', 'Skabies', 413),
('C00', 'Tumor ganas bibir, Rongga mulut, faring', 414),
('C15', 'Tumor ganas saluran pencernaan', 415),
('C30', 'Tumor ganas sistem pernafasan dan alat di dalam rongga dada', 416),
('C50', 'Tumor ganas payudara', 417),
('C53.9', 'Tumor ganas leher rahim', 418),
('C54.9', 'Tumor ganas korpus rahim', 419),
('C56', 'Tumor ganas indung telur', 420),
('C60', 'Tumor ganas alat kelamin pria', 421),
('C61', 'Tomor ganas prostat', 422),
('D36', 'Tumor Jinak Lainnya dan tidak spesifik tempatnya', 423),
('D48', 'Tumor Tertentu atau Tidak Diketahui Perilakunya lainnya, ?tempat dan tidak spesifik.', 424),
('D50', 'Anemia Defisiensi Besi', 425),
('D51', 'Anemia Lainnya', 426),
('D53.9', 'Anemia Defisiensi Gizi', 427),
('D63', 'Anemi Berat', 428),
('D64', 'Anemi', 429),
('E14', 'Diabetes Melitus Tidak Spesifik', 430),
('E40', 'Kwasiorkor', 431),
('E41', 'Marasmus', 432),
('E42', 'Marasmik-Kwasiorkor', 433),
('E43', 'Kurang Kalori Protein Berat Tidak Spesifik', 434),
('E44', 'Kurang Kalori Protein Sedang Tidak Spesifik', 435),
('E45', 'Gangguan pertumbuhan karena kurang kalori protein', 436),
('E46', 'Malnutrisi protein dan kalori tidak spesifik', 437),
('E50', 'Kekurangan Vitamin A', 438),
('E66', 'Obesitas', 439),
('E78', 'Hypercholesterolaemia', 440),
('E86', 'Deplesi Volume (Dehidrasi)', 441),
('F19', 'Gangguan jiwa dan perilaku yang disebabkan oleh penggunaan lebih dari satu jenis obat dan zat psikoaktif lainnya', 442),
('F20.9', 'Skisofrenia', 443),
('F23', 'Gangguan Akut dan sementara', 444),
('F25', 'Gangguan Skizoafektif', 445),
('F32', 'Episode Depresif', 446),
('F45', 'Gangguan Somatoform', 447),
('F48', 'Gangguan Emosi (Neurotik/Psisomatik) Lainnya', 448),
('F48.9', 'Gangguan Emosi', 449),
('F79', 'Retardasi Mental tidak spesifik', 450),
('G00', 'Meningitis bakterialis', 451),
('G40', 'Epilepsi', 452),
('G43', 'Migren dan sindrom nyeri kepala lainnya', 453),
('G98', 'Gangguan lain pada susunan saraf yang tidak terklasifikasikan', 454),
('H00', 'Hordeolum', 455),
('H10.9', 'Konjungtivitis', 456),
('H16.9', 'Keratitis', 457),
('H25', 'Katarak Senilis', 458),
('H25.9', 'Katarak Senilis', 459),
('H26', 'Katarak lain tidak spesifik', 460),
('H40', 'Glaukoma tidak Spesifik', 461),
('H52', 'Gangguan Refraksi dan Akomodasi', 462),
('H52.1', 'Myopia', 463),
('H52.6', 'Other disorders of refraction', 464),
('H54', 'Buta dan Rabun', 465),
('H57', 'Gangguan mata dan adneksa lainnya', 466),
('H57.9', 'Gangguan mata dan adneksa lainnya', 467),
('H60', 'Ototis Eksterna', 468),
('H65', 'Otottis Media Nonsupurativa', 469),
('H65.9', 'Otottis Media Nonsupurativa', 470),
('H66', 'Ototis Media Supurativa tidk spesifik', 471),
('H66.4', 'Ototis Media Supurativa tidk spesifik', 472),
('H70', 'Mastoiditis', 473),
('H72', 'Perforasi membran timpani', 474),
('H93', 'Gangguan telinga lain tidak spesifik', 475),
('H93.9', 'Gangguan telinga lain tidak spesifik', 476),
('I10', 'Hipertensi Primer (Esensial)', 477),
('I11', 'Hypertensive Heart Disease (HHD)', 478),
('I15', 'Hipertensi Sekunder', 479),
('I20', 'Angina Pektoris', 480),
('I21', 'Infark miokard Akut', 481),
('I23', 'Penyakit Jantung Isemik lainnya', 482),
('I26', 'Emboli paru', 483),
('I50', 'Penyakit Gagal Jantung (Decompensatio Cordis)', 484),
('I63', 'Infark Serebral', 485),
('I64', 'Stroke, tidak menyebut pendarahan atau infark', 486),
('I65', 'Penyakit pembuluh darah lain tidak infeksi', 487),
('I84', 'Hemoroid (Wasir)', 488),
('I88', 'Nonspecific Lymphadenitis', 489),
('I95', 'Hipotensi tidak spesifik', 490),
('I99', 'Penyakit pembuluh darah Lain tidak spesifik', 491),
('J00', 'Nasofaringitis Akuta (Common Cold)', 492),
('J01', 'Sinusitis Akuta', 493),
('J02', 'Faringitis Akuta', 494),
('J03', 'Tonsilitis Akuta', 495),
('J04', 'Laringitis Akuta', 496),
('J06', 'Penyakit Infeksi Saluran Pernafasan Atas Akut tidak Spesifik', 497),
('J06.0', 'Acute laryngopharyngitis', 498),
('J09', 'Suspek Avian Influenza/Flu Burung', 499),
('J10', 'Influenza', 500),
('J11.1', 'Influenza', 501),
('J18.0', 'Broncho Pneumonia Tidak Spesifik', 502),
('J18.9', 'Pneumonia', 503),
('J22', 'Infeksi Saluran Pernafasan Bawah Akut Tidak Spesifik', 504),
('J30.3', 'Alergi Rhinitis akibat kerja', 505),
('J32', 'Sinusitis Kronik', 506),
('J36', 'Penyakit Saluran Pernafasan Bagian Atas Lainnya', 507),
('J40', 'Bronchitis tidak ditemukan akut atau kronik', 508),
('J45', 'Asma', 509),
('J46', 'Status Asthmatikus', 510),
('J47', 'Bronkiektasis dan Bronkiolektasis', 511),
('J84.9', 'Penyakit Jaringan Interstitial Paru lainnya', 512),
('K00', 'Gangguan Perkembangan & Erupsi Gigi', 513),
('K00.6', 'PERSISTENSI', 514),
('K01', 'Gigi Terbenam & Gigi Impaksi', 515),
('K02', 'Karies Gigi', 516),
('K03', 'Penyakit Jaringan Keras Gigi Lainnya', 517),
('K04', 'Penyakit Pulpa dan Jaringan Periapikal', 518),
('K05', 'Gingivitis & Penyakit Periodontral', 519),
('K06', 'Penyakit gusi, jaringan periodontal dan tulang alveolar', 520),
('K07', 'Kelainan Dentofasial Termasuk Maloklusi', 521),
('K08', 'Gangguan gigi dan jaringan penunjang lainnya', 522),
('K09', 'Penyakit rongga mulut, kelenjar ludah, rahang dan lainnya', 523),
('K10', 'Penyakit Rahang Lainnya', 524),
('K11', 'Penyakit Kelenjar Liur', 525),
('K12', 'Stomatitis dan Lesi-lesi yang Berhubungan', 526),
('K13', 'Penyakit Bibir dan Mukosa Lainnya', 527),
('K14', 'Penyakit Lidah', 528),
('K25', 'Tukak Lambung', 529),
('K29.7', 'Gastritis, unspecified', 530),
('K29.9', 'Gastroduodenitesis Tidak Spesifik', 531),
('K30', 'Dispepsia', 532),
('K35', 'Apendisitis Akuta Tidak Spesifik', 533),
('K36', 'Apendisitis lainnya', 534),
('K40', 'Hernia Inguinalis', 535),
('K41', 'Hernia Femoralis', 536),
('K42', 'Hernia Umbilikalis', 537),
('K63', 'Penyakit usus halus lainnya', 538),
('K76', 'Penyakit hati lainnya', 539),
('K92', 'Penyakit sistem pencernaan tidak spesifik', 540),
('L01', 'Impetigo', 541),
('L02', 'Abses, furunkri, karbunkel kutan', 542),
('L23', 'Dermatitis kontak', 543),
('L24', 'Dermatitis kontak iritan', 544),
('L30.9', 'Dermatitis lain tidak spesifik', 545),
('L40', 'Psoriasis', 546),
('L42', 'Pytryasis Rosea', 547),
('L50', 'Urticaria', 548),
('L51', 'Drug Eruption', 549),
('L70', 'Acne Vulgaris', 550),
('L80', 'Vitiligo', 551),
('L89', 'Ulcus Decubitus', 552),
('L93', 'Sistemik Lupus Eritromatosus (SLE)', 553),
('L98', 'Gangguan lain pada kulit dan jaringan subkutan yang tidak terklasifikasikan', 554),
('L98.0', 'Pyogenic granuloma', 555),
('M10', 'Gout', 556),
('M13', 'Artritis lainnya', 557),
('M22', 'Dislokasi Patella', 558),
('M41', 'Skoliosis', 559),
('M54.5', 'Low Back Pain (nyeri punggung bawah)', 560),
('M67.4', 'Ganglion', 561),
('M79.0', 'Rematisme tidak spesifik', 562),
('M79.1', 'Myalgia', 563),
('M79.2', 'Neuralgia dan Neuritis tidak spesifik', 564),
('M80', 'Osteoporosis Dengan Fraktur Patologis', 565),
('M81', 'Osteoporosis Tanpa Fraktur Patologis', 566),
('N04', 'Sindroma Nefrotik', 567),
('N10', 'Pyelonephritis Acute', 568),
('N11', 'Pyelonephritis Cronic', 569),
('N17', 'Gagal ginjal akuta', 570),
('N18', 'Gagal Ginjal Kronik', 571),
('N20', 'Batu sistem kemih (ginjal, ureter, saluran kemih bawah)', 572),
('N23', 'Kolik ginjal tidak spesifik', 573),
('N30', 'Sistitis', 574),
('N34', 'Uretritis dan sindrom uretal', 575),
('N40', 'Gangguan prostat', 576),
('N45', 'Orchits and Epididymitis', 577),
('N50.8', 'Hydrocele', 578),
('N60', 'Dysplasia Mammae', 579),
('N61', 'Mastitis', 580),
('N62', 'Gynaecomastia', 581),
('N70', 'Salphingitis', 582),
('N72', 'Cervicitis', 583),
('N75', 'Kista Bartholin', 584),
('N76.0', 'Vaginitis Acute', 585),
('N80', 'Endometriosis', 586),
('N89.8', 'Leukorrhoea', 587),
('N92.0', 'Menorrhagia', 588),
('N92.1', 'Menometrorrhagia', 589),
('O00', 'Kehamilan ektropik (di luar kandungan)', 590),
('O03', 'Abortus spontan', 591),
('O04', 'Abortus atas indikasi medis', 592),
('O05', 'Abortus lainnya', 593),
('O10', 'Hipertensi yang sudah ada sebelum kehamilan dan menjadi penyulit pada masa kehamilan, persalinan dan nifas.', 594),
('O13', 'Pre-eklamsia Ringan', 595),
('O14.0', 'Pre-eklamsia Sedang', 596),
('O14.1', 'Pre-eklamsia berat', 597),
('O15.0', 'Eklamsia selama kehamilan', 598),
('O15.1', 'Eklamsia dalam proses melahirkan', 599),
('O15.2', 'Eklamsia pada masa nifas', 600),
('O15.3', 'Eklamsia tidak spesifik (selama kehamilan atau persalinan atau nifas)', 601),
('O16', 'Hipertensi maternal', 602),
('O21', 'Muntah berlebihan selama masa kehamilan', 603),
('O24', 'Diabetes mellitus (penyakit kencing manis) dalam kehamilan', 604),
('O25', 'Kehamilan dengan malnutrisi', 605),
('O42', 'Ketuban pecah dini', 606),
('O46', 'Pendarahan antepartum', 607),
('O63', 'Persalinan (Partus) lama', 608),
('O68', 'Persalinan Dengan Penyulit Gawat Janin', 609),
('O72', 'Perdarahan Setelah Persalinan', 610),
('O80', 'Persalinan Tunggal Spontan', 611),
('P05', 'Pertumbuhan Janin Lambat dan Malnutrisi Janin', 612),
('P07', 'Gangguan yang berhubungan dengan pendeknya masa gestasi (kehamilan) dan berat badan lahir rendah, tidak terklasifikasikan di tempat lainnya', 613),
('P21', 'Asfiksia Waktu Lahir', 614),
('P22', 'Sindrome Distres Saluran Pernafasan (RDS)', 615),
('P29', 'Gangguan Kardiovaskuler Yang Berhubungan Dengan Masa Perinatal', 616),
('P50', 'Kehilangan Darah Janin', 617),
('P55', 'Penyakit Hemolitik Pada Janin dan Bayi Baru Lahir', 618),
('P58', 'Jaundis Pada Bayi Baru Lahir disebabkan oleh Hemolisis Berlebihan', 619),
('P59', 'Jaundis Pada Bayi Baru Lahir yang disebabkan Oleh Penyebab Tidak Spesifik Lainnya', 620),
('P95', 'Lahir Mati', 621),
('Q21', 'Ventricular Septal Defect (VSD)', 622),
('Q21.1', 'Atrial Septal Defect', 623),
('Q21.3', 'Tetralogy Of Fallot', 624),
('Q35', 'Celah Palatum (Langit-langit)', 625),
('Q36', 'Celah Bibir', 626),
('Q37', 'Celah Palatum Dengan Celah Bibir', 627),
('Q38', 'Kelainan Bawaan Lain Pada Lidah, Mulut dan Faring', 628),
('R04', 'Epistaxis', 629),
('R04.2', 'Haemoptysis (Batuk Darah)', 630),
('R05', 'Batuk', 631),
('R07.4', 'Nyeri Dada Tidak Spesifik (Chest Pain Unspecified)', 632),
('R10', 'Nyeri Pinggul dan Perut', 633),
('R15', 'Inkontinensia Feses', 634),
('R33', 'Retensi Urin', 635),
('R50', 'Demam Yang Tidak diketahui Sebabnya', 636),
('R50.9', 'Fever, unspecified', 637),
('R51', 'Sakit Kepala', 638),
('R53', 'Malaise and Fatigue', 639),
('R55', 'Pingsan (Syncope)', 640),
('R56', 'Kejang Yang Tidak Terklasifikasikan ditempat Lain', 641),
('R57', 'Shock', 642),
('R68', 'Gejala dan Tanda Umum Lainnya', 643),
('R68.1', 'Acute pulmonary oedema due to chemicals, gases, fumes and vapours', 644),
('R68.8', 'Other specified general symptoms and signs', 645),
('S00', 'Cedera Pada Kepala', 646),
('S10', 'Cedera Pada Leher', 647),
('S20', 'Cedera Pada Rongga Dada (toraks)', 648),
('S30', 'Cedera Pada Perut, Punggung, Tulang Belakang, ?dan Pinggul', 649),
('S40', 'Cedera Pada Bahu, Lengan Atas, Siku, Lengan Bawah, Pergelangan dan ?Telapak Tangan', 650),
('S42', 'Fraktur Tulang Anggota Gerak', 651),
('S62', 'Fracture at Wrist and Hand Level', 652),
('S70', 'Cedera Pada Paha, Lutut, Kaki Bagian Bawah, Telapak Kaki', 653),
('S72', 'Fracture of Femur', 654),
('T00', 'Cedera Pada Daerah Multipel', 655),
('T14', 'Luka Lecet (VE)', 656),
('T14.1', 'Luka Robek (VL)', 657),
('T15', 'Corpal Pada Mata', 658),
('T16', 'Corpal Pada Telinga', 659),
('T17', 'Corpal Pada Saluran Nafas', 660),
('T18', 'Corpal pada Saluran Cerna', 661),
('T19', 'Corpal Pada Saluran Kemih & Genital', 662),
('T20', 'Luka Bakar dan Korosi', 663),
('T31', 'Luka Bakar Berdasarkan Permukaan Tubuh yg Terpapar', 664),
('T36', 'Keracunan Obat dan Preparat Biologik', 665),
('T60', 'Keracunan Pestisida', 666),
('Z30.0', 'Konseling KB', 667),
('Z30.1', 'Pemasangan IUD', 668),
('Z30.2', 'MOW/MOP', 669),
('Z30.3', 'Metode Kalender', 670),
('Z30.41', 'PIL', 671),
('Z30.5', 'Kontrol IUD dan AFF IUD', 672),
('Z32', 'Tes dan Pemeriksaan Kehamilan', 673),
('Z34.0', 'Gravida I', 674),
('Z34.8', 'Gravida II dan Seterusnya', 675),
('Z35', 'Kehamilan Dengan Riwayat Infertilitas', 676),
('Z35.4', 'Multipara', 677),
('Z35.5', 'Primi Tua', 678),
('Z35.6', 'Primi Muda', 679),
('Z39', 'Post Natal Care', 680);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_diagnosa_perawat`
--

CREATE TABLE `tbl_master_diagnosa_perawat` (
  `code` char(10) NOT NULL,
  `diagnosa` varchar(222) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_master_diagnosa_perawat`
--

INSERT INTO `tbl_master_diagnosa_perawat` (`code`, `diagnosa`, `id`) VALUES
('	0001', 'Bersihan Jalan Nafas Tidak Efektif', 1),
('	0002', 'Gangguan Penyapihan Ventilator', 2),
('	0003', 'Gangguan Pertukaran Gas', 3),
('	0004', 'Gangguan Ventilasi Spontan ', 4),
('	0005', 'Pola Nafas Tidak Efektif ', 5),
('	0006', 'Risiko Aspirasi', 6),
('	0007', 'Gangguan Sirkulasi Spontan ', 7),
('	0008', 'Penurunan Curah Jantung ', 8),
('	0009', 'Perfusi Perifer Tidak Efektif ', 9),
('	0010', 'Risiko Gangguan Sirkulasi Spontan ', 10),
('	0011', 'Risiko Penurunan Curah Jantung ', 11),
('	0012', 'Risiko Perdarahan ', 12),
('	0013', 'Risiko Perfusi Gastrointestinal Tidak Efektif ', 13),
('	0014', 'Risiko Perfusi Miokard Tidak Efektif ', 14),
('	0015', 'Risiko Perfusi Perifer Tidak Efektif ', 15),
('	0016', 'Risiko Perfusi Renal Tidak Efektif ', 16),
('	0017', 'Risiko Perfusi Serebral Tidak Efektif', 17),
('	0018', 'Berat Badan Lebih ', 18),
('	0019', 'Defisit Nutrisi ', 19),
('	0020', 'Diare ', 20),
('	0021', 'Disfungsi Motilitas Gastrointestinal ', 21),
('	0022', 'Hipervolemia ', 22),
('	0023', 'Hipovolemia ', 23),
('	0024', 'Ikterus Neonatus ', 24),
('	0025', 'Kesiapan Peningkatan Keseimbangan Cairan ', 25),
('	0026', 'Kesiapan Peningkatan Nutrisi ', 26),
('	0027', 'Ketidakstabilan Kadar Glukosa Darah ', 27),
('	0028', 'Menyusui Efektif ', 28),
('	0029', 'Menyusui Tidak Efektif ', 29),
('	0030', 'Obesitas ', 30),
('	0031', 'Risiko Berat Badan Berlebih ', 31),
('	0032', 'Risiko Defisit Nutrisi ', 32),
('	0033', 'Risiko Disfungsi Motilitas Gastrointestinal ', 33),
('	0034', 'Risiko Hipovolemia ', 34),
('	0035', 'Risiko Ikterus Neonatus ', 35),
('	0036', 'Risiko Ketidakseimbangan Cairan ', 36),
('	0037', 'Risiko Ketidakseimbangan Elektrolit ', 37),
('	0038', 'Risiko Ketidakseimbangan Kadar Glukosa Darah ', 38),
('	0039', 'Risiko Syok', 39),
('	0040', 'Gangguan Eliminasi Urine ', 40),
('	0041', 'Inkontinensia Fiskal ', 41),
('	0042', 'Inkontinensia Urine Berlanjut ', 42),
('	0043', 'Inkontinensia Urine Berlebih ', 43),
('	0044', 'Inkontinensia Urine Fungsional ', 44),
('	0045', 'Inkontinensia Urine Refleks ', 45),
('	0046', 'Inkontinensia Urine Stres ', 46),
('	0047', 'Inkontinensia Urine Urgensi ', 47),
('	0048', 'Kesiapan Peningkatan Eliminasi Urine ', 48),
('	0049', 'Konstipasi ', 49),
('	0050', 'Retensi Urine ', 50),
('	0051', 'Risiko Inkontinensia Urine Urgensi ', 51),
('	0052', 'Risiko Konstipasi', 52),
('	0053', 'Disorganisasi Perilaku Bayi ', 53),
('	0054', 'Gangguan Mobilitas Fisik ', 54),
('	0055', 'Gangguan Pola Tidur ', 55),
('	0056', 'Intoleransi Aktivitas ', 56),
('	0057', 'Keletihan ', 57),
('	0058', 'Kesiapan Peningkatan Tidur ', 58),
('	0059', 'Risiko Disorganisasi Perilaku Bayi ', 59),
('	0060', 'Risiko Intoleransi Aktivitas', 60),
('	0061', 'Disrefleksia Otonom ', 61),
('	0062', 'Gangguan Memori ', 62),
('	0063', 'Gangguan Menelan ', 63),
('	0064', 'Konfusi Akut ', 64),
('	0065', 'Konfusi Kronis ', 65),
('	0066', 'Penurunan Kapasitas Adaptif Intrakranial ', 66),
('	0067', 'Risiko Disfungsi Neuro vaskuler Perifer ', 67),
('	0068', 'Risiko Intoleransi Aktivitas', 68),
('	0069', 'Disfungsi Sensual ', 69),
('	0070', 'Kesiapan Persalinan ', 70),
('	0071', 'Pola Sensual Tidak Efektif ', 71),
('	0072', 'Risiko Disfungsi Sensual ', 72),
('	0073', 'Risiko Kehamilan Tidak Dikehendaki', 73),
('	0074', 'Gangguan Rasa Nyaman ', 74),
('	0075', 'Ketidak nyamanan Pasca Partum ', 75),
('	0076', 'Nausea ', 76),
('	0077', 'Nyeri Akut ', 77),
('	0078', 'Nyeri Kronis ', 78),
('	0079', 'Nyeri Melahirkan', 79),
('	0080', 'Ansietas ', 80),
('	0081', 'Berduka ', 81),
('	0082', 'Distres Spiritual ', 82),
('	0083', 'Gangguan Citra Tubuh ', 83),
('	0084', 'Gangguan Identitas Diri ', 84),
('	0085', 'Gangguan Persepsi Sensori ', 85),
('	0086', 'Harga Diri Rendah Kronis ', 86),
('	0087', 'Harga Diri Rendah Situasional ', 87),
('	0088', 'Keputusasaan ', 88),
('	0089', 'Kesiapan Peningkatan Konsep Diri ', 89),
('	0090', 'Kesiapan Peningkatan Koping Keluarga ', 90),
('	0091', 'Kesiapan Peningkatan Koping Komunitas ', 91),
('	0092', 'Ketidak berdayaan ', 92),
('	0093', 'Ketidakmampuan Koping Keluarga ', 93),
('	0094', 'Koping Defensif ', 94),
('	0095', 'Koping Komunitas Tidak Efektif ', 95),
('	0096', 'Koping Tidak Efektif ', 96),
('	0097', 'Penurunan Koping Keluarga ', 97),
('	0098', 'Penyangkalan Tidak Efektif ', 98),
('	0099', 'Perilaku Kesehatan Cenderung Berisiko', 99),
('	0100', 'Risiko Distres Spiritual', 100),
('	0101', 'Risiko Harga', 101),
('	0102', 'Risiko Harga Diri Rendah Situasional ', 102),
('	0103', 'Risiko Ketidak berdayaan ', 103),
('	0104', 'Sindrom Pasca Trauma', 104),
('	0105', 'Gangguan Tumbuh Kembang ', 105),
('	0106', 'Risiko Gangguan Perkembangan ', 106),
('	0107', 'Risiko Gangguan Pertumbuhan', 107),
('	0108', 'Defisit Perawatan Diri', 108),
('	0109', 'Defisit Kesehatan Komunitas ', 109),
('	0110', 'Defisit Pengetahuan ', 110),
('	0111', 'Kesiapan Peningkatan Manajemen Kesehatan ', 111),
('	0112', 'Kesiapan Peningkatan Pengetahuan ', 112),
('	0113', 'Ketidak patuhan ', 113),
('	0114', 'Manajemen Kesehatan Keluarga Tidak Efektif ', 114),
('	0115', 'Manajemen Kesehatan Tidak Efektif ', 115),
('	0116', 'Pemeliharaan Kesehatan Tidak Efektif', 116),
('	0117', 'Gangguan Interaksi Sosial ', 117),
('	0118', 'Gangguan Komunikasi Verbal ', 118),
('	0119', 'Gangguan Proses Keluarga ', 119),
('	0120', 'Isolasi Sosial ', 120),
('	0121', 'Kesiapan Peningkatan Menjadi Orang Tua ', 121),
('	0122', 'Kesiapan Peningkatan Proses Keluarga ', 122),
('	0123', 'Ketegangan Peran Pemberi Asuhan ', 123),
('	0124', 'Penampilan Peran Tidak Efektif ', 124),
('	0125', 'Pencapaian Peran Menjadi Orang Tua ', 125),
('	0126', 'Risiko Gangguan Perlekatan ', 126),
('	0127', 'Risiko Proses Pengasuhan Tidak Efektif', 127),
('	0128', 'Gangguan Integritas kulit/ jaringan ', 128),
('	0129', 'Hipertermia ', 129),
('	0130', 'Hipotermia ', 130),
('	0131', 'Perilaku Kekerasan ', 131),
('	0132', 'Perlambatan pemulihan pasca bedah', 132),
('	0133', 'Risiko Alergi ', 133),
('	0134', 'Risiko Bunuh Diri ', 134),
('	0135', 'Risiko Cedera ', 135),
('	0136', 'Risiko Cedera Pada Ibu ', 136),
('	0137', 'Risiko Cedera Pada Janin ', 137),
('	0138', 'Risiko Gangguan Integritas Kulit/ Jaringan ', 138),
('	0139', 'Risiko Hipotermia ', 139),
('	0140', 'Risiko Hipotermia Per operatif ', 140),
('	0141', 'Risiko Infeksi ', 141),
('	0142', 'Risiko Jatuh ', 142),
('	0143', 'Risiko Luka Tekan ', 143),
('	0144', 'Risiko Mutilasi Diri ', 144),
('	0145', 'Risiko Perilaku Kekerasan ', 145),
('	0146', 'Risiko Perlambatan Pemulihan Pascabedah ', 146),
('	0147', 'Risiko Termoregulasi Tidak Efektif ', 147),
('	0148', 'Termoregulasi Tidak Efektif', 148);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obat`
--

CREATE TABLE `tbl_obat` (
  `id_obat` int(11) NOT NULL,
  `obat` varchar(300) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `tgl_expire` date NOT NULL,
  `stok` int(11) NOT NULL,
  `code` char(10) NOT NULL,
  `nomor_batch` varchar(222) NOT NULL,
  `kategori` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_obat`
--

INSERT INTO `tbl_obat` (`id_obat`, `obat`, `satuan`, `tgl_expire`, `stok`, `code`, `nomor_batch`, `kategori`) VALUES
(1, 'Acarbose', 'Tablet', '2020-10-10', 884, 'Ac1', '123123', 'BIASA'),
(2, 'Acetazolamide', 'Tablet', '2020-10-10', 838, 'Ac2', '1231233', 'BIASA'),
(3, 'Amoksisilin  ', 'tab scored 500 mg ', '2020-10-10', 330, 'Ac3', '1231233w3', 'BIASA'),
(4, 'Ampisilin', 'Tablet', '2020-10-10', 964, 'ampisilin', '123123332', 'BIASA'),
(5, 'Sefazolin ', 'Tablet', '2020-10-10', 990, 'sefazolin', '12312330', 'BIASA'),
(6, 'Metronidazol', 'Tablet', '2020-10-10', 994, 'metronidaz', '2032', 'BIASA'),
(7, 'Kain Kasa', 'bungkus', '2020-10-10', 970, 'KKasa', '120', 'BMHP'),
(8, 'Masker', 'Buah', '2020-10-10', 1000, 'Mask', '740012', 'BMHP'),
(9, 'Selang Oksigen', 'Buah', '2020-10-10', 990, 'Selang', '1045', 'BMHP');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obat_keluar`
--

CREATE TABLE `tbl_obat_keluar` (
  `id_obat_keluar` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `id_kunjungan` int(11) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_obat_keluar`
--

INSERT INTO `tbl_obat_keluar` (`id_obat_keluar`, `id_obat`, `id_kunjungan`, `tgl_keluar`, `jumlah`) VALUES
(1, 4, 1, '2019-10-10', 10),
(2, 7, 1, '2019-10-10', 10),
(3, 9, 1, '2019-10-10', 10),
(4, 1, 1, '2019-10-10', 100),
(5, 2, 1, '2019-10-10', 10),
(6, 3, 1, '2019-10-10', 13),
(7, 1, 2, '2019-10-10', 10),
(8, 2, 4, '2019-10-10', 100),
(9, 5, 5, '2019-10-10', 10),
(10, 2, 6, '2019-10-10', 10),
(11, 7, 3, '2019-10-10', 10),
(12, 3, 0, '2019-10-10', 150),
(13, 6, 0, '2019-10-10', 6),
(14, 7, 0, '2019-10-10', 10),
(15, 3, 7, '2019-10-11', 100),
(16, 3, 0, '2019-10-11', 100),
(17, 3, 9, '2019-10-15', 10),
(18, 1, 11, '2019-10-15', 10),
(19, 3, 11, '2019-10-15', 10),
(20, 1, 11, '2019-10-15', 2),
(21, 2, 11, '2019-10-15', 3),
(22, 4, 11, '2019-10-15', 4),
(23, 3, 0, '2019-10-15', 50),
(24, 1, 0, '2019-10-15', 60),
(25, 4, 13, '2019-10-15', 12),
(26, 3, 0, '2019-10-16', 90),
(27, 4, 15, '2019-10-16', 10),
(28, 3, 16, '2019-10-16', 10),
(29, 1, 16, '2019-10-16', 10),
(30, 2, 16, '2019-10-16', 15),
(31, 3, 16, '2019-10-16', 15),
(32, 1, 17, '2019-10-16', 0),
(33, 3, 0, '2019-10-16', 100),
(34, 1, 0, '2019-10-17', 12),
(35, 2, 0, '2019-10-17', 12),
(36, 3, 21, '2019-10-17', 12),
(37, 1, 0, '2019-10-17', 12),
(38, 2, 0, '2019-10-17', 12),
(39, 3, 0, '2019-10-17', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obat_masuk`
--

CREATE TABLE `tbl_obat_masuk` (
  `id_obat_masuk` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_expire` date NOT NULL,
  `pemberian` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_obat_masuk`
--

INSERT INTO `tbl_obat_masuk` (`id_obat_masuk`, `id_obat`, `tgl_masuk`, `jumlah`, `tgl_expire`, `pemberian`) VALUES
(1, 1, '2019-10-10', 1000, '2020-10-10', 'DAU'),
(2, 2, '2019-10-10', 1000, '2020-10-10', 'DAU'),
(3, 3, '2019-10-10', 1000, '2020-10-10', 'DAU'),
(4, 4, '2019-10-10', 1000, '2020-10-10', 'DAU'),
(5, 5, '2019-10-10', 1000, '2020-10-10', 'DAU'),
(6, 6, '2019-10-10', 1000, '2020-10-10', 'DAU'),
(7, 7, '2019-10-10', 1000, '2020-10-10', 'DAU'),
(8, 8, '2019-10-10', 1000, '2020-10-10', 'DAU'),
(9, 9, '2019-10-10', 1000, '2020-10-10', 'DAU'),
(10, 1, '2019-10-10', 100, '2020-10-10', 'DAU');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obat_permintaan`
--

CREATE TABLE `tbl_obat_permintaan` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah` double NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `surat_permintaan` varchar(222) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=baru,1=farmasi_checked,2=kapus_setuju,3=farmasi_serahkan_obat',
  `jum_realisasi` double NOT NULL,
  `ket_realisasi` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_obat_permintaan`
--

INSERT INTO `tbl_obat_permintaan` (`id`, `id_pegawai`, `id_obat`, `jumlah`, `tgl`, `surat_permintaan`, `status`, `jum_realisasi`, `ket_realisasi`) VALUES
(1, 23, 3, 300, '2019-10-10 08:09:20', 'surat_permintaan_1570694877.jpg', 3, 150, 'lebay amat  req nya kebnyakan sis'),
(3, 23, 6, 6, '2019-10-10 09:44:47', 'surat_permintaan_1570700481.pdf', 3, 6, 'Lengkap'),
(4, 23, 7, 500, '2019-10-10 09:59:13', 'surat_permintaan_1570701464.png', 3, 10, 'Tidak Lengkap'),
(5, 23, 3, 100, '2019-10-11 02:27:51', 'surat_permintaan_1570760560.jpg', 3, 100, 'Lengkap'),
(6, 23, 3, 100, '2019-10-15 02:43:28', 'surat_permintaan_1571107234.jpg', 3, 50, 'disesuaikan dengan stok'),
(7, 23, 1, 200, '2019-10-15 02:43:28', 'surat_permintaan_1571107234.jpg', 3, 60, 'disesuaikan dengan stok'),
(8, 23, 3, 100, '2019-10-16 08:38:31', 'surat_permintaan_1571214861.pdf', 3, 100, 'cukut sampai 5 bulan'),
(9, 23, 1, 12, '2019-10-17 03:29:15', '', 3, 12, 'Lengkap'),
(10, 23, 2, 12, '2019-10-17 03:29:15', '', 3, 12, 'Lengkap'),
(11, 23, 3, 10, '2019-10-17 03:29:15', '', 3, 10, 'Lengkap');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `no_pendaftaran` int(11) NOT NULL,
  `nama` varchar(222) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gol_darah` char(33) NOT NULL,
  `no_bpjs` char(15) NOT NULL,
  `no_telp` char(20) NOT NULL,
  `alamat` text NOT NULL,
  `desa` varchar(222) NOT NULL,
  `kecamatan` varchar(222) NOT NULL,
  `kabupaten` varchar(222) NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `agama` varchar(222) NOT NULL,
  `pendidikan` varchar(222) NOT NULL,
  `status_perkawinan` varchar(222) NOT NULL,
  `nik` varchar(222) NOT NULL,
  `suku` varchar(222) NOT NULL,
  `nama_penanggung_jawab` varchar(222) NOT NULL,
  `no_hp_penanggung_jawab` varchar(222) NOT NULL,
  `jaminan_kesehatan` varchar(222) NOT NULL,
  `jam_pendaftaran` char(55) NOT NULL,
  `jam_selesai` varchar(222) NOT NULL,
  `lama_pendaftaran` char(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`no_pendaftaran`, `nama`, `jenis_kelamin`, `tgl_lahir`, `gol_darah`, `no_bpjs`, `no_telp`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `tgl_daftar`, `agama`, `pendidikan`, `status_perkawinan`, `nik`, `suku`, `nama_penanggung_jawab`, `no_hp_penanggung_jawab`, `jaminan_kesehatan`, `jam_pendaftaran`, `jam_selesai`, `lama_pendaftaran`) VALUES
(1, 'Achmad Hidayat', 'L', '1986-10-29', 'A', '010601000232', '08132586144', 'Komp Perkantoran X jl medan merdeka', 'Matiti I', 'Doloksanggul', 'Humbang Hasundutan', '2019-10-09 17:00:00', 'Katolik', 'D1/D3', 'Menikah', '1212075466320001', 'Batak', 'Tiurlan M', '025652410023', 'JKN BPI', '11:29:29', '11:31:50', '2'),
(2, 'Agustina Siregar', 'P', '1979-05-26', 'A', '010601000244', '0812586410144', 'Jl Medan Mawar Julu', 'Matiti', 'Doloksanggul', 'Humbang Hasundutan', '2019-10-09 17:00:00', 'Islam', 'S1', 'Menikah', '12110254663278541', 'Batak', 'Manorang M', '025652410077', 'JKN Non PBI', '11:32:01', '11:33:37', '1'),
(3, 'abet', 'L', '1987-10-10', 'B', '00001111', '081234567890', 'Pasaribu', 'Pasaribu', 'Doloksanggul', 'Humbang Hasundutan', '2019-10-14 17:00:00', 'Kristen', 'SD', 'Menikah', '123', 'Batak', 'Polan', '081234567890', 'JKN PBI', '08:36:07', '8:38:15', '2'),
(4, 'Deddy Situmorang', 'L', '1979-12-13', 'O', '1234', '082160565656', 'Pasaribu', 'Pasaribu', 'Doloksanggul', 'Humbang Hasundutan', '2019-10-15 17:00:00', 'Kristen', 'S2/S3', 'Menikah', '123', 'Batak', 'Deddy Situmorang', '082160565656', 'JKN PBI', '14:47:21', '14:49:43', '2'),
(5, 'Sariaman Mataniari', 'L', '1965-05-10', 'AB', '12345', '087766554433', 'Pasaribu', 'Pasaribu', 'Dolok Sanggul', 'Humbang Hasundutan', '2019-10-16 17:00:00', 'Penghayat', 'S2/S3', 'Belum menikah', '123', 'Batak', 'Riyan Sihombing', '081200998877', 'JKN PBI', '10:18:22', '10:19:47', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(222) NOT NULL,
  `nama` varchar(222) NOT NULL,
  `jabatan` varchar(222) NOT NULL,
  `nip` char(50) NOT NULL,
  `pangkat` varchar(222) NOT NULL,
  `pass_cetak` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `email`, `password`, `nama`, `jabatan`, `nip`, `pangkat`, `pass_cetak`) VALUES
(1, 'humbahaskab@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 'Administratornya', '000', '-', '123456'),
(19, 'tiar@humbanghasundutankab.go.id', 'e10adc3949ba59abbe56e057f20f883e', 'dr. Tiar Lusiana Sihombing', '', '19800422 200904 2 002', 'Penata, III/c', ''),
(20, 'agustina@humbanghasundutankab.go.id', 'e10adc3949ba59abbe56e057f20f883e', 'Agustina Siregar', '', '19820823 200604 2 005', 'Penata Muda Tk I, III/b', ''),
(21, 'almarita@humbanghasundutankab.go.id', 'e10adc3949ba59abbe56e057f20f883e', 'Almarita Purba, Am. Keb', '', '19690928 199303 2 004', 'Penata Tk. I, III/d', ''),
(22, 'aber@humbanghasundutankab.go.id', 'e10adc3949ba59abbe56e057f20f883e', 'Aber Lumban Gaol', '', '19620508 198602 1 001', 'Penata Muda Tk. I, III/b', '123456'),
(23, 'Adelina@humbanghasundutankab.go.id', 'e10adc3949ba59abbe56e057f20f883e', 'Adelina Br Sinukaban, A.Md.Keb', '', '19871005 201101 2 015', 'Pengatur, II/c', ''),
(24, 'adnan@humbanghasundutankab.go.id', 'e10adc3949ba59abbe56e057f20f883e', 'Adnan Romi Sitohang', '', '19791118 200502 1 003', 'Penata Muda, III/a', ''),
(25, 'Agust@humbanghasundutankab.go.id', 'e10adc3949ba59abbe56e057f20f883e', 'Agustaria Perangin-Angin', '', '19800827 201001 2 011', 'Pengatur, II/c', ''),
(26, 'panjaitan@humbanghasundutankab.go.id', 'e10adc3949ba59abbe56e057f20f883e', 'Agust Panjaitan', '', '19600810 198411 1 001', 'Penata Muda Tk. I, III/b', ''),
(27, 'Alex@humbanghasundutankab.go.id', 'e10adc3949ba59abbe56e057f20f883e', 'Alexs M Lubis', '', '19770520 200904 1 001', 'Pengatur Tk. I, II/d', ''),
(28, 'Anas@humbanghasundutankab.go.id', 'e10adc3949ba59abbe56e057f20f883e', 'Anastasia Panjaitan, S.Pd', '', '19800111 200502 2 002', 'Penata Muda, III/a', ''),
(29, 'chandra@humbanghasundutankab.go.id', 'e10adc3949ba59abbe56e057f20f883e', 'Chandra Silaban', '', '19800827 201001 2 011', 'Penata Muda, III/a', ''),
(30, 'asdkasdkasd@adsda', 'e10adc3949ba59abbe56e057f20f883e', 'asb', '', 'askdaskl', 'ajkdasdkas', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemeriksaan_fisik`
--

CREATE TABLE `tbl_pemeriksaan_fisik` (
  `id_pemeriksaan` int(11) NOT NULL,
  `id_kunjungan` int(11) NOT NULL,
  `keadaan_umum` text NOT NULL,
  `kepala_leher` text NOT NULL,
  `thorax` text NOT NULL,
  `abdomen` text NOT NULL,
  `extremitas` text NOT NULL,
  `status_neorologis` text NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poli`
--

CREATE TABLE `tbl_poli` (
  `id_poli` int(11) NOT NULL,
  `poli` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_poli`
--

INSERT INTO `tbl_poli` (`id_poli`, `poli`) VALUES
(1, 'POLI GIGI'),
(2, 'POLI IMUNISASI'),
(3, 'POLI KB'),
(4, 'POLI KIA'),
(6, 'POLI LANSIA'),
(7, 'POLI MTBS'),
(8, 'POLI UGD'),
(9, 'POLI UMUM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rawat_inap`
--

CREATE TABLE `tbl_rawat_inap` (
  `id` int(11) NOT NULL,
  `id_kunjungan` int(11) NOT NULL,
  `riwayat_alergi` text NOT NULL,
  `rencana_edukasi` text NOT NULL,
  `ringkasan_pulang` text NOT NULL,
  `rencana_rujukan` text NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `rencana_terapi_ranap` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rawat_inap`
--

INSERT INTO `tbl_rawat_inap` (`id`, `id_kunjungan`, `riwayat_alergi`, `rencana_edukasi`, `ringkasan_pulang`, `rencana_rujukan`, `id_pegawai`, `rencana_terapi_ranap`) VALUES
(1, 17, 'test', 'test', '3 hari kedepan', 'test', 27, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_relasi_dokter`
--

CREATE TABLE `tbl_relasi_dokter` (
  `id_pegawai` int(11) NOT NULL,
  `id_spesialis` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_relasi_dokter`
--

INSERT INTO `tbl_relasi_dokter` (`id_pegawai`, `id_spesialis`, `id`, `tgl`) VALUES
(19, 6, 18, '2019-10-10 03:27:19'),
(29, 2, 19, '2019-10-10 04:52:42'),
(29, 1, 20, '2019-10-10 04:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_relasi_farmasi`
--

CREATE TABLE `tbl_relasi_farmasi` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `jabatan_farmasi` varchar(222) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_relasi_farmasi`
--

INSERT INTO `tbl_relasi_farmasi` (`id`, `id_pegawai`, `jabatan_farmasi`, `tgl`) VALUES
(3, 20, 'Farmasi', '2019-10-10 03:43:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_relasi_gizi`
--

CREATE TABLE `tbl_relasi_gizi` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `jabatan_gizi` varchar(222) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_relasi_gizi`
--

INSERT INTO `tbl_relasi_gizi` (`id`, `id_pegawai`, `jabatan_gizi`, `tgl`) VALUES
(4, 27, 'Gizi', '2019-10-18 03:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_relasi_jabatan`
--

CREATE TABLE `tbl_relasi_jabatan` (
  `id_pegawai` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_relasi_jabatan`
--

INSERT INTO `tbl_relasi_jabatan` (`id_pegawai`, `id_jabatan`, `id`, `tgl`) VALUES
(19, 3, 5, '2019-10-10 03:27:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_relasi_konseling`
--

CREATE TABLE `tbl_relasi_konseling` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `jabatan_konseling` varchar(222) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_relasi_konseling`
--

INSERT INTO `tbl_relasi_konseling` (`id`, `id_pegawai`, `jabatan_konseling`, `tgl`) VALUES
(3, 24, 'Konselor', '2019-10-10 03:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_relasi_lab`
--

CREATE TABLE `tbl_relasi_lab` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `jabatan_lab` varchar(222) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_relasi_lab`
--

INSERT INTO `tbl_relasi_lab` (`id`, `id_pegawai`, `jabatan_lab`, `tgl`) VALUES
(4, 21, 'Laboran', '2019-10-10 03:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_relasi_perawat`
--

CREATE TABLE `tbl_relasi_perawat` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `jabatan_perawat` varchar(222) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_relasi_perawat`
--

INSERT INTO `tbl_relasi_perawat` (`id`, `id_pegawai`, `jabatan_perawat`, `tgl`) VALUES
(4, 22, 'Perawat', '2019-10-10 03:55:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_relasi_rawatinap`
--

CREATE TABLE `tbl_relasi_rawatinap` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `jabatan_rawatinap` varchar(222) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_relasi_rawatinap`
--

INSERT INTO `tbl_relasi_rawatinap` (`id`, `id_pegawai`, `jabatan_rawatinap`, `tgl`) VALUES
(3, 27, 'Rawat Inap', '2019-10-10 03:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_relasi_rujukan`
--

CREATE TABLE `tbl_relasi_rujukan` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `jabatan_rujukan` varchar(222) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_relasi_rujukan`
--

INSERT INTO `tbl_relasi_rujukan` (`id`, `id_pegawai`, `jabatan_rujukan`, `tgl`) VALUES
(3, 25, 'Rujukan', '2019-10-10 03:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_relasi_staff`
--

CREATE TABLE `tbl_relasi_staff` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `jabatan_staff` varchar(222) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_relasi_staff`
--

INSERT INTO `tbl_relasi_staff` (`id`, `id_pegawai`, `jabatan_staff`, `tgl`) VALUES
(4, 26, 'Staff penerima', '2019-10-18 03:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_relasi_unit`
--

CREATE TABLE `tbl_relasi_unit` (
  `id_relasi_unit` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nama_unit` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_relasi_unit`
--

INSERT INTO `tbl_relasi_unit` (`id_relasi_unit`, `id_kecamatan`, `id_desa`, `id_pegawai`, `nama_unit`) VALUES
(2, 2, 1, 4, 'Sosor Tolong'),
(6, 1, 4, 23, 'UNIT Parsaoran');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resep`
--

CREATE TABLE `tbl_resep` (
  `id` int(11) NOT NULL,
  `no_pendaftaran` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jenis_obat` varchar(222) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(222) NOT NULL,
  `aturan_pakai` text NOT NULL,
  `waktu_konsumsi` varchar(222) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_kunjungan` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status_cetak` enum('0','1') NOT NULL,
  `pulv` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_resep`
--

INSERT INTO `tbl_resep` (`id`, `no_pendaftaran`, `id_obat`, `jenis_obat`, `jumlah`, `satuan`, `aturan_pakai`, `waktu_konsumsi`, `tgl`, `id_kunjungan`, `keterangan`, `status_cetak`, `pulv`) VALUES
(1, 2, 4, '', 10, '', '3x1 Sehari', 'Sebelum Makan', '2019-10-10 04:39:50', 1, 'wajib dimakan', '0', ''),
(2, 2, 7, '', 10, '', '-', '-', '2019-10-10 04:39:50', 1, '-', '0', ''),
(3, 2, 9, '', 10, '', '-', '-', '2019-10-10 04:39:50', 1, '-', '0', ''),
(4, 2, 1, '', 10, '', '3x1 Sehari', 'Sebelum Makan', '2019-10-10 04:56:16', 2, 'wajib', '0', ''),
(5, 1, 2, '', 100, '', '2x1 Sehari', 'Sesudah Makan', '2019-10-10 05:03:59', 4, 'harus habis', '0', ''),
(6, 1, 5, '', 10, '', '2x1 Sehari', 'Sebelum Makan', '2019-10-10 07:31:45', 5, 'test', '0', ''),
(7, 1, 2, '', 10, '', '3x1 Sehari', 'Sebelum Makan', '2019-10-10 07:43:56', 6, 'wajib dimakan', '0', ''),
(8, 2, 7, '', 10, '', '-', '-', '2019-10-10 08:03:29', 3, '-', '0', ''),
(9, 1, 3, '', 100, '', '3x1 Sehari', 'Sesudah Makan', '2019-10-11 02:20:00', 7, '-', '0', ''),
(10, 3, 3, '', 10, '', '2x1 Sehari', 'Sesudah Makan', '2019-10-15 01:41:40', 9, 'Wajib Dimakan', '0', ''),
(11, 3, 1, '', 10, '', '3x1 Sehari', 'Sesudah Makan', '2019-10-15 02:35:12', 11, 'Dimakan Bila demam', '0', ''),
(12, 3, 3, '', 10, '', '3x1 Sehari', 'Sesudah Makan', '2019-10-15 02:35:12', 11, 'sampai habis', '0', ''),
(13, 3, 4, '', 12, '', '3x1 Sehari', 'Sebelum Makan', '2019-10-15 07:36:47', 13, '100 saja sdh cukup', '0', ''),
(14, 0, 3, '', 90, '', '3x1 Sehari', 'Sebelum Makan', '2019-10-16 03:41:41', 0, '0', '0', ''),
(15, 4, 4, '', 10, '', '3x1 Sehari', 'Sesudah Makan', '2019-10-16 07:57:47', 15, 'wajib dimakan', '0', ''),
(16, 4, 3, '', 10, '', '3x1 Sehari', 'Sesudah Makan', '2019-10-16 08:11:04', 16, 'wajib dimakan bersama nasi', '0', ''),
(17, 4, 1, '', 0, '', '', '', '2019-10-16 08:19:03', 17, '', '0', ''),
(18, 5, 3, '', 12, '', '3x1 Sehari', 'Sebelum Makan', '2019-10-17 03:23:49', 21, '-', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resep_obat_lain`
--

CREATE TABLE `tbl_resep_obat_lain` (
  `id` int(11) NOT NULL,
  `id_kunjungan` int(11) NOT NULL,
  `nama_obat_lain` varchar(222) NOT NULL,
  `satuan_obat_lain` varchar(222) NOT NULL,
  `jumlah_obat_lain` varchar(222) NOT NULL,
  `aturan_pakai_obat_lain` varchar(222) NOT NULL,
  `waktu_konsumsi_obat_lain` varchar(222) NOT NULL,
  `keterangan_obat_lain` varchar(222) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_resep_obat_lain`
--

INSERT INTO `tbl_resep_obat_lain` (`id`, `id_kunjungan`, `nama_obat_lain`, `satuan_obat_lain`, `jumlah_obat_lain`, `aturan_pakai_obat_lain`, `waktu_konsumsi_obat_lain`, `keterangan_obat_lain`, `tgl`) VALUES
(1, 1, 'Panadol', 'Tablet', '10', '3x1 Sehari', 'Sebelum Makan', 'Wajib', '2019-10-10 04:39:50'),
(2, 11, 'Imunos', 'Tablet', '10', '1x1 Sehari', 'Sesudah Makan', 'dimakan sampai habis', '2019-10-15 02:35:14'),
(3, 16, 'Cefixime', 'Tablet', '10', '4 X 1 Hari', 'Suka Hati', 'Wajib Habis ya', '2019-10-16 08:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resep_racikan`
--

CREATE TABLE `tbl_resep_racikan` (
  `id` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `aturan_pakai` text NOT NULL,
  `waktu_konsumsi` varchar(222) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_kunjungan` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status_cetak` enum('0','1') NOT NULL,
  `pulv` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_resep_racikan`
--

INSERT INTO `tbl_resep_racikan` (`id`, `id_obat`, `jumlah`, `aturan_pakai`, `waktu_konsumsi`, `tgl`, `id_kunjungan`, `keterangan`, `status_cetak`, `pulv`) VALUES
(1, 1, 100, '3x1 Sehari', 'Sesudah Makan', '2019-10-10 04:39:50', 1, 'Wajib', '0', '10 bungkus PULV'),
(2, 2, 10, '3x1 Sehari', 'Sesudah Makan', '2019-10-10 04:39:50', 1, 'Wajib', '0', '10 bungkus PULV'),
(3, 3, 13, '3x1 Sehari', 'Sesudah Makan', '2019-10-10 04:39:50', 1, 'Wajib', '0', '10 bungkus PULV'),
(4, 1, 2, '3x1 Sehari', 'Sebelum Makan', '2019-10-15 02:35:12', 11, 'wajib', '0', '10 bungkus PULV'),
(5, 2, 3, '3x1 Sehari', 'Sebelum Makan', '2019-10-15 02:35:12', 11, 'wajib', '0', '10 bungkus PULV'),
(6, 4, 4, '3x1 Sehari', 'Sebelum Makan', '2019-10-15 02:35:12', 11, 'wajib', '0', '10 bungkus PULV'),
(7, 1, 10, '3x1 Sehari', 'Sesudah Makan', '2019-10-16 08:11:04', 16, 'wajib dimakan', '0', '3 bungkus'),
(8, 2, 15, '3x1 Sehari', 'Sesudah Makan', '2019-10-16 08:11:04', 16, 'wajib dimakan', '0', '3 bungkus'),
(9, 3, 15, '3x1 Sehari', 'Sesudah Makan', '2019-10-16 08:11:04', 16, 'wajib dimakan', '0', '3 bungkus');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_timeline`
--

CREATE TABLE `tbl_timeline` (
  `id` int(11) NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `no_pendaftaran` varchar(55) NOT NULL,
  `lama_pemeriksaan` char(55) NOT NULL,
  `id_kunjungan` int(11) NOT NULL,
  `dari` int(11) NOT NULL,
  `ke` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_timeline`
--

INSERT INTO `tbl_timeline` (`id`, `tgl_mulai`, `tgl_selesai`, `no_pendaftaran`, `lama_pemeriksaan`, `id_kunjungan`, `dari`, `ke`) VALUES
(1, '2019-10-10 11:35:00', '2019-10-10 11:35:38', '2', '0', 1, 1, 2),
(2, '2019-10-10 11:35:00', '2019-10-10 11:39:47', '00002', '4', 1, 2, 7),
(3, '0000-00-00 00:00:00', '2019-10-10 11:44:42', '00002', '0', 1, 7, 11),
(4, '2019-10-10 11:48:00', '2019-10-10 11:48:57', '2', '0', 2, 1, 2),
(5, '2019-10-10 11:50:00', '2019-10-10 11:53:10', '00002', '3', 2, 2, 5),
(6, '2019-10-10 11:54:00', '2019-10-10 11:56:13', '00002', '2', 2, 2, 4),
(7, '2019-10-10 11:56:00', '2019-10-10 11:57:02', '2', '1', 3, 1, 2),
(8, '2019-10-10 11:57:00', '2019-10-10 11:57:52', '00002', '0', 3, 2, 4),
(9, '2019-10-10 11:59:00', '2019-10-10 11:59:32', '1', '0', 4, 1, 2),
(10, '2019-10-10 11:59:00', '2019-10-10 12:00:24', '00001', '1', 4, 2, 4),
(11, '2019-10-10 12:00:24', '2019-10-10 12:01:29', '00001', '1', 4, 4, 2),
(12, '2019-10-10 12:02:00', '2019-10-10 12:03:58', '00001', '1', 4, 2, 8),
(13, '2019-10-10 12:03:58', '2019-10-10 12:05:42', '00001', '1', 4, 8, 11),
(14, '2019-10-10 14:29:00', '2019-10-10 14:29:56', '1', '', 5, 1, 2),
(15, '2019-10-10 14:30:00', '2019-10-10 14:31:42', '00001', '', 5, 2, 10),
(16, '2019-10-10 14:31:42', '2019-10-10 14:36:50', '00001', '5', 5, 10, 11),
(17, '2019-10-10 14:36:50', '2019-10-10 14:38:00', '00001', '1', 5, 10, 11),
(18, '2019-10-10 14:42:00', '2019-10-10 14:42:22', '1', '', 6, 1, 2),
(19, '2019-10-10 14:42:00', '2019-10-10 14:43:54', '00001', '', 6, 2, 10),
(20, '2019-10-10 14:43:54', '2019-10-10 14:44:18', '00001', '0', 6, 10, 11),
(21, '2019-10-10 11:57:52', '2019-10-10 15:02:43', '00002', '184', 3, 4, 2),
(22, '2019-10-10 15:02:00', '2019-10-10 15:03:27', '00002', '', 3, 2, 7),
(23, '2019-10-10 11:56:13', '2019-10-10 15:04:03', '00002', '187', 2, 4, 2),
(24, '0000-00-00 00:00:00', '2019-10-10 15:04:14', '00002', '0', 3, 7, 11),
(25, '2019-10-10 15:04:00', '2019-10-10 15:04:46', '00002', '', 2, 2, 7),
(26, '0000-00-00 00:00:00', '2019-10-10 15:04:59', '00002', '0', 2, 7, 11),
(27, '2019-10-11 09:17:00', '2019-10-11 09:17:28', '1', '0', 7, 1, 2),
(28, '2019-10-11 09:17:00', '2019-10-11 09:19:58', '00001', '2', 7, 2, 7),
(29, '0000-00-00 00:00:00', '2019-10-11 09:21:12', '00001', '0', 7, 7, 11),
(30, '2019-10-14 08:24:00', '2019-10-14 08:24:43', '1', '0', 8, 1, 2),
(31, '2019-10-14 08:25:00', '2019-10-14 08:28:35', '00001', '3', 8, 2, 7),
(32, '0000-00-00 00:00:00', '2019-10-14 08:43:23', '00001', '0', 8, 7, 11),
(33, '2019-10-15 08:38:00', '2019-10-15 08:39:14', '3', '', 9, 1, 2),
(34, '2019-10-15 08:39:00', '2019-10-15 08:41:38', '00003', '', 9, 2, 7),
(35, '2019-10-15 08:46:00', '2019-10-15 08:46:37', '3', '', 10, 1, 2),
(36, '2019-10-15 09:20:00', '2019-10-15 09:21:16', '3', '', 11, 1, 2),
(37, '2019-10-15 09:21:00', '2019-10-15 09:24:47', '00003', '', 11, 2, 3),
(38, '2019-10-15 09:24:47', '2019-10-15 09:27:28', '00003', 'NaN', 11, 3, 2),
(39, '2019-10-15 09:28:00', '2019-10-15 09:35:09', '00003', '', 11, 2, 7),
(40, '0000-00-00 00:00:00', '2019-10-15 09:36:29', '00003', '0', 11, 7, 11),
(41, '2019-10-15 09:46:00', '2019-10-15 09:47:51', '00003', '', 10, 2, 5),
(42, '2019-10-15 09:48:00', '2019-10-15 09:50:15', '00003', '', 10, 2, 7),
(43, '2019-10-15 09:54:00', '2019-10-15 09:54:47', '3', '', 12, 1, 2),
(44, '0000-00-00 00:00:00', '2019-10-15 14:24:48', '00003', '0', 10, 7, 11),
(45, '0000-00-00 00:00:00', '2019-10-15 14:27:11', '00003', '0', 9, 7, 11),
(46, '2019-10-15 14:35:00', '2019-10-15 14:35:32', '3', '0', 13, 1, 2),
(47, '2019-10-15 14:35:00', '2019-10-15 14:36:43', '00003', '1', 13, 2, 7),
(48, '0000-00-00 00:00:00', '2019-10-15 14:37:39', '00003', '0', 13, 7, 11),
(49, '2019-10-16 10:40:00', '2019-10-16 10:40:40', '00000', '0', 0, 2, 7),
(50, '2019-10-16 10:40:00', '2019-10-16 10:41:39', '00000', '1', 0, 2, 7),
(51, '2019-10-16 13:59:00', '2019-10-16 13:59:18', '3', '0', 14, 1, 2),
(52, '2019-10-16 14:50:00', '2019-10-16 14:50:59', '4', '', 15, 1, 2),
(53, '2019-10-16 14:53:00', '2019-10-16 14:57:36', '00004', '4', 15, 2, 7),
(54, '0000-00-00 00:00:00', '2019-10-16 14:59:24', '00004', '0', 15, 7, 11),
(55, '2019-10-16 15:00:00', '2019-10-16 15:00:38', '4', '', 16, 1, 2),
(56, '2019-10-16 15:01:00', '2019-10-16 15:02:14', '00004', '1', 16, 2, 3),
(57, '2019-10-16 15:02:14', '2019-10-16 15:03:53', '00004', '1', 16, 3, 2),
(58, '2019-10-16 15:04:00', '2019-10-16 15:05:16', '00004', '1', 16, 2, 5),
(59, '2019-10-16 15:06:00', '2019-10-16 15:10:53', '00004', '4', 16, 2, 8),
(60, '2019-10-16 15:10:53', '2019-10-16 15:11:59', '00004', '1', 16, 8, 11),
(61, '2019-10-16 15:16:00', '2019-10-16 15:16:59', '4', '', 17, 1, 2),
(62, '2019-10-16 15:17:00', '2019-10-16 15:18:51', '00004', '', 17, 2, 9),
(63, '2019-10-16 15:18:51', '2019-10-16 15:21:59', '00004', '3', 17, 9, 11),
(64, '2019-10-16 15:23:00', '2019-10-16 15:23:38', '4', '0', 18, 1, 2),
(65, '2019-10-16 15:26:00', '2019-10-16 15:26:57', '4', '0', 19, 1, 2),
(66, '2019-10-16 15:25:00', '2019-10-16 15:28:09', '4', '3', 20, 1, 2),
(67, '2019-10-16 15:28:00', '2019-10-16 15:30:09', '00004', '2', 20, 2, 7),
(68, '2019-10-17 10:20:00', '2019-10-17 10:21:20', '5', '1', 21, 1, 2),
(69, '2019-10-17 10:22:00', '2019-10-17 10:23:46', '00005', '1', 21, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_timeline_master`
--

CREATE TABLE `tbl_timeline_master` (
  `kode` int(11) NOT NULL,
  `desc_timeline` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_timeline_master`
--

INSERT INTO `tbl_timeline_master` (`kode`, `desc_timeline`) VALUES
(1, 'Keluhan Utama'),
(2, 'Ruangan/Poli'),
(3, 'Laboratorium'),
(4, 'Ruangan Gizi'),
(5, 'Rujukan Internal'),
(6, 'Resep Dokter'),
(7, 'Farmasi'),
(8, 'Ruang Konseling'),
(9, 'Rawat Inap'),
(10, 'Rujukan Eksternal'),
(11, 'Selesai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_gizi`
--
ALTER TABLE `master_gizi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_lab`
--
ALTER TABLE `master_lab`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indexes for table `master_rawat_inap`
--
ALTER TABLE `master_rawat_inap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_ruang_konseling`
--
ALTER TABLE `master_ruang_konseling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_app`
--
ALTER TABLE `tbl_app`
  ADD PRIMARY KEY (`id_app`);

--
-- Indexes for table `tbl_desa`
--
ALTER TABLE `tbl_desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `tbl_diagnosa`
--
ALTER TABLE `tbl_diagnosa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_foto`
--
ALTER TABLE `tbl_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `tbl_keluhan_umum`
--
ALTER TABLE `tbl_keluhan_umum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_konseling`
--
ALTER TABLE `tbl_konseling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kunjungan`
--
ALTER TABLE `tbl_kunjungan`
  ADD PRIMARY KEY (`id_kunjungan`);

--
-- Indexes for table `tbl_lab`
--
ALTER TABLE `tbl_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_master_diagnosa`
--
ALTER TABLE `tbl_master_diagnosa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_master_diagnosa_perawat`
--
ALTER TABLE `tbl_master_diagnosa_perawat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tbl_obat_keluar`
--
ALTER TABLE `tbl_obat_keluar`
  ADD PRIMARY KEY (`id_obat_keluar`);

--
-- Indexes for table `tbl_obat_masuk`
--
ALTER TABLE `tbl_obat_masuk`
  ADD PRIMARY KEY (`id_obat_masuk`);

--
-- Indexes for table `tbl_obat_permintaan`
--
ALTER TABLE `tbl_obat_permintaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`no_pendaftaran`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tbl_pemeriksaan_fisik`
--
ALTER TABLE `tbl_pemeriksaan_fisik`
  ADD PRIMARY KEY (`id_pemeriksaan`);

--
-- Indexes for table `tbl_poli`
--
ALTER TABLE `tbl_poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `tbl_rawat_inap`
--
ALTER TABLE `tbl_rawat_inap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_relasi_dokter`
--
ALTER TABLE `tbl_relasi_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_relasi_farmasi`
--
ALTER TABLE `tbl_relasi_farmasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_relasi_gizi`
--
ALTER TABLE `tbl_relasi_gizi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_relasi_jabatan`
--
ALTER TABLE `tbl_relasi_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_relasi_konseling`
--
ALTER TABLE `tbl_relasi_konseling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_relasi_lab`
--
ALTER TABLE `tbl_relasi_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_relasi_perawat`
--
ALTER TABLE `tbl_relasi_perawat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_relasi_rawatinap`
--
ALTER TABLE `tbl_relasi_rawatinap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_relasi_rujukan`
--
ALTER TABLE `tbl_relasi_rujukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_relasi_staff`
--
ALTER TABLE `tbl_relasi_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_relasi_unit`
--
ALTER TABLE `tbl_relasi_unit`
  ADD PRIMARY KEY (`id_relasi_unit`);

--
-- Indexes for table `tbl_resep`
--
ALTER TABLE `tbl_resep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_resep_obat_lain`
--
ALTER TABLE `tbl_resep_obat_lain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_resep_racikan`
--
ALTER TABLE `tbl_resep_racikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_timeline`
--
ALTER TABLE `tbl_timeline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_timeline_master`
--
ALTER TABLE `tbl_timeline_master`
  ADD PRIMARY KEY (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_gizi`
--
ALTER TABLE `master_gizi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_lab`
--
ALTER TABLE `master_lab`
  MODIFY `id_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_rawat_inap`
--
ALTER TABLE `master_rawat_inap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_ruang_konseling`
--
ALTER TABLE `master_ruang_konseling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_app`
--
ALTER TABLE `tbl_app`
  MODIFY `id_app` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_desa`
--
ALTER TABLE `tbl_desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_diagnosa`
--
ALTER TABLE `tbl_diagnosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_foto`
--
ALTER TABLE `tbl_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_keluhan_umum`
--
ALTER TABLE `tbl_keluhan_umum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_konseling`
--
ALTER TABLE `tbl_konseling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kunjungan`
--
ALTER TABLE `tbl_kunjungan`
  MODIFY `id_kunjungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_lab`
--
ALTER TABLE `tbl_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_master_diagnosa`
--
ALTER TABLE `tbl_master_diagnosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=681;

--
-- AUTO_INCREMENT for table `tbl_master_diagnosa_perawat`
--
ALTER TABLE `tbl_master_diagnosa_perawat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_obat_keluar`
--
ALTER TABLE `tbl_obat_keluar`
  MODIFY `id_obat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_obat_masuk`
--
ALTER TABLE `tbl_obat_masuk`
  MODIFY `id_obat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_obat_permintaan`
--
ALTER TABLE `tbl_obat_permintaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  MODIFY `no_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_pemeriksaan_fisik`
--
ALTER TABLE `tbl_pemeriksaan_fisik`
  MODIFY `id_pemeriksaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_poli`
--
ALTER TABLE `tbl_poli`
  MODIFY `id_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_rawat_inap`
--
ALTER TABLE `tbl_rawat_inap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_relasi_dokter`
--
ALTER TABLE `tbl_relasi_dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_relasi_farmasi`
--
ALTER TABLE `tbl_relasi_farmasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_relasi_gizi`
--
ALTER TABLE `tbl_relasi_gizi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_relasi_jabatan`
--
ALTER TABLE `tbl_relasi_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_relasi_konseling`
--
ALTER TABLE `tbl_relasi_konseling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_relasi_lab`
--
ALTER TABLE `tbl_relasi_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_relasi_perawat`
--
ALTER TABLE `tbl_relasi_perawat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_relasi_rawatinap`
--
ALTER TABLE `tbl_relasi_rawatinap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_relasi_rujukan`
--
ALTER TABLE `tbl_relasi_rujukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_relasi_staff`
--
ALTER TABLE `tbl_relasi_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_relasi_unit`
--
ALTER TABLE `tbl_relasi_unit`
  MODIFY `id_relasi_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_resep`
--
ALTER TABLE `tbl_resep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_resep_obat_lain`
--
ALTER TABLE `tbl_resep_obat_lain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_resep_racikan`
--
ALTER TABLE `tbl_resep_racikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_timeline`
--
ALTER TABLE `tbl_timeline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tbl_timeline_master`
--
ALTER TABLE `tbl_timeline_master`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
