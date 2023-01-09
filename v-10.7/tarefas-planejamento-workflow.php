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
	mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
	$selecao_planejamento=mysqli_query($conexao,"select * from tarefas_planejamento_workflow1 WHERE codigo_planejamento='$codigo'");
	$registros_planejamento=mysqli_fetch_array($selecao_planejamento);
	$numero=mysqli_num_rows($selecao_planejamento);
	
	
	$selecao_fase=mysqli_query($conexao,"select * from fases_workflow WHERE id='$codigo'");
	$registros_fase=mysqli_fetch_array($selecao_fase);
	
?>	
<!-- Navegação !-->	
	<input type="hidden" name="codigo" id="codigo" value="<?php echo $codigo ?>">
	
	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Tarefas Planejamento</span>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="row">
				<div class="col-12">
	<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>
 	<a href="cadastro-tarefa-workflow.php?cod=<?php echo $codigo ?>"> <img src="imgs/icone-mais.png" width="25" height="25" alt=""/> Nova Tarefa</a>		
					
	<h3 class="mb-4 mt-4"><?php echo $registros_fase['fase']?></h3>					
	
 	
	
				</div>	

	<div class="col-8">				
	<p><strong>Descrição</strong></p>				
	<p><?php echo $registros_fase['descricao'] ?></p>				
					
	<?php
	if($numero==0){echo "<h4 class='mb-4 mt-4 text-danger'>Sem tarefas cadastradas</h4>";}else{
	?>				
				
				
				
			
				
			<p><strong>Tarefas</strong></p>	
				
			<table class="table table-striped">
			<?php 
		mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
				$selecao=mysqli_query($conexao,"select * from tarefas_planejamento_workflow1  WHERE codigo_planejamento='$codigo' ");
	   			while($registros=mysqli_fetch_array($selecao)){
			?>
				<tr>
					<td><a class="text-dark" href="tarefa.php?cod=<?php echo $registros['id'] ?>" style="cursor: pointer"><input type="checkbox"> <?php echo $registros['tarefa'] ?></a> </td>
					
					
					
				</tr>
				
				<?php } ?>
				
			</table>	
				
				</div>	
				
				
				
				<div class="col-md-4">
				<p><strong>Responsáveis <a onclick="AddResponsavel()" data-toggle="modal" data-target="#ModalAddResponsavel">+</a> </strong></p>	
					
				<table class="table">
					<?php
		$selecao_responsaveis=mysqli_query($conexao,"select * from responsaveis_tarefa_workflow WHERE codigo_tarefa='$codigo'");
		while($registros_responsaveis=mysqli_fetch_array($selecao_responsaveis)){
		$codigo_Responsavel=$registros_responsaveis['codigo_usuario'];			
					
		$selecao2=mysqli_query($conexao,"select * from usuarios_empresa WHERE id='$codigo_Responsavel'");
		$registros2=mysqli_fetch_array($selecao2);	
					?>
					
					<tr>
						<td><a href="usuario.php?cod=<?php echo $registros2['id'] ?>"><?php echo $registros2['nome'] ?></a></td>
						<td><i class="fa fa-trash" style="cursor: pointer" onClick="RemoveResponsavel(<?php echo $registros2['id'] ?>)"></i> </td>
					</tr>	
		<?php } ?>			
					
				</table>	
					
					
				</div>
			
<?php } ?>

<!-- Modal -->
<div class="modal fade" id="ModalAddResponsavel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar de Responsável</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <select class="form-control" name="add-usuario" id='add-usuario'>
		<?php
		  $selecao_usuarios=mysqli_query($conexao,"select * from usuarios_empresa");
		  while($registros_usuarios=mysqli_fetch_array($selecao_usuarios)){
		 ?> 
	
		  <option value="<?php echo $registros_usuarios['id'] ?>"><?php echo $registros_usuarios['nome'] ?></option>
		  
		  
		 <?php } ?> 
		  </select>
		  
		  <input type="button" value="Adicionar Responsável" class="btn btn-primary mt-3" onClick="GravarResponsavel()">
		  
		  
		  
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
	
	
	
			
		function AddResponsavel(){
			
			
		}	
	
	
		function GravarResponsavel(){
			var variavel = $("#add-usuario :selected").val()
			var codigo = $("#codigo").val()
			
		$.ajax({
		  type: 'post',
		  data: 'usuario='+variavel+'&codigo='+codigo,
		  url:'funcoes/gravar-responsavel-fase-workflow.php',
		  success: function(retorno){ 
		   $('.close').trigger('click')
		  location.reload();		  
			
      }
       })
		}
	
	
	function RemoveResponsavel(variavel){
			$.ajax({
		  type: 'post',
		  data: 'codigo='+variavel,
		  url:'funcoes/excluir-responsavel-tarefa-workflow.php',
		  success: function(retorno){
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