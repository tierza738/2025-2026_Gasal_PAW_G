-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2025 at 01:34 PM
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
(1, 'BRG001', 'Laptop ASUS TUF', 15000000, 50, 6),
(2, 'BRG002', 'Mouse Logitech G-Pro', 800000, 150, 6),
(3, 'BRG003', 'Indomie Goreng', 3000, 10000, 4),
(4, 'BRG004', 'Kecap Bango 600ml', 20000, 500, 1),
(5, 'BRG005', 'Beras Sania 5kg', 65000, 300, 1),
(6, 'BRG006', 'Monitor Samsung 24\"', 2500000, 75, 6),
(7, 'BRG007', 'Kopi Kapal Api 165g', 15000, 1000, 8),
(8, 'BRG008', 'Gula Gulaku 1kg', 14000, 2000, 1),
(9, 'BRG009', 'Keyboard Rexus', 350000, 120, 2),
(10, 'BRG010', 'Headset HyperX', 1200000, 60, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `jenis_kelamin`, `telp`, `alamat`) VALUES
('CUS-001', 'Budi Santoso', 'L', '081211112222', 'Jl. Melati No. 1, Jakarta'),
('CUS-002', 'Ani Wijaya', 'P', '081322223333', 'Jl. Mawar No. 2, Surabaya'),
('CUS-003', 'Citra Lestari', 'P', '081433334444', 'Jl. Kenanga No. 3, Bandung'),
('CUS-004', 'Doni Hartono', 'L', '081544445555', 'Jl. Kamboja No. 4, Medan'),
('CUS-005', 'Eka Putri', 'P', '081655556666', 'Jl. Anggrek No. 5, Semarang'),
('CUS-006', 'Fajar Nugroho', 'L', '081766667777', 'Jl. Tulip No. 6, Yogyakarta'),
('CUS-007', 'Gita Permata', 'P', '081877778888', 'Jl. Dahlia No. 7, Makassar'),
('CUS-008', 'Hadi Prasetyo', 'L', '081988889999', 'Jl. Cempaka No. 8, Denpasar'),
('CUS-009', 'Indah Cahyani', 'P', '082199990000', 'Jl. Flamboyan No. 9, Palembang'),
('CUS-010', 'Joko Susilo', 'L', '082200001111', 'Jl. Bougenville No. 10, Padang');

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
(1, '2025-10-01 10:30:00', 15800000, 'TRANSFER', 1),
(2, '2025-10-01 11:15:00', 85000, 'TUNAI', 2),
(3, '2025-10-02 09:00:00', 29000, 'EDC', 3),
(4, '2025-10-03 14:20:00', 1150000, 'TRANSFER', 4),
(5, '2025-10-04 16:05:00', 65000, 'TUNAI', 5),
(6, '2025-10-05 13:00:00', 2500000, 'EDC', 6),
(7, '2025-10-06 10:10:00', 300000, 'TRANSFER', 7),
(8, '2025-10-07 11:45:00', 1200000, 'EDC', 8),
(9, '2025-10-08 15:30:00', 34000, 'TUNAI', 9),
(10, '2025-10-09 17:00:00', 350000, 'TUNAI', 10);

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
(1, 'PT. Sejahtera Abadi', '081234567890', 'Jl. Merdeka No. 1, Jakarta'),
(2, 'CV. Jaya Makmur', '081111222333', 'Jl. Sudirman No. 10, Surabaya'),
(3, 'UD. Sumber Rejeki', '082233445566', 'Jl. Gajah Mada No. 5, Bandung'),
(4, 'PT. Indo Pangan', '083344556677', 'Jl. Diponegoro No. 8, Medan'),
(5, 'CV. Mitra Bersama', '085566778899', 'Jl. Thamrin No. 12, Semarang'),
(6, 'PT. Sentosa Elektronik', '087788990011', 'Jl. Asia Afrika No. 3, Yogyakarta'),
(7, 'UD. Barokah Jaya', '089900112233', 'Jl. Pahlawan No. 7, Makassar'),
(8, 'PT. Cipta Rasa', '081222333444', 'Jl. Gatot Subroto No. 15, Denpasar'),
(9, 'CV. Aneka Jaya', '085234567890', 'Jl. Ahmad Yani No. 20, Palembang'),
(10, 'PT. Berkat Utama', '087811223344', 'Jl. Imam Bonjol No. 2, Padang');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `waktu_transaksi` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `pelanggan_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `waktu_transaksi`, `keterangan`, `total`, `pelanggan_id`) VALUES
(1, '2025-10-01', 'Pembelian laptop + mouse', 15800000, 'CUS-001'),
(2, '2025-10-01', 'Belanja bulanan sembako', 85000, 'CUS-002'),
(3, '2025-10-02', 'Beli kopi dan gula', 29000, 'CUS-003'),
(4, '2025-10-03', 'Peripheral PC', 1150000, 'CUS-004'),
(5, '2025-10-04', 'Beli beras', 65000, 'CUS-005'),
(6, '2025-10-05', 'Pembelian monitor', 2500000, 'CUS-006'),
(7, '2025-10-06', 'Stok indomie 100pcs', 300000, 'CUS-007'),
(8, '2025-10-07', 'Pembelian headset gaming', 1200000, 'CUS-008'),
(9, '2025-10-08', 'Belanja sembako', 34000, 'CUS-009'),
(10, '2025-10-09', 'Beli keyboard baru', 350000, 'CUS-010');

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
(1, 1, 15000000, 1),
(1, 2, 800000, 1),
(2, 4, 20000, 1),
(2, 5, 65000, 1),
(3, 7, 15000, 1),
(3, 8, 14000, 1),
(4, 2, 800000, 1),
(4, 9, 350000, 1),
(5, 5, 65000, 1),
(6, 6, 2500000, 1),
(7, 3, 3000, 100),
(8, 10, 1200000, 1),
(9, 4, 20000, 1),
(9, 8, 14000, 1),
(10, 9, 350000, 1);

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
(1, 'admin', 'md5(pass123)', 'Administrator', 'Jl. Kantor Pusat No. 1', '081100001111', 1),
(2, 'kasir1', 'md5(pass123)', 'Beni Setiawan', 'Jl. Kasir No. 1', '081222223333', 2),
(3, 'kasir2', 'md5(pass123)', 'Cici Paramita', 'Jl. Kasir No. 2', '081333334444', 2),
(4, 'gudang', 'md5(pass123)', 'Dodi Kurniawan', 'Jl. Gudang No. 1', '081444445555', 3),
(5, 'manager', 'md5(pass123)', 'Evi Susanti', 'Jl. Manajer No. 1', '081555556666', 1),
(6, 'supervisor', 'md5(pass123)', 'Fahmi Idris', 'Jl. Supervisor No. 1', '081666667777', 1),
(7, 'kasir3', 'md5(pass123)', 'Gani Abdullah', 'Jl. Kasir No. 3', '081777778888', 2),
(8, 'gudang2', 'md5(pass123)', 'Hana Pertiwi', 'Jl. Gudang No. 2', '081888889999', 3),
(9, 'finance', 'md5(pass123)', 'Ivan Gunadi', 'Jl. Finance No. 1', '081999990000', 4),
(10, 'ceo', 'md5(pass123)', 'Jeni Wijaya', 'Jl. Direksi No. 1', '082111112222', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
