<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$fator=$_POST['fator'];
$area=$_POST['area'];
$processo=$_POST['processo'];
$momento=$_POST['momento'];
$pontuacao=$_POST['pontuacao'];
$importancia=$_POST['importancia'];
$analise=$_POST['analise'];


mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');


$gravar=mysqli_query($conexao,"insert into tabela_fatores_externos_temp(fator,area,processo,momento,importancia,pontuacao,analise)values('$fator','$area','$processo','$momento','$importancia','$pontuacao','$analise') ");


if($gravar){ ?>


<?php }else{ ?>

<?php	
}
?>
