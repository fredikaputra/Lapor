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
				$query = 'UPDATE masyarakat SET nama = ?';
				$this->db->prepare($query);
				$this->db->sth->bind_param('s', $name);
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
}