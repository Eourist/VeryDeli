<!-- MODAL CREACIÓN VEHICULOS -->
<div class="modal fade" id="modal-alta-vehiculos" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" style="border-width: 0px;">
			<div class="modal-header e-modal-header">
				<h5 class="modal-title">Agregar un vehiculo</h5>
			</div>
			<form action="<?php echo $helper->url("usuario","crearVehiculo"); ?>" id="form-alta-vehiculos" method="post">
				<div class="modal-body e-modal-body">
					<div class="form-row">
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text e-input-addon"><i class="fas fa-car"></i></i></span>
									</div>
									<input type="text" class="form-control e-input" id="fv_patente" name="fv_patente" placeholder="Patente">
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group"> 
								<select id="fv_tipo" name="fv_tipo" class="form-control e-input e-select decorated">
									<option class="e-option" value="auto">Auto</option>
									<option class="e-option" value="moto">Moto</option>
									<option class="e-option" value="camioneta">Camioneta</option>
									<option class="e-option" value="camion">Camión</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<div class="input-group">
									<input type="text" class="form-control e-input" id="fv_marca" name="fv_marca" placeholder="Marca">
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<div class="input-group">
									<input type="text" class="form-control e-input" id="fv_modelo" name="fv_modelo" placeholder="Modelo">
								</div>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-12" style="">
							<button type="submit" class="btn btn-sm float-right e-card-btn e-right-btn"><i class="fas fa-check-circle"></i> Confirmar</button>
							<button type="button" class="btn btn-sm float-right e-card-btn e-left-btn" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- MODAL ELIMINACIÓN VEHICULOS -->
<div class="modal fade" id="modal-baja-vehiculo" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" style="border-width: 0px;">
			<div class="modal-header e-modal-header">
				<h5 class="w-100 text-center">¿Seguro que desea eliminar el vehiculo?</h5>
			</div>
			<form action="<?php echo $helper->url('usuario', 'eliminarVehiculo'); ?>" method="post">
				<div class="modal-body text-center  e-modal-body">
					<p>Se eliminará el vehiculo <span id="vehiculo-marca"></span> <span id="vehiculo-modelo"></span> (<span id="vehiculo-patente"></span>) de su perfil.</p>
				<!-- </div> -->
				<!-- <div class="modal-footer" style="padding-top: 0px; border-width: 0px;"> -->
					<div class="col-12 d-flex justify-content-center" style="padding: 0px;">
						<input type="hidden" id="id_vehiculo" name="id_vehiculo">
						<button type="button" class="btn btn-sm e-card-btn e-left-btn" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
						<button type="submit" class="btn btn-sm e-card-btn e-right-btn"><i class="fas fa-check-circle"></i> Confirmar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- MODAL ELIMINACIÓN POSTULACIONES -->
<div class="modal fade" id="modal-baja-postulacion" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" style="border-width: 0px;">
			<div class="modal-header e-modal-header">
				<h5 class="w-100 text-center">Eliminación</h5>
			</div>
			<form action="<?php echo $helper->url('publicacion', 'eliminarPostulacion'); ?>" method="post">
				<div class="modal-body text-center  e-modal-body">
					<p>¿Seguro que desea eliminar la postulación?</p>
				<!-- </div> -->
				<!-- <div class="modal-footer" style="padding-top: 0px; border-width: 0px;"> -->
					<div class="col-12 d-flex justify-content-center" style="padding: 0px;">
						<input type="hidden" id="fe_id_postulacion" name="fe_id_postulacion">
						<button type="button" class="btn btn-sm e-card-btn e-left-btn" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
						<button type="submit" class="btn btn-sm e-card-btn e-right-btn"><i class="fas fa-check-circle"></i> Confirmar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- MODAL ELIMINACIÓN PUBLICACIONES -->
<div class="modal fade" id="modal-baja-publicacion" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" style="border-width: 0px;">
			<div class="modal-header e-modal-header">
				<h5 class="w-100 text-center">Eliminación</h5>
			</div>
			<form action="<?php echo $helper->url('publicacion', 'eliminarPublicacion'); ?>" method="post">
				<div class="modal-body text-center  e-modal-body">
					<p>¿Seguro que desea eliminar la publicación? Se perderan todos los comentarios, postulantes y datos relacionados con ella.</p>
				<!-- </div> -->
				<!-- <div class="modal-footer" style="padding-top: 0px; border-width: 0px;"> -->
					<div class="col-12 d-flex justify-content-center" style="padding: 0px;">
						<input type="hidden" id="fe_id_publicacion" name="fe_id_publicacion">
						<button type="button" class="btn btn-sm e-card-btn e-left-btn" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
						<button type="submit" class="btn btn-sm e-card-btn e-right-btn"><i class="fas fa-check-circle"></i> Confirmar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- MODAL SELECCION DE AVATAR -->
