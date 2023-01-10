<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');

$codigo= $_POST['cad-codigo'];
$processo= $_POST['cad-processo'];
$area=$_POST['cad-area'];
$responsavel=$_POST['cad-responsavel'];
$impacto=$_POST['cad-impacto'];
$requisito=	$_POST['cad-requisito'];
$nivel=	$_POST['cad-criticidade'];
$resposta=	$_POST['cad-resposta'];
$status='Em Análise';

$atualizar=mysqli_query($conexao,"update escopos set 
processo='$processo', 
area ='$area',
responsavel='$responsavel',
nivel_criticidade='$nivel',
status='$status',
impacto='$impacto',
requisito_recuperacao='$requisito',
resposta='$resposta'

WHERE id='$codigo'");



if($atualizar){ ?>
	<script>
		location.href="escopos.php"
	</script>	
	
<?php }else{ ?>
	<script>
		alert("Cadastro não pode ser Editado!")
		location.href="escopos.php"
	</script>
	
<?php } ?>
