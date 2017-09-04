<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {


	function __construct()
	{
		parent::__construct();
	}

	public function _init()
	{
		$this->output->set_template('default');
	}
	
	public function index()
	{
		$this->_init();
		$this->load->view('main');
	}

	

}
