<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= APP_NAME ?> - <?= $judul ?></title>
  <?php partial('modern_css') ?>
  <style>
    .summary-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
      gap: 1rem;
      margin-bottom: 1.4rem;
    }
    .summary-statcard {
      background: #fff;
      border: 1px solid var(--border);
      border-radius: var(--radius);
      padding: 1rem 1.2rem;
      box-shadow: var(--shadow-sm);
      animation: fadeUp .4s ease both;
      display: flex; align-items: center; gap: .85rem;
    }
    .summary-statcard .sc-icon {
      width: 42px; height: 42px;
      border-radius: 11px;
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
      font-size: .9rem;
    }
    .summary-statcard .sc-val {
      font-size: 1.15rem; font-weight: 800;
      color: var(--text-dark); letter-spacing: -.5px;
      line-height: 1.2;
    }
    .summary-statcard .sc-label {
      font-size: .7rem; color: var(--text-light);
      font-weight: 600; text-transform: uppercase; letter-spacing: .4px;
      margin-top: 1px;
    }
    .filter-bar {
      display: flex; align-items: flex-end; gap: .75rem;
      flex-wrap: wrap;
      background: #fff;
      border: 1px solid var(--border);
      border-radius: var(--radius);
      padding: 1rem 1.3rem;
      margin-bottom: 1.25rem;
      box-shadow: var(--shadow-sm);
    }
    .filter-bar .filter-group { display: flex; flex-direction: column; gap: 4px; }
    .filter-bar .filter-group label { font-size: .7rem; font-weight: 700; color: var(--text-light); text-transform: uppercase; letter-spacing: .4px; }
    .filter-bar input[type=date] {
      padding: .52rem .85rem;
      border: 1.5px solid var(--border);
      border-radius: 9px;
      font-size: .85rem;
      color: var(--text-dark);
      font-family: 'Inter', sans-serif;
      background: #f8fafc;
      outline: none;
      transition: border-color .18s;
    }
    .filter-bar input[type=date]:focus { border-color: var(--primary); background: #fff; }
  </style>
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
            <h1>Laporan Rental</h1>
            <p>Rangkuman data penyewaan untuk dilaporkan ke pimpinan</p>
          </div>
          <div class="btn-actions">
            <a href="<?= base_url('laporan/cetak?dari='.$dari.'&sampai='.$sampai) ?>"
               target="_blank" class="btn-mod btn-primary-mod">
              <i class="fas fa-print"></i> Cetak / Kirim
            </a>
          </div>
        </div>

        <!-- Filter tanggal -->
        <form method="GET" action="<?= base_url('laporan') ?>">
          <div class="filter-bar">
            <div class="filter-group">
              <label>Dari Tanggal</label>
              <input type="date" name="dari" value="<?= $dari ?>">
            </div>
            <div class="filter-group">
              <label>Sampai Tanggal</label>
              <input type="date" name="sampai" value="<?= $sampai ?>">
            </div>
            <button type="submit" class="btn-mod btn-primary-mod" style="align-self:flex-end;">
              <i class="fas fa-filter"></i> Filter
            </button>
          </div>
        </form>

        <!-- Summary cards -->
        <div class="summary-grid">
          <div class="summary-statcard" style="animation-delay:.05s">
            <div class="sc-icon" style="background:#eff6ff">
              <i class="fas fa-receipt" style="color:#2563eb"></i>
            </div>
            <div>
              <div class="sc-val"><?= $summary->total_pesanan ?? 0 ?></div>
              <div class="sc-label">Total Pesanan</div>
            </div>
          </div>
          <div class="summary-statcard" style="animation-delay:.1s">
            <div class="sc-icon" style="background:#f0fdf4">
              <i class="fas fa-money-bill-wave" style="color:#16a34a"></i>
            </div>
            <div>
              <div class="sc-val" style="font-size:.95rem">Rp <?= number_format($summary->total_pendapatan ?? 0, 0, ',', '.') ?></div>
              <div class="sc-label">Total Pendapatan</div>
            </div>
          </div>
          <div class="summary-statcard" style="animation-delay:.15s">
            <div class="sc-icon" style="background:#fffbeb">
              <i class="fas fa-chart-line" style="color:#d97706"></i>
            </div>
            <div>
              <div class="sc-val" style="font-size:.9rem">Rp <?= number_format($summary->rata_rata ?? 0, 0, ',', '.') ?></div>
              <div class="sc-label">Rata-rata Harga</div>
            </div>
          </div>
          <div class="summary-statcard" style="animation-delay:.2s">
            <div class="sc-icon" style="background:#eef2ff">
              <i class="fas fa-arrow-up" style="color:#6366f1"></i>
            </div>
            <div>
              <div class="sc-val" style="font-size:.9rem">Rp <?= number_format($summary->tertinggi ?? 0, 0, ',', '.') ?></div>
              <div class="sc-label">Transaksi Tertinggi</div>
            </div>
          </div>
        </div>

        <!-- Tabel laporan -->
        <div class="mod-card" style="animation-delay:.25s">
          <div class="mod-card-header">
            <div class="mod-card-title">
              <i class="fas fa-table"></i> Detail Transaksi
              <span style="font-size:.72rem;color:var(--text-light);font-weight:500;margin-left:4px;">
                <?= date('d M Y', strtotime($dari)) ?> — <?= date('d M Y', strtotime($sampai)) ?>
              </span>
            </div>
          </div>
          <div class="mod-card-body-flush">
            <?php
              $rows = [];
              while($row = $pesanan->fetch_object()) $rows[] = $row;
            ?>
            <?php if(count($rows) > 0): ?>
            <table class="mod-table">
              <thead>
                <tr>
                  <th style="width:40px">#</th>
                  <th>Pemesan</th>
                  <th>Mobil</th>
                  <th>Rute</th>
                  <th>Metode Bayar</th>
                  <th>Tgl Pinjam</th>
                  <th>Tgl Kembali</th>
                  <th style="text-align:right">Durasi</th>
                  <th style="text-align:right">Harga</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach($rows as $r): ?>
                <tr>
                  <td><span class="row-num"><?= $no++ ?></span></td>
                  <td style="font-weight:600;color:var(--text-dark)"><?= htmlspecialchars($r->nama_pemesan) ?></td>
                  <td><span class="badge-pill badge-blue"><?= htmlspecialchars($r->nama_mobil) ?></span></td>
                  <td style="font-size:.8rem"><?= htmlspecialchars($r->asal) ?> → <?= htmlspecialchars($r->tujuan) ?></td>
                  <td><span class="badge-pill badge-green"><?= htmlspecialchars($r->jenis_bayar) ?></span></td>
                  <td style="font-size:.82rem"><?= date('d M Y', strtotime($r->tgl_pinjam)) ?></td>
                  <td style="font-size:.82rem"><?= date('d M Y', strtotime($r->tgl_kembali)) ?></td>
                  <td style="text-align:right">
                    <span class="badge-pill badge-amber"><?= max(0, $r->durasi) ?> hari</span>
                  </td>
                  <td style="text-align:right;font-weight:700;color:var(--success)">
                    Rp <?= number_format($r->harga, 0, ',', '.') ?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot>
                <tr style="background:#f8fafc;">
                  <td colspan="8" style="padding:.75rem 1rem;font-weight:700;color:var(--text-mid);font-size:.82rem;">TOTAL PENDAPATAN</td>
                  <td style="text-align:right;padding:.75rem 1rem;font-weight:800;color:var(--success);font-size:.95rem;">
                    Rp <?= number_format($summary->total_pendapatan ?? 0, 0, ',', '.') ?>
                  </td>
                </tr>
              </tfoot>
            </table>
            <?php else: ?>
            <div class="empty-state">
              <i class="fas fa-file-alt"></i>
              <p>Tidak ada data pesanan pada periode ini.<br>Coba ubah rentang tanggal.</p>
            </div>
            <?php endif ?>
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
