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
        <input type="text" name="surname" value="<?= $surname ?? '' ?>"><br>
        <span><?php echo $errors['surname'] ?? " "; ?></span><br>
        
        <label for="email">Masukkan email:</label>
        <input type="text" name="email" placeholder="example@gmail.com" value="<?= $email ?? ''?>"><br>
        <span><?php echo $errors['email'] ?? " "; ?></span><br>

        <input type="submit" name="submit">
    </form>
</body>

</html>