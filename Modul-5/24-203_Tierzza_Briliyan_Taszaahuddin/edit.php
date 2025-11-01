<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "store";
$koneksi = mysqli_connect($servername,$username,$password, $database);
$errors = [];

// Ambil data lama berdasarkan ID
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM supplier WHERE id = $id";
    $query = mysqli_query($koneksi, $sql);
    $result = mysqli_fetch_assoc($query);

    if (!$result) {
        die("Data supplier tidak ditemukan.");
    }
} else {
    die("ID supplier tidak diberikan.");
}

// Proses update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST["id"]);
    $nama = trim($_POST["nama"]);
    $telp = trim($_POST["telp"]);
    $alamat = trim($_POST["alamat"]);

    // Validasi
    if (empty($nama)) $errors[] = "Nama tidak boleh kosong.";
    elseif (!preg_match("/^[a-zA-Z\s]+$/", $nama)) $errors[] = "Nama hanya boleh huruf.";

    if (empty($telp)) $errors[] = "Nomor telepon tidak boleh kosong.";
    elseif (!preg_match("/^[0-9]+$/", $telp)) $errors[] = "Nomor telepon hanya boleh angka.";

    if (empty($alamat)) $errors[] = "Alamat tidak boleh kosong.";
    elseif (!preg_match("/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z0-9\s.,-]+$/", $alamat))
        $errors[] = "Alamat harus alfanumerik (mengandung huruf dan angka).";

    if (empty($errors)) {
        $sql = "UPDATE supplier 
                SET nama = '$nama', telp = '$telp', alamat = '$alamat' 
                WHERE id = $id";
        if (mysqli_query($koneksi, $sql)) {
            header("Location: index.php");
            exit;
        } else {
            $errors[] = "Gagal memperbarui data: " . mysqli_error($koneksi);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 50px;
            color: #333;
        }
        .form-box {
            max-width: 420px;
            margin: 0 auto;
            background-color: #fff;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.06);
        }
        h2 {
            text-align: center;
            font-weight: 600;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-top: 12px;
            font-weight: 500;
            color: #444;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 8px 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-family: inherit;
        }
        input[type="submit"] {
            margin-top: 20px;
            background-color: #4a90e2;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
        }
        input[type="submit"]:hover {
            background-color: #3b7ac4;
        }
        .error {
            background-color: #ffeaea;
            border: 1px solid #f5c2c7;
            color: #b23c46;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .back {
            display: inline-block;
            margin-top: 15px;
            color: #4a90e2;
            text-decoration: none;
            font-size: 14px;
        }
        .back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Edit Supplier</h2>

        <?php if (!empty($errors)): ?>
        <div class="error">
            <ul>
                <?php foreach ($errors as $err): ?>
                    <li><?= $err ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

        <form method="POST">
            <input type="hidden" name="id" value="<?= $result['id'] ?>">
            
            <label>Nama</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($result['nama']) ?>">

            <label>Telepon</label>
            <input type="text" name="telp" value="<?= htmlspecialchars($result['telp']) ?>">

            <label>Alamat</label>
            <textarea name="alamat" rows="3"><?= htmlspecialchars($result['alamat']) ?></textarea>

            <input type="submit" value="Perbarui">
        </form>

        <a href="index.php" class="back">← Kembali</a>
    </div>
</body>
</html>
