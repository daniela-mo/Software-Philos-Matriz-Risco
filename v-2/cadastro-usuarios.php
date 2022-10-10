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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
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
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Cadastro de Usuários</span>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="row ml-4">
				
             <div id="resposta"></div>
				
				<div class="col-md-12">
		
 	<h3 class="mb-4 mt-4">Cadastro de Usuários</h3>			
				</div>
					
	<div class="col-md-5">				
	<label>Nome</label>				
	<input type="text" name="cad-nome" id="cad-nome" class="form-control">
	</div>
	
	<div class="col-md-5">	
	<label>Email</label>				
	<input type="email" name="cad-email" id="cad-email" class="form-control">				
	</div>
		
	<div class="col-md-5 mt-3">					
	<label>Senha</label>				
	<input type="password" name="cad-senha" id="cad-senha" class="form-control">				
	</div>
					
	<div class="col-md-3  mt-3">
	<label>Tipo</label>				
	<select class="form-control" name="cad-tipo" id="cad-tipo">
		<option value="usuario">usuário</option>
		<option value="admin">admin</option>
			
	</select>				
	</div>				
					
	<div class="col-md-12">				
	<input type="button" value="Cadastrar" class="btn btn-primary mt-4" onClick="GravarUsuario()">				
	</div>					
					
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
	
		$var=jQuery.noConflict()
		
		function GravarUsuario(){
		 
		var email = $var("#cad-email").val()
		var nome =$var("#cad-nome").val()
		var senha =$var("#cad-senha").val()
		var tipo =$var("#cad-tipo").val()
		
		
		
		
		if(email==''){alert("Preencha o campo de E-mail")}else{
			
		if(senha==''){alert("Preencha o campo de Senha")}else{	
			
			
		
		
		  $var.ajax({
		  type: 'post',
		  data: 'email='+email+'&nome='+nome+'&senha='+senha+'&tipo='+tipo,
		  url:'funcoes/gravar-usuarios.php',
		  success: function(retorno){
			
		  $var('#resposta').html(retorno);  
		
			location.reload()  	  
			  
      }
       }) }	
		}}
	</script>
	
	
</body>
</html>