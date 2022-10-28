<label>Fator de Risco</label>

<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');;

$codigo = $_POST['codigo'];

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');



$selecao = mysqli_query($conexao, "select * from fator_risco");




while ($registros = mysqli_fetch_array($selecao)) {
?>

    <input type="radio" name="cad-fator-risco[]" id="cad-fator-risco d-flex" value="<?php echo $registros['id'] ?>"> <?php echo $registros['nome_fator_risco'] ?>


<?php  } ?>