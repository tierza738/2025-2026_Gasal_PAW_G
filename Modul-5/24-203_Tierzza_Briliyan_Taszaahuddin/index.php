<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "store";
$koneksi = mysqli_connect($servername,$username,$password, $database);

$sql = "SELECT * FROM supplier";
$query = mysqli_query($koneksi, $sql);

if (!$query) {
    die("Query error: " . mysqli_error($koneksi));
}

$result = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Supplier</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7f9fc;
            color: #333;
            margin: 0;
            padding: 40px;
        }

        h2 {
            text-align: center;
            font-weight: 600;
            color: #222;
            margin-bottom: 30px;
        }

        .container {
            max-width: 850px;
            margin: 0 auto;
            background: #fff;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        }

        .add-btn {
            display: inline-block;
            background-color: #4a90e2;
            color: #fff;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: 0.2s;
        }

        .add-btn:hover {
            background-color: #3b7ac4;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            padding: 10px 12px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        th {
            background-color: #f0f4ff;
            color: #333;
            font-weight: 600;
        }

        tr:hover {
            background-color: #f8fbff;
        }

        td:last-child {
            text-align: right;
        }

        .btn {
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 13px;
            text-decoration: none;
            color: #fff;
            margin-left: 5px;
        }

        .edit {
            background-color: #34c759;
        }

        .delete {
            background-color: #ff3b30;
        }

        .edit:hover {
            background-color: #2fa94c;
        }

        .delete:hover {
            background-color: #d7322b;
        }
    </style>
</head>
<body>
    <h2>Data Supplier</h2>
    <div class="container">
        <a href="create.php" class="add-btn">+ Tambah Supplier</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>

            <?php foreach ($result as $row): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['telp'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn edit">Edit</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn delete" onclick="return confirm('Yakin ingin hapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
