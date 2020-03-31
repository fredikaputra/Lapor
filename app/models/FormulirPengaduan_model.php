<?php

class FormulirPengaduan_model extends Controller{
	private $db, $uniqID;
	private $imgType = ['image/jpg', 'image/jpeg', 'image/png'];
	
	public function __construct(){
		$this->db = new Database;
		
		do {
			$this->uniqID = strtoupper('lprid' . substr(md5(uniqid()), 25));
			if ($this->uniqIDCheck($this->uniqID) != $this->uniqID) {
				break;
			}
		} while ($this->uniqIDCheck($this->uniqID) == !NULL);
	}
	
	public function upload($data, $files){
		$this->db->dbh->real_escape_string(extract($data));
		if (isset($report)) {
			$time = time();
			$nik = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['nik'];
			$status = 0;
			
			if (isset($files)) {
				if ($files['photo']['error'] == 0) {
					if (in_array($files['photo']['type'], $this->imgType)) {
						if ($files['photo']['size'] <= 2048000) {
							$photo = $this->uniqID . '.' . pathinfo($files['photo']['name'], PATHINFO_EXTENSION);
							if (!move_uploaded_file($files['photo']['tmp_name'], 'assets/img/pengaduan/' . $photo)) {
								Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
								return;
							}
						}else {
							Flasher::setFlash('Gagal! ', 'Ukuran file maksimal 2MB.', 'warning', 'warning');
							return;
						}
					}else {
						Flasher::setFlash('Gagal! ', 'Format file tidak didukung.', 'warning', 'warning');
					}
				}else {
					Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
				}
			}else {
				$photo = NULL;
			}
		
			$query = "INSERT INTO pengaduan VALUES(?, ?, ?, ?, ?, ?)";
			$this->db->prepare($query);
			$this->db->sth->bind_param('ssssss', $this->uniqID, $time, $nik, $msg, $photo, $status);
			$this->db->execute();
			if ($this->db->affectedRows() > 0) {
				Flasher::setFlash('Berhasil! ', 'Laporan aduan anda telah dikirim.', 'success', 'correct');
			}else {
				Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
			}
		}else {
			Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
		}
	}
	
	public function uniqIDCheck($id){
		$query = "SELECT id_pengaduan FROM pengaduan WHERE id_pengaduan = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $id);
		$this->db->execute();
		if ($this->db->getResult() !== NULL) {
			return $this->db->row[0]['id_pengaduan'];
		};
	}
}