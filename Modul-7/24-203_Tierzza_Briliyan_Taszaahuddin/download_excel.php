<?php
include 'koneksi.php';

$tgl_mulai_query = $_GET['tgl_mulai'];
$tgl_selesai_query = $_GET['tgl_selesai'];

$data_rekap = [];
$total_pendapatan = 0;
$total_pelanggan = 0;

if (!empty($tgl_mulai_query) && !empty($tgl_selesai_query)) {
    
    $sql_rekap = "SELECT 
                    DATE(waktu_transaksi) as tanggal, 
                    SUM(total) as total_harian 
                  FROM transaksi 
                  WHERE DATE(waktu_transaksi) BETWEEN '$tgl_mulai_query' AND '$tgl_selesai_query'
                  GROUP BY tanggal 
                  ORDER BY tanggal ASC";
                  
    $query_rekap = mysqli_query($koneksi, $sql_rekap);
    while($row = mysqli_fetch_assoc($query_rekap)){
        $data_rekap[] = $row;
    }

    $sql_total = "SELECT 
                    SUM(total) as grand_total, 
                    COUNT(DISTINCT pelanggan_id) as jumlah_pelanggan 
                  FROM transaksi 
                  WHERE DATE(waktu_transaksi) BETWEEN '$tgl_mulai_query' AND '$tgl_selesai_query'";
                  
    $query_total = mysqli_query($koneksi, $sql_total);
    $data_total = mysqli_fetch_assoc($query_total);
    
    $total_pendapatan = $data_total['grand_total'];
    $total_pelanggan = $data_total['jumlah_pelanggan'];
}

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"laporan_penjualan.xls\"");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
</head>
<body>
    <h3>Rekap Laporan Penjualan <?php echo $tgl_mulai_query . " sampai " . $tgl_selesai_query; ?></h3>
    <br>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Total</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            foreach($data_rekap as $row) {
                echo "<tr>";
                echo "<td>" . $no . "</td>";
                echo "<td>Rp" . number_format($row['total_harian'], 0, ',', '.') . "</td>";
                echo "<td>" . date('d M Y', strtotime($row['tanggal'])) . "</td>";
                echo "</tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>

    <br>

    <h3>Total</h3>
    <table border="1">
        <thead>
            <tr>
                <th>Jumlah Pelanggan</th>
                <th>Jumlah Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $total_pelanggan; ?> Orang</td>
                <td>Rp<?php echo number_format($total_pendapatan, 0, ',', '.'); ?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>