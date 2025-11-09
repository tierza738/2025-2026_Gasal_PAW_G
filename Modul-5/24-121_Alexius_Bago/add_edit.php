<?php
require 'config.php';
$mode = isset($_GET['id']) ? 'edit' : 'add';
$title = $mode === 'edit' ? 'Edit Data Supplier' : 'Tambah Data Supplier';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'nama' => $_POST['nama'] ?? '',
        'telp' => $_POST['telp'] ?? '',
        'alamat' => $_POST['alamat'] ?? ''
    ];
    $id = $_POST['id'] ?? null;
    $err = validate_supplier($data);

    if ($err) {
        $_SESSION['errors'] = $err;
        save_old($data);
        header('Location: ' . ($id ? "add_edit.php?id=$id" : 'add_edit.php'));
        exit;
    }

    if ($id) {
        $stmt = mysqli_prepare($conn, "UPDATE supplier SET nama=?, telp=?, alamat=? WHERE id=?");
        mysqli_stmt_bind_param($stmt, "sssi", $data['nama'], $data['telp'], $data['alamat'], $id);
        mysqli_stmt_execute($stmt);
        flash("Data supplier berhasil diperbarui.");
    } else {
        $stmt = mysqli_prepare($conn, "INSERT INTO supplier (nama,telp,alamat) VALUES (?,?,?)");
        mysqli_stmt_bind_param($stmt, "sss", $data['nama'], $data['telp'], $data['alamat']);
        mysqli_stmt_execute($stmt);
        flash("Data supplier berhasil ditambahkan.");
    }
    clear_old();
    header("Location: index.php");
    exit;
}

$data = ['nama'=>'','telp'=>'','alamat'=>''];
$errAll = errors();

if ($mode === 'edit') {
    $id = intval($_GET['id']);
    $res = mysqli_query($conn, "SELECT * FROM supplier WHERE id=$id");
    $supplier = mysqli_fetch_assoc($res);
    if (!$supplier) {
        flash("Data tidak ditemukan.");
        header("Location: index.php");
        exit;
    }
    $data = $_SESSION['old'] ?? $supplier;
} else {
    $data = $_SESSION['old'] ?? $data;
}
clear_old();
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title><?= htmlspecialchars($title) ?></title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #f2f2f2;
    margin: 0;
    padding: 20px;
}

h2 {
    margin-bottom: 15px;
}

form {
    background: #fff;
    padding: 20px;
    border-radius: 6px;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
    width: 400px;
}

input[type=text], textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

label {
    font-weight: bold;
    display:block;
    margin-top:10px;
}

.btn {
    display:inline-block;
    padding:6px 12px;
    border:none;
    border-radius:4px;
    cursor:pointer;
    text-decoration:none;
}

.btn-success {
    background:#28a745;
    color:white;
}

.btn-secondary {
    background:#777;
    color:white;
}

.error {
    color:red;
    font-size: 13px;
}

.alert {
    background:#f8d7da;
    color:#721c24;
    padding:10px;
    border-radius:4px;
    margin-bottom:10px;
}
</style>
</head>
<body>
<h2><?= htmlspecialchars($title) ?></h2>

<?php if ($errAll): ?>
<div class="alert">
  <ul>
    <?php foreach ($errAll as $e): ?><li><?= htmlspecialchars($e) ?></li><?php endforeach; ?>
  </ul>
</div>
<?php endif; ?>

<form method="post" action="add_edit.php">
  <?php if ($mode === 'edit'): ?>
    <input type="hidden" name="id" value="<?= intval($_GET['id']) ?>">
  <?php endif; ?>

  <label>Nama</label>
  <input type="text" name="nama" value="<?= old('nama', $data['nama']) ?>">
  <div class="error"><?= errors('nama') ?></div>

  <label>Telepon</label>
  <input type="text" name="telp" value="<?= old('telp', $data['telp']) ?>">
  <div class="error"><?= errors('telp') ?></div>

  <label>Alamat</label>
  <textarea name="alamat" rows="3"><?= old('alamat', $data['alamat']) ?></textarea>
  <div class="error"><?= errors('alamat') ?></div>

  <button type="submit" class="btn btn-success">Simpan</button>
  <a href="index.php" class="btn btn-secondary">Batal</a>
</form>
</body>
</html>