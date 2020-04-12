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
			$query = "SELECT nama_petugas FROM petugas WHERE id_petugas = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $id);
			$this->db->execute();
			$this->db->getResult();
			
			$query = "DELETE FROM petugas WHERE id_petugas = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $id);
			$this->db->execute();
			if ($this->db->affectedRows() > 0) {
				Flasher::setFlash('Berhasil! ', $this->db->row[0]['nama_petugas'] . " sudah tidak lagi menjadi pengguna.", 'success', 'correct');
			}else {
				Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
			}
		}
		
		// hapus pengguna
		// pada tabel masyarakat
		else {
			$query = "SELECT nama FROM masyarakat WHERE nik = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $id);
			$this->db->execute();
			$this->db->getResult();
			
			$query = "DELETE FROM masyarakat WHERE nik = ?";
			$this->db->prepare($query);
			$this->db->sth->bind_param('s', $id);
			$this->db->execute();
			if ($this->db->affectedRows() > 0) {
				Flasher::setFlash('Berhasil! ', $this->db->row[0]['nama'] . " sudah tidak lagi menjadi pengguna.", 'success', 'correct');
			}else {
				Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
			}
		}
	}
	
	// hapus laporan
	public function laporan(){
		$query = "DELETE FROM pengaduan WHERE id_pengaduan = ?";
		$this->db->prepare($query);
		$this->db->sth->bind_param('s', $id);
		$this->db->execute();
		if ($this->db->affectedRows() > 0) {
			Flasher::setFlash('Berhasil! ', "Laporan dengan ID: " . $id . " telah dihapus.", 'success', 'correct');
		}else {
			Flasher::setFlash(NULL, 'Terjadi kesalahan saat memproses data!', 'danger', 'warning');
		}
	}
}