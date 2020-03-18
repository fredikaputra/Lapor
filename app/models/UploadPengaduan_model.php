<?php

class UploadPengaduan_model{
	private $db, $uniqID, $photo;
	private $table = 'pengaduan';
	private $imgType = ['image/png', 'image/jpg', 'image/jpeg'];
	
	public function __construct(){
		$this->db = new Database;
	}
	
	public function send($data, $files){
		$this->db->dbh->real_escape_string(extract($data));
		
		if (isset($report) && isset($_SESSION['masyarakatNIK'])) { // jalankan ketika tombol ditekan atau sesi temporari di buat
			$date = time(); // waktu sekarang
			$status = 0; // status belum di proses
			$_SESSION['msg'] = $msg; // buat sesi pesan (berguna ketika user melakukan kesalahan saat mengisi formulir)
			
			// generate id yang unik
			do{
				$this->uniqID = strtoupper('lprid' . substr(md5(uniqid()), 25));
			}while($this->checkUniqID($this->uniqID) > 1);
			
			// upload file
			if ($files['photo']['error'] === 0) {
				if ($this->uploadImg($files) === FALSE) {
					return false;
				}
			}else {
				$this->photo = NULL;
			}
			
			$query = "INSERT INTO $this->table VALUES(?, ?, ?, ?, ?, ?)";
			$this->db->prepare($query);
			$this->db->sth->bind_param('ssssss',
										$this->uniqID,
										$date,
										$_SESSION['masyarakatNIK'],
										$msg,
										$this->photo,
										$status);
			$this->db->execute();
			if ($this->db->affectedRows() > 0) { // proses berhasil
				if (isset($_SESSION['msg'])) {
					unset($_SESSION['msg']);
				}
				Flasher::setFlash('Laporan anda berhasil terkirim!', 'bg-success', 'correct.png');
			}else {
				Flasher::setFlash('Terjadi kesalahan saat memproses data!', 'bg-danger', 'warning.png');
			}
		}else {
			Flasher::setFlash('Terjadi kesalahan saat memproses data!', 'bg-danger', 'warning.png');
		}
	}
	
	public function checkUniqID($id){ // cek uniqid belum ada di database
		$query = "SELECT id_pengaduan FROM $this->table WHERE id_pengaduan = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $id);
		$this->db->execute();
		return $this->db->getResult();
	}
	
	public function uploadImg($files){ // fungsi upload
		if ($files['photo']['size'] <= 2048000) {
			if (in_array($files['photo']['type'], $this->imgType)) {
				$this->photo = $this->uniqID . '.' . pathinfo($files['photo']['name'], PATHINFO_EXTENSION);
				if (move_uploaded_file($files['photo']['tmp_name'], 'assets/img/aduan/' . $this->photo)) {
					// file berhasil terupload
				}else {
					Flasher::setFlash('Terjadi kesalahan saat memproses data!', 'bg-danger', 'warning.png');
					var_dump(move_uploaded_file($files['photo']['tmp_name'], 'assets/img/aduan/' . $this->photo));
					die();
					return false;
				}
			}else {
				Flasher::setFlash('Format file tidak didukung!', 'bg-warning', 'warning.png');
				return false;
			}
		}else {
			Flasher::setFlash('Ukuran gambar maksimal 2MB!', 'bg-warning', 'warning.png');
			return false;
		}
	}
}