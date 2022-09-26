<?php
	session_start();
$email=$_SESSION['usuario'];
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;
	mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');

$codigo=$_POST['codigo'];

$atual=$_POST['ver-senha-atual'];
$catual=md5($atual);
$verificar=mysqli_query($conexao,"select * from usuarios_empresa WHERE email='$email' and senha='$catual' ");

$numero=mysqli_num_rows($verificar);
$numero=1;
if($numero>=1){ 

$nova= $_POST['ver-nova-senha'];
$nova1= $_POST['ver-nova-senha2'];
$cnova=md5($nova);
	
if($nova==$nova1){


$atualizar=mysqli_query($conexao,"update usuarios_empresa set senha='$cnova' WHERE id='$codigo'");

if($atualizar){?>
	
<script>
	alert("Senha Alterada com Sucesso!")
	location.href="meu-perfil.php"
</script>	
	
<?php }else{?>

<script>
	alert("Senha não pode ser alterada")
	location.href="meu-perfil.php"
</script>

<?php }}else{ ?>
<script>
	alert("As senhas não são as mesmas")
	location.href="meu-perfil.php"
</script>	
	
<?php }



}else{ ?>
	
<script>
	alert("Senha Atual Incorreta")
	location.href="meu-perfil.php"
</script>		
	
	
<?php } ?>




