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
          <div><h1>Detail Pesanan</h1><p>Informasi lengkap transaksi rental</p></div>
          <div class="btn-actions">
            <a href="<?= base_url('pesanan/ubah/'.$pesanan->id) ?>" class="btn-mod btn-primary-mod"><i class="fas fa-pen"></i> Ubah</a>
            <a href="<?= base_url('pesanan/hapus/'.$pesanan->id) ?>" class="btn-mod btn-danger-mod" onclick="return confirm('Hapus pesanan ini?')"><i class="fas fa-trash"></i> Hapus</a>
            <a href="<?= base_url('pesanan') ?>" class="btn-mod btn-back-mod"><i class="fas fa-arrow-left"></i> Kembali</a>
          </div>
        </div>

        <div style="max-width:640px;">
          <div class="mod-card">
            <div class="mod-card-header">
              <div class="mod-card-title"><i class="fas fa-receipt"></i> Detail Transaksi</div>
              <span style="background:#f0fdf4;color:#166534;border:1px solid #bbf7d0;font-size:.72rem;font-weight:700;padding:3px 10px;border-radius:100px;">
                Pesanan #<?= $pesanan->id ?>
              </span>
            </div>
            <div>
              <div class="detail-info-row"><span class="detail-info-key">Pemesan</span><span class="detail-info-val" style="font-weight:800;"><?= htmlspecialchars($pesanan->nama_pemesan) ?></span></div>
              <div class="detail-info-row"><span class="detail-info-key">Mobil</span><span class="detail-info-val"><span class="badge-pill badge-blue"><?= htmlspecialchars($pesanan->nama_mobil) ?></span></span></div>
              <div class="detail-info-row"><span class="detail-info-key">Perjalanan</span><span class="detail-info-val"><?= htmlspecialchars($pesanan->asal) ?> → <?= htmlspecialchars($pesanan->tujuan) ?></span></div>
              <div class="detail-info-row"><span class="detail-info-key">Tgl Pinjam</span><span class="detail-info-val"><?= $pesanan->tgl_pinjam ?></span></div>
              <div class="detail-info-row"><span class="detail-info-key">Tgl Kembali</span><span class="detail-info-val"><?= $pesanan->tgl_kembali ?></span></div>
              <div class="detail-info-row">
                <span class="detail-info-key">Total Harga</span>
                <span class="detail-info-val" style="font-size:1.1rem;font-weight:800;color:var(--success);">Rp <?= number_format($pesanan->harga, 0, ',', '.') ?></span>
              </div>
              <div class="detail-info-row"><span class="detail-info-key">Metode Bayar</span><span class="detail-info-val"><span class="badge-pill badge-green"><i class="fas fa-wallet" style="font-size:.65rem"></i><?= htmlspecialchars($pesanan->jenis_bayar) ?></span></span></div>
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
