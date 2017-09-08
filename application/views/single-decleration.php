<div class="container mt20">
	<div class="row">
		
		<div class="col-md-3">

			<div class="card">
				<div class="card-header bg-white">
					<p class="mb0">Oprettet <?php echo date('d. M Y', $decleration->declerationPostTimestamp) ?></p>
				</div>
				<div class="card-body">
					
					
					<a target="_blank" href="<?php echo base_url('decleration/makePdf/'.$decleration->declerationId) ?>" class="btn btn-block btn-light">Vis pdf</a>
					<button class="btn btn-block btn-light">Email</button>
				</div>

			</div>

		</div>

		<div class="col-md-5">
			
			<div class="card">
				<div class="card-header bg-white">
					<p class="mb0">Erklæring ID <?php echo $decleration->declerationId; ?></p>
				</div>
				<div class="card-body">
					<style type="text/css">
					.table tr td:last-child{
						text-align: right;
					}
					</style>
					<table class="table table-sm table-striped">
						<tr>
							<td>Tekniker</td>
							<td><?php echo $decleration->workerName; ?></td>
						</tr>
						<tr>
							<td>Tandlæge</td>
							<td><?php echo $decleration->dentistName; ?></td>
						</tr>
						<tr>
							<td>Patient ID</td>
							<td><?php echo $decleration->patientId ?></td>
						</tr>
						<tr>
							<td>Patient</td>
							<td><?php echo $decleration->patientName ?></td>
						</tr>
						<tr>
							<td>CPR</td>
							<td><?php echo $decleration->birthDate . "-" . $decleration->ssn ?></td>
						</tr>

						
						<?php
							$products = $decleration->products;
							if(is_array($products) && count($products) > 0){
							?>

							<tr class="table-secondary">
								<td><strong>Produkter</strong></td>
								<td>I alt <?php echo count($products) ?></td>
							</tr>

							<?php
								foreach ($products as $key => $product) {
							?>
						
							<tr class="table-secondary">
								<td><?php echo $product->name ?></td>
								<td><?php echo $product->lot ?></td>
							</tr>
							
						<?php } } ?>
						<tr>
							<td>Arb. seddel nr.</td>
							<td><?php echo $decleration->lot; ?></td>
						</tr>
						<tr>
							<td>Note</td>
							<td><?php echo $decleration->note; ?></td>
						</tr>

						<tr>
							<td>Levering</td>
							<td><?php echo $decleration->deliveryTypeName; ?></td>
						</tr>

						<tr>
							<td>Dato</td>
							<td><?php echo $decleration->deliveryDate; ?></td>
						</tr>
						<tr>
							<td>Klokke</td>
							<td><?php echo $decleration->deliveryTime; ?></td>
						</tr>


					</table>
									
				</div>	
				<div class="card-footer text-right">
					
					<div style="display:inline-block;">
						
						<?php 

						$trash_button = "Læg i papirkurv";
						if($decleration->active == 0){ 

							$trash_button = "Fjern fra papirkurv";

							?>
							
							<form method="post" action="<?php echo base_url('action/deleteRecord'); ?>">
								<input type="hidden" name="table" value="declerations">
								<input type="hidden" name="column" value="declerationId">
								<input type="hidden" name="row" value="<?php echo $decleration->declerationId ?>">
								<input type="hidden" name="referer" value="<?php echo base_url('document/archive') ?>">
								<button type="submit" class="btn btn-sm btn-danger confirm-form-submit" href="#0">Slet</button>
							</form>

						<?php } ?>

					</div>

					<div style="display:inline-block;">

						<form method="post" action="<?php echo base_url('action/switchActive'); ?>">
							<input type="hidden" name="table" value="declerations">
							<input type="hidden" name="column" value="declerationId">
							<input type="hidden" name="row" value="<?php echo $decleration->declerationId ?>">
							<input type="hidden" name="referer" value="<?php echo current_url() ?>">
							<button type="submit" class="btn btn-sm btn-secondary confirm-form-submit" href="#0"><?php echo $trash_button ?></button>
						</form>
					
					</div>

					<a class="btn btn-sm btn-warning" href="<?php echo base_url('decleration/edit/'.$decleration->declerationId); ?>">Redigér</a>

				</div>	
			</div>		

		</div>

		<div class="col-md-4">

			<div class="card">
				<p class="card-header bg-transparent">Noter</p>
				<div class="card-body">
					<?php $data['note'] = array('target' => 'decleration', 'value'=>$decleration->declerationId); $this->load->view('forms/create-note', $data); ?>
			
					<br>

					<?php $data['notes'] = $this->get->notes('decleration', $decleration->declerationId); $this->load->view('lists/notes', $data) ?>
				</div>
			</div>
		</div>
		
	</div>
</div>