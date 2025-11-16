<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pengelolaan Master Detail</title>
    <style>
        /* ===================================================
            Global Styles & Typography
            =================================================== */

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 20px;
            color: #333;
            line-height: 1.6;
        }

        h2 {
            color: #2c3e50;
            border-bottom: 2px solid #ecf0f1;
            padding-bottom: 10px;
            margin-top: 0;
        }

        /* ===================================================
            Layout Container
            =================================================== */

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 25px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        /* ===================================================
            Form Styles
            =================================================== */

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

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
            box-sizing: border-box;
            font-size: 16px;
            font-family: inherit;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        button[type="submit"] {
            background-color: #1abc9c;
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
            background-color: #16a085;
        }

        /* ===================================================
            Table Styles
            =================================================== */

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* ===================================================
            Button & Link Styles
            =================================================== */

        .button {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            margin: 5px 5px 5px 0;
            transition: background-color 0.3s ease;
            font-weight: 500;
        }

        .button:hover {
            background-color: #2980b9;
        }

        .button-delete {
            display: inline-block;
            background-color: #e74c3c;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            transition: background-color 0.3s ease;
            text-align: center;
        }

        .button-delete:hover {
            background-color: #c0392b;
        }

        .button-detail {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            transition: background-color 0.3s ease;
            text-align: center;
        }
        .button-detail:hover {
            background-color: #2980b9;
        }
        
        .button-success {
            display: inline-block;
            background-color: #198754;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            margin: 5px 5px 5px 0;
            transition: background-color 0.3s ease;
            font-weight: 500;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .button-success:hover {
            background-color: #157347;
        }

        .header-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .header-bar h2 {
            margin: 0;
            border-bottom: none;
            padding-bottom: 0;
        }
        .header-bar .button-group {
            display: flex;
            gap: 10px;
        }

        .report-header {
            background-color: #0d6efd;
            color: white;
            padding: 15px 20px;
            border-radius: 8px 8px 0 0;
            font-size: 1.25rem;
            font-weight: 500;
        }
        .report-container {
            padding: 0;
        }
        .report-body {
            padding: 20px;
        }
        .filter-form {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .filter-form input[type="date"] {
            width: auto;
            margin-bottom: 0;
        }
        .filter-form .button-success {
            margin: 0;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Navigasi</h2>
        <a href="tambah_transaksi.php" class="button">Tambah Transaksi (Master)</a>
        <a href="tambah_detail.php" class="button">Tambah Transaksi Detail</a>
    </div>

    <div class="container">
        <h2>Tabel Barang</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Action</th>
            </tr>
            <?php
            $sql_barang = "SELECT * FROM barang";
            $query_barang = mysqli_query($koneksi, $sql_barang);
            
            if (!$query_barang) {
                die("Error query barang: " . mysqli_error($koneksi));
            }
            
            while ($data = mysqli_fetch_assoc($query_barang)) {
                echo "<tr>";
                echo "<td>" . $data['id'] . "</td>";
                echo "<td>" . $data['kode_barang'] . "</td>";
                echo "<td>" . $data['nama_barang'] . "</td>";
                echo "<td>" . $data['harga'] . "</td>";
                echo "<td>" . $data['stok'] . "</td>";
                echo "<td>
                        <a href='hapus_barang.php?id=" . $data['id'] . "' 
                            class='button-delete' 
                            onclick='return konfirmasiHapus();'>Delete</a>
                    </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <div class="container">
        <div class="header-bar">
            <h2>Data Master Transaksi</h2>
            <div class="button-group">
                <a href="report_transaksi.php" class="button">Lihat Laporan Penjualan</a>
                <a href="tambah_transaksi.php" class="button-success">Tambah Transaksi</a>
            </div>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Waktu Transaksi</th>
                <th>Keterangan</th>
                <th>Total</th>
                <th>Nama Pelanggan</th>
                <th>Tindakan</th>
            </tr>
            <?php
            $sql_trans = "SELECT transaksi.*, pelanggan.nama AS nama_pelanggan 
                            FROM transaksi 
                            JOIN pelanggan ON transaksi.pelanggan_id = pelanggan.id 
                            ORDER BY transaksi.id DESC";
            $query_trans = mysqli_query($koneksi, $sql_trans);

            if (!$query_trans) {
                die("Error query transaksi: " . mysqli_error($koneksi));
            }

            while ($data = mysqli_fetch_assoc($query_trans)) {
                echo "<tr>";
                echo "<td>" . $data['id'] . "</td>";
                echo "<td>" . $data['waktu_transaksi'] . "</td>";
                echo "<td>" . $data['keterangan'] . "</td>";
                echo "<td>" . $data['total'] . "</td>";
                echo "<td>" . $data['nama_pelanggan'] . "</td>";
                echo "<td>
                        <a href='lihat_detail_transaksi.php?id=" . $data['id'] . "' class='button-detail'>Lihat Detail</a>
                        <a href='hapus_transaksi.php?id=" . $data['id'] . "' class='button-delete' onclick='return konfirmasiHapus();'>Hapus</a>
                    </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <div class="container">
        <h2>Tabel Transaksi Detail</h2>
        <table>
            <tr>
                <th>Transaksi ID</th>
                <th>Nama Barang</th>
                <th>Qty</th>
                <th>Harga Total</th>
            </tr>
            <?php
            $sql_detail = "SELECT transaksi_detail.*, barang.nama_barang 
                            FROM transaksi_detail 
                            JOIN barang ON transaksi_detail.barang_id = barang.id 
                            ORDER BY transaksi_detail.transaksi_id DESC";
            $query_detail = mysqli_query($koneksi, $sql_detail);

            if (!$query_detail) {
                die("Error query detail: " . mysqli_error($koneksi));
            }

            while ($data = mysqli_fetch_assoc($query_detail)) {
                echo "<tr>";
                echo "<td>" . $data['transaksi_id'] . "</td>";
                echo "<td>" . $data['nama_barang'] . "</td>";
                echo "<td>" . $data['qty'] . "</td>";
                echo "<td>" . $data['harga'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <script>
    function konfirmasiHapus() {
        var setuju = confirm("Apakah anda yakin ingin menghapus data ini?");
        if (setuju) {
            return true;
        } else {
            return false;
        }
    }
    </script>

</body>
</html>