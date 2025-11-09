<?php
require 'validate.inc';

$errors = [];
$values = ['surname'=>'','email'=>'','website'=>'','price'=>'','ip_address'=>'','birthdate'=>''];
$submitted = $_SERVER['REQUEST_METHOD'] === 'POST';
$success = false;

if ($submitted) {
    // collect values (sticky form)
    $values = array_map('trim', [
        'surname' => $_POST['surname'] ?? '',
        'email' => $_POST['email'] ?? '',
        'website' => $_POST['website'] ?? '',
        'price' => $_POST['price'] ?? '',
        'ip_address' => $_POST['ip_address'] ?? '',
        'birthdate' => $_POST['birthdate'] ?? ''
    ]);

    // run validations (functions append messages into $errors by reference)
    validateName($_POST, 'surname', $errors);                 // regex + string checks
    validateEmail($_POST, 'email', $errors);                  // filter_var FILTER_VALIDATE_EMAIL
    validateURL($_POST, 'website', $errors);                  // FILTER_VALIDATE_URL
    validateFloat($_POST, 'price', $errors);                  // is_numeric / FILTER_VALIDATE_FLOAT
    validateIP($_POST, 'ip_address', $errors);                // FILTER_VALIDATE_IP
    validateBirthdate($_POST, 'birthdate', $errors);          // checkdate + date parsing

    if (empty($errors)) {
        $success = true;
    }
}

// include form markup
include 'form.inc';
?>