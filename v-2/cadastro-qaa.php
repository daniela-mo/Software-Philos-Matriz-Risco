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
	
<form action="processa-qaa.php" method="post">	
	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Cadastro QAA</span>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="row">
				<div class="col-12">
 	<h3 class="mb-4 mt-4">Cadastro Questão - QAA</h3>			
				
					
					
					<div class="col-md-2 mb-4">
					<label>N° Pergunta</label>
					<input type="number" name="cad-numero-pergunta" id="cad-numero-pergunta" class="form-control">
				</div>
				
				<div class="col-md-10 mb-4">
					<label>Pergunta</label>
					<input type="text" name="cad-pergunta" id="cad-pergunta" class="form-control">
				</div>
				<div class="col-md-12 mb-2">
					<h3>Resposta Sim</h3>
				</div>
				
				
				
					<div class="col-md-2 mb-4">
					<label>Upload</label>
					<select class="form-control" name="cad-upload-sim" id="cad-upload-sim">
						<option value="s">Sim</option>
						<option value="n">Não</option>
					</select>
				</div>
				
				<div class="col-md-8 mb-4">
					<label>Categoria</label>
					<input type="text" class="form-control" name="cad-categoria-sim" id="cad-categoria-sim">
				</div>	
				
				<div class="col-md-12 mb-4">
					<label>Mensagem padrão</label>
					<textarea id="cad-mensagem-sim" name="cad-mensagem-sim" class="form-control"></textarea>
				</div>
				
				
				
				<div class="col-md-12 mb-2">
					<h3>Resposta Não</h3>
				</div>
				
					<div class="col-md-2 mb-4">
					<label>Upload</label>
					<select class="form-control" name="cad-upload-nao" id="cad-upload-nao">
						<option value="s">Sim</option>
						<option value="n">Não</option>
					</select>
				</div>
				
				<div class="col-md-8 mb-4">
					<label>Categoria</label>
					<input type="text" class="form-control" name="cad-categoria-nao" id="cad-categoria-nao">
				</div>	
				
				<div class="col-md-12 mb-4">
					<label>Mensagem padrão</label>
					<textarea id="cad-mensagem-nao" name="cad-mensagem-nao" class="form-control"></textarea>
				</div>
				
				
				
				
				
				<div class="col-md-12">
					<input type="submit" value="Gravar Questão" class="btn btn-primary">
				</div>
				
					
				</div>
			</div>
		</div>

	</div>
	</form>	
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






