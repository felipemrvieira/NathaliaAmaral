<?php
//seta o horário padrao para esse script
date_default_timezone_set("Brazil/East");

    include("DAO/conexao.php");
    include("DAO/financeiroDAO.php");
    include('header.php');

if(isset($_POST['dataInicial'])){
    $dataInicial = $_POST['dataInicial'];
    $dataFinal = $_POST['dataFinal'];

}

$_SESSION['total'] = 0;
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><img width="40%" src="img/Marca%20sem%20fundo.png"></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->


            <!--<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Filtro
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form action="aReceber.php" method="post" role="form">
                                    <div class="col-lg-12">

                                        <div class="form-group col-lg-6">
                                           <label>Nome do Cliente</label>
                                            <input name="nome" type="text" class="form-control">
                                        </div>

                                        <div class="form-group col-lg-6">
                                           <label>Data Inicial</label>
                                            <input name="dataInicial" required type="date" value="" class="form-control">
                                        </div>

                                        <div class="form-group col-lg-6">
                                           <label>Data Final</label>
                                            <input name="dataFinal" required type="date" value="" class="form-control">
                                        </div>
                                        <div class="form-group col-lg-6">
                                           <label class="checkbox-inline">
                                              <input name="cre" type="checkbox" value="credito">Crédito
                                            </label>
                                            <label class="checkbox-inline">
                                              <input name="deb" type="checkbox" value="debito">Débito
                                            </label>
                                            <label class="checkbox-inline">
                                              <input name="esp" type="checkbox" value="especie">Espécie
                                            </label>
                                            <label class="checkbox-inline">
                                              <input name="che" type="checkbox" value="cheque">Cheque
                                            </label>
                                            <label class="checkbox-inline">
                                              <input name="bol" type="checkbox" value="boleto">Boleto
                                            </label>
                                        </div>
								        <div class="form-group col-lg-12">
                                            <button type="submit" class="btn btn-default">Pesquisar</button>
                                            <button type="reset" class="btn btn-default">Limpar</button>
                                        </div>

                                    </div>
                                </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div> -->




            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Parcelas em aberto
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">


                                    <table class="table table-striped">
                                      <thead>
                                          <tr>
                                              <th>Venda</th>
                                              <th>Data da venda</th>
                                              <th>Cliente</th>

                                              <th>Forma pgto</th>

                                              <th>Parcela</th>
                                              <th>Vencimento</th>
                                              <th>Valor da parcela</th>
                                              <th>Recebido</th>
                                              <th></th>

                                          </tr>
                                       </thead>

                                <?php
                                        $total=0;
                $array_vendas = buscaContasAReceber($conexao);
                foreach($array_vendas as $venda) {
                ?>
                                        <tr>

                                            <td><?= $venda['id_venda'] ?></td>
                                            <td><?= $venda['data_venda'] ?></td>
                                            <td><?= $venda['nome_cliente'] ?></td>

                                            <td><?= $venda['forma_pgto'] ?></td>

                                            <td><?= $venda['parcela'] ?></td>
                                            <td><?= $venda['vencimento'] ?></td>
                                            <td>R$ <?= $venda['valor_parcela'] ?></td>
                                            <td><?= $venda['recebido'] ?></td>

                                            <td><a href="aReceber-confirma.php?id=<?= $venda['id_parcela'] ?>"> Informar recebimento <i class="fa fa-check" aria-hidden="true"></i></a> </td>
                                            <?php $total += $venda['valor_parcela']?>


                                        </tr>

                                        <!-- Fim do for -->
                                        <?php } ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            <td></td>
                                            <td></td>
                                            <td align="right">Total a receber:</td>
                                            <td>R$ <?=$total?></td>
                                            <td></td>
                                        </tr>

            </table>
                               <button class="btn btn-default" onclick="imprime()">Imprimir</button>


                                 </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Parcelas recebidas
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">


                                        <table class="table table-striped">
                                          <thead>
                                              <tr>
                                                  <th>Venda</th>
                                                  <th>Data da venda</th>
                                                  <th>Cliente</th>

                                                  <th>Forma de Pagamento</th>

                                                  <th>Parcela</th>
                                                  <th>Vencimento</th>
                                                  <th>Valor da parcela</th>
                                                  <th>Recebido</th>

                                                  <th></th>

                                              </tr>
                                           </thead>

                                    <?php
                                            $total=0;
                    $array_vendas = buscaContasARecebidas($conexao);
                    foreach($array_vendas as $venda) {
                    ?>
                                            <tr>

                                                <td><?= $venda['id_venda'] ?></td>
                                                <td><?= $venda['data_venda'] ?></td>
                                                <td><?= $venda['nome_cliente'] ?></td>

                                                <td><?= $venda['forma_pgto'] ?></td>

                                                <td><?= $venda['parcela'] ?></td>
                                                <td><?= $venda['vencimento'] ?></td>
                                                <td>R$ <?= $venda['valor_parcela'] ?></td>
                                                <td><?= $venda['recebido'] ?></td>

                                                <td><a href="aReceber-desfaz.php?id=<?= $venda['id_parcela'] ?>">Desfazer <i class="fa fa-undo" aria-hidden="true"></i></a> </td>
                                                <?php $total += $venda['valor_parcela']?>


                                            </tr>

                                            <!-- Fim do for -->
                                            <?php } ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>

                                                <td></td>
                                                <td></td>
                                                <td align="right">Total:</td>
                                                <td>R$ <?=$total?></td>
                                                <td></td>
                                            </tr>

                </table>
                                   <button class="btn btn-default" onclick="imprime()">Imprimir</button>


                                     </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



            </div>
</div>




        </div>

         <script>
function imprime() {
    window.print();
}
</script>
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
