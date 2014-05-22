<?php require 'header.php'; ?>

		<title>RUTA - Modificación</title>
	</head>

	<body>
		<?php
			require '../encabezado.php';
			require 'select_tipo.php';

			require 'mensaje.php';

			if (isset( $_GET["mensaje"])){
				mensaje_actualizacion($_GET["mensaje"]>0);
			}
		?>

		<section>
			<fieldset>
				<legend>Estado</legend>
				<?php
					$valor_id = $_GET["id"] ;

					require 'connect_db.php';

					$resultado = $mysqli->query("SELECT *,(fecha+interval 70 day) AS vto,DATEDIFF(CURDATE(),fecha) as cant_dias FROM aprocam.control WHERE id = " . $valor_id);
					$fila = $resultado->fetch_assoc();
						#Muestra el vencimiento del tramite en una celda
						echo "Expediente: " . $fila['expediente'] ;
						echo '<br /><br />';
						echo "Vencimiento: " .$fila['vto'];
						echo '<br />';
						echo "Cantidad de días: " . $fila['cant_dias'] ;
				?>
			</fieldset>
		</section>

		<section>
			<form method="post" action="modificar_carga.php" enctype="application/x-www-form-urlencoded">
				<fieldset>
					<legend>Carga de datos</legend>

					<div class="flota">
						<label>Razón social:</label>
						<input type="text" name="nombre" size="55" value="<?php echo $fila['nombre']?>" required/>
					</div>

					<div class="flota">
						<label>CUIT:</label>
						<input type="text" name="cuit" value="<?php echo $fila['cuit']?>" required />
					</div>

					<div class="clear flota">
						<label>Dominio:</label>
						<input type="text" name="dominio" value="<?php echo $fila['dominio']?>" required />
					</div>

					<div class="flota">
						<label>Tipo de tramite:</label>
						<select name="tipo" id="tipo" class="cambio">
							<?php select_tipo($fila['tipo']); ?>
						</select>
					</div>

					<div class="clear flota">
						<label>Fecha:</label>
						<input type="text" name="fecha" value="<?php echo $fila['fecha']?>" required />
					</div>

					<div class="flota">
						<label>Lote:</label>
						<input type="text" name="lote" value="<?php echo $fila['lote']?>"/>
					</div>

					<div class="clear flota">
						<label>Certificado:</label>
						<input type="text" name="certificado" value="<?php echo $fila['certificado']?>"/>
					</div>

					<div class="flota">
						<label>Entregado:</label>
						<input type="text" name="entregado" value="<?php echo $fila['entregado']?>"/>
					</div>

					<div class="clear flota">
						<label>Fecha envio:</label>
						<input type="text" name="envio" value="<?php echo $fila['envio']?>"/>
					</div>

					<div class="flota">
						<label>Detalle rechazos:</label>
						<textarea cols="60" rows="10" name="rechazo"><?php echo ltrim($fila['rechazo']); ?></textarea>
					</div>



					<div class="clear">
						<input type="hidden" name="id" value="<?php echo $fila['id'];?>" />
						<input type="submit" name="submit" value="Modificar" />
					</div>
				</fieldset>
			</form>
		</section>

		<section>
			<fieldset>
				<legend>Comentarios:</legend>

					<label>Rechazo:</label>
					<?php echo $fila['rechazo']; ?>

				<br /><br />
					<label>Observaciones</label>
					<?php echo $fila['obs']; ?>
			</fieldset>
		</section>


		<?php require 'footer.php'; ?>

	</table>

	</body>
</html>
