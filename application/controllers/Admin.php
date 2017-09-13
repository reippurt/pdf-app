<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	function __construct()
	{
		parent::__construct();

		_is_logged();

		$this->load->model('get');
		$this->load->model('handle');
	}

	public function _init()
	{
		$this->output->set_template('default');
	}


	public function dentists($dentistId = false)
	{
		$this->_init();

		$data['dentists'] = $this->get->dentists();
		$view_file = "lists/dentists";		
		if($dentistId){
			$data['dentist'] = $this->get->dentists("dentistId = '".$dentistId."'");
			$view_file = "single-dentist";
		}

		$this->load->view($view_file, $data);
	}


	public function clinics($clinicId = false)
	{
		$this->_init();

		$data['clinics'] = $this->db->get('clinics')->result();
		$view_file = "lists/clinics";		
		if($clinicId){
			$data['clinic'] = $this->get->clinics("clinicId = '".$clinicId."'");
			$view_file = "single-clinic";
		}

		$this->load->view($view_file, $data);

	}


	public function workers()
	{
		$this->_init();

		$data['workers'] = $this->db->get('workers')->result();

		$this->load->view('lists/workers', $data);
	}

	public function set_user()
	{
		$this->_init();
		$this->load->view('forms/set-user');
	}

	

}