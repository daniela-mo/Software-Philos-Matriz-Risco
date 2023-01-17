<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');;


$titulo = $_POST['cad-titulo'];
$prioridade = $_POST['cad-prioridade'];
$periodicidade = $_POST['cad-periodicidade'];
$descricao = $_POST['cad-descricao'];
$itemQaa = $_POST['itemQaa'];
$responProc = $_POST['responProc'];
$responAcao = $_POST['responAcao'];
$area = $_POST['area'];
$empresa = $_POST['razao_social'];
$planoAcao = $_POST['planoAcao'];
$mapaRisco = $_POST['mapaRisco'];
$descricao = addslashes($descricao);
$statusDevolutiva = $_POST['statusDevolutiva'];
$statusPrazoPlanoAcao = $_POST['statusPrazoPlanoAcao'];

//CAMPOS DATAS
$vencimento = $_POST['cad-data-vencimento'];
$inicio = $_POST['cad-data-inicio'];
$dtEnvioPlanoAcao = $_POST['dtEnvioPlanoAcao'];
$dtRetornoPrazo = $_POST['dtRetornoPrazo'];
$dtDevolutiva = $_POST['dtDevolutiva'];
$diasRetPrazo = $_POST['diasRetPrazo'];
$pzAtendPlanAcao = $_POST['pzAtendPlanAcao'];
$datAtendPlanAcao = $_POST['datAtendPlanAcao'];
$diasAtraso = $_POST['diasAtraso'];



$dia1 = substr($inicio, 0, 2);
$mes1 = substr($inicio, 3, 2);
$ano1 = substr($inicio, 6, 4);



// 


@$data_min = $_POST['cad-data-inicio'];
$ano_min = substr($data_min, 6, 10);
$mes_min = substr($data_min, 3, 2);
$dia_min = substr($data_min, 0, 2);

@$data_min = $ano_min . "-" . $mes_min . "-" . $dia_min;


@$data_max = $_POST['cad-data-vencimento'];
$ano_max = substr($data_max, 6, 10);
$mes_max = substr($data_max, 3, 2);
$dia_max = substr($data_max, 0, 2);

@$data_max = $ano_max . "-" . $mes_max . "-" . $dia_max;



$status = $_POST['cad-status'];



$data_criacao = date('d-m-Y');
$hora_criacao = date('H:m:s');

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');


$inserir = mysqli_query($conexao, "insert into workflow(

planejamento,
prioridade,
descricao,
data,
hora,
data_vencimento,
status,
data_inicio,
responProc,
itemQaa,
responAcao,
area,
empresa,
planoAcao,
mapaRisco,
statusDevolutiva,
statusPrazoPlanoAcao,
dtEnvioPlanoAcao,
dtRetornoPrazo,
dtDevolutiva,
diasRetPrazo,
pzAtendPlanAcao,
datAtendPlanAcao,
diasAtraso)
values(
'$titulo',
'$prioridade',
'$descricao',
'$data_criacao',
'$hora_criacao',
'$data_max',
'$status',
'$data_min',
'$responProc',
'$itemQaa',
'$responAcao',
'$area',
'$empresa',
'$planoAcao',
'$mapaRisco',
'$statusDevolutiva',
'$statusPrazoPlanoAcao',
'$dtRetornoPrazo',
'$dtDevolutiva',
'$diasRetPrazo',
'$pzAtendPlanAcao',
'$datAtendPlanAcao',
'$dtEnvioPlanoAcao',
'$diasAtraso')");

if ($inserir) {

    $selecao_workflow = mysqli_query($conexao, "select * from workflow order by id DESC");
    $registros_workflow = mysqli_fetch_array($selecao_workflow);
    $codigo_workflow = $registros_workflow['id'];

    $selecao_empresa = mysqli_query($conexao, "select * from usuarios_empresa WHERE id='$responsavel_principal'");
    $registros_empresa = mysqli_fetch_array($selecao_empresa);

    $usuario = $registros_empresa['nome'];

    $codigo_usuario = $registros_empresa['id'];

    // $selecao_empresa = mysqli_query($conexao, "select * from filiais  WHERE id='$empresa'");
    // $registros_empresa = mysqli_fetch_array($selecao_empresa);

    // $inserir_responsavel=mysqli_query($conexao,"insert into responsaveis_workflow(codigo_usuario,usuario,codigo_workflow)values('$codigo_usuario','$usuario','$codigo_workflow')");


?>

    <script>
        alert('Planejamento cadastrado')
        location.href = "workflow.php"
    </script>

<?php } else { ?>

    <script>
        alert('Planejamento não cadastrado')
        location.href = "workflow.php"
    </script>


<?php }

?>