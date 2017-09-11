<div class="container mt20">
	<div class="col-md-4">
		<form method="post" action="<?php echo base_url('admin/setSignature') ?>">

			<label>Hvem bruger systemet?</label>
			<select name="workerId" class="form-control mb15">
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

			<button class="btn btn-primary">
				Start
			</button>


		</form>
	</div>
</div>