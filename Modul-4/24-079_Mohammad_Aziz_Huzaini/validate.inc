<?php

function validateName($fields, $name, &$error = []) {
    $value = trim($fields[$name] ?? ''); 

    if (empty($value)) {
        $error[] = "Tidak boleh kosong";
        return false;
    }

    if (!preg_match("/^[a-zA-Z'-]+$/", $value)) {
        $error[] = "Hanya boleh berisi huruf";
        return false;
    }

    return true;
}

?>