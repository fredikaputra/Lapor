<?php

class ReportResponse_model extends Controller{
	private $db, $uniqID;
	
	public function __construct(){
		$this->db = new Database;
		
		do { // generate id tanggapan yang unik
			$this->uniqID = strtoupper('tgpn' . substr(md5(uniqid()), 25));
			if ($this->check($this->uniqID, '') != $this->uniqID) { // ketika id tersedia
				break;
			}
		} while ($this->check($this->uniqID, '') == !NULL);
	}
	
	public function proccess($data, $id){ // proses tambah komentar
		$this->db->dbh->real_escape_string(extract($data));
		
		if (isset($comment)) { // cek ketika button submit tertekan pada form
			if ($response != NULL) {
				$_SESSION['response'] = $response; // buat session isi form (kondisi ketika gagal)
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
					if ($this->check('', $id) == 0) {
						$query = "UPDATE pengaduan SET status = '1' WHERE id_pengaduan = ?";
						$this->db->prepare($query);
						$this->db->sth->bind_param('s', $id);
						$this->db->execute();
						if ($this->db->affectedRows() > 0) {
							Flasher::setFlash('Berhasil! ', 'Anda telah menambahkan respon anda.', 'info', 'correct');
							unset($_SESSION['response']);
						}else {
							Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
						}
					}else {
						Flasher::setFlash('Berhasil! ', 'Anda telah menambahkan respon anda.', 'info', 'correct');
						unset($_SESSION['response']);
					}
				}else {
					Flasher::setFlash(NULL, 'Tidak ada data yang diubah!', 'danger', 'warning');
				}
			}else {
				Flasher::setFlash(NULL, 'Tidak ada tanggapan yang ditambah!', 'warning', 'warning');
			}
		}else {
			Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
		}
	}
	
	public function check($uniqID = '', $id = ''){ // proses cek id
		if ($uniqID != '') {
			$query = "SELECT id_tanggapan FROM tanggapan WHERE id_tanggapan = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $id);
			$this->db->execute();
			if ($this->db->getResult() !== NULL) {
				return $this->db->row[0]['id_tanggapan'];
			}
		}else if ($id != '') {
			$query = "SELECT status FROM pengaduan WHERE id_pengaduan = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $id);
			$this->db->execute();
			if ($this->db->getResult() !== NULL) {
				return $this->db->row[0]['status'];
			}
		}
	}
}