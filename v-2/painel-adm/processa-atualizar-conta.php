<?php
include('../conexao.php');

$codigo= $_POST['codigo'];	
$empresa= $_POST['cad-empresa'];
$cnpj= $_POST['cad-cnpj'];
$prefixo= $_POST['cad-prefixo'];
$caminho= $_POST['cad-caminho'];


$servidor= $_POST['cad-servidor'];
$banco= $_POST['cad-banco'];
$usuario= $_POST['cad-usuario'];
$senha= $_POST['cad-senha'];

$data=date('d-m-Y');
$hora=date('H:i:s');



$atualizar=mysqli_query($conexao,"update empresas_cadastradas set empresa='$empresa', cnpj='$cnpj',
servidor='$servidor',
banco='$banco',
usuario='$usuario',
senha='$senha'



WHERE id='$codigo'");


if($atualizar){ 




?>

<script>
location.href="contas.php"
</script>
	
	
<?php }else{?>
	
<script>
alert("Conta não pode ser cadastrada! Tente novamente!")
location.href="nova-conta.php"
</script>	
	
<?php } ?>






             