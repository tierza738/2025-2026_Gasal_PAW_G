<?php
$conn = mysqli_connect("localhost", "root", "", "store");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM supplier WHERE id='$id'");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];

    $query = "UPDATE supplier SET nama='$nama', alamat='$alamat', telp='$telp' WHERE id='$id'";
    mysqli_query($conn, $query);

    header("Location: supplier.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Supplier</title></head>
<body>
    <h2>Edit Supplier</h2>
    <form method="POST">
        Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>"><br><br>
        Alamat: <input type="text" name="alamat" value="<?= $data['alamat'] ?>"><br><br>
        Telepon: <input type="text" name="telp" value="<?= $data['telp'] ?>"><br><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
