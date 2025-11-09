<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data Pribadi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fafafa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .result-box {
            background-color: white;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
            width: 400px;
            text-align: center;
        }

        h3 {
            color: #333;
            margin-bottom: 20px;
        }

        .success {
            color: green;
            text-align: center;
            font-weight: bold;
        }

        .error {
            color: red;
            text-align: center;
            font-weight: bold;
        }

        label {
            font-size: 14px;
            color: #333;
            display: block;
            text-align: left;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea,
        select,
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
            box-sizing: border-box;
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin-right: 5px;
        }

        .radio-group {
            margin-top: 5px;
            text-align: left;
        }

        .checkbox-group {
            margin-top: 5px;
            display: flex;
            flex-direction: column;
            text-align: left;
        }

        .checkbox-group label {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        input[type="submit"] {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background-color: #7367f0;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #5e55d3;
        }

        input:focus, textarea:focus, select:focus {
            border-color: #7367f0;
            outline: none;
            box-shadow: 0 0 3px rgba(115,103,240,0.5);
        }

        small {
            color: red;
            display: block;
            margin-top: 4px;
            text-align: left;
            font-size: 12px;
        }
    </style>
</head>
<body>

<?php
require 'validate.inc'; // memanggil file validasi

$errors = [];
$isSubmitted = ($_SERVER['REQUEST_METHOD'] === 'POST');

if ($isSubmitted) {
    $valid = true;

    // Validasi field wajib
    $requiredFields = ['username', 'email', 'password', 'address', 'state', 'gender'];
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $errors[$field] = "Harap isi form ini";
            $valid = false;
        }
    }

    // Validasi tambahan menggunakan fungsi di validate.inc
    if (!empty($_POST['username']) && !validateName($_POST, 'username', $errors)) $valid = false;
    if (!empty($_POST['email']) && !validateEmail($_POST, 'email', $errors)) $valid = false;
    if (!empty($_POST['password']) && !validatePassword($_POST, 'password', $errors)) $valid = false;
    if (!empty($_POST['state']) && !validateSemester($_POST, 'state', $errors)) $valid = false;

    // Validasi tanggal lahir
    if (!empty($_POST['day']) && !empty($_POST['month']) && !empty($_POST['year'])) {
        if (!validateDateField($_POST, $errors)) $valid = false;
    } else {
        $errors['tanggal'] = "Harap isi tanggal lahir dengan lengkap!";
        $valid = false;
    }

    if ($valid) {
        // Jika semua validasi berhasil
        echo "<div class='result-box'>";
        echo "<h3 class='success'>Form submitted successfully with no errors</h3>";
        echo "<p><strong>Data Anda:</strong></p>";
        echo "<p>Nama: " . htmlspecialchars(strtoupper($_POST['username'])) . "</p>";
        echo "<p>Email: " . htmlspecialchars(strtolower($_POST['email'])) . "</p>";
        echo "<p>Semester: " . htmlspecialchars($_POST['state']) . "</p>";
        echo "<p>Tanggal Lahir: " . htmlspecialchars($_POST['day']) . "-" . htmlspecialchars($_POST['month']) . "-" . htmlspecialchars($_POST['year']) . "</p>";
        echo "</div>";
    } else {
        // Jika ada error, tampilkan kembali form beserta pesan error
        echo "<div class='result-box'>";
        echo "<h3 class='error'>Form error, silakan isi kembali!</h3>";
        include 'form.inc';
        echo "</div>";
    }
} else {
    // Saat pertama kali halaman dibuka
    echo "<div class='result-box'>";
    include 'form.inc';
    echo "</div>";
}
?>

</body>
</html>
