<?php
function validateName($field_list, $field_name, &$errors) {
    $value = trim($field_list[$field_name] ?? '');
    if ($value === '') return true;
    $pattern = "/^[a-zA-Z'-]+$/";
    if (!preg_match($pattern, $value)) {
        $errors[$field_name] = "Field '$field_name' hanya boleh berisi nama.";
        return false;
    }
    return true;
}

function validateEmail($field_list, $field_name, &$errors) {
    $value = trim($field_list[$field_name] ?? '');
    if ($value === '') return true;
    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = "Format email tidak valid.";
        return false;
    }
    return true;
}

function validateAge($field_list, $field_name, &$errors) {
    $value = trim($field_list[$field_name] ?? '');
    if ($value === '') return true;
    if (!is_numeric($value) || $value < 0 || $value > 120) {
        $errors[$field_name] = "Usia harus berupa angka antara 0–120.";
        return false;
    }
    return true;
}

function validateDateField($field_list, $field_name, &$errors) {
    $value = trim($field_list[$field_name] ?? '');
    if ($value === '') return true;
    $parts = explode('-', $value);
    if (count($parts) === 3 && checkdate($parts[1], $parts[2], $parts[0])) {
        return true;
    }
    $errors[$field_name] = "Tanggal tidak valid (gunakan format YYYY-MM-DD).";
    return false;
}
?>