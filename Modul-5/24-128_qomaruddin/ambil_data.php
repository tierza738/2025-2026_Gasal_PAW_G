
<?php
    include "koneksi.php";


    if (isset($_GET["id"])){
        $id = $_GET["id"];
        var_dump($id);
        $query_hapus = "DELETE FROM suppleir WHERE id_supplier = '$id'";
        if($conn->query($query_hapus)){
            header("location:ambil_data.php");
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }

        .header-tabel{
            display: flex;
            width: 575px;
            align-items: center;
            justify-content: space-between;
        }
        .header-tabel a{
            text-decoration: none;
            color: white;
            background-color: #82B949;
            padding: 10px;
            border-radius: 5px;
        }

        td{
            padding: 10px;
        }
        
        .edit{
            text-decoration: none;
            padding: 5px;
            color: white;
            background-color: orange;
            border-radius: 5px;
            margin-right: 5px;
        }

        .hapus{
            text-decoration: none;
            padding: 5px;
            color: white;
            background-color: red;
            border-radius: 5px;
        }

    </style>
</head>
<body>
    <div class="header-tabel">
        <p class="judul">Data Master Supplier</p>
        <a href="tambah_data.php">Tambah Data</a>
    </div>
    <table border="1px solid black">
        <tr style="background-color :#D7EBF0;"><td>No</td><td>Nama</td><td>Telp</td><td>Alamat</td><td>Tindakan</td></tr>
    <?php


    #--program ngambil data---
    $query_select = "SELECT * FROM suppleir";
    $result = $conn->query($query_select);
    if($result->num_rows > 0){
        $no = 1;
        while($row = $result->fetch_assoc()){
            $id_supplier = $row["id_supplier"];
            echo "<tr>";
            echo "<td>" . $no . "</td>";
            echo "<td>" . $row["nama_supplier"] . "</td>";
            echo "<td>" . $row["telp"] . "</td>";
            echo "<td>" . $row["alamat"] . "</td>";
            echo "<td class ='tindakan'>" ."<a href='edit_data.php?id=".$id_supplier. "' class='edit'>Edit</a>" ."<a href='ambil_data.php?id=".$id_supplier."' onclick ='return confirm(\"Anda yakin akan menghapus data ini?\")' class='hapus'>Hapus</a>" ."</td>";
            echo "</tr>";
            $no+=1;
        }
    }

    ?>

    </table>

</body>
</html>