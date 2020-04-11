<?php

class Setting_model{
	private $db, $nik;
	
	public function __construct(){
		$this->db = new Database;
		$this->nik = $_SESSION['masyarakatNIK'];
	}
	
	public function masyarakat($update){
		if ($update == 'name') {
			$this->db->dbh->real_escape_string(extract($_POST));
			
			if (isset($update)) {
				if ($this->check($name, '', '') == 0) {
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
		}else if ($update == 'username') {
			$this->db->dbh->real_escape_string(extract($_POST));
			
			if (isset($update)) {
				if ($this->check('', $username, '') == 0) {
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
		}else if ($update == 'phone') {
			$this->db->dbh->real_escape_string(extract($_POST));
			
			if (isset($update)) {
				if ($this->check('', '', $phone) == 0) {
					$query = 'UPDATE masyarakat SET telp = ? WHERE nik = ?';
					$this->db->prepare($query);
					$this->db->sth->bind_param('ss', $phone, $_SESSION['masyarakatNIK']);
					$this->db->execute();
					if ($this->db->affectedRows() > 0) {
						Flasher::setFlash('Berhasil! ', 'Nomor telepon anda telah diubah.', 'success', 'correct');
					}else {
						die();
						Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
					}
				}else {
					Flasher::setFlash('Gagal! ', 'Nomor telepon tidak diubah.', 'warning', 'warning');
				}
			}else {
				Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
			}
		}else if ($update == 'photo') {
			$this->db->dbh->real_escape_string(extract($_POST));
			
			if (isset($update)) {
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
	
	public function check($name = '', $username = '', $phone = ''){
		if ($name != '') {
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
		}else if ($username != '') {
			$query = 'SELECT username FROM masyarakat WHERE nik = ?';
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $this->nik);
			$this->db->execute();
			if ($this->db->getResult() > 0) {
				if ($this->db->row[0]['username'] == $username) {
					return 1;
				}else {
					return 0;
				}
			}
		}else if ($phone != '') {
			$query = 'SELECT telp FROM masyarakat WHERE nik = ?';
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
	}
}