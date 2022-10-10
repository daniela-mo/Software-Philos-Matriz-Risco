<?php

session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');



$codigo= $_POST['codigo'];
$antigo= $_POST['antigo'];
$novo	= $_POST['novo'];

rename('../uploads/'+$arquivo_antigo, '../uploads/'+$arquivo_novo);


$atualizar=mysqli_query($conexao,"update upload_qaa set arquivo='$novo' WHERE codigo_qaa='$codigo'");


?>