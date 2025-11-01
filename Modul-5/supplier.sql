-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2025 at 03:44 PM
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
(1, 'PT. Sumber Makmur', '08123456789', 'Jl. Raya Darmo 12, Surabaya'),
(2, 'CV. Jaya Abadi', '08111122233', 'Jl. Panglima Sudirman 5, Jakarta'),
(3, 'UD. Barokah', '0315556677', 'Jl. Basuki Rahmat 101, Malang'),
(4, 'PT. Tekno Indah', '0214445566', 'Kawasan Industri Pulo Gadung, Jakarta'),
(5, 'CV. Sinar Dunia', '08778899001', 'Jl. Embong Malang 33, Surabaya'),
(6, 'PT. Grosir ATK', '08561122334', 'Pasar Pagi Mangga Dua, Jakarta'),
(7, 'UD. Tinta Jaya', '0317778899', 'Ruko Klampis Jaya, Surabaya'),
(8, 'PT. Kertas Abadi', '0226655443', 'Jl. Kopo 200, Bandung'),
(9, 'CV. Logistik Cepat', '08199988776', 'Pergudangan Margomulyo, Surabaya'),
(10, 'PT. Indo Digital', '08991234567', 'Hi-Tech Mall, Surabaya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
