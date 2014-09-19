<?php
	$titulo_pagina = 'Error';
	require 'header.php';
?>
	</head>

	<body onload="inicializar()">

	<?php
	require 'encabezado.php';
	if (isset( $_REQUEST["mensaje"])){
		echo '<div class="mensaje_mal">';
		echo $_REQUEST["mensaje"];
		echo '</div>';
	}
	?>


	<?php require 'footer.php'; ?>
	</body>
</html>