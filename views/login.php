<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?= APP_NAME ?> - Login</title>
	<link href="<?= base_url('sb-admin-2/') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('sb-admin-2/') ?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background: linear-gradient(135deg,#4e73df 0%,#224abe 100%);font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;">

	<div class="container">
		<div class="login-card" style="max-width:420px;margin:6rem auto;background:rgba(255,255,255,0.96);border-radius:14px;padding:2rem;box-shadow:0 12px 30px rgba(34,67,150,0.18);">
			<div style="text-align:center;margin-bottom:1rem;">
				<div class="logo" style="width:72px;height:72px;border-radius:14px;background:#fff;display:inline-flex;align-items:center;justify-content:center;margin:0 auto 12px;box-shadow:0 6px 18px rgba(0,0,0,0.08);">
					<img src="<?= base_url('sb-admin-2/img/logo.svg') ?>" alt="logo" style="width:48px;height:48px;object-fit:contain;">
				</div>
				<h1 style="font-weight:700;margin:0 0 6px;font-size:24px;color:#172554;">Selamat Datang</h1>
				<p style="margin:0;color:#4b556a;">Masuk untuk mengelola aplikasi</p>
			</div>

			<?php if(checkSession('success')): ?>
				<div class="alert alert-success" role="alert">
					<?= getSession('success', true) ?>
				</div>
			<?php elseif(checkSession('error')): ?>
				<div class="alert alert-danger" role="alert">
					<?= getSession('error', true) ?>
				</div>
			<?php endif ?>

			<form method="POST" action="<?= base_url('auth/login') ?>" id="login-form">
				<input type="hidden" name="login" value="1">
				<div class="form-group" style="margin-bottom:0.85rem;">
					<label for="username" style="display:block;margin-bottom:6px;color:#374151;font-weight:600;font-size:13px;">Username</label>
					<input id="username" type="text" class="form-control" name="username" placeholder="admin" autocomplete="off" required style="border-radius:8px;padding:0.75rem 1rem;border:1px solid #e6e9f2;">
				</div>
				<div class="form-group" style="margin-bottom:0.85rem;position:relative;">
					<label for="password" style="display:block;margin-bottom:6px;color:#374151;font-weight:600;font-size:13px;">Password</label>
					<input id="password" type="password" class="form-control" name="password" placeholder="••••••••" required style="border-radius:8px;padding:0.75rem 1rem;border:1px solid #e6e9f2;">
					<button type="button" id="toggle-password" aria-label="Show password" style="position:absolute;right:8px;top:34px;border:none;background:transparent;color:#6b7280;font-size:16px;">
						<i id="toggle-icon" class="fas fa-eye" aria-hidden="true"></i>
					</button>
				</div>
				<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:0.75rem;">
					<div>
						<input type="checkbox" id="remember" name="remember"> <label for="remember" style="font-size:13px;color:#374151"> Ingat saya</label>
					</div>
					<a href="<?= base_url('auth/forgot') ?>" style="font-size:13px;color:#2563eb;text-decoration:none;">Lupa password?</a>
				</div>
				<button type="submit" class="btn" style="width:100%;padding:0.75rem;border-radius:10px;background:linear-gradient(90deg,#2563eb,#4f46e5);color:#fff;font-weight:600;border:none;">Masuk</button>
			</form>

			<div style="text-align:center;margin-top:1rem;color:#9ca3af;font-size:13px;">Belum punya akun? Hubungi administrator.</div>
			<footer style="margin-top:1.25rem;text-align:center;color:#9aa3b2;font-size:12px;">&copy; <?= date('Y') ?> <?= APP_NAME ?></footer>
		</div>
	</div>

	<script src="<?= base_url('sb-admin-2/') ?>/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('sb-admin-2/') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script>
		// Toggle password visibility (with icon)
	document.addEventListener('DOMContentLoaded', function(){
		var toggle = document.getElementById('toggle-password');
		var toggleIcon = document.getElementById('toggle-icon');
		var pwd = document.getElementById('password');
		if(toggle && pwd && toggleIcon){
			toggle.addEventListener('click', function(){
				if(pwd.type === 'password'){
					pwd.type = 'text';
					toggleIcon.classList.remove('fa-eye');
					toggleIcon.classList.add('fa-eye-slash');
					toggle.setAttribute('aria-label','Hide password');
				} else {
					pwd.type = 'password';
					toggleIcon.classList.remove('fa-eye-slash');
					toggleIcon.classList.add('fa-eye');
					toggle.setAttribute('aria-label','Show password');
				}
			});
		}

		// Disable button on submit
		var form = document.getElementById('login-form');
		if(form){
			form.addEventListener('submit', function(e){
				var btn = form.querySelector('button[type="submit"]');
				if(btn){ btn.disabled = true; btn.textContent = 'Memproses...'; }
			});
		}
	});
	</script>

</html>
