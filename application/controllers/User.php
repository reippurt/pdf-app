<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


	function __construct()
	{
		parent::__construct();

		_is_logged();

		$this->load->model('get');
		$this->load->model('handle');

		if(!$this->session->userdata('logged_in')){ redirect('/'); }
	}

	public function _init()
	{
		$this->output->set_template('default');
	}
	

	public function patient($patientId, $view_file = false, $value = false, $edit = false)
	{
		$this->_init();

		$data['patient'] = $this->get->patient($patientId);

		if($value){
			$data[$view_file] = $this->get->$view_file($value);
		}
		
		if(!$view_file){
			
			$view = "single-patient";
			
			$filter = "p.patientId = '".$patientId."'";
			$data['declerations'] = $this->get->declerations($filter);




		}
		else if($view_file && $value && !$edit)
		{
			$view = "single-" . $view_file;
			$data['approved_declerations'] = $this->get->approvedDeclerations($value);
		}
		else
		{
			$view = "forms/update-decleration";
		}
		
		$this->load->view('template/navbar-patient', $data);
		$this->load->view($view, $data);

	}

}
