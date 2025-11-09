<?php
// --- Regular expressions ---
$nama = "asep123";
if (preg_match("/^[A-Za-z]+$/", $nama)) {
    echo "Nama valid (hanya huruf)<br>";
} else {
    echo "Nama tidak valid<br>";
}

// --- String ---
$text = "   Halo Dunia   ";
$trimmed = trim($text);
$lower = strtolower($trimmed);
$upper = strtoupper($trimmed);

echo "Asli: '$text'<br>";
echo "Trim: '$trimmed'<br>";
echo "Lowercase: '$lower'<br>";
echo "Uppercase: '$upper'<br>";

// --- Filter ---
$email = "contoh@email.com";
$url = "https://www.example.com";
$float = 12.5;
$ip = "192.168.1.1";

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email valid<br>";
} else {
    echo "Email tidak valid<br>";
}

if (filter_var($url, FILTER_VALIDATE_URL)) {
    echo "URL valid<br>";
} else {
    echo "URL tidak valid<br>";
}

if (filter_var($float, FILTER_VALIDATE_FLOAT)) {
    echo "Float valid<br>";
} else {
    echo "Float tidak valid<br>";
}

if (filter_var($ip, FILTER_VALIDATE_IP)) {
    echo "IP valid<br>";
} else {
    echo "IP tidak valid<br>";
}

// --- Type testing ---
$angka = 100;
$teks = "Halo";

echo is_int($angka) ? "Integer<br>" : "Bukan integer<br>";
echo is_float($angka) ? "Float<br>" : "Bukan float<br>";
echo is_numeric($angka) ? "Numeric<br>" : "Bukan numeric<br>";
echo is_string($teks) ? "String<br>" : "Bukan string<br>";

// --- Date ---
$tahun = 2025;
$bulan = 10;
$hari = 26;

if (checkdate($bulan, $hari, $tahun)) {
    echo "Tanggal valid<br>";
} else {
    echo "Tanggal tidak valid<br>";
}
?>
