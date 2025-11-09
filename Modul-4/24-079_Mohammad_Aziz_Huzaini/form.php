<?php
require 'validate.inc';
$error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (validateName($_POST, 'surname', $error)) {
        echo "Form submitted successfully with no error";
    } else {
        foreach ($error as $salah) {
            echo $salah;
        }
        include 'form.inc';
    }
} else {
    include 'form.inc';
}
?>
