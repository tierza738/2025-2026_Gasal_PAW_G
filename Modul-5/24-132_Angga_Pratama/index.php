<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_paw_praktikum5";
$koneksi = new mysqli($servername, $username, $password, $dbname);
if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
}

session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Master Supplier</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        h1 {
            color: #333;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #eee;
            padding: 12px 10px;
            text-align: left;
            vertical-align: middle;
        }

        table th {
            background-color: #e9f7fe;
            color: #333;
            font-weight: bold;
        }

        table td {
            color: #555;
        }

        .btn {
            display: inline-block;
            padding: 6px 10px;
            text-decoration: none;
            color: #fff;
            border-radius: 5px;
            font-size: 13px;
            border: none;
            cursor: pointer;
            margin-right: 5px;
        }

        .btn-tambah {
            background-color: #5cb85c;
            margin-bottom: 20px;
            font-size: 14px;
            padding: 8px 12px;
        }
        .btn-tambah:hover { background-color: #4cae4c; }

        .btn-edit {
            background-color: #f0ad4e;
        }
        .btn-edit:hover { background-color: #ec971f; }

        .btn-hapus {
            background-color: #d9534f;
        }
        .btn-hapus:hover { background-color: #c9302c; }

        .pesan {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 15px;
            border: 1px solid #d6e9c6;
            border-radius: 4px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Master Supplier</h1>
        
        <a href="tambah.php" class="btn btn-tambah">Tambah Data</a>
        
        <?php
        if (isset($_SESSION['pesan'])) {
            echo '<div class="pesan">' . $_SESSION['pesan'] . '</div>';
            unset($_SESSION['pesan']);
        }
        ?>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Telp</th>
                    <th>Alamat</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM supplier";
                $result = $koneksi->query($sql);
                $no = 1;

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['telp']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                        echo "<td>
                                <a href='edit.php?id=" . $row['id'] . "' class='btn btn-edit'>Edit</a>
                                <a href='hapus.php?id=" . $row['id'] . "' class='btn btn-hapus' onclick='return confirmDelete()'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
    function confirmDelete() {
        return confirm("Anda yakin akan menghapus supplier ini?");
    }
    </script>
</body>
</html>

<?php
$koneksi->close();
?>