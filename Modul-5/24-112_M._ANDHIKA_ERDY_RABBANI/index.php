<?php
$conn = mysqli_connect("localhost", "root", "", "store");
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Master Supplier</title>
</head>
<body>

<h2>Data Master Supplier</h2>
<a href="tambah.php">Tambah Data</a><br><br>

<table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Telp</th>
        <th>Alamat</th>
        <th>Tindakan</th>
    </tr>

    <?php
    $result = mysqli_query($conn, "SELECT * FROM supplier ORDER BY id DESC");
    $no = 1;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>$no</td>
                <td>{$row['nama']}</td>
                <td>{$row['telp']}</td>
                <td>{$row['alamat']}</td>
                <td>
                    <a href='edit.php?id={$row['id']}'>Edit</a> 
                    <a href='hapus.php?id={$row['id']}' onclick='return confirm(\"Anda yakin ingin menghapus supplier ini?\")'>Hapus</a>
                </td>
            </tr>";
            $no++;
        }
    } else {
        echo "<tr><td colspan='5'>Belum ada data supplier.</td></tr>";
    }
    ?>
</table>

</body>
</html>
