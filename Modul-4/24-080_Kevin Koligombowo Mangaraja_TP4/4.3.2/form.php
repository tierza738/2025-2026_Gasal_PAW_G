<?php
require 'validate.inc';

$error = "";
$surname = "";
$valid = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $surname = $_POST['surname'];

    if (validatename($_POST, 'surname', $error)) {
        $valid = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Validasi Self-Submission</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($valid) {
            echo "<p style='color:green;'>'Form submitted successfully with no errors'</p>";
        } else {
            echo "<p style='color:red;'>Error: $error</p>";
        }
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <label for="surname">Masukkan Nama:</label><br>
        <input type="text" name="surname" id="surname" value="<?php echo htmlspecialchars($surname); ?>"><br><br>

        <input type="submit" value="Kirim">
    </form>
</body>
</html>
