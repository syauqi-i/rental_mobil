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
          <div><h1>Ubah Pesanan</h1><p>Perbarui detail transaksi rental</p></div>
          <a href="<?= base_url('pesanan') ?>" class="btn-mod btn-back-mod"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <div style="max-width:600px;">
          <div class="mod-card">
            <div class="mod-card-header">
              <div class="mod-card-title"><i class="fas fa-pen"></i> Edit Pesanan</div>
            </div>
            <div class="mod-card-body">
              <form method="POST" action="<?= base_url('pesanan/proses_ubah/'.$pesanan->id) ?>">

                <div class="form-group-mod">
                  <label class="form-label-mod">Pemesan</label>
                  <div class="form-input-mod" style="background:#f1f5f9;color:var(--text-light);"><?= htmlspecialchars($pemesan->nama) ?></div>
                </div>
                <div class="form-group-mod">
                  <label class="form-label-mod">Mobil</label>
                  <div class="form-input-mod" style="background:#f1f5f9;color:var(--text-light);"><?= htmlspecialchars($mobil->nama) ?></div>
                </div>
                <div class="form-group-mod">
                  <label class="form-label-mod">Rute</label>
                  <div class="form-input-mod" style="background:#f1f5f9;color:var(--text-light);"><?= htmlspecialchars($perjalanan->asal) ?> → <?= htmlspecialchars($perjalanan->tujuan) ?></div>
                </div>

                <div class="form-row-mod">
                  <div class="form-group-mod">
                    <label class="form-label-mod">Metode Bayar</label>
                    <div class="form-input-mod" style="background:#f1f5f9;color:var(--text-light);"><?= htmlspecialchars($jenis_bayar->jenis_bayar) ?></div>
                  </div>
                  <div class="form-group-mod">
                    <label class="form-label-mod" for="harga">Harga (Rp)</label>
                    <input type="number" name="harga" id="harga" class="form-input-mod" value="<?= $pesanan->harga ?>" required>
                  </div>
                </div>

                <div class="form-row-mod">
                  <div class="form-group-mod">
                    <label class="form-label-mod" for="tgl_pinjam">Tgl Pinjam</label>
                    <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-input-mod" value="<?= $pesanan->tgl_pinjam ?>" readonly style="background:#f1f5f9;color:var(--text-light);">
                  </div>
                  <div class="form-group-mod">
                    <label class="form-label-mod" for="tgl_kembali">Tgl Kembali</label>
                    <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-input-mod" value="<?= $pesanan->tgl_kembali ?>" required>
                  </div>
                </div>

                <div class="btn-actions">
                  <button type="submit" name="ubah" class="btn-mod btn-success-mod"><i class="fas fa-check"></i> Simpan</button>
                  <a href="<?= base_url('pesanan') ?>" class="btn-mod btn-back-mod"><i class="fas fa-times"></i> Batal</a>
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
