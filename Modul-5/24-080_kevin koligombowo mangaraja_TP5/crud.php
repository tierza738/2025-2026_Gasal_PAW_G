<?php 
include 'koneksi.php'; 
include 'validasi.php'; 

$aksi = $_GET['aksi'] ?? ''; 
$id = $_GET['id'] ?? ''; 
$error = []; 
$nama = $telp = $alamat = "";

// ====== Hapus Data Supplier ======
if ($aksi == 'hapus' && $id) {
    // Kueri DELETE tidak menggunakan prepared statement, jadi tidak perlu pengecekan ini
    $conn->query("DELETE FROM supplier WHERE id_supplier='$id'");
    header("Location: index.php");
    exit;
}

// ====== Ambil Data untuk Edit ======
if ($aksi == 'edit' && $id) {
    $result = $conn->query("SELECT * FROM supplier WHERE id_supplier='$id'");
    $data = $result->fetch_assoc();

    if ($data) {
        $nama = $data['nama'];
        $telp = $data['telp'];
        $alamat = $data['alamat'];
    } else {
        die("Data tidak ditemukan.");
    }
}

// ====== Proses Tambah / Edit Data ======
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST['nama']);
    $telp = trim($_POST['telp']);
    $alamat = trim($_POST['alamat']);

    $error = validasiSupplier($nama, $telp, $alamat);

    if (empty($error)) {
        if ($aksi == 'edit') {
            $stmt = $conn->prepare("UPDATE supplier SET nama=?, telp=?, alamat=? WHERE id_supplier=?");
            
            // --- Tambahkan pengecekan ini ---
            if ($stmt === false) {
                die("Kesalahan saat menyiapkan kueri UPDATE: " . $conn->error);
            }
            // --- Akhir pengecekan ---

            $stmt->bind_param("sssi", $nama, $telp, $alamat, $id);
        } else {
            $stmt = $conn->prepare("INSERT INTO supplier (nama, telp, alamat) VALUES (?, ?, ?)");
            
            // --- Tambahkan pengecekan ini ---
            if ($stmt === false) {
                die("Kesalahan saat menyiapkan kueri INSERT: " . $conn->error);
            }
            // --- Akhir pengecekan ---
            
            $stmt->bind_param("sss", $nama, $telp, $alamat);
        }

        if ($stmt->execute()) {
            header("Location: index.php");
            exit;
        } else {
            // Ini akan menangani kesalahan setelah kueri disiapkan, seperti duplikasi data
            echo "Gagal menyimpan data: " . $stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= ($aksi == 'edit') ? 'Edit Data Supplier' : 'Tambah Data Supplier'; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #fafafa;
        }

        h2 {
            color: #007bff;
            margin-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 80px;
            font-weight: bold;
            margin-top: 10px;
        }

        input, textarea {
            width: 280px;
            padding: 6px;
            border: 1px solid grey;
            border-radius: 3px;
        }

        textarea {
            margin-top: 5px;
            height: 60px;
            resize: none;
        }

        .buttons {
            margin-top: 15px;
            margin-left: 80px;
        }

        button, a {
            padding: 6px 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        .simpan {
            background-color: #28a745;
        }

        .batal {
            background-color: #dc3545;
            margin-left: 5px;
        }

        .error {
            color: red;
            font-size: 13px;
            margin-left: 80px;
            margin-top: 2px;
            display: block;
        }
    </style>
</head>
<body>

<h2><?= ($aksi == 'edit') ? 'Edit Data Master Supplier' : 'Tambah Data Master Supplier Baru'; ?></h2>

<form method="post">
    <div>
        <label>Nama</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>">
        <span class="error"><?= $error['nama'] ?? '' ?></span>
    </div>

    <div>
        <label>Telp</label>
        <input type="text" name="telp" value="<?= htmlspecialchars($telp) ?>">
        <span class="error"><?= $error['telp'] ?? '' ?></span>
    </div>

    <div>
        <label>Alamat</label>
        <textarea name="alamat"><?= htmlspecialchars($alamat) ?></textarea>
        <span class="error"><?= $error['alamat'] ?? '' ?></span>
    </div>

    <div class="buttons">
        <button type="submit" class="simpan"><?= ($aksi == 'edit') ? 'Update' : 'Simpan'; ?></button>
        <a href="index.php" class="batal">Batal</a>
    </div>
</form>

</body>
</html>
