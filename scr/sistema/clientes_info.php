<?php
$titulo_pagina = 'Sistema RUTA';
require 'header.php';

require 'clientes_info_carga.php';

$valor_id = $_REQUEST["id"] ;

require 'connect_db.php';
$resultado = $empresa = $mysqli->query("SELECT * FROM aprocam.clientes WHERE id =  $valor_id");
$fila = $resultado->fetch_object();


?>

<script src="../js/ckeditor.js"></script>


<form class="divisor" method="post" action="?id=<?php echo $valor_id?>" enctype="application/x-www-form-urlencoded">
	<label>Empresa</label>
	<?php echo $fila->nombre; ?>
	<br />
	<label>CUIT:</label>
	<?php echo $fila->cuit; ?>
	<br />
	<label>Obser.:</label>
	<br />
	<textarea class="ckeditor" name="obs" id="obs" cols="80" rows="10"><?php echo ltrim($fila->obs); ?></textarea>

	<script> CKEDITOR.replace( 'obs' ); </script>


	<br />
	<br />

	<input type="submit" name="submit" value="Confirmar" />
</form>



<a href="javascript:history.back()"> Volver Atrás</a>

<?php require 'footer.php'; ?>