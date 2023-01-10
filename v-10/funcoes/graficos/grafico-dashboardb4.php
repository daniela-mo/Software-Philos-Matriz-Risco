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

<html>
  <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
  </head>



		<div id="columnchart_values2" class="chart" style="height: 350px; "></div>
	

</html>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Tipo do Risco", "Quantidade", { role: "style" } ],
		  
		<?php
		 mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
	?>
		  
		<?php
		  
				
				$selecao=mysqli_query($conexao,"select * from avaliacao_risco_inerente WHERE data BETWEEN '$de' and '$ate'  ");
				$registros=mysqli_fetch_array($selecao);	
		  $riscos_inerentes=mysqli_num_rows($selecao);
					
			?>
        ["Risco Inerente", <?php echo $riscos_inerentes ?>, "#58508d"],    
		  
		  
		  <?php
				$selecao2=mysqli_query($conexao,"select * from avaliacao_risco_residual WHERE data BETWEEN '$de' and '$ate'  ");
				$registros2=mysqli_fetch_array($selecao2);	
		  $riscos_residuais=mysqli_num_rows($selecao2);
					
			?>
        ["Risco Residual", <?php echo $riscos_residuais ?>, "#003f5c"],
		
		  
		
		  
		  
		  
		<?php
		  
				
				$selecao=mysqli_query($conexao,"select * from avaliacao_risco_futuro WHERE data BETWEEN '$de' and '$ate'  ");
				$registros=mysqli_fetch_array($selecao);	
		  $riscos_inerentes=mysqli_num_rows($selecao);
					
			?>
        ["Risco Futuro", <?php echo $riscos_inerentes ?>, "#94DAFB"],    
		  
		  
		  
      
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Risco Residual/Risco Inerente(Qtd)",
      
		  chartArea : { left: 0, top:50,  width: '100%' },

        bar: {groupWidth: "95%"},
        legend: { position: "none" },
		titleTextStyle: {
         fontSize: '18',
      },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values2"));
      chart.draw(view, options);
  }
	
	
  </script>






