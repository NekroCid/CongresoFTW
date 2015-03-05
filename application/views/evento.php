<?php include "/secciones/encabezado.php"?>
<?php include "/secciones/menu.php"?>

	<div class="container">
		<h1>Alta de Evento</h1>
		<div class="row">
			<form action="index.php/welcome/altaEvento" method="POST">

				<div class="form-group">
					<label for="nom">Nombre:</label>
					<input name"nom" type="text" class="form-control" placeholder="Nombre del evento">
				</div>

				<div class="form-group">
					<label for="lugar">Lugar:</label>
					<input name"lugar" type="text" class="form-control" placeholder="Sede">
				</div>

				<div class="form-group">
					<label for="fecha">Fecha:</label>
					<input name"fecha" type="date" class="form-control" placeholder="DD/MM/AAAA">
				</div>

				<div class="form-group">
					<label for="hora">Hora:</label>
					<input name"hora" type="time" class="form-control" placeholder="HH:MM">
				</div>

				<div class="form-group">
					<label for="costo">Costo:</label>
					<input name"costo" type="text" class="form-control" placeholder="999.99">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-default">Enviar</button>
				</div>

			</form>
		</div>
	</div>
	
<?php include "/secciones/pie.php"?>
