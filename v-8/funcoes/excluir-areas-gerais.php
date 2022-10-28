<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];

$excluir=mysqli_query($conexao,"delete  from areas WHERE id!='a' ");


if($excluir){ ?>


<?php }else{ ?>

	
<?php	
}
?>
