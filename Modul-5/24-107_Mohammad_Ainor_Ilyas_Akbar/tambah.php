<?php
include 'koneksi.php';

$nama = $telp = $alamat = "";
$errors = [];

if (isset($_POST['simpan'])) {
    $nama   = trim($_POST['nama']);
    $telp   = trim($_POST['telp']);
    $alamat = trim($_POST['alamat']);

    if (empty($nama) || !preg_match("/^[a-zA-Z\s]+$/", $nama)) {
        $errors['nama'] = "Nama tidak boleh kosong dan hanya huruf!";
    }
    if (empty($telp) || !preg_match("/^[0-9]+$/", $telp)) {
        $errors['telp'] = "Telepon tidak boleh kosong dan hanya angka!";
    }
    if (empty($alamat) || !preg_match("/^(?=.*[A-Za-z])(?=.*[0-9]).+$/", $alamat)) {
        $errors['alamat'] = "Alamat harus alfanumerik (ada huruf dan angka)!";
    }

    if (empty($errors)) {
        mysqli_query($conn, "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')");
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
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Tambah Data Supplier</h2>
  <form method="post">
    <label>Nama Supplier</label>
    <input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>">
    <div class="error"><?= $errors['nama'] ?? '' ?></div>

    <label>Nomor Telepon</label>
    <input type="text" name="telp" value="<?= htmlspecialchars($telp) ?>">
    <div class="error"><?= $errors['telp'] ?? '' ?></div>

    <label>Alamat</label>
    <input type="text" name="alamat" value="<?= htmlspecialchars($alamat) ?>">
    <div class="error"><?= $errors['alamat'] ?? '' ?></div>

    <div class="form-actions">
      <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      <a href="index.php" class="btn btn-secondary">Batal</a>
    </div>
  </form>
</div>
</body>
</html>
