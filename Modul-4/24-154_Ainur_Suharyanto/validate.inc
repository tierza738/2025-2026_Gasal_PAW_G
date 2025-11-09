<?php
function validateName($field_list, $field_name, &$errors)
{
    if (!isset($field_list[$field_name])) {
        $errors[$field_name] = 'Field tidak ditemukan!';
        return false;
    }

    $pattern = "/^[a-zA-Z'-]+$/";
    if (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = ucfirst($field_name) . ' harus berupa huruf saja!';
        return false;
    }

    return true;
}

function validateUmur($field_list, $field_name, &$errors)
{
    if (!isset($field_list[$field_name])) {
        $errors[$field_name] = 'Field tidak ditemukan!';
        return false;
    }

    // hanya boleh angka 1–3 digit
    $pattern = "/^[0-9]{1,3}$/";
    if (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'Umur harus berupa angka!';
        return false;
    }

    return true;
}
?>

