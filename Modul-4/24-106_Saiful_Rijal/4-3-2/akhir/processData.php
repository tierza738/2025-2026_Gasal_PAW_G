<?php
require 'validate.inc'; 

$errors = [];

if (isset($_POST['submit'])) {
    $surname = $_POST['surname'];
    $email = $_POST['email'];

    $isValidName = validateName($_POST, 'surname', $errors);
    $isValidEmail = validateEmail($_POST, 'email', $errors);

    if (empty($surname) || empty($email)) {
        return include 'form.inc';
    } else if ($isValidName && $isValidEmail) {
        echo "<p style='color:green;'>Form submitted successfully with no errors.</p>";
        $surname = '';
        $email = '';
    } else {
        echo "<p style='color:red;'>Terjadi error dalam pengisian form:</p>";
        foreach ($errors as $err) {
            echo "<p style='color:red;'>• $err</p>";
        }
    }
}

include 'form.inc';
?>
