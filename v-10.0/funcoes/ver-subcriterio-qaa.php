<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
$codigo= $_POST['codigo'];

mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');

$selecao_bloco=mysqli_query($conexao,"select * from questoes_qaa WHERE id='$codigo' ");
$registros_bloco=mysqli_fetch_array($selecao_bloco);
echo $registros_bloco['titulo'];

?>



