<?php
/*$oldmask = umask(0);
mkdir("../teste.com.br", 0777,true);
umask($oldmask);



$conteudo =
include('teste.php');	


	
	




$usuario=

$texto1=" <?php setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese'); ?>";
$texto1.=" <?php date_default_timezone_set('America/Sao_Paulo'); ?>";
$texto1.="<?php mysqli_connect('54.197.73.103', 'root', 'philos.tec','sistemam2vconsul_positivo'); ?>";


$arquivo = fopen('../teste.com.br/conexao.php', 'w');
fwrite($arquivo, $texto1);
fclose($arquivo);
*/


$dir = "../teste.com.br/";

$result = rmdir($dir);

if($result){
  echo "Pasta foi deletada com sucesso!";
}



?>