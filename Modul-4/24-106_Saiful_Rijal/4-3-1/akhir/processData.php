<?php
$errors = [];
require 'validate.inc';
if (validateName($_POST, 'surname', $errors))
    echo 'Data OK!';
else
    echo 'Data invalid!';
    foreach ($errors as $err) {
        echo "<p style='color:red;'>$err</p>";
    }
?>