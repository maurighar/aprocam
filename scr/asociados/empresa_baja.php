<?php
$titulo_pagina = 'Socios - Empresa Baja';
require '../sistema/header.php';

$valor_id = $_GET["cuit"] ;

require '../sistema/connect_db.php';

$resultado = $mysqli->query("SELECT * FROM empresas WHERE cuit = $valor_id");
$fila = $resultado->fetch_assoc();
?>

<section>
	<div>
		<h1>
			Esta seguro de realizar la baja. <br>
			CUIT: <?php echo $fila['cuit']?> <br>
			Razon Social: <?php echo $fila['nombre']?><br><br>

			<a href="empresa_baja2.php?cuit=<?php echo $fila['cuit']?>" class="enlace_boton">Baja</a>
		</h1>
	</div>
</section>

<?php require '../sistema/footer.php'; ?>

<!-- <a href="empresa.php?cuit=<?php echo $fila['cuit'] ; ?>">Modificar</a> -->