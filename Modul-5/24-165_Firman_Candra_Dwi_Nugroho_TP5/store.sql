-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2025 at 05:30 PM
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
  `kode_barang` varchar(30) NOT NULL,
  `nama_barang` varchar(150) NOT NULL,
  `harga` decimal(12,2) NOT NULL DEFAULT 0.00,
  `stok` int(11) NOT NULL DEFAULT 0,
  `supplier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `harga`, `stok`, `supplier_id`) VALUES
(1, 'BRG-001', 'Kopi Arabica 250gr', 55000.00, 50, NULL),
(2, 'BRG-002', 'Gelas Kaca 300ml', 12000.00, 200, NULL),
(3, 'BRG-003', 'Mesin Kopi Portable', 750000.00, 10, 3),
(4, 'BRG-004', 'Gula Pasir 1kg', 15000.00, 100, 4),
(5, 'BRG-005', 'Cangkir Keramik', 25000.00, 80, 5),
(6, 'BRG-006', 'Susu UHT 1L', 18000.00, 60, 6),
(7, 'BRG-007', 'Sirup Vanilla 500ml', 40000.00, 40, 7),
(8, 'BRG-008', 'Sedotan Stainless', 6000.00, 300, 8),
(9, 'BRG-009', 'Paket Kopi Specialty', 125000.00, 25, 9),
(10, 'BRG-010', 'Tisu Dapur Pack', 9000.00, 150, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `telp` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `jenis_kelamin`, `telp`, `alamat`) VALUES
(1, 'Andi Santoso', 'L', '0811111001', 'Jl. Merdeka 1'),
(2, 'Budi Hartono', 'L', '0811111002', 'Jl. Kemerdekaan 2'),
(3, 'Cici Amelia', 'P', '0811111003', 'Jl. Sudirman 10'),
(4, 'Dewi Lestari', 'P', '0811111004', 'Jl. Gatot Subroto 5'),
(5, 'Eko Prasetyo', 'L', '0811111005', 'Jl. Thamrin 9'),
(6, 'Farah Nur', 'P', '0811111006', 'Jl. Diponegoro 3'),
(7, 'Gilang Ramadhan', 'L', '0811111007', 'Jl. Pahlawan 7'),
(8, 'Hana Wijaya', 'P', '0811111008', 'Jl. Sisingamangaraja 11'),
(9, 'Irfan Maulana', 'L', '0811111009', 'Jl. Veteran 21'),
(10, 'Joko Susilo', 'L', '0811111010', 'Jl. Ahmad Yani 13');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `waktu_bayar` datetime NOT NULL DEFAULT current_timestamp(),
  `total` decimal(12,2) NOT NULL DEFAULT 0.00,
  `metode` varchar(50) DEFAULT NULL,
  `transaksi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `waktu_bayar`, `total`, `metode`, `transaksi_id`) VALUES
(1, '2025-10-01 09:11:00', 22000.00, 'Tunai', 1),
(2, '2025-10-01 10:31:00', 150000.00, 'Transfer', 2),
(3, '2025-10-02 11:01:00', 35000.00, 'EDC', 3),
(4, '2025-10-02 12:16:00', 90000.00, 'Tunai', 4),
(5, '2025-10-03 08:51:00', 45000.00, 'Tunai', 5),
(6, '2025-10-03 14:21:00', 180000.00, 'Transfer', 6),
(7, '2025-10-04 16:01:00', 125000.00, 'EDC', 7),
(8, '2025-10-04 18:26:00', 25000.00, 'Tunai', 8),
(9, '2025-10-05 09:06:00', 300000.00, 'Transfer', 9),
(10, '2025-10-05 19:31:00', 90000.00, 'EDC', 10);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telp` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `telp`, `alamat`) VALUES
(3, 'CV. Komponen Sentosa', '08123450003', 'Jalan Mawar No.3'),
(4, 'PT. Sinar Abadi', '08123450004', 'Jalan Kenanga No.4'),
(5, 'CV. Elektrika', '08123450005', 'Jalan Flamboyan No.5'),
(6, 'PT. Prima Sukses', '08123450006', 'Perum Bumi Indah Blok A'),
(7, 'PT. Makmur Jaya', '08123450007', 'Komplek Taman Sari 10'),
(8, 'CV. Mitra Utama', '08123450008', 'Jl. Merpati 22'),
(9, 'PT. Global Tech', '08123450009', 'Jl. Cempaka 45'),
(10, 'CV. Multi Supplier', '08123450010', 'Jl. Dahlia 11');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `waktu_transaksi` datetime NOT NULL DEFAULT current_timestamp(),
  `keterangan` text DEFAULT NULL,
  `total` decimal(12,2) NOT NULL DEFAULT 0.00,
  `pelanggan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `waktu_transaksi`, `keterangan`, `total`, `pelanggan_id`) VALUES
