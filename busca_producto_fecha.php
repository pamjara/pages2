<?php
include('conexion.php');

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

//COMPROBAMOS QUE LAS FECHAS EXISTAN
if(isset($desde)==false){
	$desde = $hasta;
}

if(isset($hasta)==false){
	$hasta = $desde;
}

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM ingresos WHERE fecha BETWEEN '$desde' AND '$hasta' ORDER BY id ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="100">N registro</th>
                <th width="200">Tipo Carga</th>
                <th width="150">Kilos</th>
                <th width="150">Patente</th>
                <th width="150">pasajeros</th>
				<th width="150">Fecha Registro</th>
               
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['numero'].'</td>
				<td>'.$registro2['estado'].'</td>
				<td>S/. '.$registro2['kilos'].'</td>
				<td>S/. '.$registro2['patente'].'</td>
				<td>S/. '.$registro2['pasajeros'].'</td>
				<td>'.fechaNormal($registro2['fecha']).'</td>
				
			</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>