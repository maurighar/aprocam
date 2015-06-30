<?php
$cant_total = $liquida['cant_empresa']*2+$liquida['cant_alta']+$liquida['rptc_alta']+$liquida['cant_baja']+$liquida['cant_modif']+$liquida['rptc_modif']+$liquida['cant_reval']+$liquida['rptc_reval']+$liquida['cant_reimp']+$liquida['rptc_reimp']
?>

<div>
<table class="tabla_suma">
	<thead>
		<tr>
			<th class="columna1">Tipo de tramite</th>
			<th class="columna2">Tramites RUTA</th>
			<th class="columna3">Precio Unitario</th>
			<th class="columna4">Tramites RPTC</th>
			<th class="columna5">Precio Unitario</th>
			<th class="columna6">Importe</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Reg. Altas Empresa</td>
			<td class="al_derecha"><?php echo $liquida['cant_empresa']?></td>
			<td class="al_derecha">$&nbsp;<?php echo VALOR_TRAMITE*2?>,00</td>
			<td class="al_derecha">-</td>
			<td class="al_derecha">-</td>
			<td class="al_derecha">$&nbsp;<?php echo $liquida['cant_empresa']*VALOR_TRAMITE*2?>,00</td>
		</tr>
		<tr>
			<td>Reg. Altas Vehículos</td>
			<td class="al_derecha"><?php echo $liquida['cant_alta']?></td>
			<td class="al_derecha">$&nbsp;<?php echo VALOR_TRAMITE?>,00</td>
			<td class="al_derecha"><?php echo $liquida['rptc_alta']?></td>
			<td class="al_derecha">$&nbsp;<?php echo VALOR_TRAMITE?>,00</td>
			<td class="al_derecha">$&nbsp;<?php echo ($liquida['cant_alta']+$liquida['rptc_alta'])*VALOR_TRAMITE?>,00</td>
		</tr>
		<tr>
			<td>Reg. Bajas</td>
			<td class="al_derecha"><?php echo $liquida['cant_baja']?></td>
			<td class="al_derecha">$&nbsp;<?php echo VALOR_TRAMITE?>,00</td>
			<td class="al_derecha">-</td>
			<td class="al_derecha">-</td>
			<td class="al_derecha">$&nbsp;<?php echo ($liquida['cant_baja'])*VALOR_TRAMITE?>,00</td>
		</tr>
		<tr>
			<td>Reg. Reimpresiones</td>
			<td class="al_derecha"><?php echo $liquida['cant_reimp']?></td>
			<td class="al_derecha">$&nbsp;<?php echo VALOR_TRAMITE?>,00</td>
			<td class="al_derecha"><?php echo $liquida['rptc_reimp']?></td>
			<td class="al_derecha">$&nbsp;<?php echo VALOR_TRAMITE?>,00</td>
			<td class="al_derecha">$&nbsp;<?php echo ($liquida['cant_reimp']+$liquida['rptc_reimp'])*VALOR_TRAMITE?>,00</td>
		</tr>
		<tr>
			<td>Reg. Modificaciones</td>
			<td class="al_derecha"><?php echo $liquida['cant_modif']?></td>
			<td class="al_derecha">$&nbsp;<?php echo VALOR_TRAMITE?>,00</td>
			<td class="al_derecha"><?php echo $liquida['rptc_modif']?></td>
			<td class="al_derecha">$&nbsp;<?php echo VALOR_TRAMITE?>,00</td>
			<td class="al_derecha">$&nbsp;<?php echo ($liquida['cant_modif']+$liquida['rptc_modif'])*VALOR_TRAMITE?>,00</td>
		</tr>
		<tr>
			<td>Reg. Revalidas</td>
			<td class="al_derecha"><?php echo $liquida['cant_reval']?></td>
			<td class="al_derecha">$&nbsp;<?php echo VALOR_TRAMITE?>,00</td>
			<td class="al_derecha"><?php echo $liquida['rptc_reval']?></td>
			<td class="al_derecha">$&nbsp;<?php echo VALOR_TRAMITE?>,00</td>
			<td class="al_derecha">$&nbsp;<?php echo ($liquida['cant_reval']+$liquida['rptc_reval'])*VALOR_TRAMITE?>,00</td>
		</tr>

		<tr>
			<td colspan="6"></td>
		</tr>


		<tr>
				<td class="al_derecha" colspan="4" rowspan="1">Total de legajos</td>
				<td class="al_derecha"><?php echo ($cant_total)?></td>
				<td class="al_derecha" colspan="2">$&nbsp;<?php echo ($cant_total)*VALOR_TRAMITE?>,00</td>
			</tr>
		<tr>
			<td colspan="6"></td>
		</tr>

		<tr>
			<td colspan="4" rowspan="1" class="al_derecha">35% s/: </td>
			<td colspan="2" rowspan="1" class="al_derecha">$&nbsp;<?php echo ($cant_total)*VALOR_TRAMITE*.35 ?>,00</td>
		</tr>

	</tbody>

</table>
</div>
