<?php

session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');


mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');
?>
<div class="row">
	<div class="col-md-12">

		<div class="table-responsive">
			<form action="gravar-itens-qaa.php" method="post"></form>
			<table id="tabela-itens-qaa" class="display" style="width:100%">
				<thead>
					<tr>
						<th>Item</th>
						<th></th>

					</tr>
				</thead>
				<tbody>

					<?php
					$selecao = mysqli_query($conexao, "select * from tabela_itens_qaa_temp ");
					while ($registros = mysqli_fetch_array($selecao)) {


					?>
						<tr>
							<td><?php echo $registros['item'] ?></td>
							<td><i class="fa fa-trash" style="cursor: pointer" onClick="ExcluirItem(<?php echo $registros['id'] ?>)"></i></td>
						</tr>

					<?php } ?>

				</tbody>
			</table>
		</div>
	</div>
</div>


<script>
	ItensQaa()
</script>