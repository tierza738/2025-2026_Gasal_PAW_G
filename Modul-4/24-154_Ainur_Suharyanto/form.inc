    <form action="form.php" method="post">
        <label for="surname">Surname:</label>
        <input type="text" name="surname" id="surname" value="<?php echo isset($surname)  ? htmlspecialchars($surname) : ''; ?>">
        <br><br>
        <label for="umur">Umur:</label>
        <input type="text" name="umur" id="umur" value="<?php echo isset($umur)  ? htmlspecialchars($umur) : ''; ?>">
        
        <br><br>
        <input type="submit" value="Submit">
    </form>
