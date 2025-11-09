<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Master Supplier</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Data Master Supplier</h2>
  <a href="tambah.php" class="btn btn-primary">+ Tambah Data</a>

  <table>
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Telepon</th>
      <th>Alamat</th>
      <th>Aksi</th>
    </tr>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM supplier");
    while ($row = mysqli_fetch_assoc($result)) :
    ?>
    <tr>
      <td><?= $row['id_supplier'] ?></td>
      <td><?= $row['nama'] ?></td>
      <td><?= $row['telp'] ?></td>
      <td><?= $row['alamat'] ?></td>
      <td class="actions">
        <a href="edit.php?id=<?= $row['id_supplier'] ?>" class="btn btn-warning">Edit</a>
        <a href="hapus.php?id=<?= $row['id_supplier'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</div>
</body>
</html>
