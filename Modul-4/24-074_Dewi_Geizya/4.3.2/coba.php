<?php
require 'validate.inc';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (validateName($_POST, 'surname', $errors)) {

        echo '<h2>Form berhasil dikirim tanpa error</h2>';
        echo '<p>Terima kasih. Data surname: ' . htmlspecialchars($_POST['surname']) . '</p>';
        // Anda bisa menampilkan data lain jika diperlukan
    } else {
        // Ada error — tayangkan pesan error dan form lagi (dengan nilai yang sudah diisi)
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
    // bukan POST — tampilkan form kosong
    include 'form.inc';
}
