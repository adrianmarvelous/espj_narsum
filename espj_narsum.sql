-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Agu 2023 pada 04.33
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `espj_narsum`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang_id_sub`
--

CREATE TABLE `bidang_id_sub` (
  `id` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `id_sub` int(11) NOT NULL,
  `nama_bidang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bidang_id_sub`
--

INSERT INTO `bidang_id_sub` (`id`, `id_bidang`, `id_sub`, `nama_bidang`) VALUES
(1, 1, 67, 'Pelayanan Publik dan Tata Laksana'),
(2, 2, 68, 'Perencanaan, Pelaporan Kinerja dan Reformasi Birokrasi'),
(3, 2, 69, 'Kelembagaan dan Analisis Jabatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `f1`
--

CREATE TABLE `f1` (
  `id_sub` int(20) NOT NULL,
  `id` int(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `metode` varchar(255) NOT NULL,
  `rencanaPemilihanPenyedia` varchar(255) DEFAULT NULL,
  `rencanaPelaksanaPekerjaan` varchar(255) NOT NULL,
  `alokasi` bigint(20) NOT NULL,
  `persentase_januari` double NOT NULL,
  `januari` int(20) NOT NULL,
  `persentase_februari` double NOT NULL,
  `februari` int(20) NOT NULL,
  `persentase_maret` double NOT NULL,
  `maret` int(20) NOT NULL,
  `persentase_april` double NOT NULL,
  `april` int(20) NOT NULL,
  `persentase_mei` double NOT NULL,
  `mei` int(20) NOT NULL,
  `persentase_juni` double NOT NULL,
  `juni` int(20) NOT NULL,
  `persentase_juli` double NOT NULL,
  `juli` int(20) NOT NULL,
  `persentase_agustus` double NOT NULL,
  `agustus` int(20) NOT NULL,
  `persentase_september` double NOT NULL,
  `september` int(20) NOT NULL,
  `persentase_oktober` double NOT NULL,
  `oktober` int(20) NOT NULL,
  `persentase_november` double NOT NULL,
  `november` int(20) NOT NULL,
  `persentase_desember` double NOT NULL,
  `desember` int(20) NOT NULL,
  `persentase_total` double NOT NULL,
  `total` bigint(20) NOT NULL,
  `tahun` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `f1`
--

INSERT INTO `f1` (`id_sub`, `id`, `nama`, `metode`, `rencanaPemilihanPenyedia`, `rencanaPelaksanaPekerjaan`, `alokasi`, `persentase_januari`, `januari`, `persentase_februari`, `februari`, `persentase_maret`, `maret`, `persentase_april`, `april`, `persentase_mei`, `mei`, `persentase_juni`, `juni`, `persentase_juli`, `juli`, `persentase_agustus`, `agustus`, `persentase_september`, `september`, `persentase_oktober`, `oktober`, `persentase_november`, `november`, `persentase_desember`, `desember`, `persentase_total`, `total`, `tahun`) VALUES
(69, 23008934, 'Tenaga Non ASN Kelas Jabatan 6 dan 7', 'Swakelola Tipe I/\nPenunjang', '', '02 Januari 2023 - 31 Desember 2023', 156455936, 0, 752173, 10, 15645593, 10, 15645593, 10, 15645593, 10, 15645593, 10, 15645593, 10, 15645593, 10, 15645593, 10, 15645593, 10, 15645599, 9, 14893420, 0, 0, 100, 156455936, 2023),
(68, 23009169, 'Iuran JK / JKK Tenaga Operasional', 'Pengadaan Langsung (Pembelian/Pembayaran Langsung)/\nJasa Lainnya', '', '02 Januari 2023 - 30 Desember 2023', 1580565, 10, 158056, 10, 158056, 10, 158056, 10, 158056, 10, 158056, 10, 158056, 10, 158056, 10, 158056, 10, 158056, 10, 158061, 0, 0, 0, 0, 100, 1580565, 2023),
(68, 23009266, 'Honorarium Tenaga Non ASN dan Iuran JKN', 'Swakelola Tipe I/\nPenunjang', '', '02 Januari 2023 - 30 Desember 2023', 304405337, 0, 1422138, 9, 29580454, 9, 29580454, 11, 33715454, 9, 29580454, 9, 29580454, 9, 29580454, 9, 29580454, 9, 29580454, 9, 29580454, 9, 28365066, 1, 4259047, 100, 304405337, 2023),
(68, 23009368, 'Honorarium Tim Anggaran Pemerintah Daerah Yang Ditetapkan Kepala Daerah (Pembina)', 'Swakelola Tipe I/\nPenunjang', '', '02 Januari 2023 - 30 Desember 2023', 78000000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 100, 78000000, 2023),
(68, 23009394, 'Honorarium Tim Pelaksana Kegiatan yang Ditetapkan Kepala Daerah', 'Swakelola Tipe I/\nPenunjang', '', '02 Januari 2023 - 30 Desember 2023', 76200000, 8, 6350000, 8, 6350000, 7, 5600000, 7, 5600000, 7, 5600000, 7, 5600000, 7, 5600000, 7, 5600000, 7, 5600000, 7, 5600000, 16, 12350000, 8, 6350000, 100, 76200000, 2023),
(68, 23009414, 'Honorarium Narasumber', 'Swakelola Tipe I/\nPenunjang', '', '02 Januari 2023 - 30 Desember 2023', 604213890, 4, 29200000, 6, 39800000, 8, 52200000, 5, 35800000, 6, 39600000, 7, 47800000, 5, 35000000, 7, 45000000, 6, 37000000, 7, 45000000, 21, 129800000, 11, 68013890, 100, 604213890, 2023),
(68, 23009556, 'Makan PNS dan/atau Non PNS', 'Pembelian Secara Elektronik/\nPengadaan Barang', '01 Januari 2023 - 02 Januari 2023', '02 Januari 2023 - 30 Desember 2023', 24970000, 7, 1815000, 7, 1815000, 4, 1210000, 2, 605000, 5, 1375000, 5, 1375000, 8, 2062500, 0, 55000, 0, 0, 0, 0, 50, 12677500, 7, 1980000, 100, 24970000, 2023),
(67, 23009637, 'Iuran JK / JKK Tenaga Operasional', 'Pengadaan Langsung (Pembelian/Pembayaran Langsung)/\nJasa Lainnya', '', '02 Januari 2023 - 30 Desember 2023', 527949, 10, 52795, 10, 52795, 10, 52795, 10, 52795, 10, 52795, 10, 52795, 10, 52795, 10, 52795, 10, 52795, 10, 52794, 0, 0, 0, 0, 100, 527949, 2023),
(67, 23009663, 'Honor Tenaga Non ASN dan Iuran JKN Tenaga Operasional', 'Swakelola Tipe I/\nPenunjang', '', '02 Januari 2023 - 30 Desember 2023', 101679240, 0, 488843, 10, 10167924, 10, 10167924, 10, 10167924, 10, 10167924, 10, 10167924, 10, 10167924, 10, 10167924, 10, 10167924, 10, 10167924, 9, 9679081, 0, 0, 100, 101679240, 2023),
(67, 23009671, 'Tenaga Surveyor', 'Swakelola Tipe I/\nPenunjang', '', '02 Januari 2023 - 30 Desember 2023', 15759000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50, 7879500, 0, 0, 0, 0, 0, 0, 0, 0, 50, 7879500, 0, 0, 100, 15759000, 2023),
(67, 23009682, 'Honorarium Tim Anggaran Pemerintah Daerah Yang Ditetapkan Kepala Daerah', 'Swakelola Tipe I/\nPenunjang', '', '02 Januari 2023 - 30 Desember 2023', 78000000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 100, 78000000, 2023),
(67, 23009692, 'Honorarium Tim Pelaksana Kegiatan yang Ditetapkan Kepala Daerah', 'Swakelola Tipe I/\nPenunjang', '', '02 Januari 2023 - 30 Desember 2023', 42600000, 8, 3550000, 8, 3550000, 6, 2800000, 6, 2800000, 6, 2800000, 6, 2800000, 6, 2800000, 6, 2800000, 6, 2800000, 6, 2800000, 22, 9550000, 8, 3550000, 100, 42600000, 2023),
(67, 23009704, 'Honorarium Narasumber', 'Swakelola Tipe I/\nPenunjang', '', '02 Januari 2023 - 30 Desember 2023', 732679559, 4, 32800000, 8, 65200000, 5, 43000000, 6, 46800000, 3, 24900000, 6, 44600000, 3, 24000000, 5, 37000000, 6, 45000000, 6, 45000000, 32, 241600000, 11, 82779559, 100, 732679559, 2023),
(69, 23009827, 'Sewa Fotocopy (Copy, Print, Scan)', 'Pengadaan Langsung (Pembelian/Pembayaran Langsung)/\nJasa Lainnya', '', '02 Januari 2023 - 28 Februari 2023', 5328000, 50, 2664000, 50, 2664000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 5328000, 2023),
(69, 23011879, 'Iuran JKK dan JK Tenaga Operasional', 'Pengadaan Langsung (Pembelian/Pembayaran Langsung)/\nJasa Lainnya', '', '02 Januari 2023 - 31 Desember 2023', 812367, 10, 81236, 10, 81236, 10, 81236, 10, 81236, 10, 81236, 10, 81236, 10, 81236, 10, 81236, 10, 81236, 10, 81243, 0, 0, 0, 0, 100, 812367, 2023),
(69, 23011888, 'Honorarium Tim Anggaran Pemerintah Daerah Yang Ditetapkan Kepala Daerah (Pengarah)', 'Swakelola Tipe I/\nPenunjang', '', '02 Januari 2023 - 31 Desember 2023', 78000000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 8, 6500000, 100, 78000000, 2023),
(69, 23011897, 'Honorarium Tim Pelaksana Kegiatan yang Ditetapkan Kepala Daerah', 'Swakelola Tipe I/\nPenunjang', '', '02 Januari 2023 - 31 Desember 2023', 76200000, 8, 6350000, 8, 6350000, 7, 5600000, 7, 5600000, 7, 5600000, 7, 5600000, 7, 5600000, 7, 5600000, 7, 5600000, 7, 5600000, 16, 12350000, 8, 6350000, 100, 76200000, 2023),
(69, 23011918, 'Service AC Split', 'Pembelian Secara Elektronik/\nJasa Lainnya', '01 Februari 2023 - 11 Februari 2023', '14 Februari 2023 - 31 Desember 2023', 16250400, 0, 0, 4, 677100, 8, 1354200, 4, 677100, 0, 0, 8, 1354200, 0, 0, 0, 0, 0, 0, 0, 0, 54, 8802300, 20, 3385500, 100, 16250400, 2023),
(69, 23012055, 'Snack', 'Pembelian Secara Elektronik/\nPengadaan Barang', '02 Januari 2023 - 03 Januari 2023', '04 Januari 2023 - 31 Desember 2023', 31900000, 5, 1760000, 8, 2640000, 2, 880000, 2, 880000, 5, 1760000, 11, 3520000, 9, 2948000, 0, 0, 0, 0, 0, 0, 37, 12012000, 17, 5500000, 100, 31900000, 2023),
(69, 23012131, 'Refill Air Mineral Galon', 'Pengadaan Langsung (Pembelian/Pembayaran Langsung)/\nPengadaan Barang', '', '02 Januari 2023 - 31 Desember 2023', 5550000, 4, 222000, 6, 333000, 4, 222000, 2, 111000, 8, 444000, 8, 444000, 3, 199793, 3, 181630, 0, 0, 0, 0, 35, 1949577, 26, 1443000, 100, 5550000, 2023),
(69, 23012190, 'BBM', 'Pengadaan Yang Dikecualikan (Penyedia)/\nPengadaan Barang', '', '02 Januari 2023 - 31 Desember 2023', 81799364, 8, 7000000, 8, 7000000, 8, 7000000, 8, 7000000, 8, 7000000, 8, 7000000, 7, 6000000, 7, 6000000, 7, 6000000, 7, 6000000, 13, 11049364, 5, 4750000, 100, 81799364, 2023),
(69, 23012458, 'Honorarium Narasumber', 'Swakelola Tipe I/\nPenunjang', '', '02 Januari 2023 - 31 Desember 2023', 563295555, 11, 63000000, 10, 57000000, 5, 32800000, 8, 47800000, 4, 26600000, 6, 36200000, 5, 33000000, 6, 38000000, 6, 36600000, 6, 36600000, 13, 74800000, 14, 80895555, 100, 563295555, 2023),
(69, 23013597, 'Meterai 10000', 'Pengadaan Langsung (Pembelian/Pembayaran Langsung)/\nPengadaan Barang', '', '02 Januari 2023 - 31 Desember 2023', 1000000, 100, 1000000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 1000000, 2023),
(69, 23013998, 'Belanja Alat/Bahan untuk Kegiatan Kantor', 'Pembelian Secara Elektronik/\nPengadaan Barang', '02 Januari 2023 - 06 Januari 2023', '09 Januari 2023 - 30 Desember 2023', 34578453, 19, 6623303, 17, 5889882, 0, 0, 0, 0, 18, 6441374, 0, 0, 0, 0, 0, 0, 0, 214896, 0, 0, 44, 15408998, 0, 0, 100, 34578453, 2023),
(69, 23014028, 'Toner Cartridge HP 307A', 'Pembelian Secara Elektronik/\nPengadaan Barang', '02 Januari 2023 - 06 Januari 2023', '09 Januari 2023 - 30 Desember 2023', 30908565, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 30908565, 0, 0, 100, 30908565, 2023),
(69, 23016220, 'Mouse', 'Pembelian Secara Elektronik/\nPengadaan Barang', '02 Januari 2023 - 06 Januari 2023', '09 Januari 2023 - 30 Desember 2023', 555000, 0, 0, 100, 555000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 555000, 2023),
(69, 23016222, 'Buku Cek 50 Lembar', 'Pengadaan Langsung (Pembelian/Pembayaran Langsung)/\nPengadaan Barang', '', '02 Januari 2023 - 30 Desember 2023', 677100, 0, 0, 0, 0, 100, 677100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 677100, 2023),
(69, 23020023, 'Toner HP 83A', 'Pembelian Secara Elektronik/\nPengadaan Barang', '02 Januari 2023 - 06 Januari 2023', '09 Januari 2023 - 30 Desember 2023', 21154508, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 21154508, 0, 0, 100, 21154508, 2023),
(68, 23024368, 'Makan PNS dan/atau Non PNS', 'Pengadaan Langsung (Pembelian/Pembayaran Langsung)/\nPengadaan Barang', '', '02 Januari 2023 - 30 Desember 2023', 5001, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 5001, 100, 5001, 2023),
(69, 23026319, 'Service Printer', 'Pengadaan Langsung (Pembelian/Pembayaran Langsung)/\nJasa Lainnya', '', '02 Januari 2023 - 31 Desember 2023', 7659000, 0, 0, 20, 1531800, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50, 3829500, 30, 2297700, 100, 7659000, 2023),
(69, 23026320, 'Stempel', 'Pengadaan Langsung (Pembelian/Pembayaran Langsung)/\nPengadaan Barang', '', '02 Januari 2023 - 31 Desember 2023', 3076797, 0, 0, 0, 0, 0, 0, 0, 0, 11, 360000, 0, 0, 14, 450000, 0, 0, 0, 0, 0, 0, 73, 2266797, 0, 0, 100, 3076797, 2023),
(69, 23029101, 'Sewa Fotocopy', 'Pembelian Secara Elektronik/\nJasa Lainnya', '21 Februari 2023 - 28 Februari 2023', '01 Maret 2023 - 29 Desember 2023', 26640000, 0, 0, 0, 0, 10, 2664000, 10, 2664000, 7, 1887000, 7, 1887000, 0, 0, 0, 0, 0, 0, 0, 0, 55, 14874000, 10, 2664000, 100, 26640000, 2023);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_log`
--

