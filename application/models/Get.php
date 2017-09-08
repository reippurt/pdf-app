<?php
Class Get extends CI_Model{

	public function decleration($declerationId)
	{
		$result = false;

		$query = $this->db->get_where('declerations', array('declerationId' => $declerationId));

		if($query->num_rows() == 1)
		{
			$result = $query->row();
			$result = $this->handle->attachProducts($result);
		}

		return $result;
	}

	public function notes($target, $value)
	{
		$result = false;

		$query = $this->db->select('*')
						  ->from('notes')
						  ->where('target', $target)
						  ->where('value', $value)
						  ->order_by('postTimestamp', 'desc')
						  ->get();
		if($query->num_rows() > 0)
		{
			$result = $query->result();
		}

		return $result;

	}

	public function likeName($table, $query)
	{
		$result = false;

		$query = $this->db->select('*')
						  ->from($table)
						  ->where('active', 1)
						  ->like('name', $query)
						  ->order_by("name", "asc")
						  ->get();

		if($query->num_rows() > 0)
		{
			$result = $query->result();
		}
		return $result;
	}

	public function declerations($filter = false)
	{
		$result = false;

		$query = $this->db->select('
									d.active as active,
									d.note as note,
									d.declerationId,
									d.postTimestamp as declerationPostTimestamp,
									d.lot as lot,
									d.deliveryDate,
									d.deliveryTime,
									p.patientId as patientId,
									p.name as patientName,
									p.birthDate,
									p.ssn,
									w.name as workerName,
									dt.name as dentistName,
									dlt.name as deliveryTypeName
									')
						  ->from('declerations d')
						  ->join('patients p', 'p.patientId = d.patientId', 'left')
						  ->join('workers w', 'w.workerId = d.workerId', 'left')
						  ->join('dentists dt', 'd.dentistId = dt.dentistId', 'left')
						  ->join('deliveryTypes as dlt', 'dlt.deliveryTypeId = d.deliveryTypeId', 'left');
		
		if(($filter))
		{
			$query = $this->db->where($filter);
		}

		$query = $this->db->get();

		$count = $query->num_rows();
		
		if($count == 1)
		{
			$result = $query->row();
		} 
		else if($count > 1)
		{
			$result = $query->result();
		}
	
		$result = $this->handle->attachProducts($result);

		return $result;
	}


	public function dProducts($declerationId)
	{
		$result = false;

		$query = $this->db->select('*')
						  ->from('dProducts')
						  ->join('products', 'products.productId = dProducts.productId', 'left')
						  ->where('declerationId', $declerationId)
						  ->get();

		if($query->num_rows() > 0)
		{
			$result = $query->result();
		}

		return $result;

	}




}

?>