<?php
include('header.php');
$codigo=$_REQUEST['cod'];
?>



                <!-- End of Topbar -->

              <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Usuários Cadastrados</h1>
                        <a href="novo-usuario.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" ><i
                                class="fas fa-edit fa-sm text-white-50"></i> Novo Usuário</a>
                    </div>
                    
                    
				  <?php
				  $selecao=mysqli_query($conexao,"select * from users WHERE id='$codigo'");
				  $registros=mysqli_fetch_array($selecao);
				  
				  ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4  mt-4">
                       <form action="processa-atualizar-usuario.php" method="post">
						   
						   <input type="hidden" name="codigo" id="codigo" value="<?php echo $codigo ?>">
						   
						   
                        <div class="card-body">
                           
                                
								<div class="row">
									<div class="col-md-4 mb-3">
										<label>E-mail</label>
										<input type="email" name="cad-email" id="cad-email" class="form-control" required value="<?php echo $registros['email'] ?>">
									</div>	
									<div class="col-md-3 mb-3">
										<label>Senha</label>
										<input type="password" name="cad-senha" id="cad-senha" class="form-control" required value="<?php echo $registros['senha'] ?>">
									</div>	
									
									
									<div class="col-md-3 mb-3">
										<label>Confirmar Senha</label>
										<input  type="password" name="cad-senha2" id="cad-senha2" class="form-control" required value="<?php echo $registros['senha'] ?>">
									</div>	
									
									<div class="col-md-12  mt-3">
										
								<input type="submit" value="Atualizar Usuário" class="btn btn-primary ml-0 ">
									</div>	
								
								</div>
									
									
					
                        </div></form>
                    </div>

                </div>

          

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

<script>

	$("#dataTable").dataTable({
                "bJQueryUI": true,
                "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
                }
            })

</script>
</body>

</html>