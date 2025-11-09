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
