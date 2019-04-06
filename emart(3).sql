-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 23, 2018 at 08:27 AM
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
(12, 'AlienWare', 7, 'libas semua', 3, 2300000, 'images.jpeg'),
(13, 'Laptop Dewa', 2, 'apa aja mulus', 3, 100000, '.com.google.Chrome.TOkCq3'),
(17, 'Gigabyte', 4, 'Gaming Laptop', 3, 1000000, 'gaming.jpeg'),
(18, 'MSI', 100, 'laptopnya presiden', 3, 999999, 'gamin1.jpeg'),
(20, 'X-Type', 10, 'Spek dewa, harga murah', 3, 3000000, 'gaming3.jpeg'),
(22, 'Predator', 10, 'Alien vs Predator', 3, 3500000, 'gaming5.jpeg'),
(26, 'AsusRoge', 0, 'One the only. murmer', 7, 2500000, 'asus_rog.jpeg'),
(28, 'tes', 0, 'qf', 7, 2222, 'Screenshot from 2018-11-10 20-57-00.png'),
(29, 'tes', 99, 'tes', 8, 1000, 'Screenshot from 2018-11-23 09-18-14.png');

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
(13, 7, 12, 1),
(14, 7, 17, 1),
(23, 7, 13, 1),
(24, 3, 22, 1),
(25, 3, 13, 1);

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
(1, 'Admin'),
(2, 'Users');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_beli` datetime(6) NOT NULL,
  `tanggal_bayar` datetime(6) NOT NULL,
  `invoice` varchar(30) NOT NULL,
  `file_bukti_bayar` varchar(100) NOT NULL,
  `resi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `id_barang`, `jumlah`, `tanggal_beli`, `tanggal_bayar`, `invoice`, `file_bukti_bayar`, `resi`) VALUES
(64, 3, '9', 1, '2018-11-22 04:11:28.112800', '0000-00-00 00:00:00.000000', 'EMIV64', 'bukti_bayar/hqdefault.jpg', ''),
(65, 3, 'EMVKER_3', 1, '2018-11-22 04:11:37.113700', '0000-00-00 00:00:00.000000', 'EMIV65', '', ''),
(66, 3, '11', 1, '2018-11-22 04:11:40.114000', '0000-00-00 00:00:00.000000', 'EMIV66', '', ''),
(67, 3, '11', 1, '2018-11-22 04:11:57.115700', '0000-00-00 00:00:00.000000', 'EMIV67', '', ''),
(72, 7, '24', 1, '2018-11-22 08:11:06.110600', '0000-00-00 00:00:00.000000', 'EMIV72', '', ''),
(73, 3, 'EMVKER_3', 1, '2018-11-23 02:11:00.110000', '0000-00-00 00:00:00.000000', 'EMIV73', '', ''),
(78, 7, '27', 1, '2018-11-23 03:11:26.112600', '0000-00-00 00:00:00.000000', 'EMIV78', 'bukti_bayar/Screenshot from 2018-10-10 10-53-10.png', ''),
(80, 3, '28', 1, '2018-11-23 04:11:45.114500', '0000-00-00 00:00:00.000000', 'EMIV80', '', 'JNE1010'),
(81, 8, '26', 1, '2018-11-23 04:11:04.110400', '0000-00-00 00:00:00.000000', 'EMIV81', 'bukti_bayar/vlcsnap-2018-04-18-14h05m', ''),
(82, 7, '29', 1, '2018-11-23 04:11:43.114300', '0000-00-00 00:00:00.000000', 'EMIV82', 'bukti_bayar/vlcsnap-2018-04-18-14h42m50s972 (copy).png', '');

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
  `id_tipe_akun` int(11) NOT NULL,
  `dp` varchar(100) NOT NULL DEFAULT 'account.svg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `nama`, `alamat`, `umur`, `id_tipe_akun`, `dp`) VALUES
(3, 'kevin@gmail.com', '202cb962ac59075b964b07152d234b70', 'kevin', 'bumi', 123, 1, 'IMG-20180510-WA0009.jpg'),
(7, 'tes@gmail.com', '202cb962ac59075b964b07152d234b70', 'tes', 'aa', 1, 2, 'account.svg'),
(8, 'guest@gmail.com', '202cb962ac59075b964b07152d234b70', 'guest', 'asteroid', 100, 2, 'account.svg');

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
-- Indexes for table `tipe_akun`
--
ALTER TABLE `tipe_akun`
  ADD UNIQUE KEY `id` (`id`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
