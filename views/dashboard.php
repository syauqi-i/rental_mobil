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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.12.2/lottie.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
  <style>
    :root {
      --primary:       #2563eb;
      --primary-light: #eff6ff;
      --accent:        #6366f1;
      --success:       #16a34a;
      --success-light: #f0fdf4;
      --warning:       #d97706;
      --warning-light: #fffbeb;
      --surface:       #ffffff;
      --bg:            #f8fafc;
      --border:        #e2e8f0;
      --text-dark:     #0f172a;
      --text-mid:      #334155;
      --text-light:    #94a3b8;
      --radius:        16px;
      --shadow-sm:     0 1px 4px rgba(15,23,42,.06);
      --shadow-md:     0 4px 18px rgba(15,23,42,.08);
      --shadow-lg:     0 12px 40px rgba(15,23,42,.10);
    }

    *, *::before, *::after { box-sizing: border-box; }
    body {
      font-family: 'Inter', system-ui, sans-serif;
      background: var(--bg);
      color: var(--text-dark);
      overflow-x: hidden;
    }
    body::before {
      content: '';
      position: fixed; inset: 0;
      background-image: radial-gradient(circle, rgba(99,102,241,.06) 1px, transparent 1px);
      background-size: 28px 28px;
      pointer-events: none; z-index: 0;
    }

    #wrapper { display: flex; min-height: 100vh; position: relative; z-index: 1; }
    #content-wrapper { flex: 1; min-width: 0; display: flex; flex-direction: column; overflow: hidden; }
    #content { flex: 1; overflow: hidden; }
    .main-content { padding: 1.5rem 1.75rem; }
    @media(max-width:768px){ .main-content{ padding: 1rem; } }

    /* ── fadeUp animation ── */
    @keyframes fadeUp {
      from{ opacity:0; transform:translateY(16px); }
      to  { opacity:1; transform:translateY(0); }
    }

    /* ═══════════════════════
       HERO SECTION
    ═══════════════════════ */
    .hero-section {
      position: relative;
      border-radius: var(--radius);
      background: linear-gradient(135deg, #f0f7ff 0%, #e8f0fe 100%);
      padding: 2rem 2.5rem;
      margin-bottom: 1.5rem;
      overflow: hidden;
      min-height: 160px;
      animation: fadeUp .5s ease both;
    }
    /* dot grid */
    .hero-section::before {
      content: '';
      position: absolute; inset: 0;
      background-image: radial-gradient(circle, rgba(99,102,241,.08) 1px, transparent 1px);
      background-size: 20px 20px;
      z-index: 0;
    }
    /* Lottie as full-cover background of hero banner */
    #lottie-dashboard {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      z-index: 1;
      opacity: .28;
      pointer-events: none;
      overflow: hidden;
    }
    #lottie-dashboard svg {
      width: 100% !important;
      height: 100% !important;
      transform: scale(1.08);
      transform-origin: center center;
    }
    .hero-text { position: relative; z-index: 2; }
    .hero-label {
      display: inline-flex; align-items: center; gap: 6px;
      background: rgba(37,99,235,.10);
      border: 1px solid rgba(37,99,235,.18);
      color: #2563eb;
      font-size: .72rem; font-weight: 700;
      padding: 4px 12px; border-radius: 100px;
      margin-bottom: .6rem; letter-spacing: .4px;
    }
    .dot-live {
      width: 7px; height: 7px; border-radius: 50%;
      background: #4ade80;
      animation: pulse-green 1.8s ease infinite;
    }
    @keyframes pulse-green { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:.5;transform:scale(1.4)} }
    .hero-title {
      font-size: 1.5rem; font-weight: 800;
      color: #1e3a8a; margin: 0 0 6px;
      letter-spacing: -.4px;
    }
    .hero-sub { font-size: .86rem; color: #475569; margin: 0; }
    #lottie-dashboard svg { transform: scale(1.15); transform-origin: center; }


    /* ═══════════════════════
       STAT CARDS
    ═══════════════════════ */
    .stat-grid {
      display: grid;
      grid-template-columns: repeat(4,1fr);
      gap: 1rem;
      margin-bottom: 1.5rem;
    }
    @media(max-width:1024px){ .stat-grid{ grid-template-columns: repeat(2,1fr); } }
    @media(max-width:480px) { .stat-grid{ grid-template-columns: repeat(2,1fr); gap:.6rem; } }

    .stat-card {
      background: var(--surface);
      border-radius: var(--radius);
      border: 1px solid var(--border);
      padding: 1.2rem 1.3rem;
      display: flex; align-items: center; gap:.9rem;
      box-shadow: var(--shadow-sm);
      transition: transform .2s, box-shadow .2s;
      animation: fadeUp .5s ease both;
      cursor: default;
    }
    .stat-card:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); }
    .stat-card:nth-child(1){ animation-delay:.08s }
    .stat-card:nth-child(2){ animation-delay:.14s }
    .stat-card:nth-child(3){ animation-delay:.20s }
    .stat-card:nth-child(4){ animation-delay:.26s }

    .stat-icon {
      width: 50px; height: 50px; flex-shrink: 0;
      border-radius: 13px;
      display: flex; align-items: center; justify-content: center;
      font-size: 1.15rem;
    }
    .ic-blue   { background:#eff6ff; color:#2563eb; }
    .ic-green  { background:#f0fdf4; color:#16a34a; }
    .ic-indigo { background:#eef2ff; color:#6366f1; }
    .ic-amber  { background:#fffbeb; color:#d97706; }

    .stat-label { font-size:.7rem; font-weight:700; text-transform:uppercase; letter-spacing:.5px; color:var(--text-light); margin-bottom:2px; }
    .stat-value { font-size:1.6rem; font-weight:800; color:var(--text-dark); line-height:1; font-variant-numeric:tabular-nums; }
    .stat-unit  { font-size:.74rem; color:var(--text-light); margin-top:2px; }

    /* ═══════════════════════
       CHART SECTION
    ═══════════════════════ */
    .charts-section { margin-bottom: 1.5rem; }

    /* ── Pill filter buttons (klasifikasi style) ── */
    .chart-tabs {
      display: flex;
      gap: .5rem;
      flex-wrap: wrap;
      margin-bottom: 1.1rem;
    }
    .chart-tab {
      display: inline-flex; align-items: center; gap: 6px;
      padding: .42rem 1.1rem;
      border-radius: 100px;
      font-size: .8rem; font-weight: 600;
      cursor: pointer;
      border: 1.5px solid var(--border);
      background: var(--surface);
      color: var(--text-mid);
      transition: all .18s;
      white-space: nowrap;
      user-select: none;
    }
    .chart-tab i { font-size: .72rem; }
    .chart-tab:hover {
      border-color: var(--primary);
      color: var(--primary);
      background: var(--primary-light);
    }
    .chart-tab.active {
      background: var(--primary);
      border-color: var(--primary);
      color: #fff;
      box-shadow: 0 4px 12px rgba(37,99,235,.30);
    }
    .chart-tab.active.tab-green  { background:#16a34a; border-color:#16a34a; box-shadow:0 4px 12px rgba(22,163,74,.28); }
    .chart-tab.active.tab-indigo { background:#6366f1; border-color:#6366f1; box-shadow:0 4px 12px rgba(99,102,241,.28); }

    /* ── Chart grid ── */
    .chart-grid {
      display: grid;
      grid-template-columns: 2fr 1fr;
      gap: 1rem;
    }
    @media(max-width:900px){ .chart-grid{ grid-template-columns: 1fr; } }

    .chart-card {
      background: var(--surface);
      border-radius: var(--radius);
      border: 1px solid var(--border);
      box-shadow: var(--shadow-sm);
      overflow: hidden;
      animation: fadeUp .5s ease .3s both;
    }
    .chart-card-header {
      display: flex; align-items: center; justify-content: space-between;
      padding: 1rem 1.3rem;
      border-bottom: 1px solid var(--border);
      flex-wrap: wrap; gap: .5rem;
    }
    .chart-card-title {
      font-size: .88rem; font-weight: 700; color: var(--text-dark);
      display: flex; align-items: center; gap: 7px;
    }
    .chart-card-title i { color: var(--primary); }
    .chart-card-period {
      font-size: .73rem; color: var(--text-light);
      background: #f8fafc;
      border: 1px solid var(--border);
      padding: 3px 10px; border-radius: 100px;
    }
    .chart-card-body { padding: 1.25rem; }
    .chart-card-body canvas { width: 100% !important; }

    /* ── Bar chart panel visibility ── */
    .chart-panel { display: none; }
    .chart-panel.active { display: block; }

    /* ═══════════════════════
       PROFILE CARD
    ═══════════════════════ */
    .profile-card {
      background: var(--surface);
      border-radius: var(--radius);
      border: 1px solid var(--border);
      box-shadow: var(--shadow-sm);
      overflow: hidden;
      animation: fadeUp .5s ease .4s both;
    }
    .profile-card-top {
      padding: 1rem 1.3rem;
      border-bottom: 1px solid var(--border);
      display: flex; align-items: center; gap: 8px;
    }
    .profile-card-top i   { color: var(--primary); font-size: .85rem; }
    .profile-card-top span{ font-size: .88rem; font-weight: 700; color: var(--text-dark); }
    .profile-card-body { padding: 1.3rem; }

    .profile-row { display: flex; align-items: center; gap: 1rem; margin-bottom: 1.1rem; }
    .profile-avatar {
      width: 62px; height: 62px; border-radius: 14px;
      object-fit: cover;
      border: 2.5px solid var(--primary-light);
      box-shadow: 0 4px 12px rgba(37,99,235,.14);
      flex-shrink: 0;
    }
    .profile-name  { font-size: .98rem; font-weight: 800; color: var(--text-dark); margin-bottom: 1px; }
    .profile-user  { font-size: .78rem; color: var(--text-light); margin-bottom: 4px; }
    .profile-role  {
      display: inline-flex; align-items: center; gap: 5px;
      background: var(--primary-light); color: var(--primary);
      font-size: .68rem; font-weight: 700; padding: 3px 9px; border-radius: 100px;
    }

    .info-list { border-top: 1px solid var(--border); }
    .info-row  { display: flex; align-items: center; padding: .52rem 0; border-bottom: 1px solid var(--border); gap: .5rem; }
    .info-key  { width: 90px; font-size: .77rem; color: var(--text-light); font-weight: 500; flex-shrink: 0; }
    .info-val  { font-size: .81rem; color: var(--text-dark); font-weight: 600; }

    /* ── Bottom grid ── */
    .bottom-grid {
      display: grid;
      grid-template-columns: 2fr 1fr;
      gap: 1rem;
      margin-top: 1rem;
    }
    @media(max-width:900px){ .bottom-grid{ grid-template-columns: 1fr; } }

    /* ── Scroll to top ── */
    .scroll-to-top {
      position: fixed !important; right: 1.5rem; bottom: 1.5rem;
      width: 38px; height: 38px;
      background: var(--primary) !important;
      color: #fff !important; border-radius: 10px !important;
      display: flex; align-items: center; justify-content: center;
      box-shadow: 0 4px 14px rgba(37,99,235,.30);
      z-index: 999; transition: transform .18s, box-shadow .18s;
    }
    .scroll-to-top:hover { transform: translateY(-2px); box-shadow: 0 8px 22px rgba(37,99,235,.38); }
  </style>
</head>

<body id="page-top">
<div id="wrapper">

  <?php partial('navbar', $aktif) ?>

  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <?php partial('topbar') ?>

      <div class="main-content">

        <!-- ── Hero ── -->
        <div class="hero-section">
          <!-- Lottie background (absolute, full width/height) -->
          <div id="lottie-dashboard"></div>
          <!-- Text overlaid on top -->
          <div class="hero-text">
            <span class="hero-label"><span class="dot-live"></span> Sistem Aktif</span>
            <h1 class="hero-title">Halo, <?= $_SESSION['login']['nama'] ?> 👋</h1>
            <p class="hero-sub">Ringkasan data sistem rental mobil hari ini.</p>
          </div>
        </div>

        <!-- ── Stat Cards ── -->
        <div class="stat-grid">
          <div class="stat-card">
            <div class="stat-icon ic-blue"><i class="fas fa-car"></i></div>
            <div>
              <div class="stat-label">Mobil</div>
              <div class="stat-value"><?= $mobil->num_rows ?></div>
              <div class="stat-unit">Unit tersedia</div>
            </div>
          </div>
          <div class="stat-card">
            <div class="stat-icon ic-green"><i class="fas fa-users"></i></div>
            <div>
              <div class="stat-label">Pemesan</div>
              <div class="stat-value"><?= $pemesan->num_rows ?></div>
              <div class="stat-unit">Pelanggan</div>
            </div>
          </div>
          <div class="stat-card">
            <div class="stat-icon ic-indigo"><i class="fas fa-receipt"></i></div>
            <div>
              <div class="stat-label">Pesanan</div>
              <div class="stat-value"><?= $pesanan->num_rows ?></div>
              <div class="stat-unit">Transaksi</div>
            </div>
          </div>
          <div class="stat-card">
            <div class="stat-icon ic-amber"><i class="fas fa-user-shield"></i></div>
            <div>
              <div class="stat-label">Akun</div>
              <div class="stat-value"><?= $akun->num_rows ?></div>
              <div class="stat-unit">Administrator</div>
            </div>
          </div>
        </div>

        <!-- ═══════ CHARTS ═══════ -->
        <div class="charts-section">

          <!-- Pill filter buttons -->
          <div class="chart-tabs">
            <button class="chart-tab active" data-chart="trend">
              <i class="fas fa-chart-line"></i> Tren Pesanan
            </button>
            <button class="chart-tab tab-green" data-chart="mobil">
              <i class="fas fa-car-alt"></i> Per Armada
            </button>
            <button class="chart-tab tab-indigo" data-chart="bayar">
              <i class="fas fa-wallet"></i> Metode Bayar
            </button>
          </div>

          <!-- Chart panels -->
          <div class="chart-grid">

            <!-- Left: switching bar/line chart -->
            <div class="chart-card">
              <div class="chart-card-header">
                <div class="chart-card-title" id="chart-main-title">
                  <i class="fas fa-chart-line"></i> Tren Pesanan
                </div>
                <span class="chart-card-period">Tahun <?= date('Y') ?></span>
              </div>
              <div class="chart-card-body">
                <!-- Trend (line) -->
                <div class="chart-panel active" id="panel-trend">
                  <canvas id="chartTrend" height="220"></canvas>
                </div>
                <!-- Per mobil (bar) -->
                <div class="chart-panel" id="panel-mobil">
                  <canvas id="chartMobil" height="220"></canvas>
                </div>
              </div>
            </div>

            <!-- Right: donut / ring -->
            <div class="chart-card">
              <div class="chart-card-header">
                <div class="chart-card-title">
                  <i class="fas fa-chart-pie"></i> Metode Bayar
                </div>
                <span class="chart-card-period">Semua data</span>
              </div>
              <div class="chart-card-body" style="display:flex;flex-direction:column;align-items:center;gap:1rem;">
                <canvas id="chartBayar" height="220" style="max-width:240px;"></canvas>
                <div id="donut-legend" style="display:flex;flex-wrap:wrap;gap:.5rem;justify-content:center;font-size:.78rem;"></div>
              </div>
            </div>

          </div><!-- /chart-grid -->
        </div><!-- /charts-section -->

        <!-- ── Bottom: Profile ── -->
        <div class="bottom-grid">
          <div class="profile-card">
            <div class="profile-card-top">
              <i class="fas fa-id-card"></i>
              <span>Akun yang Sedang Login</span>
            </div>
            <div class="profile-card-body">
              <div class="profile-row">
                <img src="<?= base_url('uploads/' . $_SESSION['login']['foto']) ?>"
                     alt="<?= $_SESSION['login']['nama'] ?>"
                     class="profile-avatar">
                <div>
                  <div class="profile-name"><?= $_SESSION['login']['nama'] ?></div>
                  <div class="profile-user">@<?= $_SESSION['login']['username'] ?></div>
                  <span class="profile-role"><i class="fas fa-shield-alt"></i> Administrator</span>
                </div>
              </div>
              <div class="info-list">
                <div class="info-row">
                  <span class="info-key">Nama</span>
                  <span class="info-val"><?= $_SESSION['login']['nama'] ?></span>
                </div>
                <div class="info-row">
                  <span class="info-key">Username</span>
                  <span class="info-val"><?= $_SESSION['login']['username'] ?></span>
                </div>
                <div class="info-row">
                  <span class="info-key">Login</span>
                  <span class="info-val"><?= $_SESSION['login']['waktu'] ?></span>
                </div>
                <div class="info-row">
                  <span class="info-key">Server</span>
                  <span class="info-val"><?= $_SERVER['SERVER_NAME'] ?></span>
                </div>
              </div>
            </div>
          </div>

          <!-- Quick access -->
          <div class="chart-card" style="animation-delay:.45s">
            <div class="chart-card-header">
              <div class="chart-card-title"><i class="fas fa-th"></i> Akses Cepat</div>
            </div>
            <div class="chart-card-body">
              <div style="display:grid;grid-template-columns:1fr 1fr;gap:.65rem;">
                <?php
                  $links = [
                    ['url'=>'mobil',      'icon'=>'fa-car-alt',    'label'=>'Mobil',     'c'=>'#2563eb'],
                    ['url'=>'pemesan',    'icon'=>'fa-users',      'label'=>'Pemesan',   'c'=>'#16a34a'],
                    ['url'=>'pesanan',    'icon'=>'fa-receipt',    'label'=>'Pesanan',   'c'=>'#6366f1'],
                    ['url'=>'perjalanan', 'icon'=>'fa-street-view','label'=>'Perjalanan','c'=>'#d97706'],
                    ['url'=>'merk',       'icon'=>'fa-tag',        'label'=>'Merk',      'c'=>'#0891b2'],
                    ['url'=>'akun',       'icon'=>'fa-user-cog',   'label'=>'Akun',      'c'=>'#dc2626'],
                  ];
                  foreach($links as $l):
                ?>
                <a href="<?= base_url($l['url']) ?>" style="
                  display:flex;flex-direction:column;align-items:center;justify-content:center;gap:5px;
                  padding:.8rem .5rem; border-radius:12px; border:1.5px solid #e2e8f0;
                  text-decoration:none; color:#334155; font-size:.76rem; font-weight:600;
                  background:#fafbfc; transition:all .18s;
                " onmouseover="this.style.borderColor='<?= $l['c'] ?>';this.style.background='#f0f4ff';this.style.color='<?= $l['c'] ?>';this.style.transform='translateY(-2px)'"
                   onmouseout="this.style.borderColor='#e2e8f0';this.style.background='#fafbfc';this.style.color='#334155';this.style.transform='translateY(0)'">
                  <i class="fas <?= $l['icon'] ?>" style="font-size:1.05rem;color:<?= $l['c'] ?>"></i>
                  <?= $l['label'] ?>
                </a>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>

      </div><!-- /main-content -->
    </div><!-- /content -->
    <?php partial('footer') ?>
  </div><!-- /content-wrapper -->
</div><!-- /wrapper -->

<!-- Mobile sidebar overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<a class="scroll-to-top" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.12.2/lottie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>


// ── Lottie ──────────────────────────────────────────────────────────────
lottie.loadAnimation({
  container: document.getElementById('lottie-dashboard'),
  renderer: 'svg', loop: true, autoplay: true,
  path: '<?= base_url('assets/animasi_dashboard.json') ?>'
});

// ── Count-up ─────────────────────────────────────────────────────────────
document.querySelectorAll('.stat-value').forEach(el => {
  const t = parseInt(el.textContent, 10);
  if(isNaN(t) || t === 0) return;
  let c = 0;
  const step = Math.max(1, Math.ceil(t / 25));
  const iv = setInterval(() => {
    c = Math.min(c + step, t);
    el.textContent = c;
    if(c >= t) clearInterval(iv);
  }, 40);
});

// ── Chart.js global defaults ─────────────────────────────────────────────
Chart.defaults.font.family = "'Inter', system-ui, sans-serif";
Chart.defaults.color = '#94a3b8';
Chart.defaults.plugins.legend.display = false;

// ── PHP data → JS ────────────────────────────────────────────────────────
const trendData   = <?= json_encode($chart_bulan) ?>;
const mobilLabels = <?= json_encode($chart_mobil_label) ?>;
const mobilData   = <?= json_encode($chart_mobil_val) ?>;
const bayarLabels = <?= json_encode($chart_bayar_label) ?>;
const bayarData   = <?= json_encode($chart_bayar_val) ?>;

const months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];

// ── 1. Line chart: Tren pesanan ──────────────────────────────────────────
const ctxTrend = document.getElementById('chartTrend').getContext('2d');
const gradTrend = ctxTrend.createLinearGradient(0, 0, 0, 260);
gradTrend.addColorStop(0, 'rgba(37,99,235,0.18)');
gradTrend.addColorStop(1, 'rgba(37,99,235,0)');

new Chart(ctxTrend, {
  type: 'line',
  data: {
    labels: months,
    datasets: [{
      label: 'Pesanan',
      data: trendData,
      borderColor: '#2563eb',
      backgroundColor: gradTrend,
      fill: true,
      tension: 0.42,
      pointRadius: 4,
      pointBackgroundColor: '#2563eb',
      pointBorderColor: '#fff',
      pointBorderWidth: 2,
      borderWidth: 2.5,
    }]
  },
  options: {
    responsive: true,
    interaction: { intersect: false, mode: 'index' },
    plugins: {
      tooltip: {
        backgroundColor: '#0f172a',
        titleColor: '#94a3b8',
        bodyColor: '#fff',
        padding: 10,
        cornerRadius: 8,
        callbacks: { label: ctx => ` ${ctx.parsed.y} pesanan` }
      }
    },
    scales: {
      x: { grid: { display:false }, border: { dash:[4,4] } },
      y: {
        grid: { color:'#f1f5f9', borderDash:[4,4] },
        border: { display:false },
        beginAtZero: true,
        ticks: { precision:0 }
      }
    }
  }
});

// ── 2. Bar chart: Per armada ─────────────────────────────────────────────
const barColors = ['#2563eb','#6366f1','#16a34a','#d97706','#0891b2','#dc2626'];
const ctxMobil = document.getElementById('chartMobil').getContext('2d');
new Chart(ctxMobil, {
  type: 'bar',
  data: {
    labels: mobilLabels.length ? mobilLabels : ['Belum ada data'],
    datasets: [{
      label: 'Pesanan',
      data: mobilData.length ? mobilData : [0],
      backgroundColor: barColors,
      borderRadius: 8,
      borderSkipped: false,
    }]
  },
  options: {
    responsive: true,
    plugins: {
      tooltip: {
        backgroundColor: '#0f172a',
        titleColor: '#94a3b8',
        bodyColor: '#fff',
        padding: 10, cornerRadius: 8,
        callbacks: { label: ctx => ` ${ctx.parsed.y} pesanan` }
      }
    },
    scales: {
      x: { grid: { display:false } },
      y: { grid: { color:'#f1f5f9', borderDash:[4,4] }, border: { display:false }, beginAtZero:true, ticks: { precision:0 } }
    }
  }
});

// ── 3. Donut chart: Metode bayar ─────────────────────────────────────────
const donutColors = [
  '#3b82f6', // biru soft
  '#a78bfa', // violet lavender
  '#34d399', // hijau toska
  '#fb923c', // oranye lembut
  '#f472b6', // pink bunga
  '#22d3ee', // cyan aqua
  '#facc15', // kuning lemon
  '#f87171', // merah coral
];
const ctxBayar = document.getElementById('chartBayar').getContext('2d');
new Chart(ctxBayar, {
  type: 'doughnut',
  data: {
    labels: bayarLabels.length ? bayarLabels : ['Belum ada'],
    datasets: [{
      data: bayarData.length ? bayarData : [1],
      backgroundColor: donutColors,
      borderWidth: 4, borderColor: '#fff',
      hoverOffset: 6,
    }]
  },
  options: {
    cutout: '68%',
    plugins: {
      legend: { display: false },
      tooltip: {
        backgroundColor: '#0f172a',
        titleColor: '#94a3b8',
        bodyColor: '#fff',
        padding: 10, cornerRadius: 8
      }
    }
  }
});

// Custom donut legend
const legend = document.getElementById('donut-legend');
(bayarLabels.length ? bayarLabels : ['Belum ada']).forEach((lbl, i) => {
  legend.innerHTML += `
    <span style="display:inline-flex;align-items:center;gap:5px;">
      <span style="width:10px;height:10px;border-radius:50%;background:${donutColors[i]||'#ccc'};flex-shrink:0;display:inline-block;"></span>
      <span style="color:#334155;font-size:.75rem;font-weight:500;">${lbl}</span>
    </span>`;
});

// ── Tab switching ─────────────────────────────────────────────────────────
const tabs = document.querySelectorAll('.chart-tab');
const titleEl = document.getElementById('chart-main-title');
const titleMap = {
  trend:  '<i class="fas fa-chart-line"></i> Tren Pesanan',
  mobil:  '<i class="fas fa-car-alt"></i> Per Armada',
  bayar:  '<i class="fas fa-chart-pie"></i> Metode Bayar',
};
tabs.forEach(tab => {
  tab.addEventListener('click', function(){
    tabs.forEach(t => t.classList.remove('active'));
    this.classList.add('active');
    const key = this.dataset.chart;
    document.querySelectorAll('.chart-panel').forEach(p => p.classList.remove('active'));
    const panel = document.getElementById('panel-' + key);
    if(panel) panel.classList.add('active');
    if(titleMap[key]) titleEl.innerHTML = titleMap[key];
  });
});

// ── Mobile sidebar toggle ─────────────────────────────────────────────────
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