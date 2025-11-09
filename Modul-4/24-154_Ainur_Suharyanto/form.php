<?php
require 'validate.inc';
require 'form.inc';

$errors = array();
$surname = $umur = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $surname = $_POST['surname'];
    $umur    = $_POST['umur'];

    $valid = true;
    if (!validateName($_POST, 'surname', $errors)) $valid = false;
    if (!validateUmur($_POST, 'umur', $errors))    $valid = false;

    if ($valid) {
        echo "<p>Form submitted successfully with no errors!</p>";
    } else {
        echo "<p>error:</p>";
        foreach ($errors as $err)
            echo "<p>$err</p>";
        require 'form.inc';
    }
} else {
    require 'form.inc';
}
?>
