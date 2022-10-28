<?php

$conexao = mysqli_connect('54.197.73.103', 'root', 'philos.tec','sistemam2vconsul_central');

if (!$conexao) {     printf("Connect failed: %s\n", mysqli_connect_error());     exit(); }
