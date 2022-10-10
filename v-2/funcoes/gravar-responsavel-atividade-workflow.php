<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$atividade=$_POST['atividade'];
$usuario=$_POST['usuario'];

            mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$selecao=mysqli_query($conexao,"select * from responsaveis_atividades_workflow WHERE codigo_usuario='$usuario' and codigo_atividade='$atividade' ");
$numero=mysqli_num_rows($selecao);

if($numero==1){ ?>
	
<div class="alert alert-danger" role="alert">
  Usuário ja foi adicionado!
</div>	
	
	
	
<?php }else{


$gravar=mysqli_query($conexao,"insert into responsaveis_atividades_workflow(codigo_atividade,codigo_usuario)values('$atividade','$usuario') ");


if($gravar){ ?>


<?php }else{ ?>

<?php	
}}
?>
