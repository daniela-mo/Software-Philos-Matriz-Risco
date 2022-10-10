<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];
$tipo_reuniao=$_POST['tipo'];
$data_prevista=$_POST['data_prevista'];
$horario_previsto=$_POST['horario_previsto'];
$realizado_em=$_POST['realizado_em'];
$horario_realizado=$_POST['horario_realizado'];
$duracao=$_POST['duracao'];


mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');



$gravar=mysqli_query($conexao,"insert into comites_cronogramas(codigo_comite,tipo_reuniao,data_prevista,horario_previsto,realizado_em,horario_realizado,duracao)values(
'$codigo',
'$tipo_reuniao',
'$data_prevista',
'$horario_previsto',
'$realizado_em',
'$horario_realizado',
'$duracao'

) ");


if($gravar){ 


?>


<?php }else{ ?>
	
	
<?php	
}
?>
