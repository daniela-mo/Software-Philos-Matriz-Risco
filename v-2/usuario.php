<?php  
$nav_menu_principal='sistema';
$nav_menu_pagina='usuarios';
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
	
<style>
	.cad-area-apoio{display: none}	
	#add-area12{display: none}
	.desativar1{display: none}
</style>	
	
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
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-white">Dashboard </a>| Usuário</span>
						</div>
					</div>
					
					
				</div>
			</div>	
			
			
			
			<div class="row ml-4 mr-4">
				<div class="col-12">
	<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>		
 	<h3 class="mb-4 mt-4">Usuário 
		
		<?php
			$verificar_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='5' and codigo_grupo='$cod_grupo' and editar='1' ");
			$numero_grupo=mysqli_num_rows($verificar_grupo);
			if($numero_grupo>=1){	
			?>			
		<a href="editar-usuario.php?cod=<?php echo $codigo ?>"><img src="imgs/icone-editar.png" width="30" height="30" alt=""/></a>
					<?php } ?>
					</h3>			
				</div>
			</div>
			
			
			<div class="row ml-4 mr-4">
		<div class="col-md-2 mb-4">
		
		<label>Número Cad.</label>
			<?php
						mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
	
				$selecao=mysqli_query($conexao,"select * from usuarios_empresa WHERE id='$codigo'");
				$registros=mysqli_fetch_array($selecao);
				$id=$registros['id'];
									 
				$responsavel=$registros['responsavel'];
				if($responsavel=='s'){$responsavel='Sim';}	
				if($responsavel=='n'){$responsavel='Não';}						 
			?>
			
			
			<input type="number" class="form-control" name="cad-num" id="cad-num" value="<?php echo $id ?>" readonly >	
			
		</div>	
		
		
		<div class="col-md-6">
			<label>Nome Completo*
