<?php
$conn = mysqli_connect("localhost", "root", "", "store");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];

    $query = "INSERT INTO supplier (nama, alamat, telp) VALUES ('$nama', '$alamat', '$telp')";
    mysqli_query($conn, $query);

    header("Location: supplier.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Tambah Supplier</title></head>
<body>
    <h2>Tambah Supplier</h2>
    <form method="POST">
        Nama: <input type="text" name="nama" required><br><br>
        Alamat: <input type="text" name="alamat" required><br><br>
        Telepon: <input type="text" name="telp" required><br><br>
        <input type="submit" name="submit" value="Simpan">
    </form>
</body>
</html>
