<style>
.mb0{
	margin-bottom: 0px;
}
</style>
<table >
<tr>
	<td>
		<h1>Label</h1>
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
<strong>Levering:</strong>
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
	<tr>
		<td width="30%"><?php echo $decleration->deliveryTypeName ?></td>
		<td width="70%">
			<?php echo $decleration->deliveryDate ?>
			<br>
			<?php echo $decleration->deliveryTime ?>
		</td>
	</tr>
</table>

