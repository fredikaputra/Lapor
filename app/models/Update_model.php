<?php

class Update_model{
	private $db, $nik;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function masyarakat($opt){
		$this->db->dbh->real_escape_string(extract($_POST));
		$this->nik = $_SESSION['masyarakatNIK'];
		
		// jalankan proses ketika
		// pengguna menekan tombol submit
		if (isset($update)) {
			
			// update nama
			if ($opt == 'nama') {
				$query = 'UPDATE masyarakat SET nama = ? WHERE nik = ?';
				$this->db->prepare($query);
				$this->db->sth->bind_param('ss', $name, $_SESSION['masyarakatNIK']);
				$this->db->execute();
				
				// berhasil
				if ($this->db->affectedRows() > 0) {
					Flasher::setFlash('Berhasil! ', 'Nama anda telah diubah.', 'success', 'correct');
				}
				
				// gagal
				else {
					Flasher::setFlash('Gagal! ', 'Nama anda tidak diubah.', 'warning', 'warning');
				}
			}
			
			// update username
			else if ($opt == 'username') {
				
				// cek ketersediaan username
				if ($this->check($username) == TRUE) {
					$query = 'UPDATE masyarakat SET username = ? WHERE nik = ?';
					$this->db->prepare($query);
					$this->db->sth->bind_param('ss', $username, $_SESSION['masyarakatNIK']);
					$this->db->execute();
					
					// berhasil
					if ($this->db->affectedRows() > 0) {
						Flasher::setFlash('Berhasil! ', 'Username anda telah diubah.', 'success', 'correct');
					}
					
					// gagal
					else {
						Flasher::setFlash('Gagal! ', 'Username anda tidak diubah.', 'warning', 'warning');
					}
				}
				
				// username sudah digunakan
				else {
					Flasher::setFlash('Gagal! ', 'Username sudah digunakan.', 'warning', 'warning');
				}
			}
			
			// update telepon
			else if ($opt == 'telepon') {
				$query = 'UPDATE masyarakat SET telp = ? WHERE nik = ?';
				$this->db->prepare($query);
				$this->db->sth->bind_param('ss', $phone, $_SESSION['masyarakatNIK']);
				$this->db->execute();
				
				// berhasil
				if ($this->db->affectedRows() > 0) {
					Flasher::setFlash('Berhasil! ', 'Nomor telepon anda telah diubah.', 'success', 'correct');
				}
				
				// gagal
				else {
					Flasher::setFlash('Gagal! ', 'Nomor telepon anda tidak diubah.', 'warning', 'warning');
				}
			}
			
			// update password
			else if ($opt == 'password') {
				$query = 'SELECT password FROM masyarakat WHERE nik = ?';
				$this->db->prepare($query);
				$this->db->sth->bind_param('s', $_SESSION['masyarakatNIK']);
				$this->db->execute();
				$this->db->getResult();
				
				// verifikasi password sekarang
				if (password_verify($curentPass, $this->db->row[0]['password'])) {
					
					// password minimal 8 karakter
					if (strlen($newPass) >= 8) {
						
						// konfirmasi password
						if ($newPass == $confirmPass) {
							
							// enkripsi password
							$newPass = password_hash($newPass, PASSWORD_BCRYPT, ['cost' => 12]);
							
							$query = 'UPDATE masyarakat SET password = ? WHERE nik = ?';
							$this->db->prepare($query);
							$this->db->sth->bind_param('ss', $newPass, $_SESSION['masyarakatNIK']);
							$this->db->execute();
							
							// berhasil
							if ($this->db->affectedRows() > 0) {
								
								// buat log
								$log  = $_SESSION['masyarakatNIK'] . "|" . time() . PHP_EOL;
					
								// simpan log
								$createLog = file_put_contents('app/log/change_pass_time/' . $_SESSION['masyarakatNIK'] . '.log', $log);
								
								Flasher::setFlash('Berhasil! ', 'Password anda telah diubah.', 'success', 'correct');
							}
							
							// gagal
							else {
								Flasher::setFlash('Gagal! ', 'Password anda tidak diubah.', 'warning', 'warning');
							}
						}
						
						// Konfirmasi password salah
						else {
							Flasher::setFlash('Gagal! ', 'Konfirmasi password baru anda salah.', 'warning', 'warning');
						}
					}
					
					// password kurang dari 8 karakter
					else {
						Flasher::setFlash('Gagal! ', 'Password baru minimal 8 karakter.', 'warning', 'warning');
					}
				}
				
				// gagal
				else {
					Flasher::setFlash('Gagal! ', 'Password saat ini yang anda masukkan tidak benar.', 'warning', 'warning');
				}
			}
			
			// update foto
			else if ($opt == 'photo') {
				
				// cek keutuhan gambar
				if ($_FILES['photo']['error'] == 0) {
					
					// cek extensi gambar
					$extension = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
					$photo = $_SESSION['masyarakatNIK'] . '.jpg';
					if ($extension == 'jpg' || $extension == 'jpeg') {
						
						// ukuran gambar max 2MB
						if ($_FILES['photo']['size'] <= 2048000) {
							
							// berhasil
							if (move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/img/users/' . $photo)) {
								Flasher::setFlash('Berhasil! ', 'Foto profil anda telah diubah.', 'success', 'correct');
							}
							
							// gagal
							else {
								Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
							}
						}
						
						// ukuran gambar lebih dari 2MB
						else {
							Flasher::setFlash('Gagal! ', 'Ukuran file maksimal 2MB.', 'warning', 'warning');
						}
					}
					
					// extensi gambar tidak mendukung
					else {
						Flasher::setFlash('Gagal! ', 'Format file tidak didukung.', 'warning', 'warning');
					}
				}
				
				// terjadi kesalahan
				else {
					Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
				}
			}
		}
		
		// terjadi kesalahan
		else {
			Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
		}
	}
	
