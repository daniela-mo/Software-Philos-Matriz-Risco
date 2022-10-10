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
	$codigo=$_REQUEST['cod']; 
?>	
<!-- Navegação !-->	
	
	
	<div class="content-wrapper">
		<div class="container-fluid">
			
		<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Empresa de Parceiros</span>
						</div>
					</div>
					
					
				</div>
			</div>
			
		<div class="row ml-4 mr-4">
		<div class="col-md-12">
			<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>
			<h3 class="mb-4 mt-4">Empresa de Parceiro <a href="editar-terceiro.php?cod=<?php echo $codigo ?>"><img src="imgs/icone-editar.png" width="30" height="30" alt=""/></a></h3>
		</div>
		
		<div class="col-md-2 mb-4">
			<label>Número Cad.</label>
			<?php
	mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
				$selecao=mysqli_query($conexao,"select * from terceiros WHERE id='$codigo'");
				$registros=mysqli_fetch_array($selecao);
				$id=$registros['id'];
				
			?>
			
			<input type="number" class="form-control" name="cad-num" id="cad-num" value="<?php echo $id+1 ?>" readonly >
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Razão Social</label>
			<input type="text" class="form-control" name="cad-razao-social" id="cad-razao-social" value="<?php echo $registros['razao_social'] ?>" readonly   >
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Nome Fantasia</label>
			<input type="text" class="form-control" name="cad-nome-fantasia" id="cad-nome-fantasia" value="<?php echo $registros['nome_fantasia'] ?>" readonly   >
		</div>
		
		<div class="col-md-4 mb-4">
			<label>CNPJ</label>
			<input type="text" class="form-control cnpj" name="cad-cnpj" id="cad-cnpj" value="<?php echo $registros['cnpj'] ?>" readonly   >
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Inscrição Estadual</label>
			<input type="text" class="form-control" name="cad-inscricao-estadual" id="cad-inscricao-estadual" value="<?php echo $registros['inscricao_estadual'] ?>" readonly   >
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Inscrição Municipal</label>
			<input type="text" class="form-control" name="cad-inscricao-municipal" id="cad-inscricao-municipal" value="<?php echo $registros['inscricao_municipal'] ?>" readonly   >
		</div>
		
		<div class="col-md-4 mb-4">
			<label>CNAE</label>
			<input type="text" class="form-control" name="cad-cnae" id="cad-cnae" value="<?php echo $registros['cnae'] ?>" readonly   >
		</div>
			
			<div class="col-md-4 mb-4">
			<label>Atividade Econômica</label>
	<input type="text" class="form-control" name="cad-atividade-economica" id="cad-atividade-economica" value="<?php echo $registros['atividade_economica'] ?>"  readonly>
		</div>
			
			<div class="col-md-4 mb-4">
			<label>Data da Fundação</label>
	<input type="text" class="form-control" name="cad-data-fundacao" id="cad-data-fundacao" value="<?php echo $registros['data_fundacao'] ?>"  readonly>
		</div>
			
			<div class="col-md-4 mb-4">
			<label>Pais</label>
		<input type="text" readonly class="form-control" value="<?php echo $registros['pais'] ?>">

		</div>
		
		<div class="col-md-3 mb-4">
			<label>CEP(Formato: 99999-999)</label>
			<input type="text" class="form-control cep" name="cad-cep" id="cad-cep" value="<?php echo $registros['cep'] ?>"  readonly   >
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Logradouro</label>
			<input type="text" class="form-control" name="cad-logradouro" id="cad-logradouro" value="<?php echo $registros['logradouro'] ?>" readonly   >
		</div>
		
		<div class="col-md-2 mb-4">
			<label>Número</label>
			<input type="number" class="form-control" name="cad-numero" id="cad-numero" value="<?php echo $registros['numero'] ?>" readonly    min="1">
		</div>
		
		<div class="col-md-2 mb-4">
			<label>Complemento</label>
			<input type="text" class="form-control" name="cad-complemento" id="cad-complemento" value="<?php echo $registros['complemento'] ?>" readonly   >
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Bairro</label>
			<input type="text" class="form-control" name="cad-bairro" id="cad-bairro" value="<?php echo $registros['bairro'] ?>" readonly   >
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Cidade</label>
			<input type="text" class="form-control" name="cad-cidade" id="cad-cidade" value="<?php echo $registros['cidade'] ?>" readonly   >
		</div>
		
		<div class="col-md-2 mb-4">
			<label>Estado</label>
			<input type="text" class="form-control" name="cad-estado" id="cad-estado" value="<?php echo $registros['estado'] ?>" readonly   >
		</div>
		
		<div class="col-md-5 mb-4">
			<label>E-mail</label>
			<input type="email" class="form-control" name="cad-email" id="cad-email" value="<?php echo $registros['email'] ?>" readonly   >
		</div>
			
			<div class="col-md-5 mb-4">
			<label>Site</label>
			<input type="url" class="form-control" name="cad-site" id="cad-site" value="<?php echo $registros['site'] ?>" readonly   >
		</div>
		
		<div class="col-md-3 mb-4">
			<label>Telefone com DDD</label>
			<input type="text" class="form-control telefone" name="cad-telefone" id="cad-telefone" value="<?php echo $registros['telefone'] ?>" readonly   >
		</div>
		
			
		<div class="col-md-4 mb-4">
			<label>Tipo/Classificação</label>
	<?php 
	$fornecedor= $registros['class_fornecedor'];
	$cliente= $registros['class_cliente'];
	$terceiro= $registros['class_terceiro'];			   
	
	if($fornecedor==1){echo "Fornecedor"; echo "</br>";}
	if($cliente==1){echo "Cliente"; echo "</br>";}
	if($terceiro==1){echo "Terceiro"; echo "</br>";}			   
	?>
		
			
			
		</div>
</div>	
		
<div class="row ml-4 mr-4">		
		
	
					
		
	
			
	
			
		

		
		
		<div class="col-md-12 mb-4">
			<label>Observações Adicionais</label>
			<textarea cols="30" rows="5" class="form-control" name="cad-observacoes-adicionais" id="cad-observacoes-adicionais"  readonly><?php echo $registros['observacoes'] ?></textarea>
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