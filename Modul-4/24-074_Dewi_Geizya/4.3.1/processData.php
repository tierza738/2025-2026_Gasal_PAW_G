<?php
require 'validate.inc';

$errors = [];

if (validateName($_POST, 'surname', $errors)) {
    echo 'Data Benar!';
} else {
    echo 'Data tidak valid!';
    echo '<h3>Detail pesan error:</h3>';
    echo '<ul>';
    foreach ($errors as $field => $msg) {
        echo '<li>' . htmlspecialchars($field) . ': ' . htmlspecialchars($msg) . '</li>';
    }
    echo '</ul>';
}
