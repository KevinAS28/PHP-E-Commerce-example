-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 28, 2021 at 06:42 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

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
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `jumlah`, `deskripsi`, `owner_id`, `harga`, `gambar`) VALUES
(12, 'AlienWare', 3, 'libas semua', 3, 2300000, 'images.jpeg'),
(13, 'Laptop Dewa', 0, 'apa aja mulus', 3, 100000, '.com.google.Chrome.TOkCq3'),
(17, 'Gigabyte', -18, 'Gaming Laptop', 3, 1000000, 'gaming.jpeg'),
(18, 'MSI', 97, 'laptopnya presiden', 3, 999999, 'gamin1.jpeg'),
(20, 'X-Type', 9, 'Spek dewa, harga murah', 3, 3000000, 'gaming3.jpeg'),
(22, 'Predator', 9, 'Alien vs Predator', 3, 3500000, 'gaming5.jpeg'),
(26, 'AsusRoge', 98, 'One the only. murmer', 7, 2500000, 'asus_rog.jpeg'),
(34, 'kue', 96, '111', 10, 10000, '125-1255955_background-cake-cartoon-chocolate-food-slice-background-cake-cartoon-chocolate-food-slice.png');

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
(25, 3, 13, 1),
(28, 9, 13, 1);

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
  `tanggal_bayar` datetime(6) DEFAULT NULL,
  `invoice` varchar(30) NOT NULL,
  `file_bukti_bayar` varchar(100) DEFAULT NULL,
  `resi` varchar(50) DEFAULT NULL
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
(90, 10, '18', 1, '2021-06-28 05:06:39.063900', NULL, 'EMIV90', 'bukti_bayar/RSBHAXL.png', NULL),
(91, 10, '17', 1, '2021-06-28 05:06:07.060700', NULL, 'EMIV91', NULL, NULL),
(92, 10, '29', 1, '2021-06-28 06:06:22.062200', NULL, 'EMIV92', NULL, NULL),
(93, 10, '17', 1, '2021-06-28 06:06:43.064300', NULL, 'EMIV93', NULL, NULL),
(94, 10, '30', 1, '2021-06-28 06:06:07.060700', NULL, 'EMIV94', NULL, NULL),
(95, 10, '31', 1, '2021-06-28 06:06:34.063400', NULL, 'EMIV95', NULL, NULL),
(96, 10, '31', 1, '2021-06-28 06:06:30.063000', NULL, 'EMIV96', NULL, NULL),
(97, 10, '31', 1, '2021-06-28 06:06:35.063500', NULL, 'EMIV97', NULL, NULL),
(98, 10, '31', 1, '2021-06-28 06:06:27.062700', NULL, 'EMIV98', NULL, NULL),
(99, 10, '32', 1, '2021-06-28 06:06:50.065000', NULL, 'EMIV99', NULL, NULL),
(100, 10, '32', 1, '2021-06-28 06:06:28.062800', NULL, 'EMIV100', NULL, NULL),
(101, 10, '17', 1, '2021-06-28 06:06:45.064500', NULL, 'EMIV101', NULL, NULL),
(102, 10, '34', 1, '2021-06-28 06:06:57.065700', NULL, 'EMIV102', NULL, NULL),
(103, 10, '34', 1, '2021-06-28 06:06:05.060500', NULL, 'EMIV103', NULL, NULL),
(104, 10, '35', 1, '2021-06-28 06:06:44.064400', NULL, 'EMIV104', NULL, NULL),
(105, 10, '35', 1, '2021-06-28 06:06:39.063900', NULL, 'EMIV105', NULL, NULL),
(106, 10, '36', 1, '2021-06-28 06:06:58.065800', NULL, 'EMIV106', NULL, NULL),
(107, 10, '17', 1, '2021-06-28 06:06:22.062200', NULL, 'EMIV107', NULL, NULL),
(108, 10, '17', 1, '2021-06-28 06:06:26.062600', NULL, 'EMIV108', NULL, NULL),
(109, 10, '17', 1, '2021-06-28 06:06:45.064500', NULL, 'EMIV109', NULL, NULL),
(110, 10, '17', 1, '2021-06-28 06:06:52.065200', NULL, 'EMIV110', NULL, NULL),
(111, 10, '17', 1, '2021-06-28 06:06:21.062100', NULL, 'EMIV111', NULL, NULL),
(112, 10, '17', 1, '2021-06-28 06:06:29.062900', NULL, 'EMIV112', NULL, NULL),
(113, 10, '17', 1, '2021-06-28 06:06:02.060200', NULL, 'EMIV113', NULL, NULL),
(114, 10, '17', 1, '2021-06-28 06:06:22.062200', NULL, 'EMIV114', NULL, NULL),
(115, 10, '17', 1, '2021-06-28 06:06:26.062600', NULL, 'EMIV115', NULL, NULL),
(116, 10, '17', 1, '2021-06-28 06:06:45.064500', NULL, 'EMIV116', NULL, NULL),
(117, 10, '26', 1, '2021-06-28 06:06:10.061000', NULL, 'EMIV117', NULL, NULL),
(118, 10, '22', 1, '2021-06-28 06:06:27.062700', NULL, 'EMIV118', 'bukti_bayar/rktp1.png', NULL),
(119, 10, '34', 1, '2021-06-28 06:06:15.061500', NULL, 'EMIV119', 'bukti_bayar/download (4).jpeg', NULL),
(120, 10, '34', 1, '2021-06-28 06:06:59.065900', '2021-06-28 06:06:59.065900', 'EMIV120', '', 'SV17710'),
(121, 10, '26', 1, '2021-06-28 06:06:55.065500', NULL, 'EMIV120', NULL, NULL);

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
(3, 'kevin@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'kevin', '18', 123, 1, 'IMG-20180510-WA0009.jpg'),
(7, 'tes@gmail.com', '202cb962ac59075b964b07152d234b70', 'tes', 'aa', 1, 2, 'account.svg'),
(8, 'guest@gmail.com', '202cb962ac59075b964b07152d234b70', 'guest', 'asteroid', 100, 2, 'account.svg'),
(9, 'kevin@mail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'kevin', 'alamat', 18, 1, 'walle0.jpg'),
(10, 'tamu@gmail.com', 'f8829935a87192f3f9fab79856122c0f', 'tamu', 'tamu', 12, 2, 'man-standing.png');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
