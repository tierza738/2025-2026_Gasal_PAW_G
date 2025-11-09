-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2025 at 01:15 AM
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

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(10) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `harga`, `stok`, `supplier_id`) VALUES
(11, 'BRG001', 'Laptop Lenovo', 7500000, 10, 1),
(12, 'BRG002', 'Mouse Logitech', 150000, 25, 1),
(13, 'BRG003', 'Keyboard Mechanical', 350000, 15, 2),
(14, 'BRG004', 'Monitor Samsung 24 Inch', 1850000, 8, 2),
(15, 'BRG005', 'Flashdisk 64GB', 90000, 30, 3),
(16, 'BRG006', 'Printer Canon', 1200000, 6, 3),
(17, 'BRG007', 'Headset JBL', 250000, 12, 4),
(18, 'BRG008', 'Webcam Logitech', 375000, 9, 4),
(19, 'BRG009', 'Harddisk External 1TB', 850000, 7, 5),
(20, 'BRG010', 'Speaker Bluetooth', 320000, 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `jenis_kelamin`, `telp`, `alamat`) VALUES
(1, 'Andi Setiawan', 'L', '081234567890', 'Jl. Merdeka No.10'),
(2, 'Siti Aminah', 'P', '081345678901', 'Jl. Pahlawan No.7'),
(3, 'Budi Hartono', 'L', '082112223333', 'Jl. Mawar No.5'),
(4, 'Rina Kurnia', 'P', '081299988877', 'Jl. Melati No.8'),
(5, 'Tono Prasetyo', 'L', '085211112222', 'Jl. Diponegoro No.3'),
(6, 'Dewi Lestari', 'P', '081377766655', 'Jl. Anggrek No.12'),
(7, 'Rudi Santoso', 'L', '082144556677', 'Jl. Cempaka No.4'),
(8, 'Fitri Handayani', 'P', '081233344455', 'Jl. Kenanga No.9'),
(9, 'Ahmad Fauzi', 'L', '082199988877', 'Jl. Hasanuddin No.11'),
(10, 'Nurul Aisyah', 'P', '085212121212', 'Jl. Sudirman No.6');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `waktu_bayar` datetime DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `metode` enum('TUNAI','TRANSFER','EDC') DEFAULT NULL,
  `transaksi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `waktu_bayar`, `total`, `metode`, `transaksi_id`) VALUES
(11, '2025-10-01 00:00:00', 250000, 'TUNAI', 1),
(12, '2025-10-01 00:00:00', 125000, 'TRANSFER', 2),
(13, '2025-10-02 00:00:00', 98000, 'TRANSFER', 3),
(14, '2025-10-03 00:00:00', 310000, 'TUNAI', 4),
(15, '2025-10-03 00:00:00', 150000, 'TRANSFER', 5),
(16, '2025-10-04 00:00:00', 420000, 'TUNAI', 6),
(17, '2025-10-05 00:00:00', 275000, 'TRANSFER', 7),
(18, '2025-10-06 00:00:00', 120000, 'TUNAI', 8),
(19, '2025-10-07 00:00:00', 60000, 'TRANSFER', 9),
(20, '2025-10-07 00:00:00', 480000, 'TUNAI', 10);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `telp`, `alamat`) VALUES
(1, 'PT Sumber Makmur', '0211234567', 'Jl. Merdeka No.10, Jakarta'),
(2, 'CV Maju Jaya', '0227654321', 'Jl. Pahlawan No.5, Bandung'),
(3, 'PT Tech Nusantara', '0319988776', 'Jl. Diponegoro No.8, Surabaya'),
(4, 'CV Elektronik Indo', '0274123456', 'Jl. Malioboro No.3, Yogyakarta'),
(5, 'PT Global Sentosa', '0618877665', 'Jl. Gatot Subroto No.11, Medan'),
(6, 'CV Sinar Terang', '0247788990', 'Jl. Pandanaran No.4, Semarang'),
(7, 'PT Mitra Abadi', '0341888777', 'Jl. Soekarno Hatta No.9, Malang'),
(8, 'CV Indo Supplies', '0361122334', 'Jl. Raya Kuta No.7, Bali'),
(9, 'PT Mega Elektrik', '0351554433', 'Jl. Rajawali No.6, Banyuwangi'),
(10, 'CV Prima Jaya', '0251987654', 'Jl. Ahmad Yani No.2, Bogor');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `waktu_transaksi` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `pelanggan_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `waktu_transaksi`, `keterangan`, `total`, `pelanggan_id`) VALUES
(1, '2025-10-01', 'Pembelian barang elektronik', 2500000, 1),
(2, '2025-10-02', 'Pembelian alat tulis', 75000, 2),
(3, '2025-10-03', 'Pembelian pakaian', 350000, 3),
(4, '2025-10-04', 'Pembelian sembako', 180000, 4),
(5, '2025-10-05', 'Pembelian perlengkapan rumah', 560000, 5),
(6, '2025-10-06', 'Pembelian makanan ringan', 120000, 6),
(7, '2025-10-07', 'Pembelian alat dapur', 275000, 7),
(8, '2025-10-08', 'Pembelian buku', 95000, 8),
(9, '2025-10-09', 'Pembelian kosmetik', 210000, 9),
(10, '2025-10-10', 'Pembelian perlengkapan bayi', 420000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `transaksi_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`transaksi_id`, `barang_id`, `harga`, `qty`) VALUES
(1, 11, 2500000, 1),
(2, 12, 15000, 5),
(3, 13, 175000, 2),
(4, 14, 45000, 4),
(5, 15, 280000, 2),
(6, 16, 30000, 4),
(7, 17, 55000, 5),
(8, 18, 95000, 1),
(9, 19, 105000, 2),
(10, 20, 210000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` tinyint(2) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `hp`, `level`) VALUES
(1, 'admin', 'admin123', 'Administrator', 'Jl. Merdeka No.1, Jakarta', '081234567890', 0),
(2, 'kasir1', 'kasir123', 'Budi Santoso', 'Jl. Sudirman No.5, Bandung', '081298765432', 0),
(3, 'kasir2', 'kasir123', 'Siti Aminah', 'Jl. Diponegoro No.3, Surabaya', '081377788899', 0),
(4, 'owner1', 'owner123', 'Rudi Hartono', 'Jl. Pahlawan No.8, Yogyakarta', '081355577799', 0),
(5, 'staff1', 'staff123', 'Dewi Lestari', 'Jl. Ahmad Yani No.10, Medan', '081388899900', 0),
(6, 'staff2', 'staff123', 'Agus Pratama', 'Jl. Gatot Subroto No.4, Semarang', '081399988877', 0),
(7, 'admin2', 'admin456', 'Rina Marlina', 'Jl. Soekarno Hatta No.6, Malang', '081266655544', 0),
(8, 'kasir3', 'kasir321', 'Joko Widodo', 'Jl. Raya Bali No.12, Denpasar', '081233344455', 0),
(9, 'owner2', 'owner456', 'Tini Rahmawati', 'Jl. Rajawali No.7, Banyuwangi', '081211122233', 0),
(10, 'staff3', 'staff456', 'Wawan Kurniawan', 'Jl. Ahmad Yani No.9, Bogor', '081255566677', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`);

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
  ADD KEY `transaksi_id` (`transaksi_id`);

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
  ADD KEY `pelanggan_id` (`pelanggan_id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`transaksi_id`,`barang_id`),
  ADD KEY `barang_id` (`barang_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`);

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`),
  ADD CONSTRAINT `transaksi_detail_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
