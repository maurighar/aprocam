<?php
$titulo_pagina = 'Sistema RUTA';
require 'header.php';

require 'ver_obs_modif.php';

$valor_id = $_REQUEST["id"] ;

require 'connect_db.php';
$resultado = $mysqli->query("SELECT * FROM aprocam.control WHERE id = " . $valor_id);
$fila = $resultado->fetch_assoc();

?>

<script src="../js/ckeditor.js"></script>


<form class="divisor" method="post" action="?id=<?php echo $fila['id']?>" enctype="application/x-www-form-urlencoded">
	<label>Empresa</label>
	<?php echo $fila['nombre']; ?>
	<br />
	<label>CUIT:</label>
	<?php echo $fila['cuit']; ?>
	<br />
	<label>Dominio:</label>
	<?php echo $fila['dominio']; ?>
	<br />
	<label>Fecha:</label>
	<?php echo $fila['fecha']; ?>
	<br /><br />
	<label>Obser.:</label>
	<br />
	<textarea class="ckeditor" name="obs" id="obs" cols="80" rows="10"><?php echo ltrim($fila['obs']); ?></textarea>

			<script type="text/javascript">
				CKEDITOR.replace( 'obs' );
			</script>


	<br />
	<br />

	<input type="submit" name="submit" value="Confirmar" />
</form>



<a href="javascript:history.back()"> Volver Atrás</a>

<?php require 'footer.php'; ?>