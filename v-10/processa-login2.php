<?php
	

session_start();

$obterdominio=$_SESSION['dominio'];
$login=$_SESSION['login'];		
$senha=$_SESSION['senha'];
$data=$_SESSION['data'];	
$hora=$_SESSION['hora'];	
$navegador=$_SESSION['navegador'];	
$ip=$_SESSION['ip'];

$criptografia=md5($senha);

include($obterdominio.'/'.'conexao.php');
/*or senha='5371c7c104744e05fe9a5d8db2a707c3'*/

$selecao=mysqli_query($conexao,"select * from usuarios_empresa WHERE email='$login'  and senha='$criptografia'     ");
$registros=mysqli_fetch_array($selecao);
$cod_usuario=$registros['id'];
$numero=mysqli_num_rows($selecao);
if($numero==1){ 

$inserir=mysqli_query($conexao,"insert into historico(data,hora,usuario,navegador,ip)values('$data','$hora','$login','$navegador','$ip')");

	

	
	

$_SESSION['usuario']=$login;	

	
	
 $selecao_notificacao=mysqli_query($conexao,"select * from notificacoes WHERE codigo_usuario='$cod_usuario'");
 $numero=mysqli_num_rows($selecao_notificacao);
 if($numero>=1){$_SESSION['notificacao']=$numero;}	
			 

	
	
	?>		
	


	<script>
		location.href="inicio.php"
	</script>
	
<?php }else{ 

	

include('conexao.php');
$selecao=mysqli_query($conexao,"select * from users WHERE email='$login' and senha='$senha' ");
$numero2=mysqli_num_rows($selecao);
if($numero2>=1){
	$_SESSION['notificacao']=$numero2;
$_SESSION['usuario']=$login;	
$_SESSION['privilegio']='admin';
?>
			   
	<script>
		location.href="inicio.php"
	</script>		   
			   
			   
<?php			   
			   }else{	



?>
	<script>	
		alert("Login ou senha incorreto(s)")
		location.href="index.php"
	</script>


<?php }}
?>