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
#sectorPieBefore9 {
  width: 100%;
  height: 300px;
}

</style>


  <div id="sectorPieBefore9">
  
  </div>



<script>

am4core.useTheme(am4themes_animated);
sectorPieBefore = am4core.create("sectorPieBefore9", am4charts.PieChart3D);
	
      sectorPieBefore.data = [
		  
	<?php
		 mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');  
		  
		  
		  $i=0;
		  $cores[0]='#41841E';
		  $cores[1]='#FF0000';
		  $cores[2]='#F2E70A';
		  $cores[3]='#E58C2C';
		  $cores[4]='#6D848E';
		  $cores[5]='#26A0FC';
		  $cores[6]='#26E7A6';
		  $cores[7]='#FEBC3B';
		  $cores[8]='#FAB1B2';
		  $cores[9]='#8B75D7';
		  
	
	mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
				
		$selecao=mysqli_query($conexao,"select * from avaliacao_risco_inerente WHERE nivel='Aceitável' and data BETWEEN '$de' and '$ate'   ");
		$registros=mysqli_fetch_array($selecao);	
		$nivel=mysqli_num_rows($selecao);
					
			?>
		  
		  {"sector":"Aceitável",
		   "value":"<?php echo $nivel ?>",
		   "colour":"<?php echo $cores[0] ?>"},  
		  
		<?php
		$selecao=mysqli_query($conexao,"select * from avaliacao_risco_inerente WHERE nivel='Inaceitável' and data BETWEEN '$de' and '$ate'   ");
		$registros=mysqli_fetch_array($selecao);	
		$nivel=mysqli_num_rows($selecao);
					
			?>
		 
		 {"sector":"Inaceitável",
		   "value":"<?php echo $nivel ?>",
		   "colour":"<?php echo $cores[1] ?>"},  
		  
		  
		  <?php
		$selecao=mysqli_query($conexao,"select * from avaliacao_risco_inerente WHERE nivel='Significativo' and data BETWEEN '$de' and '$ate'   ");
		$registros=mysqli_fetch_array($selecao);	
		$nivel=mysqli_num_rows($selecao);
					
			?>
		 
		 {"sector":"Significativo",
		   "value":"<?php echo $nivel ?>",
		   "colour":"<?php echo $cores[2] ?>"},  
		  
		  
		  
		   <?php
		$selecao=mysqli_query($conexao,"select * from avaliacao_risco_inerente WHERE nivel='Sério' and data BETWEEN '$de' and '$ate'   ");
		$registros=mysqli_fetch_array($selecao);	
		$nivel=mysqli_num_rows($selecao);
					
			?>
		 
		 {"sector":"Sério",
		   "value":"<?php echo $nivel ?>",
		   "colour":"<?php echo $cores[3] ?>"},  	
	
	]
		  


      sectorPieBefore.legend = new am4charts.Legend();
	sectorPieBefore.legend.position = "left";
sectorPieBefore.legend.fontSize = '11';
	



     

      var series = sectorPieBefore.series.push(new am4charts.PieSeries3D());
      series.dataFields.value = "value";
      series.dataFields.depthValue = "value";
      series.dataFields.category = "sector";
      series.slices.template.propertyFields.fill = "colour";
	  series.labels.template.disabled = false;
	series.calculatePercent = true;
	series.legendSettings.itemValueText = "{value}";
series.columns.template.tooltipText = "[bold]{name}[/]\n[font-size:15px]{sector}: [bold]{value[/] ({value}M)";


  

 

</script>













