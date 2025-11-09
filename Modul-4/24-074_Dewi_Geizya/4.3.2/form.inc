<?php
// form.inc - hanya berisi elemen <form> (self-submission)
// Variabel yang dipakai saat include: $errors (array) dan $_POST
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
  <label for="surname">Surname</label><br />
  <input type="text" id="surname" name="surname"
         value="<?php echo isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : ''; ?>" />
  <br />
  <?php if (!empty($errors['surname'])): ?>
    <div style="color: #b00;"><?php echo htmlspecialchars($errors['surname']); ?></div>
  <?php endif; ?>
  <br />

  <label for="username">Username</label><br />
  <input type="text" id="username" name="username"
         value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" /><br /><br />

  <label for="email">Email</label><br />
  <input type="email" id="email" name="email" 
         value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" /><br /><br />

  <label for="password">Password</label><br />
  <input type="password" id="password" name="password" /><br /><br />

  <label for="alamat">Alamat</label><br />
  <textarea id="alamat" name="alamat" rows="4" cols="30"><?php echo isset($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : ''; ?></textarea>
  <br /><br />

  <label for="semester">Semester</label><br />
  <select id="semester" name="semester">
    <?php for ($i = 1; $i <= 8; $i++): ?>
      <option value="<?php echo $i; ?>" <?php echo (isset($_POST['semester']) && (string)$_POST['semester'] === (string)$i) ? 'selected' : ''; ?>><?php echo $i; ?></option>
    <?php endfor; ?>
  </select>
  <br /><br />

  <input type="hidden" name="country" value="Indonesia" />

  <p>Kelamin</p>
  <input type="radio" id="laki" name="gender" value="Laki-laki" <?php echo (!isset($_POST['gender']) || $_POST['gender'] === 'Laki-laki') ? 'checked' : ''; ?> />
  <label for="laki">Laki-laki</label>
  <input type="radio" id="perempuan" name="gender" value="Perempuan" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'Perempuan') ? 'checked' : ''; ?> />
  <label for="perempuan">Perempuan</label><br /><br />

  <p>Hobi:</p>
  <?php
    $hobi_list = ['Membaca','Menyanyi','Memasak','Menggambar'];
    foreach ($hobi_list as $idx => $h):
      $checked = '';
      if (isset($_POST['hobi']) && is_array($_POST['hobi']) && in_array($h, $_POST['hobi'])) $checked = 'checked';
  ?>
    <input type="checkbox" id="hobi<?php echo $idx+1; ?>" name="hobi[]" value="<?php echo htmlspecialchars($h); ?>" <?php echo $checked; ?> />
    <label for="hobi<?php echo $idx+1; ?>"><?php echo htmlspecialchars($h); ?></label><br />
  <?php endforeach; ?>

  <br />
  <input type="submit" value="submit" />
</form>
