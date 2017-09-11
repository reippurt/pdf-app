<style>
.mb0{
	margin-bottom: 0px;
}
</style>
<table >
<tr>
	<td>
		<h1>TANDKLÆGE KOPI</h1>
		Patienterklæring<br>
		Medicinsk udstyr efter mål
	</td>
	<td align="right">
		<table cellpadding="10">
			<tr>
				<td>
					<img src="<?php echo base_url('assets/img/logo.jpg') ?>" alt="Reiphurt Dental" title="Reiphurt Dental"width="180" height="35" border="0">
				</td>
			</tr>
		</table>
	</td>
</tr>
</table>
<br>
<br>
<br>
<br>
<strong>Medfølgende medicinske udstyr er udført efter ordre fra:</strong>
<br>
<table cellpadding="2" style="background-color:#ececec;">
	<tr>
		<td width="30%">Klinik</td>
		<td width="70%"><?php echo $decleration->clinicName ?> </td>
	</tr>

	<tr>
		<td width="30%">Tandlæge</td>
		<td width="70%"><?php echo $decleration->dentistName ?> </td>
	</tr>


	<tr>
		<td width="30%">Adresse</td>
		<td width="70%"><?php echo $decleration->street_name . " " .  $decleration->street_number ?> </td>
	</tr>

</table>
<br>
<br>
<strong>Til brug for:</strong>
<br>
<table cellpadding="2" style="background-color:#ececec;">
	
	<tr>
		<td width="30%">Patient</td>
		<td width="70%"><?php echo $decleration->patientName ?></td>
	</tr>
	<tr>
		<td width="30%">Cpr nr.</td>
		<td width="70%"><?php echo $decleration->birthDate . "-" . $decleration->ssn ?></td>
	</tr>

</table>
<br>
<br>
<strong>Tanderstatningens type:</strong>
<br>
<table cellpadding="2" style="background-color:#ececec;">
	<tr>
		<td width="100%">
		
			<?php 
			switch ($decleration->type) {
				case 'Fast':
					$type = "Klasse I - aftagelig tanderstatning";
					break;
				case 'Aftagelig':
					$type = "Klasse IIa - fast tanderstatning";
					break;
				
			}
			echo $type; 
			?>

		</td>
	</tr>
</table>
<br>
<br>
<strong>Produkt</strong>
<br>
<table cellpadding="2" style="background-color:#ececec;">
	<tr>
		<td>
			<?php 
				
				foreach ($decleration->products as $key => $value){
				
					echo $value->name . ", ";

				}
			?>
		</td>

	</tr>
</table>
<br>
<br>
<strong>Reference</strong>
<br>
<table cellpadding="2" style="background-color:#ececec;">
	<tr>
		<td width="30%">Tekniker</td>
		<td width="70%"><?php echo $decleration->workerName ?></td>
	</tr>
</table>
<br>
<br>
<p>Det bekræftes herved, at ovennævnte medicinske udstyr efter mål er fremstillet i
overensstemmelse med Sundhedsministeriets bekendt-gørelse nr. 409 af 27. maj 2003 om
medicinsk udstyr, herunder at det opfylder de væsentlige krav i bekendtgørelsen, jf. bilag 1.
</p>

<table>
	<tr>
		<td>
			<p style="font-size:11px;">
				<br>
				<br>
				<br>
				<br>
				Reipurth Dental Aps
				<br>
				Nygårds Plads 2B
				<br>
				2605 Brøndby
				<br>
				CVR: 33267819
				<br>
				TLF. 32210202
				<br>
				info@reipurth-dental.dk
			</p>
		</td>
		<td>
			<p>
				<br>
				<br>
				<br>
				<br>
				Dato: <?php echo date('d/m/y', strtotime($decleration->declerationPostDate)); ?>
			</p>
			<img src="<?php echo base_url('assets/img/signature.jpg') ?>" alt="Reiphurt Dental" title="Reiphurt Dental"width="180" height="100" border="0">
			<p>Dentallaboratoriets underskrift</p>
		</td>
	</tr>
</table>