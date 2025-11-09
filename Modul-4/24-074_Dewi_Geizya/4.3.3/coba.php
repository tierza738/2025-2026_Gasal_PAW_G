<?php
require 'validate.inc';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (validateName($_POST, 'surname', $errors)) {

        echo '<h2>Form berhasil dikirim tanpa error</h2>';
        echo '<p>Terima kasih. Data surname: ' . htmlspecialchars($_POST['surname']) . '</p>';
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
} else {
    include 'form.inc';
}

    echo '<h3>Data yang dikirim:</h3>';
    echo '<table border="1" cellpadding="6" cellspacing="0">';
    echo '<tr><th>Field</th><th>Value</th></tr>';
    foreach ($_POST as $k => $v) {
        $val = is_array($v) ? implode(', ', $v) : $v;
        echo '<tr><td>' . htmlspecialchars($k) . '</td><td>' . htmlspecialchars($val) . '</td></tr>';
    }
    echo '</table>';
