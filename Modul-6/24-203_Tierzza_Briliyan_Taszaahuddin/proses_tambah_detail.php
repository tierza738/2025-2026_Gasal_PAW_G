<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $transaksi_id = $_POST['transaksi_id'];
    $barang_id = $_POST['barang_id'];
    $qty = $_POST['qty'];
    $sql_cek = "SELECT * FROM transaksi_detail 
                WHERE transaksi_id = '$transaksi_id' AND barang_id = '$barang_id'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    if (!$query_cek) {
        die("Error cek duplikat: " . mysqli_error($koneksi));
    }

    if (mysqli_num_rows($query_cek) > 0) {
        die("Error: Barang ini sudah ada di transaksi tersebut. Silakan kembali.");
    }

    $sql_harga_brg = "SELECT harga FROM barang WHERE id = '$barang_id'";
    $query_harga_brg = mysqli_query($koneksi, $sql_harga_brg);

    if (!$query_harga_brg) {
        die("Error ambil harga: " . mysqli_error($koneksi));
    }
    
    if (mysqli_num_rows($query_harga_brg) == 0) {
        die("Error: Barang dengan ID $barang_id tidak ditemukan.");
    }
    $data_harga = mysqli_fetch_assoc($query_harga_brg);
    $harga_satuan = $data_harga['harga'];
    $total_harga_detail = $harga_satuan * $qty;

    $sql_insert = "INSERT INTO transaksi_detail (transaksi_id, barang_id, qty, harga) 
                   VALUES ('$transaksi_id', '$barang_id', '$qty', '$total_harga_detail')";
    $hasil_insert = mysqli_query($koneksi, $sql_insert);

    if ($hasil_insert) {
        
        $sql_sum = "SELECT SUM(harga) AS total_baru 
                    FROM transaksi_detail 
                    WHERE transaksi_id = '$transaksi_id'";
        $query_sum = mysqli_query($koneksi, $sql_sum);

        if (!$query_sum) {
             die("Error sum total: " . mysqli_error($koneksi));
        }

        $data_sum = mysqli_fetch_assoc($query_sum);
        $total_baru = $data_sum['total_baru'] ? $data_sum['total_baru'] : 0;
        $sql_update_master = "UPDATE transaksi SET total = '$total_baru' 
                              WHERE id = '$transaksi_id'";
        mysqli_query($koneksi, $sql_update_master);

        header("Location: index.php");
        exit;

    } else {
        echo "Gagal menyimpan detail transaksi: " . mysqli_error($koneksi);
    }

} else {
    header("Location: tambah_detail.php");
    exit;
}
?>