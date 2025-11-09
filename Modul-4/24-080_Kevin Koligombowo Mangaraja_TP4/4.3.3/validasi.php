<?php

$nama = $_POST['nama'];
$email = $_POST['email'];
$url = $_POST['url'];
$ip = $_POST['ip'];
$hari = $_POST['hari'];
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$angka = $_POST['angka'];


// 1. Regular Expression 
if (preg_match("/^[a-zA-Z\s]+$/", $nama)) {
    echo "✅ Nama valid<br>";
} else {
    echo "❌ Nama hanya boleh huruf dan spasi<br>";
}

// 2. String Functions
$nama_bersih = trim($nama);
echo "Nama asli: '$nama'<br>";
echo "Nama setelah trim(): '$nama_bersih'<br>";
echo "Huruf kecil: " . strtolower($nama_bersih) . "<br>";
echo "Huruf besar: " . strtoupper($nama_bersih) . "<br><br>";

// 3. Filter Functions
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "✅ Email valid<br>";
} else {
    echo "❌ Email tidak valid<br>";
}

if (filter_var($url, FILTER_VALIDATE_URL)) {
    echo "✅ URL valid<br>";
} else {
    echo "❌ URL tidak valid<br>";
}

if (filter_var($ip, FILTER_VALIDATE_IP)) {
    echo "✅ IP valid<br>";
} else {
    echo "❌ IP tidak valid<br>";
}

// 4. Type Testing
if (is_numeric($angka)) {
    echo "✅ Angka favorit berupa numerik<br>";
    if (is_int($angka + 0)) { // +0 untuk ubah string jadi angka
        echo "Tipe data integer<br>";
    } else {
        echo "Tipe data bukan integer<br>";
    }
} else {
    echo "❌ Angka favorit bukan angka<br>";
}

// 5. Date Validation
if (checkdate($bulan, $hari, $tahun)) {
    echo "✅ Tanggal lahir valid ($hari-$bulan-$tahun)<br>";
} else {
    echo "❌ Tanggal lahir tidak valid<br>";
}
?>