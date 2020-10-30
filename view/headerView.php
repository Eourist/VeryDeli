<?php 
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
	
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"> -->
	<title>VeryDeli</title>
</head>
<body>
	<?php 
	if (isset($_SESSION['alerta'])){
		echo "<script> console.log(\"".$_SESSION['alerta']."\"); </script>";
		$_SESSION['alerta'] = NULL;
	}
	else
		echo "<script> console.log('No hay alertas'); </script>";
	if (isset($_SESSION['nombre']))
		echo "<script> console.log('Usuario ' + '".$_SESSION['nombre']." - ".$_SESSION['id']."'); </script>";
	else
		echo "<script> console.log('No hay sesion iniciada'); </script>";
	?>

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
	</script>