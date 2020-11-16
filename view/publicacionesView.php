<!-- MODAL POSTULACION -->
<div class="modal fade" id="modal-postularse" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" style="border-width: 0px;">
			<div class="modal-header e-modal-header">
				<h5 class="modal-title w-100 text-center">Postulación</h5>
			</div>
			<div class="modal-body e-modal-body">
				<h6 class="text-center">¿Deseas postularte para realizar el envío?</h6> 
				<p class="text-center" id="e-mp-info">
					Actualmente hay <strong id="e-mp-postulaciones">13</strong> usuarios postulados <br> 
					Por un precio mínimo de <strong id="e-mp-precio">$2300</strong>
				</p>

				<div class="e-divider" style="margin-top: -5px"></div>

				<p><span class="badge badge-dark e-card-badge">Desde</span> <span id="e-mp-desde"></span></p>
				<p><span class="badge badge-dark e-card-badge">Hasta</span> <span id="e-mp-hasta"></span></p>
				<p><span class="badge badge-dark e-card-badge">Salida</span> <span id="e-mp-salida"></span></p>


				<form action="<?php echo $helper->url('publicacion', 'postularse'); ?>" method="POST" id="form-postulacion">
					<div class="form-row">
						<div class="col-6">
							<div class="form-group"> 
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text e-input-addon"><i class="fas fa-car"></i></i></span>
									</div>
									<select id="fp_id_vehiculo" name="fp_id_vehiculo" class="form-control e-input e-select decorated" <?php if ($_SESSION['vehiculos'] == NULL) { echo 'readonly'; } ?>>
										<?php foreach($_SESSION['vehiculos'] as $v) { ?>
										<option class="e-option" value="<?php echo $v['id']; ?>"><?php echo $v['marca']." ".$v['modelo']." (".$v['patente'].")"; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text e-input-addon"><i class="fas fa-dollar-sign"></i></i></span>
									</div>
									<input type="text" class="form-control e-input" id="fp_precio" name="fp_precio" placeholder="Precio">
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 text-center pl-0 pr-0" style="margin-top: -15px; margin-bottom: 5px;">
						<?php if ($datos['postulacion_activa'] && $datos['promedio'] < 4) { ?>
							<?php print_r($datos) ?>
						<small class="text-center w-100 pb-0">No puedes postularte a mas de una publicacion a la vez mientras que tu reputacion de usuario sea inferior a "Buena". Completa envíos para mejorar tu reputacion de VeryDeli, o cancela tu postulación activa desde tu perfil.</small>
						<?php } else { ?>
						<small class="text-center w-100 pb-0">Una vez realizada la postulación no podrás retirarla. Si un usuario no cumple con los enviós a los que se postula, su reputación VeryDeli se verá afectada.</small>
						<?php } ?>
					</div>
					<div class="col-12 d-flex justify-content-center" style="padding: 0px;">
						<input type="hidden" id="fp_id_publicacion" name="fp_id_publicacion" value="">
						<button type="button" class="btn btn-sm e-card-btn e-left-btn" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
						<button type="submit" class="btn btn-sm e-card-btn e-right-btn" <?php if($datos['postulacion_activa'] && $datos['promedio'] < 4) { echo 'disabled'; } ?>><i class="fas fa-handshake"></i> Postularse</button>
					</div>
					<div class="col-12" style="margin-bottom: 5px;">
						<small class="w-100 text-center">
						</small>
					</div>
				</form>
				
			</div>
		</div>
	</div>
</div>



<!-- MODAL DE ELECCION DE POSTULANTES -->
<div class="modal fade" id="modal-postulantes" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content e-modal-body" style="border-width: 0px;">
			<div class="modal-header e-modal-header">
				<h5 class="modal-title w-100 text-center">Ver candidatos</h5>
			</div>
			<div class="modal-body" style="max-height: 450px; overflow-y: auto">
				<p class="text-center" id="e-mpo-info">

				</p>
				<div id="e-mpo-listado">
					
				</div>
				<!-- <div class="e-postulacion w-100">
					<div class="col-12 pl-0 pr-0">
						<span class="badge badge-dark e-card-badge">Responsable </span> <a href="index.php?controller=usuario&action=perfil&id_usuario=4" class="e-com-userlink"><img src="assets/img/avatares/av (1).png" class="e-av-postulante"> Usuario</a>
						<span style="float: right;">$2300 <button type="button" class="btn e-card-btn e-postulante-btn"><i class="fas fa-handshake"></i></button></span>
					</div>
					<div class="col-12 pl-0 mt-2">
						<p style="margin-bottom: 0px"><span class="badge badge-dark e-card-badge">Camioneta</span> Ford Eco-Sport 2015</p>
					</div>
				</div> -->
			</div>
			<div class="modal-footer" style="padding-top: 0px; border-width: 0px;">
				<div class="col-12 d-flex justify-content-center" style="padding: 0px;">
					<input type="hidden" id="f_avatar" name="f_avatar">
					<button type="button" class="btn btn-sm e-card-btn" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- MODAL CONFIRMACION DE POSTULANTE -->
<div class="modal fade" id="modal-confirmacion" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" style="border-width: 0px;">
			<div class="modal-header e-modal-header">
				<h5 class="modal-title w-100 text-center">Confirmar selección</h5>
			</div>
			<div class="modal-body e-modal-body">
				<form action="<?php echo $helper->url('publicacion', 'confirmarPostulante'); ?>" method="POST">
					<h6 class="text-center" id="e-mcp-info">¿Estas seguro de que quieres aceptar al postulante 
						<a href="index.php?controller=usuario&action=perfil&id_usuario=4" class="e-com-userlink">
							<img src="assets/img/avatares/av (1).png" class="e-av-postulante" id="e-mcp-avatar"> <span id="e-mcp-usuario"></span>
						</a> para realizar el envío?
					</h6>
					
					<div class="col-12 d-flex justify-content-center" style="padding: 0px;">
						<input type="hidden" id="fcp_id_postulacion" name="fcp_id_postulacion">
						<button type="button" class="btn btn-sm e-card-btn e-left-btn" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
						<button type="submit" class="btn btn-sm e-card-btn e-right-btn"><i class="fas fa-check-circle"></i> Confirmar</button>
					</div>
				</form>
				<!-- <div class="e-postulacion w-100">
					<div class="col-12 pl-0 pr-0">
						<span class="badge badge-dark e-card-badge">Responsable </span> <a href="index.php?controller=usuario&action=perfil&id_usuario=4" class="e-com-userlink"><img src="assets/img/avatares/av (1).png" class="e-av-postulante"> Usuario</a>
						<span style="float: right;">$2300 <button type="button" class="btn e-card-btn e-postulante-btn"><i class="fas fa-handshake"></i></button></span>
					</div>
					<div class="col-12 pl-0 mt-2">
						<p style="margin-bottom: 0px"><span class="badge badge-dark e-card-badge">Camioneta</span> Ford Eco-Sport 2015</p>
					</div>
				</div> -->
			</div>
		</div>
	</div>
</div>