<html>
  <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
  </head>


  <div>
    <canvas id="barChart" height="80" style="width:100%"></canvas>
  </div>

</html>
<script>
	
	var ctx = document.getElementById("barChart").getContext('2d');

var barChart = new Chart(ctx, {
	

  type: 'bar',
  data: {
    labels: ["Avaliação de Risco"],
    
    datasets: [{
      label: 'Iniciados',
      data: [2],
      backgroundColor: "#5588BB"
    }, 
		 
						 
						 
			  ]
  },
	
	
	options: {
		responsive: true,
        legend: {
            display: true,
            position: 'bottom',
			
        },
		
	scales: {
        yAxes: [{ticks: {fontSize: 16, fontFamily: "'Roboto', sans-serif", fontColor: '#000', fontStyle: '600'}}],
        xAxes: [{ticks: {fontSize: 16, fontFamily: "'Roboto', sans-serif", fontColor: '#000', fontStyle: '600'}}]
        }

	
		
    }
});
</script>
