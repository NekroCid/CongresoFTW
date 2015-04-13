<?php include "/secciones/encabezado.php" ?>
<?php include "/secciones/menu.php" ?>

	<div class="container">
		<table class="table .table-condensed">
			<tr class="success">
				<th>Nombre</th>
				<th>RFC</th>
				<th>Correo</th>
				<th>Telefono</th>
				<th>Domicilio</th>
				<th>Taller</th>
				<th></th>
			</tr>
			<tbody>
			<?php
				$contador = 0;
				if(count($datos)==0)echo "<tr class='active'><td>No hay participantes registrados</td></tr>";
				foreach ($datos as $key => $value) {
					echo "<tr class='active'>";
					echo "<td>".$value['nombre']."</td>";
					echo "<td>".$value['RFC']."</td>";
					echo "<td>".$value['correo']."</td>";
					echo "<td>".$value['telefono']."</td>";
					echo "<td>".$value['domicilio']."</td>";
					echo "<td>".$taller[$contador]."</td>";
					echo "<td>
						<a class='btn btn-success btn-md' role='button' href='index.php/welcome/editarParticipante/".$value['idparticipante']."'>
							<spam class='glyphicon glyphicon-pencil' aria-hiden='true'</spam>
						</a>

					</td>";
					echo "</tr>";
					$contador=$contador+1;
				}
			?>
			</tbody>
		</table>
		<p><a class="btn btn-primary" href="index.php/welcome/participante" role="button" type='submit'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Agregar Participante</a></p>
	</div>

<?php include "/secciones/pie.php" ?>