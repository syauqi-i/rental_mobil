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
          <div><h1>Detail Pemesan</h1><p>Informasi lengkap pelanggan</p></div>
          <div class="btn-actions">
            <a href="<?= base_url('pemesan/ubah/'.$pemesan->id) ?>" class="btn-mod btn-primary-mod"><i class="fas fa-pen"></i> Ubah</a>
            <a href="<?= base_url('pemesan/hapus/'.$pemesan->id) ?>" class="btn-mod btn-danger-mod" onclick="return confirm('Hapus pemesan ini?')"><i class="fas fa-trash"></i> Hapus</a>
            <a href="<?= base_url('pemesan') ?>" class="btn-mod btn-back-mod"><i class="fas fa-arrow-left"></i> Kembali</a>
          </div>
        </div>

        <div style="display:grid;grid-template-columns:240px 1fr;gap:1.25rem;align-items:start;">
          <div class="mod-card">
            <div class="mod-card-body" style="text-align:center;padding:1.5rem;">
              <img src="<?= base_url('uploads/'.$pemesan->foto) ?>" alt=""
                   style="width:120px;height:120px;border-radius:50%;object-fit:cover;border:3px solid var(--primary-light);box-shadow:0 4px 14px rgba(37,99,235,.14);">
              <div style="margin-top:.8rem;font-weight:800;font-size:.95rem;color:var(--text-dark);"><?= htmlspecialchars($pemesan->nama) ?></div>
              <?php if($pemesan->jenis_kelamin == 'L'): ?>
              <span class="badge-pill badge-blue" style="margin-top:.4rem;"><i class="fas fa-mars"></i> Laki-laki</span>
              <?php else: ?>
              <span class="badge-pill badge-indigo" style="margin-top:.4rem;"><i class="fas fa-venus"></i> Perempuan</span>
              <?php endif ?>
            </div>
          </div>

          <div class="mod-card">
            <div class="mod-card-header">
              <div class="mod-card-title"><i class="fas fa-user"></i> Informasi Pemesan</div>
            </div>
            <div>
              <div class="detail-info-row"><span class="detail-info-key">Nama</span><span class="detail-info-val"><?= htmlspecialchars($pemesan->nama) ?></span></div>
              <div class="detail-info-row"><span class="detail-info-key">Kelamin</span><span class="detail-info-val"><?= $pemesan->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' ?></span></div>
              <div class="detail-info-row"><span class="detail-info-key">Alamat</span><span class="detail-info-val" style="white-space:pre-line;"><?= htmlspecialchars($pemesan->alamat) ?></span></div>
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
