<?php include "/secciones/encabezado.php" ?>
<?php include "/secciones/menu.php" ?>

<div class="container">
	<h1>Alta del Instructor</h1>
	<form action="index.php/welcome/altaInstructor" method="POST">

		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="nom">Nombre:</label>
					<input name="nom" type="text" class="form-control" placeholder="Nombre del Instructor">
				</div>
			</div>

			<div class="col-md-4">
				<div class="form-group">
					<label for="correo">E-Mail:</label>
					<input name="correo" type="text" class="form-control" placeholder="usuario@gmail.com">
				</div>
			</div>

			<div class="col-md-4">
				<div class="form-group">
					<label for="tel">Telefono:</label>
					<input name="tel" type="text" class="form-control" placeholder="Numero de Telefono">
				</div>
			</div>

		</div>

		<div class="form-group">
				<button type="submit" class="btn btn-default">Enviar</button>
		</div>

	</form>

</div>
	
<?php include "/secciones/pie.php" ?>