<?php
include('../conexao.php');	

session_start();

$login=$_POST['login'];
$senha=$_POST['senha'];

$criptografia=md5($senha);


$selecao=mysqli_query($conexao,"select * from users WHERE email='$login' and senha='$senha' ");
$numero=mysqli_num_rows($selecao);

if($numero>= 1){
	
$_SESSION['user_adm']=$login;
	
?>	
	
<script>
	location.href="painel.php"
</script>


<?php
	
}else{
?>	


<script>
	alert("Login ou Senha Incorreto(s)")
	location.href="index.php"
</script>
	
	
<?php	
}





?>