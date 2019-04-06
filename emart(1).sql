-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 16, 2018 at 05:01 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emart`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `deskripsi` varchar(150) NOT NULL,
  `owner_id` int(10) NOT NULL,
  `harga` int(10) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `jumlah`, `deskripsi`, `owner_id`, `harga`, `gambar`) VALUES
(7, 'walle', -12, 'robot pintar', 3, 919191, 'images.jpeg'),
(8, 'walle1', 10, 'robot sangat pintar', 3, 99999, 'walle0.jpg'),
(9, 'walle2', 10, 'apakek', 3, 100000, 'walle1.jpg'),
(10, 'tau', 1000, 'tes', 3, 100, 'force.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id`, `id_user`, `id_barang`, `jumlah`) VALUES
(1, 3, 8, 1),
(2, 3, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tipe_akun`
--

CREATE TABLE `tipe_akun` (
  `id` int(11) NOT NULL,
  `tipe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe_akun`
--

INSERT INTO `tipe_akun` (`id`, `tipe`) VALUES
(1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_beli` datetime(6) NOT NULL,
  `tanggal_bayar` datetime(6) NOT NULL,
  `invoice` varchar(30) NOT NULL,
  `file_bukti_bayar` varchar(50) NOT NULL,
  `resi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `id_barang`, `jumlah`, `tanggal_beli`, `tanggal_bayar`, `invoice`, `file_bukti_bayar`, `resi`) VALUES
(6, 3, 7, 10, '2018-11-16 04:11:50.115000', '0000-00-00 00:00:00.000000', 'EMIV6', '', ''),
(7, 3, 7, 10, '2018-11-16 04:11:31.113100', '0000-00-00 00:00:00.000000', 'EMIV7', '', ''),
(8, 3, 7, 10, '2018-11-16 04:11:46.114600', '0000-00-00 00:00:00.000000', 'EMIV8', '', ''),
(9, 3, 7, 10, '2018-11-16 04:11:55.115500', '0000-00-00 00:00:00.000000', 'EMIV9', '', ''),
(10, 3, 7, 10, '2018-11-16 04:11:56.115600', '0000-00-00 00:00:00.000000', 'EMIV10', '', ''),
(11, 3, 7, 10, '2018-11-16 04:11:05.110500', '0000-00-00 00:00:00.000000', 'EMIV11', '', ''),
(12, 3, 7, 10, '2018-11-16 04:11:28.112800', '0000-00-00 00:00:00.000000', 'EMIV12', '', ''),
(13, 3, 7, 10, '2018-11-16 04:11:17.111700', '0000-00-00 00:00:00.000000', 'EMIV13', '', ''),
(14, 3, 7, 10, '2018-11-16 04:11:22.112200', '0000-00-00 00:00:00.000000', 'EMIV14', '', ''),
(15, 3, 7, 10, '2018-11-16 04:11:35.113500', '0000-00-00 00:00:00.000000', 'EMIV15', '', ''),
(16, 3, 7, 10, '2018-11-16 04:11:57.115700', '0000-00-00 00:00:00.000000', 'EMIV16', '', ''),
(17, 3, 7, 10, '2018-11-16 04:11:09.110900', '0000-00-00 00:00:00.000000', 'EMIV17', '', ''),
(18, 3, 7, 7, '2018-11-16 04:11:28.112800', '0000-00-00 00:00:00.000000', 'EMIV18', '', ''),
(19, 3, 7, 7, '2018-11-16 04:11:00.110000', '0000-00-00 00:00:00.000000', 'EMIV19', '', ''),
(20, 3, 7, 7, '2018-11-16 04:11:10.111000', '0000-00-00 00:00:00.000000', 'EMIV20', '', ''),
(21, 3, 7, 7, '2018-11-16 04:11:46.114600', '0000-00-00 00:00:00.000000', 'EMIV21', '', ''),
(22, 3, 7, 5, '2018-11-16 04:11:49.114900', '0000-00-00 00:00:00.000000', 'EMIV22', '', ''),
(23, 3, 7, 5, '2018-11-16 04:11:53.115300', '0000-00-00 00:00:00.000000', 'EMIV23', '', ''),
(24, 3, 7, 5, '2018-11-16 04:11:16.111600', '0000-00-00 00:00:00.000000', 'EMIV24', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `umur` int(10) NOT NULL,
  `id_tipe_akun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `nama`, `alamat`, `umur`, `id_tipe_akun`) VALUES
(3, 'kevin', '123', 'kevin', 'bumi', 123, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
