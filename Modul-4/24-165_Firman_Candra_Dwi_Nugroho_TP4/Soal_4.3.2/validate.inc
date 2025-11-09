<?php
function validateName($field_list, $field_name, &$error)
{
    if (!isset($field_list[$field_name])) {
        $error = "Field tidak ditemukan.";
        return false;
    }

    $pattern = "/^[a-zA-Z'-]+$/";
    if (!preg_match($pattern, $field_list[$field_name])) {
        $error = "Nama hanya boleh huruf (A-Z atau a-z).";
        return false;
    }

    return true;
}
?>
