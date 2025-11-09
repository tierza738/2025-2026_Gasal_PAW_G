<?php
require 'validate.inc'; 

$errors = [];
// $surname = "";

if (isset($_POST['surname'])) {
    // $surname = $_POST['surname'];

    if (empty($_POST['surname'])) {
        return include 'form.inc';
    } else if (validateName($_POST, 'surname', $errors)) {
        echo "<p style='color:green;'>Form submitted successfully with no errors.</p>";
    } else {
        echo "<p style='color:red;'>Terjadi error dalam pengisian form:</p>";
        foreach ($errors as $err) {
            echo "<p style='color:red;'>• $err</p>";
        }
    }
}

include 'form.inc';
?>
