<div class="container mt20">
	<div class="row mb20">
		<div class="col-md-6">
			<h3 class="mb20"><i class="fa fa-hospital-o"></i> <?php echo $clinic->clinicName ?></h3>
		</div>
		
		<div class="col-md-6 text-right">
			
			<?php 
			$btn_trash_text = "Papirkurv";
			
			if($clinic->active == 0){
				$btn_trash_text = "Fjern";

			?>
			<div class="mb20 inline-block">
				
				<form method="post" action="<?php echo base_url('action/deleteRecord') ?>">
					<input type="hidden" name="table" value="clinics">
					<input type="hidden" name="column" value="clinicId">
					<input type="hidden" name="row" value="<?php echo $clinic->clinicId ?>">
					<input type="hidden" name="referer" value="<?php echo base_url('admin/clinics') ?>">
					<button type="submit" class="btn btn-sm btn-danger">Slet</button>
				</form>
			</div>
		

			<?php } ?>

			<div class="mb20 inline-block">
				<form method="post" action="<?php echo base_url('action/switchActive') ?>">
					<input type="hidden" name="table" value="clinics">
					<input type="hidden" name="column" value="clinicId">
					<input type="hidden" name="row" value="<?php echo $clinic->clinicId ?>">
					<input type="hidden" name="referer" value="<?php echo current_url() ?>">
					<button type="submit" class="btn btn-sm btn-light"><?php echo $btn_trash_text ?> <i class="fa fa-trash"></i></button>
				</form>
			</div>
		</div>
	</div>
	<div class="row">

		<div class="col-md-4">

			

			<form method="post" action="<?php echo base_url('action/updateClinic/'.$clinic->clinicId); ?>">
				<div class="card">
					<div class="card-body card-body-clinic">
							
							<style type="text/css">
							input{
								margin-bottom: 10px;
							}
							.card-body-clinic p{
								font-size: 10px;
								color:grey;
								line-height: 1;
								margin-bottom: 0px;
							}
							</style>

							<p>Navn på klinik</p>
							<input type="text" name="name" class="form-control form-control-sm" value="<?php echo $clinic->name ?>">
							<p>Vejnavn</p>
							<input type="text" name="street_name" class="form-control form-control-sm" value="<?php echo $clinic->street_name ?>">
							<p>Nummer på bolig</p>
							<input type="text" name="street_number" class="form-control form-control-sm" value="<?php echo $clinic->street_number ?>">
							<p>Postnummer</p>	
							<input type="text" name="zip" class="form-control form-control-sm" value="<?php echo $clinic->zip ?>">
							<p>By</p>
							<input type="text" name="city" class="form-control form-control-sm" value="<?php echo $clinic->city ?>">
							
						
					</div>
					
					<div class="card-footer text-right">
						<button type="submit" class="btn btn-primary btn-sm">Gem ændringer</button>
					</div>

				</div>
			</form>

		</div>

		<div class="col-md-4">

			<div class="card">
				<div class="card-header">Tandlæger</div>
				<div class="card-body">
					<?php foreach ($this->db->get_where('dentists', array('clinicId'=>$clinic->clinicId))->result() as $key => $value) { ?>
				
						<div><a href="<?php echo base_url('admin/dentists/'.$value->dentistId); ?>"><?php echo $value->name ?></a></div>

					<?php } ?>
				</div>
			</div>
		</div>

		<div class="col-md-4">

			<div class="card card-sm">
				<p class="card-header bg-transparent lh1">Noter</p>
				<div class="card-body">
					<?php $data['note'] = array('target' => 'clinic', 'value'=>$clinic->clinicId); $this->load->view('forms/create-note', $data); ?>
			
					<br>

					<?php $data['notes'] = $this->get->notes('clinic', $clinic->clinicId); $this->load->view('lists/notes', $data) ?>
				</div>
			</div>

		</div>


	</div>


</div>