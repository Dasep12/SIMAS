-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2021 at 12:04 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sima`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `id_user` varchar(10) DEFAULT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `id_user`, `nama`, `password`, `role`) VALUES
(3, 'admin', 'Rima Hidayat', '202cb962ac59075b964b07152d234b70', 1),
(4, 'petugas', 'Ayu Safitri', '202cb962ac59075b964b07152d234b70', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_brg`
--

CREATE TABLE `pinjam_brg` (
  `id` int(11) NOT NULL,
  `idpinjam` varchar(15) DEFAULT NULL,
  `idbarang` int(11) DEFAULT NULL,
  `peminjam` varchar(100) DEFAULT NULL,
  `nama_brg` varchar(100) DEFAULT NULL,
  `kode_brg` varchar(100) DEFAULT NULL,
  `kategori_brg` varchar(100) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `jam_kembali` time DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `petugas` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `status_sebelumnya` varchar(100) DEFAULT NULL,
  `posisi_sebelumnya` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam_brg`
--

INSERT INTO `pinjam_brg` (`id`, `idpinjam`, `idbarang`, `peminjam`, `nama_brg`, `kode_brg`, `kategori_brg`, `tgl_pinjam`, `tgl_kembali`, `jam_kembali`, `tgl_pengembalian`, `petugas`, `status`, `status_sebelumnya`, `posisi_sebelumnya`) VALUES
(36, 'Sat21045147', 11, 'dasep', 'Papan Tulis', 'PPT-01', 'Non-elektronik', '2021-04-17', '2021-04-20', '16:52:23', '2021-04-17', 'Ayu Safitri', 'kembali', 'Aktif', 'Kelas'),
(37, 'Sat21040125', 11, 'dasep', 'Papan Tulis', 'PPT-01', 'Non-elektronik', '2021-04-13', '2021-04-16', '17:01:57', '2021-04-17', 'Ayu Safitri', 'kembali', 'Aktif', 'Kelas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id` int(11) NOT NULL,
  `nama_brg` varchar(100) DEFAULT NULL,
  `kode_brg` varchar(100) DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `tgl_beli` varchar(20) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `kondisi` varchar(100) DEFAULT NULL,
  `posisi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id`, `nama_brg`, `kode_brg`, `kategori`, `tgl_beli`, `status`, `kondisi`, `posisi`) VALUES
(11, 'Papan Tulis', 'PPT-01', 'Non-elektronik', '2021/12/30', 'Aktif', 'Baik', 'Kelas'),
(12, 'Proyektor', 'PRY-01', 'Elektronik', '2021/12/30', 'Baik/Cadangan', 'Baik', 'Gudang'),
(13, 'Bangku', 'BK-01', 'Non-elektronik', '2021/12/30', 'Rusak', 'Rusak Kakinya', 'Gudang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinjam_brg`
--
ALTER TABLE `pinjam_brg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pinjam_brg`
--
ALTER TABLE `pinjam_brg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
