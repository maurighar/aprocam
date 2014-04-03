<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Socios - Empresa Alta</title>
		<link rel="icon" image="type/ico" href="../favicon.ico" />
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/normalize.css" />
		<link rel="stylesheet" href="../css/main.css" />
	</head>

	<body>
		<?php 
			require '../encabezado.php';
			require '../sistema/mensaje.php';

			if (isset( $_GET["mensaje"])){
				mensaje_actualizacion($_GET["mensaje"]>0);
			}
		?>
	
		<section>

		<form method="post" action="empresa_carga.php" enctype="application/x-www-form-urlencoded"> 
			<fieldset>
				<legend>Alta de empresa asociadas</legend>

				<div>
					<label for="socio">Nº de asociados: </label>
					<input type="text" id="socio" name="socio_txt" placeholder="Número de asociado" title="Número de asociado" required />
				</div>

				<div>
					<label for="nombre">Nombre: </label>
					<input type="text" id="nombre" name="nombre_txt" placeholder="Nombre empresa" title="Nombre empresa" required />
				</div>

				<div>
					<label for="cuit">CUIT: </label>
					<input type="text" id="cuit" name="cuit_txt" placeholder="Número de CUIT" title="Número de CUIT" required />
				</div>

				<div>
					<label for="calle">Calle: </label>
					<input type="text" id="calle" name="calle_txt" placeholder="Calle" title="Calle" required />
				</div>

				<div>
					<label for="numero">Número: </label>
					<input type="text" id="numero" name="numero_txt" placeholder="Número de la calle" title="Número de la calle" required />
				</div>

				<div>
					<label for="piso">Piso: </label>
					<input type="text" id="piso" name="piso_txt" placeholder="Piso" title="Piso" />
				</div>

				<div>
					<label for="depto">Departamento: </label>
					<input type="text" id="depto" name="depto_txt" placeholder="Departamento" title="Departamento" />
				</div>

				<div>
					<label for="provincia">Provincia: </label>
					<input type="text" id="provincia" name="provincia_txt" placeholder="Provincia" title="Provincia" required />
				</div>

				<div>
					<label for="localidad">Localidad: </label>
					<input type="text" id="localidad" name="localidad_txt" placeholder="Localidad" title="Localidad" required />
				</div>


				<div>
					<label for="telefono">Teléfono: </label>
					<input type="text" id="telefono" name="telefono_txt" placeholder="Número de teléfono" title="Número de teléfono" />
				</div>

				<div>
					<label for="email">E-Mail: </label>
					<input type="email" id="email" name="email_txt" placeholder="Dirección de mail" title="Dirección de mail" />
				</div>


				<div><input type="submit" id="envia-alta" name="enviar_btn" value=" Agregar " /></div>

				<?php //require "mensajes.php"; ?>


			</fieldset>
		</form>


		</section>

		<?php require '../sistema/footer.php'; ?>
	</body>
</html>
