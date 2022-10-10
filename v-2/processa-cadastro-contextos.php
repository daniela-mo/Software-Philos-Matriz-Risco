<?php
		session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;

$analise=$_POST['cad-nome-analise'];
$objetivo=$_POST['cad-objetivo'];
$data=$_POST['cad-data'];


mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$inserir=mysqli_query($conexao,"insert into contextos(analise,objetivo,data)values('$analise','$objetivo','$data')");
if($inserir){ 

$selecao=mysqli_query($conexao,"select * from contextos order by id DESC");
$registros=mysqli_fetch_array($selecao);	
$id=$registros['id'];

$selecao_internos=mysqli_query($conexao,"select * from tabela_fatores_internos_temp");
while($registros_fatores_internos=mysqli_fetch_array($selecao_internos)){

$fator = $registros_fatores_internos['fator'];
$area = $registros_fatores_internos['area'];
$processo =  $registros_fatores_internos['processo'];
$atendimento = $registros_fatores_internos['atendimento'];
$importancia = $registros_fatores_internos['importancia'];
$analise = $registros_fatores_internos['analise'];

$inserir_internos=mysqli_query($conexao,"insert into tabela_fatores_internos(fator,area,processo,atendimento,importancia,analise,codigo_contexto)values('$fator','$area','$processo','$atendimento','$importancia','$analise','$id')");

}

$deletar_tabelas_internas=mysqli_query($conexao,"delete  from tabela_fatores_internos_temp where id !='s'");	
	
	
$selecao_externos=mysqli_query($conexao,"select * from tabela_fatores_externos_temp");
while($registros_fatores_externos=mysqli_fetch_array($selecao_externos)){

$fator = $registros_fatores_externos['fator'];
$area = $registros_fatores_externos['area'];
$processo =  $registros_fatores_externos['processo'];
$momento = $registros_fatores_externos['momento'];
$importancia = $registros_fatores_externos['importancia'];
$analise = $registros_fatores_externos['analise'];

$inserir_externos=mysqli_query($conexao,"insert into tabela_fatores_externos(fator,area,processo,momento,importancia,analise,codigo_contexto )values('$fator','$area','$processo','$momento','$importancia','$analise','$id')");	
	
}
	
$deletar_tabelas_externas=mysqli_query($conexao,"delete  from tabela_fatores_externos_temp where id !='s'");		

	
$selecao_tabela_contexto=mysqli_query($conexao,"select * from tabela_contexto_membros_temp");	
while($registros_tabela_contexto=mysqli_fetch_array($selecao_tabela_contexto)){	
	$cod_usuario=$registros_tabela_contexto['cod_usuario'];
	$nome_usuario=$registros_tabela_contexto['nome_usuario'];
	$email_usuario=$registros_tabela_contexto['email_usuario'];
	
	
$inserir_tabela=mysqli_query($conexao,"insert into  tabela_contexto_membros(cod_usuario,nome_usuario,email_usuario,cod_swot)values('$cod_usuario','$nome_usuario','$email_usuario','$id')");	

	
?>

<?php } 

$excluir_tabela=mysqli_query($conexao,"delete from tabela_contexto_membros_temp ");

?>


	
<script>
location.href="swots.php"

</script>

	
<?php }else{ ?>
	
<script>
alert("Registro não pode ser realizado")	
location.href="swots.php"

</script>	
	
	
<?php	
}

?>