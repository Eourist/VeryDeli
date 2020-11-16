<div class="card e-card">
	<div class="card-body e-card-body text-center" style="border-radius: 4px; padding: 10px; user-select: none">
		<p class="mb-0">Los usuarios nuevos en VeryDeli o con mala reputación tienen un limite semanal de 3 publicaciones.</p>
		<?php echo "Tu reputación actual es ".$datos['reputacion'].(($datos['reputacion'] == 'Buena' || $datos['reputacion'] == 'Excelente') ? ", por lo que podes crear tantas publicaciones como quieras." : ", y todavía podes crear ".$datos['publicaciones_disponibles']." publicaciones más esta semana."); ?>
	</div>
</div>

<div class="card e-card">
	<div class="card-header e-card-header">
		<h5>Nueva publicación</h5>
	</div>
	<div class="card-body e-card-body" style="padding: 10px;">
		<form action="<?php echo $helper->url("publicacion","crear"); ?>" id="form-publicaciones" method="post">
			<div class="e-form-panel"> <!-- Información de la solicitud de envío y del paquete -->
				<p>Información de la solicitud de envío y del paquete</p>
				<div class="form-row">
					<div class="col-12">
						<div class="form-group">
							<div class="form-group"> 	<!-- POR QUE HAY 2 FORM GROUPS??? -->
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text e-input-addon"><i class="fas fa-heading"></i></span>
									</div>
									<input type="text" id="fp_titulo" name="fp_titulo" class="form-control e-input" placeholder="Titulo">
								</div>							
							</div> 						<!-- POR QUE HAY 2 FORM GROUPS??? -->
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-12 col-md-6">
						<div class="form-group">	
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text e-input-text">Fecha</div>
								</div>
								<input class="form-control e-input" id="fp_fecha_salida" name="fp_fecha_salida"  type="date" value="" placeholder="Fecha de salida" >
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">	
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text e-input-text">Hora</div>
								</div>
								<input class="form-control e-input" id="fp_hora_salida" name="fp_hora_salida" type="time" value="" placeholder="Hora de salida" >
							</div>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-12 col-sm-6">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text e-input-text">Vehiculo</div>
								</div>
								<select id="fp_tipo_vehiculo" name="fp_tipo_vehiculo" class="form-control e-input e-select decorated">
									<option class="e-option" value="auto">Auto</option>
									<option class="e-option" value="moto">Moto</option>
									<option class="e-option" value="camioneta">Camioneta</option>
									<option class="e-option" value="camión">Camión</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-6">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text e-input-addon d-inline d-sm-none" style="width: 45px"><i class="fas fa-weight-hanging"></i></div>
									<div class="input-group-text e-input-text d-none d-sm-inline" style="border-radius: 4px 0px 0px 4px;"><i class="fas fa-weight-hanging"></i> Peso</div>
								</div>
								<input class="form-control e-input e-input-medido" data-medida="Kg" id="fp_medida_peso" name="fp_medida_peso"  type="number" value="" placeholder="0 Kg" >
							</div>
						</div>
					</div>
					<!-- <div class="col-12">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text e-input-addon d-inline d-sm-none" style="width: 45px"><i class="fas fa-ruler-vertical"></i></div>
									<div class="input-group-text e-input-text d-none d-sm-inline" style="border-radius: 4px 0px 0px 4px;"><i class="fas fa-ruler-vertical"></i> Alto</div>
								</div>
								<input class="form-control e-input e-input-medido" data-medida="cm" id="fp_medida_alto" name="fp_medida_alto"  type="number" value="" placeholder="0 cm" >
								<div class="input-group-prepend">
									<div class="input-group-text e-input-addon d-inline d-sm-none" style="width: 45px"><i class="fas fa-ruler-horizontal"></i></div>
									<div class="input-group-text e-input-text d-none d-sm-inline" style="border-radius: 4px 0px 0px 4px;"><i class="fas fa-ruler-horizontal"></i> Largo</div>
								</div>
								<input class="form-control e-input e-input-medido" data-medida="cm" id="fp_medida_largo" name="fp_medida_largo"  type="number" value="" placeholder="0 cm" >
								<div class="input-group-prepend">
									<div class="input-group-text e-input-addon d-inline d-sm-none" style="width: 45px"><i class="fas fa-ruler"></i></div>
									<div class="input-group-text e-input-text d-none d-sm-inline" style="border-radius: 4px 0px 0px 4px;"><i class="fas fa-ruler"></i> Ancho</div>
								</div>
								<input class="form-control e-input e-input-medido" data-medida="cm" id="fp_medida_ancho" name="fp_medida_ancho"  type="number" value="" placeholder="0 cm" >
							</div>
						</div>
					</div>
				</div> -->
					<div class="col-4" style="padding-right: 0px">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text e-input-addon d-inline d-sm-none" style="width: 45px"><i class="fas fa-ruler-vertical"></i></div>
									<div class="input-group-text e-input-text d-none d-sm-inline" style="border-radius: 4px 0px 0px 4px;"><i class="fas fa-ruler-vertical"></i> Alto</div>
								</div>
								<input class="form-control e-input e-input-medido" data-medida="cm" id="fp_medida_alto" name="fp_medida_alto"  type="number" value="" placeholder="0 cm">
							</div>
						</div>
					</div>
					<div class="col-4" style="padding-right: 0px; padding-left: 0px">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text e-input-addon d-inline d-sm-none" style="width: 45px"><i class="fas fa-ruler-horizontal"></i></div>
									<div class="input-group-text e-input-text d-none d-sm-inline" style="border-radius: 4px 0px 0px 4px;"><i class="fas fa-ruler-horizontal"></i> Largo</div>
								</div>
								<input class="form-control e-input e-input-medido" data-medida="cm" id="fp_medida_largo" name="fp_medida_largo"  type="number" value="" placeholder="0 cm">
							</div>
						</div>
					</div>
					<div class="col-4" style="padding-left: 0px">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text e-input-addon d-inline d-sm-none" style="width: 45px"><i class="fas fa-ruler"></i></div>
									<div class="input-group-text e-input-text d-none d-sm-inline" style="border-radius: 4px 0px 0px 4px;"><i class="fas fa-ruler"></i> Ancho</div>
								</div>
								<input class="form-control e-input e-input-medido" data-medida="cm" id="fp_medida_ancho" name="fp_medida_ancho"  type="number" value="" placeholder="0 cm">
							</div>
						</div>
					</div>
					</div>

				<div class="form-row">
					<div class="col-12">
						<div class="form-group">
							<textarea class="form-control e-input" id="fp_descripcion" name="fp_descripcion" style="resize: none;" rows="2" placeholder="Detalles del paquete"></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="e-form-panel" style="margin-top: 15px;"> <!-- Dirección origen -->
				<p>Dirección origen</p>
				<div class="form-row">
					<div class="col-12 col-sm-6">
						<div class="form-group"> 
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text e-input-text">Provincia</span>
								</div>
								<select id="fdo_provincia" name="fdo_provincia" class="form-control e-input e-select decorated">
									<?php 
										$provincias = new ProvinciaModel();
										$provincias = $provincias->getAll();

										$p_seleccionada = 0;
										foreach ($provincias as $p){
											if ($p_seleccionada != 0){
												echo '<option class="e-option" value="'.$p->id.'">'.$p->nombre.'</option>';
											} else {
												$p_seleccionada = $p->id;
												echo '<option class="e-option" value="'.$p->id.'" selected>'.$p->nombre.'</option>';
											}
										}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-6">
						<div class="form-group"> 
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text e-input-text">Ciudad</span>
								</div>
								<select id="fdo_ciudad" name="fdo_ciudad" class="form-control e-input e-select decorated">
									<?php 
										$ciudades = new CiudadModel();
										$ciudades = $ciudades->getBy('id_provincia', $p_seleccionada);

										foreach ($ciudades as $c){
											echo '<option class="e-option" value="'.$c->id.'">'.$c->nombre.'</option>';
										}
									?>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-12 col-md-6">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text e-input-addon"><i class="fas fa-road"></i></span>
								</div>
								<input type="text" id="fdo_calle" name="fdo_calle" class="form-control e-input" placeholder="Calle" >
							</div>							
						</div>
					</div>
					<div class="col-4 col-md-2">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text e-input-addon"><i class="fas fa-hashtag"></i></span>
								</div>
								<input type="number" id="fdo_numero" name="fdo_numero" class="form-control e-input" placeholder="Numero" >
							</div>							
						</div>
					</div>
					<div class="col-4 col-md-2">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text e-input-addon"><i class="fas fa-building"></i></span>
								</div>
								<input type="number" id="fdo_piso" name="fdo_piso" class="form-control e-input" placeholder="Piso">
							</div>							
						</div>
					</div>
					<div class="col-4 col-md-2">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text e-input-addon"><i class="fas fa-font"></i></span>
								</div>
								<input type="text" id="fdo_depto" name="fdo_depto" class="form-control e-input" placeholder="Depto">
							</div>							
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-12">
						<div class="form-group">
							<textarea class="form-control e-input" id="fdo_descripcion" name="fdo_descripcion" style="resize: none;" rows="2" placeholder="Indicaciones detalladas"></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="e-form-panel" style="margin-top: 15px;">  <!-- Dirección destino -->
				<p>Dirección destino</p>
				<div class="form-row">
					<div class="col-12 col-sm-6">
						<div class="form-group"> 
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text e-input-text">Provincia</span>
								</div>
								<select id="fdd_provincia" name="fdd_provincia" class="form-control e-input e-select decorated">
									<?php 
										foreach ($provincias as $p){
											if ($p_seleccionada != $p->id){
												echo '<option class="e-option" value="'.$p->id.'">'.$p->nombre.'</option>';
											} else {
												$p_seleccionada = $p->id;
												echo '<option class="e-option" value="'.$p->id.'" selected>'.$p->nombre.'</option>';
											}
										}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-6">
						<div class="form-group"> 
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text e-input-text">Ciudad</span>
								</div>
								<select id="fdd_ciudad" name="fdd_ciudad" class="form-control e-input e-select decorated">
									<?php 
										$ciudades = new CiudadModel();
										$ciudades = $ciudades->getBy('id_provincia', $p_seleccionada);

										foreach ($ciudades as $c){
											echo '<option class="e-option" value="'.$c->id.'">'.$c->nombre.'</option>';
										}
									?>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-12 col-md-6">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text e-input-addon"><i class="fas fa-road"></i></span>
								</div>
								<input type="text" id="fdd_calle" name="fdd_calle" class="form-control e-input" placeholder="Calle" >
							</div>							
						</div>
					</div>
					<div class="col-4 col-md-2">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text e-input-addon"><i class="fas fa-hashtag"></i></span>
								</div>
								<input type="text" id="fdd_numero" name="fdd_numero" class="form-control e-input" placeholder="Numero" >
							</div>							
						</div>
					</div>
					<div class="col-4 col-md-2">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text e-input-addon"><i class="fas fa-building"></i></span>
								</div>
								<input type="text" id="fdd_piso" name="fdd_piso" class="form-control e-input" placeholder="Piso">
							</div>							
						</div>
					</div>
					<div class="col-4 col-md-2">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text e-input-addon"><i class="fas fa-font"></i></span>
								</div>
								<input type="text" id="fdd_depto" name="fdd_depto" class="form-control e-input" placeholder="Depto">
							</div>							
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-12">
						<div class="form-group">
							<textarea class="form-control e-input" id="fdd_descripcion" name="fdd_descripcion" style="resize: none;" rows="2" placeholder="Indicaciones detalladas"></textarea>
						</div>
					</div>
				</div>
			</div>
			
			<!-- <div class="e-form-panel"> -->
				<div class="form-row" style="/*padding-right: 10px; margin-top: 15px; margin-bottom: 10px;*/">
					<div class="col-10">
						<?php if ($datos['publicaciones_disponibles'] <= 0) { echo 'Alcanzaste el límite de publicaciones semanales. No podrás publicar hasta la próxima semana.'; } ?>
					</div>
					<div class="col-2">
						<button type="submit" class="btn e-card-btn float-right" <?php if ($datos['publicaciones_disponibles'] <= 0) { echo 'disabled'; } ?>><i class="fas fa-check-circle"></i> Confirmar</button>
					</div>
				</div>
			<!-- </div> -->
		</form>
	</div>
</div>