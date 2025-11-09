<?php
function validateName(&$errors, $field_name){
    $field_name = trim($field_name);
    $field_name = strtolower($field_name);
    $field_name = ucfirst($field_name);
    if(!is_string($field_name)){
        $errors['surname'] = 'Nama harus berupa teks';
    }
    $pattern = "/^[a-zA-Z\s'-]+$/";
    if(empty($field_name)){
        $errors['surname'] = 'Nama tidak boleh kosong';
    }elseif (!preg_match($pattern, $field_name)){
        $errors['surname'] = 'Nama hanya boleh huruf dan spasi';
    }
}

function validateEmail(&$errors, $field_name){
    $field_name = trim($field_name);
    $field_name = strtolower($field_name);
    if(!is_string($field_name)){
        $errors['email'] = 'Email harus berupa teks';
    }
    if(empty($field_name)){
        $errors['email'] = 'Email tidak boleh kosong';
    }elseif (!filter_var($field_name, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Format email tidak valid';
    }
}

function validateAlamat(&$errors, $field_name){
    $field_name = trim($field_name);
    $field_name = ucwords(strtolower($field_name));
    if(!is_string($field_name)){
        $errors['alamat'] = 'Alamat harus berupa teks';
    }
    $pattern = "/^[a-zA-Z0-9\s.,-]+$/";
    if(empty($field_name)){
        $errors['alamat'] = 'Alamat tidak boleh kosong';
    }elseif (!preg_match($pattern, $field_name)){
        $errors['alamat'] = 'Alamat hanya boleh huruf, angka, titik, koma, dan strip';
    }elseif (strlen($field_name) < 5){
        $errors['alamat'] = 'Alamat terlalu pendek';
    }
}

function validateTanggal(&$errors, $field_name){
    $field_name = trim($field_name);
    if(!is_string($field_name)){
        $errors['tanggal'] = 'Tanggal harus berupa string';
    }
    if(!preg_match("/^\d{2}-\d{2}-\d{4}$/", $field_name)){
        $errors['tanggal'] = 'Format tanggal harus DD-MM-YYYY';
    }
    list($hari, $bulan, $tahun) = explode('-', $field_name);
    if(!is_numeric($tahun) || !is_numeric($bulan) || !is_numeric($hari)){
        $errors['tanggal'] = 'Tanggal hanya boleh berisi angka';
    }
    if(!checkdate((int)$bulan, (int)$hari, (int)$tahun)){
        $errors['tanggal'] = 'Tanggal tidak valid';
    }
}

function validateUrl(&$errors, $field_name){
    $field_name = trim($field_name);
    if(!is_string($field_name)){
        $errors['url'] = "URL harus berupa string";
    }
    if(empty($field_name)){
        $errors['url'] = 'URL tidak boleh kosong';
    }elseif(!filter_var($field_name, FILTER_VALIDATE_URL)){
        $errors['url'] = 'URL tidak valid';
    }
}

