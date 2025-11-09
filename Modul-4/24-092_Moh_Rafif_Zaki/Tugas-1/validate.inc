<?php
function validateName(&$errors, $field_name){
    $pattern = "/^[a-zA-Z'-]+$/"; // format nama (alfabet)
    if (empty($field_name)){
        $errors['surname'] = 'Tidak boleh kosong';
        return false;
    }
    if (!preg_match($pattern, $field_name))
        $errors['surname'] = 'Hanya huruf saja!';
        return false;
    return true;
}

?>