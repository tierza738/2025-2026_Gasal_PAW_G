<?php
    $conn = mysqli_connect("localhost", "root", "", "store");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $query = "SELECT * FROM supplier";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<style>
    .anchor {
        text-decoration: none;
    }
    .btnedit {
        cursor: pointer;
        background-color: blue;
        padding: 5px 10px;
        border-radius: 5px;
        border: none;
        color: white;

    }
    .btndelete {
        cursor: pointer;
        background-color: red;
        padding: 5px 10px;
        border-radius: 5px;
        border: none;
        color: white;
    }
</style>
<div style="display: flex; justify-content: space-between; align-items: center ">
    <h2 style="font-family: 'Courier New', Courier, monospace; font-weight: bold; font-size: 30px; color: red; margin-top: 20px; margin-bottom: 20px; ">Data Master Supplier</h2>
    <a href="2.php" class="anchor"><button style="width: 150px; height: 40px; background-color: green; border-radius: 10px; border:none; color: white; cursor: pointer">Tambah Supplier</button></a>
</div>
<table border="1" cellpadding="10" cellspacing="0" width="100%">
    <tr style="background-color: lightblue;">
        <th>No</th>
        <th>ID</th>
        <th>Name</th>
        <th>Contact</th>
        <th>Address</th>
        <th>Action</th>
    </tr>
    <?php foreach ($data as $no => $row): ?>
        <tr style="background-color: lightgreen;">
            <td><?= $no + 1 ?></td>
            <td><?= $row["id"] ?></td>
            <td><?= $row["nama"] ?></td>
            <td><?= $row["telp"] ?></td>
            <td><?= $row["alamat"] ?></td>
            <td>
                <a class="anchor" href="3.php?id=<?= $row["id"] ?>"><button class="btnedit">Edit</button></a>
                <a class="anchor" href="4.php?id=<?= $row["id"] ?>" onclick="return confirm('Anda yakin akan menghapus supplier ini?');"><button class="btndelete">Delete</button></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>