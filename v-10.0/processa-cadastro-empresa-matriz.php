<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');

$razao_social=$_POST['cad-razao-social'];
$nome_fantasia=$_POST['cad-nome-fantasia'];
$inscricao_estadual=$_POST['cad-inscricao-estadual'];
$inscricao_municipal=$_POST['cad-inscricao-municipal'];
$cnae=$_POST['cad-cnae'];
$cnpj_matriz=$_POST['cad-cnpj-matriz'];
$cnpj=$_POST['cad-cnpj'];
$cep=$_POST['cad-cep'];
$logradouro=$_POST['cad-logradouro'];
$numero=$_POST['cad-numero'];
$complemento=$_POST['cad-complemento'];
$bairro=$_POST['cad-bairro'];
$cidade=$_POST['cad-cidade'];
$estado=$_POST['cad-estado'];
$organograma=$_POST['cad-estrutura-organograma'];
$atividade_economica=$_POST['cad-atividade-economica'];
$comercio_exterior=$_POST['cad-comercio-exterior'];
$volume_importacao=$_POST['cad-volume-importacao'];
$volume_exportacao=$_POST['cad-volume-exportacao'];
$observacoes_adicionais=$_POST['cad-observacoes-adicionais'];
$cnae_matriz=$_POST['cad-cnae-matriz'];
$email=$_POST['cad-email'];
$telefone=$_POST['cad-telefone'];


$funcao=$_POST['cad-funcao'][0];
$tipo_certificacao=$_POST['cad-tipo-certificacao'][0];



/*----------Arrays */




$inserir=mysqli_query($conexao,"insert into empresas(
razao_social,
nome_fantasia,
inscricao_estadual,
inscricao_municipal,
cnae,
cnpj,
cep,
logradouro,
numero,
complemento,
bairro,
cidade,
estado,
organograma,
atividade_economica,
comercio_exterior,
volume_importacao,
volume_exportacao,
observacoes_adicionais,
cnpj_matriz,
cnae_matriz,
funcao,
tipo_certificacao,
email,
telefone

)values(

'$razao_social',
'$nome_fantasia',
'$inscricao_estadual',
'$inscricao_municipal',
'$cnae',
'$cnpj',
'$cep',
'$logradouro',
'$numero',
'$complemento',
'$bairro',
'$cidade',
'$estado',
'$organograma',
'$atividade_economica',
'$comercio_exterior',
'$volume_importacao',
'$volume_exportacao',
'$observacoes_adicionais',
'$cnpj_matriz',
'$cnae_matriz',
'$funcao',
'$tipo_certificacao',
'$email',
'$telefone'

)");
if($inserir){ ?>



<?php
	

	
	

/* Filiais */
	
$selecao_id=mysqli_query($conexao,"select * from empresas order by id DESC");
$registros_id=mysqli_fetch_array($selecao_id);	
$codigo_empresa_principal=$registros_id['id'];	
	
$total_campo=count($_POST['cad-cnpj-filial']);


		
if($_POST['cad-cnpj-filial'][0]!=''){

for($i=0;$i<=$total_campo-1;$i++){

$cnpj_filial[$i]=$_POST['cad-cnpj-filial'][$i];
$cnae_filial[$i]=$_POST['cad-cnae-filial'][$i];
$atividade_economica_filial[$i]=$_POST['cad-atividade-filial'][$i];
$comercio_exterior_filial[$i]=$_POST['cad-comercio-exterior-filial'][$i];
$volume_importacao_filial[$i]=$_POST['cad-volume-importacao-filial'][$i];
$volume_exportacao_filial[$i]=$_POST['cad-volume-exportacao-filial'][$i];
$observacoes_adicionais_filial[$i]=$_POST['cad-observacoes-adicionais-filial'][$i];	

	$inserir=mysqli_query($conexao,"insert into filiais(
	codigo_empresa_principal,
	cnpj,
	cnae,
	atividade_economica,
	comercio_exterior,
	volume_importacao,
	volume_exportacao,
	observacoes_adicionais
	)values(
	'$codigo_empresa_principal',
	'$cnpj_filial[$i]',
	'$cnae_filial[$i]',
	'$atividade_economica_filial[$i]',
	'$comercio_exterior_filial[$i]',
	'$volume_importacao_filial[$i]',
	'$volume_exportacao_filial[$i]',
	'$observacoes_adicionais_filial[$i]'
	
	)");
	
}
	
/* Final Filiais */	
	
	

	
/* Inicio Terceiros */
	
	
$total_campo=count($_POST['cad-cnpj-terceiro']);


		
if($_POST['cad-cnpj-terceiro'][0]!=''){

for($i=0;$i<=$total_campo-1;$i++){

$cnpj_terceiro[$i]=$_POST['cad-cnpj-terceiro'][$i];
$cnae_terceiro[$i]=$_POST['cad-cnae-terceiro'][$i];
$atividade_economica_terceiro[$i]=$_POST['cad-atividade-terceiro'][$i];
$volume_importacao_terceiro[$i]=$_POST['cad-volume-importacao-terceiro'][$i];
$volume_exportacao_terceiro[$i]=$_POST['cad-volume-exportacao-terceiro'][$i];
$observacoes_adicionais_terceiro[$i]=$_POST['cad-observacoes-adicionais-terceiro'][$i];	
$tipo_operacao_terceiro[$i]=$_POST['cad-observacoes-adicionais-terceiro'][$i];	
$tipo_frete_terceiro[$i]=$_POST['cad-observacoes-adicionais-terceiro'][$i];	
$modal_terceiro[$i]=$_POST['cad-observacoes-adicionais-terceiro'][$i];	
$funcao_terceiro[$i]=$_POST['cad-observacoes-adicionais-terceiro'][$i];		
	

	$inserir=mysqli_query($conexao,"insert into terceiros(
	codigo_empresa_principal,
	cnpj,
	cnae,
	atividade_economica,
	volume_importacao,
	volume_exportacao,
	observacoes_adicionais,
	tipo_operacao,
	tipo_frete,
	modal,
	funcao
	)values(
	'$codigo_empresa_principal',
	'$cnpj_terceiro[$i]',
	'$cnae_terceiro[$i]',
	'$atividade_economica_terceiro[$i]',
	'$volume_importacao_terceiro[$i]',
	'$volume_exportacao_terceiro[$i]',
	'$observacoes_adicionais_terceiro[$i]',
	'$tipo_operacao_terceiro[$i]',
	'$tipo_frete_terceiro[$i]',
	'$modal_terceiro[$i]',
	'$funcao_terceiro[$i]'
	
	)");
	
}
	
/* Final Filiais */		
	
	
	
	
	
	
}

?>


<script>
	location.href="empresas.php"
</script>


	
	
<?php }else{  ?>

<script>
	alert("Cadastro não pode ser realizado")
	location.href="empresas.php"
</script>


<?php } }?>

