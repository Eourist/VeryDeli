
	<!-- CARD USUARIOS -->
	<div class="card e-card">
		<div class="card-header e-card-header">
			<h5>
				Usuarios encontrados
			</h5>
		</div>
		<div class="collapse">
			<div class="card-body e-card-body" style="padding: 10px;">
				
				<?php foreach ($usuarios as $u) { ?>
					<div class="e-card-historial" style="padding-bottom: 8px">
						<h6 class="mb-0">
								<span class="badge e-card-badge badge-dark">Reputacion <?php echo $u['datos']['reputacion']; ?></span> 
							<a href="<?php echo $helper->url('usuario', 'perfil').'&id_usuario='.$u['id']; ?>" style="color: black"><?php echo $u['nombre']; ?></a>
						</h6>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
