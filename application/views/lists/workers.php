<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 pt20 pb20">
			<h3><i class="fa fa-cogs"></i> Tekniker
				<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
					Tilføj tekniker
				</button>
			</h3>
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Tilføj tekniker</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<?php $this->load->view('forms/create-worker'); ?>
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
				

					
				</thead>
				<tbody>

					<?php foreach ($workers as $key => $value) {
					?>

					<tr>

						<td><?php echo $value->workerId ?></td>
						<td><?php echo date('m/d/y', strtotime($value->postDate)); ?></td>
						<td><?php echo $value->name ?></td>
						
					</tr>

					<?php
					} ?>

				</tbody>
			</table>
		</div>

	</div>

</div>