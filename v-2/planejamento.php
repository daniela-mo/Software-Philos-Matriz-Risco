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
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
</head>
	
	
	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
<?php
	include('menu.php');
	$codigo=$_REQUEST['cod'];
?>	
<!-- Navegação !-->	
	
	
	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Planejamento</span>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 ">
	<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>
				
 	<p class="mb-5"><a href="cadastro-fase.php?cod=<?php echo $codigo ?>" > 
		<img src="imgs/icone-mais.png" width="25" height="25" alt=""/> Nova Fases</a>	
		</p>			
					
 	<h3 class="mb-4 mt-4">Fases do Planejamento</h3>				
				</div>

		
<?php
	$selecao=mysqli_query($conexao,"select * from fases WHERE codigo_planejamento='$codigo'");
	while($registros=mysqli_fetch_array($selecao)){	
	$id=$registros['id'];
		
?>		
<div class="col-md-6 mb-4">		
	<div class="card text-white" >
	  <div class="card-body text-dark">

		   
		   <h5 class="card-title text-dark ">
			   <strong>
				<a href="tarefas-planejamento.php?cod=<?php echo $registros['id'] ?>">  <?php echo $registros['fase'] ?></a>
			   </strong><span class="float-right"><i class="fa fa-trash" style="cursor: pointer" onClick="Excluirtarefa(<?php echo $registros['id'] ?>)"></i></span></h5>
		  
		  <?php echo $registros['descricao'] ?>
				
	   </div>
	</div>				
</div>		
<?php } ?>		
		


<!-- Modal -->
<div class="modal fade" id="GravarTarefa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro de Tarefa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
		  <div class="row">
		  	<div class="col-md-8">
				
				
				<label>Tipo de Tarefa</label>
				<select class="form-control mb-4" name="tipo-tarefa" id="tipo-tarefa" onChange="TipoTarefa()">
					<option value="0">Escolha</option>
					<option value="anexos">Anexos</option>
					<option value="qaa">Questão do QAA</option>
					<option value="texto">Texto</option>
				</select>
				
			  </div>
			  
			<div class="col-md-12" id="resposta-tarefa">
			  
			  </div>  
			  
		  </div>
		  
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>				
					
					
					
					
					
					
				
		  </div>
		</div>

	</div>
	<input type="hidden" id="passa-id">
		   
		   
	<script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin.min.js" type="text/javascript"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	<script src="js/jquery.mask.min.js"></script>
	
<script>
		
		function PassaId(variavel){
			$('#passa-id').val(variavel)
		}
	
	
		function TipoTarefa(){
			
		var variavel = $("#tipo-tarefa :selected").val()	
			
		if(variavel=='texto'){
				
		$('#resposta-tarefa').load('tipos/texto.php')	
		}	
			
			
		if(variavel=='anexos'){
		$('#resposta-tarefa').load('tipos/anexos.php')	
		}
			
			
		if(variavel=='qaa'){
		$('#resposta-tarefa').load('tipos/questao-qaa.php')	
		}	
			
			
		}
	
	
	
		function GravarTexto(){
		
		var titulo = $("#cad-titulo").val()
		var descricao = $("#cad-descricao").val()
		var codigo= $("#passa-id").val()
		
		  $.ajax({
		  type: 'post',
		  data: 'codigo='+codigo+'&titulo='+titulo+'&descricao='+descricao,
		  url:'funcoes/gravar-texto.php',
		  success: function(retorno){
		  $('#resposta-tarefa').html(retorno); 
		  $('.close').trigger('click')
		  location.reload();	  
			  
      }
       })
			
			
		function GravarArquivo(){
			
		  $.ajax({
		  type: 'post',
		  data: 'codigo='+codigo+'&titulo='+titulo+'&descricao='+descricao,
		  url:'funcoes/gravar-upload.php',
		  success: function(retorno){
		  $('#resposta-tarefa').html(retorno); 
		  $('.close').trigger('click')
		  location.reload();	  
      }
       })
		}	
	}
	
	
	function Excluirtarefa(variavel){
		
		  $.ajax({
			  type: 'post',
			  data: 'codigo='+variavel,
			  url:'funcoes/excluir-fase-planejamento.php',
			  success: function(retorno){
			  $('#resposta-campos').html(retorno); 
		  		location.reload();	
		  }
		   })  		
		
	}
	
	
	</script>
<script>
	$(document).ready(function() {
    $('#example').DataTable();
} );
		
		
		
	$("#example").dataTable({
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
		
		
		
	</script>
</body>
</html>