<nav>
	<ul class="menus">
		<li><a href="<?php echo RAIZ_SITIO; ?>">#</a></li>
		<li><a href="<?php echo RAIZ_SITIO; ?>m/index.html">Movil</a></li>
		<li>
			<a href="<?php echo RAIZ_SITIO; ?>sistema/rechazos.php?tipo=solucionado">Rechazados</a>
			<ul class="menus">
				<li><a href="<?php echo RAIZ_SITIO; ?>sistema/consulta.php?Tipo=6&valorconsulta=Rechazos">Listado rechazados</a></li>
			</ul>
		</li>

		<li><a href="<?php echo RAIZ_SITIO; ?>sistema/carga_certificados.php">Carga de certificados</a></li>
		<li><a href="<?php echo RAIZ_SITIO; ?>sistema/liquidacion.php">Liquidación</a></li>
		<li><a href="<?php echo RAIZ_SITIO; ?>sistema/config.php">Config</a></li>
		<li><a href="<?php echo RAIZ_SITIO; ?>asociados/index.php">Asociados</a></li>
		<li><a href="http://admin03/wp">Blog</a></li>
		<li><a href="<?php echo RAIZ_SITIO; ?>sistema/Documentacion.html">Doc</a></li>

	</ul>

	<div class="version">
		<?php

			if ($_SESSION["autentificado"] = 'SI') {
			 	echo $_SESSION["usuario"]. '  ';
			} else {
				echo '<a href="' . RAIZ_SITIO . 'sistema/login.php"></a>  ';
			}

			echo date("D  d-m-Y");
		?>
		<br>
		Ver: 2.5.5
	</div>
</nav>

<header>
	<div class="encabezado">
		<img src="<?php echo RAIZ_SITIO; ?>image/aprocam_logo.png" alt="APROCAM" height=81px width=159px />

		<?php if (MODO_LOCAL) { echo '<br><strong>local</strong>'; } ?>

	</div>
	<div id="fecha"></div>
</header>
