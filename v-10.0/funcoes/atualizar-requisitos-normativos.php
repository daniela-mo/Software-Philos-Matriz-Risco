<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
$codigo= $_POST['codigo'];
$a=1;

  mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');


$numero_requisito=explode(",", $_POST['numero_requisito']);
$array=explode(",", $_POST['editar_requisito']);
$codigo_requisito=explode(",", $_POST['codigo_requisito']);

$contador= count($array);


for($i=0;$i<=$contador-1;$i++){ ?>

<?php 
$atualizar=mysqli_query($conexao,"update tabela_requisitos_normativos set requisito='$array[$i]', numero='$numero_requisito[$i]' WHERE id='$codigo_requisito[$i]'  ");
?>

<?php } ?>
	

