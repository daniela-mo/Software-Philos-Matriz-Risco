<?php

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');


$conexao = mysqli_connect('localhost', 'root', 'philos.tec', 'sistemam2vconsul_m2v');

if (!$conexao) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
