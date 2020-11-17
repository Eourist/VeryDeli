<?php 
	session_destroy();
?>
<style>
		body{
			height: 100%; 
			width: 100%;
			background-image: url(assets/img/bg6.jpg);
			/*background-repeat: no-repeat;*/
			background-size: 100% 100%;

			color: #656565;
			font-family: 'Montserrat', sans-serif;
		}

		.e-container-center{
			display:flex;
			justify-content:center;
			align-items:center; 
			height: 100vh;
		}

		@media (max-height: 820px){
			.e-container-center{
				margin-top: 15px;
				align-items:start; 
			}
		}

		.e-central-panel{
			border-radius: 8px;
			min-height: 20vh;
			width: 80vh;
		}

		.e-central-panel .e-card .e-card-header{
			border-radius: 8px 8px 0px 0px !important;
		}
		.e-main-menu{
			height: 100%;
			width: 100%;
			display:flex;
			justify-content:center;
			align-items:center; 
		}

		.e-main-menu .btn{
			width: 130px;
			height: 38px;
			margin: 15px 5px 15px 5px;
		}
		.e-card-body p{
			font-size: 15px;
		}

		.e-inicio-img{
			width: 100%;
			height: auto;
			margin: auto;
		}
</style>
<body class="img-responsive">
<!-- <div class="e-alert text-center" style="margin-top: -15px !important">
	<p>Sesión cerrada por inactividad</p>
