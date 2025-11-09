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

$nama = "";
$telp = "";
$alamat = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    if (empty($nama)) {
        $errors['nama'] = "Nama tidak boleh kosong";
    } elseif (!preg_match("/^[a-zA-Z\s\.]+$/", $nama)) {
        $errors['nama'] = "Nama hanya boleh huruf";
    }
    if (empty($telp)) {
        $errors['telp'] = "Telp tidak boleh kosong";
    } elseif (!preg_match("/^[0-9]+$/", $telp)) {
        $errors['telp'] = "Telp hanya boleh angka";
    }
    if (empty($alamat)) {
        $errors['alamat'] = "Alamat tidak boleh kosong";
    } elseif (!preg_match("/[a-zA-Z]/", $alamat) || !preg_match("/[0-9]/", $alamat)) {
        $errors['alamat'] = "Alamat harus alfanumerik (minimal 1 angka dan 1 huruf)";
    }

    if (empty($errors)) {
        $stmt = $koneksi->prepare("INSERT INTO supplier (nama, telp, alamat) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama, $telp, $alamat);

        if ($stmt->execute()) {
            $_SESSION['pesan'] = "Data supplier baru berhasil disimpan.";
            header("Location: index.php");
            exit();
        } else {
            $errors['db'] = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
$koneksi->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Supplier</title>
    
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

        .btn {
            display: inline-block;
            padding: 8px 12px;
            text-decoration: none;
            color: #fff;
            border-radius: 5px;
            font-size: 14px;
            border: none;
            cursor: pointer;
            margin-right: 5px;
        }
        .btn-simpan {
            background-color: #5cb85c;
        }
        .btn-simpan:hover { background-color: #4cae4c; }

        .btn-batal {
            background-color: #d9534f;
        }
        .btn-batal:hover { background-color: #c9302c; }
        
        .form-supplier .form-group {
            margin-bottom: 15px;
        }
        .form-supplier label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-supplier input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-actions {
            margin-top: 20px;
        }

        .error-msg {
            color: #d9534f;
            font-size: 12px;
            display: block;
            margin-top: 5px;
        }
        .error-box {
            background-color: #f2dede;
            color: #a94442;
            padding: 15px;
            border: 1px solid #ebccd1;
            border-radius: 4px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Data Master Supplier Baru</h1>
        
        <?php if (!empty($errors['db'])): ?>
            <div class="error-box"><?php echo $errors['db']; ?></div>
        <?php endif; ?>

        <form action="tambah.php" method="POST" class="form-supplier" novalidate>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($nama); ?>">
                <?php if (isset($errors['nama'])): ?>
                    <span class="error-msg"><?php echo $errors['nama']; ?></span>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="telp">Telp</label>
                <input type="text" id="telp" name="telp" value="<?php echo htmlspecialchars($telp); ?>">
                <?php if (isset($errors['telp'])): ?>
                    <span class="error-msg"><?php echo $errors['telp']; ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" value="<?php echo htmlspecialchars($alamat); ?>">
                <?php if (isset($errors['alamat'])): ?>
                    <span class="error-msg"><?php echo $errors['alamat']; ?></span>
                <?php endif; ?>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-simpan">Simpan</button>
                <a href="index.php" class="btn btn-batal">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>