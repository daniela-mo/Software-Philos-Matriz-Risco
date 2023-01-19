<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit=no">
	<title>Dashboard 123 Philos</title>
	<link rel="stylesheet" type="text/css" href="bibliotecas/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/sb-admin.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
</head>



<body class=" fixed-nav sticky-footer" id="page-top">
	<!-- Navegação !-->
	<?php
	include('menu.php');
	$nav_menu_principal = 'dashboards';
	$nav_menu_pagina = 'menu-dashboard-periodo';

	?>
	<!-- Navegação !-->


	<div class="content-wrapper">
		<div class="container-fluid">

			<div class="row mb-5" style="margin-top: -16px; ">
				<div class="col-md-12 bg-padrao position-fixed p-2 text-right" style="z-index: 5000">

					<div class="row">
						<div class="col-md-9">
							<a href="dashboard.php"><span class="text-white breadcrumb-item">Dashboard</span></a>
						</div>
					</div>


				</div>
			</div>


			<div class="row ml-4 mr-4">
				<div class="col-12">
					<h3 class="mt-3 mb-5">Dashboard</h3>
				</div>

				<!------------------------GRAFICO 1 --------------------------->
				<div class="col-md-12 mb-3">
					<h5><strong>Riscos por áreas(Qtd)</strong></h5>

				</div>

				<div class="col-md-2 mb-4">
					<label>Data Inicial</label>
					<input type="text" name="cad-data-inicio" id="grafico_1" class="form-control" required autocomplete="off" readonly>
				</div>

				<input type="hidden" id="guarda-data-inicio">




				<div class="col-md-2 mb-4">
					<label>Data Final</label>
					<input type="text" id="grafico_11" class="form-control" required autocomplete="off" readonly>
				</div>

				<div class="col-md-2 mb-4">
					<label>&nbsp;</label>
					<input type="button" class="btn btn-primary" value="Filtrar" onClick="Filtrar(1)">
				</div>

				<div class="col-md-12 mb-3">
					<div id="carregar-grafico1"></div>
				</div>



				<!------------------------GRAFICO 2 --------------------------->

				<div class="col-md-12 mb-3">
					<h5><strong>Riscos por áreas(%)</strong></h5>

				</div>

				<div class="col-md-2 mb-4">
					<label>Data Inicial</label>
					<input type="text" id="grafico_2" class="form-control" required autocomplete="off" readonly>
				</div>



				<div class="col-md-2 mb-4">
					<label>Data Final</label>
					<input type="text" id="grafico_22" class="form-control" required autocomplete="off" readonly>
				</div>

				<div class="col-md-2 mb-4">
					<label>&nbsp;</label>
					<input type="button" class="btn btn-primary" value="Filtrar" onClick="Filtrar(2)">
				</div>

				<div class="col-md-12 mb-3">
					<div id="carregar-grafico2"></div>
				</div>



				<!------------------------GRAFICO 3 --------------------------->

				<div class="col-md-12 mb-3">
					<h5><strong>Riscos por área/Nível de riscos (Qtd)</strong></h5>

				</div>

				<div class="col-md-2 mb-4">
					<label>Data Inicial</label>
					<input type="text" id="grafico_3" class="form-control" required autocomplete="off" readonly>
				</div>



				<div class="col-md-2 mb-4">
					<label>Data Final</label>
					<input type="text" id="grafico_33" class="form-control" required autocomplete="off" readonly>
				</div>

				<div class="col-md-2 mb-4">
					<label>&nbsp;</label>
					<input type="button" class="btn btn-primary" value="Filtrar" onClick="Filtrar(3)">
				</div>

				<div class="col-md-12 mb-3">
					<div id="carregar-grafico3"></div>
				</div>



				<!------------------------GRAFICO 4 --------------------------->

				<div class="col-md-12 mb-3">
					<h5><strong>Risco Inerente/Risco Residual/Risco Futuro(Qtd)</strong></h5>

				</div>

				<div class="col-md-2 mb-4">
					<label>Data Inicial</label>
					<input type="text" id="grafico_4" class="form-control" required autocomplete="off" readonly>
				</div>



				<div class="col-md-2 mb-4">
					<label>Data Final</label>
					<input type="text" id="grafico_44" class="form-control" required autocomplete="off" readonly>
				</div>

				<div class="col-md-2 mb-4">
					<label>&nbsp;</label>
					<input type="button" class="btn btn-primary" value="Filtrar" onClick="Filtrar(4)">
				</div>

				<div class="col-md-12 mb-3">
					<div id="carregar-grafico4"></div>
				</div>


				<!------------------------GRAFICO 5 --------------------------->

				<div class="col-md-12 mb-3">
					<h5><strong>Riscos Inerentes/Residuais/Futuros(%)</strong></h5>

				</div>

				<div class="col-md-2 mb-4">
					<label>Data Inicial</label>
					<input type="text" id="grafico_5" class="form-control" required autocomplete="off" readonly>
				</div>



				<div class="col-md-2 mb-4">
					<label>Data Final</label>
					<input type="text" id="grafico_55" class="form-control" required autocomplete="off" readonly>
				</div>

				<div class="col-md-2 mb-4">
					<label>&nbsp;</label>
					<input type="button" class="btn btn-primary" value="Filtrar" onClick="Filtrar(5)">
				</div>

				<div class="col-md-12 mb-3">
					<div id="carregar-grafico5"></div>
				</div>






				<!------------------------GRAFICO 7 --------------------------->

				<div class="col-md-12 mb-3">
					<h5><strong>Níveis da Avaliação de Riscos Inerentes(Qtd)</strong></h5>

				</div>

				<div class="col-md-2 mb-4">
					<label>Data Inicial</label>
					<input type="text" id="grafico_7" class="form-control" required autocomplete="off" readonly>
				</div>



				<div class="col-md-2 mb-4">
					<label>Data Final</label>
					<input type="text" id="grafico_77" class="form-control" required autocomplete="off" readonly>
				</div>

				<div class="col-md-2 mb-4">
					<label>&nbsp;</label>
					<input type="button" class="btn btn-primary" value="Filtrar" onClick="Filtrar(7)">
				</div>

				<div class="col-md-12 mb-3">
					<div id="carregar-grafico7"></div>
				</div>



				<!------------------------GRAFICO 6 --------------------------->

				<div class="col-md-12 mb-3">
					<h5><strong>Níveis da Avaliação de Riscos Residuais(Qtd)</strong></h5>

				</div>

				<div class="col-md-2 mb-4">
					<label>Data Inicial</label>
					<input type="text" id="grafico_6" class="form-control" required autocomplete="off" readonly>
				</div>



				<div class="col-md-2 mb-4">
					<label>Data Final</label>
					<input type="text" id="grafico_66" class="form-control" required autocomplete="off" readonly>
				</div>

				<div class="col-md-2 mb-4">
					<label>&nbsp;</label>
					<input type="button" class="btn btn-primary" value="Filtrar" onClick="Filtrar(6)">
				</div>

				<div class="col-md-12 mb-3">
					<div id="carregar-grafico6"></div>
				</div>




				<!------------------------GRAFICO 8 --------------------------->

				<div class="col-md-12 mb-3">
					<h5><strong>Níveis da Avaliação de Riscos Futuros(Qtd)</strong></h5>

				</div>

				<div class="col-md-2 mb-4">
					<label>Data Inicial</label>
					<input type="text" id="grafico_8" class="form-control" required autocomplete="off" readonly>
				</div>



				<div class="col-md-2 mb-4">
					<label>Data Final</label>
					<input type="text" id="grafico_88" class="form-control" required autocomplete="off" readonly>
				</div>

				<div class="col-md-2 mb-4">
					<label>&nbsp;</label>
					<input type="button" class="btn btn-primary" value="Filtrar" onClick="Filtrar(8)">
				</div>

				<div class="col-md-12 mb-3">
					<div id="carregar-grafico8"></div>
				</div>




				<!------------------------GRAFICO 10 --------------------------->

				<div class="col-md-12 mb-3">
					<h5><strong>Níveis da Avaliação de Riscos Inerentes(%)</strong></h5>

				</div>

				<div class="col-md-2 mb-4">
					<label>Data Inicial</label>
					<input type="text" id="grafico_10" class="form-control" required autocomplete="off" readonly>
				</div>



				<div class="col-md-2 mb-4">
					<label>Data Final</label>
					<input type="text" id="grafico_1010" class="form-control" required autocomplete="off" readonly>
				</div>

				<div class="col-md-2 mb-4">
					<label>&nbsp;</label>
					<input type="button" class="btn btn-primary" value="Filtrar" onClick="Filtrar(10)">
				</div>

				<div class="col-md-12 mb-3">
					<div id="carregar-grafico10"></div>
				</div>




				<!------------------------GRAFICO 9 --------------------------->

				<div class="col-md-12 mb-3">
					<h5><strong>Níveis da Avaliação de Riscos Residuais(%)</strong></h5>

				</div>

				<div class="col-md-2 mb-4">
					<label>Data Inicial</label>
					<input type="text" id="grafico_9" class="form-control" required autocomplete="off" readonly>
				</div>



				<div class="col-md-2 mb-4">
					<label>Data Final</label>
					<input type="text" id="grafico_99" class="form-control" required autocomplete="off" readonly>
				</div>

				<div class="col-md-2 mb-4">
					<label>&nbsp;</label>
					<input type="button" class="btn btn-primary" value="Filtrar" onClick="Filtrar(9)">
				</div>

				<div class="col-md-12 mb-3">
					<div id="carregar-grafico9"></div>
				</div>







				<!------------------------GRAFICO 11 --------------------------->

				<div class="col-md-12 mb-3">
					<h5><strong>Níveis da Avaliação de Riscos Futuros(%)</strong></h5>

				</div>

				<div class="col-md-2 mb-4">
					<label>Data Inicial</label>
					<input type="text" id="grafico_11" class="form-control" required autocomplete="off" readonly>
				</div>



				<div class="col-md-2 mb-4">
					<label>Data Final</label>
					<input type="text" id="grafico_1111" class="form-control" required autocomplete="off" readonly>
				</div>

				<div class="col-md-2 mb-4">
					<label>&nbsp;</label>
					<input type="button" class="btn btn-primary" value="Filtrar" onClick="Filtrar(11)">
				</div>

				<div class="col-md-12 mb-3">
					<div id="carregar-grafico11"></div>
				</div>




				<!------------------------GRAFICO 12 --------------------------->

				<div class="col-md-12 mb-3">
					<h5><strong>Tratamentos Status</strong></h5>

				</div>

				<div class="col-md-2 mb-4">
					<label>Data Inicial</label>
					<input type="text" id="grafico_12" class="form-control" required autocomplete="off" readonly>
				</div>



				<div class="col-md-2 mb-4">
					<label>Data Final</label>
					<input type="text" id="grafico_1212" class="form-control" required autocomplete="off" readonly>
				</div>

				<div class="col-md-2 mb-4">
					<label>&nbsp;</label>
					<input type="button" class="btn btn-primary" value="Filtrar" onClick="Filtrar(12)">
				</div>

				<div class="col-md-12 mb-3">
					<div id="carregar-grafico12"></div>
				</div>




			</div>
		</div>

	</div>

	<script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

	<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
	<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

	<script src="https://unpkg.com/gijgo@1.9.13/js/messages/messages.pt-br.js" type="text/javascript"></script>
	<script src="js/core.js"></script>
	<script src="https://www.amcharts.com/lib/4/charts.js"></script>
	<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>


	<script>
		$ff = jQuery.noConflict()



		var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());



		$ff('#grafico_1').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy'

		});


		$ff('#grafico_11').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy',
			minDate: function() {
				return $ff('#cad-data-inicio').val();
			}
		});



		$ff('#grafico_2').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy'

		});


		$ff('#grafico_22').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy',
			minDate: function() {

			}
		});


		$ff('#grafico_3').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy'

		});


		$ff('#grafico_33').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy',
			minDate: function() {

			}
		});

		$ff('#grafico_4').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy'

		});


		$ff('#grafico_44').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy',
			minDate: function() {

			}
		});


		$ff('#grafico_5').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy'

		});


		$ff('#grafico_55').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy',
			minDate: function() {

			}
		});

		$ff('#grafico_6').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy'

		});


		$ff('#grafico_66').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy',
			minDate: function() {

			}
		});

		$ff('#grafico_7').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy'

		});


		$ff('#grafico_77').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy',
			minDate: function() {

			}
		});


		$ff('#grafico_8').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy'

		});


		$ff('#grafico_88').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy',
			minDate: function() {

			}
		});

		$ff('#grafico_9').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy'

		});


		$ff('#grafico_99').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy',
			minDate: function() {

			}
		});


		$ff('#grafico_10').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy'

		});


		$ff('#grafico_1010').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy',
			minDate: function() {

			}
		});

		$ff('#grafico_11').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy'

		});


		$ff('#grafico_1111').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy',
			minDate: function() {

			}
		});

		$ff('#grafico_12').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy'

		});


		$ff('#grafico_1212').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			locale: 'pt-br',
			format: 'dd/mm/yyyy',
			minDate: function() {

			}
		});
	</script>

	<style>
		.a1 {
			display: none
		}
	</style>
	<script>
		function Filtrar(qual_grafico) {
			var de = $('#grafico_' + qual_grafico).val()
			if (de == '') {
				de = 0
			}
			var ate = $('#grafico_' + qual_grafico + qual_grafico).val()
			if (ate == '') {
				ate = 0
			}


			$.ajax({
				type: 'post',
				data: 'de=' + de + '&ate=' + ate,
				url: 'graficos/grafico-dashboardb' + qual_grafico + '.php',
				success: function(retorno) {
					$('#carregar-grafico' + qual_grafico).html(retorno)


				}
			})

		}


		$(document).ready(function() {

			Filtrar(1)
			Filtrar(2)
			Filtrar(3)
			Filtrar(4)
			Filtrar(5)
			Filtrar(6)
			Filtrar(7)
			Filtrar(8)
			Filtrar(9)
			Filtrar(10)
			Filtrar(11)
			Filtrar(12)

			$("g [aria-labelledby='id-66-title']").each(function() {

				$(this).addClass('a1')

			});






		})
	</script>

	<script>
		$rodape = jQuery.noConflict()

		function AtivarLink() {
			$rodape('#<?php echo $nav_menu_principal ?>').addClass('show')
			$rodape('#menu-<?php echo $nav_menu_pagina ?>').css('font-weight', 'bold')

		}
		AtivarLink()
	</script>
</body>

</html>