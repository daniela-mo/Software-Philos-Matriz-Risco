<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

$codigo_qaa = $_POST['item'];


$selecao = mysqli_query($conexao, "select * from tabela_itens_qaa_temp WHERE codigo_qaa='$codigo_qaa'");
$numero = mysqli_num_rows($selecao);


if ($numero == 0) {

    $selecao_item = mysqli_query($conexao, "select *from questoes_qaa WHERE id='$codigo_qaa'");
    $registros_item = mysqli_fetch_array($selecao_item);
    $item = $registros_item['titulo'];

    print $sql;

    $sql = "insert into tabela_itens_qaa_temp(codigo_qaa,item)values('$codigo_qaa','$item')";

    $inserir = mysqli_query($conexao, $sql);


    if ($sql) {

?>
        <script>
            alert('deu certo')
        </script>
        <?php
        // $gravar = mysqli_query($conexao, "insert into identificacao_do_risco set criterio_correspondente='$codigo_qaa' where id') ");
        ?>


    <?php } else { ?>



<?php
    }
}
?>