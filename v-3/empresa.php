<?php  
$nav_menu_principal='cadastros';
$nav_menu_pagina='empresas';
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
	$codigo=$_REQUEST['cod']; 
?>	
<!-- Navegação !-->	
	
	
	<div class="content-wrapper">
		<div class="container-fluid">
			
		<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Empresa</span>
						</div>
					</div>
					
					
				</div>
			</div>
			
		<div class="row ml-4 mr-4">
		<div class="col-md-12">
			<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>
			<h3 class="mb-4 mt-4">Empresa 
			<?php
			$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='2' and codigo_grupo='$cod_grupo' and editar='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	
			?>	
				<a href="editar-empresa.php?cod=<?php echo $codigo ?>">
				<img src="imgs/icone-editar.png" width="30" height="30" alt=""/>
				</a>
			<?php } ?>	
			
			</h3>
		</div>
		
	
			
			<?php
	mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
				$selecao=mysqli_query($conexao,"select * from empresas WHERE id='$codigo'");
				$registros=mysqli_fetch_array($selecao);
				$id=$registros['id'];
				
			?>
			
		
		
		<div class="col-md-4 mb-4">
			<label>Razão Social</label>
			<input type="text" class="form-control" name="cad-razao-social" id="cad-razao-social" value="<?php echo $registros['razao_social'] ?>" readonly>
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Nome Fantasia</label>
			<input type="text" class="form-control" name="cad-nome-fantasia" id="cad-nome-fantasia" value="<?php echo $registros['nome_fantasia'] ?>" readonly>
		</div>
		
		<div class="col-md-4 mb-4">
			<label>CNPJ</label>
			<input type="text" class="form-control cnpj" name="cad-cnpj" id="cad-cnpj" value="<?php echo $registros['cnpj'] ?>" readonly>
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Inscrição Estadual</label>
			<input type="text" class="form-control" name="cad-inscricao-estadual" id="cad-inscricao-estadual" value="<?php echo $registros['inscricao_estadual'] ?>" readonly>
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Inscrição Municipal</label>
			<input type="text" class="form-control" name="cad-inscricao-municipal" id="cad-inscricao-municipal" value="<?php echo $registros['inscricao_municipal'] ?>" readonly>
		</div>
		
		<div class="col-md-4 mb-4">
			<label>CNAE</label>
			<input type="text" class="form-control" name="cad-cnae" id="cad-cnae" value="<?php echo $registros['cnae'] ?>" readonly>
		</div>
			
			<div class="col-md-4 mb-4">
			<label>Atividade Econômica</label>
	<input type="text" class="form-control" name="cad-atividade-economica" id="cad-atividade-economica" value="<?php echo $registros['atividade_economica'] ?>"  readonly>
		</div>
			
			<div class="col-md-4 mb-4">
			<label>Pais</label>
		<input type="text" readonly class="form-control" value="<?php echo $registros['pais'] ?>">
		</div>
			
		<div class="col-md-4 mb-4">
			<label>Data da Fundação</label>
		<input type="text" readonly class="form-control" value="<?php echo $registros['data_fundacao'] ?>">

		</div>	
			
		
		<div class="col-md-3 mb-4">
			<label>CEP(Formato: 99999-999)</label>
			<input type="text" class="form-control cep" name="cad-cep" id="cad-cep" value="<?php echo $registros['cep'] ?>"  readonly>
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Logradouro</label>
			<input type="text" class="form-control" name="cad-logradouro" id="cad-logradouro" value="<?php echo $registros['logradouro'] ?>" readonly>
		</div>
		
		<div class="col-md-2 mb-4">
			<label>Número</label>
			<input type="text" class="form-control" name="cad-numero" id="cad-numero" value="<?php echo $registros['numero'] ?>" readonly>
		</div>
		
		<div class="col-md-2 mb-4">
			<label>Complemento</label>
			<input type="text" class="form-control" name="cad-complemento" id="cad-complemento" value="<?php echo $registros['complemento'] ?>" readonly>
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Bairro</label>
			<input type="text" class="form-control" name="cad-bairro" id="cad-bairro" value="<?php echo $registros['bairro'] ?>" readonly>
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Cidade</label>
			<input type="text" class="form-control" name="cad-cidade" id="cad-cidade" value="<?php echo $registros['cidade'] ?>" readonly>
		</div>
		
		<div class="col-md-2 mb-4">
			<label>Estado</label>
			<input type="text" class="form-control" name="cad-estado" id="cad-estado" value="<?php echo $registros['estado'] ?>" readonly>
		</div>
		
		<div class="col-md-5 mb-4">
			<label>E-mail</label>
			<input type="email" class="form-control" name="cad-email" id="cad-email" value="<?php echo $registros['email'] ?>" readonly>
		</div>
			
				<div class="col-md-5 mb-4">
			<label>Site</label>
			<input type="url" class="form-control" name="cad-site" id="cad-site" value="<?php echo $registros['site'] ?>" readonly>
		</div>
		
		<div class="col-md-3 mb-4">
			<label>Telefone com DDD</label>
			<input type="text" class="form-control telefone" name="cad-telefone" id="cad-telefone" value="<?php echo $registros['telefone'] ?>" readonly>
		</div>
			
			
			
			
		
		
</div>	
		
<div class="row ml-4 mr-4">		
		
			
	
			
	
		
		
		<div class="col-md-12 mb-4">
			<label>Observações Adicionais</label>
			<textarea cols="30" rows="5" class="form-control" name="cad-observacoes-adicionais" id="cad-observacoes-adicionais"  readonly><?php echo $registros['observacoes'] ?></textarea>
		</div>
			
			
		</div>
			
			
