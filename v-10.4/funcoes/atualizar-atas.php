<?php

session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];
$nome=$_POST['nome'];
$tipo=$_POST['tipo'];
$data=$_POST['data'];
$inicio=$_POST['inicio'];
$termino=$_POST['termino'];




mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$atualizar=mysqli_query($conexao,"update comites_atas set nome='$nome', tipo='$tipo', data='$data', inicio='$inicio', termino='$termino' WHERE id='$codigo'");
if($atualizar){?>
	

<?php }else{?>

	
<?php }

?>
