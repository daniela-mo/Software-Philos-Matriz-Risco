<style>
#sectorPieBefore {
  width: 100%;
  height: 400px;
}

</style>

<script src="../js/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
  <div id="sectorPieBefore">
  
  </div>



<script>

am4core.useTheme(am4themes_animated);
sectorPieBefore = am4core.create("sectorPieBefore", am4charts.PieChart3D);
	
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
		  
				$selecao=mysqli_query($conexao,"select distinct area from identificacao_do_risco WHERE area!='0'  ");
				while($registros_matriz=mysqli_fetch_array($selecao)){
                $area=$registros_matriz['area'];
					
				$selecao2=mysqli_query($conexao,"select * from identificacao_do_risco WHERE area='$area'");
				$registros2=mysqli_fetch_array($selecao2);	
				$num=mysqli_num_rows($selecao2);	
					  
	?>	  
		  
		  {"sector":"<?php echo $registros2['area'] ?>",
		   "value":"<?php echo $num ?>",
		   "colour":"<?php echo $cores[$i] ?>"},  
		  
		  
		  
		  
	<?php $i=$i+1; } ?>	  
		
	
	]
		  
/*
	#5588BB
		#66BBBB
		#AA6644
		#99BB55
		#444466
		#BB5555
*/

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













