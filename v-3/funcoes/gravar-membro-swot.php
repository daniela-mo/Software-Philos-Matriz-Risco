<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$usuario=$_POST['codigo_usuario'];
$selecao=mysqli_query($conexao,"select * from usuarios_empresa WHERE id='$usuario'");
$registros=mysqli_fetch_array($selecao);
$nome=$registros['nome'];
$email=$registros['email'];


mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$gravar=mysqli_query($conexao,"insert into tabela_contexto_membros_temp(cod_usuario,nome_usuario,email_usuario)values('$usuario','$nome','$email') ");


if($gravar){ ?>


<?php }else{ ?>

<?php	
}
?>
