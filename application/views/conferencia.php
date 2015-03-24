<?php include "/secciones/encabezado.php" ?>
<?php include "/secciones/menu.php" ?>

	<div class="container">
		<h1>Alta de Conferencia</h1>
		<form action="index.php/welcome/altaConferencia" method="post">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<span class="label label-default">Nombre:</span>
						<input name="nom" type="text" class="form-control" placeholder="Nombre de la Conferencia">
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
						<span class="label label-default">Ponente:</span>
						<select name="ponente" type="text" class="form-control">
							<?php
								foreach ($ponentes as $key => $ponente) { ?>
								 	<option id="<?php echo $ponente['idponente']?>">
								 		<?php echo $ponente['nombre']?>
								 	</option>
							<?php } 
							?>
						</select>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<span class="label label-default">Evento:</span>
						<input name="evento" type="text" class="form-control" value="<?php echo $evento['nombre']?>">
					</div>
					<input type="hidden" name"idevento" value="<?php echo $evento['idevento']?>">
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<span class="label label-default">Fecha:</span>
						<input name="fecha" type="date" class="form-control" placeholder="AAAA-MM-DD">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<span class="label label-default">Hora:</span>
						<input name="hora" type="time" class="form-control" placeholder="HH:MM">
					</div>
				</div>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-default">Enviar</button>
			</div>

		</form>
	</div>
	
<?php include "/secciones/pie.php" ?>
