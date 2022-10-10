<?php

session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];
$reuniao=$_POST['reuniao'];
$data_prevista=$_POST['data_prevista'];
$horario_previsto=$_POST['horario_previsto'];
$data_realizada=$_POST['data_realizada'];
$horario_realizado=$_POST['horario_realizado'];
$duracao=$_POST['duracao'];

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');


$atualizar=mysqli_query($conexao,"update comites_cronogramas set tipo_reuniao='$reuniao', data_prevista='$data_prevista'
, horario_previsto='$horario_previsto' , realizado_em='$data_realizada', horario_realizado='$horario_previsto' , duracao='$duracao'


WHERE id='$codigo'");
if($atualizar){?>
	

<?php }else{?>

	
<?php }

?>
