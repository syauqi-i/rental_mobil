<?php 

class C_Dashboard extends Controller {
	public function __construct(){
		$this->addFunction('url');
		if(!isset($_SESSION['login'])) {
			$_SESSION['error'] = 'Anda harus masuk dulu!';
			header('Location: ' . base_url());
		}

		$this->addFunction('web');
		$this->mobil = $this->model('M_Mobil');
		$this->pemesan = $this->model('M_Pemesan');
		$this->pesanan = $this->model('M_Pesanan');
		$this->akun = $this->model('M_Akun');
	}
	public function index(){
		// ── Build monthly chart data (12 months, fill zeros) ──
		$raw_bulan = $this->pesanan->per_bulan();
		$bulan_map = array_fill(1, 12, 0);
		if($raw_bulan){
			while($r = $raw_bulan->fetch_object()){
				$bulan_map[(int)$r->bulan] = (int)$r->total;
			}
		}

		// ── Per-mobil chart data ──
		$raw_mobil   = $this->pesanan->per_mobil();
		$label_mobil = []; $val_mobil = [];
		if($raw_mobil){
			while($r = $raw_mobil->fetch_object()){
				$label_mobil[] = $r->nama_mobil;
				$val_mobil[]   = (int)$r->total;
			}
		}

		// ── Per-jenis-bayar donut data ──
		$raw_bayar   = $this->pesanan->per_jenis_bayar();
		$label_bayar = []; $val_bayar = [];
		if($raw_bayar){
			while($r = $raw_bayar->fetch_object()){
				$label_bayar[] = $r->jenis_bayar;
				$val_bayar[]   = (int)$r->total;
			}
		}

		$data = [
			'aktif'        => 'dashboard',
			'judul'        => 'Dashboard',
			'mobil'        => $this->mobil->lihat(),
			'pemesan'      => $this->pemesan->lihat(),
			'pesanan'      => $this->pesanan->lihat(),
			'akun'         => $this->akun->lihat(),
			// chart payloads
			'chart_bulan'  => array_values($bulan_map),
			'chart_mobil_label' => $label_mobil,
			'chart_mobil_val'   => $val_mobil,
			'chart_bayar_label' => $label_bayar,
			'chart_bayar_val'   => $val_bayar,
		];
		$this->view('dashboard', $data);
	}
}