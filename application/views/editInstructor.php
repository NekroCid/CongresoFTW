<?php include "/secciones/encabezado.php" ?>
<?php include "/secciones/menu.php" ?>

	<div class="container">
		<h1>Modificar Instructor</h1>
		
		<form action="index.php/welcome/actualizaInstructor" method="POST">
			<input type="hidden" name="id" value="<?php echo $instructor['idinstructor'] ?>">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<span class="label label-default">Nombre:</span>
						<input name="nom" type="text" class="form-control" placeholder="Nombre del Instructor" 
							value="<?php echo $instructor['nombre'] ?>"
						>
						<div class="error">
							<?php echo form_error('nom') ?>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<span class="label label-default">E-Mail:</span>
						<input name="correo" type="text" class="form-control" placeholder="usuario@gmail.com" 
							value="<?php echo $instructor['correo'] ?>"
						>
						<div class="error">
							<?php echo form_error('correo') ?>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<span class="label label-default">Telefono:</span>
						<input name="tel" type="text" class="form-control" placeholder="Numero de Telefono" 
							value="<?php echo $instructor['telefono']?>"
						>
					</div>
				</div>
				<div class="col-md-8"></div>
			</div>

			<div class="form-group">
					<button type="submit" class="btn btn-default">Enviar</button>
			</div>

		</form>

	</div>
	
<?php include "/secciones/pie.php"?>