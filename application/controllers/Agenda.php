<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class agenda extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		
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
	
	public function agenda()
	{
		$this->cek_login();
		$data['halaman'] = 'master/agenda';
		$this->load->view('home',$data);
	}

	public function act_agenda()
	{
		$this->cek_login();
		$data['halaman'] = 'master/act_agenda';
		$this->load->view('home',$data);
	}

	public function save_agenda()
	{
		$this->load->library('session');
		$this->cek_login();
		$data = array(
			'agenda' => $_REQUEST['agenda'],
			'tempat' => $_REQUEST['tempat'],
			'tanggal_mulai' => $_REQUEST['tanggal_mulai'],
			'nomor_surat' => $_REQUEST['nomor_surat'],
			'tanggal_selesai' => $_REQUEST['tanggal_selesai'],
			'deskripsi' => $_REQUEST['deskripsi'],
			'tanggal_surat' => $_REQUEST['tanggal_surat'],
			'perihal' => $_REQUEST['perihal'],
			'status' => 'proses',
		);


		if (!empty($_REQUEST['id'])) {
			$this->db->where('id', $_REQUEST['id']);
			$exc = $this->db->update('m_agenda',$data);
		}else{
			$exc = $this->db->insert('m_agenda',$data);
		}

		if ($exc) {
			$alert['alert'] = '
			<div class="alert alert-success alert-dismissible" role="alert">
			<div class="alert-message">
			<strong>Perhatian !! Data atas agenda <b>['.$_REQUEST['agenda'].']</b> berhasil disimpan</strong>
			</div>
			</div>
			';
			$this->session->set_flashdata('alert',$alert);
			if(!empty($_REQUEST['id'])){
				redirect('agenda/act_agenda?id='.$_REQUEST['id'],'refresh');
			}else{
				redirect('agenda/act_agenda');
			}
		}else{
			$alert['alert'] = '
			<div class="alert alert-danger alert-dismissible" role="alert">
			<div class="alert-message">
			<strong>Perhatian !! Data gagal disimpan</strong>
			</div>
			</div>
			';
			$this->session->set_flashdata('alert',$alert);
			if(!empty($_REQUEST['id'])){
				redirect('agenda/act_agenda?id='.$_REQUEST['id'],'refresh');
			}else{
				redirect('agenda/act_agenda','refresh');
			}
		}
	}

	public function delete_agenda(){
		$this->db->where(array('id'=>$_REQUEST['id']));
		$exc = $this->db->delete('m_agenda');
		if ($exc) {
			$alert['alert'] = '
			<div class="alert alert-success alert-dismissible" role="alert">
			<div class="alert-message">
			<strong>Perhatian !! Data berhasil dihapus</strong>
			</div>
			</div>
			';
			$this->session->set_flashdata('alert',$alert);
			redirect('agenda/agenda');
		}else{
			$alert['alert'] = '
			<div class="alert alert-danger alert-dismissible" role="alert">
			<div class="alert-message">
			<strong>Perhatian !! Data gagal dihapus</strong>
			</div>
			</div>
			';
			redirect('agenda/agenda');
		}
	}

	public function berhasil()
	{
		echo "<script>alert('Berhasil disimpan')</script>";
	}
	public function berhasil_dikirim()
	{
		echo "<script>alert('Berhasil Dikirim')</script>";
	}

	public function gagal()
	{
		echo "<script>alert('Gagal disimpan')</script>";
	}

}