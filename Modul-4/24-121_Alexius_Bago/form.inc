<form action="form.php" method="post">
    <label for="surname">Surname:</label>
    <input type="text" id="surname" name="surname" value="<?php echo isset($surname) ? htmlspecialchars($surname) : ''; ?>"><br><br>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>"><br><br>

    <label for="age">Age:</label>
    <input type="text" id="age" name="age" value="<?php echo isset($age) ? htmlspecialchars($age) : ''; ?>"><br><br>

    <label for="birthdate">Birthdate (YYYY-MM-DD):</label>
    <input type="text" id="birthdate" name="birthdate" value="<?php echo isset($birthdate) ? htmlspecialchars($birthdate) : ''; ?>"><br><br>

    <input type="submit" value="Submit">
</form>