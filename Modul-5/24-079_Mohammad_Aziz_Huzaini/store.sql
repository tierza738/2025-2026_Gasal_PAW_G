-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2025 at 09:41 AM
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
(1, 'BRG001', 'Kursi Kayu', 250000, 50, 1),
(2, 'BRG002', 'Meja Belajar', 500000, 30, 2),
(3, 'BRG003', 'Lemari Pakaian', 750000, 20, 3),
(4, 'BRG004', 'Kasur Busa', 900000, 25, 4),
(5, 'BRG005', 'Rak Buku', 350000, 40, 5),
(6, 'BRG006', 'Sofa Ruang Tamu', 1500000, 10, 6),
(7, 'BRG007', 'Lampu Hias', 120000, 80, 7),
(8, 'BRG008', 'Kipas Angin', 180000, 60, 8),
(9, 'BRG009', 'TV LED 32 Inch', 2300000, 15, 9),
(10, 'BRG010', 'Kulkas 2 Pintu', 3500000, 8, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `jenis_kelamin`, `telp`, `alamat`) VALUES
(1, 'Ahmad', 'L', '08123456789', 'Jakarta'),
(2, 'Budi', 'L', '08134567890', 'Bandung'),
(3, 'Citra', 'P', '08125678901', 'Surabaya'),
(4, 'Dewi', 'P', '08136789012', 'Semarang'),
(5, 'Eko', 'L', '08147890123', 'Malang'),
(6, 'Fitri', 'P', '08158901234', 'Denpasar'),
(7, 'Gilang', 'L', '08169012345', 'Makassar'),
(8, 'Hana', 'P', '08170123456', 'Medan'),
(9, 'Imam', 'L', '08181234567', 'Padang'),
(10, 'Joko', 'L', '08192345678', 'Pontianak');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `waktu_bayar` datetime DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `metode` enum('Tunai','Transfer','EDC') DEFAULT NULL,
  `transaksi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `waktu_bayar`, `total`, `metode`, `transaksi_id`) VALUES
(1, '2025-10-25 10:05:00', 2500000, 'Tunai', 1),
(2, '2025-10-25 11:05:00', 5800000, 'Transfer', 2),
(3, '2025-10-25 12:05:00', 1200000, 'Tunai', 3),
(4, '2025-10-25 13:05:00', 750000, 'EDC', 4),
(5, '2025-10-25 14:05:00', 1100000, 'Tunai', 5),
(6, '2025-10-25 15:05:00', 300000, 'Transfer', 6),
(7, '2025-10-25 16:05:00', 1500000, 'EDC', 7),
(8, '2025-10-25 17:05:00', 4500000, 'Transfer', 8),
(9, '2025-10-25 18:05:00', 2000000, 'Tunai', 9),
(10, '2025-10-25 19:05:00', 900000, 'EDC', 10);

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
(1, 'PT Sumber tidur', '021789457', 'Surabaya 10'),
(2, 'CV Berkah Abadi', '022123456', 'Bandung'),
(3, 'UD Tani Jaya', '031987654', 'Surabaya'),
(4, 'PT Maju Terus', '036178945', 'Denpasar'),
(5, 'CV Sentosa', '041178945', 'Makassar'),
(6, 'PT Amanah', '061789123', 'Medan'),
(7, 'CV Mandiri', '075178923', 'Padang'),
(8, 'PT Jaya Bersama', '056178954', 'Pontianak'),
(9, 'UD Mega Jaya', '071789123', 'Palembang'),
(10, 'PT Makmur Jaya', '024789654', 'Semarang');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `waktu_transaksi` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `pelanggan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `waktu_transaksi`, `keterangan`, `total`, `pelanggan_id`) VALUES
(1, '2025-10-25', 'Pembelian furnitur ruang tamu', 2500000, 1),
(2, '2025-10-25', 'Pembelian elektronik rumah', 5800000, 2),
(3, '2025-10-25', 'Pembelian perlengkapan dapur', 1200000, 3),
(4, '2025-10-25', 'Pembelian kursi & meja', 750000, 4),
(5, '2025-10-25', 'Pembelian lemari & rak', 1100000, 5),
(6, '2025-10-25', 'Pembelian lampu dan kipas', 300000, 6),
(7, '2025-10-25', 'Pembelian sofa', 1500000, 7),
(8, '2025-10-25', 'Pembelian elektronik', 4500000, 8),
(9, '2025-10-25', 'Pembelian barang campuran', 2000000, 9),
(10, '2025-10-25', 'Pembelian lemari besar', 900000, 10);

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
(1, 1, 250000, 2),
(1, 2, 500000, 1),
(2, 9, 2300000, 2),
(3, 5, 350000, 3),
(4, 1, 250000, 1),
(4, 2, 500000, 1),
(5, 3, 750000, 1),
(5, 5, 350000, 1),
(6, 7, 120000, 2),
(6, 8, 180000, 1),
(7, 6, 1500000, 1),
(8, 9, 2300000, 1),
(8, 10, 3500000, 1),
(9, 4, 900000, 1),
(9, 5, 350000, 2),
(10, 3, 750000, 1);

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
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Administrator', 'Kantor Pusat', '081234567890', 0),
(2, 'kasir1', 'de28f8f7998f23ab4194b51a6029416f', 'Kasir Utama', 'Jakarta', '081223344556', 0),
(3, 'kasir2', '312a32e0fe0075cd06df2319df41cf49', 'Kasir Cabang', 'Bandung', '081334455667', 0),
(4, 'manager', '0795151defba7a4b5dfa89170de46277', 'Manajer Toko', 'Surabaya', '081445566778', 0),
(5, 'staff1', 'de9bf5643eabf80f4a56fda3bbb84483', 'Staff Gudang', 'Semarang', '081556677889', 0),
(6, 'staff2', '3b615550a12aafc90faeedf650fa03c9', 'Staff Pengiriman', 'Makassar', '081667788990', 0),
(7, 'support1', '5882c44da74f923baabe8476c6e8af37', 'Support', 'Medan', '081778899001', 0),
(8, 'itadmin', '0b1dd5fabd221ef63c58c026bce4cf6b', 'IT Admin', 'Denpasar', '081889900112', 0),
(9, 'auditor', 'd33542b8458db8cabd9843fe7c1e8784', 'Auditor Internal', 'Yogyakarta', '081990011223', 0),
(10, 'owner', '5be057accb25758101fa5eadbbd79503', 'Pemilik Usaha', 'Jakarta', '082001122334', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
