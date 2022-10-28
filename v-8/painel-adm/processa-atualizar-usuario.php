<?php
include('../conexao.php');

$codigo= $_POST['codigo'];	
$email= $_POST['cad-email'];
$senha= $_POST['cad-senha'];






$atualizar=mysqli_query($conexao,"update users set email='$email', senha='$senha' WHERE id='$codigo'");


if($atualizar){ 




?>

<script>
location.href="usuarios.php"
</script>
	
	
<?php }else{?>
	
<script>
alert("Usuário não pode ser cadastrado! Tente novamente!")
location.href="novo-usuario.php"
</script>	
	
<?php } ?>






             