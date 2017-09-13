<form method="post" action="<?php echo base_url('action/createDentist'); ?>">
	
	<div class="form-group">	
		<input type="text" name="name" placeholder="Tandlægens navn" class="form-control form-control-sm">
	</div>
	
	<div class="form-group">	
		<select name="clinicId" class="form-control form-control-sm">
						
			<?php foreach ($this->get->clinics() as $key => $value) {
			?>
			<option value="<?php echo $value->clinicId ?>"><?php echo $value->name ?></option>
			<?php
			} ?>
							
		</select>
	</div>
	<div class="text-right">

		<button type="submit" class="btn btn-sm btn-primary">Tilføj tandlæge</button>

	</div>
	

	

</form>