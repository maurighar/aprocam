<?
	function cortar_valor($enDonde,$queBuscar) {
		$posInicial = stripos($enDonde, $queBuscar);
		if ($posInicial === false)
			return 0;
		$posInicial += 3;
		$posDelPunto = stripos($enDonde, '.',$posInicial);
		return substr ($enDonde , $posInicial,$posDelPunto-$posInicial )*1;
	}



?>