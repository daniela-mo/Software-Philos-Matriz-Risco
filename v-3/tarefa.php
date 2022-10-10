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
?>	
<!-- Navegação !-->	
	<input type="hidden" name="codigo" id="codigo" value="<?php echo $codigo ?>">
	
	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Tarefa</span>
						</div>
					</div>
					
					
				</div>
			</div>
<?php
			mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
	$selecao=mysqli_query($conexao,"select * from tarefas_planejamento WHERE id='$codigo'");
	$registros=mysqli_fetch_array($selecao)	?>			
			
			<div class="row">
				<div class="col-md-8">
	
	<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>
				
					
					
 	<input type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal1" value="Adicionar campos de formulários">	
					
 	<h3 class="mb-4 mt-4">Tarefa <?php echo $registros['tarefa'] ?> </h3>
					
		<p><?php echo $registros['descricao'] ?></p>
					
		
			
				
	<div class="row">	
			<?php
		mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
		$selecao_campos=mysqli_query($conexao,"select * from campos_tarefas WHERE codigo_tarefa='$codigo'");
		while($registros_campos=mysqli_fetch_array($selecao_campos)){ 
		$tipo=$registros_campos['tipo'];
		$tamanho=$registros_campos['tamanho'];	
		?>
					
				
		<?php if($tipo=='texto'){  ?>			
			<div class="col-md-<?php echo $registros_campos['tamanho'] ?> mt-2 mb-3">	
				<label><?php echo $registros_campos['label'] ?> <a onClick="ExcluirCampo(<?php echo $registros_campos['id'] ?>)"><i class="fa fa-trash" style="cursor: pointer"></i></a></label>
				<input type="text" class="form-control">	
			</div>		
		<?php } ?>	
		
			<?php if($tipo=='area-texto'){  ?>			
			<div class="col-md-<?php echo $registros_campos['tamanho'] ?> mt-2 mb-3">	
				<label><?php echo $registros_campos['label'] ?> <a onClick="ExcluirCampo(<?php echo $registros_campos['id'] ?>)"><i class="fa fa-trash" style="cursor: pointer"></i></a></label>
				<textarea class="form-control" rows="5"></textarea>
			</div>		
		<?php } ?>	
		
		
		<?php if($tipo=='data'){  ?>			
			<div class="col-md-<?php echo $registros_campos['tamanho'] ?> mt-2 mb-3">	
				<label><?php echo $registros_campos['label'] ?> <a onClick="ExcluirCampo(<?php echo $registros_campos['id'] ?>)"><i class="fa fa-trash" style="cursor: pointer"></i></a></label>
				<input type="text" class="form-control datepicker" >
			</div>		
		<?php } ?>	
		
		
		
		
					
		<?php } ?>			
			</div>		
				</div>
				
				
<div class="col-md-4 mt-4">
				<p><strong>Responsáveis <a onclick="AddResponsavel()" data-toggle="modal" data-target="#ModalAddResponsavel">+</a></strong></p>	
					
								<table class="table">
					<?php
		$selecao_responsaveis=mysqli_query($conexao,"select * from responsaveis_tarefa_implementacao WHERE codigo_tarefa='$codigo'");
		while($registros_responsaveis=mysqli_fetch_array($selecao_responsaveis)){
		$codigo_Responsavel=$registros_responsaveis['codigo_usuario'];			
					
		$selecao2=mysqli_query($conexao,"select * from usuarios_empresa WHERE id='$codigo_Responsavel'");
		$registros2=mysqli_fetch_array($selecao2);	
					?>
					
					<tr>
						<td><a href="usuario.php?cod=<?php echo $registros2['id'] ?>"><?php echo $registros2['nome'] ?></a></td>
					</tr>	
		<?php } ?>			
					
				</table>	
					
					
				</div>		
			

		

		
	
<div class="col-md-8">
	
	
</div>
				
	
		
		
		
		
					
					
					
					
					
					
					
					
				
			</div>
		</div>

	</div>
	
	
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
	
	
	<!-- Modal -->
<div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar novo campo de formulário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
		  <div class="row"> 
			  <div class="col-md-12">
			  	<p><em>Os campos de formulário devem somar o tamanho de 12 para cada linha, quando esse número for superior os próximos campos irão para outra linha.</em></p>
			  </div>
			  
		  	<div class="col-md-6 mb-3">
				 <label>Nome do campo</label>
				<input type="text" name="cad-nome-campo" id="cad-nome-campo" class="form-control">
				
			  </div>
			  
			  
			  
			  <div class="col-md-6 mb-3">
				 <label>Tipo de Campo</label>
				<select class="form-control" id="cad-tipo-campo" name="cad-tipo-campo" >
					<option value="texto">Texto simples</option>
					<option value="area-texto">Área de Texto</option>
					<option value="data">Data</option>
				</select>
				
			  </div>
			  
			  
			  <div class="col-md-4 mb-3">
				 <label>Tamanho</label>
				<select class="form-control" id="cad-tamanho-campo" name="cad-tamanho-campo" >
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
				</select>
				
			  </div>
		  </div>
		 
		  
		<div id="resposta-campos">
		   </div>  
		  
		  
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-primary" onClick="AdicionarCampo()">Adicionar Campo</button>
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
		function GravarResponsavel(){
			var variavel = $f("#add-usuario :selected").val()
			var codigo = $f("#codigo").val()
			
		$f.ajax({
		  type: 'post',
		  data: 'usuario='+variavel+'&codigo='+codigo,
		  url:'funcoes/gravar-responsavel-tarefa.php',
		  success: function(retorno){ 
		   $f('.close').trigger('click')
		  location.reload();		  
			
      }
       })
		}
		  
		 $g=jQuery.noConflict() 
		  
		 	function AdicionarCampo(){
		
		var tipo = $g('#cad-tipo-campo option:selected').val()
		var tamanho = $g('#cad-tamanho-campo option:selected').val()
		var codigo = $g('#codigo').val()
		var label = $g('#cad-nome-campo').val()
		
	
		
	  $g.ajax({
			  type: 'post',
			  data: 'tipo='+tipo+'&tamanho='+tamanho+'&codigo='+codigo+'&label='+label,
			  url:'funcoes/cadastro-campo.php',
			  success: function(retorno){ 
			  $g('#resposta-campos').html(retorno); 
				 $g('.close').trigger('click')
		  location.reload();	
		  }
		   })  	
		
		
	} 
		  
		  
	function ExcluirCampo(variavel){
		
		  $g.ajax({
			  type: 'post',
			  data: 'codigo='+variavel,
			  url:'funcoes/excluir-campo.php',
			  success: function(retorno){
			  $g('#resposta-campos').html(retorno); 
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