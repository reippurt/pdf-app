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

	public function set_user()
	{
		$this->_init();
		$this->load->view('forms/set-user');
	}

	public function setSignature()
	{

		$worker = $this->db->get_where('workers', array('workerId' => $this->input->post('workerId') ) )->row();

		$signature_cookie = array(
			'name'   => 'signature_name',
			'value'  => $worker->name,                            
			'expire' => '600',                           
		);
		
		$this->input->set_cookie($signature_cookie);

		$workerId_cookie = array(
			'name'   => 'workerId',
			'value'  => $worker->workerId,                            
			'expire' => '600',                           
		);

		$this->input->set_cookie($workerId_cookie);

		_redirect();
	}

}