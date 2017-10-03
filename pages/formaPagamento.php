<?php
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
                            Forma de pagamento e Entrega
                        </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-lg-6">


                                    <form role="form" action="venda/finalizaVenda.php" method="post">
                                        <div class="form-group" >
                                            <br>
                                            <label for="produtos">Selecione a forma de pagamento</label>
                                            <select class="form-control" id="produtos" name="formaPagamento">
                                              <option value="credito">Cartão - Crédito</option>
                                              <option value="debito">Cartão - Débito</option>
                                              <option value="especie">Espécie</option>
                                              <option value="boleto">Boleto</option>
                                              <option value="cheque">Cheque</option>
                                              <option value="transferencia">Transferência bancária</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label> Parcelas: </label>
                                            <input type="number"  min="1" max="12" step="1" name="parcelas" class="form-control" required placeholder="Quantidade">
                                        </div>





                                           <hr>
                                            <div class="form-group">
                                           <label> Data de entega:</label>
                                                <div class="row">
                                                    <div class='col-sm-6'>
                                                        <div class="form-group">
                                                            <div class='input-group date' id='datetimepicker2'>
                                                                <input type='date' class="form-control" name="data_entrega"/>

                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label>Produto entregue?</label>
                                                <label class="radio-inline">
                                                   <input type="radio" name="entregue" id="sim" value="sim">Sim
                                                </label>
                                                <label class="radio-inline">
                                                   <input type="radio" name="entregue" id="nao" value="nao" checked>Não
                                                </label>
                                            </div>





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
