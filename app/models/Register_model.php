<?php

class Register_model{
	private $db, $uniqID;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	// proses registrasi masyarakat
	public function masyarakat(){
		$this->db->dbh->real_escape_string(extract($_POST));
		
		// lanjutkan proses
		// ketika pengguna
		// telah menekan tombol submit
		if (isset($addmasyarakat)) {
			
			// buat session isi form
			// (untuk keadaan dimana kondisi salah)
			$_SESSION['reg'] = [
				'nik' => $nik,
				'name' => $name,
				'username' => $username,
				'phone' => $phone
			];
			
			// jalankan fungsi ketika
			// pengguna meyertakan file
			// pada formulir pengaduan
			if (isset($_FILES) && $_FILES != NULL) {
				
				// cek kondisi keutuhan file
				if ($_FILES['photo']['error'] == 0) {
					
					// cek extensi gambar
					$extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
					if (in_array($extension, ['jpg', 'jpeg'])) {
						
						// ukuran file max 2MB
						if ($_FILES['photo']['size'] <= 2048000) {
							$photo = $nik . '.jpg';
							
							// upload
							if (!move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/img/users/' . $photo)) {
								Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
								return;
							}
						}
						
						// ukuran file lebih dari 2MB
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
			
			// lanjut ketika nik
			// belum digunakan
			if ($this->checkMasyarakat($nik, NULL) == NULL) {
				
				// lanjut ketika username
				// belum digunakan
				if ($this->checkMasyarakat(NULL, $username) == NULL) {
					
					// lanjut ketika karakter password
					// lebih dari 7 karakter
					if (strlen($pass) >= 8) {
						
						// lanjut ketika
						// konfirmasi password benar
						if ($pass == $repass) {
							
							// lanjut ketik
							// nomor telepon
							// lebih dari 8 digit
							if (strlen($phone) >= 9) {
								
								// enkripsi password
								$password = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 12]);
								
								// masukkan data ke database
								$query = 'INSERT INTO masyarakat VALUES (?, ?, ?, ?, ?)';
								$this->db->prepare($query);
								$this->db->sth->bind_param('sssss', $nik, $name, $username, $password, $phone);
								$this->db->execute();
								
								// berhasil
								if ($this->db->affectedRows() > 0) {
									
									// petugas yang mendaftarkan
									if (isset($_SESSION['petugasID'])) {
										Flasher::setFlash('Berhasil! ', "$name telah bergabung sebagai masyarakat.", 'success', 'correct');
									}
									
									// masyarakat sendiri yang mendaftarkan diri
									else {
										Flasher::setFlash('Berhasil! ', "Anda telah terdaftar.", 'success', 'correct');
									}
									unset($_SESSION['reg']);
									return true;
								}
								
								// gagal
								else {
									Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
								}
							}
							
							// nomor telepon tidak valid
							else {
								Flasher::setFlash('Gagal! ', 'Nomor telepon tidak benar.', 'warning', 'warning');
								$_SESSION['autofocus']['phone'] = 1;
							}
						}
						
						// konfirmasi password salah
						else {
							Flasher::setFlash('Gagal! ', 'Konfirmasi password tidak benar.', 'warning', 'warning');
							$_SESSION['autofocus']['pass'] = 1;
						}
					}
					
					// password kurang dari 8
					else {
						Flasher::setFlash('Gagal! ', 'Password minimal 8 karakter.', 'warning', 'warning');
						$_SESSION['autofocus']['pass'] = 1;
					}
				}
				
				// username sudah digunakan
				else {
					Flasher::setFlash('Gagal! ', 'Username sudah digunakan.', 'warning', 'warning');
					$_SESSION['autofocus']['username'] = 1;
				}
			}
			
			// nik sudah digunakan
			else {
				Flasher::setFlash('Gagal! ', 'Nomor Induk Kependudukan sudah digunakan.', 'warning', 'warning');
				$_SESSION['autofocus']['nik'] = 1;
			}
		}
		
		// terjadi kesalahan
		else {
			Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
		}
	}
	
	// proses registrasi petugas
	public function petugas(){
		$this->db->dbh->real_escape_string(extract($_POST));
		
		// lanjutkan proses
		// ketika pengguna
		// telah menekan tombol submit
		if (isset($addpetugas)) {
			
			// generate id laporan yang unik
			do {
				$this->uniqID = strtoupper('ptgs' . substr(md5(uniqid()), 25));
				
				// stop generate id ketika id tersedia
				if ($this->checkPetugas($this->uniqID, NULL) != $this->uniqID) {
					break;
				}
			} while ($this->checkPetugas($this->uniqID, NULL) == !NULL);
			
			// buat session isi form
			// (untuk keadaan dimana kondisi salah)
			$_SESSION['reg'] = [
				'name' => $name,
				'username' => $username,
				'phone' => $phone,
			];
			
			// jalankan fungsi ketika
			// pengguna meyertakan file
			// pada formulir pengaduan
			if (isset($_FILES) && $_FILES != NULL) {
				
				// cek kondisi keutuhan file
				if ($_FILES['photo']['error'] == 0) {
					
					// cek extensi gambar
					$extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
					if (in_array($extension, ['jpg', 'jpeg'])) {
						
						// ukuran gambar max 2MB
						if ($_FILES['photo']['size'] <= 2048000) {
							$photo = $this->uniqID . '.jpg';
							
							// upload
							if (!move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/img/users/' . $photo)) {
								Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
								return;
							}
						}
						
						// ukuran gambar lebih dari 2MB
						else {
							Flasher::setFlash('Gagal! ', 'Ukuran file maksimal 2MB.', 'warning', 'warning');
							return;
						}
					}
					
					// extensi file salah
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
			
			// lanjut ketika username
			// belum digunakan
			if ($this->checkPetugas(NULL, $username) == NULL) {
				
				// lanjut ketika karakter password
				// lebih dari 7 karakter
				if (strlen($password) >= 8) {
					
					// lanjut ketika
					// konfirmasi password benar
					if ($password == $repass) {
						
						// lanjut ketik
						// nomor telepon
						// lebih dari 8 digit
						if (strlen($phone) >= 9) {
							
							// enkripsi password
							$password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
							$level = 2;
							$query = "INSERT INTO petugas VALUES(?, ?, ?, ?, ?, ?)";
							$this->db->prepare($query);
							$this->db->sth->bind_param('ssssss', $this->uniqID, $name, $username, $password, $phone, $level);
							$this->db->execute();
							
							// berhasil
							if ($this->db->affectedRows() > 0) {
								unset($_SESSION['reg']);
								Flasher::setFlash('Berhasil! ', "$name telah bergabung sebagai petugas", 'success', 'correct');
								return true;
							}
							
							// gagal
							else {
								Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
							}
						}
						
						// nomor teleopn tidak valid
						else {
							Flasher::setFlash('Gagal! ', 'Nomor telepon tidak benar.', 'warning', 'warning');
							$_SESSION['autofocus']['phone'] = 1;
						}
					}
					
					// konfirmasi password salah
					else {
						Flasher::setFlash('Gagal! ', 'Konfirmasi password salah.', 'warning', 'warning');
						$_SESSION['autofocus']['pass'] = 1;
					}
				}
				
				// password kurang dari 8
				else {
					Flasher::setFlash('Gagal! ', 'Password minimal 8 karakter.', 'warning', 'warning');
					$_SESSION['autofocus']['pass'] = 1;
				}
			}
			
			// username sudah digunakan
			else {
				Flasher::setFlash('Gagal! ', 'Username sudah digunakan.', 'warning', 'warning');
				$_SESSION['autofocus']['username'] = 1;
			}
		}
		
		// terjadi kesalahan
		else {
			Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
		}
	}
	
	// proses check nik dan username
	public function checkMasyarakat($nik = NULL, $username = NULL){
		if ($nik != NULL) {
			$query = 'SELECT nik FROM masyarakat WHERE nik = ?';
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $nik);
		}
		
		else if ($username != NULL) {
			$query = 'SELECT username FROM masyarakat WHERE username = ?';
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $username);
			$this->db->execute();
			$this->db->getResult();
			
			$query = 'SELECT username FROM petugas WHERE username = ?';
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $username);
		}
		
		$this->db->execute();
		return $this->db->getResult();
	}
	
	// proses cek id dan username
	public function checkPetugas($id = NULL, $username = NULL){
		if ($id != NULL) {
			$query = "SELECT id_petugas FROM petugas WHERE id_petugas = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $id);
			$this->db->execute();
			$this->db->getResult();
			
			return $this->db->row[0]['id_petugas'];
		}
		
		else if ($username != NULL) {
			$query = 'SELECT username FROM masyarakat WHERE username = ?';
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $username);
			$this->db->execute();
			$this->db->getResult();
			
			$query = 'SELECT username FROM petugas WHERE username = ?';
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $username);
			$this->db->execute();
			
			return $this->db->getResult();
		}
	}
}