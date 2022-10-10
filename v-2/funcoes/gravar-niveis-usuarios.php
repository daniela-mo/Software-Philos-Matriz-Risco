<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$setor=$_POST['setor'];
$grupo=$_POST['grupo'];

$consultar=$_POST['consultar'];
$editar=$_POST['editar'];
$excluir=$_POST['excluir'];
$admin=$_POST['admin'];

            mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$selecao=mysqli_query($conexao,"select * from grupos_permissoes WHERE grupo='$grupo'");
$numero=mysqli_num_rows($selecao);

if($numero==0){
	
	$inserir=mysqli_query($conexao,"insert into grupos_permissoes(grupo,setor,consultar,editar,excluir,admin)values('$grupo','$setor','$consultar','$editar','$excluir','$admin')");
	
	if($inserir){ ?>
		
gravado

	<?php }else{ ?>

não gravado
		
	<?php } ?>
	


<?php }else{ 


$atualizar=mysqli_query($conexao,"update grupos_permissoes 
set consultar='$consultar' 
,editar='$editar' 
,excluir='$excluir' 
,admin='$admin'

WHERE setor='$setor' and grupo='$grupo' ");


if($atualizar){ ?>
atualizado	

<?php }else{ ?>
	
não atualizado
	
<?php	
} }
?>
