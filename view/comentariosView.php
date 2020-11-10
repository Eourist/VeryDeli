<!-- CARD COMENTARIOS -->
<div class="card e-card" style="margin-top: -15px; border-radius: 0px;">
	<div class="collapse d-lg-block" id="post-comentarios-<?php echo $publicacion['id']; ?>">
		<div class="card-body e-card-body-inv" style="padding: 10px;/">

			<div class="e-divider" style="margin-top: -5px"></div>
			<p class="text-center">Comentarios</p>
			<div class="e-divider" style="margin-top: -5px"></div>

			<form action="<?php echo $helper->url('publicacion', 'comentar'); ?>" method="POST">
				<div class="form-row">
					<div class="col-12" style="height: 38px">
						<div class="form-group">
							<div class="input-group">
								<input type="text" id="fc_comentario" name="fc_comentario" class="form-control e-input" placeholder="Haz un comentario...">
								<div class="input-group-append">
									<div class="input-group-btn e-input-addon" style="border-top-right-radius: 4px; border-bottom-right-radius: 4px">
										<input type="hidden" name="fc_id_publicacion" id="fc_id_publicacion" value="<?php echo $publicacion['id']; ?>">
										<input type="hidden" name="fc_id_usuario" id="fc_id_usuario" value="<?php echo $_SESSION['id']; ?>">
										<button type="submit" class="btn e-card-btn" style="z-index: 0">Enviar</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
			<?php foreach ($comentarios as $comentario) { ?>

			<div class="col-12 e-card-comentario" id="com-<?php echo $comentario['id']; ?>" style="">
				<a href="" class="e-com-userlink">
					<img class="e-avatar" src="assets/img/avatares/<?php echo $comentario['usuario_avatar']; ?>.png" alt="User Avatar" style="width: 25px; height: 25px; padding-bottom: 4px">
					<strong> <?php echo $comentario['usuario'] ?></strong>
				</a> 
				<?php if (isset($comentario['usuario_respuesta'])) { ?>
				respondiendo a <a href=""><?php echo $comentario['usuario_respuesta']; ?></a>
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
					<div class="form-row" id="comentario-respuesta" style="margin-top: -1px;">
						<div class="col-12">
							<div class="form-group">
								<div class="input-group">
									<input type="text" id="fc_respuesta" name="fc_respuesta" class="form-control e-input e-com-input-respuesta" placeholder="Responder a @Eourist">
									<div class="input-group-append">
										<div class="input-group-btn e-input-addon"   style="border-bottom-right-radius: 4px;">
											<input type="hidden" name="fc_id_publicacion" id="fc_id_publicacion" value="<?php echo $publicacion['id']; ?>">
											<input type="hidden" name="fc_id_usuario" id="fc_id_usuario" value="<?php echo $_SESSION['id']; ?>">
											<input type="hidden" name="fc_id_usuario_respuesta" id="fc_id_usuario_respuesta" value="<?php echo $comentario['id_usuario']; ?>">
											<button type="submit" class="btn e-card-btn" style="z-index: 0">Enviar</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>

			<?php } ?>
			<button class="btn e-com-mostrar-mas">
				<span><i class="fas fa-angle-down"></i> Cargar mas comentarios</span>
			</button>
		</div>
	</div>
</div>