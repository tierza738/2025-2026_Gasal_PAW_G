<?php
function validateName($field_list, $field_name, array &$errors)
{
    if (!isset($field_list[$field_name])) {
        $errors[$field_name] = 'Kolom tidak ada.';
        return false;
    }

    $value = trim($field_list[$field_name]);

    if ($value === '') {
        $errors[$field_name] = 'tidak boleh kosong.';
        return false;
    }

    $pattern = "/^[a-zA-Z'-]+$/";
    if (!preg_match($pattern, $value)) {
        $errors[$field_name] = "Hanya huruf alfabet, (') dan  (-) yang boleh.";
        return false;
    }

    return true;
}


function validateRequired($field_list, $field_name, array &$errors)
{
    if (!isset($field_list[$field_name]) || trim((string)$field_list[$field_name]) === '') {
        $errors[$field_name] = 'Kolom tidak boleh kosong.';
        return false;
    }
    return true;
}

function validateEmail($field_list, $field_name, array &$errors)
{
    if (!isset($field_list[$field_name]) || trim((string)$field_list[$field_name]) === '') {
        $errors[$field_name] = 'Kolom tidak boleh kosong.';
        return false;
    }
    $email = trim($field_list[$field_name]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = 'Format email tidak valid.';
        return false;
    }
    return true;
}

function validatePassword($field_list, $field_name, array &$errors, $minLength = 6)
{
    if (!isset($field_list[$field_name]) || trim((string)$field_list[$field_name]) === '') {
        $errors[$field_name] = 'Kolom tidak boleh kosong.';
        return false;
    }
    $pwd = $field_list[$field_name];
    if (strlen($pwd) < $minLength) {
        $errors[$field_name] = "Password harus minimal {$minLength} karakter.";
        return false;
    }
    return true;
}

// Regular expression example: username must be alphanumeric and 3-20 chars
function validateUsernameRegex($field_list, $field_name, array &$errors)
{
    if (!isset($field_list[$field_name]) || trim((string)$field_list[$field_name]) === '') {
        $errors[$field_name] = 'Kolom tidak boleh kosong.';
        return false;
    }
    $value = trim($field_list[$field_name]);
    // contoh preg_match
    if (!preg_match('/^[a-zA-Z0-9]{3,20}$/', $value)) {
        $errors[$field_name] = 'Username harus alfanumerik, 3-20 karakter.';
        return false;
    }
    return true;
}

// String functions example: normalize and check
function normalizeAndCheckSurname($field_list, $field_name, array &$errors)
{
    if (!isset($field_list[$field_name])) {
        $errors[$field_name] = 'Kolom tidak ada.';
        return false;
    }
    $value = trim($field_list[$field_name]);
    if ($value === '') {
        $errors[$field_name] = 'Kolom tidak boleh kosong.';
        return false;
    }
    // contoh penggunaan strtolower/strtoupper
    $lower = strtolower($value);
    $upper = strtoupper($value);
    // tetap gunakan validateName untuk format
    if (!preg_match("/^[a-zA-Z'\-]+$/", $value)) {
        $errors[$field_name] = 'Hanya huruf alfabet, apostrof (\') dan tanda hubung (-) yang diizinkan.';
        return false;
    }
    // simpan contoh transformasi (tidak dipakai lebih jauh)
    return true;
}

// Filter examples
function validateURL($field_list, $field_name, array &$errors)
{
    if (!isset($field_list[$field_name]) || trim((string)$field_list[$field_name]) === '') {
        // optional field — dianggap valid jika kosong
        return true;
    }
    $url = trim($field_list[$field_name]);
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        $errors[$field_name] = 'URL tidak valid.';
        return false;
    }
    return true;
}

function validateFloatRange($field_list, $field_name, array &$errors, $min = 0.0, $max = 4.0)
{
    if (!isset($field_list[$field_name]) || trim((string)$field_list[$field_name]) === '') {
        // optional
        return true;
    }
    $val = $field_list[$field_name];
    // contoh filter_var untuk float
    $filtered = filter_var($val, FILTER_VALIDATE_FLOAT);
    if ($filtered === false && !is_numeric($val)) {
        $errors[$field_name] = 'Nilai bukan float.';
        return false;
    }
    $f = (float)$val;
    if ($f < $min || $f > $max) {
        $errors[$field_name] = "Nilai harus antara {$min} dan {$max}.";
        return false;
    }
    return true;
}

function validateIP($field_list, $field_name, array &$errors)
{
    if (!isset($field_list[$field_name]) || trim((string)$field_list[$field_name]) === '') {
        // optional
        return true;
    }
    $ip = trim($field_list[$field_name]);
    if (!filter_var($ip, FILTER_VALIDATE_IP)) {
        $errors[$field_name] = 'IP tidak valid.';
        return false;
    }
    return true;
}

// Type testing example: cek numeric
function validateNumeric($field_list, $field_name, array &$errors)
{
    if (!isset($field_list[$field_name]) || trim((string)$field_list[$field_name]) === '') return true;
    if (!is_numeric($field_list[$field_name])) {
        $errors[$field_name] = 'Nilai harus numerik.';
        return false;
    }
    return true;
}

// Date example: checkdate
function validateDateParts($day, $month, $year, array &$errors, $fieldPrefix = 'birth')
{
    if ($day === '' && $month === '' && $year === '') return true; // optional
    if (!is_numeric($day) || !is_numeric($month) || !is_numeric($year)) {
        $errors[$fieldPrefix] = 'Tanggal lahir harus angka.';
        return false;
    }
    $d = (int)$day; $m = (int)$month; $y = (int)$year;
    if (!checkdate($m, $d, $y)) {
        $errors[$fieldPrefix] = 'Tanggal lahir tidak valid.';
        return false;
    }
    return true;
}
