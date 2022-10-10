<html>
  <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
  </head>



		<div id="columnchart_values4" class="chart" style="height: 350px; "></div>
	

</html>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Nível de Avaliação - Risco Residual", "Quantidade", { role: "style" } ],
		  
		<?php
		 
				
				$selecao2=mysqli_query($conexao,"select * from avaliacao_risco_inerente WHERE nivel='Aceitável' ");
				$registros2=mysqli_fetch_array($selecao2);	
		  $riscos_residuais=mysqli_num_rows($selecao2);
					
			?>
        ["Aceitável ", <?php echo $riscos_residuais ?>, "#41841E"],
		
		  
		<?php
		  mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
				
				$selecao=mysqli_query($conexao,"select * from avaliacao_risco_inerente WHERE nivel='Aceitável' ");
				$registros=mysqli_fetch_array($selecao);	
		  $riscos_inerentes=mysqli_num_rows($selecao);
					
			?>
        ["Inaceitável", <?php echo $riscos_inerentes ?>, "#FF0000"],  
		  
			<?php
		  mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
				
				$selecao=mysqli_query($conexao,"select * from avaliacao_risco_inerente WHERE nivel='Significativo'  ");
				$registros=mysqli_fetch_array($selecao);	
		  $riscos_inerentes=mysqli_num_rows($selecao);
					
			?>
        ["Significativo", <?php echo $riscos_inerentes ?>, "#F2E70A"],    
		  
		  
		  
		  	<?php
		  mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
				
				$selecao=mysqli_query($conexao,"select * from avaliacao_risco_inerente WHERE nivel='Sério' ");
				$registros=mysqli_fetch_array($selecao);	
		  $riscos_inerentes=mysqli_num_rows($selecao);
					
			?>
        ["Sério", <?php echo $riscos_inerentes ?>, "#E58C2C"],     
		  
      
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
      
		  chartArea : { left: 0, top:50,  width: '100%' },

        bar: {groupWidth: "95%"},
        legend: { position: "none" },
		titleTextStyle: {
         fontSize: '18',
      },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values4"));
      chart.draw(view, options);
  }
	
	
  </script>






