<?php

session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$risco=$_POST['risco'];
$codigo=$_POST['codigo'];

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');

$atualizar=mysqli_query($conexao,"update identificacao_do_risco set evento_risco='$risco' WHERE id='$codigo'");
if($atualizar){?>
	

<?php }else{?>

	
<?php }

?>
