<?php  
$nav_menu_principal='gestaoderisco';
$nav_menu_pagina='matrizderiscos';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit=no">
	<title>Dashboard Philos</title>
	<link rel="stylesheet" type="text/css" href="bibliotecas/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/sb-admin.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">

	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
</head>
<style>
	body{
  background-color: #333;
}

#barChart{
  background-color: aliceblue;
  border-radius: 6px;
}


	</style>	

	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
<?php
	include('menu.php');
	mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
			
?>	

<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Matriz de Risco</span>
						</div>
					</div>
					
					
				</div>
			</div>



<div class="row ml-4 mr-4">
				<div class="col-12">
					
			
					
 	<h3 class="mb-4 mt-4">Dashboard Riscos</h3>			
	
									
					
				</div>
</div>
			
			
			
<div class="row ml-4 mr-4">
	
	<div class="col-md-6">
		<div id="columnchart_values" class="chart" style="height: 350px; "></div>
	</div>
	
	<div class="col-md-6">
		<div id="columnchart_values2" class="chart" style="height: 350px; "></div>
	</div>
	
</div>
			
			
</div>
</div>	
	


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>



<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Tipo do Risco", "Quantidade", { role: "style" } ],
		  
		<?php
		 
				
				$selecao2=mysqli_query($conexao,"select * from tabela_avaliacao_risco_residual ");
				$registros2=mysqli_fetch_array($selecao2);	
		  $riscos_residuais=mysqli_num_rows($selecao2);
					
			?>
        ["Risco Residual", <?php echo $riscos_residuais ?>, "#68D4CD"],
		
		  
		<?php
		 
				
				$selecao=mysqli_query($conexao,"select * from tabela_avaliacao_risco_inerente ");
				$registros=mysqli_fetch_array($selecao);	
		  $riscos_inerentes=mysqli_num_rows($selecao);
					
			?>
        ["Risco Inerente", <?php echo $riscos_inerentes ?>, "#yellow"],  
      
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


