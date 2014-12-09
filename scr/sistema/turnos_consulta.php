<?php
	require 'connect_db.php';
	$fecha_actual = date("Ymd");
	$resultado = $mysqli->query("SELECT * FROM turnos WHERE FECHA = $fecha_actual AND estado = 'pen' ORDER BY orden" );

	echo 'Día: ' + $fecha_actual;
?>
	<div class="alert alert-success" role="alert">
		<div id="info_fecha"></div>

		<script>
			function semanaISO($fecha){if($fecha.match(/\//)){$fecha=$fecha.replace(/\//g,"-",$fecha)}$fecha=$fecha.split("-");$dia=eval($fecha[0]);$mes=eval($fecha[1]);$ano=eval($fecha[2]);if($mes==1||$mes==2){$a=$ano-1;$b=Math.floor($a/4)-Math.floor($a/100)+Math.floor($a/400);$c=Math.floor(($a-1)/4)-Math.floor(($a-1)/100)+Math.floor(($a-1)/400);$s=$b-$c;$e=0;$f=$dia-1+31*($mes-1)}else{$a=$ano;$b=Math.floor($a/4)-Math.floor($a/100)+Math.floor($a/400);$c=Math.floor(($a-1)/4)-Math.floor(($a-1)/100)+Math.floor(($a-1)/400);$s=$b-$c;$e=$s+1;$f=$dia+Math.floor((153*($mes-3)+2)/5)+58+$s}$g=($a+$b)%7;$d=($f+$g-$e)%7;$n=$f+3-$d;if($n<0){$semana=53-Math.floor(($g-$s)/5);$ano=$ano-1}else if($n>364+$s){$semana=1;$ano=$ano+1}else{$semana=Math.floor($n/7)+1}return $semana}

			var cl = document.getElementById("info_fecha");

			fecha = new Date();
			fecha_sumada = fecha.valueOf() + ( 70 * 24 * 60 * 60 * 1000 );
			vto = new Date(fecha_sumada);
			vecha_car = fecha.getDate() + '/' + (fecha.getMonth()+1) + '/' + fecha.getFullYear();
			cl.innerHTML = 'Día: '+vecha_car+' <br>Semana Nº ' + semanaISO(vecha_car)+'. <br>Vencimiento del RUTA: ' + vto.getDate() + '/' + (vto.getMonth()+1) + '/' + vto.getFullYear() + ' (70 días).';

		</script>
	</div>
<table id="consulta_turnos">
	<thead>
		<tr>
			<th>Orden</th>
			<th>CUIT</th>
			<th>Empresa</th>
			<th>..</th>
		</tr>
	</thead>
	<tbody>
		<?php while ($linea = $resultado->fetch_object()) { ?>
		<tr>
			<td> <?php echo $linea->orden ?> </td>
			<td> <?php echo $linea->cuit ?> </td>
			<td> <?php echo $linea->razon ?> </td>
			<td> <a href="turnos.php?op=edit&id=<?php echo $linea->id ; ?>">Editar</a> </td>
		</tr>
		<?php } ?>
	</tbody>
	<tfoot>
		<td align=right colspan="5" rowspan="1">
		Desarrollado por Mauricio A. Ghilardi
		</td>
	</tfoot>
</table>
