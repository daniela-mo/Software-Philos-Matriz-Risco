<?php
$nav_menu_principal = 'gestaoderisco';
$nav_menu_pagina = 'matrizderiscos';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit=no">
  <title>Software Philos</title>
  <link rel="stylesheet" type="text/css" href="bibliotecas/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="bibliotecas/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/sb-admin.min.css">
  <link rel="stylesheet" type="text/css" href="css/estilo.css">
  <link rel="stylesheet" type="text/css" href="css/datatable.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css'>

  <link rel="shortcut icon" href="imgs/favicon2.fw.png" />
</head>

<style>
  .esc-listar {
    display: none
  }

  .esc-parecer {
    display: none
  }

  #cad-nivel-do-risco-futuro {
    border: solid 1px #7F7F7F;
    font-size: 18px;
    padding: 2px 2px 2px 5px;
    height: 35px;
  }
</style>


<style>
  #example_filter label {
    display: none
  }

  #example_length {
    display: none
  }
</style>

<body class=" fixed-nav sticky-footer" id="page-top">
  <!-- Navegação !-->
  <?php
  include('menu.php');
  $codigo = $_REQUEST['cod'];
  $codigo_matriz = $_REQUEST['cod'];


  @$aba = $_REQUEST['aba'];






  ?>
  <!-- Navegação !-->
  <input type="hidden" id="abas" value="<?php echo $aba; ?>">

  <input type="hidden" id="receber_monitoramento" value="<?php echo $receber_monitoramento = $_REQUEST['monitoramento']; ?>">
  <input type="hidden" id="receber_tratamento" value="<?php echo $receber_tratamento = $_REQUEST['tratamento']; ?>">
  <input type="hidden" id="receber_avaliacao" value="<?php echo $receber_avaliacao = $_REQUEST['avaliacao']; ?>">


  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row mb-5" style="margin-top: -16px; ">
        <div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 999999">

          <div class="row">
            <div class="col-md-9">
              <span class="text-white breadcrumb-item"><a href="dashboard.php" class="text-light">Software Philos</a> | Matriz de Risco</span>
            </div>
          </div>


        </div>
      </div>

      <div class="row ml-4 mr-4 mt-5">
        <input type="button" class="btn btn-primary mb-3" value="Voltar" onclick='history.go(-1)'><br>

        <div class="col-md-12 text-center mt-4 mb-5">
          <!-- <input type="button" class="btn btn-primary ml-2 mr-2 pointer" id="btn1" onClick="Abas(1)" value="Risco"> -->
          <!-- <input type="button" class="btn btn-primary ml-2 mr-2 pointer" id="btn1" onClick="Abas(1)" value="Identificação"> -->
          <input type="button" class="btn btn-primary ml-2 mr-2 pointer" id="btn1" onClick="Abas(1)" value="Análise">
          <input type="button" class="btn btn-light ml-2 mr-2 pointer" id="btn2" onClick="Abas(2)" value="Avaliação">
          <input type="button" class="btn btn-light ml-2 mr-2 pointer" id="btn3" onClick="Abas(3)" value="Tratamento">
          <input type="button" class="btn btn-light ml-2 mr-2 pointer" id="btn4" onClick="Abas(4)" value="Monitoramento">
          <!-- <a href="monitoramento.php" class="btn btn-light ml-2 mr-2 pointer" id="btn5" onClick="Abas(5)">Monitoramento</a> -->


        </div>
      </div>



      <div class="row ml-4 mr-4">
        <div class="col-md-12">

          <div id="conteudo1">

            <div class="row">

              <div class="col-md-11 mb-4">
                <?php
                mysqli_query($conexao, "SET NAMES 'utf8'");
                mysqli_query($conexao, 'SET character_set_connection=utf8');
                mysqli_query($conexao, 'SET character_set_client=utf8');
                mysqli_query($conexao, 'SET character_set_results=utf8');
                $selecao = mysqli_query($conexao, "select * from identificacao_do_risco where id='$codigo_matriz'");

                while ($registros = mysqli_fetch_array($selecao)) {
                  $evento = $registros['evento_risco'];
                  $codigo_area = $registros['codigo'];
                  $codigo = $registros['id'];
                  $area = $registros['area'] ?>
                  <label>Descrição do Evento de Risco</label>
                  <div class="d-flex justify-content-center align-items-center ">

                    <input type="text" class="form-control w-100" name="cad-evento-risco" id="cad-evento-risco" value="<?php echo $registros['evento_risco'] ?>" readonly>
                    <i class=" fa fa-edit ml-2" style="cursor: pointer" onClick="EditarAtualizarRisco(<?php echo $registros['id'] ?>)" data-toggle="modal" data-target="#exampleModal2"></i>

                  </div>

              </div>



              <div class="col-md-3 mb-4" style="margin-right:80px">
                <label>Área


                  <?php
                  $verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='19' and codigo_grupo='$cod_grupo' and editar='1' ");
                  $numero_grupo = mysqli_num_rows($verificar_grupo);
                  if ($numero_grupo >= 1) {
                  ?>

                    <i class="fa fa-edit pointer" data-toggle="modal" data-target="#exampleModal" onClick="EditarAtualizarArea(<?php echo $registros['id'] ?>)"></i>



                </label>
                <input type="text" readonly class="form-control" value="<?php echo $registros['area'] ?>">

              <?php } ?>
            <?php } ?>
              </div>




              <div style="margin-right:80px">
                <label>Principais áreas impactadas pelo risco
                  <i class="fa fa-plus" style="cursor: pointer" onClick="ModalAdicionarAreaPrincipal()" data-dismiss="modal"></i>
                  <i class="fa fa-trash pointer" onClick="ExcluirAreaPrincipal()"></i>
                </label>
                <?php
                $selecao_principal = mysqli_query($conexao, "select * from area_principal_risco WHERE codigo_matriz_risco='$codigo_area'");
                while ($registros_principal = mysqli_fetch_array($selecao_principal)) {
                  $id_principal = $registros_principal['id'];
                ?>
                  <div class="d-flex mb-2 align-items-center">
                    <input type="text" readonly class="form-control mr-2" value="<?php echo $registros_principal['area'] ?>">
                  </div>
                <?php  } ?>
              </div>




              <div>
                <label>Demais áreas impactadas pelo risco
                  <i class=" fa fa-plus" style="cursor: pointer" onClick="ModalAdicionarDemaisAreas()" data-dismiss="modal"></i>
                  <i class="fa fa-trash pointer" onClick="ExcluirDemaisAreas()"></i>
                </label>
                <?php
                $selecao_demais = mysqli_query($conexao, "select * from demais_areas_risco WHERE codigo_matriz_risco='$codigo_area'");
                while ($registros_demais = mysqli_fetch_array($selecao_demais)) {
                  $id_demais = $registros_demais['id'];
                ?>
                  <div class="d-flex mb-2 align-items-center" style="flex-direction:row">
                    <input type="text" readonly class="form-control mr-2" value="<?php echo $registros_demais['area'] ?>">
                  </div>
                <?php } ?>
              </div>


            </div>




            <!-- 
              <div class="col-md-3 mb-4">
                <label>Processo</label>
                <input type="text" class="form-control" name="cad-processo" id="cad-processo" value="<?php echo $registros['processo'] ?>" readonly>
              </div> -->


            <div class="col-md-12 causaEfeito px-0 mt-3">



              <div class="col-md-6 mb-3 d-flex flex-column ml-0 mr-2 pl-0 pr-0">

                <?php
                $selecao_causas = mysqli_query($conexao, "select * from matriz_de_risco_causas WHERE tipo='Método' and codigo_matriz='$codigo_matriz'");
                $registros_causas = mysqli_fetch_array($selecao_causas);
                ?>

                <h4>Causa</h4>
                <input type="button" class="btn btn-primary float-left mb-3 w-25" value="Adicionar Causa" onClick="ModalAdicionarControle('Método')">
                <div id="carregar-ishikawa" style="max-width:100%"></div>

              </div>

              <div class="col-md-6 mb-3 d-flex flex-column ml-0 mr-0 pl-0 pr-0">

                <?php
                $selecao_efeito = mysqli_query($conexao, "select * from diagrama_ishikawa_efeitos WHERE tipo='Método' and codigo_matriz='$codigo_matriz'");
                $registros_efeito = mysqli_fetch_array($selecao_efeito);
                ?>

                <h4>Efeito</h4>
                <input type="button" class="btn btn-primary float-left mb-3 w-25" value="Adicionar Efeito" onClick="ModalAdicionarControle1('Método')">
                <div id="carregar-ishikawa-efeito" style="max-width:100%"></div>

              </div>

            </div>

            <div style="height: 250px" class="mt-5"></div>
          </div>
        </div>





        <div id="conteudo2">
          <div class="row">
            <div class="col-md-12">


              <form action="processa-gravar-avaliacao-risco-inerente.php" method="post">
                <input type="hidden" name="codigo-matriz-de-risco" id="codigo-matriz-de-risco" value="<?php echo $codigo ?>">
                <input type="hidden" name="classificacao-risco" id="classificacao-risco" value=" <?php echo $classifi = $registros['classificacao_risco'] ?>">

                <div class="row">

                  <div class="col-md-11 mb-4">
                    <?php
                    mysqli_query($conexao, "SET NAMES 'utf8'");
                    mysqli_query($conexao, 'SET character_set_connection=utf8');
                    mysqli_query($conexao, 'SET character_set_client=utf8');
                    mysqli_query($conexao, 'SET character_set_results=utf8');
                    $selecao = mysqli_query($conexao, "select * from identificacao_do_risco where id='$codigo_matriz'");

                    while ($registros = mysqli_fetch_array($selecao)) {
                      $evento = $registros['evento_risco'];
                      $codigo_area = $registros['codigo'];
                      $codigo = $registros['id'];
                      $area = $registros['area'] ?>
                      <label>Descrição do Evento de Risco</label>
                      <div class="d-flex justify-content-center align-items-center ">

                        <input type="text" class="form-control w-100" name="cad-evento-risco" id="cad-evento-risco" value="<?php echo $registros['evento_risco'] ?>" readonly>
                        <i class=" fa fa-edit ml-2" style="cursor: pointer" onClick="EditarAtualizarRisco(<?php echo $registros['id'] ?>)" data-toggle="modal" data-target="#exampleModal2"></i>

                      </div>

                  </div>

                  <div class="col-md-3 mb-4" style="margin-right:80px">
                    <label>Área
                      <?php
                      $verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='19' and codigo_grupo='$cod_grupo' and editar='1' ");
                      $numero_grupo = mysqli_num_rows($verificar_grupo);
                      if ($numero_grupo >= 1) {
                      ?>
                        <i class="fa fa-edit pointer" data-toggle="modal" data-target="#exampleModal" onClick="EditarAtualizarArea(<?php echo $registros['id'] ?>)"></i>
                    </label>
                    <input type="text" readonly class="form-control" value="<?php echo $registros['area'] ?>">
                  <?php } ?>
                <?php } ?>
                  </div>



                  <div style="margin-right:80px">
                    <label>Principais áreas impactadas pelo risco
                      <i class="fa fa-plus" style="cursor: pointer" onClick="ModalAdicionarAreaPrincipal()" data-dismiss="modal"></i>
                      <i class="fa fa-trash pointer" onClick="ExcluirAreaPrincipal()"></i>
                    </label>
                    <?php
                    $selecao_principal = mysqli_query($conexao, "select * from area_principal_risco WHERE codigo_matriz_risco='$codigo_area'");
                    while ($registros_principal = mysqli_fetch_array($selecao_principal)) {
                      $id_principal = $registros_principal['id'];
                    ?>
                      <div class="d-flex mb-2 align-items-center">
                        <input type="text" readonly class="form-control mr-2" value="<?php echo $registros_principal['area'] ?>">
                      </div>
                    <?php  } ?>
                  </div>




                  <div>
                    <label>Demais áreas impactadas pelo risco
                      <i class=" fa fa-plus" style="cursor: pointer" onClick="ModalAdicionarDemaisAreas()" data-dismiss="modal"></i>
                      <i class="fa fa-trash pointer" onClick="ExcluirDemaisAreas()"></i>
                    </label>
                    <?php
                    $selecao_demais = mysqli_query($conexao, "select * from demais_areas_risco WHERE codigo_matriz_risco='$codigo_area'");
                    while ($registros_demais = mysqli_fetch_array($selecao_demais)) {
                      $id_demais = $registros_demais['id'];
                    ?>
                      <div class="d-flex mb-2 align-items-center" style="flex-direction:row">
                        <input type="text" readonly class="form-control mr-2" value="<?php echo $registros_demais['area'] ?>">
                      </div>
                    <?php } ?>
                  </div>




                </div>

                <div class="col-md-12 pl-0 mt-5">
                  <h4 style="font-weight:800"> Avaliação de Risco Inerente

                    <?php
                    $verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='36' and codigo_grupo='$cod_grupo' and editar='1' ");
                    $numero_grupo = mysqli_num_rows($verificar_grupo);
                    if ($numero_grupo >= 1) {
                    ?>
                      <i class="fa fa-edit pointer" data-toggle="modal" data-target="#ModalInerente" onClick="EditarInerente(<?php echo $classifi = $registros['classificacao_risco'] ?>)"></i>
                    <?php  } ?>

                  </h4>
                </div>
                <div>
                  <div class="row pl-4 pr-4 pt-4 pb-5" style="width: 1900px">

                    <?php
                    $selecao_avaliacao = mysqli_query($conexao, "select * from avaliacao_risco_inerente WHERE codigo_matriz='$codigo_matriz'");
                    $num = mysqli_num_rows($selecao_avaliacao);
                    $registros_avaliacao = mysqli_fetch_array($selecao_avaliacao);
                    $exibir_probabilidade = $registros_avaliacao['probabilidade'];
                    $exibir_impacto = $registros_avaliacao['impacto'];

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


                    if ($exibir_impacto == 5) {
                      $exibir_impacto = 'Insignificante';
                    }
                    if ($exibir_impacto == 8) {
                      $exibir_impacto = 'Baixo';
                    }
                    if ($exibir_impacto == 17) {
                      $exibir_impacto = 'Moderado';
                    }
                    if ($exibir_impacto == 27) {
                      $exibir_impacto = 'Alto';
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

                    if ($num == 1) { ?>
                      <input type="hidden" value="<?php echo $registros_avaliacao['id'] ?>" name="codigo-inerente" id="codigo-inerente">
                      <div class="col-md-2 pl-0 ml-0">
                        <label>Probabilidade</label>
                        <input type="text" class="form-control" value="<?php echo $exibir_probabilidade ?>" readonly>
                      </div>

                      <div class="col-md-2">
                        <label>Impacto (Consequência)</label>
                        <input type="text" class="form-control" value="<?php echo $exibir_impacto ?>" readonly>
                      </div>

                      <div class="col-md-2">
                        <label>Nível do Risco</label>
                        <input type="text" class="form-control" value="<?php echo $nivel ?>" readonly style="background-color: <?php echo $cor_nivel ?>">
                      </div>
                      <?php
                      if ($registros_avaliacao['decisao'] != '') {
                      ?>
                        <div class="col-md-2">
                          <label>Decisão de Tratamento do Risco</label>
                          <?php $decis = $registros_avaliacao['decisao'];
                          if ($decis == '0') {
                            $decis = 'Não Escolhido';
                          } else {
                            $decis = $registros_avaliacao['decisao'];
                          } ?>
                          <input type="text" class="form-control" value="<?php echo $decis ?>" readonly>

                        </div>
                      <?php } ?>


                      <?php



                      mysqli_query($conexao, "SET NAMES 'utf8'");
                      mysqli_query($conexao, 'SET character_set_connection=utf8');
                      mysqli_query($conexao, 'SET character_set_client=utf8');
                      mysqli_query($conexao, 'SET character_set_results=utf8');

                      $selecao_itens2 = mysqli_query($conexao, "select * from tabela_avaliacao_risco_inerente WHERE codigo_matriz='$codigo_matriz'");
                      $conta = 1;
                      while ($registros_inerente = mysqli_fetch_array($selecao_itens2)) {
                        $itens_t = $registros_inerente['item'];
                        $title = $registros_inerente['titulo'];

                        if ($title == 'Op. Estratégica ') {
                          $title = 'Operacional/Estratégica';
                        }

                        if ($itens_t == '1') {
                          $itens_t = 'Baixa';
                          $cor = '#41841E';
                        }
                        if ($itens_t == '2') {
                          $itens_t = 'Média';
                          $cor = '#F2E70A';
                        }
                        if ($itens_t == '3') {
                          $itens_t = 'Alta';
                          $cor = '#E58C2C';
                        }
                        if ($itens_t == '4') {
                          $itens_t = 'Muito Alta';
                          $cor = '#FF0000';
                        }

                        $selecao_impacto = mysqli_query($conexao, "select * from tipo_impacto WHERE item='$title'");
                        $registros_impacto = mysqli_fetch_array($selecao_impacto);
                        $itensx = $itens_t;

                        if ($itensx == 'Baixa') {
                          $itensx = 'baixa';
                        }
                        if ($itensx == 'Média') {
                          $itensx = 'media';
                        }
                        if ($itensx == 'Alta') {
                          $itensx = 'alta';
                        }
                        if ($itensx == 'Muito Alta') {
                          $itensx = 'malta';
                        }

                      ?>


                        <div class="col-md-1">
                          <label><?php echo $registros_inerente['titulo'] ?></label>

                          <input type="text" class="form-control" value="<?php echo $itens_t ?>" readonly style="background-color: <?php echo $cor ?>" data-placement="top" data-toggle="popover" title="<?php echo $itens_t ?>" data-content="<?php echo $registros_impacto[$itensx] ?>" onMouseOver="Popover(<?php echo $conta ?>)" id="popover<?php echo $conta ?>" onMouseOut="Popover2(<?php echo $conta ?>)">

                        </div>



                      <?php $conta = $conta + 1;
                      } ?>



                    <?php
                    } else {
                    ?>


                      <div class="col-md-2">
                        <label>Probabilidade</label>

                        <select class="form-control" name="cad-probabilidade-avaliacao" id="cad-probabilidade-avaliacao" onChange="Calcular()">
                          <option value="0">Escolher</option>
                          <option value="1">Rara</option>
                          <option value="2">Improvável</option>
                          <option value="3">Possível</option>
                          <option value="4">Provável</option>
                          <option value="5">Quase certo</option>
                        </select>
                      </div>

                      <div class="col-md-2">
                        <label>Impacto (Consequência)</label>

                        <select class="form-control" name="cad-impacto-avaliacao" id="cad-impacto-avaliacao" onChange="Calcular()">
                          <option value="0">Escolher</option>
                          <option value="5">Insignificante</option>
                          <option value="8">Baixo</option>
                          <option value="17">Moderado</option>
                          <option value="27">Alto</option>
                          <option value="40">Catastrófico</option>
                        </select>
                      </div>

                      <div class="col-md-2">
                        <label>Nível do Risco</label>

                        <input type="text" name="cad-nivel-do-risco-inerente" id="cad-nivel-do-risco-inerente" readonly>
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


                          <div class="col-md-1">

                            <input type="hidden" id="titulos[]" name="titulos[]" value="<?php echo $registros_item ?>">

                            <label><?php echo $registros_item ?></label>

                            <select class="form-control" name="inerente[]" id="cad-<?php echo $registros_impacto['id']; ?>" onChange="CoresNiveis('cad-<?php echo $registros_impacto['id']; ?>')">
                              <option value="0">Escolher</option>
                              <option value="1">Baixa</option>
                              <option value="2">Média</option>
                              <option value="3">Alta</option>
                              <option value="4">Muito Alta</option>

                            </select>
                          </div>



                      <?php }
                      } ?>






                      <div class="col-md-2">
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

                      <?php
                      $verificar_cadastro = mysqli_query($conexao, "select * from avaliacao_risco_inerente WHERE codigo_matriz='$codigo_matriz'");
                      $numeros_inerente = mysqli_num_rows($verificar_cadastro);

                      if ($numeros_inerente == 0) {
                      ?>

                        <div class="col-md-12 mt-3">
                          <input type="submit" class="btn btn-primary" value="Gravar">

                        </div>
                    <?php }
                    }  ?>

                  </div>
                </div>
              </form>




              <!-- CONTROLES EXISTENTES -->

              <div class="col-md-12 mt-3 mb-4">


                <a data-toggle="modal" data-target="#ModalControles" onClick="apagaForm()" style="padding-top:10px;padding-left:8px;padding-right:8px;padding-bottom:10px;margin-bottom:10px;border-radius:5px;background:#031335;color:#fff"> CONTROLES EXISTENTES</a>


                <div id="resposta-tabela"></div>


                <div id="carregar-tabela-controles-existentes" style="width:100%" class="mt-5">
                </div>

              </div>






              <form action="processa-gravar-avaliacao-risco-residual.php" method="post">
                <input type="hidden" name="codigo-matriz-de-risco" id="codigo-matriz-de-risco" value="<?php echo $codigo ?>">
                <input type="hidden" name="classificacao-risco" id="classificacao-risco" value=" <?php echo $classifi = $registros['classificacao_risco'] ?>">
                <div class="col-md-12 pl-0 mt-5">
                  <h4 style="font-weight:800">Avaliação de Risco Residual

                    <?php
                    $verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='36' and codigo_grupo='$cod_grupo' and editar='1' ");
                    $numero_grupo = mysqli_num_rows($verificar_grupo);
                    if ($numero_grupo >= 1) {
                    ?>

                      <i class="fa fa-edit pointer" data-toggle="modal" data-target="#ModalResidual" onClick="EditarResidual()"></i>

                    <?php } ?>
                  </h4>
                </div>
                <div>
                  <div class="row pl-4 pr-4 pt-4 pb-4" style="width: 1900px">

                    <?php
                    $selecao_avaliacao = mysqli_query($conexao, "select * from avaliacao_risco_residual WHERE codigo_matriz='$codigo_matriz'");
                    $num = mysqli_num_rows($selecao_avaliacao);
                    $registros_avaliacao = mysqli_fetch_array($selecao_avaliacao);
                    $exibir_probabilidade = $registros_avaliacao['probabilidade'];
                    $exibir_impacto = $registros_avaliacao['impacto'];

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


                    if ($exibir_impacto == 5) {
                      $exibir_impacto = 'Insignificante';
                    }
                    if ($exibir_impacto == 8) {
                      $exibir_impacto = 'Baixo';
                    }
                    if ($exibir_impacto == 17) {
                      $exibir_impacto = 'Moderado';
                    }
                    if ($exibir_impacto == 27) {
                      $exibir_impacto = 'Alto';
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


                    if ($num == 1) { ?>
                      <input type="hidden" value="<?php echo $registros_avaliacao['id'] ?>" name="codigo-residual" id="codigo-residual">
                      <div class="col-md-2 pl-0 ml-0">
                        <label>Probabilidade</label>
                        <input type="text" class="form-control" value="<?php echo $exibir_probabilidade ?>" readonly>
                      </div>

                      <div class="col-md-2">
                        <label>Impacto (Consequência)</label>
                        <input type="text" class="form-control" value="<?php echo $exibir_impacto ?>" readonly>
                      </div>

                      <div class="col-md-2">
                        <label>Nível do Risco</label>
                        <input type="text" class="form-control" value="<?php echo $registros_avaliacao['nivel']; ?>" readonly style="background-color: <?php echo $cor_nivel ?>">
                      </div>
                      <?php
                      if ($registros_avaliacao['decisao'] != '') {
                      ?>
                        <div class="col-md-2">
                          <label>Decisão de Tratamento do Risco</label>
                          <?php $decis = $registros_avaliacao['decisao'];
                          if ($decis == '0') {
                            $decis = 'Não Escolhido';
                          } else {
                            $decis = $registros_avaliacao['decisao'];
                          } ?>
                          <input type="text" class="form-control" value="<?php echo $decis ?>" readonly>

                        </div>

                      <?php } ?>


                      <?php



                      mysqli_query($conexao, "SET NAMES 'utf8'");
                      mysqli_query($conexao, 'SET character_set_connection=utf8');
                      mysqli_query($conexao, 'SET character_set_client=utf8');
                      mysqli_query($conexao, 'SET character_set_results=utf8');
                      $conta = 1;
                      $selecao_itens2 = mysqli_query($conexao, "select * from tabela_avaliacao_risco_residual WHERE codigo_matriz='$codigo_matriz'");
                      while ($registros_inerente = mysqli_fetch_array($selecao_itens2)) {
                        $itens_t = $registros_inerente['item'];
                        if ($itens_t == '1') {
                          $itens_t = 'Baixa';
                          $cor = '#41841E';
                        }
                        if ($itens_t == '2') {
                          $itens_t = 'Média';
                          $cor = '#F2E70A';
                        }
                        if ($itens_t == '3') {
                          $itens_t = 'Alta';
                          $cor = '#E58C2C';
                        }
                        if ($itens_t == '4') {
                          $itens_t = 'Muito Alta';
                          $cor = '#FF0000';
                        }

                      ?>



                        <div class="col-md-1">
                          <label><?php echo $registros_inerente['titulo'] ?></label>

                          <input type="text" class="form-control" value="<?php echo $itens_t ?>" readonly style="background-color: <?php echo $cor ?>" data-placement="top" data-toggle="popover" title="<?php echo $itens_t ?>" data-content="<?php echo $registros_impacto[$itensx] ?>" onMouseOver="Popover(2<?php echo $conta ?>)" id="popover2<?php echo $conta ?>" onMouseOut="Popover2(2<?php echo $conta ?>)">

                        </div>



                      <?php $conta = $conta + 1;
                      } ?>



                    <?php
                    } else {
                    ?>


                      <div class="col-md-2 pl-0 ">
                        <label>Probabilidade</label>

                        <select class="form-control" name="cad-probabilidade-residual" id="cad-probabilidade-residual" onChange="Calcular2()">
                          <option value="0">Escolher</option>
                          <option value="1">Rara</option>
                          <option value="2">Improvável</option>
                          <option value="3">Possível</option>
                          <option value="4">Provável</option>
                          <option value="5">Quase certo</option>
                        </select>
                      </div>

                      <div class="col-md-2">
                        <label>Impacto (Consequência)</label>

                        <select class="form-control" name="cad-impacto-residual" id="cad-impacto-residual" onChange="Calcular2()">
                          <option value="0">Escolher</option>
                          <option value="5">Insignificante</option>
                          <option value="8">Baixo</option>
                          <option value="17">Moderado</option>
                          <option value="27">Alto</option>
                          <option value="40">Catastrófico</option>
                        </select>
                      </div>

                      <div class="col-md-2">
                        <label>Nível do Risco</label>

                        <input type="text" id="cad-nivel-do-risco-residual" name="cad-nivel-do-risco-residual" readonly>
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


                          <div class="col-md-1">
                            <label><?php echo $registros_item ?></label>

                            <input type="hidden" id="titulos[]" name="titulos[]" value="<?php echo $registros_item ?>">

                            <select class="form-control form-cores" name="residual[]" id="cad-residual-<?php echo $registros_impacto['id']; ?>" onChange="CoresNiveis('cad-residual-<?php echo $registros_impacto['id']; ?>')">
                              <option value="0">Escolher</option>
                              <option value="1">Baixa</option>
                              <option value="2">Média</option>
                              <option value="3">Alta</option>
                              <option value="4">Muito Alta</option>

                            </select>
                          </div>



                      <?php }
                      } ?>








                      <div class="col-md-2">
                        <label>Decisão de Tratamento do Risco</label>

                        <select class="form-control" name="cad-decisao-residual" id="cad-decisao-residual">
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

                    <?php }
                    $verificar_cadastro = mysqli_query($conexao, "select * from avaliacao_risco_residual WHERE codigo_matriz='$codigo_matriz'");
                    $numeros_inerente = mysqli_num_rows($verificar_cadastro);

                    if ($numeros_inerente == 0) {
                    ?>

                      <div class="col-md-12 mt-3">
                        <input type="submit" class="btn btn-primary" value="Gravar">

                      </div>
                    <?php } ?>

                  </div>
                </div>



              </form>

              <!----------------------------RISCO FUTURO---------------------------->


              <form action="processa-gravar-avaliacao-risco-futuro.php" method="post">
                <input type="hidden" name="codigo-matriz-de-risco" id="codigo-matriz-de-risco" value="<?php echo $codigo ?>">
                <input type="hidden" name="classificacao-risco" id="classificacao-risco" value=" <?php echo $classifi = $registros['classificacao_risco'] ?>">
                <div class="col-md-12 pl-0 mt-5">
                  <h4 style="font-weight:800"> Avaliação de Risco Futuro

                    <?php
                    $verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='36' and codigo_grupo='$cod_grupo' and editar='1' ");
                    $numero_grupo = mysqli_num_rows($verificar_grupo);
                    if ($numero_grupo >= 1) {
                    ?>

                      <i class="fa fa-edit pointer" data-toggle="modal" data-target="#ModalFuturo" onClick="EditarFuturo()"></i>
                    <?php } ?>

                  </h4>
                </div>
                <div>
                  <div class="row pl-4 pr-4 pt-4 pb-4" style="width: 1900px">

                    <?php
                    $selecao_avaliacao = mysqli_query($conexao, "select * from avaliacao_risco_futuro WHERE codigo_matriz='$codigo_matriz'");
                    $num = mysqli_num_rows($selecao_avaliacao);
                    $registros_avaliacao = mysqli_fetch_array($selecao_avaliacao);
                    $exibir_probabilidade = $registros_avaliacao['probabilidade'];
                    $exibir_impacto = $registros_avaliacao['impacto'];

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


                    if ($exibir_impacto == 5) {
                      $exibir_impacto = 'Insignificante';
                    }
                    if ($exibir_impacto == 8) {
                      $exibir_impacto = 'Baixo';
                    }
                    if ($exibir_impacto == 17) {
                      $exibir_impacto = 'Moderado';
                    }
                    if ($exibir_impacto == 27) {
                      $exibir_impacto = 'Alto';
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


                    if ($num == 1) { ?>
                      <input type="hidden" value="<?php echo $registros_avaliacao['id'] ?>" name="codigo-futuro" id="codigo-futuro">
                      <div class="col-md-2 pl-0 ml-0">
                        <label>Probabilidade</label>
                        <input type="text" class="form-control" value="<?php echo $exibir_probabilidade ?>" readonly>
                      </div>

                      <div class="col-md-2">
                        <label>Impacto (Consequência)</label>
                        <input type="text" class="form-control" value="<?php echo $exibir_impacto ?>" readonly>
                      </div>

                      <div class="col-md-2">
                        <label>Nível do Risco</label>
                        <input type="text" class="form-control" value="<?php echo $registros_avaliacao['nivel']; ?>" readonly style="background-color: <?php echo $cor_nivel ?>">
                      </div>
                      <?php
                      if ($registros_avaliacao['decisao'] != '') {
                      ?>
                        <div class="col-md-2">
                          <label>Decisão de Tratamento do Risco</label>
                          <?php $decis = $registros_avaliacao['decisao'];
                          if ($decis == '0') {
                            $decis = 'Não Escolhido';
                          } else {
                            $decis = $registros_avaliacao['decisao'];
                          } ?>
                          <input type="text" class="form-control" name="cad-decisao-futuro" value="<?php echo $decis ?>" readonly>

                        </div>

                      <?php } ?>


                      <?php



                      mysqli_query($conexao, "SET NAMES 'utf8'");
                      mysqli_query($conexao, 'SET character_set_connection=utf8');
                      mysqli_query($conexao, 'SET character_set_client=utf8');
                      mysqli_query($conexao, 'SET character_set_results=utf8');
                      $conta = 1;
                      $selecao_itens2 = mysqli_query($conexao, "select * from tabela_avaliacao_risco_futuro WHERE codigo_matriz='$codigo_matriz'");
                      while ($registros_inerente = mysqli_fetch_array($selecao_itens2)) {
                        $itens_t = $registros_inerente['item'];
                        if ($itens_t == '1') {
                          $itens_t = 'Baixa';
                          $cor = '#41841E';
                        }
                        if ($itens_t == '2') {
                          $itens_t = 'Média';
                          $cor = '#F2E70A';
                        }
                        if ($itens_t == '3') {
                          $itens_t = 'Alta';
                          $cor = '#E58C2C';
                        }
                        if ($itens_t == '4') {
                          $itens_t = 'Muito Alta';
                          $cor = '#FF0000';
                        }

                      ?>



                        <div class="col-md-1">
                          <label><?php echo $registros_inerente['titulo'] ?></label>

                          <input type="text" class="form-control" value="<?php echo $itens_t ?>" readonly style="background-color: <?php echo $cor ?>" data-placement="top" data-toggle="popover" title="<?php echo $itens_t ?>" data-content="<?php echo $registros_impacto[$itensx] ?>" onMouseOver="Popover(2<?php echo $conta ?>)" id="popover2<?php echo $conta ?>" onMouseOut="Popover2(2<?php echo $conta ?>)">

                        </div>



                      <?php $conta = $conta + 1;
                      } ?>



                    <?php
                    } else {
                    ?>


                      <div class="col-md-2">
                        <label>Probabilidade</label>

                        <select class="form-control" name="cad-probabilidade-futuro" id="cad-probabilidade-futuro" onChange="Calcular3()">
                          <option value="0">Escolher</option>
                          <option value="1">Rara</option>
                          <option value="2">Improvável</option>
                          <option value="3">Possível</option>
                          <option value="4">Provável</option>
                          <option value="5">Quase certo</option>
                        </select>
                      </div>

                      <div class="col-md-2">
                        <label>Impacto (Consequência)</label>

                        <select class="form-control" name="cad-impacto-futuro" id="cad-impacto-futuro" onChange="Calcular3()">
                          <option value="0">Escolher</option>
                          <option value="5">Insignificante</option>
                          <option value="8">Baixo</option>
                          <option value="17">Moderado</option>
                          <option value="27">Alto</option>
                          <option value="40">Catastrófico</option>
                        </select>
                      </div>

                      <div class="col-md-2">
                        <label>Nível do Risco</label>

                        <input type="text" id="cad-nivel-do-risco-futuro" name="cad-nivel-do-risco-futuro" readonly>
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

                        $registros_item = $registros_impacto['item'];
                        $numer = mysqli_num_rows($selecao_impacto);

                        if ($numer > 1) {
                          if ($registros_item == 'Operacional/Estratégica') {
                            $registros_item = 'Op. Estratégica ';
                          }

                      ?>


                          <div class="col-md-1">
                            <label><?php echo $registros_item ?></label>

                            <input type="hidden" id="titulos[]" name="titulos[]" value="<?php echo $registros_item ?>">

                            <select class="form-control form-cores" name="futuro[]" id="cad-futuro-<?php echo $registros_impacto['id']; ?>" onChange="CoresNiveis('cad-futuro-<?php echo $registros_impacto['id']; ?>')">
                              <option value="0">Escolher</option>
                              <option value="1">Baixa</option>
                              <option value="2">Média</option>
                              <option value="3">Alta</option>
                              <option value="4">Muito Alta</option>

                            </select>
                          </div>



                      <?php }
                      } ?>








                      <div class="col-md-2">
                        <label>Decisão de Tratamento do Risco</label>

                        <select class="form-control" name="cad-decisao-futuro" id="cad-decisao-futuro">
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

                    <?php }
                    $verificar_cadastro = mysqli_query($conexao, "select * from avaliacao_risco_futuro WHERE codigo_matriz='$codigo_matriz'");
                    $numeros_inerente = mysqli_num_rows($verificar_cadastro);

                    if ($numeros_inerente == 0) {
                    ?>

                      <div class="col-md-12 mt-3">
                        <input type="submit" class="btn btn-primary" value="Gravar">

                      </div>
                    <?php } ?>

                  </div>
                </div>



              </form>


            </div>


            <br><br><br>

            <div id="resposta-tabela"></div>


          </div>
        </div>




        <div id="conteudo3">
          <div class="row">
            <div class="col-md-12">
              <h3>Tratamento</h3>
              <!-- <a class="mb-4 pointer" href="http:cadastro-planejamento-workflow.php" data-target="#ModalNovoPlanejamento"> <img src="imgs/icone-mais.png" width="25" height="25" alt="" /> Cadastro do Tratamento</a> -->
              <a class="btn btn-light pointer" data-toggle="modal" data-target="#ModalNovoPlanejamento" onClick="apagaForm()" style="padding-top:10px;padding-left:8px;padding-right:8px;padding-bottom:10px;margin-bottom:10px;border-radius:5px;background:#031335;color:#fff;"> Cadastro do Tratamento</a>
              <input type="hidden" name="codigo-matriz-de-risco" id="codigo-matriz-de-risco" value="<?php echo $codigo ?>">

              <br><br><br>


              <div class="col-md-12">

                <div class="table-responsive">


                  <table id="example-tratamento" class="display table">
                    <thead>
                      <tr>
                        <th style="width:400px;text-align:left;">Desc. Evento de Risco </th>
                        <th style="width:200px;text-align:left;">Causa</th>
                        <th style="width:200px;">Planejamento</th>
                        <th>Prioridade </th>
                        <th>Inicio </th>
                        <th>Término </th>
                        <th>Status</th>
                        <th style="width:100px;">Responsável</th>
                        <th style="width:160px;">Risco Inerente </th>
                        <th style="width:160px;">Risco Residual </th>
                        <th style="width:130px;">Risco Futuro </th>
                        <th style="width:40px">Editar</th>
                        <th style="width:40px">Excluir</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php

                      // $selecao2 = mysqli_query($conexao, "select * from responsaveis_workflow WHERE codigo_usuario='$codigo_usuario'");
                      // $registros2 = mysqli_fetch_array($selecao2);
                      // $codigo_workflow = $registros2['codigo_workflow'];

                      $selecao = mysqli_query($conexao, "select * from workflow WHERE codigo_matriz_risco='$codigo_matriz'");
                      while ($registros = mysqli_fetch_array($selecao)) {
                        $riscos = $registros['risco'];
                      ?>
                        <tr style="height:150px">


                          <td style="padding-left:20px;">
                            <?php
                            $selecao_risco = mysqli_query($conexao, "select * from identificacao_do_risco where id='$codigo_matriz'");
                            while ($registros_matriz = mysqli_fetch_array($selecao_risco)) {
                              $evento_risco = $registros_matriz['evento_risco'];
                              $codigo = $registros_matriz['id'] ?>
                              <a style="width:400px;" class="text-dark" href="matriz-de-risco.php?cod=<?php echo $registros_matriz['id'] ?>">
                                <?php echo $registros_matriz['evento_risco'] ?></a>
                            <?php } ?>
                          </td>


                          <td style="text-align:left;">
                            <a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['causa'] ?></a>
                          </td>

                          <td style="text-align:left;padding-left:20px;">
                            <a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['planejamento'] ?></a>
                          </td>

                          <td style="text-align:left;"><a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['prioridade'] ?></a></td>

                          <td style="text-align:center;"><a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>">
                              <?php $registros['data_inicio'];

                              $data_inicio = $registros['data_inicio'];

                              $ano_min = substr($data_inicio, 0, 4);
                              $mes_min = substr($data_inicio, 5, 2);
                              $dia_min = substr($data_inicio, 8, 2);

                              echo  @$data_inicio = $dia_min . "/" . $mes_min . "/" . $ano_min;



                              ?>




                            </a></td>

                          <td style="text-align:center;"><a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>"><?php

                                                                                                                                                  @$data_max = $data_inicio = $registros['data_vencimento'];
                                                                                                                                                  $ano_max = substr($data_max, 0, 4);
                                                                                                                                                  $mes_max = substr($data_max, 5, 2);
                                                                                                                                                  $dia_max = substr($data_max, 8, 2);

                                                                                                                                                  echo @$data_max = $dia_max . "/" . $mes_max . "/" . $ano_max;







                                                                                                                                                  ?></a></td>

                          <td style="text-align:center;"><a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>">
                              <?php echo $registros['status'] ?>
                            </a></td>



                          <td style="text-align:center;"><a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>">
                              <?php echo $registros['responProc'] ?>
                            </a></td>

                          <td style="width:125px;">
                            <?php
                            if ($riscos === 'Risco Inerente') {
                            ?>
                              <?php echo $registros['risco'] ?>
                            <?php } ?>
                          </td>



                          <td style="width:125px;">
                            <?php if ($riscos === 'Risco Residual') { ?>
                              <?php echo $registros['risco'] ?>
                            <?php } ?>
                          </td>

                          <td style="width:125px;">
                            <?php
                            if ($riscos === 'Risco Futuro') {
                            ?>
                              <?php echo $registros['risco'] ?>

                            <?php } ?>
                          </td>


                          <td style="text-align:center;">
                            <i class="fa fa-edit" style="cursor: pointer" onClick="EditarTratamento(<?php echo $registros['id'] ?>)" data-toggle="modal" data-target="#ModalEditarTratamento"></i>
                          </td>
                          <td style="text-align:center;">
                            <i class="fa fa-trash" style="cursor: pointer" onClick="ExcluirTratamento(<?php echo $registros['id'] ?>)"></i>
                          </td>



                        <?php } ?>



                  </table>
                </div>

              </div>


              <!-- <div id="resposta-tabela"></div>



              <div id="carregar-tabela-matriz-de-risco"></div> -->

            </div>
          </div>
        </div>



        <div id="conteudo4">
          <div class="row">
            <div class="col-md-12">
              <h3>Monitoramento</h3>
              <!-- <a class="mb-4 pointer" href="http:cadastro-planejamento-workflow.php" data-target="#ModalNovoPlanejamento"> <img src="imgs/icone-mais.png" width="25" height="25" alt="" /> Cadastro do Tratamento</a> -->
              <a class="btn btn-light pointer" data-toggle="modal" data-target="#ModalNovoMonitoramento" onClick="apagaForm()" style="padding-top:10px;padding-left:8px;padding-right:8px;padding-bottom:10px;margin-bottom:10px;border-radius:5px;background:#031335;color:#fff;"> Cadastro do Monitoramento</a>

              <br><br><br>



              <div class="col-md-12">

                <div class="table-responsive">

                  <table id="example-monitoramento" class="display table">
                    <thead>
                      <tr>
                        <th style="width:350px;text-align:left;">Definição de KPI's</th>
                        <th style="width:150px;text-align:left;">Periodicidade</th>
                        <th style="width:200px;text-align:left;">Responsável</th>
                        <th style="width:175px;text-align:left;">Objetivo atendido?</th>
                        <th style="width:400px;text-align:left;">Indicação de necessidade de revisão</th>
                        <th style="width:50px">Editar</th>
                        <th style="width:50px">Excluir</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php


                      // $selecao2 = mysqli_query($conexao, "select * from responsaveis_workflow WHERE codigo_usuario='$codigo_usuario'");
                      // $registros2 = mysqli_fetch_array($selecao2);
                      // $codigo_workflow = $registros2['codigo_workflow'];

                      $selecao = mysqli_query($conexao, "select * from monitoramento_risco WHERE codigo_matriz_risco='$codigo_matriz'");




                      while ($registros = mysqli_fetch_array($selecao)) {
                      ?>
                        <tr style="height:150px;">

                          <td style="margin-right:50px;text-align:left;padding-left:16px;">

                            <?php echo $registros['definicao_kpis'] ?>
                          </td>

                          <td style="margin-right:40px;text-align:left;padding-left:16px;"><?php echo $registros['periodicidade'] ?></td>


                          <td style="margin-right:90px;text-align:left;padding-left:16px;">
                            <?php echo $registros['responsavel'] ?>
                          </td>
                          <td style="width:175px;margin-right:40px;text-align:left;">
                            <?php echo $registros['objetivo_sim_nao'] ?>
                          </td>
                          <td style="width:400px;margin-right:20px;text-align:left;">
                            <?php echo $registros['necessidade_revisao_sim_nao'] ?>
                          </td>

                          <td style="text-align:left;">
                            <i class="fa fa-edit" style="cursor: pointer" onClick="EditarMonitoramento(<?php echo $registros['id'] ?>)" data-toggle="modal" data-target="#ModalEditarMonitoramento"></i>
                          </td>
                          <td style="text-align:left">
                            <i class="fa fa-trash" style="cursor: pointer" onClick="ExcluirMonitoramento(<?php echo $registros['id'] ?>)"></i>
                          </td>

                        <?php } ?>




                        </tr>



                    </tbody>

                  </table>



                </div>
              </div>


              <!-- <div id="resposta-tabela"></div> -->




            </div>
          </div>
          <!-- <div id="carregar-tabela-monitoramento"></div> -->
        </div>



        <!-- MODAL EDITAR AREA -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999999999">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Atualizar Área</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body pt-3 pb-3 mt-2 mb-5">

                <label class="mt-3">Área nova</label>
                <select class="form-control" id="cad-area-nova">
                  <?php
                  $selecao_area = mysqli_query($conexao, "select * from areas order by area ASC");
                  while ($registros_areas = mysqli_fetch_array($selecao_area)) {
                    if ($registros_areas['area'] != $registros['area']) {
                      $codigo_empresa = $registros_areas['codigo_empresa'];

                      $selecao_empresa = mysqli_query($conexao, "select * from empresas WHERE id='$codigo_empresa'");
                      $registros_empresa = mysqli_fetch_array($selecao_empresa);

                      if ($registros_areas['area'] != '') {
                  ?>
                        <option value="<?php echo $registros_areas['id'] ?>"><?php echo $registros_areas['area'] ?> </option>
                  <?php }
                    }
                  } ?>

                </select>

                <input type="button" class="btn btn-primary mt-3" value="Atualizar" onClick="AtualizarrArea()">


              </div>

            </div>
          </div>
        </div>


        <!-- MODAL EDITAR AREA PRINCIPAL -->
        <div class="modal fade" id="modalPrincipalArea" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999999999">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Atualizar Área Principal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body pt-3 pb-3 mt-2 mb-5">


                <select class="form-control" id="cad-area-nova-principal">
                  <?php
                  $selecao_area = mysqli_query($conexao, "select * from areas order by area ASC");
                  while ($registros_areas = mysqli_fetch_array($selecao_area)) {
                    if ($registros_areas['area'] != $registros['area']) {
                      $codigo_empresa = $registros_areas['codigo_empresa'];

                      $selecao_empresa = mysqli_query($conexao, "select * from empresas WHERE id='$codigo_empresa'");
                      $registros_empresa = mysqli_fetch_array($selecao_empresa);

                      if ($registros_areas['area'] != '') {
                  ?>
                        <option value="<?php echo $registros_areas['id'] ?>"><?php echo $registros_areas['area'] ?> </option>
                  <?php }
                    }
                  } ?>

                </select>

                <input type="button" class="btn btn-primary mt-3" value="Atualizar Area Principal" onClick="AtualizarAreaPrincipal()">


              </div>

            </div>
          </div>
        </div>



        <!-- MODAL EDITAR DEMAIS AREAS -->
        <div class="modal fade" id="ModalEditarDemaisAreas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999999999">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Atualizar Demais Áreas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body pt-3 pb-3 mt-2 mb-5">


                <select class="form-control" id="cad-area-nova-demais">
                  <?php
                  $selecao_area_demais = mysqli_query($conexao, "select * from areas order by area ASC");
                  while ($registros_areas_demais = mysqli_fetch_array($selecao_area_demais)) {
                    if ($registros_areas_demais['area'] != $registros['area']) {
                      $codigo_empresa = $registros_areas_demais['codigo_empresa'];

                      $selecao_empresa = mysqli_query($conexao, "select * from empresas WHERE id='$codigo_empresa'");
                      $registros_empresa = mysqli_fetch_array($selecao_empresa);

                      if ($registros_areas_demais['area'] != '') {
                  ?>
                        <option value="<?php echo $registros_areas_demais['id'] ?>"><?php echo $registros_areas_demais['area'] ?></option>
                  <?php }
                    }
                  } ?>

                </select>

                <input type="button" class="btn btn-primary mt-3" value="Atualizar Demais Áreas " onClick="AtualizarDemaisAreas()" data-dismiss="modal" aria-label="Close">


              </div>

            </div>
          </div>
        </div>












        <!-- Modal CONTROLES EXISTENTES-->
        <div class="modal fade" id="ModalControles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight:800">Controles Existentes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">


                <div class="row pl-4 pr-4 ml- mr-4">



                  <form id="form-cont-exist">
                    <div class="col-md-12 mb-3">
                      <label>Tratamento</label>
                      <textarea type="text" cols="5" rows="7" class="form-control mb-4" name="cad-nome" id="cad-nome">

                  </textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                      <label>Controles</label>
                      <textarea type="text" cols="5" rows="7" class="form-control mb-4" name="cad-objetivo" id="cad-objetivo">

                  </textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                      <label>Número do procedimento associado ao processo de trabalho envolvido</label>
                      <textarea type="text" cols="5" rows="7" class="form-control mb-4" name="cad-numero" id="cad-numero">

                  </textarea>
                    </div>
                  </form>

                </div>



                <div class="col-md-12 ml-2 mt-4">
                  <input type="button" value="Adicionar Controle" class="btn btn-primary float-right" onClick="AdicionarItens()" data-dismiss="modal">

                </div>


              </div>





              <div class="modal-footer">

              </div>
            </div>
          </div>
        </div>


        <!-- MODAL TRATAMENTO -->

        <div class="modal fade" id="ModalNovoPlanejamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999999999999999">
          <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Novo Tratamento</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">



                <div class="row ml-4 mr-6 mt-4 mb-4">
                  <div class="col-md-12">
                    <div id="retorno-datas" class="text-danger font-weight-bold mt-2 mb-2"></div>
                  </div>


                  <div>

                    <div class="row col-md-12" style="align-items:center;justify-content:space-between;">

                      <div class="row col-md-5 mx-0 px-0 mb-4">

                        <label>Causa</label>
                        <select class="form-control" name="causa_tratamento" id="causa_tratamento">
                          <option value="0">Escolher Causa</option>
                          <?php
                          mysqli_query($conexao, "SET NAMES 'utf8'");
                          mysqli_query($conexao, 'SET character_set_connection=utf8');
                          mysqli_query($conexao, 'SET character_set_client=utf8');
                          mysqli_query($conexao, 'SET character_set_results=utf8');
                          $selecao_causas = mysqli_query($conexao, "select * from matriz_de_risco_causas WHERE codigo_matriz='$codigo_matriz'");

                          while ($registros_causas = mysqli_fetch_array($selecao_causas)) {

                          ?>
                            <option class="imobSelect" style="overflow:hidden" value="<?php echo $registros_causas['id'] ?>"><?php echo $registros_causas['causa'] ?></option>

                          <?php } ?>
                        </select>
                      </div>
                      <div class="row col-md-5 mx-0 px-0 mb-4 ">

                        <label>Riscos</label>
                        <select class="form-control" name="risco" id="risco">
                          <option value=" 0">Escolher Risco</option>
                          <option value="Risco Inerente">Risco Inerente</option>
                          <option value="Risco Residual">Risco Residual</option>
                          <option value="Risco Futuro">Risco Futuro</option>
                        </select>
                      </div>
                    </div>

                    <div style="width:700px;" class="row col-md-12 px-0 pl-0 mb-4">
                      <div class="col-md-12 mx-0 ml-0">

                        <?php
                        mysqli_query($conexao, "SET NAMES 'utf8'");
                        mysqli_query($conexao, 'SET character_set_connection=utf8');
                        mysqli_query($conexao, 'SET character_set_client=utf8');
                        mysqli_query($conexao, 'SET character_set_results=utf8');
                        $selecao = mysqli_query($conexao, "select * from identificacao_do_risco where id='$codigo_matriz'");
                        while ($registros = mysqli_fetch_array($selecao)) {
                          $evento = $registros['evento_risco'];
                          $codigo = $registros['id'];
                          $area = $registros['area'] ?>
                          <label>Descrição do Evento de Risco</label>
                          <input type="text" class="form-control" name="cad-evento-risco" id="cad-evento-risco" value="<?php echo $registros['evento_risco'] ?>" readonly>
                        <?php } ?>

                      </div>
                    </div>


                    <div class="mt-1 px-0 py-0" style="width:700px;">
                      <form id="form-tratamento">
                        <div class="row col-md-12 mb-4">
                          <label>Descrever ações </label>
                          <textarea class="form-control" cols="5" rows="7" name="cad-descricao" id="cad-descricao">


		                 </textarea>
                        </div>
                    </div>


                    <div class="mt-1 px-0 py-0 row" style="width:700px;">

                      <div class="col-md-4 mb-4">
                        <label>Responsável pela ação</label>
                        <input type="text" name="responProc" id="responProc" class="form-control">
                      </div>



                      <div class="col-md-3 mb-4">
                        <label>Data Início</label>
                        <input type="text" name="cad-data-inicio" id="cad-data-inicio" class="form-control datepicker data" required autocomplete="off">
                      </div>

                      <div class="col-md-3 mb-4">
                        <label>Data Término</label>
                        <input type="text" name="cad-data-vencimento" id="cad-data-vencimento" class="form-control datepicker data" required autocomplete="off">
                      </div>

                    </div>


                    <div class="mt-1 px-0 py-0 row" style="width:700px;">
                      <div class="col-md-4 mb-4">
                        <label>Prioridade</label>

                        <select name="cad-prioridade" id="cad-prioridade" class="form-control">
                          <option>Baixa</option>
                          <option>Média</option>
                          <option>Alta</option>
                        </select>
                      </div>
                    </div>

                    </form>

                    <div class="col-md-9 mt-4 mx-0 px-0 ">
                      <input type="button" class="btn btn-primary " value="Cadastrar Tratamento" onClick="CadastrarTratamento()" data-dismiss="modal" aria-label="Close">
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>







      </div>





      <div class="modal fade" id="ModalNovoMonitoramento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999999999999999">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" style="font-weight:800;" id="exampleModalLabel ">Novo Monitoramento</h5>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


              <div class="row ml-4 mr-4 mt-4 mb-4">
                <div class="col-md-12">
                  <div id="retorno-datas" class="text-danger font-weight-bold mt-2 mb-2"></div>
                </div>

                <div>

                  <div class="mt-1 px-0 py-0" style="width:700px;height:350px;">
                    <h5 style="font-weight:800;">Métricas Para Acompanhamento das Ações</h5>

                    <form id="form-kpis">
                      <div class="col-md-10 px-0 py-0">
                        <label>Definição de KPI's</label>
                        <textarea name="definicao_kpis" id="definicao_kpis" class="form-control" required rows="3"></textarea>
                      </div>

                      <div class="col-md-3 mt-4 px-0 py-0">
                        <label>Periodicidade</label>
                        <select class="form-control" name="cad-periodicidade" id="cad-periodicidade" required>
                          <option><?php echo $registros['periodicidade'] ?></option>
                          <option>Diário</option>
                          <option>Quinzenal</option>
                          <option>Mensal</option>
                          <option>Bimestral</option>
                          <option>Trimestral</option>
                          <option>Semestral</option>
                          <option>Anual</option>
                          <option>Bianual</option>
                        </select>
                      </div>


                      <div class="col-md-8 mt-4 px-0 py-0">
                        <label>Responsável</label>
                        <input type="text" name="responsavel" id="responsavel" class="form-control" required>
                      </div>
                  </div>

                  </form>
                  <div class="mt-5" style="width:750px;height:200px;">
                    <h5 style="font-weight:800;">Evidências Métricas</h5>

                    <form id="form-ev">

                      <div class="d-flex" style="display:flex;align-items:center;">

                        <div class="col-md-6 mb-4 px-0 py-0">
                          <label>Objetivo atendido?</label>
                          <select class="form-control" name="objetivo" id="objetivo">
                            <option>Sim</option>
                            <option selected>Não</option>
                          </select>
                        </div>


                        <div class="col-md-6 mb-4">
                          <label>Indicação de necessidade de revisão </label>
                          <select class="form-control" name="necessidade_revisao" id="necessidade_revisao">
                            <option>Sim</option>
                            <option selected>Não</option>
                          </select>
                        </div>
                      </div>
                    </form>
                  </div>

                </div>

                <div class="col-md-12 mb-4">
                  <input type="button" class="btn btn-primary" value="Cadastrar Monitoramento" onClick="cadastrarMonitoramento()" data-dismiss="modal" aria-label="Close">
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>









      <!-- Modal Adicionar Controle -->
      <div class="modal fade" id="ModalAdicionarControle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="">

              <input type="hidden" id="obter-setor">

              <button type="button" class="close mr-3 mt-3" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <form id="form-causa">
                <div class="">

                  <div class="mb-4">
                    <label>Causa <span class="float-right" onClick="RemoverCausa()"><i class="fa fa-trash" style="cursor: pointer"></i></span></label>

                    <!-- <input type="text" class="form-control mt-3 col px-md-5 py-md-5" name="cad-causa" id="cad-causa" autocomplete="off"> -->
                    <textarea class="form-control" rows="5" name="cad-causa" id="cad-causa" autocomplete="off"></textarea>

                    <input type="button" value="Adicionar Nova Causa" class="btn btn-primary mt-3" onClick="GravarCausa()" data-dismiss="modal" aria-label="Close">

                  </div>


                </div>
              </form>
            </div>
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>



      <!-- Modal Adicionar Area principal -->
      <div class="modal fade" id="ModalAdicionarAreaPrincipal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="">

              <input type="hidden" id="obter-setor">

              <button type="button" class="close mr-3 mt-3" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <form id="form-causa">
                <div class="">

                  <div class="mb-4">
                    <label>Area Principal </label>

                    <select class="form-control" id="ad-area-nova-principal">
                      <?php
                      $selecao_area_principal = mysqli_query($conexao, "select * from areas order by area ASC");
                      while ($registros_areas_principal = mysqli_fetch_array($selecao_area_principal)) {
                        if ($registros_areas_principal['area'] != $registros['area']) {
                          $codigo_empresa = $registros_areas_principal['codigo_empresa'];

                          $selecao_empresa = mysqli_query($conexao, "select * from empresas WHERE id='$codigo_empresa'");
                          $registros_empresa = mysqli_fetch_array($selecao_empresa);

                          if ($registros_areas_principal['area'] != '') {
                      ?>
                            <option value="<?php echo $registros_areas_principal['id'] ?>"><?php echo $registros_areas_principal['area'] ?></option>
                      <?php }
                        }
                      } ?>

                    </select>
                    <input type="button" value="Adicionar Area Principal" class="btn btn-primary mt-3" onClick="AdicionarAreaPrincipal()" data-dismiss="modal" aria-label="Close">

                  </div>


                </div>
              </form>
            </div>
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>



      <!-- Modal Adicionar Demais Areas -->
      <div class="modal fade" id="ModalAdicionarDemaisAreas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="">

              <input type="hidden" id="obter-setor">

              <button type="button" class="close mr-3 mt-3" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <form id="form-causa">
                <div class="">

                  <div class="mb-4">
                    <label>Demais Áreas </label>

                    <select class="form-control" id="ad-demais-areas">
                      <?php
                      $selecao_area_principal = mysqli_query($conexao, "select * from areas order by area ASC");
                      while ($registros_areas_principal = mysqli_fetch_array($selecao_area_principal)) {
                        if ($registros_areas_principal['area'] != $registros['area']) {
                          $codigo_empresa = $registros_areas_principal['codigo_empresa'];

                          $selecao_empresa = mysqli_query($conexao, "select * from empresas WHERE id='$codigo_empresa'");
                          $registros_empresa = mysqli_fetch_array($selecao_empresa);

                          if ($registros_areas_principal['area'] != '') {
                      ?>
                            <option value="<?php echo $registros_areas_principal['id'] ?>"><?php echo $registros_areas_principal['area'] ?></option>
                      <?php }
                        }
                      } ?>

                    </select>
                    <input type="button" value="Adicionar Demais Áreas" class="btn btn-primary mt-3" onClick="AdicionarDemaisAreas()" data-dismiss="modal" aria-label="Close">

                  </div>


                </div>
              </form>
            </div>
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>










      <div class="modal fade" id="ModalAdicionarControle1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="">

              <input type="hidden" id="obter-setor">

              <button type="button" class="close mr-3 mt-3" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <form id="form-efeito">
                <div class="">



                  <div class="mb-4">
                    <label>Efeito <span class="float-right" onClick="RemoverEfeito()"><i class="fa fa-trash" style="cursor: pointer"></i></span></label>

                    <!-- <input type="text" class="form-control mt-3 col py-3 px-md-5 py-md-5" name="cad-causa" id="cad-causa" autocomplete="off"> -->
                    <textarea class="form-control" rows="5" name="cad-efeito" id="cad-efeito" autocomplete="off"></textarea>

                    <input type="button" value="Adicionar Novo Efeito" class="btn btn-primary mt-3" onClick="SalvarEfeito()">

                  </div>






                </div>
              </form>
            </div>
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>




      <!-- Modal Editar Controle -->
      <div class="modal fade" id="ModalEditarControles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="TituloEditarControle">
              </h5>



              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div id="resposta-editar-controle"></div>


            </div>
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>


      <!-- Modal Editar Tratamento -->
      <div class="modal fade" id="ModalEditarTratamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="TituloEditaTratamento">
              </h5>



              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div id="resposta-editar-tratamento"></div>


            </div>
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>






      <!-- Modal Editar Monitoramento -->
      <div class="modal fade" id="ModalEditarMonitoramento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="TituloEditarMonitoramento">
              </h5>



              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div id="resposta-editar-monitoramento"></div>


            </div>
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>



      <!-- Modal editar evento de risco -->
      <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="TituloEditarControle">
                Editar Descrição do Evento de Risco
              </h5>



              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div id="resposta-editar-evento"></div>


            </div>
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>


      <!-- Modal editar causa -->
      <div class="modal fade" id="causaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="TituloEditarControle">
                Editar Causa
              </h5>



              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div id="resposta-editar-causa"></div>


            </div>
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>


      <!-- Modal editar efeito -->
      <div class="modal fade" id="efeitoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="TituloEditarControle">
                Editar Efeito
              </h5>



              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div id="resposta-editar-efeito"></div>


            </div>
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>




      <!-- Modal  Risco Inerente -->
      <div class="modal fade" id="ModalInerente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="TituloEditarControle">
                Editar Risco Inerente
              </h5>



              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div id="resposta-editar-inerente"></div>


            </div>
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>


      <!-- Modal  Risco Residual -->
      <div class="modal fade" id="ModalResidual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="TituloEditarControle">
                Editar Risco Residual
              </h5>



              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div id="resposta-editar-residual"></div>


            </div>
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>


      <!-- Modal  Risco Futuro -->
      <div class="modal fade" id="ModalFuturo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="TituloEditarControle">
                Editar Risco Futuro
              </h5>



              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div id="resposta-editar-futuro"></div>


            </div>
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>



      <!-- Modal  Alterar Data -->
      <div class="modal fade" id="exampleModal45" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="TituloEditarControle">
                Alterar Data Id.
              </h5>



              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div id="resposta-alterar-data-id"></div>


            </div>
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>





      <script src="bibliotecas/jquery/jquery.min.js"></script>

      <script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>

      <script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>

      <script src="js/sb-admin.min.js" type="text/javascript"></script>

      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

      <script src="js/jquery.mask.min.js"></script>









      <script>
        $(document).ready(function() {

          $('#example').DataTable();
          $('#example2').DataTable();
          $('#examplecontrole').DataTable();

        });







        $("#example").dataTable({

          "bJQueryUI": true,

          "oLanguage": {

            "sProcessing": "Processando...",

            "sLengthMenu": "Mostrar _MENU_ registros",

            "sZeroRecords": "Não foram encontrados resultados",

            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",

            "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",

            "sInfoFiltered": "",

            "sInfoPostFix": "",

            "sSearch": "Buscar:",

            "sUrl": "",

            "oPaginate": {

              "sFirst": "Primeiro",

              "sPrevious": "Anterior",

              "sNext": "Seguinte",

              "sLast": "Último"

            }

          }

        });

        $("#example2").dataTable({
          "bJQueryUI": true,
          "oLanguage": {
            "sProcessing": "Processando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "Não foram encontrados resultados",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "oPaginate": {
              "sFirst": "Primeiro",
              "sPrevious": "Anterior",
              "sNext": "Seguinte",
              "sLast": "Último"
            }

          }

        })
        $("#example-tratamento").dataTable({
          "iDisplayLength": 4,
          "scrollY": 300,
          "bJQueryUI": true,
          "oLanguage": {
            "sProcessing": "Processando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "Não foram encontrados resultados",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "oPaginate": {
              "sFirst": "Primeiro",
              "sPrevious": "Anterior",
              "sNext": "Seguinte",
              "sLast": "Último"
            }

          }

        })


        $("#example-monitoramento").dataTable({
          "iDisplayLength": 4,
          "scrollY": 300,
          "bJQueryUI": true,
          "oLanguage": {
            "sProcessing": "Processando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "Não foram encontrados resultados",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "oPaginate": {
              "sFirst": "Primeiro",
              "sPrevious": "Anterior",
              "sNext": "Seguinte",
              "sLast": "Último"
            }

          }

        })
      </script>







      <script>
        $y = jQuery.noConflict()

        $y(document).ready(function() {

          $y('#tabela-comites').DataTable();

        });







        $y("#tabela-comites").dataTable({

          "bJQueryUI": true,

          "oLanguage": {

            "sProcessing": "Processando...",

            "sLengthMenu": "Mostrar _MENU_ registros",

            "sZeroRecords": "Não foram encontrados resultados",

            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",

            "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",

            "sInfoFiltered": "",

            "sInfoPostFix": "",

            "sSearch": "Buscar:",

            "sUrl": "",

            "oPaginate": {

              "sFirst": "Primeiro",

              "sPrevious": "Anterior",

              "sNext": "Seguinte",

              "sLast": "Último"

            }

          }

        })

        $ba = jQuery.noConflict()

        function ExcluirEmpresa(codigo) {

          if (window.confirm("Você deseja excluir o Monitoramento?")) {

            $ba.ajax({
              type: 'post',
              data: 'codigo=' + codigo,
              url: 'funcoes/excluir-monitoramento.php',
              success: function(retorno) {
                location.reload()
              }
            })
          }
        }
      </script>

      <script>
        $rodape = jQuery.noConflict()

        function AtivarLink() {
          $rodape('#<?php echo $nav_menu_principal ?>').addClass('show')
          $rodape('#menu-<?php echo $nav_menu_pagina ?>').css('font-weight', 'bold')

        }
        AtivarLink()
      </script>


      <script src="bibliotecas/jquery/jquery.min.js"></script>
      <script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
      <script src="js/sb-admin.min.js" type="text/javascript"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
      <script src="js/jquery.mask.min.js"></script>
      <script src="js/mascaras.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

      <script>
        $y = jQuery.noConflict()
        $y(document).ready(function() {
          $y('#tabela-comites').DataTable();




        });



        $y("#tabela-comites").dataTable({
          "bJQueryUI": true,
          "oLanguage": {
            "sProcessing": "Processando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "Não foram encontrados resultados",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "oPaginate": {
              "sFirst": "Primeiro",
              "sPrevious": "Anterior",
              "sNext": "Seguinte",
              "sLast": "Último"
            }
          }
        })




        function EditarAtualizarRisco() {



          $y.ajax({
            type: 'post',
            data: 'codigo=<?php echo $codigo_matriz ?>',
            url: 'funcoes/editar-evento-risco.php',
            success: function(retorno) {
              $y('#resposta-editar-evento').html(retorno)

            }
          })
        }


        function AtualizarRisco() {

          var risco = $y("#edit-evento-risco").val()


          $y.ajax({
            type: 'post',
            data: 'codigo=<?php echo $codigo_matriz ?>&risco=' + risco,
            url: 'funcoes/atualizar-evento-risco.php',
            success: function(retorno) {
              $y('#resposta-editar-evento').html(retorno)
              location.href = 'matriz-de-risco.php?cod=<?php echo $codigo ?>&aba=analise'
            }
          })

        }
        // function EditarAtualizarOrigem() {



        //   $y.ajax({
        //     type: 'post',
        //     data: 'codigo=<?php echo $codigo_matriz ?>',
        //     url: 'funcoes/editar-evento-risco.php',
        //     success: function(retorno) {
        //       $y('#resposta-editar-evento').html(retorno)

        //     }
        //   })
        // }



        function EditarAtualizarData(data) {



          $y.ajax({
            type: 'post',
            data: 'codigo=<?php echo $codigo ?>&data=' + data,
            url: 'funcoes/editar-atualizar-data-id.php',
            success: function(retorno) {
              $y('#resposta-alterar-data-id').html(retorno)

            }
          })
        }

        function GravarEditarDataId(codigo) {

          var data = $y("#cad-editar-data-id").val()

          $y.ajax({
            type: 'post',
            data: 'codigo=' + codigo + '&data=' + data,
            url: 'funcoes/gravar-editar-data-id.php',
            success: function(retorno) {
              $y(".close").trigger('click')
              location.reload()
            }
          })

        }
      </script>





      <script>
        $g = jQuery.noConflict()

        function Abas(codigo) {

          if (codigo == 1) {

            $g('#btn1').addClass('btn-primary')

            $g('#btn2').removeClass('btn-primary')
            $g('#btn3').removeClass('btn-primary')
            $g('#btn4').removeClass('btn-primary')
            $g('#btn5').removeClass('btn-primary')

            $g('#conteudo1').show()
            $g('#conteudo2').hide()
            $g('#conteudo3').hide()
            $g('#conteudo4').hide()
            $g('#conteudo5').hide()

          }

          if (codigo == 2) {

            $g('#conteudo2').show()
            $g('#conteudo1').hide()
            $g('#conteudo3').hide()
            $g('#conteudo4').hide()
            $g('#conteudo5').hide()

            $g('#btn2').removeClass('btn-light')
            $g('#btn2').addClass('btn-primary')

            $g('#btn1').removeClass('btn-primary')
            $g('#btn3').removeClass('btn-primary')
            $g('#btn4').removeClass('btn-primary')
            $g('#btn5').removeClass('btn-primary')

          }

          if (codigo == 3) {

            $g('#conteudo3').show()
            $g('#conteudo1').hide()
            $g('#conteudo2').hide()
            $g('#conteudo4').hide()
            $g('#conteudo5').hide()

            $g('#btn3').removeClass('btn-light')
            $g('#btn3').addClass('btn-primary')

            $g('#btn1').removeClass('btn-primary')
            $g('#btn2').removeClass('btn-primary')
            $g('#btn4').removeClass('btn-primary')
            $g('#btn5').removeClass('btn-primary')

          }

          if (codigo == 4) {

            $g('#conteudo4').show()
            $g('#conteudo1').hide()
            $g('#conteudo2').hide()
            $g('#conteudo3').hide()
            $g('#conteudo5').hide()

            $g('#btn4').removeClass('btn-light')
            $g('#btn4').addClass('btn-primary')

            $g('#btn1').removeClass('btn-primary')
            $g('#btn2').removeClass('btn-primary')
            $g('#btn3').removeClass('btn-primary')
            $g('#btn5').removeClass('btn-primary')

          }

          if (codigo == 5) {

            $g('#conteudo5').show()
            $g('#conteudo1').hide()
            $g('#conteudo2').hide()
            $g('#conteudo3').hide()
            $g('#conteudo4').hide()

            $g('#btn5').removeClass('btn-light')
            $g('#btn5').addClass('btn-primary')

            $g('#btn1').removeClass('btn-primary')
            $g('#btn2').removeClass('btn-primary')
            $g('#btn3').removeClass('btn-primary')
            $g('#btn4').removeClass('btn-primary')

          }


        }


        $g(document).ready(function() {



          $g('#conteudo2').hide()
          $g('#conteudo3').hide()
          $g('#conteudo4').hide()
          $g('#conteudo5').hide()

          $g("#sanfona-conteudo1").hide()
          $g("#sanfona-conteudo2").hide()
          $g("#sanfona-conteudo3").hide()
          $g("#sanfona-conteudo4").hide()
          $g("#sanfona-conteudo5").hide()


          $g("#baixo1").hide()


          CarregarMatriz()
          CarregarTabelaControlesExistentes()




        })



        $g(document).ready(function() {
          $g('#example').DataTable();
          $g('#tabela_causas').DataTable();

        });



        $g("#example").dataTable({
          "bJQueryUI": true,
          "oLanguage": {
            "sProcessing": "Processando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "Não foram encontrados resultados",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "oPaginate": {
              "sFirst": "Primeiro",
              "sPrevious": "Anterior",
              "sNext": "Seguinte",
              "sLast": "Último"
            }
          }
        })


        function LoadTabelaCausas() {

          $g("#tabela_causas").dataTable({
            "bJQueryUI": true,
            "oLanguage": {
              "sProcessing": "Processando...",
              "sLengthMenu": "Mostrar _MENU_ registros",
              "sZeroRecords": "Não foram encontrados resultados",
              "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
              "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
              "sInfoFiltered": "",
              "sInfoPostFix": "",
              "sSearch": "Buscar:",
              "sUrl": "",
              "oPaginate": {
                "sFirst": "Primeiro",
                "sPrevious": "Anterior",
                "sNext": "Seguinte",
                "sLast": "Último"
              }
            }
          })

        }


        function AdicionarItens() {

          var nome = $g('#cad-nome').val()
          var objetivo = $g('#cad-objetivo').val()
          var numero = $g('#cad-numero').val()



          $g.ajax({
            type: 'post',
            data: 'codigo=<?php echo $codigo_matriz ?>&nome=' + nome + '&objetivo=' + objetivo + '&numero=' + numero,
            url: 'funcoes/gravar-itens-controles-existentes.php',
            success: function(retorno) {
              CarregarTabelaControlesExistentes()

            }
          })
        }


        function CarregarTabelaControlesExistentes() {



          $g.ajax({
            type: 'post',
            data: 'codigo=<?php echo $codigo_matriz; ?>',
            url: 'tabela-controles-existentes.php',
            success: function(retorno) {
              $g('#carregar-tabela-controles-existentes').html(retorno);


            }
          })



        }


        $g(document).ready(function() {
          CarregarTabelaControlesExistentes()
          CarregarTabelaMatrizDeRiscos()
          CarregarTabelaMonitoramento()

          $g('#conteudo2').hide()
          $g('#conteudo3').hide()
          $g('#conteudo4').hide()
          $g('#conteudo5').hide()

          // $g("#sanfona-conteudo1").hide()
          $g("#sanfona-conteudo2").hide()
          $g("#sanfona-conteudo3").hide()
          $g("#sanfona-conteudo4").hide()
          $g("#sanfona-conteudo5").hide()
          $g("#sanfona-conteudo6").hide()

          $g("#baixo1").hide()


          CarregarMatriz()
          CarregarTabelaCausas()
          CarregarIshikawa('Método')
          CarregarIshikawaEfeito('Método')


          var abas = $g('#abas').val()

          if (abas == 'analise') {
            $g('#btn1').trigger('click')
            $g('#conteudo1').show()
          }
          if (abas == 'avaliacao') {
            $g('#btn2').trigger('click')
            $g('#conteudo2').show()
          }
          if (abas == 'tratamento') {
            $g('#btn3').trigger('click')
            $g('#conteudo3').show()
          }
          if (abas == 'monitoramento') {
            $g('#btn4').trigger('click')
            $g('#conteudo4').show()
          }


        })


        function ExcluirMonitoramento(codigo) {
          if (window.confirm("Você deseja excluir o Monitoramento?")) {

            $g.ajax({
              type: 'post',
              data: 'codigo=' + codigo,
              url: 'funcoes/excluir-monitoramento.php',
              success: function(retorno) {
                $g('#resposta-matriz').html(retorno);
                location.href = 'matriz-de-risco.php?cod=<?php echo $codigo ?>&aba=monitoramento'

                // CarregarTabelaMonitoramento()
              }
            })

          }
        }





        function AbrirSanfona(codigo) {

          $g('#sanfona-conteudo' + codigo).toggle()

        }


        function ModalAdicionarControle(titulo) {

          document.getElementById('form-causa').reset();


          $g('.pos-causa').hide()
          $g('#TituloAdicionarControle').html(titulo)
          $g('#obter-setor').val(titulo)
          $g('#ModalAdicionarControle').modal('show');
          CarregarEscCausas()

        }



        function ModalEditarDemaisAreas() {

          document.getElementById('form-causa').reset();


          $g('.pos-area').hide()
          $g('#ModalEditarDemaisAreas').modal('show');


        }




        function ModalAdicionarAreaPrincipal() {

          document.getElementById('form-causa').reset();


          $g('.pos-area').hide()
          $g('#ModalAdicionarAreaPrincipal').modal('show');


        }

        function ModalAdicionarDemaisAreas() {

          document.getElementById('form-causa').reset();


          $g('.pos-area').hide()
          $g('#ModalAdicionarDemaisAreas').modal('show');


        }

        function ModalAdicionarControle1(titulo) {

          document.getElementById('form-efeito').reset();


          $g('.pos-efeito').hide()
          $g('#TituloAdicionarControle').html(titulo)
          $g('#obter-setor').val(titulo)
          $g('#ModalAdicionarControle1').modal('show');
          CarregarEscCausas()

        }


        function Calcular() {

          var probabilidade = $g("#cad-probabilidade-avaliacao option:selected").val()
          var impacto = $g("#cad-impacto-avaliacao option:selected").val()

          if (probabilidade == 0 || impacto == 0) {

            $g('#cad-nivel-do-risco-inerente').val('')
            $g('#cad-nivel-do-risco-inerente').css("background-color", "#fff")

          } else {


            var calcular = (probabilidade * impacto)

            var resultado = ''
            var cor = ''

            if (calcular <= 16) {
              resultado = 'Aceitável';
              cor = '#41841E'
            }
            if (calcular >= 17 && calcular <= 34) {
              resultado = 'Significativo';
              cor = '#F2E70A'
            }
            if (calcular >= 40 && calcular <= 85) {
              resultado = 'Sério';
              cor = '#E58C2C'
            }
            if (calcular >= 108 && calcular <= 200) {
              resultado = 'Inaceitável';
              cor = '#FF0000'
            }

            $g('#cad-nivel-do-risco-inerente').val(resultado)
            $g('#cad-nivel-do-risco-inerente').css("background-color", cor)
          }

        }

        function Calcular2() {

          var probabilidade = $g("#cad-probabilidade-residual option:selected").val()
          var impacto = $g("#cad-impacto-residual option:selected").val()

          if (probabilidade == 0 || impacto == 0) {
            $g('#cad-nivel-do-risco-residual').val('')
            $g('#cad-nivel-do-risco-residual').css("background-color", "#fff")


          } else {

            var calcular = (probabilidade * impacto)

            var resultado = ''
            var cor = ''

            if (calcular <= 16) {
              resultado = 'Aceitável';
              cor = '#41841E'
            }
            if (calcular >= 17 && calcular <= 34) {
              resultado = 'Significativo';
              cor = '#F2E70A'
            }
            if (calcular >= 40 && calcular <= 85) {
              resultado = 'Sério';
              cor = '#E58C2C'
            }
            if (calcular >= 108 && calcular <= 200) {
              resultado = 'Inaceitável';
              cor = '#FF0000'
            }

            $g('#cad-nivel-do-risco-residual').val(resultado)
            $g('#cad-nivel-do-risco-residual').css("background-color", cor)


          }
        }

        function Calcular3() {

          var probabilidade = $g("#cad-probabilidade-futuro option:selected").val()
          var impacto = $g("#cad-impacto-futuro option:selected").val()

          if (probabilidade == 0 || impacto == 0) {
            $g('#cad-nivel-do-risco-futuro').val('')
            $g('#cad-nivel-do-risco-futuro').css("background-color", "#fff")


          } else {

            var calcular = (probabilidade * impacto)

            var resultado = ''
            var cor = ''

            if (calcular <= 16) {
              resultado = 'Aceitável';
              cor = '#41841E'
            }
            if (calcular >= 17 && calcular <= 34) {
              resultado = 'Significativo';
              cor = '#F2E70A'
            }
            if (calcular >= 40 && calcular <= 85) {
              resultado = 'Sério';
              cor = '#E58C2C'
            }
            if (calcular >= 108 && calcular <= 200) {
              resultado = 'Inaceitável';
              cor = '#FF0000'
            }

            $g('#cad-nivel-do-risco-futuro').val(resultado)
            $g('#cad-nivel-do-risco-futuro').css("background-color", cor)


          }
        }


        function CoresNiveis(campo) {
          var nivel = $g("#" + campo).val()
          var cor = '';

          if (nivel == '1') {
            cor = '#41841E'
          }
          if (nivel == '2') {
            cor = '#F2E70A'
          }
          if (nivel == '3') {
            cor = '#E58C2C'
          }
          if (nivel == '4') {
            cor = '#FF0000'
          }

          campo = $g('#' + campo).css("background-color", cor)

        }

        function CarregarMatriz() {

          $g('#carregar-matriz').load("funcoes/carrega-matriz.php")

        }


        $g(".datepicker").datepicker({
          dateFormat: 'dd/mm/yy',
          dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
          dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
          dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
          monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
          monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
          nextText: 'Próximo',
          prevText: 'Anterior'
        });


        $g(function() {
          $g(".datepicker").datepicker();
        });



        function CarregarData() {


          $g(".datepickerx").datepicker({
            dateFormat: 'dd/mm/yy',
            dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
            dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
            dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
            monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            nextText: 'Próximo',
            prevText: 'Anterior'
          });


          $g(function() {
            $g(".datepickerx").datepicker();
          });
        }


        function VerificarControle() {
          var listar = $g("#esc-listar option:selected").val()


          if (listar != 0) {
            $g.ajax({
              type: 'post',
              data: 'codigo=' + listar,
              url: 'funcoes/verificar-listar-controle.php',
              success: function(retorno) {
                $g('#esc-parecer').val(retorno);

              }
            })
          }
        }


        function AdicionarControleTabela(setor) {

          var controle = $g("#esc-listar option:selected").val()
          var parecer = $g("#esc-parecer").val()
          var causa = $g("#esc-causa").val()
          var setor = $g("#obter-setor").val()


          $g.ajax({
            type: 'post',
            data: 'controle=' + controle + '&parecer=' + parecer + '&codigo_matriz=<?php echo $_REQUEST['cod'] ?>&codigo_causa=' + causa + '&setor=' + setor,
            url: 'funcoes/gravar-listar-parecer.php',
            success: function(retorno) {
              CarregarTabelaCausas()


            }
          })
        }


        function cadastrarMonitoramento(codigo) {

          var definicao_kpis = $g("#definicao_kpis").val()
          var periodicidade = $g("#cad-periodicidade option:selected").val()
          var responsavel = $g("#responsavel").val()
          var objetivo = $g("#objetivo option:selected").val()
          var necessidade_revisao = $g("#necessidade_revisao option:selected").val()


          $g.ajax({
            type: 'post',
            data: 'codigo_matriz=<?php echo $_REQUEST['cod'] ?>&definicao_kpis=' + definicao_kpis + '&periodicidade=' + periodicidade + '&responsavel=' + responsavel + '&objetivo=' + objetivo + '&necessidade_revisao=' + necessidade_revisao,
            url: 'processa-cadastro-monitoramento-risco.php',
            success: function(retorno) {
              // alert("Monitoramento Cadastrado!")
              location.href = 'matriz-de-risco.php?cod=<?php echo $codigo ?>&aba=monitoramento'
              // CarregarTabelaMonitoramento()
            }
          })
        }


        function CarregarTabelaMonitoramento() {


          $g.ajax({
            type: 'post',
            data: 'codigo_matriz=<?php echo $_REQUEST['cod'] ?>&usuario=<?php echo $id_usuario ?>',
            url: 'funcoes/carregar-tabela-monitoramento.php',
            success: function(retorno) {
              $g('#carregar-tabela-monitoramento').html(retorno)

            }
          })
        }




        function CadastrarRisco() {

          var data_id_risco = $g('#cad-data-id-risco').val()
          var evento = $g('#cad-evento').val()
          var empresa = $g('#empresa').val()
          var origem = $g('#cad-origem').val()
          var fator = $g('#cad-origem').val()
          var processo = $g('#cad-processo').val()
          var item_oea = $g('#cad-item-oea').val()
          var itens = $g('#codigo_qaa_risco').val()
          var area_risco = $g('#cad-area-risco').val()


          $g.ajax({
            type: 'post',
            data: 'data_id_risco=' + data_id_risco + '&empresa=' + empresa + '&evento=' + evento + '&origem=' + origem + '&fator=' + fator +
              '&processo=' + processo + '&item_oea=' + item_oea + '&itens=' + itens + '&area_risco=' + area_risco,
            url: 'processa-cadastro-identificacao-risco.php',
            success: function(retorno) {
              $g('#carregar-tabela-matriz-de-risco').html(retorno)
            }
          })
        }





        function carregarTabelaAvaliacao() {


          $g.ajax({
            type: 'post',
            data: 'codigo_matriz=<?php echo $_REQUEST['cod'] ?>&usuario=<?php echo $id_usuario ?>',
            url: 'funcoes/carregar-tabela-avaliacao.php',
            success: function(retorno) {
              $g('#carregar-tabela-avaliacao').html(retorno)
            }
          })
        }


        function CarregarTabelaCausas() {

          var causa = $g('#esc-causa').val()

          $g.ajax({
            type: 'post',
            data: 'codigo_matriz=<?php echo $_REQUEST['cod'] ?>&codigo_causa=' + causa,
            url: 'funcoes/carregar-tabela-causas.php',
            success: function(retorno) {
              $g('#carregar-tabela-causas').html(retorno)
              LoadTabelaCausas()
            }
          })
        }


        function CarregarEscCausas() {
          var setor = $g('#obter-setor').val()

          $g.ajax({
            type: 'post',
            data: 'setor=' + setor,
            url: 'funcoes/carrega-esc-causa.php',
            success: function(retorno) {
              $g('#carregar-esc-causa').html(retorno)
            }
          })
        }



        function ExcluirTabelaCausas(codigo) {
          if (window.confirm("Tem certeza que deseja excluir?")) {
            $g.ajax({
              type: 'post',
              data: 'codigo=' + codigo,
              url: 'funcoes/excluir-tabela-causas-temp.php',
              success: function(retorno) {
                CarregarTabelaCausas()
              }
            })
          }
        }


        function ExcluirCausa(codigo) {
          if (window.confirm("Tem certeza que deseja excluir?")) {
            $g.ajax({
              type: 'post',
              data: 'codigo=' + codigo,
              url: 'funcoes/excluir-causa.php',
              success: function(retorno) {

                CarregarIshikawa('Método')

                $g('#carregar-ishikawa').html(retorno)
              }
            })
          }
        }


        function ExcluirEfeito(codigo) {
          if (window.confirm("Tem certeza que deseja excluir?")) {
            $g.ajax({
              type: 'post',
              data: 'codigo=' + codigo,
              url: 'funcoes/excluir-efeito.php',
              success: function(retorno) {

                CarregarIshikawaEfeito('Método')
                // CarregarIshikawa2('Medidas')
                // CarregarIshikawa3('Mão de Obra')
                // CarregarIshikawa4('Máquina')
                // CarregarIshikawa5('Meio Ambiente')
                // CarregarIshikawa6('Materiais')
                $g('#carregar-ishikawa-efeito').html(retorno)

              }
            })
          }
        }


        function RemoverCausa() {
          var codigo = $g("#esc-causa option:selected").val()
          if (window.confirm("Você deseja excluir a Causa?")) {

            $g.ajax({
              type: 'post',
              data: 'codigo=' + codigo,
              url: 'funcoes/remover-causa.php',
              success: function(retorno) {
                $g('.close').trigger("click")

              }
            })
          }

        }


        function apagaForm() {
          document.getElementById('form-kpis').reset();
          document.getElementById('form-ev').reset();
          document.getElementById('form-tratamento').reset();
          document.getElementById('form-cont-exist').reset();
        }


        function GravarCausa() {

          var causa = $g('#cad-causa').val()
          var setor = $g('#obter-setor').val()

          $g.ajax({
            type: 'post',
            data: '&causa=' + causa + '&codigo_matriz=<?php echo $_REQUEST['cod'] ?>&codigo_causa=' + '&setor=' + setor,
            url: 'funcoes/gravar-causa.php',
            success: function(retorno) {
              // $g('.close').trigger("click")
              // $g('.pos-causa').show()
              CarregarIshikawa('Método')

              $g('#carregar-ishikawa').html(retorno)
            }
          })
        }


        function ExcluirAreaPrincipal(codigo) {



          $g.ajax({
            type: 'post',
            data: 'codigo_matriz=<?php echo $_REQUEST['cod'] ?>',
            url: 'funcoes/excluir-area-principal.php',
            success: function(retorno) {
              // $g('.close').trigger("click")
              // $g('.pos-causa').show()

              location.href = 'matriz-de-risco.php?cod=<?php echo $codigo ?>&aba=analise'

            }
          })
        }



        function AdicionarAreaPrincipal(codigo) {

          var area = $g('#ad-area-nova-principal option:selected').val()


          $g.ajax({
            type: 'post',
            data: 'codigo_matriz=<?php echo $_REQUEST['cod'] ?>&area=' + area,
            url: 'funcoes/adicionar-area-principal.php',
            success: function(retorno) {
              // $g('.close').trigger("click")
              // $g('.pos-causa').show()

              location.href = 'matriz-de-risco.php?cod=<?php echo $codigo ?>&aba=analise'


            }
          })
        }

        function ExcluirDemaisAreas(codigo) {



          $g.ajax({
            type: 'post',
            data: 'codigo_matriz=<?php echo $_REQUEST['cod'] ?>',
            url: 'funcoes/excluir-demais-areas.php',
            success: function(retorno) {
              // $g('.close').trigger("click")
              // $g('.pos-causa').show()

              location.href = 'matriz-de-risco.php?cod=<?php echo $codigo ?>&aba=analise'

            }
          })
        }


        function AdicionarDemaisAreas(codigo) {

          var area = $g('#ad-demais-areas option:selected').val()


          $g.ajax({
            type: 'post',
            data: 'codigo_matriz=<?php echo $_REQUEST['cod'] ?>&area=' + area,
            url: 'funcoes/adicionar-demais-areas.php',
            success: function(retorno) {
              // $g('.close').trigger("click")
              // $g('.pos-causa').show()

              location.href = 'matriz-de-risco.php?cod=<?php echo $codigo ?>&aba=analise'


            }
          })
        }





        function CarregarIshikawa(setor) {
          $g.ajax({
            type: 'post',
            data: 'codigo_matriz=<?php echo $_REQUEST['cod'] ?>&setor=' + setor,
            url: 'funcoes/carregar-ishikawa.php',
            success: function(retorno) {
              $g('#carregar-ishikawa').html(retorno)

            }
          })
        }

        function CarregarIshikawaEfeito(setor) {
          $g.ajax({
            type: 'post',
            data: 'codigo_matriz=<?php echo $_REQUEST['cod'] ?>&setor=' + setor,
            url: 'funcoes/carregar-ishikawa-efeito.php',
            success: function(retorno) {
              $g('#carregar-ishikawa-efeito').html(retorno)

            }
          })
        }





        function Controle() {
          var controle = $g('#esc-controle option:selected').val()

          if (controle == 'sim') {
            $g('.esc-listar').show()
            $g('.esc-parecer').show()
          }

          if (controle == 'Não') {
            $g('.esc-listar').hide()
            $g('.esc-parecer').hide()
          }
        }


        function Popover(id) {
          $g('#popover' + id).popover('show')

        }

        function Popover2(id) {
          $g('#popover' + id).popover('hide')

        }



        function CadastrarTratamento(codigo) {

          var inicio = $g('#cad-data-inicio').val()
          var vencimento = $g('#cad-data-vencimento').val()
          var causa_tratamento = $g('#causa_tratamento option:selected').val()
          var risco = $g('#risco option:selected').val()


          var dia1 = inicio.substring(0, 2);
          var mes1 = inicio.substring(5, 3);
          var ano1 = inicio.substring(10, 6);


          if (dia1 > 31) {
            $g("#retorno-datas").html("Campo Data de Inicio preenchido incorretamente ou não preenchido!")
          } else if (mes1 > 12) {
            $g("#retorno-datas").html("Campo Data de Inicio preenchido incorretamente ou não preenchido!")
          } else if (ano1 <= 1999) {
            $g("#retorno-datas").html("Campo Data de Inicio preenchido incorretamente ou não preenchido!")
          } else {



            var dia2 = vencimento.substring(0, 2);
            var mes2 = vencimento.substring(5, 3);
            var ano2 = vencimento.substring(10, 6);


            if (dia2 > 32) {
              $g("#retorno-datas").html("Campo Previsão Entrega preenchido incorretamente ou não preenchido!")
            } else if (mes2 > 12) {
              $g("#retorno-datas").html("Campo Previsão Entrega preenchido incorretamente ou não preenchido!")
            } else if (ano2 <= 1999) {
              $g("#retorno-datas").html("Campo Previsão Entrega preenchido incorretamente ou não preenchido!")
            } else {






              var responProc = $g('#responProc').val()
              var descricao = $g('#cad-descricao').val()
              var prioridade = $g('#cad-prioridade option:selected').val()
              var titulo = $g('#cad-titulo').val()

              $g.ajax({
                type: 'post',
                data: 'codigo_matriz=<?php echo $_REQUEST['cod'] ?>&inicio=' + inicio + '&vencimento=' + vencimento + '&descricao=' + descricao + '&prioridade=' + prioridade + '&titulo=' + titulo + '&responProc=' + responProc + '&causa_tratamento=' + causa_tratamento + '&risco=' + risco,
                url: 'funcoes/gravar-tratamento-matriz-risco.php',
                success: function(retorno) {
                  // $g('#carregar-tabela-matriz-de-risco').html(retorno)
                  // $g("#retorno-datas").html('')
                  // $g('#cad-data-vencimento').val('')
                  location.href = 'matriz-de-risco.php?cod=<?php echo $codigo ?>&aba=tratamento'

                  // $g(".close").trigger('click')
                  // location.reload()
                  // CarregarTabelaMatrizDeRiscos()

                }
              })
            }
          }
        }




        function CarregarTabelaMatrizDeRiscos() {


          $g.ajax({
            type: 'post',
            data: 'codigo_matriz=<?php echo $_REQUEST['cod'] ?>&usuario=<?php echo $id_usuario ?>',
            url: 'funcoes/carregar-tabela-matriz-de-risco.php',
            success: function(retorno) {
              $g('#carregar-tabela-matriz-de-risco').html(retorno)
            }
          })
        }



        function Excluir(variavel, codigo) {
          if (window.confirm("Tem certeza que deseja excluir?")) {

            $g.ajax({
              type: 'post',
              data: 'codigo=' + variavel,
              url: 'funcoes/excluir-workflow.php',
              success: function(retorno) {
                // CarregarTabelaMatrizDeRiscos()
                location.href = 'matriz-de-risco.php?cod=<?php echo $codigo ?>&aba=tratamento'

              }
            })
          }
        }


        function ExcluirControlesExistentes(codigo) {
          if (window.confirm("Você deseja excluir o Controle?")) {

            $g.ajax({
              type: 'post',
              data: 'codigo=' + codigo,
              url: 'funcoes/excluir-controles-existentes-temp.php',
              success: function(retorno) {
                $g('#resposta-matriz').html(retorno);

                CarregarTabelaControlesExistentes()
              }
            })

          }
        }




        function EditarControlesExistentes(codigo) {

          $g.ajax({
            type: 'post',
            data: 'codigo=' + codigo,
            url: 'funcoes/carregar-editar-controles.php',
            success: function(retorno) {
              $g("#resposta-editar-controle").html(retorno)
            }
          })
        }


        function AtualizarItens(codigo) {

          var nome = $g('#alt-nome').val()
          var objetivo = $g('#alt-controle').val()
          var numero = $g('#alt-numero').val()



          $g.ajax({
            type: 'post',
            data: 'codigo=' + codigo + '&nome=' + nome + '&objetivo=' + objetivo + '&numero=' + numero,
            url: 'funcoes/atualizar-itens-controles-existentes.php',
            success: function(retorno) {
              CarregarTabelaControlesExistentes()

            }
          })


        }

        function EditarCausa(codigo) {
          $g.ajax({
            type: 'post',
            data: 'codigo=' + codigo,
            url: 'funcoes/carregar-editar-causa.php',
            success: function(retorno) {
              CarregarIshikawa('Método')

              $g('#resposta-editar-causa').html(retorno)
            }
          })
        }


        function EditarEfeito(codigo) {
          $g.ajax({
            type: 'post',
            data: 'codigo=' + codigo,
            url: 'funcoes/carregar-editar-efeito.php',
            success: function(retorno) {
              CarregarIshikawa('Método')

              $g('#resposta-editar-efeito').html(retorno)
            }
          })
        }


        function EditarMonitoramento(codigo) {

          $g.ajax({
            type: 'post',
            data: 'codigo=' + codigo,
            url: 'funcoes/carregar-editar-monitoramento.php',
            success: function(retorno) {
              // location.reload()
              $g("#resposta-editar-monitoramento").html(retorno)
            }
          })
        }

        function EditarTratamento(codigo) {

          $g.ajax({
            type: 'post',
            data: 'codigo=' + codigo,
            url: 'funcoes/carregar-editar-tratamento.php',
            success: function(retorno) {
              // location.reload()
              $g("#resposta-editar-tratamento").html(retorno)
            }
          })
        }


        function AtualizarMonitoramento(codigo) {

          var definicao_kpis = $g('#edit_definicao_kpis').val()
          var periodicidade = $g('#edit-periodicidade').val()
          var responsavel = $g('#edit-responsavel').val()
          var objetivo_monitoramento = $g('#edit-objetivo').val()
          var necessidade_revisao = $g('#edit-necessidade_revisao').val()



          $g.ajax({
            type: 'post',
            data: 'codigo=' + codigo + '&definicao_kpis=' + definicao_kpis + '&objetivo_monitoramento=' + objetivo_monitoramento + '&periodicidade=' + periodicidade + '&responsavel=' + responsavel + '&necessidade_revisao=' + necessidade_revisao,
            url: 'funcoes/atualizar-monitoramento.php',
            success: function(retorno) {
              // CarregarTabelaControlesExistentes()
              location.href = 'matriz-de-risco.php?cod=<?php echo $codigo ?>&aba=monitoramento'
            }
          })


        }

        function AtualizarCausa(codigo) {

          var causa = $g('#editar_causa').val()




          $g.ajax({
            type: 'post',
            data: 'codigo=' + codigo + '&causa=' + causa,
            url: 'funcoes/atualizar-causa.php',
            success: function(retorno) {
              // CarregarTabelaControlesExistentes()
              location.href = 'matriz-de-risco.php?cod=<?php echo $codigo ?>&aba=analise'
            }
          })


        }

        function AtualizarEfeito(codigo) {

          var efeito = $g('#editar_efeito').val()




          $g.ajax({
            type: 'post',
            data: 'codigo=' + codigo + '&efeito=' + efeito,
            url: 'funcoes/atualizar-efeito.php',
            success: function(retorno) {
              // CarregarTabelaControlesExistentes()
              location.href = 'matriz-de-risco.php?cod=<?php echo $codigo ?>&aba=analise'
            }
          })


        }


        function atualizarTratamento(codigo) {

          var editar_causa_tratamento = $g('#editar_causa_tratamento').val()
          var edit_risco = $g('#edit_risco').val()
          var edit_descricao = $g('#edit_descricao').val()
          var edit_responProc = $g('#edit_responProc').val()
          var edit_data_inicio = $g('#edit_data_inicio').val()
          var edit_data_vencimento = $g('#edit_data_vencimento').val()
          var edit_prioridade = $g('#edit_prioridade').val()



          $g.ajax({
            type: 'post',
            data: 'codigo=' + codigo + '&editar_causa_tratamento=' + editar_causa_tratamento + '&edit_risco=' + edit_risco + '&edit_descricao=' + edit_descricao + '&edit_responProc=' + edit_responProc + '&edit_data_inicio=' + edit_data_inicio + '&edit_data_vencimento=' + edit_data_vencimento + '&edit_prioridade=' + edit_prioridade,
            url: 'funcoes/atualizar-tratamento.php',
            success: function(retorno) {
              // CarregarTabelaControlesExistentes()
              location.href = 'matriz-de-risco.php?cod=<?php echo $codigo ?>&aba=tratamento'
            }
          })
        }



        function AtualizarrArea() {
          var novaarea = $g("#cad-area-nova option:selected").val()

          $g.ajax({
            type: 'post',
            data: 'codigo=<?php echo $codigo_matriz ?>&area=' + novaarea,
            url: 'funcoes/atualizar-area-nova-matriz.php',
            success: function(retorno) {
              location.reload()

            }
          })
        }


        // function AtualizarAreaPrincipal(codigo) {
        //   var novaareaprincipal = $g("#cad-area-nova-principal option:selected").val()


        //   $g.ajax({
        //     type: 'post',
        //     data: 'codigo_matriz=<?php echo $_REQUEST['cod'] ?>&area=' + novaareaprincipal + '&id=<?php echo $id_principal ?>',
        //     url: 'funcoes/atualizar-principal.php',
        //     success: function(retorno) {
        //       location.reload()
        //     }
        //   })
        // }

        // function AtualizarDemaisAreas(codigo, id) {

        //   var demaisareasnova = $g("#cad-area-nova-demais option:selected").val()

        //   $g.ajax({
        //     type: 'post',
        //     data: 'codigo_matriz=<?php echo $_REQUEST['cod'] ?>&area=' + demaisareasnova + '&id=<?php echo $id_demais ?>',
        //     url: 'funcoes/atualizar-demais.php',
        //     success: function(retorno) {
        //       location.reload()

        //     }
        //   })
        // }


        function AtualizarQaa() {
          var novoItem = $g("#cad-item-novo-qaa option:selected").val()

          $g.ajax({
            type: 'post',
            data: 'codigo=<?php echo $codigo_matriz ?>&titulo=' + novoItem,
            url: 'funcoes/atualizar-item-novo-matriz.php',
            success: function(retorno) {
              location.reload()

            }
          })
        }

        function AtualizarPlanta() {
          var novaPlanta = $g("#cad-nova-planta option:selected").val()

          $g.ajax({
            type: 'post',
            data: 'codigo=<?php echo $codigo_matriz ?>&razao_social=' + novaPlanta,
            url: 'funcoes/atualizar-nova-planta.php',
            success: function(retorno) {
              location.reload()

            }
          })
        }


        function gravarInerente() {
          var Matriz = <?php echo $codigo_matriz ?>;
          var Inerente = $g('#codigo-inerente').val()

          $g.ajax({
            type: 'post',
            data: 'codigo=' + Inerente + '&matriz=' + Matriz + '&classifi=<?php echo  $classifi ?>' + '&classif_risco=' + classif_risco,
            url: 'funcoes/processa-gravar-avaliacao-risco-inerente.php',
            success: function(retorno) {
              $g('#resposta-editar-inerente').html(retorno)

            }
          })




        }




        function EditarInerente(classif_risco) {
          var Matriz = <?php echo $codigo_matriz ?>;
          var Inerente = $g('#codigo-inerente').val()
          if (Inerente == undefined) {
            Inerente = '0'
            $g('#resposta-editar-inerente').html("<h6>Risco Inerente ainda não foi gravado!</h6>")

          } else {

            $g.ajax({
              type: 'post',
              data: 'codigo=' + Inerente + '&matriz=' + Matriz + '&classifi=<?php echo  $classifi ?>' + '&classif_risco=' + classif_risco,
              url: 'funcoes/editar-inerente.php',
              success: function(retorno) {
                $g('#resposta-editar-inerente').html(retorno)
                location.href = 'matriz-de-risco.php?cod=<?php echo $codigo ?>&aba=avaliacao'
              }
            })
          }
        }


        function EditarResidual(classif_risco) {
          var Matriz = <?php echo $codigo_matriz ?>;
          var Inerente = $g('#codigo-residual').val()
          if (Inerente == undefined) {
            Inerente = '0'
            $g('#resposta-editar-residual').html("<h6>Risco Residual ainda não foi gravado!</h6>")

          } else {

            $g.ajax({
              type: 'post',
              data: 'codigo=' + Inerente + '&matriz=' + Matriz + '&classifi=<?php echo  $classifi ?>' + '&classif_risco=' + classif_risco,
              url: 'funcoes/editar-residual.php',
              success: function(retorno) {
                $g('#resposta-editar-residual').html(retorno)
                location.href = 'matriz-de-risco.php?cod=<?php echo $codigo ?>&aba=avaliacao'
              }
            })
          }
        }


        function EditarFuturo(classif_risco) {
          var Matriz = <?php echo $codigo_matriz ?>;
          var Inerente = $g('#codigo-futuro').val()
          if (Inerente == undefined) {
            Inerente = '0'
            $g('#resposta-editar-futuro').html("<h6>Risco Futuro ainda não foi gravado!</h6>")

          } else {

            $g.ajax({
              type: 'post',
              data: 'codigo=' + Inerente + '&matriz=' + Matriz + '&classifi=<?php echo  $classifi ?>' + '&classif_risco=' + classif_risco,
              url: 'funcoes/editar-futuro.php',
              success: function(retorno) {
                $g('#resposta-editar-futuro').html(retorno)
                location.href = 'matriz-de-risco.php?cod=<?php echo $codigo ?>&aba=avaliacao'
              }
            })
          }
        }



        $b = jQuery.noConflict()

        function SalvarEfeito() {

          var efeito = $g('#cad-efeito').val()
          var setor = $g("#obter-setor").val()

          $b.ajax({
            type: 'post',
            data: '&efeito=' + efeito + '&codigo_matriz=<?php echo $_REQUEST['cod'] ?>&codigo=' + '&setor=' + setor,
            url: 'funcoes/gravar-efeito-ishikawa.php',
            success: function(retorno) {
              $g('.close').trigger("click")
              $g('.pos-efeito').show()
              CarregarIshikawaEfeito('Método')
              $g('#carregar-ishikawa-efeito').html(retorno)
            }
          })

        }





        $b('document').ready(function() {

          var receber_avaliacao = $g("#receber_avaliacao").val()
          var receber_tratamento = $g("#receber_tratamento").val()
          var receber_monitoramento = $g("#receber_monitoramento").val()



          if (receber_avaliacao == 2) {
            Abas(2)
            $b('#btn2').trigger("click")
          }
          if (receber_tratamento == 3) {
            Abas(3)
            $b('#btn3').trigger("click")
          }
          if (receber_monitoramento == 4) {
            Abas(4)
            $b('#btn4').trigger("click")
          }

        });
      </script>










      <script>
        $rodape = jQuery.noConflict()

        function AtivarLink() {
          $rodape('#<?php echo $nav_menu_principal ?>').addClass('show')
          $rodape('#menu-<?php echo $nav_menu_pagina ?>').css('font-weight', 'bold')

        }
        AtivarLink()
      </script>



      <!-------------Contadores--------->
      <input type="hidden" value="1" id="contador_terceiros">
      <input type="hidden" value="1" id="contador_filiais">

      <script src="bibliotecas/jquery/jquery.min.js"></script>
      <script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
      <script src="js/sb-admin.min.js" type="text/javascript"></script>
      <script src="js/jquery.mask.min.js"></script>
      <script src="js/mascaras.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


      <script>
        $a = jQuery.noConflict()

        $a(document).ready(function() {

          CarregarItensQaa()
          ItensQaa()



        });



        // function ItensQaa() {



        // 	$a(document).ready(function() {
        // 		$a('#tabela-itens-qaa').DataTable();
        // 	});



        // 	$a("#tabela-itens-qaa").dataTable({
        // 		"bJQueryUI": true,
        // 		"oLanguage": {
        // 			"sProcessing": "Processando...",
        // 			"sLengthMenu": "Mostrar _MENU_ registros",
        // 			"sZeroRecords": "Não foram encontrados resultados",
        // 			"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        // 			"sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
        // 			"sInfoFiltered": "",
        // 			"sInfoPostFix": "",
        // 			"sSearch": "Buscar:",
        // 			"sUrl": "",
        // 			"oPaginate": {
        // 				"sFirst": "Primeiro",
        // 				"sPrevious": "Anterior",
        // 				"sNext": "Seguinte",
        // 				"sLast": "Último"
        // 			}
        // 		}
        // 	})


        // }
      </script>



      <script>
        $f = jQuery.noConflict()

        $f(".datepicker").datepicker({
          dateFormat: 'dd/mm/yy',
          dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
          dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
          dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
          monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
          monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
          nextText: 'Próximo',
          prevText: 'Anterior'
        });


        $f(function() {
          $f(".datepicker").datepicker();
        });


        $f(document).ready(function() {
          $f('#cad-implementacao').hide()
          $f('#label-implementacao').hide()




          LimparTabelaOEA()
          // CarregarDemaisAreas()
          // CarregarProcessos()
          CarregarFatorRisco()
          // CarregarAreasApoioRisco()

        })







        // function CarregarDemaisAreas() {

        // 	var codigo = $f('#cad-area-risco option:selected').val()
        // 	$f.ajax({
        // 		type: 'post',
        // 		data: 'codigo=' + codigo,
        // 		url: 'funcoes/tabela-demais-areas-impactadas.php',
        // 		success: function(retorno) {
        // 			$f('#carregar-demais-areas-impactadas-pelo-risco').html(retorno)
        // 		}
        // 	})
        // 	CarregarProcessos()
        // }

        // function CarregarProcessos() {

        // 	var codigo = $f('#cad-area-risco option:selected').val()
        // 	if (codigo == '') {
        // 		codigo = 0
        // 	}
        // 	$f.ajax({
        // 		type: 'post',
        // 		data: 'codigo=' + codigo,
        // 		url: 'funcoes/identificacao-risco-processos.php',
        // 		success: function(retorno) {
        // 			$f('#carregar-processos').html(retorno)
        // 		}
        // 	})

        // }


        // function CarregarItensQaa() {

        // 	$f.ajax({
        // 		type: 'post',
        // 		data: 'codigo=',
        // 		url: 'funcoes/carregar-itens-qaa.php',
        // 		success: function(retorno) {
        // 			$f('#carregar-itens-qaa').html(retorno)

        // 		}
        // 	})


        // }





        // function AdicionarItem() {

        // 	var item = $f('#cad-item-qaa option:selected').val()

        // 	$f.ajax({
        // 		type: 'post',
        // 		data: 'item=' + item,
        // 		url: 'funcoes/gravar-item-qaa.php',
        // 		success: function(retorno) {

        // 			CarregarItensQaa()
        // 			salvarItens()


        // 		}
        // 	})
        // }



        // 	function salvarItens() {
        // 	var itens = $f('#carregar-itens-qaa').val()

        // 	$f.ajax({
        // 		type: 'post',
        // 		data: 'itens=' + itens,
        // 		url: 'funcoes/gravar-itens-qaa.php',
        // 		success: function(retorno) {


        // 		}
        // 	})

        // 	// alert("saindo")

        // }


        function ExcluirItem(codigo) {

          if (window.confirm("Você deseja excluir o Item?")) {

            $f.ajax({
              type: 'post',
              data: 'codigo=' + codigo,
              url: 'funcoes/excluir-itens-qaa.php',
              success: function(retorno) {
                CarregarItensQaa()

              }
            })
          }

        }



        function RiscoOEA() {

          var ItemOEA = $f('#cad-item-oea option:selected').val()

          if (ItemOEA == 'Sim') {
            $f('.risco-oea').show()
          } else {
            $f('.risco-oea').hide()
          }

        }


        function LimparTabelaOEA() {

          $f.ajax({
            type: 'post',
            data: 'codigo=',
            url: 'funcoes/excluir-tabela-temp-risco-qaa.php',
            success: function(retorno) {}
          })
        }


        function Fator() {
          $f('#cad-fator:checked').val()
        }

        function CarregarFatorRisco(codigo) {

          if (codigo == '') {
            codigo = 0
          }

          $f.ajax({
            type: 'post',
            data: 'codigo=' + codigo,
            url: 'ver-fator-risco.php',
            success: function(retorno) {
              $f('#retorno-fator-risco').html(retorno);

            }
          })

        }
      </script>

      <script>
        $rodape = jQuery.noConflict()

        function AtivarLink() {
          $rodape('#<?php echo $nav_menu_principal ?>').addClass('show')
          $rodape('#menu-<?php echo $nav_menu_pagina ?>').css('font-weight', 'bold')

        }
        AtivarLink()
      </script>



      <script>
        $c = jQuery.noConflict()


        // -----------------DEMAIS AREAS----------------







        function CarregarTabelaPrincipalArea() {
          $c.ajax({
            type: 'post',
            data: 'codigo=',
            url: 'tabela-area-principal.php',
            success: function(retorno) {
              $c("#carregar-tabela-area-principal").html(retorno)

            }
          })

        }





        function CarregarTabelaOutrasAreas() {
          $c.ajax({
            type: 'post',
            data: 'codigo=',
            url: 'tabela-demais-areas-risco.php',
            success: function(retorno) {
              $c("#carregar-tabela-outras-areas").html(retorno)

            }
          })

        }




        function CarregarTabelaItemQaa() {
          $c.ajax({
            type: 'post',
            data: 'titulo=',
            url: 'tabela-itens-qaa.php',
            success: function(retorno) {
              $c("#carregar-tabela-item-qaa").html(retorno)

            }
          })

        }
      </script>




      <script>
        $rodape = jQuery.noConflict()

        function AtivarLink() {
          $rodape('#<?php echo $nav_menu_principal ?>').addClass('show')
          $rodape('#menu-<?php echo $nav_menu_pagina ?>').css('font-weight', 'bold')

        }
        AtivarLink()
      </script>




      <style>
        .cad-area-apoio-risco {
          display: none
        }
      </style>

</body>

</html>




<style>
  .risco-oea {
    display: none;
  }
</style>

<style>
  .causaEfeito {
    display: flex;
    margin-left: 13px;

  }

  .imobSelect option {
    height: 30px;
    border: 1px solid #cbcbcb;
    padding-left: 17px;
    padding-top: 12px;
  }
</style>