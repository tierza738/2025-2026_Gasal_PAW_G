<?php
function validateName(&$errors, $field_name){
    $pattern = "/^[a-zA-Z'-]+$/"; // format nama (alfabet)
    if (empty($field_name)){
        $errors['surname'] = 'Tidak boleh kosong';
    }
    if (!preg_match($pattern, $field_name)){
        $errors['surname'] = 'Hanya huruf saja!';
    }
};

function validateEmail(&$errors, $field_name){
    if (empty($field_name)){
        $errors['email'] = 'Tidak boleh kosong';
    }
    if (!filter_var($field_name, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Masukkan email yang benar';
    }
}
?>