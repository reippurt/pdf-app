<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Action extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('validate');
		$this->load->model('get');
		$this->load->model('handle');
		$this->load->library('form_validation');
		$this->load->library('auth');

	}


	public function updateDecleration()
	{
		if($this->validate->fields() == false){
			return false;
		}




		$patientId = $this->input->post('patientId');
		$patient_data = array(
			'name' => $this->input->post('patientName'),
			'birthDate' => $this->input->post('birthDate'),
			'ssn' => $this->input->post('ssn'),
		);
		$this->db->where('patientId', $patientId)->update('patients', $patient_data);





		$declerationId = $this->input->post('declerationId');
		$decleration_data = array(
			'workerId' => $this->input->post('workerId'),
			'dentistId' => $this->input->post('dentistId'),
			'type' => $this->input->post('type'),
			'lot' => $this->input->post('lot'),
			'note' => $this->input->post('note'),
			'deliveryTypeId' => $this->input->post('deliveryTypeId'),
			'deliveryDate' => $this->input->post('deliveryDate'),
			'deliveryTime' => $this->input->post('deliveryTime'),
		);
		$this->db->where('declerationId', $declerationId)->update('declerations', $decleration_data);




		// delete all dProducts first
		$this->db->where('declerationId', $declerationId)->delete('dProducts');
		$products = $this->input->post('products');	
		foreach ($products as $key => $value) {
			$this->db->insert('dProducts', array('declerationId' => $declerationId, 'productId' => $value));
		}


		$result = true;

		if($result == true){

			$this->session->set_flashdata('response', array('content'=>'Erklæring opdateret', 'class'=>'success'));

			echo $declerationId;
		}

	}

	public function createNote($target, $value)
	{

		if($this->validate->fields()){

			$signatureId = 0;
			if(get_cookie('workerId') != NULL){
				$signatureId = get_cookie('workerId');
			}


			$note_data = array(
				'postTimestamp' => time(),
				'signatureId' => $signatureId,
				'target' => $target,
				'value' => $value,
				'content' => $this->input->post('content')
			);

			$this->db->insert('notes', $note_data);
		
		}

		_redirect();
	}

	public function deleteRecord()
	{
		$this->handle->deleteRecord();
		_redirect();
	}

	public function switchActive()
	{
		$this->handle->switchActive();
		_redirect();
	}

	public function createDecleration()
	{
		$result = "false";
		$input = $this->input->post();

		if($this->validate->fields())
		{

			$patient_data = array(
				'postTimestamp' => time(),
				'name' => $this->input->post('patientName'),
				'birthdate' => $this->input->post('birthDate'),
				'ssn' => $this->input->post('ssn')
			);

			$patientId = "";
			if($this->db->insert('patients', $patient_data))
			{
				$patientId = $this->db->insert_id();
			}

			
			$decleration_data = array(
				'postTimestamp' => time(),
				'workerId' => $this->input->post('workerId'),
				'dentistId' => $this->input->post('dentistId'),
				'patientId' => $patientId,
				'type' => $this->input->post('type'),
				'lot' => $this->input->post('lot'),
				'note' => $this->input->post('note'),
				'deliveryTypeId' => $this->input->post('deliveryTypeId'),
				'deliveryDate' => $this->input->post('deliveryDate'),
				'deliveryTime' => $this->input->post('deliveryTime'),

			);

			$this->db->insert('declerations', $decleration_data);

			if($this->db->affected_rows() == 1){
				$declerationId = $this->db->insert_id();
			}

			$products = $this->input->post('products');
			
			foreach ($products as $key => $value) {
				$this->db->insert('dProducts', array('declerationId' => $declerationId, 'productId' => $value));
			}
			
		}

		echo $declerationId;
	}

	public function autocomplete($table, $query = false)
	{
		$response = $this->get->likeName($table, urldecode($query));

		echo json_encode($response);
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
