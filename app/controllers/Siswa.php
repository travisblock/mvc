<?php

class Siswa extends Controller{

	private $validasi,
					$eror = array(),
					$errorrs = null;

	public function __construct(){

		$this->validasi = Validation::get();
	}

	public function index(){

		$data['judul'] = "Daftar Siswa ";
		$data['siswa'] = $this->model('Siswa_model')->getAllSiswa();
		$this->view('templates/header', $data);
		$this->view('siswa/index', $data);
		$this->view('templates/footer');
	}

	public function detail($id=null){
		$data['judul'] = "Detail Siswa ";
		$data['siswa'] = $this->model('Siswa_model')->getSiswaById($id);
		$this->view('templates/header', $data);
		$this->view('siswa/detail', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$nama = Input::get('nama');
		if(is_null($this->cekDataSiswa($nama))){
			if($this->cekValidasi($nama)){
				if($this->model('Siswa_model')->tambahSiswa(Input::get()) > 0){
					Msg::setMSG('Data siswa sukses ditambahkan', 'success');
					header('Location:'. BASEURL . 'siswa');
					exit();
				}

			}else{

				$errArr = array_unique($this->eror);

				for($i=0; $i < count($errArr); $i++){
					echo $errArr[$i];
					Msg::setMSG($errArr[$i], 'danger');

					header('Location:'. BASEURL . 'siswa');
					exit();

				}

			}
		}else{
			$errArr = array_unique($this->eror);

			for($i=0; $i < count($errArr); $i++){
				echo $errArr[$i];
				Msg::setMSG($errArr[$i], 'danger');

				header('Location:'. BASEURL . 'siswa');
				exit();

			}
		}
	}


	public function ubah(){
		$nama = Input::get('nama');
		if($this->cekValidasi($nama)){
			if($this->model('Siswa_model')->ubahSiswa(Input::get()) > 0){
				Msg::setMSG('Data siswa sukses diubah', 'success');
				header('Location:'. BASEURL . 'siswa');
				exit();
			}

		}else{

			$errArr = array_unique($this->eror);

			for($i=0; $i < count($errArr); $i++){
				echo $errArr[$i];
				Msg::setMSG($errArr[$i], 'danger');

				header('Location:'. BASEURL . 'siswa');
				exit();

			}

		}
	}

	public function delete($id){
			if($this->model('Siswa_model')->deleteSiswa($id) > 0){
				Msg::setMSG('Data siswa sukses dihapus', 'success');
				header('Location:'. BASEURL . 'siswa');
				exit();
		}else{
			Msg::setMSG('Data siswa gagal dihapus', 'danger');
			header('Location:'. BASEURL . 'siswa');
			exit();
		}
	}

	public function validasiUser(){
		$validation = $this->validasi->cek(array(
			'nama' => array(
									'required' => true,
									'min'			 => 3,
									'max'			 => 50
								),
			'kelas' => array(
									'required' => true
								),
			'jurusan' => array(
									'required' => true
								),
			'email' => array(
									'required' => true
								)
		));
	return $validation;
	}

	public function cekValidasi($nama=null){
		// var_dump($this->cekDataSiswa($nama));
		// if(is_null($this->cekDataSiswa($nama))){
			if($this->validasiUser()->passed()){
				return true;

			}else{
				foreach ($this->validasiUser()->errors() as $erorr) {
					$this->eror[] = $erorr;
				}
				return false;
			}

		// }else{
		// 	foreach ($this->validasiUser()->errors() as $erorr) {
		// 		$this->eror[] = $erorr;
		// 	}
		// 	return false;
		// }

	}

	public function cekDataSiswa($nama = null){
		if($this->model('Siswa_model')->siswaExists($nama) > 0){
			return $this->eror[] = "Nama tidak boleh sama";
		}
	}

	public function getUbah(){
		echo json_encode($this->model('Siswa_model')->getSiswaById(Input::get('id')));
	}


	public function getCari(){

		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$search = Input::get('search');
			if(isset($search)){
				$resource = $this->model('Siswa_model')->cariSiswa($search);
				$data['error'] = '';
				if(!$resource){
					$data['error'] = '<div class="mt-2 alert alert-secondary">Maaf data yang anda cari tidak ditemukan</div>';
				}
				$data['siswa'] = $resource;
				$this->view('siswa/cari', $data);

			}
		}else{
			header('Location:'. BASEURL . 'siswa');
			exit();
		}

	}

}
