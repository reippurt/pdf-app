<div class="container mt20">
	
	<div class="row mb20">
		<div class="col-md-6">
			<h3 class="mb5"><i class="fa fa-user-md"></i> <?php echo $dentist->dentistName ?></h3>
			<p class="fs13"><a href="<?php echo base_url('admin/clinics/'.$dentist->clinicId) ?>"><i class="fa fa-hospital-o"></i> <?php echo $dentist->clinicName ?></a></p>
		</div>
		<div class="col-md-6 text-right">
		
			<?php 
			$btn_trash_text = "Papirkurv";
			
			if($dentist->active == 0){
				$btn_trash_text = "Fjern";

			?>
				
				<div class="mb20 inline-block">
					
					<form method="post" action="<?php echo base_url('action/deleteRecord') ?>">
						<input type="hidden" name="table" value="dentists">
						<input type="hidden" name="column" value="dentistId">
						<input type="hidden" name="row" value="<?php echo $dentist->dentistId ?>">
						<input type="hidden" name="referer" value="<?php echo base_url('admin/dentists') ?>">
						<button type="submit" class="btn btn-sm btn-danger">Slet</button>
					</form>
				</div>

			<?php } ?>

			<div class="mb20 inline-block">
				<form method="post" action="<?php echo base_url('action/switchActive') ?>">
					<input type="hidden" name="table" value="dentists">
					<input type="hidden" name="column" value="dentistId">
					<input type="hidden" name="row" value="<?php echo $dentist->dentistId ?>">
					<input type="hidden" name="referer" value="<?php echo current_url() ?>">
					<button type="submit" class="btn btn-sm btn-light"><?php echo $btn_trash_text ?> <i class="fa fa-trash"></i></button>
				</form>
			</div>
	


		</div>

	</div>
	
	


	

	<div class="row">

		<div class="col-md-4">

			

			<form method="post" action="<?php echo base_url('action/updateDentist/'.$dentist->dentistId); ?>">
				<div class="card">
					<div class="card-body card-body-dentist">
							
							<style type="text/css">
							input{
								margin-bottom: 10px;
							}
							.card-body-dentist p{
								font-size: 10px;
								color:grey;
								line-height: 1;
								margin-bottom: 0px;
							}
							</style>

							<p>Tandlæge</p>
							<input type="text" name="name" class="form-control form-control-sm" value="<?php echo $dentist->dentistName ?>">
							<p>Klinik</p>
							<select name="clinicId" class="form-control">
								<option value="<?php echo $dentist->clinicId ?>"><?php echo $dentist->clinicName ?></option>
								<?php foreach ($this->get->clinics() as $key => $value) {
								?>
								<option value="<?php echo $value->clinicId ?>"><?php echo $value->name ?></option>
								<?php
								} ?>
							</select>
						
					</div>
					
					<div class="card-footer text-right">
						
						<button type="submit" class="btn btn-primary btn-sm">Gem ændringer</button>
					</div>

				</div>
			</form>

		</div>

		<div class="col-md-4">

			
		</div>

		<div class="col-md-4">

			<div class="card card-sm">
				<p class="card-header bg-transparent lh1">Noter</p>
				<div class="card-body">
					<?php $data['note'] = array('target' => 'dentist', 'value'=>$dentist->dentistId); $this->load->view('forms/create-note', $data); ?>
			
					<br>

					<?php $data['notes'] = $this->get->notes('dentist', $dentist->dentistId); $this->load->view('lists/notes', $data) ?>
				</div>
			</div>

		</div>


	</div>


</div>