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
							<a href="dashboard.php"><span class="text-white breadcrumb-item">Dashboard | Comitê</span></a>
						</div>
					</div>
					
					
				</div>
			</div>	
			
		
			<div class="row">
				<div class="col-md-12">
	<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>				
 	<h3 class="mb-4 mt-4 ml-4 mr-4">Comitê <?php echo $registros['nome'] ?> 
		
			<!------Editar Comitê--------->
			<img src="imgs/icone-editar.png" width="30" height="30" alt="" data-toggle="modal" data-target="#ModalEditarComite" class="pointer" onClick="EditarModal(<?php echo $registros['id'] ?>)"  />
					</h3>			
	
		
<div class="row ml-4 mr-4">		
	
	<div class="col-md-4">
		<label>Nome do Comitê</label>
		<input type="text" class="form-control" name="cad-comite" id="cad-comite" value="<?php echo $registros['nome'] ?>" readonly>
	</div>
	
	<div class="col-md-4">
		<label>Descrição/Objetivo</label>
		<input type="text" class="form-control" name="cad-descricao" id="cad-descricao" value="<?php echo $registros['descricao'] ?>" readonly>
	</div>
	
	<div class="col-md-4">
		<label>Data de Criação</label>
		<input type="text" class="form-control" name="cad-descricao" id="cad-descricao" 
			  <?php 
				$data_inicio=$registros['data_criacao'];
				$data2=str_replace('-', '/', $data_inicio);
				
				?> 
			   value="<?php echo $data2 ?>" 
			   
			   
			   
			   readonly>
	</div>
	
	

	
	
	<div class="col-md-12 mt-5">
		 <a class="pointer" data-toggle="modal" data-target="#ModalCadastroParticipante" ><img src="imgs/icone-mais.png" width="25" height="25" alt="" class="pointer" /> Novo Participante</a>	
		<h3 class="mb-4 mt-4">Participantes</h3>
		
		<div id="carregar-tabela-integrantes"></div>
		
	</div>
	
	<div class="col-md-12 mt-5">
		 <a class="pointer" data-toggle="modal" data-target="#ModalCadastroAta" ><img src="imgs/icone-mais.png" width="25" height="25" alt="" class="pointer" /> Nova Ata</a>	
		<h3 class="mb-4 mt-4">Atas </h3>
		
		<div id="carregar-tabela-comites"></div>
		
	</div>
	
	
	<div class="col-md-12 mt-5">
		 <a class="pointer" data-toggle="modal" data-target="#ModalCronograma" ><img src="imgs/icone-mais.png" width="25" height="25" alt="" class="pointer" /> Novo Cronograma</a>	
		<h3 class="mb-4 mt-4">Cronograma</h3>
		
		<div id="carregar-tabela-cronograma"></div>
		
	</div>	
	
	
	
</div>				
					
				</div>
			</div>
		</div>

	</div>
</form>	
	
<!-- Modal -->
<div class="modal fade" id="ModalCadastroAta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nova Ata</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row ml-4 mr-4 mt-4 mb-4">
		  
			<div class="col-md-6 mb-4">
				<label>Nome</label>
				<input type="text" class="form-control" name="cad-nome-ata" id="cad-nome-ata" autocomplete="off" >
			</div>
			
			<div class="col-md-6 mb-4">
				<label>Tipo de Reunião</label>
				<select class="form-control" name="cad-tipo-reuniao" id="cad-tipo-reuniao">
					<option>Ordinária - cronograma anual </option>
					<option>Extraordinária - caracter emergencial</option>
				</select>
				
			</div>
			
			<div class="col-md-4 mb-4">
				<label>Data</label>
				<input type="text" class="form-control datepicker" name="cad-data" id="cad-data" autocomplete="off" >
			</div>
			
			<div class="col-md-4 mb-4">
				<label>Hora Inicio</label>
				<input type="time" class="form-control horario" name="cad-inicio" id="cad-inicio" autocomplete="off">
			</div>
			
			<div class="col-md-4 mb-4">
				<label>Hora Termino</label>
				<input type="time" class="form-control horario" name="cad-termino" id="cad-termino" autocomplete="off">
			</div>
			
			<div class="col-md-12">
				<input type="button" class="btn btn-primary" value="Cadastrar Ata" onClick="CadastrarAta()">
			</div>
		  
		 </div>
		  
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
	
	
	
	
	
	<!-- Modal -->
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
			<input type="hidden" class="form-control" readonly id="esc-area">	
			<input type="text" class="form-control" readonly id="esc-nome-area">
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
	
	
	
	
	<!-- Modal -->
