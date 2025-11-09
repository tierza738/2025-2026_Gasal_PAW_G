<?php
include 'koneksi.php';

// Ambil data barang
$sql_barang = "SELECT id, nama_barang FROM barang ORDER BY nama_barang";
$query_barang = mysqli_query($koneksi, $sql_barang);
if (!$query_barang) {
    die("Error query barang: " . mysqli_error($koneksi));
}

// Ambil data transaksi
// PERBAIKAN: Gunakan nama kolom dari database Anda (date_transaksi)
$sql_trans = "SELECT id, CONCAT(id, ' - ', IFNULL(keterangan, '')) AS info 
              FROM transaksi ORDER BY id DESC";
$query_trans = mysqli_query($koneksi, $sql_trans);
if (!$query_trans) {
    die("Error query transaksi: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Detail Transaksi</title>
    <style>
        /* ===================================================
           Global Styles & Typography
           =================================================== */

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #f4f7f6; /* Latar belakang terang (putih gading) */
            margin: 0;
            padding: 20px;
            color: #333; /* Warna teks utama */
            line-height: 1.6;
        }

        h2 {
            color: #2c3e50; /* Biru tua keabuan */
            border-bottom: 2px solid #ecf0f1; /* Garis bawah tipis */
            padding-bottom: 10px;
            margin-top: 0;
        }

        /* ===================================================
           Layout Container
           =================================================== */

        .container {
            max-width: 900px; /* Batas lebar agar tidak terlalu lebar di layar besar */
            margin: 20px auto; /* Tengah secara horizontal, spasi atas/bawah */
            padding: 25px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05); /* Bayangan halus */
        }

        /* ===================================================
           Form Styles
           =================================================== */

        form {
            display: flex;
            flex-direction: column; /* Menumpuk elemen form ke bawah */
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        /* Style konsisten untuk input, textarea, dan select */
        input[type="text"],
        input[type="number"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Penting agar padding tidak merusak width 100% */
            font-size: 16px;
            font-family: inherit; /* Menggunakan font dari body */
        }

        textarea {
            height: 100px;
            resize: vertical; /* Izinkan user mengubah ukuran tinggi */
        }

        /* Tombol Submit Utama */
        button[type="submit"] {
            background-color: #1abc9c; /* Aksen Hijau-Tosca */
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #16a085; /* Warna lebih gelap saat hover */
        }

        /* ===================================================
           Table Styles
           =================================================== */

        table {
            width: 100%;
            border-collapse: collapse; /* Menghilangkan spasi antar sel */
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2; /* Latar header tabel */
            color: #333;
            font-weight: bold;
        }

        /* Zebra striping untuk baris */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1; /* Efek hover pada baris */
        }

        /* ===================================================
           Button & Link Styles
           =================================================== */

        /* Tombol navigasi (seperti di index.php dan tambah_detail.php) */
        .button {
            display: inline-block;
            background-color: #3498db; /* Aksen Biru */
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            margin: 5px 5px 5px 0; /* Spasi antar tombol */
            transition: background-color 0.3s ease;
            font-weight: 500;
        }

        .button:hover {
            background-color: #2980b9; /* Biru lebih gelap saat hover */
        }

        /* Tombol Hapus */
        .button-delete {
            display: inline-block;
            background-color: #e74c3c; /* Aksen Merah (Hapus) */
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            transition: background-color 0.3s ease;
            text-align: center;
        }

        .button-delete:hover {
            background-color: #c0392b; /* Merah lebih gelap saat hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Detail Transaksi</h2>
        <form action="proses_tambah_detail.php" method="POST">
            
            <label for="transaksi_id">ID Transaksi:</label>
            <select id="transaksi_id" name="id_transaksi" required> <option value="">Pilih ID Transaksi</option>
                <?php
                // Loop pertama menggunakan $data
                while ($data = mysqli_fetch_assoc($query_trans)) {
                    echo "<option value='" . $data['id'] . "'>" . $data['info'] . "</option>";
                }
                ?>
            </select>
            
            <label for="barang_id">Pilih Barang:</label>
            <select id="barang_id" name="id_barang" required> <option value="">Pilih Barang</option>
                 <?php

                while ($data_barang = mysqli_fetch_assoc($query_barang)) {
                    echo "<option value='" . $data_barang['id'] . "'>" . $data_barang['nama_barang'] . "</option>";
                }
                ?>
            </select>
            
            <label for="qty">Quantity:</label>
            <input type="number" id="qty" name="qty" min="1" required 
                   placeholder="Masukkan jumlah barang">
            
            <button type="submit">Tambah Detail Transaksi</button>
        </form>
         <br>
        <a href="index.php" class="button">Kembali ke Index</a>
    </div>
</body>
</html>