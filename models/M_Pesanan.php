<?php 

class M_Pesanan extends Model{
	public function tambah($data){
		$query = $this->insert('tbl_pesanan', $data);
		$query = $this->execute();
		return $query;
	}

	public function lihat(){
		$query = $this->setQuery("SELECT tbl_pesanan.id, tbl_pemesan.nama AS nama_pemesan, tbl_mobil.nama AS nama_mobil, tbl_jenis_bayar.jenis_bayar FROM tbl_pesanan INNER JOIN tbl_pemesan ON tbl_pesanan.id_pemesan = tbl_pemesan.id INNER JOIN tbl_mobil ON tbl_pesanan.id_mobil = tbl_mobil.id INNER JOIN tbl_jenis_bayar ON tbl_pesanan.id_jenis_bayar = tbl_jenis_bayar.id");
		$query = $this->execute();
		return $query;
	}

	public function lihat_id($id){
		$query = $this->get_where('tbl_pesanan', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function ubah($data, $id){
		$query = $this->update('tbl_pesanan', $data, ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function cek($id){
		$query = $this->get_where('tbl_pesanan', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function hapus($id){
		$query = $this->delete('tbl_pesanan', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function detail($id){
		$query = $this->setQuery("SELECT tbl_pesanan.*, tbl_pemesan.nama AS nama_pemesan, tbl_mobil.nama AS nama_mobil, tbl_perjalanan.asal, tbl_perjalanan.tujuan, tbl_jenis_bayar.jenis_bayar FROM tbl_pesanan INNER JOIN tbl_pemesan ON tbl_pesanan.id_pemesan = tbl_pemesan.id INNER JOIN tbl_mobil ON tbl_pesanan.id_mobil = tbl_mobil.id INNER JOIN tbl_jenis_bayar ON tbl_pesanan.id_jenis_bayar = tbl_jenis_bayar.id INNER JOIN tbl_perjalanan ON tbl_pesanan.id_perjalanan = tbl_perjalanan.id WHERE tbl_pesanan.id = $id");
		$query = $this->execute();
		return $query;
	}

	public function per_bulan(){
		$query = $this->setQuery("
			SELECT MONTH(tgl_pinjam) AS bulan, COUNT(*) AS total
			FROM tbl_pesanan
			WHERE YEAR(tgl_pinjam) = YEAR(CURDATE())
			GROUP BY MONTH(tgl_pinjam)
			ORDER BY bulan ASC
		");
		$query = $this->execute();
		return $query;
	}

	public function per_mobil(){
		$query = $this->setQuery("
			SELECT tbl_mobil.nama AS nama_mobil, COUNT(tbl_pesanan.id) AS total
			FROM tbl_pesanan
			INNER JOIN tbl_mobil ON tbl_pesanan.id_mobil = tbl_mobil.id
			GROUP BY tbl_pesanan.id_mobil, tbl_mobil.nama
			ORDER BY total DESC
			LIMIT 6
		");
		$query = $this->execute();
		return $query;
	}

	public function per_jenis_bayar(){
		$query = $this->setQuery("
			SELECT tbl_jenis_bayar.jenis_bayar, COUNT(tbl_pesanan.id) AS total
			FROM tbl_pesanan
			INNER JOIN tbl_jenis_bayar ON tbl_pesanan.id_jenis_bayar = tbl_jenis_bayar.id
			GROUP BY tbl_pesanan.id_jenis_bayar
		");
		$query = $this->execute();
		return $query;
	}

	public function laporan($dari, $sampai){
		$query = $this->setQuery("
			SELECT
				tbl_pesanan.id,
				tbl_pemesan.nama  AS nama_pemesan,
				tbl_mobil.nama    AS nama_mobil,
				tbl_perjalanan.asal,
				tbl_perjalanan.tujuan,
				tbl_perjalanan.jarak,
				tbl_jenis_bayar.jenis_bayar,
				tbl_pesanan.tgl_pinjam,
				tbl_pesanan.tgl_kembali,
				tbl_pesanan.harga,
				DATEDIFF(tbl_pesanan.tgl_kembali, tbl_pesanan.tgl_pinjam) AS durasi
			FROM tbl_pesanan
			INNER JOIN tbl_pemesan    ON tbl_pesanan.id_pemesan    = tbl_pemesan.id
			INNER JOIN tbl_mobil      ON tbl_pesanan.id_mobil      = tbl_mobil.id
			INNER JOIN tbl_jenis_bayar ON tbl_pesanan.id_jenis_bayar = tbl_jenis_bayar.id
			INNER JOIN tbl_perjalanan  ON tbl_pesanan.id_perjalanan  = tbl_perjalanan.id
			WHERE tbl_pesanan.tgl_pinjam BETWEEN '$dari' AND '$sampai'
			ORDER BY tbl_pesanan.tgl_pinjam DESC
		");
		$query = $this->execute();
		return $query;
	}

	public function summary_laporan($dari, $sampai){
		$query = $this->setQuery("
			SELECT
				COUNT(*) AS total_pesanan,
				SUM(tbl_pesanan.harga) AS total_pendapatan,
				AVG(tbl_pesanan.harga) AS rata_rata,
				MAX(tbl_pesanan.harga) AS tertinggi,
				MIN(tbl_pesanan.harga) AS terendah
			FROM tbl_pesanan
			WHERE tbl_pesanan.tgl_pinjam BETWEEN '$dari' AND '$sampai'
		");
		$query = $this->execute();
		return $query->fetch_object();
	}
}