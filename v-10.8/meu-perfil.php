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
	$email=$_SESSION['usuario'];
	
	
?>	
<!-- Navegação !-->	
	
	
	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Meu Perfil</span>
						</div>
					</div>
					
					
				</div>
			</div>
			
	<?php
		mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');	
		$selecao_usuario=mysqli_query($conexao,"select * from usuarios_empresa WHERE email='$email'");
	$registros_usuario=mysqli_fetch_array($selecao_usuario);	
	?>		
	<form action="processa-alterar-perfil.php" method="post">		
		<input type="hidden" name="codigo" value="<?php echo $registros_usuario['id'] ?>">	
			<div class="row ml-2 mr-2">
				<div class="col-12">
 					<h3 class="mb-4 mt-4">Meu Perfil</h3>			
				</div>
				
				
				<div class="col-md-6">
					<label>Nome</label>
					<input type="text" class="form-control mb-3" name="cad-nome" id="cad-nome" value="<?php echo $registros_usuario['nome'] ?>">
				</div>
				
				
				<div class="col-md-6">
					<label>E-mail</label>
					<input type="text" class="form-control mb-3" name="cad-email" id="cad-email" value="<?php echo $registros_usuario['email'] ?>">
				</div>
				
				<div class="col-md-3">
					<label>CPF</label>
					<input type="text" class="form-control mb-3" name="cad-cpf" id="cad-cpf" value="<?php echo $registros_usuario['cpf'] ?>">
				</div>
				
				<div class="col-md-3">
					<label>Telefone</label>
					<input type="text" class="form-control mb-3" name="cad-telefone" id="cad-telefone" value="<?php echo $registros_usuario['telefone'] ?>">
				</div>
												
				
				<div class="col-md-12">
					<input type="submit" value="Atualizar Dados" class="btn btn-primary" >
				</div>
				
				
				
			</div>
	</form>		
			
	<form action="processa-alterar-senha.php" method="post">
	   <input type="hidden" name="codigo" value="<?php echo $registros_usuario['id'] ?>">	
		<div class="row ml-2 mr-2 mt-3">
			<div class="col-12">
 				<h3 class="mb-4 mt-4">Alterar Senha</h3>			
			</div>
			
			<div class="col-md-3">
				<label>Senha Atual</label>
				<input type="password" class="form-control mb-3" name="ver-senha-atual" id="ver-senha-atual">
			</div>
		</div>	
		<div class="row ml-2 mr-2">	
			<div class="col-md-3">
				<label>Nova Senha</label>
				<input type="password" class="form-control mb-3" name="ver-nova-senha" id="ver-nova-senha">
			</div>
			
			<div class="col-md-3">
				<label>Confirmar Nova Senha</label>
				<input type="password" class="form-control mb-3" name="ver-nova-senha2" id="ver-nova-senha2">
			</div>
			
			
			<div class="col-md-12">
					<input type="submit" value="Alterar Senha" class="btn btn-primary" >
				</div>
			
			
		</div>
	</form>		
			
			
		</div>
	</div>
	
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
</body>
</html>