<div class="modal fade" id="ModalCronograma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo Cronograma</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row ml-4 mr-4 mt-4 mb-4">
		  
			<div class="col-md-4 mb-4">
				<label>Tipo Reunião</label>
				<select class="form-control" name="cad-tipo-reuniao-cronograma" id="cad-tipo-reuniao-cronograma">
					<option>Ordinária</option>
					<option>Extraordinária</option>
				</select>
			</div>
			
			<div class="col-md-4 mb-4">
				<label>Data Prevista</label>
				<input type="text" class="form-control datepicker" name="cad-data-prevista" id="cad-data-prevista" autocomplete="off" >
			</div>
						
			
			<div class="col-md-4 mb-4">
				<label>Horário Previsto</label>
				<input type="time" class="form-control horario" name="cad-horario-previsto" id="cad-horario-previsto" autocomplete="off" >
			</div>
			
			<div class="col-md-4 mb-4">
				<label>Realizado em:</label>
				<input type="text" class="form-control datepicker" name="cad-realizado-em" id="cad-realizado-em" autocomplete="off" >
			</div>
			
			<div class="col-md-4 mb-4">
				<label>Horário Realizado</label>
				<input type="time" class="form-control horario" name="cad-horario-realizado" id="cad-horario-realizado" autocomplete="off" >
			</div>
			
			<div class="col-md-4 mb-4">
				<label>Duração</label>
				<input type="time" class="form-control" name="cad-duracao" id="cad-duracao" autocomplete="off" >
			</div>
			
			
			
			<div class="col-md-12">
				<input type="button" class="btn btn-primary" value="Adicionar Cronograma" onClick="CadastrarCronograma()">
			</div>
		  
		 </div>
		  
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
	
	
	
	<!-- Modal Editar Comitê -->
<div class="modal fade" id="ModalEditarComite" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Comitê</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	<div id="carregar-comites-editar"></div>
      
    </div>
  </div>
</div>	
</div>			
	
	
	<!-- Modal Editar Ata -->
<div class="modal fade" id="ModalEditarAta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Ata</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	<div id="carregar-atas-editar"></div>
      
    </div>
  </div>
</div>	
</div>	
	
	
	
		<!-- Modal Editar Ata -->
