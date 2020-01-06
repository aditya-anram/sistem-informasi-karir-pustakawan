-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Des 2019 pada 20.22
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 5.6.38

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
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` enum('ahli','terampil','penilai','keppus') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`, `level`) VALUES
(8, '60171014', '60171014', 'ahli'),
(11, '0407016801', 'penilai', 'penilai'),
(15, '60020429', 'uvan', 'terampil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenjang_jabatan`
--

CREATE TABLE `jenjang_jabatan` (
  `id_jj` char(10) NOT NULL,
  `jebatan` varchar(50) NOT NULL,
  `pankat` varchar(50) NOT NULL,
  `status` enum('terampil','ahli','belum_ada') NOT NULL,
  `angka_kredit_dicapai` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenjang_jabatan`
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
('t1-001', 'Pustakawan Pelaksana', 'Pengatur Muda Tingkat I (II/b)', 'terampil', '40'),
('t1-002', 'Pustakawan Pelaksana', 'Pengatur (II/c)', 'terampil', '60'),
('t1-003', 'Pustakawan Pelaksana', 'Pengatur Tingkat I (II/d)', 'terampil', '80'),
('t2-001', 'Pustakawan Pelaksana Lanjutan', 'Penata Muda (III/a)', 'terampil', '100'),
('t2-002', 'Pustakawan Pelaksana Lanjutan', 'Penata Muda Tingkat I (III/b)', 'terampil', '150'),
('t3-001', 'Pustakawan Penyelia', 'Penata (III/c)', 'terampil', '200'),
('t3-002', 'Pustakawan Penyelia', 'Penata Tingkat I (III/d)', 'terampil', '300'),
('xx-0000', 'belum ada', 'belum ada', 'belum_ada', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `nidn` varchar(15) NOT NULL,
  `statusnilai` enum('sudah_tercukupi','belum_tercukupi') NOT NULL,
  `id_riwayat` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilai`
--

CREATE TABLE `penilai` (
  `nidn` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilai`
--

INSERT INTO `penilai` (`nidn`, `nama`) VALUES
('0407016801', 'Drs. Tedy Setiadi, M.T');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pustakawan`
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
-- Dumping data untuk tabel `pustakawan`
--

INSERT INTO `pustakawan` (`niy`, `nama`, `tanggal_lahir`, `gendre`, `pendidikan`, `tempat_lahir`, `jabatan`, `keterangan_pendidikan`) VALUES
('1700018131', 'Aditya A.R', '2001-06-13', 'pria', 'sma', 'Lampung', 't2-001', 'Negeri 1 Yogyakarta'),
('170018142', 'adi', '2019-08-05', 'pria', 'd1', 'baubau', 't1-002', 'pustakawan'),
('60020429', 'Uvan Susani', '1978-07-22', 'pria', 'sma', 'Yogyakarta', 't1-001', 'MA Negeri Maguwoharjo'),
('60171014', 'Ana pujiastuti, SIP', '1987-12-26', 'wanita', 's1', 'Bantul', 'xx-0000', 'Ilmu Perpustakaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ringkasan_peraturan`
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
-- Dumping data untuk tabel `ringkasan_peraturan`
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
('PENGEMBANGAN PROFESI', 'MEMBUAT KARYA TULIS/KARYA ILMIAH DI BIDANG KEPUSTAKAWANAN', 'Membuat karya tulis/karya ilmiah hasil penelitian, pengkajian, survei, dan evaluasi di bidang kepustakawanan yang dipublikasikan dalam bentuk: buku yang diterbitkan dan diedarkan secara nasional', '12.5', 'ahli', 109),
('PENGEMBANGAN PROFESI', 'MEMBUAT KARYA TULIS/KARYA ILMIAH DI BIDANG KEPUSTAKAWANAN', 'Membuat karya tulis/karya ilmiah hasil penelitian, pengkajian, survei, dan evaluasi di bidang kepustakawanan yang dipublikasikan dalam bentuk: majalah ilmiah', '6', 'ahli', 110),
('PENGEMBANGAN PROFESI', 'MEMBUAT KARYA TULIS/KARYA ILMIAH DI BIDANG KEPUSTAKAWANAN', 'Membuat karya tulis/karya ilmiah hasil penelitian, pengkajian, survei, dan evaluasi di bidang keputakawanan yang tidak dipublikasikan  dalam bentuk: buku,  ', '8', 'ahli', 111),
('PENGEMBANGAN PROFESI', 'MEMBUAT KARYA TULIS/KARYA ILMIAH DI BIDANG KEPUSTAKAWANAN', 'Membuat karya tulis/karya ilmiah hasil penelitian, pengkajian, survei, dan evaluasi di bidang keputakawanan yang tidak dipublikasikan  dalam bentuk: makalah', '4', 'ahli', 112),
('PENGEMBANGAN PROFESI', 'MEMBUAT KARYA TULIS/KARYA ILMIAH DI BIDANG KEPUSTAKAWANAN', 'Membuat karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah dengan gagasan sendiri di bidang kepustakawanan yang dipublikasikan dalam bentuk: buku, ', '8', 'ahli', 113),
('PENGEMBANGAN PROFESI', 'MEMBUAT KARYA TULIS/KARYA ILMIAH DI BIDANG KEPUSTAKAWANAN', 'Membuat karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah dengan gagasan sendiri di bidang kepustakawanan yang dipublikasikan dalam bentuk: majalah ilmiah yang diakui secara nasional', '4', 'ahli', 114),
('PENGEMBANGAN PROFESI', 'MEMBUAT KARYA TULIS/KARYA ILMIAH DI BIDANG KEPUSTAKAWANAN', 'Membuat karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah dengan gagasan sendiri di bidang kepustakawanan yang tidak dipublikasikan dalam bentuk: buku', '7', 'ahli', 115),
('PENGEMBANGAN PROFESI', 'MEMBUAT KARYA TULIS/KARYA ILMIAH DI BIDANG KEPUSTAKAWANAN', 'Membuat karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah dengan gagasan sendiri di bidang kepustakawanan yang tidak dipublikasikan dalam bentuk: makalah', '3.5', 'ahli', 116),
('PENGEMBANGAN PROFESI', 'MEMBUAT KARYA TULIS/KARYA ILMIAH DI BIDANG KEPUSTAKAWANAN', 'Membuat karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah dengan gagasan sendiri di bidang kepustakawanan yang tidak dipublikasikan dalam bentuk: Membuat tulisan ilmiah populer di bidang kepustakawanan yang disebarluaskan melalui media massa', '2', 'ahli', 117),
('PENGEMBANGAN PROFESI', 'MEMBUAT KARYA TULIS/KARYA ILMIAH DI BIDANG KEPUSTAKAWANAN', 'Membuat karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah dengan gagasan sendiri di bidang kepustakawanan yang tidak dipublikasikan dalam bentuk: Menyampaikan prasarana berupa tinjauan, gagasan dan/atau ulaan ilmiah di bidang kepustakawanan pada pertemuan ilmiah', '3', 'ahli', 118),
('PENGEMBANGAN PROFESI', 'PENERJEMAHAN/PENYADURAN BUKU DAN/ATAU BAHAN-BAHAN LAIN DI BIDANG KEPUSTAKAWANAN', 'Menerjemahkan/menyadur buku di bidang kepustakawanan yang dipublikasikan, dalam bentuk: buku yang diterbitkan dan diedarkan secara nasional', '7', 'ahli', 119),
('PENGEMBANGAN PROFESI', 'PENERJEMAHAN/PENYADURAN BUKU DAN/ATAU BAHAN-BAHAN LAIN DI BIDANG KEPUSTAKAWANAN', 'Menerjemahkan/menyadur buku di bidang kepustakawanan yang dipublikasikan, dalam bentuk: majalah ilmiah yang diakui oleh instansi yang berwenang', '3.5', 'ahli', 120),
('PENGEMBANGAN PROFESI', 'PENERJEMAHAN/PENYADURAN BUKU DAN/ATAU BAHAN-BAHAN LAIN DI BIDANG KEPUSTAKAWANAN', 'Menerjemahkan/menyadur buku di bidang kepustakawanan yang tidak dipublikasikan, dalam bentuk: buku, ', '3', 'ahli', 121),
('PENGEMBANGAN PROFESI', 'PENERJEMAHAN/PENYADURAN BUKU DAN/ATAU BAHAN-BAHAN LAIN DI BIDANG KEPUSTAKAWANAN', 'Menerjemahkan/menyadur buku di bidang kepustakawanan yang tidak dipublikasikan, dalam bentuk: makalah, ', '1.5', 'ahli', 122),
('PENGEMBANGAN PROFESI', 'PENERJEMAHAN/PENYADURAN BUKU DAN/ATAU BAHAN-BAHAN LAIN DI BIDANG KEPUSTAKAWANAN', 'Menerjemahkan/menyadur buku di bidang kepustakawanan yang tidak dipublikasikan, dalam bentuk: Membuat abstrak tulisan di bidang kepustakawanan yang dimuat dalam penerbitan', '2', 'ahli', 123),
('PENGEMBANGAN PROFESI', 'PENYUSUNAN BUKU PEDOMAN/KETENTUAN PELAKSANAAN/KETENTUAN TEKNIS DI BIDANG KEPUSTAKAWANAN', 'Membuat buku pedoman di bidang kepustakawan', '2', 'ahli', 124),
('PENGEMBANGAN PROFESI', 'PENYUSUNAN BUKU PEDOMAN/KETENTUAN PELAKSANAAN/KETENTUAN TEKNIS DI BIDANG KEPUSTAKAWANAN', 'Membuat ketentuan pelaksanaan di bidang kepustakawanan', '2', 'ahli', 125),
('PENGEMBANGAN PROFESI', 'PENYUSUNAN BUKU PEDOMAN/KETENTUAN PELAKSANAAN/KETENTUAN TEKNIS DI BIDANG KEPUSTAKAWANAN', 'Membuat ketentuan teknis di bidang kepustakwanan', '2', 'ahli', 126),
('PENUNJANG TUGAS PUSTAKAWAN', 'PENGAJAR/PELATIH ADA DIKLAT FUNGSIONAL/TEKIS BIDANG KEPUSTAKAWANAN', 'Mengajar/melatih pada diklat fungsional/teknis di bidang kepustakawanan', '0.5', 'ahli', 127),
('PENUNJANG TUGAS PUSTAKAWAN', 'PERAN SERTA DALAM SEMINAR/LOKAKARYA/KONFERENSI DI BIDANG KEPUSTAKAWAN', 'Mengikuti seminar/lokakarya/konferensi di bidang kepustakawanan sebagai Pemrasaran', '1.5', 'ahli', 128),
('PENUNJANG TUGAS PUSTAKAWAN', 'PERAN SERTA DALAM SEMINAR/LOKAKARYA/KONFERENSI DI BIDANG KEPUSTAKAWAN', 'Mengikuti seminar/lokakarya/konferensi di bidang kepustakawanan sebagai pembahas/moderator/narasumber', '1', 'ahli', 129),
('PENUNJANG TUGAS PUSTAKAWAN', 'PERAN SERTA DALAM SEMINAR/LOKAKARYA/KONFERENSI DI BIDANG KEPUSTAKAWAN', 'Mengikuti seminar/lokakarya/konferensi di bidang kepustakawanan sebagai peserta', '1', 'ahli', 130),
('PENUNJANG TUGAS PUSTAKAWAN', 'PERAN SERTA DALAM SEMINAR/LOKAKARYA/KONFERENSI DI BIDANG KEPUSTAKAWAN', 'Mengikuti delegasi ilmiah pertemuan nasional sebagai ketua', '2', 'ahli', 131),
('PENUNJANG TUGAS PUSTAKAWAN', 'PERAN SERTA DALAM SEMINAR/LOKAKARYA/KONFERENSI DI BIDANG KEPUSTAKAWAN', 'Mengikuti delegasi ilmiah pertemuan nasional sebagai anggota', '1', 'ahli', 132),
('PENUNJANG TUGAS PUSTAKAWAN', 'PERAN SERTA DALAM SEMINAR/LOKAKARYA/KONFERENSI DI BIDANG KEPUSTAKAWAN', 'Mengikuti delegasi ilmiah pertemuan internasional sebagai ketua', '3', 'ahli', 133),
('PENUNJANG TUGAS PUSTAKAWAN', 'PERAN SERTA DALAM SEMINAR/LOKAKARYA/KONFERENSI DI BIDANG KEPUSTAKAWAN', 'Mengikuti delegasi ilmiah pertemuan internasional sebagai anggota', '2', 'ahli', 134),
('PENUNJANG TUGAS PUSTAKAWAN', 'KEANGGOTAAN DALAM ORGANISASI PROFESI', 'Menjadi anggota organisasi Tingkat Nasional sebagai Pengurus Aktif', '1', 'ahli', 135),
('PENUNJANG TUGAS PUSTAKAWAN', 'KEANGGOTAAN DALAM ORGANISASI PROFESI', 'Menjadi Anggota Organisasi Tingkat Nasional sebagai anggota aktif', '0.5', 'ahli', 136),
('PENUNJANG TUGAS PUSTAKAWAN', 'KEANGGOTAAN DALAM ORGANISASI PROFESI', 'Menjadi anggota organisasi tingkat Internasional pengurus aktif', '2', 'ahli', 137),
('PENUNJANG TUGAS PUSTAKAWAN', 'KEANGGOTAAN DALAM ORGANISASI PROFESI', 'Menjadi anggota organisasi tingkat Internasional anggota aktif', '1', 'ahli', 138),
('PENUNJANG TUGAS PUSTAKAWAN', 'KEANGGOTAAN DALAM ORGANISASI PROFESI', 'Keanggotaan dalam tim penilai sebagai ketua/wakil ketua', '1', 'ahli', 139),
('PENUNJANG TUGAS PUSTAKAWAN', 'KEANGGOTAAN DALAM ORGANISASI PROFESI', 'Keanggotaan dalam tim penilai sebagai anggota', '0.75', 'ahli', 140),
('PENUNJANG TUGAS PUSTAKAWAN', 'PEROLEHAN PENGHARGAAN/TANDA JASA', 'Tanda Kehormatan Satya Lencana Karya Satya selama 30 (tiga puluh) tahun', '3', 'ahli', 141),
('PENUNJANG TUGAS PUSTAKAWAN', 'PEROLEHAN PENGHARGAAN/TANDA JASA', 'Tanda Kehormatan Satya Lencana Karya Satya selama 20 (dua puluh) tahun', '2', 'ahli', 142),
('PENUNJANG TUGAS PUSTAKAWAN', 'PEROLEHAN PENGHARGAAN/TANDA JASA', 'Tanda Kehormatan Satya Lencana Karya Satya selama 10 (sepuluh) tahun', '1', 'ahli', 143),
('PENUNJANG TUGAS PUSTAKAWAN', 'PEROLEHAN PENGHARGAAN/TANDA JASA', 'Penghargaan atas Prestasi regional/internasional', '3', 'ahli', 144),
('PENUNJANG TUGAS PUSTAKAWAN', 'PEROLEHAN PENGHARGAAN/TANDA JASA', 'Penghargaan atas Prestasi nasional', '2', 'ahli', 145),
('PENUNJANG TUGAS PUSTAKAWAN', 'PEROLEHAN PENGHARGAAN/TANDA JASA', 'Penghargaan atas Prestasi lokal', '1', 'ahli', 146),
('PENUNJANG TUGAS PUSTAKAWAN', 'MEMPEROLEH GELAR/IJAZAH KESARJANAAN LAINNYA', 'Memperoleh gelar/ijazah kesarjanaan yang tidak sesuai dengan bidang tugas: Memperoleh gelar/ijazah kesarjanaan yang tidak sesuai dengan bidang tugas Doktor (S3)', '15', 'ahli', 147),
('PENUNJANG TUGAS PUSTAKAWAN', 'MEMPEROLEH GELAR/IJAZAH KESARJANAAN LAINNYA', 'Memperoleh gelar/ijazah kesarjanaan yang tidak sesuai dengan bidang tugas: Memperoleh gelar/ijazah kesarjanaan yang tidak sesuai dengan bidang tugas Pascasarjana (S2)', '10', 'ahli', 148),
('PENUNJANG TUGAS PUSTAKAWAN', 'MEMPEROLEH GELAR/IJAZAH KESARJANAAN LAINNYA', 'Memperoleh gelar/ijazah kesarjanaan yang tidak sesuai dengan bidang tugas: Memperoleh gelar/ijazah kesarjanaan yang tidak sesuai dengan bidang tugas Sarjana (S1)', '5', 'ahli', 149),
('PENDIDIKAN', 'Pendidikan Sekolah Dan Memperoleh Gelar/Ijazah', 'SMA', '40', 'terampil', 152),
('PENDIDIKAN', 'Pendidikan Sekolah Dan Memperoleh Gelar/Ijazah', 'D2 Ilmu Perpustakaan', '40', 'terampil', 153),
('PENDIDIKAN', 'Pendidikan Sekolah Dan Memperoleh Gelar/Ijazah', 'D3 Ilmu Perpustakaan', '60', 'terampil', 154),
('PENDIDIKAN', 'DIKLAT FUNGSIONAL/TEKNIS KEPUSTAKAWANAN serta memperoleh surat tanda tamat pendidikan dan pelatihan atau setifikat', 'Mengikuti Diklat Fungsional/Teknis Kepustakawanan serta memperoleh surat tanda tamat pendidikan dan pelatihan atau setifikat : Lamanya lebih dari 960 jam', '15', 'terampil', 155),
('PENDIDIKAN', 'DIKLAT FUNGSIONAL/TEKNIS KEPUSTAKAWANAN serta memperoleh surat tanda tamat pendidikan dan pelatihan atau setifikat', 'Mengikuti Diklat Fungsional/Teknis Kepustakawanan serta memperoleh surat tanda tamat pendidikan dan pelatihan atau setifikat : Lamanya lebih dari 641-960 jam', '9', 'terampil', 156),
('PENDIDIKAN', 'DIKLAT FUNGSIONAL/TEKNIS KEPUSTAKAWANAN serta memperoleh surat tanda tamat pendidikan dan pelatihan atau setifikat', 'Mengikuti Diklat Fungsional/Teknis Kepustakawanan serta memperoleh surat tanda tamat pendidikan dan pelatihan atau setifikat : Lamanya lebih dari 481-640 jam', '6', 'terampil', 157),
('PENDIDIKAN', 'DIKLAT FUNGSIONAL/TEKNIS KEPUSTAKAWANAN serta memperoleh surat tanda tamat pendidikan dan pelatihan atau setifikat', 'Mengikuti Diklat Fungsional/Teknis Kepustakawanan serta memperoleh surat tanda tamat pendidikan dan pelatihan atau setifikat : Lamanya lebih dari 161-480 jam', '3', 'terampil', 158),
('PENDIDIKAN', 'DIKLAT FUNGSIONAL/TEKNIS KEPUSTAKAWANAN serta memperoleh surat tanda tamat pendidikan dan pelatihan atau setifikat', 'Mengikuti Diklat Fungsional/Teknis Kepustakawanan serta memperoleh surat tanda tamat pendidikan dan pelatihan atau setifikat : Lamanya lebih dari 81-160 jam', '2', 'terampil', 159),
('PENDIDIKAN', 'DIKLAT FUNGSIONAL/TEKNIS KEPUSTAKAWANAN serta memperoleh surat tanda tamat pendidikan dan pelatihan atau setifikat', 'Mengikuti Diklat Fungsional/Teknis Kepustakawanan serta memperoleh surat tanda tamat pendidikan dan pelatihan atau setifikat : Lamanya lebih dari 31-80 jam', '1', 'terampil', 160),
('PENDIDIKAN', 'DIKLAT FUNGSIONAL/TEKNIS KEPUSTAKAWANAN serta memperoleh surat tanda tamat pendidikan dan pelatihan atau setifikat', 'Mengikuti Diklat Fungsional/Teknis Kepustakawanan serta memperoleh surat tanda tamat pendidikan dan pelatihan atau setifikat : Lamanya lebih dari 10-30 jam', '0.5', 'terampil', 161),
('PENDIDIKAN', 'DIKLAT FUNGSIONAL/TEKNIS KEPUSTAKAWANAN serta memperoleh surat tanda tamat pendidikan dan pelatihan atau setifikat', 'Mengikuti Diklat Prajabatan Golongan II', '1.5', 'terampil', 162),
('PENGELOLAAN PERPUSTAKAAN', 'Perencanaan Penyelenggaraan Kegiatan Perpustakaan', 'Persiapan : Mengumpulkan data untuk persiapan perencanaan penyelenggaraan kegiatan perpustakaan', '0.036', 'terampil', 163),
('PENGELOLAAN PERPUSTAKAAN', 'Perencanaan Penyelenggaraan Kegiatan Perpustakaan', 'Persiapan : Mengelola data untuk persiapan perencanaan penyelenggaraan kegiatan perpustakaan', '0.120', 'terampil', 164),
('PENGELOLAAN PERPUSTAKAAN', 'Perencanaan Penyelenggaraan Kegiatan Perpustakaan', 'Menyusun rencana kerja operasional : menyusun rencana kerja operasional sebagai koordinator', '0.440', 'terampil', 165),
('PENGELOLAAN PERPUSTAKAAN', 'Perencanaan Penyelenggaraan Kegiatan Perpustakaan', 'Menyusun rencana kerja operasional : Menyusun rencana kerja operasional sebagai peserta/anggota', '0.220', 'terampil', 166),
('PENGELOLAAN PERPUSTAKAAN', 'Monitoring Dan Evaluasi Penyelenggaraan Kegiatan Perpustakaan', 'Menyelenggarakan monitoring penyelenggaraan perpustakaan', '0.275', 'terampil', 167),
('PENGELOLAAN PERPUSTAKAAN', 'Monitoring Dan Evaluasi Penyelenggaraan Kegiatan Perpustakaan', 'Melakukan evaluasi penyelenggaraan perpustakaan', '0.550', 'terampil', 168),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Teknis', 'Pengembangan koleksi : Menghimpun alat seleksi perpustakaan', '0.003', 'terampil', 169),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Teknis', 'Pengembangan koleksi : Mengidentifikasi bahan perpustakaan untuk pengadaan (pencocokan data di simpus dan RPS)', '0.004', 'terampil', 170),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Teknis', 'Pengembangan koleksi : Melakukan survei kebutuhan informasi pemustaka (usulan mahasiswa, usulan dosen, rps)', '0.080', 'terampil', 171),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Teknis', 'Pengembangan koleksi : Membuat desiderate ( daftar penundaan pengadaan buku)', '0.001', 'terampil', 172),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Teknis', 'Pengembangan koleksi : Meregestrasi bahan pustaka (penyentempelan buku, inventaris buku)', '0.001', 'terampil', 173),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Teknis', 'Pengembangan koleksi : Menyusun daftar tambahan bahan pustaka perpustakaan (accesion list)', '0.001', 'terampil', 174),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Teknis', 'Pengolahan bahan perpustakaan : Memverifikasi data bibliografi', '0.001', 'terampil', 175),
('PELAYANAN PERPUSTAKAAN', 'Pelayan Teknis', 'Pengolahan bahan perpustakaan : Melakukan katalogisasi deskriptif salinan', '0.001', 'terampil', 176),
('PELAYANAN PERPUSTAKAAN', 'Pelayan Teknis', 'Pengolahan bahan perpustakaan : Melakukan katalogisasi deskriptif tingkat satu', '0.003', 'terampil', 177),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Teknis', 'Pengolahan bahan perpustakaan : Melakukan katalogisasi deskriptif tingkat dua', '0.008', 'terampil', 178),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Teknis', 'Pengolahan bahan perpustakaan : Melakukan validasi katalogisasi deskriptif bahan perpustakaan ', '0.007', 'terampil', 179),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Teknis', 'Pengolahan bahan perpustakaan : Melakukan alih data bibliografi secara manual', '0.001', 'terampil', 180),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Teknis', 'Pengolahan bahan perpustakaan : Melakukan alih data bibliografi secara elektronik', '0.002', 'terampil', 181),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Teknis', 'Pengolahan bahan perpustakaan : Mengelola data bibliografi dalam bentuk kartu katalog', '0.002', 'terampil', 182),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Teknis', 'Pengolahan bahan perpustakaan : Mengelola data bibliografi dalam bentuk basis data', '0.007', 'terampil', 183),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Teknis', 'Pengolahan bahan perpustakaan : Membuat anotasi koleksi perpustakaan berbahasa Indonesia', '0.008', 'terampil', 184),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Teknis', 'Pengolahan bahan perpustakaan : Melakukan klasifikasi ringkas dan menentukan tajuk subjek', '0.013', 'terampil', 185),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Teknis', 'Pengolahan bahan perpustakaan : Melakukan validasi klasifikasi ringkas dan tajuk subjek (pembuatan tislip)', '0.013', 'terampil', 186),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Teknis', 'Pengolahan bahan perpustakaan : Membuat kelengkapan bahan pustaka (print labeling)', '0.003', 'terampil', 187),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Teknis', 'Pengolahan bahan perpustakaan : Membuat kliping (kliping manual/elektronik)', '0.005', 'terampil', 188),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Teknis', 'Penyimpanan dan perawatan koleksi perpustakaan : Mengidentifikasi kerusakan koleksi perpustakaan (memilih buku rusak/eksemplar banyak/buku tua)', '0.003', 'terampil', 189),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Teknis', 'Penyimpanan dan perawatan koleksi perpustakaan : Mengeluarkan koleksi perpustakaan dari jajaran koleksi dalam rangka pelestarian (mengeluarkan dari rak)', '0.001', 'terampil', 190),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Teknis', 'Penyimpanan dan perawatan koleksi perpustakaan : Merawat koleksi perpustakaan bersifat pencegahan (penyampulan, fumigasi, pemberian kapur barus)', '0.002', 'terampil', 191),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Teknis', 'Penyimpanan dan perawatan koleksi perpustakaan : Merawat koleksi perpustakaan bersifat penanganan (dapat perbaikan buku)', '0.007', 'terampil', 192),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Teknis', 'Penyimpanan dan perawatan koleksi perpustakaan : Mereproduksi koleksi perpustakaan dalam bentuk elektronik (menyeken koleksi)', '0.001', 'terampil', 193),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Teknis', 'Penyimpanan dan perawatan koleksi perpustakaan : Mengelola jajaran koleksi perpustakaan (shelving)', '0.003', 'terampil', 194),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Teknis', 'Verifikasi tugas akhir (skripsi, tesis, disertasi, publikasi ilmiah)', '0.010', 'terampil', 195),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Pemustaka', 'Melakukan layanan peminjaman dan pengembalian koleksi, peminjaman dan pengembalian kunci loker , (daftar koleksi)', '0.001', 'terampil', 196),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Pemustaka', 'Menyediakan koleksi ditempat (mencarikan koleksi di rak)', '0.002', 'terampil', 197),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Pemustaka', 'Melakukan layanan bahan pandang dengar (mikrofilm, mikrofis, CD ROM slide, kaset, peta, foto, dan film, termasuk komputer dan multimedia)', '0.013', 'terampil', 198),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Pemustaka', 'Melakukan layanan perpustakaan keliling', '0.022', 'terampil', 199),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Pemustaka', 'Melakukan layanan referensi cepat (quick reference/ menjawab pertanyaan pemustaka secara cepat)', '0.004', 'terampil', 200),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Pemustaka', 'Melakukan layanan penelusuran informasi sederhana (mencarikan referensi pemustaka per orang)', '0.009', 'terampil', 201),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Pemustaka', 'Melakukan layanan orientasi perpustakaan (LO)', '0.075', 'terampil', 202),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Pemustaka', 'Melakukan layanan storytelling', '0.110', 'terampil', 203),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Pemustaka', 'Melakukan layanan penyebaran informasi terbaru/kilat (WA, email, web, foto informasi ke mahasiswa, prodi, jurusan, dll)', '0.018', 'terampil', 204),
('PELAYANAN PERPUSTAKAAN', 'Pelayanan Pemustaka', 'Membuat statistik kepustakawanan ( statistik kegiatan pustakawan (laporan dalam jangka watu tertentu) , statistik pengunjung, peminjam (bulan,semeter), koleksi (tahun) )', '0.070', 'terampil', 205),
('PENGEMBANGAN SISTEM KEPUSTAKAWANAN', 'Pengembangan Kepustakawanan', 'Melaksanakan penyuluhan tatap muka dalam kelompok tentang kegunaan dan pemanfaatan perpustakaan kepada pemustaka (PPM)', '0.063', 'terampil', 206),
('PENGEMBANGAN SISTEM KEPUSTAKAWANAN', 'Pengembangan Kepustakawanan', 'Melakukan bimbingan pemustaka dalam bentuk literasi informasi dan pemanfaatan resource, penelusuran informasi kompleks (LI/LO)', '0.075', 'terampil', 207),
('PENGEMBANGAN SISTEM KEPUSTAKAWANAN', 'Pengembangan Kepustakawanan', 'Menyusun materi publisitas berbentuk poster spanduk, pembatas buku, stiker dan sejenisnya (brosur, leafleat, poster)', '0.070', 'terampil', 208),
('PENGEMBANGAN SISTEM KEPUSTAKAWANAN', 'Pengembangan Kepustakawanan', 'Menyelenggarakan pameran sebagai penata pameran (foto kegiatan)', '0.138', 'terampil', 209),
('PENGEMBANGAN SISTEM KEPUSTAKAWANAN', 'Pengembangan Kepustakawanan', 'Menyelenggarakan pameran sebagai pemandu pameran di dalam negeri', '0.125', 'terampil', 210),
('PENGEMBANGAN SISTEM KEPUSTAKAWANAN', 'Pengembangan Kepustakawanan', 'Menyelenggarakan pameran sebagai panitia', '0.440', 'terampil', 211),
('PENGEMBANGAN SISTEM KEPUSTAKAWANAN', 'Pengembangan Kepustakawanan', 'Aktif di amal usaha Muhammadiyah dan kegiatan sosial sperti Khutbah Jum\'at, penceramah', '0.120', 'terampil', 212),
('PENGEMBANGAN SISTEM KEPUSTAKAWANAN', 'Pengembangan Kepustakawanan', 'Aktif di amal usaha Muhammadiyah dan kegiatan sosial seperti Pengjian', '0.06', 'terampil', 213),
('PENGEMBANGAN PROFESI', 'Membuat Karya Tulis/Karya Ilmiah Di Bidang Kepustakawanan', 'Membuat karya tulis/karya ilmiah hasil penelitian, pengkajian, survei, dan evaluasi di bidang kepustakawanan yang dipublikasikan dalam bentuk : buku yang diterbitkan dan diedarkan secara nasional', '12.5', 'terampil', 214),
('PENGEMBANGAN PROFESI', 'Membuat Karya Tulis/Karya Ilmiah Di Bidang Kepustakawanan', 'Membuat karya tulis/karya ilmiah hasil penelitian, pengkajian, survei, dan evaluasi di bidang kepustakawanan yang dipublikasikan dalam bentuk : majalah ilmiah', '6', 'terampil', 215),
('PENGEMBANGAN PROFESI', 'Membuat Karya Tulis/Karya Ilmiah Di Bidang Kepustakawanan', 'Membuat karya tulis/karya ilmiah hasil penelitian, pengkajian, survei, dan evaluasi di bidang kepustakawanan yang tidak dipublikasikan dalam bentuk : buku', '8', 'terampil', 216),
('PENGEMBANGAN PROFESI', 'Membuat Karya Tulis/Karya Ilmiah Di Bidang Kepustakawanan', 'Membuat karya tulis/karya ilmiah hasil penelitian, pengkajian, survei, dan evaluasi di bidang kepustakawanan yang tidak dipublikasikan dalam bentuk : makalah', '4', 'terampil', 217),
('PENGEMBANGAN PROFESI', 'Membuat Karya Tulis/Karya Ilmiah Di Bidang Kepustakawanan', 'Membuat karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah dengan gagasan sendiri di bidang kepustakawanan yang dipublikasikan dalam bentuk : buku', '8', 'terampil', 218),
('PENGEMBANGAN PROFESI', 'Membuat Karya Tulis/Karya Ilmiah Di Bidang Kepustakawanan', 'Membuat karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah dengan gagasan sendiri di bidang kepustakawanan yang dipublikasikan dalam bentuk : majalah ilmiah yang diakui secara nasional', '4', 'terampil', 219),
('PENGEMBANGAN PROFESI', 'Membuat Karya Tulis/Karya Ilmiah Di Bidang Kepustakawanan', 'Membuat karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah dengan gagasan sendiri di bidang kepustakawanan yang tidak dipublikasikan dalam bentuk : buku', '7', 'terampil', 220),
('PENGEMBANGAN PROFESI', 'Membuat Karya Tulis/Karya Ilmiah Di Bidang Kepustakawanan', 'Membuat karya tulis/karya ilmiah berupa tinjauan atau ulasan ilmiah dengan gagasan sendiri di bidang kepustakawanan yang tidak dipublikasikan dalam bentuk : makalah', '3.5', 'terampil', 221),
('PENGEMBANGAN PROFESI', 'Membuat Karya Tulis/Karya Ilmiah Di Bidang Kepustakawanan', 'Membuat tulisan ilmiah populer di bidang kepustakawanan yang disebarluaskan melalui media massa', '2', 'terampil', 222),
('PENGEMBANGAN PROFESI', 'Membuat Karya Tulis/Karya Ilmiah Di Bidang Kepustakawanan', 'Menyampaikan prasarana berupa tinjauan, gagasan dan.atau ulasan ilmiah dibidang kepustakawanan pada pertemuan ilmiah', '3', 'terampil', 223),
('PENGEMBANGAN PROFESI', 'Penerjemahan/Penyaduran Buku Dan/Atau Bahan-Bahan Lain Di Bidang Kepustakawanan', 'Menerjemahkan/menyadur buku dan/atau bahan-bahan lain di bidang kepustakawanan yang dipublikasikan dalam bentuk : buku yang diterbitkan dan diedarkan secara nasional', '7', 'terampil', 224),
('PENGEMBANGAN PROFESI', 'Penerjemahan/Penyaduran Buku Dan/Atau Bahan-Bahan Lain Di Bidang Kepustakawanan', 'Menerjemahkan/menyadur buku dan/atau bahan-bahan lain di bidang kepustakawanan yang dipublikasikan dalam bentuk : majalah ilmiah yang diakui oleh instansi yang berwenang', '3.5', 'terampil', 225),
('PENGEMBANGAN PROFESI', 'Penerjemahan/Penyaduran Buku Dan/Atau Bahan-Bahan Lain Di Bidang Kepustakawanan', 'Menerjemahkan/menyadur buku dan/atau bahan-bahan lain di bidang kepustakawanan yang tidak dipublikasikan dalam bentuk : buku', '3', 'terampil', 226),
('PENGEMBANGAN PROFESI', 'Penerjemahan/Penyaduran Buku Dan/Atau Bahan-Bahan Lain Di Bidang Kepustakawanan', 'Menerjemahkan/menyadur buku dan/atau bahan-bahan lain di bidang kepustakawanan yang tidak dipublikasikan dalam bentuk : makalah', '1.5', 'terampil', 227),
('PENGEMBANGAN PROFESI', 'Penerjemahan/Penyaduran Buku Dan/Atau Bahan-Bahan Lain Di Bidang Kepustakawanan', 'Membuat abstrak tulisan di bidang kepustakawanan yang dimuat dalam penerbitan', '2', 'terampil', 228),
('PENGEMBANGAN PROFESI', 'Penyusunan Buku Pedoman/Ketentuan Pelaksanaan/Ketentuan Teknis Di Bidang Kepustakawanan', 'Membuat buku pedoman di bidang kepustakawanan', '2', 'terampil', 229),
('PENGEMBANGAN PROFESI', 'Penyusunan Buku Pedoman/Ketentuan Pelaksanaan/Ketentuan Teknis Di Bidang Kepustakawanan', 'Membuat ketentuan pelaksanaan di bidang kepustakawanan', '2', 'terampil', 230),
('PENGEMBANGAN PROFESI', 'Penyusunan Buku Pedoman/Ketentuan Pelaksanaan/Ketentuan Teknis Di Bidang Kepustakawanan', 'Membuat ketentuan teknis di bidang kepustakawanan', '2', 'terampil', 231),
('PENUNJANG TUGAS PUSTAKAWAN', 'Pengajar/Pelatih Pada Diklat Fungsional/Teknis Bidang Kepustakawanan', 'Mengajar/melatih pada diklat fugsional/teknis di bidang kepustakawanan', '0.5', 'terampil', 232),
('PENUNJANG TUGAS PUSTAKAWAN', 'Peran Serta Dalam Seminar/Lokakarya/Konferensi Di Bidang Kepustakawanan', 'Mengikuti seminar/lokakarya/konferensi di bidang kepustakawanan sebagai pemrasaran', '1.5', 'terampil', 233),
('PENUNJANG TUGAS PUSTAKAWAN', 'Peran Serta Dalam Seminar/Lokakarya/Konferensi Di Bidang Kepustakawanan', 'Mengikuti seminar/lokakarya/konferensi di bidang kepustakawanan sebagai pembahas/moderator/narasumber', '1', 'terampil', 234),
('PENUNJANG TUGAS PUSTAKAWAN', 'Peran Serta Dalam Seminar/Lokakarya/Konferensi Di Bidang Kepustakawanan', 'Mengikuti seminar/lokakarya/konferensi di bidang kepustakawanan sebagai peserta', '1', 'terampil', 235),
('PENUNJANG TUGAS PUSTAKAWAN', 'Peran Serta Dalam Seminar/Lokakarya/Konferensi Di Bidang Kepustakawanan', 'Mengikuti delegasi ilmiah pertemuan nasional sebagai ketua', '2', 'terampil', 236),
('PENUNJANG TUGAS PUSTAKAWAN', 'Peran Serta Dalam Seminar/Lokakarya/Konferensi Di Bidang Kepustakawanan', 'Mengikuti delegasi ilmiah pertemuan nasional sebagai anggota', '1', 'terampil', 237),
('PENUNJANG TUGAS PUSTAKAWAN', 'Peran Serta Dalam Seminar/Lokakarya/Konferensi Di Bidang Kepustakawanan', 'Mengikuti delegasi ilmiah pertemuan internasional sebagai ketua', '3', 'terampil', 238),
('PENUNJANG TUGAS PUSTAKAWAN', 'Peran Serta Dalam Seminar/Lokakarya/Konferensi Di Bidang Kepustakawanan', 'Mengikuti delegasi ilmiah pertemuan internasional sebagai anggota', '2', 'terampil', 239),
('PENUNJANG TUGAS PUSTAKAWAN', 'Keanggotaan Dalam Organisasi Profesi', 'Menjadi anggota organisasi tingkat nasional sebagai pengurus aktif', '1', 'terampil', 240),
('PENUNJANG TUGAS PUSTAKAWAN', 'Keanggotaan Dalam Organisasi Profesi', 'Menjadi anggota organisasi tingkat nasional sebagai anggota aktif', '0.5', 'terampil', 241),
('PENUNJANG TUGAS PUSTAKAWAN', 'Keanggotaan Dalam Organisasi Profesi', 'Menjadi anggota organisasi tingkat internasional pengurus aktif', '2', 'terampil', 242),
('PENUNJANG TUGAS PUSTAKAWAN', 'Keanggotaan Dalam Organisasi Profesi', 'Menjadi anggota organisasi tingkat internasional anggota aktif', '1', 'terampil', 243),
('PENUNJANG TUGAS PUSTAKAWAN', 'Keanggotaan Dalam Organisasi Profesi', 'Keanggotaan dalam tim penilai : Keanggotaan dalam tim penilai sebagai ketua/wakil ketua', '1', 'terampil', 244),
('PENUNJANG TUGAS PUSTAKAWAN', 'Keanggotaan Dalam Organisasi Profesi', 'Keanggotaan dalam tim penilai : Keanggotaan dalam tim penilai sebagai anggota', '0.75', 'terampil', 245),
('PENUNJANG TUGAS PUSTAKAWAN', 'Perolehan Penghargaan/Tanda Jasa', 'Tanda Kehormatan Satya Lencana Karya Satya : Tanda Kehormatan Satya Lencana Karya Satya selama 30 (tiga puluh) tahun', '3', 'terampil', 246),
('PENUNJANG TUGAS PUSTAKAWAN', 'Perolehan Penghargaan/Tanda Jasa', 'Tanda Kehormatan Satya Lencana Karya Satya : Tanda Kehormatan Satya Lencana Karya Satya selama 20 (dua puluh) tahun', '2', 'terampil', 247),
('PENUNJANG TUGAS PUSTAKAWAN', 'Perolehan Penghargaan/Tanda Jasa', 'Tanda Kehormatan Satya Lencana Karya Satya : Tanda Kehormatan Satya Lencana Karya Satya selama 10 (sepuluh) tahun', '1', 'terampil', 248),
('PENUNJANG TUGAS PUSTAKAWAN', 'Memperoleh Gelar/Ijazah Keserjanaan Lainnya', 'Memperoleh gelar/ijazah kesarjanaan yang tidak sesuai dengan bidang tugas : Memperoleh gelar/ijazah kesarjanaan yang tidak sesuai dengan bidang tugas Sarjana (S1)', '5', 'terampil', 249),
('PENUNJANG TUGAS PUSTAKAWAN', 'Memperoleh Gelar/Ijazah Keserjanaan Lainnya', 'Memperoleh gelar/ijazah kesarjanaan yang tidak sesuai dengan bidang tugas : Memperoleh gelar/ijazah kesarjanaan yang tidak sesuai dengan bidang tugas Diploma tiga (D3)', '4', 'terampil', 250);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_kerja`
--

CREATE TABLE `riwayat_kerja` (
  `riwayat` int(11) NOT NULL,
  `angka_kredit_saya` char(9) NOT NULL,
  `niy` char(10) NOT NULL,
  `id_riwayat` int(11) NOT NULL,
  `tanggal` year(4) NOT NULL,
  `upload_data` varchar(50) NOT NULL,
  `Keterangan` text NOT NULL,
  `status_riwayat` enum('baru','baru pengajuan','sudah lama mengajukan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_kerja`
