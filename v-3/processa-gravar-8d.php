<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;
	mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');

$emitente=$_POST['cad-emitente'];
$numero_rnc=$_POST['cad-numero_rnc'];
$origem=$_POST['cad-origem'];
$data_registro=$_POST['cad-origem'];
$data_ocorrencia=$_POST['cad-data-ocorrencia'];
$processo=$_POST['cad-processo'];
$risco=$_POST['cad-risco'];

$resposta_analise=$_POST['cad-responsavel-analise'];
$area_responsavel=$_POST['cad-area-responsavel'];
$problema_reincidente=$_POST['cad-problema-reincidente'];
$cliente_fornecedor=$_POST['cad-cliente-fornecedor'];
$problema=$_POST['cad-problema'];
$acao=$_POST['cad-acao'];
$responsavel_acao=$_POST['cad-responsavel-acao'];
$data_contencao=$_POST['cad-data-contencao'];
$what=$_POST['cad-what'];
$when=$_POST['cad-when'];
$who=$_POST['cad-who'];
$where=$_POST['cad-where'];
$why=$_POST['cad-why'];
$how=$_POST['cad-how'];
$how_much=$_POST['cad-how-much'];
$metodologias=$_POST['cad-metodologias'];
$metodo=$_POST['cad-metodo'];
$material=$_POST['cad-material'];
$mao_de_obra=$_POST['cad-mao-de-obra'];
$meio_ambiente=$_POST['cad-meio-ambiente'];
$maquina=$_POST['cad-maquina'];
$medicao=$_POST['cad-medicao'];
$resposta_raiz=$_POST['cad-resposta-causa-raiz'];
$pq1=$_POST['cad-pq1'];
$pq2=$_POST['cad-pq2'];
$pq3=$_POST['cad-pq3'];
$pq4=$_POST['cad-pq4'];
$pq5=$_POST['cad-pq5'];

$resposta_causa2=$_POST['resposta-causa-raiz2'];
$item_implantacao=$_POST['cad-item-implementacao'];
$descricao_acao=$_POST['cad-descricao-acao'];
$como_fazer=$_POST['cad-como-fazer'];
$responsavel_monitoramento=$_POST['cad-responsavel-monitoramento'];
$data_prevista=$_POST['cad-data-prevista'];
$data_conclusao=$_POST['cad-data-conclusao'];
$responsavel_monitoramento=$_POST['cad-responsavel-monitoramento'];
$status_monitoramento=$_POST['cad-status-monitoramento'];
$solucoes_aplciadas=$_POST['cad-solucoes-aplicadas'];
$descricao_solucoes=$_POST['cad-descricao-solucoes'];
$responsavel_analise=$_POST['cad-responsavel-analise'];
$data_analise=$_POST['cad-data-analise'];
$parecer=$_POST['cad-parecer'];


/*EVIDÊNCIA OBJETIVA 1*/

	$arquivo_tmp = $_FILES[ 'cad-evidencia1' ][ 'tmp_name' ];
    $nome = $_FILES[ 'cad-evidencia1' ][ 'name' ];
    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
    $extensao = strtolower ( $extensao );
    if ( @strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
        $novoNome = uniqid ( time () ) . '.' . $extensao;
        $destino = 'evidencias/' . $novoNome;

        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
        //    echo 'Arquivo capa salvo com sucesso em : <strong>' . $destino . '</strong><br />';
          //  echo ' < img src = "' . $destino . '" />';
        }
        else
           echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
    }
    else
        echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';

	   @$nova_capa=$novoNome;


