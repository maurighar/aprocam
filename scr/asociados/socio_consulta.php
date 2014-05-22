<?php require '../sistema/header.php'; ?>
		<title>Socios - Consulta</title>
	</head>

	<body>
		<?php
			require '../encabezado.php';
			$valor = $_GET["valorconsulta"] ;
			$tipo = $_GET["Tipo"] ;

			require '../sistema/connect_db.php';
			$_selec = 'SELECT * FROM aprocam.empresas WHERE ';
			switch ($tipo) {
				case 'nombre' :
					$resultado = $mysqli->query("$_selec nombre like '%$valor%' order by nombre");
					break;
				case 'cuit' :
					$resultado = $mysqli->query("$_selec cuit = $valor order by cuit");
					break;
				case 'socio' :
					$resultado = $mysqli->query("$_selec socio =  $valor order by socio");
					break;
			}
		?>


		<table id="consulta_socios">
			<thead>
				<tr>
					<th>Nº Socio</th>
					<th>Razon Social</th>
					<th>CUIT</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php while ($fila = $resultado->fetch_assoc()) { ?>
				<tr>
					<td> <?php echo $fila['socio']?> </td>
					<td> <?php echo $fila['nombre']?> </td>
					<td> <?php echo $fila['cuit']?> </td>
					<td> <a href="empresa.php?cuit=<?php echo $fila['cuit'] ; ?>">Modificar</a></td>
					<td> <a href="empresa_baja.php?cuit=<?php echo $fila['cuit'] ; ?>">Baja</a></td>
				</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<td align=right colspan="5" rowspan="1">
				Desarrollado por Mauricio A. Ghilardi
				</td>
			</tfoot>
		</table>

		<?php require '../sistema/footer.php'; ?>
	</body>
</html>