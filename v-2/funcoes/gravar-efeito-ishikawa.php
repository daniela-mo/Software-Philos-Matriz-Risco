<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');

$codigo=$_POST['codigo'];
$efeito=$_POST['efeito'];
$tipo=$_POST['tipo'];

$selecao=mysqli_query($conexao,"select * from diagrama_ishikawa_efeitos WHERE tipo='$tipo' and codigo_matriz='$codigo'");
$numero=mysqli_num_rows($selecao);

if($numero>=1){

$atualizar=mysqli_query($conexao,"update diagrama_ishikawa_efeitos set efeito='$efeito' WHERE codigo_matriz='$codigo' and tipo='$tipo' ");	
	
	
	
	
}else{

$gravar=mysqli_query($conexao,"insert into diagrama_ishikawa_efeitos(codigo_matriz,efeito,tipo)values('$codigo','$efeito','$tipo') ");


if($gravar){ ?>
	

<?php }else{ ?>
	
	
<?php	
}}
?>