/*EVIDÊNCIA OBJETIVA 2*/

	$arquivo_tmp2 = $_FILES[ 'evidencia-objetiva' ][ 'tmp_name' ];
    $nome2 = $_FILES[ 'evidencia-objetiva' ][ 'name' ];
    $extensao2 = pathinfo ( $nome2, PATHINFO_EXTENSION );
    $extensao2 = strtolower ( $extensao2 );
    if ( @strstr ( '.jpg;.jpeg;.gif;.png', $extensao2 ) ) {
        $novoNome2 = uniqid ( time () ) . '.' . $extensao2;
        $destino2 = 'evidencias/' . $novoNome2;

        if ( @move_uploaded_file ( $arquivo_tmp2, $destino2 ) ) {
        //    echo 'Arquivo capa salvo com sucesso em : <strong>' . $destino . '</strong><br />';
          //  echo ' < img src = "' . $destino . '" />';
        }
        else
           echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
    }
    else
        echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';

	echo   @$nova_capa2=$novoNome2;



/*EVIDÊNCIA OBJETIVA 3*/

	$arquivo_tmp3 = $_FILES[ 'evidencia-objetiva-analise' ][ 'tmp_name' ];
    $nome3 = $_FILES[ 'evidencia-objetiva-analise' ][ 'name' ];
    $extensao3 = pathinfo ( $nome3, PATHINFO_EXTENSION );
    $extensao3 = strtolower ( $extensao3 );
    if ( @strstr ( '.jpg;.jpeg;.gif;.png', $extensao3 ) ) {
        $novoNome3 = uniqid ( time () ) . '.' . $extensao3;
        $destino3 = 'evidencias/' . $novoNome3;

        if ( @move_uploaded_file ( $arquivo_tmp3, $destino3 ) ) {
        //    echo 'Arquivo capa salvo com sucesso em : <strong>' . $destino . '</strong><br />';
          //  echo ' < img src = "' . $destino . '" />';
        }
        else
           echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
    }
    else
        echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';

	echo   @$nova_capa3=$novoNome3;








$inserir=mysqli_query($conexao,"insert into 8d(
emitente,
numero_rnc,
origem,
data_registro,
data_ocorrencia,
processo,
risco,
resposta_analise,
area_responsavel,
problema_reincidente,
cliente_fornecedor,
problema,
acao,
responsavel_acao,
data_contencao,
p_what,
p_when,
p_who,
p_where,
p_why,
how,
how_much,
metodologias,
metodo,
mao_de_obra,
meio_ambiente,
maquina,
medicao,
resposta_raiz,
pq1,
pq2,
pq3,
pq4,
pq5,
resposta_causa2,
item_implantacao,
descricao_acao,
como_fazer,
responsavel_monitoramento,
data_prevista,
data_conclusao,
responsavel_monitoramento2,
status_monitoramento,
solucoes_aplciadas,
descricao_solucoes,
responsavel_analise,
data_analise,
parecer,
evidencia_objetiva,
evidencia_objetiva2,
evidencia_objetiva3




)values(
'$emitente',
'$numero_rnc',
'$origem',
'$data_registro',
'$data_ocorrencia',
'$processo',
'$risco',
'$resposta_analise',
'$area_responsavel',
'$problema_reincidente',
'$cliente_fornecedor',
'$problema',
'$acao',
'$responsavel_acao',
'$data_contencao',
'$what',
'$when',
'$who',
'$where',
'$why',
'$how',
'$how_much',
'$metodologias',
'$metodo',
'$mao_de_obra',
'$meio_ambiente',
'$maquina',
'$medicao',
'$resposta_raiz',
'$pq1',
'$pq2',
'$pq3',
'$pq4',
'$pq5',
'$resposta_causa2',
'$item_implantacao',
'$descricao_acao',
'$como_fazer',
'$responsavel_monitoramento',
'$data_prevista',
'$data_conclusao',
'$responsavel_acao',
'$status_monitoramento',
'$solucoes_aplciadas',
'$descricao_solucoes',
'$responsavel_analise',
'$data_analise',
'$parecer',
'$nova_capa',
'$nova_capa2',
'$nova_capa3'




)");

if($inserir){?>
<script>
location.href='8ds.php'
</script>
	
<?php }else{ ?>
<script>
	alert("Cadastro não pode ser realizado!")
location.href='8ds.php'
</script>	

<?php	
}

?>






