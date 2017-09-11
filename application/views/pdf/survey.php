<style>
.mb0{
	margin-bottom: 0px;
}
</style>

<table>
<tr>
	<td>
		<h1>TANDLÆGE KOPI</h1>
		<?php
		switch ($decleration->type) {
			case 'Fast':
				$sub_title = "FAST PROTETIK EVALUERING";
				break;
			case 'Aftagelig':
				$sub_title = "AFTAGELIG PROTETIK EVALUERING";
				break;
			
			default:
				# code...
				break;
		}
		?>
		<br>
		<?php echo $sub_title ?>
	</td>
	<td align="right">
		<table cellpadding="10">
			<tr>
				<td>
					<img src="<?php echo base_url('assets/img/logo.jpg') ?>" alt="Reiphurt Dental" title="Reiphurt Dental" width="180" height="35" border="0">
				</td>
			</tr>
		</table>
	</td>
</tr>
</table>

<br>
<br>
<strong>Levering:</strong>
<br>
<table cellpadding="2" style="background-color:#ececec;">
	<tr>
		<td width="20%">Dato</td>
		<td width="80%"><?php echo $decleration->declerationPostDate ?> </td>
	</tr>

	<tr>
		<td width="20%">Tandlæge</td>
		<td width="80%"><?php echo $decleration->dentistName ?> </td>
	</tr>


	<tr>
		<td width="20%">Tekniker</td>
		<td width="80%"><?php echo $decleration->workerName ?> </td>
	</tr>
	<tr>
		<td width="20%">Arbejdets art</td>
		<td width="80%">
			<?php 
			foreach ($decleration->products as $key => $value) {
				echo $value->name;
				echo "<br>";
			}
			?>
		</td>
	</tr>
</table>

<br>
<br>
<br>
<br>

