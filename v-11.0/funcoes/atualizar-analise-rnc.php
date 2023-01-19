<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$codigo = $_POST['codigo'];
$analise = $_POST['analise'];
$data = $_POST['data'];
$area_analise = $_POST['area_analise'];
$responsavel_analise = $_POST['responsavel_analise'];
$parecer = $_POST['parecer'];
$objetivo = $_POST['objetivo'];
$necessidade = $_POST['necessidade'];


mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

$atualizar = mysqli_query($conexao, "update analise_rnc set descricao='$analise',data='$data',responsavel_analise='$responsavel_analise',area='$area_analise',parecer='$parecer',objetivo='$objetivo',necessidade='$necessidade' WHERE id='$codigo'
");
