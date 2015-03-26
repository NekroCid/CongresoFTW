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
				if(count($datos)==0)echo "<tr class='active'><td>No hay ponentes registrados</td></tr>";
				foreach ($datos as $key => $value) {
					$ponenteA = $this->m_congreso->obtenerPonente($value['ponente_idponente']);
					$ponente = $ponenteA[0];
					$EventoA = $this->m_congreso->obtenerEvento($value['evento_idevento']);
					$Evento = $EventoA[0];
					echo "<tr class='active'>";
					echo "<td>".$value['nombre']."</td>";
					echo "<td>".$value['lugar']."</td>";
					echo "<td>".$value['fecha']."</td>";
					echo "<td>".$value['hora']."</td>";
					echo "<td>".$ponente['nombre']."</td>";
					echo "<td>".$Evento['nombre']."</td>";
					echo "<td>
						<a class='btn btn-warning btn-md' role='button' href='index.php/welcome/editarConferencia/".$value['idconferencia']."'>
							<spam class='glyphicon glyphicon-pencil' aria-hiden='true'</spam>
						</a>

						<a class='btn btn-danger btn-md' role='button' href='index.php/welcome/borrarConferencia/".$value['idconferencia']."'>
							<spam class='glyphicon glyphicon-trash' aria-hiden='true'</spam>
						</a>
					</td>";
					echo "</tr>";
				}
			?>
			</tbody>
		</table>
		<p><a class="btn btn-primary" href="index.php/welcome/taller" role="button" type='submit'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Agregar Conferencia</a></p>
	</div>

<?php include "/secciones/pie.php" ?>