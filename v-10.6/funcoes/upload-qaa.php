<?php

session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$codigo = $_REQUEST['codigo'];
$cnpj = $_REQUEST['cnpj'];
$data = date('d/m/Y');
$hora = date('H:i:s');

$path = '../' . $obterdominio . "/uploads-qaa/";


foreach ($_FILES as $key) {
	if ($key) {
		$name = $key['name'];
		$temp = $key['tmp_name'];

		$test = explode('.', $key['name']);
		$extension = end($test);
		$name = $key['name'];


		$filename = '../' . $obterdominio . "/uploads-qaa/" . $name;

		/*if (file_exists($filename)) { ?>
			<div class="alert alert-danger" role="alert">

				<script>
					alert("O arquivo já existe!!")
				</script>


			</div>
		
		<?php }*/

		move_uploaded_file($temp, $path . $name);


		mysqli_query($conexao, "SET NAMES 'utf8'");
		mysqli_query($conexao, 'SET character_set_connection=utf8');
		mysqli_query($conexao, 'SET character_set_client=utf8');
		mysqli_query($conexao, 'SET character_set_results=utf8');
		$gravar = mysqli_query($conexao, "insert into upload_qaa(arquivo,codigo_qaa,cnpj,data,hora)values('$name','$codigo','$cnpj','$data','$hora')");
	} else {

		move_uploaded_file($temp, $path . $name);


		mysqli_query($conexao, "SET NAMES 'utf8'");
		mysqli_query($conexao, 'SET character_set_connection=utf8');
		mysqli_query($conexao, 'SET character_set_client=utf8');
		mysqli_query($conexao, 'SET character_set_results=utf8');
		$gravar = mysqli_query($conexao, "insert into upload_qaa(arquivo,codigo_qaa,cnpj,data,hora)values('$name','$codigo','$cnpj','$data','$hora')");
	}
}
	
	/*else{
            echo $key['error'];
        }*/
	/* }*/




	/*
if($_FILES['file']['name'] != ''){
   $test = explode('.', $_FILES['file']['name']);
    $extension = end($test);
	$name= $_FILES['file']['name'];
    //$name = 'Anexo-'. rand(10000,99999).'.'.$extension;
	
	
$filename = '../'.$obterdominio."/uploads-qaa/".$name;

if (file_exists($filename)) { ?> 
<div class="alert alert-danger" role="alert">
	
	<script>
	
alert("O arquivo já existe!!")	
	</script>
	
  
</div>

<?php } else {	
	
	

    $location = '../'.$obterdominio."/uploads-qaa/".$name;
    move_uploaded_file($_FILES['file']['tmp_name'], $location); ?>


<?php
	            mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
	$gravar=mysqli_query($conexao,"insert into upload_qaa(arquivo,codigo_qaa)values('$name','$codigo')");

?>	


	

<?php }}*/