--

INSERT INTO `riwayat_kerja` (`riwayat`, `angka_kredit_saya`, `niy`, `id_riwayat`, `tanggal`, `upload_data`, `Keterangan`, `status_riwayat`) VALUES
(152, '1', '60020429', 70, 1999, 'file-1570166919.jpeg', 'MAN Maguwoharjo', 'sudah lama mengajukan'),
(160, '1', '60020429', 71, 2013, 'file-1570167747.jpeg', 'sertifikat', 'baru pengajuan'),
(170, '6', '60020429', 72, 2010, 'file-1570167934.xlsx', 'sudah', 'baru pengajuan'),
(170, '26', '60020429', 73, 2011, 'file-1570168010.xlsx', 'sudah', 'baru pengajuan'),
(170, '37', '60020429', 74, 2012, 'file-1570168052.xlsx', 'sudah', 'baru pengajuan'),
(170, '14', '60020429', 75, 2013, 'file-1570168089.xlsx', 'sudah', 'baru pengajuan'),
(170, '52', '60020429', 76, 2014, 'file-1570168123.xlsx', 'sudah', 'baru pengajuan'),
(170, '6', '60020429', 77, 2016, 'file-1570168162.xlsx', 'sudah', 'baru pengajuan'),
(170, '363', '60020429', 78, 2017, 'file-1570168202.xlsx', 'sudah', 'baru pengajuan'),
(170, '75', '60020429', 79, 2018, 'file-1570168243.xlsx', 'sudah', 'baru pengajuan'),
(170, '6', '60020429', 80, 2019, 'file-1570168272.xlsx', 'sudah', 'baru pengajuan'),
(194, '1708', '60020429', 81, 2017, 'file-1570168373.xlsx', 'sudah', 'baru pengajuan'),
(235, '1', '60020429', 82, 2010, 'file-1570168481.jpeg', 'sudah', 'baru pengajuan'),
(235, '1', '60020429', 83, 2013, 'file-1570168516.jpeg', 'sudah', 'baru pengajuan'),
(235, '1', '60020429', 84, 2017, 'file-1570168605.jpeg', 'sudah', 'baru pengajuan'),
(235, '3', '60020429', 85, 2018, 'file-1570168637.jpeg', 'sudah', 'baru pengajuan'),
(235, '1', '60020429', 86, 2019, 'file-1570168702.jpeg', 'sudah', 'baru pengajuan'),
(249, '1', '60020429', 87, 2007, 'file-1570168793.jpeg', 's1 PAI UCY', 'baru pengajuan'),
(170, '52', '60020429', 88, 2015, 'file-1570169153.xlsx', 'sudah', 'baru pengajuan'),
(1, '1', '60171014', 89, 2012, 'file-1570283943.jpg', 'Lulus di Universitas Islam Negeri Sunan kalijaga', 'sudah lama mengajukan'),
(25, '373', '60171014', 94, 2015, 'file-1570284655.xlsx', 'melakukan katalogisasi 2015', 'sudah lama mengajukan'),
(25, '387', '60171014', 95, 2016, 'file-1570285152.xlsx', 'malukan katalogidasi 2016', 'baru pengajuan'),
(25, '184', '60171014', 96, 2017, 'file-1570285231.xlsx', 'melakukan katalogisasi 2017', 'baru pengajuan'),
(25, '461', '60171014', 97, 2018, 'file-1570285280.xlsx', 'melakukan katalogisasi 2018', 'baru pengajuan'),
(85, '2', '60171014', 98, 2016, 'file-1570285524.docx', 'melakukan penyuluhan 2016', 'baru pengajuan'),
(85, '5', '60171014', 99, 2017, 'file-1570285566.docx', 'melakukan penyaluhan 2017', 'baru pengajuan'),
(85, '5', '60171014', 100, 2018, 'file-1570285607.docx', 'melakukan penyaluhan 2018', 'baru pengajuan'),
(85, '1', '60171014', 101, 2019, 'file-1570285648.docx', 'melakukan penyuluhan 2019', 'baru pengajuan'),
(93, '2', '60171014', 102, 2016, 'file-1570285885.pdf', 'melakukan publisitas 2016', 'baru pengajuan'),
(93, '1', '60171014', 103, 2018, 'file-1570285831.pdf', 'melakukan publisitas 2018', 'baru pengajuan'),
(93, '14', '60171014', 105, 2019, 'file-1570286171.pdf', 'melakukan publisitas 2019', 'baru pengajuan'),
(98, '6', '60171014', 106, 2016, 'file-1570286277.docx', 'melakukan publisistas media elektronik 2016', 'baru pengajuan'),
(98, '32', '60171014', 107, 2017, 'file-1570286318.docx', 'melakukan publisistas media elektronik 2017', 'baru pengajuan'),
(98, '19', '60171014', 108, 2018, 'file-1570286357.docx', 'melakukan publisistas media elektronik 2018', 'baru pengajuan'),
(98, '43', '60171014', 109, 2019, 'file-1570286391.docx', 'melakukan publisistas media elektronik 2019', 'baru pengajuan'),
(110, '1', '60171014', 110, 2017, 'file-1570286986.pdf', 'karya ilmiah-IJAIL', 'baru pengajuan'),
(110, '1', '60171014', 111, 2017, 'file-1570287027.pdf', 'karya ilmiah - UIN', 'baru pengajuan'),
(110, '1', '60171014', 112, 2017, 'file-1570287062.pdf', 'karya ilmiah-UIN', 'baru pengajuan'),
(128, '1', '60171014', 113, 2017, 'file-1570287483.jpg', 'presenter sniper 2017', 'baru pengajuan'),
(128, '1', '60171014', 114, 2017, 'file-1570287510.jpg', 'presenter stain 2017', 'baru pengajuan'),
(128, '1', '60171014', 115, 2017, 'file-1570287535.jpg', 'presentain um 2017', 'baru pengajuan'),
(129, '1', '60171014', 116, 2019, 'file-1570287583.jpg', 'menjadi moderator 2019', 'baru pengajuan'),
(146, '1', '60171014', 117, 2017, 'file-1570287700.jpg', 'mendapatkan juara lomba RSJ klaten 2017', 'baru pengajuan'),
(146, '1', '60171014', 118, 2019, 'file-1570287736.jpg', 'mendapatkan juara pustakawan 2018', 'baru pengajuan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenjang_jabatan`
--
ALTER TABLE `jenjang_jabatan`
  ADD PRIMARY KEY (`id_jj`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `nidn` (`nidn`),
  ADD KEY `niy` (`id_riwayat`);

--
-- Indeks untuk tabel `penilai`
--
ALTER TABLE `penilai`
  ADD PRIMARY KEY (`nidn`);

--
-- Indeks untuk tabel `pustakawan`
--
ALTER TABLE `pustakawan`
  ADD PRIMARY KEY (`niy`),
  ADD KEY `jabatan` (`jabatan`);

--
-- Indeks untuk tabel `ringkasan_peraturan`
--
ALTER TABLE `ringkasan_peraturan`
  ADD PRIMARY KEY (`id_rp`);

--
-- Indeks untuk tabel `riwayat_kerja`
--
ALTER TABLE `riwayat_kerja`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `riwayat` (`riwayat`),
  ADD KEY `niy` (`niy`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `ringkasan_peraturan`
--
ALTER TABLE `ringkasan_peraturan`
  MODIFY `id_rp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT untuk tabel `riwayat_kerja`
--
ALTER TABLE `riwayat_kerja`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`nidn`) REFERENCES `penilai` (`nidn`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_riwayat`) REFERENCES `riwayat_kerja` (`id_riwayat`);

--
-- Ketidakleluasaan untuk tabel `pustakawan`
--
ALTER TABLE `pustakawan`
  ADD CONSTRAINT `pustakawan_ibfk_1` FOREIGN KEY (`jabatan`) REFERENCES `jenjang_jabatan` (`id_jj`);

--
-- Ketidakleluasaan untuk tabel `riwayat_kerja`
--
ALTER TABLE `riwayat_kerja`
  ADD CONSTRAINT `riwayat_kerja_ibfk_2` FOREIGN KEY (`niy`) REFERENCES `pustakawan` (`niy`),
  ADD CONSTRAINT `riwayat_kerja_ibfk_3` FOREIGN KEY (`riwayat`) REFERENCES `ringkasan_peraturan` (`id_rp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
