<?php

session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo_area'];


            mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$selecao=mysqli_query($conexao,"select * from responsaveis_areas WHERE ");

$atualizar=mysqli_query($conexao,"update areas set area='$area', codigo_area_mae='$area_mae' WHERE id='$codigo'");
if($atualizar){?>
	

<?php }else{?>

	
<?php }

?>
