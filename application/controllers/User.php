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
	

	public function patient($patientId)
	{
		$this->_init();

		

		$data['patient'] = $this->get->patient($patientId);

		$filter = "p.patientId = '".$patientId."'";
		$data['declerations'] = $this->get->declerations($filter);

		$this->load->view('single-patient', $data);

	}

}
