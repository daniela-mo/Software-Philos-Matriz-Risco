<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
$codigo=$_POST['codigo'];
?>
		



<table class="table">

<tr>
	<th>Usuário</th>
	<th>Email</th>
	<th>Ação</th>
</tr>


<?php

            mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$selecao=mysqli_query($conexao,"select * from responsaveis_atividades_workflow WHERE codigo_atividade='$codigo'");
while($registros=mysqli_fetch_array($selecao)){
$codigo_usuario=$registros['codigo_usuario'];
?>

<tr>
	<td>
		<?php  
			$selecao_usuario=mysqli_query($conexao,"select * from usuarios_empresa WHERE id='$codigo_usuario'");
			$registros=mysqli_fetch_array($selecao_usuario);
			echo $registros['nome'];
		?>
</td>
	
	<td>
		<?php echo $registros['email']; ?> 
	</td>
	
					<td class="pointer"><a class="pointer" onClick="ExcluirResponsavel(<?php echo $codigo_usuario ?>)"><span class="fa fa-trash pointer"></span></a></td>
	
</tr>

<?php } ?>
	
	</table>