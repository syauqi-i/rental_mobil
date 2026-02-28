<style>
/* ═══════════════════════════════════════
   Modern White Sidebar — Manajemen Rental
   ═══════════════════════════════════════ */
:root {
  --sb-bg:           #ffffff;
  --sb-border:       #f1f5f9;
  --sb-w:            260px;
  --sb-text:         #64748b;
  --sb-active:       #2563eb;
  --sb-active-bg:    #eff6ff;
  --sb-hover-bg:     #f8fafc;
  --sb-section:      #b0bbc9;
}

/* ── Base sidebar ── */
.sidebar {
  background: var(--sb-bg) !important;
  border-right: 1px solid var(--sb-border) !important;
  width: var(--sb-w) !important;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  padding: 0 !important;
  box-shadow: 4px 0 24px rgba(15,23,42,.06) !important;
  position: sticky !important;
  top: 0 !important;
  height: 100vh !important;
  overflow: clip !important;
  font-family: 'Inter', system-ui, sans-serif;
  z-index: 1000;
  flex-shrink: 0;
  transition: width .25s ease;
}

/* ── Brand area — gradient banner + Lottie background ── */
.sidebar-brand {
  position: relative !important;
  display: flex !important;
  flex-direction: column !important;
  align-items: center !important;
  justify-content: center !important;
  padding: 1.5rem 1rem 1.5rem !important;
  min-height: 120px !important;
  text-decoration: none !important;
  flex-shrink: 0 !important;
  overflow: hidden !important;
  background: linear-gradient(135deg, #1e40af 0%, #2563eb 55%, #6366f1 100%);
  border-bottom: 1px solid rgba(255,255,255,.12);
  gap: 8px;
}
.sidebar-brand:hover { opacity: .92; }



/* Icon circle on banner */
.sb-brand-icon {
  width: 44px; height: 44px;
  border-radius: 14px;
  background: rgba(255,255,255,.18);
  border: 1.5px solid rgba(255,255,255,.28);
  display: flex; align-items: center; justify-content: center;
  backdrop-filter: blur(8px);
  flex-shrink: 0;
}
.sb-brand-icon i { color: #fff; font-size: 18px; }

.sb-brand-icon {
  position: relative; z-index: 2;
  width: 44px; height: 44px;
  border-radius: 14px;
  background: rgba(255,255,255,.18);
  border: 1.5px solid rgba(255,255,255,.28);
  display: flex; align-items: center; justify-content: center;
  backdrop-filter: blur(8px);
  flex-shrink: 0;
}
.sb-brand-icon i { color: #fff; font-size: 18px; }

.sb-brand-info { position: relative; z-index: 2; text-align: center; }
.sb-brand-name {
  font-size: .86rem !important;
  font-weight: 800 !important;
  color: #fff !important;
  letter-spacing: -.3px;
  margin: 0 !important;
  white-space: nowrap;
  line-height: 1.3;
  text-shadow: 0 1px 8px rgba(0,0,0,.25);
}
.sb-brand-sub {
  font-size: .67rem;
  color: rgba(255,255,255,.75);
  font-weight: 600;
  white-space: nowrap;
  letter-spacing: .3px;
  margin-top: 2px;
  display: block;
}

/* ── Scrollable nav area ── */
.sb-nav-wrap {
  flex: 1;
  overflow-y: auto;
  overflow-x: hidden;
  padding: .5rem 0;
}
.sb-nav-wrap::-webkit-scrollbar { width: 3px; }
.sb-nav-wrap::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 4px; }

/* ── Section labels ── */
.sidebar-heading {
  font-size: .6rem !important;
  font-weight: 800 !important;
  text-transform: uppercase !important;
  letter-spacing: 1px !important;
  color: var(--sb-section) !important;
  padding: .75rem 1.25rem .25rem !important;
  white-space: nowrap !important;
}

.sidebar-divider {
  border: none !important;
  border-top: 1px solid var(--sb-border) !important;
  margin: .35rem 1rem !important;
}

/* ── Nav items ── */
.sidebar .nav-item {
  list-style: none;
  padding: 0 .7rem;
  margin-bottom: 2px;
}

.sidebar .nav-link {
  display: flex !important;
  align-items: center !important;
  gap: 10px !important;
  padding: .58rem .9rem !important;
  border-radius: 10px !important;
  color: var(--sb-text) !important;
  font-size: .83rem !important;
  font-weight: 500 !important;
  text-decoration: none !important;
  white-space: nowrap !important;
  transition: background .18s, color .18s, box-shadow .18s !important;
  position: relative;
}

.sidebar .nav-link .nav-icon-wrap {
  width: 28px; height: 28px;
  border-radius: 7px;
  display: flex; align-items: center; justify-content: center;
  background: transparent;
  flex-shrink: 0;
  transition: background .18s;
}
.sidebar .nav-link i {
  font-size: .8rem;
  color: #b0bbc9;
  transition: color .18s;
}

/* Hover */
.sidebar .nav-link:hover {
  background: var(--sb-hover-bg) !important;
  color: var(--sb-active) !important;
}
.sidebar .nav-link:hover .nav-icon-wrap {
  background: rgba(37,99,235,.08);
}
.sidebar .nav-link:hover i { color: var(--sb-active) !important; }

/* Active */
.sidebar .nav-item.active .nav-link {
  background: var(--sb-active-bg) !important;
  color: var(--sb-active) !important;
  font-weight: 700 !important;
  box-shadow: 0 2px 8px rgba(37,99,235,.10) !important;
}
.sidebar .nav-item.active .nav-link .nav-icon-wrap {
  background: rgba(37,99,235,.12);
}
.sidebar .nav-item.active .nav-link i { color: var(--sb-active) !important; }

/* Active left indicator */
.sidebar .nav-item.active .nav-link::before {
  content: '';
  position: absolute;
  left: 0; top: 18%; bottom: 18%;
  width: 3px;
  border-radius: 0 3px 3px 0;
  background: var(--sb-active);
}



/* ── Mobile offcanvas ── */
@media (max-width: 768px) {
  .sidebar {
    position: fixed !important;
    left: calc(-1 * var(--sb-w)) !important;
    top: 0 !important; height: 100vh !important;
    z-index: 1040 !important;
    transition: left .28s cubic-bezier(.22,.68,0,.97) !important;
    overflow-y: auto !important;
    overflow-x: hidden !important;
    width: var(--sb-w) !important;
  }
  .sidebar-toggled .sidebar { left: 0 !important; }

  /* On mobile toggled, restore all hidden items */
  .sidebar-toggled .sb-brand-info,
  .sidebar-toggled .sidebar .nav-link span,
  .sidebar-toggled .sidebar-heading,
  .sidebar-toggled .sidebar-divider {
    display: block !important;
  }
  .sidebar-toggled .sidebar-brand {
    justify-content: flex-start !important;
    padding: 1.2rem 1.1rem 1.1rem !important;
  }
  .sidebar-toggled .sidebar .nav-item { padding: 0 .7rem; }
  .sidebar-toggled .sidebar .nav-link {
    justify-content: flex-start !important;
    padding: .58rem .9rem !important;
  }
  .sidebar-toggled .sidebar .nav-link::before { display: block; }

  .sidebar-overlay {
    display: none;
    position: fixed; inset: 0;
    background: rgba(15,23,42,.40);
    z-index: 1039;
    backdrop-filter: blur(3px);
    -webkit-backdrop-filter: blur(3px);
  }
  .sidebar-toggled .sidebar-overlay { display: block; }
}
</style>

<ul class="navbar-nav sidebar accordion" id="accordionSidebar">

  <!-- Brand — gradient banner bersih -->
  <a class="sidebar-brand" href="<?= base_url('dashboard') ?>">
    <div class="sb-brand-icon">
      <i class="fas fa-car-alt"></i>
    </div>
    <div class="sb-brand-info">
      <div class="sb-brand-name">Rental Mobil</div>
      <div class="sb-brand-sub">Manajemen Kendaraan</div>
    </div>
  </a>

  <!-- Scrollable nav -->
  <div class="sb-nav-wrap">

    <!-- Dashboard -->
    <li class="nav-item <?= $data == 'dashboard' ? 'active' : '' ?>">
      <a class="nav-link" href="<?= base_url('dashboard') ?>">
        <div class="nav-icon-wrap"><i class="fas fa-fw fa-tachometer-alt"></i></div>
        <span>Dashboard</span>
      </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Armada Mobil</div>

    <li class="nav-item <?= $data == 'merk' ? 'active' : '' ?>">
      <a class="nav-link" href="<?= base_url('merk') ?>">
        <div class="nav-icon-wrap"><i class="fas fa-fw fa-tag"></i></div>
        <span>Merk</span>
      </a>
    </li>
    <li class="nav-item <?= $data == 'mobil' ? 'active' : '' ?>">
      <a class="nav-link" href="<?= base_url('mobil') ?>">
        <div class="nav-icon-wrap"><i class="fas fa-fw fa-car-alt"></i></div>
        <span>Data Mobil</span>
      </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Transaksi</div>

    <li class="nav-item <?= $data == 'pemesan' ? 'active' : '' ?>">
      <a class="nav-link" href="<?= base_url('pemesan') ?>">
        <div class="nav-icon-wrap"><i class="fas fa-fw fa-user"></i></div>
        <span>Pemesan</span>
      </a>
    </li>
    <li class="nav-item <?= $data == 'pesanan' ? 'active' : '' ?>">
      <a class="nav-link" href="<?= base_url('pesanan') ?>">
        <div class="nav-icon-wrap"><i class="fas fa-fw fa-receipt"></i></div>
        <span>Pesanan</span>
      </a>
    </li>
    <li class="nav-item <?= $data == 'perjalanan' ? 'active' : '' ?>">
      <a class="nav-link" href="<?= base_url('perjalanan') ?>">
        <div class="nav-icon-wrap"><i class="fas fa-fw fa-street-view"></i></div>
        <span>Perjalanan</span>
      </a>
    </li>
    <li class="nav-item <?= $data == 'jenis_bayar' ? 'active' : '' ?>">
      <a class="nav-link" href="<?= base_url('jenis_bayar') ?>">
        <div class="nav-icon-wrap"><i class="fas fa-fw fa-wallet"></i></div>
        <span>Jenis Bayar</span>
      </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Laporan</div>

    <li class="nav-item <?= $data == 'laporan' ? 'active' : '' ?>">
      <a class="nav-link" href="<?= base_url('laporan') ?>">
        <div class="nav-icon-wrap"><i class="fas fa-fw fa-file-alt"></i></div>
        <span>Laporan Rental</span>
      </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Pengaturan</div>


    <li class="nav-item <?= $data == 'akun' ? 'active' : '' ?>">
      <a class="nav-link" href="<?= base_url('akun') ?>">
        <div class="nav-icon-wrap"><i class="fas fa-fw fa-user-cog"></i></div>
        <span>Manajemen Akun</span>
      </a>
    </li>

  </div><!-- /sb-nav-wrap -->


</ul>


