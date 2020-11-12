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
					<!-- <button type="button" class="btn btn-sm float-right e-card-btn e-right-btn" data-toggle="modal" data-target="#modal-publicacion"><i class="fas fa-handshake"></i> Postularse</button> -->
					<button type="button" class="btn btn-sm float-right e-card-btn d-lg-none" data-toggle="collapse" data-target="#post-comentarios-<?php echo $publicacion['id']; ?>"><i class="fas fa-comment-alt"></i> Comentarios</button>
					<!-- <a class="e-card-caret float-right d-lg-none" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample" href="#post-body-<?php echo $publicacion['id']; ?>"><i class="fas fa-angle-double-down"></i></a> -->
				</div>
			</div>
		</div>
	</div>
</div>

<!-- CARD COMENTARIOS -->
<div class="card e-card" style="margin-top: -15px; border-radius: 0px;">
	<div class="collapse d-lg-block" id="post-comentarios-<?php echo $publicacion['id']; ?>">
		<div class="card-body e-card-body-inv" style="padding: 10px;/">

			<!-- <div class="e-divider" style="margin-top: -5px"></div>
			<p class="text-center">Comentarios</p>
			<div class="e-divider" style="margin-top: -5px"></div> -->

			<form action="<?php echo $helper->url('publicacion', 'comentar'); ?>" method="POST">
				<div class="form-row">
					<div class="col-10" style="height: 38px">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text e-input-addon">
										<i class="fas fa-comment-alt"></i> 
									</div>
								</div>
								<input type="text" name="fc_comentario" class="form-control e-input" placeholder="Haz un comentario..." required>
								<div class="input-group-append">
									<div class="input-group-btn e-input-addon" style="border-top-right-radius: 4px; border-bottom-right-radius: 4px">
										<input type="hidden" name="fc_id_publicacion" value="<?php echo $publicacion['id']; ?>">
										<input type="hidden" name="fc_id_usuario" value="<?php echo $_SESSION['id']; ?>">
										<button type="submit" class="btn e-card-btn" style="z-index: 0">Enviar</button>
									</div>
								</div>
							</div>
						</div>
					</div>
						<div class="col-2">
							<button type="button" class="btn e-card-btn" style="width: 100%; border-radius: 4px;" data-toggle="modal" data-target="#modal-postulaciones-<?php echo $publicacion['id']; ?>"><i class="fas fa-handshake"></i><span class="d-none d-lg-inline"> Postularse</span></button>
						</div>
				</div>
			</form>

			<?php 
				$cuenta = 0;
				foreach ($comentarios as $comentario) { 
			?>

			<?php if ($cuenta != 0) {  ?>
				<div class="col-12 e-card-comentario <?php echo 'comentario-oculto-'.$publicacion['id']; ?>" id="com-<?php echo $comentario['id']; ?>" style="display: none">
			<?php } else { ?>
				<div class="col-12 e-card-comentario" id="com-<?php echo $comentario['id']; ?>">
			<?php } ?>
				<a href="<?php echo $helper->url('usuario', 'perfil').'&id_usuario='.$comentario['id_usuario']; ?>" class="e-com-userlink">
					<img class="e-avatar" src="assets/img/avatares/<?php echo $comentario['usuario_avatar']; ?>.png" alt="User Avatar" style="width: 25px; height: 25px; padding-bottom: 4px">
					<strong> <?php echo $comentario['usuario']; ?></strong>
				</a> 
				<?php if (isset($comentario['usuario_respuesta'])) { ?>
				respondiendo a <a href="<?php echo $helper->url('usuario', 'perfil').'&id_usuario='.$comentario['id_usuario_respuesta']; ?>"><?php echo $comentario['usuario_respuesta']; ?></a>
				<?php } ?>
				<!-- <span class="e-com-time">13:16 23/01/2019</span> -->
				<span class="e-com-time"><?php echo date("H:i", strtotime($comentario['hora']))." ".date("d-m-Y", strtotime($comentario['fecha'])); ?></span>
				<span class="float-right">
					<button type="button" class="btn btn-sm e-com-accion e-btn-responder" data-com-id="<?php echo $comentario['id']; ?>" id="resp-1"><i class="fas fa-reply"></i></button> 
					<button type="button" class="btn btn-sm e-com-accion e-btn-reportar" data-com-id="<?php echo $comentario['id']; ?>" id="repo-1"><i class="fas fa-flag"></i></button>
				</span>
				<p style="margin-bottom: 0px"><?php echo $comentario['texto']; ?></p>
			</div>

			<div id="com-respuesta-<?php echo $comentario['id']; ?>" style="display: none">
				<form action="<?php echo $helper->url('publicacion', 'comentar'); ?>" method="POST">
					<div class="form-row" style="margin-top: -1px;">
						<div class="col-12">
							<div class="form-group">
								<div class="input-group">
									<input type="text" name="fc_respuesta" class="form-control e-input e-com-input-respuesta" placeholder="Responder a <?php echo $comentario['usuario']; ?>" required>
									<div class="input-group-append">
										<div class="input-group-btn e-input-addon"   style="border-bottom-right-radius: 4px;">
											<input type="hidden" name="fc_id_publicacion" value="<?php echo $publicacion['id']; ?>">
											<input type="hidden" name="fc_id_usuario" value="<?php echo $_SESSION['id']; ?>">
											<input type="hidden" name="fc_id_usuario_respuesta" value="<?php echo $comentario['id_usuario']; ?>">
											<button type="submit" class="btn e-card-btn" style="z-index: 0">Enviar</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>

			<?php $cuenta++; } ?>
			<button class="btn e-com-mostrar-mas" data-estado="min" data-id-publicacion="<?php echo $publicacion['id']; ?>">
				<span><i class="fas fa-angle-down"></i> Cargar mas comentarios</span>
			</button>
		</div>
	</div>
</div>

<!-- MODAL COMENTARIOS -->
<div class="modal fade" id="modal-postulaciones-<?php echo $publicacion['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" style="border-width: 0px;">
			<div class="modal-header e-modal-header">
				<h5 class="modal-title">Postularse para el envío</h5>
			</div>
			<div class="modal-body">
				<?php echo $publicacion['descripcion']; ?>
				
			</div>
		</div>
	</div>
</div>
