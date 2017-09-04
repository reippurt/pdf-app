<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Action extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('validate');
		$this->load->library('form_validation');
		$this->load->library('auth');

	}

	public function login()
	{

		$rules = array('loginEmail'=>'required', 'loginPassword'=>'required');

		if($this->validate->fields($rules))
		{
		
			$auth_credentials = $this->auth->credentials($this->input->post('loginEmail'), $this->input->post('loginPassword'));
			
			if($auth_credentials)
			{
				$this->auth->startSession($auth_credentials);				
			}
		
		}

		_redirect();
	}


	public function logout()
	{
		$this->auth->logout();

		_redirect();
	}

}
