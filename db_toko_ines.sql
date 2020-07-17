-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2020 at 11:59 AM
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
-- Database: `db_toko_ines`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan_barang` varchar(50) NOT NULL,
  `harga_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `satuan_barang`, `harga_barang`) VALUES
(1, 'Beras', 'Kg', 11000),
(2, 'Gula Pasir', 'Kg', 15000),
(3, 'Minyak Goreng', 'Liter', 12000),
(4, 'Tepung Terigu', 'Kg', 10000),
(5, 'Telur Ayam', 'Butir', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `no_transaksi` char(6) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`no_transaksi`, `id_barang`, `harga_barang`, `jumlah_beli`) VALUES
('T20001', 2, 15000, 1),
('T20001', 4, 10000, 3),
('T20002', 3, 12000, 1),
('T20002', 5, 2000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_header_transaksi`
--

CREATE TABLE `tb_header_transaksi` (
  `no_transaksi` char(6) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_header_transaksi`
--

INSERT INTO `tb_header_transaksi` (`no_transaksi`, `tgl_transaksi`, `id_user`, `total_harga`) VALUES
('T20001', '2020-07-17', 1, 45000),
('T20002', '2020-07-17', 2, 18000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_temp`
--

CREATE TABLE `tb_temp` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan_barang` varchar(50) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nama_user`, `email_user`, `password_user`) VALUES
(1, 'Ines', 'ines@gmail.com', 'e559744627cceb9d06579d548b57bc01'),
(2, 'Ayu', 'ayu@gmail.com', '29c65f781a1068a41f735e1b092546de'),
(3, 'Mega', 'mega@gmail.com', '91805ec00ad20b85226bec0bacf843d3'),
(4, 'Zarea', 'zarea@gmail.com', '582832545bc633793dd31730681c0b08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`no_transaksi`,`id_barang`),
  ADD KEY `no_transaksi` (`no_transaksi`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_header_transaksi`
--
ALTER TABLE `tb_header_transaksi`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_temp`
--
ALTER TABLE `tb_temp`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_1` FOREIGN KEY (`no_transaksi`) REFERENCES `tb_header_transaksi` (`no_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_header_transaksi`
--
ALTER TABLE `tb_header_transaksi`
  ADD CONSTRAINT `tb_header_transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
