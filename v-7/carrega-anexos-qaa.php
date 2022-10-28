<table class="table table-striped">
	<?php
	session_start();
	$obterdominio = $_SESSION['dominio'];
	include($obterdominio . '/' . 'conexao.php');

	mysqli_query($conexao, "SET NAMES 'utf8'");
	mysqli_query($conexao, 'SET character_set_connection=utf8');
	mysqli_query($conexao, 'SET character_set_client=utf8');
	mysqli_query($conexao, 'SET character_set_results=utf8');

	$codigo = $_POST['codigo'];
	$cnpj = $_POST['cnpj'];

	$selecao = mysqli_query($conexao, "select * from upload_qaa WHERE codigo_qaa='$codigo' and cnpj='$cnpj'");
	while ($registros = mysqli_fetch_array($selecao)) {
	?>


		<tr>
			<td><img src="imgs/icone-documento.png" width="15" height="17" alt="" />

				<a target="_blank" href="<?php echo $obterdominio ?>/uploads-qaa/<?php echo $registros['arquivo'] ?>">
					<?php echo $registros['arquivo'] ?>
				</a>


			</td>

			<td style="cursor: pointer" onClick="Deletar(<?php echo $registros['id'] ?>)"><strong><i class="fa fa-trash"></i></strong></td>
		</tr>


	<?php } ?>

</table>


<span id="msg" style="color:red"></span><br />
<input type="file" id="photo" name="arquivo[]" class="mb-3" multiple="multiple"><br />