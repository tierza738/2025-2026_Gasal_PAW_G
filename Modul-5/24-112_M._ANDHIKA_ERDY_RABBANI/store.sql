-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Okt 2025 pada 17.23
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

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
-- Struktur dari tabel `barang`
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
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `harga`, `stok`, `supplier_id`) VALUES
(1, 'BRG001', 'Sabun Mandi', 5000, 100, 1),
(2, 'BRG002', 'Shampoo', 15000, 50, 1),
(3, 'BRG003', 'Pasta Gigi', 8000, 60, 2),
(4, 'BRG004', 'Minyak Goreng', 20000, 40, 3),
(5, 'BRG005', 'Gula Pasir', 18000, 70, 4),
(6, 'BRG006', 'Kopi Sachet', 2000, 200, 5),
(7, 'BRG007', 'Teh Celup', 3000, 150, 6),
(8, 'BRG008', 'Susu Kental', 12000, 80, 7),
(9, 'BRG009', 'Rokok', 25000, 100, 8),
(10, 'BRG010', 'Sabun Cuci', 7000, 90, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `jenis_kelamin`, `telp`, `alamat`) VALUES
(1, 'Budi', 'L', '081234567890', 'Jakarta'),
(2, 'Siti', 'P', '081234567891', 'Bandung'),
(3, 'Andi', 'L', '081234567892', 'Surabaya'),
(4, 'Ayu', 'P', '081234567893', 'Depok'),
(5, 'Rizky', 'L', '081234567894', 'Medan'),
(6, 'Lina', 'P', '081234567895', 'Yogyakarta'),
(7, 'Fajar', 'L', '081234567896', 'Bekasi'),
(8, 'Tina', 'P', '081234567897', 'Solo'),
(9, 'Dewi', 'P', '081234567898', 'Tangerang'),
(10, 'Eko', 'L', '081234567899', 'Bali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `waktu_bayar` datetime DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `metode` enum('TUNAI','TRANSFER','EDC') DEFAULT NULL,
  `transaksi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `waktu_bayar`, `total`, `metode`, `transaksi_id`) VALUES
(1, '2025-10-01 10:00:00', 40000, 'TUNAI', 1),
(2, '2025-10-02 12:00:00', 20000, 'TRANSFER', 2),
(3, '2025-10-03 09:30:00', 25000, 'EDC', 3),
(4, '2025-10-04 11:00:00', 50000, 'TUNAI', 4),
(5, '2025-10-05 15:00:00', 35000, 'TRANSFER', 5),
(6, '2025-10-06 08:00:00', 15000, 'EDC', 6),
(7, '2025-10-07 09:15:00', 20000, 'TUNAI', 7),
(8, '2025-10-08 17:45:00', 60000, 'TRANSFER', 8),
(9, '2025-10-09 14:00:00', 18000, 'TUNAI', 9),
(10, '2025-10-10 13:20:00', 22000, 'EDC', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `telp`, `alamat`) VALUES
(1, 'PT Sumber Makmur', '0211234567', 'Jakarta'),
(2, 'CV Berkah Abadi', '0212345678', 'Bandung'),
(3, 'PT Cahaya Utama', '0213456789', 'Surabaya'),
(4, 'CV Maju Jaya', '0214567890', 'Medan'),
(5, 'PT Mega Sentosa', '0215678901', 'Depok'),
(6, 'CV Tunas Baru', '0216789012', 'Solo'),
(7, 'PT Karya Mandiri', '0217890123', 'Yogyakarta'),
(8, 'CV Sentosa', '0218901234', 'Bekasi'),
(9, 'PT Indo Jaya', '0219012345', 'Tangerang'),
(10, 'CV Artha Makmur', '0210123456', 'Bali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `waktu_transaksi` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `pelanggan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `waktu_transaksi`, `keterangan`, `total`, `pelanggan_id`) VALUES
(1, '2025-10-01', 'Belanja kebutuhan rumah', 40000, 1),
(2, '2025-10-02', 'Belanja harian', 20000, 2),
(3, '2025-10-03', 'Pembelian bahan dapur', 25000, 3),
(4, '2025-10-04', 'Belanja bulanan', 50000, 4),
(5, '2025-10-05', 'Pembelian produk kebersihan', 35000, 5),
(6, '2025-10-06', 'Pembelian makanan ringan', 15000, 6),
(7, '2025-10-07', 'Pembelian minuman', 20000, 7),
(8, '2025-10-08', 'Pembelian bahan pokok', 60000, 8),
(9, '2025-10-09', 'Belanja harian', 18000, 9),
(10, '2025-10-10', 'Pembelian kebutuhan mandi', 22000, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `transaksi_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`transaksi_id`, `barang_id`, `harga`, `qty`) VALUES
(1, 1, 5000, 2),
(1, 2, 15000, 1),
(2, 3, 8000, 2),
(2, 4, 20000, 1),
(3, 5, 18000, 1),
(3, 6, 2000, 3),
(4, 7, 3000, 5),
(4, 8, 12000, 1),
(5, 9, 25000, 1),
(5, 10, 7000, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` tinyint(4) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `level` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `hp`, `level`) VALUES
(1, 'admin', 'admin123', 'Administrator', 'Jakarta', '0811111111', 1),
(2, 'kasir1', 'kasir123', 'Kasir A', 'Bandung', '0822222222', 2),
(3, 'kasir2', 'kasir456', 'Kasir B', 'Surabaya', '0833333333', 2),
(4, 'gudang1', 'gudang123', 'Petugas Gudang', 'Depok', '0844444444', 3),
(5, 'gudang2', 'gudang456', 'Staff Gudang', 'Medan', '0855555555', 3),
(6, 'owner', 'owner123', 'Pemilik Toko', 'Yogyakarta', '0866666666', 1),
(7, 'manager', 'manager123', 'Manager', 'Solo', '0877777777', 1),
(8, 'kasir3', 'kasir789', 'Kasir C', 'Bekasi', '0888888888', 2),
(9, 'kasir4', 'kasir321', 'Kasir D', 'Bali', '0899999999', 2),
(10, 'admin2', 'admin456', 'Administrator 2', 'Tangerang', '0800000000', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`);

--
-- Indeks untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`transaksi_id`,`barang_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`),
  ADD CONSTRAINT `transaksi_detail_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
