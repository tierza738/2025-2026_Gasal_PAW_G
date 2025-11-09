<?php
$conn = mysqli_connect("localhost", "root", "Ryan2025", "store");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM supplier WHERE id=$id");
header("Location: index.php");
?>
