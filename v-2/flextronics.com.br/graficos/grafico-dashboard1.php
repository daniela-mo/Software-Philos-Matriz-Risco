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
    labels: ["Bloco 1 - Informações", "Bloco 2 - Elegibilidade", "Bloco 3 - Segurança", "Bloco 4 - Conformidade"],
    datasets: [{
      label: 'Iniciados',
      data: [2,4,6,8  ],
      backgroundColor: "#5588BB"
    }, {
		
      label: 'Não iniciados',
      data: [8,6,2,4],
      backgroundColor: "#66BBBB"
    },
		{	  
	   label: 'Enviados p/aprovação',
      data: [2,6,8,10],
      backgroundColor: "#AA6644"
    },		  
		{	  
	   label: 'Aprovados parc.',
      data: [1,5,8,2],
      backgroundColor: "#99BB55"
    },	
		{				 
	   label: 'Aprovados',
      data: [11,9,5,4],
      backgroundColor: "#444466"
    },	
		{				 
	   label: 'Rejeitados',
      data: [1,2,6,4],
      backgroundColor: "#BB5555"
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
