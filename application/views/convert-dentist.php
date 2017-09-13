<div class="container mt20">

	<h5>Konverter database over tandlæger:</h5>
	<p>Afsæt tandlæger i gammel database til 2 tabeller: klinikker og tandlæger</p>

	<form method="post" action="<?php current_url() ?>">

		<input type="submit" name="convert-dentist" value="Konvertér nu" class="confirm-form-submit btn btn-warning">

	</form>

	<?php
	if($this->input->post('convert-dentist')){
		

		$uniq_clinics = array();
		foreach ($dentist as $key => $value) {
		
			if($value->clinic_name == ""){

				$new_clinic_name = "Klinik v. " . $value->dentist_name;

				$this->db->where('dentist_id', $value->dentist_id)->update('dentist', array('clinic_name'=>$new_clinic_name));

			}

			if(!in_array($value->clinic_name, $uniq_clinics)){
				$uniq_clinics[] = $value->clinic_name;
			}

		?>



		<?php
		}
		?>
			<h2><?php echo count($uniq_clinics); ?> Unikke klinikker</h2>

			<?php foreach ($uniq_clinics as $key => $value) {
			

				$query = $this->db->get_where('clinics', array('name', $value));

				if($query->num_rows() == 0)
				{

					$clinic = $this->db->select('*')->from('dentist')->where('clinic_name', $value)->limit(1)->get()->row();

					$clinic_data = array(
						
						'name' => $clinic->clinic_name,
						'street_name' => $clinic->clinic_address,
						'city' => $clinic->clinic_city,
						'zip' => $clinic->clinic_zip,

					);

					$this->db->insert('clinics', $clinic_data);

					echo $value . " sat ind";
					echo "<br>";
				}
				

			} ?>
			





	<?php
	}
	?>



	<?php 
			$dentists = $this->db->get('dentists')->result();
			
			foreach ($dentists as $key => $value) {

				// search DB for table dentist - get the name of the dentist
				$dentist_row = $this->db->get_where('dentist', array('dentist_name' => $value->name));

				if($dentist_row->num_rows() == 1){
					
					$clinic_name = $dentist_row->row()->clinic_name;
					
				}

				
				$clinic_row = $this->db->get_where('clinics', array('name' => $clinic_name))->row();

				$this->db->where('name', $value->name)->update('dentists', array('clinicId' => $clinic_row->clinicId));


			} ?>



</div>