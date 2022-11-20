<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;
	mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');

$codigo=$_POST['obter-codigo-permissoes'];
$codigo_grupo=$_POST['codigo-grupo'];

/*Pegar menu Principal*/
$selecao_grupo=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='$codigo' and codigo_grupo='$codigo_grupo'");
$registros_grupo=mysqli_fetch_array($selecao_grupo);
$numero=mysqli_num_rows($selecao_grupo);

@$raiz_ler=$_POST['raiz_ler'];
if(isset($raiz_ler)){$raiz_ler='1';}else{$raiz_ler='0';}

@$raiz_editar=$_POST['raiz_editar'];
if(isset($raiz_editar)){$raiz_editar='1';}else{$raiz_editar='0';}

@$raiz_excluir=$_POST['raiz_excluir'];
if(isset($raiz_excluir)){$raiz_excluir='1';}else{$raiz_excluir='0';}

if($numero==0){
	$inserir=mysqli_query($conexao,"insert into grupos_permissoes(ler,editar,excluir,codigo_grupo,codigo_menu)values('$raiz_ler','$raiz_editar','$raiz_excluir','$codigo_grupo','$codigo')");
}else{
	$atualizar=mysqli_query($conexao,"update grupos_permissoes set ler='$raiz_ler', editar='$raiz_editar', excluir='$raiz_excluir' WHERE codigo_grupo='$codigo_grupo' and codigo_menu='$codigo'");
}


/*Pegar Submenus */
$selecao_submenus=mysqli_query($conexao,"select * from estrutura_de_menus WHERE codigo_menu_mae='$codigo' ");
$numero_submenus=mysqli_num_rows($selecao_submenus);
while($registros_submenus=mysqli_fetch_array($selecao_submenus)){
$id_submenu=$registros_submenus['id'];
?>

<?php 
	
/*Verificar se Submenu ja existe*/	
$verifica_submenu=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_grupo='$codigo_grupo' and codigo_menu='$id_submenu'");
$numero_submenu=mysqli_num_rows($verifica_submenu);	
	
@$ler=$_POST['ler_'.$registros_submenus['id']];
if(isset($ler)){$ler='1';}else{$ler=0;}	
	
@$cadastrar=$_POST['cadastrar_'.$registros_submenus['id']];
if(isset($cadastrar)){$cadastrar='1';}else{$cadastrar=0;}	
	
@$editar=$_POST['editar_'.$registros_submenus['id']];
if(isset($editar)){$editar='1';}else{$editar=0;}
	
@$excluir=$_POST['excluir_'.$registros_submenus['id']];
if(isset($excluir)){$excluir='1';}else{$excluir=0;}	
	
	
if($numero_submenu==0){	
	
$inserir_submenu=mysqli_query($conexao,"insert into grupos_permissoes(ler,cadastrar,editar,excluir,codigo_menu,codigo_grupo)values('$ler','$cadastrar','$editar','$excluir','$id_submenu','$codigo_grupo')");
	
}else{

$atualizar_submenu=mysqli_query($conexao,"update grupos_permissoes set ler='$ler', cadastrar='$cadastrar', editar='$editar', excluir='$excluir' WHERE codigo_grupo='$codigo_grupo' and codigo_menu='$id_submenu' ");
		
}
	
?>


<?php } ?>

<script>
location.href="grupo-permissao.php?cod=<?php echo $codigo_grupo ?>"
</script>


