-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2020 at 08:33 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `kode_alternatif` varchar(32) NOT NULL,
  `urutan` int(11) NOT NULL,
  `jumlah_nilai_murni` float(7,3) NOT NULL,
  `jumlah_jarak_solusi_positif` float(7,4) NOT NULL,
  `jumlah_jarak_solusi_negatif` float(7,4) NOT NULL,
  `preferensi` float(7,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`kode_alternatif`, `urutan`, `jumlah_nilai_murni`, `jumlah_jarak_solusi_positif`, `jumlah_jarak_solusi_negatif`, `preferensi`) VALUES
('A1', 1, 57.000, 0.0983, 0.0000, 0.0000),
('A2', 2, 84.500, 0.0373, 0.0638, 0.6311),
('A3', 3, 86.000, 0.0424, 0.0686, 0.6180),
('A4', 4, 0.000, 0.0000, 0.0000, 0.0000),
('A6', 6, 100.000, 0.0000, 0.0983, 1.0000),
('A7', 7, 100.000, 0.0000, 0.0983, 1.0000);

-- --------------------------------------------------------

--
-- Table structure for table `alternatif_details`
--

CREATE TABLE `alternatif_details` (
  `id` int(11) NOT NULL,
  `kode_alternatif` varchar(32) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `singkatan` varchar(50) NOT NULL,
  `status` enum('Sudah Dievaluasi','Belum Dievaluasi') NOT NULL DEFAULT 'Belum Dievaluasi',
  `waktu_penilaian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif_details`
--

INSERT INTO `alternatif_details` (`id`, `kode_alternatif`, `nama`, `singkatan`, `status`, `waktu_penilaian`, `id_user`) VALUES
(1, 'A1', 'Enclosure', 'Enclosure', 'Sudah Dievaluasi', '2020-02-29 06:06:38', 23),
(2, 'A2', ' Journal of Coastal Development', 'Coastdev', 'Sudah Dievaluasi', '2020-02-29 06:12:17', 23),
(3, 'A3', 'Transmisi', 'Transmisi', 'Sudah Dievaluasi', '2020-02-29 13:09:42', 23),
(4, 'A4', 'Jurnal Sains dan Matematika', 'JSM', 'Belum Dievaluasi', '2020-02-29 13:06:29', 0),
(6, 'A6', 'Jurnal Ilmu Politik', 'JIP', 'Sudah Dievaluasi', '2020-03-23 05:08:18', 23),
(7, 'A7', 'Jurnal Ilmu Komunikasi', 'Interaksi', 'Sudah Dievaluasi', '2020-03-24 04:03:24', 23);

-- --------------------------------------------------------

--
-- Table structure for table `analisa_kriteria`
--

CREATE TABLE `analisa_kriteria` (
  `id_analisa` varchar(20) NOT NULL,
  `kriteria_pertama` varchar(10) NOT NULL,
  `kriteria_kedua` varchar(10) DEFAULT NULL,
  `nilai_analisa_kriteria` float(7,3) NOT NULL DEFAULT '1.000',
  `nilai_dependence_kriteria` float(7,3) NOT NULL,
  `normalisasi_analisa_kriteria` float(7,3) NOT NULL DEFAULT '0.000',
  `normalisasi_dependence_kriteria` float(7,3) NOT NULL,
  `bobot_dependence` float(7,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisa_kriteria`
--

INSERT INTO `analisa_kriteria` (`id_analisa`, `kriteria_pertama`, `kriteria_kedua`, `nilai_analisa_kriteria`, `nilai_dependence_kriteria`, `normalisasi_analisa_kriteria`, `normalisasi_dependence_kriteria`, `bobot_dependence`) VALUES
('AK1-1', 'K1', 'K1', 1.000, 1.000, 0.040, 1.000, 0.0410),
('AK1-2', 'K1', 'K2', 1.000, 0.000, 0.053, 0.000, 0.0000),
('AK1-3', 'K1', 'K3', 0.250, 0.000, 0.038, 0.000, 0.0000),
('AK1-4', 'K1', 'K4', 0.111, 0.000, 0.039, 0.000, 0.0000),
('AK1-5', 'K1', 'K5', 0.333, 0.000, 0.040, 0.000, 0.0000),
('AK1-6', 'K1', 'K6', 0.500, 0.000, 0.045, 0.000, 0.0000),
('AK1-7', 'K1', 'K7', 0.500, 0.000, 0.034, 0.000, 0.0000),
('AK1-8', 'K1', 'K8', 0.333, 0.000, 0.040, 0.000, 0.0000),
('AK2-1', 'K2', 'K1', 1.000, 0.000, 0.040, 0.000, 0.0000),
('AK2-2', 'K2', 'K2', 1.000, 1.000, 0.053, 1.000, 0.0540),
('AK2-3', 'K2', 'K3', 0.333, 0.000, 0.051, 0.000, 0.0000),
('AK2-4', 'K2', 'K4', 0.143, 0.000, 0.050, 0.000, 0.0000),
('AK2-5', 'K2', 'K5', 0.500, 0.000, 0.060, 0.000, 0.0000),
('AK2-6', 'K2', 'K6', 0.500, 0.000, 0.045, 0.000, 0.0000),
('AK2-7', 'K2', 'K7', 1.000, 0.000, 0.069, 0.000, 0.0000),
('AK2-8', 'K2', 'K8', 0.500, 0.000, 0.060, 0.000, 0.0000),
('AK3-1', 'K3', 'K1', 4.000, 0.000, 0.160, 0.000, 0.0000),
('AK3-2', 'K3', 'K2', 3.000, 0.000, 0.158, 0.000, 0.0000),
('AK3-3', 'K3', 'K3', 1.000, 1.139, 0.152, 0.804, 0.1206),
('AK3-4', 'K3', 'K4', 0.500, 0.037, 0.174, 0.031, 0.0109),
('AK3-5', 'K3', 'K5', 1.000, 0.278, 0.120, 0.216, 0.0259),
('AK3-6', 'K3', 'K6', 2.000, 0.111, 0.182, 0.095, 0.0089),
('AK3-7', 'K3', 'K7', 2.000, 0.042, 0.138, 0.037, 0.0026),
('AK3-8', 'K3', 'K8', 1.000, 0.000, 0.120, 0.000, 0.0000),
('AK4-1', 'K4', 'K1', 9.000, 0.000, 0.360, 0.000, 0.0000),
('AK4-2', 'K4', 'K2', 7.000, 0.000, 0.368, 0.000, 0.0000),
('AK4-3', 'K4', 'K3', 2.000, 0.019, 0.304, 0.013, 0.0020),
('AK4-4', 'K4', 'K4', 1.000, 1.086, 0.348, 0.907, 0.3184),
('AK4-5', 'K4', 'K5', 3.000, 0.012, 0.360, 0.009, 0.0011),
('AK4-6', 'K4', 'K6', 4.000, 0.019, 0.364, 0.016, 0.0015),
('AK4-7', 'K4', 'K7', 5.000, 0.000, 0.345, 0.000, 0.0000),
('AK4-8', 'K4', 'K8', 3.000, 0.074, 0.360, 0.069, 0.0083),
('AK5-1', 'K5', 'K1', 3.000, 0.000, 0.120, 0.000, 0.0000),
('AK5-2', 'K5', 'K2', 2.000, 0.000, 0.105, 0.000, 0.0000),
('AK5-3', 'K5', 'K3', 1.000, 0.148, 0.152, 0.104, 0.0156),
('AK5-4', 'K5', 'K4', 0.333, 0.000, 0.116, 0.000, 0.0000),
('AK5-5', 'K5', 'K5', 1.000, 1.000, 0.120, 0.775, 0.0930),
('AK5-6', 'K5', 'K6', 1.000, 0.000, 0.091, 0.000, 0.0000),
('AK5-7', 'K5', 'K7', 2.000, 0.000, 0.138, 0.000, 0.0000),
('AK5-8', 'K5', 'K8', 1.000, 0.000, 0.120, 0.000, 0.0000),
('AK6-1', 'K6', 'K1', 2.000, 0.000, 0.080, 0.000, 0.0000),
('AK6-2', 'K6', 'K2', 2.000, 0.000, 0.105, 0.000, 0.0000),
('AK6-3', 'K6', 'K3', 0.500, 0.111, 0.076, 0.078, 0.0117),
('AK6-4', 'K6', 'K4', 0.250, 0.000, 0.087, 0.000, 0.0000),
('AK6-5', 'K6', 'K5', 1.000, 0.000, 0.120, 0.000, 0.0000),
('AK6-6', 'K6', 'K6', 1.000, 1.000, 0.091, 0.853, 0.0802),
('AK6-7', 'K6', 'K7', 1.000, 0.083, 0.069, 0.074, 0.0052),
('AK6-8', 'K6', 'K8', 1.000, 0.000, 0.120, 0.000, 0.0000),
('AK7-1', 'K7', 'K1', 2.000, 0.000, 0.080, 0.000, 0.0000),
('AK7-2', 'K7', 'K2', 1.000, 0.000, 0.053, 0.000, 0.0000),
('AK7-3', 'K7', 'K3', 0.500, 0.000, 0.076, 0.000, 0.0000),
('AK7-4', 'K7', 'K4', 0.200, 0.000, 0.070, 0.000, 0.0000),
('AK7-5', 'K7', 'K5', 0.500, 0.000, 0.060, 0.000, 0.0000),
('AK7-6', 'K7', 'K6', 1.000, 0.042, 0.091, 0.036, 0.0034),
('AK7-7', 'K7', 'K7', 1.000, 1.000, 0.069, 0.889, 0.0622),
('AK7-8', 'K7', 'K8', 0.500, 0.000, 0.060, 0.000, 0.0000),
('AK8-1', 'K8', 'K1', 3.000, 0.000, 0.120, 0.000, 0.0000),
('AK8-2', 'K8', 'K2', 2.000, 0.000, 0.105, 0.000, 0.0000),
('AK8-3', 'K8', 'K3', 1.000, 0.000, 0.152, 0.000, 0.0000),
('AK8-4', 'K8', 'K4', 0.333, 0.074, 0.116, 0.062, 0.0218),
('AK8-5', 'K8', 'K5', 1.000, 0.000, 0.120, 0.000, 0.0000),
('AK8-6', 'K8', 'K6', 1.000, 0.000, 0.091, 0.000, 0.0000),
('AK8-7', 'K8', 'K7', 2.000, 0.000, 0.138, 0.000, 0.0000),
('AK8-8', 'K8', 'K8', 1.000, 1.000, 0.120, 0.931, 0.1117);

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `kode_departemen` int(50) NOT NULL,
  `kode_fakultas` int(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`kode_departemen`, `kode_fakultas`, `nama`) VALUES
(2, 1, 'Teknik Elektro'),
(3, 1, 'Teknik Komputer'),
(4, 1, 'Teknik Lingkungan'),
(5, 1, 'Teknik Sipil'),
(6, 1, 'Arsitektur'),
(7, 1, 'Teknik Mesin'),
(8, 1, 'Teknik Kimia'),
(9, 1, 'Perencanan Wilayah dan Kota'),
(10, 1, 'Teknik Industri'),
(11, 1, 'Teknik Perkapalan'),
(12, 1, 'Teknik Geologi'),
(13, 1, 'Teknik Geodesi'),
(14, 2, 'Ilmu Hukum'),
(15, 7, 'Bahasa dan Sastra Indonesia'),
(16, 7, 'Bahasa dan Sastra Inggris'),
(17, 7, 'Ilmu Sejarah'),
(18, 7, 'Ilmu Perpustakaan'),
(19, 7, 'Sastra Jepang'),
(20, 7, 'Antropologi Sosial'),
(21, 6, 'Manajemen'),
(22, 6, 'Ilmu Ekonomi dan Studi Pembangunan'),
(23, 6, 'Akuntansi'),
(24, 6, 'Ekonomi Islam'),
(25, 4, 'Administrasi Bisnis'),
(26, 4, 'Administrasi Publik'),
(27, 4, 'Ilmu Pemerintahan'),
(28, 4, 'Ilmu Komunikasi'),
(29, 4, 'Hubungan Internasional'),
(30, 11, 'Psikologi'),
(31, 5, 'Kedokteran Umum'),
(32, 5, 'Kedokteran Gigi'),
(33, 5, 'Ilmu Keperawatan'),
(34, 5, 'Ilmu Gizi'),
(35, 9, 'Peternakan'),
(36, 9, 'Teknologi Pangan'),
(37, 9, 'Agroekoteknologi'),
(38, 9, 'Agribisnis'),
(39, 10, 'Matematika'),
(40, 10, 'Biologi'),
(41, 10, 'Kimia'),
(42, 10, 'Fisika'),
(43, 10, 'Statistika'),
(44, 10, 'Informatika'),
(45, 8, 'Managemen Sumber Daya Perairan'),
(46, 8, 'Budidaya Perairan'),
(47, 8, 'Pemanfaatan Sumber Daya Perikanan'),
(48, 8, 'Ilmu Kelautan'),
(50, 8, 'Oseanografi'),
(51, 8, 'Teknologi Hasil Perikanan');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `kode_fakultas` int(32) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`kode_fakultas`, `nama`) VALUES
(1, 'Fakultas Teknik'),
(2, 'Fakultas Hukum'),
(4, 'Fakultas Ilmu Sosial dan Ilmu Politik'),
(5, 'Fakultas Kedokteran'),
(6, 'Fakultas Ekonomi dan Bisnis'),
(7, 'Fakultas Ilmu Budaya'),
(8, 'Fakultas Perikanan dan Ilmu Kelautan'),
(9, 'Fakultas Peternakan dan Pertanian'),
(10, 'Fakultas Sains dan Matematika'),
(11, 'Fakultas Psikologi'),
(12, 'Sekolah Vokasi'),
(13, 'Sekolah PascaSarjana'),
(14, 'Fakultas Kesehatan Masyarakat');

-- --------------------------------------------------------

--
-- Table structure for table `indikator`
--

CREATE TABLE `indikator` (
  `kode_indikator` varchar(32) NOT NULL,
  `kode_kriteria` varchar(32) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indikator`
--

INSERT INTO `indikator` (`kode_indikator`, `kode_kriteria`, `nama`) VALUES
('K1-1', 'K1', 'Penamaan Jurnal Ilmiah'),
('K2-1', 'K2', 'Pranata Penerbit'),
('K3-1', 'K3', 'Pelibatan Mitra Bestari'),
('K3-2', 'K3', 'Mutu Penyuntingan Substansi'),
('K3-3', 'K3', 'Kualifikasi Dewan Penyunting'),
('K3-4', 'K3', 'Petunjuk Penulisan Bagi Penulis'),
('K3-5', 'K3', 'Mutu Penyuntingan Gaya dan Format'),
('K3-6', 'K3', 'Manajemen Jurnal Ilmiah'),
('K4-1', 'K4', 'Cakupan Keilmuan'),
('K4-2', 'K4', 'Aspirasi Wawasan'),
('K4-3', 'K4', 'Orisinalitas Karya'),
('K4-4', 'K4', 'Makna Sumbangan Bagi Kemajuan Ilmu'),
('K4-5', 'K4', 'Dampak Ilmiah'),
('K4-6', 'K4', 'Nisbah Pustaka Acuan Primer Terhadap Pustaka Acuan Lainnya'),
('K4-7', 'K4', 'Derajat Kemutakhiran Pustaka Acuan'),
('K4-8', 'K4', 'Analisis dan Sintetis'),
('K4-9', 'K4', 'Penyimpulan'),
('K5-1', 'K5', 'Keefektifan Judul Artikel'),
('K5-2', 'K5', 'Pencantuman Nama Penulis dan Lembaga Penulis'),
('K5-3', 'K5', 'Abstrak'),
('K5-4', 'K5', 'Kata Kunci'),
('K5-5', 'K5', 'Sistematika Penulisan Artikel'),
('K5-6', 'K5', 'Pemanfaatan Instrumen Pendukung'),
('K5-7', 'K5', 'Sistem Pengacuan Pustaka dan Pengutipan'),
('K5-8', 'K5', 'Penyusunan Daftar Pustaka'),
('K5-9', 'K5', 'Penggunaan istilah dan kebahasaan'),
('K6-1', 'K6', 'Ukuran Bidang Tulisan'),
('K6-2', 'K6', 'Tata Letak'),
('K6-3', 'K6', 'Tipografi'),
('K6-4', 'K6', 'Resolusi Dokumen'),
('K6-5', 'K6', 'Jumlah Halaman Per Volume'),
('K6-6', 'K6', 'Desain Tampilan Laman dan Desain Sampul'),
('K7-1', 'K7', 'Jadwal Terbit'),
('K7-2', 'K7', 'Penomoran Terbitan'),
('K7-3', 'K7', 'Penomoran Halaman'),
('K7-4', 'K7', 'Indeks Tiap Volume'),
('K8-1', 'K8', 'Jumlah Kunjungan Unik ke Halaman'),
('K8-2', 'K8', 'Pencantuman di Pengindeks Internasional Bereputasi'),
('K8-3', 'K8', 'Alamat atau Identitas Unik');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `kode_jurnal` int(50) NOT NULL,
  `nomor_jurnal` int(50) DEFAULT NULL,
  `id_user` int(100) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `singkatan` varchar(30) DEFAULT NULL,
  `nama_fakultas` varchar(50) DEFAULT NULL,
  `nama_departemen` varchar(50) DEFAULT NULL,
  `nama_lab` varchar(50) DEFAULT NULL,
  `nama_lembaga` varchar(50) DEFAULT NULL,
  `sponsor` varchar(100) DEFAULT NULL,
  `e_issn` varchar(15) DEFAULT NULL,
  `p_issn` varchar(15) DEFAULT NULL,
  `english` int(10) DEFAULT NULL,
  `tahun_mulai` varchar(10) DEFAULT NULL,
  `no_terakhir` varchar(10) DEFAULT NULL,
  `terbit_terakhir` int(10) DEFAULT NULL,
  `mpgundip` int(10) DEFAULT NULL,
  `nama_portal` varchar(100) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `doi` varchar(100) DEFAULT NULL,
  `bln_terbit` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`kode_jurnal`, `nomor_jurnal`, `id_user`, `judul`, `singkatan`, `nama_fakultas`, `nama_departemen`, `nama_lab`, `nama_lembaga`, `sponsor`, `e_issn`, `p_issn`, `english`, `tahun_mulai`, `no_terakhir`, `terbit_terakhir`, `mpgundip`, `nama_portal`, `url`, `doi`, `bln_terbit`) VALUES
(1, 1, 3, ' Journal of Coastal Development', 'Coastdev', 'Fakultas Perikanan dan Ilmu Kelautan', '', '', '', 'Indonesian Assosiation of Oceanologist (ISOI)', '1410-5217', 'N/A', 2, '2012', '2', 2013, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/coastdev', 'N/A', 'Februari,Juni,Oktober'),
(2, 3, 4, 'Reaktor', 'Reaktor', 'Fakultas Teknik', 'Teknik Kimia', '', '', 'N/A', '2407-5973', '0852-0798', 2, '2012', '2', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/reaktor', '10.14710', 'Maret,Juni,September,Desember'),
(3, 4, 5, 'Indonesian Journal of Marine Sciences', 'IJMS', 'Fakultas Perikanan dan Ilmu Kelautan', 'Ilmu Kelautan', '', '', 'Association of Indonesian Coastal Management Experts (HAPPI)', '2406-7598', '0853-7291', 2, '2012', '3', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/ijms', '10.14710', 'Maret,Juni,September,Desember'),
(4, 5, 6, 'Journal of the Indonesian Tropical Animal Agriculture', 'JITAA', 'Fakultas Peternakan dan Pertanian', '', '', '', ' Indonesian Society of Animal Agriculture', '2460-6278', '2087-8273', 2, '2012', '3', 2019, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/jitaa', '10.14710', 'Maret,Juni,September,Desember'),
(5, 7, 7, 'Berkala Ilmiah Biologi', 'Bioma', 'Fakultas Sains dan Matematika', 'Biologi', '', '', 'N/A', '2598-2370', '1410-8801', 1, '2012', '2', 2017, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/bioma', 'N/A', 'Juni,Desember'),
(6, 8, 8, 'Transmisi', 'Transmisi', 'Fakultas Teknik', 'Teknik Elektro', '', '', 'N/A', '2407-6422', '1411-0814', 0, '2012', '3', 2019, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/transmisi', '10.12777 - Tidak Aktif', 'Januari,April,Juli,Oktober'),
(7, 9, 9, 'Masalah Masalah Hukum', 'MMH', 'Fakultas Hukum', 'Ilmu Hukum', '', '', 'N/A', '2527-4716', '2086-2695', 0, '2012', '3', 2019, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/mmh', '10.14710', 'Januari,April,Juli,Oktober'),
(8, 10, 10, 'Jurnal Studi Manajemen Organisasi', 'JSMO', 'Fakultas Ekonomi dan Bisnis', 'Manajemen', '', '', 'N/A', 'N/A', '1693-8283', 0, '2012', '2', 2018, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/smo', '10.14710', 'Juni,Desember'),
(9, 11, 11, 'Jurnal Akuntansi dan Auditing', 'Akuditi', 'Fakultas Ekonomi dan Bisnis', 'Akuntansi', '', '', 'N/A', '2549-7650', '1412-6699', 0, '2012', '2', 2018, 1, 'ejournal2', 'https://ejournal.undip.ac.id/index.php/akuditi', 'N/A', 'Juli,Desember'),
(10, 12, 12, 'Enclosure', 'Enclosure', 'Fakultas Teknik', 'Arsitektur', '', '', 'N/A', '1412-7768', 'N/A', 0, '2017', '<5 Artikel', 2017, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/enclosure', 'N/A', NULL),
(11, 14, 13, 'Kapal', 'Kapal', 'Fakultas Teknik', 'Teknik Perkapalan', '', '', 'N/A', '2301-9069', '1829-8370', 0, '2012', '2', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/kapal', 'N/A', 'Februari,Juni,Oktober'),
(12, 15, 14, 'Media Medika Indonesiana (Majalah Kedokteran Diponegoro)', 'MMI', 'Fakultas Kedokteran', '', '', '', 'N/A', 'N/A', '0126-1762', 0, '2012', '1', 2013, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/mmi', 'N/A', 'April,Agustus,Desember'),
(13, 16, 15, 'Jurnal Kajian Kebudayaan', 'Sabda', 'Fakultas Ilmu Budaya', '', '', '', 'N/A', '2549-1628', '1410-7910', 0, '2012', '2', 2018, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/sabda', 'N/A', NULL),
(14, 18, 16, 'Jurnal Ilmu Komunikasi', 'Interaksi', 'Sekolah PascaSarjana', 'Ilmu Komunikasi', '', '', 'ISKI Cabang Semarang', '2548-4907', 'N/A', 0, '2012', '1', 2018, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/interaksi', 'N/A', 'Juni,November'),
(15, 19, 17, 'Jurnal Ilmu Sosial', 'JIS', 'Fakultas Ilmu Sosial dan Ilmu Politik', '', '', '', 'N/A', '2548-4893', '1411-8254', 1, '2012', '2', 2018, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/ilmusos', '10.14710', 'Juni,Desember'),
(16, 20, 18, 'Jurnal Sains dan Matematika', 'JSM', 'Fakultas Sains dan Matematika', '', '', '', 'N/A', 'N/A', '0854-0675', 2, '2012', '4', 2015, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/sm', 'N/A', 'Januari,April,Juli,Oktober'),
(17, 21, 19, 'Jurnal Kimia Sains dan Aplikasi', 'KSA', 'Fakultas Sains dan Matematika', 'Kimia', '', '', 'N/A', '2597-9914', '1410-8917', 0, '2012', '5', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/ksa', '10.14710', 'Januari,Maret,Mei,Juli,September,November'),
(18, 22, 20, 'Media Kesehatan Masyarakat Indonesia', 'MKMI', 'Fakultas Kesehatan Masyarakat', '', '', '', 'N/A', 'N/A', '1412-4920', 0, '2012', '3', 2019, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/mkmi', 'N/A', 'Februari,April,Juni,Agustus,Oktober,Desember'),
(19, 23, 21, 'Indonesian Journal of Fisheries Science and Technology', 'Saintek', 'Fakultas Perikanan dan Ilmu Kelautan', 'Teknologi Hasil Perikanan', '', '', 'N/A', '2549-0885', 'N/A', 0, '2012', '1', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/saintek', 'N/A', 'Februari,Agustus'),
(20, 24, 22, 'Jurnal Ilmu Politik', 'JIP', 'Sekolah PascaSarjana', '', '', '', 'N/A', '2502-776X', '2086-7344', 0, '2012', '1', 2019, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/politika', 'N/A', 'April,Oktober'),
(23, 25, 27, 'Jurnal Pembangunan Wilayah dan Kota', 'JPWK', 'Sekolah PascaSarjana', 'Perencanan Wilayah dan Kota', '', '', 'N/A', '2597-9272', '1858-3903', 0, '2012', '2', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/pwk', 'N/A', 'Maret,Juni,September,Desember'),
(24, 28, 28, 'Jurnal Promosi Kesehatan Indonesia', 'JPKI', 'Sekolah PascaSarjana', '', '', '', 'N/A', '2620-4053 ', '1907-2937', 0, '2012', '2', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/jpki', 'N/A', 'Januari,Agustus'),
(25, 29, 29, 'Notarius', 'Notarius', 'Sekolah PascaSarjana', '', '', '', 'N/A', 'N/A', '2086-1702', 0, '2012', '1', 2019, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/notarius', 'N/A', 'Maret,September'),
(26, 31, 30, 'Jurnal Ilmu Lingkungan', 'Ilmu Lingkungan', 'Sekolah PascaSarjana', '', '', '', 'N/A', '1829-8907', 'N/A', 1, '2012', '2', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/ilmulingkungan', '10.14710', 'April,Oktober'),
(28, 33, 32, 'Jurnal Sains Pemasaran Indonesia', 'JSPI', 'Sekolah PascaSarjana', 'Manajemen', '', '', 'N/A', '2580-118X', '1412-8527', 1, '2012', '3', 2018, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/jspi', 'N/A', 'Mei,September,Desember'),
(29, 34, 33, 'Jurnal Bisnis Strategi', 'JBS', 'Sekolah PascaSarjana', 'Manajemen', '', '', 'N/A', '2580-1171', '1410-1246', 0, '2012', '2', 2018, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/jbs', 'N/A', 'Juli,Desember'),
(30, 35, 34, 'Jurnal Masyarakat Informatika', 'J_MASIF', 'Fakultas Sains dan Matematika', 'Informatika', '', '', 'N/A', 'N/A', '2086-4930', 0, '2012', '6', 2015, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/jmasif', 'N/A', 'April,Oktober'),
(31, 36, 35, 'Jurnal Administrasi Bisnis', 'Janis', 'Fakultas Ekonomi dan Bisnis', 'Administrasi Bisnis', '', '', 'N/A', '2548-4923', '2252-3294', 1, '2012', '1', 2019, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/janis', 'N/A', 'Maret,September'),
(32, 37, 36, 'Jurnal Manajemen, Akuntansi dan Sistem Informasi', 'Jurnal MAKSI', 'Sekolah PascaSarjana', 'Akuntansi', '', '', 'Centre for Accountability, Shariah and Forensic Accounting Studies (CASaFA)', 'N/A', '1412-6680', 0, '2012', '2', 2006, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/maksi', 'N/A', NULL),
(33, 38, 37, 'Jurnal Dinamika Ekonomi Pembangunan', 'JDEP', 'Fakultas Ekonomi dan Bisnis', 'Ilmu Ekonomi dan Studi Pembangunan', '', '', 'N/A', '2620-3049', '2089-2489', 1, '2018', '1', 2019, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/dinamika_pembangunan', 'N/A', NULL),
(34, 39, 38, 'Rotasi', 'Rotasi', 'Fakultas Teknik', 'Teknik Mesin', '', '', 'N/A', '2406-9620', '1411-027X', 0, '2012', '3', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/rotasi', '10.14710', 'Januari,April,Juli,Oktober'),
(35, 40, 39, 'Keairan', 'Keairan', 'Fakultas Teknik', 'Teknik Sipil', '', '', 'N/A', 'N/A', 'N/A', 0, '2012', '0', 0, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/keairan', 'N/A', NULL),
(36, 41, 40, 'Teknik', 'Teknik', 'Fakultas Teknik', '', '', '', 'N/A', '2460-9919', '0852-1697', 1, '2012', '1', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/teknik', '10.14710', 'Juli,September'),
(37, 42, 41, 'Gema Teknologi', 'Gema Teknologi', 'Sekolah Vokasi', '', '', '', 'N/A', 'N/A', '0852-0232', 0, '2012', '2', 2019, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/gema_teknologi', 'N/A', 'April,Oktober'),
(38, 43, 42, 'J@ti Undip: Jurnal Teknik Industri', 'J@ti', 'Fakultas Teknik', 'Teknik Industri', '', '', 'N/A', '2502-1516', 'N/A', 0, '2012', '2', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/jgti', 'N/A', NULL),
(39, 44, 43, 'Forum', 'Forum', 'Fakultas Ilmu Sosial dan Ilmu Politik', '', '', '', 'N/A', '2548-4915', '0126-0731', 0, '2012', '1', 2014, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/forum', 'N/A', 'Januari,Juli'),
(40, 45, 44, 'Berkala Fisika', 'Berkala Fisika', 'Fakultas Sains dan Matematika', 'Fisika', '', '', 'N/A', 'N/A', '1410-9662', 0, '2012', '3', 2019, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/berkala_fisika', 'N/A', 'Januari,April,Juli,Oktober'),
(41, 46, 45, 'Jurnal Matematika', 'Matematika', 'Fakultas Sains dan Matematika', 'Matematika', '', '', 'N/A', 'N/A', '1410-8518', 0, '2012', '2', 2017, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/matematika', 'N/A', 'April,Agustus,Desember'),
(42, 47, 46, 'Media Statistika', 'Medstat', 'Fakultas Sains dan Matematika', 'Statistika', '', '', 'N/A', '2477-0647', '1979-3693', 0, '2012', '1', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/media_statistika', '10.14710', 'Juni,Desember'),
(43, 48, 47, 'Jurnal Psikologi', 'JP', 'Fakultas Psikologi', '', '', '', 'N/A', '2302-1098', 'N/A', 0, '2012', '1', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/psikologi', '10.14710', 'April,Oktober'),
(44, 49, 48, 'Nurse Media Journal of Nursing', 'Medianers', 'Fakultas Kedokteran', 'Ilmu Keperawatan', '', '', 'N/A', '2406-8799', '2087-7811', 2, '2012', '1', 2019, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/medianers', '10.14710', 'Juni,Desember'),
(45, 50, 49, 'PROGRESSIVE LAW JOURNAL (Jurnal Hukum Progresif)', 'Hukum Progresif', 'Sekolah PascaSarjana', 'Ilmu Hukum', '', '', 'N/A', 'N/A', '1858-0254', 0, '2012', '1', 2019, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/hukum_progresif', 'N/A', 'April,Oktober'),
(46, 51, 50, 'Law Reform', 'Law Reform', 'Sekolah PascaSarjana', 'Ilmu Hukum', '', '', 'N/A', '2580-8508', '1858-4810', 1, '2012', '1', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/lawreform', '10.14710', 'Maret,September'),
(47, 53, 51, 'Journal of Coastal Resources Management', 'Pasir Laut', '', 'Ilmu Kelautan', '', '', 'N/A', 'N/A', 'N/A', 0, '0', '0', 0, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/pasirlaut', 'N/A', NULL),
(48, 56, 52, 'Jurnal Kesehatan Lingkungan Indonesia', 'JKLI', 'Sekolah PascaSarjana', '', '', '', 'N/A', '2502-7085', '1412-4939', 0, '2012', '2', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/jkli', '10.14710', 'April,Oktober'),
(49, 57, 53, 'Media Komunikasi Teknik Sipil', 'MKTS', 'Fakultas Teknik', 'Teknik Sipil', '', '', 'Badan Musyawarah Pendidikan Tinggi Teknik Sipil Seluruh Indonesia, Badan Kejuruan Sipil Persatuan In', '2549-6778', '0854-1809 ', 0, '2012', '2', 2017, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/mkts', '10.14710', 'Juli,Desember'),
(50, 59, 54, 'Journal of Linguistics and Education', 'Parole', 'Sekolah PascaSarjana', '', '', '', 'N/A', '2338-0683', '2087-345X', 2, '2013', '1', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/parole', 'N/A', 'April,Oktober'),
(51, 61, 55, 'Jurnal Gizi Indonesia', 'JGI', 'Fakultas Kedokteran', 'Ilmu Gizi', '', '', 'Indonesian Nutrition Association (PERSAGI)', '2338-3119', '1858-4942', 0, '2013', '2', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/jgi', '10.14710', 'Juni,Desember'),
(52, 62, 56, 'Jurnal Sistem Informasi Bisnis', 'JSINBIS', 'Sekolah PascaSarjana', '', '', '', 'N/A', '2502-2377', '2088-3587', 0, '2012', '1', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/jsinbis', '10.21456', 'April,Oktober'),
(53, 63, 57, 'Pilar', 'Pilar', 'Sekolah PascaSarjana', 'Teknik Sipil', '', '', 'N/A', 'N/A', '0854-1515', 0, '2012', '0', 0, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/pilar', 'N/A', 'April'),
(54, 64, 58, 'Journal Mechatronics', 'Mechatronics', '', '', '', '', 'N/A', 'N/A', 'N/A', 0, '0', '0', 0, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/mechatronics', 'N/A', NULL),
(55, 65, 59, 'Buletin Oseanografi Marina', 'Buloma', 'Fakultas Perikanan dan Ilmu Kelautan', 'Ilmu Kelautan', '', '', 'N/A', '2550-0015', '2089-3507', 0, '2012', '1', 2019, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/buloma', 'N/A', 'April,November'),
(56, 66, 60, 'Jurnal Presipitasi : Media Komunikasi dan Pengembangan Teknik Lingkungan', 'Presipitasi', 'Fakultas Teknik', 'Teknik Lingkungan', '', '', 'N/A', '2550-0023', '1907-817X', 1, '2012', '2', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/presipitasi', '10.14710', 'Maret,Juli,November'),
(57, 67, 61, 'International Journal of Science and Engineering', 'IJSE', 'Fakultas Teknik', 'Teknik Kimia', '', '', 'N/A', '2086-5023', '2302-5743', 2, '2012', '1', 2019, 0, 'ejournal1', 'http://ejournal.undip.ac.id/index.php/ijse', 'N/A', 'Januari,April,Juni,Oktober'),
(58, 68, 62, 'Metana', 'Metana', 'Sekolah Vokasi', 'Teknik Kimia', '', '', 'N/A', '2549-913', '1858-2907', 0, '2012', '1', 2019, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/metana', 'N/A', 'Maret,Desember'),
(59, 69, 63, 'Modul', 'Modul', 'Fakultas Teknik', 'Arsitektur', '', '', 'Indonesia Institute of Architects (IAI)', '2598-327X', '0853-2877', 1, '2012', '1', 2019, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/modul', 'N/A', 'Juli,Desember'),
(60, 71, 64, 'Kajian Sastra - Lembaran Sastra Fakultas Sastra Universitas Diponegoro', 'Kajian Sastra', 'Fakultas Ilmu Budaya', '', '', '', 'N/A', 'N/A', '0852-0704', 0, '2012', '1', 2011, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/kajiansastra', 'N/A', 'Januari,Juli'),
(61, 73, 65, 'Buletin Anatomi dan Fisiologi', 'Janafis', 'Fakultas Sains dan Matematika', 'Biologi', '', '', 'N/A', '2541-0083', '2527 6751', 0, '2012', '1', 2016, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/janafis', 'N/A', 'Maret,Oktober'),
(62, 74, 66, 'Nusa: Jurnal Ilmu Bahasa dan Sastra', 'Nusa', 'Fakultas Ilmu Budaya', '', '', '', 'N/A', '2597-9558', '0216-535X', 0, '2017', '2', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/nusa', 'N/A', 'Februari,Mei,Agustus,November'),
(63, 75, 67, 'Humanika', 'Humanika', 'Fakultas Ilmu Budaya', '', '', '', 'N/A', '2502-5783', '1412-941', 1, '2012', '1', 2019, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/humanika', '10.14710', 'Juni,Desember'),
(64, 79, 68, 'Jurnal Sosial Ekonomi Peternakan', 'JSEP', 'Fakultas Peternakan dan Pertanian', 'Peternakan', '', '', 'N/A', 'N/A', '1858-0858', 0, '2012', '1', 2007, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/jsep', 'N/A', 'Januari,Juli'),
(65, 80, 69, 'International Journal of Renewable Energy Development', 'IJRED', '', '', '', 'Center of Biomass and Renewable Energy (CBIORE)', 'N/A', '2252-4940', 'N/A', 2, '2012', '2', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/ijred', '10.14710', 'Februari,Juli,Oktober'),
(66, 81, 70, 'The Indonesian Journal of Naval Architecture', 'IJNA', 'Fakultas Teknik', 'Teknik Perkapalan', '', '', 'N/A', 'N/A', '2301-847X', 2, '2013', '1', 2013, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/ijna', 'N/A', NULL),
(67, 82, 71, 'Pembaharuan Hukum Pidana', 'PHPidana', 'Fakultas Hukum', '', '', '', 'N/A', 'N/A', 'N/A', 0, '2018', '2', 2019, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/phpidana', 'N/A', NULL),
(68, 84, 72, 'Journal of Nutrition and Health', 'Actanutrica', 'Fakultas Kedokteran', 'Ilmu Gizi', '', '', 'N/A', '2622-8483', '2338-3380 ', 0, '2013', '2', 2019, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/actanutrica', 'N/A', 'Februari,Juni,Oktober'),
(69, 85, 73, 'Jurnal Anestesiologi Indonesia', 'Janesti', 'Fakultas Kedokteran', '', '', '', 'Perhimpunan Dokter Spesialis Anestesiologi dan Terapi Intensif (PERDATIN)', '2089-970X', '2337-5124', 0, '2012', '1', 2019, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/janesti', 'N/A', 'Maret,Juli,Oktober'),
(70, 86, 74, 'Media Hukum Administrasi dan Tata Negara', 'MHATN', 'Sekolah PascaSarjana', 'Ilmu Hukum', '', '', 'Asosiasi Pengajar dan Profesi Ilmu Hukum Semarang', 'N/A', '1411-3759', 0, '0', '0', 0, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/mediahukum', 'N/A', NULL),
(71, 87, 61, 'Waste Technology', 'Wastech', '', '', '', 'Waste Resources Research Center (WRRC)', 'N/A', 'N/A', '2338-6207', 2, '2013', '1', 2019, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/wastech', '10.12777 - Tidak aktif', 'April,Oktober'),
(72, 88, 67, 'Izumi', 'Izumi', 'Fakultas Ilmu Budaya', 'Sastra Jepang', '', '', 'N/A', '2502-3535', '2338-249x', 0, '2013', '1', 2019, 0, 'ejournal1', 'http://ejournal.undip.ac.id/index.php/izumi', '10.14710', 'Juni,Desember'),
(73, 89, 77, 'International Journal of Marine and Aquatic Resource Conservation and Co-existence', 'ijmarcc', 'Fakultas Perikanan dan Ilmu Kelautan', '', '', '', 'N/A', '2407-6252', '2406-9094', 2, '2017', '1', 2017, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/ijmarcc', 'N/A', 'April,Oktober'),
(74, 90, 78, 'Geoplanning: Journal of Geomatics and Planning', 'Geoplanning', 'Fakultas Teknik', 'Perencanan Wilayah dan Kota', '', '', 'Geomatics and Planning Laboratory', '2355-6544', 'N/A', 2, '2014', '1', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/geoplanning', '10.14710', 'April,Oktober'),
(75, 91, 79, 'Jurnal Media Kesehatan Diponegoro', 'JMKD', 'Fakultas Kedokteran', '', '', '', 'N/A', 'N/A', 'N/A', 0, '2017', '0', 0, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/jmkd', 'N/A', NULL),
(76, 92, 80, 'Lentera Pustaka: Jurnal Kajian Ilmu Perpustakaan, Informasi, dan Kearsipan', 'Lentera Pustaka', 'Fakultas Ilmu Budaya', 'Ilmu Perpustakaan', '', '', 'N/A', '2540-9638', '2302-4666', 0, '2015', '1', 2019, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/lpustaka', 'N/A', 'Juni,Desember'),
(77, 93, 81, 'Jurnal Sejarah Citra Lekha', 'JSCL', 'Fakultas Ilmu Budaya', 'Ilmu Sejarah', '', '', 'N/A', '2443-0110', 'N/A', 0, '2016', '1', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/jscl', '10.14710', 'Februari,Agustus'),
(78, 94, 82, 'Jurnal Manajemen Kesehatan Indonesia', 'JMKI', 'Sekolah PascaSarjana', '', '', '', 'N/A', '2548-7213', '2303-3622', 0, '2013', '2', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/jmki', 'N/A', 'April,Agustus,Desember'),
(79, 95, 83, 'Jurnal Ilmiah Mahasiswa', 'JIM', 'Fakultas Kesehatan Masyarakat', '', '', '', 'N/A', '2088-8961', 'N/A', 0, '2012', '1', 2014, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/jim', 'N/A', 'April,September'),
(80, 96, 84, 'Jurnal Gema Publica', 'Gema Publica', 'Fakultas Ilmu Sosial dan Ilmu Politik', 'Administrasi Bisnis', '', '', 'N/A', '2548-1363', '2460-9714', 0, '2015', '1', 2019, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/gp', 'N/A', 'April,Oktober'),
(81, 97, 85, 'Indonesian Perspective', 'Indonesian Perspective', 'Fakultas Ilmu Sosial dan Ilmu Politik', 'Hubungan Internasional', '', '', 'N/A', '2548-1436 ', '2502-2067 ', 0, '2016', '1', 2019, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/ip', 'N/A', 'Januari,Juli'),
(82, 98, 86, 'Diponegoro Law Review', 'DilRev', 'Fakultas Hukum', '', '', '', 'N/A', '2527-4031', 'N/A', 2, '2016', '2', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/dlr', 'N/A', 'April,Oktober'),
(83, 99, 67, 'KIRYOKU', 'KIRYOKU', 'Fakultas Ilmu Budaya', 'Sastra Jepang', '', '', 'N/A', '2581-0960', '2599-0497', 0, '2017', '2', 2019, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/kiryoku', 'N/A', 'Januari,April,Juli,Oktober'),
(84, 100, 88, 'Endogami', 'Endogami', 'Fakultas Ilmu Sosial dan Ilmu Politik', 'Antropologi Sosial', '', '', 'N/A', '2599-1078', 'N/A', 0, '2017', '2', 2019, 1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/endogami', 'N/A', 'Juni,Desember'),
(85, 101, 89, 'Harmoni', 'Harmoni', 'Fakultas Ilmu Budaya', '', '', '', 'N/A', '2599-1795', 'N/A', 0, '2017', '1', 2019, 0, 'ejournal1', 'https://ejournal.undip.ac.id/index.php/harmoni', 'N/A', 'Juni,Desember'),
(86, 1, 90, 'Bulletin of Chemical Reaction Engineering & Catalysis', 'BCREC', 'Fakultas Teknik', 'Teknik Kimia', '', '', 'Masyarakat Katalis Indonesia - Indonesian Catalyst Society (MKICS)', '1978-2993', 'N/A', 2, '2012', '3', 2019, 1, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/bcrec', '10.97670', 'April,Agustus,Desember'),
(87, 2, 91, 'Tropical Endangered Organisms and Conservation', 'TEOC', 'Fakultas Perikanan dan Ilmu Kelautan', '', '', '', 'N/A', 'N/A', 'N/A', 0, '0', '0', 0, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/teoc', 'N/A', NULL),
(88, 3, 92, 'Journal of Biomedicine and Translational Research', 'JBTR', 'Fakultas Kedokteran', '', '', '', 'N/A', '2503-2178', 'N/A', 2, '2015', '1', 2019, 1, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/jbtr', '10.14710', 'Juli,Desember'),
(89, 4, 93, 'Jurnal Pengembangan Kota', 'JPK', 'Fakultas Teknik', 'Perencanan Wilayah dan Kota', '', '', 'N/A', '2503-0361', '2337-7062', 0, '2015', '2', 2018, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/jpk', '10.14710', 'Juli,Desember'),
(90, 5, 94, 'Info', 'Info', '', '', '', 'Lembaga Penelitian dan Pengabdian Masyarakat (LPPM', 'N/A', 'N/A', '0852-1816', 0, '2013', '2', 2017, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/info', 'N/A', NULL),
(91, 6, 95, 'Ruang', 'Ruang', 'Fakultas Teknik', 'Perencanan Wilayah dan Kota', '', '', 'N/A', '2356-0088', '1858-3881', 0, '2015', '1', 2019, 1, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/ruang', 'N/A', 'Maret,Juni,September,Desember'),
(92, 7, 96, 'International Journal of Engineering Education', 'IJEE', 'Fakultas Teknik', '', '', '', 'N/A', '2540-9808', 'N/A', 2, '2016', '2', 2019, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/ijee', 'N/A', 'April,Oktober'),
(93, 8, 97, 'Tataloka', 'Tataloka', 'Fakultas Teknik', 'Perencanan Wilayah dan Kota', '', '', 'Ikatan Ahli Perencanaan (IAP) Indonesia (Indonesian Association of Planners)', '2356-0266', '0852-7458', 1, '2012', '3', 2019, 1, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/tataloka', '10.14710', 'Februari,Mei,Agustus,November'),
(94, 10, 98, 'The Indonesian Journal of Planning and Development', 'IJPD', 'Fakultas Teknik', 'Perencanan Wilayah dan Kota', '', '', 'N/A', '2442-983X', '2087-9733', 2, '2016', '1', 2019, 1, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/ijpd', '10.14710', 'Februari,Oktober'),
(95, 9, 98, 'Jurnal Wilayah dan Lingkungan', 'JWL', 'Fakultas Teknik', 'Perencanan Wilayah dan Kota', '', '', 'N/A', '2407-8751', '2338-1604', 0, '2013', '2', 2019, 1, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/jwl', '10.14710', 'April,Agustus,Desember'),
(96, 11, 99, 'Journal of Agro Complex', 'JOAC', 'Fakultas Peternakan dan Pertanian', '', '', '', 'N/A', '2597-4386', 'N/A', 0, '2017', '1', 2019, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/joac', '10.14710', 'Februari,Juni,Oktober'),
(97, 12, 100, 'Jurnal Kelautan Tropis', 'JKT', 'Fakultas Perikanan dan Ilmu Kelautan', 'Ilmu Kelautan', '', '', 'Masyarakat Ekosistem Kelautan Indonesia', '2528-3111', '1410-8852', 0, '2015', '1', 2019, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/jkt', 'N/A', 'Maret,November'),
(98, 13, 101, 'Journal of Economic Development and Social Research', 'JEDSR', 'Fakultas Ekonomi dan Bisnis', 'Ilmu Ekonomi dan Studi Pembangunan', '', '', 'N/A', 'N/A', 'N/A', 0, '2017', '0', 0, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/jedsr', 'N/A', NULL),
(99, 14, 102, 'Diponegoro Journal of Islamic Economics and Business', 'DJIEB', 'Fakultas Ekonomi dan Bisnis', '', '', '', 'N/A', 'N/A', 'N/A', 0, '0', '0', 0, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/djieb', 'N/A', 'Juni,Oktober'),
(100, 16, 103, 'Diponegoro International Journal of Business', 'DIJB', 'Fakultas Ekonomi dan Bisnis', 'Manajemen', '', '', 'N/A', '2580-4995', '2580-4987', 2, '2018', '2', 2019, 1, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/ijb', 'N/A', NULL),
(101, 17, 104, 'Journal of Public Health for Tropical and Coastal Region', 'JPHTR', 'Fakultas Kesehatan Masyarakat', '', '', '', 'N/A', '2597-4378', 'N/A', 0, '2016', '1', 2019, 1, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/jphtr', 'N/A', 'Juni,Desember'),
(102, 19, 106, 'Jurnal Epidemiologi Kesehatan Komunitas', 'JEKK', 'Sekolah PascaSarjana', '', '', '', 'N/A', '2615-4854 ', 'N/A', 0, '2018', '2', 2019, 1, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/jekk', 'N/A', 'Februari,Agustus'),
(103, 21, 107, 'Warta Perpustakaan', 'WP', '', '', '', 'Perpustakaan Undip', 'N/A', 'N/A', '0126-4559', 0, '2017', '2', 2017, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/wp', 'N/A', 'Mei,Oktober'),
(104, 22, 108, 'Jurnal Ilmiah Ilmu Pemerintahan', 'JIIP', 'Fakultas Ilmu Sosial dan Ilmu Politik', 'Ilmu Pemerintahan', '', '', 'N/A', '2548-4931', 'N/A', 0, '2015', '2', 2019, 1, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/jiip', 'N/A', 'Maret,September'),
(105, 23, 109, 'LEKSIKONIA: Jurnal Bahasa dan Sastra', 'LEKSIKONIA', 'Fakultas Ilmu Budaya', 'Bahasa dan Sastra Indonesia', '', '', 'N/A', 'N/A', 'N/A', 0, '2017', '1', 2017, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/leksikonia', 'N/A', NULL),
(106, 24, 103, 'The Indonesia International Journal of Finance', 'IIJF', 'Fakultas Ekonomi dan Bisnis', 'Manajemen', '', '', 'N/A', 'N/A', 'N/A', 0, '2017', '0', 0, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/iijf', 'N/A', NULL),
(107, 25, 111, 'Journal of Business and Organization', 'JBO', 'Sekolah PascaSarjana', 'Manajemen', '', '', 'N/A', 'N/A', '1693-8283', 0, '2017', '0', 0, 1, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/damj', 'N/A', NULL),
(108, 26, 112, 'Media Medika Muda', 'MMM', 'Fakultas Kedokteran', '', '', '', 'N/A', 'N/A', '1858-3318', 0, '2016', '2', 2018, 1, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/mmm', 'N/A', 'Januari,Mei,September'),
(109, 27, 113, 'Advances in Civil Engineering, Design and Planning', 'ACEDP', 'Fakultas Teknik', '', '', '', 'N/A', 'N/A', 'N/A', 0, '0', '0', 0, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/acedp', 'N/A', NULL),
(110, 28, 114, 'Sains Akuakultur Tropis', 'SAT', 'Fakultas Perikanan dan Ilmu Kelautan', '', '', '', 'N/A', '2621-0525', 'N/A', 0, '2017', '2', 2019, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/sat', 'N/A', 'Maret,September'),
(111, 29, 115, 'Jurnal Perikanan Tangkap', 'Juperta', 'Fakultas Perikanan dan Ilmu Kelautan', '', '', '', 'N/A', '2613-9766', 'N/A', 0, '2017', '3', 2018, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/juperta', 'N/A', 'Maret,Juni,September,Desember'),
(112, 30, 81, 'Journal of Maritime Studies and National Integration', 'JMSNI', 'Fakultas Ilmu Budaya', 'Ilmu Sejarah', '', '', 'N/A', '2579-9215', 'N/A', 2, '2017', '1', 2019, 1, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/jmsni', '10.14710', 'Juni,Desember'),
(113, 31, 117, 'Indonesian Historical Studies', 'IHIS', 'Sekolah PascaSarjana', 'Ilmu Sejarah', '', '', 'N/A', '2579-4213', 'N/A', 2, '2017', '1', 2019, 1, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/ihis', '10.14710', NULL),
(114, 32, 118, 'Agrisocionomics: Jurnal Sosial Ekonomi Pertanian', 'Agrisocionomics', 'Fakultas Peternakan dan Pertanian', 'Agribisnis', '', '', 'N/A', '2580-0566  ', 'N/A', 0, '2017', '1', 2019, 1, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/agrisocionomics', 'N/A', 'Mei,November'),
(115, 33, 119, 'International Research Journal of Entrepreneurial Marketing Studies', 'IRJEMS', 'Fakultas Ekonomi dan Bisnis', '', '', '', 'N/A', 'N/A', 'N/A', 2, '2017', '0', 0, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/irjems', 'N/A', NULL),
(116, 34, 120, 'International Journal of Innovation Scientific and Development', 'IJISD', 'Fakultas Perikanan dan Ilmu Kelautan', 'Ilmu Kelautan', '', '', 'N/A', 'N/A', 'N/A', 2, '2017', '0', 0, 1, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/ijisd', 'N/A', NULL),
(117, 35, 121, 'Jurnal Aplikasi Teknologi Pangan', 'JATP', 'Fakultas Peternakan dan Pertanian', 'Teknologi Pangan', '', '', 'Indonesian Food Technologists', '2460-5921', '2089-7693', 0, '2012', '3', 2019, 1, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/jatp', '10.17728', 'Februari,Mei,Agustus,November'),
(118, 36, 121, 'Journal of Applied Food Technology', 'JAFT', 'Fakultas Peternakan dan Pertanian', 'Teknologi Pangan', '', '', 'N/A', '2614-7076', '2355-9152', 2, '2018', '1', 2019, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/jaft', 'N/A', 'Juni,Desember'),
(119, 37, 122, 'Anuva: Jurnal Kajian Budaya, Perpustakaan, dan Informasi', 'Anuva', 'Fakultas Ilmu Budaya', 'Ilmu Perpustakaan', '', '', 'N/A', '2598-3040', 'N/A', 0, '2017', '2', 2019, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/anuva', 'N/A', 'Maret,Juni,September,Desember'),
(120, 38, 123, 'Culturalistics: Journal of Cultural, Literary, and Linguistic Studies', 'Culturalistics', 'Fakultas Ilmu Budaya', '', '', '', 'N/A', '2614-039X', 'N/A', 2, '2017', '1', 2019, 1, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/culturalistics', 'N/A', 'Januari,Mei,September'),
(121, 39, 124, 'Compendium: Journal of Cultural, Literacy, and Linguistic Studies', 'Compendium', 'Fakultas Ilmu Budaya', 'Bahasa dan Sastra Inggris', '', '', 'N/A', 'N/A', 'N/A', 2, '2017', '1', 2017, 1, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/compendium', 'N/A', NULL),
(122, 40, 125, 'Diponegoro Private Law Review', 'DPLR', 'Fakultas Hukum', '', '', '', 'N/A', 'N/A', '2598-2354', 0, '2017', '1', 2019, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/dplr', 'N/A', 'Mei,November'),
(123, 43, 126, 'INSECTA Journal of Insect Science', 'INSECTA', 'Fakultas Sains dan Matematika', 'Biologi', '', '', 'N/A', 'N/A', 'N/A', 0, '0', '0', 0, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/insecta', 'N/A', NULL),
(124, 44, 127, 'Administrative Law Journal', 'ALJ', 'Fakultas Hukum', '', '', '', 'N/A', '2621-2781', 'N/A', 0, '2018', '2', 2019, 1, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/alj', 'N/A', 'Mei,November'),
(125, 45, 126, 'Niche: Journal of Tropical Biology', 'Niche', 'Fakultas Sains dan Matematika', 'Biologi', '', '', 'N/A', '2614-8307', 'N/A', 2, '2018', '2', 2018, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/niche', 'N/A', 'Mei,November'),
(126, 46, 128, 'Jurnal Biologi Tropika', 'JBT', 'Fakultas Sains dan Matematika', 'Biologi', '', '', 'N/A', '2614-8323', 'N/A', 0, '2017', '1', 2019, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/jbt', 'N/A', 'Mei,November'),
(127, 47, 129, 'Journal of Architectural Design and Urbanism', 'JADU', 'Sekolah PascaSarjana', '', '', '', 'N/A', '2620-9810', 'N/A', 2, '2017', '1', 2019, 1, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/jadu', '', 'Maret,September'),
(128, 48, 130, 'Jurnal Geosains dan Teknologi', 'JGT', 'Fakultas Teknik', 'Teknik Geologi', '', '', 'N/A', '2620-634X', '2615-6520', 0, '2018', '2', 2019, 1, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/jgt', 'N/A', 'Maret,Juli,November'),
(129, 49, 131, 'Berkala Bioteknologi', 'BB', 'Fakultas Sains dan Matematika', 'Biologi', '', '', 'N/A', '2615-3955', 'N/A', 0, '2018', '0', 0, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/bb', 'N/A', NULL),
(130, 50, 37, 'Ekonomika Pembangunan', 'v', 'Fakultas Ekonomi dan Bisnis', 'Ilmu Ekonomi dan Studi Pembangunan', '', '', 'N/A', 'N/A', 'N/A', 0, '2018', '0', 0, 1, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/ep', 'N/A', NULL),
(131, 51, 133, 'Journal of Physics and Its Applications', 'JPA', 'Fakultas Sains dan Matematika', 'Fisika', '', '', 'N/A', '2622-5956', 'N/A', 2, '2018', '2', 2019, 1, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/jpa', 'N/A', 'Mei,November'),
(132, 52, 134, 'Jurnal Pengabdian Vokasi', 'JPV', 'Sekolah Vokasi', '', '', '', 'N/A', '2621-8801', 'N/A', 0, '2018', '1', 2019, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/jpv', 'N/A', 'Juni,Desember'),
(133, 53, 135, 'Journal Vocational Studies of Applied Research', 'JVSAR', 'Sekolah Vokasi', '', '', '', 'N/A', '2684-8090', 'N/A', 2, '2018', '1', 2019, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/jvsar', 'N/A', 'April'),
(134, 54, 136, 'Holistic Nursing and Health Science Journal', 'HNHS', 'Sekolah PascaSarjana', 'Ilmu Keperawatan', '', '', 'N/A', '2622-4321', 'N/A', 1, '2018', '1', 2019, 1, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/hnhs', 'N/A', 'Juni,Juli,Oktober'),
(135, 55, 137, 'Elipsoida', 'Elipsoida', 'Fakultas Teknik', 'Teknik Geodesi', '', '', 'N/A', '2621-9883', 'N/A', 0, '2018', '1', 2019, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/elipsoida', 'N/A', 'Juni,Desember'),
(136, 57, 138, 'Gema Keadilan', 'GK', 'Fakultas Hukum', '', '', '', 'N/A', 'N/A', '0852-0011', 0, '2014', '2', 2019, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/gk', 'N/A', 'Juni,Agustus,September'),
(137, 58, 140, 'Law, Development & Justice Review', 'LDJR', 'Fakultas Hukum', '', '', '', 'N/A', '2655-1942', 'N/A', 0, '2018', '2', 2019, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/lj', 'N/A', NULL),
(138, 59, 141, 'Jurnal Pembangunan Hukum Indonesia', 'JPHI', 'Fakultas Hukum', '', '', '', 'N/A', '2656-3193', '2656-6737 ', 0, '2019', '2', 2019, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/jphi', 'N/A', NULL),
(139, 60, 142, 'Journal of Membranes and Materials', 'JMM', '', '', '', 'Membrane Research Center (MeR-C)', 'N/A', 'N/A', 'N/A', 0, '0', '0', 0, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/jmm', 'N/A', 'Juli,Desember'),
(140, 61, 143, 'Jurnal Proyek Teknik Sipil', 'JPTS', 'Fakultas Teknik', 'Teknik Sipil', '', '', 'N/A', '2654-4482', 'N/A', 0, '2018', '1', 2019, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/potensi', 'N/A', 'Maret,September'),
(141, 62, 144, 'Indonesia Journal of Halal', 'IJH', 'Fakultas Teknik', 'Teknik Kimia', '', '', 'N/A', '2656-4963', 'N/A', 0, '2018', '1', 2019, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/ijh', 'N/A', NULL),
(142, 63, 145, 'Jurnal Pengelolaan Laboratorium Pendidikan', 'JPLP', 'Fakultas Sains dan Matematika', 'Biologi', '', '', 'N/A', '2654-251X', 'N/A', 0, '2019', '2', 2019, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/jplp', 'N/A', 'Januari,Juli'),
(143, 64, 146, 'Jurnal Ilmu dan Teknologi Perikanan', 'JITP', 'Fakultas Perikanan dan Ilmu Kelautan', 'Teknologi Hasil Perikanan', '', '', '', '2685-3701', 'N/A', 0, '2019', '1', 2019, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/jitpi', 'N/A', NULL),
(144, 66, 147, 'Journal of Marine Disaster Mitigation', 'JMDM', 'Fakultas Perikanan dan Ilmu Kelautan', 'Oseanografi', '', '', 'N/A', 'N/A', 'N/A', 0, '0', '0', 0, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/jmdm', 'N/A', NULL),
(145, 67, 9, 'Jurnal CREPIDO', 'CREPIDO', 'Fakultas Hukum', '', '', '', 'N/A', 'N/A', 'N/A', 0, '0', '0', 0, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/crepido', 'N/A', 'Juli,November'),
(146, 68, 149, 'Journal of Materials Science Engineering and Application', 'JMSEA', 'Fakultas Sains dan Matematika', 'Fisika', '', '', 'N/A', 'N/A', 'N/A', 0, '0', '0', 0, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/jomsea', 'N/A', NULL),
(147, 69, 150, 'Kajian Bahasa dan Sastra', 'KBS', 'Fakultas Ilmu Budaya', 'Bahasa dan Sastra Indonesia', '', '', 'N/A', 'N/A', 'N/A', 0, '0', '0', 0, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/kbs', 'N/A', NULL),
(148, 70, 151, 'Jurnal Pasopati : Pengabdian Masyarakat dan Inovasi Pengembangan Teknologi', 'PASOPATI', 'Fakultas Teknik', 'Teknik Perkapalan', '', '', 'N/A', '2685-886X', 'N/A', 0, '2019', '1', 2019, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/pasopati', 'N/A', 'Februari,Mei,Agustus,November'),
(149, 71, 152, 'LEGALITATUM', 'LEGALITATUM', 'Fakultas Hukum', '', '', '', 'N/A', 'N/A', 'N/A', 0, '0', '0', 0, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/otentik', 'N/A', NULL),
(150, 72, 153, 'Pentana: Jurnal Penelitian Terapan Kimia', 'PENTANA', 'Fakultas Hukum', '', '', '', 'N/A', 'N/A', 'N/A', 1, '0', '0', 0, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/otentik', 'N/A', NULL),
(151, 73, 154, 'Dialogue: Jurnal Ilmu Administrasi Publik', 'DIALOGUE', 'Fakultas Ilmu Sosial dan Ilmu Politik', 'Administrasi Publik', '', '', 'N/A', '2685-3582', 'N/A', 0, '2019', '1', 2019, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/dialogue', 'N/A', 'Juni'),
(152, 76, 8, 'Journal of Biomedical Science and Bioengineering', 'JBIOMES', 'Fakultas Teknik', 'Teknik Elektro', '', '', 'N/A', 'N/A', 'N/A', 0, '0', '0', 0, 0, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php/jbiomes', 'N/A', NULL),
(153, 60, 156, 'Jurnal Teknologi dan Sistem Komputer', 'JTSiskom', 'Fakultas Teknik', 'Teknik Komputer', '', '', 'Asosiasi Pendidikan Tinggi Ilmu Komputer Indonesia', '2338-0403', '2620-4002', 1, '2013', '3', 2019, 1, 'lainnya', 'https://jtsiskom.undip.ac.id/index.php/jtsiskom', '10.14710', 'Januari,April,Agustus,Oktober'),
(154, 0, 157, 'Journal of Nutrition College', 'JNC', 'Fakultas Kedokteran', 'Ilmu Gizi', '', '', 'N/A', '2622-884X', 'N/A', 0, '2012', '2', 2019, 0, 'ejournal3', 'https://ejournal3.undip.ac.id/index.php/jnc', 'N/A', NULL),
(155, 0, 158, 'Jurnal Kedokteran Diponegoro ', 'JKD', 'Fakultas Kedokteran', 'Kedokteran Umum', '', '', 'N/A', '2540-8844', 'N/A', 0, '2016', '3', 2019, 0, 'ejournal3', 'https://ejournal3.undip.ac.id/index.php/medico', 'N/A', NULL),
(156, 0, 159, 'Empati', 'Empati', 'Fakultas Psikologi', '', '', '', 'N/A', 'N/A', '2337-375X', 0, '2012', '2', 2019, 0, 'ejournal3', 'https://ejournal3.undip.ac.id/index.php/empati', 'N/A', 'Januari,April,Agustus,Oktober');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_pengindeks`
--

CREATE TABLE `jurnal_pengindeks` (
  `kode_jp` int(100) NOT NULL,
  `kode_jurnal` int(100) NOT NULL,
  `kode_pengindeks` int(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `url_pengindeks` varchar(100) NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal_pengindeks`
--

INSERT INTO `jurnal_pengindeks` (`kode_jp`, `kode_jurnal`, `kode_pengindeks`, `kategori`, `url_pengindeks`, `keterangan`) VALUES
(2, 2, 2, 'Rendah', 'https://scholar.google.com/citations?user=8mHEi88AAAAJ', 'Jumlah Sitasi >25'),
(3, 2, 3, 'Sedang', 'https://doaj.org/toc/2407-5973', '2016'),
(4, 3, 3, 'Sedang', 'https://doaj.org/toc/2406-7598', '2017'),
(5, 3, 2, 'Rendah', 'http://scholar.google.com/citations?user=_wNftc0AAAAJ', 'Jumlah Sitasi >25'),
(6, 4, 1, 'Tinggi', 'https://www.scopus.com/sourceid/21100823452', '-'),
(7, 4, 4, 'Sedang', 'http://mjl.clarivate.com/cgi-bin/jrnlst/jlresults.cgi?PC=MASTER&ISSN=2252-4940', '-'),
(8, 4, 5, 'Sedang', 'https://www.asean-cites.org/index.php?r=journal%2Fpublic-view&id=520', '-'),
(9, 4, 3, 'Sedang', 'https://doaj.org/toc/2087-8273', '2011'),
(10, 4, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=JLBr0lYAAAAJ', 'Jumlah Sitasi >25'),
(11, 5, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=tBO0fysAAAAJ', 'Jumlah Sitasi >25'),
(12, 7, 3, 'Tinggi', 'https://doaj.org/toc/2527-4716', '2019'),
(13, 7, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=EyoK6RcAAAAJ&hl=en', 'Jumlah Sitasi >25'),
(14, 8, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=lNnRMmUAAAAJ', 'Jumlah Sitasi >25'),
(15, 9, 3, 'Tinggi', 'https://doaj.org/toc/2549-7650', '2018'),
(16, 9, 2, 'Rendah', 'https://scholar.google.co.id/citations?hl=id&user=GxAqgVwAAAAJ', 'Jumlah Sitasi >25'),
(17, 11, 3, 'Sedang', 'https://doaj.org/toc/2301-9069', '2014'),
(18, 11, 2, 'Rendah', 'https://scholar.google.com/citations?hl=id&user=aRpJLxwAAAAJ', 'Jumlah Sitasi >25'),
(19, 15, 3, 'Sedang', 'https://doaj.org/toc/2548-4893', '2017'),
(20, 15, 2, 'Rendah', 'https://scholar.google.co.id/citations?hl=en&user=Qy34TDQAAAAJ', 'Jumlah Sitasi 11-25'),
(21, 19, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=GcvBfRwAAAAJ', 'Jumlah Sitasi >25'),
(22, 20, 3, 'Sedang', 'https://doaj.org/toc/2502-776X', '2018'),
(23, 21, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=alfvTRgAAAAJ', 'Jumlah Sitasi >25'),
(24, 21, 1, 'Sedang', 'https://www.scopus.com/results/results.uri?sort=plf-f&src=dm&nlo=&nlr=&nls=&sot=a&sdt=cl&cluster=sco', 'Jumlah Sitasi >25'),
(25, 23, 3, 'Sedang', 'https://doaj.org/toc/2597-9272', '2019'),
(26, 23, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=SZGd4ZQAAAAJ', 'Jumlah Sitasi >25'),
(27, 24, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=kQIbjikAAAAJ', 'Jumlah Sitasi >25'),
(28, 26, 3, 'Sedang', 'https://doaj.org/toc/1829-8907', '2016'),
(29, 26, 2, 'Rendah', 'https://scholar.google.com/citations?user=QJOsoIMAAAAJ&hl=id', 'Jumlah Sitasi >25'),
(30, 28, 2, 'Rendah', 'https://scholar.google.co.id/citations?hl=id&user=E14ABRQ1fccC', 'Jumlah Sitasi >25'),
(31, 29, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=OmVf0zIAAAAJ', 'Jumlah Sitasi >25'),
(32, 30, 2, 'Rendah', 'https://scholar.google.co.id/citations?hl=id&user=nKalposAAAAJ', 'Jumlah Sitasi >25'),
(33, 36, 3, 'Sedang', 'https://doaj.org/toc/0852-1697', '2015'),
(34, 36, 2, 'Rendah', 'https://scholar.google.com/citations?user=lJnmuk8AAAAJ', 'Jumlah Sitasi >25'),
(36, 38, 3, 'Sedang', 'https://doaj.org/toc/2502-1516', '2017'),
(37, 38, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=P0-5qJoAAAAJ', 'Jumlah Sitasi >25'),
(38, 42, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=wFadIQYAAAAJ', 'Jumlah Sitasi >25'),
(39, 43, 3, 'Sedang', 'https://doaj.org/toc/2302-1098', '2016'),
(40, 43, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=-68E3BMAAAAJ', 'Jumlah Sitasi >25'),
(41, 44, 3, 'Sedang', 'https://doaj.org/toc/2406-8799', '2015'),
(42, 44, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=Gs6nEgkAAAAJ&hl=en', 'Jumlah Sitasi >25'),
(43, 46, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=CaHI-vgAAAAJ', 'Jumlah Sitasi >25'),
(44, 48, 3, 'Sedang', 'https://doaj.org/toc/2502-7085', '2017'),
(45, 48, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=VyNQ8joAAAAJ&hl=id', 'Jumlah Sitasi >25'),
(46, 49, 3, 'Sedang', 'https://doaj.org/toc/2549-6778', '2017'),
(47, 49, 2, 'Rendah', 'https://scholar.google.co.id/citations?hl=id&user=JbD6tP0AAAAJ', 'Jumlah Sitasi >25'),
(48, 50, 3, 'Sedang', 'https://doaj.org/toc/2338-0683', '2016'),
(49, 50, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=wE2P5Q8AAAAJ&hl=id', 'Jumlah Sitasi >25'),
(50, 51, 3, 'Sedang', 'https://doaj.org/toc/2338-3119', '2018'),
(51, 51, 2, 'Rendah', 'https://scholar.google.co.id/citations?hl=id&user=E0CtDigAAAAJ', 'Jumlah Sitasi >25'),
(52, 52, 3, 'Sedang', 'https://doaj.org/toc/2502-2377', '2016'),
(53, 52, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=w1OE9FYAAAAJ', 'Jumlah Sitasi >25'),
(54, 56, 3, 'Sedang', 'https://doaj.org/toc/1907-817X', '2017'),
(55, 56, 2, 'Sedang', 'https://scholar.google.co.id/citations?hl=en&user=sSCj99EAAAAJ', 'Jumlah Sitasi >25'),
(56, 57, 3, 'Sedang', 'https://doaj.org/toc/2302-5743', '2012'),
(57, 57, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=zF3-QpgAAAAJ', 'Jumlah Sitasi >25'),
(58, 63, 3, 'Sedang', 'https://doaj.org/toc/1412-9418', '2016'),
(59, 63, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=baLWVVMAAAAJ', '11 - 25'),
(60, 65, 4, 'Sedang', 'http://mjl.clarivate.com/cgi-bin/jrnlst/jlresults.cgi?PC=MASTER&ISSN=2252-4940', '-'),
(61, 65, 3, 'Sedang', 'https://doaj.org/toc/2252-4940', '2013'),
(62, 65, 2, 'Rendah', 'https://scholar.google.com/citations?user=eiaLhA4AAAAJ', 'Jumlah Sitasi >25'),
(63, 71, 3, 'Sedang', 'https://doaj.org/toc/2338-6207', '2016'),
(64, 71, 2, 'Rendah', 'Tidak diset public', 'Jumlah Sitasi >25'),
(65, 72, 3, 'Sedang', 'https://doaj.org/toc/2338-249X', '2016'),
(66, 72, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=gYDv9HsAAAAJ', '11 - 25'),
(67, 74, 3, 'Sedang', 'https://doaj.org/toc/2355-6544', '2015'),
(68, 74, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=FhnvKnAAAAAJ', 'Jumlah Sitasi >25'),
(69, 76, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=zIliVLsAAAAJ', '<=5'),
(70, 77, 3, 'Sedang', 'https://doaj.org/toc/2443-0110', '2017'),
(71, 77, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=W8w-TycAAAAJ', 'Jumlah Sitasi >25'),
(72, 78, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=2nd750wAAAAJ', '<=5'),
(73, 82, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=4s2Tg1sAAAAJ', '<=5'),
(74, 86, 1, 'Tinggi', ' https://www.scopus.com/sourceid/19900191860', '-'),
(75, 86, 4, 'Sedang', 'http://mjl.clarivate.com/cgi-bin/jrnlst/jlresults.cgi?PC=MASTER&ISSN=1978-2993', '-'),
(76, 86, 5, 'Sedang', 'https://www.asean-cites.org/index.php?r=journal%2Fpublic-view&id=491', '-'),
(77, 86, 3, 'Sedang', 'https://doaj.org/toc/1978-2993', '2009'),
(78, 86, 2, 'Rendah', 'https://scholar.google.com/citations?hl=en&user=PadKS_wAAAAJ', 'Jumlah Sitasi >25'),
(79, 88, 3, '--Pilih Kategori--', 'https://doaj.org/toc/2503-2178', '2016'),
(81, 88, 2, 'Rendah', 'https://scholar.google.com/citations?user=08qb3cQAAAAJ&hl=en', '<=5'),
(82, 89, 3, 'Sedang', 'https://doaj.org/toc/2503-0361', '2017'),
(83, 89, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=9IK4qJAAAAAJ&hl=id', 'Jumlah Sitasi >25'),
(84, 91, 2, 'Rendah', 'https://scholar.google.com/citations?user=nvdvx38AAAAJ', '6-10'),
(85, 93, 3, 'Sedang', 'https://doaj.org/toc/2356-0266', '2016'),
(86, 93, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=3PemPzMAAAAJ', 'Jumlah Sitasi >25'),
(87, 94, 2, 'Rendah', 'https://scholar.google.co.id/citations?hl=en&user=4eR2RBMAAAAJ', '<=5'),
(88, 95, 3, 'Sedang', 'https://doaj.org/toc/2407-8751', '2016'),
(89, 95, 2, 'Rendah', 'https://scholar.google.com/citations?hl=en&user=r8OOc3sAAAAJ', 'Jumlah Sitasi >25'),
(90, 97, 3, 'Tinggi', 'https://doaj.org/toc/2528-3111', '2018'),
(91, 112, 3, 'Sedang', 'https://doaj.org/toc/2579-9215', '2018'),
(92, 113, 3, 'Sedang', 'https://doaj.org/toc/2579-4213', '2018'),
(93, 117, 3, 'Sedang', 'https://doaj.org/toc/2460-5921', '2018'),
(94, 117, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=2YFp9SAAAAAJ', 'Jumlah Sitasi >25'),
(95, 119, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=BKoqpTsAAAAJ&hl=id', '<=5'),
(96, 153, 3, 'Sedang', 'https://doaj.org/toc/2338-0403', '2016'),
(97, 153, 2, 'Rendah', 'https://scholar.google.co.id/citations?user=alfvTRgAAAAJ', 'Jumlah Sitasi >25'),
(98, 156, 3, 'Sedang', 'https://doaj.org/toc/2337-375X', '2017');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_sk`
--

CREATE TABLE `jurnal_sk` (
  `kode_js` int(100) NOT NULL,
  `kode_jurnal` int(100) NOT NULL,
  `kode_sk` int(100) NOT NULL,
  `peringkat_sinta` varchar(50) NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_berakhir` date DEFAULT NULL,
  `url_sinta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal_sk`
--

INSERT INTO `jurnal_sk` (`kode_js`, `kode_jurnal`, `kode_sk`, `peringkat_sinta`, `tanggal_mulai`, `tanggal_berakhir`, `url_sinta`) VALUES
(1, 2, 1, 'S2', '2016-11-13', '2021-11-13', 'http://sinta2.ristekdikti.go.id/journals/detail?id=908'),
(2, 3, 2, 'S2', '2015-02-11', '2020-02-11', 'http://sinta2.ristekdikti.go.id/journals/detail/?id=783'),
(3, 4, 1, 'S1', '2016-11-13', '2021-11-13', 'http://sinta2.ristekdikti.go.id/journals/detail/?id=678'),
(4, 5, 1, 'S4', '2016-11-13', '2021-11-13', 'http://sinta2.ristekdikti.go.id/journals/detail/?id=3466'),
(5, 6, 4, 'S3', '2017-04-26', '2022-04-26', '-'),
(6, 7, 4, 'S2', '2017-04-26', '2022-04-26', 'http://sinta2.ristekdikti.go.id/journals/detail?id=956'),
(7, 9, 5, 'S3', '2017-12-19', '2022-12-19', '-'),
(8, 11, 11, 'S2', '2014-04-20', '2019-04-20', '-'),
(9, 13, 2, 'S4', '2015-02-11', '2020-02-11', 'http://sinta2.ristekdikti.go.id/journals/detail?id=3852'),
(10, 14, 1, 'S3', '2016-11-13', '2021-11-13', '-'),
(11, 15, 5, 'S2', '2017-12-19', '2022-12-19', 'http://sinta2.ristekdikti.go.id/journals/detail?id=160'),
(12, 17, 4, 'S2', '2017-04-26', '2022-04-26', 'http://sinta2.ristekdikti.go.id/journals/detail/?id=3652'),
(13, 19, 4, 'S2', '2017-04-26', '2022-04-26', '-'),
(14, 20, 4, 'S3', '2017-04-26', '2022-04-26', '-'),
(18, 26, 5, 'S2', '2017-12-19', '2022-12-19', 'http://sinta2.ristekdikti.go.id/journals/detail/?id=1066'),
(27, 42, 6, 'S2', '2018-07-09', '2023-07-09', 'http://sinta2.ristekdikti.go.id/journals/detail?id=1963'),
(28, 43, 5, 'S2', '2017-12-19', '2022-12-19', 'http://sinta2.ristekdikti.go.id/journals/detail/?id=1033'),
(29, 44, 1, 'S2', '2016-11-13', '2021-11-13', 'http://sinta2.ristekdikti.go.id/journals/detail?id=914'),
(31, 48, 5, 'S2', '2017-12-19', '2022-12-19', 'http://sinta2.ristekdikti.go.id/journals/detail?id=30'),
(32, 49, 5, 'S2', '2017-12-19', '2022-12-19', 'http://sinta2.ristekdikti.go.id/journals/detail/?id=102'),
(35, 52, 5, 'S2', '2017-12-19', '2022-12-19', 'http://sinta2.ristekdikti.go.id/journals/detail/?id=1074'),
(36, 55, 10, 'S3', '2018-12-10', '2023-12-10', '-'),
(43, 65, 1, 'S1', '2016-11-13', '2021-11-13', 'http://sinta2.ristekdikti.go.id/journals/detail/?id=918'),
(46, 74, 4, 'S2', '2017-04-26', '2022-04-26', 'http://sinta2.ristekdikti.go.id/journals/detail?id=933'),
(56, 93, 1, 'S2', '2016-11-13', '2021-11-13', 'http://sinta2.ristekdikti.go.id/journals/detail/?id=912'),
(58, 95, 4, 'S2', '2017-04-26', '2022-04-26', 'http://sinta2.ristekdikti.go.id/journals/detail/?id=925'),
(63, 117, 5, 'S2', '2017-12-19', '2022-12-19', 'http://sinta2.ristekdikti.go.id/journals/detail?id=1070');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kode_kriteria` varchar(32) NOT NULL,
  `urutan` int(11) NOT NULL,
  `jumlah_kuadrat_nilai` float(7,3) NOT NULL,
  `solusi_ideal_positif` float(7,3) NOT NULL,
  `solusi_ideal_negatif` float(7,3) NOT NULL,
  `jumlah_nilai_kriteria` float(7,3) NOT NULL,
  `jumlah_dependence_kriteria` float(7,3) NOT NULL,
  `jumlah_nilai_normalisasi` float(7,3) NOT NULL,
  `bobot_kriteria` float(7,3) NOT NULL,
  `bobot_baru` float(7,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kode_kriteria`, `urutan`, `jumlah_kuadrat_nilai`, `solusi_ideal_positif`, `solusi_ideal_negatif`, `jumlah_nilai_kriteria`, `jumlah_dependence_kriteria`, `jumlah_nilai_normalisasi`, `bobot_kriteria`, `bobot_baru`) VALUES
('K1', 1, 40.000, 0.019, 0.013, 25.000, 1.000, 0.329, 0.041, 0.041),
('K2', 2, 54.000, 0.029, 0.015, 19.000, 1.000, 0.428, 0.054, 0.054),
('K3', 3, 968.000, 0.092, 0.054, 6.583, 1.417, 1.204, 0.150, 0.169),
('K4', 4, 5704.000, 0.171, 0.096, 2.870, 1.197, 2.809, 0.351, 0.331),
('K5', 5, 600.250, 0.053, 0.027, 8.333, 1.290, 0.962, 0.120, 0.109),
('K6', 6, 256.250, 0.049, 0.033, 11.000, 1.172, 0.748, 0.094, 0.097),
('K7', 7, 153.250, 0.032, 0.024, 14.500, 1.125, 0.559, 0.070, 0.066),
('K8', 8, 469.000, 0.068, 0.031, 8.333, 1.074, 0.962, 0.120, 0.134);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_details`
--

CREATE TABLE `kriteria_details` (
  `id` int(11) NOT NULL,
  `kode_kriteria` varchar(32) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kependekan` varchar(3) NOT NULL,
  `deskripsi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_details`
--

INSERT INTO `kriteria_details` (`id`, `kode_kriteria`, `nama`, `kependekan`, `deskripsi`) VALUES
(1, 'K1', 'Penamaan Jurnal Ilmiah', 'PJI', 'Jurnal ilmiah menggunakan nama yang bermakna, tepat, dan singkat sehingga mudah diacu. Dengan memperhatikan tradisi bidang ilmu terkait, diperlukan keselarasan antara nama jurnal ilmiah dan disiplin ilmu (yang dapat juga meliputi bidang multidisiplin atau antardisiplin), bidang akademik, atau profesi ilmiah.'),
(2, 'K2', 'Pranata Penerbit ', 'PP', 'Pratana atau lembaga penerbit (organisasi profesi, perguruan tinggi, lembaga penelitian dan pengembangan, dan atau institusi yang diberi kewenangan untuk penerbitan jurnal) memiliki kedudukan sebagai badan hukum sehingga mampu menjamin kesinambungan dana dan naungan hukum.'),
(3, 'K3', 'Penyuntingan dan Manajemen Jurnal', 'PMJ', 'asd'),
(4, 'K4', 'Substansi Artikel', 'SA', ''),
(5, 'K5', 'Gaya Penulisan ', 'GP', ''),
(6, 'K6', 'Penampilan ', 'PNM', ''),
(7, 'K7', 'Keberkalaan ', 'KBR', ''),
(8, 'K8', 'Penyebarluasan', 'PYB', 'ads');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `kode_lab` int(50) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `kode_departemen` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`kode_lab`, `nama`, `kode_departemen`) VALUES
(0, 'Embedded System Laboratory', 3),
(2, 'Software Engineering Laboratory', 3),
(3, 'Security and Network Laboratory', 3),
(4, 'Multimedia Laboratory', 3);

-- --------------------------------------------------------

--
-- Table structure for table `lembaga`
--

CREATE TABLE `lembaga` (
  `kode_lembaga` int(50) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lembaga`
--

INSERT INTO `lembaga` (`kode_lembaga`, `nama`) VALUES
(1, 'Center of Biomass and Renewable Energy (CBIORE)'),
(2, 'Lembaga Penelitian dan Pengabdian Masyarakat (LPPM)'),
(3, 'Waste Resources Research Center (WRRC)'),
(5, 'Perpustakaan Undip'),
(6, 'Membrane Research Center (MeR-C)');

-- --------------------------------------------------------

--
-- Table structure for table `log_penilaian`
--

CREATE TABLE `log_penilaian` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_alternatif` varchar(32) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `event` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_penilaian`
--

INSERT INTO `log_penilaian` (`id`, `id_user`, `kode_alternatif`, `waktu`, `event`) VALUES
(1, 23, 'A1', '2020-02-29 05:55:23', 'Nilai Alternatif'),
(2, 23, 'A1', '2020-02-29 06:06:38', 'Update Nilai Alternatif'),
(3, 23, 'A2', '2020-02-29 06:12:17', 'Nilai Alternatif'),
(4, 23, 'A3', '2020-02-29 13:09:42', 'Nilai Alternatif'),
(5, 23, 'A6', '2020-03-23 05:07:48', 'Nilai Alternatif'),
(6, 23, 'A6', '2020-03-23 05:08:18', 'Update Nilai Alternatif'),
(7, 23, 'A7', '2020-03-24 04:03:24', 'Nilai Alternatif');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatif`
--

CREATE TABLE `nilai_alternatif` (
  `id` int(11) NOT NULL,
  `kode_alternatif` varchar(32) NOT NULL,
  `kode_kriteria` varchar(32) NOT NULL,
  `nilai` float(7,3) NOT NULL,
  `kuadrat_nilai` float(7,3) NOT NULL,
  `normalisasi` float(7,3) NOT NULL,
  `normalisasi_terbobot` float(7,3) NOT NULL,
  `jarak_solusi_positif` float(7,6) NOT NULL,
  `jarak_solusi_negatif` float(7,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_alternatif`
--

INSERT INTO `nilai_alternatif` (`id`, `kode_alternatif`, `kode_kriteria`, `nilai`, `kuadrat_nilai`, `normalisasi`, `normalisasi_terbobot`, `jarak_solusi_positif`, `jarak_solusi_negatif`) VALUES
(9, 'A1', 'K1', 2.000, 4.000, 0.316, 0.013, 0.000036, 0.000000),
(10, 'A1', 'K2', 2.000, 4.000, 0.272, 0.015, 0.000196, 0.000000),
(11, 'A1', 'K3', 10.000, 100.000, 0.321, 0.054, 0.001444, 0.000000),
(12, 'A1', 'K4', 22.000, 484.000, 0.291, 0.096, 0.005625, 0.000000),
(13, 'A1', 'K5', 6.000, 36.000, 0.245, 0.027, 0.000676, 0.000000),
(14, 'A1', 'K6', 5.500, 30.250, 0.344, 0.033, 0.000256, 0.000000),
(15, 'A1', 'K7', 4.500, 20.250, 0.364, 0.024, 0.000064, 0.000000),
(16, 'A1', 'K8', 5.000, 25.000, 0.231, 0.031, 0.001369, 0.000000),
(17, 'A2', 'K1', 3.000, 9.000, 0.474, 0.019, 0.000000, 0.000036),
(18, 'A2', 'K2', 3.000, 9.000, 0.408, 0.022, 0.000049, 0.000049),
(19, 'A2', 'K3', 13.000, 169.000, 0.418, 0.071, 0.000441, 0.000289),
(20, 'A2', 'K4', 33.000, 1089.000, 0.437, 0.145, 0.000676, 0.002401),
(21, 'A2', 'K5', 11.500, 132.250, 0.469, 0.051, 0.000004, 0.000576),
(22, 'A2', 'K6', 7.000, 49.000, 0.437, 0.042, 0.000049, 0.000081),
(23, 'A2', 'K7', 5.000, 25.000, 0.404, 0.027, 0.000025, 0.000009),
(24, 'A2', 'K8', 9.000, 81.000, 0.416, 0.056, 0.000144, 0.000625),
(25, 'A3', 'K1', 3.000, 9.000, 0.474, 0.019, 0.000000, 0.000036),
(26, 'A3', 'K2', 3.000, 9.000, 0.408, 0.022, 0.000049, 0.000049),
(27, 'A3', 'K3', 11.000, 121.000, 0.354, 0.060, 0.001024, 0.000036),
(28, 'A3', 'K4', 33.000, 1089.000, 0.437, 0.145, 0.000676, 0.002401),
(29, 'A3', 'K5', 12.000, 144.000, 0.490, 0.053, 0.000000, 0.000676),
(30, 'A3', 'K6', 7.000, 49.000, 0.437, 0.042, 0.000049, 0.000081),
(31, 'A3', 'K7', 6.000, 36.000, 0.485, 0.032, 0.000000, 0.000064),
(32, 'A3', 'K8', 11.000, 121.000, 0.508, 0.068, 0.000000, 0.001369),
(41, 'A6', 'K1', 3.000, 9.000, 0.474, 0.019, 0.000000, 0.000036),
(42, 'A6', 'K2', 4.000, 16.000, 0.544, 0.029, 0.000000, 0.000196),
(43, 'A6', 'K3', 17.000, 289.000, 0.546, 0.092, 0.000000, 0.001444),
(44, 'A6', 'K4', 39.000, 1521.000, 0.516, 0.171, 0.000000, 0.005625),
(45, 'A6', 'K5', 12.000, 144.000, 0.490, 0.053, 0.000000, 0.000676),
(46, 'A6', 'K6', 8.000, 64.000, 0.500, 0.049, 0.000000, 0.000256),
(47, 'A6', 'K7', 6.000, 36.000, 0.485, 0.032, 0.000000, 0.000064),
(48, 'A6', 'K8', 11.000, 121.000, 0.508, 0.068, 0.000000, 0.001369),
(49, 'A7', 'K1', 3.000, 9.000, 0.474, 0.019, 0.000000, 0.000036),
(50, 'A7', 'K2', 4.000, 16.000, 0.544, 0.029, 0.000000, 0.000196),
(51, 'A7', 'K3', 17.000, 289.000, 0.546, 0.092, 0.000000, 0.001444),
(52, 'A7', 'K4', 39.000, 1521.000, 0.516, 0.171, 0.000000, 0.005625),
(53, 'A7', 'K5', 12.000, 144.000, 0.490, 0.053, 0.000000, 0.000676),
(54, 'A7', 'K6', 8.000, 64.000, 0.500, 0.049, 0.000000, 0.000256),
(55, 'A7', 'K7', 6.000, 36.000, 0.485, 0.032, 0.000000, 0.000064),
(56, 'A7', 'K8', 11.000, 121.000, 0.508, 0.068, 0.000000, 0.001369);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_indikator`
--

CREATE TABLE `nilai_indikator` (
  `id_penilaian` varchar(50) NOT NULL,
  `kode_kriteria` varchar(32) NOT NULL,
  `kode_indikator` varchar(32) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `penilaian` varchar(255) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_indikator`
--

INSERT INTO `nilai_indikator` (`id_penilaian`, `kode_kriteria`, `kode_indikator`, `nama`, `penilaian`, `nilai`) VALUES
('K1-1-A', 'K1', 'K1-1', 'Penamaan Jurnal Ilmiah', 'Spesifik sehingga mencerminkan super spesialisasi atau spesialisasi disiplin ilmu tertentu', 3),
('K1-1-B', 'K1', 'K1-1', 'Penamaan Jurnal Ilmiah', 'Cukup spesifik tetapi meluas mencakup bidang ilmu', 2),
('K1-1-C', 'K1', 'K1-1', 'Penamaan Jurnal Ilmiah', 'Kurang spesifik dan bersifat umum', 1),
('K1-1-D', 'K1', 'K1-1', 'Penamaan Jurnal Ilmiah', 'Tidak spesifik dan/atau memakai nama lembaga/lokasi lokal ', 0),
('K2-1-A', 'K2', 'K2-1', 'Pranata Penerbit', 'Organisasi profesi ilmiah', 4),
('K2-1-B', 'K2', 'K2-1', 'Pranata Penerbit', 'Organisasi profesi ilmiah bekerja sama dengan perguruan tinggi dan/atau lembaga penelitian dan pengembangan/kementerian/non kementerian ', 3),
('K2-1-C', 'K2', 'K2-1', 'Pranata Penerbit', 'Perguruan tinggi, lembaga penelitian dan pengembangan', 2),
('K2-1-D', 'K2', 'K2-1', 'Pranata Penerbit', 'Penerbit selain diatas', 1),
('K3-1-A', 'K3', 'K3-1', 'Pelibatan Mitra Bestari', 'Melibatkan mitra bestari berkualifikasi internasional >50% dari berbagai institusi ', 5),
('K3-1-B', 'K3', 'K3-1', 'Pelibatan Mitra Bestari', 'Melibatkan mitra bestari berkualifikasi nasional >50% dari berbagai institusi ', 3),
('K3-1-C', 'K3', 'K3-1', 'Pelibatan Mitra Bestari', 'Melibatkan mitra bestari setempat ', 1),
('K3-1-D', 'K3', 'K3-1', 'Pelibatan Mitra Bestari', 'Tidak melibatkan mitra bestari', 0),
('K3-2-A', 'K3', 'K3-2', 'Mutu Penyuntingan Substansi', 'Baik sekali. Mitra bestari secara ketat menelaah naskah, memberi catatan dan saran perbaikan substantif sehingga kespesialisan artikel jurnal terjaga', 2),
('K3-2-B', 'K3', 'K3-2', 'Mutu Penyuntingan Substansi', 'Baik. Mitra bestari membantu menelaah naskah, memberi catatan, dan data perbaikan seperlunya', 1),
('K3-2-C', 'K3', 'K3-2', 'Mutu Penyuntingan Substansi', 'Tidak baik. Mitra bestari tidak nyata dampak kinerjanya.', 0),
('K3-3-A', 'K3', 'K3-3', 'Kualifikasi Dewan Penyunting', 'Lebih dari 50% penyunting pernah menulis artikel di jurnal ilmiah internasional ', 3),
('K3-3-B', 'K3', 'K3-3', 'Kualifikasi Dewan Penyunting', 'Kurang dari 50% penyunting pernah menulis artikel di jurnal ilmiah internasional ', 2),
('K3-3-C', 'K3', 'K3-3', 'Kualifikasi Dewan Penyunting', 'Lainnya (belum berpengalaman menulis artikel di jurnal ilmiah internasional)', 1),
('K3-4-A', 'K3', 'K3-4', 'Petunjuk Penulisan Bagi Penulis', 'Terinci, lengkap, dan jelas secara substantif, sistematis dan tersedia contoh atau template', 2),
('K3-4-B', 'K3', 'K3-4', 'Petunjuk Penulisan Bagi Penulis', 'Kurang lengkap dan kurang jelas', 1),
('K3-4-C', 'K3', 'K3-4', 'Petunjuk Penulisan Bagi Penulis', 'Tidak ada', 0),
('K3-5-A', 'K3', 'K3-5', 'Mutu Penyuntingan Gaya dan Format', 'Baik sekali dan sangat konsisten', 2),
('K3-5-B', 'K3', 'K3-5', 'Mutu Penyuntingan Gaya dan Format', 'Baik dan konsisten', 1),
('K3-5-C', 'K3', 'K3-5', 'Mutu Penyuntingan Gaya dan Format', 'Tidak baik atau tidak konsisten', 0),
('K3-6-A', 'K3', 'K3-6', 'Manajemen Jurnal Ilmiah', 'Menggunakan manajemen penyuntingan sepenuhnya secara daring', 3),
('K3-6-B', 'K3', 'K3-6', 'Manajemen Jurnal Ilmiah', 'Menggunakan manajemen penyuntingan secara kombinasi antara daring dan surel', 2),
('K3-6-C', 'K3', 'K3-6', 'Manajemen Jurnal Ilmiah', 'Menggunakan manajemen penyuntingan melalui surel saja', 1),
('K4-1-A', 'K4', 'K4-1', 'Cakupan Keilmuan', 'Superspesialis, misalnya: taksonomi jamur', 4),
('K4-1-B', 'K4', 'K4-1', 'Cakupan Keilmuan', 'Spesialis, misalnya: fisiologi tumbuhan ', 3),
('K4-1-C', 'K4', 'K4-1', 'Cakupan Keilmuan', 'Cabang ilmu, misalnya: botani', 2),
('K4-1-D', 'K4', 'K4-1', 'Cakupan Keilmuan', 'Disiplin ilmu, misalnya: biologi', 1),
('K4-1-E', 'K4', 'K4-1', 'Cakupan Keilmuan', 'Bunga rampai dan kombinasi berbagai disiplin ilmu, misalnya: MIPA atau sains alam ', 0.5),
('K4-2-A', 'K4', 'K4-2', 'Aspirasi Wawasan', 'Internasional ', 6),
('K4-2-B', 'K4', 'K4-2', 'Aspirasi Wawasan', 'Regional ', 4),
('K4-2-C', 'K4', 'K4-2', 'Aspirasi Wawasan', 'Nasional ', 3),
('K4-2-D', 'K4', 'K4-2', 'Aspirasi Wawasan', 'Kawasan', 1),
('K4-2-E', 'K4', 'K4-2', 'Aspirasi Wawasan', 'Lokal', 0.5),
('K4-3-A', 'K4', 'K4-3', 'Orisinalitas Karya', 'Memuat artikel yang berisi karya orisinal dan mempunyai kebaruan/memberikan kontribusi ilmiah sangat tinggi', 6),
('K4-3-B', 'K4', 'K4-3', 'Orisinalitas Karya', 'Memuat artikel yang berisi karya orisinal dan mempunyai kebaruan/memberikan kontribusi ilmiah tinggi', 4),
('K4-3-C', 'K4', 'K4-3', 'Orisinalitas Karya', 'Memuat artikel yang berisi karya orisinal dan mempunyai kebaruan/memberikan kontribusi ilmiah cukup ', 2),
('K4-3-D', 'K4', 'K4-3', 'Orisinalitas Karya', 'Memuat artikel yang berisi karya tidak orisinal dan/atau tidak mempunyai kebaruan/memberikan kontribusi ilmiah', 0.5),
('K4-4-A', 'K4', 'K4-4', 'Makna Sumbangan Bagi Kemajuan Ilmu', 'Sangat nyata', 3),
('K4-4-B', 'K4', 'K4-4', 'Makna Sumbangan Bagi Kemajuan Ilmu', 'Nyata', 2),
('K4-4-C', 'K4', 'K4-4', 'Makna Sumbangan Bagi Kemajuan Ilmu', 'Kurang Nyata', 1),
('K4-5-A', 'K4', 'K4-5', 'Dampak Ilmiah', 'Sangat tinggi (jumlah sitasi> 25) ', 5),
('K4-5-B', 'K4', 'K4-5', 'Dampak Ilmiah', 'Tinggi (jumlah sitasi 11-25)', 4),
('K4-5-C', 'K4', 'K4-5', 'Dampak Ilmiah', 'Cukup (jumlah sitasi 6-10)', 3),
('K4-5-D', 'K4', 'K4-5', 'Dampak Ilmiah', 'Kurang (jumlah sitasi 1-5)', 1),
('K4-5-E', 'K4', 'K4-5', 'Dampak Ilmiah', 'Tidak berdampak (jumlah sitasi 0) ', 0),
('K4-6-A', 'K4', 'K4-6', 'Nisbah Pustaka Acuan Primer Terhadap Pustaka Acuan Lainnya', '> 80 % ', 3),
('K4-6-B', 'K4', 'K4-6', 'Nisbah Pustaka Acuan Primer Terhadap Pustaka Acuan Lainnya', '40-80 %', 2),
('K4-6-C', 'K4', 'K4-6', 'Nisbah Pustaka Acuan Primer Terhadap Pustaka Acuan Lainnya', '< 40 %', 1),
('K4-7-A', 'K4', 'K4-7', 'Derajat Kemutakhiran Pustaka Acuan', '> 80 % ', 4),
('K4-7-B', 'K4', 'K4-7', 'Derajat Kemutakhiran Pustaka Acuan', '40-80 % ', 2),
('K4-7-C', 'K4', 'K4-7', 'Derajat Kemutakhiran Pustaka Acuan', '< 40 % ', 1),
('K4-8-A', 'K4', 'K4-8', 'Analisis dan Sintetis', 'Sangat baik', 5),
('K4-8-B', 'K4', 'K4-8', 'Analisis dan Sintetis', 'Baik', 3),
('K4-8-C', 'K4', 'K4-8', 'Analisis dan Sintetis', 'Cukup', 1),
('K4-9-A', 'K4', 'K4-9', 'Penyimpulan', 'Sangat baik', 3),
('K4-9-B', 'K4', 'K4-9', 'Penyimpulan', 'Baik', 2),
('K4-9-C', 'K4', 'K4-9', 'Penyimpulan', 'Cukup', 1),
('K5-1-A', 'K5', 'K5-1', 'Keefektifan Judul Artikel', 'Lugas dan informatif', 1),
('K5-1-B', 'K5', 'K5-1', 'Keefektifan Judul Artikel', 'Lugas tetapi kurang informatif atau sebaliknya', 0.5),
('K5-1-C', 'K5', 'K5-1', 'Keefektifan Judul Artikel', 'Tidak lugas dan tidak informatif', 0),
('K5-2-A', 'K5', 'K5-2', 'Pencantuman Nama Penulis dan Lembaga Penulis', 'Lengkap dan konsisten ', 1),
('K5-2-B', 'K5', 'K5-2', 'Pencantuman Nama Penulis dan Lembaga Penulis', 'Lengkap tetapi tidak konsisten', 0.5),
('K5-2-C', 'K5', 'K5-2', 'Pencantuman Nama Penulis dan Lembaga Penulis', 'Tidak lengkap dan tidak konsisten', 0),
('K5-3-A', 'K5', 'K5-3', 'Abstrak', 'Abstrak yang jelas dan ringkas dalam bahasa Inggris dan/atau Bahasa Indonesia', 2),
('K5-3-B', 'K5', 'K5-3', 'Abstrak', 'Abstrak kurang jelas dan ringkas atau hanya dalam bahasa Inggris atau dalam Bahasa Indonesia saja', 1),
('K5-3-C', 'K5', 'K5-3', 'Abstrak', 'Abstrak tidak jelas dan bahasa tidak baku', 0.5),
('K5-4-A', 'K5', 'K5-4', 'Kata Kunci', 'Ada, konsisten dan mencerminkan konsep penting dalam artikel', 1),
('K5-4-B', 'K5', 'K5-4', 'Kata Kunci', 'Ada tetapi kurang konsisten atau kurang mencerminkan konsep penting dalam artikel', 0.5),
('K5-4-C', 'K5', 'K5-4', 'Kata Kunci', 'Tidak ada', 0),
('K5-5-A', 'K5', 'K5-5', 'Sistematika Penulisan Artikel', 'Lengkap dan bersistem baik', 1),
('K5-5-B', 'K5', 'K5-5', 'Sistematika Penulisan Artikel', 'Lengkap tetapi tidak bersistem baik', 0.5),
('K5-5-C', 'K5', 'K5-5', 'Sistematika Penulisan Artikel', 'Kurang lengkap dan tidak bersistem', 0),
('K5-6-A', 'K5', 'K5-6', 'Pemanfaatan Instrumen Pendukung', 'Informatif dan komplementer \r\n', 1),
('K5-6-B', 'K5', 'K5-6', 'Pemanfaatan Instrumen Pendukung', 'Kurang informatif atau komplementer', 0.5),
('K5-6-C', 'K5', 'K5-6', 'Pemanfaatan Instrumen Pendukung', 'Tidak termanfaatkan', 0),
('K5-7-A', 'K5', 'K5-7', 'Sistem Pengacuan Pustaka dan Pengutipan', 'Baku dan konsisten dan menggunakan aplikasi pengutipan standar\r\n', 1),
('K5-7-B', 'K5', 'K5-7', 'Sistem Pengacuan Pustaka dan Pengutipan', 'Baku dan konsisten tetapi tidak menggunakan aplikasi pengutipan standar', 0.5),
('K5-7-C', 'K5', 'K5-7', 'Sistem Pengacuan Pustaka dan Pengutipan', 'Tidak baku dan tidak konsisten', 0),
('K5-8-A', 'K5', 'K5-8', 'Penyusunan Daftar Pustaka', 'Baku dan konsisten dan menggunakan aplikasi pengutipan standar', 2),
('K5-8-B', 'K5', 'K5-8', 'Penyusunan Daftar Pustaka', 'Baku dan konsisten, tetapi tidak menggunakan aplikasi pengutipan standar', 1),
('K5-8-C', 'K5', 'K5-8', 'Penyusunan Daftar Pustaka', 'Tidak baku dan tidak konsisten', 0),
('K5-9-A', 'K5', 'K5-9', 'Penggunaan istilah dan kebahasaan', 'Berbahasa Indonesia atau berbahasa resmi PBB yang baik dan benar', 2),
('K5-9-B', 'K5', 'K5-9', 'Penggunaan istilah dan kebahasaan', 'Berbahasa Indonesia atau berbahasa resmi PBB yang cukup baik dan benar', 1),
('K5-9-C', 'K5', 'K5-9', 'Penggunaan istilah dan kebahasaan', 'Berbahasa yang buruk', 0),
('K6-1-A', 'K6', 'K6-1', 'Ukuran Bidang Tulisan', 'Konsisten berukuran A4 (210 mm x 297 mm)', 1),
('K6-1-B', 'K6', 'K6-1', 'Ukuran Bidang Tulisan', 'Konsisten berukuran lainnya', 0.5),
('K6-1-C', 'K6', 'K6-1', 'Ukuran Bidang Tulisan', 'Tidak konsisten', 0),
('K6-2-A', 'K6', 'K6-2', 'Tata Letak', 'Konsisten antar-artikel dan antar-terbitan', 1),
('K6-2-B', 'K6', 'K6-2', 'Tata Letak', 'Kurang konsisten', 0.5),
('K6-2-C', 'K6', 'K6-2', 'Tata Letak', 'Tidak konsisten ', 0),
('K6-3-A', 'K6', 'K6-3', 'Tipografi', 'Konsisten antar-artikel dan antar-terbitan', 1),
('K6-3-B', 'K6', 'K6-3', 'Tipografi', 'Kurang konsisten', 0.5),
('K6-3-C', 'K6', 'K6-3', 'Tipografi', 'Tidak konsisten', 0),
('K6-4-A', 'K6', 'K6-4', 'Resolusi Dokumen', 'Konsisten dan bermutu resolusi tinggi', 2),
('K6-4-B', 'K6', 'K6-4', 'Resolusi Dokumen', 'Konsisten dan bermutu resolusi rendah', 1),
('K6-4-C', 'K6', 'K6-4', 'Resolusi Dokumen', 'Tidak konsisten', 0.5),
('K6-5-A', 'K6', 'K6-5', 'Jumlah Halaman Per Volume', '>= 500 halaman', 2),
('K6-5-B', 'K6', 'K6-5', 'Jumlah Halaman Per Volume', '201-499 halaman', 1),
('K6-5-C', 'K6', 'K6-5', 'Jumlah Halaman Per Volume', '100-200 halaman', 0.5),
('K6-5-D', 'K6', 'K6-5', 'Jumlah Halaman Per Volume', '<100 halaman', 0),
('K6-6-A', 'K6', 'K6-6', 'Desain Tampilan Laman dan Desain Sampul', 'Berciri khas dan informatif', 1),
('K6-6-B', 'K6', 'K6-6', 'Desain Tampilan Laman dan Desain Sampul', 'Tidak berciri khas dan tidak informatif', 0),
('K7-1-A', 'K7', 'K7-1', 'Jadwal Terbit', '>80% terbitan sesuai dengan periode yang ditentukan', 2),
('K7-1-B', 'K7', 'K7-1', 'Jadwal Terbit', '40-80 % terbitan sesuai dengan periode yang ditentukan', 1),
('K7-1-C', 'K7', 'K7-1', 'Jadwal Terbit', '<40% terbitan sesuai dengan periode yang ditentukan', 0),
('K7-2-A', 'K7', 'K7-2', 'Penomoran Terbitan', 'Baku dan bersistem', 2),
('K7-2-B', 'K7', 'K7-2', 'Penomoran Terbitan', 'Tidak baku tetapi bersistem', 1),
('K7-2-C', 'K7', 'K7-2', 'Penomoran Terbitan', 'Tidak bersistem dan tidak baku', 0),
('K7-3-A', 'K7', 'K7-3', 'Penomoran Halaman', 'Berurut dalam satu volume ', 1),
('K7-3-B', 'K7', 'K7-3', 'Penomoran Halaman', 'Tiap nomor dimulai dengan halaman baru', 0),
('K7-4-A', 'K7', 'K7-4', 'Indeks Tiap Volume', 'Berindeks subjek dan berindeks penulis yang terperinci\r\n', 1),
('K7-4-B', 'K7', 'K7-4', 'Indeks Tiap Volume', 'Berindeks subjek saja, atau berindeks penulis saja\r\n', 0.5),
('K7-4-C', 'K7', 'K7-4', 'Indeks Tiap Volume', 'Tidak berindeks', 0),
('K8-1-A', 'K8', 'K8-1', 'Jumlah Kunjungan Unik ke Halaman', '>50 kunjungan unik ke laman rerata per hari untuk jurnal yang terbit ', 4),
('K8-1-B', 'K8', 'K8-1', 'Jumlah Kunjungan Unik ke Halaman', '10-50 kunjungan unik ke laman rerata per hari untuk jurnal yang terbit ', 2),
('K8-1-C', 'K8', 'K8-1', 'Jumlah Kunjungan Unik ke Halaman', '<10 kunjungan unik ke laman rerata per hari untuk jurnal yang terbit', 1),
('K8-2-A', 'K8', 'K8-2', 'Pencantuman di Pengindeks Internasional Bereputasi', 'Tercantum di lembaga pengindeks internasional bereputasi tinggi ', 5),
('K8-2-B', 'K8', 'K8-2', 'Pencantuman di Pengindeks Internasional Bereputasi', 'Tercantum dalam lembaga pengindeks internasional bereputasi sedang', 3),
('K8-2-C', 'K8', 'K8-2', 'Pencantuman di Pengindeks Internasional Bereputasi', 'Tercantum dalam lembaga pengindeks internasional bereputasi rendah', 1),
('K8-3-A', 'K8', 'K8-3', 'Alamat atau Identitas Unik', 'Memiliki DOI setiap artikel', 2),
('K8-3-B', 'K8', 'K8-3', 'Alamat atau Identitas Unik', 'Memiliki alamat laman yang permanen setiap artikel', 1),
('K8-3-C', 'K8', 'K8-3', 'Alamat atau Identitas Unik', 'Tidak memiliki DOI atau alamat laman permanen', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_murni`
--

CREATE TABLE `nilai_murni` (
  `id` int(11) NOT NULL,
  `kode_alternatif` varchar(32) NOT NULL,
  `kode_indikator` varchar(32) NOT NULL,
  `nilai` double NOT NULL,
  `catatan` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_murni`
--

INSERT INTO `nilai_murni` (`id`, `kode_alternatif`, `kode_indikator`, `nilai`, `catatan`) VALUES
(40, 'A1', 'K1-1', 2, ''),
(41, 'A1', 'K2-1', 2, ''),
(42, 'A1', 'K3-1', 1, ''),
(43, 'A1', 'K3-2', 1, ''),
(44, 'A1', 'K3-3', 2, ''),
(45, 'A1', 'K3-4', 2, ''),
(46, 'A1', 'K3-5', 2, ''),
(47, 'A1', 'K3-6', 2, ''),
(48, 'A1', 'K4-1', 3, ''),
(49, 'A1', 'K4-2', 3, ''),
(50, 'A1', 'K4-3', 2, ''),
(51, 'A1', 'K4-4', 2, ''),
(52, 'A1', 'K4-5', 3, ''),
(53, 'A1', 'K4-6', 2, ''),
(54, 'A1', 'K4-7', 2, ''),
(55, 'A1', 'K4-8', 3, ''),
(56, 'A1', 'K4-9', 2, ''),
(57, 'A1', 'K5-1', 0.5, ''),
(58, 'A1', 'K5-2', 0.5, ''),
(59, 'A1', 'K5-3', 1, ''),
(60, 'A1', 'K5-4', 0.5, ''),
(61, 'A1', 'K5-5', 0.5, ''),
(62, 'A1', 'K5-6', 0.5, ''),
(63, 'A1', 'K5-7', 0.5, ''),
(64, 'A1', 'K5-8', 1, ''),
(65, 'A1', 'K5-9', 1, ''),
(66, 'A1', 'K6-1', 0.5, ''),
(67, 'A1', 'K6-2', 0.5, ''),
(68, 'A1', 'K6-3', 1, ''),
(69, 'A1', 'K6-4', 2, ''),
(70, 'A1', 'K6-5', 0.5, ''),
(71, 'A1', 'K6-6', 1, ''),
(72, 'A1', 'K7-1', 1, ''),
(73, 'A1', 'K7-2', 2, ''),
(74, 'A1', 'K7-3', 1, ''),
(75, 'A1', 'K7-4', 0.5, ''),
(76, 'A1', 'K8-1', 2, ''),
(77, 'A1', 'K8-2', 3, ''),
(78, 'A1', 'K8-3', 0, ''),
(79, 'A2', 'K1-1', 3, ''),
(80, 'A2', 'K2-1', 3, ''),
(81, 'A2', 'K3-1', 3, ''),
(82, 'A2', 'K3-2', 2, ''),
(83, 'A2', 'K3-3', 2, ''),
(84, 'A2', 'K3-4', 2, ''),
(85, 'A2', 'K3-5', 1, ''),
(86, 'A2', 'K3-6', 3, ''),
(87, 'A2', 'K4-1', 3, ''),
(88, 'A2', 'K4-2', 6, ''),
(89, 'A2', 'K4-3', 4, ''),
(90, 'A2', 'K4-4', 2, ''),
(91, 'A2', 'K4-5', 5, ''),
(92, 'A2', 'K4-6', 3, ''),
(93, 'A2', 'K4-7', 2, ''),
(94, 'A2', 'K4-8', 5, ''),
(95, 'A2', 'K4-9', 3, ''),
(96, 'A2', 'K5-1', 0.5, ''),
(97, 'A2', 'K5-2', 1, ''),
(98, 'A2', 'K5-3', 2, ''),
(99, 'A2', 'K5-4', 1, ''),
(100, 'A2', 'K5-5', 1, ''),
(101, 'A2', 'K5-6', 1, ''),
(102, 'A2', 'K5-7', 1, ''),
(103, 'A2', 'K5-8', 2, ''),
(104, 'A2', 'K5-9', 2, ''),
(105, 'A2', 'K6-1', 1, ''),
(106, 'A2', 'K6-2', 1, ''),
(107, 'A2', 'K6-3', 1, ''),
(108, 'A2', 'K6-4', 2, ''),
(109, 'A2', 'K6-5', 1, ''),
(110, 'A2', 'K6-6', 1, ''),
(111, 'A2', 'K7-1', 1, ''),
(112, 'A2', 'K7-2', 2, ''),
(113, 'A2', 'K7-3', 1, ''),
(114, 'A2', 'K7-4', 1, ''),
(115, 'A2', 'K8-1', 4, ''),
(116, 'A2', 'K8-2', 5, ''),
(117, 'A2', 'K8-3', 0, ''),
(118, 'A3', 'K1-1', 3, ''),
(119, 'A3', 'K2-1', 3, ''),
(120, 'A3', 'K3-1', 3, ''),
(121, 'A3', 'K3-2', 1, ''),
(122, 'A3', 'K3-3', 2, ''),
(123, 'A3', 'K3-4', 2, ''),
(124, 'A3', 'K3-5', 1, ''),
(125, 'A3', 'K3-6', 2, ''),
(126, 'A3', 'K4-1', 3, ''),
(127, 'A3', 'K4-2', 4, ''),
(128, 'A3', 'K4-3', 4, ''),
(129, 'A3', 'K4-4', 2, ''),
(130, 'A3', 'K4-5', 5, ''),
(131, 'A3', 'K4-6', 3, ''),
(132, 'A3', 'K4-7', 4, ''),
(133, 'A3', 'K4-8', 5, ''),
(134, 'A3', 'K4-9', 3, ''),
(135, 'A3', 'K5-1', 1, ''),
(136, 'A3', 'K5-2', 1, ''),
(137, 'A3', 'K5-3', 2, ''),
(138, 'A3', 'K5-4', 1, ''),
(139, 'A3', 'K5-5', 1, ''),
(140, 'A3', 'K5-6', 1, ''),
(141, 'A3', 'K5-7', 1, ''),
(142, 'A3', 'K5-8', 2, ''),
(143, 'A3', 'K5-9', 2, ''),
(144, 'A3', 'K6-1', 1, ''),
(145, 'A3', 'K6-2', 1, ''),
(146, 'A3', 'K6-3', 1, ''),
(147, 'A3', 'K6-4', 2, ''),
(148, 'A3', 'K6-5', 1, ''),
(149, 'A3', 'K6-6', 1, ''),
(150, 'A3', 'K7-1', 2, ''),
(151, 'A3', 'K7-2', 2, ''),
(152, 'A3', 'K7-3', 1, ''),
(153, 'A3', 'K7-4', 1, ''),
(154, 'A3', 'K8-1', 4, ''),
(155, 'A3', 'K8-2', 5, ''),
(156, 'A3', 'K8-3', 2, ''),
(196, 'A6', 'K1-1', 3, ''),
(197, 'A6', 'K2-1', 4, ''),
(198, 'A6', 'K3-1', 5, ''),
(199, 'A6', 'K3-2', 2, ''),
(200, 'A6', 'K3-3', 3, ''),
(201, 'A6', 'K3-4', 2, ''),
(202, 'A6', 'K3-5', 2, ''),
(203, 'A6', 'K3-6', 3, ''),
(204, 'A6', 'K4-1', 4, ''),
(205, 'A6', 'K4-2', 6, ''),
(206, 'A6', 'K4-3', 6, ''),
(207, 'A6', 'K4-4', 3, ''),
(208, 'A6', 'K4-5', 5, ''),
(209, 'A6', 'K4-6', 3, ''),
(210, 'A6', 'K4-7', 4, ''),
(211, 'A6', 'K4-8', 5, ''),
(212, 'A6', 'K4-9', 3, ''),
(213, 'A6', 'K5-1', 1, ''),
(214, 'A6', 'K5-2', 1, ''),
(215, 'A6', 'K5-3', 2, ''),
(216, 'A6', 'K5-4', 1, ''),
(217, 'A6', 'K5-5', 1, ''),
(218, 'A6', 'K5-6', 1, ''),
(219, 'A6', 'K5-7', 1, ''),
(220, 'A6', 'K5-8', 2, ''),
(221, 'A6', 'K5-9', 2, ''),
(222, 'A6', 'K6-1', 1, ''),
(223, 'A6', 'K6-2', 1, ''),
(224, 'A6', 'K6-3', 1, ''),
(225, 'A6', 'K6-4', 2, ''),
(226, 'A6', 'K6-5', 2, ''),
(227, 'A6', 'K6-6', 1, ''),
(228, 'A6', 'K7-1', 2, ''),
(229, 'A6', 'K7-2', 2, ''),
(230, 'A6', 'K7-3', 1, ''),
(231, 'A6', 'K7-4', 1, ''),
(232, 'A6', 'K8-1', 4, ''),
(233, 'A6', 'K8-2', 5, ''),
(234, 'A6', 'K8-3', 2, ''),
(235, 'A7', 'K1-1', 3, ''),
(236, 'A7', 'K2-1', 4, ''),
(237, 'A7', 'K3-1', 5, ''),
(238, 'A7', 'K3-2', 2, ''),
(239, 'A7', 'K3-3', 3, ''),
(240, 'A7', 'K3-4', 2, ''),
(241, 'A7', 'K3-5', 2, ''),
(242, 'A7', 'K3-6', 3, ''),
(243, 'A7', 'K4-1', 4, ''),
(244, 'A7', 'K4-2', 6, ''),
(245, 'A7', 'K4-3', 6, ''),
(246, 'A7', 'K4-4', 3, ''),
(247, 'A7', 'K4-5', 5, ''),
(248, 'A7', 'K4-6', 3, ''),
(249, 'A7', 'K4-7', 4, ''),
(250, 'A7', 'K4-8', 5, ''),
(251, 'A7', 'K4-9', 3, ''),
(252, 'A7', 'K5-1', 1, ''),
(253, 'A7', 'K5-2', 1, ''),
(254, 'A7', 'K5-3', 2, ''),
(255, 'A7', 'K5-4', 1, ''),
(256, 'A7', 'K5-5', 1, ''),
(257, 'A7', 'K5-6', 1, ''),
(258, 'A7', 'K5-7', 1, ''),
(259, 'A7', 'K5-8', 2, ''),
(260, 'A7', 'K5-9', 2, ''),
(261, 'A7', 'K6-1', 1, ''),
(262, 'A7', 'K6-2', 1, ''),
(263, 'A7', 'K6-3', 1, ''),
(264, 'A7', 'K6-4', 2, ''),
(265, 'A7', 'K6-5', 2, ''),
(266, 'A7', 'K6-6', 1, ''),
(267, 'A7', 'K7-1', 2, ''),
(268, 'A7', 'K7-2', 2, ''),
(269, 'A7', 'K7-3', 1, ''),
(270, 'A7', 'K7-4', 1, ''),
(271, 'A7', 'K8-1', 4, ''),
(272, 'A7', 'K8-2', 5, ''),
(273, 'A7', 'K8-3', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_preferensi`
--

CREATE TABLE `nilai_preferensi` (
  `id_preferensi` varchar(20) NOT NULL,
  `nilai` double NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_preferensi`
--

INSERT INTO `nilai_preferensi` (`id_preferensi`, `nilai`, `keterangan`) VALUES
('P1', 1, 'Sama penting dengan'),
('P2', 2, 'Mendekati sedikit lebih penting dari'),
('P3', 3, 'Sedikit lebih penting dari'),
('P4', 4, 'Mendekati lebih penting dari'),
('P5', 5, 'Lebih penting dari'),
('P6', 6, 'Mendekati sangat penting dari'),
('P7', 7, 'Sangat penting dari'),
('P8', 8, 'Mendekati mutlak dari'),
('P9', 9, 'Mutlak sangat penting dari');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `permission` enum('admin','evaluator','pengelola','pimpinan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `username`, `password`, `nama_user`, `foto`, `permission`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Muharrik Al-Islamy', '254712.jpg', 'admin'),
(3, 'pengelola1', 'c20c8984f3db849ad612d2c40f0672ae', 'Ocky Karna Radjasa, Ph.D', 'default.jpg', 'pengelola'),
(4, 'pengelola2', '9966b7ee997de5c313b743584f6b8830', 'Prof. Dr. Andri Cahyo Kumoro', 'default.jpg', 'pengelola'),
(5, 'pengelola3', '7e3f93f35cb5998ab3ecd54ef5d3e374', 'Prof. Dr. Ambariyanto Ambariyanto', 'default.jpg', 'pengelola'),
(6, 'pengelola4', '56df571f61c9a55854a762fcb5c41125', 'Prof. Dr. Edy Kurnianto', 'default.jpg', 'pengelola'),
(7, 'pengelola5', 'dd35c48d57b1449a7ea5694e40f4dc8f', 'Mochamad Hadi', 'default.jpg', 'pengelola'),
(8, 'pengelola6', '49d9d3e058aa701ed1ef6178f9717656', 'Dr. Munawar Riyadi', 'default.jpg', 'pengelola'),
(9, 'pengelola7', 'c722dfd183fcc11b9aeb94557abe0396', 'Aditya Yuli Sulistyawan', 'default.jpg', 'pengelola'),
(10, 'pengelola8', '044566239d6e05ffd812109d909af945', 'Rizal Hari Magnadi', 'default.jpg', 'pengelola'),
(11, 'pengelola9', 'bd837a6575d6671bdb25fb7e8393cbcd', 'Sri Handayani', 'default.jpg', 'pengelola'),
(12, 'pengelola10', '929ac7cef26b41d0ff3550995a34fb75', 'Edward Pandelaki, Ph.D', 'default.jpg', 'pengelola'),
(13, 'pengelola11', '7f782f4ca74f1e8d10b2c04b3d318426', 'Muhammad Iqbal, ST, MT', 'default.jpg', 'pengelola'),
(14, 'pengelola12', '3e098438514b010bc95503e3312bb439', 'Prof. Dr. Sultana M.H. Faradz', 'default.jpg', 'pengelola'),
(15, 'pengelola13', '52b2d07b106a1808da7a323ea77b36e1', 'Prof Nurdien H. Kistanto', 'default.jpg', 'pengelola'),
(16, 'pengelola14', '8857d19b73e532379780fba50f96b599', 'Turnomo Rahardjo', 'default.jpg', 'pengelola'),
(17, 'pengelola15', '9eb7f55b48e45dd08081709c6676887d', 'Marten H.', 'default.jpg', 'pengelola'),
(18, 'pengelola16', '9bfbfbe0891b5ad3505ef8fbd64fc594', 'Fajar Purwantoro', 'default.jpg', 'pengelola'),
(19, 'pengelola17', 'b5265423c746c3129d155af3e5deba98', 'Dr. Adi Darmawan', 'default.jpg', 'pengelola'),
(20, 'pengelola18', 'f55e9370161fe583213ea5477af3d3da', 'Suroto Suroto', 'default.jpg', 'pengelola'),
(21, 'pengelola19', 'bcdc41af8f33a04d5814e167c00dc7bd', 'Aristi Dian Purnama Fitri', 'default.jpg', 'pengelola'),
(22, 'pengelola20', '7d626c421bd34fd73bfe315c1ca67b11', 'Laila Kholid Alfirdaus', 'default.jpg', 'pengelola'),
(23, 'evaluator', '9e76d075c324f87e752db59dbcc8847c', 'LPPM', 'default.jpg', 'evaluator'),
(25, 'pimpinan', '90973652b88fe07d05a4304f0a945de8', 'Prof. Dr. Yos Johan Utama, S.H.,M.Hum.,', 'default.jpg', 'pimpinan'),
(27, 'pengelola21', '891aea8a0c5779c99f20ac545889a432', 'Dr. sc. agr Iwan Rudiarto', 'default.jpg', 'pengelola'),
(28, 'pengelola22', 'cd095f95c7acbea107b9838a3d380c45', 'Zahroh Shaluhiyah', 'default.jpg', 'pengelola'),
(29, 'pengelola23', '87c3c5da91ddef287ed47e843ff1e86e', 'Paramita Prananingtyas', 'default.jpg', 'pengelola'),
(30, 'pengelola24', '79d91fdfba1cd22734f15e6a3bc7b9bd', 'Dr. Ing - ST, M.Sc Sudarno Utomo', 'default.jpg', 'pengelola'),
(31, 'pengelola25', '8e342bd93a220a8da997dbbb88e50de4', 'Yopie Warella', 'default.jpg', 'pengelola'),
(32, 'pengelola26', '14ad5b7e63d8f1c6fc2c8fda4632f867', 'Dr. Mirwan Surya Perdhana', 'default.jpg', 'pengelola'),
(33, 'pengelola27', 'd6ec6b29c0dff69cdab7e6e8daf1ee36', 'Susilo Toto Raharjo', 'default.jpg', 'pengelola'),
(34, 'pengelola28', '5c3613e399f67198e4daa6904a0b02b9', 'Dr. Retno Kusumaningrum ', 'default.jpg', 'pengelola'),
(35, 'pengelola29', '8a54047c6644cba9d35319964a54b135', 'Andi Wijayanto', 'default.jpg', 'pengelola'),
(36, 'pengelola30', '051c456edb1fadc4647cb4fa2ab8566e', 'Agus Purwanto', 'default.jpg', 'pengelola'),
(37, 'pengelola31', 'a10f26aa4f4ebba4d02aa87a1a2b1e45', 'Dr Akhmad Syakir Kurnia', 'default.jpg', 'pengelola'),
(38, 'pengelola32', 'ffbf18833418ac305a06616f0c74212e', 'Dr. Eng. Munadi Munadi', 'default.jpg', 'pengelola'),
(39, 'pengelola33', 'ba0fd410c2c9e38423160f944e4b86ec', 'Mr. Bagus HS', 'default.jpg', 'pengelola'),
(40, 'pengelola34', '330e18c3823f398d1098d183ef4bfa35', 'Dr. Wahyul Amien Syafei ', 'default.jpg', 'pengelola'),
(41, 'pengelola35', '37673a75680eabbb808b2edce7348ac5', 'Heru Winarno', 'default.jpg', 'pengelola'),
(42, 'pengelola36', '45993e00a549f6fca085667057170a0e', 'Dr. Aries Susanty', 'default.jpg', 'pengelola'),
(43, 'pengelola37', '6b991f5700157861caaefea14f2f5169', 'Adhi Suwanto', 'default.jpg', 'pengelola'),
(44, 'pengelola38', '5f728acb9f2171c18ab45c7da4795459', 'Dr. Choirul Anam', 'default.jpg', 'pengelola'),
(45, 'pengelola39', 'd4356b14121a6bc59d61abb466dbf176', 'Suryoto Suryoto', 'default.jpg', 'pengelola'),
(46, 'pengelola40', 'dea790836a52e53dfc6cfe733af417f4', 'Dr. Di Asih I Maruddani ', 'default.jpg', 'pengelola'),
(47, 'pengelola41', '2171f5ef8448207d3ce1200fb3e38419', 'Dian Veronika Sakti Kaloeti', 'default.jpg', 'pengelola'),
(48, 'pengelola42', '352eccffd87b9b65b0971f7b52e2d300', 'Sri Padma Sari ', 'default.jpg', 'pengelola'),
(49, 'pengelola43', 'da901bd7f320e4f6331c0834d8de2ae5', 'Abdul Gofur Taufik', 'default.jpg', 'pengelola'),
(50, 'pengelola44', '032826706e0d893ebe3dee6bc41a8016', 'Kholis Roisah', 'default.jpg', 'pengelola'),
(51, 'pengelola45', '67a203ef638f4f034484cdc4da68d0e8', 'Agus Hartoko', 'default.jpg', 'pengelola'),
(52, 'pengelola46', '06ddc4927261e9efdc1579a8acbe02d0', 'Nurjazuli Nurjazuli', 'default.jpg', 'pengelola'),
(53, 'pengelola47', '6d95fa5317ea3b1fe1cef78a9708cbeb', 'Prof. Dr. Ir. Sri Sangkawati Sachro, MS.', 'default.jpg', 'pengelola'),
(54, 'pengelola48', 'dfed9ad24763eb596261dc3274c5737a', 'Dr. Deli Nirmala ', 'default.jpg', 'pengelola'),
(55, 'pengelola49', '307785d3ae05593743e3e4fe73bdb2b1', 'Dr. Diana Nur Afifah, S.TP., M.Si. ', 'default.jpg', 'pengelola'),
(56, 'pengelola50', 'e5d700d0d33b5a1c014eed4c4ab6d01c', 'Prof Mustafid Mustafid ', 'default.jpg', 'pengelola'),
(57, 'pengelola51', '84411d48799292087c80711abd579315', 'Dr. Ir. Suseno Darsono, M.Sc', 'default.jpg', 'pengelola'),
(58, 'pengelola52', '0ed6473eb5f08def1e889975a21dc56a', 'Joga Dharma S', 'default.jpg', 'pengelola'),
(59, 'pengelola53', '0f79ef59f76b1e407da500e429d91087', 'Dr. Ir. Diah Permata Wijayanti', 'default.jpg', 'pengelola'),
(60, 'pengelola54', '822ee2a37035b7d051aa6ea364feb810', 'Bimastyaji Surya Ramadan ', 'default.jpg', 'pengelola'),
(61, 'pengelola55', 'ea903279f24ca778b9174816bb904f9a', 'Prof. Dr. Ir. Budiyono MSi,', 'default.jpg', 'pengelola'),
(62, 'pengelola56', 'db9b0c008555623b7a7ee6b230753508', 'Heny Kusumayanti, ST., MT', 'default.jpg', 'pengelola'),
(63, 'pengelola57', '863e3e357a6fb4a79ae6b444c850d52e', 'Sukawi Sukawi', 'default.jpg', 'pengelola'),
(64, 'pengelola58', '880683878e0292bdff21b11e81373993', 'Agus Subiyanto', 'default.jpg', 'pengelola'),
(65, 'pengelola59', '2e59904fdb181ae40440f25a650c703d', 'Erma Prihastanti', 'default.jpg', 'pengelola'),
(66, 'pengelola60', 'e8fd3b76283e1f85ed80021a8244dc01', 'Prof. Dr. Mudjahirin Thohir', 'default.jpg', 'pengelola'),
(67, 'pengelola61', '1f68a7c88ee64441636a34c0c8541ca2', 'Prof. Iriyanto Widisuseno, M.Hum.', 'default.jpg', 'pengelola'),
(68, 'pengelola62', '7f4e69bcc35fadcdbca2f636ece37ed8', 'Migie Handayani, S.Pt., M.P.', 'default.jpg', 'pengelola'),
(69, 'pengelola63', '96df6d371146bb502929b6e5e985642d', 'Prof. Dr H Hadiyanto ', 'default.jpg', 'pengelola'),
(70, 'pengelola64', '4209291d6ab64139fb64dbe476e73fa3', 'Prof.Dr.Ir. IKAP Utama.', 'default.jpg', 'pengelola'),
(71, 'pengelola65', '25be639cd259b3df2113979227e2a3c4', 'Pujiyono Pujiyono ', 'default.jpg', 'pengelola'),
(72, 'pengelola66', '666af69f8ed096a0887d536603a09f3c', 'Swasti Kusumarukmi', 'default.jpg', 'pengelola'),
(73, 'pengelola67', 'd0259623be39a498e2bb223ff3e1809e', 'Uripno Budiono', 'default.jpg', 'pengelola'),
(74, 'pengelola68', '71d97ef7cfa47d7b44eb012480ad7757', 'Dr. Retno Saraswati', 'default.jpg', 'pengelola'),
(76, 'pengelola70', 'da743b802661e67f776f34e4709885ca', 'Prof. Dr Iriyanto Widisuseno', 'default.jpg', 'pengelola'),
(77, 'pengelola71', '9925b305fb92c4f6c1639f99e1863746', 'Prof. Dr. Muhammad Zainuri,', 'default.jpg', 'pengelola'),
(78, 'pengelola72', '6be85d12e7691b49248dc731ecf2da7a', 'Prof. Dr.rer.nat. Imam Buchori ', 'default.jpg', 'pengelola'),
(79, 'pengelola73', '992d5ddd19f1dd8a05f04e6a845c0cf5', 'MARGIYONO MARGIYONO', 'default.jpg', 'pengelola'),
(80, 'pengelola74', '9c3a482b801781a9604783cd5ba911d4', 'Heriyanto Heriyanto', 'default.jpg', 'pengelola'),
(81, 'pengelola75', '84a953d6596ed9cd8bbf65913b633111', 'Prof. Dr. Singgih Tri Sulistiyono ', 'default.jpg', 'pengelola'),
(82, 'pengelola76', '7c2f039fd761ab73bc4bb057d0021d9a', 'Farid Agushybana, S.KM., Ph.D ', 'default.jpg', 'pengelola'),
(83, 'pengelola77', 'bbd1cacbe1cf096a80f724c7bc4950e1', 'Hadi Anwar', 'default.jpg', 'pengelola'),
(84, 'pengelola78', 'a5decd0dd46b75ae902c0f7c0051fb68', 'Amni Zarkasyi Rahman', 'default.jpg', 'pengelola'),
(85, 'pengelola79', '257dadcc6b2771e6b84ae09ea0e00f62', 'Mohamad Rosyidin', 'default.jpg', 'pengelola'),
(86, 'pengelola80', '964a915e9d90314f56cc6817d8f16487', 'Ro’fah Setyowati ', 'default.jpg', 'pengelola'),
(88, 'pengelola82', '85b0d32f29942456caa9e777d69f703d', 'Amirudin Amirudin', 'default.jpg', 'pengelola'),
(89, 'pengelola83', '71f6055215b67883460ddb3d225a939c', 'Ms Dwi Wulandari,', 'default.jpg', 'pengelola'),
(90, 'pengelola84', '232bae4a105da19e95b149234e04d977', 'Prof. Dr. Istadi Istadi ', 'default.jpg', 'pengelola'),
(91, 'pengelola85', 'b43f94f9eb90e8af8970bc684b5128c3', 'Prof. Ove-Hoegh Guldberg,', 'default.jpg', 'pengelola'),
(92, 'pengelola86', 'b208390ec495b62b8a7713487f7691c0', 'Sultana MH Faradz', 'default.jpg', 'pengelola'),
(93, 'pengelola87', '7f8f776ee6057263427819325f01ca27', 'Maya Damayanti', 'default.jpg', 'pengelola'),
(94, 'pengelola88', '57eec766b773ce5dd76b4a6cfe0c796e', 'Daud Samsudewa, S.Pt., M.Si., Ph.D', 'default.jpg', 'pengelola'),
(95, 'pengelola89', 'bed7106e8b031c6b5c38db6c839200b9', 'Parfi Khadiyanto', 'default.jpg', 'pengelola'),
(96, 'pengelola90', '4560a6c87957942626b373a8dc1e8c6b', 'Prof. Dr. Ir. Bambang Pramudono,', 'default.jpg', 'pengelola'),
(97, 'pengelola91', 'aca763e2ec0096435fb309639d162ddd', 'Ir. Agung Sugiri, MPSt', 'default.jpg', 'pengelola'),
(98, 'pengelola92', '026a4b698981cce8bd6b49260a99596c', 'Dr .-Ing. Prihadi Nugroho ', 'default.jpg', 'pengelola'),
(99, 'pengelola93', '1131555fa1850d1a6e896f9dcbb5bd77', 'Dr. Karno Karno,', 'default.jpg', 'pengelola'),
(100, 'pengelola94', 'baddc8df445cef6b1bde64c0180342ec', 'Ir. Chrisna Adhi Suryono, M.Phill ', 'default.jpg', 'pengelola'),
(101, 'pengelola95', 'b431c32708bcc81016fad9ced285e5c0', 'Firmansyah Firmansyah', 'default.jpg', 'pengelola'),
(102, 'pengelola96', 'a15a3210230129e0dd5e7fc3140fe28d', 'Ariza Fuadi', 'default.jpg', 'pengelola'),
(103, 'pengelola97', 'da584b36f0039e120eca4a8e8c3a1352', 'Harjum Muharam', 'default.jpg', 'pengelola'),
(104, 'pengelola98', '2e3d1f62ec091c015d6da961bcb92bc9', 'Martha Irene Kartasurya', 'default.jpg', 'pengelola'),
(106, 'pengelola100', '218a7cca80f04f4e4454937238e8473e', 'Dwi Sutiningsih', 'default.jpg', 'pengelola'),
(107, 'pengelola101', 'cb1ff1a5defbafd55d87225a6c6ad6aa', 'Yuniwati Buntassanningsih Yuventia', 'default.jpg', 'pengelola'),
(108, 'pengelola102', '69fca427ad1624ce3a43e7f963e9a463', 'Hendra Try Ardianto', 'default.jpg', 'pengelola'),
(109, 'pengelola103', '9c70bd16a4b4e6f7200f025d036469ed', 'Suryadi Suryadi', 'default.jpg', 'pengelola'),
(111, 'pengelola105', '1dce6ec3b9847ff7c3cd29ffee4df71a', 'Indi Djastuti', 'default.jpg', 'pengelola'),
(112, 'pengelola106', '61ef9e1b160388516bb1bc1bc9301ad7', 'Awal Prasetyo, MD, SP.THT', 'default.jpg', 'pengelola'),
(113, 'pengelola107', 'bcd93a324abfa3a52ddfd7439ee7e94b', 'Dr. Ilham Nurhuda', 'default.jpg', 'pengelola'),
(114, 'pengelola108', '09c2122014cfec78f5d0a200963e35eb', 'Sri Hastuti', 'default.jpg', 'pengelola'),
(115, 'pengelola109', '8049d6db3aaad59b4808b0ecab2484c5', 'Faik Kurohman', 'default.jpg', 'pengelola'),
(116, 'pengelola110', '6fca5654c51f6e31d83f569bc688c546', ' Prof. Dr. Singgih Tri Sulistiyono', 'default.jpg', 'pengelola'),
(117, 'pengelola111', '39b46977d5cf70517745a2f0c1a0ec1f', 'Prof. Dr. Yety Rochwulaningsih', 'default.jpg', 'pengelola'),
(118, 'pengelola112', 'fd8e2b4dc024e507a8dd503a53e66712', 'Wiludjeng Roessali', 'default.jpg', 'pengelola'),
(119, 'pengelola113', 'b1861e08fb8b65f97e3624050dadf1dc', 'Prof. Dr. Augusty Ferdinand', 'default.jpg', 'pengelola'),
(120, 'pengelola114', '9737d71d5a9f1c55387c88a8b8a35d4f', 'Muhammad Zainuri', 'default.jpg', 'pengelola'),
(121, 'pengelola115', 'a187df7bae870bd2cff97a235636c88f', 'Ahmad Ni\'matullah Al-Baarri, PhD.', 'default.jpg', 'pengelola'),
(122, 'pengelola116', 'e1861c64d95d5cd9e4130627bdf28a36', 'Yuli Rohmiyati', 'default.jpg', 'pengelola'),
(123, 'pengelola117', '34beb32faf2478f094c4d69897dda985', 'Nurhayati Nurhayati', 'default.jpg', 'pengelola'),
(124, 'pengelola118', '0f9a105594d712f9dc0513ba63bc0c25', 'Julia Martayani', 'default.jpg', 'pengelola'),
(125, 'pengelola119', '43f2266ff70124fab07718da35856cea', 'Muhadi Muhadi', 'default.jpg', 'pengelola'),
(126, 'pengelola120', '62954a60640d894bc03c33bfd75b8b5e', 'Rully Rahadian', 'default.jpg', 'pengelola'),
(127, 'pengelola121', '89cf54153c9e8c21e9695556d96e0b84', 'Muhamad Azhar', 'default.jpg', 'pengelola'),
(128, 'pengelola122', 'b2c733b20510efb8ebf7449624064029', 'Sri Widodo Agung Suedy', 'default.jpg', 'pengelola'),
(129, 'pengelola123', '19539a09b6f6bd269cb86d66127da3ee', 'Atiek Suprapti', 'default.jpg', 'pengelola'),
(130, 'pengelola124', 'd734133bdfe8928fd862c3072da0e83a', 'Mr. Thomas Triadi Putranto', 'default.jpg', 'pengelola'),
(131, 'pengelola125', 'ad79ceec7e832da02482c87a827033b1', 'Sri Pujiyanto', 'default.jpg', 'pengelola'),
(133, 'pengelola127', 'c98223260dba249f4e519927ec765a53', 'Dr. Eng. Ali Khumaeni ', 'default.jpg', 'pengelola'),
(134, 'pengelola128', 'a3049fda2924799ec7af707a1b92af8f', 'Mohd Ridwan', 'default.jpg', 'pengelola'),
(135, 'pengelola129', '5f46ae51c0c9e173d515140e4f84cdc3', 'Dr. Vita Paramita ', 'default.jpg', 'pengelola'),
(136, 'pengelola130', '40b51e6e95c0c6692c5423bf95296bac', 'Megah Andriany', 'default.jpg', 'pengelola'),
(137, 'pengelola131', '482fdf8d07db88d949c86c72fabf0dbd', 'Abdi Sukmono, ST., MT,', 'default.jpg', 'pengelola'),
(138, 'pengelola132', '01114694eef5692a30fb118491bb8415', 'Annisa Nur Alam', 'default.jpg', 'pengelola'),
(140, 'pengelola133', '3731fafa1e5f2c8cc95c23e050376027', 'Ery Agus Priyono, S.H.,M.Si', 'default.jpg', 'pengelola'),
(141, 'pengelola134', 'b1ed65ac9f201f22bceb34af8e9c7979', 'Kholis Roisah', 'default.jpg', 'pengelola'),
(142, 'pengelola135', 'd63e467a0f9020d08f1708096fab154d', 'Prof. Dr. Heru Susanto', 'default.jpg', 'pengelola'),
(143, 'pengelola136', '258ee3ef3d290202b3196034a1dd58b4', 'Asri Nurdiana', 'default.jpg', 'pengelola'),
(144, 'pengelola137', '581e8fe77af5b33c767ffd5cf7ac4f2e', 'Prof. Dr. W Widayat', 'default.jpg', 'pengelola'),
(145, 'pengelola138', '3f5a7173332e1239d8a144f0766e0422', 'Indra Gunawan', 'default.jpg', 'pengelola'),
(146, 'pengelola139', '4fa3e94197fd033255d753c008d38d20', 'Prof. Tri Winarni Agustini', 'default.jpg', 'pengelola'),
(147, 'pengelola140', 'b298a6f201adde41f6968c6f4fb9b355', 'Dr. Muhammad Helmi', 'default.jpg', 'pengelola'),
(149, 'pengelola142', '3abeefc84cbacde8e88d14b94de03f33', 'Prof. Dr. Heri Sutanto', 'default.jpg', 'pengelola'),
(150, 'pengelola143', '2b21a768bfb3748c6425139b9f5b94d3', 'Mujid Farihul Amin', 'default.jpg', 'pengelola'),
(151, 'pengelola144', '15954675e9c03d65842dd7c67e16f113', 'Ari Wibawa Budi Santosa', 'default.jpg', 'pengelola'),
(152, 'pengelola145', 'fa0de8f85071503722fd7b30ed300144', 'Mujiono Hafidh Prasetyo', 'default.jpg', 'pengelola'),
(153, 'pengelola146', 'f16a6297bf053ecb4c1e85b78973bec1', 'Fahmi Arifan', 'default.jpg', 'pengelola'),
(154, 'pengelola147', '21625d3ab2a32cecd9f90d9baf4ffedf', 'Budi Puspo Priyadi', 'default.jpg', 'pengelola'),
(156, 'pengelola149', 'c62c908dddcd1788fa60f4f068ca20a8', 'Eko Didik Widianto ', 'default.jpg', 'pengelola'),
(157, 'pengelola150', '51214a1ffa0fe0b6523bcbb42a171458', 'Deny Yudi Fitranti, S.Gz, M.Si.', 'default.jpg', 'pengelola'),
(158, 'pengelola151', 'd55408908a7c8f64901224f19c2ae926', 'Dr. dr. Hardian Hardian', 'default.jpg', 'pengelola'),
(159, 'pengelola152', '25c6e4c56b3ebcfaec5bb9a9e6aa66ca', 'Ika Zenita Ratnaningsih', 'default.jpg', 'pengelola');

-- --------------------------------------------------------

--
-- Table structure for table `pengindeks`
--

CREATE TABLE `pengindeks` (
  `kode_pengindeks` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengindeks`
--

INSERT INTO `pengindeks` (`kode_pengindeks`, `nama`, `kategori`) VALUES
(1, 'SCOPUS', 'Tinggi'),
(2, 'Google Schoolar', 'Rendah'),
(3, 'DOAJ', 'Sedang'),
(4, 'ESCI', 'Sedang'),
(5, 'ACI', 'Sedang'),
(6, 'EBSCO', 'Sedang'),
(7, 'WOS', 'Tinggi');

-- --------------------------------------------------------

--
-- Table structure for table `portal`
--

CREATE TABLE `portal` (
  `kode_portal` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portal`
--

INSERT INTO `portal` (`kode_portal`, `nama`) VALUES
(1, 'ejournal1'),
(2, 'ejournal2'),
(3, 'ejournal3'),
(4, 'lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `sk`
--

CREATE TABLE `sk` (
  `kode_sk` int(100) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sk`
--

INSERT INTO `sk` (`kode_sk`, `nomor`, `deskripsi`, `tanggal`) VALUES
(1, 'SK 60/E/KPT/2016', '', '2016-11-13'),
(2, 'SK 12/M/Kp/II/2015', '', '2015-02-11'),
(4, 'SK 32a/E/KPT/2017', '', '2017-04-26'),
(5, 'SK 51/E/KPT/2017', '', '2017-12-19'),
(6, 'SK 21/E/KPT/2018', '', '2018-07-09'),
(10, 'SK 34/E/KPT/2018', '', '2018-12-10'),
(11, 'SK 212/P/2014', '', '2014-12-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`kode_alternatif`);

--
-- Indexes for table `alternatif_details`
--
ALTER TABLE `alternatif_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `analisa_kriteria`
--
ALTER TABLE `analisa_kriteria`
  ADD PRIMARY KEY (`id_analisa`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`kode_departemen`),
  ADD KEY `kode_fakultas` (`kode_fakultas`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`kode_fakultas`);

--
-- Indexes for table `indikator`
--
ALTER TABLE `indikator`
  ADD PRIMARY KEY (`kode_indikator`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`kode_jurnal`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `jurnal_pengindeks`
--
ALTER TABLE `jurnal_pengindeks`
  ADD PRIMARY KEY (`kode_jp`),
  ADD KEY `kode_jurnal` (`kode_jurnal`),
  ADD KEY `jurnal_pengindeks_ibfk_2` (`kode_pengindeks`);

--
-- Indexes for table `jurnal_sk`
--
ALTER TABLE `jurnal_sk`
  ADD PRIMARY KEY (`kode_js`),
  ADD KEY `kode_jurnal` (`kode_jurnal`),
  ADD KEY `kode_sk` (`kode_sk`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `kriteria_details`
--
ALTER TABLE `kriteria_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`kode_lab`),
  ADD KEY `kode_departemen` (`kode_departemen`);

--
-- Indexes for table `lembaga`
--
ALTER TABLE `lembaga`
  ADD PRIMARY KEY (`kode_lembaga`);

--
-- Indexes for table `log_penilaian`
--
ALTER TABLE `log_penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_indikator`
--
ALTER TABLE `nilai_indikator`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `nilai_murni`
--
ALTER TABLE `nilai_murni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_preferensi`
--
ALTER TABLE `nilai_preferensi`
  ADD PRIMARY KEY (`id_preferensi`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `pengindeks`
--
ALTER TABLE `pengindeks`
  ADD PRIMARY KEY (`kode_pengindeks`);

--
-- Indexes for table `portal`
--
ALTER TABLE `portal`
  ADD PRIMARY KEY (`kode_portal`);

--
-- Indexes for table `sk`
--
ALTER TABLE `sk`
  ADD PRIMARY KEY (`kode_sk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `kode_departemen` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `kode_fakultas` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `kode_jurnal` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `jurnal_pengindeks`
--
ALTER TABLE `jurnal_pengindeks`
  MODIFY `kode_jp` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `jurnal_sk`
--
ALTER TABLE `jurnal_sk`
  MODIFY `kode_js` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `kode_lab` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lembaga`
--
ALTER TABLE `lembaga`
  MODIFY `kode_lembaga` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `log_penilaian`
--
ALTER TABLE `log_penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `nilai_murni`
--
ALTER TABLE `nilai_murni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `pengindeks`
--
ALTER TABLE `pengindeks`
  MODIFY `kode_pengindeks` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `portal`
--
ALTER TABLE `portal`
  MODIFY `kode_portal` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sk`
--
ALTER TABLE `sk`
  MODIFY `kode_sk` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departemen`
--
ALTER TABLE `departemen`
  ADD CONSTRAINT `departemen_ibfk_1` FOREIGN KEY (`kode_fakultas`) REFERENCES `fakultas` (`kode_fakultas`);

--
-- Constraints for table `lab`
--
ALTER TABLE `lab`
  ADD CONSTRAINT `lab_ibfk_1` FOREIGN KEY (`kode_departemen`) REFERENCES `departemen` (`kode_departemen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
