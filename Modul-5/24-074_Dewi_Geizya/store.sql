-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2025 at 06:54 AM
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
(1, 'PAW11', 'Jeruk', 15000, 10, 1),
(2, 'PAW22', 'Apel', 23000, 100, 2),
(3, 'PAW33', 'Mangga', 10000, 30, 3),
(4, 'PAW44', 'Rambutan', 20000, 15, 4),
(5, 'PAW55', 'Anggur merah', 18000, 150, 5),
(6, 'PAW66', 'Anggur hijau', 18000, 200, 6),
(7, 'PAW77', 'Avocado', 21000, 80, 7),
(8, 'PAW88', 'Semangka', 30000, 25, 8),
(9, 'PAW99', 'Pisang', 22000, 40, 9),
(10, 'PAW100', 'Nanas', 8000, 12, 10);

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
('AB007', 'Bintang', 'L', '08128899001', 'Jl. Kamal No.7'),
('AB008', 'Cika', 'P', '08129900112', 'Jl. Jambu No.8'),
('AC009', 'Ica', 'P', '08120011223', 'Jl. Rambutan No.9'),
('AC010', 'Sinta', 'P', '08100122334', 'Jl. Telang No.10'),
('CK001', 'Ela', 'P', '08126666889', 'Jl. Cempaka No.5'),
('CK006', 'Nabila', 'P', '08127711990', 'Jl. Sukun No.6'),
('CL300', 'tiara', 'P', '08111455667', 'Jl. Anggrek No.3'),
('CL400', 'Ira', 'P', '08125566998', 'Jl. Jambu No.4'),
('KL100', 'DEWI', 'P', '08122334455', 'Jl. Salak No.1'),
('KL200', 'Geizya', 'P', '08123399556', 'Jl. Jeruk No.2');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `waktu_bayar` datetime DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `metode` enum('tunai','transfer','EDC') DEFAULT NULL,
  `transaksi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `waktu_bayar`, `total`, `metode`, `transaksi_id`) VALUES
(1, '2025-10-10 06:30:00', 85000, 'transfer', 1),
(2, '2025-10-12 07:00:00', 40000, 'transfer', 2),
(3, '2025-10-13 11:45:00', 2000, 'tunai', 3),
(4, '2025-10-04 19:20:00', 18000, 'EDC', 4),
(5, '2025-10-25 15:10:00', 90000, 'tunai', 5),
(6, '2025-10-26 13:15:00', 350000, 'transfer', 6),
(7, '2025-10-27 16:00:00', 50000, 'tunai', 7),
(8, '2025-10-28 12:25:00', 75000, 'transfer', 8),
(9, '2025-10-29 10:10:00', 45000, 'EDC', 9),
(10, '2025-10-30 17:30:00', 1000000, 'tunai', 10),
(11, '2025-10-10 06:30:00', 85000, 'transfer', 1),
(12, '2025-10-12 07:00:00', 40000, 'transfer', 2),
(13, '2025-10-13 11:45:00', 2000, 'tunai', 3),
(14, '2025-10-04 19:20:00', 18000, 'EDC', 4),
(15, '2025-10-25 15:10:00', 90000, 'tunai', 5),
(16, '2025-10-26 13:15:00', 350000, 'transfer', 6),
(17, '2025-10-27 16:00:00', 50000, 'tunai', 7),
(18, '2025-10-28 12:25:00', 75000, 'transfer', 8),
(19, '2025-10-29 10:10:00', 45000, 'EDC', 9),
(20, '2025-10-30 17:30:00', 1000000, 'tunai', 10);

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
(1, 'Nusa indah', '08123456789', 'Jl. Raya kamboja No.1'),
(2, 'Jaya abadi', '08129876543', 'Jl. Kenangan No.2'),
(3, 'PT jaya', '08214567890', 'Jl. Mawar No.3'),
(4, 'CV Cahaya Biru', '08136784521', 'Jl. tulip No.4'),
(5, 'PT Abadi', '08126784532', 'Jl. Anggrek No.5'),
(6, 'Bintang sagara', '08139876543', 'Jl. melati No.6'),
(7, 'PT ksometik', '08124567891', 'Jl. sukun No.7'),
(8, 'CV lenggana', '08125678943', 'Jl. rambutan No.8'),
(9, 'Abadi Jaya', '08134567812', 'Jl. salak No.9'),
(10, 'CV Mitra Abadi', '08123456721', 'Jl. jambu No.10');

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
(1, '2025-10-01', NULL, 85000, 'AB007'),
(2, '2025-10-02', 'Total pensil', 40000, 'AB008'),
(3, '2025-10-03', 'Total pen', 20000, 'AC009'),
(4, '2025-10-04', 'Total penggaris', 18000, 'AC010'),
(5, '2025-10-05', 'Total buku gambar', 9000, 'CK001'),
(6, '2025-10-06', 'Total spidol', 7000, 'CK006'),
(7, '2025-10-07', 'Total tas', 200000, 'CL300'),
(8, '2025-10-08', 'Total mainan', 100000, 'CL400'),
(9, '2025-10-09', 'Total penghapus', 10000, 'KL100'),
(10, '2025-10-10', 'Total barang lain', 500000, 'KL200');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) DEFAULT NULL,
  `barang_id` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id`, `transaksi_id`, `barang_id`, `harga`, `qty`) VALUES
(1, 1, 1, 15000, 100),
(2, 2, 2, 23000, 190),
(3, 3, 3, 10000, 10),
(4, 4, 4, 20000, 90),
(5, 5, 5, 18000, 80),
(6, 6, 6, 18000, 20),
(7, 7, 7, 21000, 10),
(8, 8, 8, 30000, 20),
(9, 9, 9, 22000, 10),
(10, 10, 10, 8000, 10);

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
  `LEVEL` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `hp`, `LEVEL`) VALUES
(1, 'admin1', '12345', 'dewi', 'jl.sukun no1', '08122334455', 1),
(2, 'admin2', '12345', 'geizya', 'jl.sukun no1', '08123344556', 2),
(3, 'kasir1', '12345', 'lini', 'jl.sukun no1', '08124455667', 3),
(4, 'kasir2', '12345', 'Cica', 'jl.sukun no1', '08125996778', 4),
(5, 'kasir3', '12345', 'Dika', 'jl.sukun no1', '08126677889', 5),
(6, 'pelayan1', '12345', 'Eko', 'jl.sukun no1', '08127788990', 6),
(7, 'pelayan2', '12345', 'Fika', 'jl.sukun no1', '08128800001', 7),
(8, 'staff3', '12345', 'Gali', 'jl.sukun no1', '08129900112', 8),
(9, 'staff4', '12345', 'Haruna', 'jl.sukun no1', '08120761223', 9),
(10, 'kasir5', '12345', 'Ika', 'jl.sukun no1', '08021122334', 10);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_id` (`barang_id`);

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
  ADD CONSTRAINT `pelanggan_id` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`);

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
