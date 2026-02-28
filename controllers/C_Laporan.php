<?php

class C_Laporan extends Controller {
    public function __construct(){
        $this->addFunction('url');
        if(!isset($_SESSION['login'])){
            $_SESSION['error'] = 'Anda harus masuk dulu!';
            header('Location: ' . base_url());
        }
        $this->addFunction('web');
        $this->addFunction('session');
        $this->pesanan  = $this->model('M_Pesanan');
        $this->mobil    = $this->model('M_Mobil');
        $this->pemesan  = $this->model('M_Pemesan');
    }

    public function index(){
        // Ambil filter tanggal dari query string
        $dari  = isset($_GET['dari'])  ? $_GET['dari']  : date('Y-m-01');
        $sampai = isset($_GET['sampai']) ? $_GET['sampai'] : date('Y-m-d');

        $data = [
            'aktif'   => 'laporan',
            'judul'   => 'Laporan Rental',
            'dari'    => $dari,
            'sampai'  => $sampai,
            'pesanan' => $this->pesanan->laporan($dari, $sampai),
            'summary' => $this->pesanan->summary_laporan($dari, $sampai),
        ];
        $this->view('laporan/index', $data);
    }

    public function cetak(){
        $dari   = isset($_GET['dari'])   ? $_GET['dari']   : date('Y-m-01');
        $sampai = isset($_GET['sampai']) ? $_GET['sampai'] : date('Y-m-d');

        $data = [
            'aktif'   => 'laporan',
            'judul'   => 'Cetak Laporan Rental',
            'dari'    => $dari,
            'sampai'  => $sampai,
            'pesanan' => $this->pesanan->laporan($dari, $sampai),
            'summary' => $this->pesanan->summary_laporan($dari, $sampai),
        ];
        $this->view('laporan/cetak', $data);
    }
}
