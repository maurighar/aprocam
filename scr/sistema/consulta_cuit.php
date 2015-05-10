<?php
$empresa = $mysqli->query("SELECT * FROM aprocam.clientes WHERE cuit =  $valor");

if ($empresa->num_rows === 0) {
	$para_insertar = $resultado->fetch_object();
	$cuit = $para_insertar->cuit;
	$nombre = $para_insertar->nombre;

	$mysqli->query("INSERT INTO clientes (cuit,nombre) VALUES ($cuit, '$nombre')");
	$empresa = $mysqli->query("SELECT * FROM aprocam.clientes WHERE cuit =  $valor");
}


$obs = $empresa->fetch_object();
?>


<div class="divisor">
	Razón Social: <? echo $obs->nombre; ?> </br>
	CUIT: <? echo $obs->cuit; ?></br>
	Obs: <a href="<? echo RAIZ_SITIO . 'sistema/clientes_info.php?id=' . $obs->id; ?>">Editar</a></br>
	<?
	if (!empty($obs->obs)) {
		echo '<div class="divisor">';
		echo $obs->obs;
		echo '</div>';
	}

	?>
</div>













<?php
$rechazos = $mysqli->query("SELECT * FROM aprocam.rechazos WHERE cuit = $valor");

if ($rechazos->num_rows > 0) {
?>

<h1>Rechazos</h1>
<table>
	<thead>
		<tr>
			<th>estado</th>
			<th>centro</th>
			<th>Exped.</th>
			<th>tipo</th>
			<th>procesado</th>
			<th>obs</th>
			<th>fecha</th>
			<th>planilla</th>
			<th>envio</th>
			<th>Info</th>
		</tr>
	</thead>
	<tbody>
		<?php while ($fila = $rechazos->fetch_object()) { ?>

		<tr class="consulta_tabla">
			<td class="estado <?php echo color_rojo($fila->anulado); ?>"><?php echo $fila->estado; ?></td>
			<td class="al_derecha"><?php echo $fila->centro; ?></td>
			<td class="al_derecha"><?php echo $fila->expediente; ?></td>
			<td><?php echo $fila->tipo; ?></td>
			<td><?php echo $fila->procesado; ?></td>
			<td><?php echo $fila->obs; ?></td>
			<td><?php convertir_fechas($fila->fecha,'normal'); ?></td>
			<td><?php convertir_fechas($fila->planilla,'normal'); ?></td>
			<td <?php echo color_envio($fila->envio); ?>><?php convertir_fechas($fila->envio,'normal'); ?></td>

			<?php if (empty($fila->info))
				echo'<td>';
			else
				echo '<td bgcolor="green">';?>
				<?php echo '<a href="rechazos_info.php?id='. $fila->id . '">Info</a>'; ?></td>
		</tr>

		<?php } ?>
	</tbody>
	<tfoot>
		<td align=right colspan="12" rowspan="1">
			Desarrollado por Mauricio A. Ghilardi
		</td>
	</tfoot>
</table>

<?php } // fin del control de rechazos

$resultado = $mysqli->query("SELECT *,GROUP_CONCAT(dominio SEPARATOR ' ') AS dominios FROM aprocam.control WHERE control.cuit =  $valor GROUP BY expediente,tipo ORDER BY expediente,tipo,dominio");

if ($resultado->num_rows === 0) {
	header("Location: msg_error.php?mensaje=La busqueda no arrojo resultados&tipo=OK");
}

?>

<h1>Consulta de tramites x CUIT</h1>

