<?php
    date_default_timezone_set("Brazil/East");
    include("DAO/conexao.php");
    include("DAO/estoqueDAO.php");
    include("DAO/operacoesDAO.php");

include('header.php');
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><img width="40%" src="img/Marca%20sem%20fundo.png"></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Vencimentos
                        </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <label> Total da venda: R$ <?= $_SESSION['totalCompra'] ?> </label><br><br>
                                    <?php
                                        $id_venda = $_GET['id'];
                                        $parcelas = $_GET['parcelas'];
                                    ?>

                                    <form role="form" action="compra.agenda.vencimentos.php?id=<?=$id_venda?>&parcelas=<?=$parcelas?>" method="post">

                                        <?php
                                        for($i=0; $i<$parcelas; $i++){
                                        ?>

                                        <div class="form-group">
                                           <label> Data da parcela <?= $i+1 ?>: </label>

                                                <div class="row">
                                                    <div class='col-sm-6'>
                                                        <div class="form-group">
                                                            <?php
                                                            $venc = date('Y-m-d', strtotime("+$i Months"));
                                                            ?>
                                                            <div class='input-group date' id='datetimepicker2'>

                                                              <input type='date' value="<?php echo $venc ?>" class="form-control" name="vencimento_parcela<?=$i?>"/>
                                                              <span class="input-group-addon">
                                                                  <span class="glyphicon glyphicon-calendar"></span>
                                                              </span>

                                                            </div>
                                                        </div>

                                                        <div class=''>
                                                            <label class="">Valor da parcela</label>
                                                            <input class="form-control" name="valor_parcela<?=$i?>" type="number" step="0.1" value="<?= round($_SESSION['totalCompra']/$parcelas, PHP_ROUND_HALF_UP) ?>">
                                                        </div>




                                                    </div>



                                                    <div class='col-sm-12'>
                                                        <div class="form-group">


                                                            <label class="checkbox-inline">
                                                              <input name="pago<?=$i?>" type="checkbox" value="sim">Parcela paga
                                                            </label>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <hr>

                                        <?php };
                                        ?>










                                        <div class="form-group">
                                            <button type="submit" class="btn btn-default btn-block">Selecionar</button>
                                        </div>
										</form>

                                 </div>


                                </div>
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

    <script type="text/javascript">
    $(function () {
        $('#datetimepicker2').datetimepicker({
            locale: 'ru'
        });
    });
    </script>

</body>

</html>