<div class="row ml-4 mr-4">				
	
	<div class="col-md-12 mt-3">
		<h3>Filiais <a href="cadastro-filial.php?cod=<?php echo $codigo ?>"><img src="imgs/icone-mais.png" width="25" height="25" alt="" class="pointer"></a></h3>
		
		<?php
			$selecao_filiais=mysqli_query($conexao,"select * from filiais WHERE codigo_empresa_principal='$codigo' ");
			$numero_filiais=mysqli_num_rows($selecao_filiais);
		if($numero_filiais>0){		   
		?>
		
		<table class="table table-striped">
			<tr>
				<th>Razão Social</th>
				<th>CNPJ</th>
				<th>CNAE</th>
				<th>Ativ. Econômica</th>
				<th>Estado</th>
				<th>Cidade</th>
				<th>Ação</th>
			</tr>
			<?php
			while($registros_filiais=mysqli_fetch_array($selecao_filiais)){
			?>
			<tr>
				<td><a class="text-dark" href="filial.php?cod=<?php echo $registros_filiais['id'] ?>"><?php echo $registros_filiais['razao_social'] ?></a></td>
				<td><a class="text-dark" href="filial.php?cod=<?php echo $registros_filiais['id'] ?>"><?php echo $registros_filiais['cnpj'] ?></a></td>
				<td><a class="text-dark" href="filial.php?cod=<?php echo $registros_filiais['id'] ?>"><?php echo $registros_filiais['cnae'] ?></a></td>
				
					<td><a class="text-dark" href="filial.php?cod=<?php echo $registros_filiais['id'] ?>"><?php echo $registros_filiais['estado'] ?></a></td>
				
					<td><a class="text-dark" href="filial.php?cod=<?php echo $registros_filiais['id'] ?>"><?php echo $registros_filiais['cidade'] ?></a></td>
				
				<td><a class="text-dark" href="filial.php?cod=<?php echo $registros_filiais['id'] ?>"><?php echo $registros_filiais['atividade_economica'] ?></a></td>
				<td>	
					<i class="fa fa-trash" style="cursor: pointer" onClick="ExcluirEmpresaFilial(<?php echo $registros_filiais['id'] ?>)"></i>
				</td>
			</tr>
			<?php } ?>
		</table>
		<?php }else{ ?>
		
		<p>Sem Filiais cadastradas no momento</p>
		
		<?php } ?>
		
	</div>
	
	
	<div class="col-md-12 mt-3">
		<h3>Parceiros <a href="cadastro-empresa-terceiros.php?cod=<?php echo $codigo ?>"><img src="imgs/icone-mais.png" width="25" height="25" alt="" class="pointer"></a></h3>
		
		<?php
			$selecao_terceiras=mysqli_query($conexao,"select * from terceiros WHERE codigo_empresa_principal='$codigo' ");
			$numero_terceiras=mysqli_num_rows($selecao_terceiras);
		if($numero_terceiras>0){		   
		?>
		
		<table class="table table-striped">
			<tr>
				<th>Razão Social</th>
				<th>CNPJ</th>
				<th>CNAE</th>
				<th>Ativ. Econômica</th>
				<th>Estado</th>
				<th>Cidade</th>
				<th>Ação</th>
			</tr>
			<?php
			while($registros_terceiras=mysqli_fetch_array($selecao_terceiras)){
			?>
			<tr>
				<td><a class="text-dark" href="terceiro.php?cod=<?php echo $registros_terceiras['id'] ?>"><?php echo $registros_terceiras['razao_social'] ?></a></td>
				<td><a class="text-dark" href="terceiro.php?cod=<?php echo $registros_terceiras['id'] ?>"><?php echo $registros_terceiras['cnpj'] ?></a></td>
				<td><a class="text-dark" href="terceiro.php?cod=<?php echo $registros_terceiras['id'] ?>"><?php echo $registros_terceiras['cnae'] ?></a></td>
				<td><a class="text-dark" href="terceiro.php?cod=<?php echo $registros_terceiras['id'] ?>"><?php echo $registros_terceiras['atividade_economica'] ?></a></td>
				<td><a class="text-dark" href="terceiro.php?cod=<?php echo $registros_terceiras['id'] ?>"><?php echo $registros_terceiras['estado'] ?></a></td>
				
				<td><a class="text-dark" href="terceiro.php?cod=<?php echo $registros_terceiras['id'] ?>"><?php echo $registros_terceiras['cidade'] ?></a></td>
				
					<td>	
					<i class="fa fa-trash" style="cursor: pointer" onClick="ExcluirEmpresaParceiro(<?php echo $registros_terceiras['id'] ?>)"></i>
				</td>
			</tr>
			<?php } ?>
		</table>
		<?php }else{ ?>
		
		<p>Sem Filiais cadastradas no momento</p>
		
		<?php } ?>
		
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
		
					$ba=jQuery.noConflict()
	function ExcluirEmpresaFilial(codigo){
		
	if (window.confirm("Você deseja excluir a empresa?")) {

	  $ba.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/excluir-empresa-filial.php',
			  success: function(retorno){
				 
			  $ba('#resposta-empresa').html(retorno); 
				location.href='empresa.php?cod=<?php echo $codigo ?>' 
		  }
		   })  	
}}	
		
			function ExcluirEmpresaParceiro(codigo){
		
	if (window.confirm("Você deseja excluir a empresa?")) {

	  $ba.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/excluir-empresa-parceiros.php',
			  success: function(retorno){
				 
			  $ba('#resposta-empresa').html(retorno); 
				location.href='empresa.php?cod=<?php echo $codigo ?>' 
		  }
		   })  	
}}	
		
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