<?php include "/secciones/encabezado.php" ?>
<?php include "/secciones/menu.php" ?>

	<div class="container">
		<h1>Alta de Evento</h1>
		<form action="index.php/welcome/altaEvento" method="post">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<span class="label label-default">Nombre:</span>
						<input name="nom" type="text" class="form-control" placeholder="Nombre del Evento">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<span class="label label-default">Lugar:</span>
						<input name="lugar" type="text" class="form-control" placeholder="Sede">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<span class="label label-default">Fecha:</span>
						<input name="fecha" type="date" class="form-control" placeholder="AAAA-MM-DD" id="datepicker">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<span class="label label-default">Hora:</span>
						<input name="hora" type="time" class="form-control" placeholder="HH:MM">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<span class="label label-default">Costo:</span>
						<input name="costo" type="float" class="form-control" placeholder="999.99">
					</div>
				</div>

			</div>

			<div class="form-group">
				<button type="submit" class="pull-right btn btn-default">Enviar</button>
			</div>

		</form>
	</div>
	
<?php include "/secciones/pie.php" ?>
