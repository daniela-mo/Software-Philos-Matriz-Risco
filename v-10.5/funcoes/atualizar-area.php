<?php

session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];
$area=$_POST['codigo_area'];



$area_mae=$_POST['areamae'];


            mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$atualizar=mysqli_query($conexao,"update areas set area='$area', codigo_area_mae='$area_mae' WHERE id='$codigo'");
if($atualizar){?>
	

<?php }else{?>

	
<?php }

?>
