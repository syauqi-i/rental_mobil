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
          <div><h1>Jenis Pembayaran</h1><p>Kelola metode pembayaran yang tersedia</p></div>
        </div>

        <div class="content-grid">
          <!-- FORM -->
          <div class="mod-card">
            <div class="mod-card-header">
              <div class="mod-card-title"><i class="fas fa-plus-circle"></i> Tambah Jenis Bayar</div>
            </div>
            <div class="mod-card-body">
              <form method="POST" action="<?= base_url('jenis_bayar/tambah') ?>">
                <div class="form-group-mod">
                  <label class="form-label-mod" for="jenis_bayar">Nama Metode</label>
                  <input type="text" name="jenis_bayar" id="jenis_bayar" class="form-input-mod" placeholder="Contoh: Transfer, Tunai..." required autocomplete="off">
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
                <i class="fas fa-wallet"></i> Daftar Jenis Bayar
                <span class="count-badge"><?= $data_jenis_bayar->num_rows ?> metode</span>
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
              <?php if($data_jenis_bayar->num_rows > 0): ?>
              <table class="mod-table">
                <thead>
                  <tr>
                    <th style="width:44px">#</th>
                    <th>Metode Pembayaran</th>
                    <th style="text-align:center;width:120px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($jb = $data_jenis_bayar->fetch_object()): ?>
                  <tr>
                    <td><span class="row-num"><?= $no++ ?></span></td>
                    <td><span class="badge-pill badge-green"><i class="fas fa-wallet" style="font-size:.65rem"></i><?= htmlspecialchars($jb->jenis_bayar) ?></span></td>
                    <td style="text-align:center">
                      <div class="act-group">
                        <a href="<?= base_url('jenis_bayar/ubah/'.$jb->id) ?>" class="act-btn act-edit"><i class="fas fa-pen"></i> Ubah</a>
                        <a href="<?= base_url('jenis_bayar/hapus/'.$jb->id) ?>" class="act-btn act-del" onclick="return confirm('Hapus metode ini?')"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>
                  </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
              <?php else: ?>
              <div class="empty-state"><i class="fas fa-wallet"></i><p>Belum ada metode pembayaran.</p></div>
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
