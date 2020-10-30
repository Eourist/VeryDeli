<div class="card e-card">
	<div class="card-header e-card-header">
		<h5>Nueva publicación</h5>
	</div>
	<div class="card-body e-card-body" style="padding: 10px;">
		<form action="<?php echo $helper->url("publicacion","crear"); ?>" method="post">
			<div class="form-row">
				<div class="col-12 col-md-6">
					<div class="form-group">
						<label for="f-input-1">Input 1 - Email <i class="fas fa-question-circle" data-toggle="tooltip" title="Extra info about the input field"></i></label>
						<input type="text" class="form-control e-input" id="nombre" name="nombre" aria-describedby="f-desc-1" placeholder="Enter input"><!-- 
						<small id="f-desc-1" class="form-text text-muted">Here I can give extra info about the input field.</small> -->
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="form-group">
						<label for="f-input-2">Input 2 - Password</label>
						<input type="password" class="form-control e-input" id="contraseña" name="contraseña"  placeholder="Enter your password">
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-6">
					<div class="form-group">
						<label for="f-select-1">Select 1</label>
						<select id="f-select-1" class="form-control e-input decorated">
							<option class="e-option" value="1">Option 1</option>
							<option class="e-option" value="2">Option 2</option>
							<option class="e-option" value="3">Option 3</option>
							<option class="e-option" value="4">Option 4</option>
						</select>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label for="f-select-2">Select 2</label>
						<select id="f-select-2" class="form-control e-input">
							<option class="e-option" value="1">Option 1</option>
							<option class="e-option" value="2">Option 2</option>
							<option class="e-option" value="3">Option 3</option>
							<option class="e-option" value="4">Option 4</option>
							<option class="e-option" value="5">Option 5</option>
							<option class="e-option" value="6">Option 6</option>
							<option class="e-option" value="7">Option 7</option>
							<option class="e-option" value="8">Option 8</option>
						</select>
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-12">
					<div class="form-group">
						<label for="f-area-1">Text Area</label>
						<textarea name="" id="f-area-1" cols="30" rows="3" class="form-control e-input" style="resize: none"></textarea>
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-12">
					<button type="submit" class="btn btn-sm float-right e-card-btn"><i class="fas fa-check-circle"></i> Confirmar</button>
				</div>
			</div>
		</form>
	</div>
</div>