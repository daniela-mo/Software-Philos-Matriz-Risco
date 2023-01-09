<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$codigo = $_POST['codigo'];

$excluir = mysqli_query($conexao, "delete from workflow WHERE id='$codigo'");


if ($excluir) { ?>


<?php } else { ?>

	
<?php
}
?>
