<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
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
$selecao=mysqli_query($conexao,"select * from tabela_itens_requisitos_temp ");
while($registros=mysqli_fetch_array($selecao)){
$id=$registros['codigo_requisito'];
$codigo_requisito=$registros['requisito'];

$selecao3=mysqli_query($conexao,"select * from requisitos_normativos WHERE id='$id'");
$registros3=mysqli_fetch_array($selecao3);
?>


			
		
		
<?php

$selecao2=mysqli_query($conexao,"select * from tabela_requisitos_normativos WHERE id='$codigo_requisito'");
$registros2=mysqli_fetch_array($selecao2);

?>

<tr>
 <td><?php echo $registros3['referencia'] ?></td>

    <td><?php echo $registros2['numero']; ?> - <?php echo $registros2['requisito']; ?>  </td>
    
   
    
    <td> <a class="float-right pointer"  onClick="ExcluirRequisito(<?php echo $id ?>)"><i class="fa fa-trash"></i></a></td>
</tr>

<?php } ?>

	</table>

