<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$database     = "store";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    echo("Koneksi gagal: " . $conn->connect_error);
}
?>