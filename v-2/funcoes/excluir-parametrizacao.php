<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];

$excluir=mysqli_query($conexao,"delete  from parametrizacao WHERE id='$codigo'");

$excluir2=mysqli_query($conexao,"delete from tabela_itens_parametrizacao WHERE codigo_parametrizacao='$codigo'");

if($excluir){ ?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
