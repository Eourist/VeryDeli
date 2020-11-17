<!-- CARD PUBLICACION -->
<div class="card e-card">
	<div class="card-header e-card-header">
		<h5>
			<span class="badge badge-secondary" style="width: 120px; padding: 7px; background: #ff7c40;"><?php echo ucfirst($publicacion['tipo_vehiculo']); ?></span>
			<span>
				<a class="e-card-caret float-right d-lg-none" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample" href="#post-body-<?php echo $publicacion['id']; ?>"><i class="fas fa-angle-double-down"></i></a>
			</span>
			<?php echo "<span class='d-none d-md-inline'>[".$dir_o['provincia']." - ".$dir_d['provincia']."]</span><br class='d-inline d-sm-none'> ".$publicacion['titulo']; ?>
		</h5>
	</div>
	<div class="collapse d-lg-block" id="post-body-<?php echo $publicacion['id']; ?>">
		<div class="card-body e-card-body" style="padding: 10px;/*background-image: url(assets/img/bg4.jpg);background-repeat: no-repeat;background-size: 100%;*/">
			<div class="row" style="padding: 0px; margin: 0px;"> <!-- Informacion de la publicacion -->
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-8">
					<!-- <h5>Envio:</h5> -->
					<div class="row">
						<!-- <p><span class="badge badge-dark e-card-badge">Lugar origen</span> <span>San Luis > San Luis (Capital) > Av. Ejemplo 342</span></p> -->
						<p><span class="badge badge-dark e-card-badge" data-toggle="tooltip" title="<?php echo $dir_o['descripcion']; ?>">Lugar origen</span> <span><?php echo $dir_o['provincia']." > ".$dir_o['ciudad']." > ".$dir_o['calle']." ".$dir_o['numero']; ?></span></p>
					</div>
					<div class="row">
						<p><span class="badge badge-dark e-card-badge" data-toggle="tooltip" title="<?php echo $dir_d['descripcion']; ?>">Lugar destino</span> <span><?php echo $dir_d['provincia']." > ".$dir_d['ciudad']." > ".$dir_d['calle']." ".$dir_d['numero']; ?></span></p>
					</div>
				</div>
				<div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-2">
					<!-- <h5> </h5> -->
					<div class="row">
						<p><span class="badge badge-dark e-card-badge">Fecha salida</span> <span><?php echo date('d-m', strtotime($publicacion['fecha_salida'])); ?></span></p>
					</div>
					<div class="row">
						<p><span class="badge badge-dark e-card-badge">Hora salida</span> <span><?php echo date('H:i', strtotime($publicacion['hora_salida'])); ?></span></p>
					</div>
				</div>
				<div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-2">
					<!-- <h5>Paquete:</h5> -->
					<div class="row">
						<p><span class="badge badge-dark e-card-badge" style="width: 60px;">Peso</span> <span><?php echo $publicacion['peso'].' Kg'; ?></span></p>
					</div>
					<div class="row">
						<p><span class="badge badge-dark e-card-badge" style="width: 60px;">Medidas</span> <span><?php echo $publicacion['medida_alto']."x".$publicacion['medida_largo']."x".$publicacion['medida_ancho'].' cm'; ?></span></p>
						<!-- <p><span class="badge badge-dark e-card-badge" style="width: 60px;">Medidas</span> <span>50x50x180 cm</span></p> -->
					</div>
				</div>
				<div class="e-divider" style="margin-top: -5px"></div>
				<!-- <div class="row" style="padding: 0px; margin: 0px;"> -->
				<div class="col-12">
					<div class="row">
						<p style="text-align: justify;"><span class="badge badge-dark e-card-badge">Autor</span>
							<a href="<?php echo $helper->url('usuario', 'perfil').'&id_usuario='.$usuario['id']; ?>" class="e-com-userlink">
								<img class="e-avatar" src="assets/img/avatares/<?php echo $usuario['avatar']; ?>.png" alt="User Avatar" style="width: 25px; height: 25px; padding-bottom: 4px">
								<strong> <?php echo $usuario['nombre']; ?></strong>
							</a> 
						</p>
					</div>
					<div class="row">
						<p style="text-align: justify;"><span class="badge badge-dark e-card-badge">Descripcion</span> <span><?php echo $publicacion['descripcion']; ?></span></p>
					</div>
				</div>
				<!-- </div> -->
					<div class="col-12">
						<div class="row">
				<?php if ($publicacion['id_usuario'] == $_SESSION['id']) { ?>
							<strong>(AUTOR) </strong>
				<?php } ?>
				<?php if ($publicacion['estado'] == 1) { ?>
							<strong> PUBLICACION CERRADA</strong>
				<?php } ?>
						</div>
					</div>
			</div>
			<div class="row"> <!-- Boton comentarios -->
				<div class="col-12">
					<?php if ($publicacion['id_usuario'] != $_SESSION['id']) { ?>
					<button 
						type="button" <?php if ($publicacion['estado'] != 0) { echo 'disabled'; } ?>
						class="btn btn-sm float-right e-card-btn e-right-btn d-lg-none e-btn-postularse" 
						data-toggle="modal" 
						data-target="#modal-postularse"
						data-id-publicacion="<?php echo $publicacion['id']; ?>" 
						data-desde="<?php echo $dir_o['provincia']." > ".$dir_o['ciudad']; ?>" 
						data-hasta="<?php echo $dir_d['provincia']." > ".$dir_d['ciudad']; ?>" 
						data-salida="<?php echo date('d-m', strtotime($publicacion['fecha_salida']))." a las ".date('H:i', strtotime($publicacion['hora_salida']))." Hs"; ?>">
						<i class="fas fa-handshake"></i> Postularse
					</button>
					<?php } else { ?>
					<button 
						type="button" <?php if ($publicacion['estado'] != 0) { echo 'disabled'; } ?>
						class="btn btn-sm float-right e-card-btn e-right-btn d-lg-none e-btn-candidatos" 
						data-toggle="modal" 
						data-target="#modal-postulantes"
						data-id-publicacion="<?php echo $publicacion['id']; ?>" 
						data-desde="<?php echo $dir_o['provincia']." > ".$dir_o['ciudad']; ?>" 
						data-hasta="<?php echo $dir_d['provincia']." > ".$dir_d['ciudad']; ?>" 
						data-salida="<?php echo date('d-m', strtotime($publicacion['fecha_salida']))." a las ".date('H:i', strtotime($publicacion['hora_salida']))." Hs"; ?>">
						<i class="fas fa-handshake"></i> Candidatos
					</button>
					<?php } ?>
					<button type="button" class="btn btn-sm float-right e-card-btn e-left-btn d-lg-none" data-toggle="collapse" data-target="#post-comentarios-<?php echo $publicacion['id']; ?>"><i class="fas fa-comment-alt"></i> Comentarios</button>
					<!-- <a class="e-card-caret float-right d-lg-none" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample" href="#post-body-<?php echo $publicacion['id']; ?>"><i class="fas fa-angle-double-down"></i></a> -->
				</div>
			</div>

			<!-- COMENTARIOS -->
			<div class="collapse d-lg-block" id="post-comentarios-<?php echo $publicacion['id']; ?>">
				<form action="<?php echo $helper->url('publicacion', 'comentar'); ?>" method="POST" style="margin-top: 15px"> <!-- Input comentario -->
					<div class="form-row">
						<div class="col-12 col-lg-10" style="height: 38px">
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
						<?php if ($publicacion['id_usuario'] != $_SESSION['id']) { ?>
						<div class="d-none d-lg-block col-lg-2">
							<button 
								type="button" <?php if ($publicacion['estado'] != 0) { echo 'disabled'; } ?>
								class="btn e-card-btn e-btn-postularse" 
								style="width: 100%; border-radius: 4px;" 
								data-toggle="modal" 
								data-target="#modal-postularse"
								data-id-publicacion="<?php echo $publicacion['id']; ?>" 
								data-desde="<?php echo $dir_o['provincia']." > ".$dir_o['ciudad']; ?>" 
								data-hasta="<?php echo $dir_d['provincia']." > ".$dir_d['ciudad']; ?>" 
								data-salida="<?php echo date('d-m', strtotime($publicacion['fecha_salida']))." a las ".date('H:i', strtotime($publicacion['hora_salida']))." Hs"; ?>">
								<i class="fas fa-handshake"></i><span class="d-none d-lg-inline"> Postularse</span>
							</button>
						</div>
						<?php } else { ?>
						<div class="d-none d-lg-block col-lg-2">
							<button 
								type="button" <?php if ($publicacion['estado'] != 0) { echo 'disabled'; } ?>
								class="btn e-card-btn e-btn-candidatos" 
								style="width: 100%; border-radius: 4px;" 
								data-toggle="modal" 
								data-target="#modal-postulantes"
								data-id-publicacion="<?php echo $publicacion['id']; ?>" 
								data-desde="<?php echo $dir_o['provincia']." > ".$dir_o['ciudad']; ?>" 
								data-hasta="<?php echo $dir_d['provincia']." > ".$dir_d['ciudad']; ?>" 
								data-salida="<?php echo date('d-m', strtotime($publicacion['fecha_salida']))." a las ".date('H:i', strtotime($publicacion['hora_salida']))." Hs"; ?>">
								<i class="fas fa-handshake"></i><span class="d-none d-lg-inline"> Candidatos</span>
							</button>
						</div>
						<?php } ?>
					</div>
				</form>
				
				<div style="width: 100%; height: 1px"></div>
				<!-- LISTADO DE COMENTARIOS -->
				<?php $cuenta = 0; foreach ($comentarios as $comentario) { ?>

				<?php if ($cuenta != 0) {  ?>
				<div class="col-12 e-card-comentario <?php echo 'comentario-oculto-'.$publicacion['id']; ?>" id="com-<?php echo $comentario['id']; ?>" style="display: none">
				<?php } else { ?>
				<div class="col-12 e-card-comentario" id="com-<?php echo $comentario['id']; ?>">
				<?php } ?>
					<a href="<?php echo $helper->url('usuario', 'perfil').'&id_usuario='.$comentario['id_usuario']; ?>" class="e-com-userlink">
						<img class="e-avatar" src="assets/img/avatares/<?php echo $comentario['usuario_avatar']; ?>.png" alt="User Avatar" style="width: 25px; height: 25px; padding-bottom: 4px">
						<strong> <?php echo $comentario['usuario']; ?></strong>
					</a> 
					<?php if ($comentario['id_usuario'] == $publicacion['id_usuario']) echo "(autor)"; ?>
					<?php if (isset($comentario['usuario_respuesta'])) { ?>
					resp. a <a href="<?php echo $helper->url('usuario', 'perfil').'&id_usuario='.$comentario['id_usuario_respuesta']; ?>"><?php echo $comentario['usuario_respuesta']; ?></a>
					<?php } ?>
					<!-- <span class="e-com-time">13:16 23/01/2019</span> -->
					<span class="e-com-time"><?php echo date("H:i", strtotime($comentario['hora']))." ".date("d-m-y", strtotime($comentario['fecha'])); ?></span>
					<span class="float-right">
						<button type="button" class="btn btn-sm e-com-accion e-btn-responder" data-com-id="<?php echo $comentario['id']; ?>" id="resp-1"><i class="fas fa-reply"></i></button> 
						<button type="button" class="btn btn-sm e-com-accion e-btn-reportar" data-com-id="<?php echo $comentario['id']; ?>" id="repo-1"><i class="fas fa-flag"></i></button>
					</span>
					<p style="margin-bottom: 0px"><?php echo $comentario['texto']; ?></p>
				</div>

				<div id="com-respuesta-<?php echo $comentario['id']; ?>" style="display: none"> <!-- Input respuesta a comentario -->
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
				<?php if ($comentarios && sizeof($comentarios) > 1) { ?>
				<button class="btn e-com-mostrar-mas" data-estado="min" data-id-publicacion="<?php echo $publicacion['id']; ?>">
					<span><i class="fas fa-angle-down"></i> Cargar mas comentarios (<?php echo sizeof($comentarios)-1; ?>)</span>
				</button>
				<?php } ?>
			</div> 
			<!-- FIN COMENTARIOS -->
		</div>
	</div>
</div>

<!-- MODAL POSTULACION -- ESTO NO DEBERIA ESTAR EN TODAS LAS PUBLICACIONES... SOLO DEBERÍA HABER UNO-->
<!-- <div class="modal fade" id="modal-postulaciones-<?php echo $publicacion['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" style="border-width: 0px;">
			<div class="modal-header e-modal-header">
				<h5 class="modal-title w-100 text-center">Postulación</h5>
			</div>
			<div class="modal-body e-modal-body">
				<h6 class="text-center">¿Deseas postularte para realizar el envío?</h6> <p class="text-center"><br> Actualmente hay <strong>13</strong> usuarios postulados <br> Por un precio mínimo de <strong>$2300</strong></p>
				<div class="e-divider" style="margin-top: -5px"></div>

				<p><span class="badge badge-dark e-card-badge">Desde</span> <span><?php echo $dir_o['provincia']." > ".$dir_o['ciudad']; ?></span></p>
				<p><span class="badge badge-dark e-card-badge">Hasta</span> <span><?php echo $dir_d['provincia']." > ".$dir_d['ciudad']; ?></span></p>
				<p><span class="badge badge-dark e-card-badge">Salida</span> <span><?php echo date('d-m', strtotime($publicacion['fecha_salida']))." a las ".date('H:i', strtotime($publicacion['hora_salida']))." Hs"; ?></span></p>


				<form action="<?php echo $helper->url('publicacion', 'postularse'); ?>" name="form-postulacion-<?php echo $publicacion['id']; ?>">
					<div class="form-row">
						<div class="col-6">
							<div class="form-group"> 
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text e-input-addon"><i class="fas fa-car"></i></i></span>
									</div>
									<select id="fp_id_vehiculo" name="fp_id_vehiculo" class="form-control e-input e-select decorated">
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
					<div class="col-12" style="margin-bottom: 20px">
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
 -->