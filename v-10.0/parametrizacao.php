<?php
$nav_menu_principal = 'gestaoderisco';
$nav_menu_pagina = 'parametrizacao';

@$variavel = $_REQUEST['var'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit=no">
    <title>Dashboard Philos</title>
    <link rel="stylesheet" type="text/css" href="bibliotecas/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bibliotecas/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/sb-admin.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="shortcut icon" href="imgs/favicon2.fw.png" />
</head>



<body class=" fixed-nav sticky-footer" id="page-top">
    <!-- Navegação !-->
    <?php
    include('menu.php');
    mysqli_query($conexao, "SET NAMES 'utf8'");
    mysqli_query($conexao, 'SET character_set_connection=utf8');
    mysqli_query($conexao, 'SET character_set_client=utf8');
    mysqli_query($conexao, 'SET character_set_results=utf8');
    ?>
    <!-- Navegação !-->
    <input type="hidden" id="valor-variavel" value="<?php echo $variavel ?>">
    <form action="processa-cadastro-empresa.php" method="post">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row mb-5" style="margin-top: -16px; ">
                    <div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">

                        <div class="row">
                            <div class="col-md-9">
                                <a href="dashboard.php"><span class="text-white breadcrumb-item">Dashboard | Parametrização</span></a>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-12">



                        <div class="row ml-4 mr-4 mt-4">

                            <div class="col-md-12 text-center">

                                <?php
                                $verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='25' and codigo_grupo='$cod_grupo' and ler='1' ");
                                $numero_grupo = mysqli_num_rows($verificar_grupo);
                                if ($numero_grupo >= 1) {    ?>

                                    <input type="button" class="btn btn-primary ml-2 mr-2 pointer" id="btn3" onClick="Abas(3)" value="Tipo de Impacto">

                                <?php } ?>

                                <?php
                                $verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='25' and codigo_grupo='$cod_grupo' and ler='1' ");
                                $numero_grupo = mysqli_num_rows($verificar_grupo);
                                if ($numero_grupo >= 1) {    ?>

                                    <input type="button" class="btn btn-light ml-2 mr-2 pointer" id="btn1" onClick="Abas(1)" value="Classificação de Riscos Corporativos">

                                <?php } ?>


                                <?php
                                $verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='27' and codigo_grupo='$cod_grupo' and ler='1' ");
                                $numero_grupo = mysqli_num_rows($verificar_grupo);
                                if ($numero_grupo >= 1) {    ?>

                                    <input type="button" class="btn btn-light ml-2 mr-2 pointer" id="btn2" onClick="Abas(2)" value="Matriz Probabilidade Impacto">

                                <?php } ?>


                                <?php
                                $verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='28' and codigo_grupo='$cod_grupo' and ler='1' ");
                                $numero_grupo = mysqli_num_rows($verificar_grupo);
                                if ($numero_grupo >= 1) {    ?>
                                    <input type="button" class="btn btn-light ml-2 mr-2 pointer" id="btn4" onClick="Abas(4)" value="Medidas de Tratamento">
                                <?php } ?>

                                <?php
                                $verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='29' and codigo_grupo='$cod_grupo' and ler='1' ");
                                $numero_grupo = mysqli_num_rows($verificar_grupo);
                                if ($numero_grupo >= 1) {    ?>
                                    <!-- <input type="button" class="btn btn-light ml-2 mr-2 pointer" id="btn10" onClick="Abas(10)" value="SWOT"> -->
                                <?php } ?>







                            </div>
                        </div>


                        <div id="conteudo1">
                            <h3 class="mb-4 mt-5 mb-4 ml-4 mr-4">Classificação de Riscos </h3>
                            <form id="formulario-parametrizacao">
                                <div class="row ml-4">
                                    <div class="col-md-6">

                                        <div class="row mt-4">

                                            <div class="col-md-6">
                                                <label>Nome</label>
                                                <input type="text" class="form-control" name="cad-nome" id="cad-nome">
                                            </div>



                                        </div>
                                    </div>


                                    <div class="col-md-12 mt-5 mb-3">
                                        <div class="row ml-2">

                                            <?php
                                            mysqli_query($conexao, "SET NAMES 'utf8'");
                                            mysqli_query($conexao, 'SET character_set_connection=utf8');
                                            mysqli_query($conexao, 'SET character_set_client=utf8');
                                            mysqli_query($conexao, 'SET character_set_results=utf8');
                                            $selecao_itens_riscos_corporativos = mysqli_query($conexao, "select * from tipo_impacto");
                                            while ($registros = mysqli_fetch_array($selecao_itens_riscos_corporativos)) {
                                            ?>

                                                <input type="checkbox" name="cad-itens[]" id="cad-itens[]" class="checkbox" value="<?php echo $registros['id'] ?>">&nbsp;&nbsp; <?php echo $registros['item'] ?>&nbsp;&nbsp;&nbsp;&nbsp;


                                            <?php } ?>



                                        </div>
                                    </div>


                                    <?php
                                    $verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='26' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
                                    $numero_grupo = mysqli_num_rows($verificar_grupo);
                                    if ($numero_grupo >= 1) {
                                    ?>

                                        <div class="col-md-12 mt-3">
                                            <input type="button" class="btn btn-primary" value="Gravar" onClick="GravarParametrizacao()">
                                        </div>
                                    <?php } ?>
                                    <div class="col-md-12 mt-5">

                                        <div id="resposta-parametrizacao"></div>

                                        <div id="carregar-parametrizacao"></div>


                                    </div>

                                </div>
                            </form>
                        </div>

                        <div id="conteudo2">
                            <div class="row ml-4 mr-4 mt-4">

                                <div class="col-md-12">
                                    <h3 class="mt-4">Cadastro de probabilidade impacto

                                        <?php
                                        $verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='27' and codigo_grupo='$cod_grupo' and editar='1' ");
                                        $numero_grupo = mysqli_num_rows($verificar_grupo);
                                        if ($numero_grupo >= 1) {
                                        ?>

                                            <a id="btn5" onClick="Abas(5)"><img src="imgs/icone-editar.png" width="30" height="30" alt="" /></a>

                                        <?php } ?>
                                    </h3>
                                </div>

                                <div class="col-md-12">
                                    <h4 class="mt-4">Impacto</h4>
                                    <p>Qual o impacto deste risco?</p>

                                </div>

                                <div class="col-md-12">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Nível</th>
                                            <th>Descrição</th>
                                            <th>Exemplos Detalhados</th>
                                        </tr>

                                        <?php
                                        mysqli_query($conexao, "SET NAMES 'utf8'");
                                        mysqli_query($conexao, 'SET character_set_connection=utf8');
                                        mysqli_query($conexao, 'SET character_set_client=utf8');
                                        mysqli_query($conexao, 'SET character_set_results=utf8');
                                        $selecao_impacto = mysqli_query($conexao, "select * from tabela_impacto");
                                        while ($registros_impacto = mysqli_fetch_array($selecao_impacto)) {
                                        ?>

                                            <tr>
                                                <td><?php echo $registros_impacto['nivel'] ?></td>
                                                <td><?php echo $registros_impacto['descricao'] ?></td>
                                                <td><?php echo $registros_impacto['exemplos'] ?></td>
                                            </tr>


                                        <?php } ?>
                                        <strong></strong>

                                    </table>
                                </div>



                                <div class="col-md-12">
                                    <h4 class="mt-4">Probabilidade</h4>
                                    <p>Qual a probabilidade do evento ocorrer?</p>

                                </div>


                                <div class="col-md-12">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Nível</th>
                                            <th>Descrição</th>
                                            <th>Exemplos Detalhados</th>
                                        </tr>


                                        <?php
                                        mysqli_query($conexao, "SET NAMES 'utf8'");
                                        mysqli_query($conexao, 'SET character_set_connection=utf8');
                                        mysqli_query($conexao, 'SET character_set_client=utf8');
                                        mysqli_query($conexao, 'SET character_set_results=utf8');
                                        $selecao_probabilidade = mysqli_query($conexao, "select * from tabela_probabilidade");


                                        while ($registros_probabilidade = mysqli_fetch_array($selecao_probabilidade)) {
                                        ?>

                                            <tr>
                                                <td><?php echo $registros_probabilidade['nivel'] ?></td>
                                                <td><?php echo $registros_probabilidade['descricao'] ?></td>
                                                <td><?php echo $registros_probabilidade['exemplos'] ?></td>
                                            </tr>

                                        <?php } ?>


                                    </table>
                                </div>


                                <div class="col-md-12 mt-4">
                                    <h4 class="mt-4">Nível do risco</h4>
                                    <p>Qual o nível do risco, com base no impacto e probabilidade de ocorrência?</p>

                                </div>





                                <div class="col-md-4 mt-4">


                                    <table class="table" style="position: absolute; bottom: 0">

                                        <tr>
                                            <th>
                                                <h5><strong>Probabilidade (p)</strong></h5>
                                            </th>
                                        </tr>





                                        <?php
                                        $selecao_tabela_impacto = mysqli_query($conexao, "select * from tabela_probabilidade order by nivel DESC");
                                        $a = 0;
                                        while ($registros_tabela_impacto = mysqli_fetch_array($selecao_tabela_impacto)) {
                                            $probabilidade[$a] = $registros_tabela_impacto['nivel'];



                                        ?>


                                            <tr>
                                                <td><?php echo $registros_tabela_impacto['descricao'] ?></td>
                                                <td><?php echo $registros_tabela_impacto['nivel'] ?></td>
                                            </tr>


                                        <?php $a = $a + 1;
                                        } ?>






                                    </table>

                                </div>

                                <div class="col-md-8">
                                    <h4 class="mb-4 mt-2">Impacto (I)</h4>
                                    <table class="table">
                                        <?php
                                        $selecao_tabela_impacto = mysqli_query($conexao, "select * from tabela_impacto");
                                        while ($registros_tabela_impacto = mysqli_fetch_array($selecao_tabela_impacto)) {
                                        ?>
                                            <th><?php echo $registros_tabela_impacto['descricao'] ?></th>

                                        <?php } ?>

                                        <tr>
                                            <?php
                                            $selecao_tabela_impacto = mysqli_query($conexao, "select * from tabela_impacto");
                                            $a = 0;
                                            while ($registros_tabela_impacto = mysqli_fetch_array($selecao_tabela_impacto)) {

                                                $impacto[$a] = $registros_tabela_impacto['nivel'];

                                            ?>
                                                <th><?php echo $registros_tabela_impacto['nivel'] ?></th>

                                            <?php $a = $a + 1;
                                            }  ?>

                                        </tr>


                                        <tr>
                                            <td bgcolor="#F4EB3B"><?php echo $impacto[0] * $probabilidade[0] ?></td>
                                            <td bgcolor="#EAA356"><?php echo $impacto[1] * $probabilidade[0] ?></td>
                                            <td bgcolor="#EAA356"><?php echo $impacto[2] * $probabilidade[0] ?></td>
                                            <td bgcolor="#FF3333"><?php echo $impacto[3] * $probabilidade[0] ?></td>
                                            <td bgcolor="#FF3333"><?php echo $impacto[4] * $probabilidade[0] ?></td>
                                        </tr>

                                        <tr>
                                            <td bgcolor="#F4EB3B"><?php echo $impacto[0] * $probabilidade[1] ?></td>
                                            <td bgcolor="#F4EB3B"><?php echo $impacto[1] * $probabilidade[1] ?></td>
                                            <td bgcolor="#EAA356"><?php echo $impacto[2] * $probabilidade[1] ?></td>
                                            <td bgcolor="#FF3333"><?php echo $impacto[3] * $probabilidade[1] ?></td>
                                            <td bgcolor="#FF3333"><?php echo $impacto[4] * $probabilidade[1] ?></td>
                                        </tr>

                                        <tr>
                                            <td bgcolor="#679C4B"><?php echo $impacto[0] * $probabilidade[2] ?></td>
                                            <td bgcolor="#F4EB3B"><?php echo $impacto[1] * $probabilidade[2] ?></td>
                                            <td bgcolor="#EAA356"><?php echo $impacto[2] * $probabilidade[2] ?></td>
                                            <td bgcolor="#EAA356"><?php echo $impacto[3] * $probabilidade[2] ?></td>
                                            <td bgcolor="#FF3333"><?php echo $impacto[4] * $probabilidade[2] ?></td>
                                        </tr>

                                        <tr>
                                            <td bgcolor="#679C4B"><?php echo $impacto[0] * $probabilidade[3] ?></td>
                                            <td bgcolor="#679C4B"><?php echo $impacto[1] * $probabilidade[3] ?></td>
                                            <td bgcolor="#F4EB3B"><?php echo $impacto[2] * $probabilidade[3] ?></td>
                                            <td bgcolor="#EAA356"><?php echo $impacto[3] * $probabilidade[3] ?></td>
                                            <td bgcolor="#EAA356"><?php echo $impacto[4] * $probabilidade[3] ?></td>
                                        </tr>

                                        <tr>
                                            <td bgcolor="#679C4B"><?php echo $impacto[0] * $probabilidade[4] ?></td>
                                            <td bgcolor="#679C4B"><?php echo $impacto[1] * $probabilidade[4] ?></td>
                                            <td bgcolor="#F4EB3B"><?php echo $impacto[2] * $probabilidade[4] ?></td>
                                            <td bgcolor="#F4EB3B"><?php echo $impacto[3] * $probabilidade[4] ?></td>
                                            <td bgcolor="#EAA356"><?php echo $impacto[4] * $probabilidade[4] ?></td>
                                        </tr>


                                    </table>

                                </div>



                                <div class="col-md-12 mt-5">

                                    <table class="table">
                                        <tr>
                                            <th>Nível</th>
                                            <th></th>
                                            <th>Tratamento dos riscos</th>
                                        </tr>

                                        <tr>
                                            <td>De: 0 Até: 16</td>
                                            <td bgcolor="#679C4B">Aceitável</td>
                                            <td>Manter controles existentes</td>
                                        </tr>

                                        <tr>
                                            <td>De: 17 Até: 34</td>
                                            <td bgcolor="#F4EB3B">Significativo</td>
                                            <td>Avaliar a necessidade de novos controles ou ampliar as ações sobre os existentes
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>De: 40 Até: 85</td>
                                            <td bgcolor="#EAA356">Sério</td>
                                            <td>Implementar novos controles ou melhorar os existentes
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>De: 108 Até: 200</td>
                                            <td bgcolor="#FF3333">Inaceitável</td>
                                            <td>Ação devem ser implementadas imediatamente
                                            </td>
                                        </tr>



                                    </table>

                                </div>



                            </div>
                        </div>

                        <div id="conteudo3">
                            <div class="row ml-4 mr-4 mt-4">
                                <div class="col-md-12">
                                    <h3 class="mb-5 mt-4">Grupo de Impacto</h3>
                                </div>

                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Item</label>
                                            <input type="text" class="form-control" name="cad-item-impacto" id="cad-item-impacto">
                                        </div>

                                        <div class="col-md-6">
                                            <label>Descrição</label>
                                            <input type="text" class="form-control" name="cad-descricao-impacto" id="cad-descricao-impacto">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-7">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <label style="color:#5B953D">Baixa</label>
                                            <input type="text" class="form-control" name="cad-baixa-impacto" id="cad-baixa-impacto">
                                        </div>

                                        <div class="col-md-3">
                                            <label style="color:#CCBF3B">Média</label>
                                            <input type="text" class="form-control" name="cad-media-impacto" id="cad-media-impacto">
                                        </div>

                                        <div class="col-md-3">
                                            <label style="color:#F47171">Alta</label>
                                            <input type="text" class="form-control" name="cad-alta-impacto" id="cad-alta-impacto">
                                        </div>

                                        <div class="col-md-3">
                                            <label style="color:#FF042B">Muito Alta</label>
                                            <input type="text" class="form-control" name="cad-muito-alta-impacto" id="cad-muito-alta-impacto">
                                        </div>



                                    </div>
                                </div>
                                <div id="resposta-item-impacto"></div>
                                <div class="col-md-12 mt-3">
                                    <?php
                                    $verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='25' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
                                    $numero_grupo = mysqli_num_rows($verificar_grupo);
                                    if ($numero_grupo >= 1) {
                                    ?>
                                        <input type="button" class="btn btn-primary" value="Gravar" onClick="GravarTipoImpacto()">

                                    <?php } ?>
                                </div>


                                <div class="col-md-12 mt-5">

                                    <div id="carregar-tipo-impacto"></div>
                                </div>


                            </div>
                        </div>

                        <div id="conteudo4">
                            <div class="row ml-4 mr-4 mt-4">
                                <div class="col-md-12">
                                    <h3 class="mb-5 mt-4">Medidas de Tratamento</h3>
                                </div>

                                <div id="carregar-sequencia" class="col-md-4">
                                </div>

                                <div class="col-md-4">
                                    <label>Descrição</label>
                                    <input type="text" class="form-control" name="cad-descricao-tratamento" id="cad-descricao-tratamento">
                                </div>

                                <div class="col-md-4">
                                    <label>&nbsp;</label>

                                    <?php
                                    $verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='28' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
                                    $numero_grupo = mysqli_num_rows($verificar_grupo);
                                    if ($numero_grupo >= 1) {
                                    ?>


                                        <input type="button" class="btn btn-primary" value="Gravar" onClick="GravarMedidaTratamento()">

                                    <?php } ?>

                                </div>

                                <div class="col-md-12 mt-5">
                                    <div id="carregar-medida-tratamento">
                                    </div>

                                </div>


                            </div>
                        </div>




                        <div id="conteudo5">

                            <form action="processa-atualizar-parametrizacao.php" method="post">
                                <div class="row ml-4 mr-4 mt-4">

                                    <div class="col-md-12">
                                        <input type="button" class="btn btn-primary" value="Voltar" onClick="Abas(2)"><br>
                                        <h3 class="mt-4">Editar probabilidade impacto </h3>
                                    </div>

                                    <div class="col-md-12">
                                        <h4 class="mt-4">Impacto</h4>
                                        <p>Qual o impacto deste risco?</p>

                                    </div>

                                    <div class="col-md-12">
                                        <table class="table">
                                            <tr>
                                                <th width="10%">Nível</th>
                                                <th>Descrição</th>
                                                <th>Exemplos Detalhados</th>
                                            </tr>

                                            <?php
                                            mysqli_query($conexao, "SET NAMES 'utf8'");
                                            mysqli_query($conexao, 'SET character_set_connection=utf8');
                                            mysqli_query($conexao, 'SET character_set_client=utf8');
                                            mysqli_query($conexao, 'SET character_set_results=utf8');
                                            $selecao_impacto = mysqli_query($conexao, "select * from tabela_impacto");
                                            $var2 = 1;
                                            while ($registros_impacto = mysqli_fetch_array($selecao_impacto)) {
                                            ?>

                                                <tr>
                                                    <td><input type="text" class="form-control" name="nivel_impacto_<?php echo $var2 ?>" value="<?php echo $registros_impacto['nivel'] ?>"></td>
                                                    <td><input type="text" class="form-control" name="descricao_impacto_<?php echo $var2 ?>" value="<?php echo $registros_impacto['descricao'] ?>"></td>
                                                    <td><input type="text" class="form-control" name="exemplos_impacto_<?php echo $var2 ?>" value="<?php echo $registros_impacto['exemplos'] ?>"></td>
                                                </tr>

                                            <?php $var2 = $var2 + 1;
                                            } ?>



                                        </table>
                                    </div>



                                    <div class="col-md-12">
                                        <h4 class="mt-4">Probabilidade</h4>
                                        <p>Qual a probabilidade do evento ocorrer?</p>

                                    </div>


                                    <div class="col-md-12">
                                        <table class="table">
                                            <tr>
                                                <th width="10%">Nível</th>
                                                <th>Descrição</th>
                                                <th>Exemplos Detalhados</th>
                                            </tr>

                                            <?php
                                            mysqli_query($conexao, "SET NAMES 'utf8'");
                                            mysqli_query($conexao, 'SET character_set_connection=utf8');
                                            mysqli_query($conexao, 'SET character_set_client=utf8');
                                            mysqli_query($conexao, 'SET character_set_results=utf8');
                                            $selecao_probabilidade = mysqli_query($conexao, "select * from tabela_probabilidade");
                                            $var = 1;
                                            while ($registros_probabilidade = mysqli_fetch_array($selecao_probabilidade)) {
                                            ?>

                                                <tr>
                                                    <td><input type="text" class="form-control" name="nivel_<?php echo $var; ?>" value="<?php echo $registros_probabilidade['nivel'] ?>"></td>
                                                    <td><input type="text" class="form-control" name="descricao_<?php echo $var; ?>" value="<?php echo $registros_probabilidade['descricao'] ?>"></td>
                                                    <td><input type="text" class="form-control" name="exemplos_<?php echo $var; ?>" value="<?php echo $registros_probabilidade['exemplos'] ?>"></td>
                                                </tr>

                                            <?php $var = $var + 1;
                                            } ?>



                                        </table>
                                    </div>

                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-primary" value="Atualizar">
                                    </div>

                            </form>
                        </div>

                    </div>

                    <div id="conteudo6">
                        <div class="row ml-4 mr-4 mt-5">

                            <div class="col-md-12 mt-4 mb-5">
                                <h3>MATRIZ DE IMPACTO X TEMPO <a id="btn5" onClick="Abas(7)"><img src="imgs/icone-editar.png" width="30" height="30" alt="" /></a></h3>
                            </div>

                            <div class="col-md-3 mt-4">

                                <table class="table" style="position: absolute; bottom: 0">
                                    <tr>
                                        <th>
                                            <h5><strong>Impacto nos negócios</strong></h5>
                                        </th>
                                    </tr>

                                    <tr>
                                        <td>Quase certo</td>
                                        <td>5</td>
                                    </tr>

                                    <tr>
                                        <td>Provável</td>
                                        <td>4</td>
                                    </tr>

                                    <tr>
                                        <td>Possível</td>
                                        <td>3</td>
                                    </tr>

                                    <tr>
                                        <td>Improvável</td>
                                        <td>2</td>
                                    </tr>

                                    <tr>
                                        <td>Rara</td>
                                        <td>1</td>
                                    </tr>
                                </table>

                            </div>

                            <div class="col-md-9">
                                <h6 class="mb-4 mt-2"><strong>Tempo(Requisitos para recuperação)</strong></h6>
                                <table class="table">
                                    <tr>
                                        <td>Insignificante</td>
                                        <td>Baixo</td>
                                        <td>Moderado</td>
                                        <td>Alto</td>
                                        <td>Catástrófico</td>
                                    </tr>

                                    <tr>
                                        <td>até 24horas</td>
                                        <td>de 24hs a 48hs (até 2 dias)</td>
                                        <td>de 2 a 7 dias (até 1 semana)</td>
                                        <td>de 7 a 14 dias (até 2 semanas)</td>
                                        <td>> 2 semanas</td>
                                    </tr>

                                    <tr>
                                        <td bgcolor="#EDEDED" align="center">5</td>
                                        <td bgcolor="#EDEDED" align="center">8</td>
                                        <td bgcolor="#EDEDED" align="center">17</td>
                                        <td bgcolor="#EDEDED" align="center">27</td>
                                        <td bgcolor="#EDEDED" align="center">40</td>
                                    </tr>

                                    <tr>
                                        <td bgcolor="#F4EB3B" align="center">25</td>
                                        <td bgcolor="#EAA356" align="center">40</td>
                                        <td bgcolor="#EAA356" align="center">85</td>
                                        <td bgcolor="#FF3333" align="center">135</td>
                                        <td bgcolor="#FF3333" align="center">200</td>
                                    </tr>

                                    <tr>
                                        <td bgcolor="#F4EB3B" align="center">20</td>
                                        <td bgcolor="#F4EB3B" align="center">32</td>
                                        <td bgcolor="#EAA356" align="center">68</td>
                                        <td bgcolor="#FF3333" align="center">108</td>
                                        <td bgcolor="#FF3333" align="center">160</td>
                                    </tr>

                                    <tr>
                                        <td bgcolor="#679C4B" align="center">15</td>
                                        <td bgcolor="#F4EB3B" align="center">24</td>
                                        <td bgcolor="#EAA356" align="center">51</td>
                                        <td bgcolor="#EAA356" align="center">81</td>
                                        <td bgcolor="#FF3333" align="center">120</td>
                                    </tr>

                                    <tr>
                                        <td bgcolor="#679C4B" align="center">10</td>
                                        <td bgcolor="#679C4B" align="center">16</td>
                                        <td bgcolor="#F4EB3B" align="center">34</td>
                                        <td bgcolor="#EAA356" align="center">54</td>
                                        <td bgcolor="#EAA356" align="center">80</td>
                                    </tr>

                                    <tr>
                                        <td bgcolor="#679C4B" align="center">5</td>
                                        <td bgcolor="#679C4B" align="center">8</td>
                                        <td bgcolor="#F4EB3B" align="center">17</td>
                                        <td bgcolor="#F4EB3B" align="center">27</td>
                                        <td bgcolor="#EAA356" align="center">40</td>
                                    </tr>


                                </table>

                            </div>






                            <div class="col-md-5 mt-5 align-bottom ">
                                <h4>Escala de Impacto</h4>
                                <table class="table">
                                    <tr>
                                        <th class="bg-white">Impacto nos Negócios - Nível</th>
                                        <th class="bg-white"></th>
                                    </tr>

                                    <tr>
                                        <th>Nível</th>
                                        <th class="bg-white">Descrição(Editável)</th>
                                    </tr>

                                    <tr>
                                        <td>5</td>
                                        <td class="bg-white">Quase Certo</td>
                                    </tr>

                                    <tr>
                                        <td>4</td>
                                        <td class="bg-white">Provável</td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td class="bg-white">Possível</td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td class="bg-white">Improvável</td>
                                    </tr>

                                    <tr>
                                        <td>1</td>
                                        <td class="bg-white">Raro</td>
                                    </tr>

                                </table>

                            </div>

                            <div class="col-md-2"></div>

                            <div class="col-md-5 mt-5">
                                <h4>Escala de Tempo</h4>
                                <table class="table">
                                    <tr>
                                        <th class="bg-white">Requisitos para recuperação - Tempo</th>
                                        <th class="bg-white"></th>
                                    </tr>

                                    <tr>
                                        <th>Nível</th>
                                        <th class="bg-white">Descrição(Editável)</th>
                                    </tr>

                                    <tr>
                                        <td>5</td>
                                        <td class="bg-white">Insignificante</td>
                                    </tr>

                                    <tr>
                                        <td>8</td>
                                        <td class="bg-white">Baixo</td>
                                    </tr>

                                    <tr>
                                        <td>17</td>
                                        <td class="bg-white">Moderado</td>
                                    </tr>

                                    <tr>
                                        <td>27</td>
                                        <td class="bg-white">Alto</td>
                                    </tr>

                                    <tr>
                                        <td>40</td>
                                        <td class="bg-white">Catastrófico</td>
                                    </tr>

                                </table>

                            </div>




                            <div class="col-md-12 mt-5">

                                <table class="table">
                                    <tr>
                                        <th>Nível de Criticidade</th>
                                        <th></th>
                                        <th>Recomendações de Ações</th>
                                    </tr>

                                    <tr>
                                        <td>NR ≤ 15</td>
                                        <td bgcolor="#679C4B" align="center">Aceitável</td>
                                        <td>Processo com baixa criticidade - baixo impacto nos negócios.<br>
                                            As ações poderão ser aplicadas quando os processos críticos estiverem controlados.</td>
                                    </tr>

                                    <tr>
                                        <td>15 ≤ NR ≤ 34</td>
                                        <td bgcolor="#F4EB3B" align="center">Significativo</td>
                                        <td>Processo considerado crítico. Plano de ação deve ser proposto.
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>34 ≤ NR ≤ 85</td>
                                        <td bgcolor="#EAA356" align="center">Sério</td>
                                        <td>Processo considerado moderadamente crítico. Plano de ação deve ser proposto.
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>85 ≤ NR ≤ 200</td>
                                        <td bgcolor="#FF3333" align="center">Inaceitável</td>
                                        <td>Processo considerado altamente crítico. Plano de ação deve ser proposto urgentemente.
                                        </td>
                                    </tr>



                                </table>

                            </div>



                        </div>
                    </div>



                    <div id="conteudo7">
                        <div class="row ml-4 mr-4 mt-5">

                            <div class="col-md-12 mt-4 mb-5">
                                <h3>EDITAR MATRIZ DE IMPACTO X TEMPO </h3>
                            </div>

                            <div class="col-md-3 mt-5 align-bottom" style="vertical-align: bottom;">
                                <h5 class="mt-5"><strong>Impacto nos negócios</strong></h5>
                                <table class="table align-bottom" style="vertical-align: bottom; position: absolute; bottom: 0">

                                    <?php
                                    $selecao_tabela_impacto = mysqli_query($conexao, "select * from tabela_impacto_negocios");
                                    while ($registros_tabela_impacto = mysqli_fetch_array($selecao_tabela_impacto)) {
                                    ?>

                                        <tr valign="bottom">
                                            <td valign="bottom"><?php echo $registros_tabela_impacto['numero']  ?></td>
                                            <td valign="bottom"><input type="text" class="form-control" value="<?php echo $registros_tabela_impacto['impacto']  ?>"></td>
                                        </tr>

                                    <?php } ?>

                                </table>

                            </div>

                            <div class="col-md-9">
                                <h6 class="mb-4 mt-2"><strong>Tempo(Requisitos para recuperação)</strong></h6>
                                <table class="table">
                                    <tr>
                                        <?php
                                        $selecao_tabela_impacto = mysqli_query($conexao, "select * from tabela_requisitos_recuperacao");
                                        while ($registros_tabela_impacto = mysqli_fetch_array($selecao_tabela_impacto)) {
                                        ?>


                                            <td><input type="text" class="form-control" value="<?php echo $registros_tabela_impacto['nivel'] ?>"></td>


                                        <?php } ?>
                                    </tr>

                                    <tr>
                                        <?php
                                        $selecao_tabela_impacto = mysqli_query($conexao, "select * from tabela_requisitos_recuperacao");
                                        while ($registros_tabela_impacto = mysqli_fetch_array($selecao_tabela_impacto)) {
                                        ?>


                                            <td><input type="text" class="form-control" value="<?php echo $registros_tabela_impacto['descricao'] ?>"></td>


                                        <?php } ?>
                                    </tr>

                                    <tr>
                                        <th bgcolor="#EDEDED">5</th>
                                        <th bgcolor="#EDEDED">8</th>
                                        <th bgcolor="#EDEDED">17</th>
                                        <th bgcolor="#EDEDED">27</th>
                                        <th bgcolor="#EDEDED">40</th>
                                    </tr>

                                    <tr>
                                        <td bgcolor="#F4EB3B">25</td>
                                        <td bgcolor="#EAA356">40</td>
                                        <td bgcolor="#EAA356">85</td>
                                        <td bgcolor="#FF3333">135</td>
                                        <td bgcolor="#FF3333">200</td>
                                    </tr>

                                    <tr>
                                        <td bgcolor="#F4EB3B">20</td>
                                        <td bgcolor="#F4EB3B">32</td>
                                        <td bgcolor="#EAA356">68</td>
                                        <td bgcolor="#FF3333">108</td>
                                        <td bgcolor="#FF3333">160</td>
                                    </tr>

                                    <tr>
                                        <td bgcolor="#679C4B">15</td>
                                        <td bgcolor="#F4EB3B">24</td>
                                        <td bgcolor="#EAA356">51</td>
                                        <td bgcolor="#EAA356">81</td>
                                        <td bgcolor="#FF3333">120</td>
                                    </tr>

                                    <tr>
                                        <td bgcolor="#679C4B">10</td>
                                        <td bgcolor="#679C4B">16</td>
                                        <td bgcolor="#F4EB3B">34</td>
                                        <td bgcolor="#EAA356">54</td>
                                        <td bgcolor="#EAA356">80</td>
                                    </tr>

                                    <tr>
                                        <td bgcolor="#679C4B">5</td>
                                        <td bgcolor="#679C4B">8</td>
                                        <td bgcolor="#F4EB3B">17</td>
                                        <td bgcolor="#F4EB3B">27</td>
                                        <td bgcolor="#EAA356">40</td>
                                    </tr>


                                </table>

                            </div>






                            <div class="col-md-5 mt-5 align-bottom ">
                                <h4>Escala de Impacto</h4>
                                <table class="table">

                                    <?php
                                    $selecao_tabela_impacto = mysqli_query($conexao, "select * from tabela_escala_impacto");
                                    while ($registros_tabela_impacto = mysqli_fetch_array($selecao_tabela_impacto)) {
                                    ?>

                                        <tr>
                                            <td><?php echo $registros_tabela_impacto['nivel']  ?></td>
                                            <td><input type="text" class="form-control" value="<?php echo $registros_tabela_impacto['descricao']  ?>"></td>
                                        </tr>

                                    <?php } ?>

                                </table>

                            </div>

                            <div class="col-md-2"></div>

                            <div class="col-md-5 mt-5">
                                <h4>Escala de Tempo</h4>
                                <table class="table">

                                    <?php
                                    $selecao_tabela_impacto = mysqli_query($conexao, "select * from tabela_escala_tempo");
                                    while ($registros_tabela_impacto = mysqli_fetch_array($selecao_tabela_impacto)) {
                                    ?>

                                        <tr>
                                            <td><?php echo $registros_tabela_impacto['nivel']  ?></td>
                                            <td><input type="text" class="form-control" value="<?php echo $registros_tabela_impacto['descricao']  ?>"></td>
                                        </tr>

                                    <?php } ?>

                                </table>

                            </div>




                            <div class="col-md-12 mt-5">

                                <table class="table">
                                    <tr>
                                        <th>Nível de Criticidade</th>
                                        <th></th>
                                        <th>Recomendações de Ações</th>
                                    </tr>

                                    <tr>
                                        <td>NR ≤ 15</td>
                                        <td bgcolor="#679C4B">Aceitável</td>
                                        <td>Processo com baixa criticidade - baixo impacto nos negócios.<br>
                                            As ações poderão ser aplicadas quando os processos críticos estiverem controlados.</td>
                                    </tr>

                                    <tr>
                                        <td>15 ≤ NR ≤ 34</td>
                                        <td bgcolor="#F4EB3B">Significativo</td>
                                        <td>Processo considerado crítico. Plano de ação deve ser proposto.
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>34 ≤ NR ≤ 85</td>
                                        <td bgcolor="#EAA356">Sério</td>
                                        <td>Processo considerado moderadamente crítico. Plano de ação deve ser proposto.
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>85 ≤ NR ≤ 200</td>
                                        <td bgcolor="#FF3333">Inaceitável</td>
                                        <td>Processo considerado altamente crítico. Plano de ação deve ser proposto urgentemente.
                                        </td>
                                    </tr>



                                </table>

                            </div>

                            <div class="col-md-12 mt-5">
                                <input type="button" class="btn btn-primary" value="Atualizar Dados">
                            </div>

                        </div>

                    </div>



                    <div id="conteudo10">
                        <div class="row ml-4 mr-4 mt-5">
                            <form id="form-fatores-internos">
                                <div class="col-md-10 mt-4">
                                    <table class="table">
                                        <tr>
                                            <th>FATORES INTERNOS</th>
                                            <th colspan="3" style="text-align: center" bgcolor="#C6C6C6">ATENDIMENTO</th>

                                        </tr>

                                        <tr>
                                            <td bgcolor="#C6C6C6"><strong>IMPORTÂNCIA</strong></td>
                                            <td align="center" bgcolor="#E3E3E3"><strong>Não Atende</strong></td>
                                            <td align="center" bgcolor="#E3E3E3"><strong>Atende Razoávelmente</strong></td>
                                            <td align="center" bgcolor="#E3E3E3"><strong>Atende Totalmente</strong></td>
                                        </tr>

                                        <tr>
                                            <td bgcolor="#E3E3E3"><strong>Muito Importante</strong></td>
                                            <td align="center" bgcolor="#E5E951">Fraqueza</td>
                                            <td align="center" bgcolor="#64A8E7">Força</td>
                                            <td align="center" bgcolor="#64A8E7">Força</td>
                                        </tr>

                                        <tr>
                                            <td bgcolor="#E3E3E3"><strong>Importante</strong></td>
                                            <td align="center" bgcolor="#E5E951">Fraqueza</td>
                                            <td align="center" bgcolor="#64A8E7">Força</td>
                                            <td align="center" bgcolor="#64A8E7">Força</td>
                                        </tr>


                                        <tr>
                                            <td bgcolor="#E3E3E3"><strong>Insignificante</strong></td>
                                            <td align="center">Neutro</td>
                                            <td align="center" bgcolor="#E5E951">Fraqueza</td>
                                            <td align="center" bgcolor="#E5E951">Fraqueza</td>
                                        </tr>

                                    </table>
                                </div>
                            </form>
                        </div>




                        <div class="row ml-4 mr-4 mt-5">

                            <div class="col-md-10">
                                <table class="table">

                                    <tr>
                                        <td bgcolor="#E3E3E3"><strong>CLASSIFICAÇÃO</strong></td>
                                        <td bgcolor="#E3E3E3"><strong>AÇÃO RECOMENDADA</strong></td>
                                    </tr>

                                    <tr>
                                        <td bgcolor="">Força</td>
                                        <td bgcolor="">
                                            Utilizar bem as forças para minimizar as ameaças identificadas. Não é necessário realizar o processo de avaliação de riscos para desenvolvimento de Plano de Ação.
                                        </td>
                                    </tr>


                                    <tr>
                                        <td bgcolor="">Fraqueza</td>
                                        <td bgcolor="">
                                            Aproveitar o máximo possível as oportunidades para intensificar os pontos fortes da empresa. Há necessidade de mapear os riscos existentes para desenvolver Plano de Ação.
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Neutro</td>
                                        <td>
                                            Nenhuma recomendação.
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>



                        <div class="row ml-4 mr-4 mt-5">

                            <div class="col-md-10">
                                <table class="table">
                                    <tr>
                                        <th>FATORES EXTERNOS</th>
                                        <th colspan="3" style="text-align: center" bgcolor="#C6C6C6">MOMENTO</th>

                                    </tr>

                                    <tr>
                                        <td bgcolor="#C6C6C6"><strong>IMPORTÂNCIA</strong></td>
                                        <td align="center" bgcolor="#E3E3E3"><strong>Desfavorável</strong></td>
                                        <td align="center" bgcolor="#E3E3E3"><strong>Favorável</strong></td>
                                        <td align="center" bgcolor="#E3E3E3"><strong>Neutro</strong></td>
                                    </tr>

                                    <tr>
                                        <td bgcolor="#E3E3E3"><strong>Muito Importante</strong></td>
                                        <td align="center" bgcolor="#FF2D31">Ameaça</td>
                                        <td align="center" bgcolor="#2DCD53">Oportunidade</td>
                                        <td align="center" bgcolor="#FF2D31">Ameaça</td>
                                    </tr>

                                    <tr>
                                        <td bgcolor="#E3E3E3"><strong>Importante</strong></td>
                                        <td align="center" bgcolor="#FF2D31">Ameaça</td>
                                        <td align="center" bgcolor="#2DCD53">Oportunidade</td>
                                        <td align="center" bgcolor="#FF2D31">Ameaça</td>
                                    </tr>


                                    <tr>
                                        <td bgcolor="#E3E3E3"><strong>Insignificante</strong></td>
                                        <td align="center">Neutro</td>
                                        <td align="center">Neutro</td>
                                        <td align="center">Neutro</td>
                                    </tr>

                                </table>
                            </div>
                        </div>


                        <div class="row ml-4 mr-4 mt-5">

                            <div class="col-md-10">
                                <table class="table">

                                    <tr>
                                        <td><strong>CLASSIFICAÇÃO</strong></td>
                                        <td><strong>AÇÃO RECOMENDADA</strong></td>
                                    </tr>

                                    <tr>
                                        <td bgcolor="#FF2D31">Ameaça</td>
                                        <td bgcolor="#FF2D31">
                                            Adotar estratégia que minimize as fraquezas para que as ameaças tenham menor efeito na empresa. Recomenda-se mapear possíveis riscos para desenvolver Plano de Ação.
                                        </td>
                                    </tr>


                                    <tr>
                                        <td bgcolor="#2DCD53">Oportunidade</td>
                                        <td bgcolor="#2DCD53">
                                            Aproveitar as oportunidades, tentando minimizar os efeitos das fraquezas existentes. A organização poderá livremente optar por desenvolver ou não um Plano de Ação em carácter preventivo.
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Neutro</td>
                                        <td>
                                            Nenhuma recomendação.
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>

                    </div>






                </div>
            </div>
        </div>

        </div>
    </form>

    <input type="hidden" id="codigo-risco-corporativo">
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999999999999999999999999999999">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Riscos Corporativos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row ml-4 mr-4 mt-4 mb-4">

                        <div id="carregar-editar-riscos"></div>





                    </div>
                </div>


            </div>
        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="ModalEditarImpacto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999999999">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row ml-4 mr-4">
                        <div id="resposta-editar-item">

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>



    <!-------------Contadores--------->
    <input type="hidden" value="1" id="contador_terceiros">
    <input type="hidden" value="1" id="contador_filiais">

    <script src="bibliotecas/jquery/jquery.min.js"></script>
    <script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin.min.js" type="text/javascript"></script>
    <script src="js/jquery.mask.min.js"></script>

    <script>
        $f = jQuery.noConflict()





        function Abas(codigo) {

            if (codigo == 1) {

                $f('#btn1').removeClass('btn-light')
                $f('#btn1').addClass('btn-primary')

                $f('#btn2').removeClass('btn-primary')
                $f('#btn3').removeClass('btn-primary')
                $f('#btn4').removeClass('btn-primary')
                $f('#btn5').removeClass('btn-primary')
                $f('#btn6').removeClass('btn-primary')
                $f('#btn7').removeClass('btn-primary')
                $f('#btn10').removeClass('btn-primary')

                $f('#conteudo1').show()

                $f('#conteudo2').hide()
                $f('#conteudo3').hide()
                $f('#conteudo4').hide()
                $f('#conteudo5').hide()
                $f('#conteudo6').hide()
                $f('#conteudo7').hide()
                $f('#conteudo10').hide()
            }

            if (codigo == 2) {

                $f('#conteudo2').show()

                $f('#conteudo1').hide()
                $f('#conteudo3').hide()
                $f('#conteudo4').hide()
                $f('#conteudo5').hide()
                $f('#conteudo6').hide()
                $f('#conteudo7').hide()
                $f('#conteudo10').hide()

                $f('#btn2').removeClass('btn-light')
                $f('#btn2').addClass('btn-primary')

                $f('#btn1').removeClass('btn-primary')
                $f('#btn3').removeClass('btn-primary')
                $f('#btn4').removeClass('btn-primary')
                $f('#btn5').removeClass('btn-primary')
                $f('#btn6').removeClass('btn-primary')
                $f('#btn7').removeClass('btn-primary')
                $f('#btn10').removeClass('btn-primary')
            }

            if (codigo == 3) {

                $f('#conteudo3').show()

                $f('#conteudo1').hide()
                $f('#conteudo2').hide()
                $f('#conteudo4').hide()
                $f('#conteudo5').hide()
                $f('#conteudo6').hide()
                $f('#conteudo7').hide()
                $f('#conteudo10').hide()

                $f('#btn3').removeClass('btn-light')
                $f('#btn3').addClass('btn-primary')

                $f('#btn1').removeClass('btn-primary')
                $f('#btn2').removeClass('btn-primary')
                $f('#btn4').removeClass('btn-primary')
                $f('#btn5').removeClass('btn-primary')
                $f('#btn6').removeClass('btn-primary')
                $f('#btn7').removeClass('btn-primary')
                $f('#btn10').removeClass('btn-primary')
            }


            if (codigo == 4) {

                $f('#conteudo4').show()

                $f('#conteudo1').hide()
                $f('#conteudo2').hide()
                $f('#conteudo3').hide()
                $f('#conteudo5').hide()
                $f('#conteudo6').hide()
                $f('#conteudo7').hide()
                $f('#conteudo10').hide()

                $f('#btn4').removeClass('btn-light')
                $f('#btn4').addClass('btn-primary')

                $f('#btn1').removeClass('btn-primary')
                $f('#btn2').removeClass('btn-primary')
                $f('#btn3').removeClass('btn-primary')
                $f('#btn5').removeClass('btn-primary')
                $f('#btn6').removeClass('btn-primary')
                $f('#btn7').removeClass('btn-primary')
                $f('#btn10').removeClass('btn-primary')
            }

            if (codigo == 5) {

                $f('#conteudo5').show()

                $f('#conteudo1').hide()
                $f('#conteudo2').hide()
                $f('#conteudo3').hide()
                $f('#conteudo4').hide()
                $f('#conteudo6').hide()
                $f('#conteudo7').hide()
                $f('#conteudo10').hide()

                $f('#btn5').removeClass('btn-light')
                $f('#btn5').addClass('btn-primary')

                $f('#btn1').removeClass('btn-primary')
                $f('#btn2').removeClass('btn-primary')
                $f('#btn3').removeClass('btn-primary')
                $f('#btn4').removeClass('btn-primary')
                $f('#btn6').removeClass('btn-primary')
                $f('#btn7').removeClass('btn-primary')
                $f('#btn10').removeClass('btn-primary')
            }


            if (codigo == 6) {

                $f('#conteudo6').show()

                $f('#conteudo5').hide()
                $f('#conteudo1').hide()
                $f('#conteudo2').hide()
                $f('#conteudo3').hide()
                $f('#conteudo4').hide()
                $f('#conteudo7').hide()
                $f('#conteudo10').hide()

                $f('#btn6').removeClass('btn-light')
                $f('#btn6').addClass('btn-primary')


                $f('#btn1').removeClass('btn-primary')
                $f('#btn2').removeClass('btn-primary')
                $f('#btn3').removeClass('btn-primary')
                $f('#btn4').removeClass('btn-primary')
                $f('#btn5').removeClass('btn-primary')
                $f('#btn7').removeClass('btn-primary')
                $f('#btn10').removeClass('btn-primary')
            }

            if (codigo == 7) {

                $f('#conteudo7').show()

                $f('#conteudo1').hide()
                $f('#conteudo2').hide()
                $f('#conteudo3').hide()
                $f('#conteudo4').hide()
                $f('#conteudo5').hide()
                $f('#conteudo6').hide()
                $f('#conteudo10').hide()



                $f('#btn1').removeClass('btn-primary')
                $f('#btn2').removeClass('btn-primary')
                $f('#btn3').removeClass('btn-primary')
                $f('#btn4').removeClass('btn-primary')
                $f('#btn5').removeClass('btn-primary')
                $f('#btn6').removeClass('btn-primary')
                $f('#btn10').removeClass('btn-primary')
            }



            if (codigo == 10) {

                $f('#conteudo10').show()

                $f('#conteudo1').hide()
                $f('#conteudo2').hide()
                $f('#conteudo3').hide()
                $f('#conteudo4').hide()
                $f('#conteudo5').hide()
                $f('#conteudo6').hide()
                $f('#conteudo7').hide()
                $f('#conteudo8').hide()
                $f('#conteudo9').hide()


                $f('#btn10').removeClass('btn-light')
                $f('#btn10').addClass('btn-primary')


                $f('#btn1').removeClass('btn-primary')
                $f('#btn2').removeClass('btn-primary')
                $f('#btn3').removeClass('btn-primary')
                $f('#btn4').removeClass('btn-primary')
                $f('#btn5').removeClass('btn-primary')
                $f('#btn6').removeClass('btn-primary')
                $f('#btn7').removeClass('btn-primary')
                $f('#btn8').removeClass('btn-primary')
                $f('#btn9').removeClass('btn-primary')
            }







        }

        $f(document).ready(function() {

            var variavel = $f('#valor-variavel').val()



            $f('#conteudo1').hide()
            $f('#conteudo2').hide()

            $f('#conteudo4').hide()
            $f('#conteudo5').hide()
            $f('#conteudo6').hide()
            $f('#conteudo7').hide()
            $f('#conteudo10').hide()

            CarregarParametrizacao()
            CarregarTipoImpacto()
            CarregarMedidaTratamento()
            CarregarSequencia()






            if (variavel != '') {

                $f('#conteudo2').show()

                $f('#conteudo1').hide()
                $f('#conteudo3').hide()
                $f('#conteudo4').hide()
                $f('#conteudo5').hide()
                $f('#conteudo6').hide()
                $f('#conteudo7').hide()
                $f('#conteudo10').hide()

                $f('#btn2').removeClass('btn-light')
                $f('#btn2').addClass('btn-primary')

                $f('#btn1').removeClass('btn-primary')
                $f('#btn3').removeClass('btn-primary')
                $f('#btn4').removeClass('btn-primary')
                $f('#btn5').removeClass('btn-primary')
                $f('#btn6').removeClass('btn-primary')
                $f('#btn7').removeClass('btn-primary')
                $f('#btn10').removeClass('btn-primary')
            }




        })

        function GravarParametrizacao() {

            var nome = $f("#cad-nome").val()

            if (nome == '') {} else {

                var descricao = $f("#cad-descricao").val()
                var reputacao = $f("#cad-reputacao").is(':checked');
                var legal = $f("#cad-legal").is(':checked');
                var contratual = $f("#cad-contratual").is(':checked');
                var operacional = $f("#cad-operacional").is(':checked');
                var seguranca = $f("#cad-seguranca").is(':checked');

                $f.ajax({
                    type: 'post',
                    data: 'nome=' + nome + '&descricao=' + descricao + '&reputacao=' + reputacao + '&legal=' + legal + '&contratual=' + contratual + '&operacional=' + operacional + '&seguranca=' + seguranca,
                    url: 'funcoes/gravar-parametrizacao.php',
                    success: function(retorno) {
                        $f('#resposta-parametrizacao').html(retorno);

                        CarregarParametrizacao()

                        /*Limpar Campos*/

                        $f("#cad-nome").val('')
                        $f("#cad-descricao").val('')
                        $f("#cad-reputacao").prop("checked", false);
                        $f("#cad-legal").prop("checked", false);
                        $f("#cad-contratual").prop("checked", false);
                        $f("#cad-operacional").prop("checked", false);
                        $f("#cad-seguranca").prop("checked", false);



                        var checkeds = new Array();
                        $f("input[name='cad-itens[]']:checked").each(function() {

                            checkeds.push($f(this).val());
                        });

                        var codigo = $f('#codigo-parametrizacao').val()

                        $f.ajax({
                            type: 'post',
                            data: 'codigo=' + codigo + '&parametrizacao=' + checkeds,
                            url: 'funcoes/gravar-tabela-parametrizacao.php',
                            success: function(retorno) {
                                $f('#resposta-parametrizacao').html(retorno);

                                CarregarParametrizacao()

                                marcardesmarcar()



                            }
                        })






                    }
                })
            }
        }


        function CarregarParametrizacao() {

            $f('#carregar-parametrizacao').load("funcoes/carregar-parametrizacao.php")

        }

        function ExcluirParametrizacao(codigo) {
            if (window.confirm("Você deseja excluir?")) {
                $f.ajax({
                    type: 'post',
                    data: 'codigo=' + codigo,
                    url: 'funcoes/excluir-parametrizacao.php',
                    success: function(retorno) {
                        $f('#resposta-parametrizacao').html(retorno);

                        CarregarParametrizacao()
                    }
                })

            }
        }

        function ExcluirTipoImpacto(codigo) {
            if (window.confirm("Você deseja excluir?")) {
                $f.ajax({
                    type: 'post',
                    data: 'codigo=' + codigo,
                    url: 'funcoes/excluir-tipo-impacto.php',
                    success: function(retorno) {
                        $f('#resposta-tipo-impacto').html(retorno);

                        CarregarTipoImpacto()
                    }
                })

            }
        }

        function ExcluirMedidaTratamento(codigo) {
            if (window.confirm("Você deseja excluir?")) {
                $f.ajax({
                    type: 'post',
                    data: 'codigo=' + codigo,
                    url: 'funcoes/excluir-medida-tratamento.php',
                    success: function(retorno) {
                        $f('#resposta-medida-tratamento').html(retorno);

                        CarregarMedidaTratamento()
                    }
                })

            }
        }



        function GravarTipoImpacto() {

            var item = $f("#cad-item-impacto").val()
            var descricao = $f("#cad-descricao-impacto").val()
            var baixa = $f("#cad-baixa-impacto").val()
            var media = $f("#cad-media-impacto").val()
            var alta = $f("#cad-alta-impacto").val()
            var malta = $f("#cad-muito-alta-impacto").val()

            $f.ajax({
                type: 'post',
                data: 'item=' + item + '&descricao=' + descricao + '&baixa=' + baixa + '&media=' + media + '&alta=' + alta + '&malta=' + malta,
                url: 'funcoes/gravar-tipo-impacto.php',
                success: function(retorno) {
                    $f('#resposta-item-impacto').html(retorno);

                    CarregarTipoImpacto()

                    /*Limpar Campos*/

                    $f("#cad-item-impacto").val('')
                    $f("#cad-descricao-impacto").val('')
                    $f("#cad-baixa-impacto").val('')
                    $f("#cad-media-impacto").val('')
                    $f("#cad-alta-impacto").val('')
                    $f("#cad-muito-alta-impacto").val('')

                }
            })

        }

        function CarregarTipoImpacto() {

            $f('#carregar-tipo-impacto').load("funcoes/carregar-tipo-impacto.php")

        }

        function CarregarMedidaTratamento() {

            $f('#carregar-medida-tratamento').load("funcoes/carregar-medida-tratamento.php")

        }



        function GravarMedidaTratamento() {

            var descricao = $f("#cad-descricao-tratamento").val()


            $f.ajax({
                type: 'post',
                data: 'descricao=' + descricao,
                url: 'funcoes/gravar-medida-tratamento.php',
                success: function(retorno) {
                    $f('#resposta-medida-tratamento').html(retorno);

                    CarregarMedidaTratamento()
                    CarregarSequencia()
                    /*Limpar Campos*/

                    $f("#cad-descricao-tratamento").val('')


                }
            })

        }

        function CarregarSequencia() {

            $f("#carregar-sequencia").load('funcoes/carregar-sequencia.php')
        }



        function EditarParametrizacao(codigo) {

            $f('#exampleModal').modal('show')

            $f('#codigo-risco-corporativo').val(codigo)

            CarregarRiscos(codigo)

        }


        function CarregarRiscos(codigo) {


            $f.ajax({
                type: 'post',
                data: 'codigo=' + codigo,
                url: 'funcoes/carregar-editar-riscos.php',
                success: function(retorno) {
                    $f('#carregar-editar-riscos').html(retorno);


                }
            })
        }



        function AtualizarRiscoCorporativo() {

            var checkeds = new Array();
            $f("input[name='cad-itens2[]']:checked").each(function() {

                checkeds.push($f(this).val());


            });

            var codigo = $f('#codigo-risco-corporativo').val()

            $f.ajax({
                type: 'post',
                data: 'codigo=' + codigo + '&parametrizacao=' + checkeds,
                url: 'funcoes/atualizar-tabela-parametrizacao.php',
                success: function(retorno) {
                    $f('#resposta-parametrizacao').html(retorno);
                    $f(".close").trigger("click")
                    CarregarParametrizacao()
                }
            })

        }


        function EditarImpacto(codigo) {


            $f.ajax({
                type: 'post',
                data: 'codigo=' + codigo,
                url: 'forms/editar-tipo-impacto.php',
                success: function(retorno) {
                    $f('#resposta-editar-item').html(retorno);


                }
            })
        }


        function AtualizarImpacto(codigo) {

            var item = $f('#esc-item').val()
            var descricao = $f('#esc-descricao').val()
            var baixa = $f('#esc-baixa').val()
            var media = $f('#esc-media').val()
            var alta = $f('#esc-alta').val()
            var malta = $f('#esc-malta').val()


            $f.ajax({
                type: 'post',
                data: 'codigo=' + codigo + '&item=' + item + '&descricao=' + descricao + '&baixa=' + baixa + '&media=' + media + '&alta=' + alta + '&malta=' + malta,
                url: 'funcoes/atualizar-impacto.php',
                success: function(retorno) {
                    $f('#resposta-parametrizacao').html(retorno);
                    $f(".close").trigger("click")
                    CarregarTipoImpacto()
                }
            })

        }

        function marcardesmarcar() {

            $f("input[name='cad-itens[]']:checked").each(function() {
                if ($f(this).prop("checked")) {
                    $f(this).prop("checked", false);
                } else {
                    $f(this).prop("checked", true);
                }
            })
        };
    </script>

    <script>
        $rodape = jQuery.noConflict()

        function AtivarLink() {
            $rodape('#<?php echo $nav_menu_principal ?>').addClass('show')
            $rodape('#menu-<?php echo $nav_menu_pagina ?>').css('font-weight', 'bold')

        }
        AtivarLink()
    </script>
</body>

</html>