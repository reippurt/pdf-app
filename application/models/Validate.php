<?php
	
Class Validate extends CI_Model
{
	public function fields($rules = false)
	{

		$result = false;

		foreach ($this->input->post() as $key => $value) {
	
			$current_rules = "trim";

			if($rules && array_key_exists($key, $rules))
			{
				$current_rules .= "|" . $rules[$key];
			}

			$this->form_validation->set_rules($key, $key, $current_rules);
	

		}

		if($this->form_validation->run() == true)
		{
			$result = true;
		}
		else
		{
			$this->session->set_flashdata('response', array('content'=>validation_errors()));
		}

		return $result;

	}
}

?>