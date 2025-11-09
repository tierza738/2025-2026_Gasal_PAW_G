<?php
$conn = mysqli_connect("localhost", "root", "Ryan2025", "store");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM supplier WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $name = $_POST['nama'];
    $telpon = $_POST['telp'];
    $address = $_POST['alamat'];

    $error = [];
    
    if (empty($name)) {
        $error['nama'] = "Nama tidak boleh kosong!";
    } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $error['nama'] = "Nama hanya boleh berisi huruf!";
    }
    
    if (empty($telpon)) {
        $error['telp'] = "Nomor telepon tidak boleh kosong!";
    } else if (!preg_match("/^[0-9]*$/", $telpon)) {
        $error['telp'] = "Nomor telepon hanya boleh berisi angka!";
    }
    
    if (empty($address)) {
        $error['alamat'] = "Alamat tidak boleh kosong!";
    } else if (!preg_match('/[A-Za-z]/', $address) || !preg_match('/[0-9]/', $address)) {
        $error['alamat'] = "Alamat harus mengandung minimal 1 huruf dan 1 angka!";
    }

    if (empty($error)) {
        mysqli_query($conn, "UPDATE supplier SET 
            nama='$name',
            telp='$telpon',
            alamat='$address'
            WHERE id=$id");
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>

    <style>
    .error-message {
        color: red;
        font-size: 12px;
        margin-left: 20px;
    }
    body {
        font-family: Arial, sans-serif;
    }
    h2 {
        color: #333;
    }
    .foem {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        width: 300px;
    }
    input[type="text"] {
        width: 100%;
        padding: 8px;
        margin: 8px 20px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-left: 20px;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
    a {
        margin-left: 10px;
        color: #333;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
    .aksi {
        display: flex;
        align-items: center;
    }
    .batal {
        height: 35px;
        width: 70px;
        background-color: red;
        margin-left: 10px;
        text-align: center;
        border-radius: 5px;
    }
    .batal p {
        color: white;
        line-height: 35px;
        margin: 0;
        text-decoration: none;
    }
    a:hover{
        opacity: 0.7;
        text-decoration: none;
    }
    form{
        margin-left: 40px;
    }
    h2{
        color: #1e7ba6ff;
    }
    </style>
</head>
<body>
    <h2>Edit Data Master Supplier</h2>
    <hr>
    <form method="POST">
    <table>
        <tr>
            <td>Nama</td>
            <td>
                <input type="text" name="nama" placeholder="nama" 
                    value="<?= isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : htmlspecialchars($row['nama']) ?>">
                <?php if(isset($error['nama'])): ?>
                    <div class="error-message"><?= $error['nama'] ?></div>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>Telp</td>
            <td>
                <input type="text" name="telp" placeholder="telp" 
                    value="<?= isset($_POST['telp']) ? htmlspecialchars($_POST['telp']) : htmlspecialchars($row['telp']) ?>">
                <?php if(isset($error['telp'])): ?>
                    <div class="error-message"><?= $error['telp'] ?></div>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>
                <input type="text" name="alamat" placeholder="alamat" 
                    value="<?= isset($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : htmlspecialchars($row['alamat']) ?>">
                <?php if(isset($error['alamat'])): ?>
                    <div class="error-message"><?= $error['alamat'] ?></div>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td class="aksi">
                <input type="submit" name="update" value="update">
                <a href="index.php" class="batal"><p>batal</p></a>
            </td>
        </tr>
    </table>
    </form>
</body>
</html>