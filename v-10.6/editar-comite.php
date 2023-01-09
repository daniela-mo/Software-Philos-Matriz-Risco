<?php  
$nav_menu_principal='gestaoderisco';
$nav_menu_pagina='monitoramento';
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
	<link rel="stylesheet" type="text/css" href="css/datatable.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
</head>
	
		
	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
<?php
	include('menu.php');
	$codigo=$_REQUEST['cod'];
	mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
	$selecao=mysqli_query($conexao,"select * from comites WHERE id='$codigo'");
	$registros=mysqli_fetch_array($selecao);
?>	
<!-- Navegação !-->	
	

	<input type="hidden" name="codigo-comite" id="codigo-comite" value="<?php echo $codigo ?>">
	<div class="content-wrapper">
		<div class="container-fluid">
		<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<a href="dashboard.php"><span class="text-white breadcrumb-item">Dashboard | Editar Comitê</span></a>
						</div>
					</div>
					
					
				</div>
			</div>	
			
		
			<div class="row">
				<div class="col-md-12">
	<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>				
 	<h3 class="mb-4 mt-4 ml-4 mr-4">Editar Comitê <?php echo $registros['nome'] ?> 
	 </h3>			
	
		
<div class="row ml-4 mr-4">		
	
	<div class="col-md-4">
		<label>Nome do Comitê</label>
		<input type="text" class="form-control" name="cad-comite" id="cad-comite" value="<?php echo $registros['nome'] ?>" >
	</div>
	
	<div class="col-md-4">
		<label>Descrição/Objetivo</label>
		<input type="text" class="form-control" name="cad-descricao" id="cad-descricao" value="<?php echo $registros['descricao'] ?>" >
	</div>
	
	<div class="col-md-4">
		<label>Data de Criação</label>
		<input type="text" class="form-control datepicker" name="cad-descricao" id="cad-descricao" 
			  <?php 
				$data_inicio=$registros['data_criacao'];
				$data2=str_replace('-', '/', $data_inicio);
				
				?> 
			   value="<?php echo $data2 ?>" 
			   autocomplete="off" >
	</div>
	
	<div class="col-md-12 mt-3">
		<input type="submit" class="btn btn-primary" value="Atualizar Comitê">	
	</div>	
	
	
	
	
	<div class="col-md-12 mt-5">
		 <a class="pointer" data-toggle="modal" data-target="#ModalCadastroParticipante" ><img src="imgs/icone-mais.png" width="25" height="25" alt="" class="pointer" /> Novo Participante</a>	
		<h3 class="mb-4 mt-4">Participantes</h3>
		
		<div id="carregar-tabela-integrantes"></div>
		
	</div>
	
	</div>
					
					
	
</div>				
					
				</div>
			</div>
		</div>

	</div>
</form>	
	

