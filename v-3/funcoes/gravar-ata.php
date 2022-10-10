<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');


mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');



$codigo=$_POST['codigo'];
$nome=$_POST['nome'];
$tipo=$_POST['tipo'];
$data=$_POST['data'];
$inicio=$_POST['inicio'];
$termino=$_POST['termino'];

$inserir=mysqli_query($conexao,"insert into comites_atas(nome,tipo,data,inicio,termino,codigo_comite)values('$nome','$tipo','$data','$inicio','$termino','$codigo')");

if($gravar){ 


?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
