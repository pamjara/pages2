

<div class="row">
					
					  
<?php 
if($tipo2==1){
echo '
    
    
<!-- ./col -->
<div class="col-lg-4 col-xs-6">
<!-- small box -->
<div class="small-box bg-green">
<div class="inner">
<h3>
Entrada y Salida<sup style="font-size: 20px"></sup>
</h3>
<p>
Registrar Ingresos
</p>
</div>
<div class="icon">
<a href="?mod=registroingresos&nuevo" class="small-box-footer"></a>
</div>
<a href="?mod=registroingresos&nuevo" class="small-box-footer">
MAS INFORMACION <i class="fa fa-arrow-circle-right"></i>
</a>
</div>
</div><!-- ./col -->


<div class="col-lg-4 col-xs-6">
<!-- small box -->
<div class="small-box bg-yellow">
<div class="inner">
<h3>Estadisticas </h3>
<p>
Control Diario
</p>
</div>
<div class="icon">
<a href="?mod=registrokardex&total" class="small-box-footer"></a>
</div>
<a href="?mod=registrokardex&total" class="small-box-footer">
MAS INFORMACION <i class="fa fa-arrow-circle-right"></i>
</a>
</div>
</div><!-- ./col -->


<!-- Small boxes (Stat box) -->
<div class="row">
<div class="col-lg-4 col-xs-6">
<!-- small box -->
<div class="small-box bg-blue">
<div class="inner">
<h3>Administracion</h3>
<p>
administradores y usuarios.                                   </p>
</div>
<div class="icon">
<i class="ion "></i>
</div>
<a href="?mod=registroadmin&lista=lista" class="small-box-footer">
MAS INFORMACION <i class=""></i>
</a>
</div>
</div><!-- ./col -->


</div><!-- /.row -->

';
}

?>

<!-- top row -->

<!-- /.row -->

<!-- START ACCORDION & CAROUSEL-->
                   
                  
                      
<?php 
	$conexion = mysql_connect("localhost","root","");
	mysql_select_db("aduana",$conexion);
	
	$meses = array('','Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sept','Oct','Nov','Dic');
	for($x=1;$x<=12;$x=$x+1){
		$cantidad[$x]=0;		
	}
	
	$anno=date('Y');
	
	$sql=mysql_query("SELECT * FROM ingresos");
	while($row=mysql_fetch_array($sql)){
		$y=date("Y", strtotime($row['fecha']));
		
		$mes=(int)date("m", strtotime($row['fecha'])); 
		
		if($y==$anno){
			$cantidad[$mes]=$cantidad[$mes]+$row['kilos'];
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mes', 'kilos'],
		  <?php
		  	for($x=1;$x<=12;$x=$x+1){	
		  ?>
          ['<?php echo $meses[$x]; ?>',  <?php echo $cantidad[$x] ?>],
		  <?php } ?>
        ]);

        var options = {
          title: 'Estadísticas de ingresos',
          hAxis: {title: 'Grafica Reporte  Anual', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
<title></title>
</head>

<body>
	<div id="chart_div" style="width: 98%; height: 500px;"></div>
</body>
</html>
                        
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    
                    </div><!-- /.row -->


