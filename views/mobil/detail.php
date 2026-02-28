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
          <div>
            <h1>Detail Mobil</h1>
            <p>Informasi lengkap kendaraan</p>
          </div>
          <div class="btn-actions">
            <a href="<?= base_url('mobil/ubah/'.$mobil->id) ?>" class="btn-mod btn-primary-mod"><i class="fas fa-pen"></i> Ubah</a>
            <a href="<?= base_url('mobil/hapus/'.$mobil->id) ?>" class="btn-mod btn-danger-mod" onclick="return confirm('Hapus mobil ini?')"><i class="fas fa-trash"></i> Hapus</a>
            <a href="<?= base_url('mobil') ?>" class="btn-mod btn-back-mod"><i class="fas fa-arrow-left"></i> Kembali</a>
          </div>
        </div>

        <div style="display:grid;grid-template-columns:280px 1fr;gap:1.25rem;align-items:start;">
          <!-- Gambar -->
          <div class="mod-card">
            <div class="mod-card-body" style="text-align:center;padding:1.5rem;">
              <img src="<?= base_url('uploads/'.$mobil->gambar) ?>" alt="<?= $mobil->nama ?>"
                   style="width:100%;border-radius:12px;object-fit:cover;max-height:220px;box-shadow:0 4px 18px rgba(15,23,42,.10);">
              <div style="margin-top:1rem;font-size:.95rem;font-weight:800;color:var(--text-dark);"><?= htmlspecialchars($mobil->nama) ?></div>
              <span class="badge-pill badge-blue" style="margin-top:.4rem;"><i class="fas fa-tag"></i><?= htmlspecialchars($mobil->merk) ?></span>
            </div>
          </div>

          <!-- Info -->
          <div class="mod-card">
            <div class="mod-card-header">
              <div class="mod-card-title"><i class="fas fa-car"></i> Spesifikasi Kendaraan</div>
            </div>
            <div>
              <div class="detail-info-row">
                <span class="detail-info-key">Nama</span>
                <span class="detail-info-val"><?= htmlspecialchars($mobil->nama) ?></span>
              </div>
              <div class="detail-info-row">
                <span class="detail-info-key">Merk</span>
                <span class="detail-info-val"><span class="badge-pill badge-blue"><i class="fas fa-tag"></i><?= htmlspecialchars($mobil->merk) ?></span></span>
              </div>
              <div class="detail-info-row">
                <span class="detail-info-key">No Polisi</span>
                <span class="detail-info-val"><span class="badge-pill badge-slate"><?= htmlspecialchars($mobil->no_polisi) ?></span></span>
              </div>
              <div class="detail-info-row">
                <span class="detail-info-key">Warna</span>
                <span class="detail-info-val"><?= htmlspecialchars($mobil->warna) ?></span>
              </div>
              <div class="detail-info-row">
                <span class="detail-info-key">Jumlah Kursi</span>
                <span class="detail-info-val"><?= $mobil->jumlah_kursi ?> kursi</span>
              </div>
              <div class="detail-info-row">
                <span class="detail-info-key">Tahun Beli</span>
                <span class="detail-info-val"><?= $mobil->tahun_beli ?></span>
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
