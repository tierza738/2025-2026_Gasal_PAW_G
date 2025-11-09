<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_paw_praktikum5";

$koneksi = new mysqli($servername, $username, $password, $dbname);

if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
}

session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $koneksi->prepare("DELETE FROM supplier WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) { // Jika data berhasil terhapus [cite: 61]
        $_SESSION['pesan'] = "Data supplier berhasil dihapus.";
    } else {
        $_SESSION['pesan'] = "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    $_SESSION['pesan'] = "ID tidak valid.";
}

$koneksi->close();
header("Location: index.php");
exit();
?>