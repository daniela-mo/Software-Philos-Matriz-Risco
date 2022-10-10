<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');

$codigo=$_POST['codigo'];

$excluir=mysqli_query($conexao,"delete  from matriz_de_risco_causas WHERE id='$codigo'");


if($excluir){ ?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
