<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$usuario=$_POST['usuario'];
$questao=$_POST['codigo_questao'];
$resposta=$_POST['resposta'];
$titulo=$_POST['titulo'];


	mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');


$atualizar=mysqli_query($conexao,"update questoes_qaa set resposta='$resposta' WHERE id='$questao' ");


?>

<div class="alert alert-success" role="alert">
  Questão respondida com sucesso!
</div>