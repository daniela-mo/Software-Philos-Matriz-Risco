<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$label=$_POST['label'];
$codigo=$_POST['codigo'];
$tipo=$_POST['tipo'];
$tamanho=$_POST['tamanho'];



mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');

$gravar=mysqli_query($conexao,"insert into campos_tarefas(tipo,tamanho,codigo_tarefa,label)values('$tipo','$tamanho','$codigo','$label') ");


if($gravar){ ?>


<?php }else{ ?>

	
<?php	
}
?>