<div class="modal fade" id="ModalCadastroParticipante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo Participante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row ml-4 mr-4 mt-4 mb-4">
		  
			<div class="col-md-6 mb-4">
				<label>Nome participante</label>
		<select class="form-control" id="cad-participante" name="cad-participante" onChange="EscolherParticipante()">		
		<option value="0">Escolher</option>	
	<?php
		$selecao_participante=mysqli_query($conexao,"select * from usuarios_empresa");
		while($registros_participantes=mysqli_fetch_array($selecao_participante)){   
	?>
			
		<option value="<?php echo $registros_participantes['id'] ?>"><?php echo $registros_participantes['nome'] ?></option>		
	<?php
		}
	?>	   
	</select>			
			</div>
			
		
			<div class="col-md-6 mb-4">
			<label>Área</label>
			<input type="text" class="form-control" readonly id="esc-area">
			</div>
			
			
			
			
			
			
			
			<div class="col-md-12">
				<input type="button" class="btn btn-primary" value="Adicionar Participante" onClick="CadastrarParticipante()">
			</div>
		  
		 </div>
		  
      </div>
      <div class="modal-footer">
       
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
	
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
	  <script>
	$f=jQuery.noConflict()	 
		  
		 $f(".datepicker").datepicker({
    dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior'
}); 
		  
		  
  $f(function() {
    $f(".datepicker").datepicker();
  } );
  </script>
	  
	<script>
		
	$y=jQuery.noConflict()	
		
	function CarregarTabelaComites(){
		  $y.ajax({
			  type: 'post',
			  data: 'codigo=<?php echo $codigo ?>',
			  url:'funcoes/carregar-tabela-comites.php',
			  success: function(retorno){
				 
		$y("#carregar-tabela-comites").html(retorno)
				
		  }
		   })  
		
	}	
		
		
	$y(document).ready(function() {
		
	CarregarTabelaComites()
	CarregarTabelaParticipantes()
	CarregarTabelaCronogramas()
		CarregarTabelaCronogramas()
} );
		
		
	function CarregarTabelaParticipantes(){
		  $y.ajax({
			  type: 'post',
			  data: 'codigo=<?php echo $codigo ?>',
			  url:'funcoes/carregar-tabela-integrantes.php',
			  success: function(retorno){
				 
		$y("#carregar-tabela-integrantes").html(retorno)
				
		  }
		   })  
		
	}			
   
	
		
	function CadastrarAta(){
		
		var nome = $y('#cad-nome-ata').val()
		var tipo = $y('#cad-tipo-reuniao option:selected').val()
		var data = $y('#cad-data').val()
		var inicio = $y('#cad-inicio').val()
		var termino = $y('#cad-termino').val()
		
		
		  $y.ajax({
			  type: 'post',
			  data: 'codigo=<?php echo $codigo ?>&nome='+nome+'&tipo='+tipo+'&data='+data+'&inicio='+inicio+'&termino='+termino,
			  url:'funcoes/gravar-ata.php',
			  success: function(retorno){
			 
		$y('.close').trigger('click')
		location.reload()			
		  }
		   })  
	}	
	
		
		
		
		
		function CadastrarParticipante(){
		
		var codigo_participante = $y("#cad-participante option:selected").val()
		var Area = $y('#esc-area').val()
				
		  $y.ajax({
			  type: 'post',
			  data: 'codigo=<?php echo $codigo ?>&codigo_usuario='+codigo_participante+'&area='+Area,
			  url:'funcoes/gravar-pa.php',
			  success: function(retorno){
			 
		$y('.close').trigger('click')
		location.reload()			
		  }
		   })  
	}	
		
		
	function CarregarTabelaCronogramas(){
		  $y.ajax({
			  type: 'post',
			  data: 'codigo=<?php echo $codigo ?>',
			  url:'funcoes/carregar-tabela-cronograma.php',
			  success: function(retorno){
				 
		$y("#carregar-tabela-cronograma").html(retorno)
				
		  }
		   })  
		
	}		
		
	
	function EscolherParticipante(){
		
		var Participante = $y("#cad-participante option:selected").val()
		
		
		 $y.ajax({
			  type: 'post',
			  data: 'codigo='+Participante,
			  url:'funcoes/exibir-areas-cronogramas-comites.php',
			  success: function(retorno){
				
		$y("#esc-area").val(retorno)
				
		  }
		   })  
		
	}
		
		
		
		function CadastrarCronograma(){
		
		var tipo = $y('#cad-tipo-reuniao').val()
		var dataprevista = $y('#cad-data-prevista').val()
		var horarioprevisto = $y('#cad-horario-previsto').val()
		var realizadoem = $y('#cad-realizado-em').val()
		var horariorealizado = $y('#cad-horario-realizado').val()
		var duracao = $y('#cad-duracao').val()
		var area = $y('#cad-area').val()
		var competencia = $y('#cad-competencia').val()
		
		
		  $y.ajax({
			  type: 'post',
			  data: 'tipo='+tipo+'&data_prevista='+dataprevista+'&horario_previsto='+horarioprevisto+'&realizado_em='+realizadoem+'&horario_realizado='+horariorealizado+'&duracao='+duracao+'&area='+area+'&competencia='+competencia ,
			  url:'funcoes/gravar-cronograma.php',
			  success: function(retorno){
			 
		$y('.close').trigger('click')
		location.reload()			
		  }
		   })  
	}		
		
		
		
	function ExcluiIntegrantes(codigo){
		
		  $.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/excluir-integrantes-comites.php',
			  success: function(retorno){
				CarregarTabelaComites()
			 CarregarTabelaParticipantes()
		  }
		   })  
		
	}
		
		
		function ExcluirAtas(codigo){
		
		  $.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/excluir-atas-comites.php',
			  success: function(retorno){
				
				 location.reload() 
			
		  }
		   })  
		
	}		
		
		
	function ExcluirCronogramas(codigo){
		
		  $.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/excluir-cronogramas-comites.php',
			  success: function(retorno){
				
				CarregarTabelaComites()
			
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