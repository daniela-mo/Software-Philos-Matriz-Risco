<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];

mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');

$verificar=mysqli_query($conexao,"select * from areas WHERE id='$codigo'");
$registros=mysqli_fetch_array($verificar);
$codigo_area=$registros['codigo_area_mae'];
$codigo_empresa=$registros['codigo_empresa'];

if($codigo_area==0){
	
	
	
$selecao_areas=mysqli_query($conexao,"select * from areas WHERE id='$codigo'");
while($registros_areas=mysqli_fetch_array($selecao_areas)){

$codigo_area=$registros_areas['id'];
	
	
$atualizar_area_organograma=mysqli_query($conexao,"update identificacao_do_risco set area='Em Transição', codigo_area='0' WHERE codigo_area='$codigo_area'");	
	
	
}

	$excluir=mysqli_query($conexao,"delete  from areas WHERE codigo_empresa='$codigo_empresa' ");
	
}else{

		$selecao_areas=mysqli_query($conexao,"select * from areas WHERE id='$codigo'");
		$registros_areas=mysqli_fetch_array($selecao_areas);

		$codigo_area=$registros_areas['id'];


		$atualizar_area_organograma=mysqli_query($conexao,"update identificacao_do_risco set area='Em Transição', codigo_area='0' WHERE codigo_area='$codigo_area'");	
	
	

	

	$excluir=mysqli_query($conexao,"delete  from areas WHERE id='$codigo'");
}

if($excluir){ 

$excluir2=mysqli_query($conexao,"delete  from responsaveis_areas WHERE codigo_area='$codigo' and codigo_empresa='$codigo_empresa'");

?>


<?php }else{ ?>

	
<?php	
}
?>
