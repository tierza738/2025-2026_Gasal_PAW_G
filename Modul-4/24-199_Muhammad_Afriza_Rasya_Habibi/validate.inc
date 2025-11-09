<?php
// Fungsi untuk memvalidasi nama (hanya huruf dan spasi)
function validateName($field_list, $field_name, &$errors) {
    $value = trim($field_list[$field_name] ?? '');

    if ($value === '') {
        $errors[$field_name] = "Field $field_name tidak boleh kosong!";
        return false;
    }

    // ubah semua huruf menjadi huruf besar sebagai contoh penggunaan strtoupper
    $value = strtoupper($value);

    // validasi hanya huruf dan spasi
    if (!preg_match("/^[A-Z\s'-]+$/", $value)) {
        $errors[$field_name] = "Field $field_name hanya boleh berisi huruf!";
        return false;
    }

    return true;
}

// Fungsi untuk validasi email (menggunakan FILTER_VALIDATE_EMAIL)
function validateEmail($field_list, $field_name, &$errors) {
    $value = trim(strtolower($field_list[$field_name] ?? '')); // strtolower: ubah huruf jadi kecil

    if ($value === '') {
        $errors[$field_name] = "Field $field_name tidak boleh kosong!";
        return false;
    }

    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = "Format email tidak valid!";
        return false;
    }

    return true;
}

// Fungsi untuk validasi password
function validatePassword($field_list, $field_name, &$errors) {
    $value = trim($field_list[$field_name] ?? '');
    if ($value === '') {
        $errors[$field_name] = "Password tidak boleh kosong!";
        return false;
    }

    if (strlen($value) < 6) {
        $errors[$field_name] = "Password minimal 6 karakter!";
        return false;
    }

    return true;
}

// Fungsi validasi semester (contoh type testing)
function validateSemester($field_list, $field_name, &$errors) {
    $value = $field_list[$field_name] ?? '';

    if ($value === '') {
        $errors[$field_name] = "Semester harus diisi!";
        return false;
    }

    // Gunakan is_numeric dan is_int untuk mengecek tipe data
    if (!is_numeric($value)) {
        $errors[$field_name] = "Semester harus berupa angka!";
        return false;
    }

    // Konversi ke integer
    $intVal = (int)$value;
    if (!is_int($intVal) || $intVal < 1 || $intVal > 8) {
        $errors[$field_name] = "Semester harus antara 1 sampai 8!";
        return false;
    }

    return true;
}

// Fungsi validasi tanggal lahir (menggunakan checkdate)
function validateDateField($field_list, &$errors) {
    $day = (int)($field_list['day'] ?? 0);
    $month = (int)($field_list['month'] ?? 0);
    $year = (int)($field_list['year'] ?? 0);

    if ($day === 0 || $month === 0 || $year === 0) {
        $errors['tanggal'] = "Tanggal lahir tidak boleh kosong!";
        return false;
    }

    if (!checkdate($month, $day, $year)) {
        $errors['tanggal'] = "Tanggal lahir tidak valid!";
        return false;
    }

    return true;
}
?>
