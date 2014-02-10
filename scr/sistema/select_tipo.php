<?php
	function select_tipo($seleccionado) {
		// Crea un objeto select con los valores de tipo de tramite
		// y marca el que esta cargado en la BD

		require 'connect_db.php';

		$select = "SELECT * FROM tipo_tramite";
		$consulta_tipo = $mysqli->query($select);

		while ($linea = $consulta_tipo->fetch_assoc()){

			$valor_selected = '';
			if ($seleccionado == $linea["tipo"]){
				$valor_selected = ' selected';
			}

			echo '<option value="'. $linea["tipo"] .'"' . $valor_selected . '>'. $linea["tipo"] .'</option>';
		}
		$mysqli->close();
	}
?>