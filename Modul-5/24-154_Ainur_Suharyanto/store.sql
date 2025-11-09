-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2025 at 10:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--
CREATE DATABASE IF NOT EXISTS store CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE store;

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(11) DEFAULT 0,
  `stok` int(11) DEFAULT 0,
  `supplier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `harga`, `stok`, `supplier_id`) VALUES
(1, 'BRG001', 'Laptop Lenovo', 7500000, 5, 1),
(2, 'BRG002', 'Mouse Logitech', 150000, 20, 2),
(3, 'BRG003', 'Keyboard Rexus', 300000, 15, 3),
(4, 'BRG004', 'Monitor Samsung', 2000000, 7, 4),
(5, 'BRG005', 'Printer Epson', 1800000, 6, 5),
(6, 'BRG006', 'Flashdisk 32GB', 80000, 25, 6),
(7, 'BRG007', 'Headset Sony', 250000, 12, 7),
(8, 'BRG008', 'Router TP-Link', 400000, 10, 8),
(9, 'BRG009', 'Webcam Logitech', 350000, 8, 9),
(10, 'BRG010', 'Speaker JBL', 500000, 9, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT 'L',
  `telp` varchar(12) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `jenis_kelamin`, `telp`, `alamat`) VALUES
('P001', 'Andi', 'L', '081234567890', 'Jl. Melati No.1'),
('P002', 'Budi', 'L', '081234567891', 'Jl. Mawar No.2'),
('P003', 'Citra', 'P', '081234567892', 'Jl. Kenanga No.3'),
('P004', 'Dewi', 'P', '081234567893', 'Jl. Flamboyan No.4'),
('P005', 'Eka', 'L', '081234567894', 'Jl. Dahlia No.5'),
('P006', 'Fajar', 'L', '081234567895', 'Jl. Teratai No.6'),
('P007', 'Gina', 'P', '081234567896', 'Jl. Sakura No.7'),
('P008', 'Hadi', 'L', '081234567897', 'Jl. Nusa Indah No.8'),
('P009', 'Intan', 'P', '081234567898', 'Jl. Melur No.9'),
('P010', 'Joko', 'L', '081234567899', 'Jl. Anggrek No.10');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `waktu_bayar` datetime DEFAULT NULL,
  `total` int(11) DEFAULT 0,
  `metode` enum('TUNAI','TRANSFER','EDC') DEFAULT 'TUNAI',
  `transaksi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `waktu_bayar`, `total`, `metode`, `transaksi_id`) VALUES
(1, '2025-10-01 10:00:00', 7500000, 'TUNAI', 1),
(2, '2025-10-02 11:00:00', 150000, 'TRANSFER', 2),
(3, '2025-10-03 09:30:00', 300000, 'TUNAI', 3),
(4, '2025-10-04 14:15:00', 2000000, 'EDC', 4),
(5, '2025-10-05 16:00:00', 1800000, 'TRANSFER', 5),
(6, '2025-10-06 13:20:00', 160000, 'TUNAI', 6),
(7, '2025-10-07 10:45:00', 250000, 'TRANSFER', 7),
(8, '2025-10-08 15:30:00', 400000, 'EDC', 8),
(9, '2025-10-09 12:00:00', 350000, 'TRANSFER', 9),
(10, '2025-10-10 17:10:00', 500000, 'TUNAI', 10);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `telp`, `alamat`) VALUES
(1, 'PT Maju Jaya', '0811111111', 'Jl. Merdeka No.1'),
(2, 'CV Sejahtera', '0812222222', 'Jl. Mawar No.2'),
(3, 'PT Makmur Sentosa', '0813333333', 'Jl. Melati No.3'),
(4, 'CV Berkah Abadi', '0814444444', 'Jl. Kenanga No.4'),
(5, 'PT Sumber Rezeki', '0815555555', 'Jl. Anggrek No.5'),
(6, 'CV Prima Mandiri', '0816666666', 'Jl. Dahlia No.6'),
(7, 'PT Tumbuh Bersama', '0817777777', 'Jl. Teratai No.7'),
(8, 'CV Cahaya Baru', '0818888888', 'Jl. Sakura No.8'),
(9, 'PT Harapan Mulia', '0819999999', 'Jl. Nusa Indah No.9'),
(10, 'CV Mega Utama', '0820000000', 'Jl. Flamboyan No.10');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `waktu_transaksi` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `total` int(11) DEFAULT 0,
  `pelanggan_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `waktu_transaksi`, `keterangan`, `total`, `pelanggan_id`) VALUES
(1, '2025-10-01', 'Pembelian Laptop', 7500000, 'P001'),
(2, '2025-10-02', 'Pembelian Mouse', 150000, 'P002'),
(3, '2025-10-03', 'Pembelian Keyboard', 300000, 'P003'),
(4, '2025-10-04', 'Pembelian Monitor', 2000000, 'P004'),
(5, '2025-10-05', 'Pembelian Printer', 1800000, 'P005'),
(6, '2025-10-06', 'Pembelian Flashdisk', 80000, 'P006'),
(7, '2025-10-07', 'Pembelian Headset', 250000, 'P007'),
(8, '2025-10-08', 'Pembelian Router', 400000, 'P008'),
(9, '2025-10-09', 'Pembelian Webcam', 350000, 'P009'),
(10, '2025-10-10', 'Pembelian Speaker', 500000, 'P010');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `transaksi_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `harga` int(11) DEFAULT 0,
  `qty` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`transaksi_id`, `barang_id`, `harga`, `qty`) VALUES
(1, 1, 7500000, 1),
(2, 2, 150000, 1),
(3, 3, 300000, 1),
(4, 4, 2000000, 1),
(5, 5, 1800000, 1),
(6, 6, 80000, 2),
(7, 7, 250000, 1),
(8, 8, 400000, 1),
(9, 9, 350000, 1),
(10, 10, 500000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` tinyint(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `level` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `hp`, `level`) VALUES
(1, 'admin', 'admin123', 'Administrator', 'Jl. Sistem No.1', '0811000001', 1),
(2, 'kasir1', 'kasir123', 'Kasir Satu', 'Jl. Kasir No.2', '0811000002', 2),
(3, 'kasir2', 'kasir234', 'Kasir Dua', 'Jl. Kasir No.3', '0811000003', 2),
(4, 'gudang1', 'gudang123', 'Petugas Gudang', 'Jl. Gudang No.4', '0811000004', 3),
(5, 'manager', 'manager123', 'Manajer Toko', 'Jl. Utama No.5', '0811000005', 1),
(6, 'owner', 'owner123', 'Pemilik Toko', 'Jl. Besar No.6', '0811000006', 1),
(7, 'kasir3', 'kasir345', 'Kasir Tiga', 'Jl. Kasir No.7', '0811000007', 2),
(8, 'kasir4', 'kasir456', 'Kasir Empat', 'Jl. Kasir No.8', '0811000008', 2),
(9, 'staff1', 'staff123', 'Staff Umum', 'Jl. Melati No.9', '0811000009', 3),
(10, 'staff2', 'staff234', 'Staff Operasional', 'Jl. Anggrek No.10', '0811000010', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_supplier_id` (`supplier_id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_pemb_trx` (`transaksi_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_pelanggan_id` (`pelanggan_id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`transaksi_id`,`barang_id`),
  ADD KEY `idx_td_barang` (`barang_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_barang_supplier` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pembayaran_transaksi` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_pelanggan` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `fk_td_barang` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_td_transaksi` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
