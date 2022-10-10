<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];

$excluir=mysqli_query($conexao,"delete  from rnc WHERE id='$codigo'");


if($excluir){ 

$excluir2=mysqli_query($conexao,"delete from tabela_plano_de_acao WHERE codigo_rnc='$codigo'")			 

?>


<?php }else{ ?>

	
<?php	
}
?>
