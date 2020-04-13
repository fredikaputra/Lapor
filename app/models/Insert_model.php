<?php

class Insert_model extends Controller{
	private $db, $uniqID;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	// tambah laporan
	public function laporan(){
		$this->db->dbh->real_escape_string(extract($_POST));
		
		// lanjutkan proses
		// ketika pengguna
		// telah menekan tombol submit
		if (isset($report)) {
			
			// buat session pada form
			// (untuk kondisi ketika gagal)
			$_SESSION['msg'] = $msg;
			
			// generate id laporan yang unik
			do {
				$this->uniqID = strtoupper('lprid' . substr(md5(uniqid()), 25));
				
				// hentikan proses generate id
				// ketika id tersedia pada tabel
				if ($this->checkLap($this->uniqID) != $this->uniqID) {
					break;
				}
			} while ($this->checkLap($this->uniqID) == !NULL);
			
			// deklarasikan variable
			$time = time();
			$status = 0;
			
			// ambil data pengguna
			$nik = $this->model('Data_model')->masyarakat($_SESSION['masyarakatNIK'])[0]['nik'];
			
			// jalankan fungsi ketika
			// pengguna meyertakan file
			// pada formulir pengaduan
			if (isset($_FILES)) {
				
				// cek kondisi keutuhan file
				if ($_FILES['photo']['error'] == 0) {
					
					// cek extensi gambar
					$extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
					if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
						
						// ukuran gambar max 2MB
						if ($_FILES['photo']['size'] <= 2048000) {
							$photo = $this->uniqID . '.' . $extension;
							
							// upload
							if (!move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/img/pengaduan/' . $photo)) {
								Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
								return;
							}
						}
						
						// ukuran gambar melebihi 2MB
						else {
							Flasher::setFlash('Gagal! ', 'Ukuran file maksimal 2MB.', 'warning', 'warning');
							return;
						}
					}
					
					// extensi gambar salah
					else {
						Flasher::setFlash('Gagal! ', 'Format file tidak didukung.', 'warning', 'warning');
						return;
					}
				}
				
				// terjadi kesalahan
				else {
					Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
				}
			}
			
			// simpan data kosong
			// pada kolom foto
			else {
				$photo = NULL;
			}
		
			// masukkan data pengaduan
			$query = "INSERT INTO pengaduan VALUES(?, ?, ?, ?, ?, ?)";
			$this->db->prepare($query);
			$this->db->sth->bind_param('ssssss', $this->uniqID, $time, $nik, $msg, $photo, $status);
			$this->db->execute();
			
			// berhasil
			if ($this->db->affectedRows() > 0) {
				unset($_SESSION['msg']);
				Flasher::setFlash('Berhasil! ', 'Laporan aduan anda telah dikirim.', 'success', 'correct');
			}
			
			// gagal
			else {
				Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
			}
		}
		
		// terjadi kesalahan
		else {
			Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
		}
	}
	
	// tambah tanggapan
	public function tanggapan($id){
		$this->db->dbh->real_escape_string(extract($_POST));
		
		// lanjutkan proses
		// ketika pengguna
		// telah menekan tombol submit
		if (isset($comment)) {
			
			// jalankan fungsi ketika
			// isi tanggapan tidak kosong
			if ($response != NULL) {
				
				// buat session isi form (kondisi ketika gagal)
				$_SESSION['response'] = $response;
				$time = time();
				
				// generate id tanggapan yang unik
				do {
					$this->uniqID = strtoupper('tgpn' . substr(md5(uniqid()), 25));
					
					// hentikan generate id ketika id tersedia
					if ($this->checkTan($this->uniqID, '') != $this->uniqID) {
						break;
					}
				} while ($this->checkTan($this->uniqID, '') == !NULL);
				
				// masukkan data tanggapan
				$query = "INSERT INTO tanggapan VALUES(?, ?, ?, ?, ?)";
				$this->db->prepare($query);
				$this->db->sth->bind_param('sssss',
											$this->uniqID,
											$id,
											$time,
											$response,
											$_SESSION['petugasID']);
				$this->db->execute();
				
				// berhasil
				if ($this->db->affectedRows() > 0) {
					
					// jalankan fungsi ketika status
					// data aduan dalam proses
					if ($this->checkTan('', $id) == 0) {
						
						// ubah status dari proses menjadi selesai
						$query = "UPDATE pengaduan SET status = '1' WHERE id_pengaduan = ?";
						$this->db->prepare($query);
						$this->db->sth->bind_param('s', $id);
						$this->db->execute();
						
						// berhasil
						if ($this->db->affectedRows() > 0) {
							Flasher::setFlash('Berhasil! ', 'Anda telah menambahkan respon anda.', 'info', 'correct');
							unset($_SESSION['response']);
						}
						
						// gagal
						else {
							Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
						}
					}
					
					// berhasil
					else {
						Flasher::setFlash('Berhasil! ', 'Anda telah menambahkan respon anda.', 'info', 'correct');
						unset($_SESSION['response']);
					}
				}
				
				// gagal
				else {
					Flasher::setFlash(NULL, 'Tidak ada data yang diubah!', 'danger', 'warning');
				}
			}
			
			// isi tanggapan kosong
			else {
				Flasher::setFlash(NULL, 'Tidak ada tanggapan yang ditambah!', 'warning', 'warning');
			}
		}
		
		// terjadi kesalahan
		else {
			Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
		}
	}
	
	// cek id
	public function checkLap($id){
		$query = "SELECT id_pengaduan FROM pengaduan WHERE id_pengaduan = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $id);
		$this->db->execute();
		if ($this->db->getResult() !== NULL) {
			return $this->db->row[0]['id_pengaduan'];
		};
	}
	
	// cek id
	public function checkTan($uniqID = NULL, $id = NULL){
		if ($uniqID != NULL) {
			$query = "SELECT id_tanggapan FROM tanggapan WHERE id_tanggapan = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $id);
			$this->db->execute();
			$this->db->getResult();
			
			return $this->db->row[0]['id_tanggapan'];
		}
		
		else if ($id != NULL) {
			$query = "SELECT status FROM pengaduan WHERE id_pengaduan = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $id);
			$this->db->execute();
			$this->db->getResult();
			
			return $this->db->row[0]['status'];
		}
	}
}