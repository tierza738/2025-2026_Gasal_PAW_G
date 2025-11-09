<?php
require "validasi.php";
$erors = [];
$surname = $_POST['surname'] ?? "";
$email = $_POST['email'] ?? "";
$alamat = $_POST['alamat'] ?? "";
$tanggal = $_POST['tanggal'] ?? "";
$url = $_POST['url'] ?? "";
if(isset($_POST['submit'])){
    validateName($erors,$surname);
    validateEmail($erors,$email);
    validateAlamat($erors,$alamat);
    validateTanggal($erors,$tanggal);
    validateUrl($erors,$url);
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
        <input type="text" name="surname" value="<?= $surname ?? '' ?>"><br>
        <span><?php echo $erors['surname'] ?? " "; ?></span><br>
        
        <label for="email">Masukkan email:</label>
        <input type="text" name="email" placeholder="example@gmail.com" value="<?= $email ?? '' ?>"><br>
        <span><?php echo $erors['email'] ?? " "; ?></span><br>
        
        <label for="alamat">Masukkan alamat:</label>
        <input type="text" name="alamat" value="<?= $alamat ?? '' ?>"><br>
        <span><?php echo $erors['alamat'] ?? " "; ?></span><br>
        
        <label for="tanggal">Masukkan tanggal:</label>
        <input type="text" name="tanggal" value="<?= $tanggal ?? '' ?>"><br>
        <span><?php echo $erors['tanggal'] ?? " "; ?></span><br>
        
        <label for="url">Masukkan url:</label>
        <input type="text" name="url" value="<?= $url ?? '' ?>"><br>
        <span><?php echo $erors['url'] ?? " "; ?></span><br>

        <input type="submit" name="submit">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        if(count($erors) == 0){
            echo "<h1>Form submitted successfully with no errors</h1>";
        }
    }
    ?>
</body>

</html>