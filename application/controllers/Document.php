<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends CI_Controller {


	function __construct()
	{
		parent::__construct();

		_is_logged();

		$this->load->model('get');
	}

	public function _init()
	{
		$this->output->set_template('default');
	}
	
	public function create()
	{
		$this->_init();
		$this->load->view('forms/create-decleration');
	}

	public function archive()
	{
		$this->_init();

		$data['declerations'] = $this->get->declerations();

		$this->load->view('lists/declerations', $data);
	}

}
