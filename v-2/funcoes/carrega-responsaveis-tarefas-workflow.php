<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
$codigo=$_POST['codigo'];
?>
		



<table class="table">

<tr>
	<th>Nome</th>
	<th>Email</th>
	
	<th></th>
</tr>

<?php

            mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$selecao=mysqli_query($conexao,"select * from responsaveis_tarefas_workflow WHERE codigo_tarefa='$codigo'");
while($registros=mysqli_fetch_array($selecao)){
	
$codigo_usuario=$registros['codigo_usuario'];
	
	
$selecao1=mysqli_query($conexao,"select * from usuarios_empresa WHERE id='$codigo_usuario'");	
$registros1=mysqli_fetch_array($selecao1);	
?>

<tr>

	
	<td>
		
		<?php echo $registros1['nome']; ?>
	</td>
	
		<td>
		<?php echo $registros1['email']; ?>
	</td>
	
	
					<td class="pointer"><a class="pointer" onClick="ExcluirResponsavelTarefa(<?php echo $codigo_usuario ?>,<?php echo $registros['codigo_tarefa'] ?>)"><i class="fa fa-trash"></i></a></td>	
</tr>

<?php } ?>
	
	</table>