
<?php

session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$nome=$_REQUEST['nome'];
$data=date('d-m-Y');
$hora= date('H:i:s');	


if($_FILES['file']['name'] != ''){
    $test = explode('.', $_FILES['file']['name']);
    $extension = end($test);    
    $name = $_FILES['file']['name'];
?>
<?php
$filename = "../".$obterdominio."/uploads-cadastro/".$name;

if (file_exists($filename)) { ?>
   

<div class="alert alert-danger" role="alert">
  O arquivo <?php echo $filename ?> já existe!!
</div>

<?php } else {
 
	
	 $location = "../".$obterdominio."/uploads-cadastro/".$name;
    move_uploaded_file($_FILES['file']['tmp_name'], $location);
	
	            mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
	$gravar=mysqli_query($conexao,"insert into upload_temp_cadastro(arquivo,data,hora)values('$name','$data','$hora')"); 
	
	
?>
<input type="hidden" id="resposta1" value="1">	
	
<?php	
}

?>


	

	

<?php }
?>





