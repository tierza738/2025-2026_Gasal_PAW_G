<?php
// Fungsi bantuan untuk menampilkan pesan error
function showError($field) {
    global $errors;
    if (isset($errors[$field])) {
        echo '<div class="error-message">' . $errors[$field] . '</div>';
    }
}

// Fungsi bantuan untuk mengisi data lama (repopulasi) 
function old($field, $default = '') {
    global $data;
    // htmlspecialchars() penting untuk keamanan (mencegah XSS)
    return htmlspecialchars($data[$field] ?? $default);
}

// Fungsi bantuan untuk radio button
function isChecked($field, $value) {
    global $data;
    return (isset($data[$field]) && $data[$field] == $value) ? 'checked' : '';
}

// Fungsi bantuan untuk checkbox (array)
function isCheckedArray($field, $value) {
    global $data;
    return (isset($data[$field]) && is_array($data[$field]) && in_array($value, $data[$field])) ? 'checked' : '';
}

// Fungsi bantuan untuk dropdown/select
function isSelected($field, $value) {
    global $data;
    return (isset($data[$field]) && $data[$field] == $value) ? 'selected' : '';
}


?>

<form action="" method="POST">

    <div class="field-group">
        <label for="username">username</label>
        <input type="text" id="username" name="username" value="<?php echo old('username'); ?>">
        <?php showError('username'); ?>
    </div>

    <div class="field-group">
        <label for="email">email</label>
        <input type="email" id="email" name="email" value="<?php echo old('email'); ?>">
        <?php showError('email'); ?>
    </div>

    <div class="field-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" value="">
        <?php showError('password'); ?>
    </div>

    <div class="field-group">
        <label for="alamat">alamat</label>
        <textarea id="alamat" name="alamat"><?php echo old('alamat'); ?></textarea>
        <?php showError('alamat'); ?>
    </div>

    <div class="field-group">
        <label for="semester">Semester</label>
        <select id="semester" name="semester">
            <option value="" <?php echo isSelected('semester', ''); ?>>-- Pilih Semester --</option>
            <option value="1" <?php echo isSelected('semester', '1'); ?>>1</option>
            <option value="2" <?php echo isSelected('semester', '2'); ?>>2</option>
            <option value="3" <?php echo isSelected('semester', '3'); ?>>3</option>
            <option value="4" <?php echo isSelected('semester', '4'); ?>>4</option>
            <option value="5" <?php echo isSelected('semester', '5'); ?>>5</option>
        </select>
        <?php showError('semester'); ?>
    </div>

    <input type="hidden" name="country" value="Indonesia">

    <fieldset>
        <legend>Kelamin</legend>
        <input type="radio" id="laki" name="kelamin" value="Laki-Laki" <?php echo isChecked('kelamin', 'Laki-Laki'); ?>>
        <label for="laki" class="choice-label">Laki Laki</label>

        <input type="radio" id="perempuan" name="kelamin" value="Perempuan" <?php echo isChecked('kelamin', 'Perempuan'); ?>>
        <label for="perempuan" class="choice-label">Perempuan</label>
        <?php showError('kelamin'); // Menampilkan error di bawah grup ?>
    </fieldset>

    <fieldset>
        <legend>Hobi</legend>
        <input type="checkbox" id="mancing" name="hobi[]" value="Mancing" <?php echo isCheckedArray('hobi', 'Mancing'); ?>>
        <label for="mancing" class="choice-label">Mancing</label>

        <?php
        // Logika untuk 'checked' default pada 'Tidur'
        $tidurChecked = '';
        if (isset($data['hobi'])) {
            // Jika form disubmit, hargai pilihan user
            $tidurChecked = isCheckedArray('hobi', 'Tidur');
        } else if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            // Jika form *tidak* disubmit (beban awal), set 'checked'
            $tidurChecked = 'checked';
        }
        ?>
        <input type="checkbox" id="tidur" name="hobi[]" value="Tidur" <?php echo $tidurChecked; ?>>
        <label for="tidur" class="choice-label">Tidur</label>
    </fieldset>

    <div class="field-group">
        <button type="submit">Submit</button>
    </div>

</form>