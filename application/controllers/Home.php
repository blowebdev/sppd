<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		// echo $this->session->userdata('level');
		// redirect('login');
		//Do your magic here
		
	}

	public function cek_login()
	{
		$cek = $_SESSION['username'];
		if (empty($cek)) {
			// echo "kosong";
			redirect('login');
		}else{
			// redirect('dashboard');
		}	
	}

	public function index()
	{
		$this->cek_login();

		$cek = $_SESSION['username'];
		if (empty($cek)) {
			// echo "kosong";
			// redirect('login');
		}else{
			$this->home();
			// redirect('home');
		}	
	}

	public function home()
	{
		$this->cek_login();
		$data['halaman'] = 'pages/home';
		$this->load->view('home',$data);
	}

	public function login()
	{
		$this->load->view('login');
	}
	public function logout()
	{
		$this->session->sess_destroy();

		// echo '<script type="text/javascript">
		// document.location = "https://eplanning.surabaya.go.id/";

		// window.close();
		// </script>';
		echo "Berhasil logout";
		redirect('login');
	}
}