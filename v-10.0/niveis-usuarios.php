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
<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
</head>
	
		
	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
<?php
	include('menu.php');
	
?>	
<!-- Navegação !-->	
	
<form action="processa-cadastro-niveis-usuarios.php" method="post">	
	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Níveis Usuários</span>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					
 	<h3 class="mb-4 mt-4 ml-4 mr-4">Níveis de Usuários</h3>			
				
	<div class="row ml-4 mr-4 mb-4" id="resposta-form-grupos-menus">
				
		
		
	</div>
				
	<div class="row ml-4 mr-4 mb-4">				
		<div class="col-md-3  mt-3 grupo-permissao">
			
			<input type="text" class="form-control grupo-permissao" name="cad-grupo-permissao" id="cad-grupo-permissao" placeholder="Novo Nome de Grupo">
						
		</div>
		
		<div class="col-md-3  mt-3 grupo-permissao ">
			<input type="button" class="btn btn-primary grupo-permissao" value="Gravar Grupo" onClick="GravarGrupo()">	
		</div>
		
		
		

					</div>	
		
		<div class="row ml-4 mr-4 mt-4">
		<div class="col-md-8 mt-4">
			<h4>Cadastro de permissões</h4>
			<div id="resposta"></div>
			<div id="resposta-tabela"></div>
			
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
	<script src="js/jquery.mask.min.js"></script>
	<script src="js/mascaras.js"></script>
	
	<script>
		
		function AtualizarPermissoes(){
		var menu= $var('#cad-menu option:selected').val()
		var grupo= $var('#cad-grupo option:selected').val()
			  $var.ajax({
			  type: 'post',
			  data: 'menu='+menu+'&grupo='+grupo,
			  url:'funcoes/cad-niveis-usuarios.php',
			  success: function(retorno){
			  $var('#resposta-tabela').html(retorno);  
		  }
		   })
			
		}
		
		function CarregarGruposMenus(){
			
			$var('#resposta-form-grupos-menus').load('form-grupos-menus.php')	
			
		}
		
		
		$var=jQuery.noConflict();
		$var(document).ready(function(){
			
		
		CarregarGruposMenus()	
			
		var menu= $var('#cad-menu option:selected').val()
		var grupo= $var('#cad-grupo option:selected').val()
		
		  $var.ajax({
		  type: 'post',
		  data: 'menu='+menu+'&grupo='+grupo,
		  url:'funcoes/cad-niveis-usuarios.php',
		  success: function(retorno){
		  $var('#resposta-tabela').html(retorno);  
      }
       })
						  
			})
		
		
		
   function GravarNiveis(){
		var consultar = $var('#cad-consultar').is(':checked');
	   if(consultar==true){consultar='1'}
	   if(consultar==false){consultar='0'}
	   
		var editar = $var('#cad-editar').is(':checked');
	   if(editar==true){editar='1'}
	   if(editar==false){editar='0'}
	   
		var excluir = $var('#cad-excluir').is(':checked');   
	   	if(excluir==true){excluir='1'}
	   if(excluir==false){excluir='0'}
	   
	   
		var admin = $var('#cad-admin').is(':checked');
	   if(admin==true){admin='1'}
	   if(admin==false){admin='0'}
	    
	  
	   
	   var grupo = $var('#cad-grupo').val()	
	   var menu = $var('#cad-menu').val()		
	   
	   	  $var.ajax({
		  type: 'post',
		  data: 'consultar='+consultar+'&editar='+editar+'&excluir='+excluir+'&admin='+admin+'&grupo='+grupo+'&setor='+menu,
		  url:'funcoes/gravar-niveis-usuarios.php',
		  success: function(retorno){
		  $var('#resposta').html(retorno);  
      }
       })
	   
		   
      }
		
		
		
		function GravarGrupo(){
			
			var grupo=$var('#cad-grupo-permissao').val()
			
		  $var.ajax({
		  type: 'post',
		  data: 'grupo='+grupo,
		  url:'funcoes/gravar-grupos.php',
		  success: function(retorno){
		  $var('#resposta').html(retorno); 
			 $var('.grupo-permissao').hide() 
			CarregarGruposMenus()  
      }
       })
			
		}
		
		
		function ExcluirGrupo(){
			
		  var grupo=$var('#cad-grupo').val()
			
		  $var.ajax({
		  type: 'post',
		  data: 'grupo='+grupo,
		  url:'funcoes/excluir-grupos.php',
		  success: function(retorno){
		  $var('#resposta').html(retorno);  
			  
		CarregarGruposMenus()	  
			  
			  
			  
      }
       })
			
		}
		
		
		
		function AddGrupo(){
			
			$var('.grupo-permissao').toggle()
		}
		
		
		function RemoveGrupo(){
			
			$var('.grupo-permissao').hide()
			ExcluirGrupo()
		}
		
	
	</script>
	
</body>
</html>