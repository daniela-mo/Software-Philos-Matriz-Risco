<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');;

$evento = $_POST['cad-evento'];
$origem = $_POST['cad-origem'];
$fator = $_POST['cad-fator'];
$data_id_risco = $_POST['cad-data-id-risco'];

$data_id_risco = str_replace('/', '-', $data_id_risco);

$dia_de = substr($data_id_risco, 0, 2);
$mes_de = substr($data_id_risco, 3, 2);
$ano_de	= substr($data_id_risco, 6, 4);

$data_id_risco = $ano_de . "-" . $mes_de . "-" . $dia_de;



$itens = $_POST['cad-item-qaa"'];
$classificacao_risco = $_POST['cad-classificacao-risco'];
$area_risco = $_POST['cad-area-risco'];
$processo = $_POST['cad-processo'];
$item_oea = $_POST['cad-item-oea'];
@$implementacao = $_POST['cad-implementacao'];


mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');



// $selecao_item = mysqli_query($conexao, "select *from tabela_itens_qaa_temp WHERE id='$id'");
// $registros_item = mysqli_fetch_array($selecao_item);
// $item = $registros_item['item'];


$selecao_qaa = mysqli_query($conexao, "select * from questoes_qaa WHERE item='$itens'");
$registros_qaa = mysqli_fetch_array($selecao_qaa);
$itens = $registros_qaa['titulo'];


$selecao_area = mysqli_query($conexao, "select * from areas WHERE id='$area_risco'");
$registros_area = mysqli_fetch_array($selecao_area);
$nome_area = $registros_area['area'];

$seleco = mysqli_query($conexao, "select * from identificacao_do_risco order by id DESC");
$registr = mysqli_fetch_array($seleco);
$codigoa = $registr['codigo'];
$codigoa = $codigoa + 1;



$inserir = mysqli_query($conexao, "insert into identificacao_do_risco(
evento_risco,
origem,
fator_risco,
data_id_risco,
classificacao_risco,
criterio_correspondente,
area,
processo,
item_oea,
implementacao,
codigo_area,
codigo
)values(

'$evento',
'$origem',
'$fator',
'$data_id_risco',
'$classificacao_risco',
'$itens',
'$nome_area',
'$processo',
'$item_oea',
'$implementacao',
'$area_risco',
'$codigoa'

)");

if ($inserir) {

?>

	<script>
		location.href = "matriz-de-risco.php?cod=<?php echo $codigo ?>"
		// location.href = "cadastro-identificacao-de-risco.php"
	</script>


<?php } else {  ?>

	<script>
		alert("Cadastro não pode ser realizado")
		location.href = "matriz-de-riscos.php"
	</script>


<?php } ?>