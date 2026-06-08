-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2026 at 08:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pointofsale`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangmasuk`
--

CREATE TABLE `barangmasuk` (
  `id_barangmasuk` int(4) NOT NULL,
  `jumlah_productmasuk` int(5) NOT NULL,
  `nama_supplier` varchar(50) DEFAULT NULL,
  `id_product` int(4) NOT NULL,
  `harga` int(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangmasuk`
--

INSERT INTO `barangmasuk` (`id_barangmasuk`, `jumlah_productmasuk`, `nama_supplier`, `id_product`, `harga`, `tanggal`) VALUES
(13, 100, 'rere', 3, 2000, '2022-11-08'),
(14, 100, 'okta', 1, 1000, '0000-00-00'),
(15, 100, 'popo', 4, 10000, '2022-11-08'),
(17, 100, 'rere', 6, 10000, '2022-11-08'),
(19, 7777, NULL, 4, 7777, '2022-11-08'),
(20, 7777, NULL, 5, 1000, '2022-11-09'),
(21, 7777, NULL, 6, 3000, '2022-11-14'),
(23, 3, NULL, 9, 15000, '2022-11-16'),
(24, 10000, NULL, 10, 3000, '2022-11-27'),
(26, 9999, NULL, 13, 100000, '2023-09-19'),
(27, 55, NULL, 10, 55000, '2026-05-15'),
(28, 40, NULL, 13, 35000, '2026-05-20'),
(29, 55, NULL, 12, 55000, '2026-05-29');

--
-- Triggers `barangmasuk`
--
DELIMITER $$
CREATE TRIGGER `delete` AFTER DELETE ON `barangmasuk` FOR EACH ROW BEGIN
UPDATE product SET stok_product = stok_product - old.jumlah_productmasuk WHERE id_product=old.id_product;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update` AFTER INSERT ON `barangmasuk` FOR EACH ROW BEGIN
UPDATE product SET stok_product = stok_product + new.jumlah_productmasuk WHERE id_product=new.id_product;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id_bill` int(4) NOT NULL,
  `total_belanjaan` int(4) NOT NULL,
  `no_pembayaran` varchar(20) NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id_bill`, `total_belanjaan`, `no_pembayaran`, `tgl_transaksi`) VALUES
(1, 2000, '22', '2022-11-02'),
(3, 421000, 'Transfer', '2026-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(4) NOT NULL,
  `NIP` int(4) NOT NULL,
  `NAMA` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `Jenis_kelamin` enum('L','P') NOT NULL,
  `id_user` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `NIP`, `NAMA`, `alamat`, `Jenis_kelamin`, `id_user`) VALUES
(4, 27, 'toto', 'papua', 'P', 1),
(5, 69, 'ari', 'mars', 'P', 6),
(6, 4543, 'jojo', 'kebodohan', 'P', 4);

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `NIS` int(4) NOT NULL,
  `id_siswa` int(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(4) NOT NULL,
  `jenis_payment` varchar(15) DEFAULT NULL,
  `kode_payment` int(3) DEFAULT NULL,
  `total_belanjaan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(4) NOT NULL,
  `harga_product` int(4) NOT NULL,
  `jumlah_product` int(4) NOT NULL,
  `nama_kasir` varchar(50) NOT NULL,
  `no_penjualan` int(4) NOT NULL,
  `date_record` int(4) NOT NULL,
  `total_belanjaan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `harga_product`, `jumlah_product`, `nama_kasir`, `no_penjualan`, `date_record`, `total_belanjaan`) VALUES
(1, 1000, 2, 'rere', 1, 92, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(4) NOT NULL,
  `nama_product` varchar(50) NOT NULL,
  `stok_product` int(4) NOT NULL,
  `kode_product` varchar(10) NOT NULL,
  `harga_product` int(4) NOT NULL,
  `harga_beli` int(11) NOT NULL DEFAULT 0,
  `tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `nama_product`, `stok_product`, `kode_product`, `harga_product`, `harga_beli`, `tanggal`) VALUES
(8, 'pocari', 441, '2006', 7000, 0, '2022-11-16'),
(10, 'fore', 10054, '4444', 3000, 0, '2022-11-28'),
(11, 'ceca', 1, '2905', 1000, 0, '2023-08-21'),
(12, 'kopi', 207, '4448', 6000, 0, '2023-09-14'),
(13, 'ovo', 10035, '56565', 100000, 0, '2023-09-20'),
(15, 'Kertas', 0, '002', 5000, 0, '2026-05-20'),
(17, 'Lemon Tea', 0, '003', 6000, 4500, '2026-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `nama` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `alamat` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(4) NOT NULL,
  `id_product` int(4) NOT NULL,
  `harga_beli` int(11) NOT NULL DEFAULT 0,
  `jumlah` int(5) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_bill` int(4) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_product`, `harga_beli`, `jumlah`, `harga`, `id_bill`, `Nama`, `tanggal`) VALUES
(5, 0, 0, 2222, 3000, 0, '', '2022-11-15'),
(6, 6, 0, 2222, 3000, 0, '', '2022-11-15'),
(8, 9, 0, 1, 12000, 0, '', '2022-11-16'),
(9, 10, 0, 1, 3000, 3333, '', '2022-11-28'),
(10, 1, 0, 2, 1000, 1, 'permenn', '2022-11-29'),
(11, 12, 0, 3, 6000, 0, '', '2023-09-14'),
(14, 8, 0, 3, 7000, 3, 'ADMIN', '2026-05-29'),
(15, 13, 0, 4, 100000, 3, 'ADMIN', '2026-05-29');

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `a` BEFORE DELETE ON `transaksi` FOR EACH ROW BEGIN
UPDATE product SET stok_product = stok_product + old.jumlah WHERE id_product=old.id_product;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `b` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
UPDATE product SET stok_product = stok_product - new.jumlah WHERE id_product=new.id_product;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(15) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `password`, `level`, `username`, `foto`) VALUES
(4, '827ccb0eea8a706c4c34a16891f84e7b', '3', 'LEADER kasir', NULL),
(5, '827ccb0eea8a706c4c34a16891f84e7b', '4', 'manager', NULL),
(6, '0192023a7bbd73250516f069df18b500', '1', 'ADMIN', '1780066023_5456d7de48fe38b42791.jpg'),
(7, '827ccb0eea8a706c4c34a16891f84e7b', '2', 'KASIR', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD PRIMARY KEY (`id_barangmasuk`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`NIS`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  MODIFY `id_barangmasuk` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id_bill` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `murid`
--
ALTER TABLE `murid`
  MODIFY `NIS` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
