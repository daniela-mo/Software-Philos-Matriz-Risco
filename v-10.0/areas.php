<?php  
$nav_menu_principal='cadastros';
$nav_menu_pagina='organograma';
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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
	<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="css/jquery.orgchart.css" media="all" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
<style type="text/css">
#orgChart{
    width: auto;
    height: auto;
}
	

#orgChartContainer{
    width: 100%;
    height: auto;
    overflow: auto;
    background: #eeeeee;
}
	
	div.orgChart div.node{
		height: auto;
		padding: 10px;
		width: 150px;
	
	}

    </style>
</head>
	
	
	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
<?php
	include('menu.php');
	
?>	
<!-- Navegação !-->	
	
	
	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Áreas</span>
						</div>
					</div>
					
					
				</div>
			</div>
			
			<div class="row">
				<div class="col-12">
				 <?php
	$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='3' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	
			?>	  				
					
	<a href="cadastro-areas.php"> <img src="imgs/icone-mais.png" width="25" height="25" alt=""/> Adicionar/Editar Áreas</a>		<?php } ?>			
			
 	<h3 class="mb-4 mt-4">Organograma por áreas</h3>			
			
					
	
					
	<div id="orgChartContainer">
   		 <div id="orgChart" ></div>
    </div>
					
		<div data-toggle="modal" data-target="#modalConteudo" id="clicando" ></div>			
					
					
					
				</div>
			</div>
		</div>
		

<!------------------ Pegar ID Organogramas -------------->
<input type="hidden" id="codigo_organograma"  >		
		

<!-- Modal -->
<div class="modal fade" id="modalConteudo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titulo-modal"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="conteudo-modal">
       
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>

	</div>
	
	<!-----data-toggle="modal" data-target="#modalExemplo"---->
	
	
	
	<script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin.min.js" type="text/javascript"></script>
	
	
	
	
	<script>

function Obter(){
		
		var pegarid =$("#codigo_organograma").val()
			
	   	  $.ajax({
		  type: 'post',
		  data: 'codigo='+pegarid,
		  url:'funcoes/modal-organograma.php',
		  success: function(retorno){
		  $('#conteudo-modal').html(retorno);
		  var titulo= $('#titulo-setor').val()
		  $('#titulo-modal').html(titulo) 
		  	  
			  
			  
      }
       })	
	
	
	
	}	
		
		
	
		
		
	function Teste(variavel){
		
		document.getElementById("clicando").click();
		document.getElementById('codigo_organograma').value = variavel;
		
		Obter(variavel)
		

	}	
	</script>
		
	
	<script type="text/javascript" src="js/jquery.orgchart.js"></script>
    <script type="text/javascript">
		
    var testData = [
		
		<?php 
			mysqli_query($conexao,"SET NAMES 'utf8'");
			mysqli_query($conexao,'SET character_set_connection=utf8');
			mysqli_query($conexao,'SET character_set_client=utf8');
			mysqli_query($conexao,'SET character_set_results=utf8');
			$selecao=mysqli_query($conexao,"select * from areas");
			while($registros=mysqli_fetch_array($selecao)){
		?>
		
		{id: <?php echo $registros['id'] ?>, name: '<?php echo $registros['area'] ?>', parent: <?php echo $registros['codigo_area_mae'] ?>  },
		
		<?php } ?>

    ];
		
    $(function(){
        org_chart = $('#orgChart').orgChart({
            data: testData,
            showControls: false,
            allowEdit: false,
            onAddNode: function(node){ 
                log('Created new node on node '+node.data.id);
                org_chart.newNode(node.data.id); 
            },
            onDeleteNode: function(node){
                log('Deleted node '+node.data.id);
                org_chart.deleteNode(node.data.id); 
            },
            onClickNode: function(node){/*Pegar id após clicar*/
				Teste(+node.data.id)
                log('Clicked node '+node.data.id);
				
            }

        });
    });

 
	
		
    </script>
	
		<script>
	
	function AtivarLink(){
		$('#<?php echo $nav_menu_principal ?>').addClass('show')
		$('#menu-<?php echo $nav_menu_pagina ?>').css('font-weight','bold')
	}
	AtivarLink()
</script>	
	
</body>
</html>