<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$id = $_POST['codigo'];

$excluir = mysqli_query($conexao, "delete from detalhe_abrangencia WHERE codigo='$id'");


if ($excluir) { ?>
	

<?php } else { ?>
	
	
<?php
}
?>
