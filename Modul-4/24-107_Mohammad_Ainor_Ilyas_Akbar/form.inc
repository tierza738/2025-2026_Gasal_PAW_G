<?php
// form.inc - form markup with sticky values and inline errors
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Validasi Lanjutan (4.3.3) - Contoh</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <style>
    body { font-family: Arial,Helvetica,sans-serif; padding: 20px; }
    .error { color: #b00020; }
    .field { margin-bottom: 12px; }
    label { display:block; margin-bottom:4px; }
    input[type=text], input[type=number], input[type=email], input[type=date] { padding:8px; width:320px; }
    .success { background:#e6ffed; border:1px solid #2e7d32; padding:10px; margin-bottom:12px; }
  </style>
</head>
<body>
  <h1>Eksplorasi Validasi Server-side (4.3.3)</h1>

  <?php if (!empty($success)): ?>
    <div class="success">
      Form submitted successfully with no errors.<br>
      <strong>Submitted data:</strong>
      <ul>
        <li>Surname: <?= htmlspecialchars($values['surname']) ?></li>
        <li>Email: <?= htmlspecialchars($values['email']) ?></li>
        <li>Website: <?= htmlspecialchars($values['website']) ?></li>
        <li>Price: <?= htmlspecialchars($values['price']) ?></li>
        <li>IP Address: <?= htmlspecialchars($values['ip_address']) ?></li>
        <li>Birthdate: <?= htmlspecialchars($values['birthdate']) ?></li>
      </ul>
    </div>
  <?php endif; ?>

  <?php if (!empty($errors)): ?>
    <div class="error">
      <strong>Ada error pada form:</strong>
      <ul>
        <?php foreach ($errors as $field => $msg): ?>
          <li><?= htmlspecialchars($field) ?>: <?= htmlspecialchars($msg) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <form method="post" action="index.php" novalidate>
    <div class="field">
      <label for="surname">Surname (alfabet):</label>
      <input id="surname" name="surname" type="text" value="<?= htmlspecialchars($values['surname']) ?>">
      <?php if (!empty($errors['surname'])): ?><div class="error"><?= htmlspecialchars($errors['surname']) ?></div><?php endif; ?>
    </div>

    <div class="field">
      <label for="email">Email:</label>
      <input id="email" name="email" type="email" value="<?= htmlspecialchars($values['email']) ?>">
      <?php if (!empty($errors['email'])): ?><div class="error"><?= htmlspecialchars($errors['email']) ?></div><?php endif; ?>
    </div>

    <div class="field">
      <label for="website">Website (optional):</label>
      <input id="website" name="website" type="text" value="<?= htmlspecialchars($values['website']) ?>">
      <?php if (!empty($errors['website'])): ?><div class="error"><?= htmlspecialchars($errors['website']) ?></div><?php endif; ?>
    </div>

    <div class="field">
      <label for="price">Price (float):</label>
      <input id="price" name="price" type="text" value="<?= htmlspecialchars($values['price']) ?>">
      <?php if (!empty($errors['price'])): ?><div class="error"><?= htmlspecialchars($errors['price']) ?></div><?php endif; ?>
    </div>

    <div class="field">
      <label for="ip_address">IP Address (optional):</label>
      <input id="ip_address" name="ip_address" type="text" value="<?= htmlspecialchars($values['ip_address']) ?>">
      <?php if (!empty($errors['ip_address'])): ?><div class="error"><?= htmlspecialchars($errors['ip_address']) ?></div><?php endif; ?>
    </div>

    <div class="field">
      <label for="birthdate">Birthdate (YYYY-MM-DD or DD/MM/YYYY):</label>
      <input id="birthdate" name="birthdate" type="text" placeholder="YYYY-MM-DD or DD/MM/YYYY" value="<?= htmlspecialchars($values['birthdate']) ?>">
      <?php if (!empty($errors['birthdate'])): ?><div class="error"><?= htmlspecialchars($errors['birthdate']) ?></div><?php endif; ?>
    </div>

    <button type="submit">Submit</button>
  </form>

  <hr>
  <p><em>Penjelasan singkat:</em> Implementasi ini menunjukkan contoh penggunaan:
    <ul>
      <li>Regular expression: preg_match untuk nama dan parsing tanggal</li>
      <li>String functions: trim(), strtolower()</li>
      <li>Filter: filter_var dengan FILTER_VALIDATE_EMAIL, FILTER_VALIDATE_URL, FILTER_VALIDATE_FLOAT, FILTER_VALIDATE_IP</li>
      <li>Type testing: is_numeric</li>
      <li>Date check: checkdate()</li>
    </ul>
  </p>
</body>
</html>
