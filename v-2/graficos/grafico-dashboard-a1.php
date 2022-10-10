<?php



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

<script src="../js/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
<script src="https://www.amcharts.com/lib/4/lang/pt_BR.js"></script>

<script src="https://www.amcharts.com/lib/4/themes/dataviz.js"></script>

<div id="chartdiv"></div>
<!-- Chart code -->
<!-- Chart code -->
<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv", am4charts.XYChart);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart.paddingRight = 30;
chart.dateFormatter.inputDateFormat = "yyyy-MM-dd";

var colorSet = new am4core.ColorSet();
colorSet.saturation = 0.4;

chart.data = [
  {
    name: "Financeiro",
    fromDate: "2018-02-01",
    toDate: "2018-02-31",
	valor: 20,  
    color: colorSet.getIndex(0).brighten(0)
  },
  
  {
    name: "RH",
    fromDate: "2018-04-01",
    toDate: "2018-04-31",
	  valor: 20, 
    color: colorSet.getIndex(0).brighten(0.8)
  },
 {
    name: "Presidência",
    fromDate: "2018-02-01",
    toDate: "2018-02-31",
	 valor: 20, 
    color: colorSet.getIndex(0).brighten(0)
  },
 
{
    name: "TI",
    fromDate: "2018-02-01",
    toDate: "2018-02-31",
    color: colorSet.getIndex(0).brighten(0)
  },	
	
	{
    name: "Almoxarifado",
    fromDate: "2018-02-01",
    toDate: "2018-02-31",
		valor: 20, 
    color: colorSet.getIndex(0).brighten(0)
  },
	
	{
    name: "Planejamento",
    fromDate: "2018-02-01",
    toDate: "2018-02-31",
		valor: 20, 
    color: colorSet.getIndex(0).brighten(0)
  },
	
	
	
];

var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "name";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.inversed = true;

var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
dateAxis.dateFormatter.dateFormat = "yyyy-MM-dd";
dateAxis.renderer.minGridDistance = 70;

dateAxis.strictMinMax = true;
dateAxis.renderer.tooltipLocation = 0;

var series1 = chart.series.push(new am4charts.ColumnSeries());
series1.columns.template.width = am4core.percent(80);
series1.columns.template.tooltipText = "{name}: {valor}";

series1.dataFields.openDateX = "fromDate";
series1.dataFields.dateX = "toDate";
series1.dataFields.categoryY = "name";
series1.columns.template.propertyFields.fill = "color"; // get color from data
series1.columns.template.propertyFields.stroke = "color";
series1.columns.template.strokeOpacity = 1;

chart.scrollbarX = new am4core.Scrollbar();
chart.scrollbarY = new am4core.Scrollbar();	
	
chart.language.locale = am4lang_pt_BR;
chart.dateFormatter.language = new am4core.Language();
chart.dateFormatter.language.locale = am4lang_pt_BR;	
	
	
	
	
	

}); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv"></div>
