<?php

class Daftar_model{
	private $db, $uniqID;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function proccess($data){ // proses registrasi masyarakat
		$this->db->dbh->real_escape_string(extract($data));
		
		if (isset($reg)) { // cek kalau button submit pada form di tekan
			$_SESSION['reg'] = [ // buat session isi form (untuk keadaan dimana kondisi salah)
				'nik' => $nik,
				'name' => $name,
				'username' => $username,
				'phone' => $phone
			];
			
			if ($this->check($nik, '') == NULL) { // cek kalau nik tidak ada yang menggunakan
				if ($this->check('', $username) == NULL) { // cek username belum digunakan
					if (strlen($pass) >= 8) { // cek panjang password, min 8 karakter
						if ($pass == $repass) { // cek password telah terkonfirmasi
							if (strlen($phone) >= 9) {
								$password = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 12]); // encrypt password
								$query = 'INSERT INTO masyarakat VALUES (?, ?, ?, ?, ?)';
								$this->db->prepare($query);
								$this->db->sth->bind_param('sssss', $nik, $name, $username, $password, $phone);
								$this->db->execute();
								if ($this->db->affectedRows() > 0) {
									Flasher::setFlash('Berhasil! ', 'Anda telah terdaftar.', 'success', 'correct');
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
	
	public function check($nik = '', $username = ''){ // proses check nik
		if ($nik != '') {
			$query = 'SELECT nik FROM masyarakat WHERE nik = ?';
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $nik);
		}else if ($username != '') {
			$query = 'SELECT username FROM masyarakat WHERE username = ?';
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $username);
		}
		
		$this->db->execute();
		return $this->db->getResult();
	}
	
	public function petugas($data, $files){ // proses tambah laporan
		$this->db->dbh->real_escape_string(extract($data));
		
		if (isset($addpetugas)) { // check ketika button submit di tekan pada form
			do { // generate id laporan yang unik
				$this->uniqID = strtoupper('ptgs' . substr(md5(uniqid()), 25));
				if ($this->checkPetugas($this->uniqID, '') != $this->uniqID) { // chek ketika id tersedia
					break;
				}
			} while ($this->checkPetugas($this->uniqID, '') == !NULL);
			
			$_SESSION['reg'] = [
				'name' => $name,
				'username' => $username,
				'phone' => $phone,
			]; // buat session pada form (untuk kondisi ketika gagal)
			
			$level = '2';
			
			if (isset($files)) { // ketika masyarakat menyertakan gambar
				if ($files['photo']['error'] == 0) { // cek file tidak ada masalah
					$extension = pathinfo($files['photo']['name'], PATHINFO_EXTENSION);
					if (in_array($extension, ['jpg', 'jpeg'])) { // cek ekstensi gambar
						if ($files['photo']['size'] <= 2048000) { // cek ukuran gambar
							$photo = $this->uniqID . '.jpg';
							if (!move_uploaded_file($files['photo']['tmp_name'], 'assets/img/users/' . $photo)) {
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
		
			if ($this->checkPetugas('', $username) == TRUE) {
				if (strlen($password) >= 8) {
					if ($password == $repass) {
						$password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
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
	
	public function checkPetugas($id = '', $username = ''){ // proses cek id
		if ($id != '') {
			$query = "SELECT id_petugas FROM petugas WHERE id_petugas = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $id);
			$this->db->execute();
			if ($this->db->getResult() !== NULL) {
				return $this->db->row[0]['id_petugas'];
			};
		}else if ($username != '') {
			$query = "SELECT username FROM petugas WHERE username = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $username);
			$this->db->execute();
			if ($this->db->getResult() == NULL) {
				return true;
			};
		}
	}
}