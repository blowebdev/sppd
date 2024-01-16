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
		$config['upload_path']          = './file_surat/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 80000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;
		$this->load->library('upload', $config);

		$json_url = "https://maps.googleapis.com/maps/api/directions/json?origin=".$_REQUEST['lat'].",".$_REQUEST['long']."&destination=".$_REQUEST['lat2'].",".$_REQUEST['long2']."&key=AIzaSyBTgPmRwGjuwyazUzzZl6CosQTw1qpUDtY&mode=motorcycle";
		$json = file_get_contents($json_url);
		$data = json_decode($json, TRUE);
		$jarak_motor = $data['routes'][0]['legs'][0]['distance']['text'];
		$estimasi_waktu_motor = $data['routes'][0]['legs'][0]['duration']['text'];
		$jarak_fix = str_replace('km','', $jarak_motor);
		$total_dana = $jarak_fix * 4000;

		// if($_FILES['file']['name']!="") {
		// 	if (!$this->upload->do_upload('file')){
		// 		echo $this->upload->display_errors();
		// 	}else{
		// 		$upload_data=$this->upload->data();
		// 		$file=(empty($upload_data['file_name'])) ? "-" : $upload_data['file_name'];
		// 	}
		// }else{
		// 	$file = $_REQUEST['file_lama'];
		// }

		// $set_file = (!empty($file)) ? $file : 'NULL';

		$data = array(
			'agenda' => $_REQUEST['agenda'],
			'tempat' => $_REQUEST['tempat'],
			'tanggal_mulai' => $_REQUEST['tanggal_mulai'],
			'nomor_surat' => $_REQUEST['nomor_surat'],
			'tanggal_selesai' => $_REQUEST['tanggal_selesai'],
			'deskripsi' => $_REQUEST['deskripsi'],
			'tanggal_surat' => $_REQUEST['tanggal_surat'],
			'perihal' => $_REQUEST['perihal'],
			'id_surat' => $_REQUEST['id_surat'],
			'lokasi'=>$_REQUEST['lokasi_tujuan'],
			'berangkat'=>$_REQUEST['berangkat_dari'],
			// 'file' => $set_file,
			'status' => 'proses',
			'jarak'=>$jarak_fix,
			'lat_long1'=>$_REQUEST['lat'].",".$_REQUEST['long'],
			'lat_long2'=>$_REQUEST['lat2'].",".$_REQUEST['long2'],
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