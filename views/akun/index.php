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
          <div><h1>Manajemen Akun</h1><p>Kelola akun administrator sistem</p></div>
        </div>

        <div class="content-grid">
          <!-- FORM -->
          <div class="mod-card">
            <div class="mod-card-header">
              <div class="mod-card-title"><i class="fas fa-user-plus"></i> Tambah Akun</div>
            </div>
            <div class="mod-card-body">
              <form method="POST" action="<?= base_url('akun/tambah') ?>" enctype="multipart/form-data">

                <div class="form-group-mod">
                  <label class="form-label-mod" for="nama">Nama Lengkap</label>
                  <input type="text" name="nama" id="nama" class="form-input-mod" placeholder="Nama lengkap" required autocomplete="off">
                </div>

                <div class="form-group-mod">
                  <label class="form-label-mod" for="username">Username</label>
                  <input type="text" name="username" id="username" class="form-input-mod" placeholder="Username login" required autocomplete="off">
                </div>

                <div class="form-group-mod">
                  <label class="form-label-mod" for="password">Password</label>
                  <input type="password" name="password" id="password" class="form-input-mod" placeholder="••••••••" required>
                </div>

                <div class="form-group-mod">
                  <label class="form-label-mod" for="password2">Konfirmasi Password</label>
                  <input type="password" name="password2" id="password2" class="form-input-mod" placeholder="••••••••" required>
                </div>

                <div class="form-group-mod">
                  <label class="form-label-mod">Foto Profil</label>
                  <label class="file-upload-mod" for="foto">
                    <i class="fas fa-camera"></i>
                    <span class="file-upload-label" id="foto-label">Pilih foto (200×200px)...</span>
                    <input type="file" id="foto" name="foto" accept="image/*" required onchange="document.getElementById('foto-label').textContent=this.files[0]?.name||'Pilih foto...'">
                  </label>
                </div>

                <div class="btn-actions">
                  <button type="submit" name="tambah" class="btn-mod btn-success-mod"><i class="fas fa-plus"></i> Tambah</button>
                  <button type="reset" class="btn-mod btn-reset-mod"><i class="fas fa-times"></i> Reset</button>
                </div>
              </form>
            </div>
          </div>

          <!-- TABEL -->
          <div class="mod-card" style="animation-delay:.1s">
            <div class="mod-card-header">
              <div class="mod-card-title">
                <i class="fas fa-user-shield"></i> Daftar Akun
                <span class="count-badge"><?= $data_akun->num_rows ?> akun</span>
              </div>
            </div>

            <?php if(checkSession('success')): ?>
            <div class="mod-alert mod-alert-success">
              <i class="fas fa-check-circle"></i> <?= getSession('success', true) ?>
              <button class="mod-alert-close" onclick="this.parentElement.remove()">&times;</button>
            </div>
            <?php elseif(checkSession('error')): ?>
            <div class="mod-alert mod-alert-danger">
              <i class="fas fa-exclamation-circle"></i> <?= getSession('error', true) ?>
              <button class="mod-alert-close" onclick="this.parentElement.remove()">&times;</button>
            </div>
            <?php endif ?>

            <div class="mod-card-body-flush">
              <?php if($data_akun->num_rows > 0): ?>
              <table class="mod-table">
                <thead>
                  <tr>
                    <th style="width:44px">#</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th style="text-align:center;width:170px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($akun = $data_akun->fetch_object()): ?>
                  <tr>
                    <td><span class="row-num"><?= $no++ ?></span></td>
                    <td><img src="<?= base_url('uploads/'.$akun->foto) ?>" class="avatar-sm" alt=""></td>
                    <td style="font-weight:600;color:var(--text-dark)"><?= htmlspecialchars($akun->nama) ?></td>
                    <td><span class="badge-pill badge-slate">@<?= htmlspecialchars($akun->username) ?></span></td>
                    <td style="text-align:center">
                      <div class="act-group">
                        <a href="<?= base_url('akun/detail/'.$akun->id) ?>" class="act-btn act-detail"><i class="fas fa-eye"></i> Detail</a>
                        <a href="<?= base_url('akun/mfa/'.$akun->id) ?>" class="act-btn" style="background:#eef2ff;color:#6366f1;border:1.5px solid rgba(99,102,241,.15)"><i class="fas fa-shield-alt"></i> MFA</a>
                        <a href="<?= base_url('akun/hapus/'.$akun->id) ?>" class="act-btn act-del" onclick="return confirm('Hapus akun ini?')"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>
                  </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
              <?php else: ?>
              <div class="empty-state"><i class="fas fa-user-shield"></i><p>Belum ada akun administrator.</p></div>
              <?php endif ?>
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