(1, '2025-10-01 09:10:00', 'Beli kopi hitam', 22000.00, 1),
(2, '2025-10-01 10:30:00', 'Beli paket kopi + cangkir', 150000.00, 2),
(3, '2025-10-02 11:00:00', 'Takeaway', 35000.00, 3),
(4, '2025-10-02 12:15:00', 'Beli 3 item', 90000.00, 4),
(5, '2025-10-03 08:50:00', 'Meeting morning', 45000.00, 5),
(6, '2025-10-03 14:20:00', 'Pembelian stok kecil', 180000.00, 6),
(7, '2025-10-04 16:00:00', 'Pembelian hadiah', 125000.00, 7),
(8, '2025-10-04 18:25:00', 'Beli cangkir', 25000.00, 8),
(9, '2025-10-05 09:05:00', 'Order besar', 300000.00, 9),
(10, '2025-10-05 19:30:00', 'Pesanan malam', 90000.00, 10);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `transaksi_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `harga` decimal(12,2) NOT NULL DEFAULT 0.00,
  `qty` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`transaksi_id`, `barang_id`, `harga`, `qty`) VALUES
(1, 1, 22000.00, 1),
(2, 5, 25000.00, 1),
(2, 9, 125000.00, 1),
(3, 1, 22000.00, 1),
(4, 3, 750000.00, 0),
(4, 4, 15000.00, 2),
(5, 6, 18000.00, 2),
(6, 2, 12000.00, 10),
(7, 9, 125000.00, 1),
(8, 5, 25000.00, 1),
(9, 1, 125000.00, 1),
(9, 3, 750000.00, 0),
(10, 5, 25000.00, 2),
(10, 8, 6000.00, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `hp` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `level` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `hp`, `alamat`, `level`) VALUES
(1, 'admin', 'admin123', 'Administrator', '0812222001', 'Kantor Pusat', 'admin'),
(2, 'kasir1', 'kasir123', 'Kasir Satu', '0812222002', 'Kafe Cabang 1', 'kasir'),
(3, 'kasir2', 'kasir234', 'Kasir Dua', '0812222003', 'Kafe Cabang 2', 'kasir'),
(4, 'owner', 'owner123', 'Pemilik', '0812222004', 'Rumah Owner', 'owner'),
(5, 'staff1', 'staff123', 'Staff 1', '0812222005', 'Gudang', 'staff'),
(6, 'staff2', 'staff234', 'Staff 2', '0812222006', 'Gudang', 'staff'),
(7, 'manager', 'mgr123', 'Manager', '0812222007', 'Kantor', 'manager'),
(8, 'admin2', 'admin234', 'Admin 2', '0812222008', 'Kantor Cabang', 'admin'),
(9, 'cashier3', 'kasir345', 'Kasir Tiga', '0812222009', 'Kafe Cabang 3', 'kasir'),
(10, 'helper', 'help123', 'Helper', '0812222010', 'Back Office', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_barang_supplier` (`supplier_id`);

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
  ADD KEY `fk_pembayaran_transaksi` (`transaksi_id`);

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
  ADD KEY `fk_transaksi_pelanggan` (`pelanggan_id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`transaksi_id`,`barang_id`),
  ADD KEY `fk_td_barang` (`barang_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
