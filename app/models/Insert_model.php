<?php

class Insert_model{
	private $db, $uniqID, $errUpCode;
	private $photo = NULL;
	private $imgType = ['image/jpg', 'image/jpeg', 'image/png'];
	
	public function __construct(){
		$this->db = new Database;
		
		do{
			$this->uniqID = strtoupper('lprid' . substr(md5(uniqid()), 25));
		}while($this->checkUniqID($this->uniqID) > 1);
	}
	
	public function pengaduan($data, $files){
		$this->db->dbh->real_escape_string(extract($data));
		if ($files['photo']['error'] === 0) {
			$this->uploadPhoto($files);
			if ($this->errUpCode === 1) {
				Flasher::setFlash('Terjadi kesalahan saat memproses data!', 'bg-danger', 'attention');
				return 'CONTINUE';
			}else if ($this->errUpCode === 2) {
				Flasher::setFlash('Format gambar tidak didukung!', 'bg-warning', 'attention');
				return 'CONTINUE';
			}else if ($this->errUpCode === 3) {
				Flasher::setFlash('Ukuran file maximal 2MB!', 'bg-warning', 'attention');
				return 'CONTINUE';
			}
		}
		
		$time = time();
		$status = 0;
		$query = 'INSERT INTO pengaduan VALUES(?, ?, ?, ?, ?, ?)';
		$this->db->prepare($query);
		$this->db->sth->bind_param('siisss',
									$this->uniqID,
									$time,
									$_SESSION['masyarakatNIK'],
									$msg,
									$this->photo,
									$status);
		$this->db->execute();
		if ($this->db->affectedRows() > 0) {
			Flasher::setFlash('Laporan anda berhasil terkirim!', 'bg-success', 'correct');
			return 'CONTINUE';
		}else {
			Flasher::setFlash('Terjadi kesalahan saat memproses data!', 'bg-danger', 'attention');
			return 'CONTINUE';
		}
	}
	
	public function checkUniqID($id){
		$query = 'SELECT * FROM pengaduan WHERE id_pengaduan = ?';
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $id);
		$this->db->execute();
		return $this->db->getResult();
	}
	
	public function uploadPhoto($files){
		$this->photo = $this->uniqID . '.' . pathinfo($files['photo']['name'], PATHINFO_EXTENSION);
		if ($files['photo']['size'] <= 2048000) {
			if (in_array($files['photo']['type'], $this->imgType)) {
				if (move_uploaded_file($files['photo']['tmp_name'], 'assets/img/pengaduan/' . $this->photo)) {
					return true;
				}else {
					$this->errUpCode = 1;
				}
			}else {
				$this->errUpCode = 2;
			}
		}else {
			$this->errUpCode = 3;
		}
	}
}