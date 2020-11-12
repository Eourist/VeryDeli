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

	// CARGAR DATOS DE LA PUBLICACION EN EL MODAL DE CREAR POSTULACION
	$('.e-btn-postularse').click(function(event) {
		let id_publicacion 	= $(this).data('id-publicacion');
		let desde 			= $(this).data('desde');
		let hasta 			= $(this).data('hasta');
		let salida 			= $(this).data('salida');

		$.ajax({
			url: 'index.php?controller=publicacion&action=getDatosPostulantesPublicacion',
			type: 'POST',
			data: {id_publicacion: id_publicacion},
		})
		.done(function(data) {
			data = jQuery.parseJSON(data);

			if(data.cantidad > 0){
				$('#e-mp-info').html('Actualmente hay <strong>'+data.cantidad+'</strong> usuarios postulados <br> Por un precio mínimo de <strong>$'+data.precio_minimo+'</strong>');
			} else {
				$('#e-mp-info').html('Actualmente no hay nadie postulado en esta publicación');
			}
			$('#e-mp-desde').html(desde);
			$('#e-mp-hasta').html(hasta);
			$('#e-mp-salida').html(salida);

			$('#fp_id_publicacion').val(id_publicacion);
			// console.log(data);
		});
	});

	// CARGAR DATOS DE LA PUBLICACION EN EL MODAL DE VER POSTULANTES
	$('.e-btn-candidatos').click(function(event) {
		let id_publicacion 	= $(this).data('id-publicacion');

		$.ajax({
			url: 'index.php?controller=publicacion&action=getPostulantesPublicacion',
			type: 'POST',
			data: {id_publicacion: id_publicacion},
		})
		.done(function(data) {
			data = jQuery.parseJSON(data);
			console.log("id publicacion: " + id_publicacion);
			console.log(data);
			if(data != null){
				let html = "";
				data.forEach(function(item, index){
					html += item.id_postulacion + " <br> ";
				});
				$('#e-mp-listado').html(html);
			} else {
				$('#e-mp-listado').html('Actualmente no hay nadie postulado en esta publicación');
			}
		});
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

		$('.e-com-mostrar-mas').click(function(event) {
			let id_publicacion = $(this).data('id-publicacion');

			if ($(this).data('estado') == 'max'){
				// $('.comentario-oculto-'+id_publicacion).addClass('d-none');
				$('.comentario-oculto-'+id_publicacion).hide();//slideUp();
				$(this).html('<i class="fas fa-angle-down"></i> Cargar mas comentarios');
				$(this).data('estado', 'min');
			} else {
				// $('.comentario-oculto-'+id_publicacion).removeClass('d-none');
				$('.comentario-oculto-'+id_publicacion).show();//slideDown();
				$(this).html('<i class="fas fa-angle-up"></i> Mostrar menos');
				$(this).data('estado', 'max');
			}
		});

				//NO VALE LA PENA HACERLO CON AJAX... 
		// $('.e-btn-com').click(function(event) {
		// 	let id_publicacion 			= $(this).data('id-publicacion');
		// 	let id_usuario 				= $(this).data('id-usuario');
		// 	let id_usuario_respuesta 	= $(this).data('id-usuario-respuesta');
		// 	let id_comentario_respuesta = $(this).data('id-comentario-respuesta');
		// 	let texto = (id_usuario_respuesta != undefined) ? $('#fc_respuesta_'+id_publicacion+'_'+id_comentario_respuesta+'_'+id_usuario_respuesta).val() : $('#fc_comentario_'+id_publicacion).val();

		// 	$.ajax({
		// 		url: 'index.php?controller=publicacion&action=comentar',
		// 		type: 'POST',
		// 		data: {
		// 			fc_id_publicacion: id_publicacion,
		// 			fc_id_usuario: id_usuario,
		// 			fc_id_usuario_respuesta: id_usuario_respuesta,
		// 			fc_texto: texto
		// 		},
		// 	})
		// 	.done(function(data) { index.php?controller=usuario&action=perfil
		// 		data = jQuery.parseJSON(data);
		// 		console.log(data);
		// 		$('#comentarios-dinamicos-'+id_publicacion).prepend(
		// 			'<div class="col-12 e-card-comentario" id="com-'+data.id+'" style="">'+
		// 		'<a href="index.php?controller=usuario&action=perfil'+data.id_usuario+'" class="e-com-userlink">'+
		// 			'<img class="e-avatar" src="assets/img/avatares/'+data.usuario_avatar+'" alt="User Avatar" style="width: 25px; height: 25px; padding-bottom: 4px">'+
		// 			'<strong> <?php echo $comentario['usuario']."-".$comentario['id_usuario']; ?></strong>'+
		// 			'<strong> '+data.usuario+'</strong>'+
		// 		'</a>'

		// 			);
		// 	});
		// });
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