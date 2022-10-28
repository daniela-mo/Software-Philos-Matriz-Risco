<?php

session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];
$item= $_POST['item'];
$descricao= $_POST['descricao'];
$baixa= $_POST['baixa'];
$media= $_POST['media'];
$alta= $_POST['alta'];
$malta= $_POST['malta'];

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');



$atualizar=mysqli_query($conexao,"update tipo_impacto set item='$item', 
descricao='$descricao', 
baixa = '$baixa',
media = '$media',
alta = '$alta',
malta = '$malta'

WHERE id='$codigo'");
if($atualizar){?>
	

<?php }else{?>

	
<?php }

?>
