<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $barang_id = $_GET['id'];

    $sql_cek = "SELECT * FROM transaksi_detail WHERE barang_id = '$barang_id'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    if (!$query_cek) {
        die("Error cek hapus: " . mysqli_error($koneksi));
    }

    $jumlah_digunakan = mysqli_num_rows($query_cek);

    if ($jumlah_digunakan > 0) {
        // Barang tidak bisa dihapus
        echo "<script>
                alert('Barang tidak dapat dihapus karena digunakan dalam transaksi detail');
                window.location.href = 'index.php';
              </script>";
        exit;
        
    } else {
        // Barang aman untuk dihapus
        $sql_hapus = "DELETE FROM barang WHERE id = '$barang_id'";
        $hasil_hapus = mysqli_query($koneksi, $sql_hapus);
        if ($hasil_hapus) {
            echo "<script>
                    alert('Barang berhasil dihapus.');
                    window.location.href = 'index.php';
                  </script>";
            exit;
        } else {
            echo "<script>
                    alert('Gagal menghapus barang: " . mysqli_error($koneksi) . "');
                    window.location.href = 'index.php';
                  </script>";
            exit;
        }
    }

} else {
    header("Location: index.php");
    exit;
}
?>