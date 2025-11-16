<?php
include 'koneksi.php';

$tgl_mulai_input = '';
$tgl_selesai_input = '';
$judul_laporan = "Rekap Laporan Penjualan";
$data_rekap = [];
$labels_json = '[]';
$data_json = '[]';
$total_pendapatan = 0;
$total_pelanggan = 0;

$tgl_mulai_query = '';
$tgl_selesai_query = '';

if (isset($_GET['tgl_mulai']) && isset($_GET['tgl_selesai']) && !empty($_GET['tgl_mulai']) && !empty($_GET['tgl_selesai'])) {
    $tgl_mulai_input = $_GET['tgl_mulai'];
    $tgl_selesai_input = $_GET['tgl_selesai'];

    if (strtotime($tgl_mulai_input) > strtotime($tgl_selesai_input)) {
        $tgl_mulai_query = $tgl_selesai_input;
        $tgl_selesai_query = $tgl_mulai_input;
    } else {
        $tgl_mulai_query = $tgl_mulai_input;
        $tgl_selesai_query = $tgl_selesai_input;
    }

    $judul_laporan = "Rekap Laporan Penjualan " . $tgl_mulai_query . " sampai " . $tgl_selesai_query;

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

    $labels = array_column($data_rekap, 'tanggal');
    $data = array_column($data_rekap, 'total_harian');
    $labels_json = json_encode($labels);
    $data_json = json_encode($data);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        /* ===================================================
            Global Styles & Typography
            =================================================== */

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 20px;
            color: #333;
            line-height: 1.6;
        }

        h2 {
            color: #2c3e50;
            border-bottom: 2px solid #ecf0f1;
            padding-bottom: 10px;
            margin-top: 0;
            margin-bottom: 20px;
        }

        /* ===================================================
            Layout Container
            =================================================== */

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 25px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        /* ===================================================
            Form Styles
            =================================================== */

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            font-family: inherit;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        button[type="submit"] {
            background-color: #1abc9c;
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #16a085;
        }

        /* ===================================================
            Table Styles
            =================================================== */

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
        
        .summary-table th {
            background-color: #e9f5fe;
            color: #333;
            text-align: center;
        }
        
        .summary-table td {
            text-align: center;
            font-size: 1.1rem;
        }


        /* ===================================================
            Button & Link Styles
            =================================================== */

        .button {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            margin: 5px 5px 5px 0;
            transition: background-color 0.3s ease;
            font-weight: 500;
        }

        .button:hover {
            background-color: #2980b9;
        }

        .button-delete {
            display: inline-block;
            background-color: #e74c3c;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            transition: background-color 0.3s ease;
            text-align: center;
        }

        .button-delete:hover {
            background-color: #c0392b;
        }
        
        .button-detail {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            transition: background-color 0.3s ease;
            text-align: center;
        }
        .button-detail:hover {
            background-color: #2980b9;
        }
        
        .button-success {
            display: inline-block;
            background-color: #198754;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            margin: 5px 5px 5px 0;
            transition: background-color 0.3s ease;
            font-weight: 500;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .button-success:hover {
            background-color: #157347;
        }
        
        .button-warning {
            display: inline-block;
            background-color: #ffc107;
            color: #000;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            margin: 5px 5px 5px 0;
            transition: background-color 0.3s ease;
            font-weight: 500;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .button-warning:hover {
             background-color: #e0a800;
        }


        /* ===================================================
            Report Styles
            =================================================== */
        
        .report-header {
            background-color: #0d6efd;
            color: white;
            padding: 15px 20px;
            border-radius: 8px 8px 0 0;
            font-size: 1.25rem;
            font-weight: 500;
        }
        .report-container {
            padding: 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            background-color: #ffffff;
        }
        .report-body {
            padding: 20px;
        }
        .filter-form {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;
        }
        .filter-form input[type="date"] {
            width: auto;
            margin-bottom: 0;
        }
        .filter-form .button-success {
            margin: 0;
        }
        
        .chart-container {
            width: 100%;
            margin-top: 30px;
            margin-bottom: 30px;
        }
        
        .button-bar {
            margin-bottom: 15px;
        }
        
        @media print {
            body {
                background-color: #fff;
            }
            .report-header, .no-print {
                display: none;
            }
            .container {
                box-shadow: none;
                margin: 0;
                padding: 0;
                max-width: 100%;
            }
        }
        
    </style>
</head>
<body>

    <div class="container report-container">
        <div class="report-header no-print">
            <?php echo $judul_laporan; ?>
        </div>
        <div class="report-body">
            <div class="button-bar no-print">
                <a href="index.php" class="button">&lt; Kembali</a>
                
                <?php if (!empty($tgl_mulai_input)) { ?>
                    <button onclick="window.print();" class="button-warning">Cetak</button>
                    <a href="download_excel.php?tgl_mulai=<?php echo $tgl_mulai_query; ?>&tgl_selesai=<?php echo $tgl_selesai_query; ?>" class="button-success">Excel</a>
                <?php } ?>
            </div>

            <form action="" method="GET" class="filter-form no-print">
                <input type="date" name="tgl_mulai" value="<?php echo $tgl_mulai_input; ?>">
                <input type="date" name="tgl_selesai" value="<?php echo $tgl_selesai_input; ?>">
                <button type="submit" class="button-success">Tampilkan</button>
            </form>

            <?php if (!empty($tgl_mulai_input)) { ?>
            
                <div class="chart-container">
                    <canvas id="myChart"></canvas>
                </div>

                <h2>Rekap</h2>
                <table>
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
                
                <h2>Total</h2>
                <table class="summary-table">
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

            <?php } ?>

        </div>
    </div>
    
    <?php if (!empty($tgl_mulai_input)) { ?>
    <script>
        const ctx = document.getElementById('myChart');
        
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo $labels_json; ?>,
                datasets: [{
                    label: 'Total',
                    data: <?php echo $data_json; ?>,
                    backgroundColor: 'rgba(201, 203, 207, 0.5)',
                    borderColor: 'rgba(201, 203, 207, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    }
                }
            }
        });
    </script>
    <?php } ?>

</body>
</html>