<?php require 'header.php'; ?>
	<title>Autentificación PHP</title>
</head>

<body>
	<?php
		require 'encabezado.php';
		//errorusuario
	?>
	<h1>Autentificación PHP</h1>

	<form action="control_usuario.php" method="POST">
		<label for="usuario">Usuario:</label>
		<input type="Text" name="usuario"/>
		<label for="pass">Password:</label>
		<input type="password" name="pass"/>
		<input type="submit" name="submit" value="ENTRAR"/>
	</form>
</body>
</html>