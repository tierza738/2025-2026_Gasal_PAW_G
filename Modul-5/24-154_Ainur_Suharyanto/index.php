<?php
$conn = mysqli_connect("localhost", "root", "Ryan2025", "store");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$result = mysqli_query($conn, "SELECT * FROM supplier");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Master Supplier</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 0 auto;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #ABDDF4;
        }
        a:hover {
            text-decoration: underline;
        }
        .edits{
            width: 35px;
            height: 20px;
            text-align: center;
            border-color: black;
            background-color: orange;
            border-radius: 5px;
            text-decoration: none;
            padding: 10px;
            color: white;
            text-decoration: none;
        }
        .edt{
            margin: 0;
        }
        .hapus{
            width: 50px;
            height: 20px;
            text-align: center;
            border-color: black;
            background-color: red;
            border-radius: 5px;
            text-decoration: none;
            padding: 10px;
            color: white;
        }
        .tombol{
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }
        a:hover{
            opacity: 0.8;
            text-decoration: none;
        }
        .header{
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 80%;
            margin: 0 auto;
            padding-bottom: 0;
        }
        .tambah{
            width: 100px;
            height: 25px;
            text-align: center;
            border-color: black;
            background-color: green;
            border-radius: 5px;
            text-decoration: none;
            padding: 8px;
            color: white;
            margin-top: 20px;
        }
        .tmbh{
            margin: 1px;
        }
        hr{
            width: 80%;
        }
        h2{
            color: #1e7ba6ff;
        }
    </style>
</head>
<body align="center">
    <div class="header">
        <h2>Data Master Supplier</h2>
        <a href="tambah.php" class="tambah"><p class="tmbh">Tambah Data</p></a>
    </div>
    <hr><br>
    <table border="1" cellpadding="8" cellspacing="0" align="center">
        <tr>
            <th>NO</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Tindakan</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['telp'] ?></td>
            <td><?= $row['alamat'] ?></td>

            <td>
                <div class="tombol">
                    <a href="edit.php?id=<?= $row['id'] ?>" class="edits"><p class="edt">Edit</p></a>
                    <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Anda Yakin Akan Menghapus Supplier Ini??')" class="hapus">Hapus</a>
                </div>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
