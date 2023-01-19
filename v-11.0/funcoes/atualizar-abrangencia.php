<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$codigo = $_POST['codigo'];
$abrangencia  = $_POST['abrangencia'];
$area = $_POST['area_abrangencia'];
$responsavel = $_POST['responsavel_abrangencia'];




mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

$atualizar = mysqli_query($conexao, "update detalhe_abrangencia set
descricao='$abrangencia',responsavel='$responsavel',area='$area' WHERE id='$codigo'
");
