-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2019 at 08:01 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikap`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` enum('ahli','terampil','penilai','keppus') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`, `level`) VALUES
(7, '1700018142', 'adi', 'terampil'),
(8, '60171014', 'admin', 'ahli');

-- --------------------------------------------------------

--
-- Table structure for table `jenjang_jabatan`
--

CREATE TABLE `jenjang_jabatan` (
  `id_jj` char(10) NOT NULL,
  `jebatan` varchar(50) NOT NULL,
  `pankat` varchar(50) NOT NULL,
  `status` enum('terampil','ahli','belum_ada') NOT NULL,
  `angka_kredit_dicapai` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenjang_jabatan`
--

INSERT INTO `jenjang_jabatan` (`id_jj`, `jebatan`, `pankat`, `status`, `angka_kredit_dicapai`) VALUES
('a1-001', 'Pustakawan Pertama', 'Penata Muda (III/a)', 'ahli', '100'),
('a1-002', 'Pustakawan Pertama', 'Penata Muda Tingkat I (III/b)', 'ahli', '150'),
('a2-001', 'Pustakawan Muda', 'Penata (III/c)', 'ahli', '200'),
('a2-002', 'Pustakawan Muda', 'Penata Tingkat I (III/d)', 'ahli', '300'),
('a3-001', 'Pustakawan Madya', 'Pembina (IV/a)', 'ahli', '400'),
('a3-002', 'Pustakawan Madya', 'Pembina Tingkat I (IV/b)', 'ahli', '550'),
('a3-003', 'Pustakawan Madya', 'Pembina Utama Muda (IV/c)', 'ahli', '700'),
('a4-001', 'Pustakawan Utama', 'Pembina Utama Madya (IV/d)', 'ahli', '850'),
('a4-002', 'Pustakawan Utama', 'Pembina Utama (IV/e)', 'ahli', '1050'),
('t1-001', 'Pustakawan Pelaksana', 'Pengatur Mudah Tingkat I (II/b)', 'terampil', '40'),
('t1-002', 'Pustakawan Pelaksana', 'Pengatur (II/c)', 'terampil', '60'),
('t1-003', 'Pustakawan Pelaksana', 'Pengatur Tingkat I (II/d)', 'terampil', '80'),
('t2-001', 'Pustakawan Pelaksana Lanjutan', 'Penata Muda (III/a)', 'terampil', '100'),
('t2-002', 'Pustakawan Pelaksana Lanjutan', 'Penata Muda Tingkat I (III/b)', 'terampil', '150'),
('t3-001', 'Pustakawan Penyelia', 'Penata (III/c)', 'terampil', '200'),
('t3-002', 'Pustakawan Penyelia', 'Penata Tingkat I (III/d)', 'terampil', '300'),
('xx-0000', 'belum ada', 'belum ada', 'belum_ada', '0');

-- --------------------------------------------------------

--
-- Table structure for table `penilai`
--

