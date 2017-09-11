<div class="container">
	<div class="row">
		<div id="response" class="col-md-12 pt20 pb20">
			
		</div>
	</div>
	<div class="row">

		<div class="col-md-3">

			<div class="card">

				<div class="card-header bg-white">

					<h6 class="mb0">Pakkelabel</h6>

				</div>

				<div class="card-body">

					<div class="form-group">
						<select type="text" id="deliveryTypeId" name="note" class="form-control form-control-sm">
							<option value="<?php echo $decleration->deliveryTypeId ?>"><?php echo $decleration->deliveryTypeName ?></option>
							<option value="1">GLS</option>
							<option value="2">Bud</option>
						</select>
					</div>

					<div class="form-group">
						<div class="input-group date datepicker" style="padding:0px;">
							<span class="input-group-addon input-sm"><i class="fa fa-calendar"></i></span>
							<input type="text" id="deliveryDate" class="form-control form-control-sm bg-white" name="deliveryDate"  placeholder="Dato" value="<?php echo $decleration->deliveryDate; ?>">
						</div>
					</div>	

					<div class="form-group mb0">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
							<input type="text" id="deliveryTime" name="eventTime" class="form-control form-control-sm" placeholder="Klokke" value="<?php echo $decleration->deliveryTime ?>">
						</div>
					</div>


				</div>

			</div>

		</div>

		<div class="col-md-5">

			<div class="card">
				<h6 class="card-header bg-white">Opret erklæring</h6>
				
				<div class="card-body">

					<div class="row">
						
						<div class="col-md-12">
						
							<div class="form-group">

								<?php 
								$workerId = "";
								$workerName = "";
								if(get_cookie('workerId') != null && get_cookie('signature_name') != null){
									$workerId = get_cookie('workerId'); 
									$workerName = get_cookie('signature_name'); 
								} ?>

								<input type="text" id="workerName" class="form-control form-control-sm lookup-workers" placeholder="Tekniker" value="<?php echo $decleration->workerName ?>">
								<input type="hidden" id="workerId" value="<?php echo $decleration->workerId ?>">
							</div>

							<div class="form-group">
								<input type="text" id="dentistName" class="form-control form-control-sm lookup-dentists " placeholder="Tandlæge" value="<?php echo $decleration->dentistName ?>">
								<input type="hidden" id="dentistId" value="<?php echo $decleration->dentistId ?>">
							</div>
							
						
						

							<div class="form-group">
								<input type="text" id="patientName" class="form-control form-control-sm lookup-patients-inactive" placeholder="Patient" value="<?php echo $decleration->patientName ?>">
								<input type="hidden" id="patientId" value="<?php echo $decleration->patientId ?>">
							</div>
							
							<div class="form-group">
								<div class="row">
									<div class="col-md-7">
										<input type="text" id="birth-date" class="form-control form-control-sm" placeholder="Fødselsdato" maxlength="6" value="<?php echo $decleration->birthDate ?>">
									</div>
									<div class="col-md-5">
										<input type="text" id="ssn" class="form-control form-control-sm" placeholder="cpr" maxlength="4" value="<?php echo $decleration->ssn ?>">
									</div>
								</div>
							</div>
							<div class="form-group">
								<input type="text" id="lot" name="lot" class="form-control form-control-sm" placeholder="Nummer på arbejdsseddel" value="<?php echo $decleration->ssn ?>">
							</div>
							<div class="form-group">
								<input type="text" id="note" name="note" class="form-control form-control-sm" placeholder="Kommentar" value="<?php echo $decleration->note ?>">
							</div>
							<div id="type" class="form-group" style="border:1px solid transparent;">

									
									<?php 
									$fast_checked = "";
									$aftagelig_checked = "";
									if($decleration->type == "Fast"){ $fast_checked = "checked"; }else if($decleration->type == "Aftagelig"){ $aftagelig_checked = "checked"; }  ?>
								
									<label class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" name="type" value="Fast" <?php echo $fast_checked ?>>
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description">Fast</span>
									</label>

									<label class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" name="type" value="Aftagelig" <?php echo $aftagelig_checked ?>>
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description">Aftagelig</span>
									</label>

								
							
							</div>
							<div>
								

								<div id="products-added">
									
									<?php
									foreach ($decleration->products as $key => $value) {
									
									?>

										<div class="input-group input-group-sm mb15">
											<input type="text" class="form-control form-control-sm" value="<?php echo $value->name ?>" disabled="">
											<span class="input-group-btn">
												<button class="btn btn-danger remove-added-product" type="button"><i class="fa fa-times"></i></button>
											</span>
										<input type="hidden" value="<?php echo $value->productId ?>" class="productId">
										</div>


									<?php

									}
									?>	
									
								
								</div>
								

								<div class="form-group">
									<input type="text" id="products" class="form-control form-control-sm lookup-products" placeholder="Produkt">
									<input type="hidden" class="productId">
								</div>

							</div>
						
						
						

						

						
							
						
							
						</div>
					
					</div>
				</div>
				<div class="card-footer text-right">
					<input type="hidden" id="declerationId" value="<?php echo $decleration->declerationId ?>">
					<button class="btn btn-primary update-decleration">Gem ændringer</button>
				</div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">

	$(".update-decleration").click(function(){
		
		//$(this).prop('disabled', true);
		
		var result = true;

		var products = [];
		$(".productId").each(function(){
			if($(this).val() != ""){
				products.push($(this).val());
			}
		});
		
		var data = {
			declerationId 	: 	$("#declerationId").val(),
			workerId 	: 	$("#workerId").val(),
			dentistId 	: 	$("#dentistId").val(),
			patientId	: 	$("#patientId").val(),
			patientName	: 	$("#patientName").val(),
			birthDate 	: 	$("#birth-date").val(),
			ssn 		: 	$("#ssn").val(),
			cpr 		: 	$("#cpr").val(),
			type 		: 	$("input[name=type]:checked").val(),
			products 	:   products,
			lot 		: 	$("#lot").val(),
			note		: 	$("#note").val(),
			deliveryTypeId 	: 	$("#deliveryTypeId").val(),
			deliveryDate: 	$("#deliveryDate").val(),
			deliveryTime: 	$("#deliveryTime").val(),	
		}


		$.each(data, function( index, value ) {
			

			
			var target_input = index;
			
			if(
				target_input == 'workerId' ||
				target_input == 'dentistId' ||
				target_input == 'patientName' ||
				target_input == 'type' ||
				target_input == 'products'
				)
			{

				
				
				// make correct target_inputs
				if(index == "dentistId"){ target_input = "dentistName"; }
				if(index == "workerId"){ target_input = "workerName"; }
				
				
				
				// check for missing inputs
				if(value == "" || value == "Vælg levering" || value == null){	


					//$("#products").addClass("is-invalid");
					
					$("#"+target_input).addClass('is-invalid border-danger');


					result = false;
				
				} else {
					
					$("#"+target_input).removeClass('is-invalid border-danger');
				
				}

			}

		
		});



		
		
		if(result == false){ $(this).prop('disabled', false); return result; };
		//$("#response").html(JSON.stringify(data));
		$.ajax({
			method:'post',
			url: '<?php echo base_url("action/updateDecleration") ?>',
			data: data,
			
		}).done(function(response){
			if(response != "false"){
					
				window.location.href = "<?php echo base_url('decleration/id/') ?>"+response;
				
			}
		});


	});

</script>