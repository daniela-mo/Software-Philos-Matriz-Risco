<style>

#sectorPieBefore {

  width: 100%;

  height: 300px;

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

		  {"sector":"Iniciados",

		   "value":"20",

		   "colour":"#5588BB"},

		  

		  {"sector":"Não iniciados",

		   "value":"36",

		   "colour":"#66BBBB"},

		  

		  {"sector":"Enviados para aprovação",

		   "value":"9",

		   "colour":"#AA6644"},

		  

		  {"sector":"Aprovados parcialmente",

		   "value":"6",

		   "colour":"#99BB55"},

		  

		  {"sector":"Aprovados",

		   "value":"5",

		   "colour":"#444466"},

	

	 {"sector":"Rejeitados",

		   "value":"5",

		   "colour":"#BB5555"},

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

series.columns.template.tooltipText = "[bold]{name}[/]\n[font-size:14px]{sector}: [bold]{value[/] ({value}M)";





  



 



</script>



























