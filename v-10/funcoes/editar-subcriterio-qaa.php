<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
$codigo= $_POST['codigo'];

	mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');

$codigo=$_POST['codigo'];
$valor = $_POST['valor'];	

$atualizar=mysqli_query($conexao,"update questoes_qaa set titulo='$valor' WHERE id='$codigo'");


?>


