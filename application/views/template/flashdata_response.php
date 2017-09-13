<?php

$response = $this->session->flashdata('response');

if($response){

	$class = "danger";	
	if(array_key_exists('class', $response)){
		$class = $response['class'];
	}

?>

<div class="alert alert-<?php echo $class ?> mb0">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<p class="mb0"><?php echo $response['content']; ?></p>
</div>

<?php } ?>