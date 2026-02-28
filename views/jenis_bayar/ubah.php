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
          <div><h1>Ubah Jenis Bayar</h1><p>Perbarui nama metode pembayaran</p></div>
          <a href="<?= base_url('jenis_bayar') ?>" class="btn-mod btn-back-mod"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <div style="max-width:440px;">
          <div class="mod-card">
            <div class="mod-card-header">
              <div class="mod-card-title"><i class="fas fa-pen"></i> Edit Metode Bayar</div>
            </div>
            <div class="mod-card-body">
              <!-- Current value display -->
              <div style="display:flex;align-items:center;gap:8px;background:#f0fdf4;border:1px solid #bbf7d0;border-radius:10px;padding:.65rem 1rem;margin-bottom:1rem;">
                <i class="fas fa-wallet" style="color:#16a34a;font-size:.8rem"></i>
                <span style="font-size:.85rem;font-weight:600;color:#166534;">Saat ini: <strong><?= htmlspecialchars($jenis_bayar->jenis_bayar) ?></strong></span>
              </div>
              <form method="POST" action="<?= base_url('jenis_bayar/proses_ubah/'.$jenis_bayar->id) ?>">
                <div class="form-group-mod">
                  <label class="form-label-mod" for="jenis_bayar">Nama Baru</label>
                  <input type="text" name="jenis_bayar" id="jenis_bayar" class="form-input-mod" value="<?= htmlspecialchars($jenis_bayar->jenis_bayar) ?>" required>
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
