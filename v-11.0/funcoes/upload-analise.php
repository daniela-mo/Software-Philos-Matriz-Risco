<?php

session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$id = $_REQUEST['codigo'];
$data = date('d/m/Y');
$hora = date('H:i:s');

$path = '../' . $obterdominio . "/upload-analise/";


foreach ($_FILES as $key) {
	if ($key) {
		$name = $key['name'];
		$temp = $key['tmp_name'];

		$test = explode('.', $key['name']);
		$extension = end($test);
		$name = $key['name'];


		$filename = '../' . $obterdominio . "/upload-analise/" . $name;

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
		$gravar = mysqli_query($conexao, "insert into upload_analise(data,arquivo,codigo_rnc,hora)values('$data','$name','$id','$hora')");
	} else {

		move_uploaded_file($temp, $path . $name);


		mysqli_query($conexao, "SET NAMES 'utf8'");
		mysqli_query($conexao, 'SET character_set_connection=utf8');
		mysqli_query($conexao, 'SET character_set_client=utf8');
		mysqli_query($conexao, 'SET character_set_results=utf8');
		$gravar = mysqli_query($conexao, "insert into upload_analise(data,arquivo,codigo_rnc,hora)values('$data','$name','$id','$hora')");
	}
}
