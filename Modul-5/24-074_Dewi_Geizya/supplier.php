<?php
require __DIR__ . '/koneksi.php';
$action = $_GET['action'] ?? '';

// Hapus (action=delete&id=...)
if ($action === 'delete') {
  $id = (int)($_GET['id'] ?? 0);
  if ($id > 0) {
    $stmt = mysqli_prepare($conn, 'DELETE FROM supplier WHERE id = ?');
    if ($stmt) {
      mysqli_stmt_bind_param($stmt, 'i', $id);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      flash('ok', 'Supplier dihapus.');
    }
  }
  header('Location: ' . base_url() . 'supplier.php');
  exit;
}

if ($action === 'add') {
  if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $telp = trim($_POST['telp'] ?? '');
    $alamat = trim($_POST['alamat'] ?? '');
    if ($nama === '' || $telp === '') {
      flash('err', 'Nama dan Telp wajib diisi.');

    } else {
      $stmt = mysqli_prepare($conn, 'INSERT INTO supplier (nama, telp, alamat) VALUES (?, ?, ?)');
      if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sss', $nama, $telp, $alamat);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
      }
      flash('ok', 'Supplier berhasil ditambah.');
      header('Location: ' . base_url() . 'supplier.php');
      exit;
    }
  }
  
}


$editData = null;
if ($action === 'edit') {
  $id = (int)($_GET['id'] ?? 0);
  if ($id <= 0) {
    flash('err', 'ID tidak valid.');
    header('Location: ' . base_url() . 'supplier.php');
    exit;
  }
 
  $stmt = mysqli_prepare($conn, 'SELECT id, nama, telp, alamat FROM supplier WHERE id = ?');
  if ($stmt) {
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $rid, $rnama, $rtelp, $ralamat);
    if (mysqli_stmt_fetch($stmt)) {
      $editData = ['id' => $rid, 'nama' => $rnama, 'telp' => $rtelp, 'alamat' => $ralamat];
    }
    mysqli_stmt_close($stmt);
  }
  if (!$editData) {
    flash('err', 'Data tidak ditemukan.');
    header('Location: ' . base_url() . 'supplier.php');
    exit;
  }

  if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $telp = trim($_POST['telp'] ?? '');
    $alamat = trim($_POST['alamat'] ?? '');
    if ($nama === '' || $telp === '') {
      flash('err', 'Nama dan Telp wajib diisi.');
      // tetap tampil form dengan $editData
    } else {
      $upd = mysqli_prepare($conn, 'UPDATE supplier SET nama = ?, telp = ?, alamat = ? WHERE id = ?');
      if ($upd) {
        mysqli_stmt_bind_param($upd, 'sssi', $nama, $telp, $alamat, $id);
        mysqli_stmt_execute($upd);
        mysqli_stmt_close($upd);
      }
      flash('ok', 'Data supplier diupdate.');
      header('Location: ' . base_url() . 'supplier.php');
      exit;
    }
  }
}


$rows = []; 
$res = mysqli_query($conn, 'SELECT id, nama, telp, alamat FROM supplier ORDER BY id ASC');
if ($res) {
  $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
  mysqli_free_result($res);
}
?>


<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Master Supplier</title>
  <link href="assets/style.css" rel="stylesheet">
  <style>
