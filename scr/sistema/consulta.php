<?php require 'header.php'; ?>

		<title>RUTA - Consulta</title>
		<link rel="stylesheet" media="print" href="../css/imprimir.css" />

		<style>
			thead .col0 {width: 50px;}
			thead .col1 {width: 230px;}
			thead .col2 {width: 70px;}
			thead .col3 {width: 50px;}
			thead .col4 {width: 84px;}
			thead .col6 {width: 40px;}
			thead .col7 {width: 77px;}
			thead .col10 {width: 50px;}
			thead .col12 {width: 45px;}
			thead .col13 {width: 45px;}

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
			require '../encabezado.php';
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
			$_selec = 'SELECT * FROM aprocam.control WHERE ';
			switch ($tipo) {
				case 1 :
					$resultado = $mysqli->query("$_selec control.nombre like '%" . $valor . "%'");
					break;
				case 2 :
					$resultado = $mysqli->query("$_selec control.cuit = " . $valor );
					break;
				case 3 :
					$resultado = $mysqli->query("$_selec control.dominio =  '" . $valor . "'");
					break;
				case "dp":
					$resultado = $mysqli->query("$_selec control.dominio like '%" . $valor . "%'");
					break;
				case 4 :
					$resultado = $mysqli->query("$_selec control.expediente = " . $valor );
					break;
				case 5 :
					$resultado = $mysqli->query("$_selec control.lote = " . $valor );
					break;
				case 6 :
					$resultado = $mysqli->query("$_selec control.rechazo != ''  and control.envio = 0" );
					break;
			}
		?>

		<table caption="control (11 rows)">
			<thead>
				<tr>
					<th class="col0">exped.</th>
					<th class="col1">nombre</th>
					<th class="col2">cuit</th>
					<th class="col3">dominio</th>
					<th class="col4">tipo</th>
					<th class=".fechas">fecha</th>
					<th class="col6">lote</th>
					<th class="col8">certificado</th>
					<th class=".fechas">entr.</th>
					<th class=".fechas">rechazo</th>
					<th class=".fechas">envio</th>
					<th class="col12">obs</th>
					<th class="col13"></th>
				</tr>
			</thead>
		<tbody>
			<?php
				while ($fila = $resultado->fetch_assoc()) {
			?>
			<tr>
				<td class="al_derecha">
					<a href="<?php echo "consulta.php?Tipo=4&valorconsulta=". $fila['expediente']?>">
						<?php echo $fila['expediente']?>
					</a>
				</td>

				<td class="col1">
					<?php echo $fila['nombre']?>
				</td>

				<td class="col2">
					<a href="<?php echo "consulta.php?Tipo=2&valorconsulta=". $fila['cuit'] ?>">
					<?php echo $fila['cuit']?>
					</a>
				</td>

				<td class="col3">
					<?php echo $fila['dominio']?>
				</td>

				<td class="col4" bgcolor=<?php echo color_tipo($fila['tipo'])?>>
					<?php echo $fila['tipo']?>
				</td>

				<td class="fechas">
					<?php echo $fila['fecha']?>
				</td>

				<td class="al_derecha">
					<?php echo $fila['lote']?>
				</td>

				<?php
					# resalta los certificados que llegaron
					if ($fila['certificado']>0) {
				?>
				<td bgcolor="green">
				<?php
					} else {
					?>
				<td class="fechas">
				<?php }
					echo $fila['certificado']; ?>
				</td>

				<?php # resalta los certificados entregados
					if (empty($fila['entregado'])) {
						echo '<td class="fechas">';
						if ($fila['certificado']>0) {
							echo "<a href=\"?Tipo=$tipo_val&valorconsulta=$valor&id=" . $fila['id'] . "\">Marcar</a>";
						}
					} else {
						echo '<td bgcolor="green">';
						echo $fila['entregado'];
					}
					?>
				</td>

				<?php # resalta los rechazos
				if (empty($fila['rechazo'])) { ?>

				<td class="col10"> </td>

				<?php } else { ?>

				<td bgcolor="red">
					<a href="rechazo/ver_rechazo.php?id=<?php echo $fila['id']?>">Obs.</a>
					<script>
						notificar("<?php echo 'Expediente rechazado: ' . $fila['nombre'] . ' - ' . $fila['dominio']?>",{icon:'../image/Advertencia.png'}) ;
					</script>
				</td>
				<?php }

				# resalta los rechazos enviados a Bs. As.
				if ($fila['envio']>0) { ?>
					<td bgcolor="green">
				<?php } else { ?>
					<td class="fechas">
				<?php }

				echo $fila['envio'] ;
				?>
				</td>

				<?php if (empty($fila['obs']))
					echo'<td class="col12">';
				else
					echo '<td bgcolor="green">';?>

				<a href="ver_obs.php?id=<?php echo $fila['id'] ; ?>">Obs.</a>
				</td>

				<td class="col13">
					<a href="modificar.php?id=<?php echo $fila['id']?>">
						Ver
					</a>
				</td>
			</tr>
		<?php }
		$mysqli->close();
		?>

		</tbody>

		<tfoot>
			<td align=right colspan="13" rowspan="1">
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
