<?php

session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/conexao.php');

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');

$nivel1=$_POST['nivel_1'];
$descricao1=$_POST['descricao_1'];
$exemplo1=$_POST['exemplos_1'];

if($nivel1!=''){
	$atualizar=mysqli_query($conexao,"update tabela_probabilidade set nivel='$nivel1', descricao='$descricao1', exemplos='$exemplo1' WHERE id='1' ");	
}

$nivel2=$_POST['nivel_2'];
$descricao2=$_POST['descricao_2'];
$exemplo2=$_POST['exemplos_2'];

if($nivel2!=''){
	$atualizar=mysqli_query($conexao,"update tabela_probabilidade set nivel='$nivel2', descricao='$descricao2', exemplos='$exemplo2' WHERE id='2' ");	
}

$nivel3=$_POST['nivel_3'];
$descricao3=$_POST['descricao_3'];
$exemplo3=$_POST['exemplos_3'];

if($nivel3!=''){
	$atualizar=mysqli_query($conexao,"update tabela_probabilidade set nivel='$nivel3', descricao='$descricao3', exemplos='$exemplo3' WHERE id='3' ");	
}

$nivel4=$_POST['nivel_4'];
$descricao4=$_POST['descricao_4'];
$exemplo4=$_POST['exemplos_4'];

if($nivel4!=''){
	$atualizar=mysqli_query($conexao,"update tabela_probabilidade set nivel='$nivel4', descricao='$descricao4', exemplos='$exemplo4' WHERE id='4' ");	
}

@$nivel5=$_POST['nivel_5'];
@$descricao5=$_POST['descricao_5'];
@$exemplo5=$_POST['exemplos_5'];

if($nivel5!=''){
	$atualizar=mysqli_query($conexao,"update tabela_probabilidade set nivel='$nivel5', descricao='$descricao5', exemplos='$exemplo5' WHERE id='5' ");	
}


$nivel_impacto_1=$_POST['nivel_impacto_1'];
$descricao_impacto_1=$_POST['descricao_impacto_1'];
$exemplo_impacto_1=$_POST['exemplos_impacto_1'];

if($nivel_impacto_1!=''){
	$atualizar=mysqli_query($conexao,"update tabela_impacto set nivel='$nivel_impacto_1', descricao='$descricao_impacto_1', exemplos='$exemplo_impacto_1' WHERE id='1' ");	
}

$nivel_impacto_2=$_POST['nivel_impacto_2'];
$descricao_impacto_2=$_POST['descricao_impacto_2'];
$exemplo_impacto_2=$_POST['exemplos_impacto_2'];

if($nivel_impacto_2!=''){
	$atualizar=mysqli_query($conexao,"update tabela_impacto set nivel='$nivel_impacto_2', descricao='$descricao_impacto_2', exemplos='$exemplo_impacto_2' WHERE id='2' ");	
}

$nivel_impacto_3=$_POST['nivel_impacto_3'];
$descricao_impacto_3=$_POST['descricao_impacto_3'];
$exemplo_impacto_3=$_POST['exemplos_impacto_3'];

if($nivel_impacto_3!=''){
	$atualizar=mysqli_query($conexao,"update tabela_impacto set nivel='$nivel_impacto_3', descricao='$descricao_impacto_3', exemplos='$exemplo_impacto_3' WHERE id='3' ");	
}

$nivel_impacto_4=$_POST['nivel_impacto_4'];
$descricao_impacto_4=$_POST['descricao_impacto_4'];
$exemplo_impacto_4=$_POST['exemplos_impacto_4'];

if($nivel_impacto_4!=''){
	$atualizar=mysqli_query($conexao,"update tabela_impacto set nivel='$nivel_impacto_4', descricao='$descricao_impacto_4', exemplos='$exemplo_impacto_4' WHERE id='4' ");	
}

$nivel_impacto_5=$_POST['nivel_impacto_5'];
$descricao_impacto_5=$_POST['descricao_impacto_5'];
$exemplo_impacto_5=$_POST['exemplos_impacto_5'];

if($nivel_impacto_5!=''){
	$atualizar=mysqli_query($conexao,"update tabela_impacto set nivel='$nivel_impacto_5', descricao='$descricao_impacto_5', exemplos='$exemplo_impacto_5' WHERE id='5' ");	
}

?>

<script>
location.href="parametrizacao.php?var=matriz"
</script>
