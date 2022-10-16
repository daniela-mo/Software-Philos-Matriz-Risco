<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

@$de=$_POST['de'];
if($de!=0){
$de=str_replace('/', '-', $de);

$dia_de=substr($de,0,2);
$mes_de=substr($de,3,2);
$ano_de	=substr($de,6,4);

$de=$ano_de."-".$mes_de."-".$dia_de;
}
if($de==0){$de='1950-01-01';}

@$ate=$_POST['ate'];
if($ate!=0){
$ate=str_replace('/', '-', $ate);

$dia_ate=substr($ate,0,2);
$mes_ate=substr($ate,3,2);
$ano_ate	=substr($ate,6,4);

$ate=$ano_ate."-".$mes_ate."-".$dia_ate;

}
if($ate==0){$ate='2023-01-01';}
?>

<style>
#sectorPieBefore3 {
  width: 100%;
  height: 300px;
}

</style>


  <div id="sectorPieBefore3">
  
  </div>



<script>

am4core.useTheme(am4themes_animated);
sectorPieBefore = am4core.create("sectorPieBefore3", am4charts.PieChart3D);
	
      sectorPieBefore.data = [
		  
	<?php
		 mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');  
		  
		  
		  $i=0;
		  $cores[0]='#68D4CD';
		$cores[1]='#CFF67B';
		  $cores[2]='#94DAFB';
		  $cores[3]='#FD8080';
		  $cores[4]='#6D848E';
		  $cores[5]='#26A0FC';
		  $cores[6]='#26E7A6';
		  $cores[7]='#FEBC3B';
		  $cores[8]='#FAB1B2';
		  $cores[9]='#8B75D7';
		  
		$selecao=mysqli_query($conexao,"select * from workflow WHERE status ='aberto' and data BETWEEN '$de' and '$ate'  ");
		$registros=mysqli_fetch_array($selecao);	
		$status=mysqli_num_rows($selecao);
		 
				
		$selecao2=mysqli_query($conexao,"select * from workflow WHERE status ='concluido' and data BETWEEN '$de' and '$ate'  ");
		$registros2=mysqli_fetch_array($selecao2);	
		$status2=mysqli_num_rows($selecao2);
		 
			
					  
	?>	  
		  
		  {"sector":"Abertos",
		   "value":"<?php echo $status ?>",
		   "colour":"<?php echo $cores[0] ?>"},  
		  
		  
		   {"sector":"Concluídos",
		   "value":"<?php echo $status2 ?>",
		   "colour":"<?php echo $cores[1] ?>"},  
			
	
	]
		  


      sectorPieBefore.legend = new am4charts.Legend();
	sectorPieBefore.legend.position = "left";
sectorPieBefore.legend.fontSize = '11';
	



     

      var series = sectorPieBefore.series.push(new am4charts.PieSeries3D());
      series.dataFields.value = "value";
      series.dataFields.depthValue = "value";
      series.dataFields.category = "sector";
      series.slices.template.propertyFields.fill = "colour";
	  series.labels.template.disabled = true;
	series.calculatePercent = true;
	series.legendSettings.itemValueText = "{value}";
series.columns.template.tooltipText = "[bold]{name}[/]\n[font-size:15px]{sector}: [bold]{value[/] ({value}M)";


  

 

</script>













