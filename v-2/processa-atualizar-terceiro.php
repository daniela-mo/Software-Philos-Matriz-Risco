<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;

            mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');


$classificacao_cliente='';	
$classificacao_fornecedor='';
$classificacao_terceiro='';	

if(isset($_POST['cad-classificacao'])){

	
for($i = 0; $i < count($_POST['cad-classificacao']); $i++) {

	if($_POST['cad-classificacao'][$i]=='Terceiro'){$classificacao_terceiro='1';}
	if($_POST['cad-classificacao'][$i]=='Cliente'){$classificacao_cliente='1';}
	if($_POST['cad-classificacao'][$i]=='Fornecedor'){$classificacao_fornecedor='1';}
	
	
}

} 

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

$codigo=$_POST['codigo'];
$razao_social=$_POST['cad-razao-social'];
$nome_fantasia=$_POST['cad-nome-fantasia'];
$inscricao_estadual=$_POST['cad-inscricao-estadual'];
$inscricao_municipal=$_POST['cad-inscricao-municipal'];
$cnpj_matriz=$_POST['cad-cnpj-matriz'];
$data_fundacao=$_POST['cad-data-fundacao'];
$pais=$_POST['cad-pais'];
$atividade_economica = $_POST['cad-atividade-economica'];
$site=$_POST['cad-site'];

if(valida_cnpj($cnpj_matriz)){

$cep=$_POST['cad-cep'];
$logradouro=$_POST['cad-logradouro'];
$numero=$_POST['cad-numero'];
$complemento=$_POST['cad-complemento'];
$bairro=$_POST['cad-bairro'];
$cidade=$_POST['cad-cidade'];
$estado=$_POST['cad-estado'];

$observacoes_adicionais=$_POST['cad-observacoes-adicionais'];
$observacoes_adicionais=addslashes($observacoes_adicionais);	
	
$cnae_matriz=$_POST['cad-cnae-matriz'];
$email=$_POST['cad-email'];
$telefone=$_POST['cad-telefone'];
@$tipo_certificacao=$_POST['cad-tipo-certificacao'];


$atualizar=mysqli_query($conexao,"update  terceiros 

set 
razao_social='$razao_social',
nome_fantasia='$nome_fantasia',
inscricao_estadual='$inscricao_estadual',
inscricao_municipal='$inscricao_municipal',
cnpj='$cnpj_matriz',
cep='$cep',
logradouro='$logradouro',
numero='$numero',
complemento='$complemento',
bairro='$bairro',
cidade='$cidade',
estado='$estado',

observacoes='$observacoes_adicionais',
cnae='$cnae_matriz',
email='$email',
telefone='$telefone',
pais='$pais',
data_fundacao='$data_fundacao',
atividade_economica='$atividade_economica',
site ='$site',
class_cliente = '$classificacao_cliente',
class_fornecedor = '$classificacao_fornecedor',
class_terceiro = '$classificacao_terceiro'



WHERE id='$codigo'");

if($atualizar){ ?>

<script>
	location.href="terceiro.php?cod=<?php echo $codigo ?>"
</script>
	
<?php }else{ ?>
<script>
	location.href="terceiro.php?cod=<?php echo $codigo ?>"
</script>	

<?php }}else{ ?>

<script>
	alert("CNPJ inválido")
	location.href="terceiro.php?cod=<?php echo $codigo ?>"
</script>	


<?php } ?>

