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

		$nama = htmlentities($post['nama']);
		$kelas = htmlentities($post['kelas']);
		$jurusan = htmlentities($post['jurusan']);
		$email = htmlentities($post['email']);

		$this->db->bind('nama', $nama);
		$this->db->bind('kelas', $kelas);
		$this->db->bind('jurusan', $jurusan);
		$this->db->bind('email', $email);
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

		$nama = htmlentities($post['nama']);
		$kelas = htmlentities($post['kelas']);
		$jurusan = htmlentities($post['jurusan']);
		$email = htmlentities($post['email']);

		$this->db->bind('id', $post['id']);
		$this->db->bind('nama', $nama);
		$this->db->bind('kelas', $kelas);
		$this->db->bind('jurusan', $jurusan);
		$this->db->bind('email', $email);

		$this->db->execute();
		return $this->db->rowCount();
	}

	public function cariSiswa($siswa){

		$query = "SELECT * FROM siswa WHERE nama LIKE :nama OR jurusan LIKE :jurusan";
		$this->db->query($query);
		$this->db->bind('nama', "%$siswa%");
		$this->db->bind('jurusan', "%$siswa%");

		$this->db->execute();
		$jml = $this->db->rowCount();

		if($jml > 0){

			return $this->db->resultAll();

		}else{
			$a = array();
			return $a;
		}
	}
}
