<!-- MODAL CREACIÓN VEHICULOS -->
<div class="modal fade" id="modal-alta-vehiculos" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" style="border-width: 0px;">
			<div class="modal-header e-modal-header">
				<h5 class="modal-title">Agregar un vehiculo</h5>
			</div>
			<form action="<?php echo $helper->url("usuario","crearVehiculo"); ?>" method="post">
				<div class="modal-body">
					<div class="form-row">
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text e-input-addon"><i class="fas fa-car"></i></i></span>
									</div>
									<input type="text" class="form-control e-input" id="fv_patente" name="fv_patente" placeholder="Patente" required>
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
								<input type="text" class="form-control e-input" id="fv_marca" name="fv_marca" placeholder="Marca" required>
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control e-input" id="fv_modelo" name="fv_modelo" placeholder="Modelo" required>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer" style="padding-top: 0px; border-width: 0px;">
					<div class="col-12" style="padding: 0px;">
						<button type="submit" class="btn btn-sm float-right e-card-btn e-right-btn"><i class="fas fa-check-circle"></i> Confirmar</button>
						<button type="button" class="btn btn-sm float-right e-card-btn e-left-btn" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
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
				<div class="modal-body text-center">
					<p>Se eliminará el vehiculo <span id="vehiculo-marca"></span> <span id="vehiculo-modelo"></span> (<span id="vehiculo-patente"></span>) de su perfil.</p>
				</div>
				<div class="modal-footer" style="padding-top: 0px; border-width: 0px;">
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

<!-- MODAL SELECCION DE AVATAR -->
<div class="modal fade" id="modal-seleccion-avatar" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" style="border-width: 0px;">
			<div class="modal-header e-modal-header">
				<h5 class="w-100 text-center">Personalizar Avatar</h5>
			</div>
			<form action="<?php echo $helper->url('usuario', 'cambiarAvatar'); ?>" method="post">
				<div class="modal-body text-center">
					<p>Seleccione un avatar para asignarlo a su perfil.</p>
					<div class="row">
					<?php for ($i = 1; $i <= 48; $i++) { 
						if ("av (".$i.")" == $_SESSION['avatar']){
					?>
						<div class="col-3" style="padding: 5px;">
							<button  type="button" id="btn-avatar-<?php echo $i; ?>" class="btn e-avatar-btn av-btn focus active"><img src="assets/img/avatares/av (<?php echo $i; ?>).png" style="max-width: 100%"></button>
						</div>
					<?php } else { ?>
						<div class="col-3" style="padding: 5px;">
							<button type="button" id="btn-avatar-<?php echo $i; ?>" class="btn e-avatar-btn av-btn"><img src="assets/img/avatares/av (<?php echo $i; ?>).png" style="max-width: 100%"></button>
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
		<h4 class="float-left" style="padding-left: 8px"><?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?> </h4>
	</div>
	<div class="" id="post-body-1">
		<div class="card-body e-card-body" style="padding: 10px;">
			<div class="row">
				<div class="col-5 col-sm-4 col-md-3 col-lg-2" style="padding-left: 0px;">
					<button type="button" class="btn e-avatar-btn" data-toggle="modal" data-target="#modal-seleccion-avatar"><img class="e-avatar" src="assets/img/avatares/<?php echo $_SESSION['avatar']; ?>.png" alt="User Avatar"></button>
				</div>
				<div class="col-7 col-sm-8 col-md-9 col-lg-10" style="padding-left: 0px">
					<div class="h-100 w-100 d-flex align-items-center justify-content-center">
						<div class="h-100 w-100">
							<div class="row h-50">
								<div class="col-6 col-lg-3 h-100 d-flex align-items-center text-justify text-center" style="padding-left: 0px">
									<p style="margin-bottom: 0px"><span class="badge e-card-badge badge-dark" style="width: 90px">E. Solicitados:</span><br class="d-md-none"> <?php echo $solicitudes." (".$valSolicitudes.")"; ?></p>
								</div>
								<div class="col-6 col-lg-3 h-100 d-flex align-items-center text-justify text-center" style="padding-left: 0px">
									<p style="margin-bottom: 0px"><span class="badge e-card-badge badge-dark" style="width: 90px">E. Realizados:</span><br class="d-md-none"> <?php echo $translados." (".$valTranslados.")"; ?></p>
								</div>
								<div class="col-6 d-none d-lg-flex h-100 align-items-center text-justify text-center" style="padding-left: 0px">
									<p style="margin-bottom: 0px"><span class="badge e-card-badge badge-dark" style="width: 90px">E. Totales:</span><br class="d-md-none"> <?php echo $enviosTotales; ?></p>
								</div>
							</div>
							<div class="row h-50">
								<div class="col-6 col-lg-3 h-100 d-flex align-items-center text-justify text-center" style="padding-left: 0px">
									<p style="margin-bottom: 0px"><span class="badge e-card-badge badge-dark" style="width: 90px">Reputacion:</span><br class="d-md-none"> <?php echo "Excelente";//$reputacion; ?></p>
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
			Administrar Vehiculos
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
						<th scope="col"><button type="button" class="btn btn-sm float-right e-card-btn" data-toggle="modal" data-target="#modal-alta-vehiculos"><i class="fas fa-plus"></i> <span class="d-none d-sm-inline">Nuevo</span></button></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$vehiculos = new VehiculoModel();
						$vehiculos = $vehiculos->getBy("id_usuario", $_SESSION['id']);

						if (isset($vehiculos)) {
							foreach ($vehiculos as $key => $value) { 
					?>
					<tr>
						<th scope="row"><?php echo $value->patente ?></th>
						<td><span class="badge badge-dark e-card-badge"><?php echo ucfirst($value->tipo) ?></span></td>
						<td class="d-none d-sm-table-cell"><?php echo $value->marca ?></td>
						<td class="d-none d-sm-table-cell"><?php echo $value->modelo ?></td>
						<td><button type="button" class="btn e-card-btn btn-sm float-right e-borrar-vehiculo-btn" data-toggle="modal" data-target="#modal-baja-vehiculo" 
							data-patente="<?php echo $value->patente ?>"
							data-marca="<?php echo $value->marca ?>"
							data-modelo="<?php echo $value->modelo ?>"
							data-tipo="<?php echo $value->tipo ?>"
							data-id="<?php echo $value->id ?>">
							<i class="fas fa-trash-alt"></i></button>
						</td>
					</tr>
					<?php } } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>