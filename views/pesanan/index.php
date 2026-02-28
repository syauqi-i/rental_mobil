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
          <div><h1>Data Pesanan</h1><p>Kelola transaksi rental kendaraan</p></div>
        </div>

        <div class="content-grid" style="grid-template-columns: 360px 1fr;">

          <!-- FORM -->
          <div class="mod-card">
            <div class="mod-card-header">
              <div class="mod-card-title"><i class="fas fa-plus-circle"></i> Tambah Pesanan</div>
            </div>
            <div class="mod-card-body">
              <form method="POST" action="<?= base_url('pesanan/tambah') ?>" enctype="multipart/form-data">

                <div class="form-group-mod">
                  <label class="form-label-mod">Pemesan</label>
                  <select name="id_pemesan" class="form-input-mod">
                    <?php while($p = $data_pemesan->fetch_object()): ?>
                    <option value="<?= $p->id ?>"><?= htmlspecialchars($p->nama) ?></option>
                    <?php endwhile; ?>
                  </select>
                </div>

                <div class="form-group-mod">
                  <label class="form-label-mod">Mobil</label>
                  <select name="id_mobil" class="form-input-mod">
                    <?php while($m = $data_mobil->fetch_object()): ?>
                    <option value="<?= $m->id ?>"><?= htmlspecialchars($m->nama) ?></option>
                    <?php endwhile; ?>
                  </select>
                </div>

                <div class="form-group-mod">
                  <label class="form-label-mod">Rute Perjalanan</label>
                  <select name="id_perjalanan" class="form-input-mod">
                    <?php while($pj = $data_perjalanan->fetch_object()): ?>
                    <option value="<?= $pj->id ?>"><?= htmlspecialchars($pj->asal) ?> → <?= htmlspecialchars($pj->tujuan) ?> (<?= $pj->jarak ?> km)</option>
                    <?php endwhile; ?>
                  </select>
                </div>

                <div class="form-row-mod">
                  <div class="form-group-mod">
                    <label class="form-label-mod">Metode Bayar</label>
                    <select name="id_jenis_bayar" class="form-input-mod">
                      <?php while($jb = $data_jenis_bayar->fetch_object()): ?>
                      <option value="<?= $jb->id ?>"><?= htmlspecialchars($jb->jenis_bayar) ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                  <div class="form-group-mod">
                    <label class="form-label-mod" for="harga">Harga (Rp)</label>
                    <input type="number" name="harga" id="harga" class="form-input-mod" placeholder="500000" required>
                  </div>
                </div>

                <div class="form-row-mod">
                  <div class="form-group-mod">
                    <label class="form-label-mod" for="tgl_pinjam">Tgl Pinjam</label>
                    <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-input-mod" required>
                  </div>
                  <div class="form-group-mod">
                    <label class="form-label-mod" for="tgl_kembali">Tgl Kembali</label>
                    <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-input-mod" required>
                  </div>
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
                <i class="fas fa-receipt"></i> Daftar Pesanan
                <span class="count-badge"><?= $data_pesanan->num_rows ?> transaksi</span>
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
              <?php if($data_pesanan->num_rows > 0): ?>
              <table class="mod-table">
                <thead>
                  <tr>
                    <th style="width:44px">#</th>
                    <th>Pemesan</th>
                    <th>Mobil</th>
                    <th>Bayar</th>
                    <th style="text-align:center;width:140px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($ps = $data_pesanan->fetch_object()): ?>
                  <tr>
                    <td><span class="row-num"><?= $no++ ?></span></td>
                    <td style="font-weight:600;color:var(--text-dark)"><?= htmlspecialchars($ps->nama_pemesan) ?></td>
                    <td><span class="badge-pill badge-blue"><?= htmlspecialchars($ps->nama_mobil) ?></span></td>
                    <td><span class="badge-pill badge-green"><i class="fas fa-wallet" style="font-size:.65rem"></i><?= htmlspecialchars($ps->jenis_bayar) ?></span></td>
                    <td style="text-align:center">
                      <div class="act-group">
                        <a href="<?= base_url('pesanan/ubah/'.$ps->id) ?>" class="act-btn act-edit"><i class="fas fa-pen"></i> Ubah</a>
                        <a href="<?= base_url('pesanan/detail/'.$ps->id) ?>" class="act-btn act-detail"><i class="fas fa-eye"></i> Detail</a>
                        <a href="<?= base_url('pesanan/hapus/'.$ps->id) ?>" class="act-btn act-del" onclick="return confirm('Hapus pesanan ini?')"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>
                  </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
              <?php else: ?>
              <div class="empty-state"><i class="fas fa-receipt"></i><p>Belum ada data pesanan.</p></div>
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
