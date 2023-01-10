<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');
$codigo = $_POST['codigo'];

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');
?>


<?php
$selecao = mysqli_query($conexao, "select * from matriz_de_risco_causas WHERE id='$codigo'");
$registros = mysqli_fetch_array($selecao);
?>





<div class="row ml-4 mr-4">


    <div style="width:750px;height:200px;">



        <label>Causa Atual </label>
        <textarea type="text" class="form-control" name="editar_causa" id="editar_causa" rows="5" value="<?php echo $registros['causa'] ?>"><?php echo $registros['causa'] ?></textarea>


    </div>



    <div class="col-md-12 ml-2 mt-4">
        <input type="button" value="Atualizar Causa" class="btn btn-primary float-right" onClick="AtualizarCausa(<?php echo $registros['id'] ?>)" data-dismiss="modal">

    </div>