<?php  
$nav_menu_principal='gestaoderisco';
$nav_menu_pagina='contextos';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit=no">
	<title>Dashboard M2V</title>
	<link rel="stylesheet" type="text/css" href="bibliotecas/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/sb-admin.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/datatable.css">
	<link rel="shortcut icon" href="imgs/favicon.fw.png" />
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
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Contextos</span>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="row mb-5 ml-5 mr-5">
				<div class="col-md-12 mb-4">
	<a href="novo-contexto.php"> <img src="imgs/icone-mais.png" width="25" height="25" alt=""/> Nova Análise</a>				
 	<h3 class="mb-4 mt-4">SWOT</h3>			
	<h5 style="margin-top: -15px" class="mb-0">Análise SWOT para levantamento de fatores de riscos a partir da análise de contexto interno e externo</h5>				
				</div>
			</div>
			
		<div class="row ml-5 mr-5 ">
			
			<div class="col-md-2"></div>
			
			<div class="col-md-5">
				<h5>Positivos(Ajuda)</h5>
			</div>
			
			<div class="col-md-5">
				<h5>Negativos(Atrapalha)</h5>
			</div>
			
			
			<div class="col-md-2 justify-content-center align-self-center">
				<h5>Interno</h5>
			</div>
			
			<?php
			mysqli_query($conexao,"SET NAMES 'utf8'");
			mysqli_query($conexao,'SET character_set_connection=utf8');
			mysqli_query($conexao,'SET character_set_client=utf8');
			mysqli_query($conexao,'SET character_set_results=utf8');	
				$selecao1=mysqli_query($conexao,"select * from tabela_fatores_internos WHERE analise='Força'");
				$numeros1=mysqli_num_rows($selecao1);
			?>
			<div class="col-md-5 p-4 d-flex align-items-center justify-content-center h-100 pointer " style="background-color: cornflowerblue; min-height: 150px" onClick="Filtrar('Forças')">
				<h4>Forças(<?php echo $numeros1 ?>)</h4>
			</div>
			
			
			<?php
				$selecao2=mysqli_query($conexao,"select * from tabela_fatores_internos WHERE analise='Fraqueza'");
				$numeros2=mysqli_num_rows($selecao2);
			?>
			<div class="col-md-5 p-4 d-flex align-items-center justify-content-center h-100 pointer" style="background-color:yellow; min-height: 150px" onClick="Filtrar('Fraquezas')">
				<h4>Fraquezas(<?php echo $numeros2 ?>)</h4>
			</div>
			
			<div class="col-md-2 justify-content-center align-self-center">
				<h5>Externo</h5>
			</div>
			
			<?php
				$selecao3=mysqli_query($conexao,"select * from tabela_fatores_externos WHERE analise='Oportunidade'");
				$numeros3=mysqli_num_rows($selecao3);
			?>
			<div class="col-md-5 p-4 d-flex align-items-center justify-content-center h-100 pointer" style="background-color:green; min-height: 150px" onClick="Filtrar('Oportunidades')">
				<h4>Oportunidades(<?php echo $numeros3 ?>)</h4>
			</div>
			
			
			<?php
				$selecao4=mysqli_query($conexao,"select * from tabela_fatores_externos WHERE analise='Ameaça'");
				$numeros4=mysqli_num_rows($selecao4);
			?>
			<div class="col-md-5 p-4 d-flex align-items-center justify-content-center h-100 pointer" style="background-color:red; min-height: 150px" onClick="Filtrar('Ameaças')">
				<h4>Ameaças(<?php echo $numeros4 ?>)</h4>
			</div>
			
			
		</div>
			
	
			
			
		<div class="row ml-5 mr-5 mt-5 mb-5 ">
			<div class="col-md-12 mt-5 mb-2">
				<div id="carregar-fatores-de-riscos"></div>	
				
			</div>
		</div>	
			

			
			
		
			
	</div>
		
	<input type="hidden" name="codigo-cad-fator-risco" id="codigo-cad-fator-risco" >	
		
		
	<!-- Modal -->
