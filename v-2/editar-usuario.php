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
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
	<link rel="stylesheet" type="text/css" href="css/datatable.css">
	<style>
		.cad-area-apoio{display: none}
	</style>
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
	
?>	
<!-- Navegação !-->	
	
<form action="processa-editar-usuario.php" method="post">
	<input type="hidden" name="codigo" value="<?php echo $codigo ?>">
	<div class="content-wrapper">
		<div class="container-fluid">
			
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Editar Usuário</span>
						</div>
					</div>
					
					
				</div>
			</div>
			
			
	<?php
		$selecao=mysqli_query($conexao,"select * from usuarios_empresa WHERE id='$codigo'");
		$registros=mysqli_fetch_array($selecao);	
			
			$responsavel=$registros['responsavel'];
				if($responsavel=='s'){$responsavel='Sim';}	
				if($responsavel=='n'){$responsavel='Não';}	
	?>		
			
			
			<div class="row">
				<div class="col-12">
	<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>				
 	<h3 class="mb-4 mt-4 ml-4 mr-4">Editar Usuário</h3>			
				
	<div class="row ml-4 mr-4">
		<div class="col-md-2 mb-4">
		
		<label>Número Cad.</label>
			
			
			<input type="number" class="form-control" name="cad-num" id="cad-num" value="<?php echo $registros['id'] ?>" readonly >	
			
		</div>	
		
		
		<div class="col-md-6">
			<label>Nome Completo*</label>
			<input type="text" class="form-control" name="cad-nome" id="cad-nome" value="<?php echo $registros['nome'] ?>" required>
		</div>
		
		
		<div class="col-md-4 mb-4">
			<label>Cargo</label>
			<input type="text" class="form-control" name="cad-cargo" id="cad-cargo" value="<?php echo $registros['cargo'] ?>">
		</div>
		
		<div class="col-md-3">
			<label>CPF*</label>
			<input type="text" class="form-control cpf" name="cad-cpf" id="cad-cpf" required value="<?php echo $registros['cpf'] ?>">
		</div>
	
	
		<div class="col-md-3 mb-4">
			<label>Telefone</label>
			<input type="text" class="form-control telefone" name="cad-telefone" id="cad-telefone" value="<?php echo $registros['telefone'] ?>">
		</div>	
		
		<div class="col-md-3 mb-4">
			<label>Login*(@<?php echo $_SESSION['dominio']; ?>)</label>
			<input type="email" class="form-control" name="cad-login" id="cad-login" value="<?php echo $registros['email'] ?>" required>
		</div>
		
		
		<div class="col-md-3 mb-4">
			<label>E-Mail*</label>
			<input type="email" class="form-control" name="cad-email" id="cad-email" value="<?php echo $registros['email2'] ?>">
		</div>
		
		
		<div class="col-md-4 mb-4">
			<label>Empresa/Filial</label>
			<?php
	$codigo_empresa=$registros['cod_empresa'];
	$selecao_empresa=mysqli_query($conexao,"select * from empresas WHERE id='$codigo_empresa'");
	$registros_empresas=mysqli_fetch_array($selecao_empresa);		
			?>	
			
			<select class="form-control" name="cad-empresa" id="cad-empresa" onChange="CarregarOutrasAreas()">
				<option value="<?php echo $registros_empresas['id'] ?>"><?php echo $registros_empresas['razao_social'] ?></option>
	<?php
	mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
		$selecao_empresa2=mysqli_query($conexao,"select * from empresas");
		while($registros_empresa2=mysqli_fetch_array($selecao_empresa2)){		   
	?>
		<?php if($registros_empresa2['id']!=$registros_empresas['id']){ ?>
			<option value="<?php echo $registros_empresa2['id'] ?>"><?php echo $registros_empresa2['razao_social'] ?></option>	
				
		<?php }} ?>		
			</select>
		</div>
		
		<div class="col-md-4 mb-4">
			<label>Área principal</label>
			<div id="carregar-area-principal">
			<select class="form-control">
					<option></option>
				</select>
			</div>
		</div>
		
		
		<div class="col-md-4 mb-4">
			<label>Responsável pelo setor?</label>
			<select class="form-control" name="cad-responsavel" id="cad-responsavel">
				<option value="<?php echo $responsavel ?>"><?php echo $responsavel ?></option>
				
				<?php if($responsavel!='Não'){ ?>
				<option value="n">Não</option>
				<?php } ?>		
				<?php if($responsavel!='Sim'){ ?>
				<option value="s">Sim</option>
				<?php } ?>
			</select>
		</div>
		
		
		<div class="col-md-12" id="carrega-areas-apoio">
		</div>
		
		
		<div class="col-md-3 mb-4">
			<label>Grupo de Permissão</label>
			<select class="form-control" name="cad-grupo" id="cad-grupo">
			<?php
				$selecao_grupos=mysqli_query($conexao,"select * from grupos order by grupo ASC");
				while($registros_grupos=mysqli_fetch_array($selecao_grupos)){
			?>	
				
				<option value="<?php echo $registros_grupos['id'] ?>"><?php echo $registros_grupos['grupo'] ?></option>
				<?php } ?>
				
			</select>
		</div>
		
		<div class="col-md-6">
		
		</div>

		
		<div class="col-md-6">
			
			<h5><strong>Outras áreas de atuação</strong></h5>
			
			
			<div id="carregar-outras-areas-de-atuacao">
				<select class="form-control">
					<option>Escolher Empresa Antes</option>
				</select>
			</div>
			
			
			
			</div>
		
		<div class="col-md-6">
			<h5>&nbsp;</h5>
			<input type="button" value="Adicionar" class="btn btn-primary" onClick="AdicionarOutrasAreas()" >
		</div>	
		
		<div class="col-md-10">
			<div id="carregar-tabela-outras-areas-de-atuacao"> </div>
		</div>
		
		<div class="col-md-12">
			<input type="submit" class="btn btn-primary mt-3" value="Atualizar Usuário">
		</div>
			
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
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	
	<script>
      	
	$c=jQuery.noConflict()		
	
	
function RefreshOutrasAreas()	{
	$c=jQuery.noConflict()
	$c(document).ready(function() {
    $c('#example3').DataTable();
} );	
		
	$c("#example3").dataTable({
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
		
}
	
		
		
		
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
		
		function DeletarOutrasAreas(codigo){
			 if(window.confirm("Tem certeza que deseja excluir?")) {
			$c.ajax({
			  type: 'post',
			  data: 'codigo='+codigo,
			  url:'funcoes/excluir-outras-areas-atuacao.php',
			  success: function(retorno){
			CarregarOutrasAreas()
			CarregarTabelaOutrasAreas()	  
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
			  data: 'codigo='+codigo_empresa+'&area_principal=<?php echo $registros['setor'] ?>',
			  url:'carregar-area-principal2.php',
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
			  data: 'codigo=<?php echo $codigo ?>',
			  url:'tabela-outras-areas-de-atuacao2.php',
			  success: function(retorno){
				
				$c("#carregar-tabela-outras-areas-de-atuacao").html(retorno)
				  RefreshOutrasAreas()
		  }
		   })
			
		}
		
		function AdicionarOutrasAreas(){
			
			var codigo_area= $c('#escolher-area option:selected').val()
			
		
			if(codigo_area!='0'){
				$c.ajax({
			  type: 'post',
			  data: 'area='+codigo_area+'&codigo_usuario=<?php echo $codigo ?>',
			  url:'funcoes/gravar-outras-areas-de-atuacao.php',
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
			CarregarOutrasAreas()
			CarregarTabelaOutrasAreas()
			RefreshOutrasAreas()
			
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