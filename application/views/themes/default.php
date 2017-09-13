<!DOCTYPE html>
<html lang="en">
<head>
<?php
		 foreach($js as $file){
				echo "\n\t\t"; 
				?><script src="<?php echo $file; ?>"></script><?php
		 } echo "\n\t"; 
?>	
<?php
		
		 foreach($css as $file){ 
		 	echo "\n\t\t"; 
			?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
		 } echo "\n\t"; 
?>
<?php
		if(!empty($meta)) 
			foreach($meta as $name=>$content){
				echo "\n\t\t"; 
				?><meta name="<?php echo $name; ?>" content="<?php echo is_array($content) ? implode(", ", $content) : $content; ?>" /><?php
		 }
	?>
<?php $this->load->view('template/head') ?>
</head>
<body>
<?php $this->load->view('template/navbar') ?>
<?php $this->load->view('template/flashdata_response') ?>
<?php echo $output;?>
<?php $this->load->view('template/jquery') ?>
<?php $this->load->view('template/signature-control') ?>
</body>
</html>