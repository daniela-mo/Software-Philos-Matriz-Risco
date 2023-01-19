
<?php

session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$data_identificacao = $_POST['data_identificacao'];
$codigo = $_POST['codigo'];

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

$atualizar = mysqli_query($conexao, "update rnc set data='$data_identificacao' WHERE id='$codigo'");
if ($atualizar) { ?>


<?php } else { ?>


<?php }

?>