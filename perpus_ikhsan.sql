-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2019 at 08:23 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perpus_ikhsan`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_buku`
--

CREATE TABLE IF NOT EXISTS `daftar_buku` (
  `kode_buku` int(11) NOT NULL AUTO_INCREMENT,
  `judul_buku` varchar(100) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_buku`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `daftar_buku`
--

INSERT INTO `daftar_buku` (`kode_buku`, `judul_buku`, `pengarang`, `kategori`) VALUES
(5, 'Dilan 1990', 'Pidi Baiq', 'Novel'),
(6, 'Dilan 1991', 'Pidi Baiq', 'Novel'),
(8, 'Lima Menara', 'Miftahul Zikri', 'Novel'),
(9, 'Laskar Pelangi', 'Andrea Hirata', 'Novel'),
(10, 'Pulang', 'Tere Liye', 'Novel');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_peminjam` varchar(50) NOT NULL,
  `alamat_peminjam` varchar(200) NOT NULL,
  `kode_buku` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status_peminjaman` enum('pinjam','kembali') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `nama_peminjam`, `alamat_peminjam`, `kode_buku`, `tanggal_pinjam`, `tanggal_kembali`, `status_peminjaman`) VALUES
(14, 'ikhsan', 'tangerang', 5, '2019-04-09', '2019-04-09', 'kembali'),
(16, 'ikhsan', 'tangerang', 5, '2019-04-09', '2019-04-09', 'kembali'),
(18, 'ikhsan', 'cengkareng', 8, '2019-04-09', '2019-04-09', 'kembali'),
(19, 'ikhsan', 'tangerang', 5, '2019-04-09', '0000-00-00', 'pinjam');

-- --------------------------------------------------------

--
-- Table structure for table `stok_buku`
--

CREATE TABLE IF NOT EXISTS `stok_buku` (
  `kode_buku` int(11) NOT NULL AUTO_INCREMENT,
  `judul_buku` varchar(100) NOT NULL,
  `nomor_rak` int(10) NOT NULL,
  `jumlah_buku` int(10) NOT NULL,
  PRIMARY KEY (`kode_buku`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `stok_buku`
--

INSERT INTO `stok_buku` (`kode_buku`, `judul_buku`, `nomor_rak`, `jumlah_buku`) VALUES
(5, 'Dilan 1990', 2, 9),
(6, 'Dilan 1991', 2, 10),
(8, 'Lima Menara', 1, 5),
(9, 'Laskar Pelangi', 3, 0),
(10, 'Pulang', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` enum('admin','user') NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `status`) VALUES
('admin', 'admin', 'admin'),
('ikhsan', '123', 'user'),
('syafiq', '123', 'user'),
('zidane', '123', 'user'),
('zikri', '123', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
