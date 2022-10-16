<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];

$excluir=mysqli_query($conexao,"delete  from blocos_qaa WHERE id='$codigo'");

$excluir_questoes=mysqli_query($conexao,"delete from questoes_qaa WHERE codigo_bloco='$codigo'");

$excluir_modalidades=mysqli_query($conexao,"delete from blocos_modalidades WHERE codigo_bloco='$codigo'");


if($excluir){ ?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
