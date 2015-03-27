<?php include "/secciones/encabezado.php" ?>
<?php include "/secciones/menu.php" ?>

	<div class="container">
		<h1>Evento "<?php echo $evento['nombre']?>": Alta de Taller</h1>
		<form action="index.php/welcome/altaTaller" method="post">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<span class="label label-default">Nombre:</span>
						<input name="nom" type="text" class="form-control" placeholder="Nombre del Taller">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<span class="label label-default">Cupo:</span>
						<input name="cupo" type="int" class="form-control" placeholder="Capacidad">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<span  class="label label-default">Instructor:</span>
						<select id="instructor" name="instructor" type="text" class="form-control">
							<option value="" selected="selected">Selecciona un Instructor</option>
							<?php
								foreach ($instructores as $key => $instructor) { ?>
								 	<option value="<?php echo $instructor['idinstructor']?>">
								 		<?php echo $instructor['nombre']?>
								 	</option>
							<?php } 
							?>
						</select>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<span class="label label-default">Evento:</span>
						<input name="evento" type="text" class="form-control" value="<?php echo $evento['nombre']?>" readonly>
					</div>
					<input type="hidden" name="idevento" value="<?php echo $evento['idevento']?>">
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<span class="label label-default">Fecha:</span>
						<input name="fecha" type="text" class="form-control" placeholder="AAAA-MM-DD" id="datepicker">
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
				<button type="button" class="pull-right btn btn-default" onclick="valida_taller();">Enviar</button>
			</div>

		</form>
	</div>
	
<?php include "/secciones/pie.php" ?>
