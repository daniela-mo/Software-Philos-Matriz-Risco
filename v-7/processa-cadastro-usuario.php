<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit=no">
	<title>Dashboard M2V</title>
	<link rel="stylesheet" type="text/css" href="bibliotecas/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/sb-admin.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	
</head>
	
		
	
<body class=" fixed-nav sticky-footer" id="page-top" >
<!-- Navegação !-->	
<?php
	include('menu.php');
	include('funcoes/valida-cpf.php');
?>	
<!-- Navegação !-->	
	
<form action="processa-cadastro-usuario.php" method="post">	
	<div class="content-wrapper">
		<div class="container-fluid">
			
			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">
					
					<div class="row">
						<div class="col-md-9">
							<span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a> | Página de Erro</span>
						</div>
					</div>
					
					
				</div>
			</div>
			
			<div class="row">
				<div class="col-12">
	<?php
	
	$cpf=$_POST['cad-cpf'];				
					
	$valida=validaCPF($cpf)	;			
	if($valida==1){				
	?>				
					
					
	<?php
	
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;
$responsavel= $_POST['cad-responsavel'];
$nome=$_POST['cad-nome'];

$nome = str_replace("'", "", $nome);
$nome = str_replace('"', "", $nome);		
		
$cpf=$_POST['cad-cpf'];
$telefone=$_POST['cad-telefone'];
$email=$_POST['cad-email'];
$login=$_POST['cad-login'];		
$setor=$_POST['cad-area'];
$cargo=$_POST['cad-cargo'];
$cargo = str_replace("'", "", $cargo);
$cargo = str_replace('"', "", $cargo);		
		
@$funcao=$_POST['cad-funcao'];
$grupo=$_POST['cad-grupo'];
$senha=$_POST['cad-senha'];
$senha_confirmacao	=$_POST['cad-senha-confirmacao'];
$criptografia=md5($senha);
					
$cod_empresa=$_POST['cad-empresa'];					
					
$data=date('d-m-Y');
$hora=date('H:i:s');					
					

$verifica_cpf=mysqli_query($conexao,"select * from usuarios_empresa WHERE cpf='$cpf' ");
$num_cpf=mysqli_num_rows($verifica_cpf);					
if($num_cpf==0 or $cpf==''){
	

					

if($senha==$senha_confirmacao){

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$inserir=mysqli_query($conexao,"insert into usuarios_empresa(
nome,
cpf,
telefone,
email,
setor,
cargo,
funcao,
grupo,
responsavel,
senha,
cod_empresa,
email2

)values(

'$nome',
'$cpf',
'$telefone',
'$login',
'$setor',
'$cargo',
'$funcao',
'$grupo',
'$responsavel',
'$criptografia',
'$cod_empresa',
'$email'

)");
if($inserir){ ?>


<?php
	
$selecao_usuarios=mysqli_query($conexao,"select * from usuarios_empresa order by id DESC");	
$registros_usuarios=mysqli_fetch_array($selecao_usuarios);
$codigo_usuario=$registros_usuarios['id'];	
	
$selecao_areas_temp=mysqli_query($conexao,"select * from responsaveis_areas_temp");
while($registros_areas_temp=mysqli_fetch_array($selecao_areas_temp)){	
$codigo_area=$registros_areas_temp['codigo_area'];

$selecao_area=mysqli_query($conexao,"select * from areas WHERE id='$codigo_area'");
$registros_area=mysqli_fetch_array($selecao_area);	
$nome_area=$registros_area['area'];
	
$inserir_areas=mysqli_query($conexao,"insert into responsaveis_areas(codigo_area,codigo_usuario,area,data,hora)values('$codigo_area','$codigo_usuario','$nome_area','$data','$hora') ");	

	
$excluir=mysqli_query($conexao,"delete  from responsaveis_areas_temp ");
	
	
}
?>	
					



<script>
	location.href="usuarios.php"
</script>


	
	
<?php }else{  ?>

<script>
	alert("Cadastro não pode ser realizado")
	location.href="usuarios.php"
</script>


<?php }}else{?>
<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>
<h3 class="mb-4 mt-4 ml-4 mr-4">Senhas digitadas não conferem</h3>	

<?php }}else{ ?>			
				
<input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>						
<h3 class="mb-4 mt-4 ml-4 mr-4">CPF Já cadastrado!</h3>							
					
					
<?php } ?>					
						
<?php }else{ ?>					
		
<script>
	alert('CPF Inválido!')
	window.history.back()
</script>	
					
<?php } ?>					
					
					
					
					
			
					
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
	
	</script>
	
	
</body>
</html>