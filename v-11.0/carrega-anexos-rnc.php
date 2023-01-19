<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');
$id = $_REQUEST['codigo'];

?>

<table class="table table-striped" id="carrega-anexos-rnc" name="carrega-anexos-rnc">

	<?php

	$selecao = mysqli_query($conexao, "select * from upload_rnc where codigo_rnc='$id'");
	while ($registros = mysqli_fetch_array($selecao)) {
		$id = $_POST['id'];
	?>


		<tr>
			<td><img src="imgs/icone-documento.png" width="15" height="17" alt="" />

				<a target="_blank" href="<?php echo $obterdominio ?>/upload-rnc/<?php echo $registros['arquivo'] ?>">
					<?php echo $registros['arquivo'] ?>
				</a>

			</td>

			<!-- <td style="cursor: pointer" onClick="Deletar(<?php echo $registros['id'] ?>)"><strong><i class="fa fa-trash"></i></strong></td> -->
		</tr>


	<?php } ?>

</table>

<!-- 
								<span id="msg" style="color:red"></span><br />
								<input type="file" id="photo" name="arquivo[]" class="mb-3" multiple="multiple"><br /> -->