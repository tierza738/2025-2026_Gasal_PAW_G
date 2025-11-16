<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $waktu = $_POST['waktu_transaksi'];
    $total = $_POST['total']; // Ini 0
    $pelanggan_id = $_POST['pelanggan_id'];

    // Amankan input string sebelum masuk query
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);
    $sql = "INSERT INTO transaksi (waktu_transaksi, keterangan, total, pelanggan_id) 
            VALUES ('$waktu', '$keterangan', '$total', '$pelanggan_id')";

    $hasil = mysqli_query($koneksi, $sql);

    if ($hasil) {
        echo "Data Transaksi Master berhasil disimpan.";
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }

} else {
    header("Location: tambah_transaksi.php");
    exit;
}
?>