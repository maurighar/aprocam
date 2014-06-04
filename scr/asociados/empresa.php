<?php require '../sistema/header.php'; ?>
		<title>Socios - Empresa</title>
	</head>

	<body>
		<?php
			require '../sistema/encabezado.php';
			require '../sistema/mensaje.php';

			if (isset( $_GET["mensaje"])){
				mensaje_actualizacion($_GET["mensaje"]>0);
			}

			$valor_id = $_GET["cuit"] ;

			require '../sistema/connect_db.php';

			$resultado = $mysqli->query("SELECT * FROM empresas WHERE cuit = $valor_id");
			$fila = $resultado->fetch_assoc();
		?>

		<section>

			<form method="post" action="empresa_modif.php" enctype="application/x-www-form-urlencoded">
				<fieldset>
					<legend>Empresa asociadas</legend>

					<div>
						<label for="cuit">CUIT: </label>
						<input type="text" id="cuit" name="cuit_txt"  value="<?php echo $fila['cuit']?>" placeholder="Número de CUIT" title="Número de CUIT" readonly/>
					</div>

					<div class="flota">
						<label for="socio">Nº de asociados: </label>
						<input type="text" id="socio" name="socio_txt" value="<?php echo $fila['socio']?>" placeholder="Número de asociado" title="Número de asociado" required />
					</div>

					<div class="flota">
						<label for="nombre">Nombre: </label>
						<input type="text" id="nombre" name="nombre_txt" value="<?php echo $fila['nombre']?>" placeholder="Nombre empresa" title="Nombre empresa" required />
					</div>

					<div class="clear flota">
						<label for="calle">Calle: </label>
						<input type="text" id="calle" name="calle_txt" value="<?php echo $fila['calle']?>" placeholder="Calle" title="Calle" required />
					</div>

					<div class="flota">
						<label for="numero">Número: </label>
						<input type="text" id="numero" name="numero_txt" value="<?php echo $fila['numero']?>" placeholder="Número de la calle" title="Número de la calle" required />
					</div>

					<div class="clear flota">
						<label for="piso">Piso: </label>
						<input type="text" id="piso" name="piso_txt" value="<?php echo $fila['piso']?>" placeholder="Piso" title="Piso" />
					</div>

					<div class="flota">
						<label for="depto">Departamento: </label>
						<input type="text" id="depto" name="depto_txt" value="<?php echo $fila['depto']?>" placeholder="Departamento" title="Departamento" />
					</div>

					<div class="clear flota">
						<label for="provincia">Provincia: </label>
						<input type="text" id="provincia" name="provincia_txt" value="<?php echo $fila['provincia']?>" placeholder="Provincia" title="Provincia" required />
					</div>

					<div class="flota">
						<label for="localidad">Localidad: </label>
						<input type="text" id="localidad" name="localidad_txt" value="<?php echo $fila['localidad']?>" placeholder="Localidad" title="Localidad" required />
					</div>


					<div class="clear flota">
						<label for="telefono">Teléfono: </label>
						<input type="text" id="telefono" name="telefono_txt" value="<?php echo $fila['telefono']?>" placeholder="Número de teléfono" title="Número de teléfono" />
					</div>

					<div class="flota">
						<label for="email">E-Mail: </label>
						<input type="email" id="email" name="email_txt" value="<?php echo $fila['email']?>" placeholder="Dirección de mail" title="Dirección de mail" />
					</div>

					<div class="clear"><input type="submit" id="envia-alta" name="enviar_btn" value=" Guardar " /></div>
				</fieldset>
			</form>

		</section>

		<section class="divisor">
			<p>
				Pulse en <a href="carnet.php?cuit=<?php echo $fila['cuit'] ; ?>">aqui</a> para emitir todos los carnets de la empresa.
			</p>
		</section>

		<section class="divisor">
		<?php
			$_selec = "SELECT * FROM aprocam.unidades WHERE cuit = $valor_id";
			$resultado = $mysqli->query("$_selec");
		?>

		<h1>Listado de unidades</h1>
		<a  class="enlace_boton" href="unidades_alta.php?cuit=<?php echo $fila['cuit']; ?>">Alta Unidad</a>
		<table id="consulta_socios">
			<thead>
				<tr>
					<th>Dominio</th>
					<th>Fecha Alta</th>
					<th>..</th>
					<th>..</th>
					<th>..</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($fila = $resultado->fetch_assoc()) { ?>
				<tr>
					<td> <?php echo $fila['dominio']?> </td>
					<td> <?php echo $fila['fecha']?> </td>
					<td> <a href="unidades_modif.php?id=<?php echo $fila['id']; ?>">Modificar</a></td>
					<td> <a href="unidades_baja.php?id=<?php echo $fila['id'] . '&cuit=' . $fila['cuit']; ?>">Baja</a> </td>
					<td> <a href="carnet.php?cuit=<?php echo $fila['cuit'] . '&id=' . $fila['id']; ?>">Carné</a> </td>
				</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<td align=right colspan="5" rowspan="1">
				Desarrollado por Mauricio A. Ghilardi
				</td>
			</tfoot>
		</table>


		</section>

		<?php require '../sistema/footer.php'; ?>
	</body>
</html>
<!-- <a href="empresa.php?cuit=<?php echo $fila['cuit'] ; ?>">Modificar</a> -->