<div class="modal fade" id="ModalNovoRisco" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999999999999">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Risco</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="row ml-4 mr-4 mb-4">
		  
			
			<div class="col-md-4 mb-3">
				<label>Evento de Risco</label>
				<input type="text" class="form-control" name="cad-evento-risco" id="cad-evento-risco">
			</div>
			
				<div class="col-md-4 mb-3">
				<label>Fator de Risco</label>
			<input type="text" class="form-control" readonly id="cad-fator-risco" name="cad-fator-risco" id="cad-fator-risco" >
				
				
			</div>
			
			<div class="col-md-4 mb-3">
				<label>Área</label>
						
				<select class="form-control" name="cad-area" id="cad-area">	
	<?php
	$selecao_areas=mysqli_query($conexao,"select * from areas");
	while($registros_areas=mysqli_fetch_array($selecao_areas)){				
	?>		
	
	<option value="<?php echo $registros_areas['id'] ?>"><?php echo $registros_areas['area'] ?></option>				
					
	<?php } ?>			
	</select>	
			</div>
			
			<div class="col-md-4 mb-3">
				<label>Processo</label>
						
				<select class="form-control" name="cad-processo" id="cad-processo">	
	<?php
	$selecao_processos=mysqli_query($conexao,"select * from processos");
	while($registros=mysqli_fetch_array($selecao_processos)){				
	?>		
	
	<option value="<?php echo $registros['id'] ?>"><?php echo $registros['processo'] ?></option>				
					
	<?php } ?>			
	</select>	
			</div>
			
				<div class="col-md-4 mb-3">
				<label>Status</label>
			<select class="form-control" name="cad-status" id="cad-status">
				<option>Em Elaboração</option>	
				<option>Documento Oficial</option>
			</select>			
					
			</div>
			
			<div class="col-md-12">
				<input type="button" class="btn btn-primary" value="Inserir Risco" onClick="GravarAssociacao()">
			</div>
			
			
			<div class="col-md-12 mt-5">
			 	<div id="carregar-tabela-fatores-riscos"></div>
			</div>
			
			
		  
		  </div>
		  
		  
		  
		  
		  
      </div>
      
    </div>
  </div>
</div>	
		
	
	<script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin.min.js" type="text/javascript"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	<script src="js/jquery.mask.min.js"></script>
	
	<script>
		
		
	
		
		
		
		
		
		
function Filtrar(fator){
				
		$.ajax({
		  type: 'post',
		  data: 'fator='+fator,
		  url:'funcoes/carregar-fatores-de-riscos.php',
		  success: function(retorno){
			
		$("#carregar-fatores-de-riscos").html(retorno)
      }
       })	
		}	
		
		
function LevarFator(fator,codigo_fator){
	
		$('#cad-fator-risco').val(fator)
		$('#codigo-cad-fator-risco').val(codigo_fator)	
	CarregarTabelaFatoresRiscos()
		}
		



		
		
		
function CarregarTabelaFatoresRiscos(){

	var CodigoFator= $('#codigo-cad-fator-risco').val()

	
		$.ajax({
		  type: 'post',
		  data: 'codigo_fator='+CodigoFator,
		  url:'funcoes/carregar-tabela-fatores-de-riscos.php',
		  success: function(retorno){
			
		$("#carregar-tabela-fatores-riscos").html(retorno)
      }
       })
	
	
}	
		
		
	/*'fator='+Fator+'&evento='+Evento+'&area='+Area+'&processo='+Processo+'&status='+Status+'&codigo_fator='+CodigoFator,*/	
		
function GravarAssociacao(){
	
	var Fator= $("#cad-fator-risco").val()
	var CodigoFator= $('#codigo-cad-fator-risco').val()
	var Evento =$("#cad-evento-risco").val()
	var Area =$("#cad-area option:selected").val()
	var Processo =$("#cad-processo option:selected").val()
	var Status =$("#cad-status option:selected").val()	
	
			
		  $.ajax({
		  type: 'post',
		  data: 'fator='+Fator+'&evento='+Evento+'&area='+Area+'&processo='+Processo+'&status='+Status+'&codigo_fator='+CodigoFator,
		  url:'funcoes/gravar-tabela-fatores-de-riscos.php',
		  success: function(retorno){
		 
		  alert("Gravação realizada com sucesso!")
		   
      }
       })
	
	
}				
		
		
		
		
	</script>
	
		<script>
	$rodape=jQuery.noConflict()
	function AtivarLink(){
		$rodape('#<?php echo $nav_menu_principal ?>').addClass('show')
		$rodape('#menu-<?php echo $nav_menu_pagina ?>').css('font-weight','bold')
		
	}
	AtivarLink()
</script> 
	
</body>
</html>