<?php 
	if (!isset($_SESSION['id']) && !isset($_SESSION['alerta']))
		session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/fontawesome/css/all.css">
	<link rel="stylesheet" href="assets/css/verydeli.css">

	<link rel="stylesheet" href="assets/css/font.css">
	
	<link rel="shortcut icon" href="assets/img/logo1.png">

	<!-- <script src="assets/js/jquery-3.5.1.js"></script>
	<script src="assets/js/bootstrap.bundle.js"></script>
	<script src="assets/js/jquery.validate.js"></script>
	<script src="assets/js/verydeli.js"></script> -->
	
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"> -->
	<title>VeryDeli</title>
</head>
<body>
	
	<?php 
	if (isset($_SESSION['alerta'])){
		echo "<script> alert(\"".$_SESSION['alerta']."\"); </script>";
		$_SESSION['alerta'] = NULL;
	}
	else
		echo "<script> console.log('No hay alertas'); </script>";

	if (isset($_SESSION['log'])){
		echo "<script> console.log(\"".$_SESSION['log']."\"); </script>";
		$_SESSION['log'] = NULL;
	}
	else
		echo "<script> console.log('No hay mensajes'); </script>";
	
	if (isset($_SESSION['nombre']))
		echo "<script> console.log('Usuario ' + '".$_SESSION['nombre']." - ".$_SESSION['id']."'); </script>";
	else
		echo "<script> console.log('No hay sesion iniciada'); </script>";
	?>

	

	