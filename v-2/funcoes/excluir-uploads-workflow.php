<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
$codigo=$_POST['codigo'];

$selecao=mysqli_query($conexao,"select * from upload_workflow WHERE id='$codigo'");
while($registros=mysqli_fetch_array($selecao)){
$arquivo=$registros['arquivo'];
	
!unlink('../'.$obterdominio.'/uploads-workflow/'.$arquivo);	

	
	
}


$excluir=mysqli_query($conexao,"delete  from upload_workflow WHERE id='$codigo'  ");


if($excluir){ 






?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
