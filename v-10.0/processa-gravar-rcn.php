<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;
	mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');



/*EVIDÊNCIA OBJETIVA 1*/

	$arquivo_tmp = $_FILES[ 'evidencia-objetiva' ][ 'tmp_name' ];
    $nome = $_FILES[ 'evidencia-objetiva' ][ 'name' ];
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

	echo   @$nova_capa=$novoNome;


/*EVIDÊNCIA OBJETIVA 2*/

	$arquivo_tmp2 = $_FILES[ 'evidencia-objetiva-analise' ][ 'tmp_name' ];
    $nome2 = $_FILES[ 'evidencia-objetiva-analise' ][ 'name' ];
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




$emitente=$_POST['cad-emitente'];
$data=$_POST['cad-data'];
$processo=$_POST['cad-processo'];
$risco=$_POST['cad-risco'];
$origem=$_POST['cad-origem'];
$reincidencia=$_POST['cad-reincidencia'];
$tipo=$_POST['cad-tipo'];
$requisito=$_POST['cad-requisito'];
$descricao=$_POST['cad-descricao'];
$abrangencia=$_POST['cad-abrangencia'];
$descricao_correcao=$_POST['cad-descricao-correcao'];
$data_implementacao=$_POST['cad-data-implementacao'];
$responsavel_implementacao=$_POST['cad-responsavel-implementacao'];


$r1=$_POST['cad-r1'];
$r2=$_POST['cad-r2'];
$r3=$_POST['cad-r3'];
$r4=$_POST['cad-r4'];
$r5=$_POST['cad-r5'];
$r6=$_POST['cad-r6'];

$d1=$_POST['cad-d1'];
$d2=$_POST['cad-d2'];
$d3=$_POST['cad-d3'];
$d4=$_POST['cad-d4'];
$d5=$_POST['cad-d5'];
$d6=$_POST['cad-d6'];

$c1=$_POST['cad-c1'];
$c2=$_POST['cad-c2'];
$c3=$_POST['cad-c3'];
$c4=$_POST['cad-c4'];
$c5=$_POST['cad-c5'];
$c6=$_POST['cad-c6'];

$criticidade1=$_POST['cad-criticidade1'];
$criticidade2=$_POST['cad-criticidade2'];
$criticidade3=$_POST['cad-criticidade3'];
$criticidade4=$_POST['cad-criticidade4'];
$criticidade5=$_POST['cad-criticidade5'];
$criticidade6=$_POST['cad-criticidade6'];


$responsavel_analise=$_POST['cad-responsavel-analise'];
$data_analise=$_POST['cad-data_analise'];


$inserir=mysqli_query($conexao,"insert into rnc(
emitente,
data,
processo,
risco,
origem,
reincidencia,
tipo,
requisito,
descricao,
abrangencia,
descricao_correcao,
data_implementacao,
responsavel_acao_imediata,
r1,r2,r3,r4,r5,r6,d1,d2,d3,d4,d5,d6,c1,c2,c3,c4,c5,c6,
criticidade1,criticidade2,criticidade3,criticidade4,criticidade5,criticidade6,responsavel_analise,data_analise,
evidencia1,
evidencia2

)values(
'$emitente',
'$data',
'$processo',
'$risco',
'$origem',
'$reincidencia',
'$tipo',
'$requisito',
'$descricao',
'$abrangencia',
'$descricao_correcao',
'$data_implementacao',
'$responsavel_implementacao',
'$r1','$r2','$r3','$r4','$r5','$r6',
'$d1','$d2','$d3','$d4','$d5','$d6',
'$c1','$c2','$c3','$c4','$c5','$c6',
'$criticidade1','$criticidade2','$criticidade3',
'$criticidade4','$criticidade5','$criticidade6',
'$responsavel_analise','$data_analise',
'$nova_capa',
'$nova_capa2'

)");

if($inserir){
	
/*Pegar último ID cadastrado*/	
$selecao=mysqli_query($conexao,"select * from rnc order by id desc");
$registros=mysqli_fetch_array($selecao);
$codigo=$registros['id'];	

/*Copiar da tabela temporária e inserir na tabela fixa*/
$selecao_tabela_plano_acao_temp=mysqli_query($conexao,"select * from tabela_plano_de_acao_temp");
$registros_tabela_plano_acao_temp=mysqli_fetch_array($selecao_tabela_plano_acao_temp);	

$item=$registros_tabela_plano_acao_temp['item'];
$descricao=$registros_tabela_plano_acao_temp['descricao'];
$como_fazer=$registros_tabela_plano_acao_temp['como_fazer'];
$responsavel=$registros_tabela_plano_acao_temp['responsavel'];
$data_prevista_conclusao=$registros_tabela_plano_acao_temp['data_prevista_conclusao'];
$data_conclusao=$registros_tabela_plano_acao_temp['data_conclusao'];

$inserir_tabela=mysqli_query($conexao,"insert into tabela_plano_de_acao(item,descricao,como_fazer,responsavel,data_prevista_conclusao,data_conclusao,codigo_rnc)values('$item','$descricao','$como_fazer','$responsavel','$data_prevista_conclusao','$data_conclusao','$codigo')");
	

$limpar=mysqli_query($conexao,"delete from tabela_plano_de_acao_temp");
	

?>
<script>
location.href='rncs.php'
</script>
	
<?php }else{ ?>
<script>
	alert("Cadastro não pode ser realizado!")
location.href='rncs.php'
</script>	

<?php	
}

?>






