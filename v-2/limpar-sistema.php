<?php  
$nav_menu_principal='limpar';
$nav_menu_pagina='Limpar';
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
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Limpar Sistemas</span>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="row">
				<div class="col-12">
				
					
 	<h3 class="mb-4 mt-4">Limpar Sistemas</h3>	
					
					
<div class="alert alert-danger" role="alert">
  Ao Limpar o sistema para testes, no usuário de testes, somenta a tabela usuários e níveis de permissões não será zerada.
</div>			
					
				
				</div>
			</div>
			
			
<div class="row">
	<div class="col-md-12">
		<input type="button" class="btn btn-primary" value="Limpar Agora" onClick="Limpar()">
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
	$j=jQuery.noConflict()
		function Limpar(){
			if (window.confirm("Você deseja fazer uma limpeza geral para fins de testes?")) {
				
			$j.ajax({
			  type: 'post',
			  data: 'codigo=',
			  url:'funcoes/limpar-sistema.php',
			  success: function(retorno){
				
		  }
		   })
				
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