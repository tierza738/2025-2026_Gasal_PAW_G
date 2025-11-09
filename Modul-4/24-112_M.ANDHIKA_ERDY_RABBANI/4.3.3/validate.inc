<?php
// Regular Expression
function validateName(&$errors, $field_name, $field_value) {
    $field_value = trim($field_value); // membersihkan spasi
    if (empty($field_value)) {
        $errors[$field_name] = "Nama tidak boleh kosong";
        return false;
    } elseif (!preg_match("/^[a-zA-Z'-]+$/", $field_value)) {
        $errors[$field_name] = "Nama hanya boleh berisi huruf, tanda kutip satu, atau tanda hubung.";
        return false;
    }
    return true;
}

//String 
function validateString(&$errors, $field_name, $field_value) {
    $field_value = trim($field_value);
    if ($field_value === '') {
        $errors[$field_name] = "Input string kosong setelah trim.";
        return false;
    }
    // ubah menjadi huruf besar sebagai contoh operasi string
    $field_value = strtoupper($field_value);
    return true;
}

//Email 
function validateEmail(&$errors, $field_name, $field_value) {
    if (empty($field_value)) {
        $errors[$field_name] = "Email wajib diisi.";
        return false;
    } elseif (!filter_var($field_value, FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = "Format email tidak valid.";
        return false;
    }
    return true;
}

//URL
function validateURL(&$errors, $field_name, $field_value) {
    if (!empty($field_value) && !filter_var($field_value, FILTER_VALIDATE_URL)) {
        $errors[$field_name] = "URL tidak valid.";
        return false;
    }
    return true;
}

//Numeric 
function validateNumeric(&$errors, $field_name, $field_value) {
    if (!is_numeric($field_value)) {
        $errors[$field_name] = "Harus berupa angka.";
        return false;
    }
    return true;
}

//Date
function validateDate(&$errors, $year, $month, $day) {
    if (!checkdate((int)$month, (int)$day, (int)$year)) {
        $errors['date'] = "Tanggal tidak valid.";
        return false;
    }
    return true;
}
?>
