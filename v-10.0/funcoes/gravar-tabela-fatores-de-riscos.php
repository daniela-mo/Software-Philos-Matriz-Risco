<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');	


$codigo_fator=$_POST['codigo_fator'];
$fator=$_POST['fator'];
$evento=$_POST['evento'];
$area=$_POST['area'];
$processo=$_POST['processo'];
$status=$_POST['status'];

$inserir=mysqli_query($conexao,"insert into associacao_fator_risco(evento,fator,area,processo,status,codigo_fator)values('$evento','$fator','$area','$processo','$status','$codigo_fator')");
