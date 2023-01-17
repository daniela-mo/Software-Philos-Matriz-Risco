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
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Planejamentos</span>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="row">
				<div class="col-12">
	<div id="resposta-tabela"></div>
			
 	<a href="cadastro-planejamento.php"> <img src="imgs/icone-mais.png" width="25" height="25" alt=""/> Novo Planejamento</a>				
 	<h3 class="mb-4 mt-4">Planejamento Inicial</h3>				
				
	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Planejamento</th>
                <th>Prioridade</th>
                <th>Inicio</th>
				<th>Término</th>
                <?php if($tipo=='admin'){ ?> <th>Ação</th> <?php } ?>
                
            </tr>
        </thead>
        <tbody>
			<?php
			
			if($tipo=='admin'){
			$selecao=mysqli_query($conexao,"select * from planejamentos");
			}
			
			if($tipo=='usuario'){
			$selecao2=mysqli_query($conexao,"select * from responsaveis_implementacao WHERE codigo_usuario='$codigo_usuario'");
			$registros2=mysqli_fetch_array($selecao2);
			$codigo_implementacao=$registros2['codigo_implementacao'];	
				
			$selecao=mysqli_query($conexao,"select * from planejamentos WHERE id='$codigo_implementacao'");	
				
			}
			
				while($registros=mysqli_fetch_array($selecao)){
			?>
            <tr>
                <td><a class="text-dark" href="implementacao.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['planejamento'] ?></a></td>
				
                <td><a class="text-dark" href="implementacao.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['prioridade'] ?></a></td>
				
                <td><a class="text-dark" href="implementacao.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['data_inicio'] ?> </a></td>
				
				<td><a class="text-dark" href="implementacao.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['data_vencimento'] ?></a></td>
              <?php if($tipo=='admin'){ ?>  <td>
					
					<a class="text-dark" href="" onClick="Duplicar(<?php echo $registros['id']; ?>)">
					<i class="fa fa-folder " style="cursor: pointer"></i></a>
					
					<a class="text-dark" href="" onClick="Excluir(<?php echo $registros['id']; ?>)">
					<i class="fa fa-trash" style="cursor: pointer"></i></a>
				
				
				</td><?php } ?>
               
            </tr>
			
			<?php } ?>

        </tbody>
       
    </table>				
					
				</div>
			</div>
		</div>

	</div>
	<div id="resposta-duplicar"></div>
	<script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin.min.js" type="text/javascript"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	<script src="js/jquery.mask.min.js"></script>
	
	
	
	
	<script>
		
				function Excluir(variavel){
	  if (window.confirm("Tem certeza que deseja excluir essa área?")) {
      
			  $.ajax({
			  type: 'post',
			  data: 'codigo='+variavel,
			  url:'funcoes/excluir-planejamento.php',
			  success: function(retorno){
			  $('#resposta-duplicar').html(retorno); 
				Location.reload()  
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
			  url:'funcoes/duplicar.php',
			  success: function(retorno){
				 
			  $('#resposta-duplicar').html(retorno); 
				Location.reload()  
		  }
		   })  
		  
		  
		  
   }else{
	   
   }	
			
		}
		
		
		
		
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