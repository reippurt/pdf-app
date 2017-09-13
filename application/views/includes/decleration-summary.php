<div class="card mb20">
	<div class="card-header bg-white">
		<p class="mb0 lh1">
			<a href="<?php echo base_url('user/patient/'.$decleration->patientId."/decleration/".$decleration->declerationId) ?>">Erklæring ID <?php echo $decleration->declerationId; ?></a>
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
				<td><a href="<?php echo base_url('admin/dentists/'.$decleration->dentistId); ?>"><?php echo $decleration->dentistName; ?></a></td>
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
	
				<tr>
					<td class="fs12">Oprettet</td>
					<td class="fs12 text-muted"><?php echo date('d. M Y', $decleration->declerationPostTimestamp) ?> kl. <?php echo date('G:i', $decleration->declerationPostTimestamp) ?></td>
				</tr>			

		</table>
						
	</div>	
	<div class="card-footer text-right">
	
			

	</div>	
</div>		