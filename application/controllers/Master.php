<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class master extends CI_Controller {

	
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
	
	public function pegawai()
	{
		$this->cek_login();
		$data['halaman'] = 'master/pegawai';
		$this->load->view('home',$data);
	}

	public function act_pegawai()
	{
		$this->cek_login();
		$data['halaman'] = 'master/act_pegawai';
		$this->load->view('home',$data);
	}

	public function save_pegawai()
	{
		$this->load->library('session');
		$this->cek_login();
		$data = array(
			'nip' => $_REQUEST['nip'],
			'nama' => $_REQUEST['nama'],
			'pangkat' => $_REQUEST['pangkat'],
			'golongan' => $_REQUEST['golongan'],
			'no_hp' => $_REQUEST['no_hp'],
			'alamat' => $_REQUEST['alamat'],
			'jk' => $_REQUEST['jk'],
			'jabatan' => $_REQUEST['jabatan'],
			'tanggal_lahir' => $_REQUEST['tanggal_lahir'],
			'tempat_lahir' => $_REQUEST['tempat_lahir'],
			'username' => $_REQUEST['username'],
			'password' => md5($_REQUEST['password']),
		);


		if (!empty($_REQUEST['id'])) {
			$this->db->where('id', $_REQUEST['id']);
			$exc = $this->db->update('m_pegawai',$data);
		}else{
			$exc = $this->db->insert('m_pegawai',$data);
		}

		if ($exc) {
			$alert['alert'] = '
			<div class="alert alert-success alert-dismissible" role="alert">
			<div class="alert-message">
			<strong>Perhatian !! Data atas nama <b>['.$_REQUEST['nama'].']</b> berhasil disimpan</strong>
			</div>
			</div>
			';
			$this->session->set_flashdata('alert',$alert);
			if(!empty($_REQUEST['id'])){
				redirect('master/act_pegawai?id='.$_REQUEST['id'],'refresh');
			}else{
				redirect('master/act_pegawai');
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
				redirect('master/act_pegawai?id='.$_REQUEST['id'],'refresh');
			}else{
				redirect('master/act_pegawai','refresh');
			}
		}
	}

	public function delete_pegawai(){
		$this->db->where(array('id'=>$_REQUEST['id']));
		$exc = $this->db->delete('m_pegawai');
		if ($exc) {
			$alert['alert'] = '
			<div class="alert alert-success alert-dismissible" role="alert">
			<div class="alert-message">
			<strong>Perhatian !! Data berhasil dihapus</strong>
			</div>
			</div>
			';
			$this->session->set_flashdata('alert',$alert);
			redirect('master/pegawai');
		}else{
			$alert['alert'] = '
			<div class="alert alert-danger alert-dismissible" role="alert">
			<div class="alert-message">
			<strong>Perhatian !! Data gagal dihapus</strong>
			</div>
			</div>
			';
			redirect('master/pegawai');
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