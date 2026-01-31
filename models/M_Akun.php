<?php 

class M_Akun extends Model {
	public function lihat(){
		$query = $this->get('tbl_akun', ['nama', 'username', 'id']);
		$query = $this->execute();
		return $query;
	}

	public function tambah($data){
		$query = $this->insert('tbl_akun', $data);
		$query = $this->execute();
		return $query;
	}

	public function lihat_id($id){
		$query = $this->get_where('tbl_akun', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function cek($id){
		$query = $this->get_where('tbl_akun', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function cek_login($username){
		$query = $this->get_where('tbl_akun', ['username' => $username]);
		$query = $this->execute();
		return $query;
	}

	public function detail($id){
		$query = $this->get_where('tbl_akun', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function hapus($id){
		$query = $this->delete('tbl_akun', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function set_mfa($id, $secret, $recovery_hashes, $type = 'TOTP'){
		$update = [
			'mfa_enabled' => 1,
			'mfa_secret' => $secret,
			'mfa_recovery' => $recovery_hashes,
			'mfa_type' => $type
		];
		$query = $this->update('tbl_akun', $update, ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function disable_mfa($id){
		$update = [
			'mfa_enabled' => 0,
			'mfa_secret' => null,
			'mfa_recovery' => null,
			'mfa_type' => null
		];
		$query = $this->update('tbl_akun', $update, ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function consume_recovery_code($id, $code){
		$akun = $this->get_where('tbl_akun', ['id' => $id]);
		$akun = $this->execute()->fetch_object();

		if(empty($akun->mfa_recovery)) return false;

		$recovery = json_decode($akun->mfa_recovery, true);
		if(!is_array($recovery)) return false;

		$updated = [];
		$consumed = false;
		foreach($recovery as $hash){
			if(!$consumed && password_verify($code, $hash)){
				$consumed = true;
				continue; // skip adding this one back
			}
			$updated[] = $hash;
		}

		if($consumed){
			$updated_json = json_encode($updated);
			$this->update('tbl_akun', ['mfa_recovery' => $updated_json], ['id' => $id]);
			$this->execute();
			return true;
		}

		return false;
	}
}