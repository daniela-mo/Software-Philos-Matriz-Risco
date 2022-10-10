<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];
$variavel=$_POST['usuario'];

            mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$selecao=mysqli_query($conexao,"select * from responsaveis_tarefas_workflow WHERE codigo_usuario='$variavel' and codigo_tarefa='$codigo' ");
$numero=mysqli_num_rows($selecao);

if($numero==1){ ?>
	
<div class="alert alert-danger" role="alert">
  Usuário ja foi adicionado!
</div>	
	
	
	
<?php }else{


$gravar=mysqli_query($conexao,"insert into responsaveis_tarefas_workflow(codigo_tarefa,codigo_usuario)values('$codigo','$variavel') ");


if($gravar){ ?>


<?php }else{ ?>

<?php	
}}
?>
