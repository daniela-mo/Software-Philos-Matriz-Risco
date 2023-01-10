<?php

session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$codigo = $_POST['codigo'];
$criterio_qaa = $_POST['titulo'];
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

$selecao = mysqli_query($conexao, "select * from questoes_qaa WHERE id='$criterio_qaa'");
$registros = mysqli_fetch_array($selecao);
$item_qaa = $registros['titulo'];


$atualizar = mysqli_query($conexao, "update identificacao_do_risco set criterio_correspondente='$item_qaa' WHERE id='$codigo'");



print $atualizar;
if ($atualizar) { ?>
	

<?php } else { ?>

	
<?php }

?>
    