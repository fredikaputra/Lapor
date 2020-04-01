<?php

class Daftar_model{
	private $db;
	
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
			
			if ($this->nikCheck($nik) == NULL) { // cek kalau nik tidak ada yang menggunakan
				if ($this->usernameCheck($username) == NULL) { // cek username belum digunakan
					if (strlen($pass) >= 8) { // cek panjang password, min 8 karakter
						if ($pass == $repass) { // cek password telah terkonfirmasi
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
	
	public function nikCheck($nik){ // proses check nik
		$query = 'SELECT nik FROM masyarakat WHERE nik = ?';
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $nik);
		$this->db->execute();
		return $this->db->getResult();
	}
	
	public function usernameCheck($username){ // proses check username
		$query = 'SELECT username FROM masyarakat WHERE username = ?';
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $username);
		$this->db->execute();
		return $this->db->getResult();
	}
}