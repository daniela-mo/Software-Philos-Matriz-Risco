<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php'); 

$nome=$_POST['nome']; 
$email=$_POST['email'];
$senha=$_POST['senha'];
$tipo=$_POST['tipo'];

$criptografia=md5($senha);


            mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$gravar=mysqli_query($conexao,"insert into usuarios(login,senha,nome,tipo)values('$email','$criptografia','$nome','$tipo') ");


if($gravar){ ?>

<script>
alert('Usuário cadastrado com sucesso!')

</script>

<?php }else{ ?>
	
	
<?php	
}
?>
