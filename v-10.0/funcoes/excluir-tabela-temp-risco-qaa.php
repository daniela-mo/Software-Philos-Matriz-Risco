<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');



$excluir=mysqli_query($conexao,"delete  from tabela_itens_qaa_temp WHERE id!='x' ");


if($excluir){ ?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
