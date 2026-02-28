<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= APP_NAME ?> - <?= $judul ?></title>
  <?php partial('modern_css') ?>
</head>
<body id="page-top">
<div id="wrapper">
  <?php partial('navbar', $aktif) ?>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <?php partial('topbar') ?>
      <div class="main-content">
        <div class="page-header">
          <div><h1>Ubah Akun</h1><p>Perbarui informasi akun administrator</p></div>
          <a href="<?= base_url('akun') ?>" class="btn-mod btn-back-mod"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <div style="max-width:520px;">
          <div class="mod-card">
            <div class="mod-card-header">
              <div class="mod-card-title"><i class="fas fa-pen"></i> Edit Akun</div>
            </div>
            <div class="mod-card-body">
              <form method="POST" action="<?= base_url('akun/proses_ubah/'.$akun->id) ?>" enctype="multipart/form-data">
                <div class="form-group-mod">
                  <label class="form-label-mod" for="nama">Nama Lengkap</label>
                  <input type="text" name="nama" id="nama" class="form-input-mod" value="<?= htmlspecialchars($akun->nama) ?>" required>
                </div>
                <div class="form-group-mod">
                  <label class="form-label-mod" for="username">Username</label>
                  <input type="text" name="username" id="username" class="form-input-mod" value="<?= htmlspecialchars($akun->username) ?>" required>
                </div>
                <div class="form-group-mod">
                  <label class="form-label-mod" for="password">Password Baru</label>
                  <input type="password" name="password" id="password" class="form-input-mod" placeholder="Kosongkan jika tidak mengubah">
                </div>
                <div class="form-group-mod">
                  <label class="form-label-mod" for="password2">Konfirmasi Password</label>
                  <input type="password" name="password2" id="password2" class="form-input-mod" placeholder="Konfirmasi password baru">
                </div>
                <div class="form-group-mod">
                  <label class="form-label-mod">Foto Baru (opsional)</label>
                  <label class="file-upload-mod" for="foto">
                    <i class="fas fa-camera"></i>
                    <span class="file-upload-label" id="foto-label">Ganti foto profil...</span>
                    <input type="file" id="foto" name="foto" accept="image/*" onchange="document.getElementById('foto-label').textContent=this.files[0]?.name||'Ganti foto...'">
                  </label>
                  <?php if($akun->foto): ?>
                  <div style="margin-top:.6rem;display:flex;align-items:center;gap:.5rem;">
                    <img src="<?= base_url('uploads/'.$akun->foto) ?>" alt="" style="height:48px;border-radius:10px;border:1.5px solid var(--border);">
                    <span style="font-size:.75rem;color:var(--text-light);">Foto saat ini</span>
                  </div>
                  <?php endif ?>
                </div>
                <div class="btn-actions">
                  <button type="submit" name="ubah" class="btn-mod btn-success-mod"><i class="fas fa-check"></i> Simpan</button>
                  <button type="reset" class="btn-mod btn-reset-mod"><i class="fas fa-times"></i> Reset</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php partial('footer') ?>
  </div>
</div>
<div class="sidebar-overlay" id="sidebarOverlay"></div>
<a class="scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
<?php partial('modern_js') ?>
</body>
</html>
