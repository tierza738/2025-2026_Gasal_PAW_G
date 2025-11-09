<?php
function validateName($field_list, $field_name, &$errors)
{
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])){
        $errors[] = "Field $field_name tidak boleh kosong.";
        return false;
    }
    
    $pattern = "/^[a-zA-Z'-]+$/"; // format nama (alfabet)
    if (!preg_match($pattern, $field_list[$field_name])){
        $errors[] = "Field $field_name hanya boleh berisi huruf, tanda petik tunggal ('), atau tanda strip (-).";
        return false;
    }
    return true;
}

function validateEmail($field_list, $field_name, &$errors)
{
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])){
        $errors[] = "Field $field_name tidak boleh kosong.";
        return false;
    }
    
    if (!filter_var($field_list[$field_name], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Field $field_name harus berisi alamat email yang valid.";
        return false;
    }
    return true;
}
?>
