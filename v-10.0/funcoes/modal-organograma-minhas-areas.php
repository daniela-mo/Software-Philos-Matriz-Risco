<?php

session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$codigo=$_POST['codigo'];

$usuario=$_SESSION['usuario'];
$selecao_usuarios=mysqli_query($conexao,"select * from usuarios_empresa WHERE email ='$usuario'");
$registros_usuarios=mysqli_fetch_array($selecao_usuarios);
$id=$registros_usuarios['id'];

$selecao1=mysqli_query($conexao,"select * from responsaveis_areas WHERE id='$id'");
$registros1=mysqli_fetch_array($selecao1);
$codigo_area=$registros1['codigo_area'];

$selecao_area=mysqli_query($conexao,"select * from areas WHERE id='$codigo_area'");
$registros_area=mysqli_fetch_array($selecao_area);


?>

<input type="hidden" name="titulo-setor" id="titulo-setor" value="<?php echo $registros_area['area'] ?>">

<table class="table table-striped">
	<tr>
		<th>Nome</th>
		
		<th>Responsável</th>
		
		
	</tr>
	
	
<?php
	$selecao=mysqli_query($conexao,"select * from usuarios_empresa WHERE setor='$codigo'");
while($registros=mysqli_fetch_array($selecao)){
$responsavel=$registros['responsavel']; 	
if($responsavel=='s'){$responsavel='Sim';}
if($responsavel=='n'){$responsavel='Não';}	
$setor= $registros['setor'];	
	?>
	
	<tr>
		<td><?php echo $registros['nome'] ?></td>
		
		<td><?php echo $responsavel ?></td>
		
	</tr>
<?php } ?>
</table>


<h5 class="mt-5">Subáreas</h5>

<table class="table table-striped">


<tr>
	<th>Nome</th>
	<th>Subárea</th>
	<th>Responsável</th>
</tr>		




	
	<tr>
	<td>
		Sem registros(s)
	</td>
	<td></td>
</tr>	





</table>







