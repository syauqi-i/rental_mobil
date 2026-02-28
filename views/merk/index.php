<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= APP_NAME ?> - <?= $judul ?></title>
  <link href="<?= base_url('sb-admin-2/') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="<?= base_url('sb-admin-2/') ?>/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= base_url('sb-admin-2/') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <style>
    :root {
      --primary:       #2563eb;
      --primary-light: #eff6ff;
      --accent:        #6366f1;
      --success:       #16a34a;
      --surface:       #ffffff;
      --bg:            #f8fafc;
      --border:        #e2e8f0;
      --text-dark:     #0f172a;
      --text-mid:      #334155;
      --text-light:    #94a3b8;
      --radius:        14px;
      --shadow-sm:     0 1px 4px rgba(15,23,42,.06);
      --shadow-md:     0 4px 18px rgba(15,23,42,.08);
    }
    *, *::before, *::after { box-sizing: border-box; }
    body {
      font-family: 'Inter', system-ui, sans-serif;
      background: var(--bg);
      color: var(--text-dark);
    }
    body::before {
      content: '';
      position: fixed; inset: 0;
      background-image: radial-gradient(circle, rgba(99,102,241,.05) 1px, transparent 1px);
      background-size: 28px 28px;
      pointer-events: none; z-index: 0;
    }
    #wrapper { display: flex; min-height: 100vh; position: relative; z-index: 1; }
    #content-wrapper { flex: 1; min-width: 0; display: flex; flex-direction: column; overflow: hidden; }
    #content { flex: 1; }
    .main-content { padding: 1.5rem 1.75rem; }
    @media(max-width:768px){ .main-content{ padding: 1rem; } }

    /* ── Page header ── */
    .page-header {
      display: flex; align-items: center; justify-content: space-between;
      margin-bottom: 1.5rem; flex-wrap: wrap; gap: .75rem;
    }
    .page-header-left h1 {
      font-size: 1.3rem; font-weight: 800;
      color: var(--text-dark); letter-spacing: -.4px; margin: 0 0 2px;
    }
    .page-header-left p { font-size: .82rem; color: var(--text-light); margin: 0; }

    @keyframes fadeUp {
      from{ opacity:0; transform:translateY(14px); }
      to  { opacity:1; transform:translateY(0); }
    }

    /* ── Card ── */
    .mod-card {
      background: var(--surface);
      border-radius: var(--radius);
      border: 1px solid var(--border);
      box-shadow: var(--shadow-sm);
      overflow: hidden;
      animation: fadeUp .5s ease both;
    }
    .mod-card + .mod-card { animation-delay: .1s; }
    .mod-card-header {
      display: flex; align-items: center; justify-content: space-between;
      padding: .9rem 1.3rem;
      border-bottom: 1px solid var(--border);
    }
    .mod-card-title {
      font-size: .88rem; font-weight: 700; color: var(--text-dark);
      display: flex; align-items: center; gap: 7px;
    }
    .mod-card-title i { color: var(--primary); }
    .mod-card-body { padding: 1.3rem; }

    /* ── Alerts ── */
    .alert {
      border-radius: 10px; padding: .7rem .95rem;
      font-size: .84rem; font-weight: 500;
      display: flex; align-items: center; gap: 8px;
      margin-bottom: 1rem; animation: fadeUp .4s ease both;
    }
    .alert-success { background:#f0fdf4; border:1px solid #bbf7d0; color:#166534; }
    .alert-danger  { background:#fef2f2; border:1px solid #fecaca; color:#991b1b; }
    .alert .close  { margin-left:auto; background:none; border:none; font-size:1.1rem; cursor:pointer; opacity:.5; }
    .alert .close:hover { opacity:1; }

    /* ── Form elements ── */
    .form-label-mod {
      display: block; margin-bottom: 6px;
      font-size: .78rem; font-weight: 700;
      color: var(--text-mid); text-transform: uppercase; letter-spacing: .4px;
    }
    .form-input-mod {
      width: 100%;
      padding: .72rem 1rem;
      border: 1.5px solid var(--border);
      border-radius: 10px;
      background: #f8fafc;
      font-size: .9rem;
      color: var(--text-dark);
      font-family: 'Inter', sans-serif;
      transition: border-color .2s, box-shadow .2s, background .2s;
      outline: none;
    }
    .form-input-mod::placeholder { color: #cbd5e1; }
    .form-input-mod:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(37,99,235,.10);
      background: #fff;
    }

    /* ── Buttons ── */
    .btn-mod {
      display: inline-flex; align-items: center; gap: 6px;
      padding: .52rem 1.1rem;
      border-radius: 10px;
      font-size: .84rem; font-weight: 600;
      font-family: 'Inter', sans-serif;
      cursor: pointer; border: none;
      transition: all .18s;
      text-decoration: none;
    }
    .btn-primary-mod {
      background: var(--primary);
      color: #fff;
      box-shadow: 0 4px 12px rgba(37,99,235,.25);
    }
    .btn-primary-mod:hover { background: #1d4ed8; transform: translateY(-1px); box-shadow: 0 6px 18px rgba(37,99,235,.32); }

    .btn-success-mod {
      background: var(--success);
      color: #fff;
      box-shadow: 0 4px 12px rgba(22,163,74,.20);
    }
    .btn-success-mod:hover { background: #15803d; transform: translateY(-1px); }

    .btn-reset-mod {
      background: #fff;
      color: var(--text-mid);
      border: 1.5px solid var(--border) !important;
    }
    .btn-reset-mod:hover { background: #f8fafc; border-color: #cbd5e1 !important; }

    .btn-back-mod {
      background: #f8fafc;
      color: var(--text-mid);
      border: 1.5px solid var(--border) !important;
    }
    .btn-back-mod:hover { background: #f1f5f9; }

    /* ── Table ── */
    .mod-table { width: 100%; border-collapse: collapse; font-size: .85rem; }
    .mod-table thead th {
      background: #f8fafc;
      color: var(--text-light);
      font-size: .7rem; font-weight: 700;
      text-transform: uppercase; letter-spacing: .6px;
      padding: .65rem 1rem;
      border-bottom: 1px solid var(--border);
      white-space: nowrap;
    }
    .mod-table tbody td {
      padding: .75rem 1rem;
      border-bottom: 1px solid var(--border);
      color: var(--text-mid);
      vertical-align: middle;
    }
    .mod-table tbody tr:last-child td { border-bottom: none; }
    .mod-table tbody tr:hover td { background: #f8fafc; }

    /* Action buttons in table */
    .act-btn {
      display: inline-flex; align-items: center; gap: 5px;
      padding: .36rem .8rem;
      border-radius: 8px;
      font-size: .75rem; font-weight: 600;
      text-decoration: none;
      transition: all .16s;
      border: 1.5px solid transparent;
    }
    .act-btn-edit {
      background: #eff6ff; color: #2563eb;
      border-color: rgba(37,99,235,.15);
    }
    .act-btn-edit:hover { background: #dbeafe; transform: translateY(-1px); }

    .act-btn-del {
      background: #fef2f2; color: #dc2626;
      border-color: rgba(220,38,38,.15);
    }
    .act-btn-del:hover { background: #fee2e2; transform: translateY(-1px); }

    /* ── Row number badge ── */
    .row-num {
      display: inline-flex; align-items: center; justify-content: center;
      width: 24px; height: 24px;
      background: #f1f5f9; border-radius: 6px;
      font-size: .72rem; font-weight: 700; color: var(--text-light);
    }

    /* ── Merk badge ── */
    .merk-badge {
      display: inline-flex; align-items: center; gap: 6px;
      background: #eff6ff; border: 1px solid rgba(37,99,235,.12);
      color: #1d4ed8; font-size: .8rem; font-weight: 600;
      padding: 4px 12px; border-radius: 100px;
    }
    .merk-badge i { font-size: .7rem; color: #93c5fd; }

    /* ── Empty state ── */
    .empty-state {
      text-align: center; padding: 2.5rem 1rem;
      color: var(--text-light);
    }
    .empty-state i { font-size: 2rem; margin-bottom: .75rem; display: block; color: #e2e8f0; }
    .empty-state p { font-size: .85rem; margin: 0; }

    /* ── Scroll to top ── */
    .scroll-to-top {
      position: fixed !important; right: 1.5rem; bottom: 1.5rem;
      width: 38px; height: 38px;
      background: var(--primary) !important; color: #fff !important;
      border-radius: 10px !important;
      display: flex; align-items: center; justify-content: center;
      box-shadow: 0 4px 14px rgba(37,99,235,.28); z-index: 999;
      transition: transform .18s; text-decoration: none;
    }
    .scroll-to-top:hover { transform: translateY(-2px); }

    /* Layout grid */
    .content-grid {
      display: grid;
      grid-template-columns: 340px 1fr;
      gap: 1.25rem;
      align-items: start;
    }
    @media(max-width:860px){ .content-grid{ grid-template-columns: 1fr; } }
  </style>
</head>
<body id="page-top">
<div id="wrapper">
  <?php partial('navbar', $aktif) ?>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <?php partial('topbar') ?>
      <div class="main-content">

        <!-- Page header -->
        <div class="page-header">
          <div class="page-header-left">
            <h1>Data Merk</h1>
            <p>Kelola data merk kendaraan yang tersedia</p>
          </div>
        </div>

        <!-- Content grid -->
        <div class="content-grid">

          <!-- ADD FORM -->
          <div class="mod-card">
            <div class="mod-card-header">
              <div class="mod-card-title">
                <i class="fas fa-plus-circle"></i> Tambah Merk
              </div>
            </div>
            <div class="mod-card-body">
              <form method="POST" action="<?= base_url('merk/tambah') ?>">
                <div style="margin-bottom:1rem;">
                  <label class="form-label-mod" for="merk">Nama Merk</label>
                  <input type="text" name="merk" id="merk"
                         class="form-input-mod"
                         placeholder="Contoh: Toyota, Honda..."
                         autocomplete="off" required>
                </div>
                <div style="display:flex;gap:.5rem;">
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

          <!-- LIST TABLE -->
          <div class="mod-card" style="animation-delay:.1s;">
            <div class="mod-card-header">
              <div class="mod-card-title">
                <i class="fas fa-list"></i> Daftar Merk
                <span style="background:#eff6ff;color:#2563eb;font-size:.68rem;font-weight:700;padding:2px 9px;border-radius:100px;margin-left:4px;">
                  <?= $data_merk->num_rows ?> data
                </span>
              </div>
            </div>

            <!-- Alerts -->
            <?php if(checkSession('success')): ?>
              <div class="alert alert-success" style="margin:1rem 1rem 0;">
                <i class="fas fa-check-circle"></i>
                <?= getSession('success', true) ?>
                <button class="close" onclick="this.parentElement.remove()">&times;</button>
              </div>
            <?php elseif(checkSession('error')): ?>
              <div class="alert alert-danger" style="margin:1rem 1rem 0;">
                <i class="fas fa-exclamation-circle"></i>
                <?= getSession('error', true) ?>
                <button class="close" onclick="this.parentElement.remove()">&times;</button>
              </div>
            <?php endif ?>

            <div class="mod-card-body" style="padding:0;">
              <?php if($data_merk->num_rows > 0): ?>
              <table class="mod-table">
                <thead>
                  <tr>
                    <th style="width:48px;">#</th>
                    <th>Nama Merk</th>
                    <th style="width:140px;text-align:center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($merk = $data_merk->fetch_object()): ?>
                  <tr>
                    <td><span class="row-num"><?= $no++ ?></span></td>
                    <td>
                      <span class="merk-badge">
                        <i class="fas fa-tag"></i> <?= htmlspecialchars($merk->merk) ?>
                      </span>
                    </td>
                    <td style="text-align:center;">
                      <a href="<?= base_url('merk/ubah/' . $merk->id) ?>" class="act-btn act-btn-edit">
                        <i class="fas fa-pen"></i> Ubah
                      </a>
                      <a href="<?= base_url('merk/hapus/' . $merk->id) ?>"
                         class="act-btn act-btn-del"
                         onclick="return confirm('Hapus merk <?= htmlspecialchars($merk->merk) ?>?')">
                        <i class="fas fa-trash"></i> Hapus
                      </a>
                    </td>
                  </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
              <?php else: ?>
              <div class="empty-state">
                <i class="fas fa-tag"></i>
                <p>Belum ada data merk. Tambahkan merk di sebelah kiri.</p>
              </div>
              <?php endif ?>
            </div>
          </div>

        </div><!-- /content-grid -->
      </div><!-- /main-content -->
    </div>
    <?php partial('footer') ?>
  </div>
</div>

<!-- Mobile sidebar overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<a class="scroll-to-top" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<script src="<?= base_url('sb-admin-2/') ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('sb-admin-2/') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('sb-admin-2/') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('sb-admin-2/') ?>/js/sb-admin-2.min.js"></script>
<script>
  (function(){
    const overlay   = document.getElementById('sidebarOverlay');
    const topToggle = document.getElementById('sidebarToggleTop');
    function openSidebar(){ document.body.classList.add('sidebar-toggled'); if(overlay) overlay.style.display='block'; }
    function closeSidebar(){ document.body.classList.remove('sidebar-toggled'); if(overlay) overlay.style.display=''; }
    if(topToggle) topToggle.addEventListener('click', () => document.body.classList.contains('sidebar-toggled') ? closeSidebar() : openSidebar());
    if(overlay)   overlay.addEventListener('click', closeSidebar);
    window.addEventListener('resize', () => { if(window.innerWidth > 768) closeSidebar(); });
  })();
</script>
</body>
</html>