CREATE TABLE `penilai` (
  `nip` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nilai` char(10) NOT NULL,
  `keterangan` text NOT NULL,
  `id_riwayat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilai`
--

INSERT INTO `penilai` (`nip`, `nama`, `nilai`, `keterangan`, `id_riwayat`) VALUES
(6, 'MUHAMMAD ADI REZKY', '30', 'adi rezky', 6);

-- --------------------------------------------------------

--
-- Table structure for table `pustakawan`
--

CREATE TABLE `pustakawan` (
  `niy` char(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `gendre` enum('pria','wanita') NOT NULL,
  `pendidikan` enum('sma','d1','d2','d3','s1','s2','s3') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `jabatan` char(10) NOT NULL,
  `keterangan_pendidikan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pustakawan`
--

INSERT INTO `pustakawan` (`niy`, `nama`, `tanggal_lahir`, `gendre`, `pendidikan`, `tempat_lahir`, `jabatan`, `keterangan_pendidikan`) VALUES
('170018142', 'adi', '2019-08-05', 'pria', 'd1', 'baubau', 't1-002', 'pustakawan'),
('60171014', 'Ana pujiastuti, SIP', '2019-08-08', 'wanita', 's2', 'Bantul', 'xx-0000', 'Ilmu Perpustakaan');

-- --------------------------------------------------------

--
-- Table structure for table `ringkasan_peraturan`
--

CREATE TABLE `ringkasan_peraturan` (
  `komponen` varchar(50) NOT NULL,
  `butir` varchar(200) NOT NULL,
  `rincian` varchar(1000) NOT NULL,
  `angka_kredit` char(19) NOT NULL,
  `status` enum('terampil','ahli') NOT NULL,
  `id_rp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ringkasan_peraturan`
--

INSERT INTO `ringkasan_peraturan` (`komponen`, `butir`, `rincian`, `angka_kredit`, `status`, `id_rp`) VALUES
('PENDIDIKAN', 'Pendidikan Sekolah dan Memperoleh Gelar/Ijazah', 'S1 Ilmu Perpustakaan\r\n\r\n', '100', 'ahli', 1),
('PENDIDIKAN', 'Pendidikan Sekolah dan Memperoleh Gelar/Ijazah', 'S2 Ilmu Perpustakaan', '150', 'ahli', 2),
('PENDIDIKAN', 'Pendidikan Sekolah dan Memperoleh Gelar/Ijazah', 'S3 Ilmu Perpustakaan', '200', 'ahli', 3),
('PENDIDIKAN', 'DIKLATFUNGSIONAL/TEKNIS KEPUSTAKAWANAN serta memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan (STTPP) atau Sertifikat', 'Mengikuti Diklat Fungsional/Teknis Kepustakawanan serta memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan (STTPP) atau Sertifikat: Lamanya lebih dari 960 jam', '15', 'ahli', 4),
('PENDIDIKAN', 'DIKLATFUNGSIONAL/TEKNIS KEPUSTAKAWANAN serta memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan (STTPP) atau Sertifikat', 'Mengikuti Diklat Fungsional/Teknis Kepustakawanan serta memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan (STTPP) atau Sertifikat: Lamanya lebih dari 641 - 960  jam', '9', 'ahli', 5),
('PENDIDIKAN', 'DIKLATFUNGSIONAL/TEKNIS KEPUSTAKAWANAN serta memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan (STTPP) atau Sertifikat', 'Mengikuti Diklat Fungsional/Teknis Kepustakawanan serta memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan (STTPP) atau Sertifikat: Lamanya lebih dari 481 - 640  jam', '6', 'ahli', 6),
('PENDIDIKAN', 'DIKLATFUNGSIONAL/TEKNIS KEPUSTAKAWANAN serta memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan (STTPP) atau Sertifikat', 'Mengikuti Diklat Fungsional/Teknis Kepustakawanan serta memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan (STTPP) atau Sertifikat: Lamanya lebih dari 161 - 480  jam', '3', 'ahli', 7),
('PENDIDIKAN', 'DIKLATFUNGSIONAL/TEKNIS KEPUSTAKAWANAN serta memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan (STTPP) atau Sertifikat', 'Mengikuti Diklat Fungsional/Teknis Kepustakawanan serta memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan (STTPP) atau Sertifikat: Lamanya lebih dari 81 - 160  jam', '2', 'ahli', 8),
('PENDIDIKAN', 'DIKLATFUNGSIONAL/TEKNIS KEPUSTAKAWANAN serta memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan (STTPP) atau Sertifikat', 'Mengikuti Diklat Fungsional/Teknis Kepustakawanan serta memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan (STTPP) atau Sertifikat: Lamanya lebih dari 31 - 80  jam', '1', 'ahli', 9),
('PENDIDIKAN', 'DIKLATFUNGSIONAL/TEKNIS KEPUSTAKAWANAN serta memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan (STTPP) atau Sertifikat', 'Mengikuti Diklat Fungsional/Teknis Kepustakawanan serta memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan (STTPP) atau Sertifikat: Lamanya lebih dari 10 - 30  jam', '0.5', 'ahli', 10),
('PENDIDIKAN', 'DIKLATFUNGSIONAL/TEKNIS KEPUSTAKAWANAN serta memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan (STTPP) atau Sertifikat', 'Mengikuti Diklat Fungsional/Teknis Kepustakawanan serta memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan (STTPP) atau Sertifikat: Mengikuti Diklat Prajabatan Golongan II', '1.5', 'ahli', 11),
('PENGELOLAAN PERPUSTAKAAN', 'PERENCANAAN PENYELENGGARAAN KEGIATAN PERPUSTAKAAN', 'Persiapan Mengumpulkan data untuk persiapan perencanaan penyelenggaraan kegiatan perpustakaan', '0.090', 'ahli', 12),
('PENGELOLAAN PERPUSTAKAAN', 'PERENCANAAN PENYELENGGARAAN KEGIATAN PERPUSTAKAAN', 'Persiapan Mengolah data untuk persiapan perencanaan penyelenggaraan  perpustakaan', '0.330', 'ahli', 13),
('PENGELOLAAN PERPUSTAKAAN', 'PERENCANAAN PENYELENGGARAAN KEGIATAN PERPUSTAKAAN', 'Menyusun rencana kerja strategis sebagai koordinator', '2.200', 'ahli', 14),
('PENGELOLAAN PERPUSTAKAAN', 'PERENCANAAN PENYELENGGARAAN KEGIATAN PERPUSTAKAAN', 'Menyusun rencana kerja strategis sebagai peserta/anggota', '1.155', 'ahli', 15),
('PENGELOLAAN PERPUSTAKAAN', 'PERENCANAAN PENYELENGGARAAN KEGIATAN PERPUSTAKAAN', 'Menyusun rencana kerja operasional sebagai koordinator', '0.660', 'ahli', 16),
('PENGELOLAAN PERPUSTAKAAN', 'PERENCANAAN PENYELENGGARAAN KEGIATAN PERPUSTAKAAN', 'Menyusun rencana kerja operasional sebagai peserta/anggota', '0.440', 'ahli', 17),
('PENGELOLAAN PERPUSTAKAAN', 'MONITORING DAN EVALUASI PENYELENGGARAAN KEGIATAN PERPUSTAKAAN', 'Menyelenggarakan monitoring penyelenggaraan perpustakaan', '0.550', 'ahli', 18),
('PENGELOLAAN PERPUSTAKAAN', 'MONITORING DAN EVALUASI PENYELENGGARAAN KEGIATAN PERPUSTAKAAN', 'Melakukan evaluasi penyelenggaraan perpustakaan', '0.825', 'ahli', 19),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengembangan koleksi Melakukan survei  kebutuhan Informasi Pemustaka: (usulan mahasiswa; usulan dosen)', '0.770', 'ahli', 20),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengembangan koleksi Melakukan seleksi koleksi perpustakaan (pencocokan data di simpus dan RPS)', '0.007', 'ahli', 21),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengembangan koleksi Mengidentifikasi koleksi Perpustakaan untuk Penyiangan (memilih buku rusak/eksemplar banyak/buku tua)', '0.003', 'ahli', 22),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengembangan koleksi Mengevaluasi koleksi perpustakaan untuk penyiangan', '0.005', 'ahli', 23),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengembangan koleksi Mengelola Koleksi perpustakaan hasil Penyiangan', '0.008', 'ahli', 24),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Melakukan Katalogisasi deskriptif bahan perpustakaan tingkat tiga (input di simpus)', '0.008', 'ahli', 25),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Melakukan validasi katalogisasi deskriptif bahan perpustakaan tingkat tiga', '0.018', 'ahli', 26),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Membuat kata kunci', '0.001', 'ahli', 27),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Membuat panduan pustaka , Menyusun dan menyebarkan informasi terseleksi dalam bentuk paket informasi secara tercetak/elektronik (pathfinder)', '0.015', 'ahli', 28),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Melakukan klasifikasi kompleks dan menentukan tajuk subyek bahan perpustakaan (dituliskan di buku dan tislip)', '0.018', 'ahli', 29),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Melakukan validasi klasifikasi kompleks dan tajuk subjek bahan perpustakaan', '0.028', 'ahli', 30),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Membuat tajuk kendali subjek', '0.015', 'ahli', 31),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Membuat tajuk kendali nama badan korporasi', '0.006', 'ahli', 32),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Membuat tajuk kendali nama orang ', '0.005', 'ahli', 33),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Membuat tajuk kendali nama geografi ', '0.005', 'ahli', 34),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Menyunting data bibliografi (editing di simpus)', '0.005', 'ahli', 35),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Membuat cadangan data (backup)', '0.001', 'ahli', 36),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Mengelola basis data (data maintenance)', '0.003', 'ahli', 37),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Melakukan validasi data di pangkalan data', '0.010', 'ahli', 38),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Membuat anotasi koleksi perpustakaan berbahasa daerah (ringkasan tentang buku)', '0.007', 'ahli', 39),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Membuat anotasi koleksi perpustakaan berbahasa asing (ringkasan tentang buku)', '0.007', 'ahli', 40),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Membuat abstrak indikatif koleksi perpustakaan Berbahasa Indonesia', '0.015', 'ahli', 41),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Membuat abstrak indikatif koleksi perpustkaan berbahasa daerah', '0.018', 'ahli', 42),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Membuat abstrak indikatif koleksi perpustakaan Berbahasa Asing', '0.040', 'ahli', 43),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Membuat abstrak informatif koleksi perpustakan berbahasa Indonesia', '0.030', 'ahli', 44),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Membuat abstrak informatif koleksi perpustakan berbahasa daerah', '0.050', 'ahli', 45),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Membuat abstrak informatif koleksi perpustakan berbahasa asing', '0.060', 'ahli', 46),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Menyusun literatur sekunder berupa bibliografi tercetak/elektronik', '0.005', 'ahli', 47),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Menyusun literatur sekunder berupa indeks tercetak/elektronik', '0.005', 'ahli', 48),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Menyusun literatur sekunder berupa kumpulan abstrak tercetak/elektronik', '0.008', 'ahli', 49),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Menyusun literatur sekunder berupa bibliografi beranotasi tercetak/elektronik', '0.008', 'ahli', 50),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pengolahan Bahan Perpustakaan Menyusun literatur sekunder berupa direktori tercetak/elektronik', '0.013', 'ahli', 51),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pelestarian Koleksi Perpustakaan Melakukan pelestarian fisik koleksi perpustakaan (penyampulan, fumigasi, pemberian kapur barus)', '0.730', 'ahli', 52),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pelestarian Koleksi Perpustakaan Melakukan pelestarian informasi koleksi perpustakaan dalam format digital (penyekenan koleksi)', '0.010', 'ahli', 53),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pelestarian Koleksi Perpustakaan Melakukan pelestarian informasi koleksi mikrofis', '0.005', 'ahli', 54),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pelestarian Koleksi Perpustakaan Melakukan pelestarian informasi koleksi mikrofilm', '0.005', 'ahli', 55),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Pelestarian Koleksi Perpustakaan Melakukan pelestarian informasi koleksi foto (arsip foto)', '0.005', 'ahli', 56),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN TEKNIS', 'Verifikasi tugas akhir (skripsi, tesis, disertasi, publikasi ilmiah), laporan ( KP, MTP, KKN), dan cek plagiarisme', '0.010', 'ahli', 57),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN PEMUSTAKA', 'Mengelola layanan sirkulasi', '0.005', 'ahli', 58),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN PEMUSTAKA', 'Melakukan bimbingan pemustaka dalam bentuk pendidikan pemustaka, Melakukan bimbingan penggunaan sumber referensi (LO)', '0.110', 'ahli', 59),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN PEMUSTAKA', 'Melakukan bimbingan pemustaka dalam bentuk literasi informasi dan pemanfaatan resources, penelusuran informasi kompleks (LI)', '0.330', 'ahli', 60),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN PEMUSTAKA', 'Mengelola layanan pinjam antar perpustakaan ( inter library loan service)', '0.008', 'ahli', 61),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN PEMUSTAKA', 'Mengelola layanan e-resources', '0.008', 'ahli', 62),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN PEMUSTAKA', 'Mengelola layanan koleksi perpustakaan bukan buku(non book materials service (laporan peminjaman multimedia)', '0.005', 'ahli', 63),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN PEMUSTAKA', 'Melakukan bimbingan penggunaan sumber referensi', '0.105', 'ahli', 64),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN PEMUSTAKA', 'Melakukan penelusuran informasi kompleks', '0.020', 'ahli', 65),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN PEMUSTAKA', 'Mengelola layanan storytelling', '0.275', 'ahli', 66),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN PEMUSTAKA', 'Membina kelompok pembaca; pembina komunitas literasi (PPM)', '0.100', 'ahli', 67),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN PEMUSTAKA', 'Mengelola layanan bagi pemustaka berkebutuhan khusus', '0.010', 'ahli', 68),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN PEMUSTAKA', 'Menyusun dan menyebarkan informasi terseleksi dalam bentuk lembar lepas secara tercetak/elektronik', '0.020', 'ahli', 69),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN PEMUSTAKA', 'Menyusun dan menyebarkan informasi terseleksi dalam bentuk paket informasi secara tercetak/elektronik', '0.220', 'ahli', 70),
('PELAYANAN PERPUSTAKAAN', 'PELAYANAN PEMUSTAKA', 'Membuat statistik kepustakawanan (statistik kegiatan pustakawan) laporan dalam jangka waktu tertentus; statistik pengunjung, peminjam (bulan, semester), koleksi (tahun)', '0.050', 'ahli', 71),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN SISTEM KEPUSTAKAWANAN', 'Melakukan pengkajian kepustakawanan bersifat sederhana (teknis operasional) (analisis permasalahan di perpustakaan unit ) berupa laporan quisioner per prodi/semester', '3.300', 'ahli', 72),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN SISTEM KEPUSTAKAWANAN', 'Melakukan pengkajian kepustakawanan bersifat sederhana (taktis operasional) (analisis permasalahan satu UAD ) ada diskripsi analisis permasalahan yang berujung rekomendasi', '6.600', 'ahli', 73),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN SISTEM KEPUSTAKAWANAN', 'Melakukan pengkajian kepustakawanan bersifat kompleks (strategis sektoral) (ada analisis kualitatif)', '9.900', 'ahli', 74),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN SISTEM KEPUSTAKAWANAN', 'Melakukan pengkajian kepustakawanan bersifat kompleks(strategis nasional) (lingkup nasional)', '15.400', 'ahli', 75),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Membuat prototip/model perpustakaan diakui untuk lingkup kelembagaan', '1.650', 'ahli', 76),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Membuat prototip/model perpustakaan yang dipatenkan (model prototip)', '3.300', 'ahli', 77),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Melakukan pengembangan prototip/model perpustakaan', '1.100', 'ahli', 78),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Memberi konsultasi kepustakawanan yang bersifat konsep kepada institusi  (rekomendasi kepustakawanan)', '1.485', 'ahli', 79),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Memberi konsultasi kepustakawanan yang bersifat konsep kepada perorangan (rekomendasi kepustakawanan)', '0.990', 'ahli', 80),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Membangun jejaring perpustakaan tingkat nasional  (TIM)', '8.800', 'ahli', 81),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Membangun jejaring perpustakaan tingkat internasional (TIM)', '11.000', 'ahli', 82),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Mengidentifikasi potensi wilayah untuk penyuluhan tentang pemanfaatan perpustakaan; penyuluhan tentang kepustakawanan', '0.990', 'ahli', 83),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Melaksanakan penyuluhan tentang pemanfaatan perpustakaan sebagai narasumber;  penyuluhan tentang kepustakawanan; sosialisasi perpustakaan dan kepustakawanan  (PPM)', '0.090', 'ahli', 84),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Melaksanakan penyuluhan tentang pemanfaatan perpustakaan sebagai penyaji;  penyuluhan tentang kepustakawanan; sosialisasi perpustakaan dan kepustakawanan  (PPM)', '0.060', 'ahli', 85),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Mengidentifikasi potensi wilayah untuk penyuluhan tentang pengembangan kepustakawanan', '1.320', 'ahli', 86),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Melaksanakan penyuluhan tentang pengembangan kepustakawanan sebagai narasumber', '0.120', 'ahli', 87),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Melaksanakan penyuluhan tentang pengembangan kepustakawanan sebagai penyaji', '0.060', 'ahli', 88),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Melakukan sosialisasi perpustakaan dan kepustakawanan sebagai narasumber', '0.495', 'ahli', 89),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Melakukan sosialisasi perpustakaan dan kepustakawanan sebagai penyaji', '0.275', 'ahli', 90),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'melakukan publisitas melalui media cetak dalam bentuk berita', '0.040', 'ahli', 91),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Melakukan publisitas melalui media cetak dalam bentuk sinopsis', '0.120', 'ahli', 92),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Melakukan publisitas melalui media cetak dalam bentuk brosur/leaflet/spanduk dan sejenisnya', '0.165', 'ahli', 93),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Melakukan publisitas melalui media elektronik dalam bentuk membuat naskah siaran radio', '0.110', 'ahli', 94),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Melakukan publisitas melalui media elektronik dengan menyiarkan naskah melalui radio', '0.010', 'ahli', 95),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Melakukan publisitas melalui media elektronik dalam bentuk membuat naskah siaran televisi', '0.330', 'ahli', 96),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Melakukan publisitas melalui media elektronik dalam bentuk menyiarkan naskah melalui televisi', '0.090', 'ahli', 97),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Melakukan publisitas melalui media elektronik dalam bentuk membuat naskah dan mengunggah melalui web (intranet/internet)', '0.110', 'ahli', 98),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Melakukan publisitas melalui media elektronik dalam bentuk membuat baskah film dalam bentuk audio visual', '0.495', 'ahli', 99),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Menyelenggarakan pameran sebagai panitia', '0.165', 'ahli', 100),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Menyelenggarakan pameran sebagai pemandu pameran di dalam negeri', '0.100', 'ahli', 101),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Menyelenggarakan pameran sebagai pemandu di luar negeri', '0.165', 'ahli', 102),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Menyelenggarakan pameran sebagai perancang desain', '0.165', 'ahli', 103),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Aktif di Amal Usaha Muhammadiyah dan kegiatan sosial seperti Khutbah Jum\'at, penceramah ', '0.120', 'ahli', 104),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENGEMBANGAN KEPUSTAKAWANAN', 'Aktif di Amal Usaha Muhammadiyah dan kegiatan sosial seperti Pengajian, kegiatan sosial', '0.06', 'ahli', 105),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'MENGANALISA/MENGKRITISI KARYA KEPUSTAKAWANAN', 'Menganalisa/mengkritisi karya sistem kepustakawanan', '0.300', 'ahli', 106),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'MENGANALISA/MENGKRITISI KARYA KEPUSTAKAWANAN', 'Menyempurnakan karya kepustakawanan', '0.440', 'ahli', 107),
('PENGEMBANGAN SISTEM  KEPUSTAKAWANAN', 'PENELAAH PENGEMBANGAN SISTEM KEPUSTAKAWANAN', 'Menelaah sistem kepustakawanan', '2.200', 'ahli', 108),
('PENGEMBANGAN PROFESI', 'MEMBUAT KARYA TULIS/KARYA ILMIAH DI BIDANG KEPUSTAKAWANAN', 'Membuat karya tulis/karya ilmiah hasil penelitian, pengkajian, survei, dan evaluasi di bidang kepustakawanan yang dipublikasikan dalam bentuk: buku yang diterbitkan dan diedarkan secara nasional, Satuan hasil : buku\r\nBukti fisik : buku asli atau fotokopinya', '12.5', 'ahli', 109),
('PENGEMBANGAN PROFESI', 'MEMBUAT KARYA TULIS/KARYA ILMIAH DI BIDANG KEPUSTAKAWANAN', 'Membuat karya tulis/karya ilmiah hasil penelitian, pengkajian, survei, dan evaluasi di bidang kepustakawanan yang dipublikasikan dalam bentuk: majalah ilmiah, Satuan hasil : naskah\r\nBukti fisik : majalah asli atau fotokopinya', '6', 'ahli', 110),
('PENGEMBANGAN PROFESI', 'MEMBUAT KARYA TULIS/KARYA ILMIAH DI BIDANG KEPUSTAKAWANAN', 'Membuat karya tulis/karya ilmiah hasil penelitian, pengkajian, survei, dan evaluasi di bidang keputakawanan yang tidak dipublikasikan  dalam bentuk: buku,  Satuan hasil : buku\r\nBukti fisik : buku asli atau  fotokopinya dengan melampirkan surat keterangan bahwa buku tersebut didokumentasikan di perpustakaan', '8', 'ahli', 111),
('PENGEMBANGAN PROFESI', 'MEMBUAT KARYA TULIS/KARYA ILMIAH DI BIDANG KEPUSTAKAWANAN', 'Membuat karya tulis/karya ilmiah hasil penelitian, pengkajian, survei, dan evaluasi di bidang keputakawanan yang tidak dipublikasikan  dalam bentuk: makalah, Satuan hasil : naskah\r\nBukti fisik : makalah dengan melampirkan surat keterangan bahwa makalah tersebut didokumentasikan di perpustakaan.', '4', 'ahli', 112),
('PENGEMBANGAN PROFESI', 'MEMBUAT KARYA TULIS/KARYA ILMIAH DI BIDANG KEPUSTAKAWANAN', 'Membuat karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah dengan gagasan sendiri di bidang kepustakawanan yang dipublikasikan dalam bentuk: buku, Satuan hasil : buku\r\nBukti fisik : buku asli atau fotokopinya.', '8', 'ahli', 113),
('PENGEMBANGAN PROFESI', 'MEMBUAT KARYA TULIS/KARYA ILMIAH DI BIDANG KEPUSTAKAWANAN', 'Membuat karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah dengan gagasan sendiri di bidang kepustakawanan yang dipublikasikan dalam bentuk: majalah ilmiah yang diakui secara nasional, Satuan hasil : makalah\r\nBukti fisik :\r\nmajalah asli atau fotokopinya.', '4', 'ahli', 114),
('PENGEMBANGAN PROFESI', 'MEMBUAT KARYA TULIS/KARYA ILMIAH DI BIDANG KEPUSTAKAWANAN', 'Membuat karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah dengan gagasan sendiri di bidang kepustakawanan yang tidak dipublikasikan dalam bentuk: buku, Satuan hasil : buku\r\nBukti fisik : buku asli atau fotokopinya dengan melampirkan surat keterangan bahwa buku tersebut didokumentasikan di perpustakaan', '7', 'ahli', 115),
('PENGEMBANGAN PROFESI', 'MEMBUAT KARYA TULIS/KARYA ILMIAH DI BIDANG KEPUSTAKAWANAN', 'Membuat karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah dengan gagasan sendiri di bidang kepustakawanan yang tidak dipublikasikan dalam bentuk: makalah, Satuan hasil : makalah\r\nBukti fisik : makalah, dengan melampirkan surat keterangan bahwa makalah tersebut didokumentasikan di perpustakaan', '3.5', 'ahli', 116),
('PENGEMBANGAN PROFESI', 'MEMBUAT KARYA TULIS/KARYA ILMIAH DI BIDANG KEPUSTAKAWANAN', 'Membuat karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah dengan gagasan sendiri di bidang kepustakawanan yang tidak dipublikasikan dalam bentuk: Membuat tulisan ilmiah populer di bidang kepustakawanan yang disebarluaskan melalui media massa, Satuan hasil : karya\r\nBukti fisik :\r\nArtikel asli atau fotokopinya', '2', 'ahli', 117),
('PENGEMBANGAN PROFESI', 'MEMBUAT KARYA TULIS/KARYA ILMIAH DI BIDANG KEPUSTAKAWANAN', 'Membuat karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah dengan gagasan sendiri di bidang kepustakawanan yang tidak dipublikasikan dalam bentuk: Menyampaikan prasarana berupa tinjauan, gagasan dan/atau ulaan ilmiah di bidang kepustakawanan pada pertemuan ilmiah, Satuan hasil : naskah\r\nBukti fisik : makalah dengan melampirkan surat tugas dan surat pernyataan melakukan kegiatan pertemuan ilmiah', '3', 'ahli', 118),
('PENGEMBANGAN PROFESI', 'PENERJEMAHAN/PENYADURAN BUKU DAN/ATAU BAHAN-BAHAN LAIN DI BIDANG KEPUSTAKAWANAN', 'Menerjemahkan/menyadur buku di bidang kepustakawanan yang dipublikasikan, dalam bentuk: buku yang diterbitkan dan diedarkan secara nasional, Satuan hasil : buku\r\nBukti fisik : buku hasil terjemahan/saduran atau fotokopinya beserta fotokopi sumber aslinya dan dilampiri dengan surat izin dari penerbit asli atau penulis', '7', 'ahli', 119),
('PENGEMBANGAN PROFESI', 'PENERJEMAHAN/PENYADURAN BUKU DAN/ATAU BAHAN-BAHAN LAIN DI BIDANG KEPUSTAKAWANAN', 'Menerjemahkan/menyadur buku di bidang kepustakawanan yang dipublikasikan, dalam bentuk: majalah ilmiah yang diakui oleh instansi yang berwenang, Satuan hasil : majalah\r\nBukti fisik : majalah hasil terjemahan/saduran atau fotokopinya beserta fotokopi sumber aslinya', '3.5', 'ahli', 120),
('PENGEMBANGAN PROFESI', 'PENERJEMAHAN/PENYADURAN BUKU DAN/ATAU BAHAN-BAHAN LAIN DI BIDANG KEPUSTAKAWANAN', 'Menerjemahkan/menyadur buku di bidang kepustakawanan yang tidak dipublikasikan, dalam bentuk: buku, Satuan hasil : buku\r\nBukti fisik : buku hasil terjemahan/saduran atau fotokopinya beserta fotokopi sumber aslinya dan dilengkapi dengan surat izin dari penerbit asli atau penulis', '3', 'ahli', 121),
('PENGEMBANGAN PROFESI', 'PENERJEMAHAN/PENYADURAN BUKU DAN/ATAU BAHAN-BAHAN LAIN DI BIDANG KEPUSTAKAWANAN', 'Menerjemahkan/menyadur buku di bidang kepustakawanan yang tidak dipublikasikan, dalam bentuk: makalah, Satuan hasil : makalah\r\nBukti fisik : makalah hasil terjemahan/saduran atau fotokopinya beserta fotokopi sumber aslinya, dengan melampirkan surat keterangan bahwa makalah tersebut didokumentasikan di perpustakaan', '1.5', 'ahli', 122),
('PENGEMBANGAN PROFESI', 'PENERJEMAHAN/PENYADURAN BUKU DAN/ATAU BAHAN-BAHAN LAIN DI BIDANG KEPUSTAKAWANAN', 'Menerjemahkan/menyadur buku di bidang kepustakawanan yang tidak dipublikasikan, dalam bentuk: Membuat abstrak tulisan di bidang kepustakawanan yang dimuat dalam penerbitan, Satuan hasil : makalah\r\nBukti fisik :\r\nTerbitan asli atau fotokopinya yang memuat artikel makalah tersebut', '2', 'ahli', 123),
('PENGEMBANGAN PROFESI', 'PENYUSUNAN BUKU PEDOMAN/KETENTUAN PELAKSANAAN/KETENTUAN TEKNIS DI BIDANG KEPUSTAKAWANAN', 'Membuat buku pedoman di bidang kepustakawan, Satuan hasil : pedoman\r\nBukti fisik : pedoman asli atau fotokopinya yang disahkan oleh kepala perpustakaan, baik yang diterbitkan atau hanya untuk kalangan terbatas, dilampiri surat keterangan bahwa pedoman tersebut didokumentasikan di perpustakaan', '2', 'ahli', 124),
('PENGEMBANGAN PROFESI', 'PENYUSUNAN BUKU PEDOMAN/KETENTUAN PELAKSANAAN/KETENTUAN TEKNIS DI BIDANG KEPUSTAKAWANAN', 'Membuat ketentuan pelaksanaan di bidang kepustakawanan, Satuan hasil : juklak\r\nBukti fisik : juklak yang diterbitkan dan dilampiri surat keterangan didokumentasikan di perpustakaan', '2', 'ahli', 125),
('PENGEMBANGAN PROFESI', 'PENYUSUNAN BUKU PEDOMAN/KETENTUAN PELAKSANAAN/KETENTUAN TEKNIS DI BIDANG KEPUSTAKAWANAN', 'Membuat ketentuan teknis di bidang kepustakwanan, Satuan hasil : juknis\r\nBukti fisik : juknis yang diterbitkan dan dilampiri surat keterangan didokumentasikan di perpustakaan', '2', 'ahli', 126),
('PENUNJANG TUGAS PUSTAKAWAN', 'PENGAJAR/PELATIH ADA DIKLAT FUNGSIONAL/TEKIS BIDANG KEPUSTAKAWANAN', 'Mengajar/melatih pada diklat fungsional/teknis di bidang kepustakawanan, Satuan hasil : surat keterangan\r\nBukti fisik : surat keterangan dari penyelenggara diklat disertai jadwal atau bukti fisik lain disertai surat ', '0.5', 'ahli', 127),
('PENUNJANG TUGAS PUSTAKAWAN', 'PERAN SERTA DALAM SEMINAR/LOKAKARYA/KONFERENSI DI BIDANG KEPUSTAKAWAN', 'Mengikuti seminar/lokakarya/konferensi di bidang kepustakawanan sebagai Pemrasaran,Satuan hasil : sertifikat\r\nBukti fisik :\r\nSertifikat dari penyelenggara kegiatan atau surat permohonan atau undangan sebagai pemrasaran', '1.5', 'ahli', 128),
('PENUNJANG TUGAS PUSTAKAWAN', 'PERAN SERTA DALAM SEMINAR/LOKAKARYA/KONFERENSI DI BIDANG KEPUSTAKAWAN', 'Mengikuti seminar/lokakarya/konferensi di bidang kepustakawanan sebagai pembahas/moderator/narasumber, Satuan hasil : sertifikat\r\nBukti fisik : sertifikat dari penyelenggara kegiatan atau surat permohonan atau undangan sebagai pembahas/ moderator/narasumber', '1', 'ahli', 129),
('PENUNJANG TUGAS PUSTAKAWAN', 'PERAN SERTA DALAM SEMINAR/LOKAKARYA/KONFERENSI DI BIDANG KEPUSTAKAWAN', 'Mengikuti seminar/lokakarya/konferensi di bidang kepustakawanan sebagai peserta, Satuan hasil : sertifikat\r\nBukti fisik :\r\nsertifikat dari penyelenggara kegiatan', '1', 'ahli', 130),
('PENUNJANG TUGAS PUSTAKAWAN', 'PERAN SERTA DALAM SEMINAR/LOKAKARYA/KONFERENSI DI BIDANG KEPUSTAKAWAN', 'Mengikuti delegasi ilmiah pertemuan nasional sebagai ketua, Satuan hasil : surat keterangan\r\nBukti fisik : surat keterangan dari penyelenggara kegiatan disertai surat tugas', '2', 'ahli', 131),
('PENUNJANG TUGAS PUSTAKAWAN', 'PERAN SERTA DALAM SEMINAR/LOKAKARYA/KONFERENSI DI BIDANG KEPUSTAKAWAN', 'Mengikuti delegasi ilmiah pertemuan nasional sebagai anggota, Satuan hasil : surat keterangan\r\nBukti fisik : surat keterangan dari penyelenggara kegiatan disertai surat tugas', '1', 'ahli', 132),
('PENUNJANG TUGAS PUSTAKAWAN', 'PERAN SERTA DALAM SEMINAR/LOKAKARYA/KONFERENSI DI BIDANG KEPUSTAKAWAN', 'Mengikuti delegasi ilmiah pertemuan internasional sebagai ketua, Satuan hasil : surat keterangan\r\nBukti fisik : surat keterangan dari penyelenggara kegiatan disertai surat tugas', '3', 'ahli', 133),
('PENUNJANG TUGAS PUSTAKAWAN', 'PERAN SERTA DALAM SEMINAR/LOKAKARYA/KONFERENSI DI BIDANG KEPUSTAKAWAN', 'Mengikuti delegasi ilmiah pertemuan internasional sebagai anggota, Satuan hasil : surat keterangan\r\nBukti fisik : surat keterangan dari penyelenggara kegiatan disertai surat tugas', '2', 'ahli', 134),
('PENUNJANG TUGAS PUSTAKAWAN', 'KEANGGOTAAN DALAM ORGANISASI PROFESI', 'Menjadi anggota organisasi Tingkat Nasional sebagai Pengurus Aktif, Satuan hasil : setiap tahun\r\nBukti fisik : fotokopi surat keputusan pengangkatan dari organisasi profesa', '1', 'ahli', 135),
('PENUNJANG TUGAS PUSTAKAWAN', 'KEANGGOTAAN DALAM ORGANISASI PROFESI', 'Menjadi Anggota Organisasi Tingkat Nasional sebagai anggota aktif, Satuan hasil : setiap tahun \r\nBukti fisik : fotokopi  kartu  anggota  organisasi profesi', '0.5', 'ahli', 136),
('PENUNJANG TUGAS PUSTAKAWAN', 'KEANGGOTAAN DALAM ORGANISASI PROFESI', 'Menjadi anggota organisasi tingkat Internasional pengurus aktif, Satuan hasil : setiap tahun\r\nBukti fisik : fotokopi surat keputusan pengangkatan dari organisasi profesi', '2', 'ahli', 137),
('PENUNJANG TUGAS PUSTAKAWAN', 'KEANGGOTAAN DALAM ORGANISASI PROFESI', 'Menjadi anggota organisasi tingkat Internasional anggota aktif, Satuan hasil : setiap tahun\r\nBukti fisik : fotokopi kartu anggota organisasi profesi', '1', 'ahli', 138),
('PENUNJANG TUGAS PUSTAKAWAN', 'KEANGGOTAAN DALAM ORGANISASI PROFESI', 'Keanggotaan dalam tim penilai sebagai ketua/wakil ketua, Satuan hasil : setiap tahun\r\nBukti fisik : fotokopi surat keputusan pengangkatan sebagai Tim Penilai', '1', 'ahli', 139),
('PENUNJANG TUGAS PUSTAKAWAN', 'KEANGGOTAAN DALAM ORGANISASI PROFESI', 'Keanggotaan dalam tim penilai sebagai anggota, Satuan hasil : setiap tahun\r\nBukti fisik : fotokopi surat keputusan pengangkatan sebagai Tim Penilai', '0.75', 'ahli', 140),
('PENUNJANG TUGAS PUSTAKAWAN', 'PEROLEHAN PENGHARGAAN/TANDA JASA', 'Tanda Kehormatan Satya Lencana Karya Satya selama 30 (tiga puluh) tahun, Satuan hasil : tanda jasa\r\nBukti fisik : fotokopi tanda jasa atau salinannya', '3', 'ahli', 141),
('PENUNJANG TUGAS PUSTAKAWAN', 'PEROLEHAN PENGHARGAAN/TANDA JASA', 'Tanda Kehormatan Satya Lencana Karya Satya selama 20 (dua puluh) tahun, Satuan hasil : tanda jasa\r\nBukti fisik : fotokopi tanda jasa atau salinannya', '2', 'ahli', 142),
('PENUNJANG TUGAS PUSTAKAWAN', 'PEROLEHAN PENGHARGAAN/TANDA JASA', 'Tanda Kehormatan Satya Lencana Karya Satya selama 10 (sepuluh) tahun, Satuan hasil : tanda jasa\r\nBukti fisik : fotokopi tanda jasa atau salinannya', '1', 'ahli', 143),
('PENUNJANG TUGAS PUSTAKAWAN', 'PEROLEHAN PENGHARGAAN/TANDA JASA', 'Penghargaan atas Prestasi regional/internasional, Satuan hasil : penghargaan\r\nBukti fisik :\r\nfotokopi piagam penghargaan atau salinannya', '3', 'ahli', 144),
('PENUNJANG TUGAS PUSTAKAWAN', 'PEROLEHAN PENGHARGAAN/TANDA JASA', 'Penghargaan atas Prestasi nasional, Satuan hasil : penghargaan\r\nBukti fisik :\r\nfotokopi piagam penghargaan atau salinannya', '2', 'ahli', 145),
('PENUNJANG TUGAS PUSTAKAWAN', 'PEROLEHAN PENGHARGAAN/TANDA JASA', 'Penghargaan atas Prestasi lokal, Satuan hasil : penghargaan\r\nBukti fisik :\r\nfotokopi piagam penghargaan atau salinannya', '1', 'ahli', 146),
('PENUNJANG TUGAS PUSTAKAWAN', 'MEMPEROLEH GELAR/IJAZAH KESARJANAAN LAINNYA', 'Memperoleh gelar/ijazah kesarjanaan yang tidak sesuai dengan bidang tugas: Memperoleh gelar/ijazah kesarjanaan yang tidak sesuai dengan bidang tugas Doktor (S3), Satuan hasil : ijazah\r\nBukti fisik : fotokopi ijazah yang dilegalisir oleh pejabat yang berwenang', '15', 'ahli', 147),
('PENUNJANG TUGAS PUSTAKAWAN', 'MEMPEROLEH GELAR/IJAZAH KESARJANAAN LAINNYA', 'Memperoleh gelar/ijazah kesarjanaan yang tidak sesuai dengan bidang tugas: Memperoleh gelar/ijazah kesarjanaan yang tidak sesuai dengan bidang tugas Pascasarjana (S2), Satuan hasil : ijazah\r\nBukti fisik : fotokopi ijazah yang dilegalisir oleh pejabat yang berwenang', '10', 'ahli', 148),
('PENUNJANG TUGAS PUSTAKAWAN', 'MEMPEROLEH GELAR/IJAZAH KESARJANAAN LAINNYA', 'Memperoleh gelar/ijazah kesarjanaan yang tidak sesuai dengan bidang tugas: Memperoleh gelar/ijazah kesarjanaan yang tidak sesuai dengan bidang tugas Sarjana (S1),  Satuan hasil : ijazah\r\nBukti fisik : fotokopi ijazah yang dilegalisir oleh pejabat yang berwenang', '5', 'ahli', 149),
('PENDIDIKAN', 'Pendidikan Sekolah dan Memperoleh Gelar/Ijazah', 'S4 ilmu kepustakawan', '350', 'ahli', 151);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_kerja`
--

CREATE TABLE `riwayat_kerja` (
  `riwayat` int(11) NOT NULL,
  `angka_kredit_saya` char(9) NOT NULL,
  `niy` char(10) NOT NULL,
  `id_riwayat` int(11) NOT NULL,
  `tanggal` year(4) NOT NULL,
  `upload_data` varchar(50) NOT NULL,
  `Keterangan` text NOT NULL,
  `status_riwayat` enum('baru','baru pengajuan','sudah lama mengajukan') NOT NULL,
  `status_penilai` enum('perbaikan','diterima','belum diperiksa','sudah diperbaiki') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_kerja`
--

INSERT INTO `riwayat_kerja` (`riwayat`, `angka_kredit_saya`, `niy`, `id_riwayat`, `tanggal`, `upload_data`, `Keterangan`, `status_riwayat`, `status_penilai`) VALUES
(5, '5', '60171014', 6, 2016, 'file-1567316375.png', 'nama\r\nsaya\r\nadalah\r\nmuhammad adi rezku', 'baru', 'diterima');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenjang_jabatan`
--
ALTER TABLE `jenjang_jabatan`
  ADD PRIMARY KEY (`id_jj`);

--
-- Indexes for table `penilai`
--
ALTER TABLE `penilai`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `niy` (`id_riwayat`);

--
-- Indexes for table `pustakawan`
--
ALTER TABLE `pustakawan`
  ADD PRIMARY KEY (`niy`),
  ADD KEY `jabatan` (`jabatan`);

--
-- Indexes for table `ringkasan_peraturan`
--
ALTER TABLE `ringkasan_peraturan`
  ADD PRIMARY KEY (`id_rp`);

--
-- Indexes for table `riwayat_kerja`
--
ALTER TABLE `riwayat_kerja`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `riwayat` (`riwayat`),
  ADD KEY `niy` (`niy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penilai`
--
ALTER TABLE `penilai`
  MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ringkasan_peraturan`
--
ALTER TABLE `ringkasan_peraturan`
  MODIFY `id_rp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `riwayat_kerja`
--
ALTER TABLE `riwayat_kerja`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penilai`
--
ALTER TABLE `penilai`
  ADD CONSTRAINT `penilai_ibfk_1` FOREIGN KEY (`id_riwayat`) REFERENCES `riwayat_kerja` (`id_riwayat`);

--
-- Constraints for table `pustakawan`
--
ALTER TABLE `pustakawan`
  ADD CONSTRAINT `pustakawan_ibfk_1` FOREIGN KEY (`jabatan`) REFERENCES `jenjang_jabatan` (`id_jj`);

--
-- Constraints for table `riwayat_kerja`
--
ALTER TABLE `riwayat_kerja`
  ADD CONSTRAINT `riwayat_kerja_ibfk_2` FOREIGN KEY (`niy`) REFERENCES `pustakawan` (`niy`),
  ADD CONSTRAINT `riwayat_kerja_ibfk_3` FOREIGN KEY (`riwayat`) REFERENCES `ringkasan_peraturan` (`id_rp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
