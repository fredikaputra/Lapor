<?php

class Delete_model{
	private $db;
	
	public function __construct(){
		$this->db = new Database;
	}
	
	// hapus pengguna
	public function pengguna($id){
		
		// hapus pengguna
		// pada tabel petugas
		if (strpos($id, 'PTGS') !== FALSE) {
			
			// ambil nama petugas
			$query = "SELECT nama_petugas FROM petugas WHERE id_petugas = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $id);
			$this->db->execute();
			$this->db->getResult();
			
			// hapus petugas
			$query = "DELETE FROM petugas WHERE id_petugas = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $id);
			$this->db->execute();
			
			// berhasil
			if ($this->db->affectedRows() > 0) {
				
				// buat log
				$log  = $_SESSION['petugasID'] . "|Telah menghapus '" . $this->db->row[0]['nama_petugas'] . "' sebagai petugas.|" . time() . PHP_EOL;
				
				// simpan log
				$createLog = file_put_contents('app/log/log_' . date('d.m.Y') . '.log', $log, FILE_APPEND);
				
				Flasher::setFlash('Berhasil! ', $this->db->row[0]['nama_petugas'] . " sudah tidak lagi menjadi pengguna.", 'success', 'correct');
			}
			
			// gagal
			else {
				Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
			}
		}
		
		// hapus pengguna
		// pada tabel masyarakat
		else {
			
			// ambil nama masyarakat
			$query = "SELECT nama FROM masyarakat WHERE nik = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $id);
			$this->db->execute();
			$this->db->getResult();
			
			// hapus masyarakat
			$query = "DELETE FROM masyarakat WHERE nik = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $id);
			$this->db->execute();
			
			// berhasil
			if ($this->db->affectedRows() > 0) {
				
				// buat log
				$log  = $_SESSION['petugasID'] . "|Telah menghapus '" . $this->db->row[0]['nama'] . "' sebagai masyarakat.|" . time() . PHP_EOL;
				
				// simpan log
				$createLog = file_put_contents('app/log/log_' . date('d.m.Y') . '.log', $log, FILE_APPEND);
				
				Flasher::setFlash('Berhasil! ', $this->db->row[0]['nama'] . " sudah tidak lagi menjadi pengguna.", 'success', 'correct');
			}
			
			// gagal
			else {
				Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
			}
		}
	}
	
	// hapus laporan
	public function laporan($id){
		
		// hapus laporan
		$query = "DELETE FROM pengaduan WHERE id_pengaduan = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $id);
		$this->db->execute();
		
		// berhasil
		if ($this->db->affectedRows() > 0) {
			
			// buat log
			$log  = $_SESSION['petugasID'] . "|Telah menghapus data laporan '" . $id . "'.|" . time() . PHP_EOL;

			// simpan log
			$createLog = file_put_contents('app/log/log_' . date('d.m.Y') . '.log', $log, FILE_APPEND);
			
			Flasher::setFlash('Berhasil! ', "Laporan dengan ID: " . $id . " telah dihapus.", 'success', 'correct');
		}
		
		// gagal
		else {
			Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
		}
	}
}