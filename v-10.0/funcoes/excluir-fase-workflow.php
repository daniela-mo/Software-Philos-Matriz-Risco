<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo_fase=$_POST['codigo'];


$selecao_fases=mysqli_query($conexao,"select * from fases_workflow WHERE id='$codigo_fase'");
$registros_fases=mysqli_fetch_array($selecao_fases);
$codigo_planejamento=$registros_fases['codigo_planejamento'];










$selecao_atividades=mysqli_query($conexao,"select * from atividades_planejamento_workflow WHERE codigo_planejamento='$codigo_planejamento'");
while($registros_atividades=mysqli_fetch_array($selecao_atividades)){
$codigo_atividade=$registros_atividades['id'];
	
	
	
	
$selecao_tarefas=mysqli_query($conexao,"select * from tarefas_atividades_workflow WHERE codigo_atividade='$codigo_atividade' ");
while($registros_tarefas=mysqli_fetch_array($selecao_tarefas)){
	$cod_tarefa=$registros_tarefas['id'];
	
	$excluir7=mysqli_query($conexao,"delete from responsaveis_tarefas_workflow WHERE codigo_tarefa='$cod_tarefa'");
	$excluir10=mysqli_query($conexao,"delete from responsaveis_atividades_workflow WHERE codigo_atividade='$codigo_atividade'");
		
		
}	
	
$excluir8=mysqli_query($conexao,"delete from tarefas_atividades_workflow WHERE codigo_atividade='$codigo_atividade'");	
	
	
	
	
	
}

$excluir9=mysqli_query($conexao,"delete from atividades_planejamento_workflow WHERE codigo_fase='$codigo_fase' and codigo_planejamento='$codigo_planejamento'");	

$excluir=mysqli_query($conexao,"delete  from fases_workflow WHERE id='$codigo_fase' and codigo_planejamento='$codigo_planejamento'");





?>
	


