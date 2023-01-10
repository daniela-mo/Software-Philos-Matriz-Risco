<?php
$id= $_GET['id'];
	include('menu.php');
	mysqli_query($conexao, "SET NAMES 'utf8'");
	mysqli_query($conexao, 'SET character_set_connection=utf8');
	mysqli_query($conexao, 'SET character_set_client=utf8');
	mysqli_query($conexao, 'SET character_set_results=utf8');
	
	$sql="select * from tarefas_atividades_workflow where id='$id'";
	$consulta = mysqli_query($conexao, $sql);
	$resultado = mysqli_fetch_array($consulta);
	
	print $resultado['tarefa'].$sql;
?>
