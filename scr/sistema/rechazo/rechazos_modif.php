<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link rel="icon" type="image/ico" href="../../favicon.ico">
		<title>RUTA - Consulta</title>

			<link rel="stylesheet" href="../../css/main.css" />
			</style>
		
	</head>
	<body>
		
		<?php
			require '../../encabezado.php';
			require 'encabezado_rechazos.php';
		?>

		<article>
			<form action="post" action="">

				<table class='sin_borde'>
					<tr>
						<td class='sin_borde_derecha'>
							<label>Estado:</label>
						</td>
						<td class='sin_borde'>
							<input type="text" name="Estado" value=""/> <br />
						</td>
					</tr>

					<tr>
						<td class='sin_borde_derecha'>
							<label>Centro:</label>
						</td>
						<td class='sin_borde'>
							<input type="text" name="Centro" value=""/> <br />
						</td>
					</tr>

					<tr>
						<td class='sin_borde_derecha'>
							<label>Expediente:</label>
						</td>
						<td class='sin_borde'>
							<input type="text" name="Expediente" value=""/> <br />
						</td>
					</tr>

					<tr>
						<td class='sin_borde_derecha'>
							<label>Tipo:</label>
						</td>
						<td class='sin_borde'>
							<input type="text" name="Tipo" value=""/> <br />
						</td>
					</tr>

					<tr>
						<td class='sin_borde_derecha'>
							<label>Fecha de procesado:</label>
						</td>
						<td class='sin_borde'>
							<input type="text" name="Procesado" value=""/> <br />
						</td>
					</tr>

					<tr>
						<td class='sin_borde_derecha'>
							<label>Observaciones:</label>
						</td>
						<td class='sin_borde'>
							<textarea cols="50" rows="10" name="obs"> </textarea>
						</td>
					</tr>

					<tr>
						<td class='sin_borde_derecha'>
							<label>CUIT:</label>
						</td>
						<td class='sin_borde'>
							<input type="text" name="CUIT" value=""/> <br />
						</td>
					</tr>

					<tr>
						<td class='sin_borde_derecha'>
							<label>Razón social:</label>
						</td>
						<td class='sin_borde'>
							<input type="text" name="razon" value=""/> <br />
						</td>
					</tr>

					<tr>
						<td class='sin_borde_derecha'>
							<label>Fecha del tramite:</label>
						</td>
						<td class='sin_borde'>
							<input type="text" name="fecha" value=""/> <br />
						</td>
					</tr>

					<tr>
						<td class='sin_borde_derecha'>
							<label>Fecha Planilla:</label>
						</td>
						<td class='sin_borde'>
							<input type="text" name="planilla" value=""/> <br />
						</td>
					</tr>

					<tr>
						<td class='sin_borde_derecha'>
							<label>Fecha de envio:</label>
						</td>
						<td class='sin_borde'>
							<input type="text" name="envio" value=""/> <br />
						</td>
					</tr>

				</table>
				
				<input type="submit" name="submit" value="Cargar" />

			</form>
		</article>



			
		<?php
			if (isset($_POST['submit'])){
				require 'registrar_rechazo.php';
			}
		?>
		<footer>
			<p class="webmaster">Desarrollado por Mauricio A. Ghilardi</p>
		</footer>	
		
	</body>
</html>