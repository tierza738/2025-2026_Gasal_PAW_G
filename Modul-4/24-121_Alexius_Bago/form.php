<?php
require 'validate.inc';
$errors = [];

$surname   = $_POST['surname']   ?? '';
$email     = $_POST['email']     ?? '';
$age       = $_POST['age']       ?? '';
$birthdate = $_POST['birthdate'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($surname === '' && $email === '' && $age === '' && $birthdate === '') {
  } else {
    validateName($_POST, 'surname', $errors);
    validateEmail($_POST, 'email', $errors);
    validateAge($_POST, 'age', $errors);
    validateDateField($_POST, 'birthdate', $errors);
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Eksplorasi Validasi Server-side</title>
</head>
<body>
  <?php
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    require 'form.inc';
  } else {
    if ($surname === '' && $email === '' && $age === '' && $birthdate === '') {
      require 'form.inc';
    }
    else if (empty($errors)) {
      echo "<p style='color:green'>Form submitted successfully with no errors!</p>";
    }
    else {
      foreach ($errors as $msg) {
        echo "<p style='color:red'>$msg</p>";
      }
      require 'form.inc';
    }
  }
  ?>
</body>
</html>