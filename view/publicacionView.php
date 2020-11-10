<!-- CARD PUBLICACION -->
<div class="card e-card">
	<div class="card-header e-card-header">
		<h5>
			<span class="badge badge-secondary" style="width: 120px; padding: 7px; background: #ff7c40;"><?php echo ucfirst($publicacion['tipo_vehiculo']); ?></span>
			<?php echo "[".$dir_o['ciudad']." - ".$dir_d['ciudad']."] ".$publicacion['titulo']; ?>
			<span>
				<a class="e-card-caret float-right d-lg-none" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample" href="#post-body-<?php echo $publicacion['id']; ?>"><i class="fas fa-angle-double-down"></i></a>
			</span>
		</h5>
	</div>
	<div class="collapse d-lg-block" id="post-body-<?php echo $publicacion['id']; ?>">
		<div class="card-body e-card-body" style="padding: 10px;/*background-image: url(assets/img/bg5.jpg);background-repeat: no-repeat;background-size: 100%;*/">
			<div class="row" style="padding: 0px; margin: 0px;">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-8">
					<!-- <h5>Envio:</h5> -->
					<div class="row">
						<!-- <p><span class="badge badge-dark e-card-badge">Lugar origen</span> <span>San Luis > San Luis (Capital) > Av. Ejemplo 342</span></p> -->
						<p><span class="badge badge-dark e-card-badge">Lugar origen</span> <span><?php echo $dir_o['provincia']." > ".$dir_o['ciudad']." > ".$dir_o['calle']." ".$dir_o['numero']; ?></span></p>
					</div>
					<div class="row">
						<p><span class="badge badge-dark e-card-badge">Lugar destino</span> <span><?php echo $dir_d['provincia']." > ".$dir_d['ciudad']." > ".$dir_d['calle']." ".$dir_d['numero']; ?></span></p>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-2">
					<!-- <h5> </h5> -->
					<div class="row">
						<p><span class="badge badge-dark e-card-badge">Fecha salida</span> <span><?php echo date('d-m', strtotime($publicacion['fecha_salida'])); ?></span></p>
					</div>
					<div class="row">
						<p><span class="badge badge-dark e-card-badge">Hora salida</span> <span><?php echo date('H:i', strtotime($publicacion['hora_salida'])); ?></span></p>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-2">
					<!-- <h5>Paquete:</h5> -->
					<div class="row">
						<p><span class="badge badge-dark e-card-badge" style="width: 60px;">Peso</span> <span><?php echo $publicacion['peso']; ?></span></p>
					</div>
					<div class="row">
						<p><span class="badge badge-dark e-card-badge" style="width: 60px;">Medidas</span> <span><?php echo $publicacion['medida_alto']."x".$publicacion['medida_largo']."x".$publicacion['medida_ancho']; ?></span></p>
						<!-- <p><span class="badge badge-dark e-card-badge" style="width: 60px;">Medidas</span> <span>50x50x180 cm</span></p> -->
					</div>
				</div>
				<div class="e-divider" style="margin-top: -5px"></div>
				<div class="row" style="padding: 0px; margin: 0px;">
					<div class="col-12">
						<div class="row">
							<p style="text-align: justify;"><span class="badge badge-dark e-card-badge">Descripcion</span> <span><?php echo $publicacion['descripcion']; ?></span></p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- <p style="float: left;"><span class="badge badge-dark e-card-badge">Usuario</span> <?php echo $usuario['nombre']; ?></p> -->
					<button type="button" class="btn btn-sm float-right e-card-btn e-right-btn" data-toggle="modal" data-target="#modal-publicacion"><i class="fas fa-handshake"></i> Postularse</button>
					<button type="button" class="btn btn-sm float-right e-card-btn e-left-btn"><i class="fas fa-comment-alt"></i> Comentarios</button>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- MODAL COMENTARIOS -->
<!-- <div class="modal fade" id="modal-publicacion" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" style="border-width: 0px;">
			<div class="modal-header e-modal-header">
				<h5 class="modal-title">Solicitud de envío</h5>
			</div>
			<div class="modal-body">
				
				
			</div>
		</div>
	</div>
</div> -->

