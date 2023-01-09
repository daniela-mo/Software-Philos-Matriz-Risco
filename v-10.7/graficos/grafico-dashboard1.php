<html>
  <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
  </head>



		<div id="columnchart_values" class="chart" style="height: 350px; "></div>
	

</html>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Área", "Quantidade de Riscos", { role: "style" } ],
		  
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
					
			?>
        ["<?php echo $registros_matriz['area'] ?>", <?php echo mysqli_num_rows($selecao2) ?>, "<?php echo $cores[$i] ?>"],
		<?php $i=$i+1; } ?>  
		  
		  
      
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "",
		  titleTextStyle: {
         fontSize: '18',
      },
      
		  chartArea : { left: 0, top:50,  width: '100%' },

        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>



<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Área", "Quantidade", { role: "style" } ],
		  
		<?php
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
					
			?>
        ["<?php echo $registros_matriz['area'] ?>", <?php echo mysqli_num_rows($selecao2) ?>, "<?php echo $cores[$i] ?>"],
		<?php $i=$i+1; } ?>  
		  
		  
      
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Riscos por áreas",
      
		  chartArea : { left: 0, top:50,  width: '100%' },

        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values2"));
      chart.draw(view, options);
  }
	
	
  </script>

