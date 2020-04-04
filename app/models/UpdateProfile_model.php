<?php

class UpdateProfile_model extends Controller{
	private $db;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function update($data, $files){
		$this->db->dbh->real_escape_string(extract($data));
		
		if (isset($updateprofile)) { // check ketika button submit tertekan pada form
			if (isset($files)) { // chek kalau gambar di sertakan
				if ($files['photo']['error'] == 0) { // chek file error atau tidak
					$extension = pathinfo($files['photo']['name'], PATHINFO_EXTENSION);
					if (in_array($extension, ['jpg', 'jpeg'])) { // check ekstensi gambar
						if ($files['photo']['size'] <= 2048000) { // check ukuran gambar
							$photo = $_SESSION['petugasID'] . '.jpg';
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
			}else { // gambar tidak di sertakan
				$photo = NULL;
			}
		
			$query = "UPDATE petugas SET nama_petugas = ?, telp = ? WHERE id_petugas = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('sss', $name, $phone, $_SESSION['petugasID']);
			$this->db->execute();
			if ($this->db->affectedRows() > 0) {
				Flasher::setFlash('Berhasil! ', 'Data profil anda telah diubah.', 'info', 'correct');
			}else {
				if ($photo != NULL) {
					Flasher::setFlash('Berhasil! ', 'Foto profil anda telah diubah.', 'info', 'correct');
				}else {
					Flasher::setFlash(NULL, 'Tidak ada data yang diubah!', 'danger', 'warning');
				}
			}
		}else {
			Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
		}
	}
}