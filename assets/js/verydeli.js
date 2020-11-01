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

	$('.e-input-medido').keyup(function(event) {
		// concatenar la medida
	});

	$('#fdd_provincia').change(function(event) {
		let id_provincia = $(this).val();

		$.ajax({
			url: 'index.php?controller=publicacion&action=getCiudades',
			type: 'POST',
			data: {id_provincia: id_provincia},
		})
		.done(function(data) {
			data = jQuery.parseJSON(data);
			$('#fdd_ciudad').html('');
			
			data.forEach(function(item, index){
				$('#fdd_ciudad').append('<option class="e-option" value="'+item.id+'">'+item.nombre+'</option>');
			});
		});
	});

	$('#fdo_provincia').change(function(event) {
		let id_provincia = $(this).val();

		$.ajax({
			url: 'index.php?controller=publicacion&action=getCiudades',
			type: 'POST',
			data: {id_provincia: id_provincia},
		})
		.done(function(data) {
			data = jQuery.parseJSON(data);
			$('#fdo_ciudad').html('');

			data.forEach(function(item, index){
				$('#fdo_ciudad').append('<option class="e-option" value="'+item.id+'">'+item.nombre+'</option>');
			});
		});
	});
});