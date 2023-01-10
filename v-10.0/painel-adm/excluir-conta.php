<?php
include('../conexao.php');


$codigo = $_REQUEST['codigo'];



$delete=mysqli_query($conexao,"delete from empresas_cadastradas WHERE id='$codigo'");


if($delete){ ?>
	
<script>
location.href="contas.php"
</script>	

<?php }else{ ?>
<script>
	alert("Conta não pode ser excluida")
location.href="contas.php"
</script>	
	
	
<?php }


?>