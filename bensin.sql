-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2021 at 11:58 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bensin`
--

-- --------------------------------------------------------

--
-- Table structure for table `bbm`
--

CREATE TABLE `bbm` (
  `id` int(11) NOT NULL,
  `jenis` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bbm`
--

INSERT INTO `bbm` (`id`, `jenis`) VALUES
(1, 'Pertamax'),
(2, 'Pertamax Turbo'),
(3, 'Pertalite'),
(4, 'Solar');

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id` int(11) NOT NULL,
  `namacabang` varchar(45) NOT NULL,
  `gambarcabang` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id`, `namacabang`, `gambarcabang`) VALUES
(1, 'Pasteur', NULL),
(2, 'Bojong kenyot', NULL),
(3, 'Kopyor', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `modal` decimal(15,0) DEFAULT NULL,
  `jual` decimal(15,0) DEFAULT NULL,
  `bbm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id`, `tanggal`, `modal`, `jual`, `bbm_id`) VALUES
(5, '2021-01-12', '5000', '6000', 4),
(6, '2021-01-12', '10000', '11000', 3),
(7, '2021-01-12', '15000', '16000', 1),
(8, '2021-01-12', '19000', '20000', 2),
(13, '2021-01-15', '14000', '15000', 1),
(14, '2021-01-15', '18000', '19000', 2),
(15, '2021-01-15', '9000', '10000', 3),
(16, '2021-01-15', '4000', '5000', 4);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `tgllahir` date DEFAULT NULL,
  `poin` int(11) DEFAULT NULL,
  `mobil` varchar(45) DEFAULT NULL,
  `motor` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `tgllahir`, `poin`, `mobil`, `motor`) VALUES
