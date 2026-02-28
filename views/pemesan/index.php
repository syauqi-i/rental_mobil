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
          <div><h1>Data Pemesan</h1><p>Kelola data pelanggan rental</p></div>
        </div>

        <div class="content-grid">

          <!-- FORM TAMBAH -->
          <div class="mod-card">
            <div class="mod-card-header">
              <div class="mod-card-title"><i class="fas fa-user-plus"></i> Tambah Pemesan</div>
            </div>
            <div class="mod-card-body">
              <form method="POST" action="<?= base_url('pemesan/tambah') ?>" enctype="multipart/form-data">

                <div class="form-group-mod">
                  <label class="form-label-mod" for="nama">Nama Pemesan</label>
                  <input type="text" name="nama" id="nama" class="form-input-mod" placeholder="Nama lengkap" required autocomplete="off">
                </div>

                <div class="form-group-mod">
                  <label class="form-label-mod">Jenis Kelamin</label>
                  <select name="jenis_kelamin" class="form-input-mod">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                </div>

                <div class="form-group-mod">
                  <label class="form-label-mod" for="alamat">Alamat</label>
                  <textarea name="alamat" id="alamat" class="form-input-mod" placeholder="Alamat lengkap..." rows="3"></textarea>
                </div>

                <div class="form-group-mod">
                  <label class="form-label-mod">Foto Pemesan</label>
                  <label class="file-upload-mod" for="foto">
                    <i class="fas fa-camera"></i>
                    <span class="file-upload-label" id="foto-label">Pilih foto (200×200px)...</span>
                    <input type="file" id="foto" name="foto" accept="image/*" required onchange="document.getElementById('foto-label').textContent=this.files[0]?.name||'Pilih foto...'">
                  </label>
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
                <i class="fas fa-users"></i> Daftar Pemesan
                <span class="count-badge"><?= $data_pemesan->num_rows ?> orang</span>
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
              <?php if($data_pemesan->num_rows > 0): ?>
              <table class="mod-table">
                <thead>
                  <tr>
                    <th style="width:44px">#</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Kelamin</th>
                    <th style="text-align:center;width:160px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($p = $data_pemesan->fetch_object()): ?>
                  <tr>
                    <td><span class="row-num"><?= $no++ ?></span></td>
                    <td><img src="<?= base_url('uploads/'.$p->foto) ?>" class="avatar-sm" alt=""></td>
                    <td style="font-weight:600;color:var(--text-dark)"><?= htmlspecialchars($p->nama) ?></td>
                    <td>
                      <?php if($p->jenis_kelamin == 'L'): ?>
                      <span class="badge-pill badge-blue"><i class="fas fa-mars" style="font-size:.65rem"></i> Laki-laki</span>
                      <?php else: ?>
                      <span class="badge-pill badge-indigo"><i class="fas fa-venus" style="font-size:.65rem"></i> Perempuan</span>
                      <?php endif ?>
                    </td>
                    <td style="text-align:center">
                      <div class="act-group">
                        <a href="<?= base_url('pemesan/ubah/'.$p->id) ?>" class="act-btn act-edit"><i class="fas fa-pen"></i> Ubah</a>
                        <a href="<?= base_url('pemesan/detail/'.$p->id) ?>" class="act-btn act-detail"><i class="fas fa-eye"></i> Detail</a>
                        <a href="<?= base_url('pemesan/hapus/'.$p->id) ?>" class="act-btn act-del" onclick="return confirm('Hapus pemesan ini?')"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>
                  </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
              <?php else: ?>
              <div class="empty-state"><i class="fas fa-users"></i><p>Belum ada data pemesan.</p></div>
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
