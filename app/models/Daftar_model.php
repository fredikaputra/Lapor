<?php

class Daftar_model{
	private $db, $uniqID;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function masyarakat(){ // proses registrasi masyarakat
		$this->db->dbh->real_escape_string(extract($_POST));
		
		if (isset($addmasyarakat)) { // cek kalau button submit pada form di tekan
			$_SESSION['reg'] = [ // buat session isi form (untuk keadaan dimana kondisi salah)
				'nik' => $nik,
				'name' => $name,
				'username' => $username,
				'phone' => $phone
			];
			
			if (isset($_FILES) && $_FILES != NULL) { // ketika masyarakat menyertakan gambar
				if ($_FILES['photo']['error'] == 0) { // cek file tidak ada masalah
					$extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
					if (in_array($extension, ['jpg', 'jpeg'])) { // cek ekstensi gambar
						if ($_FILES['photo']['size'] <= 2048000) { // cek ukuran gambar
							$photo = $nik . '.jpg';
							if (!move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/img/users/' . $photo)) {
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
			}
			
			if ($this->check($nik, NULL) == NULL) { // cek kalau nik tidak ada yang menggunakan
				if ($this->check(NULL, $username) == NULL) { // cek username belum digunakan
					if (strlen($pass) >= 8) { // cek panjang password, min 8 karakter
						if ($pass == $repass) { // cek password telah terkonfirmasi
							if (strlen($phone) >= 9) {
								$password = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 12]); // encrypt password
								$query = 'INSERT INTO masyarakat VALUES (?, ?, ?, ?, ?)';
								$this->db->prepare($query);
								$this->db->sth->bind_param('sssss', $nik, $name, $username, $password, $phone);
								$this->db->execute();
								if ($this->db->affectedRows() > 0) {
									Flasher::setFlash('Berhasil! ', "$name telah bergabung sebagai petugas", 'success', 'correct');
									unset($_SESSION['reg']);
									return true;
								}else {
									Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
								}
							}else {
								Flasher::setFlash('Gagal! ', 'Nomor telepon tidak benar.', 'warning', 'warning');
								$_SESSION['autofocus']['phone'] = 1;
							}
						}else {
							Flasher::setFlash('Gagal! ', 'Konfirmasi password tidak benar.', 'warning', 'warning');
							$_SESSION['autofocus']['pass'] = 1;
						}
					}else {
						Flasher::setFlash('Gagal! ', 'Password minimal 8 karakter.', 'warning', 'warning');
						$_SESSION['autofocus']['pass'] = 1;
					}
				}else {
					Flasher::setFlash('Gagal! ', 'Username sudah digunakan.', 'warning', 'warning');
					$_SESSION['autofocus']['username'] = 1;
				}
			}else {
				Flasher::setFlash('Gagal! ', 'Nomor Induk Kependudukan sudah digunakan.', 'warning', 'warning');
				$_SESSION['autofocus']['nik'] = 1;
			}
		}else {
			Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
		}
	}
	
	public function check($nik = NULL, $username = NULL){ // proses check nik
		if ($nik != NULL) {
			$query = 'SELECT nik FROM masyarakat WHERE nik = ?';
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $nik);
			$this->db->execute();
			return $this->db->getResult();
		}else if ($username != NULL) {
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
	
	public function petugas(){ // proses tambah laporan
		$this->db->dbh->real_escape_string(extract($_POST));
		
		if (isset($addpetugas)) { // check ketika button submit di tekan pada form
			do { // generate id laporan yang unik
				$this->uniqID = strtoupper('ptgs' . substr(md5(uniqid()), 25));
				if ($this->checkPetugas($this->uniqID, NULL) != $this->uniqID) { // chek ketika id tersedia
					break;
				}
			} while ($this->checkPetugas($this->uniqID, NULL) == !NULL);
			
			$_SESSION['reg'] = [
				'name' => $name,
				'username' => $username,
				'phone' => $phone,
			]; // buat session pada form (untuk kondisi ketika gagal)
			
			if (isset($_FILES)) { // ketika masyarakat menyertakan gambar
				if ($_FILES['photo']['error'] == 0) { // cek file tidak ada masalah
					$extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
					if (in_array($extension, ['jpg', 'jpeg'])) { // cek ekstensi gambar
						if ($_FILES['photo']['size'] <= 2048000) { // cek ukuran gambar
							$photo = $this->uniqID . '.jpg';
							if (!move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/img/users/' . $photo)) {
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
			}
		
			if ($this->checkPetugas(NULL, $username) == NULL) {
				if (strlen($password) >= 8) {
					if ($password == $repass) {
						$password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
						$level = 2;
						$query = "INSERT INTO petugas VALUES(?, ?, ?, ?, ?, ?)";
						$this->db->prepare($query);
						$this->db->sth->bind_param('ssssss', $this->uniqID, $name, $username, $password, $phone, $level);
						$this->db->execute();
						if ($this->db->affectedRows() > 0) {
							unset($_SESSION['reg']);
							Flasher::setFlash('Berhasil! ', "$name telah bergabung sebagai petugas", 'success', 'correct');
							return true;
						}else {
							Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
						}
					}else {
						Flasher::setFlash('Gagal! ', 'Konfirmasi password salah.', 'warning', 'warning');
						$_SESSION['autofocus']['pass'] = 1;
					}
				}else {
					Flasher::setFlash('Gagal! ', 'Password minimal 8 karakter.', 'warning', 'warning');
					$_SESSION['autofocus']['pass'] = 1;
				}
			}else {
				Flasher::setFlash('Gagal! ', 'Username sudah digunakan.', 'warning', 'warning');
				$_SESSION['autofocus']['username'] = 1;
			}
		}else {
			Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
		}
	}
	
	public function checkPetugas($id = NULL, $username = NULL){ // proses cek id
		if ($id != NULL) {
			$query = "SELECT id_petugas FROM petugas WHERE id_petugas = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $id);
			$this->db->execute();
			$this->db->getResult();
			
			return $this->db->row[0]['id_petugas'];
		}else if ($username != NULL) {
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