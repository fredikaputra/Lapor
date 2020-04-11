<?php

class Insert_model extends Controller{
	private $db, $uniqID;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function laporan(){ // proses tambah laporan
		$this->db->dbh->real_escape_string(extract($_POST));
		
		if (isset($report)) { // check ketika button submit di tekan pada form
			$_SESSION['msg'] = $msg; // buat session pada form (untuk kondisi ketika gagal)
			
			do { // generate id laporan yang unik
				$this->uniqID = strtoupper('lprid' . substr(md5(uniqid()), 25));
				if ($this->checkLap($this->uniqID) != $this->uniqID) { // chek ketika id tersedia
					break;
				}
			} while ($this->checkLap($this->uniqID) == !NULL);
			
			$time = time();
			$nik = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['nik'];
			$status = 0;
			
			if (isset($_FILES)) { // ketika masyarakat menyertakan gambar
				if ($_FILES['photo']['error'] == 0) { // cek file tidak ada masalah
					$extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
					if (in_array($extension, ['jpg', 'jpeg', 'png'])) { // cek ekstensi gambar
						if ($_FILES['photo']['size'] <= 2048000) { // cek ukuran gambar
							$photo = $this->uniqID . '.' . $extension;
							if (!move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/img/pengaduan/' . $photo)) {
								Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
								return;
							}
						}else {
							Flasher::setFlash('Gagal! ', 'Ukuran file maksimal 2MB.', 'warning', 'warning');
							return;
						}
					}else {
						Flasher::setFlash('Gagal! ', 'Format file tidak didukung.', 'warning', 'warning');
						return;
					}
				}else {
					Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
				}
			}else { // gambar tidak tercantum
				$photo = NULL;
			}
		
			$query = "INSERT INTO pengaduan VALUES(?, ?, ?, ?, ?, ?)";
			$this->db->prepare($query);
			$this->db->sth->bind_param('ssssss', $this->uniqID, $time, $nik, $msg, $photo, $status);
			$this->db->execute();
			if ($this->db->affectedRows() > 0) {
				unset($_SESSION['msg']);
				Flasher::setFlash('Berhasil! ', 'Laporan aduan anda telah dikirim.', 'success', 'correct');
			}else {
				Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
			}
		}else {
			Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
		}
	}
	
	public function tanggapan(){
		$this->db->dbh->real_escape_string(extract($_POST));
		
		if (isset($comment)) { // cek ketika button submit tertekan pada form
			if ($response != NULL) {
				$_SESSION['response'] = $response; // buat session isi form (kondisi ketika gagal)
				$time = time();
				
				do { // generate id tanggapan yang unik
					$this->uniqID = strtoupper('tgpn' . substr(md5(uniqid()), 25));
					if ($this->checkTan($this->uniqID, '') != $this->uniqID) { // ketika id tersedia
						break;
					}
				} while ($this->checkTan($this->uniqID, '') == !NULL);
				
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
					if ($this->checkTan('', $id) == 0) {
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
	
	public function checkLap($id){ // proses cek id
		$query = "SELECT id_pengaduan FROM pengaduan WHERE id_pengaduan = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $id);
		$this->db->execute();
		if ($this->db->getResult() !== NULL) {
			return $this->db->row[0]['id_pengaduan'];
		};
	}
	
	public function checkTan($uniqID = NULL, $id = NULL){ // proses cek id
		if ($uniqID != NULL) {
			$query = "SELECT id_tanggapan FROM tanggapan WHERE id_tanggapan = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $id);
			$this->db->execute();
			$this->db->getResult()
			
			return $this->db->row[0]['id_tanggapan'];
		}else if ($id != NULL) {
			$query = "SELECT status FROM pengaduan WHERE id_pengaduan = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $id);
			$this->db->execute();
			$this->db->getResult()
			
			return $this->db->row[0]['status'];
		}
	}
}