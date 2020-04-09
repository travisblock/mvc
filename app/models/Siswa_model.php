<?php

class Siswa_model{

	private $db,
			$stmt;

	public function __construct(){
		$this->db = Database::getDB();
	}

	public function getAllSiswa(){
		$this->db->query("SELECT * FROM siswa");
		return $this->db->resultAll();
	}

	public function getSiswaById($id){
		$this->db->query("SELECT * FROM siswa WHERE id=:id");
		$this->db->bind('id', $id);
		return $this->db->result();
	}

	public function tambahSiswa($post){
		$query = "INSERT INTO siswa(nama,kelas,jurusan,email)
					VALUES
				  (:nama, :kelas, :jurusan, :email)";
		$this->db->query($query);
		$this->db->bind('nama', $post['nama']);
		$this->db->bind('kelas', $post['kelas']);
		$this->db->bind('jurusan', $post['jurusan']);
		$this->db->bind('email', $post['email']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function siswaExists($nama){
		$query = "SELECT * FROM siswa WHERE nama=:nama";
		$this->db->query($query);
		$this->db->bind('nama', $nama);

		$this->db->result();
		return $this->db->rowCount();
	}

	public function deleteSiswa($id){
		$query = "DELETE FROM siswa WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id', $id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function ubahSiswa($post){
		$query = "UPDATE siswa set nama=:nama, kelas=:kelas, jurusan=:jurusan, email=:email  where id=:id";
		$this->db->query($query);
		$this->db->bind('id', $post['id']);
		$this->db->bind('nama', $post['nama']);
		$this->db->bind('kelas', $post['kelas']);
		$this->db->bind('jurusan', $post['jurusan']);
		$this->db->bind('email', $post['email']);

		$this->db->execute();
		return $this->db->rowCount();
	}
}
