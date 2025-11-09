<form action="processData.php" method="post">
    <label>Surname:</label>
    <input type="text" name="surname" value="<?= $surname ?? '' ?>" /><br>

    <label for="email">Email:</label>
    <input type="text" name="email" value="<?= $email ?? '' ?>"><br>

    <label for="nohp">Nohp:</label>
    <input type="text" name="nohp" value="<?= $nohp ?? '' ?>"><br>

    <label for="url">Website URL:</label>
    <input type="text" name="url" value="<?= $url ?? '' ?>"><br>

    <label for="float">Angka Desimal:</label>
    <input type="text" name="float" value="<?= $float ?? '' ?>"><br>

    <label for="ip">Alamat IP:</label>
    <input type="text" name="ip" value="<?= $ip ?? '' ?>"><br>

    <label for="tanggal">Tanggal (format: mm/dd/yyyy):</label>
    <input type="text" name="tanggal" value="<?= $tanggal ?? '' ?>"><br>

    <button type="submit" name="submit">Kirim</button>
</form>
