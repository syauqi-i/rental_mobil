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
            <h1>Ubah Data Mobil</h1>
            <p>Perbarui informasi unit kendaraan</p>
          </div>
          <a href="<?= base_url('mobil') ?>" class="btn-mod btn-back-mod">
            <i class="fas fa-arrow-left"></i> Kembali
          </a>
        </div>

        <div style="max-width:600px;">
          <div class="mod-card">
            <div class="mod-card-header">
              <div class="mod-card-title"><i class="fas fa-pen"></i> Edit Mobil</div>
            </div>
            <div class="mod-card-body">
              <form method="POST" action="<?= base_url('mobil/proses_ubah/'.$mobil->id_mobil) ?>" enctype="multipart/form-data">

                <div class="form-group-mod">
                  <label class="form-label-mod">Merk</label>
                  <select name="id_merk" class="form-input-mod">
                    <?php while($merk = $data_merk->fetch_object()): ?>
                    <option value="<?= $merk->id ?>" <?= $mobil->id_merk == $merk->id ? 'selected' : '' ?>><?= $merk->merk ?></option>
                    <?php endwhile; ?>
                  </select>
                </div>

                <div class="form-group-mod">
                  <label class="form-label-mod" for="nama">Nama Mobil</label>
                  <input type="text" name="nama" id="nama" class="form-input-mod" value="<?= htmlspecialchars($mobil->nama) ?>" required>
                </div>

                <div class="form-row-mod">
                  <div class="form-group-mod">
                    <label class="form-label-mod" for="warna">Warna</label>
                    <input type="text" name="warna" id="warna" class="form-input-mod" value="<?= htmlspecialchars($mobil->warna) ?>" required>
                  </div>
                  <div class="form-group-mod">
                    <label class="form-label-mod" for="jumlah_kursi">Jumlah Kursi</label>
                    <input type="number" name="jumlah_kursi" id="jumlah_kursi" class="form-input-mod" value="<?= $mobil->jumlah_kursi ?>" required>
                  </div>
                </div>

                <div class="form-row-mod">
                  <div class="form-group-mod">
                    <label class="form-label-mod" for="no_polisi">No Polisi</label>
                    <input type="text" name="no_polisi" id="no_polisi" class="form-input-mod" value="<?= htmlspecialchars($mobil->no_polisi) ?>" required>
                  </div>
                  <div class="form-group-mod">
                    <label class="form-label-mod" for="tahun_beli">Tahun Beli</label>
                    <input type="number" name="tahun_beli" id="tahun_beli" class="form-input-mod" value="<?= $mobil->tahun_beli ?>" required>
                  </div>
                </div>

                <div class="form-group-mod">
                  <label class="form-label-mod">Gambar Baru (opsional)</label>
                  <label class="file-upload-mod" for="gambar">
                    <i class="fas fa-image"></i>
                    <span class="file-upload-label" id="file-label">Ganti gambar (opsional)...</span>
                    <input type="file" id="gambar" name="gambar" accept="image/*" onchange="document.getElementById('file-label').textContent=this.files[0]?.name||'Ganti gambar...'">
                  </label>
                  <?php if($mobil->gambar): ?>
                  <div style="margin-top:.6rem;">
                    <img src="<?= base_url('uploads/'.$mobil->gambar) ?>" alt="" style="height:60px;border-radius:8px;border:1.5px solid var(--border);">
                    <span style="font-size:.75rem;color:var(--text-light);margin-left:.5rem;">Gambar saat ini</span>
                  </div>
                  <?php endif ?>
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
