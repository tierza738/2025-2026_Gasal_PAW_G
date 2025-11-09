<?php
function validateName(&$error, $field)
{
    if (empty($field)) {
        $error['nama'] = 'Nama tidak boleh kosong';
    } elseif (!preg_match("/^[a-zA-Z\s'-]+$/", $field)) {
        $error['nama'] = 'Hanya boleh huruf';
    }
}

function validateTelp(&$error, $field)
{
    if (empty($field)) {
        $error['telp'] = 'Telepon tidak boleh kosong';
    } elseif (!preg_match("/^[0-9]+$/", $field)) {
        $error['telp'] = 'Hanya boleh angka';
    }
}

function validateAlamat(&$error, $field)
{
    if (empty($field)) {
        $error['alamat'] = 'Alamat tidak boleh kosong';
    } elseif (!preg_match("/^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9\s.,]+$/", $field)) {
        $error['alamat'] = 'Minimal 1 angka dan 1 huruf';
    }
}

$error = [];
$nama = $_POST['nama'] ?? '';
$telp = $_POST['telp'] ?? '';
$alamat = $_POST['alamat'] ?? '';
if (isset($_POST['simpan'])) {
    validateName($error, $nama);
    validateTelp($error, $telp);
    validateAlamat($error, $alamat);
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
        }
        .simpan{
            background-color: lightskyblue;
            color: black;
            text-decoration: none;
            padding: 7px;
            border-radius: 10px;
            border: none;
        }
        .simpan:hover{
            background-color: black;
            color: lightskyblue;
        }
        .batal{
            background-color: red;
            color: black;
            text-decoration: none;
            padding: 7px;
            border-radius: 10px;
            border: none;
        }
        .batal:hover{
            background-color: black;
            color: red;
        }
        h1{
            text-align: center;
            color: darkcyan;
            background-color: lightcyan;
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <h1>TAMBAH DATA MASTER SUPPLIER BARU</h1>
    <table border="0">
        <form action="tambahData.php" method="post">
            <tr>
                <td style="width: 80px;">
                    <label for="nama">Nama</label>
                </td>
                <td>
                    <input type="text" name="nama" placeholder="Nama" style="height: 30px; width:8cm" value="<?= $nama ?? '' ?>">
                    <span><?php echo $error['nama'] ?? "" ?></span>
                </td>
        
            </tr>
            <tr>
                <td>
                    <label for="telp">Telp</label>
                </td>
                <td>
                    <input type="text" name="telp" placeholder="Telp" style=" height: 30px;" value="<?= $telp ?? '' ?>">
                    <span><?php echo $error['telp'] ?? "" ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label for=" alamat">Alamat</label>
                </td>
                <td>
                    <input type="text" name="alamat" placeholder="Alamat " style=" height: 30px;" value="<?= $alamat ?? '' ?>">
                    <span><?php echo $error['alamat'] ?? "" ?></span>
                </td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="simpan" value="Simpan" class="simpan">
                    <input type="submit" name="batal" value="Batal" class="batal">
                </td>
            </tr>
        </form>
    </table>
</body>

</html>

<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'store';

$koneksi = mysqli_connect($servername, $username, $password, $database);
if (isset($_POST['simpan'])) {
    if (count($error) == 0) {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $nama = $_POST['nama'];
            $telp = $_POST['telp'];
            $alamat = $_POST['alamat'];

            $query = "INSERT INTO supplier(nama,telp,alamat) VALUES ('$nama','$telp','$alamat')";

            if (mysqli_query($koneksi, $query)) {
                header('location:tampilTable.php');
            }
        }
    }
}
if (isset($_POST['batal'])) {
    header('location:tampilTable.php');
}

?>