<?php include "/secciones/encabezado.php" ?>
<?php include "/secciones/menu.php" ?>

<div class="container">
	<h1>Alta del Participante</h1>
	<form action="index.php/welcome/altaParticipante" method="POST">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<span class="label label-default">Nombre:</span>
					<input name="nom" type="text" class="form-control" requiered placeholder="Nombre del Ponente" 
						value="<?php echo set_value('nom') ?>"
					>
					<div class="error">
						<?php echo form_error('nom') ?>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="form-group">
					<span class="label label-default">E-Mail:</span>
					<input id="correo" name="correo" type="text" class="form-control" placeholder="usuario@gmail.com" 
						value="<?php echo set_value('correo') ?>"
					>
					<div class="error">
						<?php echo form_error('correo') ?>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="form-group">
					<span class="label label-default">RFC:</span>
					<input id="rfc" name="rfc" type="text" class="form-control" placeholder="RFC" 
						value="<?php echo set_value('rfc') ?>"
					>
					<div class="error">
						<?php echo form_error('rfc') ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<span class="label label-default">Telefono:</span>
					<input name="tel" type="text" class="form-control" placeholder="Numero de Telefono" 
						value="<?php 
								if (isSet($_POST['tel'])){
									echo $_POST['tel']; 
								}
							?>"
					>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<span class="label label-default">Domicilio:</span>
					<textarea name="domi" cols="2" class="form-control" placeholder="Calle ## Colonia"><?php 
								if (isSet($_POST['domi'])){
									echo $_POST['domi']; 
								}
							?></textarea>
				</div>
			</div>
		</div>
			<div class="form-group">
				<button type="submit" class="btn btn-default">Enviar</button>
			</div>
	</form>
</div>
	
<?php include "/secciones/pie.php" ?>