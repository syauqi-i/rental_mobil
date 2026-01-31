<?php 

class C_Akun extends Controller {
	public function __construct(){
		$this->addFunction('url');
		if(!isset($_SESSION['login'])) {
			$_SESSION['error'] = 'Anda harus masuk dulu!';
			header('Location: ' . base_url());
		}
		
		$this->addFunction('web');
		$this->addFunction('session');
		$this->req = $this->library('Request');
		$this->akun = $this->model('M_Akun');
		$this->tfa = $this->library('TwoFactorAuth');
	}

	public function index(){
		$data = [
			'aktif' => 'akun',
			'judul' => 'Data Akun',
			'data_akun' => $this->akun->lihat(),
			'no' => 1
		];
		$this->view('akun/index', $data);
	}

	public function tambah(){
		if(!isset($_POST['tambah'])) redirect('akun');

		if($_POST['password'] !== $_POST['password2']) {
			setSession('error', 'Password tidak sama!');
			redirect('akun');
		} else {
			// proses upload
			$upload_dir = BASEPATH . DS . 'uploads' . DS;
			$asal = $_FILES['foto']['tmp_name'];
			$ekstensi = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
			$error = $_FILES['foto']['error'];

			$img_name = $this->req->post('nama');
			$img_name = $this->req->post('nama');
			$img_name = strtolower($img_name);
			$img_name = str_replace(' ', '-', $img_name);
			$img_name = $img_name . '-' . time();

			if($error == 0){
				if(file_exists($upload_dir . $img_name . '.' . $ekstensi)) unlink($upload_dir . $img_name . '.' . $ekstensi);
				
				if(move_uploaded_file($asal, $upload_dir . $img_name . '.' . $ekstensi)){
					$data = [
						'nama' => $this->req->post('nama'),
						'username' => $this->req->post('username'),
						'password' => password_hash($this->req->post('password'), PASSWORD_DEFAULT),
						'foto' => $img_name . '.' . $ekstensi,
					];

					if($this->akun->tambah($data)){
						setSession('success', 'Data berhasil ditambahkan!');
						redirect('akun');
					} else {
						setSession('error', 'Data gagal ditambahkan!');
						redirect('akun');
					}
				} else die('gagal upload gambar');
			} else die('gambar error');
		}
	}

	public function hapus($id = null){
		if(!isset($id) || $this->akun->cek($id)->num_rows == 0) redirect('akun');

		$gambar	= $this->akun->detail($id)->fetch_object()->foto;

		unlink(BASEPATH . DS . 'uploads' . DS . $gambar) or die('gagal hapus gambar!');
		if($this->akun->hapus($id)){
			setSession('success', 'Data berhasil dihapus!');
			redirect('akun');
		} else {
			setSession('error', 'Data gagal dihapus!');
			redirect('akun');
		}
	}

	public function detail($id){
		if(!isset($id) || $this->akun->cek($id)->num_rows == 0) redirect('akun');

		$data = [
			'aktif' => 'akun',
			'judul' => 'Detail Akun',
			'akun' => $this->akun->detail($id)->fetch_object(),
		];

		$this->view('akun/detail', $data);
	}

	public function mfa($id){
		if(!isset($id) || $this->akun->cek($id)->num_rows == 0) redirect('akun');
		$akun = $this->akun->detail($id)->fetch_object();

		// if MFA not enabled, create a temp secret to show QR
		if(!$akun->mfa_enabled){
			$secret = $this->tfa->createSecret();
			$qr = $this->tfa->getQRCodeUrl($akun->username, APP_NAME, $secret);
			$otpauth = $this->tfa->getOtpAuthUrl($akun->username, APP_NAME, $secret);
			// save temp secret to session for verification step
			setSession('mfa_temp', ['id' => $id, 'secret' => $secret]);
			$data = ['aktif' => 'akun', 'judul' => 'Manage MFA', 'akun' => $akun, 'secret' => $secret, 'qr' => $qr, 'otpauth' => $otpauth];			} else {
				$data = ['aktif' => 'akun', 'judul' => 'Manage MFA', 'akun' => $akun];		}
		$this->view('akun/mfa', $data);
	}

	public function proses_mfa($id){
		if(!isset($_POST['code'])) redirect('akun');
		$code = $this->req->post('code');
		$temp = getSession('mfa_temp');
		if(!$temp || $temp['id'] != $id){
			setSession('error', 'Sesi MFA tidak ditemukan. Silakan mulai ulang proses.');
			redirect('akun/mfa/' . $id);
		}
		$secret = $temp['secret'];
		// verify code
		if($this->tfa->verifyCode($secret, $code)){
			// generate recovery codes (8)
			$recovery = [];
			$recovery_hashes = [];
			for($i=0;$i<8;$i++){
				$rc = bin2hex(random_bytes(4));
				$recovery[] = $rc;
				$recovery_hashes[] = password_hash($rc, PASSWORD_DEFAULT);
			}
			$recovery_json = json_encode($recovery_hashes);
			$this->akun->set_mfa($id, $secret, $recovery_json, 'TOTP');
			setSession('success', 'MFA berhasil diaktifkan. Simpan recovery codes dengan aman.');
			setSession('mfa_temp', null);
			// show recovery codes once
			setSession('mfa_recovery_plain', json_encode($recovery));
			redirect('akun/mfa/' . $id);
		} else {
			setSession('error', 'Kode verifikasi salah.');
			redirect('akun/mfa/' . $id);
		}
	}

	public function disable_mfa($id){
		// for safety require POST and password confirmation
		if($_SERVER['REQUEST_METHOD'] !== 'POST') redirect('akun');
		$pw = $this->req->post('password');
		$akun = $this->akun->detail($id)->fetch_object();
		if(!$pw || !password_verify($pw, $akun->password)){
			setSession('error', 'Password tidak cocok.');
			redirect('akun/mfa/' . $id);
		}
		$this->akun->disable_mfa($id);
		setSession('success', 'MFA dinonaktifkan.');
		redirect('akun/mfa/' . $id);
	}
}