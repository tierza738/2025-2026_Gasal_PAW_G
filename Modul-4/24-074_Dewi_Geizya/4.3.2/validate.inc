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
