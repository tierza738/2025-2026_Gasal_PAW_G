<?php

include "koneksi.php";

$id = 0;

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $query_select = "SELECT * FROM suppleir WHERE id_supplier = '$id'";

    $result = $conn->query($query_select);
    $row = $result->fetch_assoc();
    $nama = $row["nama_supplier"];
    $telp = $row["telp"];
    $alamat = $row["alamat"];
}


if(isset($_POST["simpan"])){
    $id = (int)$_POST["id_supplier"];
    $nama = $_POST["nama"];
    $telp = $_POST["telp"];
    $alamat = $_POST["alamat"];
    $pesan_error = [];
    
    echo ("nama : $nama, telp : $telp ,alamat : $alamat, ");

    // ----validasi----

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
    var_dump($id);
    if(count($pesan_error) === 0){
        echo "masuk";
        var_dump($id);
        $query_update = "UPDATE suppleir set nama_supplier = '$nama',telp = '$telp',alamat = '$alamat' WHERE id_supplier = $id" ;
        if($conn->query($query_update)){
            header("location:ambil_data.php");
        }else{
            echo "errot",$conn->error;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit-data</title>
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
    .simpan{
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
    <h2>Edit data</h2>
    <form action="edit_data.php" method="POST">
        <table>
            <tr>
                <td><input type="hidden" name="id_supplier" value="<?= $id ??  '' ?>"><label for="nama">Nama</label></td>
                <td><input type="text" name="nama" value="<?= $nama ??'' ?>"></td>
                <td><span><?= $pesan_error["nama"] ?? '' ?></span></td>
            </tr>
            <tr>
                <td><label for="Telp">Telp</label></td>
                <td><input type="text" name="telp" value="<?= $telp ?? '' ?>"></td>
                <td><span><?= $pesan_error["telp"] ?? '' ?></span></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat</label></td>
                <td><input type="text" name="alamat" value="<?= $alamat ?? ''?> "></td>
                <td><span><?= $pesan_error["alamat"] ?? '' ?></span></td>
            </tr>
            <tr>
                <td><input type="submit" name="simpan" value="simpan" class="simpan"></td>
                <td><a href="ambil_data.php" class="batal">Batal</a></td>
            </tr>
        </table>
    </form>
</body>
</html>
