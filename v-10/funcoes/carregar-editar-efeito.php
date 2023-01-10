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
$selecao = mysqli_query($conexao, "select * from diagrama_ishikawa_efeitos WHERE id='$codigo'");
$registros = mysqli_fetch_array($selecao);
?>





<div class="row ml-4 mr-4">


    <div style="width:750px;height:200px;">



        <label>Efeito Atual </label>
        <textarea type="text" class="form-control" name="editar_efeito" id="editar_efeito" rows="5" value="<?php echo $registros['efeito'] ?>"><?php echo $registros['efeito'] ?></textarea>


    </div>



    <div class="col-md-12 ml-2 mt-4">
        <input type="button" value="Atualizar Efeito" class="btn btn-primary float-right" onClick="AtualizarEfeito(<?php echo $registros['id'] ?>)" data-dismiss="modal">

    </div>