<table>

	<tr>

		<td width="50%">
			
			<table>
				<tr>
					<td><strong>Okklusion</strong></td>
					<td align="center">Sæt kryds</td>
				</tr>
				<tr>
					<td>Supra</td>
					<td align="center"><img src="<?php echo base_url('assets/img/square.png') ?>" alt="Reiphurt Dental" title="Reiphurt Dental" width="11" height="11" border="0"></td>
				</tr>
				<tr>
					<td>Tilpas</td>
					<td align="center"><img src="<?php echo base_url('assets/img/square.png') ?>" alt="Reiphurt Dental" title="Reiphurt Dental" width="11" height="11" border="0"></td>
				</tr>
				<tr>
					<td>Infra</td>
					<td align="center"><img src="<?php echo base_url('assets/img/square.png') ?>" alt="Reiphurt Dental" title="Reiphurt Dental" width="11" height="11" border="0"></td>
				</tr>
			</table>
				
			<table cellpadding="5">
				<tr><td></td></tr>
			</table>


			<table>
				<tr>
					<td><strong>Kanttilslutning</strong></td>
					<td align="center">Sæt kryds</td>
				</tr>
				<tr>
					<td>Overskud</td>
					<td align="center"><img src="<?php echo base_url('assets/img/square.png') ?>" alt="Reiphurt Dental" title="Reiphurt Dental" width="11" height="11" border="0"></td>
				</tr>
				<tr>
					<td>Tilpas</td>
					<td align="center"><img src="<?php echo base_url('assets/img/square.png') ?>" alt="Reiphurt Dental" title="Reiphurt Dental" width="11" height="11" border="0"></td>
				</tr>
				<tr>
					<td>Underskud</td>
					<td align="center"><img src="<?php echo base_url('assets/img/square.png') ?>" alt="Reiphurt Dental" title="Reiphurt Dental" width="11" height="11" border="0"></td>
				</tr>
			</table>
			
			<table cellpadding="5">
				<tr><td></td></tr>
			</table>
			
			<table>
				<tr>
					<td><strong>Cementeringstid</strong></td>
					<td align="center">Sæt kryds</td>
				</tr>
				<tr>
					<td>Brugt længere tid</td>
					<td align="center"><img src="<?php echo base_url('assets/img/square.png') ?>" alt="Reiphurt Dental" title="Reiphurt Dental" width="11" height="11" border="0"></td>
				</tr>
				<tr>
					<td>Som forventer</td>
					<td align="center"><img src="<?php echo base_url('assets/img/square.png') ?>" alt="Reiphurt Dental" title="Reiphurt Dental" width="11" height="11" border="0"></td>
				</tr>
				<tr>
					<td>Brugt kortere tid</td>
					<td align="center"><img src="<?php echo base_url('assets/img/square.png') ?>" alt="Reiphurt Dental" title="Reiphurt Dental" width="11" height="11" border="0"></td>
				</tr>
			</table>


			<table cellpadding="5">
				<tr><td></td></tr>
			</table>

			<table>

				<tr>
					<td><strong>Cementeringstid ________ min.</strong></td>
				</tr>

			</table>
		
		</td>
		

		<td width="50%">




			<table>
				<tr>
					<td><strong>Kontaktpunkt</strong></td>
					<td align="center">Sæt kryds</td>
				</tr>
				<tr>
					<td>For hård</td>
					<td align="center"><img src="<?php echo base_url('assets/img/square.png') ?>" alt="Reiphurt Dental" title="Reiphurt Dental" width="11" height="11" border="0"></td>
				</tr>
				<tr>
					<td>Tilpas</td>
					<td align="center"><img src="<?php echo base_url('assets/img/square.png') ?>" alt="Reiphurt Dental" title="Reiphurt Dental" width="11" height="11" border="0"></td>
				</tr>
				<tr>
					<td>Ingen</td>
					<td align="center"><img src="<?php echo base_url('assets/img/square.png') ?>" alt="Reiphurt Dental" title="Reiphurt Dental" width="11" height="11" border="0"></td>
				</tr>
			</table>
			

			<table cellpadding="5">
				<tr><td></td></tr>
			</table>


			<table>
				<tr>
					<td><strong>Farve</strong></td>
					<td align="center">Sæt kryds</td>
				</tr>
				<tr>
					<td>Meget god</td>
					<td align="center"><img src="<?php echo base_url('assets/img/square.png') ?>" alt="Reiphurt Dental" title="Reiphurt Dental" width="11" height="11" border="0"></td>
				</tr>
				<tr>
					<td>God</td>
					<td align="center"><img src="<?php echo base_url('assets/img/square.png') ?>" alt="Reiphurt Dental" title="Reiphurt Dental" width="11" height="11" border="0"></td>
				</tr>
				<tr>
					<td>Ringe</td>
					<td align="center"><img src="<?php echo base_url('assets/img/square.png') ?>" alt="Reiphurt Dental" title="Reiphurt Dental" width="11" height="11" border="0"></td>
				</tr>
			</table>



			<table cellpadding="5">
				<tr><td></td></tr>
			</table>


			<table>
				<tr>
					<td><strong>Pasform</strong></td>
					<td align="center">Sæt kryds</td>
				</tr>
				<tr>
					<td>Meget god</td>
					<td align="center"><img src="<?php echo base_url('assets/img/square.png') ?>" alt="Reiphurt Dental" title="Reiphurt Dental" width="11" height="11" border="0"></td>
				</tr>
				<tr>
					<td>God</td>
					<td align="center"><img src="<?php echo base_url('assets/img/square.png') ?>" alt="Reiphurt Dental" title="Reiphurt Dental" width="11" height="11" border="0"></td>
				</tr>
				<tr>
					<td>Ikke godkendt</td>
					<td align="center"><img src="<?php echo base_url('assets/img/square.png') ?>" alt="Reiphurt Dental" title="Reiphurt Dental" width="11" height="11" border="0"></td>
				</tr>
			</table>


		</td>


	</tr>

</table>

<br>
<br>
<br>
<strong>Kommentarer</strong>
<br>
<table border="1">

	<tr>

		<td height="120">



		</td>



	</tr>


</table>
