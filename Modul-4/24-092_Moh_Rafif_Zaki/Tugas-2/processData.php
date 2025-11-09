<?php
$errors = [];
$surname = $_POST['surname'] ?? "";
$email = $_POST['email'] ?? "";

if (empty($_POST['surname']) ) {
    include 'form.inc';
    exit;
}else {
    require 'validate.inc';
    validateName($errors, $surname);
    validateEmail($errors, $email);
    if (count($errors) == 0) {
        echo 'Form submitted successfully with no errors';
    }
}    
include 'form.inc';
?>
