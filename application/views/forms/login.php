<form method="post" action="<?php echo base_url('action/login') ?>">

	<div class="form-group">
		<input type="email" class="form-control" name="loginEmail" placeholder="Email">
	</div>

	<div class="form-group">
		<input type="password" class="form-control" name="loginPassword" placeholder="Adgangskode">
	</div>
	
	<div class="form-group text-right">
		<button type="submit" class="btn btn-secondary">Log ind</button>
	</div>
</form>