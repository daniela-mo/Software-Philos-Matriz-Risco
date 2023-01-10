<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo_procedimento=$_POST['codigo'];

?>

<table class="table table-striped mt-2 mb-5">
<tr>
	<th>Referência</th>
    <th>Requisito</th>
   
</tr>				

<?php
mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
$selecao=mysqli_query($conexao,"select * from procedimentos_tabela_requisitos WHERE codigo_procedimento='$codigo_procedimento' ");

while($registros=mysqli_fetch_array($selecao)){

$codigo_requisito=$registros['codigo_requisito'];

?>
		
<?php

$selecao2=mysqli_query($conexao,"select * from requisitos_normativos WHERE id='$codigo_requisito'");
$registros2=mysqli_fetch_array($selecao2);

?>

<tr>
	<td><?php echo $registros2['referencia']; ?> </td>
	<td><?php echo $registros2['descricao'] ?> </td>
</tr>

<?php } ?>

	</table>

