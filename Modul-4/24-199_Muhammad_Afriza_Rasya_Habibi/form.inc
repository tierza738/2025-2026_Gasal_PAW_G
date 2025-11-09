<form action="processData_form.php" method="POST">

    <label>Username</label>
    <input type="text" name="username" 
           value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
    <?php if (!empty($errors['username'])): ?>
        <small style="color:red;"><?= htmlspecialchars($errors['username']) ?></small>
    <?php endif; ?>


    <label>Email</label>
    <input type="email" name="email" 
           value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
    <?php if (!empty($errors['email'])): ?>
        <small style="color:red;"><?= htmlspecialchars($errors['email']) ?></small>
    <?php endif; ?>


    <label>Password</label>
    <input type="password" name="password" value="">
    <?php if (!empty($errors['password'])): ?>
        <small style="color:red;"><?= htmlspecialchars($errors['password']) ?></small>
    <?php endif; ?>


    <label>Alamat</label>
    <textarea name="address" rows="3"><?= htmlspecialchars($_POST['address'] ?? '') ?></textarea>
    <?php if (!empty($errors['address'])): ?>
        <small style="color:red;"><?= htmlspecialchars($errors['address']) ?></small>
    <?php endif; ?>


    <label>Semester</label>
    <select name="state">
        <option value="">-- Pilih Semester --</option>
        <?php
        for ($i = 1; $i <= 8; $i++) {
            $selected = (isset($_POST['state']) && $_POST['state'] == $i) ? 'selected' : '';
            echo "<option value='$i' $selected>$i</option>";
        }
        ?>
    </select>
    <?php if (!empty($errors['state'])): ?>
        <small style="color:red;"><?= htmlspecialchars($errors['state']) ?></small>
    <?php endif; ?>


    <label>Country</label>
    <p><strong>Indonesia</strong></p>
    <input type="hidden" name="country" value="Indonesia">


    <label>Kelamin</label>
    <div class="radio-group">
        <input type="radio" name="gender" value="Laki-laki"
            <?= (($_POST['gender'] ?? '') == 'Laki-laki') ? 'checked' : '' ?>> Laki-Laki
        <input type="radio" name="gender" value="Perempuan"
            <?= (($_POST['gender'] ?? '') == 'Perempuan') ? 'checked' : '' ?>> Perempuan
    </div>
    <?php if (!empty($errors['gender'])): ?>
        <small style="color:red;"><?= htmlspecialchars($errors['gender']) ?></small>
    <?php endif; ?>


    <label>Hobi</label>
    <div class="checkbox-group">
        <label>
            <input type="checkbox" name="hobi[]" value="Mancing"
                <?= (isset($_POST['hobi']) && in_array('Mancing', $_POST['hobi'])) ? 'checked' : '' ?>>
            Mancing
        </label>
        <label>
            <input type="checkbox" name="hobi[]" value="Tidur"
                <?= (isset($_POST['hobi']) && in_array('Tidur', $_POST['hobi'])) ? 'checked' : '' ?>>
            Tidur
        </label>
    </div>

    <!-- Tambahan bagian TANGGAL LAHIR -->
    <label>Tanggal Lahir</label>
    <div style="display: flex; gap: 5px;">
        <input type="number" name="day" placeholder="Hari" min="1" max="31"
               value="<?= htmlspecialchars($_POST['day'] ?? '') ?>" style="width: 30%;">
        <input type="number" name="month" placeholder="Bulan" min="1" max="12"
               value="<?= htmlspecialchars($_POST['month'] ?? '') ?>" style="width: 30%;">
        <input type="number" name="year" placeholder="Tahun" min="1900" max="2100"
               value="<?= htmlspecialchars($_POST['year'] ?? '') ?>" style="width: 40%;">
    </div>
    <?php if (!empty($errors['tanggal'])): ?>
        <small style="color:red;"><?= htmlspecialchars($errors['tanggal']) ?></small>
    <?php endif; ?>


    <input type="submit" value="Submit">
</form>
