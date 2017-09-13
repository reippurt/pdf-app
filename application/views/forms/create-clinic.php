<form method="post" action="<?php echo base_url('action/createClinic'); ?>">

	<div class="form-group">
		<input type="text" name="name" class="form-control form-control-sm" placeholder="Kliniknavn">
	</div>

	<div class="form-group">
		<div class="row">
			<div class="col-md-8">
				<input type="text" name="street_name" class="form-control form-control-sm" placeholder="Vejnavn">
			</div>
			<div class="col-md-4">
				<input type="text" name="street_number" class="form-control form-control-sm" placeholder="Nr.">
			</div>
		</div>
	</div>
		
	<div class="form-group">
		<div class="row">
			<div class="col-md-7">
				<input type="text" name="city" class="form-control form-control-sm" placeholder="By">
			</div>
			<div class="col-md-5">
				<input type="text" name="zip" class="form-control form-control-sm" placeholder="Postnr.">
			</div>
		</div>
	</div>

	<div class="text-right">
		<button type="submit" class="btn btn-sm btn-primary">Tilføj klinik</button>
	</div>
	
</form>