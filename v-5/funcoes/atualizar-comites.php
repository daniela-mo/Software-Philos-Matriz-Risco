<?php

session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];
$comite=$_POST['comite'];
$area=$_POST['area'];
$competencia=$_POST['competencia'];
$descricao=$_POST['descricao'];


mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');

$atualizar=mysqli_query($conexao,"update comites set nome='$comite', descricao='$descricao' WHERE id='$codigo'");
if($atualizar){?>
	

<?php }else{?>

	
<?php }

?>
