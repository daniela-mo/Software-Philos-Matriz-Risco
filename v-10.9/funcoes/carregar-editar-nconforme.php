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
$selecao = mysqli_query($conexao, "select * from detalhe_nao_conformidade WHERE id='$codigo'");
$registros = mysqli_fetch_array($selecao);
?>





<div class="row ml-4 mr-4">


    <div style="width:750px;height:200px;">

        <label>Não conformidade </label>
        <textarea type="text" class="form-control" name="editar_nconforme" id="editar_nconforme" rows="5" value="<?php echo $registros['descricao'] ?>"><?php echo $registros['descricao'] ?></textarea>

    </div>

    <div class="col-md-12 row">
        <div class="col-md-6">
            <label>Área</label>
            <input type="text" class="form-control" name="editar_area_nconforme" id="editar_area_nconforme">

        </div>

        <div class="col-md-6">
            <label>Responsável</label>
            <input type="text" class="form-control" name="editar-responsavel-nconforme" id="editar-responsavel-nconforme">

        </div>
    </div>



    <div class="col-md-12 ml-2 mt-4">
        <input type="button" value="Atualizar Não Conformidade" class="btn btn-primary float-right" onClick="AtualizarNConforme(<?php echo $registros['id'] ?>)" data-dismiss="modal">

    </div>