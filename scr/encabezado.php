<!--
	Dirección del directorio raiz en el servidor del sitio Web
-->
<?php $raiz_sitio_web = '/aprocam/' ; ?>

<nav>
	<ul class="menus">
		<li><a href="<?php echo $raiz_sitio_web; ?>">#</a></li>
		<li><a href="<?php echo $raiz_sitio_web; ?>m/index.html">Movil</a></li>
		<li><a href="<?php echo $raiz_sitio_web; ?>sistema/rechazos.php">Rechazados</a>
			<ul class="menus">
				<li><a href="<?php echo $raiz_sitio_web; ?>sistema/consulta.php?Tipo=6&valorconsulta=Rechazos">Listado rechazados</a></li>	
			</ul></li>
			
		<li><a href="<?php echo $raiz_sitio_web; ?>sistema/carga_certificados.php">Carga de certificados</a></li>
		<li><a href="<?php echo $raiz_sitio_web; ?>sistema/cod_actividad.php">Nomenclador de Actividades</a></li>
	</ul>
</nav>

<header>
	<div class="encabezado">

		<img src="<?php echo $raiz_sitio_web; ?>image/aprocam_logo.png" alt="APROCAM" height=81px width=159px />
	</div>
	
	<p class="version">
		<?php
			echo date("D  d-m-Y");
		?>
		<br>
		Ver: 1.6.1
	</p>
</header>