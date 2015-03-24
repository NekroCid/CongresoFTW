<?php include "/secciones/encabezado.php" ?>
<?php include "/secciones/menu.php" ?>

	<div class="container">
		<h1>Modificar Ponente</h1>
		
		<form action="index.php/welcome/actualizaPonente" method="POST">
			<input type="hidden" name="id" value="<?php echo $ponente['idponente'] ?>">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<span class="label label-default">Nombre:</span>
						<input name="nom" type="text" class="form-control" placeholder="Nombre del Ponente" 
							value="<?php echo $ponente['nombre'] ?>"
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
							value="<?php echo $ponente['correo'] ?>"
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
							value="<?php echo $ponente['telefono']?>"
						>
					</div>
				</div>
				<div class="col-md-8"></div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<span class="label label-default">Domicilio:</span>
						<textarea name="domi" cols="2" class="form-control" placeholder="Calle ## Colonia"><?php echo $ponente['domicilio'] ?></textarea>
					</div>
				</div>
			</div>

			<div class="form-group">
					<button type="submit" class="btn btn-default">Enviar</button>
			</div>

		</form>

	</div>
	
<?php include "/secciones/pie.php"?>