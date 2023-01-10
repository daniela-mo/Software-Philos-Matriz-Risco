<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');


$selecao=mysqli_query($conexao,"select * from upload_temp_workflow");
while($registros=mysqli_fetch_array($selecao)){
$arquivo=$registros['arquivo'];
	
!unlink('../'.$obterdominio.'/uploads-workflow/'.$arquivo);	

	
	
}


$excluir=mysqli_query($conexao,"delete  from upload_temp_workflow  ");


if($excluir){ 






?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
