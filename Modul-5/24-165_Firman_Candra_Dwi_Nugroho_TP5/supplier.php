<?php
$conn = mysqli_connect("localhost", "root", "", "store");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$result = mysqli_query($conn, "SELECT * FROM supplier");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Supplier</title>
</head>
<body>
    <h2>Daftar Supplier</h2>
    <a href="tambah_supplier.php">Tambah Supplier</a>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama Supplier</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['alamat'] ?></td>
            <td><?= $row['telp'] ?></td>
            <td>
                <a href="edit_supplier.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="hapus_supplier.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus data?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
