<?php
require 'validate.inc';
$errors = [];
$surname = $_POST['surname'];
validateName($errors, $surname);
if (count($errors) == 0){
    echo 'Data OK!';
}else{
    echo 'Data invalid';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="processData.php" method="post">
        <label for="surname">Masukkan nama:</label>
        <input type="text" name="surname"><br>
        <span><?php echo $errors['surname'] ?? " ";?></span><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>