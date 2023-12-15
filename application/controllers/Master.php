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
	public function surat_masuk()
	{
		$this->cek_login();
		$data['halaman'] = 'master/surat_masuk';
		$this->load->view('home',$data);
	}

	public function act_surat_masuk()
	{
		$this->cek_login();
		$data['halaman'] = 'master/act_surat_masuk';
		$this->load->view('home',$data);
	}

	public function surat_list()
	{
		$this->cek_login();
		$result = $this->db->get_where("m_surat_masuk",array('id'=>$_REQUEST['id']))->row_array();
		echo json_encode($result);
	}

	public function save_surat_masuk()
	{
		$this->load->library('session');
		$this->cek_login();
		$config['upload_path']          = './file_surat/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 80000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;
		$this->load->library('upload', $config);

		if($_FILES['file']['name']!="") {
			if (!$this->upload->do_upload('file')){
				echo $this->upload->display_errors();
			}else{
				$upload_data=$this->upload->data();
				$file=(empty($upload_data['file_name'])) ? "-" : $upload_data['file_name'];
			}
		}else{
			$file = $_REQUEST['file_lama'];
		}

		$set_file = (!empty($file)) ? $file : 'NULL';

		$data = array(
			'nama_surat' => $_REQUEST['nama_surat'],
			'tempat' => $_REQUEST['tempat'],
			'no_surat' => $_REQUEST['nomor_surat'],
			'deskripsi_surat' => $_REQUEST['deskripsi'],
			'tgl_surat' => $_REQUEST['tanggal_surat'],
			'perihal' => $_REQUEST['perihal'],
			'file_surat' => $set_file
		);


		if (!empty($_REQUEST['id'])) {
			$this->db->where('id', $_REQUEST['id']);
			$exc = $this->db->update('m_surat_masuk',$data);
		}else{
			$exc = $this->db->insert('m_surat_masuk',$data);
		}

		if ($exc) {
			$alert['alert'] = '
			<div class="alert alert-success alert-dismissible" role="alert">
			<div class="alert-message">
			<strong>Perhatian !! Data atas surat_masuk <b>['.$_REQUEST['nama_surat'].']</b> berhasil disimpan</strong>
			</div>
			</div>
			';
			$this->session->set_flashdata('alert',$alert);
			if(!empty($_REQUEST['id'])){
				redirect('master/act_surat_masuk?id='.$_REQUEST['id'],'refresh');
			}else{
				redirect('master/act_surat_masuk');
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
				redirect('master/act_surat_masuk?id='.$_REQUEST['id'],'refresh');
			}else{
				redirect('master/act_surat_masuk','refresh');
			}
		}
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

	public function delete_surat_masuk(){
		$this->db->where(array('id'=>$_REQUEST['id']));
		$exc = $this->db->delete('m_surat_masuk');
		if ($exc) {
			$alert['alert'] = '
			<div class="alert alert-success alert-dismissible" role="alert">
			<div class="alert-message">
			<strong>Perhatian !! Data berhasil dihapus</strong>
			</div>
			</div>
			';
			$this->session->set_flashdata('alert',$alert);
			redirect('master/surat_masuk');
		}else{
			$alert['alert'] = '
			<div class="alert alert-danger alert-dismissible" role="alert">
			<div class="alert-message">
			<strong>Perhatian !! Data gagal dihapus</strong>
			</div>
			</div>
			';
			redirect('master/surat_masuk');
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