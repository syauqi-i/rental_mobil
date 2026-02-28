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
          <div><h1>Detail Akun</h1><p>Informasi lengkap akun administrator</p></div>
          <div class="btn-actions">
            <a href="<?= base_url('akun/mfa/'.$akun->id) ?>" class="btn-mod" style="background:#eef2ff;color:#6366f1;border:1.5px solid rgba(99,102,241,.2)!important"><i class="fas fa-shield-alt"></i> Kelola MFA</a>
            <a href="<?= base_url('akun/hapus/'.$akun->id) ?>" class="btn-mod btn-danger-mod" onclick="return confirm('Hapus akun ini?')"><i class="fas fa-trash"></i> Hapus</a>
            <a href="<?= base_url('akun') ?>" class="btn-mod btn-back-mod"><i class="fas fa-arrow-left"></i> Kembali</a>
          </div>
        </div>

        <div style="display:grid;grid-template-columns:220px 1fr;gap:1.25rem;align-items:start;">
          <!-- Avatar card -->
          <div class="mod-card">
            <div class="mod-card-body" style="text-align:center;padding:1.5rem;">
              <img src="<?= base_url('uploads/'.$akun->foto) ?>" alt="<?= $akun->nama ?>"
                   style="width:100px;height:100px;border-radius:50%;object-fit:cover;border:3px solid var(--primary-light);box-shadow:0 4px 16px rgba(37,99,235,.15);">
              <div style="margin-top:.8rem;font-weight:800;font-size:.95rem;color:var(--text-dark);"><?= htmlspecialchars($akun->nama) ?></div>
              <span class="badge-pill badge-indigo" style="margin-top:.4rem;"><i class="fas fa-shield-alt" style="font-size:.65rem"></i>Administrator</span>
            </div>
          </div>

          <!-- Info card -->
          <div class="mod-card">
            <div class="mod-card-header">
              <div class="mod-card-title"><i class="fas fa-user-cog"></i> Informasi Akun</div>
            </div>
            <div>
              <div class="detail-info-row">
                <span class="detail-info-key">Nama</span>
                <span class="detail-info-val"><?= htmlspecialchars($akun->nama) ?></span>
              </div>
              <div class="detail-info-row">
                <span class="detail-info-key">Username</span>
                <span class="detail-info-val">
                  <span class="badge-pill badge-slate">@<?= htmlspecialchars($akun->username) ?></span>
                </span>
              </div>
              <div class="detail-info-row">
                <span class="detail-info-key">Role</span>
                <span class="detail-info-val">
                  <span class="badge-pill badge-indigo"><i class="fas fa-shield-alt" style="font-size:.65rem"></i>Administrator</span>
                </span>
              </div>
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
