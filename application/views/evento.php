<?php include "/secciones/encabezado.php" ?>
<?php include "/secciones/menu.php" ?>

	<div class="container">
		<h1>Alta de Evento</h1>
		<form action="index.php/welcome/altaEvento" method="post">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="nom">Nombre:</label>
						<input name="nom" type="text" class="form-control" placeholder="Nombre del Evento">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="lugar">Lugar:</label>
						<input name="lugar" type="text" class="form-control" placeholder="Sede">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="fecha">Fecha:</label>
						<input name="fecha" type="date" class="form-control" placeholder="AAAA-MM-DD">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="hora">Hora:</label>
						<input name="hora" type="time" class="form-control" placeholder="HH:MM">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="costo">Costo:</label>
						<input name="costo" type="float" class="form-control" placeholder="999.99">
					</div>
				</div>

			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-default">Enviar</button>
			</div>

		</form>
	</div>
	
<?php include "/secciones/pie.php" ?>
