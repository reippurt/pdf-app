<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<a class="navbar-brand" href="<?php echo base_url() ?>">Start</a>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="#"><i class="fa fa-plus-circle"></i> Erklæring</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#"><i class="fa fa-database"></i> Arkiv</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i> Administration</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="#">Tilføj tandlæge</a>
					<a class="dropdown-item" href="#">Tilføj tandtekniker</a>
					
				</div>
			</li>

		</ul>
		<ul class="nav navbar-nav ml-auto">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<?php echo $this->session->userdata('name') ?>
					<i class="fa fa-user-o"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					
					<a class="dropdown-item" href="<?php echo base_url('action/logout') ?>">Log ud</a>
				</div>
			</li>
		</ul>
	</div>
</nav>