</label>
			<input type="text" class="form-control" name="cad-nome" id="cad-nome" value="<?php echo $registros['nome'] ?>" readonly>
		</div>
				
				<div class="col-md-4 mb-4">
			<label>Cargo</label>
			<input type="text" class="form-control" name="cad-cargo" id="cad-cargo" value="<?php echo $registros['cargo'] ?>" readonly>
		</div>
		
		<div class="col-md-3">
			<label>CPF*</label>
			<input type="text" class="form-control cpf" name="cad-cpf" id="cad-cpf" value="<?php echo $registros['cpf'] ?>" readonly>
		</div>
	
	
		<div class="col-md-3 mb-4">
			<label>Telefone</label>
			<input type="text" class="form-control telefone" name="cad-telefone" id="cad-telefone" value="<?php echo $registros['telefone'] ?>" readonly>
		</div>	
				
			<div class="col-md-3 mb-4">
			<label>Login*(@<?php echo $_SESSION['dominio']; ?>)</label>
			<input type="email" class="form-control" name="cad-login" id="cad-login" value="<?php echo $registros['email'] ?>"  readonly >
		</div>
		
		
		<div class="col-md-3 mb-4">
			<label>E-Mail*</label>
			<input type="email" class="form-control" name="cad-email" id="cad-email" value="<?php echo $registros['email2'] ?>" readonly>
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Empresa/Filial</label>
			
			<?php
	$codigo_empresa=$registros['cod_empresa'];
	$selecao_empresa=mysqli_query($conexao,"select * from empresas WHERE id='$codigo_empresa'");
	$registros_empresas=mysqli_fetch_array($selecao_empresa);		
			?>	
			
			<input type="text" class="form-control" value="<?php echo $registros_empresas['razao_social'] ?>" readonly>
		</div>		
		
		
		<div class="col-md-4 mb-4">
			<label>Área principal</label>
			<?php
	$codigo_setor=$registros['setor'];
	$selecao_setores=mysqli_query($conexao,"select * from areas WHERE id='$codigo_setor'");
	$registros_setores=mysqli_fetch_array($selecao_setores);
				   $nome_area=$registros_setores['area'];
				   if($nome_area==''){$nome_area='Em Transição';}
			?>	
			
			
			<input type="text" class="form-control" value="<?php echo $nome_area ?>" readonly>
		</div>
		
				<div class="col-md-4 mb-4">
			<label>Responsável pelo setor?</label>
			<input type="text" class="form-control" value="<?php echo $responsavel ?>" readonly>
		</div>
				
				<div class="col-md-12" id="carrega-areas-apoio">
			
			
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Grupo de Permissão</label>
			
			<?php
				$grupo=	$registros['grupo'];
				$selecao_grupos=mysqli_query($conexao,"select * from grupos WHERE id='$grupo'");
				$registros_grupos=mysqli_fetch_array($selecao_grupos);
			?>	
				
			
			
			<input type="text" class="form-control" value="<?php echo $registros_grupos['grupo'] ?>" readonly>
		</div>
				
			</div>
			
	<div class="row ml-4 mr-4">		
		
		<div class="col-md-10">
		
			<h5 class="mt-4"><strong>Outras áreas de atuação</strong></h5>
		<div class="table-responsive">		
	<table id="example" class="display" >
        <thead>
            <tr>
                <th>Área</th>
				 <th>Empresa</th>
            </tr>
        </thead>
        <tbody>
			<?php
			mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
				$selecao=mysqli_query($conexao,"select * from responsaveis_areas WHERE codigo_usuario='$codigo'");
				while($registros=mysqli_fetch_array($selecao)){
				$codigo_area=$registros['codigo_area'];
					
				$selecao_area=mysqli_query($conexao,"select * from areas WHERE id='$codigo_area'");
				$numero=mysqli_num_rows($selecao_area);	
				$registros_areas=mysqli_fetch_array($selecao_area);	
					
				$codigo_empresa=$registros_areas['codigo_empresa'];		
					
				$selecao_empresa=mysqli_query($conexao,"select * from empresas WHERE id='$codigo_empresa'");
				$registros_empresa=mysqli_fetch_array($selecao_empresa);			
					
			if($numero==0){}else{		
					
			?>
            <tr>
               <td><?php echo $registros['area'] ?></td>
				<td><?php echo $registros_empresa['razao_social']?></td>
          
				
            </tr>
			
			<?php }} ?>

        </tbody>
       
    </table>				
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
	
	
	$c=jQuery.noConflict()
		
		function MudarSetor(){
			var funcao = $c('#cad-area option:selected').val()
			
			
			$c.ajax({
			  type: 'post',
			  data: 'setor='+funcao,
			  url:'funcoes/cad-funcao.php',
			  success: function(retorno){
			  $c('#cad-funcao').html(retorno);  
		  }
		   })
		}
		
		function DeletarAreaApoio(codigo){
			 if(window.confirm("Tem certeza que deseja excluir?")) {
			$c.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/excluir-area-apoio.php',
			  success: function(retorno){
			  CarregarAreasApoio()
		  }
		   })
			
			
		}}
	
		function AddArea(){
				$c(".cad-area-apoio").toggle()
}
		
		function CarregarAreasApoio(){
			
		//$c("#carrega-areas-apoio").load('funcoes/areas-apoio.php')	
			
			$c.ajax({
			  type: 'post',
			  data: 'id_usuario=<?php echo $id_usuario ?>',
			  url:'funcoes/areas-apoio.php',
			  success: function(retorno){
				$c("#carrega-areas-apoio").html(retorno)			
		  }
		   })
			
		}
		
		
		function GravarArea(){
			
			var area = $c("#cad-area-apoio option:selected").val()
			var usuario = <?php echo $id_usuario ?>;
			$c.ajax({
			  type: 'post',
			  data: 'area='+area+'&usuario='+usuario,
			  url:'funcoes/gravar-area-apoio.php',
			  success: function(retorno){
				  $c(".cad-area-apoio").toggle()
			   CarregarAreasApoio()
		  }
		   })
		}
		
		function CarregarOutrasAreas(){
			var codigo_empresa = $c('#cad-empresa option:selected').val()
			
				$c.ajax({
			  type: 'post',
			  data: 'codigo='+codigo_empresa,
			  url:'carregar-area-principal.php',
			  success: function(retorno){
				$c("#carregar-area-principal").html(retorno)
		  }
		   })
			
			
			
				$c.ajax({
			  type: 'post',
			  data: 'codigo='+codigo_empresa,
			  url:'ouras-areas-de-atuacao.php',
			  success: function(retorno){
				$c("#carregar-outras-areas-de-atuacao").html(retorno)
		  }
		   })
			
		}
		
		function CarregarTabelaOutrasAreas(){
				$c.ajax({
			  type: 'post',
			  data: 'codigo=',
			  url:'tabela-outras-areas-de-atuacao.php',
			  success: function(retorno){
				$c("#carregar-tabela-outras-areas-de-atuacao").html(retorno)
		  }
		   })
			
		}
		
		function AdicionarOutrasAreas(){
			
			var codigo_area= $c('#escolher-area option:selected').val()
			if(codigo_area!='0'){
				$c.ajax({
			  type: 'post',
			  data: 'area='+codigo_area,
			  url:'funcoes/gravar-outras-areas-de-atuacao-temp.php',
			  success: function(retorno){
				CarregarTabelaOutrasAreas()
		  }
		   })
		}}
		
		function LimparOutrasAreasTemp(){
				$c.ajax({
			  type: 'post',
			  data: 'area=',
			  url:'funcoes/limpar-outras-areas-de-atuacao-temp.php',
			  success: function(retorno){
				
		  }
		   })
			
		}
		
		
		$c(document).ready(function(){
			
			CarregarAreasApoio()
			LimparOutrasAreasTemp()
		})
		
		
		function GerarSenha(){
		<?php
	$random = rand(1000000, 9999999);
		?>
			var senha = $c('#cad-senha').val(<?php echo $random ?>)
			var senhaconfirmacao = $c('#cad-senha-confirmacao').val(<?php echo $random ?>)
			
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