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
  <style>
    :root {
      --primary:       #2563eb;
      --primary-light: #eff6ff;
      --success:       #16a34a;
      --surface:       #ffffff;
      --bg:            #f8fafc;
      --border:        #e2e8f0;
      --text-dark:     #0f172a;
      --text-mid:      #334155;
      --text-light:    #94a3b8;
      --radius:        14px;
      --shadow-sm:     0 1px 4px rgba(15,23,42,.06);
    }
    *, *::before, *::after { box-sizing: border-box; }
    body {
      font-family: 'Inter', system-ui, sans-serif;
      background: var(--bg); color: var(--text-dark);
    }
    body::before {
      content: ''; position: fixed; inset: 0;
      background-image: radial-gradient(circle, rgba(99,102,241,.05) 1px, transparent 1px);
      background-size: 28px 28px; pointer-events: none; z-index: 0;
    }
    #wrapper { display: flex; min-height: 100vh; position: relative; z-index: 1; }
    #content-wrapper { flex: 1; min-width: 0; display: flex; flex-direction: column; overflow: hidden; }
    #content { flex: 1; }
    .main-content { padding: 1.5rem 1.75rem; }
    @media(max-width:768px){ .main-content{ padding: 1rem; } }

    @keyframes fadeUp {
      from{ opacity:0; transform:translateY(14px); }
      to  { opacity:1; transform:translateY(0); }
    }

    .page-header { display:flex;align-items:center;justify-content:space-between;margin-bottom:1.5rem;flex-wrap:wrap;gap:.75rem; }
    .page-header h1 { font-size:1.3rem;font-weight:800;color:var(--text-dark);letter-spacing:-.4px;margin:0 0 2px; }
    .page-header p  { font-size:.82rem;color:var(--text-light);margin:0; }

    .mod-card {
      background: var(--surface);
      border-radius: var(--radius);
      border: 1px solid var(--border);
      box-shadow: var(--shadow-sm);
      overflow: hidden;
      animation: fadeUp .5s ease both;
      max-width: 520px;
    }
    .mod-card-header {
      display:flex;align-items:center;justify-content:space-between;
      padding:.9rem 1.3rem;border-bottom:1px solid var(--border);
    }
    .mod-card-title { font-size:.88rem;font-weight:700;color:var(--text-dark);display:flex;align-items:center;gap:7px; }
    .mod-card-title i { color:var(--primary); }
    .mod-card-body { padding:1.3rem; }

    .form-label-mod {
      display:block;margin-bottom:6px;
      font-size:.78rem;font-weight:700;
      color:var(--text-mid);text-transform:uppercase;letter-spacing:.4px;
    }
    .form-input-mod {
      width:100%;padding:.72rem 1rem;
      border:1.5px solid var(--border);border-radius:10px;
      background:#f8fafc;font-size:.9rem;color:var(--text-dark);
      font-family:'Inter',sans-serif;
      transition:border-color .2s,box-shadow .2s,background .2s;outline:none;
    }
    .form-input-mod:focus {
      border-color:var(--primary);
      box-shadow:0 0 0 3px rgba(37,99,235,.10);background:#fff;
    }

    .btn-mod {
      display:inline-flex;align-items:center;gap:6px;
      padding:.52rem 1.1rem;border-radius:10px;
      font-size:.84rem;font-weight:600;
      font-family:'Inter',sans-serif;cursor:pointer;
      border:none;transition:all .18s;text-decoration:none;
    }
    .btn-success-mod { background:var(--success);color:#fff;box-shadow:0 4px 12px rgba(22,163,74,.20); }
    .btn-success-mod:hover { background:#15803d;transform:translateY(-1px);color:#fff; }
    .btn-back-mod {
      background:#f8fafc;color:var(--text-mid);
      border:1.5px solid var(--border) !important;
    }
    .btn-back-mod:hover { background:#f1f5f9;color:var(--text-mid);transform:translateY(-1px); }
    .btn-reset-mod {
      background:#fff;color:var(--text-mid);
      border:1.5px solid var(--border) !important;
    }
    .btn-reset-mod:hover { background:#f8fafc; }

    .current-val {
      display:flex;align-items:center;gap:8px;
      background:var(--primary-light);
      border:1px solid rgba(37,99,235,.14);
      border-radius:10px;padding:.65rem 1rem;
      font-size:.85rem;font-weight:600;color:#1d4ed8;
      margin-bottom:1rem;
    }
    .current-val i { font-size:.8rem;color:#93c5fd; }

    .scroll-to-top {
      position:fixed !important;right:1.5rem;bottom:1.5rem;
      width:38px;height:38px;
      background:var(--primary) !important;color:#fff !important;
      border-radius:10px !important;
      display:flex;align-items:center;justify-content:center;
      box-shadow:0 4px 14px rgba(37,99,235,.28);z-index:999;
      transition:transform .18s;text-decoration:none;
    }
    .scroll-to-top:hover { transform:translateY(-2px); }
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
            <h1>Ubah Data Merk</h1>
            <p>Perbarui nama merk kendaraan</p>
          </div>
          <a href="<?= base_url('merk') ?>" class="btn-mod btn-back-mod">
            <i class="fas fa-arrow-left"></i> Kembali
          </a>
        </div>

        <div class="mod-card">
          <div class="mod-card-header">
            <div class="mod-card-title">
              <i class="fas fa-pen"></i> Edit Merk
            </div>
          </div>
          <div class="mod-card-body">

            <!-- Current value display -->
            <div class="current-val">
              <i class="fas fa-tag"></i>
              Saat ini: <strong><?= htmlspecialchars($merk->merk) ?></strong>
            </div>

            <form method="POST" action="<?= base_url('merk/proses_ubah/' . $merk->id) ?>">
              <div style="margin-bottom:1rem;">
                <label class="form-label-mod" for="merk">Nama Merk Baru</label>
                <input type="text" name="merk" id="merk"
                       class="form-input-mod"
                       placeholder="Masukkan nama merk..."
                       autocomplete="off" required
                       value="<?= htmlspecialchars($merk->merk) ?>">
              </div>
              <div style="display:flex;gap:.5rem;flex-wrap:wrap;">
                <button type="submit" name="ubah" class="btn-mod btn-success-mod">
                  <i class="fas fa-check"></i> Simpan Perubahan
                </button>
                <button type="reset" class="btn-mod btn-reset-mod">
                  <i class="fas fa-times"></i> Reset
                </button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
    <?php partial('footer') ?>
  </div>
</div>

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
