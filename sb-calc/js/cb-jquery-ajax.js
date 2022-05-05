jQuery(document).ready(function($) {

	$( "#calc" ).click(function() {
		event.preventDefault();

		$.ajax({
			type: "POST",
			url: "/wp-content/plugins/sb-calc/api/api.php",
			data: {
				dollars : $("#dollars").val(),
				date    : $("#date").val()
			},
			success: function( data ) {
				$( '#dollars-result' ).val( data );
			},
			error: function() {
				console.log( errorThrown );
			}
		});
	});

});
