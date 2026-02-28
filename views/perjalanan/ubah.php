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
          <div><h1>Ubah Rute Perjalanan</h1><p>Perbarui data rute</p></div>
          <a href="<?= base_url('perjalanan') ?>" class="btn-mod btn-back-mod"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <div style="max-width:480px;">
          <div class="mod-card">
            <div class="mod-card-header">
              <div class="mod-card-title"><i class="fas fa-pen"></i> Edit Rute</div>
            </div>
            <div class="mod-card-body">
              <form method="POST" action="<?= base_url('perjalanan/proses_ubah/'.$perjalanan->id) ?>">
                <div class="form-group-mod">
                  <label class="form-label-mod" for="asal">Kota Asal</label>
                  <input type="text" name="asal" id="asal" class="form-input-mod" value="<?= htmlspecialchars($perjalanan->asal) ?>" required>
                </div>
                <div class="form-group-mod">
                  <label class="form-label-mod" for="tujuan">Kota Tujuan</label>
                  <input type="text" name="tujuan" id="tujuan" class="form-input-mod" value="<?= htmlspecialchars($perjalanan->tujuan) ?>" required>
                </div>
                <div class="form-group-mod">
                  <label class="form-label-mod" for="jarak">Jarak (KM)</label>
                  <input type="number" name="jarak" id="jarak" class="form-input-mod" value="<?= $perjalanan->jarak ?>" required min="1">
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
