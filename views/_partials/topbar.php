<style>
/* ── Modern Topbar ── */
.topbar.navbar {
  background: #ffffff !important;
  border-bottom: 1px solid #e2e8f0 !important;
  padding: 0 1.5rem !important;
  height: 64px !important;
  box-shadow: 0 1px 8px rgba(15,23,42,0.06) !important;
  font-family: 'Inter', system-ui, sans-serif;
  margin-bottom: 0 !important;
  position: sticky;
  top: 0;
  z-index: 99;
}

/* Search placeholder / mobile toggle */
#sidebarToggleTop {
  color: #64748b !important;
  padding: 6px 10px !important;
  border-radius: 8px !important;
  transition: background .18s !important;
}
#sidebarToggleTop:hover { background: #f1f5f9 !important; }

/* Current page breadcrumb label */
.topbar-page-title {
  font-size: .88rem;
  font-weight: 700;
  color: #0f172a;
  display: none;
}
@media(min-width:768px){ .topbar-page-title{ display:block; } }

/* Right section */
.topbar .navbar-nav { align-items: center; gap: .5rem; }

/* Greeting chip */
.topbar-greeting {
  font-size: .8rem;
  color: #64748b;
  font-weight: 500;
  padding: 5px 12px;
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 100px;
  white-space: nowrap;
  display: none;
}
@media(min-width:992px){ .topbar-greeting{ display:block; } }

/* Divider */
.topbar-divider { width: 1px; height: 28px; background: #e2e8f0; margin: 0 !important; }

/* Avatar dropdown toggle */
.topbar .nav-link.dropdown-toggle {
  display: flex !important;
  align-items: center !important;
  gap: 8px !important;
  padding: 6px 10px !important;
  border-radius: 10px !important;
  transition: background .18s !important;
  text-decoration: none !important;
  color: #334155 !important;
}
.topbar .nav-link.dropdown-toggle:hover { background: #f1f5f9 !important; }

.topbar .img-profile {
  width: 34px; height: 34px;
  border-radius: 10px !important;
  object-fit: cover;
  border: 2px solid #e2e8f0;
  flex-shrink: 0;
}

.topbar .mr-2 {
  font-size: .84rem;
  font-weight: 600;
  color: #334155;
}

/* Dropdown menu */
.topbar .dropdown-menu {
  border: 1px solid #e2e8f0 !important;
  border-radius: 12px !important;
  box-shadow: 0 8px 24px rgba(15,23,42,.10) !important;
  padding: .4rem !important;
  min-width: 180px !important;
  font-family: 'Inter', system-ui, sans-serif;
}
.topbar .dropdown-item {
  border-radius: 8px !important;
  padding: .55rem .9rem !important;
  font-size: .84rem !important;
  font-weight: 500 !important;
  color: #334155 !important;
  transition: background .15s, color .15s !important;
  display: flex !important;
  align-items: center !important;
  gap: 8px !important;
}
.topbar .dropdown-item:hover {
  background: #fef2f2 !important;
  color: #dc2626 !important;
}
.topbar .dropdown-item i { font-size: .82rem; color: #94a3b8; }
.topbar .dropdown-item:hover i { color: #dc2626; }
</style>

<nav class="navbar navbar-expand topbar mb-4 static-top">
  <!-- Mobile sidebar toggle -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>

  <!-- Right side -->
  <ul class="navbar-nav ml-auto">
    <!-- Greeting -->
    <li class="nav-item">
      <span class="topbar-greeting">
        👋 <?= $_SESSION['login']['nama'] ?>
      </span>
    </li>

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- User dropdown -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#"
         id="userDropdown" role="button"
         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline"><?= $_SESSION['login']['nama'] ?></span>
        <img class="img-profile"
             src="<?= base_url('uploads') . '/' . $_SESSION['login']['foto'] ?>"
             alt="<?= $_SESSION['login']['nama'] ?>">
      </a>
      <div class="dropdown-menu dropdown-menu-right animated--grow-in"
           aria-labelledby="userDropdown">
        <a class="dropdown-item text-danger"
           href="<?= base_url('auth/logout') ?>"
           onclick="return confirm('Yakin ingin keluar?')">
          <i class="fas fa-sign-out-alt fa-sm"></i> Logout
        </a>
      </div>
    </li>
  </ul>
</nav>