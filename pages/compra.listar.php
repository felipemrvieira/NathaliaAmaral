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
                            Compras realizadas
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">


                                    <table class="table table-striped">
                                      <thead>
                                          <tr>
                                              <th>Id da compra</th>
                                              <th>Histórico</th>
                                              <th>Código NF</th>
                                              <th>Data da compra</th>
                                              <th>Total da compra</th>
                                              <th>Parcelas</th>

                                          </tr>
                                       </thead>

                                <?php
                                        $total=0;
                $array_compras = listaCompras($conexao);
                foreach($array_compras as $compra) {
                ?>
                                        <tr>
                                            <td><?= $compra['id'] ?></td>
                                            <td><a href="compra.editar.php?id=<?= $compra['id'] ?>"><?= $compra['historico'] ?></td></a></td>
                                            <td><?= $compra['codigo_nf'] ?></td>
                                            <td><?= $compra['data_compra'] ?></td>
                                            <td>R$ <?= $compra['total'] ?></td>
                                            <td><?= $compra['qtd_parcelas'] ?></td>
                                        </tr>

                                        <!-- Fim do for -->
                                        <?php } ?>


            </table>


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
