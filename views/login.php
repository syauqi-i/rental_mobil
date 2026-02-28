<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= APP_NAME ?> - Login</title>
  <link href="<?= base_url('sb-admin-2/') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.12.2/lottie.min.js"></script>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --primary:       #2563eb;
      --primary-light: #eff6ff;
      --primary-hover: #1d4ed8;
      --accent:        #6366f1;
      --surface:       #ffffff;
      --bg:            #f1f5f9;
      --border:        #e2e8f0;
      --text-dark:     #0f172a;
      --text-mid:      #334155;
      --text-light:    #94a3b8;
      --shadow-sm:     0 1px 3px rgba(0,0,0,0.07), 0 1px 2px rgba(0,0,0,0.05);
      --shadow-md:     0 4px 20px rgba(15,23,42,0.08), 0 1px 4px rgba(15,23,42,0.05);
      --shadow-lg:     0 20px 60px rgba(15,23,42,0.10), 0 4px 16px rgba(15,23,42,0.06);
    }

    html, body {
      height: 100%;
      font-family: 'Inter', system-ui, sans-serif;
      background: var(--bg);
      color: var(--text-dark);
    }

    /* ── Subtle grid background ── */
    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background-image:
        linear-gradient(rgba(99,102,241,0.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(99,102,241,0.04) 1px, transparent 1px);
      background-size: 32px 32px;
      pointer-events: none;
      z-index: 0;
    }

    /* ── Soft decorative circles ── */
    .deco-circle {
      position: fixed;
      border-radius: 50%;
      pointer-events: none;
      z-index: 0;
    }
    .deco-1 {
      width: 520px; height: 520px;
      background: radial-gradient(circle, rgba(37,99,235,0.07) 0%, transparent 70%);
      top: -180px; right: -120px;
    }
    .deco-2 {
      width: 400px; height: 400px;
      background: radial-gradient(circle, rgba(99,102,241,0.07) 0%, transparent 70%);
      bottom: -140px; left: -100px;
    }
    .deco-3 {
      width: 220px; height: 220px;
      background: radial-gradient(circle, rgba(37,99,235,0.05) 0%, transparent 70%);
      top: 40%; left: 38%;
    }

    /* ── Page layout ── */
    .page {
      position: relative;
      z-index: 10;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 24px 16px;
    }

    .login-container {
      display: flex;
      align-items: stretch;
      width: 100%;
      max-width: 920px;
      background: var(--surface);
      border-radius: 24px;
      box-shadow: var(--shadow-lg);
      border: 1px solid var(--border);
      overflow: hidden;
      animation: fadeUp 0.55s cubic-bezier(.22,.68,0,.97) both;
    }
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(32px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* ── LEFT PANEL ── */
    .left-panel {
      flex: 1;
      min-width: 0;
      background: linear-gradient(160deg, var(--primary-light) 0%, #e0e7ff 100%);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 3rem 2.5rem;
      gap: 1.5rem;
      position: relative;
      border-right: 1px solid var(--border);
    }

    /* Floating dots decoration */
    .left-panel::before {
      content: '';
      position: absolute;
      inset: 0;
      background-image: radial-gradient(circle, rgba(37,99,235,0.10) 1px, transparent 1px);
      background-size: 22px 22px;
      pointer-events: none;
    }

    .left-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: rgba(37,99,235,0.10);
      border: 1px solid rgba(37,99,235,0.18);
      color: var(--primary);
      font-size: 0.75rem;
      font-weight: 600;
      padding: 5px 12px;
      border-radius: 100px;
      letter-spacing: 0.3px;
    }

    #lottie-anim {
      width: 100%;
      max-width: 320px;
      aspect-ratio: 1/1;
      position: relative;
      z-index: 1;
      filter: drop-shadow(0 8px 24px rgba(37,99,235,0.12));
    }

    .left-title {
      font-size: 1.3rem;
      font-weight: 800;
      color: var(--primary-hover);
      text-align: center;
      letter-spacing: -0.3px;
      line-height: 1.3;
      position: relative;
      z-index: 1;
    }
    .left-desc {
      font-size: 0.85rem;
      color: #475569;
      text-align: center;
      line-height: 1.6;
      max-width: 260px;
      position: relative;
      z-index: 1;
    }

    /* Stats strip */
    .left-stats {
      display: flex;
      gap: 1.25rem;
      position: relative;
      z-index: 1;
    }
    .stat-item {
      text-align: center;
      background: rgba(255,255,255,0.65);
      border: 1px solid rgba(37,99,235,0.10);
      border-radius: 12px;
      padding: 0.6rem 1rem;
      backdrop-filter: blur(8px);
    }
    .stat-num { font-size: 1.1rem; font-weight: 800; color: var(--primary); }
    .stat-lbl { font-size: 0.68rem; color: #64748b; font-weight: 500; }

    /* ── RIGHT PANEL ── */
    .right-panel {
      width: 400px;
      flex-shrink: 0;
      padding: 3rem 2.5rem 2.25rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background: var(--surface);
    }

    /* ── Card header ── */
    .logo-wrap {
      width: 56px; height: 56px;
      border-radius: 16px;
      background: linear-gradient(135deg, var(--primary), var(--accent));
      display: inline-flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 14px;
      box-shadow: 0 4px 16px rgba(37,99,235,0.28);
      animation: logoPop .6s cubic-bezier(.34,1.56,.64,1) .3s both;
    }
    @keyframes logoPop {
      from { opacity:0; transform:scale(.5); }
      to   { opacity:1; transform:scale(1); }
    }
    .logo-wrap i { font-size: 24px; color: #fff; }

    .card-label {
      font-size: 0.72rem;
      font-weight: 700;
      letter-spacing: 1px;
      text-transform: uppercase;
      color: var(--primary);
      margin-bottom: 4px;
    }
    .card-title    { font-size: 1.65rem; font-weight: 800; color: var(--text-dark); letter-spacing: -0.5px; line-height: 1.2; margin-bottom: 4px; }
    .card-subtitle { font-size: 0.86rem; color: var(--text-light); margin-bottom: 1.8rem; }

    /* Divider line */
    .title-divider {
      width: 36px; height: 3px;
      border-radius: 2px;
      background: linear-gradient(90deg, var(--primary), var(--accent));
      margin-bottom: 1.6rem;
    }

    /* ── Alerts ── */
    .alert {
      border-radius: 10px;
      padding: 0.7rem 0.95rem;
      font-size: 0.84rem;
      font-weight: 500;
      margin-bottom: 1.2rem;
      display: flex;
      align-items: center;
      gap: 8px;
      animation: fadeAlert .4s ease both;
    }
    @keyframes fadeAlert { from{opacity:0;transform:translateY(-6px)} to{opacity:1;transform:translateY(0)} }
    .alert-success { background: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; }
    .alert-danger  { background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; }

    /* ── Form ── */
    .form-group { margin-bottom: 1.1rem; }

    .form-label {
      display: block;
      margin-bottom: 6px;
      font-size: 0.78rem;
      font-weight: 700;
      color: var(--text-mid);
      letter-spacing: 0.4px;
      text-transform: uppercase;
    }

    .input-wrap { position: relative; }

    .input-icon {
      position: absolute;
      left: 13px; top: 50%;
      transform: translateY(-50%);
      color: var(--text-light);
      font-size: 13px;
      transition: color .22s;
      pointer-events: none;
    }
    .input-wrap:focus-within .input-icon { color: var(--primary); }

    .form-input {
      width: 100%;
      padding: 0.76rem 1rem 0.76rem 2.4rem;
      border: 1.5px solid var(--border);
      border-radius: 11px;
      background: #f8fafc;
      font-size: 0.92rem;
      color: var(--text-dark);
      font-family: 'Inter', sans-serif;
      transition: border-color .22s, box-shadow .22s, background .22s;
      outline: none;
    }
    .form-input::placeholder { color: #cbd5e1; }
    .form-input:hover  { border-color: #cbd5e1; background: #fff; }
    .form-input:focus  { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(37,99,235,0.10); background: #fff; }
    .form-input.input-error { border-color: #ef4444; animation: shake .4s ease; }

    .pwd-toggle {
      position: absolute; right: 11px; top: 50%;
      transform: translateY(-50%);
      border: none; background: transparent;
      color: var(--text-light); font-size: 14px;
      cursor: pointer; padding: 4px; border-radius: 6px;
      transition: color .2s, background .2s;
    }
    .pwd-toggle:hover { color: var(--primary); background: var(--primary-light); }

    /* ── Remember / Forgot ── */
    .form-footer {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 1.35rem;
    }
    .remember-label {
      display: flex; align-items: center; gap: 6px;
      font-size: .82rem; color: var(--text-mid);
      cursor: pointer; user-select: none;
    }
    .remember-label input[type="checkbox"] { accent-color: var(--primary); width: 14px; height: 14px; }
    .forgot-link { font-size: .82rem; color: var(--primary); text-decoration: none; font-weight: 600; transition: color .2s; }
    .forgot-link:hover { color: var(--primary-hover); text-decoration: underline; }

    /* ── Submit button ── */
    .btn-login {
      width: 100%;
      padding: 0.82rem;
      border: none; border-radius: 12px;
      background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
      color: #fff;
      font-size: 0.95rem; font-weight: 700;
      font-family: 'Inter', sans-serif;
      cursor: pointer;
      position: relative; overflow: hidden;
      transition: transform .18s, box-shadow .18s, filter .18s;
      box-shadow: 0 4px 18px rgba(37,99,235,0.30);
      letter-spacing: 0.2px;
    }
    .btn-login:hover  { transform: translateY(-2px); box-shadow: 0 8px 28px rgba(37,99,235,0.38); filter: brightness(1.05); }
    .btn-login:active { transform: translateY(0); box-shadow: 0 2px 10px rgba(37,99,235,0.22); }
    .btn-login:disabled { opacity: .6; cursor: not-allowed; transform: none; filter: none; }

    .btn-loader { display: inline-flex; align-items: center; gap: 9px; }
    .spinner {
      display: none; width: 16px; height: 16px;
      border: 2.5px solid rgba(255,255,255,.3);
      border-top-color: #fff;
      border-radius: 50%;
      animation: spin .65s linear infinite;
    }
    @keyframes spin { to { transform: rotate(360deg); } }

    /* ── Footer ── */
    .card-note { text-align:center;font-size:.78rem;color:var(--text-light);margin-top:.9rem; }
    .card-copy { text-align:center;color:#cbd5e1;font-size:.70rem;margin-top:1rem; }

    @keyframes shake {
      0%,100%{transform:translateX(0)} 20%,60%{transform:translateX(-5px)} 40%,80%{transform:translateX(5px)}
    }

    /* ── Responsive ── */
    @media (max-width: 700px) {
      .left-panel { display: none; }
      .login-container { max-width: 420px; }
      .right-panel { width: 100%; padding: 2.2rem 1.75rem 2rem; }
    }
  </style>
</head>

<body>

  <!-- Decorative circles -->
  <div class="deco-circle deco-1"></div>
  <div class="deco-circle deco-2"></div>
  <div class="deco-circle deco-3"></div>

  <div class="page">
    <div class="login-container">

      <!-- ── LEFT: illustration ── -->
      <div class="left-panel">
        <span class="left-badge"><i class="fas fa-circle-check"></i> Sistem Aktif</span>

        <div id="lottie-anim"></div>

        <p class="left-title">Rental Mobil Online</p>
        <p class="left-desc">
          Platform manajemen armada, pesanan, dan transaksi yang mudah dan efisien.
        </p>

        <div class="left-stats">
          <div class="stat-item">
            <div class="stat-num">24/7</div>
            <div class="stat-lbl">Aktif</div>
          </div>
          <div class="stat-item">
            <div class="stat-num">100%</div>
            <div class="stat-lbl">Aman</div>
          </div>
          <div class="stat-item">
            <div class="stat-num">Fast</div>
            <div class="stat-lbl">Respons</div>
          </div>
        </div>
      </div>

      <!-- ── RIGHT: login form ── -->
      <div class="right-panel">

        <div class="logo-wrap">
          <i class="fas fa-car"></i>
        </div>
        <p class="card-label">Selamat datang kembali</p>
        <h1 class="card-title">Masuk ke Akun</h1>
        <p class="card-subtitle">Masukkan kredensial Anda untuk melanjutkan</p>
        <div class="title-divider"></div>

        <?php if(checkSession('success')): ?>
          <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            <?= getSession('success', true) ?>
          </div>
        <?php elseif(checkSession('error')): ?>
          <div class="alert alert-danger" id="err-alert">
            <i class="fas fa-exclamation-circle"></i>
            <?= getSession('error', true) ?>
          </div>
        <?php endif ?>

        <form method="POST" action="<?= base_url('auth/login') ?>" id="login-form" autocomplete="off" novalidate>
          <input type="hidden" name="login" value="1">

          <div class="form-group">
            <label class="form-label" for="username">Username</label>
            <div class="input-wrap">
              <i class="fas fa-user input-icon"></i>
              <input id="username" type="text" name="username" class="form-input"
                     placeholder="Masukkan username" autocomplete="off" required>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" for="password">Password</label>
            <div class="input-wrap">
              <i class="fas fa-lock input-icon"></i>
              <input id="password" type="password" name="password" class="form-input"
                     placeholder="••••••••" required>
              <button type="button" id="toggle-password" class="pwd-toggle" aria-label="Tampilkan password">
                <i id="toggle-icon" class="fas fa-eye"></i>
              </button>
            </div>
          </div>

          <div class="form-footer">
            <label class="remember-label">
              <input type="checkbox" name="remember" id="remember"> Ingat saya
            </label>
            <a href="<?= base_url('auth/forgot') ?>" class="forgot-link">Lupa password?</a>
          </div>

          <button type="submit" class="btn-login" id="btn-submit">
            <span class="btn-loader">
              <span class="spinner" id="btn-spinner"></span>
              <span id="btn-text">Masuk</span>
            </span>
          </button>
        </form>

        <p class="card-note">Belum punya akun? Hubungi administrator.</p>
        <p class="card-copy">&copy; <?= date('Y') ?> <?= APP_NAME ?>. All rights reserved.</p>
      </div>
    </div>
  </div>

  <script src="<?= base_url('sb-admin-2/') ?>/vendor/jquery/jquery.min.js"></script>
  <script>
    // ── Lottie ────────────────────────────────────────────────────
    lottie.loadAnimation({
      container:  document.getElementById('lottie-anim'),
      renderer:   'svg',
      loop:       true,
      autoplay:   true,
      path:       '<?= base_url('assets/animasi_login.json') ?>'
    });

    // ── Password toggle ───────────────────────────────────────────
    document.addEventListener('DOMContentLoaded', function(){
      const toggle     = document.getElementById('toggle-password');
      const toggleIcon = document.getElementById('toggle-icon');
      const pwd        = document.getElementById('password');

      if(toggle && pwd){
        toggle.addEventListener('click', function(){
          const show = pwd.type === 'password';
          pwd.type = show ? 'text' : 'password';
          toggleIcon.className = show ? 'fas fa-eye-slash' : 'fas fa-eye';
          toggle.setAttribute('aria-label', show ? 'Sembunyikan password' : 'Tampilkan password');
        });
      }

      // ── Submit loader ─────────────────────────────────────────
      const form    = document.getElementById('login-form');
      const btn     = document.getElementById('btn-submit');
      const spinner = document.getElementById('btn-spinner');
      const btnText = document.getElementById('btn-text');

      if(form){
        form.addEventListener('submit', function(){
          if(!form.checkValidity()) return;
          btn.disabled          = true;
          spinner.style.display = 'block';
          btnText.textContent   = 'Memproses...';
        });
      }

      // ── Shake inputs on error ─────────────────────────────────
      if(document.getElementById('err-alert')){
        document.querySelectorAll('.form-input').forEach(inp => {
          inp.classList.add('input-error');
          setTimeout(() => inp.classList.remove('input-error'), 600);
        });
      }
    });
  </script>
</body>
</html>
