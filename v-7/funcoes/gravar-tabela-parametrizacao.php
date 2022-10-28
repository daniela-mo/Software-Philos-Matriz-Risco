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




for($i=0;$i<=$contador-1;$i++){


	
	/*Verificar todos os Tipos de Impactos para tentar encontrar registros ja existentes*/	

	$selecao=mysqli_query($conexao,"select * from tabela_itens_parametrizacao WHERE  item='$array[$i]' and codigo_parametrizacao='$codigo' ");	
	$registros=mysqli_fetch_array($selecao);
	$numero=mysqli_num_rows($selecao);
	if($numero>='1'){
	
	$codigo_item=$registros['id'];
		
	$update=mysqli_query($conexao,"update from tabela_itens_parametrizacao set checkbox='s' WHERE id='$codigo_item' and codigo_parametrizacao='$codigo' ");
	
	}else{	

	$gravar=mysqli_query($conexao,"insert into tabela_itens_parametrizacao(codigo_parametrizacao,item,checkbox)values('$codigo','$array[$i]','s') ");

	}
	
	
	
	
}



$selecao=mysqli_query($conexao,"select * from tipo_impacto ");	
while($registros=mysqli_fetch_array($selecao)){
$item=$registros['id'];	
	
$selecao2=mysqli_query($conexao,"select * from tabela_itens_parametrizacao WHERE item='$item' and codigo_parametrizacao='$codigo'");	
$registros2=mysqli_fetch_array($selecao2);
$numero2=mysqli_num_rows($selecao2);
if($numero2==0){	
	
$inserir=mysqli_query($conexao,"insert into tabela_itens_parametrizacao(codigo_parametrizacao,item,checkbox)value('$codigo','$item','n')");	
}

}


?>
