<?php

session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$codigo_matriz = $_POST['codigo'];
$planta = $_POST['razao_social'];
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

$selecao = mysqli_query($conexao, "select * from empresas WHERE id='$planta'");
$registros = mysqli_fetch_array($selecao);
$planta_nova = $registros['razao_social'];


$atualizar = mysqli_query($conexao, "update identificacao_do_risco set empresa='$planta_nova' WHERE id='$codigo'");



// print $atualizar;
if ($atualizar) { ?>
	

<?php } else { ?>

	
<?php }

?>
    