	public function petugas(){
		$this->db->dbh->real_escape_string(extract($_POST));
		
		// update nama
		if (isset($name)) {
			$query = "UPDATE petugas SET nama_petugas = ? WHERE id_petugas = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('ss', $name, $_SESSION['petugasID']);
			$this->db->execute();
		}
		
		// update telepon
		if (isset($phone)) {
			$query = "UPDATE petugas SET telp = ? WHERE id_petugas = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('ss', $phone, $_SESSION['petugasID']);
			$this->db->execute();
		}
		
		// berhasil
		if ($this->db->affectedRows() > 0) {
			Flasher::setFlash('Berhasil! ', "Profil anda sudah diupdate", 'success', 'correct');
		}
		
		// gagal
		else {
			Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
		}
		
		// update username
		if (isset($username)) {
			
			// ambil data username petugas
			$query = "SELECT username FROM petugas WHERE id_petugas = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $_SESSION['petugasID']);
			$this->db->execute();
			
			// berhasil
			if ($this->db->getResult() == 0) {
				$query = "UPDATE petugas SET username = ? WHERE id_petugas = ?";
				$this->db->prepare($query);
				$this->db->sth->bind_param('ss', $username, $_SESSION['petugasID']);
				$this->db->execute();
				
				// berhasil
				if ($this->db->affectedRows() > 0) {
					Flasher::setFlash('Berhasil! ', "Profil anda sudah diupdate", 'success', 'correct');
				}
				
				// gagal
				else {
					Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
				}
			}
			
			// username sudah digunakan
			else {
				Flasher::setFlash('Gagal! ', "Username sudah digunakan.", 'warning', 'warning');
			}
		}
	}
	
	public function check($username){
		$query = 'SELECT username FROM masyarakat WHERE username = ?';
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $username);
		$this->db->execute();
		
		// gagal
		if ($this->db->getResult() > 0) {
			return false;
		}
		
		// cek username
		else {
			$query = 'SELECT username FROM petugas WHERE username = ?';
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $username);
			$this->db->execute();
			
			// username tidak tersedia
			if ($this->db->getResult() > 0) {
				return false;
			}
			
			// username tersedia
			else {
				return true;
			}
		}
	}
}