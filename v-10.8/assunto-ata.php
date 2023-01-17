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
	
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
	$selecao=mysqli_query($conexao,"select * from comites_assuntos WHERE id='$codigo'");
	$registros=mysqli_fetch_array($selecao);
?>	
<!-- Navegação !-->	
	

	<input type="hidden" name="codigo-comite" id="codigo-comite" value="<?php echo $codigo ?>">
	<div class="content-wrapper">
		<div class="container-fluid">
		<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<a href="dashboard.php"><span class="text-white breadcrumb-item">Dashboard | Assuntos Ata</span></a>
						</div>
					</div>
					
					
				</div>
			</div>	
			
		
			<div class="row ">
				<div class="col-md-12">
	<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>				
 	<h2 class="mb-4 mt-4 ml-4 mr-4">Assunto <?php echo $registros['assunto'] ?></h2>			
	
		
<div class="row ml-4 mr-4">		
	
	<div class="col-md-4">
		<label>Assunto</label>
		<input type="text" class="form-control mb-4" name="cad-assunto" id="cad-assunto" value="<?php echo $registros['assunto'] ?>" readonly>
	</div>
	
		<div class="col-md-4">
		<label>Anexo</label>
		<input type="text" class="form-control mb-4" name="cad-anexo" id="cad-anexo" value="<?php echo $registros['anexo'] ?>" readonly>
	</div>
	
	<div class="col-md-4">
		<label>Risco Associado</label>
		<input type="text" class="form-control mb-4" name="cad-risco-associado" id="cad-risco-associado" value="<?php echo $registros['risco_associado'] ?>" readonly>
	</div>
	
		
	<div class="col-md-12">
		<label>Descrição</label>
		<textarea class="form-control" name="cad-descricao" id="cad-descricao" rows="6" readonly><?php echo $registros['descricao'] ?></textarea>
	</div>
	
	

	
		
	</div>
	
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
$b=jQuery.noConflict()	
	
$b(document).ready(function() {
	
	
} );
		
	$b("#tabela-assuntos").dataTable({
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
		
	
	function CadastrarAssuntos(codigo_ata){
		
		var assunto = $b("#cad-assunto").val()
		var risco =  $b("#cad-risco-associado").val()
		var anexo =   $b("#cad-anexo").val()
		
		
		$b.ajax({
		type: 'post',
		data: 'codigo='+codigo_ata+'&assunto='+assunto+'&risco_associado='+risco+'&anexo='+anexo,
		url:'funcoes/gravar-assuntos-ata.php',
		success: function(retorno){
				 

				
		  }
		   })  
		
		
	}

</script>

	  
	

 	

</body>
</html>