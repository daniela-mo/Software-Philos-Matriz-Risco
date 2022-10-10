<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo_implementacao=$_POST['implementacao'];
$codigo_usuario=$_POST['usuario'];

            mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$selecao=mysqli_query($conexao,"select * from usuarios_empresa WHERE id='$codigo_usuario'");
$registros=mysqli_fetch_array($selecao);
$usuario=$registros['nome'];
$data=date('d-m-Y');
$hora=date('H:i');


$verificar=mysqli_query($conexao,"select * from responsaveis_implementacao WHERE codigo_implementacao='$codigo_implementacao' and codigo_usuario='$codigo_usuario'");
$numero=mysqli_num_rows($verificar);

if($numero==0){

$gravar=mysqli_query($conexao,"insert into responsaveis_implementacao(codigo_usuario,usuario,codigo_implementacao,data,hora)values('$codigo_usuario','$usuario','$codigo_implementacao','$data','$hora') ");

$gravar_notificacao=mysqli_query($conexao,"insert into notificacoes(codigo_usuario,tipo,codigo_tarefa,data,hora)values('$codigo_usuario','modulo_implementacao','$codigo_implementacao','$data','$hora')");
	
	
	
if($gravar){ ?>
	

<?php }else{ ?>
	
	
<?php	
}
?>

<?php }else{?> 


<?php
} ?>
