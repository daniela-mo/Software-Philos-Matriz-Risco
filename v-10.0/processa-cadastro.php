<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');;


$cnpj = $_POST['cad-cnpj'];

if ($cnpj == '0') { ?>

	<script>
		alert("Você precisa escolher um CNPJ válido para continuar!")
		window.history.back();
	</script>

	<?php } else {


	$data_cadastro = date('d-m-Y');

	$dia1 = substr($data_cadastro, 0, 2);
	$mes1 = substr($data_cadastro, 3, 2);
	$ano1 = substr($data_cadastro, 6, 4);



	if ($dia1 > 31) { ?>
		<script>
			alert("Campo 'Dia' em Data de Cadastro preenchido incorretamente!")
			window.history.back();
		</script>
	<?php } else if ($mes1 >= 12) {	?>
		<script>
			alert("Campo 'Mês' em Data de Cadastro preenchido incorretamente!")
			window.history.back();
		</script>
	<?php } else if ($ano1 <= 1999) { ?>
		<script>
			alert("Campo 'Ano' em Data de Cadastro preenchido incorretamente!")
			window.history.back();
		</script>
		<?php	} else {



		$data_requerimento = $_POST['cad-data-requerimento'];


		$dia1 = substr($data_requerimento, 0, 2);
		$mes1 = substr($data_requerimento, 3, 2);
		$ano1 = substr($data_requerimento, 6, 4);



		if ($dia1 > 31) { ?>
			<script>
				alert("Campo 'Dia' em Data do Requerimento preenchido incorretamente!")
				window.history.back();
			</script>
		<?php } else if ($mes1 >= 12) {	?>
			<script>
				alert("Campo 'Mês' em Data do Requerimento preenchido incorretamente!")
				window.history.back();
			</script>
		<?php } else if ($ano1 <= 1999) { ?>
			<script>
				alert("Campo 'Ano' em Data do Requerimento preenchido incorretamente!")
				window.history.back();
			</script>
			<?php	} else {





			$numero_requerimento = $_POST['cad-numero-requerimento'];
			$data_certificacao = $_POST['cad-data-certificacao'];



			$dia1 = substr($data_certificacao, 0, 2);
			$mes1 = substr($data_certificacao, 3, 2);
			$ano1 = substr($data_certificacao, 6, 4);



			if ($dia1 > 31) { ?>
				<script>
					alert("Campo 'Dia' em Data da Certificação preenchido incorretamente!")
					window.history.back();
				</script>
			<?php } else if ($mes1 > 12) {	?>
				<!-- tirar o sinal de =  -->
				<script>
					alert("Campo 'Mês' em Data da Certificação preenchido incorretamente!")
					window.history.back();
				</script>
			<?php } else if ($ano1 <= 1999) { ?>
				<script>
					alert("Campo 'Ano' em Data da Certificação preenchido incorretamente!")
					window.history.back();
				</script>
				<?php	} else {







				$data_validacao = $_POST['cad-data-validacao'];


				$dia1 = substr($data_validacao, 0, 2);
				$mes1 = substr($data_validacao, 3, 2);
				$ano1 = substr($data_validacao, 6, 4);



				if ($dia1 > 31) { ?>
					<script>
						alert("Campo 'Dia' em Data da Validação preenchido incorretamente!")
						window.history.back();
					</script>
				<?php } else if ($mes1 >= 12) {	?>
					<script>
						alert("Campo 'Mês' em Data da Validação preenchido incorretamente!")
						window.history.back();
					</script>
				<?php } else if ($ano1 <= 1999) { ?>
					<script>
						alert("Campo 'Ano' em Data da Validação preenchido incorretamente!")
						window.history.back();
					</script>
					<?php	} else {





					$modalidade = $_POST['cad-modalidade'][0];
					$numero_certificado = $_POST['cad-numero-certificado'];
					mysqli_query($conexao, "SET NAMES 'utf8'");
					mysqli_query($conexao, 'SET character_set_connection=utf8');
					mysqli_query($conexao, 'SET character_set_client=utf8');
					mysqli_query($conexao, 'SET character_set_results=utf8');

					$selecao_modalidade = mysqli_query($conexao, "select * from modalidades WHERE id='$modalidade'");
					$registros_modalidades = mysqli_fetch_array($selecao_modalidade);
					$nome_modalidade = $registros_modalidades['modalidade'];

					$data = date('d-m-Y');
					$hora = date('H:i:s');


					$selecao = mysqli_query($conexao, "select * from cadastro WHERE cnpj='$cnpj' and codigo_modalidade='$modalidade' ");
					$numero = mysqli_num_rows($selecao);

					if ($numero >= 1) { ?>


						<script>
							alert("Modalidade ja cadastrada para esse CNPJ");
							location.href = "cadastros.php"
						</script>


						<?php } else {


						$verifica = mysqli_query($conexao, "select * from cadastro WHERE numero_certificacao='$numero_certificado'");
						$num = mysqli_num_rows($verifica);
						if ($num == 1) { ?>

							<script>
								alert("Número de Certificado ja utilizado!")
								location.href = "cadastro.php"
							</script>

							<?php } else {

							$inserir = mysqli_query($conexao, "insert into cadastro(

cnpj,
data_cadastro,
data_requerimento,
numero_requerimento,
data_certificacao,
data_validacao,
codigo_modalidade,
modalidade,
numero_certificacao

)values(


'$cnpj',
'$data_cadastro',
'$data_requerimento',
'$numero_requerimento',
'$data_certificacao',
'$data_validacao',
'$modalidade',
'$nome_modalidade',
'$numero_certificado'


) ");
							if ($inserir) {



								$selecao1 = mysqli_query($conexao, "select * from cadastro order by id DESC");
								$registros1 = mysqli_fetch_array($selecao1);
								$id = $registros1['id'];


								@$funcoes = $_POST['cad-funcao'];




								foreach ($funcoes as $funcao1) {

									$selecao_funcoes = mysqli_query($conexao, "select * from cadastro_funcoes WHERE funcao='$funcao1'");
									$registros_funcoes = mysqli_fetch_array($selecao_funcoes);
									$funcao = $registros_funcoes['funcao'];
									$numero = mysqli_num_rows($selecao_funcoes);

									if ($numero == 0) {
										$inserir = mysqli_query($conexao, "insert into cadastro_funcoes(funcao,codigo_cadastro)values('$funcao1','$id')");
									}
								}






								/*Tabela temporária para tabela definitiva*/
								$selecao = mysqli_query($conexao, "select * from upload_temp_cadastro");
								while ($registros = mysqli_fetch_array($selecao)) {
									$arquivo = $registros['arquivo'];

									$inserir = mysqli_query($conexao, "insert into upload_cadastro(arquivo,codigo_cadastro,data,hora)values('$arquivo','$id','$data','$hora')");
								}





							?>



								<script>
									location.href = "cadastros.php"
								</script>




							<?php } else {  ?>

								<script>
									alert("Cadastro não pode ser realizado")
									location.href = "cadastro.php"
								</script>


							<?php } ?>




<?php }
					}
				}
			}
		}
	}
} ?>