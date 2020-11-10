	</div>
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<p style="margin-top: 5px; margin-bottom: 0px; width: 100%">VeryDely™ Todos los derechos reservados</p>
				</div>
			</div>
			<div class="row">
				<div class="col-12 w-100 text-center" style="font-size: 27px;">
					<a href="https://www.facebook.com" class="e-sn-button"><i class="fab fa-facebook-square"></i></a>
					<a href="https://twitter.com/?lang=es" class="e-sn-button"><i class="fab fa-twitter-square"></i></a>
					<a href="https://www.reddit.com" class="e-sn-button"><i class="fab fa-reddit-square"></i></a>
					<a href="https://www.instagram.com/?hl=es-la" class="e-sn-button"><i class="fab fa-instagram-square"></i></a>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/js/jquery-3.5.1.js"></script>
	<script src="assets/js/bootstrap.bundle.js"></script>
	<script src="assets/js/jquery.validate.js"></script>
	<script src="assets/js/verydeli.js"></script>


	<!-- <form id="test-form" name="test-form">
		<input type="text" name="nombre" id="nombre">
		<button type="submit">Submit</button>
	</form> -->
	
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

		// $('#test-form').validate({
		// 	rules: {
		// 		nombre: {
		// 			required: true
		// 		}
		// 	},
		// 	messages: {
		// 		nombre: {
		// 			required: "REQUERIDO!!"
		// 		}
		// 	}
		// });
	</script>
</body>
</html>