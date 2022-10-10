<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');


mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');



$codigo=$_POST['codigo'];
$data=$_POST['data'];

$dia=substr($data,0,2);
$mes=substr($data,3,2);
$ano=substr($data,6,4);

$data=$ano."-".$mes.'-'.$dia;

$gravar=mysqli_query($conexao,"update identificacao_do_risco set data_id_risco = '$data' WHERE id='$codigo'");


?>
