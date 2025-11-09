<?php
require 'config.php';
$result = mysqli_query($conn, "SELECT * FROM supplier ORDER BY id ASC");
$msg = flash();
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Master Supplier</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #f2f2f2;
    margin: 0;
    padding: 20px;
}

h2 {
    margin-bottom: 20px;
}

table {
    border-collapse: collapse;
    width: 100%;
    background: #fff;
}

th, td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
}

th {
    background: #eee;
}

a.btn, button.btn {
  display: inline-block;
  padding: 6px 12px;
  margin: 2px;
  text-decoration: none;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.btn-primary {
    background: #007bff;
    color: #fff;
}

.btn-warning {
    background: #ff9800;
    color: #fff;
}

.btn-danger {
    background: #e53935;
    color: #fff;
}

.btn-secondary {
    background: #777;
    color: #fff;
}

.message {
    background: #d4edda;
    padding: 10px;
    border: 1px solid #b2dfdb;
    color: #155724;
    margin-bottom: 10px;
    border-radius: 4px;
}

.card {
    background: #fff;
    padding: 15px;
    border-radius: 6px;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
}
</style>
</head>
<body>
<div class="card">
  <h2>Data Master Supplier</h2>

  <?php if ($msg): ?><div class="message"><?= htmlspecialchars($msg) ?></div><?php endif; ?>

  <a href="add_edit.php" class="btn btn-primary">Tambah Data</a>

  <table>
    <thead>
      <tr><th>ID</th><th>Nama</th><th>Telp</th><th>Alamat</th><th>Aksi</th></tr>
    </thead>
    <tbody>
    <?php if (mysqli_num_rows($result) == 0): ?>
      <tr><td colspan="5" align="center">Belum ada data</td></tr>
    <?php else: while($s = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?= $s['id'] ?></td>
        <td><?= htmlspecialchars($s['nama']) ?></td>
        <td><?= htmlspecialchars($s['telp']) ?></td>
        <td><?= htmlspecialchars($s['alamat']) ?></td>
        <td>
          <a href="add_edit.php?id=<?= $s['id'] ?>" class="btn btn-warning">Edit</a>
          <button class="btn btn-danger" onclick="konfirmasiHapus(<?= $s['id'] ?>,'<?= htmlspecialchars($s['nama'], ENT_QUOTES) ?>')">Hapus</button>
        </td>
      </tr>
    <?php endwhile; endif; ?>
    </tbody>
  </table>
</div>

<div id="popup" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.4);">
  <div style="background:#fff; width:300px; margin:10% auto; padding:20px; border-radius:5px;">
    <p id="popupText"></p>
    <form method="post" action="delete.php" style="text-align:right;">
      <input type="hidden" name="id" id="hapusId">
      <button type="button" class="btn btn-secondary" onclick="tutupPopup()">Batal</button>
      <button type="submit" class="btn btn-danger">Hapus</button>
    </form>
  </div>
</div>

<script>
function konfirmasiHapus(id, nama) {
  document.getElementById("hapusId").value = id;
  document.getElementById("popupText").textContent = "Yakin ingin menghapus " + nama + "?";
  document.getElementById("popup").style.display = "block";
}
function tutupPopup() {
  document.getElementById("popup").style.display = "none";
}
</script>
</body>
</html>