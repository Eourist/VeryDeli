jQuery(document).ready(function($) {
	// INPUT DE BUSQUEDA EN LA NAVBAR
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
	// FIN INPUT DE BUSQUEDA EN LA NAVBAR

	// CARGAR DATOS DEL VEHICULO EN EL MODAL DE ELIMINACION
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

	// SELECCIONAR UN AVATAR EN EL PERFIL
	$('.av-btn').click(function(event) {
		let id = $(this).attr('id');
		let nro = id.substring(11, id.length);
		$('#f_avatar').val("av ("+nro+")");
	});


	// SELECTS DE PROVINCIAS EN FORMULARIO DE ORDENES
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
	// FIN SELECTS DE PROVINCIAS EN FORMULARIO DE PUBLICACIONES

	// VALIDACION DE FORMULARIOS
		$("#form-publicaciones").validate({
			rules: {
				fp_titulo: {
					required: true,
					minlength: 20,
					maxlength: 100
				},
				fp_fecha_salida: {
					required: true
				},
				fp_hora_salida: {
					required: true
				},
				fp_medida_peso: {
					required: true,
					maxlength: 5
				},
				// fp_medida_alto: {
				// 	//required: true,
				// 	//maxlength: 5
				// 	required: {
				// 		depends: function(){
				// 			let a = $('#fp_medida_alto').val() != "" && $('#fp_medida_largo').val() != "" && $('#fp_medida_ancho').val() != "";
				// 			console.log("required: " + a);
				// 			return a;
				// 		}
				// 	},
				// 	maxlength: {
				// 		depends: function(){
				// 			let a = $('#fp_medida_alto').val().length < 6 && $('#fp_medida_largo').val().length < 6 && $('#fp_medida_ancho').val().length < 6;
				// 			console.log("maxlength: " + a);
				// 			return a;
				// 		}
				// 	}
				// },
					fp_medida_alto: {
						required: true,
						maxlength: 5
					},
					fp_medida_largo: {
						required: true,
						maxlength: 5
					},
					fp_medida_ancho: {
						required: true,
						maxlength: 5
					},
				fp_descripcion: {
					maxlength: 300
				},
				// DIRECCION DE ORIGEN
				fdo_calle: {
					required: true,
					maxlength: 40,
					minlength: 5
				},
				fdo_numero: {
					required: true,
					maxlength: 5,
					digits: true
				},
				fdo_piso: {
					maxlength: 2,
					digits: true
				},
				fdo_depto: {
					maxlength: 2
				},
				fdo_descripcion: {
					maxlength: 200
				},
				// DIRECCION DE DESTINO
				fdd_calle: {
					required: true,
					maxlength: 40,
					minlength: 5
				},
				fdd_numero: {
					required: true,
					maxlength: 5,
					digits: true
				},
				fdd_piso: {
					maxlength: 2,
					digits: true
				},
				fdd_depto: {
					maxlength: 2
				},
				fdd_descripcion: {
					maxlength: 200
				}
			},
			messages: {
				fp_titulo: {
					required: "Campo obligatorio",
					minlength: "Minimo 20 caracteres",
					maxlength: "Máximo 100 caracteres"
				},
				fp_fecha_salida: {
					required: "Campo obligatorio"
				},
				fp_hora_salida: {
					required: "Campo obligatorio"
				},
				fp_medida_peso: {
					required: "Campo obligatorio",
					maxlength: "Máximo 5 digitos"
				},
				fp_medida_alto: {
					required: "Campo obligatorio",
					maxlength: "Máximo 5 digitos"
				},

				fp_medida_largo: {
					required: "Campo obligatorio",
					maxlength: "Máximo 5 digitos"
				},
				fp_medida_ancho: {
					required: "Campo obligatorio",
					maxlength: "Máximo 5 digitos"
				},
				fp_descripcion: {
					maxlength: "Máximo 300 caracteres"
				},
				// DIRECCION DE ORIGEN
				fdo_calle: {
					required: "Campo obligatorio",
					maxlength: "Máximo 40 caracteres",
					minlength: "Minimo 5 caracteres"
				},
				fdo_numero: {
					required: "Campo obligatorio",
					maxlength: "Máximo 5 digitos",
					digits: "Solo enteros"
				},
				fdo_piso: {
					maxlength: "Máximo 2 digitos",
					digits: "Solo enteros"
				},
				fdo_depto: {
					maxlength: "Máximo 2 caracteres"
				},
				fdo_descripcion: {
					maxlength: "Máximo 200 caracteres"
				},
				// DIRECCION DE DESTINO
				fdd_calle: {
					required: "Campo obligatorio",
					maxlength: "Máximo 40 caracteres",
					minlength: "Minimo 5 caracteres"
				},
				fdd_numero: {
					required: "Campo obligatorio",
					maxlength: "Máximo 5 digitos",
					digits: "Solo enteros"
				},
				fdd_piso: {
					maxlength: "Máximo 2 digitos",
					digits: "Solo enteros"
				},
				fdd_depto: {
					maxlength: "Máximo 2 caracteres"
				},
				fdd_descripcion: {
					maxlength: "Máximo 200 caracteres"
				}
			},
			errorPlacement: function(error, element) {
				error.insertAfter(element.parent());
			}
		});
	// FIN VALIDACION DE FORMULARIOS

	// COMENTARIOS
		$('.e-btn-responder').click(function(event) {
			var id_comentario = $(this).data('com-id');
			var input_res = $('#com-respuesta-'+id_comentario);
			var comentario = $('#com-'+id_comentario);

			if (input_res.is(':hidden')){
				input_res.slideDown('fast', function(){
					comentario.css('border-bottom-left-radius', '0px');
					comentario.css('border-bottom-right-radius', '0px');
				});
			} else {
				input_res.slideUp('fast', function(){
					comentario.css('border-bottom-left-radius', '4px');
					comentario.css('border-bottom-right-radius', '4px');
				});
			}
		});

		$('#e-btn-reportar').click(function(event) {
			/* ABRIR MODAL DE REPORTAR */
		});
	// FIN COMENTARIOS
});

function probarValidacion(){
	var validator = $("#form-publicaciones").validate({
		rules: {
			fp_titulo: "required"
		},
		messages: {
			fp_titulo: {required:"Please specify your title"}
		}
	});
}