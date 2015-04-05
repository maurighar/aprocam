<?php
$titulo_pagina = 'RUTA - Rechazo';
require 'header.php'; ?>

<?php
	require 'rechazos_actualiza.php';
	require 'encabezado_rechazos.php';

	require 'connect_db.php';
	$tipo = $_GET["tipo"] ;
	switch ($tipo) {
		case 'completo' :
			$para_enlace = 'tipo=completo';
			$para_enlace2 = 'tipo=solucionado';
			$resultado = $mysqli->query("SELECT * FROM aprocam.rechazos ORDER BY expediente");
			break;
		case 'solucionado' :
			$resultado = $mysqli->query("SELECT * FROM aprocam.rechazos where envio = 0 and anulado = ''  ORDER BY expediente");
			$para_enlace = 'tipo=solucionado';
			$para_enlace2 = 'tipo=completo';
			break;
	}
	echo "<a href=\"?$para_enlace2\">Cambiar vista</a>";
?>

<table>
	<thead>
		<tr>
			<th>estado</th>
			<th>centro</th>
			<th>Exped.</th>
			<th>tipo</th>
			<th>procesado</th>
			<th>obs</th>
			<th>CUIT</th>
			<th>razon</th>
			<th>fecha</th>
			<th>planilla</th>
			<th>envio</th>
			<th>Info</th>
		</tr>
	</thead>
	<tbody>
		<?php while ($fila = $resultado->fetch_object()) { ?>

		<tr class="consulta_tabla">
			<td class="estado <?php echo color_rojo($fila->anulado); ?>"><?php echo $fila->estado; ?></td>
			<td class="al_derecha"><?php echo $fila->centro; ?></td>
			<td class="al_derecha">
				<a href="consulta.php?Tipo=4&valorconsulta=<?php echo $fila->expediente; ?>"><?php echo $fila->expediente; ?></a>
			</td>
			<td><?php echo $fila->tipo; ?></td>
			<td><?php echo $fila->procesado; ?></td>
			<td><?php echo $fila->obs; ?></td>
			<td class="al_derecha"><?php echo $fila->cuit; ?></td>
			<td><?php echo $fila->razon; ?></td>
			<td><?php convertir_fechas($fila->fecha,'normal'); ?></td>
			<td><?php convertir_fechas($fila->planilla,'normal'); ?></td>
			<td <?php echo color_envio($fila->envio); ?>><?php enlace_ID($fila->envio,$fila->id,$para_enlace); ?></td>

			<?php if (empty($fila->info))
				echo'<td>';
			else
				echo '<td bgcolor="green">';?>
				<?php echo '<a href="rechazos_info.php?id='. $fila->id . '">Info</a>'; ?></td>
		</tr>

		<?php
			}
			$mysqli->close();
		?>
	</tbody>
	<tfoot>
		<td align=right colspan="12" rowspan="1">
			Desarrollado por Mauricio A. Ghilardi
		</td>
	</tfoot>
</table>

<?php require 'footer.php'; ?>
