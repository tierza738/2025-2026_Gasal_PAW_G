<?php
// Extended validation for practical exercises 4.3.1 -> 4.3.3
// Each validator appends error messages into $errors (passed by reference).

function validateName($field_list, $field_name, array & $errors) {
    $value = isset($field_list[$field_name]) ? trim($field_list[$field_name]) : '';
    if ($value === '') {
        $errors[$field_name] = 'Nama wajib diisi.';
        return false;
    }
    // use regex for alphabetic names, allow apostrophes and hyphens
    $pattern = "/^[a-zA-Z'-]+$/";
    if (!preg_match($pattern, $value)) {
        $errors[$field_name] = 'Nama hanya boleh berisi alfabet, tanda apostrof (\') atau tanda hubung (-).';
        return false;
    }
    // demonstrate string functions
    $normalized = strtolower($value); // contoh penggunaan strtolower
    // store normalized version back if needed (not required here)
    return true;
}

function validateEmail($field_list, $field_name, array & $errors) {
    $value = isset($field_list[$field_name]) ? trim($field_list[$field_name]) : '';
    if ($value === '') {
        $errors[$field_name] = 'Email wajib diisi.';
        return false;
    }
    // filter_var with FILTER_VALIDATE_EMAIL
    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = 'Format email tidak valid.';
        return false;
    }
    return true;
}

function validateURL($field_list, $field_name, array & $errors) {
    $value = isset($field_list[$field_name]) ? trim($field_list[$field_name]) : '';
    if ($value === '') {
        // website is optional in this example; return true if empty
        return true;
    }
    // ensure scheme present; if user typed without scheme, try adding http:// and test again
    $tested = $value;
    if (!preg_match('/^https?:\/\//i', $tested)) {
        $tested = 'http://' . $tested;
    }
    if (!filter_var($tested, FILTER_VALIDATE_URL)) {
        $errors[$field_name] = 'URL tidak valid.';
        return false;
    }
    return true;
}

function validateFloat($field_list, $field_name, array & $errors) {
    $value = isset($field_list[$field_name]) ? trim($field_list[$field_name]) : '';
    if ($value === '') {
        $errors[$field_name] = 'Harga wajib diisi.';
        return false;
    }
    // try FILTER_VALIDATE_FLOAT (note: accepts locale with dot)
    $opts = ['options' => ['decimal' => '.']];
    if (filter_var($value, FILTER_VALIDATE_FLOAT, $opts) === false && !is_numeric($value)) {
        $errors[$field_name] = 'Harus berupa angka desimal/float.';
        return false;
    }
    return true;
}

function validateIP($field_list, $field_name, array & $errors) {
    $value = isset($field_list[$field_name]) ? trim($field_list[$field_name]) : '';
    if ($value === '') {
        // optional field example
        return true;
    }
    if (!filter_var($value, FILTER_VALIDATE_IP)) {
        $errors[$field_name] = 'Alamat IP tidak valid.';
        return false;
    }
    return true;
}

function validateBirthdate($field_list, $field_name, array & $errors) {
    $value = isset($field_list[$field_name]) ? trim($field_list[$field_name]) : '';
    if ($value === '') {
        $errors[$field_name] = 'Tanggal lahir wajib diisi.';
        return false;
    }
    // Accept formats: YYYY-MM-DD or DD/MM/YYYY
    $parsed = null;
    if (preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $value, $m)) {
        $y = intval($m[1]); $mth = intval($m[2]); $d = intval($m[3]);
    } elseif (preg_match('/^(\d{2})\/(\d{2})\/(\d{4})$/', $value, $m)) {
        $d = intval($m[1]); $mth = intval($m[2]); $y = intval($m[3]);
    } else {
        $errors[$field_name] = 'Format tanggal tidak dikenali (gunakan YYYY-MM-DD atau DD/MM/YYYY).';
        return false;
    }
    // use checkdate
    if (!checkdate($mth, $d, $y)) {
        $errors[$field_name] = 'Tanggal tidak valid.';
        return false;
    }
    // optional: reject future dates
    $date_ts = strtotime(sprintf('%04d-%02d-%02d', $y, $mth, $d));
    if ($date_ts > time()) {
        $errors[$field_name] = 'Tanggal lahir tidak boleh di masa depan.';
        return false;
    }
    return true;
}
?>