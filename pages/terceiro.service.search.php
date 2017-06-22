<?php
  date_default_timezone_set("Brazil/East");
  include("DAO/conexao.php");
  include("DAO/operacoesDAO.php");

include('header.php');
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">Consultar Serviço Terceiro</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <?php if(array_key_exists("status", $_GET) && $_GET['status']=='excluido'){?>
                        <div class="alert alert-success fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Serviço excluído com <strong>Successo!</strong>
                      </div>
                    <?php }  ?>

                    <?php if(array_key_exists("status", $_GET) && $_GET['status']=='ok'){?>
                        <div class="alert alert-success fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Serviço alterado com <strong>Successo!</strong>
                      </div>
                    <?php }  ?>

                    <?php if(array_key_exists("status", $_GET) && $_GET['status']=='entregue'){?>
                        <div class="alert alert-success fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Serviço alterado para status <strong>Entregue!</strong>
                      </div>
                    <?php }  ?>



                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Filtragem de Servicos
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form">

                                        <div class="form-group">

                                            <input class="form-control" placeholder="Insira um dado aqui">
                                        </div>

                                        <button type="submit" class="btn btn-default">Pesquisar</button>
                                        <button type="reset" class="btn btn-default">Limpar</button>

                                    </form>
                                      </div>
                                </div>
                                </div>
                                </div>

                <br>




            <form method="post">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Prestador</th>
                        <th>Data de Saída</th>
                        <th>Data de Retorno</th>
                        <th>Descrição do Serviço</th>
                        <th>Entregue</th>

                    </tr>
                 </thead>

                                <?php
                $array_servicos_terceiros = listaServicosTerceiros($conexao);
                foreach($array_servicos_terceiros as $servico) {
                    $myDateTime= DateTime::createFromFormat('Y-m-d', $servico['data_saida']);
                    $saida_formatada = $myDateTime->format('d-m-Y');

                    $myDateTime= DateTime::createFromFormat('Y-m-d', $servico['data_retorno']);
                    $retorno_formatada = $myDateTime->format('d-m-Y');
                ?>

                <tr class="terceiros">

                    <td><label><?= $servico['id_servico_terceiro'] ?></label></td>

                    <td><label><?= procuraTerceiro($conexao, $servico) ?></label></td>


                    <td><label><?= $saida_formatada ?></label></td>
                    <td><label><?= $retorno_formatada ?></label></td>
                    <td><label><?= $servico['descricao_servico_terceiro'] ?></label></td>
                    <td><label><?= $servico['entregue'] ?></label></td>

                    <td><label><a href="terceiro.service.entregar.php?id=<?= $servico['id_servico_terceiro'] ?>">Entregue</a></label></td>

                    <td><label><a href="terceiro.service.excluir.php?id=<?= $servico['id_servico_terceiro'] ?>">Excluir</a></label></td>


                </tr>

                <?php
            }?>
            </table>
<button type="submit" class="btn btn-primary btn-block" formaction="terceiro.service.php">Cadastrar novo serviço</button>
                <br>
        </form>
                        </div>
                    </div>
</div>



        <!-- /#page-wrapper -->

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
