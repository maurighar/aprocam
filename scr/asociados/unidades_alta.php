<?php require '../sistema/header.php'; ?>
		<title>Socios - Unidades Alta</title>
	</head>

	<body>
		<?php
			require '../sistema/encabezado.php';
			require '../sistema/mensaje.php';

			if (isset( $_GET["mensaje"])){
				mensaje_actualizacion($_GET["mensaje"]>0);
			}
		?>

		<section>

			<form method="post" action="unidades_carga.php?cuit=<?php echo $_GET["cuit"]; ?>" enctype="application/x-www-form-urlencoded">
				<fieldset>
					<legend>Unidades</legend>

					<div class="flota">
						<label for="dominio">Dominio: </label>
						<input type="text" id="dominio" name="dominio_txt" placeholder="Dominio" title="Dominio" required />
					</div>

					<div class="clear"><input type="submit" id="envia-alta" name="enviar_btn" value=" Guardar " /></div>
				</fieldset>
			</form>

		</section>


		</section>

		<?php require '../sistema/footer.php'; ?>
	</body>
</html>
<!-- <a href="empresa.php?cuit=<?php echo $fila['cuit'] ; ?>">Modificar</a> -->