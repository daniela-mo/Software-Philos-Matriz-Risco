<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$nome = $_POST['nome'];
$objetivo = $_POST['objetivo'];
$cadastro = $_POST['cadastro'];
$metodo = $_POST['metodo'];
$responsavel = $_POST['responsavel'];
$data = $_POST['data'];
$resultado = $_POST['resultado'];
$parecer = $_POST['parecer'];
$natureza = $_POST['natureza'];
$frequencia = $_POST['frequencia'];
$controle = $_POST['controle'];

mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');

$gravar=mysqli_query($conexao,"insert into controles_existentes_temp(nome_controle,objetivo_controle,cadastro_tipo,metodo,responsavel,data,resultado,natureza_controle,frequencia_controle,tipo_controle,parecer_controle)values('$nome','$objetivo','$cadastro','$metodo','$responsavel','$data','$resultado','$natureza','$frequencia','$controle','$parecer') ");


if($gravar){ ?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
