<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="<?php echo base_url('user/patient/'.$patient->patientId) ?>"><?php echo $patient->patientName ?></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-patient" aria-controls="navbar-patient" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbar-patient">
		<ul class="navbar-nav">
			
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo base_url('user/patient/'.$patient->patientId) ?>">Oversigt <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo base_url('user/patient/'.$patient->patientId) ?>">Link</a>
			</li>
			
		</ul>
	</div>
</nav>