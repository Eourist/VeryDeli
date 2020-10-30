<div class="card e-card">
	<div class="card-header e-card-header text-center">
		<h5>Registrate en VeryDeli</h5>
	</div>
	<div class="card-body e-card-body" style="padding: 10px;">
		<form action="<?php echo $helper->url("usuario","guardar"); ?>" method="post">
			<div class="form-row">
				<div class="col-6">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text e-input-addon"><i class="fas fa-user"></i></i></span>
							</div>
							<input type="text" class="form-control e-input" id="f_nombre" name="f_nombre" placeholder="Nombre" required>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text e-input-addon"><i class="fas fa-user-tag"></i></i></span>
							</div>
							<input type="text" class="form-control e-input" id="f_apellido" name="f_apellido" placeholder="Apellido" required>
						</div>
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-12 col-md-6">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text e-input-addon"><i class="fas fa-at"></i></span>
							</div>
							<input type="email" class="form-control e-input" id="f_email" name="f_email" placeholder="Correo electrónico" required>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text e-input-addon"><i class="fas fa-id-card"></i></span>
							</div>
							<input type="number" class="form-control e-input" id="f_dni" name="f_dni" placeholder="DNI" required>
						</div>
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-12 col-md-6">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text e-input-addon"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" class="form-control e-input" id="f_contraseña" name="f_contraseña" placeholder="Contraseña" required>
							<button class="btn e-card-btn float-right e-right-btn"><i class="fas fa-eye"></i></button>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6">
					<button type="submit" class="btn float-right e-card-btn" style=""><i class="fas fa-check-circle"></i> Confirmar</button>
				</div>
			</div>
		</form>
	</div>
</div>