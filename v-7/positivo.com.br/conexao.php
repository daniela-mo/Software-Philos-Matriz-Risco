<?php

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');


$conexao = mysqli_connect('54.197.73.103', 'root', 'philos.tec','sistemam2vconsul_positivo');

if (!$conexao) {     printf("Connect failed: %s\n", mysqli_connect_error());     exit(); }
