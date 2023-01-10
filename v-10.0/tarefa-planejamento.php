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
				<div class="col-12 mb-5">
					<?php
			$selecao=mysqli_query($conexao,"select * from tarefas_planejamento WHERE id='$codigo' ");
			$registros=mysqli_fetch_array($selecao)		
		?>	
 				
 	<h3 class="mb-4 mt-4"><?php echo $registros['titulo'] ?></h3>
					
	
					
			<p><?php echo $registros['descricao'] ?>	</p>	
					
				</div>
				
				



       
      </div>
			
			
			
	<div class="row">
	<div class="col-md-6">
	<h3>Responsáveis por essa tarefa <img src="imgs/icone-mais.png" width="30" alt="" style="margin-top:-5px; cursor: pointer"  /></h3>	
	
	<table class="table table-striped">
	<tr>
		<th>Usuário</th>
		<th>Cargo</th>
		<th>Setor</th>
	</tr>
		
	<?php
		mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');		
		$selecao=mysqli_query($conexao,"select * from usuarios_tarefas WHERE codigo_tarefa='$codigo' ");
		while($registros=mysqli_fetch_array($selecao)){
		$id_usuario=$registros['codigo_usuario'];	
			
		$selecao_usuarios=mysqli_query($conexao,"select * from usuarios_empresa WHERE id='$id_usuario'");
		$registros_usuarios=mysqli_fetch_array($selecao_usuarios);	
			
	?>
		
	<tr>
		<td><?php echo $registros_usuarios['nome'] ?></td>
		<td><?php echo $registros_usuarios['cargo'] ?></td>
		<td><?php echo $registros_usuarios['setor'] ?></td>
	</tr>	
		
	<?php } ?>	
				
	</table>
		
		
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
		
		function PassaId(variavel){
			$('#passa-id').val(variavel)
		}
	
	
		function TipoTarefa(){
			
		var variavel = $("#tipo-tarefa :selected").val()	
			
		if(variavel=='texto'){
				
		$('#resposta-tarefa').load('tipos/texto.php')	
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