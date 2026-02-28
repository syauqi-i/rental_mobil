<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laporan Rental — <?= date('d M Y', strtotime($dari)) ?> s/d <?= date('d M Y', strtotime($sampai)) ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Inter', sans-serif; color: #1e293b; background: #fff; padding: 24px 32px; font-size: 13px; }
    @media print {
      body { padding: 0; font-size: 11px; }
      .no-print { display: none !important; }
      @page { margin: 12mm; }
    }

    /* Header */
    .rpt-header {
      display: flex; align-items: flex-start;
      justify-content: space-between;
      border-bottom: 2px solid #2563eb;
      padding-bottom: 14px; margin-bottom: 18px;
    }
    .rpt-company-name { font-size: 1.3rem; font-weight: 800; color: #0f172a; letter-spacing: -.4px; }
    .rpt-company-sub  { font-size: .75rem; color: #64748b; margin-top: 2px; }
    .rpt-title-badge {
      background: #eff6ff; color: #2563eb;
      border: 1px solid #bfdbfe;
      padding: 6px 14px; border-radius: 8px;
      font-size: .8rem; font-weight: 700;
      text-align: right;
    }
    .rpt-title-badge .period { font-size: .72rem; color: #64748b; font-weight: 500; margin-top: 2px; }

    /* Summary row */
    .summary-row {
      display: grid; grid-template-columns: repeat(4, 1fr);
      gap: 12px; margin-bottom: 18px;
    }
    .sm-card {
      border: 1px solid #e2e8f0; border-radius: 10px;
      padding: 10px 14px;
      background: #f8fafc;
    }
    .sm-card .sm-val { font-size: 1rem; font-weight: 800; color: #0f172a; line-height: 1.2; }
    .sm-card .sm-label { font-size: .65rem; color: #94a3b8; font-weight: 600; letter-spacing: .4px; text-transform: uppercase; margin-top: 2px; }

    /* Table */
    .rpt-table { width: 100%; border-collapse: collapse; font-size: .8rem; }
    .rpt-table th {
      background: #1e40af; color: #fff;
      padding: 7px 10px;
      text-align: left;
      font-size: .68rem; font-weight: 700;
      text-transform: uppercase; letter-spacing: .5px;
      white-space: nowrap;
    }
    .rpt-table th:last-child, .rpt-table td:last-child { text-align: right; }
    .rpt-table tbody tr { border-bottom: 1px solid #f1f5f9; }
    .rpt-table tbody tr:nth-child(even) td { background: #f8fafc; }
    .rpt-table td { padding: 7px 10px; color: #334155; }
    .rpt-table tfoot td {
      padding: 8px 10px;
      font-weight: 800; font-size: .85rem;
      background: #eff6ff; color: #1d4ed8;
      border-top: 2px solid #2563eb;
    }
    .no-row td { text-align: center; color: #94a3b8; padding: 2rem; }

    /* Footer */
    .rpt-footer {
      margin-top: 28px;
      display: flex; justify-content: flex-end;
    }
    .signature-box { text-align: center; }
    .signature-box .sig-line { width: 180px; border-top: 1px solid #94a3b8; margin: 60px auto 6px; }
    .signature-box .sig-name { font-weight: 700; font-size: .85rem; }
    .signature-box .sig-role { font-size: .72rem; color: #64748b; }

    .badge-small {
      display: inline-block;
      padding: 2px 8px; border-radius: 100px;
      font-size: .68rem; font-weight: 600;
    }
    .badge-blue  { background: #eff6ff; color: #2563eb; }
    .badge-green { background: #f0fdf4; color: #16a34a; }

    /* Print button */
    .print-bar {
      background: #0f172a; padding: 12px 24px;
      display: flex; align-items: center; justify-content: space-between;
      margin: -24px -32px 24px; position: sticky; top: 0; z-index: 10;
    }
    .print-bar span { color: #94a3b8; font-size: .82rem; }
    .btn-print {
      background: #2563eb; color: #fff;
      border: none; border-radius: 8px;
      padding: 8px 20px; font-size: .83rem; font-weight: 700;
      cursor: pointer; font-family: 'Inter', sans-serif;
      display: flex; align-items: center; gap: 6px;
      transition: background .15s;
    }
    .btn-print:hover { background: #1d4ed8; }
    .btn-close {
      background: #1e293b; color: #94a3b8;
      border: 1px solid #334155; border-radius: 8px;
      padding: 8px 16px; font-size: .83rem; font-weight: 600;
      cursor: pointer; font-family: 'Inter', sans-serif;
      margin-right: 8px; transition: background .15s;
    }
    .btn-close:hover { background: #334155; color: #fff; }
  </style>
</head>
<body>

  <!-- Sticky print bar (hidden in print) -->
  <div class="print-bar no-print">
    <span>📄 Preview Laporan Rental — siap dicetak atau di-PDF</span>
    <div>
      <button class="btn-close" onclick="window.close()">✕ Tutup</button>
      <button class="btn-print" onclick="window.print()">🖨️ Cetak / Simpan PDF</button>
    </div>
  </div>

  <!-- Kop surat -->
  <div class="rpt-header">
    <div>
      <div class="rpt-company-name">🚗 Manajemen Rental Mobil</div>
      <div class="rpt-company-sub">Laporan resmi penyewaan kendaraan</div>
    </div>
    <div class="rpt-title-badge">
      LAPORAN RENTAL
      <div class="period">
        <?= date('d M Y', strtotime($dari)) ?> s/d <?= date('d M Y', strtotime($sampai)) ?>
      </div>
    </div>
  </div>

  <!-- Summary -->
  <div class="summary-row">
    <div class="sm-card">
      <div class="sm-val"><?= $summary->total_pesanan ?? 0 ?></div>
      <div class="sm-label">Total Pesanan</div>
    </div>
    <div class="sm-card">
      <div class="sm-val">Rp <?= number_format($summary->total_pendapatan ?? 0, 0, ',', '.') ?></div>
      <div class="sm-label">Total Pendapatan</div>
    </div>
    <div class="sm-card">
      <div class="sm-val">Rp <?= number_format($summary->rata_rata ?? 0, 0, ',', '.') ?></div>
      <div class="sm-label">Rata-rata Transaksi</div>
    </div>
    <div class="sm-card">
      <div class="sm-val">Rp <?= number_format($summary->tertinggi ?? 0, 0, ',', '.') ?></div>
      <div class="sm-label">Tertinggi</div>
    </div>
  </div>

  <!-- Tabel detail -->
  <table class="rpt-table">
    <thead>
      <tr>
        <th style="width:32px">#</th>
        <th>Pemesan</th>
        <th>Mobil</th>
        <th>Rute</th>
        <th>Metode Bayar</th>
        <th>Tgl Pinjam</th>
        <th>Tgl Kembali</th>
        <th>Durasi</th>
        <th>Harga</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $rows = [];
        while($r = $pesanan->fetch_object()) $rows[] = $r;
        if(count($rows) > 0):
          $no = 1;
          foreach($rows as $r):
      ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><strong><?= htmlspecialchars($r->nama_pemesan) ?></strong></td>
        <td><span class="badge-small badge-blue"><?= htmlspecialchars($r->nama_mobil) ?></span></td>
        <td><?= htmlspecialchars($r->asal) ?> → <?= htmlspecialchars($r->tujuan) ?></td>
        <td><span class="badge-small badge-green"><?= htmlspecialchars($r->jenis_bayar) ?></span></td>
        <td><?= date('d/m/Y', strtotime($r->tgl_pinjam)) ?></td>
        <td><?= date('d/m/Y', strtotime($r->tgl_kembali)) ?></td>
        <td><?= max(0, $r->durasi) ?> hari</td>
        <td><strong>Rp <?= number_format($r->harga, 0, ',', '.') ?></strong></td>
      </tr>
      <?php endforeach; else: ?>
      <tr class="no-row"><td colspan="9">Tidak ada data pesanan pada periode ini.</td></tr>
      <?php endif; ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="8">TOTAL PENDAPATAN</td>
        <td>Rp <?= number_format($summary->total_pendapatan ?? 0, 0, ',', '.') ?></td>
      </tr>
    </tfoot>
  </table>

  <!-- Tanda tangan -->
  <div class="rpt-footer">
    <div class="signature-box">
      <div style="font-size:.72rem;color:#64748b;margin-bottom:4px;">
        <?= APP_NAME ?>, <?= date('d F Y') ?>
      </div>
      <div class="sig-line"></div>
      <div class="sig-name">Admin</div>
      <div class="sig-role">Petugas Rental</div>
    </div>
  </div>

</body>
</html>
