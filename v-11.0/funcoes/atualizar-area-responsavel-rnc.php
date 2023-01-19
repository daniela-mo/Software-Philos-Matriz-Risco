<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$area_reponsavel = $_POST['area_responsavel_rnc'];
$codigo = $_POST['codigo'];

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

$atualizar = mysqli_query($conexao, "update rnc set area_responsavel='$area_reponsavel' WHERE id='$codigo'");
if ($atualizar) { ?>


<?php } else { ?>


<?php }

?>