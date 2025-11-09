<?php
$conn = mysqli_connect("localhost", "root", "", "store");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$nama = $telp = $alamat = "";
$errors = [];

if (isset($_POST['simpan'])) {
    $nama = trim($_POST['nama']);
    $telp = trim($_POST['telp']);
    $alamat = trim($_POST['alamat']);

    // VALIDASI
    if (empty($nama) || !preg_match("/^[a-zA-Z\s]+$/", $nama)) {
        $errors[] = "Nama tidak boleh kosong dan hanya boleh huruf.";
    }
    if (empty($telp) || !preg_match("/^[0-9]+$/", $telp)) {
        $errors[] = "Telp tidak boleh kosong dan hanya boleh angka.";
    }
    if (empty($alamat) || !preg_match("/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z0-9\s]+$/", $alamat)) {
        $errors[] = "Alamat tidak boleh kosong dan harus mengandung huruf serta angka.";
    }

    if (empty($errors)) {
        mysqli_query($conn, "INSERT INTO supplier (nama, telp, alamat) VALUES('$nama', '$telp', '$alamat')");
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Supplier</title>
</head>
<body>

<h2>Tambah Data Supplier</h2>

<?php
if ($errors) {
    echo "<ul style='color:red;'>";
    foreach ($errors as $e) echo "<li>$e</li>";
    echo "</ul>";
}
?>

<form method="post">
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>"><br><br>

    <label>Telp:</label><br>
    <input type="text" name="telp" value="<?= htmlspecialchars($telp) ?>"><br><br>

    <label>Alamat:</label><br>
    <input type="text" name="alamat" value="<?= htmlspecialchars($alamat) ?>"><br><br>

    <input type="submit" name="simpan" value="Simpan">
    <a href="index.php">Batal</a>
</form>

</body>
</html>
