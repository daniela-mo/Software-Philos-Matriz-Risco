<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');

function valida_cnpj($cnpj){
    // Deixa o CNPJ com apenas números
    $cnpj = preg_replace( '/[^0-9]/', '', $cnpj );
    
    // Garante que o CNPJ é uma string
    $cnpj = (string)$cnpj;
    
    // O valor original
    $cnpj_original = $cnpj;
    
    // Captura os primeiros 12 números do CNPJ
    $primeiros_numeros_cnpj = substr( $cnpj, 0, 12 );
    
    /**
     * Multiplicação do CNPJ
     *
     * @param string $cnpj Os digitos do CNPJ
     * @param int $posicoes A posição que vai iniciar a regressão
     * @return int O
     *
     */
    if ( ! function_exists('multiplica_cnpj') ) {
        function multiplica_cnpj( $cnpj, $posicao = 5 ) {
            // Variável para o cálculo
            $calculo = 0;
            
            // Laço para percorrer os item do cnpj
            for ( $i = 0; $i < strlen( $cnpj ); $i++ ) {
                // Cálculo mais posição do CNPJ * a posição
                $calculo = $calculo + ( $cnpj[$i] * $posicao );
                
                // Decrementa a posição a cada volta do laço
                $posicao--;
                
                // Se a posição for menor que 2, ela se torna 9
                if ( $posicao < 2 ) {
                    $posicao = 9;
                }
            }
            // Retorna o cálculo
            return $calculo;
        }
    }
    
    // Faz o primeiro cálculo
    $primeiro_calculo = multiplica_cnpj( $primeiros_numeros_cnpj );
    
    // Se o resto da divisão entre o primeiro cálculo e 11 for menor que 2, o primeiro
    // Dígito é zero (0), caso contrário é 11 - o resto da divisão entre o cálculo e 11
    $primeiro_digito = ( $primeiro_calculo % 11 ) < 2 ? 0 :  11 - ( $primeiro_calculo % 11 );
    
    // Concatena o primeiro dígito nos 12 primeiros números do CNPJ
    // Agora temos 13 números aqui
    $primeiros_numeros_cnpj .= $primeiro_digito;
 
    // O segundo cálculo é a mesma coisa do primeiro, porém, começa na posição 6
    $segundo_calculo = multiplica_cnpj( $primeiros_numeros_cnpj, 6 );
    $segundo_digito = ( $segundo_calculo % 11 ) < 2 ? 0 :  11 - ( $segundo_calculo % 11 );
    
    // Concatena o segundo dígito ao CNPJ
    $cnpj = $primeiros_numeros_cnpj . $segundo_digito;
    
    // Verifica se o CNPJ gerado é idêntico ao enviado
    if ( $cnpj === $cnpj_original ) {
        return true;
    }
}





$cnpj=$_POST['cad-cnpj'];



$data_fundacao=$_POST['cad-data-fundacao'];	


$dia1=substr($data_fundacao,0,2);
$mes1=substr($data_fundacao,3,2);
$ano1=substr($data_fundacao,6,4);

	
				
if($dia1>31){ ?>
<script>
	alert("Campo 'Dia' em Data de Fundação preenchido incorretamente!")
	window. history. back();
</script>
<?php }
				
else if($mes1>=12){	?>
<script>
	alert("Campo 'Mês' em Data de Fundação preenchido incorretamente!")
	window. history. back();
</script>	
<?php }				
else if($ano1<=1999){ ?>
<script>
	alert("Campo 'Ano' em Data de Fundação preenchido incorretamente!")
	window. history. back();
</script>
<?php	}					
else{	


$razao_social=$_POST['cad-razao-social'];
$nome_fantasia=$_POST['cad-nome-fantasia'];
$inscricao_estadual=$_POST['cad-inscricao-estadual'];
$inscricao_municipal=$_POST['cad-inscricao-municipal'];
$cnae=$_POST['cad-cnae'];
$paises=$_POST['paises'];
$cep=$_POST['cad-cep'];
$logradouro=$_POST['cad-logradouro'];
$numero=$_POST['cad-numero'];
$complemento=$_POST['cad-complemento'];
$bairro=$_POST['cad-bairro'];
$cidade=$_POST['cad-cidade'];
$estado=$_POST['cad-estado'];
$atividade_economica=$_POST['cad-atividade-economica'];
$observacoes_adicionais=$_POST['cad-observacoes-adicionais'];
$observacoes_adicionais = addslashes($observacoes_adicionais);
$email=$_POST['cad-email'];
$telefone=$_POST['cad-telefone'];
$site=$_POST['cad-site'];

if(valida_cnpj($cnpj)){
	mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
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
atividade_economica,
observacoes,
email,
telefone,
pais,
data_fundacao,
site


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
'$atividade_economica',
'$observacoes_adicionais',
'$email',
'$telefone',
'$paises',
'$data_fundacao',
'$site'

)");
if($inserir){ ?>

<?php
	
$selecao_id=mysqli_query($conexao,"select * from empresas order by id DESC");
$registros_id=mysqli_fetch_array($selecao_id);	
$codigo_empresa_principal=$registros_id['id'];	
	
	
/*----------Cadastro funções */
	
if(isset($_POST['cad-funcao'])){	
	
@$funcao=$_POST['cad-funcao'][0];
@$total_funcao=count($_POST['cad-funcao']);

@$funcoes = $_POST['cad-funcao'];
	
foreach($funcoes as $e) {
		
@$inserir=mysqli_query($conexao,"insert into funcoes(funcao,codigo_empresa)values('$e','$codigo_empresa_principal')");		
}	
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


<?php } ?>

	
	
	
	
	
	
	
	
<?php	
}else{ ?>

<script>
alert("CNPJ da empresa matriz inválido")
	location.href="cadastro-empresa.php"
	history.back();
</script>
	
<?php } }
 
