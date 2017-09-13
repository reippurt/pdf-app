<form method="post" id="form-set-signature">
	
	<select name="workerId" class="form-control mb15">
	
	<?php if(get_cookie('workerId') != null && get_cookie('signature_name') != null) { ?>
		<option value="<?php echo get_cookie('workerId') ?>"><?php echo get_cookie('signature_name') ?></option>
	<?php } ?>


	<?php
	foreach ($this->db->get('workers')->result() as $key => $value) {
	?>
		<option value="<?php echo $value->workerId ?>">
			<?php echo $value->name ?>
		</option>
	<?php
	}
	?>
	</select>

	<button class="btn btn-primary set-signature">
		Start
	</button>

</form>