<?php
$conn = mysqli_connect("localhost", "root", "", "store");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$nama = $telp = $alamat = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST["nama"]);
    $telp = trim($_POST["telp"]);
    $alamat = trim($_POST["alamat"]);

    if (empty($nama)) {
        $errors[] = "Nama tidak boleh kosong.";
    } elseif (!preg_match("/^[a-zA-Z\s.]+$/", $nama)) {
        $errors[] = "Nama hanya boleh berisi huruf, spasi dan tanda titik.";
    }

    if (empty($telp)) {
        $errors[] = "Nomor telepon tidak boleh kosong.";
    } elseif (!preg_match("/^[0-9]+$/", $telp)) {
        $errors[] = "Nomor telepon hanya boleh berisi angka.";
    }

    if (empty($alamat)) {
        $errors[] = "Alamat tidak boleh kosong.";
    } elseif (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d\s]+$/", $alamat)) {
        $errors[] = "Alamat harus alfanumerik (minimal 1 huruf dan 1 angka).";
    }

    if (empty($errors)) {
        $query = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";
        if (mysqli_query($conn, $query)) {
            header("Location: 1.php");
            exit;
        } else {
            $errors[] = "Gagal menambahkan data: " . mysqli_error($conn);
        }
    }
}
?>

<h2 style="font-family:'Courier New', Courier, monospace; font-weight:bold; font-size:30px; color:blue; margin-top:20px;">Tambah Data Master Supplier Baru</h2>

<?php if (!empty($errors)): ?>
    <div style="background-color: pink; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
        <ul style="margin:0; padding-left:20px;">
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="">
    <table cellpadding="10">
        <tr>
            <td><label for="nama">Nama</label></td>
            <td><input type="text" name="nama" id="nama" value="<?= htmlspecialchars($nama) ?>"></td>
        </tr>
        <tr>
            <td><label for="telp">Telp</label></td>
            <td><input type="text" name="telp" id="telp" value="<?= htmlspecialchars($telp) ?>"></td>
        </tr>
        <tr>
            <td><label for="alamat">Alamat</label></td>
            <td><input type="text" name="alamat" id="alamat" value="<?= htmlspecialchars($alamat) ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" style="background-color:green; color:white; border:none; border-radius:5px; padding:8px 15px; cursor:pointer;">Simpan</button>
                <a href="1.php"><button type="button" style="background-color:red; color:white; border:none; border-radius:5px; padding:8px 15px; cursor:pointer;">Batal</button></a>
            </td>
        </tr>
    </table>
</form>
