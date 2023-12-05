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