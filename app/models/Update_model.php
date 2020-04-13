<?php

class Update_model{
	private $db, $nik;
	
	public function __construct(){
		$this->db = new Database;
		$this->nik = $_SESSION['masyarakatNIK'];
	}
	
	public function masyarakat($opt){
		$this->db->dbh->real_escape_string(extract($_POST));
		
		if ($opt == 'nama') {	
			$query = 'UPDATE masyarakat SET nama = ? WHERE nik = ?';
			$this->db->prepare($query);
			$this->db->sth->bind_param('ss', $name, $_SESSION['masyarakatNIK']);
			$this->db->execute();
			if ($this->db->affectedRows() > 0) {
				Flasher::setFlash('Berhasil! ', 'Nama anda telah diubah.', 'success', 'correct');
			}else {
				Flasher::setFlash('Gagal! ', 'Nama anda tidak diubah.', 'warning', 'warning');
			}
		}else if ($opt == 'username') {
			if ($this->check($username) == TRUE) {
				$query = 'UPDATE masyarakat SET username = ? WHERE nik = ?';
				$this->db->prepare($query);
				$this->db->sth->bind_param('ss', $username, $_SESSION['masyarakatNIK']);
				$this->db->execute();
				if ($this->db->affectedRows() > 0) {
					Flasher::setFlash('Berhasil! ', 'Username anda telah diubah.', 'success', 'correct');
				}else {
					Flasher::setFlash('Gagal! ', 'Username anda tidak diubah.', 'warning', 'warning');
				}
			}else {
				Flasher::setFlash('Gagal! ', 'Username sudah digunakan.', 'warning', 'warning');
			}
		}else if ($opt == 'telepon') {
			$query = 'UPDATE masyarakat SET telp = ? WHERE nik = ?';
			$this->db->prepare($query);
			$this->db->sth->bind_param('ss', $phone, $_SESSION['masyarakatNIK']);
			$this->db->execute();
			if ($this->db->affectedRows() > 0) {
				Flasher::setFlash('Berhasil! ', 'Nomor telepon anda telah diubah.', 'success', 'correct');
			}else {
				Flasher::setFlash('Gagal! ', 'Nomor telepon anda tidak diubah.', 'warning', 'warning');
			}
		}else if ($opt == 'photo') {
			if ($_FILES['photo']['error'] == 0) {
				$extension = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
				$photo = $_SESSION['masyarakatNIK'] . '.jpg';
				if ($extension == 'jpg' || $extension == 'jpeg') {
					if ($_FILES['photo']['size'] <= 2048000) {
						if (move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/img/users/' . $photo)) {
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
		}
	}
	
	public function petugas(){
		$query = "SELECT username FROM petugas WHERE username = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $username);
		$this->db->execute();
		$this->db->getResult();
		
		$query = "SELECT username FROM masyarakat WHERE username = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $username);
		$this->db->execute();
		$this->db->getResult();
		
		if ($this->db->row == NULL) {
			$query = "UPDATE petugas SET nama_petugas = ?, username = ?, telp = ? WHERE id_petugas = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('ssss', $name, $username, $phone, $_SESSION['petugasID']);
			$this->db->execute();
			if ($this->db->affectedRows() > 0) {
				Flasher::setFlash('Berhasil! ', "Profil anda sudah diupdate", 'success', 'correct');
			}else {
				Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
			}
		}else {
			Flasher::setFlash('Gagal! ', 'Username sudah digunakan.', 'warning', 'warning');
			die();
		}
	}
	
	public function check($username){
		$query = 'SELECT username FROM masyarakat WHERE username = ?';
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $username);
		$this->db->execute();
		if ($this->db->getResult() > 0) {
			return false;
		}else {
			$query = 'SELECT username FROM petugas WHERE username = ?';
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $username);
			$this->db->execute();
			if ($this->db->getResult() > 0) {
				return false;
			}else {
				return true;
			}
		}
	}
}