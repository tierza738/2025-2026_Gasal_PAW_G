<?php
$conn = mysqli_connect("localhost", "root", "", "store");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM supplier WHERE id='$id'");
header("Location: supplier.php");
?>
