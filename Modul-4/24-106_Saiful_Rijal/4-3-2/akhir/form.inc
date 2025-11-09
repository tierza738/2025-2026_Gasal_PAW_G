<form action="processData.php" method="post">
    <label>Surname:</label>
    <input type="text" name="surname" value="<?= $surname ?? '' ?>" /><br>
    <label for="email">Email:</label>
    <input type="text" name="email" value="<?= $email ?? '' ?>"><br>
    <button type="submit" name="submit">Kirim</button>
</form>