<?php

$username = "aziz123";
$email = "aziz123@gmail.com";
$url = "https://www.youtube.com/";
$umur = 19;
$ip = "192.168.1.1";
$nilai = 89.1;
$hari = 26; $bulan = 10; $tahun = 2025;

// Regular Expression

if (preg_match("/^[a-zA-Z0-9_]+$/", trim($username))) {
    echo "Username valid<br>";
} else {
    echo "Username tidak valid<br>";
}


// String

echo "Lowercase: " . strtolower(trim($username)) . "<br>";
echo "Uppercase: " . strtoupper(trim($username)) . "<br>";


// Filter

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email valid: " . $email . "<br>";
} else {
    echo "Email tidak valid: " . $email . "<br>";
}

if (filter_var($url, FILTER_VALIDATE_URL)) {
    echo "URL valid: " . $url . "<br>";
} else {
    echo "URL tidak valid: " . $url . "<br>";
}

if (filter_var($ip, FILTER_VALIDATE_IP)) {
    echo "IP valid: " . $ip . "<br>";
} else {
    echo "IP tidak valid: " . $ip . "<br>";
}


// Type Testing

if (is_numeric($umur)) {
    echo "Umur adalah angka: " . $umur . "<br>";
} else {
    echo "Umur bukan angka<br>";
}

if (is_float($nilai)) {
    echo "Nilai adalah float: " . $nilai . "<br>";
} else {
    echo "Nilai bukan float<br>";
}

if (is_string($username)) {
    echo "Username adalah string<br>";
} else {
    echo "Username bukan string<br>";
}


// Date

if (checkdate($bulan, $hari, $tahun)) {
    echo "Tanggal valid: " . $hari . "-" . $bulan . "-" . $tahun . "<br>";
} else {
    echo "Tanggal tidak valid: " . $hari . "-" . $bulan . "-" . $tahun . "<br>";
}

?>
