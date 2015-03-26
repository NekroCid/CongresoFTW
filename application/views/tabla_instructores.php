<?php include "/secciones/encabezado.php" ?>
<?php include "/secciones/menu.php" ?>

	<div class="container">
		<table class="table .table-condensed">
			<tr class="success">
				<th>Nombre</th>
				<th>Correo</th>
				<th>Telefono</th>
				<th></th>
			</tr>
			<tbody>
			<?php
				if(count($datos)==0)echo "<tr class='active'><td>No hay instructores registrados</td></tr>";
				foreach ($datos as $key => $value) {
					echo "<tr class='active'>";
					echo "<td>".$value['nombre']."</td>";
					echo "<td>".$value['correo']."</td>";
					echo "<td>".$value['telefono']."</td>";
					echo "<td>
						<a class='btn btn-warning btn-md' role='button' href='index.php/welcome/editarInstructor/".$value['idinstructor']."'>
							<spam class='glyphicon glyphicon-pencil' aria-hiden='true'</spam>
						</a>

						<a class='btn btn-danger btn-md' role='button' href='index.php/welcome/borrarInstructor/".$value['idinstructor']."'>
							<spam class='glyphicon glyphicon-trash' aria-hiden='true'</spam>
						</a>
					</td>";
					echo "</tr>";
				}
			?>
			</tbody>
		</table>
		<p><a class="btn btn-primary" href="index.php/welcome/instructor" role="button" type='submit'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Agregar Instructor</a></p>
	</div>

<?php include "/secciones/pie.php" ?>