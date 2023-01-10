<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');


$codigo=$_REQUEST['codigo'];

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');

$selecao=mysqli_query($conexao,"select * from usuarios_empresa WHERE id='$codigo' ");
$registros=mysqli_fetch_array($selecao);

echo $setor= $registros['setor'];




?>

