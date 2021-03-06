<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 pt20 pb20">
			<h3>Arkiv <span class="badge badge-secondary"><?php echo count($declerations) ?></span></h3>
		</div>
	</div>
	<div class="row">

		<div class="col-md-12 bg-white pt20 pb20">


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
						
						<tr class="active-<?php echo $value->active ?>">
							<td>
								<a class="btn btn-sm" href="<?php echo base_url('user/patient/'.$value->patientId.'/decleration/'.$value->declerationId) ?>"><?php echo $value->declerationId ?></a>
							</td>
							<td><?php echo date('d-m-y', $value->declerationPostTimestamp) ?></td>
							<td>
								<p class="mb0"><a href="<?php echo base_url('user/patient/'.$value->patientId) ?>"><?php echo $value->patientName ?></a></p>
								<p class="mb0 fs12"><?php echo $value->birthDate . "-" . $value->ssn ?></p>
							</td>
							<td><?php echo $value->workerName ?></td>
							<td><a href="<?php echo base_url('admin/dentists/'.$value->dentistId) ?>"><?php echo $value->dentistName ?></a></td>
							<td><?php echo $value->lot ?></td>
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