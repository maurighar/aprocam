<?php
$titulo_pagina = 'RUTA - Rechazos Información';
require 'header.php';

require 'rechazos_info_actualizar.php';

$valor_id = $_GET["id"] ;

require 'connect_db.php';
$resultado = $mysqli->query("SELECT * FROM aprocam.rechazos WHERE id = " . $valor_id);
$fila = $resultado->fetch_assoc();

?>
<script src="../js/ckeditor.js"></script>
<form class="divisor" method="post" action="?id=<?php echo $fila['id']?>" enctype="application/x-www-form-urlencoded">
	<label>Empresa</label>
	<?php echo $fila['razon']; ?>
	<br />
	<label>CUIT:</label>
	<?php echo $fila['cuit']; ?>
	<br />
	<label>Obserbación:</label>
	<?php echo $fila['obs']; ?>
	<br /><br />
	<label>Info.:</label>
	<br />

	<textarea class="ckeditor" cols="50" rows="10" name="info"><?php echo ltrim($fila['info']); ?></textarea>
	<br />
	<br />

	<input type="submit" name="submit" value="Confirmar" />
</form>

<a href="javascript:history.back()"> Volver Atrás</a>


<?php require 'footer.php'; ?>