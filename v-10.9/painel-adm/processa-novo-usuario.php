<?php
include('../conexao.php');

	
$email= $_POST['cad-email'];
$senha1= $_POST['cad-senha'];
$senha2= $_POST['cad-senha2'];



$selecao=mysqli_query($conexao,"select * from users WHERE email='$email' ");
$numero=mysqli_num_rows($selecao);

if($numero>=1){?>
	
<script>
alert("E-mail ja registrado!")
location.href="novo-usuario.php"
</script>	
	
<?php }else{

if($senha1==$senha2){

$inserir=mysqli_query($conexao,"insert into users(email,senha)values('$email','$senha1') ");

if($inserir){ ?>

<script>
location.href="usuarios.php"
</script>
	
	
<?php }else{?>
	
<script>
alert("Usuário não pode ser cadastrado! Tente novamente!")
location.href="novo-usuario.php"
</script>	
	
<?php } }else{ ?>

<script>
alert("Senhas não são iguais!")
location.href="novo-usuario.php"
</script>	

<?php }} ?>	




             