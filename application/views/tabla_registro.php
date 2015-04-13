<?php include "/secciones/encabezado.php" ?>
<?php include "/secciones/menu.php" ?>

 <div class="container">
 	<table class="table .table-condensed">
 		<tr class="success">
 			<th>Participante</th>
 			<th>Evento</th>
 		</tr>
 		<tbody>
 			<?php 
 				$contador = 0;
 				if(count($registro)==0)echo "<tr class 'danger'><td>No hay registros</td></tr>";
 				foreach ($registro as $key => $value) {
 					echo "<tr class='active'>";
 					echo "<td>".$participante[$contador]."</td>";
 					echo "<td>".$evento[$contador]."</td>";
 					$contador=$contador+1;
 					echo "</tr>";
 				}
 			?>
 		</tbody>
 	</table>
 </div>

 <?php include "/secciones/pie.php" ?>