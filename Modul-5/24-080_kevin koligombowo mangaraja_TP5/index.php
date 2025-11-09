<?php 
include 'koneksi.php'; 
$result = $conn->query("SELECT * FROM supplier"); 
?> 

<!DOCTYPE html> 
<html lang="id"> 
<head> 
    <meta charset="UTF-8"> 
    <title>Data Master Supplier</title> 
    <style> 
        body { 
            font-family: Arial, sans-serif; 
            margin: 40px; 
            background-color: white; 
        } 

        h2 { 
            color: blue; 
            margin-bottom: 20px; 
        } 

        a.button { 
            background-color: green; 
            color: white; 
            padding: 8px 14px; 
            text-decoration: none; 
            border-radius: 4px; 
            font-size: 14px; 
            float: right; 
        } 

        table { 
            width: 100%; 
            border-collapse: collapse; 
            background: white; 
        } 

        th, td { 
            border: 1px solid grey; 
            padding: 10px; 
            text-align: left; 
        } 

        th { 
            background-color: green; 
            color: white; 
        }

        .actions { 
            display: flex; 
            gap: 6px; 
        } 

        button { 
            padding: 6px 12px; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
            color: white; 
            font-size: 13px; 
        } 

        .edit { 
            background-color: blue; 
        } 

        .hapus { 
            background-color: red; 
        }
    </style> 
</head> 
<body> 
    <h2>Data Master Supplier</h2> 
    <a href="crud.php?aksi=tambah" class="button">Tambah Data</a> 
    <br><br> 

    <table> 
        <tr> 
            <th>ID</th> 
            <th>Nama</th> 
            <th>Telepon</th> 
            <th>Alamat</th> 
            <th>Aksi</th> 
        </tr> 

        <?php if ($result->num_rows > 0): ?> 
            <?php while($row = $result->fetch_assoc()): ?> 
                <tr> 
                    <td><?= $row['id_supplier']; ?></td> 
                    <td><?= htmlspecialchars($row['nama']); ?></td> 
                    <td><?= htmlspecialchars($row['telp']); ?></td> 
                    <td><?= htmlspecialchars($row['alamat']); ?></td> 
                    <td class="actions"> 
                        <a href="crud.php?aksi=edit&id=<?= $row['id_supplier']; ?>"> 
                            <button class="edit">Edit</button> 
                        </a> 
                        <a href="crud.php?aksi=hapus&id=<?= $row['id_supplier']; ?>" 
                           onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"> 
                            <button class="hapus">Hapus</button> 
                        </a> 
                    </td> 
                </tr> 
            <?php endwhile; ?> 
        <?php else: ?> 
            <tr>
                <td colspan="5" align="center">Belum ada data supplier</td>
            </tr> 
        <?php endif; ?> 
    </table> 
</body> 
</html>
