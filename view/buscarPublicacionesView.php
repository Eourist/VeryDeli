<div class="card e-card">
	<div class="card-header e-card-header">
		<h5>Buscar publicaciones</h5>
	</div>
	<div class="card-body e-card-body" style="padding: 10px;">
		<form action="<?php echo $helper->url("publicacion","buscar"); ?>" id="form-publicaciones" method="post">
			<div class="e-form-panel"> <!-- Información de la solicitud de envío y del paquete -->
				<p>Solo llene los campos que desee utiliziar como filtros de busqueda</p>
				<div class="form-row">
					<div class="col-12">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text e-input-addon"><i class="fas fa-heading"></i></span>
								</div>
								<input type="text" id="fb_titulo" name="fb_titulo" class="form-control e-input" placeholder="Titulo">
							</div>							
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
								<input class="form-control e-input" id="fb_fecha_salida" name="fb_fecha_salida"  type="date" value="" placeholder="Fecha de salida" >
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text e-input-text">Vehiculo</div>
								</div>
								<select id="fb_tipo_vehiculo" name="fb_tipo_vehiculo" class="form-control e-input e-select decorated">
									<option class="e-option" value="">Cualquiera</option>
									<option class="e-option" value="auto">Auto</option>
									<option class="e-option" value="moto">Moto</option>
									<option class="e-option" value="camioneta">Camioneta</option>
									<option class="e-option" value="camión">Camión</option>
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
									<div class="input-group-text e-input-text">Provincia</div>
								</div>
								<select id="fb_id_provincia" name="fb_id_provincia" class="form-control e-input e-select decorated">
									<option class="e-option" value="0">Cualquiera</option>
									<?php 
										$provincias = new ProvinciaModel();
										$provincias = $provincias->getAll();

										$p_seleccionada = 0;
										foreach ($provincias as $p){
											echo '<option class="e-option" value="'.$p->id.'">'.$p->nombre.'</option>';
										}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text e-input-text">Ciudad</div>
								</div>
								<select id="fb_id_ciudad" name="fb_id_ciudad" class="form-control e-input e-select decorated">
									<option class="e-option" value="0">Cualquiera</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="form-row">
				<div class="col-12">
					<button type="submit" class="btn e-card-btn float-right"><i class="fas fa-search"></i> Buscar</button>
				</div>
			</div>
		</form>
	</div>
</div>