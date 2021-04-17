-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2021 at 11:03 AM
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
(3, '02', 'Dasep Depiyawan', 'caf1a3dfb505ffed0d024130f58c5cfa', 1),
(4, '12', 'Ayu Safitri', 'caf1a3dfb505ffed0d024130f58c5cfa', 2);

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
  `tgl_pengembalian` date DEFAULT NULL,
  `petugas` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `status_sebelumnya` varchar(100) DEFAULT NULL,
  `posisi_sebelumnya` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam_brg`
--

INSERT INTO `pinjam_brg` (`id`, `idpinjam`, `idbarang`, `peminjam`, `nama_brg`, `kode_brg`, `kategori_brg`, `tgl_pinjam`, `tgl_kembali`, `tgl_pengembalian`, `petugas`, `status`, `status_sebelumnya`, `posisi_sebelumnya`) VALUES
(29, 'Mon21043225', 5, 'Resna', 'Proyektor', 'PRY-01', 'Elektronik', '2021-04-09', '2021-04-10', '2021-04-13', '', 'kembali', 'Baik/Cadangan', 'Gudang'),
(30, 'Mon21043238', 7, 'Rima', 'Meja', 'MJ-01', 'Non-Elektronik', '2021-04-01', '2021-04-05', '2021-04-13', '', 'kembali', 'aktif', 'Kelas XX'),
(31, 'Tue21043844', 5, 'Kepala Sekolah', 'Proyektor', 'PRY-01', 'Elektronik', '2021-04-13', '2021-04-16', NULL, '', 'dipinjam', 'Baik/Cadangan', 'Gudang'),
(32, 'Tue21043906', 7, 'Guru BK', 'Meja', 'MJ-01', 'Non-Elektronik', '2021-04-08', '2021-04-11', '2021-04-13', '', 'kembali', 'aktif', 'Kelas XX');

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
(5, 'Proyektor', 'PRY-01', 'Elektronik', '2021-01-31', 'dipinjam', 'Baik', 'Kepala Sekolah'),
(7, 'Meja', 'MJ-01', 'Non-Elektronik', '2021-01-31', 'aktif', 'Aktif', 'Kelas XX');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
