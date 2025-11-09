<?php
require 'validate.inc';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    validateName($errors, 'name', $_POST['name']);
    validateEmail($errors, 'email', $_POST['email']);
    validateURL($errors, 'website', $_POST['website']);
    validateNumeric($errors, 'age', $_POST['age']);
    validateDate($errors, $_POST['year'], $_POST['month'], $_POST['day']);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
</head>
<body>
<form method="post">
    Nama: <input type="text" name="name"> 
    <span><?= $errors['name'] ?? '' ?></span><br><br>

    Email: <input type="text" name="email"> 
    <span><?= $errors['email'] ?? '' ?></span><br><br>

    Website: <input type="text" name="website"> 
    <span><?= $errors['website'] ?? '' ?></span><br><br>

    Umur: <input type="text" name="age"> 
    <span><?= $errors['age'] ?? '' ?></span><br><br>

    Tanggal Lahir:<br>
    <input type="text" name="day" size="2" placeholder="dd">
    <input type="text" name="month" size="2" placeholder="mm">
    <input type="text" name="year" size="4" placeholder="yyyy">
    <span><?= $errors['date'] ?? '' ?></span><br><br>

    <input type="submit" value="Kirim">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)) {
    echo "<p>Semua input valid!</p>";
}
?>
</body>
</html>
