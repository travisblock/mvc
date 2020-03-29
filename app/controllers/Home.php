<?php

class Home extends Controller{

	public function index(){
		$data['judul'] = "MVC Test - Home Page";
		$data['title'] = 'Selamat Datang di MVC';
		$this->view('templates/header', $data);
		$this->view('home/index', $data);
		$this->view('templates/footer');
	}
}