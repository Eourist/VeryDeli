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