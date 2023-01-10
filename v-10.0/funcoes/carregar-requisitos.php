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
    
    <th></th>
</tr>				

<?php
mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
$selecao=mysqli_query($conexao,"select * from procedimentos_tabela_requisitos WHERE codigo_procedimento='$codigo_procedimento' ");

while($registros=mysqli_fetch_array($selecao)){

$codigo_requisito=$registros['codigo_requisito'];

$selecao3=mysqli_query($conexao,"select * from tabela_requisitos_normativos WHERE id='$codigo_requisito' ");
$registros3=mysqli_fetch_array($selecao3);
$cod_requisito=$registros3['codigo_requisito'];
?>


			
		
		
<?php

$selecao2=mysqli_query($conexao,"select * from requisitos_normativos WHERE id='$cod_requisito'");
$registros2=mysqli_fetch_array($selecao2);

?>

<tr>
 <td><?php echo $registros2['referencia']; ?> </td>

    <td><?php echo $registros3['numero']; ?> -  <?php echo $registros3['requisito'] ?> </td>
    
   
    
    <td> <a class="float-right pointer_red" style="color: red" onClick="ExcluirRequisito(<?php echo $id ?>)">X</a></td>
</tr>

<?php } ?>

	</table>

