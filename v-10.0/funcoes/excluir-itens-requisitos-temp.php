<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];

$excluir=mysqli_query($conexao,"delete  from tabela_itens_requisitos_temp WHERE codigo_requisito='$codigo'");


if($excluir){ ?>


<?php }else{ ?>

	
<?php	
}
?>