<div class="modal fade" id="ModalEditarCronogramas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Cronograma</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	<div id="carregar-cronogramas-editar"></div>
      
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
		  
		  
	function TabelaIntegrantes(){
		
		$f("#tabela-integrantes").dataTable({
                "bJQueryUI": true,
                "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
                }
            })      	
		
	}	  
		  
		  
		  
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
	
		
	EditarModal()
	EditarModalAtas()
		
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
		var CodigoArea=retorno
		
		 $y.ajax({
			  type: 'post',
			  data: 'codigo='+CodigoArea,
			  url:'funcoes/exibir-areas-cronogramas-comites2.php',
			  success: function(retorno){
				
		$y('#esc-nome-area').val(retorno)
		  }
		   })  		  
				  
				  
		  }
		   })  
		
	}
		
		
		
		function CadastrarCronograma(){
		
		var tipo = $y('#cad-tipo-reuniao-cronograma option:selected').val()
		var dataprevista = $y('#cad-data-prevista').val()
		var horarioprevisto = $y('#cad-horario-previsto').val()
		var realizadoem = $y('#cad-realizado-em').val()
		var horariorealizado = $y('#cad-horario-realizado').val()
		var duracao = $y('#cad-duracao').val()
		
		
		  $y.ajax({
			  type: 'post',
			  data: 'tipo='+tipo+'&data_prevista='+dataprevista+'&horario_previsto='+horarioprevisto+'&realizado_em='+realizadoem+'&horario_realizado='+horariorealizado+'&duracao='+duracao+'&codigo=<?php echo $codigo ?>' ,
			  url:'funcoes/gravar-cronograma.php',
			  success: function(retorno){
			 
		$y('.close').trigger('click')
		location.reload()			
		  }
		   })  
	}		
		
		
		
	function ExcluiIntegrantes(codigo){
		if (window.confirm("Você deseja excluir o Integrante?")) {
		  $.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/excluir-integrantes-comites.php',
			  success: function(retorno){
				CarregarTabelaComites()
			 CarregarTabelaParticipantes()
				   location.reload() 
		  }
		   })  
		
	}}
		
		
		function ExcluirAtas(codigo){
		if (window.confirm("Você deseja excluir a Ata?")) {
		  $.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/excluir-atas-comites.php',
			  success: function(retorno){
				
				 location.reload() 
			
		  }
		   })  
		
	}	}	
		
		
	function ExcluirCronogramas(codigo){
		if (window.confirm("Você deseja excluir o Cronograma?")) {
		  $.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/excluir-cronogramas-comites.php',
			  success: function(retorno){
				
				CarregarTabelaComites()
			 location.reload() 
		  }
		   })  
		
	}}
		
		
		
	function EditarModal(codigo){
		 
		 $.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'editar-comites.php',
			  success: function(retorno){
		 $('#carregar-comites-editar').html(retorno)		  
			
		  }
		   })  
	}
		
		
		
		function EditarModalAta(codigo){
		 
		 $.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'editar-atas.php',
			  success: function(retorno){
		 $('#carregar-atas-editar').html(retorno)		  
			
		  }
		   })  
	}	
		
		
		function EditarModalCronogramas(codigo){
		 
		 $.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'editar-cronogramas.php',
			  success: function(retorno){
		 $('#carregar-cronogramas-editar').html(retorno)		  
			
		  }
		   })  
	}	
		
	
	function AtualizarComite(codigo){
		var descricao= $('#edit-descricao').val()
		var comite = $('#edit-comite').val()
		var area = $('#edit-area').val()
		var competencia = $('#edit-competencia').val()
		
		 $.ajax({
			  type: 'post',
			  data: 'codigo='+codigo+'&descricao='+descricao+'&comite='+comite,
			  url:'funcoes/atualizar-comites.php',
			  success: function(retorno){
		 $('.close').trigger("click")	
				  location.reload()
			
		  }
		   })  
		
	}	
		
			function AtualizarAta(codigo){
				
		var nome = $('#edit-nome-ata').val()
		var tipo = $('#edit-tipo-reuniao').val()
		var data= $('#edit-data').val()
		var inicio = $('#edit-inicio').val()
		var termino = $('#edit-termino').val()
		
		 $.ajax({
			  type: 'post',
			  data: 'codigo='+codigo+'&nome='+nome+'&tipo='+tipo+'&data='+data+'&inicio='+inicio+'&termino='+termino,
			  url:'funcoes/atualizar-atas.php',
			  success: function(retorno){
		 $('.close').trigger("click")	
				  location.reload()
			
		  }
		   })  
	}	
		
		
		
	function AtualizarCronograma(codigo){
				
		var reuniao = $('#edit-tipo-reuniao-cronograma').val()
		var data_prevista = $('#edit-data-prevista-cronograma').val()
		var horario_previsto = $('#edit-horario-previsto-cronograma').val()
		var data_realizada = $('#edit-realizado-em-cronograma').val()
		var horario_realizado= $('#edit-horario-realizado-cronograma').val()
		var duracao = $('#edit-duracao-cronograma').val()
		
		
		 $.ajax({
			  type: 'post',
			  data: 'codigo='+codigo+'&reuniao='+reuniao+'&data_prevista='+data_prevista+'&horario_previsto='+horario_previsto+'&data_realizada='+data_realizada+'&horario_realizado='+horario_realizado+'&duracao='+duracao,
			  url:'funcoes/atualizar-cronogramas.php',
			  success: function(retorno){
		 $('.close').trigger("click")	
				  location.reload()
			
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