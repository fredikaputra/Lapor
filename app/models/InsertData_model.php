<?php

class InsertData_model{
	private $db, $query;
	private $id, $time, $errUpload, $sanitized;
	private $status = '0';
	private $imgtype = ['image/jpg', 'image/jpeg', 'image/png'];
	
	// call database
	public function __construct(){
		$this->db = new Database;
	}
	
	// insert laporan proccess
	public function addLaporan($data, $files){
		if (isset($_SESSION['masyarakatNIK'])) { // check if user login
			// sanitize filter to prevent from sql injection
			$this->db->dbh->real_escape_string(extract($data));
			$this->sanitized = filter_var_array([$perihal, $laporan], FILTER_SANITIZE_STRING);
			
			$this->time = time();
			$this->generateId();
			$this->insertPhoto($files);
			if ($this->errUpload != 1) { // chekc if file is exceeds
				if ($this->errUpload != 2) { // check if file is surpported
					if ($this->errUpload != 3) { // check if file is uplaod
						$this->query = "INSERT INTO pengaduan VALUES(?, ?, ?, ?, ?, ?, ?)";
						$this->db->preparedStatement($this->query);
						$this->db->sth->bind_param('siissss',
													$this->id,
													$this->time,
													$_SESSION['masyarakatNIK'],
													$this->sanitized[0],
													$this->sanitized[1],
													$this->photo,
													$this->status);
						$this->db->executeQuery();
						if ($this->db->affectedRows() > 0) {
							Flasher::setFlash('Laporan anda berhasil dikirim!', 'success');
						}else { // query error
							Flasher::setFlash('Terjadi kesalahan saat memproses data! Code [2]', 'danger');
							var_dump($this->db->affectedRows());
							die();
						}
					}else { // failed to upload
						Flasher::setFlash('Terjadi kesalahan saat memproses data! Code [1]', 'danger');
					}
				}else { // format file not supported
					Flasher::setFlash('Format gambar tidak didukung!', 'warning');
				}
			}else { // file exceeds
				Flasher::setFlash('Ukuran gambar melebihi 2MB!', 'warning');
			}
		}else { //user isn't logged
			Flasher::setFlash('Silahkan login terlebih dahulu untuk melapor!', 'warning');
		}
	}
	
	public function generateId(){
		//gerenate uniq id
		do {
			$this->id = strtoupper('lprid' . substr(md5(uniqid()), 25));
		} while ($this->uniqIdCheck($this->id) > 1); // check if uniq id is available
	}
	
	// check if uniqid is exists in database
	public function uniqIdCheck($id){
		$this->query = "SELECT * FROM pengaduan WHERE id_pengaduan = ?";
		$this->db->preparedStatement($this->query);
		$this->db->sth->bind_param('s', $id);
		$this->db->executeQuery();
		return $this->db->getResult();
	}
	
	// insert photo proccess
	public function insertPhoto($photo){
		if ($photo['photo']['error'] == 0) {
			$this->photo = $this->id . '.' . pathinfo($photo['photo']['name'], PATHINFO_EXTENSION);
			if ($photo['photo']['size'] <= 2048000) {
				if (in_array($photo['photo']['type'], $this->imgtype)) {
					if (move_uploaded_file($photo['photo']['tmp_name'], 'assets/img/pengaduan/' . $this->photo)) {
						echo 'mantap';
					}else { // failed to upload file
						$this->errUpload = 3;
					}
				}else { // image format not supported
					$this->errUpload = 2;
				}
			}else { // image size exceeds
				$this->errUpload = 1;
			}
		}else { // something went wrong / file isn't isset
			$this->photo = NULL;
		}
	}
}