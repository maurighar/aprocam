<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
		<link rel="icon" type="image/ico" href="../../favicon.ico">
        <title>RUTA - Consulta faltantes</title>
		<link rel="stylesheet" href="../css/normalize.css" />
		<link rel="stylesheet" href="../../css/main.css" />
		    <style type="text/css">
				thead tr {background-color: ActiveCaption; color: CaptionText;}
				th, td {vertical-align: top; font-family: "Tahoma"; font-size: 8pt; padding: 3px; }
				table, td {border: 1px solid silver;}
				table {border-collapse: collapse;}
				thead .col0 {width: 50px;}
				.col0 {text-align: right;}
				thead .col1 {width: 179px;}
				thead .col2 {width: 70px;}
				.col2 {text-align: right;}
				thead .col3 {width: 50px;}
				thead .col4 {width: 84px;}
				thead .col5 {width: 60px;}
				thead .col6 {width: 40px;}
				.col6 {text-align: right;}
				thead .col7 {width: 77px;}
				.col7 {text-align: right;}
				thead .col8 {width: 60px;}
				thead .col9 {width: 60px;}
				thead .col10 {width: 50px;}
				thead .col11 {width: 60px;}
				thead .col12 {width: 45px;}
				thead .col13 {width: 45px;}
				.tdrojo {background-color: "red";}

				tr:nth-child(2n+1) {background: #ddd; }
				tr:nth-child(2n+0) {background: #fff;}
				tbody tr:hover {background: #BDC3C7;}
			</style>
	</head>
    <body>
	    <?php require '../../encabezado.php'; ?>

	    <table>
	      <thead>
	        <tr>
	          <th class="col0">exped.</th>
	          <th class="col1">nombre</th>
	          <th class="col2">cuit</th>
	          <th class="col3">dominio</th>
	          <th class="col4">tipo</th>
	          <th class="col5">fecha</th>
	          <th class="col6">lote</th>
	          <!-- <th class="col7">id</th> -->
	          <th class="col8">certificado</th>
	          <th class="col9">entr.</th>
	          <th class="col10">rechazo</th>
	          <th class="col11">envio</th>
	          <th class="col12">obs</th>
	          <th class="col13"></th>
	        </tr>
	      </thead>
	      <tbody>
	        <tr>

			<?php
			function color_tipo($tramite) {
				switch ($tramite) {
				  case 'ALTA' :
					 return "CCFF99" ;
				     break;
				  case 'EMPRESA' :
					 return "CCFF99" ;
				     break;
				  case 'BAJA' :
					 return "FF9900" ;
				     break;
				  case 'REVALIDA' :
					 return "FFFF99" ;
				     break;
					}

				}

			require '../../config/connect_db.php';

			$resultado = $mysqli->query('SELECT * FROM aprocam.control WHERE control.entregado = "" AND control.certificado = 0 AND expediente > 199999 and (fecha +interval 70 day) <= curdate() AND (tipo = "ALTA" OR tipo = "EMPRESA")');

			while ($fila = $resultado->fetch_assoc()) {
				echo '<tr>' ;
				echo '<td class="col0">' . $fila['expediente'] . '</td>';
				echo '<td class="col1">' . $fila['nombre'] . '</td>';
				echo '<td class="col2">' . $fila['cuit'] . '</td>';
				echo '<td class="col3">' . $fila['dominio'] . '</td>';
				echo '<td class="col4" bgcolor=' . color_tipo($fila['tipo']) .  ' >' . $fila['tipo'] . '</td>';
				echo '<td class="col5">' . $fila['fecha'] . '</td>';
				echo '<td class="col6">' . $fila['lote'] . '</td>';
				#echo '<td class="col7">' . $fila['id'] . '</td>';
				# resalta los certificados que llegaron
				if ($fila['certificado']>0) {
					echo '<td bgcolor="green">' . $fila['certificado'] . '</td>';
				} else {
					echo '<td class="col8">' . $fila['certificado'] . '</td>';
				}
				# resalta los certificados entregados
				if (empty($fila['entregado'])) {
					echo '<td class="col9">' . $fila['entregado'] . '</td>';
				} else {
					echo '<td bgcolor="green">' . $fila['entregado'] . '</td>';
				}
				# resalta los rechazos
				if (empty($fila['rechazo'])) {
					echo '<td class="col10">'. $fila['rechazo'] . '</td>';
				} else {
				   	#echo '<td class="tdrojo" bgcolor="red">'. $fila['rechazo'] . '</td>';
					echo '<td class="tdrojo" bgcolor="red">';
					echo '<a href="../ver_rechazo.php?id='. $fila['id'] . '">Obs.</a>' ;
					echo '</td>' ;
				}

				# resalta los rechazos enviados a Bs. As.
				if ($fila['envio']>0) {
				   echo '<td bgcolor="green">' . $fila['envio'] . '</td>';
				} else {
					echo '<td class="col11">'. $fila['envio'] . '</td>';
				}


				#echo '<td class="col12">'. $fila['obs'] . '</td>';
				echo '<td class="col12">';
				if (!empty($fila['obs'])) {
					echo '<a href="../ver_obs.php?id='. $fila['id'] . '">Obs.</a>' ;
				}
				echo '</td>';

				echo '<td class="col13">';
				echo '<a href="../modificar.php?id='. $fila['id'] . '">Ver</a>' ;
				echo '</td>';
				echo '</tr>' ;
				}

	        ?>
			<tfoot>
				<td align=right colspan="13" rowspan="1">
					Desarrollado por Mauricio A. Ghilardi
				</td>
			</tfoot>
			</tbody>
		</table>
    </body>
</html>
