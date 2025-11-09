
<?php

include "koneksi.php";


if(isset($_POST["tambah"])){
    $pesan_error = [];
    $nama = $_POST["nama"];
    $telp = trim($_POST["telp"]);
    $alamat = $_POST["alamat"];
    // ----validasi inputan---
    //nama 

    $format_nama = "/^[a-zA-Z\s]+$/";
    if (empty($nama)){
        $pesan_error["nama"] = "nama tidak boleh kosong..";
    }elseif(!preg_match($format_nama,$nama)){
        $pesan_error['nama'] = "Perbaiki format nama harus huruf misal : (Qomarxxxx).";
    };

    $format_telp = "/^[0-9]{10,13}$/";
    if (empty($telp)){
        $pesan_error["telp"] = "telpon tidak boleh kosong..";
    }
    elseif(!preg_match($format_telp,$telp)){
        $pesan_error['telp'] = "Perbaiki format telpon harus min. 11-12 angka misal  : (08xxxx).";
    };

    $format_alamat = "/(?=.*[0-9])(?=.*[a-zA-Z])^[a-zA-Z0-9\s.,#-]+$/";
    if(empty($alamat)){
        $pesan_error["alamat"] = "alamat tidak boleh kosong...";
    }elseif(!preg_match($format_alamat,$alamat)){
        $pesan_error["alamat"] = "Alamat harus mengandung minimal 1 angka dan 1 huruf";
    };

    if(count($pesan_error) === 0){
        $query_add = "INSERT INTO suppleir (nama_supplier,telp,alamat) VALUES ('$nama', '$telp', '$alamat')";
        if($conn->query($query_add)){
            echo "sukses menambah data";
            header("location:ambil_data.php");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
    }
    h2{
        color: #6366F1;
    }
    td{
        padding: 5px;
    }
    .tambah{
        padding: 5px 10px;
        border-radius: 5px;
        color: white;
        border: none;
        background-color: #82B949;
    }
    form table tr td .batal{
        padding: 4px 16px;
        border-radius: 5px;
        text-decoration: none;
        color: white;
        background-color: #DE0E0E;

    }
</style>
<body>
    <form method="POST">
        <h2>Tambah Data Master Supplier</h2>
        <table>
            <tr>
                <td><label for="">Nama </label></td>
                <td><input type="text" name="nama" value="<?= $nama ?? '' ?> "> <span><?php echo $pesan_error['nama'] ?? '' ?></span></td>
            </tr>
            <tr>
                <td><label for="">Telp </label></td>
                <td><input type="text" name="telp" value="<?= $telp ?? '' ?> "> <span><?php echo $pesan_error['telp'] ?? '' ?></span></td>
            </tr>
            <tr>
                <td><label for="">Alamat </label></td>
                <td><input type="text" name="alamat" value="<?= $alamat ?? '' ?> "><span><?php echo $pesan_error['alamat'] ?? '' ?></span></td>
            </tr>
            <tr>
                <td><input type="submit" name="tambah" value="Tambah" class="tambah"></td>
                <td><a href="ambil_data.php" class="batal">Batal</a></td>
            </tr>
        </table>
        
    </form>
</body>
</html>