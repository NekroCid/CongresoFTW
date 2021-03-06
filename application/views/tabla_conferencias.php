<?php include "/secciones/encabezado.php" ?>
<?php include "/secciones/menu.php" ?>

	<div class="container">
		<table class="table .table-condensed">
			<tr class="success">
				<th>Nombre</th>
				<th>Lugar</th>
				<th>Fecha</th>
				<th>Hora</th>
				<th>Instructor</th>
				<th>Evento</th>
				<th></th>
			</tr>
			<tbody>
			<?php
				$contador = 0;
				if(count($datos)==0)echo "<tr class='active'><td>No hay ponentes registrados</td></tr>";
				foreach ($datos as $key => $value) {
					echo "<tr class='active'>";
					echo "<td>".$value['nombre']."</td>";
					echo "<td>".$value['lugar']."</td>";
					echo "<td>".$value['fecha']."</td>";
					echo "<td>".$value['hora']."</td>";
					echo "<td>".$ponente[$contador]."</td>";
					echo "<td>".$evento[$contador]."</td>";
					echo "<td>
						<a class='btn btn-warning btn-md' role='button' href='index.php/welcome/editarConferencia/".$value['idconferencia']."'>
							<spam class='glyphicon glyphicon-pencil' aria-hiden='true'</spam>
						</a>

						<a class='btn btn-danger btn-md' role='button' href='index.php/welcome/borrarConferencia/".$value['idconferencia']."'>
							<spam class='glyphicon glyphicon-trash' aria-hiden='true'</spam>
						</a>
					</td>";
					echo "</tr>";
					$contador=$contador+1;
				}
			?>
			</tbody>
		</table>
		<p><a class="btn btn-primary" href="index.php/welcome/conferencia" role="button" type='submit'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Agregar Conferencia</a></p>
	</div>

<?php include "/secciones/pie.php" ?>