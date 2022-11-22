<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;
include('funcoes/valida-cpf.php');
$codigo=$_POST['codigo'];


	
	$cpf=$_POST['cad-cpf'];				
					
	$valida=validaCPF($cpf)	;			
	if($valida==1){				
	

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$responsavel=$_POST['cad-responsavel'];
$nome=$_POST['cad-nome'];
$cpf=$_POST['cad-cpf'];
$telefone=$_POST['cad-telefone'];
$email=$_POST['cad-email'];
$cargo=$_POST['cad-cargo'];
$grupo=$_POST['cad-grupo'];
@$responsaveis_areas = $_POST['areas'];
$setor=$_POST['cad-area'];
$data=date('d-m-Y');
$hora=date('H:i:s');	
$empresa=$_POST['cad-empresa'];
$login=$_POST['cad-login'];	

$atualizar=mysqli_query($conexao,"update  usuarios_empresa 

set 
nome='$nome',
cpf='$cpf',
telefone='$telefone',
email='$login',
cargo='$cargo',
grupo='$grupo',
responsavel='$responsavel',
setor='$setor',
cod_empresa='$empresa',
email2='$email'


WHERE id='$codigo'");

if($atualizar){ ?>
	
<script>
	location.href="usuario.php?cod=<?php echo $codigo ?>"
</script>
	
<?php }else{ ?>

<script>
	location.href="usuario.php?cod=<?php echo $codigo ?>"
</script>	

<?php } }else{ ?>

<script>
	alert('CPF Inválido!')
	location.href="usuario.php?cod=<?php echo $codigo ?>"
</script>

<?php } ?>


