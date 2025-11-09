<?php
require 'validate.inc';
$errors = [];

validateName($_POST, 'surname', $errors);
validateRequired($_POST, 'username', $errors);
validateEmail($_POST, 'email', $errors);
validatePassword($_POST, 'password', $errors, 6);

validateUsernameRegex($_POST, 'username', $errors); // regex contoh
normalizeAndCheckSurname($_POST, 'surname', $errors); // string funcs example
validateURL($_POST, 'website', $errors); // filter example
validateFloatRange($_POST, 'gpa', $errors, 0.0, 4.0); // float example
validateIP($_POST, 'ip', $errors); // ip example
validateNumeric($_POST, 'gpa', $errors); // type testing

$bday = $_POST['bday'] ?? '';
$bmonth = $_POST['bmonth'] ?? '';
$byear = $_POST['byear'] ?? '';
validateDateParts($bday, $bmonth, $byear, $errors, 'birthdate');


if (isset($_POST['semester'])) {
    $s = (int)$_POST['semester'];
    if ($s < 1 || $s > 8) {
        $errors['semester'] = 'Semester tidak valid.';
    }
} else {
    $errors['semester'] = 'Kolom tidak boleh kosong.';
}

if (empty($errors)) {
    echo '<h2>Form berhasil dikirim tanpa error</h2>';
    echo '<p>Terima kasih. Berikut ringkasan input:</p>';
    echo '<table border="1" cellpadding="6" cellspacing="0">';
    echo '<tr><th>Field</th><th>Value</th></tr>';
    $fields = ['surname','username','email','alamat','semester','country','gender'];
    foreach ($fields as $f) {
        $v = $_POST[$f] ?? '';
        if (is_array($v)) $v = implode(', ', $v);
        echo '<tr><td>' . htmlspecialchars($f) . '</td><td>' . htmlspecialchars($v) . '</td></tr>';
    }
    echo '</table>';
} else {
    echo '<h2>Form tidak valid</h2>';
    echo '<h3>Detail pesan error:</h3>';
    echo '<ul>';
    foreach ($errors as $field => $msg) {
        echo '<li>' . htmlspecialchars($field) . ': ' . htmlspecialchars($msg) . '</li>';
    }
    echo '</ul>';
    include 'form.inc';
}
