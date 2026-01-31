<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?= APP_NAME ?> - MFA Verification</title>
	<link href="<?= base_url('sb-admin-2/') ?>/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-5">
					<div class="text-center mb-4">
						<h4>Multi-Factor Authentication</h4>
						<?php if(checkSession('pre_mfa')): $pre = getSession('pre_mfa'); ?>
							<p>Username: <strong><?= htmlspecialchars($pre['username']) ?></strong></p>
						<?php endif ?>
						<p>Masukkan kode dari aplikasi autentikator (6 digit) atau salah satu recovery codes.</p>
					</div>
					<?php if(checkSession('error')): ?>
						<div class="alert alert-danger"><?= getSession('error', true) ?></div>
					<?php endif ?>
					<form method="POST" action="<?= base_url('auth/verify_mfa') ?>">
						<div class="form-group">
							<input type="text" name="code" class="form-control form-control-user" placeholder="Kode 6 digit atau recovery" required autofocus>
						</div>
						<button class="btn btn-primary btn-block">Verifikasi</button>
					</form>
					<div class="mt-3 text-center small text-muted">Jika bermasalah, hubungi administrator.</div>
					<div class="mt-3 text-center">
						<a href="<?= base_url() ?>">Batal</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>