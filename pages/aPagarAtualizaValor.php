<?php
include("header.php");
include("DAO/conexao.php");
include("DAO/financeiroDAO.php");
?>

        <div id="page-wrapper">
            <div class="row">

                <div class="col-lg-12">
                    <h1 class="page-header">Editar Parcela a Pagar</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                        <?php if(array_key_exists("status", $_GET) && $_GET['status']=='ok' && array_key_exists("idCliente", $_GET) && $_GET['idCliente']<>''){?>
                            <div class="alert alert-success fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            Cliente cadastrado com sucesso! <strong>Id: <?php echo $_GET['idCliente'] ?></strong>
                          </div>
                        <?php }  ?>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Preencha o valor da parcela
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form enctype="multipart/form-data" role="form" action="aPagar-atualiza.php" method="post">

                                         <?php
                            $array_compras = detalhaContaAPagar($conexao, $_GET['id']);
                            foreach($array_compras as $compra) { ?>

                              <table class="table table-striped">
                                <thead>
                                    <tr>
                                      <th>Id compra</th>
                                      <th>Descrição</th>
                                      <th>Valor total</th>
                                      <th>Qtd parcelas</th>
                                      <th>Parcela</th>
                                      <th>Vencimento</th>
                                      <th>Valor</th>
                                      <th>Pago</th>

                                    </tr>
                                 </thead>


                                  <tr>
                                    <input type="hidden" class="form-control"  name="id_parcela" value=" <?= $_GET['id']?> ">
                                    <td><?= $compra['id'] ?></td>
                                    <td><?= $compra['historico'] ?></td>
                                    <td>R$ <?= $compra['total'] ?></td>
                                    <td><?= $compra['qtd_parcelas'] ?></td>
                                    <td><?= $compra['parcela'] ?></td>
                                    <td><input type='date' value="<?= $compra['vencimento'] ?>" class="form-control" name="vencimento_parcela"></td>
                                    <td> <input class="form-control" type="number" step="0.01" name="valor_parcela" value="<?= $compra['valor_parcela'] ?>"> </td>


                                    <td> <?php if ($compra['pago'] == 'n') {
                                      echo 'Não';
                                    } else {
                                      echo 'Sim';
                                    }
                                    ?>
                                  </tr>

                                </table>

                                        <?php } ?>

                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div></div>
            </div>


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
