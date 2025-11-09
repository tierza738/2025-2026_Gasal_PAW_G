<form action="processData.php" method="post">
    <label>Surname:</label>
    <input type="text" name="surname" value="<?= $surname ?? '' ?>" />
    <button type="submit">Kirim</button>
</form>