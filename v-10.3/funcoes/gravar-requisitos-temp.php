<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');


$itens=$_POST['itens'];
$codigo=$_POST['codigo'];

$checkboxes =explode(",", $itens);


$count = count($checkboxes);
for($i=0;$i<$count;$i++){



            mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$gravar=mysqli_query($conexao,"insert into tabela_itens_requisitos_temp(codigo_requisito,requisito)values('$codigo','$checkboxes[$i]') ");

}


if($gravar){ ?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
