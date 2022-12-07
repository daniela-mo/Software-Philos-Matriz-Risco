<?php
include("conexao.php");

$login=$_POST['login'];
$senha=$_POST['senha'];
$data=date('Y-m-d');
$hora=date('H:i:s');
$navegador=$_SERVER['HTTP_USER_AGENT'];
$ip=$_SERVER['REMOTE_ADDR'];

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');


if($login=='teste@teste.com.br'){
	
	$pesquisar=mysqli_query($conexao,"select * from empresas_cadastradas order by id DESC limit 1");
	
	$registros=mysqli_fetch_array($pesquisar);
	
	$resultado_dominio= $registros['prefixo'];
}else{





$obterdominio = strpos($login,"@");

 $resultado_dominio = substr($login, $obterdominio+1);
}

$verificar_dominio=mysqli_query($conexao,"select * from empresas_cadastradas WHERE prefixo='$resultado_dominio'");
$numero_dominios=mysqli_num_rows($verificar_dominio);
$registros_caminho=mysqli_fetch_array($verificar_dominio);
$caminho=$registros_caminho['caminho'];
if($numero_dominios==1){

session_start();	
	
$_SESSION['dominio']=$caminho;	
$_SESSION['login']=$login;		
$_SESSION['senha']=$senha;
$_SESSION['data']=$data;	
$_SESSION['hora']=$hora;	
$_SESSION['navegador']=$navegador;	
$_SESSION['ip']=$ip;	
?>
	
<script>
	location.href="processa-login2.php"
</script>

<?php	
}else{
	
echo "Dados Incorreto(s)";	
	
}


/* Informa o nível dos erros que serão exibidos */
error_reporting(E_ALL);
 
/* Habilita a exibição de erros */
ini_set("display_errors", 1);

?>