<div class="modal fade" id="modal-seleccion-avatar" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content e-card-body" style="border-width: 0px;">
			<div class="modal-header e-modal-header">
				<h5 class="w-100 text-center">Personalizar Avatar</h5>
			</div>
			<form action="<?php echo $helper->url('usuario', 'cambiarAvatar'); ?>" method="post">
				<div class="modal-body text-center" style="max-height: 500px; overflow-y: scroll">
					<p>Seleccione un avatar para asignarlo a su perfil.</p>
					<div class="row">
					<?php for ($i = 1; $i <= 48; $i++) { 
						if ("av (".$i.")" != $usuario->avatar){
					?>
						<div class="col-3" style="padding: 5px;">
							<button type="button" id="btn-avatar-<?php echo $i; ?>" class="btn e-avatar-btn av-btn"><img src="assets/img/avatares/av (<?php echo $i; ?>).png" style="max-width: 100%"></button>
						</div>
					<?php } else { ?>
						<div class="col-3" style="padding: 5px;">
							<button  type="button" id="btn-avatar-<?php echo $i; ?>" class="btn e-avatar-btn av-btn focus active"><img src="assets/img/avatares/av (<?php echo $i; ?>).png" style="max-width: 100%"></button>
						</div>
					<?php }} ?>
				</div>
				</div>
				<div class="modal-footer" style="padding-top: 0px; border-width: 0px;">
					<div class="col-12 d-flex justify-content-center" style="padding: 0px;">
						<input type="hidden" id="f_avatar" name="f_avatar">
						<button type="button" class="btn btn-sm e-card-btn e-left-btn" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
						<button type="submit" class="btn btn-sm e-card-btn e-right-btn"><i class="fas fa-check-circle"></i> Confirmar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- CARD USUARIO -->
<div class="card e-card">
	<div class="card-header e-card-header">
		<?php if ($usuario->id == $_SESSION['id']) { ?>
		<h4 class="float-left" style="padding-left: 8px"><?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?> </h4>
		<?php } else { ?>
		<h4 class="float-left" style="padding-left: 8px"><?php echo $usuario->nombre." ".$usuario->apellido; ?> </h4>
		<?php } ?>
	</div>
	<div class="" id="post-body-1">
		<div class="card-body e-card-body" style="padding: 10px;">
			<div class="row">
				<div class="col-5 col-sm-4 col-md-3 col-lg-2" style="padding-left: 10px;">
					<?php if ($usuario->id == $_SESSION['id']) { ?>
					<button type="button" class="btn e-avatar-btn" data-toggle="modal" data-target="#modal-seleccion-avatar"><img class="e-avatar" src="assets/img/avatares/<?php echo $_SESSION['avatar']; ?>.png" alt="User Avatar"></button>
					<?php } else { ?>
					<img class="e-avatar" src="assets/img/avatares/<?php echo $usuario->avatar; ?>.png" alt="User Avatar">
					<?php } ?>
				</div>
				<div class="col-7 col-sm-8 col-md-9 col-lg-10" style="padding-left: 0px">
					<?php //echo '<pre>'; print_r($datos) ?>
					<div class="h-100 w-100 d-flex align-items-center justify-content-center">
						<div class="h-100 w-100">
							<div class="row h-50">
								<div class="col-6 col-lg-3 h-100 d-flex align-items-center text-justify text-center" style="padding-left: 0px">
									<p style="margin-bottom: 0px"><span class="badge e-card-badge badge-dark" style="width: 90px">E. Solicitados:</span><br class="d-md-none"> 
										<?php //echo $datos['cantidad_solicitante']; ?>
										<?php //echo round($datos['promedio_solicitante']*20).'% <i class="fas fa-star"></i> de '.$datos['cantidad_solicitante'] ?>
										<?php echo $datos['cantidad_solicitante'].' ('.round($datos['promedio_solicitante']*20).'%)'; ?>
									</p>
								</div>
								<div class="col-6 col-lg-3 h-100 d-flex align-items-center text-justify text-center" style="padding-left: 0px">
									<p style="margin-bottom: 0px"><span class="badge e-card-badge badge-dark" style="width: 90px">E. Realizados:</span><br class="d-md-none"> 
										<?php //echo $datos['cantidad_responsable']; ?>
										<?php //echo round($datos['promedio_responsable']*20).'% <i class="fas fa-star"></i> de '.$datos['cantidad_responsable'] ?>
										<?php echo $datos['cantidad_responsable'].' ('.round($datos['promedio_responsable']*20).'%)'; ?>
									</p>
								</div>
								<div class="col-6 d-none d-lg-flex h-100 align-items-center text-justify text-center" style="padding-left: 0px">
									<p style="margin-bottom: 0px"><span class="badge e-card-badge badge-dark" style="width: 90px">E. Totales:</span><br class="d-md-none"> 
										<?php// echo $datos['cantidad_total'].' ('.$datos['promedio'].'/5)' ?>
										<?php //echo round($datos['promedio']*20).'% <i class="fas fa-star"></i> de '.$datos['cantidad_total'] ?>
										<?php echo $datos['cantidad_total'].' ('.round($datos['promedio']*20).'%)'; ?>
									</p>
								</div>
							</div>
							<div class="row h-50">
								<div class="col-6 col-lg-3 h-100 d-flex align-items-center text-justify text-center" style="padding-left: 0px">
									<p style="margin-bottom: 0px"><span class="badge e-card-badge badge-dark" style="width: 90px">Reputacion:</span><br class="d-md-none"> <?php echo $datos['reputacion'];;//$reputacion; ?></p>
								</div>
								<div class="col-6 col-lg-3 h-100 d-flex align-items-center text-justify text-center" style="padding-left: 0px">
									<p style="margin-bottom: 0px"><span class="badge e-card-badge badge-dark" style="width: 90px">Registro:</span><br class="d-md-none"> <?php echo $usuario->fecha_registro; ?></p>
								</div>
								<div class="col-6 d-none d-lg-flex h-100 align-items-center text-justify text-center" style="padding-left: 0px">
									<p style="margin-bottom: 0px"><span class="badge e-card-badge badge-dark" style="width: 90px">Email:</span><br class="d-md-none"> <?php echo $usuario->email; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card-header e-card-header"></div>
