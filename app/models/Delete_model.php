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
				
				// buat log dan simpan
				$log  = $_SESSION['petugasID'] . '|Telah menghapus "' . $this->db->row[0]['nama_petugas'] . '" dari pengguna petugas|' . time() . PHP_EOL;
				$createLog = file_put_contents('app/log/user_activity/log_' . date('d.m.Y') . '.log', $log, FILE_APPEND);
				
				Flasher::setFlash('Berhasil! ', $this->db->row[0]['nama_petugas'] . " sudah tidak lagi menjadi pengguna.", 'success', 'correct');
			}
			
			// gagal
			else {
				Flasher::setFlash(NULL, 'Tidak ada pengguna yang dihapus!', 'danger', 'warning');
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
				
				// buat log dan simpan
				$log  = $_SESSION['petugasID'] . '|Telah menghapus "' . $this->db->row[0]['nama'] . '" dari pengguna masyarakat|' . time() . PHP_EOL;
				$createLog = file_put_contents('app/log/user_activity/log_' . date('d.m.Y') . '.log', $log, FILE_APPEND);
				
				Flasher::setFlash('Berhasil! ', $this->db->row[0]['nama'] . " sudah tidak lagi menjadi pengguna.", 'success', 'correct');
			}
			
			// gagal
			else {
				Flasher::setFlash(NULL, 'Tidak ada pengguna yang dihapus!', 'danger', 'warning');
			}
		}
	}
	
	// hapus laporan
	public function laporan($id){
		$query = "SELECT status FROM pengaduan WHERE id_pengaduan = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $id);
		$this->db->execute();
		$this->db->getResult();
		
		// hapus laporan
		if (isset($_SESSION['masyarakatNIK']) && $this->db->row[0]['status'] == '0' || isset($_SESSION['petugasID'])) {
			// hapus laporan
			$query = "DELETE FROM pengaduan WHERE id_pengaduan = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $id);
			$this->db->execute();
			
			// berhasil
			if ($this->db->affectedRows() > 0) {
				
				// buat log dan simpan
				if (isset($_SESSION['petugasID'])) {
					$userid = $_SESSION['petugasID'];
				}else if (isset($_SESSION['masyarakatNIK'])) {
					$userid = $_SESSION['masyarakatNIK'];
				}
				$log  = $userid . '|Telah menghapus data laporan "' . $id . '"|' . time() . PHP_EOL;
				$createLog = file_put_contents('app/log/user_activity/log_' . date('d.m.Y') . '.log', $log, FILE_APPEND);
				
				Flasher::setFlash('Berhasil! ', "Laporan dengan ID: " . $id . " telah dihapus.", 'success', 'correct');
			}
			
			// gagal
			else {
				Flasher::setFlash(NULL, 'Tidak ada data yang dihapus!', 'danger', 'warning');
			}
		}
		
		// jangan hapus laporan ketika
		// yang hapus itu masyarakat
		// dan status laporan itu sudah terverifikasi
		else {
			Flasher::setFlash('Gagal! ', 'Anda tidak dapat menghapus laporan yang sudah terverifikasi.', 'warning', 'warning');
			return false;
		}
	}
	
	// hapus log
	public function log(){
		
		$files = glob('app/log/user_activity/*');
		if ($files != NULL) {
			
			// hapus semua file dalam folder user_activity
			foreach($files as $file){
				if(is_file($file)) unlink($file);
			}
		}
		
		else {
			// tidak ada file yang dihapus
			$error = 1;
		}
		
		if (isset($error) && $error == 1) {
			Flasher::setFlash(NULL, 'Tidak ada riwayat yang dihapus!', 'danger', 'warning');
		}
		else {
			Flasher::setFlash('Berhasil! ', "Anda telah menghapus seluruh riwayat aktifitas.", 'success', 'correct');
		}
	}
}