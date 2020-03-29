<?php

class Siswa extends Controller{

	private $validasi,
					$eror = array();

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
		$this->cekValidasi($nama);
		if($this->cekValidasi($nama)){
			if($this->model('Siswa_model')->tambahSiswa(Input::get()) > 0){
				Msg::setMSG('Data siswa berhasil ditambahkan', 'success');
				header('Location:'. BASEURL . 'siswa');
				exit();
			}
		}else{
			$errArr = array_unique($this->eror);

			foreach ($errArr as $err) {

				Msg::setErrMsg($err);

			}
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
									'required' => true,
								),
			'jurusan' => array(
									'required' => true,
								),
			'email' => array(
									'required' => true,
								)
		));
	return $validation;
	}

	public function cekValidasi($nama=null){
			if($this->cekDataSiswa($nama)){
				if($this->validasiUser()->passed()){
					return true;
				}else{
					foreach ($this->validasiUser()->errors() as $erorr) {
						$this->eror[] = $erorr;
					}
				}
			}
			return false;
	}

	public function cekDataSiswa($nama = null){
		if($this->model('Siswa_model')->siswaExists($nama) < 1){
			return true;
		}else{
			$this->eror[] = "Nama tidak boleh sama";
			return $this->eror;
		}
	}
}
