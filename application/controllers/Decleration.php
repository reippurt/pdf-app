<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Decleration extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('get');
		$this->load->model('handle');

		if(!$this->session->userdata('logged_in')){ redirect('/'); }

	}

	public function _init()
	{
		$this->output->set_template('default');
	}

	public function id($declerationId = false)
	{

		$this->_init();
		
		$where = "declerationId = '".$declerationId."'";
		
		$decleration = $this->get->declerations($where);

		$data['decleration'] = $decleration;

		$this->load->view('single-decleration', $data);
	}


	public function edit($declerationId = false)
	{
		$this->_init();

		$data['decleration'] = $this->get->decleration($declerationId);

		$this->load->view('forms/update-decleration', $data);

	}

	public function makePdf($declerationId)
	{


        $this->load->library("Pdf");
        
        $data['decleration'] = $this->get->decleration($declerationId);


        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
            
        // Add a page
        $pdf->AddPage();
        $html = $this->load->view('pdf/dentist_copy', $data, true);
        $pdf->writeHTML($html, true, false, true, false, '');
       
        // Add a page
        $pdf->AddPage();
        $html = $this->load->view('pdf/worker_copy', $data, true);
        $pdf->writeHTML($html, true, false, true, false, '');        
       
        // Add a page
        $pdf->AddPage();
        $html = $this->load->view('pdf/survey', $data, true);
        $pdf->writeHTML($html, true, false, true, false, '');        
       
        // Add a page
        $pdf->AddPage();
        $html = $this->load->view('pdf/label', $data, true);
        $pdf->writeHTML($html, true, false, true, false, '');
        

        $pdf->Output();
        

        

	}


}

?>