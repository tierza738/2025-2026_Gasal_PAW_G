<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "store");
if (mysqli_connect_errno()) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

function flash($msg = null) {
    if ($msg !== null) $_SESSION['flash'] = $msg;
    else {
        $m = $_SESSION['flash'] ?? '';
        unset($_SESSION['flash']);
        return $m;
    }
}

function old($key, $default = '') {
    $o = $_SESSION['old'] ?? [];
    return htmlspecialchars($o[$key] ?? $default);
}
function save_old($arr){ $_SESSION['old'] = $arr; }
function clear_old(){ unset($_SESSION['old']); }

function errors($key = null) {
    if ($key) {
        $errs = $_SESSION['errors'] ?? [];
        return $errs[$key] ?? '';
    } else {
        $e = $_SESSION['errors'] ?? [];
        unset($_SESSION['errors']);
        return $e;
    }
}

function validate_supplier($data) {
    $err = [];
    if (empty(trim($data['nama'] ?? '')))
        $err['nama'] = "Nama tidak boleh kosong.";
    elseif (!preg_match("/^[a-zA-Z\s]+$/", $data['nama']))
        $err['nama'] = "Nama hanya boleh huruf dan spasi.";

    if (empty(trim($data['telp'] ?? '')))
        $err['telp'] = "Nomor telepon tidak boleh kosong.";
    elseif (!preg_match("/^[0-9]+$/", $data['telp']))
        $err['telp'] = "Nomor telepon hanya boleh angka.";

    if (empty(trim($data['alamat'] ?? '')))
        $err['alamat'] = "Alamat tidak boleh kosong.";
    elseif (!preg_match("/[A-Za-z]/", $data['alamat']) || !preg_match("/[0-9]/", $data['alamat']))
        $err['alamat'] = "Alamat harus mengandung huruf dan angka.";

    return $err;
}