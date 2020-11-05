-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 05 Nov 2020 pada 00.44
-- Versi server: 5.7.31
-- Versi PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

DROP TABLE IF EXISTS `anggota`;
CREATE TABLE IF NOT EXISTS `anggota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `jenis_identitas` varchar(20) NOT NULL,
  `no_identitas` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `alamat`, `jenis_kelamin`, `jenis_identitas`, `no_identitas`, `tanggal_lahir`) VALUES
(2, 'Javiera Rahmadhany', 'Jalan Ahmad Yani No.17', 'Laki-Laki', 'KTP', '123456789', '1998-01-11'),
(3, 'Saniah', 'Jalan Arjuna No. 18', 'Perempuan', 'KTP', '123987654', '1972-02-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

DROP TABLE IF EXISTS `pengajuan`;
CREATE TABLE IF NOT EXISTS `pengajuan` (
  `id_pengajuan` varchar(64) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `no_identitas` varchar(20) NOT NULL,
  `no_buku_tabungan` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `umur` varchar(2) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `jumlah_pinjam` int(11) NOT NULL,
  `lama_pinjam` varchar(2) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `jaminan` varchar(50) NOT NULL,
  `foto_jaminan` varchar(64) NOT NULL,
  `foto_ktp` varchar(64) NOT NULL,
  `foto_kk` varchar(64) NOT NULL,
  `nama_penjamin` varchar(50) NOT NULL,
  `alamat_penjamin` text NOT NULL,
  `no_telepon_penjamin` varchar(15) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pengajuan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `tanggal`, `nama`, `no_identitas`, `no_buku_tabungan`, `alamat`, `no_telepon`, `umur`, `pekerjaan`, `jumlah_pinjam`, `lama_pinjam`, `tujuan`, `jaminan`, `foto_jaminan`, `foto_ktp`, `foto_kk`, `nama_penjamin`, `alamat_penjamin`, `no_telepon_penjamin`, `status`) VALUES
('5f94183dacb6c', '2020-10-24', 'Javiera', '123456789', '0103000000799', 'Jalan Ahmad Yani', '087876543', '22', 'Mahasiswa', 3000000, '24', 'Beli Laptop', 'Buku Tabungan', 'default.jpg', 'default.jpg', 'default.jpg', 'Wahab', 'Jalan Ahmad Yani', '089768342', 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjaman`
--

DROP TABLE IF EXISTS `pinjaman`;
CREATE TABLE IF NOT EXISTS `pinjaman` (
  `id_pinjaman` varchar(64) NOT NULL,
  `no_pk` varchar(64) NOT NULL,
  `nama_debitor` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jumlah_pinjam` int(11) NOT NULL,
  `lama_pinjam` varchar(2) NOT NULL,
  `angsuran_pokok` int(11) NOT NULL,
  `bunga` int(11) NOT NULL,
  `tanggal_realisasi` date NOT NULL,
  `tanggal_jatuh_tempo` date NOT NULL,
  `jaminan` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pinjaman`),
  UNIQUE KEY `no_pk` (`no_pk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `no_pk`, `nama_debitor`, `alamat`, `jumlah_pinjam`, `lama_pinjam`, `angsuran_pokok`, `bunga`, `tanggal_realisasi`, `tanggal_jatuh_tempo`, `jaminan`, `no_hp`, `status`) VALUES
('5fa286129e36e', '500/PK/KSB/10/2020', 'Javiera', 'Jalan Ahmad Yani', 3000000, '24', 125000, 37500, '2020-10-31', '2022-10-31', 'Buku Tabungan', '087876543', 'Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `simpanan`
--

DROP TABLE IF EXISTS `simpanan`;
CREATE TABLE IF NOT EXISTS `simpanan` (
  `no_rekening` varchar(20) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `jenis_simpanan` varchar(30) NOT NULL,
  PRIMARY KEY (`no_rekening`),
  KEY `id_anggota` (`id_anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `simpanan`
--

INSERT INTO `simpanan` (`no_rekening`, `id_anggota`, `jenis_simpanan`) VALUES
('0103000000799', 2, 'Simpanan Tabungan'),
('SW001', 3, 'Simpanan Wajib');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` varchar(64) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `kode_transaksi` varchar(20) NOT NULL,
  `user_input` varchar(20) NOT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal_transaksi`, `no_rekening`, `debit`, `kredit`, `kode_transaksi`, `user_input`, `tanggal_input`) VALUES
('5f86c33019166', '2020-10-14', '0103000000799', 0, 2000000, '101', 'U001', '2020-10-14 09:21:52'),
('5f8598ab4d85b', '2020-10-13', '0103000000799', 0, 1000000, '101', 'U001', '2020-10-13 04:08:11'),
('5f8598c86532a', '2020-10-13', '0103000000799', 500000, 0, '102', 'U001', '2020-10-13 04:08:40'),
('5f9d5d2e78d1b', '2020-10-31', '500/PK/KSB/10/2020', 0, 3000000, '201', 'U001', '2020-10-31 12:48:46'),
('5f9d5d2e83d16', '2020-10-31', '500/PK/KSB/10/2020', 0, 100000, '202', 'U001', '2020-10-31 12:48:46'),
('5f9d5d2e8461f', '2020-10-31', '500/PK/KSB/10/2020', 0, 7000, '203', 'U001', '2020-10-31 12:48:46'),
('5f9d5d2e84eda', '2020-10-31', '500/PK/KSB/10/2020', 0, 2893000, '204', 'U001', '2020-10-31 12:48:46'),
('5f9e753958b6f', '2020-11-01', '500/PK/KSB/10/2020', 0, 125000, '301', 'U001', '2020-11-01 08:45:21'),
('5f9e75a8a5d12', '2020-11-01', '500/PK/KSB/10/2020', 0, 37500, '302', 'U001', '2020-11-01 08:46:25'),
('5f9e82e17475c', '2020-11-01', '500/PK/KSB/10/2020', 0, 125000, '301', 'U001', '2020-11-01 09:41:53'),
('5f9e82e17a7c4', '2020-11-01', '500/PK/KSB/10/2020', 0, 37500, '302', 'U001', '2020-11-01 09:41:53'),
('5fa2891aba094', '2020-11-04', '500/PK/KSB/10/2020', 0, 2750000, '301', 'U001', '2020-11-04 10:57:30'),
('5fa2891ac191a', '2020-11-04', '500/PK/KSB/10/2020', 0, 37500, '302', 'U001', '2020-11-04 10:57:30');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `simpanan`
--
ALTER TABLE `simpanan`
  ADD CONSTRAINT `simpanan_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
