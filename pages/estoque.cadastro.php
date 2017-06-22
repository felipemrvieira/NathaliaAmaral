<?php
include("header.php");
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cadastrar produto para estoque</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <?php if(array_key_exists("status", $_GET) && $_GET['status']=='ok'){?>
    <div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Produto cadastrado com <strong>Successo!</strong>
  </div>
<?php }  ?>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Preencha o formulário abaixo
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="estoque.cadastraProduto.php" method="post" role="form">

                                        <div class="form-group">
                                            <label>Produto:</label>
                                            <input type="text" name="nome_produto" class="form-control" placeholder="Insira o nome do produto">
										                    </div>

                                        <div class="form-group ">
                    											<label> Quantidade: </label>
                    											<input type="number" name="qtd_produto" class="form-control" placeholder="">
                                        </div>

                                        <div class="form-group">
                    											<label>Mínimo: </label>
                    											<input type="number" min="0.01" step="0.01" name="minimo_produto" class="form-control" placeholder="Mínimo tolerável em estoque">
                                        </div>

                                        <div class="form-group">
                                            <label>Código NF:</label>
                                            <input type="text" name="codigo_nf" class="form-control" placeholder="Insira código da nota">
										                    </div>

                                        <div class="form-group">
                    											<label>Valor do item: </label>
                    											<input type="number" min="0.01" step="0.01" name="valor_produto" class="form-control" placeholder="Valor do item na nota">
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
