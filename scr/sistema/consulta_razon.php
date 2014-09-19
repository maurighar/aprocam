<?php require 'header.php'; ?>

<title>RUTA - Consulta</title>
<link rel="stylesheet" media="print" href="../css/imprimir.css" />

<style>
	thead .fechas {
		width: 60px;
	}

	.al_derecha {
		text-align: right;
	}
</style>

</head>
<body onload="inicializar()">

	<?php
	require 'encabezado.php';
	require 'consulta_actualiza.php';

	$tipo_val = $_REQUEST["Tipo"] ;
	if ($tipo_val == 6){
		require 'rechazo/encabezado_rechazos.php';
	}

	$valor = $_REQUEST["valorconsulta"] ;
	$tipo = $_REQUEST["Tipo"] ;
	function color_tipo($tramite) {
		switch ($tramite) {
			case 'ALTA' :
			return "CCFF99" ;
			break;
			case 'EMPRESA' :
			return "CCFF99" ;
			break;
			case 'BAJA' :
			return "FF9900" ;
			break;
			case 'REVALIDA' :
			return "FFFF99" ;
			break;
		}
	}

	echo "Valor consultado: (" . $valor . ")</br>";

	require 'connect_db.php';
	$consulta = "SELECT *,GROUP_CONCAT(dominio SEPARATOR ' ') AS dominios FROM aprocam.control WHERE control.nombre like '%$valor%' GROUP BY expediente,tipo ORDER BY expediente,tipo,dominio ";
	$resultado = $mysqli->query("$consulta");
	// require_once 'modelo_ruta.php';
	// $tabla = new ruta();
	// $resultado = $tabla->consulta_razon($valor);
	?>

	<table caption="control (11 rows)">
		<thead>
			<tr>
				<th>exped.</th>
				<th>nombre</th>
				<th>cuit</th>
				<th>dominio</th>
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

					<td> <?php echo $linea->nombre?> </td>

					<td>
						<a href="<?php echo "consulta.php?Tipo=2&valorconsulta=". $linea->cuit ?>">
							<?php echo $linea->cuit?>
						</a>
					</td>

					<td class="dominioLista">
						<?php echo $linea->dominios?>
					</td>

					<td bgcolor=<?php echo color_tipo($linea->tipo)?>>
						<?php echo $linea->tipo?>
					</td>

					<td class="fechas">
						<?php convertir_fechas($linea->fecha,'normal');?>
					</td>

					<td class="al_derecha">
						<?php echo $linea->lote?>
					</td>

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
						echo "---";
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
						//notificar("<?php echo 'Expediente rechazado: ' . $linea->nombre . ' - ' . $linea->dominio?>",{icon:'../image/Advertencia.png'}) ;
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
			<?php }
			$mysqli->close();
			?>

		</tbody>

		<tfoot>
			<td align=right colspan="12" rowspan="1">
				Desarrollado por Mauricio A. Ghilardi
			</td>
		</tfoot>

	</table>
	<div class="noprint">
		<a href="../index.php">Volver a Home</a>
	</div>

	<div class="imprimir">
		<br><br><br>
		<p class="firma">
			Firma,   aclaración y   DNI
		</p>
	</div>

	<?php require 'footer.php'; ?>
</body>
</html>