<table id="control">
	<thead>
		<tr>
			<th>exped.</th>
			<th>dominios</th>
			<th>tipo</th>
			<th>fecha</th>
			<th>lote</th>
			<th>certificado</th>
			<th>entr.</th>
			<th>rechazo</th>
			<th>envio</th>
			<th>obs</th>
		</tr>
	</thead>
	<tbody>
		<?php while ($linea = $resultado->fetch_object()) { ?>
			<tr>
				<td class="al_derecha">
					<a href="<?php echo "consulta.php?Tipo=4&valorconsulta=". $linea->expediente?>">
						<?php echo $linea->expediente?>
					</a>
				</td>

				<td class="dominioLista"> <?php echo $linea->dominios?> </td>

				<td bgcolor=<?php echo color_tipo($linea->tipo)?>>
					<?php echo $linea->tipo?>
				</td>

				<td class="fechas"> <?php convertir_fechas($linea->fecha,'normal');?> </td>

				<td class="al_derecha"> <?php echo $linea->lote?> </td>

				<?php
				# resalta los certificados que llegaron
				if ($linea->certificado>0) {
					?>
					<td bgcolor="green">
						<?php
					} else {
						?>
						<td class="fechas">
							<?php }
							convertir_fechas($linea->certificado,'normal'); ?>
						</td>

			<?php # resalta los certificados entregados
			if (empty($linea->entregado)) {
				echo '<td class="fechas">';
				if ($linea->certificado>0) {
					echo 'Certificado';
				}
			} else {
				echo '<td bgcolor="green">';
				echo $linea->entregado;
			}
			?>
		</td>

			<?php # resalta los rechazos
			if (empty($linea->rechazo)) { ?>

			<td> </td>

			<?php } else { ?>

			<td bgcolor="red">
				<a href="rechazo/ver_rechazo.php?id=<?php echo $linea->id?>">Obs.</a>
				<script>
					notificar("<?php echo 'Expediente rechazado: ' . $linea->nombre . ' - ' . $linea->dominio?>",{icon:'../image/Advertencia.png'}) ;
				</script>
			</td>
			<?php }

			# resalta los rechazos enviados a Bs. As.
			if ($linea->envio>0) { ?>
			<td bgcolor="green">
				<?php } else { ?>
				<td class="fechas">
					<?php }

					convertir_fechas($linea->envio,'normal');
					?>
				</td>

				<?php if (empty($linea->obs))
				echo'<td>';
				else
					echo '<td bgcolor="green">';?>

				<a href="ver_obs.php?id=<?php echo $linea->id ; ?>">Obs.</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>

	<tfoot>
		<td align=right colspan="13" rowspan="1">
			Desarrollado por Mauricio A. Ghilardi
		</td>
	</tfoot>

</table>






<?php
$tramites_viejos = $mysqli->query("SELECT * FROM aprocam.ruta WHERE ruta.cuit = " . $valor );

if ($tramites_viejos->num_rows > 0) {
?>
<h1>Tramites del sistema anterior</h1>
<table caption="Anteriores">
		<thead>
			<tr>
				<th>Centro</th>
				<th>Exped.</th>
				<th>dominio</th>
				<th>Fecha</th>
				<th>Tarj</th>
				<th>Lote</th>
				<th>entrega</th>
				<th>F. Entr</th>
				<th>Tarjeta</th>
				<th>Tipo</th>
				<th>Recibo</th>
				<th>Nro.</th>
			</tr>
		</thead>
	<tbody>
	<tr>


<?php while ($fila = $tramites_viejos->fetch_object()) { ?>
<tr>
	<td> <?php echo $fila->centro; ?> </td>
	<td> <?php echo $fila->expediente; ?> </td>
	<td> <?php echo $fila->dominio; ?> </td>
	<td> <?php echo $fila->fecha; ?> </td>
	<td> <?php echo $fila->tarj; ?> </td>
	<td> <?php echo $fila->lote; ?> </td>
	<td> <?php echo $fila->entrega; ?> </td>
	<td> <?php echo $fila->fecha_entr; ?> </td>
	<td> <?php echo $fila->nrotarjeta; ?> </td>
	<td> <?php echo $fila->tipo; ?> </td>
	<td> <?php echo $fila->recibo; ?> </td>
	<td> <?php echo $fila->nro_recibo; ?> </td>
</tr>

<?php } ?>

	<tfoot>
	<td  align=right colspan="14" rowspan="1">
	Desarrollado por Mauricio A. Ghilardi
	</td>
	</tfoot>
	</tbody>
</table>

<?php
}  // Fin de control de tramites anteriores
$mysqli->close();
?>