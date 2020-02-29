<?php

class InsertData_model{
	private $db;
	private $query;
	private $id;
	private $time;
	private $errUpload;
	private $status = '0';
	private $imgtype = ['image/jpg', 'image/jpeg', 'image/png'];
	
	// call database
	public function __construct(){
		$this->db = new Database;
	}
	
	// insert laporan proccess
	public function addLaporan($data, $files){
		extract($data);
		$this->time = time();
		$this->generateId();
		$this->insertPhoto($files);
		if ($this->errUpload != 1) { // check if file is surpported
			if ($this->errUpload != 2) { // check if file is uplaod
				$this->query = "INSERT INTO pengaduan VALUES(?, ?, ?, ?, ?, ?, ?)";
				$this->db->preparedStatement($this->query);
				$this->db->sth->bind_param('siissss', $this->id, $this->time, $_SESSION['masyarakatNIK'], $perihal, $laporan, $this->photo, $this->status);
				$this->db->executeQuery();
				if ($this->db->affectedRows() > 0) {
					Flasher::setFlash('Laporan anda berhasil dikirim!', 'success');
				}else { // query error
					Flasher::setFlash('Terjadi kesalahan saat memproses data!', 'danger');
				}
			}else { // failed to upload
				Flasher::setFlash('Terjadi kesalahan saat memproses data!', 'danger');
			}
		}else { // format file not supported
			Flasher::setFlash('Format gambar tidak didukung!', 'warning');
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
			if (in_array($photo['photo']['type'], $this->imgtype)) {
				if (move_uploaded_file($photo['photo']['tmp_name'], 'assets/img/pengaduan/' . $this->photo)) {
					echo 'mantap';
				}else { // failed to upload file
					$this->errUpload = 2;
				}
			}else { // image format not supported
				$this->errUpload = 1;
			}
			
		}else { // something went wrong / file isn't isset
			$this->photo = NULL;
		}
	}
}