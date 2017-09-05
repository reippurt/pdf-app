<?php
Class Get extends CI_Model{

	public function workers($params = false)
	{

		$result = false;

		$query = $this->db->select('*')
						  ->from('workers');


		if(is_string($params))
		{
			$query = $this->db->like('name', $params);
		}

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$result = $query->result();
		}

		return $result;

	}

	public function patients($params = false)
	{

		$result = false;

		$query = $this->db->select('*')
						  ->from('patients');


		if(is_string($params))
		{
			$query = $this->db->like('name', $params);
		}

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$result = $query->result();
		}

		return $result;

	}

	public function dentists($params = false)
	{

		$result = false;

		$query = $this->db->select('*')
						  ->from('dentists');


		if(is_string($params))
		{
			$query = $this->db->like('name', $params);
		}

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$result = $query->result();
		}

		return $result;

	}

	public function declerations()
	{
		$result = false;

		$query = $this->db->select('
									d.declerationId,
									d.postTimestamp as declerationPostTimestamp,
									d.number as number,
									d.deliveryDate,
									d.deliveryTime,
									p.name as name,
									p.birthday,
									p.ssn,
									w.name as workerName,
									dt.name as dentistName,
									dlt.name as deliveryTypeName
									')
						  ->from('declerations d')
						  ->join('patients p', 'p.patientId = d.patientId', 'left')
						  ->join('workers w', 'w.workerId = d.workerId', 'left')
						  ->join('dentists dt', 'd.dentistId = dt.dentistId', 'left')
						  ->join('deliveryTypes as dlt', 'dlt.deliveryTypeId = d.deliveryTypeId')
						  ->get();

		if($query->num_rows() > 0)
		{
			$result = $query->result();
			


		}
	
		return $result;
	}

}

?>