<?php

session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

mysqli_query($conexao,"TRUNCATE identificacao_do_risco");
mysqli_query($conexao,"TRUNCATE 8d");
mysqli_query($conexao,"TRUNCATE 8d_equipe_responsavel_temp");
mysqli_query($conexao,"TRUNCATE areas");
mysqli_query($conexao,"TRUNCATE areas_apoio");
mysqli_query($conexao,"TRUNCATE areas_identificacao_de_risco");
mysqli_query($conexao,"TRUNCATE associacao_fator_risco");
mysqli_query($conexao,"TRUNCATE atividades");
mysqli_query($conexao,"TRUNCATE atividades_planejamento_workflow");
mysqli_query($conexao,"TRUNCATE avaliacao_matriz_de_risco");
mysqli_query($conexao,"TRUNCATE avaliacao_risco_inerente");
mysqli_query($conexao,"TRUNCATE avaliacao_risco_residual");
mysqli_query($conexao,"TRUNCATE cadastro");
mysqli_query($conexao,"TRUNCATE cadastro_funcoes");
mysqli_query($conexao,"TRUNCATE cadastro_modalidades");
mysqli_query($conexao,"TRUNCATE campos_tarefas");
mysqli_query($conexao,"TRUNCATE classificacao_documento");
mysqli_query($conexao,"TRUNCATE comites");
mysqli_query($conexao,"TRUNCATE comites_assuntos");
mysqli_query($conexao,"TRUNCATE comites_atas");
mysqli_query($conexao,"TRUNCATE comites_cronogramas");
mysqli_query($conexao,"TRUNCATE comites_participantes");
mysqli_query($conexao,"TRUNCATE comites_tratamentos");
mysqli_query($conexao,"TRUNCATE contextos");
mysqli_query($conexao,"TRUNCATE controles_existentes");
mysqli_query($conexao,"TRUNCATE controles_existentes_temp");
mysqli_query($conexao,"TRUNCATE diagrama_ishikawa_efeitos");
mysqli_query($conexao,"TRUNCATE empresas");
mysqli_query($conexao,"TRUNCATE escopos");
mysqli_query($conexao,"TRUNCATE fases");
mysqli_query($conexao,"TRUNCATE fases_workflow");
mysqli_query($conexao,"TRUNCATE filiais");
mysqli_query($conexao,"TRUNCATE fretes");
mysqli_query($conexao,"TRUNCATE funcoes");
mysqli_query($conexao,"TRUNCATE funcoes_cadastro");
mysqli_query($conexao,"TRUNCATE matriz_de_risco_causas");
mysqli_query($conexao,"TRUNCATE medida_tratamento");
mysqli_query($conexao,"TRUNCATE notificacoes");
mysqli_query($conexao,"TRUNCATE operacoes_terceiros");
mysqli_query($conexao,"TRUNCATE organogramas");
mysqli_query($conexao,"TRUNCATE parametrizacao_tipo_impactos");
mysqli_query($conexao,"TRUNCATE planejamentos");
mysqli_query($conexao,"TRUNCATE procedimentos");
mysqli_query($conexao,"TRUNCATE procedimentos_tabela_requisitos");
mysqli_query($conexao,"TRUNCATE processos");
mysqli_query($conexao,"TRUNCATE requisitos_normativos");
mysqli_query($conexao,"TRUNCATE responsaveis_areas");
mysqli_query($conexao,"TRUNCATE responsaveis_areas_temp");
mysqli_query($conexao,"TRUNCATE responsaveis_atividades_workflow");
mysqli_query($conexao,"TRUNCATE responsaveis_fase_implementacao");
mysqli_query($conexao,"TRUNCATE responsaveis_implementacao");
mysqli_query($conexao,"TRUNCATE responsaveis_qaa");
mysqli_query($conexao,"TRUNCATE responsaveis_qaa_inteiro");
mysqli_query($conexao,"TRUNCATE responsaveis_tarefas_workflow");
mysqli_query($conexao,"TRUNCATE responsaveis_tarefa_implementacao");
mysqli_query($conexao,"TRUNCATE responsaveis_workflow");
mysqli_query($conexao,"TRUNCATE resposta_qaa");
mysqli_query($conexao,"TRUNCATE rnc");
mysqli_query($conexao,"TRUNCATE subtarefas");
mysqli_query($conexao,"TRUNCATE tabela_avaliacao_risco_inerente");
mysqli_query($conexao,"TRUNCATE tabela_avaliacao_risco_residual");
mysqli_query($conexao,"TRUNCATE tabela_causa_controle");
mysqli_query($conexao,"TRUNCATE tabela_causa_efeito_temp");
mysqli_query($conexao,"TRUNCATE tabela_clientes");
mysqli_query($conexao,"TRUNCATE tabela_contexto_membros");
mysqli_query($conexao,"TRUNCATE tabela_contexto_membros_temp");
mysqli_query($conexao,"TRUNCATE tabela_escala_impacto");
mysqli_query($conexao,"TRUNCATE tabela_escala_tempo");
mysqli_query($conexao,"TRUNCATE tabela_fatores_externos");
mysqli_query($conexao,"TRUNCATE tabela_fatores_externos_temp");
mysqli_query($conexao,"TRUNCATE tabela_fatores_internos");
mysqli_query($conexao,"TRUNCATE tabela_fatores_internos_temp");
mysqli_query($conexao,"TRUNCATE tabela_impacto");
mysqli_query($conexao,"TRUNCATE tabela_impacto_negocios");
mysqli_query($conexao,"TRUNCATE tabela_itens_parametrizacao");
mysqli_query($conexao,"TRUNCATE tabela_itens_qaa_temp");
mysqli_query($conexao,"TRUNCATE tabela_itens_requisitos_temp");
mysqli_query($conexao,"TRUNCATE tabela_plano_de_acao_temp");
mysqli_query($conexao,"TRUNCATE tabela_probabilidade");
mysqli_query($conexao,"TRUNCATE tabela_requisitos_normativos");
mysqli_query($conexao,"TRUNCATE tabela_requisitos_normativos_temp");
mysqli_query($conexao,"TRUNCATE tabela_requisitos_recuperacao");
mysqli_query($conexao,"TRUNCATE tarefas_atividades_workflow");
mysqli_query($conexao,"TRUNCATE tarefas_planejamento");
mysqli_query($conexao,"TRUNCATE tarefas_planejamento_workflow1");
mysqli_query($conexao,"TRUNCATE terceiros");
mysqli_query($conexao,"TRUNCATE tipo_impacto");
mysqli_query($conexao,"TRUNCATE upload_cadastro");
mysqli_query($conexao,"TRUNCATE upload_qaa");
mysqli_query($conexao,"TRUNCATE upload_temp_cadastro");
mysqli_query($conexao,"TRUNCATE upload_temp_workflow");
mysqli_query($conexao,"TRUNCATE upload_workflow");
mysqli_query($conexao,"TRUNCATE usuarios_tarefas");
mysqli_query($conexao,"TRUNCATE workflow");


?>