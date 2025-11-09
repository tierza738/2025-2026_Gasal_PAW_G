<?php
$conn = mysqli_connect("localhost", "root", "", "store");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!isset($_GET['id'])) {
    header("Location: 1.php");
    exit;
}

$id = $_GET['id'];

$query = "DELETE FROM supplier WHERE id = $id";
if (mysqli_query($conn, $query)) {
    header("Location: 1.php");
    exit;
} else {
    echo "Gagal menghapus data: " . mysqli_error($conn);
}
?>