(1, '2021-01-19', 16, 'Hongda', NULL),
(8, '1970-01-01', 143, '', ''),
(9, '1979-03-01', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `cabang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `cabang_id`) VALUES
(2, 1),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `poinkeluar`
--

CREATE TABLE `poinkeluar` (
  `id` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `transaksi_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `poinkeluar`
--

INSERT INTO `poinkeluar` (`id`, `tanggal`, `jumlah`, `transaksi_id`, `member_id`) VALUES
(61, '2021-01-16 17:34:02', 150, 138, 1),
(62, '2021-01-16 17:38:37', 150, 142, 1),
(63, '2021-01-17 10:34:39', 150, 145, 8),
(64, '2021-01-17 11:01:50', 150, 146, 8),
(65, '2021-01-17 11:08:55', 150, 147, 8),
(66, '2021-01-17 11:13:19', 150, 150, 8);

-- --------------------------------------------------------

--
-- Table structure for table `poinmasuk`
--

CREATE TABLE `poinmasuk` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `sisa` int(11) DEFAULT NULL,
  `transaksi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `poinmasuk`
--

INSERT INTO `poinmasuk` (`id`, `member_id`, `tanggal`, `status`, `jumlah`, `sisa`, `transaksi_id`) VALUES
(95, 1, '2021-01-16 20:35:22', 0, 10, 0, 128),
(96, 8, '2020-01-18 20:35:38', 0, 50, 0, 129),
(97, 8, '2020-01-19 21:03:08', 0, 68, 0, 130),
(98, 1, '2021-01-16 23:28:40', 0, 100, 0, 135),
(99, 8, '2021-01-16 23:29:33', 0, 50, 0, 136),
(100, 1, '2021-01-16 23:34:02', 0, 40, 0, 138),
(101, 1, '2021-01-16 23:36:51', 0, 100, 0, 139),
(102, 1, '2021-01-16 23:37:27', 0, 50, 0, 140),
(103, 1, '2021-01-16 23:38:14', 1, 8, 8, 141),
(104, 1, '2021-01-16 23:38:37', 1, 8, 8, 142),
(105, 8, '2021-01-17 16:34:39', 0, 3, 0, 145),
(106, 8, '2021-01-17 17:01:50', 0, 13, 0, 146),
(107, 8, '2021-01-17 17:08:55', 0, 13, 0, 147),
(108, 8, '2021-01-17 17:11:14', 0, 140, 0, 148),
(109, 8, '2021-01-17 17:11:29', 1, 140, 130, 149),
(110, 8, '2021-01-17 17:13:19', 1, 13, 13, 150);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `modal` decimal(10,0) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `banyak` decimal(4,2) DEFAULT NULL,
  `potongan` decimal(15,0) DEFAULT NULL,
  `total` decimal(15,0) DEFAULT NULL,
  `subtotal` decimal(15,0) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `cabang_id` int(11) NOT NULL,
  `bbm_id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal`, `modal`, `harga`, `banyak`, `potongan`, `total`, `subtotal`, `rating`, `member_id`, `cabang_id`, `bbm_id`, `pegawai_id`) VALUES
(128, '2021-01-16 14:35:21', '70000', '15000', '5.00', '0', '75000', '75000', NULL, 1, 2, 1, 1),
(129, '2021-01-16 14:35:38', '450000', '10000', '50.00', '0', '500000', '500000', NULL, 8, 2, 3, 1),
(130, '2021-01-16 14:48:04', '135200', '5000', '33.80', '0', '169000', '169000', NULL, 8, 2, 4, 1),
(131, '2021-01-16 15:17:17', '14000', '15000', '1.00', '0', '15000', '15000', NULL, NULL, 2, 1, 1),
(132, '2021-01-16 15:19:02', '180000', '19000', '10.00', '0', '190000', '190000', NULL, NULL, 2, 2, 1),
(134, '2021-01-16 15:24:31', '180000', '19000', '10.00', '0', '190000', '190000', NULL, NULL, 2, 2, 1),
(135, '2021-01-16 17:28:39', '450000', '10000', '50.00', '0', '500000', '500000', NULL, 1, 2, 3, 1),
(136, '2021-01-16 17:29:33', '450000', '10000', '50.00', '0', '500000', '500000', NULL, 8, 2, 3, 1),
(137, '2021-01-16 17:33:45', '9333', '15000', '0.67', '0', '10000', '10000', NULL, NULL, 2, 1, 1),
(138, '2021-01-16 17:34:02', '180000', '10000', '20.00', '10000', '200000', '190000', NULL, 1, 2, 3, 1),
(139, '2021-01-16 17:36:50', '450000', '10000', '50.00', '0', '500000', '500000', NULL, 1, 2, 3, 1),
(140, '2021-01-16 17:37:27', '225000', '10000', '25.00', '0', '250000', '250000', NULL, 1, 2, 3, 1),
(141, '2021-01-16 17:38:14', '28000', '15000', '2.00', '0', '30000', '30000', NULL, 1, 2, 1, 1),
(142, '2021-01-16 17:38:36', '28000', '15000', '2.00', '10000', '30000', '20000', NULL, 1, 2, 1, 1),
(143, '2021-01-17 05:38:31', '18000', '10000', '2.00', '0', '20000', '20000', NULL, NULL, 2, 3, 1),
(144, '2021-01-17 05:38:59', '18000', '10000', '2.00', '0', '20000', '20000', NULL, NULL, 2, 3, 1),
(145, '2021-01-17 10:34:38', '18667', '15000', '1.33', '10000', '20000', '10000', NULL, 8, 2, 1, 1),
(146, '2021-01-17 11:01:50', '94737', '19000', '5.26', '10000', '100000', '90000', NULL, 8, 2, 2, 1),
(147, '2021-01-17 11:08:55', '93333', '15000', '6.67', '10000', '100000', '90000', NULL, 8, 2, 1, 1),
(148, '2021-01-17 11:11:14', '280000', '5000', '70.00', '0', '350000', '350000', NULL, 8, 2, 4, 1),
(149, '2021-01-17 11:11:29', '280000', '5000', '70.00', '0', '350000', '350000', NULL, 8, 2, 4, 1),
(150, '2021-01-17 11:13:19', '93333', '15000', '6.67', '10000', '100000', '90000', NULL, 8, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `pegawai_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role`, `email`, `member_id`, `pegawai_id`) VALUES
(1, 'edo', 'edo', '827ccb0eea8a706c4c34a16891f84e7b', 'owner', 'edo@gmail.com', NULL, NULL),
(2, 'lor', 'lor', '827ccb0eea8a706c4c34a16891f84e7b', 'pegawai', 'rol@gmail.com', NULL, 1),
(3, 'Rolando', 'rol', '827ccb0eea8a706c4c34a16891f84e7b', 'member', 'rol@gmail.com', 1, NULL),
(8, 'JuanD', 'juan', '827ccb0eea8a706c4c34a16891f84e7b', 'member', 'juan@gmail.com', 8, NULL),
(9, 'david', 'david', '827ccb0eea8a706c4c34a16891f84e7b', 'pegawai', 'david@gmail.com', NULL, 2),
(10, 'sutanto', 'sutonto', '827ccb0eea8a706c4c34a16891f84e7b', 'member', 'a@a.com', 9, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bbm`
--
ALTER TABLE `bbm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_harga_bbm1` (`bbm_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pegawai_cabang1` (`cabang_id`);

--
-- Indexes for table `poinkeluar`
--
ALTER TABLE `poinkeluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_poinkeluar_transaksi1` (`transaksi_id`),
  ADD KEY `fk_poinkeluar_member1` (`member_id`);

--
-- Indexes for table `poinmasuk`
--
ALTER TABLE `poinmasuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_logpoin_member1` (`member_id`),
  ADD KEY `fk_poinmasuk_transaksi1` (`transaksi_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transaksi_member1` (`member_id`),
  ADD KEY `fk_transaksi_cabang1` (`cabang_id`),
  ADD KEY `fk_transaksi_bbm1` (`bbm_id`),
  ADD KEY `fk_transaksi_pegawai1` (`pegawai_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_member` (`member_id`),
  ADD KEY `fk_user_pegawai1` (`pegawai_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bbm`
--
ALTER TABLE `bbm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `poinkeluar`
--
ALTER TABLE `poinkeluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `poinmasuk`
--
ALTER TABLE `poinmasuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `harga`
--
ALTER TABLE `harga`
  ADD CONSTRAINT `fk_harga_bbm1` FOREIGN KEY (`bbm_id`) REFERENCES `bbm` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `fk_pegawai_cabang1` FOREIGN KEY (`cabang_id`) REFERENCES `cabang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `poinkeluar`
--
ALTER TABLE `poinkeluar`
  ADD CONSTRAINT `fk_poinkeluar_member1` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_poinkeluar_transaksi1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `poinmasuk`
--
ALTER TABLE `poinmasuk`
  ADD CONSTRAINT `fk_logpoin_member1` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_poinmasuk_transaksi1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_bbm1` FOREIGN KEY (`bbm_id`) REFERENCES `bbm` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaksi_cabang1` FOREIGN KEY (`cabang_id`) REFERENCES `cabang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaksi_member1` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaksi_pegawai1` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_member` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_pegawai1` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
