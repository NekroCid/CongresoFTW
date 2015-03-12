<?php include "/secciones/encabezado.php" ?>
<?php include "/secciones/menu.php" ?>

	<div class="container">
	<h1>Alta del Ponente</h1>
		
		<form action="index.php/welcome/altaPonente" method="POST">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="nom">Nombre:</label>
						<input name="nom" type="text" class="form-control" placeholder="Nombre del Ponente" 
							value="<?php echo set_value('nom') ?>"
						>
						<div class="error">
							<?php echo form_error('nom') ?>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="correo">E-Mail:</label>
						<input name="correo" type="text" class="form-control" placeholder="usuario@gmail.com" 
							value="<?php echo set_value('correo') ?>"
						>
						<div class="error">
							<?php echo form_error('correo') ?>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="tel">Telefono:</label>
						<input name="tel" type="text" class="form-control" placeholder="Numero de Telefono" 
							value="<?php 
									if (isSet($_POST['tel'])){
										echo $_POST['tel']; 
									}
								?>"
						>
					</div>
				</div>
				<div class="col-md-8"></div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="dom">Domicilio</label>
						<textarea name="domi" cols="2" class="form-control" placeholder="Calle ## Colonia"></textarea>
					</div>
				</div>
			</div>

			<div class="form-group">
					<button type="submit" class="btn btn-default">Enviar</button>
			</div>

		</form>

	</div>
	
<?php include "/secciones/pie.php"?>