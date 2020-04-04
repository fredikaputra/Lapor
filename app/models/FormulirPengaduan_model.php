<?php

class FormulirPengaduan_model extends Controller{
	private $db, $uniqID;
	
	public function __construct(){
		$this->db = new Database;
		
		do { // generate id laporan yang unik
			$this->uniqID = strtoupper('lprid' . substr(md5(uniqid()), 25));
			if ($this->check($this->uniqID) != $this->uniqID) { // chek ketika id tersedia
				break;
			}
		} while ($this->check($this->uniqID) == !NULL);
	}
	
	public function upload($data, $files){ // proses tambah laporan
		$this->db->dbh->real_escape_string(extract($data));
		
		if (isset($report)) { // check ketika button submit di tekan pada form
			$_SESSION['msg'] = $msg; // buat session pada form (untuk kondisi ketika gagal)
			
			$time = time();
			$nik = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['nik'];
			$status = 0;
			
			if (isset($files)) { // ketika masyarakat menyertakan gambar
				if ($files['photo']['error'] == 0) { // cek file tidak ada masalah
					$extension = pathinfo($files['photo']['name'], PATHINFO_EXTENSION);
					if (in_array($extension, ['jpg', 'jpeg', 'png'])) { // cek ekstensi gambar
						if ($files['photo']['size'] <= 2048000) { // cek ukuran gambar
							$photo = $this->uniqID . '.' . $extension;
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
	
	public function check($id){ // proses cek id
		$query = "SELECT id_pengaduan FROM pengaduan WHERE id_pengaduan = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $id);
		$this->db->execute();
		if ($this->db->getResult() !== NULL) {
			return $this->db->row[0]['id_pengaduan'];
		};
	}
}