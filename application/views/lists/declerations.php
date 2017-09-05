<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 pt20 pb20">
			<h1>Arkiv <span class="badge badge-primary"><?php echo count($declerations) ?></span></h1>
		</div>
	</div>
	<div class="row">

		<div class="col-md-12">


			<table class="table table-striped datatable">
				<thead>
					<th>ID</th>
					<th>Oprettet</th>
					<th>Patient</th>
					<th>Tekniker</th>
					<th>Tandlæge</th>
					<th>Nummer</th>
					<th>Levering</th>
					<th>Download</th>
				</thead>
				<tbody>
					<?php if($declerations) { foreach ($declerations as $key => $value) { ?>
						
						<tr>
							<td><?php echo $value->declerationId ?></td>
							<td><?php echo date('d-m-y', $value->declerationPostTimestamp) ?></td>
							<td>
								<p class="mb0"><?php echo $value->name ?></p>
								<p class="mb0 fs12"><?php echo $value->birthday . "-" . $value->ssn ?></p>
							</td>
							<td><?php echo $value->workerName ?></td>
							<td><?php echo $value->dentistName ?></td>
							<td><?php echo $value->number ?></td>
							<td>
								<p class="mb0"><?php echo date('d-m-y', strtotime($value->deliveryDate)) . " kl. " . $value->deliveryTime ?></p>
								<p class="mb0 fs12"><?php echo $value->deliveryTypeName ?></p>
							</td>
							<td>
								<button class="btn btn-sm btn-secondary"><i class="fa fa-download"></i></button>
								<button class="btn btn-sm btn-secondary"><i class="fa fa-share-alt"></i></button>
							</td>
						</tr>

					<?php } } ?>
				</tbody>
			</table>


		</div>
		
	</div>
</div>