<!-- <div class="e-divider" style="margin-top: -5px"></div>
				<p class="text-center">Datos de la solicitud</p>
				<div class="e-divider" style="margin-top: -5px"></div>
				<p style="text-align: justify;"><span class="badge badge-dark e-card-badge">Titulo</span> <span><?php echo $publicacion['titulo']; ?></span></p>
				<p style="text-align: justify;"><span class="badge badge-dark e-card-badge">Fecha</span> <span><?php echo $publicacion['fecha_salida']; ?></span></p>
				<p style="text-align: justify;"><span class="badge badge-dark e-card-badge">Hora</span> <span><?php echo $publicacion['hora_salida']; ?></span></p>
				<p style="text-align: justify;"><span class="badge badge-dark e-card-badge">Descripcion</span> <span><?php echo $publicacion['descripcion']; ?></span></p>
				<div class="e-divider" style="margin-top: -5px"></div>
				<p class="text-center">Datos del paquete</p>
				<div class="e-divider" style="margin-top: -5px"></div>
				<p style="text-align: justify;"><span class="badge badge-dark e-card-badge">Peso</span> <span><?php echo $publicacion['peso']; ?></span></p>
				<p style="text-align: justify;"><span class="badge badge-dark e-card-badge">Alto</span> <span><?php echo $publicacion['medida_alto']."cm"; ?></span></p>
				<p style="text-align: justify;"><span class="badge badge-dark e-card-badge">Largo</span> <span><?php echo $publicacion['medida_largo']."cm"; ?></span></p>
				<p style="text-align: justify;"><span class="badge badge-dark e-card-badge">Ancho</span> <span><?php echo $publicacion['medida_ancho']."cm"; ?></span></p>
				<div class="e-divider" style="margin-top: -5px"></div>
				<p class="text-center">Dirección de origen</p>
				<div class="e-divider" style="margin-top: -5px"></div>
				<p style="text-align: justify;"><span class="badge badge-dark e-card-badge">Provincia</span> <span><?php echo $dir_o['provincia']; ?></span></p>
				<p style="text-align: justify;"><span class="badge badge-dark e-card-badge">Ciudad</span> <span><?php echo $dir_o['ciudad']; ?></span></p>
				<p style="text-align: justify;"><span class="badge badge-dark e-card-badge">Calle</span> <span><?php echo $dir_o['calle']." ".$dir_o['numero']; ?></span></p>
				<p style="text-align: justify;"><span class="badge badge-dark e-card-badge">Departamento</span> <span><?php echo $dir_o['piso']."° ".$dir_o['depto']; ?></span></p>
				<div class="e-divider" style="margin-top: -5px"></div>
				<p class="text-center">Dirección de destino</p>
				<div class="e-divider" style="margin-top: -5px"></div>
				<p style="text-align: justify;"><span class="badge badge-dark e-card-badge">Provincia</span> <span><?php echo $dir_d['provincia']; ?></span></p>
				<p style="text-align: justify;"><span class="badge badge-dark e-card-badge">Ciudad</span> <span><?php echo $dir_d['ciudad']; ?></span></p>
				<p style="text-align: justify;"><span class="badge badge-dark e-card-badge">Calle</span> <span><?php echo $dir_d['calle'].$dir_d['numero']; ?></span></p>
				<p style="text-align: justify;"><span class="badge badge-dark e-card-badge">Departamento</span> <span><?php echo $dir_d['piso']."° ".$dir_d['depto']; ?></span></p> -->



<!-- <ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#home"><i class="fas fa-info"></i></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#menu1"><i class="fas fa-comment-alt"></i></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#menu2"><i class="fas fa-handshake"></i></a>
					</li>
				</ul> -->

				<!-- Tab panes -->
				<!-- <div class="tab-content">
					<div id="home" class="container tab-pane active"><br>
						<h3>HOME</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
					<div id="menu1" class="container tab-pane fade"><br>
						<h3>Menu 1</h3>
						<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
					<div id="menu2" class="container tab-pane fade"><br>
						<h3>Menu 2</h3>
						<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
					</div>
					<div id="menu3" class="container tab-pane fade"><br>
						<h3>Menu 3</h3>
						<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
					</div>
				</div> -->