<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Handle extends CI_Model{
	
	public function attachProducts($declerations)
	{	
		// Objective: Take an object as input, loop through attaching all possible dProducts
		$result = array();

		if(count($declerations) == 1){
			
			$tmp = (array)$declerations;
			
			$tmp['products'] = $this->get->dProducts($declerations->declerationId);

			$result = (object)$tmp;
		}
		else
		{
			
			foreach ($declerations as $key => $value) {
				
				$tmp = (array)$value;
				
				$tmp['products'] = $this->get->dProducts($value->declerationId);
				
				$result[] = (object)$tmp;	
			}
	
		}

		return $result;
	}


	public function deleteRecord()
	{
		$result = false;

		$table = $this->input->post('table');
		$column = $this->input->post('column');
		$row = $this->input->post('row');
	
		$this->db->where($column, $row)->delete($table);

		if($this->db->affected_rows() == 1)
		{
			$result = true;
		}

		if($result == true)
		{
			$response = array('content' => 'Emnet er blevet slettet', 'class' => 'success');
		}
		else
		{
			$response['content'] = "Emnet kunne ikke slettes";
		}

		$this->session->set_flashdata('response', $response);

		return $result;

	}

	public function switchActive()
	{
		$result = false;

		$table = $this->input->post('table');
		$column = $this->input->post('column');
		$row = $this->input->post('row');

		$active = $this->db->get_where($table, array($column => $row))->row()->active;

		if($active == 1){
			$active = 0;
		} else {
			$active = 1;
		}

		$this->db->where($column, $row)->update($table, array('active' => $active));

		if($this->db->affected_rows() == 1)
		{
			$result = true;
		}


		if($result == true)
		{
			$response = array('content' => 'Handling var en success', 'class' => 'success');
		}
		else
		{
			$response['content'] = "Emnet kunne ikke gøres inaktivt";
		}

		$this->session->set_flashdata('response', $response);

		return $result;

	}

}