<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];

$excluir=mysqli_query($conexao,"delete  from workflow WHERE id='$codigo'");

$excluir2=mysqli_query($conexao,"delete  from responsaveis_workflow WHERE codigo_workflow='$codigo'");

$excluir3=mysqli_query($conexao,"delete  from fases_workflow WHERE codigo_planejamento='$codigo'");

$excluir4=mysqli_query($conexao,"delete  from fases WHERE codigo_planejamento='$codigo'");

$excluir5=mysqli_query($conexao,"delete  from tarefas_planejamento WHERE codigo_planejamento='$codigo'");

$excluir5=mysqli_query($conexao,"delete  from tarefas_planejamento_workflow1 WHERE codigo_planejamento='$codigo'");

$excluir6=mysqli_query($conexao,"delete  from responsaveis_workflow WHERE codigo_workflow='$codigo'");


$selecao_atividades=mysqli_query($conexao,"select * from atividades_planejamento_workflow WHERE codigo_planejamento='$codigo'");
while($registros_atividades=mysqli_fetch_array($selecao_atividades)){
$codigo_atividade=$registros_atividades['id'];
	
$selecao_tarefas=mysqli_query($conexao,"select * from tarefas_atividades_workflow WHERE codigo_atividade='$codigo_atividade' ");
while($registros_tarefas=mysqli_fetch_array($selecao_tarefas)){
	$cod_tarefa=$registros_tarefas['id'];
	
	$excluir7=mysqli_query($conexao,"delete from responsaveis_tarefas_workflow WHERE codigo_tarefa='$cod_tarefa'");
	$excluir10=mysqli_query($conexao,"delete from responsaveis_atividades_workflow WHERE codigo_atividade='$codigo_atividade'");
		
		
}	
	
$excluir8=mysqli_query($conexao,"delete from tarefas_atividades_workflow WHERE codigo_atividade='$codigo_atividade'");	
	
$excluir9=mysqli_query($conexao,"delete from atividades_planejamento_workflow WHERE codigo_planejamento='$codigo'");		
	
	
	
	
}


	
	

if($excluir){ ?>


<?php }else{ ?>

	
<?php	
}
?>
