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

 mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');


?>



<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}
</style>



<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart);

chart.colors.list = [
  am4core.color("#41841E"),
  am4core.color("#FF0000"),
  am4core.color("#F2E70A"),
  am4core.color("#E58C2C")
];	
// Add data
chart.data = [

<?php
	
$selecao=mysqli_query($conexao,"select * from identificacao_do_risco WHERE data_id_risco BETWEEN '$de' and '$ate'  group by codigo_area ");
while($registros=mysqli_fetch_array($selecao)){
$area=$registros['codigo_area'];
	
$selecao1=mysqli_query($conexao,"select * from niveis_riscos_identificacao_risco_residual WHERE cod_area='$area' and residual='Aceitável'  ");
$num1=mysqli_num_rows($selecao1);

$selecao11=mysqli_query($conexao,"select * from niveis_riscos_identificacao_risco_inerente WHERE cod_area='$area' and inerente='Aceitável' ");
$num11=mysqli_num_rows($selecao11);
$aceitavel= $num1+$num11;
	
/*---------------------Inaceitável--------------------------*/	
$selecao2=mysqli_query($conexao,"select * from niveis_riscos_identificacao_risco_residual WHERE cod_area='$area' and residual='Inaceitável' ");
$num2=mysqli_num_rows($selecao2);

$selecao22=mysqli_query($conexao,"select * from niveis_riscos_identificacao_risco_inerente WHERE cod_area='$area' and inerente='Inaceitável' ");
$num22=mysqli_num_rows($selecao22);
$inaceitavel= $num2+$num22;
	
	
/*---------------------Significativo--------------------------*/	
$selecao3=mysqli_query($conexao,"select * from niveis_riscos_identificacao_risco_residual WHERE cod_area='$area' and residual='Significativo' ");
$num3=mysqli_num_rows($selecao3);

$selecao33=mysqli_query($conexao,"select * from niveis_riscos_identificacao_risco_inerente WHERE cod_area='$area' and inerente='Significativo' ");
$num33=mysqli_num_rows($selecao33);
$significativo= $num3+$num33;	

/*---------------------Sério------------------------------------*/	
$selecao4=mysqli_query($conexao,"select * from niveis_riscos_identificacao_risco_residual WHERE cod_area='$area' and residual='Sério' ");
$num4=mysqli_num_rows($selecao4);

$selecao44=mysqli_query($conexao,"select * from niveis_riscos_identificacao_risco_inerente WHERE cod_area='$area' and inerente='Sério' ");
$num44=mysqli_num_rows($selecao44);
$serio= $num4+$num44;		
	
?>
	
	{
  "year": "<?php echo $registros['area'];?>",
  "aceitavel": "<?php echo $aceitavel ?>",
  "inaceitavel": "<?php echo $inaceitavel ?>",
  "significativo":"<?php echo $significativo ?>",
  "serio": "<?php echo $serio ?>"
}, 
<?php } ?>			  
		  
			
];

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "year";
categoryAxis.renderer.grid.template.location = 0;


var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.inside = true;
valueAxis.renderer.labels.template.disabled = true;
valueAxis.min = 0;

// Create series
function createSeries(field, name) {
  
  // Set up series
  var series = chart.series.push(new am4charts.ColumnSeries());
  series.name = name;
  series.dataFields.valueY = field;
  series.dataFields.categoryX = "year";
  series.sequencedInterpolation = true;
  
  // Make it stacked
  series.stacked = true;
  
  // Configure columns
  series.columns.template.width = am4core.percent(60);
  series.columns.template.tooltipText = "[bold]{name}[/]\n[font-size:14px]{categoryX}: {valueY}";
  
  // Add label
  var labelBullet = series.bullets.push(new am4charts.LabelBullet());
  labelBullet.label.text = "{valueY}";
  labelBullet.locationY = 0.5;
  labelBullet.label.hideOversized = true;
  
  return series;
}

createSeries("aceitavel", "Aceitável");
createSeries("inaceitavel", "Inaceitável");
createSeries("significativo", "Significativo");
createSeries("serio", "Sério");


// Legend
chart.legend = new am4charts.Legend();

}); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv"></div>	

