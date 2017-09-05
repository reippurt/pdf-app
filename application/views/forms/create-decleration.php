<div class="container">
	<div class="row">
		<div class="col-md-12 pt20 pb20">
			
		</div>
	</div>
	<div class="row">

		<div class="col-sm-6">

			<div class="card">
				<h4 class="card-header">Opret erklæring</h4>
				<div class="card-body">

					<div class="form-group">
						<input type="text" name="workerName" class="form-control form-control-sm lookup-workers" placeholder="Tekniker">
					</div>

					<div class="form-group">
						<input type="text" name="dentistName" class="form-control form-control-sm lookup-dentists " placeholder="Tandlæge">
					</div>

					<div class="form-group">
						<input type="text" name="" class="form-control form-control-sm lookup-patients" placeholder="Patient">
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-7">
								<input type="number" name="" class="form-control form-control-sm" placeholder="Fødselsdato">
							</div>
							<div class="col-md-5">
								<input type="number" name="" class="form-control form-control-sm" placeholder="cpr">
							</div>
						</div>
						
					</div>

					<div class="form-group">

						<label class="custom-control custom-radio">
							<input type="radio" class="custom-control-input" name="workType" checked>
							<span class="custom-control-indicator"></span>
							<span class="custom-control-description">Fast</span>
						</label>

						<label class="custom-control custom-radio">
							<input type="radio" class="custom-control-input" name="workType">
							<span class="custom-control-indicator"></span>
							<span class="custom-control-description">Aftagelig</span>
						</label>
					</div>

					<div class="form-group">
						<input type="text" name="number" class="form-control form-control-sm" placeholder="Nummer på arbejdsseddel">
					</div>
					
					<div class="form-group">
						<input type="text" name="description" class="form-control form-control-sm" placeholder="Kommentar">
					</div>

					<div class="form-group">
						<div class="input-group date datepicker" style="padding:0px;">
							<span class="input-group-addon input-sm"><i class="fa fa-calendar"></i></span>
							<input type="text" class="form-control form-control-sm bg-white" name="eventDate"  placeholder="Vælg dato">
						</div>
					</div>	

					<div class="form-group">
						<select type="text" name="description" class="form-control form-control-sm">
							<option>Vælg levering</option>
							<option>GLS</option>
							<option>Bud</option>
						</select>
					</div>

					<div class="form-group">
						<div class="input-group date datepicker" style="padding:0px;">
							<span class="input-group-addon input-sm"><i class="fa fa-calendar"></i></span>
							<input type="text" class="form-control form-control-sm bg-white" name="deliveryDate"  placeholder="Leveringsdato">
						</div>
					</div>	

					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
							<input type="text" name="eventTime" class="form-control form-control-sm" placeholder="Klokkeslæt (fritekst)">
						</div>
					</div>


					<div class="form-group">
						<button class="btn btn-primary btn-block">Opret erklæring</button>
					</div>

				</div>
			</div>
	

		</div>

	</div>

</div>