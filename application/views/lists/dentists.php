<div class="container-fluid">
	<div class="row pt20 pb20">
		<div class="col-md-12">
			<h3 class="mb5"><i class="fa fa-user-md"></i> Tandlæge
				<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
					Tilføj tandlæge
				</button>
			</h3>
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Tilføj tandlæge</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<?php $this->load->view('forms/create-dentist'); ?>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Luk</button>
							
						</div>
					</div>
				</div>
			</div>
		</div>

		

			

		
	</div>
	<div class="row">

		<div class="col-md-12 bg-white pt20 pb20">


			<table class="table table-striped datatable">
				<thead>
					<th>ID</th>
					<th>Oprettet</th>
					<th>Tandlæge</th>
					<th>Klinik</th>
				

					
				</thead>
				<tbody>

					<?php foreach ($dentists as $key => $value) {
					?>

					<tr>

						<td><?php echo $value->dentistId ?></td>
						<td><?php echo date('m/d/y', strtotime($value->postDate)); ?></td>
						<td><a href="<?php echo base_url('admin/dentists/'.$value->dentistId) ?>"><?php echo $value->dentistName ?></a></td>
						<td><a href="<?php echo base_url('admin/clinics/'.$value->clinicId) ?>"><?php echo $value->clinicName ?></a></td>
						
					</tr>

					<?php
					} ?>

				</tbody>
			</table>
		</div>

	</div>

</div>