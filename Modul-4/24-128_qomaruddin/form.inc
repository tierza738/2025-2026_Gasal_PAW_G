<form action="form.php" method="POST">
    <label for="">nama : </label>
    <input type="text" name="nama" value = "<?php echo $nama ?? "" ?>">
    <span><?php echo $error["nama"] ?? "" ?> </span> <br>
    <label for="">nomor : </label>
    <input type = "text" name = "nomor" value = "<?php echo $nomor ?? "" ?>">
    <span><?php echo $error["nomor"] ?? "" ?> </span> <br>
    <input type="submit" name="submit">
</form>