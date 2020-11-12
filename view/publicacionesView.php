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


				<form action="<?php echo $helper->url('publicacion', 'postularse'); ?>" method="POST" name="form-postulacion">
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
									<input type="text" class="form-control e-input" id="fp_precio" name="fp_precio" placeholder="Precio" required>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12" style="margin-top: -15px; margin-bottom: 5px;">
						<small class="w-100 text-center">Una vez realizada la postulación no podrás retirarla. Si un usuario no cumple con los enviós a los que se postula, su reputación VeryDeli se verá afectada.</small>
					</div>
					<div class="col-12 d-flex justify-content-center" style="padding: 0px;">
						<input type="hidden" id="fp_id_publicacion" name="fp_id_publicacion" value="">
						<button type="button" class="btn btn-sm e-card-btn e-left-btn" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
						<button type="submit" class="btn btn-sm e-card-btn e-right-btn"><i class="fas fa-handshake"></i> Postularse</button>
					</div>
				</form>
				
			</div>
		</div>
	</div>
</div>



<!-- MODAL DE ELECCION DE POSTULANTES -->
<div class="modal fade" id="modal-postulantes" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" style="border-width: 0px;">
			<div class="modal-header e-modal-header">
				<h5 class="modal-title w-100 text-center">Postulantes</h5>
			</div>
			<div class="modal-body e-modal-body">
				<h6 class="text-center">A continuacion se muestran todos los candidatos</h6> 
				<span id="e-mp-listado"></span>
			</div>
		</div>
	</div>
</div>