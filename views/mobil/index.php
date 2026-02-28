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
            <h1>Data Mobil</h1>
            <p>Kelola data armada kendaraan rental</p>
          </div>
        </div>

        <div class="content-grid">

          <!-- FORM TAMBAH -->
          <div class="mod-card">
            <div class="mod-card-header">
              <div class="mod-card-title"><i class="fas fa-plus-circle"></i> Tambah Mobil</div>
            </div>
            <div class="mod-card-body">
              <form method="POST" action="<?= base_url('mobil/tambah') ?>" enctype="multipart/form-data">

                <div class="form-group-mod">
                  <label class="form-label-mod">Merk</label>
                  <select name="id_merk" class="form-input-mod">
                    <?php while($merk = $data_merk->fetch_object()): ?>
                    <option value="<?= $merk->id ?>"><?= $merk->merk ?></option>
                    <?php endwhile; ?>
                  </select>
                </div>

                <div class="form-group-mod">
                  <label class="form-label-mod" for="nama">Nama Mobil</label>
                  <input type="text" name="nama" id="nama" class="form-input-mod" placeholder="Contoh: Avanza 2023" required autocomplete="off">
                </div>

                <div class="form-row-mod">
                  <div class="form-group-mod">
                    <label class="form-label-mod" for="warna">Warna</label>
                    <input type="text" name="warna" id="warna" class="form-input-mod" placeholder="Contoh: Putih" required>
                  </div>
                  <div class="form-group-mod">
                    <label class="form-label-mod" for="jumlah_kursi">Jumlah Kursi</label>
                    <input type="number" name="jumlah_kursi" id="jumlah_kursi" class="form-input-mod" placeholder="7" required min="1">
                  </div>
                </div>

                <div class="form-row-mod">
                  <div class="form-group-mod">
                    <label class="form-label-mod" for="no_polisi">No Polisi</label>
                    <input type="text" name="no_polisi" id="no_polisi" class="form-input-mod" placeholder="B 1234 ABC" required>
                  </div>
                  <div class="form-group-mod">
                    <label class="form-label-mod" for="tahun_beli">Tahun Beli</label>
                    <input type="number" name="tahun_beli" id="tahun_beli" class="form-input-mod" placeholder="2023" required>
                  </div>
                </div>

                <div class="form-group-mod">
                  <label class="form-label-mod">Gambar Mobil</label>
                  <label class="file-upload-mod" for="gambar">
                    <i class="fas fa-image"></i>
                    <span class="file-upload-label" id="file-label">Pilih gambar...</span>
                    <input type="file" name="gambar" id="gambar" accept="image/*" required onchange="document.getElementById('file-label').textContent=this.files[0]?.name||'Pilih gambar...'">
                  </label>
                </div>

                <div class="btn-actions">
                  <button type="submit" name="tambah" class="btn-mod btn-success-mod">
                    <i class="fas fa-plus"></i> Tambah
                  </button>
                  <button type="reset" class="btn-mod btn-reset-mod">
                    <i class="fas fa-times"></i> Reset
                  </button>
                </div>
              </form>
            </div>
          </div>

          <!-- TABEL -->
          <div class="mod-card" style="animation-delay:.1s">
            <div class="mod-card-header">
              <div class="mod-card-title">
                <i class="fas fa-list"></i> Daftar Mobil
                <span class="count-badge"><?= $data_mobil->num_rows ?> unit</span>
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
              <?php if($data_mobil->num_rows > 0): ?>
              <table class="mod-table">
                <thead>
                  <tr>
                    <th style="width:44px">#</th>
                    <th>Nama Mobil</th>
                    <th>Merk</th>
                    <th style="width:70px">Kursi</th>
                    <th style="text-align:center;width:160px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($mobil = $data_mobil->fetch_object()): ?>
                  <tr>
                    <td><span class="row-num"><?= $no++ ?></span></td>
                    <td style="font-weight:600;color:var(--text-dark)"><?= htmlspecialchars($mobil->nama) ?></td>
                    <td><span class="badge-pill badge-blue"><i class="fas fa-tag" style="font-size:.65rem"></i><?= htmlspecialchars($mobil->merk) ?></span></td>
                    <td><span class="badge-pill badge-slate"><i class="fas fa-chair" style="font-size:.65rem"></i><?= $mobil->jumlah_kursi ?></span></td>
                    <td style="text-align:center">
                      <div class="act-group">
                        <a href="<?= base_url('mobil/ubah/'.$mobil->id) ?>" class="act-btn act-edit"><i class="fas fa-pen"></i> Ubah</a>
                        <a href="<?= base_url('mobil/detail/'.$mobil->id) ?>" class="act-btn act-detail"><i class="fas fa-eye"></i> Detail</a>
                        <a href="<?= base_url('mobil/hapus/'.$mobil->id) ?>" class="act-btn act-del" onclick="return confirm('Hapus mobil <?= htmlspecialchars($mobil->nama) ?>?')"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>
                  </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
              <?php else: ?>
              <div class="empty-state"><i class="fas fa-car"></i><p>Belum ada data mobil.</p></div>
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
