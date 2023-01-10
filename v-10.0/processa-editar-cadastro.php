<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;

$codigo=$_POST['cad-codigo'];
$cnpj=$_POST['cad-cnpj'];
$data_cadastro=date('d-m-Y');

$data_cadastro=date('d-m-Y');
	
$dia1=substr($data_cadastro,0,2);
$mes1=substr($data_cadastro,3,2);
$ano1=substr($data_cadastro,6,4);

	
				
if($dia1>31){ ?>
<script>
	alert("Campo 'Dia' em Data de Cadastro preenchido incorretamente!")
	window. history. back();
</script>
<?php }
				
else if($mes1>=12){	?>
<script>
	alert("Campo 'Mês' em Data de Cadastro preenchido incorretamente!")
	window. history. back();
</script>	
<?php }				
else if($ano1<=1999){ ?>
<script>
	alert("Campo 'Ano' em Data de Cadastro preenchido incorretamente!")
	window. history. back();
</script>
<?php	}					
else{	






$data_requerimento=$_POST['cad-data-requerimento'];
	
	
$dia1=substr($data_requerimento,0,2);
$mes1=substr($data_requerimento,3,2);
$ano1=substr($data_requerimento,6,4);

	
				
if($dia1>31){ ?>
<script>
	alert("Campo 'Dia' em Data de Requerimento preenchido incorretamente!")
	window. history. back();
</script>
<?php }
				
else if($mes1>=12){	?>
<script>
	alert("Campo 'Mês' em Data de Requerimento preenchido incorretamente!")
	window. history. back();
</script>	
<?php }				
else if($ano1<=1999){ ?>
<script>
	alert("Campo 'Ano' em Data de Requerimento preenchido incorretamente!")
	window. history. back();
</script>
<?php	}					
else{		
	
	
	
	
	
	
	
	
	
$numero_requerimento=$_POST['cad-numero-requerimento'];
$data_certificacao=$_POST['cad-data-certificacao'];

	
	
$dia1=substr($data_certificacao,0,2);
$mes1=substr($data_certificacao,3,2);
$ano1=substr($data_certificacao,6,4);

	
				
if($dia1>31){ ?>
<script>
	alert("Campo 'Dia' em Data de Certificação preenchido incorretamente!")
	window. history. back();
</script>
<?php }
				
else if($mes1>=12){	?>
<script>
	alert("Campo 'Mês' em Data de Certificação preenchido incorretamente!")
	window. history. back();
</script>	
<?php }				
else if($ano1<=1999){ ?>
<script>
	alert("Campo 'Ano' em Data de Certificação preenchido incorretamente!")
	window. history. back();
</script>
<?php	}					
else{		
	
	
	
	
	
	
	
	
$data_validacao=$_POST['cad-data-validacao'];
	
	
$dia1=substr($data_validacao,0,2);
$mes1=substr($data_validacao,3,2);
$ano1=substr($data_validacao,6,4);

	
				
if($dia1>31){ ?>
<script>
	alert("Campo 'Dia' em Data de Validação preenchido incorretamente!")
	window. history. back();
</script>
<?php }
				
else if($mes1>=12){	?>
<script>
	alert("Campo 'Mês' em Data de Validação preenchido incorretamente!")
	window. history. back();
</script>	
<?php }				
else if($ano1<=1999){ ?>
<script>
	alert("Campo 'Ano' em Data de Validação preenchido incorretamente!")
	window. history. back();
</script>
<?php	}					
else{		
	
	
	
$modalidade = $_POST['cad-modalidade-certificacao'];
$numero_certificado=$_POST['cad-numero-certificado'];
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');

$selecao_modalidade=mysqli_query($conexao,"select * from modalidades WHERE id='$modalidade'");
$registros_modalidades=mysqli_fetch_array($selecao_modalidade);
$nome_modalidade=$registros_modalidades['modalidade'];

	
	
$verifica=mysqli_query($conexao,"select * from cadastro WHERE codigo_modalidade='$modalidade' and cnpj='$cnpj'");	
$numero=mysqli_num_rows($verifica);	
	
	if($numero==0){
	
	
$atualizar=mysqli_query($conexao,"update cadastro 
set cnpj='$cnpj',
data_cadastro='$data_cadastro',
data_requerimento='$data_requerimento',
numero_requerimento='$numero_requerimento',
data_certificacao='$data_certificacao',
data_validacao='$data_validacao',
codigo_modalidade='$modalidade',
modalidade='$nome_modalidade',
numero_certificacao='$numero_certificado'


WHERE id='$codigo' ");

if($atualizar){ 
	
	
$excluir=mysqli_query($conexao,"delete  from cadastro_funcoes WHERE codigo_cadastro='$codigo'");		
	
$funcoes = $_POST['cad-funcao'];
foreach($funcoes as $funcao1){
	
	$selecao_funcoes=mysqli_query($conexao,"select * from cadastro_funcoes WHERE funcao='$funcao1' and codigo_cadastro='$codigo'");
	$registros_funcoes=mysqli_fetch_array($selecao_funcoes);
	
	$funcao=$registros_funcoes['funcao'];
    $numero=mysqli_num_rows($selecao_funcoes);
	
	if($numero==0){
	$inserir=mysqli_query($conexao,"insert into cadastro_funcoes(funcao,codigo_cadastro)values('$funcao1','$codigo')");
	}
	
}	




?>
	
<script>
	location.href="cadastros.php"
</script>

	
	
<?php }else{ ?>
	
<script>
	alert('Cadastro não pode ser atualizado')
	location.href="cadastros.php"
</script>

	
	
	
<?php }} ?>

<script>
	alert("Modalidade ja cadastrada para esse CNPJ!")
	location.href="cadastros.php"
</script>

<?php
}}} }?>

