<?php
$titulo_pagina = 'Socios - Unidades';
require '../sistema/header.php';

require '../sistema/mensaje.php';

if (isset( $_GET["mensaje"])){
	mensaje_actualizacion($_GET["mensaje"]>0);
}

$valor_id = $_GET["id"] ;

require '../sistema/connect_db.php';

$_selec = "SELECT * FROM aprocam.unidades WHERE id = $valor_id";
$resultado = $mysqli->query("$_selec");
$fila = $resultado->fetch_assoc();
?>

<section>

	<form method="post" action="unidad_modif.php" enctype="application/x-www-form-urlencoded">
		<fieldset>
			<legend>Unidades</legend>

			<div class="flota">
				<label for="dominio">Dominio: </label>
				<input type="text" id="dominio" name="dominio_txt" value="<?php echo $fila['dominio']?>" placeholder="Dominio" title="Dominio" required />
			</div>

			<div class="flota">
				<label for="fecha">Fecha de alta: </label>
				<input type="text" id="fecha" name="fecha_txt" value="<?php echo $fila['fecha']?>" placeholder="Fecha de alta" title="Fecha de alta" />
			</div>

			<!-- <div class="clear flota">
				<label for="calle">Calle: </label>
				<input type="text" id="calle" name="calle_txt" value="<?php echo $fila['calle']?>" placeholder="Calle" title="Calle" required />
			</div> -->


			<div class="clear"><input type="submit" id="envia-alta" name="enviar_btn" value=" Guardar " /></div>
		</fieldset>
	</form>

</section>




</section>

<?php require '../sistema/footer.php'; ?>
