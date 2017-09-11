<div class="container mt20">
	<div class="row">
		
		<div class="col-md-3">
			
			<div class="card mb20">
				
				<div class="card-body">
					
						<?php 

						$trash_button = "Papirkurv ";
?>
<?php

						if($decleration->active == 0){ 

							$trash_button = "Fjern ";

							?>
							
							<form method="post" action="<?php echo base_url('action/deleteRecord'); ?>">
								<input type="hidden" name="table" value="declerations">
								<input type="hidden" name="column" value="declerationId">
								<input type="hidden" name="row" value="<?php echo $decleration->declerationId ?>">
								<input type="hidden" name="referer" value="<?php echo base_url('document/archive') ?>">
								<button type="submit" class="btn btn-sm btn-block btn-danger confirm-form-submit mb10 text-left" href="#0">Slet</button>
							</form>

						<?php } ?>
					
					<a target="_blank" href="<?php echo base_url('decleration/makePdf/'.$decleration->declerationId) ?>" class="btn btn-sm btn-block btn-light text-left">Vis pdf</a>
					
					<button class="btn btn-sm btn-block btn-light text-left">Email</button>
				
					<form method="post" action="<?php echo base_url('action/switchActive'); ?>">
						<input type="hidden" name="table" value="declerations">
						<input type="hidden" name="column" value="declerationId">
						<input type="hidden" name="row" value="<?php echo $decleration->declerationId ?>">
						<input type="hidden" name="referer" value="<?php echo current_url() ?>">
						<button type="submit" class="btn btn-sm btn-light btn-block confirm-form-submit mt10 text-left" href="#0"><?php echo $trash_button ?> <i class='fa fa-trash'></i></button>
					</form>
										


				</div>

			</div>

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

			

		</div>

		<div class="col-md-5">
			
			<div class="card">
				<div class="card-header bg-white">
					<p class="mb0 lh1">Erklæring ID <?php echo $decleration->declerationId; ?>
						
					</p>
				</div>
				<div class="card-body">
					<style type="text/css">
					.dec-table.table tr td:last-child{
						text-align: right;
					}
					</style>
					<table class="table table-sm table-striped dec-table mb0">
						<tr>
							<td>Tekniker</td>
							<td><?php echo $decleration->workerName; ?></td>
						</tr>
						<tr>
							<td>Tandlæge</td>
							<td><?php echo $decleration->dentistName; ?></td>
						</tr>
						
						<tr>
							<td>Patient</td>
							<td><a href="<?php echo base_url('user/patient/'.$decleration->patientId) ?>"><?php echo $decleration->patientName ?></a></td>
						</tr>
						<tr>
							<td>CPR</td>
							<td><?php echo $decleration->birthDate . "-" . $decleration->ssn ?></td>
						</tr>
						<tr>
							<td>Arb. seddel nr.</td>
							<td><?php echo $decleration->lot; ?></td>
						</tr>
						<tr>
							<td>Note</td>
							<td><?php echo $decleration->note; ?></td>
						</tr>

						
						<?php
							$products = $decleration->products;
							if(is_array($products) && count($products) > 0){
							?>

							<tr class="table-secondary">
								<td><strong>Produkter</strong></td>
								<td></td>
							</tr>

							<?php
								foreach ($products as $key => $product) {
							?>
						
							<tr class="table-secondary">
								<td><?php echo $product->name ?></td>
								<td><?php echo $product->lot ?></td>
							</tr>
							
						<?php } } ?>
						

					</table>
									
				</div>	
				<div class="card-footer text-right">
					
						<span class="text-muted float-left"><?php echo date('d. M Y', $decleration->declerationPostTimestamp) ?> kl. <?php echo date('G:i', $decleration->declerationPostTimestamp) ?></span>
					
				
					<a class="btn btn-sm btn-warning" href="<?php echo base_url('decleration/edit/'.$decleration->declerationId); ?>">Redigér</a>

				</div>	
			</div>		

		</div>

		<div class="col-md-4">
						


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