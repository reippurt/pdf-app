<nav class="navbar navbar-expand-lg  navbar-dark bg-primary">
	
	<a class="navbar-brand" href="<?php echo base_url() ?>">Start</a>

	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('document/create') ?>"><i class="fa fa-plus-circle"></i> Erklæring</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('document/archive') ?>"><i class="fa fa-database"></i> Arkiv</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i> Administration</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="#">Tilføj tandlæge</a>
					<a class="dropdown-item" href="#">Tilføj tandtekniker</a>
					
				</div>
			</li>

			<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Dropdown link
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			<a class="dropdown-item" href="#">Action</a>
			<a class="dropdown-item" href="#">Another action</a>
			<a class="dropdown-item" href="#">Something else here</a>
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