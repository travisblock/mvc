<?php

class About extends Controller{

	public function index($job = "Programmer", $cond = "jomblo"){

		$data['judul'] = "About Me";
		$data['job'] = $job;
		$data['cond'] = $cond;
		$this->view('templates/header', $data);
		$this->view('about/index', $data);
		$this->view('templates/footer');
	}

	public function page(){

		echo "ini About/page";
	}
}