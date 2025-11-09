<?php
function validateName($field_list, $field_name, &$errors)
{
    $value = trim($field_list[$field_name] ?? '');

    if (empty($value)) {
        $errors[] = "Field $field_name tidak boleh kosong.";
        return false;
    }

    if (!is_string($value)) {
        $errors[] = "Field $field_name harus berupa teks.";
        return false;
    }

    $value = strtoupper(strtolower($value));

    $pattern = "/^[a-zA-Z'-]+$/";
    if (!preg_match($pattern, $value)) {
        $errors[] = "Field $field_name hanya boleh berisi huruf, tanda petik tunggal ('), atau tanda strip (-).";
        return false;
    }

    return true;
}

function validateEmail($field_list, $field_name, &$errors)
{
    $email = trim($field_list[$field_name] ?? '');

    if (empty($email)) {
        $errors[] = "Field $field_name tidak boleh kosong.";
        return false;
    }

    if (!filter_input(INPUT_POST, $field_name, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Field $field_name harus berisi alamat email yang valid.";
        return false;
    }

    return true;
}

function validateNohp($field_list, $field_name, &$errors) {
    $nohp = trim($field_list[$field_name] ?? '');

    if (empty($nohp)) {
        $errors[] = "Field $field_name tidak boleh kosong.";
        return false;
    }

    if (!ctype_digit($nohp)) {
        $errors[] = "Field $field_name hanya boleh berisi angka 0-9.";
        return false;
    }

    $nohp_int = (int)$nohp;

    if (!is_int($nohp_int)) {
        $errors[] = "Field $field_name harus berupa angka.";
        return false;
    }

    if (strlen($nohp) < 12 || strlen($nohp) > 13) {
        $errors[] = "Field $field_name harus memiliki 12 atau 13 digit.";
        return false;
    }

    return true;
}


function validateURL($field_list, $field_name, &$errors)
{
    $url = trim($field_list[$field_name] ?? '');

    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        $errors[] = "Field $field_name harus berupa URL yang valid.";
        return false;
    }

    return true;
}

function validateFloat($field_list, $field_name, &$errors)
{
    $float = trim($field_list[$field_name] ?? '');

    if (!filter_var($float, FILTER_VALIDATE_FLOAT)) {
        $errors[] = "Field $field_name harus berupa angka desimal yang valid.";
        return false;
    }

    if (!is_float((float)$float) && !is_numeric($float)) {
        $errors[] = "Field $field_name harus berupa tipe numerik.";
        return false;
    }

    return true;
}

function validateIP($field_list, $field_name, &$errors)
{
    $ip = trim($field_list[$field_name] ?? '');

    if (!filter_var($ip, FILTER_VALIDATE_IP)) {
        $errors[] = "Field $field_name harus berupa alamat IP yang valid.";
        return false;
    }

    return true;
}

function validateDateField($field_list, $field_name, &$errors)
{
    $tanggal = trim($field_list[$field_name] ?? '');

    $parts = explode('/', $tanggal);
    if (count($parts) !== 3 || !checkdate($parts[0], $parts[1], $parts[2])) {
        $errors[] = "Field $field_name harus berupa tanggal valid dengan format mm/dd/yyyy.";
        return false;
    }

    return true;
}
?>
