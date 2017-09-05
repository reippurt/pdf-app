<script type="text/javascript">
$(document).ready(function(){

	$('.datepicker').datepicker({
		format: "dd-mm-yyyy",
		weekStart: 1,
		language: "da",
		autoclose: true,
		todayHighlight: true,
		orientation:'bottom'
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
	
	var dentists = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		prefetch: '<?php echo base_url("action/autocomplete/dentists") ?>',
		remote: {
			url: '<?php echo base_url("action/autocomplete/dentists/%QUERY") ?>',
			wildcard: '%QUERY'
		}
	});

	var patients = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		prefetch: '<?php echo base_url("action/autocomplete/patients") ?>',
		remote: {
			url: '<?php echo base_url("action/autocomplete/patients/%QUERY") ?>',
			wildcard: '%QUERY'
		}
	});

	$('.lookup-workers').typeahead(null, {
		name: 'name',
		limit: 'Infinity',
		display: 'name',
		source: workers
	}).bind('typeahead:select', function(ev, suggestion) {

		console.log(suggestion);

	});;


	$('.lookup-dentists').typeahead(null, {
		name: 'name',
		limit: 'Infinity',
		display: 'name',
		source: dentists
	}).bind('typeahead:select', function(ev, suggestion) {

		console.log(suggestion);

	});;
	
	$('.lookup-patients').typeahead(null, {
		name: 'name',
		limit: 'Infinity',
		display: 'name',
		source: patients
	}).bind('typeahead:select', function(ev, suggestion) {

		console.log(suggestion);

	});;





	$(".datatable").DataTable({
		
		 responsive: true
	});

});
</script>