<?php
	function mensaje_actualizacion($valor_logico) {
		if($valor_logico){
			echo "<span class=\"mensaje_ok\">Se cargo correctamente el valor.</span><br /><br />";
		}else{
			echo "<span class=\"mensaje_mal\">No se cargo el valor.</span><br />";
		}
	}
?>