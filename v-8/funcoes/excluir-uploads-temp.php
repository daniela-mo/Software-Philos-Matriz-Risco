<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');


$selecao=mysqli_query($conexao,"select * from upload_temp_cadastro");
while($registros=mysqli_fetch_array($selecao)){
$arquivo=$registros['arquivo'];
	
@unlink('../'.$obterdominio.'/uploads-cadastro/'.$arquivo);	
	
	
}


$excluir=mysqli_query($conexao,"delete  from upload_temp_cadastro  ");


if($excluir){ 






?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
