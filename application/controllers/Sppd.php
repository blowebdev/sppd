<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'libraries/tcpdf/tcpdf.php';

class sppd extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		
	}

	public function cek_login()
	{
		$cek = $_SESSION['username'];
		if (empty($cek)) {
			redirect('login');
		}
	}
	
	public function penugasan()
	{
		$this->cek_login();
		$data['halaman'] = 'master/penugasan';
		$this->load->view('home',$data);
	}

	public function act_pegawai()
	{
		$this->cek_login();
		$data['halaman'] = 'master/act_pegawai';
		$this->load->view('home',$data);
	}

	public function set_penugasan()
	{
		$this->cek_login();
		$data['halaman'] = 'master/set_penugasan';
		$this->load->view('home',$data);
	}
	public function pelaporan()
	{
		$this->cek_login();

		if (isset($_REQUEST['simpan_verifikasi'])) {
			$data = array(
				'status_laporan' => $_REQUEST['status'],
				'catatan_laporan' => $_REQUEST['catatan']
			);
			$exc = $this->db->where(array('id'=>$_REQUEST['id_uniq']))->update('m_penugasan',$data);
			if ($exc) {
				$alert['alert'] = '
				<div class="alert alert-success alert-dismissible" role="alert">
				<div class="alert-message">
				<strong>Perhatian !! Data berhasil disimpan</strong>
				</div>
				</div>
				';
				$this->session->set_flashdata('alert',$alert);
				redirect('sppd/pelaporan?id='.$_REQUEST['id'],'refresh');
			}else{
				$alert['alert'] = '
				<div class="alert alert-danger alert-dismissible" role="alert">
				<div class="alert-message">
				<strong>Perhatian !! Data gagal disimpan</strong>
				</div>
				</div>
				';
				$this->session->set_flashdata('alert',$alert);
				redirect('sppd/pelaporan?id='.$_REQUEST['id'],'refresh');
			}
		}

		if (isset($_REQUEST['simpan_verifikasi_agenda'])) {
			$data = array(
				'status' => $_REQUEST['status'],
				'catatan' => $_REQUEST['catatan']
			);
			$exc = $this->db->where(array('id'=>$_REQUEST['id']))->update('m_agenda',$data);
			if ($exc) {
				$alert['alert'] = '
				<div class="alert alert-success alert-dismissible" role="alert">
				<div class="alert-message">
				<strong>Perhatian !! Data berhasil disimpan</strong>
				</div>
				</div>
				';
				$this->session->set_flashdata('alert',$alert);
				redirect('sppd/pelaporan?id='.$_REQUEST['id'],'refresh');
			}else{
				$alert['alert'] = '
				<div class="alert alert-danger alert-dismissible" role="alert">
				<div class="alert-message">
				<strong>Perhatian !! Data gagal disimpan</strong>
				</div>
				</div>
				';
				$this->session->set_flashdata('alert',$alert);
				redirect('sppd/pelaporan?id='.$_REQUEST['id'],'refresh');
			}
		}


		$data['halaman'] = 'master/pelaporan';
		$this->load->view('home',$data);
	}
	public function set_pelapoan()
	{
		$this->cek_login();
		$data['halaman'] = 'master/set_pelapoan';
		$this->load->view('home',$data);
	}
	public function pencairan()
	{
		$this->cek_login();
		$data['halaman'] = 'master/pencairan';
		$this->load->view('home',$data);
	}
	public function act_pencairan()
	{
		$this->cek_login();
		$data['halaman'] = 'master/act_pencairan';
		$this->load->view('home',$data);
	}
	public function cetak_kwitansi()
	{
		$this->cek_login();
		$data['halaman'] = 'master/cetak_kwitansi';
		$this->load->view('master/cetak_kwitansi',$data);
	}

	public function save_pencairan(){
		$this->cek_login();

		$json_url = "https://maps.googleapis.com/maps/api/directions/json?origin=".$_REQUEST['lat'].",".$_REQUEST['long']."&destination=".$_REQUEST['lat2'].",".$_REQUEST['long2']."&key=AIzaSyBTgPmRwGjuwyazUzzZl6CosQTw1qpUDtY&mode=motorcycle";
		$json = file_get_contents($json_url);
		$data = json_decode($json, TRUE);
		$jarak_motor = $data['routes'][0]['legs'][0]['distance']['text'];
		$estimasi_waktu_motor = $data['routes'][0]['legs'][0]['duration']['text'];
		$jarak_fix = str_replace('km','', $jarak_motor);
		$total_dana = $jarak_fix * 4000;

		$data = array(
			'id_agenda'=>$_REQUEST['id_agenda'],
			'lokasi'=>$_REQUEST['lokasi_tujuan'],
			'berangkat'=>$_REQUEST['berangkat_dari'],
			'dana'=>$total_dana,
			'jarak'=>$jarak_fix,
			'lat_long1'=>$_REQUEST['lat'].",".$_REQUEST['long'],
			'lat_long2'=>$_REQUEST['lat2'].",".$_REQUEST['long2'],
		);

		$tot = $this->db->get_where('m_pencairan',array('id_agenda'=>$_REQUEST['id_agenda']))->num_rows();
		if ($tot>=1) {
			$this->db->where(array('id_agenda'=>$_REQUEST['id_agenda']));
			$exc = $this->db->update('m_pencairan',$data);
		}else{
			$exc = $this->db->insert('m_pencairan',$data);
		}
		if ($exc) {
			$alert['alert'] = '
			<div class="alert alert-success alert-dismissible" role="alert">
			<div class="alert-message">
			<strong>Perhatian !! Data berhasil disimpan</strong>
			</div>
			</div>
			';
			$this->session->set_flashdata('alert',$alert);
			redirect('sppd/act_pencairan?id_agenda='.$_REQUEST['id_agenda'],'refresh');
			
		}else{
			$alert['alert'] = '
			<div class="alert alert-danger alert-dismissible" role="alert">
			<div class="alert-message">
			<strong>Perhatian !! Data gagal disimpan</strong>
			</div>
			</div>
			';
			$this->session->set_flashdata('alert',$alert);
			redirect('sppd/act_pencairan?id_agenda='.$_REQUEST['id_agenda'],'refresh');
		}
	}
	public function save_deskripsi_pelapoan(){
		$this->cek_login();
		$data = array(
			'deskripsi_laporan'=>$_REQUEST['deskripsi']
		);
		$this->db->where(array('id_pegawai'=>$_REQUEST['id_pegawai'], 'id_agenda'=>$_REQUEST['id_agenda']));
		$exc = $this->db->update('m_penugasan',$data);

		if ($exc) {
			$alert['alert'] = '
			<div class="alert alert-success alert-dismissible" role="alert">
			<div class="alert-message">
			<strong>Perhatian !! Data berhasil disimpan</strong>
			</div>
			</div>
			';
			$this->session->set_flashdata('alert',$alert);
			redirect('sppd/set_pelapoan?id_agenda='.$_REQUEST['id_agenda']."&id_pegawai=".$_REQUEST['id_pegawai'],'refresh');
			
		}else{
			$alert['alert'] = '
			<div class="alert alert-danger alert-dismissible" role="alert">
			<div class="alert-message">
			<strong>Perhatian !! Data gagal disimpan</strong>
			</div>
			</div>
			';
			$this->session->set_flashdata('alert',$alert);
			redirect('sppd/set_pelapoan?id_agenda='.$_REQUEST['id_agenda']."&id_pegawai=".$_REQUEST['id_pegawai'],'refresh');
		}
	}
	public function report()
	{
		$this->cek_login();
		$data['halaman'] = 'master/report';
		$this->load->view('home',$data);
	}
	public function cetak_sppd()
	{
		$this->cek_login();
		 // Create new PDF document
		$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

        // Set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Your Name');
		$pdf->SetTitle('Sample PDF');
		$pdf->SetSubject('Generating PDF using TCPDF in CodeIgniter');
		$pdf->SetKeywords('PDF, CodeIgniter, TCPDF');

		// remove default header/footer
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
        // Add a page
		$pdf->AddPage();
		$html =$this->load->view('master/surat_sppd', [], true);

        // Set some content
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->lastPage();
        // Output the PDF as a file (force download)
		$pdf->Output('Proposal.pdf', 'I');

	}

	public function cetak_lampiran_sppd()
	{
		$this->cek_login();
		 // Create new PDF document
		$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

        // Set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Your Name');
		$pdf->SetTitle('Sample PDF');
		$pdf->SetSubject('Generating PDF using TCPDF in CodeIgniter');
		$pdf->SetKeywords('PDF, CodeIgniter, TCPDF');

		// remove default header/footer
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
        // Add a page
		$pdf->AddPage();
		$html =$this->load->view('master/lampiran_surat_sppd', [], true);

        // Set some content
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->lastPage();
        // Output the PDF as a file (force download)
		$pdf->Output('Proposal.pdf', 'I');

	}

	public function save_set_penugasan(){
		$this->cek_login();

		$data = array(
			'id_agenda' => $_REQUEST['id_agenda'],
			'id_pegawai' => $_REQUEST['id_pegawai']
		);
		$exc = $this->db->insert('m_penugasan',$data);
		if ($exc) {
			redirect('sppd/set_penugasan?id='.$_REQUEST['id_agenda'],'refresh');
		}else{
			redirect('sppd/set_penugasan?id='.$_REQUEST['id_agenda'],'refresh');
		}
	}

	public function delete_set_penugasan(){
		$this->cek_login();

		$data = array(
			'id_agenda' => $_REQUEST['id_agenda'],
			'id_pegawai' => $_REQUEST['id_pegawai']
		);
		$this->db->where($data);
		$exc = $this->db->delete('m_penugasan');
		if ($exc) {
			redirect('sppd/set_penugasan?id='.$_REQUEST['id_agenda'],'refresh');
		}else{
			redirect('sppd/set_penugasan?id='.$_REQUEST['id_agenda'],'refresh');
		}
	}
}