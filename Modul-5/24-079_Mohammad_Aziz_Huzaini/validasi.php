<?php
function validasiSupplier($nama, $telp, $alamat)
{
    $error = [];

    if (empty($nama) || !preg_match("/^[a-zA-Z\s]+$/", $nama)) {
        $error['nama'] = "Nama tidak boleh kosong dan hanya huruf!";
    }

    if (empty($telp) || !preg_match("/^[0-9]+$/", $telp)) {
        $error['telp'] = "Telepon tidak boleh kosong dan hanya angka!";
    }

    if (empty($alamat) || !preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d\s.,'-]+$/", $alamat)) {
        $error['alamat'] = "Alamat harus alfanumerik (ada huruf & angka)!";
    }

    return $error;
}
?>
