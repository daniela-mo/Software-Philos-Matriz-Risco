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
$selecao = mysqli_query($conexao, "select * from acao_imediata_nao_conformidade WHERE id='$codigo'");
$registros = mysqli_fetch_array($selecao);
?>





<div class="row ml-4 mr-4">


    <div style="width:750px;height:200px;">

        <label>Ação </label>
        <textarea type="text" class="form-control" name="editar_acao" id="editar_acao" rows="5" value="<?php echo $registros['desc_acao'] ?>"><?php echo $registros['desc_acao'] ?></textarea>

    </div>

    <div class="col-md-12 row">
        <div class="col-md-6">
            <label>Área</label>
            <input type="text" class="form-control" name="editar_area_acao" id="editar_area_acao">

        </div>

        <div class="col-md-6">
            <label>Responsável</label>
            <input type="text" class="form-control" name="editar-responsavel-acao" id="editar-responsavel-acao">

        </div>
        <div class="col-md-6">
            <label>Data</label>
            <input type="date" class="form-control" name="editar-data-acao" id="editar-data-acao">

        </div>
    </div>



    <div class="col-md-12 ml-2 mt-4">
        <input type="button" value="Atualizar Ação" class="btn btn-primary float-right" onClick="AtualizarAcao(<?php echo $registros['id'] ?>)" data-dismiss="modal">

    </div>