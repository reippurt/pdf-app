<?php
	
	if($notes){

	
		foreach ($notes as $key => $value) {
		?>

		<div class="note-block">

			<div class="">
				<p class="mb0 fs12"><strong><?php echo $value->workerName ?></strong> <?php echo $value->content ?></p>
			</div>	
			<div class="">
				<p class="mb0 text-muted fs10"><?php echo date('m. M Y', $value->postTimestamp) ?> kl. <?php echo date('G:i', $value->postTimestamp) ?></p>
			</div>
			
		</div>

		<?php
		}

	}
?>