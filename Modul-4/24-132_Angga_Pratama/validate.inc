<?php
// 
// Fungsi ini (menggantikan validateName) memvalidasi username [cite: 10]
// Menggunakan preg_match (dari 4.3.1 & 4.3.3) [cite: 14, 71]
function validateUsername(&$data, &$errors, $field_name) {
    if (!isset($data[$field_name]) || empty(trim($data[$field_name]))) { //  trim
        $errors[$field_name] = 'Username harus diisi.';
        return;
    }
    
    // Pola regex dari PDF (hanya alfabet, apostrof, strip) 
    $pattern = "/^[a-zA-Z'-]+$/"; 
    if (!preg_match($pattern, $data[$field_name])) {
        $errors[$field_name] = "Username hanya boleh berisi huruf, strip (-), dan apostrof (').";
    }
}

// Fungsi validasi email (Tambahan dari 4.3.2 Step 9) [cite: 68]
// Menggunakan filter_var (dari 4.3.3) 
function validateEmail(&$data, &$errors, $field_name) {
    if (!isset($data[$field_name]) || empty(trim($data[$field_name]))) { //  trim
        $errors[$field_name] = 'Email harus diisi.';
        return;
    }
    
    // Validasi format email menggunakan filter bawaan PHP 
    if (!filter_var($data[$field_name], FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = 'Format email tidak valid.';
    }
}

// Fungsi validasi umum untuk field yang wajib diisi [cite: 68]
// Menggunakan trim (dari 4.3.3) 
function validateRequired(&$data, &$errors, $field_name, $display_name) {
    // Cek jika field ada dan tidak kosong setelah di-trim
    if (!isset($data[$field_name]) || empty(trim($data[$field_name]))) { //  trim
        $errors[$field_name] = $display_name . ' harus diisi.';
    }
}
?>