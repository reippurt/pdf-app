<div class="container">
	<div class="row">
		<div id="response" class="col-md-12 pt20 pb20">
			
		</div>
	</div>
	<div class="row">

		<div class="col-md-8">

			<div class="card">
				<h6 class="card-header bg-white">Opret erklæring</h6>
				
				<div class="card-body">

					<div class="row">
						
						<div class="col-md-6">
						
							<div class="form-group">
								<input type="text" id="workerName" class="form-control form-control-sm lookup-workers" placeholder="Tekniker">
								<input type="hidden" id="workerId">
							</div>

							<div class="form-group">
								<input type="text" id="dentistName" class="form-control form-control-sm lookup-dentists " placeholder="Tandlæge">
								<input type="hidden" id="dentistId">
							</div>
							
						
						

							<div class="form-group">
								<input type="text" id="patientName" class="form-control form-control-sm lookup-patients-inactive" placeholder="Patient">
							</div>
							
							<div class="form-group">
								<div class="row">
									<div class="col-md-7">
										<input type="text" id="birth-date" class="form-control form-control-sm" placeholder="Fødselsdato" maxlength="6">
									</div>
									<div class="col-md-5">
										<input type="text" id="ssn" class="form-control form-control-sm" placeholder="cpr" maxlength="4">
									</div>
								</div>
							</div>
							<div id="type" class="form-group" style="border:1px solid transparent;">

								
								
									<label class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" name="type" value="Fast">
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description">Fast</span>
									</label>

									<label class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" name="type" value="Aftagelig">
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description">Aftagelig</span>
									</label>

								
							
							</div>
							<div>

								<div class="form-group">

									<input type="text" id="products" class="form-control form-control-sm lookup-products" placeholder="Produkt">
									<input type="hidden" class="productId">
								</div>

								<div class="collapse" id="additional-products">
									<div class="form-group">
										<input type="text" class="form-control form-control-sm lookup-products" placeholder="Tilføj">
										<input type="hidden" class="productId">
									</div>
									<div class="form-group">
										<input type="text" class="form-control form-control-sm lookup-products" placeholder="Tilføj">
										<input type="hidden" class="productId">
									</div>
									<div class="form-group">
										<input type="text" class="form-control form-control-sm lookup-products" placeholder="Tilføj">
										<input type="hidden" class="productId">
									</div>
									<div class="form-group">
										<input type="text" class="form-control form-control-sm lookup-products" placeholder="Tilføj">
										<input type="hidden" class="productId">
									</div>
									
								
								</div>

								<div class="form-group">
									<button class="btn btn-light btn-block btn-sm click-remove" data-toggle="collapse" data-target="#additional-products" >Tilføj produkt</button>
								</div>

								

							</div>
						
						</div>
						

						<div class="col-md-6">

						
							<div class="form-group">
								<input type="text" id="lot" name="lot" class="form-control form-control-sm" placeholder="Nummer">
							</div>
							<div class="form-group">
								<input type="text" id="note" name="note" class="form-control form-control-sm" placeholder="Kommentar">
							</div>
						
							<div class="form-group">
								<div class="input-group date datepicker" style="padding:0px;">
									<span class="input-group-addon input-sm"><i class="fa fa-calendar"></i></span>
									<input type="text" class="form-control form-control-sm bg-white" name="eventDate"  value="<?php echo date('Y-m-d', time()); ?>">
								</div>
							</div>	

							<div class="card bg-light">
								
								<div class="card-body">
									<p class="card-title lh1">Label</p>
									<div class="row">

										<div class="col-md-8">
											
											<div class="form-group">
												<select type="text" id="deliveryTypeId" name="note" class="form-control form-control-sm">
													<option>Vælg levering</option>
													<option value="1">GLS</option>
													<option value="2">Bud</option>
												</select>
											</div>
										</div>

									</div>							
								
									<div class="row">

										<div class="col-md-10">
											<div class="form-group">
												<div class="input-group date datepicker" style="padding:0px;">
													<span class="input-group-addon input-sm"><i class="fa fa-calendar"></i></span>
													<input type="text" id="deliveryDate" class="form-control form-control-sm bg-white" name="deliveryDate"  placeholder="Dato">
												</div>
											</div>	

											<div class="form-group mb0">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
													<input type="text" id="deliveryTime" name="eventTime" class="form-control form-control-sm" placeholder="Klokke">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer text-right">
					<button class="btn btn-primary create-decleration">Gem kladde</button>
				</div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">

	$(".create-decleration").click(function(){
		
		$(this).prop('disabled', true);
		
		var result = true;

		var products = [];
		$(".productId").each(function(){
			if($(this).val() != ""){
				products.push($(this).val());
			}
		});
		
		var data = {
			workerId 	: 	$("#workerId").val(),
			dentistId 	: 	$("#dentistId").val(),
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
			url: '<?php echo base_url("action/createDecleration") ?>',
			data: data,
			
		}).done(function(response){
			if(response != "false"){
				window.location.href = "<?php echo base_url('decleration/id/') ?>"+response;
			}
		});


	});

</script>