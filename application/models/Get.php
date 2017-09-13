<?php
Class Get extends CI_Model{

	public function dentists($params = false)
	{
		$result = false;

		$query = $this->db->select('*, dentists.active as active, dentists.name as dentistName, clinics.name as clinicName')
						  ->from('dentists')
						  ->join('clinics', 'clinics.clinicId = dentists.clinicId', 'left');
		
		if($params)				  
		{
			$query = $this->db->where($params);
		}

		$query = $this->db->get();
		
		$row_count = $query->num_rows();

		if($row_count == 1)
		{
			$result = $query->row();
		}
		else if($row_count > 1)
		{
			$result = $query->result();
		}

		return $result;
	}

	public function clinics($params = false)
	{
		$result = false;

		$query = $this->db->select('*, c.name as clinicName')
						  ->from('clinics c');
		
		if($params)				  
		{
			$query = $this->db->where($params);
		}

		$query = $this->db->get();
		
		$row_count = $query->num_rows();

		if($row_count == 1)
		{
			$result = $query->row();
		}
		else if($row_count > 1)
		{
			$result = $query->result();
		}

		return $result;
	}




	public function patient($patientId)
	{
		$result = false;

		$query = $this->db->select('p.patientId as patientId,
									p.name as patientName,
									p.birthDate, 
									p.ssn,
									p.postTimestamp
								')
						  ->from('patients p')
						  ->where('patientId', $patientId)
						  ->get();

		if($query->num_rows() == 1)
		{
			$result = $query->row();
		}

		return $result;
	}

	public function decleration($declerationId)
	{
		$result = false;

		$query = $this->db->select('
									declerations.active as active,
									declerations.type as type,
									declerations.declerationId as declerationId,
									declerations.postDate as declerationPostDate,
									declerations.postTimestamp as declerationPostTimestamp,
									declerations.lot,
									declerations.note,
									declerations.deliveryTime,
									declerations.type as type,
									declerations.deliveryTypeId,
									dt.name as deliveryTypeName,
									d.dentistId as dentistId,
									d.name as dentistName,
									c.name as clinicName,
									declerations.deliveryDate,
									c.street_name,
									c.street_number,
									p.patientId as patientId,
									p.name as patientName,
									p.birthDate,
									p.ssn,
									w.workerId as workerId,
									w.name as workerName
								')
						  ->from('declerations')
						  ->join('deliveryTypes dt', 'dt.deliveryTypeId = declerations.deliveryTypeId', 'left')
						  ->join('dentists d', 'd.dentistId = declerations.dentistId', 'left')
						  ->join('patients p', 'p.patientId = declerations.patientId', 'left')
						  ->join('clinics c', 'c.clinicId = d.clinicId', 'left')
						  ->join('workers w', 'w.workerId = declerations.workerId', 'left')
						  ->where('declerationId', $declerationId)
						  ->get();

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

		$query = $this->db->select('*, workers.name as workerName, notes.postTimestamp as postTimestamp')
						  ->from('notes')
						  ->join('workers', 'workers.workerId = notes.signatureId', 'left')
						  ->where('target', $target)
						  ->where('value', $value)
						  ->order_by('notes.postTimestamp', 'desc')
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
									dt.dentistId as dentistId,
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