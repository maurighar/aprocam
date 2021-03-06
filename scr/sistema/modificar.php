<?php
$titulo_pagina = 'RUTA - Modificación';
require 'header.php';

require 'select_tipo.php';

require 'mensaje.php';

if (isset( $_GET["mensaje"])){
	mensaje_actualizacion($_GET["mensaje"]>0);
}
?>

<script src="../js/ckeditor.js"></script>
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
				<label>RPTC:</label>
				<input type="text" name="rptc" value="<?php echo $fila['rptc']?>"/>
			</div>

			<div class="clear flota">
				<label>Lote:</label>
				<input type="text" name="lote" value="<?php echo $fila['lote']?>"/>
			</div>

			<div class="clear flota">
				<label>Certificado:</label>
				<input type="text" name="certificado" id="certificado" value="<?php echo $fila['certificado']?>"/>
				<input type="button" name="boton" onclick="carga_fecha_certif( );" value="Hoy">
				<script>
				function carga_fecha_certif( ) {
					document.getElementById("certificado").value = moment().format("YYYY-MM-DD");
				}
				</script>
			</div>

			<div class="flota">
				<label>Entregado:</label>
				<input type="text" name="entregado" value="<?php echo $fila['entregado']?>"/>
			</div>

			<div class="clear">
				<label>Fecha envio:</label>
				<input type="text" name="envio" id="fecha_env" value="<?php echo $fila['envio']?>"/>
				<input type="button" name="boton" onclick="carga_fecha_envio( );" value="Hoy">
				<script>
				function carga_fecha_envio( ) {
					document.getElementById("fecha_env").value = moment().format("YYYY-MM-DD");
				}
				</script>

			</div>

			<div>
				<label>Detalle rechazos:</label>
				<textarea class="ckeditor" cols="60" rows="10" name="rechazo"><?php echo ltrim($fila['rechazo']); ?></textarea>
			</div>

			<script type="text/javascript">
				CKEDITOR.replace( 'rechazo' );
			</script


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
