<?php

include("DAO/conexao.php");
include("DAO/financeiroDAO.php");
include("header.php");
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Editar dados da compra</h1>
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
                                <div class="col-lg-6">
                                    <form action="compra.editar.altera.php" method="post" role="form">
                                      <?php $array_compras = detalhaCompra($conexao, $_GET['id']);
                                      foreach($array_compras as $compra) {
                                      ?>
                                      <div class="form-group col-lg-12">
                                        <input name="id" value="<?= $compra['id'] ?>" type="hidden">

                                        <label>Histórico</label>
                                        <textarea class="form-control" rows="3"  name="historico"><?= $compra['historico']?></textarea>
                                      </div>
                                      <div class="form-group col-lg-6">
                                        <label>Código NF</label>
                                        <input name="codigo" value="<?= $compra['codigo_nf'] ?>" type="text" class="form-control">
                                      </div>

                                      <div class="form-group col-lg-6">
                                        <label>Data da compra</label>
                                        <input name="data_compra" required type="date" value="<?= date('Y-m-d', strtotime(str_replace('-','/', $compra['data_compra']))) ?>" class="form-control">
                                      </div>
                                      <div class="form-group col-lg-6">
                                        <label>Valor total da compra</label>
                                        <input name="total" value="<?= $compra['total'] ?>" required type="number" step="0.01" class="form-control">
                                      </div>
                                      <div class="form-group col-lg-6">
                                        <label>Parcelamento</label>
                                        <input name="parcelamento" required type="number" value="<?= $compra['qtd_parcelas'] ?>" class="form-control">
                                      </div>
                                      <?php } ?>

                                        <div class="form-group col-lg-12">
                                            <button type="submit" class="btn btn-success btn-sm">Alterar</button>
                                        </div>


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
