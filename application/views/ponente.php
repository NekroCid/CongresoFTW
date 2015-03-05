<?php include "/secciones/encabezado.php"?>
<?php include "/secciones/menu.php"?>

	<div class="container">
	<h1>Alta del Ponente</h1>
		<div class="row">
			<form action="index.php/welcome/altaEvento" method="POST">

				<div class="form-group">
					<label for="nom">Nombre:</label>
					<input name"nom" type="text" class="form-control" placeholder="Nombre del Ponente">
				</div>

				<div class="form-group">
					<label for="correo">E-Mail:</label>
					<input name"correo" type="text" class="form-control" placeholder="Correo">
				</div>

				<div class="form-group">
					<label for="tel">Telefono:</label>
					<input name"tel" type="text" class="form-control" placeholder="Numero de Telefono">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-default">Enviar</button>
				</div>

			</form>

		</div>
	</div>
	
<?php include "/secciones/pie.php"?>