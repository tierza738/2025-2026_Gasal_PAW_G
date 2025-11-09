<?php
include 'koneksi.php';
id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM supplier WHERE id_supplier='$id'");
data = mysqli_fetch_assoc($result);

$nama = $data['nama'];
$telp = $data['telp'];
$alamat = $data['alamat'];
$errors = [];

if (isset($_POST['update'])) {
    $nama   = trim($_POST['nama']);
    $telp   = trim($_POST['telp']);
    $alamat = trim($_POST['alamat']);

    if (empty($nama) || !preg_match("/^[a-zA-Z\s]+$/", $nama)) {
        $errors['nama'] = "Nama hanya boleh huruf!";
    }
    if (empty($telp) || !preg_match("/^[0-9]+$/", $telp)) {
        $errors['telp'] = "Telepon hanya boleh angka!";
    }
    if (empty($alamat) || !preg_match("/^(?=.*[A-Za-z])(?=.*[0-9]).+$/", $alamat)) {
        $errors['alamat'] = "Alamat harus alfanumerik!";
    }

    if (empty($errors)) {
        mysqli_query($conn, "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id_supplier='$id'");
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Data Supplier</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Edit Data Supplier</h2>
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
      <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
      <a href="index.php" class="btn btn-secondary">Batal</a>
    </div>
  </form>
</div>
</body>
</html>
