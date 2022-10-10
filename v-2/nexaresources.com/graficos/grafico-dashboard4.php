					

<!-- Styles -->

<style>

#chartdiv4 {

  width: 100%;

  height: 300px;

}

</style>



<!-- Resources -->

<script src="js/core.js"></script>

<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>

<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>



<!-- Chart code -->

<script>

am4core.ready(function() {



// Themes begin

am4core.useTheme(am4themes_animated);

// Themes end



var chart = am4core.create("chartdiv4", am4charts.XYChart);

chart.hiddenState.properties.opacity = 0; // this creates initial fade-in



chart.data = [

  {

    country: "Iniciados",

    visits: 6

  },

  {

    country: "N Iniciados",

    visits: 9

  },  

  {

    country: "P Aprovação",

    visits: 3

  },

  {

    country: "Aprovados parc.",

    visits: 12

  },

  {

    country: "Aprovados",

    visits:15

  },

 

  {

    country: "Rejeitados",

    visits: 19

  }

  

];



var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());

categoryAxis.renderer.grid.template.location = 0;

categoryAxis.dataFields.category = "country";

categoryAxis.renderer.minGridDistance = 40;

categoryAxis.fontSize = 11;

categoryAxis.renderer.labels.template.dy = 5;

categoryAxis.renderer.labels.template.rotation = 25;













var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

valueAxis.min = 0;

valueAxis.renderer.minGridDistance = 30;

valueAxis.renderer.baseGrid.disabled = true;





var series = chart.series.push(new am4charts.ColumnSeries());

series.dataFields.categoryX = "country";

series.dataFields.valueY = "visits";

series.columns.template.tooltipText = "{valueY.value}";

series.columns.template.tooltipY = 0;

series.columns.template.strokeOpacity = 0;



// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set

series.columns.template.adapter.add("fill", function(fill, target) {

  return chart.colors.getIndex(target.dataItem.index);

});



}); // end am4core.ready()

</script>



<!-- HTML -->

<div id="chartdiv4"></div>