<?php

class Setting_model{
	private $db, $nik;
	
	public function __construct(){
		$this->db = new Database;
		$this->nik = $_SESSION['masyarakatNIK'];
	}
	
	public function name($data){
		$this->db->dbh->real_escape_string(extract($data));
		
		if (isset($update)) {
			if ($this->nameCheck($name) == 0) {
				$query = 'UPDATE masyarakat SET nama = ? WHERE nik = ?';
				$this->db->prepare($query);
				$this->db->sth->bind_param('ss', $name, $_SESSION['masyarakatNIK']);
				$this->db->execute();
				if ($this->db->affectedRows() > 0) {
					Flasher::setFlash('Berhasil! ', 'Nama anda telah diubah.', 'success', 'correct');
				}else {
					Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
				}
			}else {
				Flasher::setFlash('Gagal! ', 'Nama tidak diubah.', 'warning', 'warning');
			}
		}else {
			Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
		}
	}
	
	public function nameCheck($name){
		$query = 'SELECT nama FROM masyarakat WHERE nik = ?';
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $this->nik);
		$this->db->execute();
		if ($this->db->getResult() > 0) {
			if ($this->db->row[0]['nama'] == $name) {
				return 1;
			}else {
				return 0;
			}
		}
	}
	
	public function username($data){
		$this->db->dbh->real_escape_string(extract($data));
		
		if (isset($update)) {
			if ($this->usernameCheck($username) == 0) {
				$query = 'UPDATE masyarakat SET username = ? WHERE nik = ?';
				$this->db->prepare($query);
				$this->db->sth->bind_param('ss', $username, $_SESSION['masyarakatNIK']);
				$this->db->execute();
				if ($this->db->affectedRows() > 0) {
					Flasher::setFlash('Berhasil! ', 'Userame anda telah diubah.', 'success', 'correct');
				}else {
					Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
				}
			}else {
				Flasher::setFlash('Gagal! ', 'Userame tidak diubah.', 'warning', 'warning');
			}
		}else {
			Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
		}
	}
	
	public function usernameCheck($username){
		$query = 'SELECT username FROM masyarakat WHERE nik = ?';
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $this->nik);
		$this->db->execute();
		if ($this->db->getResult() > 0) {
			if ($this->db->row[0]['usernama'] == $username) {
				return 1;
			}else {
				return 0;
			}
		}
	}
	
	public function phone($data){
		$this->db->dbh->real_escape_string(extract($data));
		
		if (isset($update)) {
			if ($this->phoneCheck($phone) == 0) {
				$query = 'UPDATE masyarakat SET telp = ? WHERE nik = ?';
				$this->db->prepare($query);
				$this->db->sth->bind_param('ss', $phone, $_SESSION['masyarakatNIK']);
				$this->db->execute();
				if ($this->db->affectedRows() > 0) {
					Flasher::setFlash('Berhasil! ', 'Nomor telepon anda telah diubah.', 'success', 'correct');
				}else {
					Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
				}
			}else {
				Flasher::setFlash('Gagal! ', 'Nomor telepon tidak diubah.', 'warning', 'warning');
			}
		}else {
			Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
		}
	}
	
	public function phoneCheck($phone){
		$query = 'SELECT username FROM masyarakat WHERE nik = ?';
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $this->nik);
		$this->db->execute();
		if ($this->db->getResult() > 0) {
			if ($this->db->row[0]['telp'] == $phone) {
				return 1;
			}else {
				return 0;
			}
		}
	}
	
	public function photo($data, $file){
		$this->db->dbh->real_escape_string(extract($data));
		
		if (isset($update)) {
			if ($file['photo']['error'] == 0) {
				$extension = strtolower(pathinfo($file['photo']['name'], PATHINFO_EXTENSION));
				$photo = $_SESSION['masyarakatNIK'] . '.' . $extension;
				if ($extension == 'jpg' || $extension == 'jepg') {
					if ($file['photo']['size'] <= 2048000) {
						if (move_uploaded_file($file['photo']['tmp_name'], 'assets/img/users/' . $photo)) {
							Flasher::setFlash('Berhasil! ', 'Foto profil anda telah diubah.', 'success', 'correct');
						}else {
							Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
						}
					}else {
						Flasher::setFlash('Gagal! ', 'Ukuran file maksimal 2MB.', 'warning', 'warning');
					}
				}else {
					Flasher::setFlash('Gagal! ', 'Format file tidak didukung.', 'warning', 'warning');
				}
			}else {
				Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
			}
		}else {
			Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
		}
	}
}