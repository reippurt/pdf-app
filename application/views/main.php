<div class="container pt20">
	<div class="row">
		

		
		<?php if(!$this->session->userdata('logged_in')){ ?>

			<div class="col-md-3">
				
				<div class="card mt20">
					<div class="card-header">
						<i class="fa fa-lock"></i> Log ind
					</div>
					<div class="card-body">
						<?php $this->load->view('forms/login') ?>
					</div>
				</div>
				
			</div>

		<?php } else {
			?>

		<div class="col-md-3 pt20 pb20">
			<p class="text-muted mb0">Aktiv bruger</p>
			<p><?php echo get_cookie('signature_name'); ?></p>
			<p class="text-muted mb0">Udløber</p>
			<p><?php 
			$this->load->helper('date');
			echo timespan(time(), get_cookie('signature_expiration'), 2); ?></p>
			
			
		</div>
		<div class="col-md-6">
			
			<div class="card">
				<div class="card-header">Skift bruger</div>
				<div class="card-body">
					<?php $this->load->view('forms/set-signature') ?>
				</div>
			</div>


		</div>




			<?php
		} ?>

	</div>
</div>




