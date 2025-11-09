<?php
require 'validate.inc';

$errors = [];
$data = [];
$success_message = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST;
    validateUsername($data, $errors, 'username');
    validateEmail($data, $errors, 'email');
    validateRequired($data, $errors, 'password', 'Password');
    validateRequired($data, $errors, 'alamat', 'Alamat');
    validateRequired($data, $errors, 'semester', 'Semester');
    validateRequired($data, $errors, 'kelamin', 'Kelamin');


    if (empty($errors)) {
        $success_message = 'Form submitted successfully with no errors!';
        $data = []; 
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran (Validasi Server-side)</title>
    
<style>
    /* CSS untuk membuat tampilan mirip gambar */
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background-color: #f9f9f9;
    }

    /* Wadah form */
    form {
        max-width: 450px;
        margin: 0 auto;
        padding: 25px;
        background-color: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
    }

    /* Grup untuk setiap field (label + input) */
    div.field-group {
        margin-bottom: 15px;
    }

    /* Grup untuk radio dan checkbox */
    fieldset {
        border: none;
        padding: 0;
        margin: 0;
        margin-bottom: 15px;
    }

    /* Label di atas input */
    label,
    legend {
        display: block;
        margin-bottom: 6px;
        font-weight: 600; /* Sedikit tebal */
        color: #333;
    }

    /* Input box (text, email, password), textarea, dan dropdown */
    input[type="text"],
    input[type="email"],
    input[type="password"],
    textarea,
    select {
        width: 100%; /* Lebar penuh */
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box; /* Penting agar padding tidak merusak lebar */
    }

    /* Mengatur tinggi textarea */
    textarea {
        height: 100px;
        resize: vertical;
    }

    /* Label untuk pilihan radio & checkbox (agar sejajar) */
    label.choice-label {
        display: inline-block;
        font-weight: normal;
        margin-left: 5px;
        margin-right: 20px;
    }

    /* Tombol Submit */
    button[type="submit"] {
        background-color: #4A4DEE; /* Warna biru seperti di gambar */
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
    }

    button[type="submit"]:hover {
        background-color: #3A3DAA; /* Warna biru lebih gelap saat di-hover */
    }
</style>

</head>
<body>

    <?php if ($success_message): ?>
        <div class="success-message">
            <?php echo $success_message; ?>
        </div>
    <?php endif; ?>

    <?php include 'form.inc'; ?>

</body>
</html>