CREATE TABLE `login_log` (
  `id` int(11) NOT NULL,
  `tgl` datetime DEFAULT NULL,
  `periode_tahun` int(20) NOT NULL,
  `expired` datetime DEFAULT NULL,
  `token` varchar(40) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `useragent` varchar(150) DEFAULT NULL,
  `stat` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login_log`
--

INSERT INTO `login_log` (`id`, `tgl`, `periode_tahun`, `expired`, `token`, `username`, `ip`, `useragent`, `stat`) VALUES
(1, '2023-08-09 08:55:26', 2023, '0000-00-00 00:00:00', '', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(2, '2023-08-09 08:55:37', 2023, '0000-00-00 00:00:00', '', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(3, '2023-08-09 08:56:17', 2023, '0000-00-00 00:00:00', '', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(4, '2023-08-09 08:58:11', 2023, '0000-00-00 00:00:00', '', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(5, '2023-08-09 08:58:34', 2023, '0000-00-00 00:00:00', '', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(6, '2023-08-09 09:02:39', 2023, '2023-08-09 15:02:39', 'e9024bc7cb6be48677464f2077654ce8427b4349', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(7, '2023-08-09 09:04:19', 2023, '2023-08-09 15:04:19', '5add8237617fec80a663ced1c967f3cc3e43ef0f', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(8, '2023-08-09 09:06:25', 2023, '2023-08-09 15:06:25', 'ec3baed3b8775bb33caac453f5c4d493cfdd7ce1', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(9, '2023-08-09 09:07:35', 2023, '2023-08-09 15:07:35', '52198d59d0636474fd5d2e3c6c971905f01a208c', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(10, '2023-08-09 09:07:46', 2023, '2023-08-09 15:07:46', '590baabe9cc1c0ca62759c379c25e8d73439a755', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(11, '2023-08-09 09:12:24', 2023, '2023-08-09 15:12:24', '712a81f1675e2fd78809cd1aa2f70493d23f6810', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(12, '2023-08-09 09:12:57', 2023, '2023-08-09 15:12:57', '3d7d47c69ea69d7e8e8b3f62b52ce58b0eede52f', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(13, '2023-08-09 09:17:02', 2023, '2023-08-09 15:17:02', 'a095f43c53612136e14eb52512e5fc74dbdf53bd', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(14, '2023-08-09 09:19:14', 2023, '2023-08-09 15:19:14', '4befa74afcb269bce0838581fb0de2579b1138c3', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(15, '2023-08-09 09:20:51', 2023, '2023-08-09 15:20:51', 'd62541ebda793ce6ccfabd417f44c425c06bba5b', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(16, '2023-08-09 09:27:26', 2023, '2023-08-09 15:27:26', 'd2d9938a2cc77bea4a8fded7557ae7b20f0d3ae9', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(17, '2023-08-09 09:27:42', 2023, '2023-08-09 15:27:42', '90dc3d3d678ed6c3998bd0033e7841c1a534b354', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(18, '2023-08-09 09:29:24', 2023, '2023-08-09 15:29:24', '63f17eb92030d5155226c46e1c062e26ff02dcbd', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(19, '2023-08-09 09:29:57', 2023, '2023-08-09 09:36:03', '0950c5c39c0328bfeadb12e0266d545e1abf6976', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(20, '2023-08-09 09:36:31', 2023, '2023-08-09 10:44:16', '62e596769054a724e22b4e085e1cecc46bf37930', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(21, '2023-08-09 10:44:22', 2023, '0000-00-00 00:00:00', '', '1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(22, '2023-08-09 10:44:36', 2023, '0000-00-00 00:00:00', '', '1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(23, '2023-08-09 10:45:05', 2023, '0000-00-00 00:00:00', '', '1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(24, '2023-08-09 10:45:31', 2023, '0000-00-00 00:00:00', '', '1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(25, '2023-08-09 10:46:51', 2023, '2023-08-09 16:46:51', '1ec4960094d34b35304053e170966b14ca30ec68', '1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(26, '2023-08-09 10:48:17', 2023, '2023-08-09 16:48:17', '020efa45f3ce31d4b1d6fbc8955b21bd8a5aa5c1', '1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(27, '2023-08-09 10:49:05', 2023, '2023-08-09 16:49:05', '9d87a17bdb10f2d71cea1de7d9f36353436581ed', '198903152014022001', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(28, '2023-08-09 10:49:23', 2023, '2023-08-09 16:49:23', 'ab3f659cfdb1f95496230188338c1b8dffe3eb0c', '198903152014022001', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(29, '2023-08-09 10:50:34', 2023, '2023-08-09 16:50:34', '60ea41e1e2f79f0a4fb3a1684ed56adc4a307e8c', '198903152014022001', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(30, '2023-08-09 10:52:01', 2023, '2023-08-09 16:52:01', '9f29afbc1c21025b64a4aa68d926cd8e68019f6f', '198903152014022001', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(31, '2023-08-09 10:53:01', 2023, '2023-08-09 16:02:49', 'aebf73e2c2e5ddbe2abc51073f0673e7088c91d7', '198903152014022001', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(32, '2023-08-09 16:03:10', 2023, '2023-08-09 16:07:09', 'a17edde14b9e12b94538e59263387822fe2c07a1', '199405192020122003', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(33, '2023-08-09 16:07:19', 2023, '2023-08-09 22:07:19', '19bf3eaaafae5fdb8ebfd468ac3eb8466b626bfa', '199705082020122002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(34, '2023-08-09 16:08:23', 2023, '2023-08-09 16:08:38', '314e179b3bd71b19f7b6931ce333e659c42443b9', '199405192020122003', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(35, '2023-08-10 08:34:02', 2023, '2023-08-10 14:34:02', 'a2e0b49db4b16681b38440bb364a68b9ee2c1122', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(36, '2023-08-10 08:35:48', 2023, '2023-08-10 08:35:51', 'a4525f3dde06a5bfbc5420efdb3cb0d7d8a7098f', '198903152014022001', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(37, '2023-08-10 08:35:57', 2023, '2023-08-10 14:35:57', '1c1b39ad5b86dc944a1c7bfa598a18e39e706de9', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(38, '2023-08-10 08:37:29', 2023, '2024-08-10 08:37:29', '8e8facc1f92efed782a981ee4d4e1b2bab3b4e91', '35784904910001', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(39, '2023-08-10 09:14:54', 2023, '2024-08-10 09:14:54', '1bdb17ba892484f50b78d7e59f196645948e9995', '35784904910001', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(40, '2023-08-10 09:16:33', 2023, '2024-08-10 09:16:33', 'b203e90e6919d8e3bbab2fb51e2f5ec393dfa802', '197412241994032002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(41, '2023-08-10 09:17:00', 2023, '2023-08-18 08:17:25', '882532591285cd0c64fb347ab19fb02ea423cd00', '197412241994032002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(42, '2023-08-18 08:19:47', 2023, '0000-00-00 00:00:00', '', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(43, '2023-08-18 08:19:55', 2023, '0000-00-00 00:00:00', '', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(44, '2023-08-18 08:20:25', 2023, '2023-08-18 14:20:25', 'd336081d4d9b8e3ab469e4d9e933b2649760a661', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(45, '2023-08-18 08:20:51', 2023, '2023-08-18 09:02:09', 'c841b5b2747f3868fc6b9e62fc78e8d0d4ab8425', '35784904910001', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(46, '2023-08-18 09:02:19', 2023, '2023-08-18 15:02:19', 'b35d737adf308fabfaf8a4321b176ab1ff5b3a8e', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(47, '2023-08-18 09:10:10', 2023, '2023-08-18 09:57:46', '1258e988f6f8e783e8aa5b56db08be6c22735cd7', '35784904910001', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(48, '2023-08-18 09:58:24', 2023, '2023-08-18 15:58:24', '0912ecdee84c565d855041587c7e67c507fce6cc', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(49, '2023-08-18 09:58:29', 2023, '2024-08-18 09:58:29', 'd86e506bccfe5f19792f9957aab4c5040c871845', '35784904910001', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(50, '2023-08-18 10:14:11', 2023, '2024-08-18 10:14:11', 'e02cc50f2aed85ac5cf6ef6cac79a6c62ba9890a', '197111032001121002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(51, '2023-08-18 10:14:30', 2023, '2024-08-18 10:14:30', 'd2e7686a3f69118e4404f9791ab2302b5d4b215d', '35784904910001', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(52, '2023-08-18 10:14:33', 2023, '2024-08-18 10:14:33', '2e1a9d12c71837644cdf69e8e170c95d2aee7c39', '199705082020122002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(53, '2023-08-18 10:14:35', 2023, '2024-08-18 10:14:35', '65fd003e90421679d1587601e250db3e62917d69', '199405192020122003', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(54, '2023-08-18 10:14:39', 2023, '2024-08-18 10:14:39', '4a96113f374b4c8f693f3114176fa4db528ab673', '198209182011012008', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(55, '2023-08-18 10:14:41', 2023, '2024-08-18 10:14:41', '844e793e03f92f634cc620a3318de05f02c1522e', '197111032001121002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(56, '2023-08-18 10:15:14', 2023, '2024-08-18 10:15:14', 'eaabc7570a9a48b11ffdfeeefba573ec4b959324', '197111032001121002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(57, '2023-08-18 10:18:40', 2023, '2024-08-18 10:18:40', 'b2d1e149b8dc45c3b421596a119f5921ec89185f', '197111032001121002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(58, '2023-08-18 10:19:06', 2023, '2024-08-18 10:19:06', 'a9fc244fd194c5d58335c7b75db8d27c1d7685af', '198209182011012008', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(59, '2023-08-18 10:29:00', 2023, '2024-08-18 10:29:00', '83b764415a64f9f73e6f5acf22eb601447d61da8', '35784904910001', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(60, '2023-08-18 10:32:30', 2023, '2024-08-18 10:32:30', 'c1528491787eca801972ef996aac1fd4fbde8baa', '198209182011012008', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(61, '2023-08-18 10:51:27', 2023, '2023-08-18 11:15:00', 'f806a0b3c950a8568a7b742842f31e316d55014f', '197412241994032002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(62, '2023-08-18 11:15:22', 2023, '0000-00-00 00:00:00', '', '197111032001121002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(63, '2023-08-18 11:15:29', 2023, '0000-00-00 00:00:00', '', '197111032001121002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(64, '2023-08-18 11:16:03', 2023, '0000-00-00 00:00:00', '', '197111032001121002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(65, '2023-08-18 11:16:13', 2023, '0000-00-00 00:00:00', '', '197111032001121002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(66, '2023-08-18 11:16:48', 2023, '0000-00-00 00:00:00', '', '197111032001121002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(67, '2023-08-18 11:17:05', 2023, '2023-08-18 11:33:25', 'bbd8a17c52549c306009ff6548e524839e0e6201', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(68, '2023-08-18 11:33:30', 2023, '0000-00-00 00:00:00', '', '197111032001121002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(69, '2023-08-18 11:35:09', 2023, '0000-00-00 00:00:00', '', '197111032001121002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(70, '2023-08-18 11:36:28', 2023, '0000-00-00 00:00:00', '', '197111032001121002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(71, '2023-08-18 11:37:02', 2023, '0000-00-00 00:00:00', '', '197111032001121002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(72, '2023-08-18 11:37:33', 2023, '0000-00-00 00:00:00', '', '197111032001121002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(73, '2023-08-18 11:37:59', 2023, '2023-08-18 11:38:19', '767804e6ffff80d2fa62edd7a7c1d039567035a9', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(74, '2023-08-18 11:38:24', 2023, '0000-00-00 00:00:00', '', '197111032001121002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(75, '2023-08-18 11:39:30', 2023, '0000-00-00 00:00:00', '', '197111032001121002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(76, '2023-08-18 11:39:57', 2023, '0000-00-00 00:00:00', '', '197111032001121002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(77, '2023-08-18 11:40:53', 2023, '0000-00-00 00:00:00', '', '197111032001121002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(78, '2023-08-18 13:29:59', 2023, '0000-00-00 00:00:00', '', '197111032001121002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(79, '2023-08-18 13:30:34', 2023, '2023-08-18 13:30:58', '67b099ee8ca3c3cac8b53be2788c0119567c5919', '197111032001121002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(80, '2023-08-18 13:31:03', 2023, '2023-08-18 13:31:55', 'e2f79f7424d6dc9a4e6607ef913bc18510192518', '197111032001121002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(81, '2023-08-18 13:32:04', 2023, '2023-08-18 19:32:04', '935745e18188eb3cb62ad00ec6acea3a6463ef58', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(82, '2023-08-18 13:32:14', 2023, '2023-08-18 13:40:58', 'd90fa1191997282d15fd7299e39ce709c9514670', '198209182011012008', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(83, '2023-08-18 13:41:03', 2023, '0000-00-00 00:00:00', '', '3578046803930004', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(84, '2023-08-18 13:41:22', 2023, '2023-08-18 13:41:31', '8fdd14b51b5bb6d14779451891dc49ad16c5a989', '198209182011012008', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(85, '2023-08-18 13:41:47', 2023, '0000-00-00 00:00:00', '', '3578046803930004', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(86, '2023-08-18 13:46:20', 2023, '0000-00-00 00:00:00', '', '3578046803930004', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(87, '2023-08-18 13:47:25', 2023, '0000-00-00 00:00:00', '', '3578046803930004', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(88, '2023-08-18 13:48:31', 2023, '2023-08-18 19:48:31', '185345d9a6b08a6038b17656c083d9096e2dbca0', '3578046803930004', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(89, '2023-08-18 13:49:09', 2023, '2023-08-18 19:49:09', 'ec0656a371dac4b1c509bdd8e4dd3365e5a9ced8', '3578046803930004', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(90, '2023-08-18 13:51:54', 2023, '2023-08-18 19:51:54', '3870a1e5da366ade72c69a7da46c4e817db518e9', '3578046803930004', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(91, '2023-08-18 13:51:54', 2023, '0000-00-00 00:00:00', '', '3578046803930004', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(92, '2023-08-18 13:52:04', 2023, '2023-08-18 19:52:04', 'b60e8b366a86f90f34fda26009a3d03efc4cc0dd', '3578046803930004', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(93, '2023-08-18 13:52:04', 2023, '0000-00-00 00:00:00', '', '3578046803930004', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(94, '2023-08-18 13:53:54', 2023, '2023-08-18 19:53:54', '2fa3c9834b7bf3f69457f817d4d6f802dee09151', '3578046803930004', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(95, '2023-08-18 13:54:10', 2023, '0000-00-00 00:00:00', '', '3578046803930004', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(96, '2023-08-18 13:54:22', 2023, '2023-08-18 19:54:22', 'c870d8b5c82461921494b7f862f960cd1ce22200', '3578046803930004', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(97, '2023-08-18 13:56:43', 2023, '2023-08-18 14:11:37', '88e6e4cee7e231f955fef00508bd8faf333b4673', '3578046803930004', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(98, '2023-08-18 14:11:43', 2023, '2023-08-18 20:11:43', '5a85da9489d87418123893d2e736ccd12a25f5f8', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(99, '2023-08-18 14:22:11', 2023, '2023-08-18 14:30:57', '0b9edad6190cc48ddbfb5bd966ccbc9a1de31c16', '199705082020122002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(100, '2023-08-18 14:31:06', 2023, '0000-00-00 00:00:00', '', '3578046803930004', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(101, '2023-08-18 14:31:30', 2023, '2023-08-18 15:55:43', 'ad6c76df82166bafd125d0745ffdb09f5a0c8a4c', '3578046803930004', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(102, '2023-08-18 15:55:51', 2023, '0000-00-00 00:00:00', '', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 9),
(103, '2023-08-18 15:56:00', 2023, '2023-08-18 21:56:00', '0f635538d2c803f24452289538f19921363c4d5b', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(104, '2023-08-18 15:56:06', 2023, '2024-08-18 15:56:06', '3737ee42384b417f6e805267377fa64452fa8fbd', '199405192020122003', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(105, '2023-08-18 15:56:19', 2023, '2023-08-22 13:57:12', 'bbd4acca062c004be6c31c485a0febae255f78e9', '199705082020122002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1),
(106, '2023-08-22 13:57:26', 2023, '2023-08-22 13:59:32', 'ee0d53f7e41bd492989af1d30d06261737fdfef0', '3522024904910001', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(107, '2023-08-22 13:59:39', 2023, '2023-08-22 14:00:16', 'fbea4d9b39d04cd7e0207c7915168a790077b885', '3522024904910001', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(108, '2023-08-22 14:00:22', 2023, '2023-08-22 14:00:58', '7bd99eed114febc757056218f0cc9f8215573f0b', '3522024904910001', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(109, '2023-08-22 14:01:14', 2023, '2023-08-22 14:03:36', '4a1df94ccf53a017f033a9b1e16f134dee369b99', '3522024904910001', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(110, '2023-08-22 14:03:44', 2023, '2023-08-22 14:04:04', '53de75bf1a4394bcf934ffada494bbeefe492361', '3522024904910001', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(111, '2023-08-22 14:04:12', 2023, '2023-08-22 14:31:54', '142a3cb960503fb96475366e9a90dcbed238677e', '3522024904910001', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(112, '2023-08-22 14:31:58', 2023, '2023-08-22 14:33:35', '5344c0ef95323d3a71fd4a321a5b30c9c4b39340', '197111032001121002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(113, '2023-08-22 14:33:41', 2023, '2023-08-22 20:33:41', '5d266f34ce57c11598ca8f10e1d9a4946ffe726f', '197111032001121002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(114, '2023-08-23 14:23:45', 2023, '2023-08-23 20:23:45', 'c3820361818964bb055d443a39e0c5da226da762', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(115, '2023-08-23 14:24:00', 2023, '2023-08-25 08:12:08', '52db8b968ed89d8637f893b95cc93736b5222ca3', '199705082020122002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(116, '2023-08-25 08:12:16', 2023, '2023-08-25 14:12:16', '439c4e7b96ba2be3969caebcc3c3f2e410a8844c', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(117, '2023-08-25 08:20:47', 2023, '2024-08-25 08:20:47', 'e1109c3ba036a76cf84245b3ed73dd43ed73f939', '198106222005012013', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(118, '2023-08-25 08:21:48', 2023, '2024-08-25 08:21:48', 'be949189c01130ef8bfbe1b2dd1ab964e1545cfd', '198106222005012013', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(119, '2023-08-25 08:24:49', 2023, '2024-08-25 08:24:49', '619e5741c794c48c13fba9a4268903b3e1129f4c', '198106222005012013', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(120, '2023-08-25 08:25:06', 2023, '2023-08-25 08:45:34', 'b8a2c1959fc1b208ee3556b80a0927f54b6a6c81', '199705082020122002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(121, '2023-08-25 08:45:40', 2023, '2023-08-25 09:00:32', 'aaa23a2dfa9e5298c6e49834989d1dffb4beadda', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(122, '2023-08-25 09:00:39', 2023, '2023-08-25 09:04:48', '8c57c1e699008cf7dd0589fabff59936254eabcb', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(123, '2023-08-25 09:10:16', 2023, '2023-08-25 15:10:16', '38e20fb4ee3bceba9492b5a07be2ca04c4ba0756', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(124, '2023-08-25 09:11:18', 2023, '2024-08-25 09:11:18', '58e88eb7ac5b96973e5d256bf0904d23084ec282', '199705082020122002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(125, '2023-08-25 09:11:26', 2023, '2024-08-25 09:11:26', '6361bf993f7cdf4f22126f798ccf5cea632c99fb', '198106222005012013', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(126, '2023-08-25 09:11:40', 2023, '2024-08-25 09:11:40', '8acc78980ae99dbd7fa8cdbac2055e2df0efe040', '199705082020122002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(127, '2023-08-25 09:21:53', 2023, '2023-08-25 09:23:02', '70b524d66093d10aa35a3ed0ee7eb8da2e688985', '198106222005012013', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(128, '2023-08-25 09:23:12', 2023, '2023-08-25 09:23:50', '2d7b39fbff4ec9d93e42cca7951067b9c13d6f1a', '3522024904910001', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(129, '2023-08-25 09:23:57', 2023, '2023-08-25 15:23:57', '77d23f2a800ed328e80a2f97c47fdcacc3a6d2bb', 'admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(130, '2023-08-25 09:24:05', 2023, '2024-08-25 09:24:05', '163b2111af71acad3bf90fd1c52e5c9fc4c8f947', '199705082020122002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(131, '2023-08-25 09:24:43', 2023, '2024-08-25 09:24:43', '4b86ce977eb3760d3ee20ef9fd9cbce992d30ac0', '198209182011012008', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(132, '2023-08-25 09:27:00', 2023, '2024-08-25 09:27:00', 'c7ef80d4aa7d33b85679f76882888d4b7325c46d', '197412241994032002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1),
(133, '2023-08-25 09:29:19', 2023, '2024-08-25 09:29:19', 'c580396311e18330344dccaf434e7f161bc3eb1f', '199705082020122002', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_narsum`
--

CREATE TABLE `login_narsum` (
  `id` int(10) NOT NULL,
  `id_dokumen` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login_narsum`
--

INSERT INTO `login_narsum` (`id`, `id_dokumen`, `username`, `password`) VALUES
(1, 50, 'adrian', '$2y$10$B3xnAvO34QY5d0daG4QunOigtayBPh3gkaa8GeJLDWQC6YTNxUEq.'),
(2, 45, 'josiah', '$2y$10$JS03qoo77bRTqylp2bche.TmsMTD/6ZzIucZ2cd9mq8gIX7LR504K'),
(3, 38, 'imamsyafii', '$2y$10$8c9JhDfgSYGUFAC7mH9jmuMynQIswFmZWLj4H.MaKF1173UbI8iY6'),
(4, 46, 'machmud', '$2y$10$aMy/cY1EJscEelI1LJACherGcaS4h857kAfrJ4kGtjmdTzN1A3SA.'),
(5, 40, 'ghofar', '$2y$10$/Rega5p4af6KbZhhsPX3C.he0YHI3hOKukYGyVhMRr.wfxrfZyVQe'),
(6, 49, 'jonihermana', '$2y$10$nbxQG8yLu7eX15pQSTz/nO4bFV1MMm6IwcmZur/vIoxo7GrQ/8SGm'),
(7, 37, 'pertiwiayu', '$2y$10$URE0fjfuOM1x1fQzN9s41uiZTeFCVMqdaYTZAaLiWO5GYo8WmeTaW'),
(8, 44, 'cameliahabiba', '$2y$10$QXcAqVyPzoDVmAa8kWtZYuUv6qFIgjrWGqmnM.2rOAdaf5uaa2ChS'),
(9, 41, 'budileksono', '$2y$10$OmimYqB7.z2U4G0Mg5UYu.f891izGiIHaIn10.B/eZrXylbYuc3kS'),
(10, 43, 'trididik', '$2y$10$uBwpDWkK/FWVxznxVovq9ejKKjeIgukcm6t4XrrvX0T445JY9caDC'),
(11, 42, 'syaifuddinzuhri', '$2y$10$xuRdvbvJgO.YNRsEI000NOVS0xeiGMS2w7VLuqSb4ONeqvIRhjWde'),
(12, 55, 'reniastuti', '$2y$10$s/BHaUDaMlwcu0Z/RP7qNupjQX5QKRAMfwbpJ/vyJ0kir1JuxFEt6'),
(13, 56, 'lailamufidah', '$2y$10$WcB3w5UjejspLy/eMBb30uq5H2EXTD0fRCEU1fxGygQwJ.jwd38na'),
(14, 57, 'hermasthony', '$2y$10$RTGEPWNLr63jloskdjqxme7XQMkB1xWA247mQYmJMldDwVJQ70.Je'),
(15, 58, 'adisutarwijo', '$2y$10$X61kKPU8dzhimtTQP7yxceg0zH.f0YCAprm/m2HvNPT8kND5.NX3K'),
(16, 36, 'bahtiyarrifai', '$2y$10$J6WLkTiWDWhbtlZVaOPwM.kowdSoxHADM/pSIcb2ddjhGRoa71XpK'),
(17, 1, 'ariffathoni', '$2y$10$FG5bYS7N4ZmzvaTSO8D5heExuPdrfXlcE7AuvEabwkGkWhncfV/ma'),
(18, 39, 'fatkurrohman', '$2y$10$D1OTyv5TrvxBhZcToFcN9uV9uVn5h9urmuscbc5vJcKZuc4R9Fva.'),
(19, 48, 'marthahendrati', '$2y$10$mQr4Mi7ZNwssoZyoZsu4iemiNz6eAmJp2g8QgypIglm2Q1Gr8DUb2'),
(20, 61, 'yayukeko', '$2y$10$3qa3qJat/tcJyF7vgdNhbu28x.5tuJKhJBLNZSmJudwta8DAQbbhK'),
(21, 62, 'nanis', '$2y$10$dOqOh.ltFSZLhNYyz/BSzeqfQ671V14XBN8nBHsvvFw.jdqBtfNwS'),
(22, 65, 'arini', '$2y$10$GsUuPO/Q0vGfFh8tCXGNXeBImhb5QOwvjj0d1CWWoTKBfByhkxqvG'),
(23, 66, 'khusnulkhotimah', '$2y$10$KpRlefa9y/jUBr5N2.YIyuudd.QjZPjeOavu4sbsjoOImVNMtmlWS'),
(24, 67, 'ajengwira', '$2y$10$nyNtKpU74.NHv2h5HjgRfOhh7qPc3BjJ5nq6TLHk9sCADsFKc1py6'),
(25, 68, 'akmarawita', '$2y$10$zhEZPrsKCNBeOzSxdi2/f.blEmXSK12LHKk8iv199eHWz/EEYwOtO'),
(26, 69, 'dyahkatarina', '$2y$10$09V2KoQcDqDVNItMo5huZeOGBs7jED0WVy7sfchXnUvBuUczjaqxC'),
(27, 70, 'normayunita', '$2y$10$ZcqcJ4zgQKx61tFFTLey5Ofh3vQPuO2Z.Ngo4Jrtgahy80T4IuOgm'),
(28, 71, 'sitimariyam', '$2y$10$8NaigeFpK.7jP.Ns01obZeAOkkuY1iyu4idoxNLtXgXMKi8PnPbn.'),
(29, 72, 'badrutamam', '$2y$10$Jaz0FfmY//iFPklqRS/jYOryGmDDFKPO/OLy/pBgAY/lg0Z9JHjCa'),
(30, 73, 'cahyosiswo', '$2y$10$QWpSulerhAx.ntQ3Hcw1/.Y2Fxk9qhso.kZEDBQA.xymE1SDseANa'),
(31, 74, 'tjutjuksupariono', '$2y$10$rZ3lVgCRsLK7VUpyN9wqKuP6Q7vap93puoHWEtTEXGel4QmZM7ify'),
(32, 75, 'herlinaharsono', '$2y$10$0oEyejRwOMIndui7IbeFB.RnadlhgnvbHmnA6HqLPBC8GwGPc2ldy'),
(33, 76, 'harisantosa', '$2y$10$GBDf732bN8EvJOWuZoRz7.YBMVHMSpbJep8iRgLbbGyT.vFpUjFf.'),
(34, 77, 'julianaeva', '$2y$10$XmvjtAN0sskPBErzABHMFO.uZOMWBkGxRv6X.SeAWfMuKSxAnAe3e'),
(35, 60, 'rusdianto', '$2a$12$k72Ld.o6F3aaVdgBGhEr2eIv.duiUplGQ6REuZUb1BeqaZUMhR81a'),
(36, 83, 'nuriherachwati', '$2a$12$iKfzhzaSx5PUhqkC.M/Xtub5g4kTrwLS5XQn1sHVeGSkEU2XQZwYm'),
(37, 101, 'daddy', '$2a$12$IyErgRtlDW0MlEpGPe30UOdzCJ27dGjFw07AGnK9bhJnSeFSn4jP.'),
(38, 102, 'ayudyah', '$2a$12$3TQYjCWO6AsFATgxIQ.N1eSlg0eTtb6zrkKhaY6udEFUCsPRp2B4W');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_narasumber`
--

CREATE TABLE `master_narasumber` (
  `id` int(20) NOT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `nik` varchar(15) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `npwp` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `golongan` varchar(255) DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `rekening_narsum` varchar(255) DEFAULT NULL,
  `upload_npwp` varchar(255) DEFAULT NULL,
  `upload_ktp` varchar(255) DEFAULT NULL,
  `upload_cv` varchar(255) DEFAULT NULL,
  `upload_kak` varchar(100) DEFAULT NULL,
  `ttd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_narasumber`
--

INSERT INTO `master_narasumber` (`id`, `nip`, `nik`, `nama`, `instansi`, `npwp`, `status`, `golongan`, `nama_bank`, `rekening_narsum`, `upload_npwp`, `upload_ktp`, `upload_cv`, `upload_kak`, `ttd`) VALUES
(1, '', '357803050384000', 'Arif Fathoni, S.H.', 'DPRD', '44.156.023.2-615.000', 'asn', 'IV', '', '', '42458401_arif fathoni npwp.pdf', '75114036_arif fathoni ktp.pdf', '79794627_arif fathonicv ttd.pdf', '', '3818128_ttd-removebg-preview.png'),
(30, '', '', 'Eri Cahyadi, S.T., M.T.', 'Pemerintah Kota Surabaya', '49.513.379.5-609.000', 'asn', 'IV', '', '', '', '', '', '', ''),
(31, '', '', 'Ir. H. Armudji, M.H.', 'Pemerintah Kota Surabaya', '07.877.059.1-609.000', 'asn', 'IV', '', '', '', '', '', '', ''),
(32, '', '143501000212345', 'R. Rachmad Basari, SE., MM.', 'BKPSDM', '078738895609000', 'asn', 'IV', 'Bank Jatim', '1435010002', 'Achmad Hadi, S.Kom.pdf', 'Hismi Hasta Yuniasih, S.Sos.pdf', 'Rachmad Basari, SE,MM.pdf', '', ''),
(33, '', '351514170476000', 'Aries Agung Paewai, S.STP., MM.', 'KEPALA BADAN PENGEMBANGAN SUMBER DAYA MANUSIA ', '35.936.297.7-603.000', 'asn', 'IV', 'BANK JATIM', '', 'CV PAK ARIES AGUNG P.pdf', 'CV PAK ARIES AGUNG P.pdf', 'CV PAK ARIES AGUNG P.pdf', '', ''),
(35, '19730511999121001', '', 'Muhammad Ridwan, ST., M.Eng.', 'Regional II BKN Surabaya', '67.833.760.1-403.000', 'asn', 'IV', '', '', '', '', '61329294_cv.pdf', '', ''),
(36, '', '357806170985000', 'Bahtiyar Rifai, S.H.', 'DPRD', '71.507.971.1-614.000', 'asn', 'IV', '', '', '75941810_bahtiyar rifai npwp.pdf', '64931211_bahtiyar rifai ktp.pdf', '18831774_bahtiyar rifai cv ttd.pdf', '', '67592862_ttd-removebg-preview.png'),
(37, '', '357823621266000', 'Dra. Ec. Hj. Pertiwi Ayu Krishna, M.M', 'DPRD', '70.603.361.0-609.000', 'asn', 'IV', '', '', '21614502_pertiwi yu npwp.pdf', '30075780_pertiwi ayu ktp.pdf', '16457526_pertiwi ayu cv ttd tgl.pdf', '', '53478667_output-onlinepngtools (5).png'),
(38, '', '357815311268000', 'Drs. Imam Syafi`i, S.H., M.H.', 'DPRD', '07.859.727.5-605.000', 'asn', 'IV', '', '', '5374735_imam syafii npwp.pdf', '68080915_imam syafii ktp.pdf', '23484899_CV PAK IMAM.pdf', '', '65226797_ttd-removebg-preview.png'),
(39, '', '357809200276000', 'Fatkur Rohman, S.T., M.T.', 'DPRD', '24.683.753.8-606.000', 'asn', 'IV', '', '', '67072915_fatkur rohman npwp.pdf', '51019171_fatkur rohman ktp.pdf', '86144478_fatkur rohman cv ttd.pdf', '', '25399985_ttd-removebg-preview.png'),
(40, '', '357827140472000', 'Ghofar Ismail, S.T.', 'DPRD', '70.739.953.1-604.000', 'asn', 'IV', '', '', '92485925_ghofar ismail npwp.pdf', '24122418_ghofar ismail ktp.pdf', '78741499_CV PAK GHOFAR.pdf', '', '20318048_ttd-removebg-preview.png'),
(41, '', '357813090772000', 'H. Budi Leksono, S.H.', 'DPRD', '07.879.241.3-614.000', 'asn', 'IV', '', '', '32927560_budi leksono npwp.pdf', '7244235_budi leksono ktp.pdf', '40129103_budi leksonno cv ttd tgl.pdf', '', '80039283_ttd-removebg-preview.png'),
(42, '', '357830120471000', 'H. Syaifuddin Zuhri, S.Sos', 'DPRD', '26.2760143-604000', 'asn', 'IV', '', '', '34158984_WhatsApp Image 2022-09-29 at 7.39.25 AM.pdf', '88631455_syaifuddin zuhri ktp.pdf', '98387213_syaifudin zuhri.pdf', '', '75830195_ttd-removebg-preview.png'),
(43, '', '357813201066000', 'H. Tri Didik Adiono, S.Sos', 'DPRD', '07.879.509.3-614.000', 'asn', 'IV', '', '', '99649480_tri didik adiono npwp.pdf', '28246770_tri didik adiono ktp.pdf', '63891069_tri didik adiono cv ttd.pdf', '', '24452207_ttd-removebg-preview.png'),
(44, '', '357816610582000', 'Hj. Camelia Habiba, S.E.', 'DPRD', '09.756.729.1-616.000', 'asn', 'IV', '', '', '31220663_camelia habisa npwp.pdf', '26150734_camelia habiba ktp.pdf', '67046220_camelia habiba cv tgl ttd.pdf', '', '18578096_ttd-removebg-preview.png'),
(45, '', '357826270581000', 'Josiah Michael, S.H.', 'DPRD', '24.832.763.7-619.000', 'asn', 'IV', '', '', '29873446_josiah michael npwp.pdf', '73331275_josiah michael ktp.pdf', '80760605_CV PAK MICHAEL.pdf', '', '48731499_ttd-removebg-preview.png'),
(46, '', '357814140468000', 'Mochamad Machmud, S.Sos, M.Si.', 'DPRD', '07.854.718.9-604.000', 'asn', 'IV', '', '', '80814024_mochamad machmud npwp.pdf', '30232555_mochamad machmud ktp.pdf', '95667770_CV PAK MACHMUD.pdf', '', '90304554_WhatsApp_Image_2022-09-07_at_3.10.32_PM__1_-removebg-preview.png'),
(48, '', '', 'Dr. Ignatia  Martha Hendrati, SE., ME', '', '59.770.891.6-615.000', 'non_asn', 'IV', '', '', '21630421_npwp.pdf', NULL, '63930649_cv ringkas martha.pdf', NULL, '5715831_Ignatia_Martha-removebg-preview.png'),
(49, '196006181988031002', '357809180660004', 'Prof. Dr. Ir. Joni Hermana, M.ScES., Ph.D.', 'Institut Teknologi Sepuluh Nopember Surabaya (ITS)', '25.435.560.5-606.000', 'asn', 'IV', '-', '-', '7531631_PAKAR PROF. JONI NPWP.pdf', '51666559_PAKAR PROF. JONI KTP.pdf', '86810490_CV. Prof. Ir. Joni Hermana M.Sc.ES., Ph.D..pdf', NULL, '11836312_WhatsApp_Image_2022-09-07_at_3.10.32_PM-removebg-preview.png'),
(50, '', '357808110978000', 'Prof. Badri Munir Sukoco, SE, MBA, PhD', 'UNIVERSITAS AIRLANGGA SURABAYA', '58.728.708.7-606.000', 'asn', 'IV', '', '', '34496565_NPWP - Badri Munir Sukoco.pdf', '21830812_KTP Badri Munir.pdf', '54983246_CV BADRI MUNIR SUKOCO 08032022.pdf', NULL, NULL),
(51, '198612062019022003', '', 'Desie Dorethe Ambarwati Pattikawa, S.Psi., MH.', 'Badan Kepegawaian Negara', '90.732.202.8-941.000', 'asn', '', 'Bank Rakyat Indonesia', '185601001961506', NULL, NULL, '85646027_FORM CV DESIE.pdf', NULL, NULL),
(52, '198104152009121001', '', 'Ranto Bernard', 'Kementerian Dalam Negeri Republik Indonesia', '24.694.740.2-013.000', 'asn', '', '', '', NULL, NULL, '35606629_KEMENDAGRI RANTO BERNARD.doc', NULL, NULL),
(54, '198105052000121002', '', 'Dr. Rozi Beni, M.H., M.Si.', 'Kementerian Dalam Negeri Republik Indonesia', '09.356.322.9-412.000', 'asn', '', 'Mandiri', '119-00-0662459-5', NULL, NULL, '34017575_KEMENDAGRI ROZY BENI.pdf', NULL, NULL),
(55, '', '357827691272000', 'Reni Astuti,S.SI.,M.PSDM', 'Pimpinan DPRD Surabaya', '25.648.586.3-604.000', 'asn', 'IV', '', '', '77128493_NPWP RENI ASTUTI.pdf', '21896874_WhatsApp Image 2022-09-20 at 8.58.52 AM.pdf', '63698687_CV. RENI ASTUTIK.pdf', NULL, '63893990_WhatsApp_Image_2022-09-20_at_9.51.39_AM-removebg-preview.png'),
(56, '', '357824640374000', 'Hj. Laila Mufidah, S.Ag.', 'Pimpinan DPRD Surabaya', '25.166.219.3-615.000', 'asn', 'IV', '', '', '10052790_NPWP LAILA.pdf', '87940149_WhatsApp Image 2022-09-20 at 8.59.24 AM.pdf', '59977172_CURRICULUM VITAE Bu Laila (1).pdf', NULL, '97498162_WhatsApp_Image_2022-09-20_at_10.38.47_AM-removebg-preview.png'),
(57, '', '357802191266000', 'Drs. A. Hermas Thony , M.Si', 'Pimpinan DPRD Surabaya', '08.628.646.5-609.000', 'asn', 'IV', '', '', '32231131_NPWP_Hermas_Thony.pdf', '31055623_KTP_Hermas_Thony.pdf', '92101302_CV_Hermas_Thony.pdf', NULL, '84085646_output-onlinepngtools (1).png'),
(58, '', '357803040868000', 'D. Adi Sutarwijono, S.IP.', 'Pimpinan DPRD Surabaya', '36.633.721.0-615.000', 'asn', 'IV', '', '', '13713516_NPWP_Adi_Sutarwijo.pdf', '95699628_KTP_Adi_Sutarwijo.pdf', '15712725_CV BAPAK ADI SUTARWIJONO.pdf', NULL, '86841970_output-onlinepngtools (3).png'),
(59, '197304071997031002', '350403070473000', 'HERIONO', ' BADAN PENGEMBANGAN SUMBER DAYA MANUSIA PROVINSI JAWA TIMUR', '66.740.980.9-629.000', 'asn', 'III', 'BANK JATIM', '-', '44178378_NPWP.pdf', '47446842_KTP.pdf', '55586365_CV.pdf', NULL, NULL),
(60, '', '520405111087000', 'DR. Rusdianto Sesung, SH. MH', 'Universitas Narotama Surabaya', '661531889913000', 'non_asn', '', '', '', NULL, NULL, NULL, NULL, '99558032_WhatsApp_Image_2023-07-11_at_2.47.19_PM-removebg-preview.png'),
(61, '', '', 'YAYUK EKO AGUSTIN WAHYUNI, SH, M.Si', 'Staf Ahli Walikota', '', 'non_asn', '', '', '', NULL, NULL, NULL, NULL, NULL),
(62, '', '357813590563000', 'Dra. Nanis Chairani,MM', '', '26.791.225.1-614.000', 'asn', '', '', '', NULL, NULL, '65588079_CV BU NANIS.pdf', NULL, '59565974_Nanis_Chairani-removebg-preview.png'),
(63, '197009301996031001', '', 'Aba Subagja', 'Kemenpan RB', '670380872404000', 'asn', 'IV', '', '', NULL, NULL, '38906650_CV Singkat Aba Subagja 2022.pdf', NULL, '17499558_ABA_Subagja.png'),
(64, '', '', 'Prof. Dr. Fendy Suhariadi, Drs., M.T.', 'UNIVERSITAS AIRLANGGA SURABAYA', '08.561.278.6-604.000', 'asn', 'IV', '', '', NULL, NULL, NULL, NULL, NULL),
(65, '', '', 'Dr. Arini Pakistyaningsih, S.H., M.M', '', '', 'asn', 'IV', '', '', NULL, NULL, NULL, NULL, NULL),
(66, '', '357810480683000', 'HJ. Khusnul Khotimah, S.Pdi., M.Pdi', 'DPRD', '', 'asn', 'IV', '', '', NULL, '71542016_khusnul khotimah_ktp.pdf', '46933821_khusnul khotimah.pdf', NULL, '38816511_khusnul_kotimah.png'),
(67, '', '357808430685000', 'Ajeng Wira Wati, S.Sos, M.PSDM.', 'DPRD', '', 'asn', 'IV', '', '', NULL, '35301109_ajeng wira_ktp.pdf', '51289282_ajeng wira.pdf', NULL, '86176835_Ajeng_wira.png'),
(68, '', '357826070773000', 'Dr. Akmarawita Kadir', 'DPRD', '', 'asn', 'IV', '', '', NULL, '93273628_akmarawita_ktp.pdf', '86999661_akmarawita.pdf', NULL, '46048154_dr._Akmarawita_Kadir.png'),
(69, '', '357807670668000', 'Dyah Katarina, S. Psi., M.Si', 'DPRD', '', 'asn', 'IV', '', '', NULL, '80632007_Dyah Katrina_ktp.pdf', '12237433_dyah katarina.pdf', NULL, '75564338_dyah_katarina.png'),
(70, '', '357807540684000', 'Norma Yunita', 'DPRD', '', 'asn', 'IV', '', '', NULL, '74680796_norma_ktp.pdf', '13741930_norma yunita.pdf', NULL, '62170886_Norma_Yunita.png'),
(71, '', '357801651265000', 'Hj. Siti Mariyam', 'DPRD', '', 'asn', 'IV', '', '', NULL, '91498704_siti maryam_ktp.pdf', '96977112_siti maryam.pdf', NULL, '10524922_siti_mariyam-removebg-preview.png'),
(72, '', '357806120969000', 'Badru Tamam', 'DPRD', '', 'asn', 'IV', '', '', NULL, '41034441_badru tamam_ktp.pdf', '30229101_badru tamam.pdf', NULL, '77254903_badru_tamam.png'),
(73, '', '357809241182000', 'Cahyo Siswo Utomo, S.T.', 'DPRD', '', 'asn', 'IV', '', '', NULL, '11308632_cahyo_ktp.pdf', '82230809_cahyo siswo.pdf', NULL, '39171794_cahyo_siswo.png'),
(74, '', '357827231180000', 'Tjutjuk Supariono', 'DPRD', '', 'asn', 'IV', '', '', NULL, '40497015_tjutjuk_ktp.pdf', '24548372_tjutjuk.pdf', NULL, '75092844_tjutjuk.png'),
(75, '', '357809560683000', 'Herlina Harsono Njoto, S.Psi., M.Psi', 'DPRD', '', 'asn', 'IV', '', '', NULL, '77562788_herlina_ktp.pdf', '60196947_herlina.pdf', NULL, '16720519_Ttd_Herlina_page-0001-removebg-preview.png'),
(76, '', '357818090666000', 'Hari Santosa, S.H.', 'DPRD', '', 'asn', 'IV', '', '', NULL, '24751659_hari santosa_ktp.pdf', '14550355_hari santosa.pdf', NULL, '15431391_hari_santosa.png'),
(77, '', '357827500793000', 'Juliana Eva Wati, SH.M.Kn.', 'DPRD', '', 'asn', 'IV', '', '', NULL, '36869489_juliana_ktp.pdf', '31311919_julian eva.pdf', NULL, '76136743_juliana_eva.png'),
(78, '', '', 'INDAH WAHYUNI,SH., M.Si	', '', '78.336.675.0-606.000', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(79, '', '', 'MUHAMMAD RIDWAN, ST., M.Eng.', 'BKN KANREG II SURABAYA', '', 'asn', '', '', '', NULL, NULL, NULL, NULL, NULL),
(80, '', '', 'SUMARIJANTO, SH.', 'BKD PROVINSI JAWA TIMUR', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(81, '', '', 'RENDY SAPUTRA MUKTI', 'BKD PROVINSI JAWA TIMUR', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(82, '', '', 'JERHO INDO DIMAS', 'BKD PROVINSI JAWA TIMUR', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(83, '196606301992032001', '357817700666011', 'Dr. Dra Nuri Herachwati, Ec,Msi. Msc', 'Universitas Airlangga Surabaya', '34.078.618.5-619.000', 'asn', 'IV', '', '', '31163975_NPWP Bu Nuri.pdf', '9725151_KTP Bu Nuri.pdf', '88620325_CV. UNAIR NURI H.pdf', NULL, '26261644_51745830_Specimen_Bu_Nuri_pages-to-jpg-0001-removebg-preview.png'),
(84, '', '', 'Fitri Nurmalasari, SE.', 'Universitas Airlangga Surabaya', '', 'non_asn', '', '', '', NULL, NULL, NULL, NULL, NULL),
(85, '', '', 'Sungkono, S.Pd.', 'Universitas Airlangga Surabaya', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(86, '', '', 'John Ferianto, S.Sos., MM.', 'Komisi Aparatur Sipil Negara', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(87, '', '', 'PANDU WIBOWO, S.Sos., ME', 'Komisi Aparatur Sipil Negara', '737783456432000', 'non_asn', '', '', '', NULL, NULL, NULL, NULL, NULL),
(88, '', '', 'Felix Jonathan Sitompul, S.AP.', 'Kementerian Dalam Negeri', '', 'non_asn', '', '', '', NULL, NULL, NULL, NULL, NULL),
(89, '', '', 'Bastian Jacob Seimahuira, S.STP., M.Si.', 'Kementerian Dalam Negeri', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(90, '', '', 'Febryan Denistya Perdana', 'Kementerian Dalam Negeri', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(91, '', '', 'Alit Yanuarto, S.T.MM', 'BKN KANREG II SURABAYA', '49.125.909.9-013.000', 'non_asn', '', '', '', NULL, NULL, NULL, NULL, NULL),
(92, '', '', 'David Apriyanto, S.Tr.Kom.', 'BKN KANREG II SURABAYA', '72.658.455.0-645.000', 'non_asn', '', '', '', NULL, NULL, NULL, NULL, '9193718_david_crop-removebg-preview.png'),
(93, '197906152008122001', '', 'Sri Hartini, S.T., M.M.', 'BKN KANREG II SURABAYA', '68.886.091.5-602.000', 'asn', 'III', '', '', NULL, NULL, NULL, NULL, NULL),
(94, '198902272022032003', '198902272022032', 'Ratih Citra Paninggar, M.Psi.T', 'Badan Kepegawaian Negara', '36.539.244.8-412.000', 'asn', 'III', 'BANK BRI', '034001115260505', NULL, NULL, '44535921_CV. Ratih Citra Paninggar.pdf', NULL, '8321264_WhatsApp_Image_2023-07-25_at_08_28_01-transformed.png'),
(95, '', '', 'Aulia Yuniarto ST, M.M.', 'Badan Kepegawaian Negara', '25.014.739.4-042.000', 'asn', 'III', 'BANK BNI', '0214704153', NULL, NULL, '20932622_CV. Aulia Yuniarto.pdf', NULL, '57120603_SPESIMEN_AULIA-transformed.png'),
(96, '196307061985031001', '196307061985031', 'Poreden Sitorus', 'Badan Kepegawaian Negara', '58.004.451.9-432.000', 'asn', 'IV', '-', '-', '89968826_WhatsApp Image 2023-06-26 at 19.30.55.jpeg', NULL, '39274558_CV. Poreden Sitorus.pdf', NULL, '47101567_WhatsApp_Image_2023-07-25_at_08_37_25-transformed.png'),
(97, '197403111999022001', '197403111999022', 'Sri Gantini, S.Sos., M.A.P.', 'Badan Kepegawaian Negara', '578630584077000', 'asn', 'IV', 'BANK BNI', '0013609086', NULL, NULL, '41979539_Biodata Narasumber Sri Gantini - New.pdf', NULL, '22250639_SPESIMEN_SRI_GANTINI-transformed.png'),
(98, '', '', 'Ir. Anang Triharjono, MM.', 'BKN KANREG II SURABAYA', '', 'non_asn', '', '', '', NULL, NULL, NULL, NULL, '94408934_anang_crop-removebg-preview.png'),
(99, '', '', 'Dra. Luluk Budijati, MM', 'BKN KANREG II SURABAYA', '', 'asn', 'IV', '', '', NULL, NULL, NULL, NULL, NULL),
(100, '', '', 'Divya Sistha, SH.', 'BKN KANREG II SURABAYA', '', 'asn', 'III', '', '', NULL, NULL, NULL, NULL, NULL),
(101, '197311042003121001', '197311042003121', 'Daddy Liberty Adoe, S.H., M.H', 'Badan Kepegawaian Negara Kantor Regional II', '-', 'asn', 'III', '-', '-', NULL, NULL, NULL, NULL, '42572163_WhatsApp_Image_2023-07-26_at_12.02.29-removebg-preview.png'),
(102, '199511192022032002', '199511192022032', 'Ayu Dyah Hapsari, S.AB', 'Badan Kepegawaian Negara Kantor Regional II', '-', 'asn', 'III', '-', '-', NULL, NULL, NULL, NULL, '37290390_WhatsApp_Image_2023-07-26_at_12.02.30-removebg-preview.png'),
(103, '199609212019021001', '199609212019021', 'Moh. Firdaus Wahyu Rohman', 'Kementerian Pendayagunaan Aparatur Negara  dan Reformasi Birokrasi ', '86.973.045.7-429.000', 'asn', 'III', 'BANK BRI', '125101002028507', NULL, NULL, '16625202_CV M. Firdaus W. R.pdf', NULL, '41278206_WhatsApp_Image_2023-07-27_at_11_24_15-transformed.png'),
(104, '199108122019022005', '199108122019022', 'Vinalia Eka Wardani S.Si. ', 'Kementerian Pendayagunaan Aparatur Negara  dan Reformasi Birokrasi', '86.998.294.2-526.000', 'asn', 'III', '', '', NULL, NULL, '73343362_CV. Vinalia Eka Wardani S.Si..pdf', NULL, '73176517_WhatsApp_Image_2023-07-27_at_11_24_01-transformed.png'),
(105, '', '217204081278000', 'MUGI SYAHRIADI, S.Ip., MM', 'KOMISI APARATUR SIPIL NEGARA', '57.633.736.4-214.000', 'asn', 'IV', '', '', '71479658_NPWP.pdf', '1642982_KTP.pdf', NULL, NULL, NULL),
(107, '-', '-', 'BASUKI ARI WICAKSONO ', '', '-', 'asn', 'IV', '-', '-', NULL, NULL, NULL, NULL, NULL),
(108, '-', '-', 'SULASTINA, SH., MH', '-', '-', 'asn', 'III', '-', '', NULL, NULL, NULL, NULL, NULL),
(109, '-', '-', 'ADHIVI HASNA RAFIDA, S.Kom', '-', '-', 'asn', 'III', '', '', NULL, NULL, NULL, NULL, NULL),
(110, '-', '-', 'ULVA ERIDA NUR ROCHMAH', '-', '-', 'asn', 'III', '', '', NULL, NULL, NULL, NULL, NULL),
(111, '', '-', 'GUSTIN AYU CAHYANDINI, S.Kom ', '-', '-', 'asn', 'III', '', '', NULL, NULL, NULL, NULL, NULL),
(112, '-', '-', 'Sri HARTINI, ST, MM', '-', '-', 'asn', 'III', '', '', NULL, NULL, NULL, NULL, NULL),
(113, '', '', 'SALS', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(114, '', '', 'SALS', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(115, '199302172015022002', '', 'SABILLA RAMADHIANI FIRDAUSS.H., LL.M.', 'Lembaga Administrasi Negara Republik Indonesia ', '71.760.682.6.027.000', 'asn', 'III', 'bank mandiri', '9000043400275', '31163356_NPWP SABILA.pdf', '26216247_KTP SABILA.pdf', '12109906_CV SABILA.pdf', NULL, NULL),
(116, '198110082008011001', '330615081081000', 'FANI HERU WISMONOS.E., M.A., M.A.P', 'Lembaga Administrasi Negara Republik Indonesia ', '49.261.367.4.531.000', 'asn', 'III', 'Bank Mandiri Syariah Indonesia', '7066801847', '77947112_NPWP-ELEKTRONIK (1).pdf', '91725794_Scan KTP - Fani Heru.pdf', '15966121_CV Fani Heru Wismono.pdf', NULL, NULL),
(117, '', '-', 'YOVANIRISTIAN, SH, MH', '-', '-', 'asn', 'III', '', '', NULL, NULL, NULL, NULL, NULL),
(118, '', '-', 'Dr. Lilik Pudjiastuti, SH, MH', '-', '-', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(119, '', '', 'Dr. Ikhsan, S.Psi., MM.', '', '254933435619000', 'asn', 'IV', '', '', NULL, NULL, NULL, NULL, NULL),
(120, '', '', 'Drs. Moch. Djamil', '', '54.592.344.3-619.000', 'asn', 'IV', '', '', NULL, NULL, NULL, NULL, NULL),
(121, '', '', 'Drg. Febria Rachmanita, MA.', '', '06.751.435.6-606.000', 'non_asn', '', '', '', NULL, NULL, NULL, NULL, NULL),
(123, '', '', 'Irvan Widyanto, AMP., S.Sos., MH.', '', '59.776.940.5-614.000', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(124, '', '', 'Ir. Erna Purnawati', '', '26.470.277.0-615.000', 'non_asn', '', '', '', NULL, NULL, NULL, NULL, NULL),
(125, '', '', 'Ira Tursilowati, SH., MH.', '', '554992396609000&nbsp;', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(126, '', '', 'John Ferianto, S.Sos., MM.', '', '096198049327000', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(127, '-', '-', 'Drs. M. Musyafak', 'DPD Partai Kebangkitan Bangsa', '00.142.496.9-611.000', 'asn', 'IV', '', '', NULL, NULL, NULL, NULL, '33521595_WhatsApp_Image_2023-08-07_at_08.53.56-removebg-preview.png'),
(128, '', '', 'Cahyo Harjo Prakoso, SH., MH.', 'DPD Partai Gerakan Indonesia Raya', '', 'non_asn', '', '', '', NULL, NULL, NULL, NULL, '80756945_WhatsApp_Image_2023-08-07_at_08.53.27-removebg-preview.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_peserta_umum`
--

CREATE TABLE `master_peserta_umum` (
  `id` int(10) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `specimen` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_peserta_umum`
--

INSERT INTO `master_peserta_umum` (`id`, `nik`, `nip`, `username`, `password`, `nama`, `instansi`, `specimen`, `status`) VALUES
(0, '1234', '1234', '', '', 'tes', 'tes', '23606670_Group 155.png', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `narsum_daftar_hadir_content`
--

CREATE TABLE `narsum_daftar_hadir_content` (
  `id` int(20) NOT NULL,
  `id_header` int(11) NOT NULL,
  `id_narsum` int(20) NOT NULL,
  `masukan` varchar(1000) NOT NULL,
  `nominal_honor` int(20) NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `id_transaksi` varchar(255) NOT NULL,
  `ttd_narsum` int(1) NOT NULL,
  `status_realisasi` int(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `narsum_daftar_hadir_content`
--

INSERT INTO `narsum_daftar_hadir_content` (`id`, `id_header`, `id_narsum`, `masukan`, `nominal_honor`, `no_surat`, `id_transaksi`, `ttd_narsum`, `status_realisasi`) VALUES
(2, 1, 44, '&lt;p&gt;tes&lt;/p&gt;\r\n', 1000000, '', '8164179', 1, 1),
(3, 1, 36, '', 1000000, '', '8164156', 0, 1),
(4, 1, 39, '', 1000000, '', '8164180', 0, 1),
(5, 1, 43, '', 1000000, '', '8158452', 0, 1),
(7, 2, 1, '&lt;p&gt;tes masukan&lt;/p&gt;\r\n', 1000000, '500.10.9.8/0365/436.8.4/2023', '8152766', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `narsum_daftar_hadir_header`
--

CREATE TABLE `narsum_daftar_hadir_header` (
  `id` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_surat_kesediaan` int(5) NOT NULL,
  `pukul_mulai` time NOT NULL,
  `pukul_selesai` time NOT NULL,
  `acara` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `masukan` varchar(2000) DEFAULT NULL,
  `status` int(20) NOT NULL,
  `tgl_undangan` date DEFAULT NULL,
  `komponen` varchar(255) NOT NULL,
  `paket_pekerjaan` int(20) NOT NULL,
  `no_npd` varchar(10) DEFAULT NULL,
  `id_sub` int(10) DEFAULT NULL,
  `daring_luring` varchar(100) NOT NULL,
  `id_bidang` int(1) NOT NULL,
  `status_ttd` int(1) NOT NULL,
  `bendahara` varchar(100) NOT NULL,
  `pptk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `narsum_daftar_hadir_header`
--

INSERT INTO `narsum_daftar_hadir_header` (`id`, `tanggal`, `tanggal_surat_kesediaan`, `pukul_mulai`, `pukul_selesai`, `acara`, `tempat`, `masukan`, `status`, `tgl_undangan`, `komponen`, `paket_pekerjaan`, `no_npd`, `id_sub`, `daring_luring`, `id_bidang`, `status_ttd`, `bendahara`, `pptk`) VALUES
(1, '2023-08-09', -1, '13:00:00', '15:00:00', 'Peningkatan Layanan Sarana Prasarana Pelayanan Publik di Layanan Administrasi Kecamatan/Kelurahan', 'Ruang Rapat Bagian Organisasi', '&lt;p&gt;tes&lt;/p&gt;\r\n', 4, '2023-08-17', 'eselon 2', 23009414, NULL, NULL, 'luring', 2, 2, '197412241994032002', '198209182011012008'),
(2, '2023-08-25', 0, '10:00:00', '12:00:00', 'Rapat Koordinasi membahas Rencana Pelaksanaan Kegiatan Pembinaan Disiplin Pegawai Tahun Anggaran 2023', 'Ruang Rapat ', '&lt;p&gt;tes resumeeeeeeeee&lt;/p&gt;\r\n', 1, '2023-08-24', 'eselon 2', 23009266, NULL, NULL, 'luring', 2, 2, '197412241994032002', '198209182011012008');

-- --------------------------------------------------------

--
-- Struktur dari tabel `narsum_daftar_hadir_umum`
--

CREATE TABLE `narsum_daftar_hadir_umum` (
  `id` int(10) NOT NULL,
  `id_acara` int(10) NOT NULL,
  `nik_peserta` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `asal_tabel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `narsum_daftar_hadir_umum`
--

INSERT INTO `narsum_daftar_hadir_umum` (`id`, `id_acara`, `nik_peserta`, `status`, `asal_tabel`) VALUES
(12, 1, '3578204701690001', 0, 'asn_bkpsdm'),
(13, 1, '3578130311710003', 0, 'asn_bkpsdm'),
(14, 1, '1256156412740002', 0, 'asn_bkpsdm'),
(15, 1, '3578124803970001', 0, 'asn_bkpsdm'),
(16, 1, '3578106206810003', 1, 'asn_bkpsdm'),
(17, 1, '3578025809820002', 0, 'asn_bkpsdm'),
(18, 1, '63522155905940004', 0, 'asn_bkpsdm'),
(19, 1, '3578204906970001', 0, 'asn_bkpsdm'),
(20, 1, '3578046803930004', 0, 'tenaga_kontrak'),
(21, 1, '3578086609920004', 0, 'tenaga_kontrak'),
(22, 1, '3522024904910001', 0, 'tenaga_kontrak'),
(23, 1, '3578101403790008', 0, 'tenaga_kontrak'),
(24, 1, '3521194207900002', 0, 'tenaga_kontrak'),
(25, 1, '3578142411880004', 0, 'tenaga_kontrak'),
(26, 1, '3578131605940002', 0, 'tenaga_kontrak'),
(27, 1, '3578022609940003', 0, 'tenaga_kontrak'),
(28, 1, '3578200109900003', 0, 'tenaga_kontrak'),
(29, 1, '3521096511930002', 0, 'tenaga_kontrak'),
(30, 1, '3578221607950002', 0, 'tenaga_kontrak'),
(31, 2, '3578106206810003', 1, 'asn_bkpsdm'),
(32, 2, '3522024904910001', 1, 'tenaga_kontrak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tenaga_kontrak_master`
--

CREATE TABLE `tenaga_kontrak_master` (
  `id_tenaga_kontrak` int(2) NOT NULL,
  `id_pegawai_tekocak` varchar(100) NOT NULL,
  `id_sub` int(10) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `password` varchar(500) NOT NULL,
  `kk` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `status_perkawinan` varchar(20) NOT NULL,
  `hubungan_keluarga` varchar(50) NOT NULL,
  `status_kependudukan` varchar(50) NOT NULL,
  `golongan_darah` varchar(10) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `tk_pendidikan` varchar(50) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `no_npwp` varchar(50) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `jenis_jabatan` varchar(50) NOT NULL,
  `unit_kerja` varchar(100) NOT NULL,
  `opd` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `alamat_ktp` varchar(100) NOT NULL,
  `kecamatan_ktp` varchar(50) NOT NULL,
  `kelurahan_ktp` varchar(50) NOT NULL,
  `kabupaten_ktp` varchar(100) NOT NULL,
  `alamat_domisili` varchar(100) NOT NULL,
  `kecamatan_domisili` varchar(50) NOT NULL,
  `kelurahan_domisili` varchar(50) NOT NULL,
  `kabupaten_domisili` varchar(50) NOT NULL,
  `gaji` int(20) NOT NULL,
  `jumlah_anak` int(1) NOT NULL,
  `ptkp` int(20) NOT NULL,
  `paket_pekerjaan` int(20) NOT NULL,
  `rekening_paket_pekerjaan` varchar(255) NOT NULL,
  `ganti_password` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_admin`
--

CREATE TABLE `user_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_admin`
--

INSERT INTO `user_admin` (`id`, `username`, `password`, `nama`, `id_bidang`, `role`) VALUES
(15, 'admin', '$2a$12$ZaH0hmOyrgzXd8qZbKAUNeLY37LwjCjE2fI7/NTPyc03ghy9dl/S6', '', 0, 'super_admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_master_asn`
--

CREATE TABLE `user_master_asn` (
  `nip` varchar(25) NOT NULL,
  `password` varchar(500) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gol` varchar(10) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `id_status` int(1) NOT NULL,
  `ganti_password` int(1) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `id_bidang` int(1) NOT NULL,
  `status_aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_master_asn`
--

INSERT INTO `user_master_asn` (`nip`, `password`, `nik`, `nama`, `gol`, `npwp`, `nama_bank`, `no_rekening`, `jabatan`, `id_status`, `ganti_password`, `role`, `id_bidang`, `status_aktif`) VALUES
('196901071988092002', '$2a$12$M4WGCqe7qocx/r2AexlGa.uDlYL/kLcCUMf0p60G96PyxyY.726Hy', '3578204701690001', 'NOER OEMARIJATI S.Sos, M.Si', '', '', '', '', 'Kepala Bagian Organisasi', 0, 1, 'asn', 0, 1),
('197111032001121002', '$2a$12$aWWczYtSBe.Uou.fOl9avuG86MbGN/OrTMdDNzh6fe6pwQVujtXxK', '3578130311710003', 'HARI TRIONO S.Sos, MA', '', '', '', '', 'Analis Kebijakan Ahli Muda (Sub Koordinator Pelayanan Publik dan Tata Laksana)', 0, 1, 'pptk', 1, 1),
('197412241994032002', '$2a$12$1bzrwH/XVhKrcC.t4r9H9OFfNnhqgagDsmY..xcBgw3M5zPOkaJqS', '1256156412740002', 'IDHA RINATA SOEMARTONO SE\n', '', '', '', '', 'Bendahara\n', 0, 1, 'bendahara', 5, 1),
('197506101998031004', '$2a$12$LUd9PwDsMzz1nCLMOlA8B.ihuQtoPmjVEcaeu7m0428x.asOj28GG', '3578124803970001', 'NUR KHAFID SE, M.Si\n', '', '', '', '', 'Analis Kelembagaan\n', 0, 1, 'asn', 0, 1),
('198106222005012013', '$2a$12$CJkTUiXUUEEa0IqsF5Ukj.gr.KB7H8qOoJn.mJeu5hd5T0pVq1hXK', '3578106206810003', 'ESTY NAYADIAH ST, M.Si, M.Sc', '', '', '', '', 'Kepala Sub Bagian Kelembagaan dan Analisis Jabatan', 0, 1, 'asn', 0, 1),
('198209182011012008', '$2a$12$02g4s/mt7.sx02.5i5S3pOQtlYzz7qRjNsvhWuz3C394KwGYa7kU.', '3578025809820002', 'DEWI NUR JANNAH S.KM.\n', '', '', '', '', 'Analis Kebijakan Ahli Muda (Sub Koordinator Perencanaan, Pelaporan Kinerja dan Reformasi Birokrasi)\n', 0, 1, 'pptk', 2, 1),
('199405192020122003', '$2a$12$kC7QnhgwDea8jL13aUizNekdZaIkMqKJ0WEW.tyjzCYctTB2oa8Ri', '63522155905940004', 'ULFA MEILINDA PUTRI S.Si\n', '', '', '', '', 'Analis Pelayanan Publik\n', 0, 1, 'pembuat spj', 1, 1),
('199705082020122002', '$2a$12$/SZBLEFRS6hOQ2umQBYd2.D.FleoMax0cwk.7tPh83MCTpXS5IAKm', '3578124803970001', 'ASTRIED PAMELLA CHOLIFAH S.Sos.\n', '', '', '', '', 'Analis Jabatan', 0, 1, 'pembuat spj', 2, 1),
('199706092022042001', '$2y$10$gjo1YHuTf.01VuUd3bIHgOq0v6zVZ8rdYzxhM0FMay2DhfqhCBEJK$2a$12$qVGSuFgZL/EB7YcKSwIrjurnr68oln9kVFeKPKJk9k/O4SG41sfXC', '3578204906970001', 'NADILA AGITA VIONITA S.Sos.\n', '', '', '', '', 'Analis Jabatan', 0, 1, 'asn', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_tenaga_kontrak`
--

CREATE TABLE `user_tenaga_kontrak` (
  `id` int(100) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `ganti_password` int(5) NOT NULL,
  `role` varchar(100) NOT NULL,
  `id_bidang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_tenaga_kontrak`
--

INSERT INTO `user_tenaga_kontrak` (`id`, `nik`, `password`, `nama`, `jabatan`, `ganti_password`, `role`, `id_bidang`) VALUES
(1, '3578046803930004', '$2a$12$bD4n7uHIRiarGfp7V68OJOJBUQC624doMbmGfRqWz/eI7GTzVZSLu', 'Medya Sari Rachma Atika,S.T', 'Pengelola Data Tata Organisasi dan Tata Laksana', 1, 'tenaga kontrak', 0),
(2, '3578086609920004', '$2a$12$SvkAF17dWYHF3pDtgxaliORJGD3EH6ie5dJiQCT498sMnY3ZzRk3q', 'Reny Elvira Septyandini, S.T', 'Pengelola Data Tata Organisasi dan Tata Laksana', 1, 'tenaga kontrak', 0),
(3, '3522024904910001', '$2a$12$n2Uq3QHk.de424jYjoCBE.s6muDtkJeAoWSWOjFdaygjw9IICaaE2', 'Lilis Ernawati, S.Kom', 'Pengadministrasi Keuangan', 1, 'pembuat spj', 2),
(4, '3578101403790008', '$2a$12$7lNrgiAEKY5RzXk3rCad.OmXSVp7li2Hj5Ov5TY1YTtr1MKIQqaqq', 'ADI WIJAYA', 'Pengadministrasi Persuratan', 1, 'tenaga kontrak', 0),
(5, '3521194207900002', '$2a$12$AGe0Zb/fvrw1DMcyNLMFQ.oyyr6ggQcEu0xfP94GJDUOVfdgTZSoe', 'Fresty Fizzaria, S.ST', 'Pengelola Data Tata Organisasi dan Tata Laksana', 1, 'tenaga kontrak', 0),
(6, '3578142411880004', '$2a$12$Q6JOv5Qe.R.hT9q6puPY0OzdfvcLkaRrNsviGVJXhAlpLeUtR6qlC', 'Robby Zidni Ilman S.H', 'Pengelola Data Tata Organisasi dan Tata Laksana', 1, 'tenaga kontrak', 0),
(7, '3578131605940002', '$2a$12$feuOXGHprT4MWO7EFhmayuP6ulWduH9B7vdl9KxSoTmSLrVUNM3Rm', 'Fatkur Rohman, S.Kom', 'Pengelola Teknologi Informasi', 1, 'tenaga kontrak', 0),
(8, '3578022609940003', '$2a$12$5dTAsoLJkwd1nRj9nUaoHeqgwYKNkp8fIpXHo6g9tiYGSaXtYSdg6', 'Melvin Ario Witama, S.Kom', 'Pengelola Teknologi Informasi', 1, 'tenaga kontrak', 0),
(9, '3578200109900003', '$2a$12$2Pr1/sDDIf5hqQkQci.NZe/s3mmA0QRaUFSpGLKfq1IuGiJ0oMHTy', 'PULIONO', 'Pengemudi VIP', 1, 'tenaga kontrak', 0),
(10, '3521096511930002', '$2a$12$FU4S409I8NVIyE6RIsDxGu82lwLM.0BgwlmHuOFOhQ6QQRQTjSGAm', 'WARIH ANGGRAINI,S.T', 'Pengelola Data Tata Organisasi dan Tata Laksana', 1, 'tenaga kontrak', 0),
(11, '3578221607950002', '$2a$12$ySWEe3psFd89iM3oW42FW.2aTdxabiicMYp3VELPpzHUh8xGq8dRG', 'Diky Efra Hutamawida, SH, MH', 'Pengelola Data Tata Organisasi dan Tata Laksana', 1, 'tenaga kontrak', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bidang_id_sub`
--
ALTER TABLE `bidang_id_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `f1`
--
ALTER TABLE `f1`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_log`
--
ALTER TABLE `login_log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_narsum`
--
ALTER TABLE `login_narsum`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_narasumber`
--
ALTER TABLE `master_narasumber`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_peserta_umum`
--
ALTER TABLE `master_peserta_umum`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `narsum_daftar_hadir_content`
--
ALTER TABLE `narsum_daftar_hadir_content`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `narsum_daftar_hadir_header`
--
ALTER TABLE `narsum_daftar_hadir_header`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `narsum_daftar_hadir_umum`
--
ALTER TABLE `narsum_daftar_hadir_umum`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tenaga_kontrak_master`
--
ALTER TABLE `tenaga_kontrak_master`
  ADD PRIMARY KEY (`id_tenaga_kontrak`);

--
-- Indeks untuk tabel `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_master_asn`
--
ALTER TABLE `user_master_asn`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `user_tenaga_kontrak`
--
ALTER TABLE `user_tenaga_kontrak`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login_log`
--
ALTER TABLE `login_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT untuk tabel `login_narsum`
--
ALTER TABLE `login_narsum`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `master_narasumber`
--
ALTER TABLE `master_narasumber`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT untuk tabel `narsum_daftar_hadir_content`
--
ALTER TABLE `narsum_daftar_hadir_content`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `narsum_daftar_hadir_umum`
--
ALTER TABLE `narsum_daftar_hadir_umum`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tenaga_kontrak_master`
--
ALTER TABLE `tenaga_kontrak_master`
  MODIFY `id_tenaga_kontrak` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_tenaga_kontrak`
--
ALTER TABLE `user_tenaga_kontrak`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
