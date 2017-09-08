<script type="text/javascript">
$(document).ready(function(){
	
	$(".confirm-form-submit").click(function(e){
		e.preventDefault();
		if(confirm('Er du sikker på denne handling?')){
			$(this).closest('form').submit();
		}
	});


	$(".click-remove").click(function(){
		$(this).remove();
	});

	$('.datepicker').datepicker({
		format: "yyyy-mm-dd",
		weekStart: 1,
		language: "da",
		autoclose: true,
		todayHighlight: true,
		orientation:'bottom'
	});



	var products = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		prefetch: '<?php echo base_url("action/autocomplete/products") ?>',
		remote: {
			url: '<?php echo base_url("action/autocomplete/products/%QUERY") ?>',
			wildcard: '%QUERY'
		}
	});
	
	var workers = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		prefetch: '<?php echo base_url("action/autocomplete/workers") ?>',
		remote: {
			url: '<?php echo base_url("action/autocomplete/workers/%QUERY") ?>',
			wildcard: '%QUERY'
		}
	});
	

	var patients = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		prefetch: '<?php echo base_url("action/autocomplete/patients/") ?>',
		remote: {
			url: '<?php echo base_url("action/autocomplete/patients/%QUERY") ?>',
			wildcard: '%QUERY'
		}
	});

	


	var dentists = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		prefetch: '<?php echo base_url("action/autocomplete/dentists/") ?>',
		remote: {
			url: '<?php echo base_url("action/autocomplete/dentists/%QUERY") ?>',
			wildcard: '%QUERY'
		}
	});



	// Typeahead lookup workers	
	$('.lookup-workers').typeahead({
		minLength: 0,
		highlight: true
	},
	{
		limit: 'Infinity',
		name: 'name',
		display: 'name',
		source: workers
	}).bind('typeahead:select', function(ev, suggestion) {

		$("#workerId").val(suggestion.workerId);
		$(this).blur();

	});

	
	// Typeahead lookup dentists
	$('.lookup-dentists').typeahead({
		minLength: 0,
		highlight: true,

	},
	{
		limit: 'Infinity',
		name: 'name',
		display: 'name',
		source: dentists
	}).bind('typeahead:select', function(ev, suggestion) {
		$("#dentistId").val(suggestion.dentistId);
		$(this).blur();

	});





	$('.lookup-products').typeahead({
		minLength: 0,
		highlight: true
	},
	{
		limit: 'Infinity',
		name: 'name',
		display: 'name',
		source: products
	}).bind('typeahead:select', function(ev, suggestion) {

		
		$(this).closest(".form-group").find('.productId').val(suggestion.productId);

	});








	





	$('.lookup-patients').typeahead({
		minLength: 0,
		highlight: true
	},
	{
		limit: 'Infinity',
		name: 'name',
		display: 'name',
		source: patients
	}).bind('typeahead:select', function(ev, suggestion) {

		$(this).blur();

	});



	$(".datatable").DataTable({
		
		 responsive: true
	});

});
</script>