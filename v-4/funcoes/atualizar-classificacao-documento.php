<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
$codigo= $_POST['codigo'];
$a=1;

  mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');

$sigla=$_POST['sigla'];
$descricao=$_POST['descricao'];
$tipo_documento=$_POST['tipo'];

$atualizar=mysqli_query($conexao,"update classificacao_documento set sigla='$sigla', descricao='$descricao',
tipo_documento='$tipo_documento'
WHERE id='$codigo'  ");






?>


	

