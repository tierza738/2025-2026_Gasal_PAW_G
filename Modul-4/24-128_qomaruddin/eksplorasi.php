<?php
echo ("<h2>Regular Expressions (Ekspresi Reguler)</h2>");
echo "<br>";
$username = "user123";
$pola = "/^[a-z0-9]{5,15}$/"; // Pola: ^ mulai, [a-z0-9] huruf kecil/angka, {5,15} panjang 5-15, $ akhir

if (preg_match($pola, $username)) {
    echo "Username valid.";
} else {
    echo "Username tidak valid.";
}
echo "<br>";
echo "<br>";

echo ("<h2>String Functions</h2>");
echo "<br>";

$input_email = "  TEST@Contoh.com  ";

$email_trimmed = trim($input_email);
$email_cleaned = strtolower($email_trimmed); 

if (!empty($email_cleaned)) {
    echo "Email dibersihkan: " . $email_cleaned;
}

echo "<br>";
echo "<br>";

echo ("<h2>Filter Functions</h2>");
echo "<br>";

$email = "nama@domain.com";
$website = "https://www.example.com";
$ip_address = "192.168.1.1";

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email valid. ";
} else {
    echo "Email tidak valid. ";
}

if (filter_var($website, FILTER_VALIDATE_URL)) {
    echo "URL valid. ";
} else {
    echo "URL tidak valid. ";
}

if (filter_var($ip_address, FILTER_VALIDATE_IP)) {
    echo "IP valid. ";
} else {
    echo "IP tidak valid. ";
}

echo "<br>";
echo "<br>";

echo ("<h2>Type Testing</h2>");
echo "<br>";
echo "<br>";
echo "<br>";

echo ("<h2>Type Testing</h2>");
echo "<br>";

$usia_input = "25"; 
$harga_input = 19.99;


if (is_numeric($usia_input)) {
    
    if ((int)$usia_input == $usia_input && $usia_input > 0) {
        echo "Usia valid sebagai bilangan bulat positif. ";
    }
}

if (is_float($harga_input)) {
    echo "Harga valid sebagai float. ";
}


echo "<br>";
echo "<br>";

echo ("<h2>Date Functions</h2>");
echo "<br>";

$bulan = 4;
$hari = 31;
$tahun = 2025;

if (checkdate($bulan, $hari, $tahun)) {
    echo "Tanggal valid.";
} else {
    echo "Tanggal tidak valid."; 
}

$bulan_kabisat = 2;
$hari_kabisat = 29;
$tahun_kabisat = 2024;

if (checkdate($bulan_kabisat, $hari_kabisat, $tahun_kabisat)) {
    echo "Tanggal kabisat valid.";
}

?>