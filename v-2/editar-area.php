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
	<link rel="stylesheet" type="text/css" href="css/datatable.css">
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
<link rel="shortcut icon" href="imgs/favicon.fw.png" />
</head>
	
		
	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
<?php
	include('menu.php');
	$codigo=$_REQUEST['codigo'];
?>	
<!-- Navegação !-->	
	
<form action="processa-cadastro-area.php" method="post">	
	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Cadastro Áreas </span>
						</div>
					</div>
					
					
				</div>
			</div>
			
			
			
			<div class="row">
				<div class="col-12">
	<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>				
 	<h3 class="mb-4 mt-4 ml-4 mr-4">Cadastro Áreas da empresa</h3>			
				<div id="resposta-tabela"></div>
	
		<?php
			mysqli_query($conexao,"SET NAMES 'utf8'");
			mysqli_query($conexao,'SET character_set_connection=utf8');
			mysqli_query($conexao,'SET character_set_client=utf8');
			mysqli_query($conexao,'SET character_set_results=utf8');		
			$selecao1=mysqli_query($conexao,"select * from areas WHERE id='$codigo'");
			$registros1=mysqli_fetch_array($selecao1);			
				
		?>			
					
				
					
		<div class="row ml-4 mr-4">
				
		
		<div class="col-md-4">
			<label>Nome da Área</label>
			<input type="text" class="form-control" name="cad-area" id="cad-area" value="<?php echo $registros1['area'] ?>">
		</div>
		
		<div class="col-md-4">
			<label>Área Mãe</label>
			<select class="form-control" name="cad-codigo-area-mae" id="cad-codigo-area-mae">
				<?php 
	
	$codigo_area=$registros1['codigo_area_mae'];
					$selecao2=mysqli_query($conexao,"select * from areas WHERE id='$codigo_area'");
				   	$registros2=mysqli_fetch_array($selecao2);	
					?>
				
				<option selected value="<?php echo $a=$registros2['id'] ?>">
					
					<?php echo $registros2['area'] ?>
					
				</option>
				<?php
					
			$selecao=mysqli_query($conexao,"select * from areas order by area ASC");
			$numero=mysqli_num_rows($selecao);	
			if($numero==0){?>
				<option value="0">Área Principal/Raiz</option>
				
			<?php }else{	
				
			while($registros=mysqli_fetch_array($selecao)){
					
				
				?>
				
				<?php if($a==$registros['id']){}else{ ?>
				
				<option value="<?php echo $registros['id'] ?>"><?php echo $registros['area'] ?></option>
				
				
				<?php }} }?>
				
			</select>
		</div>
		
		
		
		
		
		<div class="col-md-12 mt-3">
			<input type="button" class="btn btn-primary" value="Atualizar" onClick="Atualizar(<?php echo $registros1['id'] ?>)">
		</div>
					
	</div>				
					
					
	<div class="row ml-4 mr-4">				
		<div class="col-md-12">
		
			
			
		</div>			
	</div>				
					
					
					
					
					
					
					
					
					
				</div>
			</div>
		</div>

	</div>
</form>	
	
<!-------------Contadores--------->	
	<input type="hidden" value="1" id="contador_terceiros">
	<input type="hidden" value="1" id="contador_filiais">
	
	<script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin.min.js" type="text/javascript"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	<script src="js/jquery.mask.min.js"></script>
	
	
	
	
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
	
	
	<script>
	$h=jQuery.noConflict()
		function Atualizar(variavel){
		
			var Nome = $h("#cad-area").val()
			var AreaMae =$h("#cad-codigo-area-mae option:selected").val()
			
			  $h.ajax({
			  type: 'post',
			  data: 'codigo='+variavel+'&codigo_area='+Nome+'&areamae='+AreaMae,
			  url:'funcoes/atualizar-area.php',
			  success: function(retorno){
			  $h('#resposta-tabela').html(retorno); 
			  location.href='cadastro-areas.php'	  
		  }
		   })  
			
		}
	
	</script>
	
	
	<script>
			$j=jQuery.noConflict()
			
			$j(document).ready(function(){
			
			$j("#carrega-tabela-areas").load('tabela-areas.php')
				
				
			})
			
					
			function Excluir(variavel){
	  if (window.confirm("Tem certeza que deseja excluir essa área?")) {
      
			  $.ajax({
			  type: 'post',
			  data: 'codigo='+variavel,
			  url:'funcoes/excluir-area.php',
			  success: function(retorno){
			  $('#resposta-tabela').html(retorno); 
				  $j("#carrega-tabela-areas").load('tabela-areas.php')
		  }
		   })  
		  
		  
		  
   }else{
	   
   }
				
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