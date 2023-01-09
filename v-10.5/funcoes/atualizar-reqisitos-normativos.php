<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
$codigo= $_POST['codigo'];
$a=1;
?>




<?php
	
	    mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');


	$selecao=mysqli_query($conexao,"select * from tabela_requisitos_normativos WHERE codigo_requisito='$codigo'");
	while($registros=mysqli_fetch_array($selecao)){
	$id=$registros['id'];	
	$requisito=$_POST['editar-requisito'.$a];	
		
		
	$atualizar=mysqli_query($conexao,"update tabela_requisitos_normativos set requisito='$requisito' WHERE id='$id'  ")	;
	if($atualizar){	
?>

<script>
	alert("deu certo")

</script>

<?php } else{ ?>

<script>
	alert("Não deu certo")

</script>

<?php } $a=$a+1; } ?>
	
	
