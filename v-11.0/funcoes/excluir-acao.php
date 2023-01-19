<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$id = $_POST['codigo'];

$excluir = mysqli_query($conexao, "delete from acao_imediata_nao_conformidade WHERE id='$id'");


if ($excluir) { ?>
	

<?php } else { ?>
	
	
<?php
}
?>
