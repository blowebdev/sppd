<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();		
	}

	public function act_login()
	{
			
			  if (isset($_REQUEST['username']) OR isset($_REQUEST['password']) OR isset($_REQUEST['login'])) {
			      $username = htmlspecialchars($_POST['username']);
			      $password = md5(htmlspecialchars($_POST['password']));

			      $q = $this->db->query("SELECT * FROM m_users 
			       WHERE username='$username'
			       AND password='$password'");
			      $count = $q->num_rows();
			      $data  = $q->row_array();

			       if ($count>=1) {
			       	$this->session->set_userdata('data',$data); 
			       	$this->session->set_userdata('username',$data); 
			      	$this->session->set_flashdata('msg', 'true');
			      	redirect('home','refresh');
			       	echo "sasas";
			      }else{
			      	$this->session->set_flashdata('msg', 'false');
			      	redirect('login','refresh');
			      }
			 }


	}
}
?>