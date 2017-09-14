<div class="container mt20">
	
	<div class="row">
		<div class="col-md-12">
			<h4 class="mb20">Oversigt</h4>
		</div>
		<!--
		<div class="col-md-9">
			<ul class="nav nav-pills">
				<li class="nav-item">
					<a class="nav-link active" href="#">Active</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#">Disabled</a>
				</li>
			</ul>
		</div>
	-->
	</div>	
	
	<div class="row">

		<div class="col-md-3">
			<div class="card card-sm">
				<div class="card-header bg-white lh1"><i class="fa fa-user-o"></i> Patient ID <?php echo $patient->patientId ?></div>
				<div class="card-body">
					<p class="mb0"><?php echo $patient->patientName ?></p>
					<p class="mb0"><?php echo $patient->birthDate . "-" . $patient->ssn; ?></p>
					<p class="mb0">Oprettet <?php echo date('d/m/Y', $patient->postTimestamp); ?></p>
				</div>
			</div>
		</div>
		<div class="col-md-5">

			<?php
			
			if($declerations){
			
			$count_declerations = count($declerations);		
			

			if($count_declerations == 1)
			{
				$declerations = array($declerations);
			}
	
			foreach ($declerations as $key => $value) { 

				$data['decleration'] = $value;
			
			?>

				<?php $this->load->view('includes/decleration-summary', $data); ?>
			
			<?php } 
		}
			?>			

		</div>

		<div class="col-md-4">
			<div class="card card-sm">
				<p class="card-header bg-transparent lh1">Noter</p>
				<div class="card-body">
					<?php $data['note'] = array('target' => 'patient', 'value'=>$patient->patientId); $this->load->view('forms/create-note', $data); ?>
			
					<br>

					<?php $data['notes'] = $this->get->notes('patient', $patient->patientId); $this->load->view('lists/notes', $data) ?>
				</div>
			</div>
		</div>

	</div>

</div>