</div> -->

	<div class="container e-container-center">
		<!-- MENU PRINCIPAL -->
		<div class="e-central-panel animate__animated" id="main-menu">
			<div class="card e-card" style="height: 100%;">
				<div class="card-header e-card-header text-center" style="border-radius: 8px 8px 0px 0px">
					<h3>Transportes VeryDeli<a href="<?php echo $helper->url('publicacion', 'inicio'); ?>">™</a></h3>
				</div>
				<div class="card-body e-card-body" style="padding: 10px; border-radius: 8px;">
					<h5 class="text-center">¿Qué es VeryDeli?</h5>
					<div class="row">
						<div class="col-3 col-md-2 d-flex align-items-center">
							<img src="assets/img/delivery-truck128.png" class="e-inicio-img" alt="" style="">
						</div>
						<div class="col-9 col-md-10 d-flex align-items-center">
							<p class="">VeryDeli es una plataforma online gratuita en la que cualquiera puede realizar pedidos a domicilio de cualquier cosa, y el envio será llevado a cabo por otro usuario.</p>
						</div>
					</div>
					<h5 class="text-center">¿Cómo funciona?</h5>
					<div class="row">
						<div class="col-3 col-md-2 d-flex align-items-center">
							<img src="assets/img/handshake128.png" class="e-inicio-img" alt="" style="">
						</div>
						<div class="col-9 col-md-10 d-flex align-items-center">
							<p class="">Las solicitudes y los transportes son manejados por la comunidad: cualquiera puede publicar una solicitud, y otros usuarios pueden ofrecerse para llevar a cabo el transporte.</p>
						</div>
					</div>
					<h5 class="text-center">¿Es totalemente gratis?</h5>
					<div class="row">
						<div class="col-3 col-md-2 d-flex align-items-center">
							<img src="assets/img/network128.png" class="e-inicio-img" alt="" style="">
						</div>
						<div class="col-9 col-md-10 d-flex align-items-center">
							<p class="">Registrarse en VeryDeli es completamente gratis, y el precio de cada envio es decidido por los usuarios que intervengan en el. VeryDeli solo toma una comisión del 5% de cada transporte.</p>
						</div>
					</div>
					<!-- 
					
					
					 -->
					<div class="e-main-menu">
						<button type="button" class="btn e-card-btn" id="btn-signup">Iniciar sesión</button> 
						<button type="button" class="btn e-card-btn" id="btn-login">Registrarse</button>
					</div>
				</div>
			</div>
		</div>
		<!-- VENTANA DE INICIO DE SESION -->
		<div class="e-central-panel animate__animated" style="display: none; align-self: center !important;" id="login">
			<div class="card e-card" style="border-radius: 8px;">
				<div class="card-header e-card-header text-center" style="border-radius: 8px;">
					<h5 class="float-left" id="login-return"><i class="fas fa-chevron-circle-left"></i></h5>
					<h5>Inicia sesión en VeryDeli</h5>
				</div>
				<div class="card-body e-card-body" style="padding: 10px; border-radius: 8px;">
					<p class="text-center">Ingresa tus datos para iniciar sesión en VeryDeli.</p>
					<form action="<?php echo $helper->url("usuario","iniciarSesion"); ?>" id="form-inicio-sesion" method="post">
						<div class="form-row">
							<div class="col-6">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text e-input-addon"><i class="fas fa-user"></i></i></span>
										</div>
										<input type="email" class="form-control e-input" id="fl_email" name="fl_email" placeholder="Email">
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text e-input-addon"><i class="fas fa-key"></i></i></span>
										</div>
										<input type="password" class="form-control e-input" id="fl_contraseña" name="fl_contraseña" placeholder="Contraseña">
									</div>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-12">
								<button type="submit" class="btn float-right e-card-btn" style=""><i class="fas fa-check-circle"></i> Confirmar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- VENTANA DE REGISTRO -->
		<div class="e-central-panel animate__animated" style="display: none; align-self: center !important;" id="signup">
			<div class="card e-card" style="border-radius: 8px;">
				<div class="card-header e-card-header text-center" style="border-radius: 8px;">
					<h5 class="float-left" id="signup-return"><i class="fas fa-chevron-circle-left"></i></h5>
					<h5>Registrate en VeryDeli</h5>
				</div>
				<div class="card-body e-card-body" style="padding: 10px; border-radius: 8px;">
					<p class="text-center">¡Unite hoy a la comunidad de VeryDeli! <br> Es grátis, fácil y rápido.</p>
					<form action="<?php echo $helper->url("usuario","registrarse"); ?>" method="post" id="form-registro">
						<div class="form-row">
							<div class="col-6">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text e-input-addon"><i class="fas fa-user"></i></i></span>
										</div>
										<input type="text" class="form-control e-input" id="fs_nombre" name="fs_nombre" placeholder="Nombre">
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text e-input-addon"><i class="fas fa-user-tag"></i></i></span>
										</div>
										<input type="text" class="form-control e-input" id="fs_apellido" name="fs_apellido" placeholder="Apellido">
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
										<input type="email" class="form-control e-input" id="fs_email" name="fs_email" placeholder="Correo electrónico">
									</div>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text e-input-addon"><i class="fas fa-id-card"></i></span>
										</div>
										<input type="number" class="form-control e-input" id="fs_dni" name="fs_dni" placeholder="DNI">
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
										<input type="password" class="form-control e-input" id="fs_contraseña" name="fs_contraseña" placeholder="Contraseña">
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
		</div>
	</div>
	
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/jquery-3.5.1.js"></script>
	<script src="assets/js/bootstrap.bundle.js"></script>
	<script src="assets/js/jquery.validate.js"></script>
	<script src="assets/js/verydeli.js"></script>
	<script>
		function pruebaAjax(data){
			$.ajax({
				url: '<?php echo $helper->url('usuario', 'pruebaAjax');?>',
				type: 'POST',
				data: {data: data},
			})
			.done(function(data) {
				data = jQuery.parseJSON(data);
				console.log(data);
			});
		}
		// animate__backOutLeft animate__backInRight
		jQuery(document).ready(function($) {
			<?php if (isset($_SESSION['alerta'])) { echo "alert('".$_SESSION['alerta']."')"; } ?>
			
			$('#btn-signup').click(function(event) {
				$('#main-menu').fadeOut('fast', function(){
					$('#login').fadeIn('fast');
				});
			});

			$('#btn-login').click(function(event) {
				$('#main-menu').fadeOut('fast', function(){
					$('#signup').fadeIn('fast');
				});
			});

			$('#signup-return').click(function(event) {
				$('#signup').fadeOut('fast', function(){
					$('#main-menu').fadeIn('fast');
				});
			});

			$('#login-return').click(function(event) {
				$('#login').fadeOut('fast', function() {
					$('#main-menu').fadeIn('fast');
				});
			});
		});
	</script>
</body>
</html>