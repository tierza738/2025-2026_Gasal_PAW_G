<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "store";
$koneksi = mysqli_connect($servername,$username,$password, $database);

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM supplier WHERE id = $id";
    if (mysqli_query($koneksi, $sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
