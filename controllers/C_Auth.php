<?php 

if(!defined('BASEPATH')) echo "Tidak bisa langsung mengakses halaman ini!";

class C_Auth extends Controller{
	public function __construct(){
		$this->addFunction('url');
		if(isset($_SESSION['login'])) {
			header('Location: ' . base_url('dashboard'));
		}

		$this->addFunction('web');
		$this->addFunction('session');
		$this->req = $this->library('Request');
		$this->akun = $this->model('M_Akun');
		$this->tfa = $this->library('TwoFactorAuth');
	}
	
	public function index(){
		$this->view('login');
	}

	public function login(){
		// accept POST submissions (supports button-name or plain POST)
		if($_SERVER['REQUEST_METHOD'] !== 'POST') redirect();
		$username = $this->req->post('username');
		$password = $this->req->post('password');

			$akun = $this->akun->cek_login($username);
			
			if($akun->num_rows > 0){
				$akun = $akun->fetch_object();
				if(password_verify($password, $akun->password)){
					// check MFA status
					if(isset($akun->mfa_enabled) && $akun->mfa_enabled == 1){
						// set temporary session and redirect to MFA verification
						setSession('pre_mfa', [
							'id' => $akun->id,
							'username' => $akun->username
						]);
						redirect('auth/mfa');
					} else {
						setSession('login', [
							'auth' => true,
							'nama' => $akun->nama,
							'username' => $akun->username,
							'foto' => $akun->foto,
							'waktu' => date('d M Y H:i:s')
						]);
						redirect('dashboard');
					}
				} else {
					setSession('error', 'Password salah!');
					redirect();
				}
			} else {
				setSession('error', 'Username tidak ditemukan!');
				redirect();
			}
		}


	public function logout(){
		// Fully destroy session and cookie to ensure logout
		$_SESSION = [];
		if (ini_get('session.use_cookies')) {
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000,
				$params['path'], $params['domain'], $params['secure'], $params['httponly']
			);
		}
		session_destroy();
		redirect();
	}

	public function mfa(){
		// show MFA verification form if pre_mfa exists
		if(!checkSession('pre_mfa')) redirect();
		$this->view('auth/mfa');
	}

	public function verify_mfa(){
		if(!isset($_POST['code'])) redirect('auth/mfa');
		$code = $this->req->post('code');
		$pre = getSession('pre_mfa');
		if(!$pre){
			setSession('error', 'Sesi verifikasi MFA tidak ditemukan.');
			redirect();
		}
		$akun = $this->akun->cek($pre['id'])->fetch_object();

		// first try normal TOTP
		if(isset($akun->mfa_secret) && $akun->mfa_secret){
			if($this->tfa->verifyCode($akun->mfa_secret, $code)){
				// success: set login
				setSession('login', [
					'auth' => true,
					'nama' => $akun->nama,
					'username' => $akun->username,
					'foto' => $akun->foto,
					'waktu' => date('d M Y H:i:s')
				]);
				// clear pre_mfa
				setSession('pre_mfa', null);
				redirect('dashboard');
			}
		}

		// check recovery codes
		if($this->akun->consume_recovery_code($akun->id, $code)){
			setSession('login', [
				'auth' => true,
				'nama' => $akun->nama,
				'username' => $akun->username,
				'foto' => $akun->foto,
				'waktu' => date('d M Y H:i:s')
			]);
			setSession('pre_mfa', null);
			setSession('success', 'Login berhasil menggunakan recovery code. Perhatikan recovery codes yang tersisa.');
			redirect('dashboard');
		}

		setSession('error', 'Kode MFA salah!');
		redirect('auth/mfa');
	}
}