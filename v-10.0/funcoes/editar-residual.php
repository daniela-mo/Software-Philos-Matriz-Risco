<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');
?>
<form action="processa-editar-residual.php" method="post">
    <div class="row ">

        <?php

        $codigo_matriz = $_POST['matriz'];
        $classifi = $_POST['classifi'];
        $classi_risco = $_POST['classif_risco'];

        $selecao_avaliacao = mysqli_query($conexao, "select * from avaliacao_risco_residual WHERE codigo_matriz='$codigo_matriz'");
        $num = mysqli_num_rows($selecao_avaliacao);
        $registros_avaliacao = mysqli_fetch_array($selecao_avaliacao);
        $exibir_probabilidade = $registros_avaliacao['probabilidade'];
        $exibir_probabilidade1 = $registros_avaliacao['probabilidade'];
        $exibir_impacto = $registros_avaliacao['impacto'];
        $exibir_impacto1 = $registros_avaliacao['impacto'];

        $decisao = $registros_avaliacao['decisao'];

        if ($exibir_probabilidade == 1) {
            $exibir_probabilidade = 'Rara';
        }
        if ($exibir_probabilidade == 2) {
            $exibir_probabilidade = 'Improvável';
        }
        if ($exibir_probabilidade == 3) {
            $exibir_probabilidade = 'Possível';
        }
        if ($exibir_probabilidade == 4) {
            $exibir_probabilidade = 'Provável';
        }
        if ($exibir_probabilidade == 5) {
            $exibir_probabilidade = 'Quase Certo';
        }


        if ($exibir_impacto == 0) {
            $exibir_impacto = 'Insignificante';
        }
        if ($exibir_impacto == 5) {
            $exibir_impacto = 'Baixo';
        }
        if ($exibir_impacto == 8) {
            $exibir_impacto = 'Moderado';
        }
        if ($exibir_impacto == 17) {
            $exibir_impacto = 'Alto';
        }
        if ($exibir_impacto == 27) {
            $exibir_impacto = 'Muito Alto';
        }
        if ($exibir_impacto == 40) {
            $exibir_impacto = 'Catastrófico';
        }

        $nivel = $registros_avaliacao['nivel'];
        if ($nivel == 'Aceitável') {
            $cor_nivel = '#41841E';
        };
        if ($nivel == 'Sério') {
            $cor_nivel = '#E58C2C';
        };
        if ($nivel == 'Significativo') {
            $cor_nivel = '#F2E70A';
        };
        if ($nivel == 'Inaceitável') {
            $cor_nivel = '#FF0000';
        };


        ?>

        <input type="hidden" id="codigo_matriz" name="codigo_matriz" value="<?php echo $codigo_matriz ?>">
        <input type="hidden" id="classif_risco" name="classif_risco" value="<?php echo $classi_risco ?>">

        <div class="col-md-4">
            <label>Probabilidade</label>

            <select class="form-control" name="cad-probabilidade-residual" id="cad-probabilidade-residual" onChange="Calcular2()">
                <option value="1" <?php if ($exibir_probabilidade1 == 1) { ?> selected <?php } ?>>Rara</option>

                <option value="2" <?php if ($exibir_probabilidade1 == 2) { ?> selected <?php } ?>>Improvável</option>

                <option value="3" <?php if ($exibir_probabilidade1 == 3) { ?> selected <?php } ?>>Possível</option>

                <option value="4" <?php if ($exibir_probabilidade1 == 4) { ?> selected <?php } ?>>Provável</option>

                <option value="5" <?php if ($exibir_probabilidade1 == 5) { ?> selected <?php } ?>>Quase certo</option>
            </select>
        </div>

        <div class="col-md-4">
            <label>Impacto</label>

            <select class="form-control" name="cad-impacto-residual" id="cad-impacto-residual" onChange="Calcular2()">

                <option value="5" <?php if ($exibir_impacto1 == 5) { ?> selected <?php } ?>>Insignificante</option>
                <option value="8" <?php if ($exibir_impacto1 == 8) { ?> selected <?php } ?>>Baixo</option>
                <option value="17" <?php if ($exibir_impacto1 == 17) { ?> selected <?php } ?>>Moderado</option>
                <option value="27" <?php if ($exibir_impacto1 == 27) { ?> selected <?php } ?>>Alto</option>
                <option value="40" <?php if ($exibir_impacto1 == 40) { ?> selected <?php } ?>>Catastrófico</option>
            </select>
        </div>

        <div class="col-md-4">
            <label>Nível do Risco</label>

            <input type="text" name="cad-nivel-do-risco-residual" id="cad-nivel-do-risco-residual" readonly value="<?php echo $nivel ?>">
        </div>

        <?php

        $selecao_itens = mysqli_query($conexao, "select * from tabela_itens_parametrizacao WHERE codigo_parametrizacao='$classifi' and checkbox='s'");
        while ($registros_itens = mysqli_fetch_array($selecao_itens)) {
            $item = $registros_itens['item'];

            mysqli_query($conexao, "SET NAMES 'utf8'");
            mysqli_query($conexao, 'SET character_set_connection=utf8');
            mysqli_query($conexao, 'SET character_set_client=utf8');
            mysqli_query($conexao, 'SET character_set_results=utf8');
            $selecao_impacto = mysqli_query($conexao, "select * from tipo_impacto WHERE id='$item' ");
            $registros_impacto = mysqli_fetch_array($selecao_impacto);
            $numer = mysqli_num_rows($selecao_impacto);
            $registros_item = $registros_impacto['item'];

            if ($numer > 1) {
                if ($registros_item == 'Operacional/Estratégica') {
                    $registros_item = 'Op. Estratégica ';
                }

        ?>


                <div class="col-md-4">

                    <input type="hidden" id="titulos[]" name="titulos[]" value="<?php echo $registros_item ?>">

                    <label><?php echo $registros_item ?></label>

                    <select class="form-control" name="residual[]" id="cad-<?php echo $registros_impacto['id']; ?>" onChange="CoresNiveis('cad-<?php echo $registros_impacto['id']; ?>')">
                        <option value="0">Escolher</option>
                        <option value="1">Baixa</option>
                        <option value="2">Média</option>
                        <option value="3">Alta</option>
                        <option value="4">Muito Alta</option>

                    </select>
                </div>



        <?php }
        } ?>






        <div class="col-md-5 mt-3">
            <label>Decisão de Tratamento do Risco</label>




            <select class="form-control form-cores" name="cad-decisao-avaliacao" id="cad-decisao-avaliacao">
                <option value="0">Escolher</option>
                <?php
                mysqli_query($conexao, "SET NAMES 'utf8'");
                mysqli_query($conexao, 'SET character_set_connection=utf8');
                mysqli_query($conexao, 'SET character_set_client=utf8');
                mysqli_query($conexao, 'SET character_set_results=utf8');
                $selecao3 = mysqli_query($conexao, "select * from medida_tratamento");
                while ($registros3 = mysqli_fetch_array($selecao3)) {
                ?>


                    <option><?php echo $registros3['descricao'] ?></option>
                <?php } ?>

            </select>
        </div>



        <div class="col-md-12 mt-3">
            <input type="submit" class="btn btn-primary" value="Atualizar Risco Residual">

        </div>



    </div>

</form>

<script>
    Calcular2()
</script>