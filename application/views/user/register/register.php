<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<?php if (validation_errors()) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($error)) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= $error ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="col-md-12">
			<div class="page-header">
				<h1>Registro</h1>
			</div>
			<?= form_open() ?>
				<div class="form-group">
					<label for="username">Usuario</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Ingrese su nombre">
					<p class="help-block">Al menos 4 caracteres, letras o números solamente</p>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su email">
					<p class="help-block">Una dirección de correo electrónico válida</p>
				</div>
				<div class="form-group">
					<label for="password">Contraseña</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña">
					<p class="help-block">Al menos 6 caracteres</p>
				</div>
				<div class="form-group">
					<label for="password_confirm">Confirmar Contraseña</label>
					<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirmar Contraseña">
					<p class="help-block">Debe coincidir con su contraseña</p>
				</div>

<div class="input-prepend">
		<span class="add-on">+506</span>
		Contact Number: <input class="span2" id="prependedInput" type="number" name="contactno" placeholder="Telefono" required>
		</div><br/>

<div class="form-group">

	Genero:




		<label class="radio">
		<input type="radio" name="gender" id="radmale" class="css-checkbox" value="Male" />Masculino
		</label>
		<label class="radio">
		<input type="radio" name="gender" id="radfemale" class="css-checkbox" value="Female" />Femenino
		</label>
		<textarea width="500px" rows="3" name="description" placeholder="Descripcion! "></textarea>
				
				</div>







				<div class="form-group">
					<input type="submit" class="btn btn-default" value="Registrarse">
				</div>
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->