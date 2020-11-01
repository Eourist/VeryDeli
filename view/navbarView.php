<?php 
if (!isset($_SESSION['id'])) { 
	// Cerrar sesion por inactividad
	session_unset();
	$_SESSION['alerta'] = "Sesión cerrada por inactividad";
	header("Location:index.php?controller=publicacion&action=index"); 
} else {
	// Renovar sesion
    setcookie(session_name(),session_id(),time()+DURACION_SESION);
} ?>

<nav class="navbar navbar-expand-lg navbar-dark e-navbar">
	<div class="container h-100" style="padding: 0px 15px 0px 15px">
		<a class="navbar-brand e-nav-logo" href="<?php echo $helper->url('publicacion', 'inicio'); ?>"><img src="assets/img/logo2.png" alt=""></a>

		<button class="navbar-toggler e-navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse e-nav-menu h-100" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto h-100 e-nav-menu" style="background-color: #313131;">
				<li class="nav-item h-100">
					<form class="form-inline my-2 my-lg-0 nav-link e-nav-form e-nav-link" id="nav-search-form">
						<input class="form-control mr-2 mr-sm-2 e-input" style="display: none; width: 200px" type="text" placeholder="¿Qué está buscando?" aria-label="Buscar" id="nav-search-input">
						<a href="#" class="nav-link" id="nav-search-btn" style=""><i class="fas fa-search float-right"></i></a>
					</form>
				</li>
				<!-- <li class="nav-item h-100">
					<a class="nav-link e-nav-link" href="#"></a>
				</li> -->
				<li class="nav-item dropdown h-100">
					<a class="nav-link dropdown-toggle e-nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php 
						if (isset($_SESSION['nombre']))
							echo $_SESSION['nombre'];
						else
							echo "Mi Perfil";
						 ?>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?php echo $helper->url('usuario', 'miPerfil'); ?>">Ir a mi perfil</a>
						<!-- <div class="dropdown-divider"></div> -->
						<a class="dropdown-item" href="<?php echo $helper->url('usuario', 'cerrarSesion'); ?>">Cerrar sesión</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>
<!-- <div class="e-alert text-center">
	<p>Sesión iniciada correctamente</p>
</div> -->

<div class="container" id="e-main-container" style="background-color: #505050; min-height: 100vh; padding-bottom: 10px;">
	<div style="width: 100%; height: 85px;"></div>