<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;
	mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');

$codigo=$_POST['codigo'];
$nome= $_POST['cad-nome'];
$email= $_POST['cad-email'];
$cpf= $_POST['cad-cpf'];
$telefone= $_POST['cad-telefone'];



$atualizar=mysqli_query($conexao,"update usuarios_empresa set nome='$nome', 
email='$email',  
cpf='$cpf',
telefone='$telefone'

WHERE id='$codigo'");
if($atualizar){?>
	
<script>
	location.href="meu-perfil.php"
</script>	
	
<?php }else{?>

<script>
	alert("Usuário não pode ser alterado")
	location.href="meu-perfil.php"
</script>

<?php } ?>




