<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];
$mod=$_POST['mod'];
$cnpj=$_POST['cnpj'];

$certificados=mysqli_query($conexao,"select * from cadastro WHERE cnpj='$cnpj' ");
$quantidade=mysqli_num_rows($certificados);
$registros1=mysqli_fetch_array($certificados);
$certificado=$registros1['numero_certificacao'];


if($certificados==1){ 

$excluir=mysqli_query($conexao,"delete  from resposta_qaa WHERE cnpj='$cnpj' and codigo_modalidade='$mod'");	

$selecao=mysqli_query($conexao,"select * from upload_qaa WHERE cnpj='$cnpj'");
while($registros=mysqli_fetch_array($selecao)){
$arquivo=$registros['arquivo'];	
	
@unlink('../'.$obterdominio.'/uploads-qaa/'.$arquivo);	
	
	
	

	
}


	
$deletar=mysqli_query($conexao,"delete from status_qaas WHERE cnpj='$cnpj'");	
	
$excluir2=mysqli_query($conexao,"delete  from upload_qaa WHERE cnpj='$cnpj' ");	
	
$excluir3=mysqli_query($conexao,"delete  from questoes_qaa WHERE certificado='$certificado' ");	
		
	
}

if($certificados==2){
	
	
	
$selecao=mysqli_query($conexao,"select * from resposta_qaa WHERE cnpj='$cnpj' and codigo_modalidade='$mod'");	
while($registros=mysqli_fetch_array($selecao)){
	
$codigo_questao=$registros['codigo_questao'];
	
$excluir3=mysqli_query($conexao,"delete  from upload_qaa WHERE codigo_qaa='$codigo_questao'  ");
	
	

	
	
}

	
	
$deletar=mysqli_query($conexao,"delete from status_qaas WHERE cnpj='$cnpj' and certificao='$certificado'");		
	
	

$excluir=mysqli_query($conexao,"delete  from resposta_qaa WHERE 
codigo_questao!='333' 
and codigo_questao!='334'
and codigo_questao!='338'
and codigo_questao!='339' 
and codigo_questao!='341'
and codigo_questao!='343'
and codigo_questao!='344'
and codigo_questao!='345'
and codigo_questao!='346'
and codigo_questao!='74'
and codigo_questao!='77'
and codigo_questao!='78'
and codigo_questao!='79'
and codigo_questao!='82'
and codigo_questao!='83'
and codigo_questao!='84'
and codigo_questao!='85'
and codigo_questao!='86'
and codigo_questao!='87'
and codigo_questao!='88'
and codigo_questao!='89'
and codigo_questao!='90'
and codigo_questao!='91'
and codigo_questao!='93'
and codigo_questao!='94'
and codigo_questao!='95'
and codigo_questao!='96'
and codigo_questao!='97'
and codigo_questao!='98'
and codigo_questao!='99'
and codigo_questao!='100'
and codigo_questao!='101'
and codigo_questao!='102'
and codigo_questao!='103'
and codigo_questao!='104'
and codigo_questao!='105'
and codigo_questao!='106'
and codigo_questao!='107'
and codigo_questao!='108'
and codigo_questao!='109'
and codigo_questao!='110'
and codigo_questao!='111'
and codigo_questao!='112'
and codigo_questao!='113'
and codigo_questao!='114'
and codigo_questao!='117'
and codigo_questao!='118'
and codigo_questao!='119'
and codigo_questao!='120'
and codigo_questao!='121'
and codigo_questao!='122'
and codigo_questao!='124'
and codigo_questao!='127'
and codigo_questao!='128'
and codigo_questao!='129'
and codigo_questao!='130'
and codigo_questao!='131'
and codigo_questao!='132'
and codigo_questao!='133'
and codigo_questao!='134'
and codigo_questao!='135'
and codigo_questao!='136'
and codigo_questao!='137'
and codigo_questao!='138'
and codigo_questao!='139'
and codigo_questao!='140'
and codigo_questao!='141'
and codigo_questao!='142'
and codigo_questao!='143'
and codigo_questao!='144'
and codigo_questao!='145'
and codigo_questao!='146'
and codigo_questao!='147'
and codigo_questao!='148'
and codigo_questao!='149'
and codigo_questao!='150'
and codigo_questao!='151'
and codigo_questao!='152'
and codigo_questao!='153'
and codigo_questao!='154'
and codigo_questao!='155'
and codigo_questao!='156'
and codigo_questao!='157'
and codigo_questao!='158'
and codigo_questao!='159'
and codigo_questao!='160'
and codigo_questao!='161'
and codigo_questao!='162'

and cnpj='$cnpj' and codigo_modalidade='$mod'");	
	

}


$excluir=mysqli_query($conexao,"delete  from cadastro WHERE id='$codigo'");


if($excluir){ 


$excluir2=mysqli_query($conexao,"delete  from upload_cadastro WHERE codigo_cadastro='$codigo'  ");
	
$excluir3=mysqli_query($conexao,"delete  from questoes_qaa WHERE certificado='$certificado' ");		


?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
