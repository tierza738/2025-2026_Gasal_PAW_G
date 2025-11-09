<?php
// Fungsi untuk memvalidasi input data supplier
function validasiSupplier($nama, $telp, $alamat)
{
    $error = [];

    // Validasi Nama: tidak boleh kosong dan hanya huruf serta spasi
    if (empty($nama) || !preg_match("/^[a-zA-Z\s]+$/", $nama)) {
        $error['nama'] = "Nama tidak boleh kosong dan hanya boleh berisi huruf!";
    }

    // Validasi Telepon: tidak boleh kosong dan hanya angka
    if (empty($telp) || !preg_match("/^[0-9]+$/", $telp)) {
        $error['telp'] = "Nomor telepon tidak boleh kosong dan hanya boleh berisi angka!";
    }

    // Validasi Alamat: harus berisi huruf dan angka (alfanumerik), boleh ada spasi atau tanda baca umum
    if (empty($alamat) || !preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d\s.,'-]+$/", $alamat)) {
        $error['alamat'] = "Alamat harus alfanumerik (mengandung huruf dan angka)!";
    }

    return $error;
}
?>