</div>

<!-- CARD TABLA DE VEHICULOS -->
<div class="card e-card">
	<div class="card-header e-card-header">
		<h5>
			<?php 
			if ($usuario->id == $_SESSION['id']) {
				echo 'Administrar Vehiculos';
			} else {
				echo 'Vehiculos del usuario';
			}
			?>
		</h5>
	</div>
	<div class="" id="post-body-1">
		<div class="card-body e-card-body" style="padding: 10px;">
			<table class="table e-table">
				<thead>
					<tr>
						<th scope="col">Patente</th>
						<th scope="col">Tipo</th>
						<th scope="col" class="d-none d-sm-table-cell">Marca</th>
						<th scope="col" class="d-none d-sm-table-cell">Modelo</th>
						<?php if ($usuario->id == $_SESSION['id']) { ?>
						<th scope="col"><button type="button" class="btn btn-sm float-right e-card-btn" data-toggle="modal" data-target="#modal-alta-vehiculos"><i class="fas fa-plus"></i> <span class="d-none d-sm-inline">Nuevo</span></button></th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<?php 
						$vehiculos = new VehiculoModel();
						$vehiculos = $vehiculos->getBy("id_usuario", $usuario->id);

						if (isset($vehiculos)) {
							foreach ($vehiculos as $key => $value) { 
					?>
					<tr>
						<th scope="row"><?php echo $value->patente ?></th>
						<td><span class="badge badge-dark e-card-badge"><?php echo ucfirst($value->tipo) ?></span></td>
						<td class="d-none d-sm-table-cell"><?php echo $value->marca ?></td>
						<td class="d-none d-sm-table-cell"><?php echo $value->modelo ?></td>
						<?php if ($usuario->id == $_SESSION['id']) { ?>
						<td><button type="button" class="btn e-card-btn btn-sm float-right e-borrar-vehiculo-btn" data-toggle="modal" data-target="#modal-baja-vehiculo" 
							data-patente="<?php echo $value->patente ?>"
							data-marca="<?php echo $value->marca ?>"
							data-modelo="<?php echo $value->modelo ?>"
							data-tipo="<?php echo $value->tipo ?>"
							data-id="<?php echo $value->id ?>">
							<i class="fas fa-trash-alt"></i></button>
						</td>
						<?php } ?>
					</tr>
					<?php } } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- ACORDEON DE PUBLICACIONES, SOLICITUDES Y TRANSPORTES -->
<div id="acordeon-perfil">
	<!-- CARD PUBLICACIONES -->
	<div class="card e-card">
		<div class="card-header e-card-header">
			<h5>
				<?php if ($usuario->id == $_SESSION['id']) { echo 'Mis publicaciones'; } else { echo 'Publicaciones'; } ?>
				<a class="e-card-caret float-right" data-toggle="collapse" aria-expanded="false" data-target="#card-publicaciones"><i class="fas fa-angle-double-down"></i></a>
			</h5>
		</div>
		<div class="collapse" id="card-publicaciones" data-parent="#acordeon-perfil">
			<div class="card-body e-card-body" style="padding: 10px;">
				<p class="text-center  mb-0 mb-0">Aquí se muestran todas las publicaciones creadas por el usuario desde que se unió a VeryDeli</p>
				<?php foreach($publicaciones as $p) { ?>
					<div class="e-card-historial" style="padding-bottom: 8px">
						<?php if ($usuario->id == $_SESSION['id']) { ?>
							<button type="button" <?php if ($p['estado'] != 0) { echo 'disabled'; } ?>
									class="btn e-card-btn float-right btn-sm e-btn-candidatos" 
									style="height: 36px; margin-top: -5px; margin-right: -5px" 
									data-target="#modal-postulantes" 
									data-toggle="modal"
									data-id-publicacion="<?php echo $p['id']; ?>" 
									data-desde="<?php echo $p['id_direccion_origen'];//$dir_o['provincia']." > ".$dir_o['ciudad']; ?>" 
									data-hasta="<?php echo $p['id_direccion_destino'];//$dir_d['provincia']." > ".$dir_d['ciudad']; ?>" 
									data-salida="<?php echo date('d-m', strtotime($p['fecha_salida']))." a las ".date('H:i', strtotime($p['hora_salida']))." Hs"; ?>">
								<i class="fas fa-handshake"></i> 
								<span class="d-none d-md-inline">Candidatos</span>
							</button>
						<?php } else { ?>
							<button type="button" <?php if ($p['estado'] != 0) { echo 'disabled'; } ?>
									class="btn e-card-btn float-right btn-sm e-btn-postularse" 
									style="height: 36px; margin-top: -5px; margin-right: -5px" 
									data-target="#modal-postularse" 
									data-toggle="modal"
									data-id-publicacion="<?php echo $p['id']; ?>" 
									data-desde="<?php echo $p['provincia_origen']." > ".$p['ciudad_origen'];// $dir_o['provincia']." > ".$dir_o['ciudad']; ?>" 
									data-hasta="<?php echo $p['provincia_destino']." > ".$p['ciudad_destino'];// $dir_d['provincia']." > ".$dir_d['ciudad']; ?>" 
									data-salida="<?php echo date('d-m', strtotime($p['fecha_salida']))." a las ".date('H:i', strtotime($p['hora_salida']))." Hs"; ?>">
								<i class="fas fa-handshake"></i> 
								<span class="d-none d-md-inline">Postularse</span>
							</button>
						<?php } ?>
						<?php if ($usuario->id == $_SESSION['id']) { ?>
							<button type="button" class="btn e-card-btn btn-sm float-right e-borrar-publicacion-btn" style="height: 36px; margin-top: -5px; margin-right: 2px" data-toggle="modal" data-target="#modal-baja-publicacion" data-id="<?php echo $p['id']; ?>" <?php if ($p['estado'] != 0) {echo 'disabled';} ?>>
								<i class="fas fa-trash-alt"></i>
							</button>
						<?php } ?>
						<h6 class="mb-0">
							<?php if ($p['estado'] == 1) { ?>
								<span class="badge e-card-badge badge-dark">Cerrada</span> 
							<?php } else if ($p['estado'] == 2) { ?>
								<span class="badge e-card-badge badge-dark">Suspendida</span> 
							<?php } else { ?>
								<span class="badge e-card-badge badge-dark">Abierta</span> 
							<?php } ?>
							<a href="<?php echo $helper->url('publicacion', 'publicacion').'&id_publicacion='.$p['id']; ?>" style="color: black"><?php echo $p['titulo']; ?></a>
						</h6>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

	<!-- CARD POSTULACIONES -->
	<div class="card e-card">
		<div class="card-header e-card-header">
			<h5>
				<?php if ($usuario->id == $_SESSION['id']) { echo 'Mis postulaciones'; } else { echo 'Postulaciones'; } ?>
				<a class="e-card-caret float-right" data-toggle="collapse" aria-expanded="false" data-target="#card-postulaciones"><i class="fas fa-angle-double-down"></i></a>
			</h5>
		</div>
		<div class="collapse" id="card-postulaciones" data-parent="#acordeon-perfil">
			<div class="card-body e-card-body" style="padding: 10px;">
				<p class="text-center  mb-0 mb-0">Aquí se muestran todas las publicaciones a las que el usuario se postuló</p>
				<?php foreach($postulaciones as $p) { ?>
					<div class="e-card-historial" style="padding-bottom: 8px">
						<?php if ($p['id_usuario'] == $_SESSION['id']) { ?>
							<!-- <button type="button" <?php /*if ($p['estado'] != 0) { echo 'disabled'; } ?>
									class="btn e-card-btn float-right btn-sm e-btn-candidatos" 
									style="height: 36px; margin-top: -5px; margin-right: -5px" 
									data-target="#modal-postulantes" 
									data-toggle="modal"
									data-id-publicacion="<?php echo $p['id']; ?>" 
									data-desde="<?php echo $p['id_direccion_origen'];//$dir_o['provincia']." > ".$dir_o['ciudad']; ?>" 
									data-hasta="<?php echo $p['id_direccion_destino'];//$dir_d['provincia']." > ".$dir_d['ciudad']; ?>" 
									data-salida="<?php echo date('d-m', strtotime($p['fecha_salida']))." a las ".date('H:i', strtotime($p['hora_salida']))." Hs"; ?>">
								<i class="fas fa-handshake"></i> 
								<span class="d-none d-md-inline">Candidatos</span>
							</button> -->
						<?php } else { ?>
							<!-- <button type="button" <?php if ($p['estado'] != 0) { echo 'disabled'; } ?>
									class="btn e-card-btn float-right btn-sm e-btn-postularse" 
									style="height: 36px; margin-top: -5px; margin-right: -5px" 
									data-target="#modal-postularse" 
									data-toggle="modal"
									data-id-publicacion="<?php echo $p['id']; ?>" 
									data-desde="<?php echo $p['id_direccion_origen'];// $dir_o['provincia']." > ".$dir_o['ciudad']; ?>" 
									data-hasta="<?php echo $p['id_direccion_destino'];// $dir_d['provincia']." > ".$dir_d['ciudad']; ?>" 
									data-salida="<?php echo date('d-m', strtotime($p['fecha_salida']))." a las ".date('H:i', strtotime($p['hora_salida']))." Hs"*/; ?>">
								<i class="fas fa-handshake"></i> 
								<span class="d-none d-md-inline">Postularse</span>
							</button> -->
						<?php } ?>
						<?php if ($usuario->id == $_SESSION['id']) { ?>
							<button type="button" class="btn e-card-btn btn-sm float-right e-borrar-postulacion-btn" style="height: 36px; margin-top: -5px; margin-right: -5px"  data-toggle="modal" data-target="#modal-baja-postulacion" data-id="<?php echo $p['id_postulacion']; ?>" <?php if ($p['estado'] != 0) {echo 'disabled';}?>>
								<i class="fas fa-trash-alt"></i>
							</button>
						<?php } ?>
						<span style="float: right; margin-right: 10px;">$<?php echo $p['precio']; ?></span>
						<h6 class="mb-0">
							<?php if ($p['estado'] == 1) { ?>
								<span class="badge e-card-badge badge-dark">Cerrada</span> 
							<?php } else if ($p['estado'] == 2) { ?>
								<span class="badge e-card-badge badge-dark">Suspendida</span> 
							<?php } else { ?>
								<span class="badge e-card-badge badge-dark">Abierta</span> 
							<?php } ?>
							<a href="<?php echo $helper->url('publicacion', 'publicacion').'&id_publicacion='.$p['id']; ?>" style="color: black"><?php echo $p['titulo']; ?></a>
						</h6>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

	<!-- CARD SOLICITUDES -->
	<div class="card e-card">
		<div class="card-header e-card-header">
			<h5>
				<?php if ($usuario->id == $_SESSION['id']) { echo 'Mis pedidos'; } else { echo 'Pedidos'; } ?>
				<a class="e-card-caret float-right" data-toggle="collapse" aria-expanded="false" data-target="#card-solicitudes"><i class="fas fa-angle-double-down"></i></a>
			</h5>
		</div>
		<div class="collapse" id="card-solicitudes" data-parent="#acordeon-perfil">
			<div class="card-body e-card-body" style="padding: 10px;">
				<p class="text-center mb-0">Aquí se muestran todos los enviós solicitados por el usuario</p>
				<!-- envio.confirmaciones (2)
				envio.comentarios (2)
				envio.calificaciones (2)
				publicacion.titulo
				publicacion.id
				usuario.avatares (2)
				usuario.nombres (2)
				usuario.ids (2) -->
				<?php foreach($solicitudes as $s) { ?>
				<div class="e-card-historial">
						<?php if ($s['envio']['confirmacion_responsable'] == 1 && $s['envio']['confirmacion_solicitante'] == 1) { ?>
							<span class="float-right">recibido el <?php echo date('d-m-y', strtotime($s['envio']['fecha'])); ?></span>
						<?php } else if ($usuario->id == $_SESSION['id']) { ?>
						<button type="button" class="btn e-card-btn float-right e-btn-confirmacion-envio" data-target="#modal-confirmacion-envio" data-toggle="modal" data-usuario="sol" data-id-envio="<?php echo $s['envio']['id']; ?>" style=""><i class="fas fa-file-signature"></i> <span class="d-none d-md-inline">Recibir</span></button>
						<?php } else { ?>
							<span class="float-right">no recibido</span>
						<?php } ?>
						<h6><span class="badge e-card-badge badge-dark"><?php if ($s['envio']['confirmacion_responsable'] == 1 && $s['envio']['confirmacion_solicitante']) { echo "Recibido"; } else { echo "A la espera"; } ?></span> <a href="<?php echo $helper->url('publicaciones','publicacion').'&id_publicacion='.$s['publicacion']['id']; ?>" style="color: black"><br class="d-sm-none"><?php echo $s['publicacion']['titulo']; ?></a></h6>

						<div class="e-divider"></div>

						<div class="row">
							<div class="col-5 col-sm-5 col-md-5 col-lg-3">
								<span class="text-center d-none d-sm-inline-block" style="width: 90px;">Responsable</span>
								<a href="<?php echo $helper->url('usuario', 'perfil').'&id_usuario='.$s['responsable']['id']; ?>" class="e-com-userlink">
									<img class="e-avatar" src="assets/img/avatares/<?php echo $s['responsable']['avatar']; ?>.png" alt="User Avatar" style="width: 25px; height: 25px; padding-bottom: 4px">
									<strong> <?php echo $s['responsable']['nombre']; ?></strong>
								</a>
							</div>
							<div class="col-2 col-sm-3 col-md-3 col-lg-2">
								<?php if ($s['envio']['confirmacion_responsable'] == 1) { ?>
								<p style=""><span class="d-none d-sm-inline">Entregado </span><i class="fas fa-check"></i></p>
								<?php } else { ?>
								<p style=""><span class="d-none d-sm-inline">Pendiente </span><i class="fas fa-clock"></i></p>
								<?php } ?>
							</div>
							<div class="col-3 col-sm-2 col-md-3 col-lg-2">
								<span class="d-none d-md-inline">
									<?php for ($i = 0; $i < $s['envio']['calificacion_responsable']; $i++) { ?>
									<i class="fas fa-star"></i>
									<?php } ?>
									<?php for ($i = 0; $i < (5-$s['envio']['calificacion_responsable']); $i++) { ?>
									<i class="far fa-star"></i>
									<?php } ?>
								</span>
								<span class="d-inline d-md-none">
									<p><?php echo $s['envio']['calificacion_responsable']; ?>/5 <i class="fas fa-star"></i></p>
								</span>
							</div>
							<div class="col-1 col-sm-1 col-md-1 col-lg-5">
								<?php if ($s['envio']['comentario_responsable'] != NULL) { ?>
								<i class="fas fa-comment-alt" data-toggle="tooltip" title="<?php echo $s['envio']['comentario_responsable']; ?>"></i>
								<p class="d-none d-lg-inline"><?php echo $s['envio']['comentario_responsable']; ?></p>
								<?php } else { ?>
								<i class="fas fa-comment-alt" data-toggle="tooltip" title="Sin comentario."></i>
								<p class="d-none d-lg-inline">Sin comentario.</p>
								<?php } ?>
							</div>
						</div>

						<div class="row">
							<div class="col-5 col-sm-5 col-md-5 col-lg-3">
								<span class="text-center d-none d-sm-inline-block" style="width: 90px;">Solicitante</span>
								<a href="<?php echo $helper->url('usuario', 'perfil').'&id_usuario='.$s['solicitante']['id']; ?>" class="e-com-userlink">
									<img class="e-avatar" src="assets/img/avatares/<?php echo $s['solicitante']['avatar']; ?>.png" alt="User Avatar" style="width: 25px; height: 25px; padding-bottom: 4px">
									<strong> <?php echo $s['solicitante']['nombre']; ?></strong> 
								</a>
							</div>
							<div class="col-2 col-sm-3 col-md-3 col-lg-2">
								<?php if ($s['envio']['confirmacion_solicitante'] == 1) { ?>
								<p style=""><span class="d-none d-sm-inline">Entregado </span><i class="fas fa-check"></i></p>
								<?php } else { ?>
								<p style=""><span class="d-none d-sm-inline">Pendiente </span><i class="fas fa-clock"></i></p>
								<?php } ?>
							</div>
							<div class="col-3 col-sm-2 col-md-3 col-lg-2">
								<span class="d-none d-md-inline">
									<?php for ($i = 0; $i < $s['envio']['calificacion_solicitante']; $i++) { ?>
									<i class="fas fa-star"></i>
									<?php } ?>
									<?php for ($i = 0; $i < (5-$s['envio']['calificacion_solicitante']); $i++) { ?>
									<i class="far fa-star"></i>
									<?php } ?>
								</span>
								<span class="d-inline d-md-none">
									<p><?php echo $s['envio']['calificacion_solicitante']; ?>/5 <i class="fas fa-star"></i></p>
								</span>
							</div>
							<div class="col-1 col-sm-1 col-md-1 col-lg-5">
								<?php if ($s['envio']['comentario_solicitante'] != NULL) { ?>
								<i class="fas fa-comment-alt" data-toggle="tooltip" title="<?php echo $s['envio']['comentario_solicitante']; ?>"></i>
								<p class="d-none d-lg-inline"><?php echo $s['envio']['comentario_solicitante']; ?></p>
								<?php } else { ?>
								<i class="fas fa-comment-alt" data-toggle="tooltip" title="Sin comentario."></i>
								<p class="d-none d-lg-inline">Sin comentario.</p>
								<?php } ?>
							</div>
						</div>
				</div>
				<?php } ?>
				<?php //echo '<pre>'; print_r($solicitudes); ?>
			</div>
		</div>
	</div>

	<!-- CARD TRANSPORTES -->
	<div class="card e-card">
		<div class="card-header e-card-header">
			<h5>
				<?php if ($usuario->id == $_SESSION['id']) { echo 'Mis transportes'; } else { echo 'Transportes'; } ?>
				<a class="e-card-caret float-right" data-toggle="collapse" aria-expanded="false" data-target="#card-transportes"><i class="fas fa-angle-double-down"></i></a>
			</h5>
		</div>
		<div class="collapse" id="card-transportes" data-parent="#acordeon-perfil">
			<div class="card-body e-card-body" style="padding: 10px;">
				<p class="text-center mb-0">Aquí se muestran todos los transportes realizados o a realizar por el usuario</p>
				<?php foreach($transportes as $t) { ?>
				<div class="e-card-historial">
						<?php if ($t['envio']['confirmacion_responsable'] == 1 && $t['envio']['confirmacion_solicitante'] == 1) { ?>
							<span class="float-right">entregado el <?php echo date('d-m-y', strtotime($t['envio']['fecha'])); ?></span>
						<?php } else if ($usuario->id == $_SESSION['id'] || true) { ?>
							<?php if ($t['envio']['confirmacion_responsable'] == 1) { ?>
								<span class="float-right">entregado</span>
							<?php } else { ?>
							<button type="button" class="btn e-card-btn float-right e-btn-confirmacion-envio" data-target="#modal-confirmacion-envio" data-toggle="modal" data-usuario="res" data-id-envio="<?php echo $t['envio']['id']; ?>" style=""><i class="fas fa-file-signature"></i> <span class="d-none d-md-inline">Entregar</span></button>
							<?php } ?>
						<?php } else { ?>
							<span class="float-right">no entregado</span>
						<?php } ?>
						<h6><span class="badge e-card-badge badge-dark"><?php if ($t['envio']['confirmacion_responsable'] == 1 && $t['envio']['confirmacion_solicitante']) { echo "Entregado"; } else { echo "A la espera"; } ?></span> <a href="<?php echo $helper->url('publicaciones','publicacion').'&id_publicacion='.$t['publicacion']['id']; ?>" style="color: black"><br class="d-sm-none"><?php echo $t['publicacion']['titulo']; ?></a></h6>

						<div class="e-divider"></div>

						<div class="row">
							<div class="col-5 col-sm-5 col-md-5 col-lg-3">
								<span class="text-center d-none d-sm-inline-block" style="width: 90px;">Responsable</span>
								<a href="<?php echo $helper->url('usuario', 'perfil').'&id_usuario='.$t['responsable']['id']; ?>" class="e-com-userlink">
									<img class="e-avatar" src="assets/img/avatares/<?php echo $t['responsable']['avatar']; ?>.png" alt="User Avatar" style="width: 25px; height: 25px; padding-bottom: 4px">
									<strong> <?php echo $t['responsable']['nombre']; ?></strong>
								</a>
							</div>
							<div class="col-2 col-sm-3 col-md-3 col-lg-2">
								<?php if ($t['envio']['confirmacion_responsable'] == 1) { ?>
								<p style=""><span class="d-none d-sm-inline">Entregado </span><i class="fas fa-check"></i></p>
								<?php } else { ?>
								<p style=""><span class="d-none d-sm-inline">Pendiente </span><i class="fas fa-clock"></i></p>
								<?php } ?>
							</div>
							<div class="col-3 col-sm-2 col-md-3 col-lg-2">
								<span class="d-none d-md-inline">
									<?php for ($i = 0; $i < $t['envio']['calificacion_responsable']; $i++) { ?>
									<i class="fas fa-star"></i>
									<?php } ?>
									<?php for ($i = 0; $i < (5-$t['envio']['calificacion_responsable']); $i++) { ?>
									<i class="far fa-star"></i>
									<?php } ?>
								</span>
								<span class="d-inline d-md-none">
									<p><?php echo $t['envio']['calificacion_responsable']; ?>/5 <i class="fas fa-star"></i></p>
								</span>
							</div>
							<div class="col-1 col-sm-1 col-md-1 col-lg-5">
								<?php if ($t['envio']['comentario_responsable'] != NULL) { ?>
								<i class="fas fa-comment-alt" data-toggle="tooltip" title="<?php echo $t['envio']['comentario_responsable']; ?>"></i>
								<p class="d-none d-lg-inline"><?php echo $t['envio']['comentario_responsable']; ?></p>
								<?php } else { ?>
								<i class="fas fa-comment-alt" data-toggle="tooltip" title="Sin comentario."></i>
								<p class="d-none d-lg-inline">Sin comentario.</p>
								<?php } ?>
							</div>
						</div>

						<div class="row">
							<div class="col-5 col-sm-5 col-md-5 col-lg-3">
								<span class="text-center d-none d-sm-inline-block" style="width: 90px;">Solicitante</span>
								<a href="<?php echo $helper->url('usuario', 'perfil').'&id_usuario='.$t['solicitante']['id']; ?>" class="e-com-userlink">
									<img class="e-avatar" src="assets/img/avatares/<?php echo $t['solicitante']['avatar']; ?>.png" alt="User Avatar" style="width: 25px; height: 25px; padding-bottom: 4px">
									<strong> <?php echo $t['solicitante']['nombre']; ?></strong> 
								</a>
							</div>
							<div class="col-2 col-sm-3 col-md-3 col-lg-2">
								<?php if ($t['envio']['confirmacion_solicitante'] == 1) { ?>
								<p style=""><span class="d-none d-sm-inline">Entregado </span><i class="fas fa-check"></i></p>
								<?php } else { ?>
								<p style=""><span class="d-none d-sm-inline">Pendiente </span><i class="fas fa-clock"></i></p>
								<?php } ?>
							</div>
							<div class="col-3 col-sm-2 col-md-3 col-lg-2">
								<span class="d-none d-md-inline">
									<?php for ($i = 0; $i < $t['envio']['calificacion_solicitante']; $i++) { ?>
									<i class="fas fa-star"></i>
									<?php } ?>
									<?php for ($i = 0; $i < (5-$t['envio']['calificacion_solicitante']); $i++) { ?>
									<i class="far fa-star"></i>
									<?php } ?>
								</span>
								<span class="d-inline d-md-none">
									<p><?php echo $t['envio']['calificacion_solicitante']; ?>/5 <i class="fas fa-star"></i></p>
								</span>
							</div>
							<div class="col-1 col-sm-1 col-md-1 col-lg-5">
								<?php if ($t['envio']['comentario_solicitante'] != NULL) { ?>
								<i class="fas fa-comment-alt" data-toggle="tooltip" title="<?php echo $t['envio']['comentario_solicitante']; ?>"></i>
								<p class="d-none d-lg-inline"><?php echo $t['envio']['comentario_solicitante']; ?></p>
								<?php } else { ?>
								<i class="fas fa-comment-alt" data-toggle="tooltip" title="Sin comentario."></i>
								<p class="d-none d-lg-inline">Sin comentario.</p>
								<?php } ?>
							</div>
						</div>
				</div>
				<?php } ?>
				<?php //echo '<pre>'; print_r($transportes); ?>
			</div>
		</div>
	</div>
</div>

<!-- MODAL RECIBIR/ENTREGAR (CONFIRMACION ENVIO) -->
<div class="modal fade" id="modal-confirmacion-envio" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" style="border-width: 0px;">
			<div class="modal-header e-modal-header">
				<h5 class="w-100 text-center">Confirmación de envio entregado</h5>
			</div>
			<form action="<?php echo $helper->url('publicaciones', 'confirmarEnvio'); ?>" id="form-confirmacion-envio" method="post">
				<div class="modal-body text-center e-modal-body">
					<p id="e-mce-pregunta"></p>
					<p>A continuacion puede dejar un comentario y una valoración al otro usuario participante del envio (no obligatorio)</p>
					<div class="form-row">
						<div class="col-12">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text e-input-addon"><i class="fas fa-comment-alt"></i></i></span>
									</div>
									<input type="text" class="form-control e-input" id="fce_comentario" name="fce_comentario" placeholder="Comentario">
								</div>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-12 col-md-6">
							<div class="form-group"> 
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text e-input-addon"><i class="fas fa-star"></i></i></span>
									</div>
									<select id="fce_valoracion" name="fce_valoracion" class="form-control e-input e-select decorated">
										<option class="e-option" value="1">1/5 (Pésimo)</option>
										<option class="e-option" value="2">2/5 (Malo)</option>
										<option class="e-option" value="3" selected>3/5 (Normal)</option>
										<option class="e-option" value="4">4/5 (Bueno)</option>
										<option class="e-option" value="5">5/5 (Excelente)</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6">
						<input type="hidden" id="fce_id_envio" name="fce_id_envio">
						<input type="hidden" id="fce_confirmacion_responsable" name="fce_confirmacion_responsable">
						<input type="hidden" id="fce_confirmacion_solicitante" name="fce_confirmacion_solicitante">
							<span class="float-right">
								<button type="button" class="btn btn-sm e-card-btn e-left-btn" data-dismiss="modal" style="margin-right: -5px"><i class="fas fa-times"></i> Cancelar</button>
								<button type="submit" class="btn btn-sm e-card-btn e-right-btn"><i class="fas fa-check-circle"></i> Confirmar</button>
							</span>
						</div>
					</div>
					<!-- <div class="form-row">
						<div class="col-12" style="">
							<button type="submit" class="btn btn-sm float-right e-card-btn e-right-btn"><i class="fas fa-check-circle"></i> Confirmar</button>
							<button type="button" class="btn btn-sm float-right e-card-btn e-left-btn" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
						</div>
					</div>
					<div class="col-12 d-flex justify-content-center" style="padding: 0px;">
						<input type="hidden" id="id_vehiculo" name="id_vehiculo">
						<button type="button" class="btn btn-sm e-card-btn e-left-btn" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
						<button type="submit" class="btn btn-sm e-card-btn e-right-btn"><i class="fas fa-check-circle"></i> Confirmar</button>
					</div> -->
				</div>
			</form>
		</div>
	</div>
</div>