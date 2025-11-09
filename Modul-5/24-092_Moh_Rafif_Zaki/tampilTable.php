<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'store';

$koneksi = mysqli_connect($servername, $username, $password, $database);

$query = "SELECT * FROM supplier";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1 {
            text-align: center;
            color: darkcyan;
            background-color: lightcyan;
            padding: 10px;
            border-radius: 10px;
        }

        table {
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
            border-style: solid;
            border-radius: 5px;

        }

        .header {
            background-color: lightcyan;

        }

        .tambahdata {
            background-color: greenyellow;
            padding: 7px;
            text-decoration: none;
            color: black;
            border-radius: 10px;
            margin-left: 340px;
        }

        .tambahdata:hover {
            background-color: black;
            color: greenyellow;
        }

        .edit {
            background-color: lightseagreen;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            padding: 7px;
        }

        .edit:hover {
            background-color: black;
            color: lightseagreen;
        }

        .hapus {
            background-color: red;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            padding: 7px;
        }

        .hapus:hover {
            background-color: black;
            color: red;
        }
    </style>
</head>

<body>
    <h1>TABEL SUPPLIER</h1><br>
    <a href="tambahData.php" class="tambahdata">Tambah Data</a>
    <table border="1" cellpadding="5" cellspacing="2">
        <tr class="header">
            <th>id</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Tindakan</th>
        </tr>
        <?php foreach ($data as $key): ?>
            <tr>
                <td><?php echo $key['id'] ?></td>
                <td><?php echo $key['nama'] ?></td>
                <td><?php echo $key['telp'] ?></td>
                <td><?php echo $key['alamat'] ?></td>
                <td style="width: 100px;height: 30px">
                    <a href="edit.php?id=<?= $key['id'] ?>" class="edit">edit</a>
                    <a href="hapus.php?id=<?= $key['id'] ?>" onclick="return confirm('Anda yakin akan menghapus supplier ini?')" class="hapus">hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>