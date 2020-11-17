jQuery(document).ready(function($) {
	$(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});

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
	
	// CARGAR DATOS DE LA POSTULACION EN EL MODAL DE ELIMINACION
	$('.e-borrar-postulacion-btn').click(function(event) {
		let id 	= $(this).data('id');

		$('#fe_id_postulacion').val(id);
	});
	
	// CARGAR DATOS DE LA PUBLICACION EN EL MODAL DE ELIMINACION
	$('.e-borrar-publicacion-btn').click(function(event) {
			let id 	= $(this).data('id');console.log("eliminar publicacion " + id);
		$('#fe_id_publicacion').val(id);
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
				$('#e-mp-info').html('<p>Actualmente no hay nadie postulado en esta publicación</p>');
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
			if(data.datos.cantidad > 0){
				let html = "";
				data.postulantes.forEach(function(item, index){
					let responsable = "Responsable";
					// html += item.id_postulacion + " <br> ";
					/*

					<div class="e-postulacion w-100">
						<div class="col-12 pl-0 pr-0">
							<span class="badge badge-dark e-card-badge">Responsable </span> <a href="index.php?controller=usuario&action=perfil&id_usuario=4" class="e-com-userlink"><img src="assets/img/avatares/av (1).png" class="e-av-postulante"> Usuario</a>
							<span style="float: right;">$2300 <button type="button" class="btn e-card-btn e-postulante-btn"><i class="fas fa-handshake"></i></button></span>
						</div>
						<div class="col-12 pl-0 mt-2">
							<p style="margin-bottom: 0px"><span class="badge badge-dark e-card-badge">Camioneta</span> Ford Eco-Sport 2015</p>
						</div>
					</div>
					
					*/
					html += '<div class="e-postulacion w-100">';
					html += 	'<div class="col-12 pl-0 pr-0">';
					html += 		'<span class="badge badge-dark e-card-badge">'+responsable+'</span> <a href="index.php?controller=usuario&action=perfil&id_usuario='+item.id_usuario+'" class="e-com-userlink"><img src="assets/img/avatares/'+item.avatar_usuario+'.png" class="e-av-postulante"> '+item.nombre_usuario+'</a>';
					html += 		'<span style="float: right;">$'+item.precio_postulacion+' ';
					html +=				'<button type="button" data-toggle="modal" data-target="#modal-confirmacion" class="btn e-card-btn e-postulante-btn" data-id-usuario="'+item.id_usuario+'" data-usuario="'+item.nombre_usuario+'" data-id-postulacion="'+item.id_postulacion+'" data-avatar="'+item.avatar_usuario+'">';
					html +=					'<i class="fas fa-handshake"></i>';
					html +=				'</button>';
					html +=			'</span>';
					html +=		'</div>';
					html +=		'<div class="col-12 pl-0 mt-2">';
					html +=			'<p style="margin-bottom: 0px"><span class="badge badge-dark e-card-badge">'+item.tipo_vehiculo.charAt(0).toUpperCase() + item.tipo_vehiculo.slice(1)+'</span> '+item.marca_vehiculo + ' ' + item.modelo_vehiculo + '</p>';
					html +=		'</div>';
					html +=	'</div>';
				});
				$('#e-mpo-listado').html(html);
				$('#e-mpo-info').html('Actualmente hay <strong id="e-mpo-postulaciones">'+data.datos.cantidad+'</strong> usuarios postulados <br> Por un precio mínimo de <strong id="e-mpo-precio">$'+data.datos.precio_minimo+'</strong>');
			} else {
				$('#e-mpo-listado').html('');
				$('#e-mpo-info').html('Actualmente no hay ningun usuario postulado.');
			}
		});

		$('#e-mpo-listado').on('click', '.e-postulante-btn', function(event) {
			let nombre_usuario 	= $(this).data('usuario');
			let id_usuario 		= $(this).data('id-usuario');
			let avatar_usuario 	= $(this).data('avatar');
			let id_postulacion 	= $(this).data('id-postulacion');

			console.log("Usuario " + nombre_usuario);
			console.log("Avatar " + avatar_usuario);
			console.log("Post " + id_postulacion);

			$('#fcp_id_postulacion').val(id_postulacion);
			$('#e-mcp-info').html('<h6 class="text-center">¿Estas seguro de que quieres aceptar al postulante <a href="index.php?controller=usuario&action=perfil&id_usuario='+id_usuario+'" class="e-com-userlink"><img src="assets/img/avatares/'+avatar_usuario+'.png" class="e-av-postulante" id="e-mcp-avatar"> <span id="e-mcp-usuario">'+nombre_usuario+'</span></a> para realizar el envío?</h6>')
		});

		// fcp_id_postulacion e-mcp-avatar e-mcp-usuario
	});

	// CARGAR DATOS DEL ENVIO EN EL MODAL DE CONFIRMACION
	$('.e-btn-confirmacion-envio').click(function(event) {
		let usuario = $(this).data('usuario');
		let id_envio = $(this).data('id-envio');

		if (usuario == "res"){
			$('#e-mce-pregunta').html("¿Quiere marcar este envio como entregado? <br> Solo confirme si puede asegurar que el cliente recibió el paquete.");
			$('#fce_confirmacion_responsable').val(1);
			$('#fce_confirmacion_solicitante').val(0);
		} else {
			$('#e-mce-pregunta').html("¿Quiere marcar este envio como recibido? <br> Solo debe confirmar si ya tiene el paquete en sus manos.");
			$('#fce_confirmacion_responsable').val(0);
			$('#fce_confirmacion_solicitante').val(1);
		}

		$('#fce_id_envio').val(id_envio);
	});


	// SELECTS DE PROVINCIAS EN FORMULARIO DE PUBLICACIONES
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

		// FORUMULARIO DE BUSQUEDA
		$('#fb_id_provincia').change(function(event) {
			let id_provincia = $(this).val();

			$.ajax({
				url: 'index.php?controller=publicacion&action=getCiudades',
				type: 'POST',
				data: {id_provincia: id_provincia},
			})
			.done(function(data) {
				data = jQuery.parseJSON(data);
				$('#fb_id_ciudad').html('<option class="e-option" value="0" selecter>Cualquiera</option>');
				
				data.forEach(function(item, index){
					$('#fb_id_ciudad').append('<option class="e-option" value="'+item.id+'">'+item.nombre+'</option>');
				});
			});
		});
	// FIN SELECTS DE PROVINCIAS EN FORMULARIO DE PUBLICACIONES

	// VALIDACION DE FORMULARIOS
		$('#form-inicio-sesion').validate({
			rules: {
				fl_email: {
					email: true,
					required: true,
					"remote":
					{
						url: 'index.php?controller=usuario&action=verificarEmail',
						type: "post",
						data:
						{
							email: function()
							{
								return $('#form-inicio-sesion :input[name="fl_email"]').val();
							}
						}
					}
				},
				fl_contraseña: {
					required: true
				}
			},
			messages: {
				fl_email: {
					email: "E-mail inválido",
					required: "Campo obligatorio",
					remote: "E-mail no registrado"
				},
				fl_contraseña: {
					required: "Campo obligatorio"
				}
			},
			errorPlacement: function(error, element) {
				error.insertAfter(element.parent());
			},
			onkeyup: false
		});

		$('#form-registro').validate({
			rules: {
				fs_nombre: {
					required: true,
					maxlength: 30
				},
				fs_apellido: {
					required: true,
					maxlength: 30
				},
				fs_email: {
					email: true,
					required: true,
					maxlength: 30,
					"remote":
					{
						url: 'index.php?controller=usuario&action=verificarEmailInv',
						type: "post",
						data:
						{
							email: function()
							{
								return $('#form-registro :input[name="fs_email"]').val();
							}
						}
					}
				},
				fs_dni: {
					digits: true,
					number: true,
					required: true,
					minlength: 8,
					maxlength: 8,
					"remote":
					{
						url: 'index.php?controller=usuario&action=verificarDni',
						type: "post",
						data:
						{
							dni: function()
							{
								return $('#form-registro :input[name="fs_dni"]').val();
							}
						}
					}
				},
				fs_contraseña: {
					required: true,
					maxlength: 30
				}
			},
			messages: {
				fs_nombre: {
					required: "Campo obligatorio",
					maxlength: "Máximo 30 caracteres"
				},
				fs_apellido: {
					required: "Campo obligatorio",
					maxlength: "Máximo 30 caracteres"
				},
				fs_email: {
					email: "E-mail inválido",
					required: "Campo obligatorio",
					maxlength: "Máximo 30 caracteres",
					remote: "E-mail ya registrado"
				},
				fs_dni: {
					digits: "Solo dígitos",
					number: "Solo dígitos",
					required: "Campo obligatorio",
					minlength: "Mínimo 8 dígitos",
					maxlength: "Máximo 8 dígitos",
					remote: "DNI ya registrado"			
				},
				fs_contraseña: {
					required: "Campo obligatorio",
					maxlength: "Máximo 30 caracteres"
				}
			},
			errorPlacement: function(error, element) {
				error.insertAfter(element.parent());
			}
		});

		$('#form-alta-vehiculos').validate({
			rules: {
				fv_patente: {
					required: true,
					minlength: 7,
					maxlength: 10
				},
				fv_marca: {
					required: true,
					minlength: 2,
					maxlength: 20
				},
				fv_modelo: {
					required: true,
					minlength: 2,
					maxlength: 20
				}
			},
			messages: {
				fv_patente: {
					required: "Campo obligatorio",
					minlength: "Mínimo 7 caracteres",
					maxlength: "Máximo 8 caracteres"
				},
				fv_marca: {
					required: "Campo obligatorio",
					minlength: "Mínimo 2 caracteres",
					maxlength: "Máximo 20 caracteres"
				},
				fv_modelo: {
					required: "Campo obligatorio",
					minlength: "Mínimo 2 caracteres",
					maxlength: "Máximo 20 caracteres"
				}
			},
			errorPlacement: function(error, element) {
				error.insertAfter(element.parent());
			}
		});

		$('#form-confirmacion-envio').validate({
			rules: {
				fce_comentario: {
					maxlength: 50
				}
			},
			messages: {
				fce_comentario: {
					maxlength: "Máximo 50 caracteres"
				}
			},
			errorPlacement: function(error, element) {
				error.insertAfter(element.parent());
			}
		});

		$('#form-postulacion').validate({
			rules: {
				fp_precio: {
					required: true,
					number: true
				},
				fp_id_vehiculo: {
					required: true
				}
			},
			messages: {
				fp_precio: {
					required: "Campo obligatorio",
					number: "Solo números"
				},
				fp_id_vehiculo: {
					required: "Seleccione un vehiculo"
				}
			},
			errorPlacement: function(error, element) {
				error.insertAfter(element.parent());
			}
		});

		jQuery.validator.addMethod("mayorQueCero", function(value, element) {
			return this.optional(element) || (parseFloat(value) > 0);
		}, "Debe ser mayor a 0");


		jQuery.validator.addMethod("fechaFutura", function(value, element) {
			var today = new Date();
			var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
			console.log(value);
			console.log(date);
			return this.optional(element) || (value > date);
		}, "La fecha no puede ser anterior o igual a la de hoy");

		$("#form-publicaciones").validate({
			rules: {
				fp_titulo: {
					required: true,
					minlength: 20,
					maxlength: 100
				},
				fp_fecha_salida: {
					required: true,
					fechaFutura: true
				},
				fp_hora_salida: {
					required: true
				},
				fp_medida_peso: {
					required: true,
					maxlength: 5,
					mayorQueCero: true
				},
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