<?php

class ReportResponse_model extends Controller{
	private $db, $uniqID;
	
	public function __construct(){
		$this->db = new Database;
		
		do {
			$this->uniqID = strtoupper('tgpn' . substr(md5(uniqid()), 25));
			if ($this->uniqIDCheck($this->uniqID) != $this->uniqID) {
				break;
			}
		} while ($this->uniqIDCheck($this->uniqID) == !NULL);
	}
	
	public function proccess($data, $id){
		$this->db->dbh->real_escape_string(extract($data));
		if (isset($comment)) {
			$_SESSION['response'] = $response;
			$time = time();
			$query = "INSERT INTO tanggapan VALUES(?, ?, ?, ?, ?)";
			$this->db->prepare($query);
			$this->db->sth->bind_param('sssss',
										$this->uniqID,
										$id,
										$time,
										$response,
										$_SESSION['petugasID']);
			$this->db->execute();
			if ($this->db->affectedRows() > 0) {
				if ($this->statusCheck($id) == 0) {
					$query = "UPDATE pengaduan SET status = '1' WHERE id_pengaduan = ?";
					$this->db->prepare($query);
					$this->db->sth->bind_param('s', $id);
					$this->db->execute();
					
					Flasher::setFlash('Berhasil! ', 'Anda telah menambahkan respon anda.', 'info', 'correct');
					unset($_SESSION['response']);
				}else {
					Flasher::setFlash('Berhasil! ', 'Anda telah menambahkan respon anda.', 'info', 'correct');
					unset($_SESSION['response']);
				}
			}else {
				Flasher::setFlash(NULL, 'Tidak ada data yang diubah!', 'danger', 'warning');
			}
		}else {
			Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
		}
	}
	
	public function uniqIDCheck($id){
		$query = "SELECT id_tanggapan FROM tanggapan WHERE id_tanggapan = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $id);
		$this->db->execute();
		if ($this->db->getResult() !== NULL) {
			return $this->db->row[0]['id_tanggapan'];
		};
	}
	
	public function statusCheck($id){
		$query = "SELECT status FROM pengaduan WHERE id_pengaduan = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $id);
		$this->db->execute();
		if ($this->db->getResult() !== NULL) {
			return $this->db->row[0]['status'];
		};
	}
}