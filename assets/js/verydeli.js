jQuery(document).ready(function($) {
	let navSearchInput = $('#nav-search-input');
	let navSearchLink = $('#nav-search-btn');
	let navSearchForm = $('#nav-search-form');

	navSearchLink.click(function() {
		if (!navSearchInput.is(':hidden')){
			console.log("submit form");
			// $('#form-id').submit();
		} else {
			navSearchInput.fadeIn();
			navSearchForm.addClass("e-nav-link-focus");
		}
	});

	navSearchInput.focusout(function(){
		if (!navSearchLink.is(':active')){
			navSearchInput.fadeOut();
			navSearchForm.removeClass("e-nav-link-focus");
		}
	});
	navSearchLink.focusout(function(){
		if (!navSearchInput.is(':active')){
			navSearchInput.fadeOut();
			navSearchForm.removeClass("e-nav-link-focus");
		}
	});

	$('.e-card-caret').mouseup(function(event){
		// $(this).html('<i class="fas fa-angle-double-up"></i>');
		console.log("asdd");
	});

	$('.e-borrar-vehiculo-btn').click(function(event) {
		let id 		= $(this).data('id');
		let patente = $(this).data('patente');
		let tipo 	= $(this).data('tipo');
		let marca 	= $(this).data('marca');
		let modelo 	= $(this).data('modelo');

		$('#vehiculo-marca').html(marca);
		$('#vehiculo-modelo').html(modelo);
		$('#vehiculo-patente').html(patente);
		$('#id_vehiculo').val(id);
		console.log("Quiere borrar el vehiculo " + id);
	});

	$('.av-btn').click(function(event) {
		let id = $(this).attr('id');
		let nro = id.substring(11, id.length);
		$('#f_avatar').val("av ("+nro+")");
	});
});