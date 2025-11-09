<form method="post" action="index.php">
    <label>Masukkan nama:</label>
    <input type="text" name="surname" value="<?= $_POST['surname'] ?? '' ?>">
    <span><?= $errors['surname'] ?? '' ?></span><br>
    <input type="submit" value="Kirim">
</form>
