<?php

class UpdatePreference_model{
	private $db;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function petugas(){
		$this->db->dbh->real_escape_string(extract($_POST));
		
		if (isset($updateprofile)) {
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
		}else {
			Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
		}
	}
}