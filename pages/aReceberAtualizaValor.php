<?php
include("header.php");
include("DAO/conexao.php");
include("DAO/financeiroDAO.php");
?>

        <div id="page-wrapper">
            <div class="row">

                <div class="col-lg-12">
                    <h1 class="page-header">Editar Parcela a Receber</h1>
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
                                    <form enctype="multipart/form-data" role="form" action="aReceber-atualiza.php" method="post">

                                         <?php
                            $array_contas = detalhaContaAReceber($conexao, $_GET['id']);
                            foreach($array_contas as $conta) { ?>

                              <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Venda</th>
                                        <th>Data venda</th>
                                        <th>Cliente</th>
                                        <th>Parcela</th>
                                        <th>Vencimento</th>
                                        <th>Valor</th>
                                        <th>Meio pgto</th>
                                        <th>Recebido</th>

                                    </tr>
                                 </thead>


                                  <tr>
                                    <input type="hidden" class="form-control"  name="id_parcela" value=" <?= $_GET['id']?> ">
                                      <td><?= $conta['id_venda'] ?></td>
                                      <td><?= $conta['data_venda'] ?></td>
                                      <td><?= $conta['nome_cliente'] ?></td>

                                      <td><?= $conta['parcela'] ?></td>
                                      <td><input type='date' value="<?= $conta['vencimento'] ?>" class="form-control" name="vencimento_parcela"></td>

                                      </div>
                                      <td> <input class="form-control" type="number" step="0.01" name="valor_parcela" value="<?= $conta['valor_parcela'] ?>"> </td>
                                      <td><?= $conta['forma_pgto'] ?></td>

                                      <td> <?php if ($conta['recebido'] == 'n') {
                                        echo 'Não';
                                      } else {
                                        echo 'Sim';
                                      }
                                       ?>
                                     </td>

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
