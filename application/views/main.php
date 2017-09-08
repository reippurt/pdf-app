<div class="container">
	<div class="row">
		
		<?php if(!$this->session->userdata('logged_in')){ ?>

			<div class="col-md-4">
				
				<div class="card mt20">
					<div class="card-header">
						<i class="fa fa-lock"></i> Log ind
					</div>
					<div class="card-body">
						<?php $this->load->view('forms/login') ?>
					</div>
				</div>
				
			</div>

		<?php } ?>

	</div>
</div>