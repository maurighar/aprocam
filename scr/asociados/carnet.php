<?php require '../sistema/header.php'; ?>
		<title>Carnet ISCAMEN</title>
		<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->

		<script type="text/javascript "src="../js/jquery-2.1.0.min.js"></script>
		<script type="text/javascript "src="../js/jquery.qrcode-0.7.0.min.js"></script>
		<style>
			.marco {
				display: flex;

			}
			.carnet {
				border:1px solid grey;
				width: 450px;
				text-align: center;
			}

			.qr_box {
				display: flex;
				flex-flow: row nowrap;
				justify-content: center;
				align-content: center;
				align-items: center;
				width: 100%;
				height: 100%;
			}
			.qr {
				order: 0;
				flex: 0 1 auto;
				align-self: auto;
			}
		</style>

	</head>

	<body>

<!-- Carnet de una unidad individual
segun parametro enviado -->

		<?php
			$valor_id = $_GET["cuit"] ;

			require '../sistema/connect_db.php';

			$resultado = $mysqli->query("SELECT * FROM empresas WHERE cuit = $valor_id");
			$fila = $resultado->fetch_assoc();

			$empresa = $fila['nombre'];
			$cuit = $fila['cuit'];
			$domicilio = $fila['calle'] . ' ' . $fila['numero'];
			if ($fila['piso']!='')
				$domicilio .= ' Piso ' . $fila['piso'];
			if ($fila['depto']!='')
				$domicilio .= ' Depto ' . $fila['depto'];
			$domicilio2 = $fila['localidad'] . ', ' . $fila['provincia'];

			$selec = 'SELECT * FROM aprocam.unidades WHERE';
			if (isset($_GET["id"])){
				$valor_id = $_GET["id"];
				$selec .= " id = $valor_id";
			}
			else {
				$selec .= " cuit = $valor_id";
			}
			$resultado = $mysqli->query("$selec");

			while ($fila = $resultado->fetch_assoc()) {

		?>
		<div class="marco">
			<div class="carnet">
				<img src="../image/aprocam_logo.png" alt="APROCAM" height=81px width=159px />
				<p>
					Razon social: <?php echo $empresa; ?> <br>
					Domicilio: <?php echo $domicilio; ?> <br>
					<?php echo $domicilio2; ?>
				</p>
				<p>CUIT: <?php echo $cuit; ?></p>

				<p>Dominio: <?php echo $fila['dominio']?></p>


			</div>

			<div class="carnet">
				<div class="qr_box">
					<div id="<?php echo $fila['dominio']?>" width="150" height="150" class="qr" ></div>
				</div>

			</div>
		</div>
		<br> <br>

		<script>
			$('#<?php echo $fila['dominio']?>').qrcode({
				render: 'div',
				size: 150,
				radius: 0.1,
				text: '<?php echo $empresa . ' ' . $cuit . ' ' . $fila['dominio']?>'
			});
		</script>
		<?php } ?>

<!--
				color: '#3a3',{
	// render method: `'canvas'`, `'image'` or `'div'`
	render: 'canvas',

	// version range somewhere in 1 .. 40
	minVersion: 1,
	maxVersion: 40,

	// error correction level: `'L'`, `'M'`, `'Q'` or `'H'`
	ecLevel: 'L',

	// offset in pixel if drawn onto existing canvas
	left: 0,
	top: 0,

	// size in pixel
	size: 200,

	// code color or image element
	fill: '#000',

	// background color or image element, `null` for transparent background
	background: null,

	// content
	text: 'no text',

	// corner radius relative to module width: 0.0 .. 0.5
	radius: 0,

	// quiet zone in modules
	quiet: 0,

	// modes
	// 0: normal
	// 1: label strip
	// 2: label box
	// 3: image strip
	// 4: image box
	mode: 0,

	mSize: 0.1,
	mPosX: 0.5,
	mPosY: 0.5,

	label: 'no label',
	fontname: 'sans',
	fontcolor: '#000',

	image: null
}-->



	</body>
</html>