*{box-sizing:border-box;}
html,body{margin:0;padding:0;}
body{background:#f8fafc;color:#0f172a;font-family:Poppins;}
.wadah{max-width:980px;margin:0 auto;padding:0 16px;}
.jarak{margin-top:1.5rem;margin-bottom:1.5rem;}
.bawah0{margin-bottom:0;}
.bawah3{margin-bottom:1rem;}
.flex{display:flex;}
.celah2{gap:.5rem;}
.kanan{margin-left:auto;}
.antara{justify-content:space-between;}
.sejajar{align-items:center;}
.tengah{text-align:center;}
.redup{color:#6b7280;}
.navigasi{background:#fff;border-bottom:1px solid #e5e7eb;}
.navigasi .wadah{display:flex;align-items:center;min-height:56px;}
.merek{font-weight:700;letter-spacing:.5px;color:#111827;text-decoration:none;}
.bgputih{background:#fff;}
.garisbawah{border-bottom:1px solid #e5e7eb;}
.kartu{background:#fff;border:1px solid #e5e7eb;border-radius:14px;}
.isi{padding:16px;}
.bayangan{box-shadow:0 1px 2px rgba(0,0,0,.04);} 


.pesan{padding:12px 14px;border-radius:10px;margin-bottom:12px;}
.pesanok{background:#ecfdf5;color:#065f46;border:1px solid #a7f3d0;}
.pesanerr{background:#fef2f2;color:#991b1b;border:1px solid #fecaca;}


.tombol{display:inline-block;padding:8px 12px;border-radius:2px;border:1px solid transparent;cursor:pointer;font-weight:600;background:#e5e7eb;color:#111827;text-decoration:none;}
.kecil{padding:6px 10px;font-size:.9rem;}
.utama{background:#2563eb;border-color:#2563eb;color:#fff;text-decoration:none;}
.utama:hover{background:#1e40af;border-color:#1e40af;text-decoration:none;}
.sukses{background:#16a34a;border-color:#16a34a;color:#fff;text-decoration:none;}
.sukses:hover{background:#15803d;border-color:#15803d;text-decoration:none;}
.bahaya{background:#dc2626;border-color:#dc2626;color:#fff;text-decoration:none;}
.bahaya:hover{background:#b91c1c;border-color:#b91c1c;text-decoration:none;}
.awas{background:#f59e0b;border-color:#f59e0b;color:#111827;text-decoration:none;}
.awas:hover{background:#d97706;border-color:#d97706;text-decoration:none;}
.tombol + .tombol{
    margin-left:6px;
}


.label{display:block;font-weight:600;margin-bottom:6px;}
.input{width:100%;padding:10px 12px;border:1px solid #cbd5e1;border-radius:10px;background:#fff;color:#0f172a;}
.input:focus{outline:none;border-color:#2563eb;box-shadow:0 0 0 3px rgba(37,99,235,.15);} 


.tabel{width:100%;border-collapse:collapse;background:#fff;border:1px solid #e5e7eb;}
.tabel thead th{white-space:nowrap;font-weight:700;background:#f1f5f9;}
.tabel td,.tabel th{padding:10px 12px;vertical-align:middle;border:1px solid #e5e7eb;}
.tabelselang tbody tr:nth-child(even){background:#f8fafc;}
.tabelres{width:100%;overflow:auto;}
.tengahvert td,.tengahvert th{vertical-align:middle;}
  </style>
</head>
<body>

<nav class="navigasi bgputih garisbawah">
  <div class="wadah">
    <a class="merek" href="<?= base_url() ?>supplier.php">Data Master Supplier</a>
    <div class="kanan"></div>
  </div>
</nav>

<main class="wadah jarak">
  <div class="flex antara sejajar bawah3">
    <h4 class="bawah0"> </h4>
    <a href="<?= base_url() ?>supplier.php?action=add" class="tombol sukses">Tambah Data</a>
  </div>

  <?php if ($m = flash('ok')): ?><div class="pesan pesanok"><?= htmlspecialchars($m) ?></div><?php endif; ?>
  <?php if ($m = flash('err')): ?><div class="pesan pesanerr"><?= htmlspecialchars($m) ?></div><?php endif; ?>
  <?php if ($action === 'add'): ?>
    <h4 class="mb-3">Tambah Data Master Supplier Baru</h4>
    <div class="kartu bayangan"><div class="isi">
      <?php if ($m = flash('err')): ?><div class="pesan pesanerr"><?= htmlspecialchars($m) ?></div><?php endif; ?>
      <form method="post">
        <div class="bawah3">
          <label class="label">Nama</label>
          <input class="input" name="nama" placeholder="Nama">
        </div>
        <div class="bawah3">
          <label class="label">Telp</label>
          <input class="input" name="telp" placeholder="telp">
        </div>
        <div class="bawah3">
          <label class="label">Alamat</label>
          <input class="input" name="alamat" placeholder="alamat">
        </div>
        <div class="flex celah2">
          <button class="tombol sukses" type="submit">Simpan</button>
          <a class="tombol bahaya" href="<?= base_url() ?>supplier.php">Batal</a>
        </div>
      </form>
    </div></div>

  <?php elseif ($action === 'edit' && $editData): ?>
    <h4 class="mb-3">Edit Data Master Supplier</h4>
    <div class="kartu bayangan"><div class="isi">
      <?php if ($m = flash('err')): ?><div class="pesan pesanerr"><?= htmlspecialchars($m) ?></div><?php endif; ?>
      <form method="post">
        <div class="bawah3">
          <label class="label">Nama</label>
          <input class="input" name="nama" value="<?= htmlspecialchars($editData['nama']) ?>" required>
        </div>
        <div class="bawah3">
          <label class="label">Telp</label>
          <input class="input" name="telp" value="<?= htmlspecialchars($editData['telp']) ?>" required>
        </div>
        <div class="bawah3">
          <label class="label">Alamat</label>
          <input class="input" name="alamat" value="<?= htmlspecialchars($editData['alamat']) ?>">
        </div>
        <div class="flex celah2">
          <button class="tombol sukses" type="submit">Update</button>
          <a class="tombol bahaya" href="<?= base_url() ?>supplier.php">Batal</a>
        </div>
      </form>
    </div></div>

  <?php else: ?>
    <div class="kartu bayangan">
      <div class="isi">
        <div class="tabelres">
          <table class="tabel tabelselang tengahvert">
            <thead>
              <tr>
                <th style="width:60px">No</th>
                <th>Nama</th>
                <th>Telp</th>
                <th>Alamat</th>
                <th style="width:200px">Tindakan</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!$rows): ?>
                <tr><td colspan="5" class="tengah redup">Belum ada data</td></tr>
              <?php else: ?>
                <?php $no=1; foreach ($rows as $r): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= htmlspecialchars($r['nama']) ?></td>
                  <td><?= htmlspecialchars($r['telp']) ?></td>
                  <td><?= htmlspecialchars($r['alamat']) ?></td>
                  <td>
                    <a class="tombol kecil awas" href="<?= base_url() ?>supplier.php?action=edit&id=<?= (int)$r['id'] ?>">Edit</a>
                    <a class="tombol kecil bahaya" href="<?= base_url() ?>supplier.php?action=delete&id=<?= (int)$r['id'] ?>" onclick="return confirm('Anda yakin akan menghapus supplier ini?')">Hapus</a>
                  </td>
                </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  <?php endif; ?>
</main>
</body>
</html>
