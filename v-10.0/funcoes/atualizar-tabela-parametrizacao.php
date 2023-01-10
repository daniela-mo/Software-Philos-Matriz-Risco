<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');


$array=explode(",", $_POST['parametrizacao']);


$contador= count($array);


$update1=mysqli_query($conexao,"update tabela_itens_parametrizacao set checkbox='n' WHERE codigo_parametrizacao='$codigo' ");

for($i=0;$i<=$contador-1;$i++){


$update=mysqli_query($conexao,"update tabela_itens_parametrizacao 
set 
 checkbox='s'
WHERE item='$array[$i]'
");


}



if($update){ ?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
