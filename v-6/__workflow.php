<?php  
$nav_menu_principal='workflow';
$nav_menu_pagina='workflow';
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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
</head>
	
	
	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
<?php
	include('menu.php');
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');	
$selecao_usuario=mysqli_query($conexao,"select * from usuarios_empresa WHERE email='$usuario' ");
$registros_usuario=mysqli_fetch_array($selecao_usuario);
$codigo_usuario=$registros_usuario['id'];	
?>	
<!-- Navegação !-->	
	
	
	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Workflow de Atividades</span>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="row">
				<div class="col-12">
	<div id="resposta-tabela"></div>
					
	<?php
	$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='24' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	
			?>			
 	<a href="cadastro-planejamento-workflow.php"> <img src="imgs/icone-mais.png" width="25" height="25" alt=""/> Novo Planejamento</a>
	<?php } ?>				
					
 	<h3 class="mb-4 mt-4">Workflow de Atividades</h3>	

		<!---<input type="button" value="Relatório Completo" class="btn btn-secondary mb-3" onClick="RelatorioFull()">
		--->		
				
	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Planejamento</th>
                <th>Prioridade</th>
                <th>Inicio</th>
				<th>Término</th>
				<th>Status</th>
				<th>Periodicidade</th>
				<th>Responsável</th>
                <th>Ação</th>
                
            </tr>
        </thead>
        <tbody>
			<?php
			
			
			
			
			$selecao2=mysqli_query($conexao,"select * from responsaveis_workflow WHERE codigo_usuario='$codigo_usuario'");
			$registros2=mysqli_fetch_array($selecao2);
			$codigo_workflow=$registros2['codigo_workflow'];	
				
			$selecao=mysqli_query($conexao,"select * from workflow ");	
				
		
			
				while($registros=mysqli_fetch_array($selecao)){
					$id=$registros['id'];
			?>
            <tr>
                <td><a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['planejamento'] ?></a></td>
				
                <td><a class="text-dark" ><?php echo $registros['prioridade'] ?></a></td>
				
                <td><a class="text-dark" >
					
					<?php 
				$data_inicio=$registros['data_inicio'];
				$data2=str_replace('-', '/', $data_inicio);
				
				echo $data2 ?> </a></td>
				
				<td><a class="text-dark" ><?php echo $registros['data_vencimento'] ?></a></td>
				
				<td><a class="text-dark" ><?php echo $registros['status'] ?></a></td>
				
				<td><a class="text-dark" ><?php echo $registros['periodicidade'] ?></a></td>
				
				
				
				
				<td><a class="text-dark" ><?php 
					
					
					$selecao_responsavel=mysqli_query($conexao,"select * from responsaveis_workflow WHERE codigo_workflow ='$id'");
					$registros_responsavel=mysqli_fetch_array($selecao_responsavel);
					
					echo $registros_responsavel['usuario'] ?></a></td>
				
				
				
				
				
                <td>
						<?php
	$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='24' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	

			?>	
					<!--<a class="text-dark" href="" onClick="Duplicar(<?php // echo $registros['id']; ?>)">
					<i class="fa fa-folder " style="cursor: pointer"></i></a>
					--->
			<?php } ?>	
					
					
				<?php
	$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='24' and codigo_grupo='$cod_grupo' and editar='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	

			?>	
					<a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>" ><i class="fa fa-edit " style="cursor: pointer"></i></a>
					
			<?php } ?>			
					
					
					
						<?php
	$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='24' and codigo_grupo='$cod_grupo' and excluir='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	
			?>	
					<a class="text-dark" href="" onClick="Excluir(<?php echo $registros['id']; ?>)">
					<i class="fa fa-trash" style="cursor: pointer"></i></a>
				<?php } ?>
				
				</td>
               
            </tr>
			
			<?php } ?>

        </tbody>
       
    </table>				
					
				</div>
			</div>
		</div>

	</div>
	<div id="resposta-duplicar"></div>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>	
<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>+
<script src="js/sb-admin.min.js" type="text/javascript"></script>
	
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>
<script src="https://cdn.datatables.net/colreorder/1.5.4/js/dataTables.colReorder.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.colVis.min.js"></script>

<script>
	
	
	
	
	
	
	
	
	
	
	
$(document).ready(function() {
    $('#example').DataTable( {
        "dom": '<"top"i>rt<"bottom"flp><"clear">',
		"iDisplayLength": 1000,
		 stateSave: true,
		
		
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
                        "sLast":     "Último",
						"pageLength": "1"
                    }
                },
		 dom: 'Bfrtip',
        buttons: [
       {
           extend: 'pdf',
		   orientation: 'landscape',
           footer: true,
            exportOptions: {
                columns: [0,1,3,4,5]
            }
           
          
       },
       {
           extend: 'csv',
           footer: false
          
       },
       {
           extend: 'excelHtml5',
           footer: false,
           exportOptions: {
                columns: [0,1,3,4,5]
            }
       } ,
			
		 {
         text: 'Excel Detalhado',
          action: function ( e, dt, node, config ) {
                    RelatorioExcell()
                }
          
           
          
       }		
			
    ],
		 
    } );
} );
	</script>
	
	
	<script>
		
				function Excluir(variavel){
	  if (window.confirm("Tem certeza que deseja excluir essa área?")) {
      
			  $.ajax({
			  type: 'post',
			  data: 'codigo='+variavel,
			  url:'funcoes/excluir-workflow.php',
			  success: function(retorno){
			  $('#resposta-duplicar').html(retorno); 
				location.href='workflow.php'  
		  }
		   })  
		  
		  
		  
   }else{
	   
   }
				
			}
		
		
		function Duplicar(variavel){
			
			  if (window.confirm("Tem certeza que deseja duplicar essa implementação?")) {
      
			  $.ajax({
			  type: 'post',
			  data: 'codigo='+variavel,
			  url:'funcoes/duplicar-workflow1.php',
			  success: function(retorno){
				 
			  $('#resposta-duplicar').html(retorno); 
				location.href='workflow.php'  
		  }
		   })  
		  
		  
		  
   }else{
	   
   }	
			
		}
		
		
		
	          	
		
	function RelatorioExcell(){
		location.href="relatorio-workflow2.php"
	}
		
	</script>
</body>
</html>