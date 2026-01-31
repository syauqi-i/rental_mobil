<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?= APP_NAME ?> - Manage MFA</title>
	<link href="<?= base_url('sb-admin-2/') ?>/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
	<div class="card">
		<div class="card-header">Manage MFA - <?= $akun->nama ?></div>
		<div class="card-body">
			<?php if(isset($secret) && !$akun->mfa_enabled): ?>
				<div class="alert alert-info">Ikuti langkah: <ol><li>Scan QR dengan aplikasi Authenticator</li><li>Masukkan kode 6 digit untuk verifikasi</li><li>Simpan recovery codes yang muncul</li></ol></div>
				<div class="row">
					<div class="col-md-6 text-center">
					<div id="qrcode-target" style="display:inline-block;vertical-align:top;margin-bottom:10px;"></div>
					<img id="mfa-qr" src="<?= $qr ?>" alt="QR Code" class="img-fluid border" style="max-width:260px;display:inline-block;" onerror="document.getElementById('qr-error').style.display='block';"><br><br>
					<div id="qr-error" style="display:none;color:#c00;margin-bottom:10px;">Gagal memuat QR. Saya akan mencoba menggambar QR di browser.</div>
					</div>
					<div class="col-md-6">
						<form method="POST" action="<?= base_url('akun/proses_mfa/' . $akun->id) ?>">
							<div class="form-group">
								<label>Masukkan kode verifikasi</label>
								<input type="text" name="code" class="form-control" placeholder="Kode 6 digit" required autofocus>
							</div>
							<button class="btn btn-success">Aktifkan MFA</button>
						</form>
					</div>
				</div>
			<?php else: ?>
				<p>MFA saat ini <b><?= $akun->mfa_enabled ? 'Aktif' : 'Tidak aktif' ?></b></p>
				<?php if($akun->mfa_enabled): ?>
					<?php if(checkSession('mfa_recovery_plain')): $plain = json_decode(getSession('mfa_recovery_plain', true), true); ?>
						<div class="alert alert-info">Recovery codes (simpan sekali): <br>
							<ul class="list-unstyled">
								<?php if(is_array($plain)): foreach($plain as $rc): ?>
									<li><code><?= $rc ?></code></li>
								<?php endforeach; endif; ?>
							</ul>
							<button type="button" class="btn btn-sm btn-outline-secondary" onclick="copyRecovery()">Copy semua</button>
						</div>
					<?php endif ?>
					<form method="POST" action="<?= base_url('akun/disable_mfa/' . $akun->id) ?>" onsubmit="return confirm('Yakin menonaktifkan MFA?')">
						<div class="form-group">
							<label>Masukkan password untuk konfirmasi</label>
							<input type="password" name="password" class="form-control" required>
						</div>
						<button class="btn btn-danger">Nonaktifkan MFA</button>
					</form>
				<?php endif ?>				<?php endif ?>			<a href="<?= base_url('akun') ?>" class="btn btn-secondary mt-3">Kembali</a>
		</div>
	</div>
</div>

<script>
function copyText(id){
	var el = document.getElementById(id);
	var text = el ? el.textContent : '';
	var ta = document.createElement('textarea');
	ta.value = text;
	document.body.appendChild(ta);
	ta.select();
	document.execCommand('copy');
	document.body.removeChild(ta);
	alert('Tersalin ke clipboard');
}
function copyRecovery(){
	var nodes = document.querySelectorAll('.list-unstyled code');
	var out = [];
	nodes.forEach(function(n){ out.push(n.textContent); });
	if(out.length==0){ alert('Tidak ada recovery code'); return; }
	var ta = document.createElement('textarea');
	ta.value = out.join('\n');
	document.body.appendChild(ta);
	ta.select();
	document.execCommand('copy');
	document.body.removeChild(ta);
	alert('Recovery codes disalin ke clipboard. Simpan di tempat aman.');
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function(){
    var qrImg = document.getElementById('mfa-qr');
    var target = document.getElementById('qrcode-target');
    var qrError = document.getElementById('qr-error');
    var otpauth = '<?= isset($otpauth) ? htmlspecialchars($otpauth, ENT_QUOTES, "UTF-8") : '' ?>';

    function generateFromOtpauth(){
        if(!otpauth) return;
        if(target){
            target.innerHTML = '';
            try {
                new QRCode(target, {text: otpauth, width:200, height:200});
            } catch(e){
                console.error('QR generation failed', e);
            }
            if(qrImg) qrImg.style.display = 'none';
            if(qrError) qrError.style.display = 'none';
        }
    }

    // if image failed to load or is from blocked source, fallback
    if(qrImg){
        // if image already loaded but broken
        if(qrImg.complete){
            if(qrImg.naturalWidth === 0) generateFromOtpauth();
        } else {
            qrImg.addEventListener('error', generateFromOtpauth);
            setTimeout(function(){
                if(qrImg.naturalWidth === 0) generateFromOtpauth();
            }, 600);
        }
    } else {
        generateFromOtpauth();
    }
});
</script>

</body>
</html>