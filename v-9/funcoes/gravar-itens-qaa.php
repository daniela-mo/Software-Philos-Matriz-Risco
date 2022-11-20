<script>
    alert('entrou aqui!')
</script>
<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');


$itens = $_POST['carregar-itens-qaa'];

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');


$sql = "update set identificacao_do_risco criterio_correspondente='$itens' where id";

$inserir = mysqli_query($conexao, $sql);



if ($atualizar) { ?>

    <script>
        alert('entrou!')
    </script>




<?php } else { ?>

    <script>
        alert('não!')
    </script>
<?php } ?>