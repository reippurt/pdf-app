<div class="container mt20">

	<div class="row">

		<div class="col-m-4">
			<div class="card">
				<div class="card-header bg-white lh1">Patient</div>
				<div class="card-body">
					<p><?php echo $patient->patientName ?></p>
					<p><?php echo $patient->birthDate . "-" . $patient->ssn; ?></p>
					<p>Oprettet <?php echo date('d/m/Y', $patient->postTimestamp); ?></p>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<?php $this->load->view('lists/patient-declerations'); ?>
		</div>

		<div class="col-md-3"></div>

	</div>

</div>