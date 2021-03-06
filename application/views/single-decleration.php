<div class="container mt20">
		
	<div class="row">
		<div class="col-md-3">
			<h4 class="mb20">Erklæring [ID:<?php echo $decleration->declerationId; ?>]</h4>
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
			

			<?php if($approved_declerations){ ?>
	
				<div class="card card-sm mb20">
					<div class="card-header bg-success text-white">

						<p class="mb0 lh1">Godkendte erklæringer</p>

					</div>
					<div class="card-body">

						<table class="table table-sm">
							

							<?php foreach ($approved_declerations as $key => $value) { ?>
							
							<tr>
								<td class="fs12">
									<?php echo date('d/m/y', $value->postTimestamp); ?>
									<br>
									<span class="fs10 text-muted lh1"><?php echo $value->name ?></span>
								</td>
								<td class="fs12 text-right"><a target="_blank" href="<?php echo base_url('assets/declerations/'.$value->fileName) ?>">Download</a></td>
							</tr>
								
								


							<?php } ?>
						</table>

					</div>

				</div>					


			<?php } ?>

			<div class="card mb20">

				<div class="card-body">
					
					<form method="post" action="<?php echo base_url('action/approveDecleration'); ?>">

						<input type="hidden" name="declerationId" value="<?php echo $decleration->declerationId ?>">
						<button class="btn btn-block btn-warning mb30">Godkend PDF</button>
						
					</form>
					
					<a target="_blank" href="<?php echo base_url('decleration/makePdf/'.$decleration->declerationId) ?>" class="btn btn-sm btn-block btn-light text-left">PDF visning</a>
					
					<a  class="btn btn-sm btn-block btn-light text-left" href="<?php echo base_url('user/patient/'.$decleration->patientId.'/decleration/'.$decleration->declerationId."/update"); ?>">Redigér</a>
					
					<a class="btn btn-sm btn-block btn-light text-left mb10">Email
						<span class="float-right text-muted">Ikke implementeret</span>
					</a>
					
					<?php

						$trash_button = "Papirkurv";
						if($decleration->active == 0){ 

							$trash_button = "Fjern ";

						}

					?>
				
					<form method="post" action="<?php echo base_url('action/switchActive'); ?>">
						<input type="hidden" name="table" value="declerations">
						<input type="hidden" name="column" value="declerationId">
						<input type="hidden" name="row" value="<?php echo $decleration->declerationId ?>">
						<input type="hidden" name="referer" value="<?php echo current_url() ?>">
						<button type="submit" class="btn btn-sm btn-light btn-block confirm-form-submit text-left" href="#0"><?php echo $trash_button ?> <i class='fa fa-trash'></i></button>
					</form>
					


					<?php

						if($decleration->active == 0){ 

							

							?>
							<div class="mb10"></div>
							<form method="post" action="<?php echo base_url('action/deleteRecord'); ?>">
								<input type="hidden" name="table" value="declerations">
								<input type="hidden" name="column" value="declerationId">
								<input type="hidden" name="row" value="<?php echo $decleration->declerationId ?>">
								<input type="hidden" name="referer" value="<?php echo base_url('document/archive') ?>">
								<button type="submit" class="btn btn-sm btn-block btn-danger confirm-form-submit mb10 text-left" href="#0">Slet</button>
							</form>

					<?php } ?>		


				</div>

			</div>

	

			

		</div>

		<div class="col-md-5">
			
			<?php $this->load->view('includes/decleration-summary'); ?>
		
		</div>

		<div class="col-md-4">
			
			<div class="card card-sm  mb20">

				<div class="card-header bg-white">
					<p class="mb0 lh1">Levering</p>
				</div>
				<div class="card-body">
					<table class="table table-sm table-striped mb0 dec-table table-delivery">
						<tr>
							<td>Type</td>
							<td><?php echo $decleration->deliveryTypeName ?></td>
						</tr>
						<tr>
							<td>Dato </td>
							<td><?php echo date('d. M Y', strtotime($decleration->deliveryDate)); ?></td>
						</tr>
						<tr>
							<td>Tidspunkt </td>
							<td><?php echo $decleration->deliveryTime; ?></td>
						</tr>
					</table>
				</div>

			</div>		


			<div class="card card-sm">
				<p class="card-header bg-transparent lh1">Noter</p>
				<div class="card-body">
					<?php $data['note'] = array('target' => 'decleration', 'value'=>$decleration->declerationId); $this->load->view('forms/create-note', $data); ?>
			
					<br>

					<?php $data['notes'] = $this->get->notes('decleration', $decleration->declerationId); $this->load->view('lists/notes', $data) ?>
				</div>
			</div>
		</div>
		
	</div>
</div>