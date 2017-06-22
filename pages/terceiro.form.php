<?php
include("header.php");
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cadastrar Prestador de Serviço</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <?php if(array_key_exists("status", $_GET) && $_GET['status']=='ok'){?>
    <div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Cadastrado com <strong>Successo!</strong>
  </div>
<?php }  ?>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Preencha o formulário abaixo
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="terceiro.Cadastra.php" method="post" role="form">

                                        <div class="form-group col-lg-4">
                                            <label>Nome:</label>
                                            <input required type="text" name="nome" class="form-control" placeholder="">
										</div>
                                        <div class="form-group col-lg-4">
                                            <label>Email:</label>
                                            <input type="text" name="email" class="form-control" placeholder="">
                    </div>

                                        <div class="form-group col-lg-4">
                                            <label>Telefone:</label>
                                            <input type=tel name="telefone" class="form-control" placeholder="">
                    </div>

                                        <div class="form-group col-lg-6">
                                            <label>CNPJ:</label>
                                            <input type="text" name="cnpj" class="form-control" placeholder="">
										</div>

                                        <div class="form-group col-lg-6">
                                            <label>CPF:</label>
                                            <input type="text" name="cpf" class="form-control" placeholder="">
										</div>

                    <div class="form-group col-lg-12">
                     <label>Rua:</label>
                     <input type=text name="rua" class="form-control" placeholder="">
                    </div>

                      <div class="form-group col-lg-6">
                        <label>Bairro:</label>
                        <input type=text name="bairro" class="form-control" placeholder="">
                      </div>

                                        <div class="form-group col-lg-6">
                                            <label>Cidade:</label>
                                            <input type=text name="cidade" class="form-control" placeholder="">
										</div>





                                        <div class="form-group col-lg-6">
                                            <label>Número:</label>
                                            <input type=text name="numero" class="form-control" placeholder="">
										                    </div>
                                        <div class="form-group col-lg-6">
                                            <label>Dados Bancários:</label>
                                            <textarea type=text name="dados-bancarios" class="form-control" ></textarea>
										                    </div>

                                        <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>


    <!--/div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
