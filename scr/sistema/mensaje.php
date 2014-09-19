<?php
	function mensaje_actualizacion($valor_logico) {
		if($valor_logico){
			echo "<div class=\"mensaje_ok\">Se cargo correctamente el valor.</div>";
		}else{
			echo "<div class=\"mensaje_mal\">No se cargo el valor.</div>";
		}
	}
?>