<form action="form.php" method="post">
    <label>Surname:</label>
    <input type="text" name="surname" value="<?php echo isset($_POST['surname']) ? $_POST['surname'] : ''; ?>">
    <button type="submit">Submit</button>
</form>
