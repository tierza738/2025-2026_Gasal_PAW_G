<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'store';

$koneksi = mysqli_connect($servername, $username, $password, $database);
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM supplier WHERE id = $id";
    if(mysqli_query($koneksi,$query)){
        header('location:tampilTable.php');
    }
}
?>