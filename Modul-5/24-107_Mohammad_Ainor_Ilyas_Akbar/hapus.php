<?php
include 'koneksi.php';
$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM supplier WHERE id_supplier='$id'");
header("Location: index.php");
exit;
?>