<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');
$codigo = $_POST['codigo'];

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

$selecao = mysqli_query($conexao, "select * from identificacao_do_risco WHERE id='$codigo'");
$registros = mysqli_fetch_array($selecao);

?>

<label>Evento de Risco</label>
<textarea class="form-control" name="edit-evento-risco" id="edit-evento-risco" rows="3"><?php echo $registros['evento_risco'] ?></textarea>


<input type="button" class="btn btn-primary mt-3" value="Atualizar Evento de Risco" onClick="AtualizarRisco()">