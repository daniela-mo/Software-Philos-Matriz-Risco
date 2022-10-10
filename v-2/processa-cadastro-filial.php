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


	
	
$codigo_empresa_principal=$_POST['codigo_empresa_principal'];	
	
	
/*----------Cadastro funções */
	
if(isset($_POST['cad-funcao'])){	
	
@$funcao=$_POST['cad-funcao'][0];
@$total_funcao=count($_POST['cad-funcao']);

@$funcoes = $_POST['cad-funcao'];
	
foreach($funcoes as $e) {
		
@$inserir=mysqli_query($conexao,"insert into funcoes(funcao,codigo_empresa)values('$e','$codigo_empresa_principal')");		
}	
}
	
/* Filiais */	

$total_campo=count($_POST['cad-cnpj-filial']);
if($_POST['cad-cnpj-filial'][0]!=''){
for($i=0;$i<=$total_campo-1;$i++){

$razao_social_filial[$i]=$_POST['cad-razao-social-filial'][$i];
$nome_fantasia_filial[$i]=$_POST['cad-nome-fantasia-filial'][$i];
$inscricao_estadual_filial[$i]=$_POST['cad-inscricao-estadual-filial'][$i];
$inscricao_municipal_filial[$i]=$_POST['cad-inscricao-municipal-filial'][$i];
$cnae_filial[$i]=$_POST['cad-cnae-filial'][$i];
$data_fundacao=$_POST['cad-data-fundacao'];	
$site=$_POST['cad-site'];		
	
	
	$cnpj_filial[$i]=$_POST['cad-cnpj-filial'][$i];
	
	if (valida_cnpj($cnpj_filial[$i])){
	
$pais=$_POST['cad-paises'];		
$cep_filial[$i]=$_POST['cad-cep-filial'][$i];
$logradouro_filial[$i]=$_POST['cad-logradouro-filial'][$i];
$numero_filial[$i]=$_POST['cad-numero-filial'][$i];
$complemento_filial[$i]=$_POST['cad-complemento-filial'][$i];
$bairro_filial[$i]=$_POST['cad-bairro-filial'][$i];
$cidade_filial[$i]=$_POST['cad-cidade-filial'][$i];
$estado_filial[$i]=$_POST['cad-estado-filial'][$i];
$atividade_economica_filial[$i]=$_POST['cad-atividade-economica-filial'][$i];
$observacoes_adicionais_filial[$i]=$_POST['cad-observacoes-adicionais-filial'][$i];
$observacoes_adicionais_filial[$i]= addslashes($observacoes_adicionais_filial[$i]);		
$email_filial[$i]=$_POST['cad-email-filial'][$i];
$telefone_filial[$i]=$_POST['cad-telefone-filial'][$i];

	$inserir=mysqli_query($conexao,"insert into filiais(
	codigo_empresa_principal,
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
	data_fundacao,
	pais,
	site




	)values(
	'$codigo_empresa_principal ',
	'$razao_social_filial[$i]',
	'$nome_fantasia_filial[$i]',
	'$inscricao_estadual_filial[$i]',
	'$inscricao_municipal_filial[$i]',
	'$cnae_filial[$i]',
	'$cnpj_filial[$i]',
	'$cep_filial[$i]',
	'$logradouro_filial[$i]',
	'$numero_filial[$i]',
	'$complemento_filial[$i]',
	'$bairro_filial[$i]',
	'$cidade_filial[$i]',
	'$estado_filial[$i]',
	'$atividade_economica_filial[$i]',
	'$observacoes_adicionais_filial[$i]',
	'$email_filial[$i]',
	'$telefone_filial[$i]',
	'$data_fundacao',
	'$pais',
	'$site'
	)");		
		
		
		
		
		
		
} else { ?>
<script>
	alert("CNPJ de Filial inválido")
	location.href="empresas.php"
</script>

<?php }
	
	
		
	
	
	
	
	
	

}
}
/* Final Filiais */	


	
	
?>	




<script>
	
	location.href="empresas.php"
</script>


	


	
	
	


