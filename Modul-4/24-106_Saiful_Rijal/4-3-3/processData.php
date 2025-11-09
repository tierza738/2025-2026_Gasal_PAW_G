<?php
require 'validate.inc';

$errors = [];

if (isset($_POST['submit'])) {
    $surname = $_POST['surname'];
    $email   = $_POST['email'];
    $nohp = $_POST['nohp'];
    $url     = $_POST['url'];
    $float   = $_POST['float'];
    $ip      = $_POST['ip'];
    $tanggal = $_POST['tanggal'];

    $isValidName   = validateName($_POST, 'surname', $errors);
    $isValidEmail  = validateEmail($_POST, 'email', $errors);
    $isValidNohp   = validateNohp($_POST, 'nohp', $errors);
    $isValidURL    = validateURL($_POST, 'url', $errors);
    $isValidFloat  = validateFloat($_POST, 'float', $errors);
    $isValidIP     = validateIP($_POST, 'ip', $errors);
    $isValidDate   = validateDateField($_POST, 'tanggal', $errors);

    if ($isValidName && $isValidEmail && $isValidURL && $isValidFloat && $isValidIP && $isValidDate && $isValidNohp) {
        echo "<p style='color:green;'>Semua input valid! Form berhasil dikirim.</p>";
        $surname = $email = $nohp = $url = $float = $ip = $tanggal = '';
    } else {
        echo "<p style='color:red;'>Terjadi error dalam pengisian form:</p>";
        foreach ($errors as $err) {
            echo "<p style='color:red;'>• $err</p>";
        }
    }
}

include 'form.inc';
?>
