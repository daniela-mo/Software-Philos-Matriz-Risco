<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');

$processo= $_POST['cad-processo'];
$area=$_POST['cad-area'];
$responsavel=$_POST['cad-responsavel'];
$impacto=$_POST['cad-impacto'];
$requisito=	$_POST['cad-requisito'];
$nivel=	$_POST['cad-criticidade'];
$resposta=	$_POST['cad-resposta'];
$status='Em Análise';

$inserir=mysqli_query($conexao,"insert into escopos(
processo,
area,
responsavel,
nivel_criticidade,
status,
impacto,
requisito_recuperacao,
resposta)values(
'$processo',
'$area',
'$responsavel',
'$nivel',
'$status',
'$impacto',
'$requisito',
'$resposta')");

if($inserir){ ?>
	<script>
		location.href="escopos.php"
	</script>	
	
<?php }else{ ?>
	<script>
		alert("Cadastro não pode ser realizado!")
		location.href="cadastro-bia.php"
	</script>
	
<?php } ?>
